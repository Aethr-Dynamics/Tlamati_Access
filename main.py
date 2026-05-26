from fastapi import FastAPI, File, UploadFile, HTTPException
from fastapi.middleware.cors import CORSMiddleware
import insightface
import cv2
import numpy as np
from PIL import Image
import io
import os

app = FastAPI(title="Servicio de Reconocimiento Facial")

# Permitir conexiones desde Laravel
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # En producción, especifica el dominio de Laravel
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Cargar modelo UNA VEZ al iniciar (esto es clave para rendimiento)
print("Cargando modelo de reconocimiento facial...")
face_app = insightface.app.FaceAnalysis(providers=['CPUExecutionProvider'])
face_app.prepare(ctx_id=0, det_size=(640, 640))
print("Modelo cargado exitosamente")

# Base de datos temporal de embeddings (en producción usarías PostgreSQL/Pgvector)
registered_faces = {}

@app.get("/health")
def health_check():
    return {"status": "ok", "message": "Servicio de IA funcionando"}

@app.post("/register")
async def register_face(user_id: str, file: UploadFile = File(...)):
    """
    Registrar un nuevo rostro en el sistema
    """
    try:
        # Leer imagen
        contents = await file.read()
        image = Image.open(io.BytesIO(contents))
        image_np = np.array(image)
        image_bgr = cv2.cvtColor(image_np, cv2.COLOR_RGB2BGR)
        
        # Detectar rostro
        faces = face_app.get(image_bgr)
        
        if len(faces) == 0:
            raise HTTPException(status_code=400, detail="No se detectó ningún rostro")
        
        if len(faces) > 1:
            raise HTTPException(status_code=400, detail="Múltiples rostros detectados. Use una sola persona")
        
        # Guardar embedding
        embedding = faces[0].embedding
        registered_faces[user_id] = embedding.tolist()
        
        return {
            "success": True,
            "message": f"Rostro registrado para usuario {user_id}",
            "user_id": user_id
        }
        
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.post("/recognize")
async def recognize_face(file: UploadFile = File(...)):
    """
    Validar si el rostro existe en el sistema
    """
    try:
        # Leer imagen
        contents = await file.read()
        image = Image.open(io.BytesIO(contents))
        image_np = np.array(image)
        image_bgr = cv2.cvtColor(image_np, cv2.COLOR_RGB2BGR)
        
        # Detectar rostro
        faces = face_app.get(image_bgr)
        
        if len(faces) == 0:
            return {
                "success": False,
                "message": "No se detectó ningún rostro",
                "user_id": None,
                "confidence": 0
            }
        
        # Obtener embedding del rostro detectado
        current_embedding = faces[0].embedding
        
        # Comparar con todos los rostros registrados
        best_match = None
        best_similarity = 0
        
        for user_id, stored_embedding in registered_faces.items():
            stored_embedding = np.array(stored_embedding)
            
            # Calcular similitud coseno
            similarity = np.dot(current_embedding, stored_embedding) / (
                np.linalg.norm(current_embedding) * np.linalg.norm(stored_embedding)
            )
            
            if similarity > best_similarity:
                best_similarity = similarity
                best_match = user_id
        
        # Umbral de confianza (ajustar según pruebas, 0.6 = 60%)
        threshold = 0.6
        
        if best_similarity >= threshold:
            return {
                "success": True,
                "message": "Usuario reconocido",
                "user_id": best_match,
                "confidence": float(best_similarity * 100)
            }
        else:
            return {
                "success": False,
                "message": "Usuario no reconocido",
                "user_id": None,
                "confidence": float(best_similarity * 100)
            }
        
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

@app.get("/registered-users")
async def get_registered_users():
    """
    Ver usuarios registrados (para debugging)
    """
    return {
        "count": len(registered_faces),
        "users": list(registered_faces.keys())
    }

if __name__ == "__main__":
    import uvicorn
    # Ejecutar en puerto 8000
    uvicorn.run(app, host="0.0.0.0", port=8000)