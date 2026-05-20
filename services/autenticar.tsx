
import { initializeApp } from 'firebase/app';
import { getAuth, signInWithEmailAndPassword, signOut } from 'firebase/auth';
import { getFirestore, doc, getDoc } from 'firebase/firestore';


// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyD4mUejIQmZKsjuxKSehW9s9PBO3T3o7QY",
  authDomain: "tlamati-9dd77.firebaseapp.com",
  projectId: "tlamati-9dd77",
  storageBucket: "tlamati-9dd77.firebasestorage.app",
  messagingSenderId: "513483572570",
  appId: "1:513483572570:web:653667901c6089df221f63"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const db   = getFirestore(app);


export type TipoUsuario = 'estudiante' | 'profesor';

export interface Usuario {
  uid:          string;
  email:        string;
  nombre:       string;
  apPaterno:    string;
  apMaterno:    string;
  sede:         string;
  licenciatura: string;   
  departamento: string;   
  estado:       string;
  matricula:    string;   
  foto:         string;
  tipo:         TipoUsuario;
}

// Detecta tipo por formato de matrícula
// Estudiante: XX-XXX-XXXX  (2-3-4)
// Profesor:   XX-XXXX-XX   (2-4-2)

export function detectarTipo(matricula: string): TipoUsuario {
  const esEstudiante = /^\d{2}-\d{3}-\d{4}$/.test(matricula);
  const esProfesor   = /^\d{2}-\d{4}-\d{2}$/.test(matricula);

  if (esEstudiante) return 'estudiante';
  if (esProfesor)   return 'profesor';

  throw new Error(`Formato de matrícula no reconocido: ${matricula}`);
}

// Login principal 

export async function login(email: string, password: string): Promise<Usuario> {
  // 1. Autenticar con Firebase Auth
  const credencial = await signInWithEmailAndPassword(auth, email, password);
  const uid = credencial.user.uid;

  // 2. Obtener datos del usuario desde Firestore 
  const ref  = doc(db, 'usuarios', uid);
  const snap = await getDoc(ref);

  if (!snap.exists()) {
    throw new Error('Usuario no encontrado en la base de datos.');
  }

  const data = snap.data();

  // 3. Detectar tipo por matrícula
  const tipo = detectarTipo(data.matricula);

  return {
    uid,
    email:        data.email        ?? email,
    nombre:       data.nombre       ?? '',
    apPaterno:    data.apPaterno    ?? '',
    apMaterno:    data.apMaterno    ?? '',
    sede:         data.sede         ?? '',
    licenciatura: data.licenciatura ?? '',
    departamento: data.departamento ?? '',
    estado:       data.estado       ?? '',
    matricula:    data.matricula    ?? '',
    foto:         data.foto         ?? '',
    tipo,
  };
}

// 

export async function cerrarSesion(): Promise<void> {
  await signOut(auth);
}