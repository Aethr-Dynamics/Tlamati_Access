
## 1. Compilar Ejecutable
### Activar entorno virtual

venv\Scripts\activate

# Crear ejecutable
Para version en produccion.

pyinstaller --clean servicio-ia.spec

# El ejecutable estará en: dist/servicio-ia.exe

---

## 2. Presentacion

### 1. Iniciar PostgreSQL
# (Asegúrate que el servicio esté corriendo)

### 2. Iniciar Servicio IA (desde el ejecutable)

cd servicio-ia/dist
./servicio-ia.exe  # Windows

### O desde Python si no compilaste
python main.py

# 3. Iniciar Laravel
cd backend-laravel
php artisan serve --port=8000

# 4. Abrir navegador
# http://localhost:8000/facial-recognition

---

## 3. COMANDOS DE INSTALACIÓN RÁPIDA

# 1. Clonar/Crear proyecto
mkdir proyecto-facial-universidad
cd proyecto-facial-universidad

# 2. Configurar Laravel
composer create-project laravel/laravel backend-laravel
cd backend-laravel
# (Configurar .env con PostgreSQL)
php artisan migrate
php artisan serve --port=8000

# 3. Configurar Servicio IA (en otra terminal)
cd ../servicio-ia
python -m venv venv
venv\Scripts\activate
pip install -r requirements.txt
python main.py

# 4. Compilar ejecutable (opcional)
pyinstaller --clean servicio-ia.spec

## 4. RESUMEN DE LIBRERÍAS A INSTALAR

pip install fastapi==0.104.1
pip install uvicorn==0.24.0
pip install python-multipart==0.0.6
pip install insightface==0.7.3
pip install onnxruntime==1.16.0
pip install opencv-python-headless==4.8.1
pip install numpy==1.24.3
pip install pillow==10.1.0
pip install pyinstaller==6.3.0

## Terminal 2: Servicio de IA (Python)
cd servicio-ia

# Opción A: Ejecutar con Python (desarrollo)
python -m venv venv
venv\Scripts\activate  # Windows
pip install -r requirements.txt
python main.py

# Opción B: Ejecutar ejecutable portable (presentación)
cd dist
.\servicio-ia.exe  # Windows

# Ejecutar el backend-laravel
cd dist
php artisan serve o php -S localhost:8080 o php -S localhost:8080 -t public
npm run dev

## 5. Estructura del proyecto

/proyecto-facial-universidad/
├── /backend-laravel/              # Sistema web Laravel + PostgreSQL (DV - 3.5.5)
│   ├── /app
│   ├── /config
│   ├── /database
│   ├── /resources/views
│   └── .env
├── /servicio-ia/                  # Servicio Python (FastAPI + ONNX)
│   ├── main.py
│   ├── requirements.txt
│   ├── /models                    # Modelos ONNX pre-descargados
│   └── build/                     # Para PyInstaller
├── /documentacion/                # Manual de instalación
└── README.md