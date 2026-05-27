# Tlamati Access

## Sistema Inteligente de Gestión y Control de Acceso Institucional para la UACM

<p align="center">
  <!-- Ícono o logotipo del proyecto -->
  <img src="assets/img/logo.png" alt="Logotipo de Tlamati Access" width="180">
</p>

<p align="center">
  <strong>Implementación en:</strong> Universidad Autónoma de la Ciudad de México (UACM) | Plantel Cuautepec GAM 1
</p>

<p align="center">
  <a href="https://laravel.com/">
    <img src="https://img.shields.io/badge/Laravel-v13-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel v13">
  </a>
  <a href="https://www.php.net/">
    <img src="https://img.shields.io/badge/PHP-%3E=8.2-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP >=8.2">
  </a>
  <a href="https://www.postgresql.org/">
    <img src="https://img.shields.io/badge/PostgreSQL-pgsql-4169E1?style=flat-square&logo=postgresql&logoColor=white" alt="PostgreSQL pgsql">
  </a>
  <a href="https://reactnative.dev/">
    <img src="https://img.shields.io/badge/React%20Native-Expo-20232A?style=flat-square&logo=react&logoColor=61DAFB" alt="React Native Expo">
  </a>
  <img src="https://img.shields.io/badge/Estado-En%20desarrollo-blue?style=flat-square" alt="Estado">
</p>

---

## Tabla de contenidos

- [1. Introducción](#1-introducción)
- [2. Propósito del proyecto](#2-propósito-del-proyecto)
- [3. Colaboración corporativa](#3-colaboración-corporativa)
- [4. Stack tecnológico](#4-stack-tecnológico)
- [5. Evolución del producto](#5-evolución-del-producto)
- [6. Características mejoradas del Ciclo III](#6-características-mejoradas-del-ciclo-iii)
- [7. Arquitectura y control de versiones](#7-arquitectura-y-control-de-versiones)
- [8. Requisitos técnicos](#8-requisitos-técnicos)
- [9. Instalación](#9-instalación)
- [10. Aplicación Móvil de autenticación por QR](#10-aplicación-móvil-de-autenticación-por-qr)
  - [¿Qué hace la app?](#qué-hace-la-app)
  - [Tecnologías utilizadas](#tecnologías-utilizadas)
  - [Requisitos previos](#requisitos-previos)
  - [Estructura del proyecto](#estructura-del-proyecto)
  - [Configuración de Firebase](#configuración-de-firebase)
  - [Instalación y ejecución](#instalación-y-ejecución)
  - [Base de datos](#base-de-datos)
  - [Flujo de la aplicación](#flujo-de-la-aplicación)
  - [Cómo funciona el código QR](#cómo-funciona-el-código-qr)
  - [Detección de tipo de usuario](#detección-de-tipo-de-usuario)
  - [Colores y tema visual](#colores-y-tema-visual)
- [11. Versiones lanzadas](#11-versiones-lanzadas)
- [12. Historial de versiones](#12-historial-de-versiones)
- [13. Licencia](#13-licencia)

---

## 1. Introducción

Tlamati Access es una plataforma integral y avanzada diseñada para modernizar completamente los protocolos de ingreso a instituciones educativas críticas. En un entorno donde la seguridad física está constantemente amenazada por métodos de identificación vulnerables, como fotocopias o credenciales físicas clonadas, nuestro sistema eleva la gestión del acceso a estándares criptográficos y biométricos de vanguardia.

Nuestro objetivo principal es resolver una brecha crítica: la fricción entre la alta demanda de flujo de personas en las entradas y la necesidad absoluta de garantizar una validación infalsificable para el personal de seguridad. Tlamati Access garantiza eficiencia operativa sin sacrificar un nivel superior de seguridad, protegiendo así al plantel, su comunidad y sus activos.

---

## 2. Propósito del proyecto

El proyecto está diseñado para transicionar los procesos manuales de control de acceso a un ecosistema digital inteligente que ofrece:

- **Seguridad cero confianza:** cada interacción es tratada como una potencial amenaza, requiriendo múltiples capas de validación.
- **Escalabilidad:** la arquitectura modular permite integrar nuevas funcionalidades, como biometría o nuevos tipos de credenciales, sin detener las operaciones existentes.
- **Trazabilidad forense:** registro completo e inmutable de quién, cuándo y por qué accedió a las instalaciones, esencial para auditorías de seguridad y gestión de crisis.

---

## 3. Colaboración corporativa

Este proyecto es el resultado de una alianza tecnológica estratégica entre dos corporaciones líderes en desarrollo de software: **AETHR Dynamics** y **Studio Nails My**. La unión de estas fuerzas especializadas ha permitido combinar la visión gerencial y la experiencia en experiencia de usuario con un desarrollo técnico robusto y avanzado, garantizando un producto que no solo es seguro, sino también usable y adaptado al entorno académico mexicano.

---

## 4. Stack tecnológico

Tlamati Access fue desarrollado utilizando un stack tecnológico moderno y de alto rendimiento, asegurando escalabilidad y baja deuda técnica:

- **Backend:** Laravel v13 (PHP Framework), para la lógica de negocio central y gestión de APIs.
- **Base de datos:** PostgreSQL (`pgsql`), gestor robusto, confiable y preparado para grandes volúmenes de datos transaccionales.
- **Análisis avanzado:** Python, utilizado específicamente para módulos de análisis biométrico y detección de patrones en documentación oficial con OpenCV.
- **Aplicación móvil:** React Native con Expo, para la generación de códigos QR cifrados desde dispositivos del usuario.

---

## 5. Evolución del producto

Tlamati Access no fue un desarrollo único; es el resultado de una evolución planificada en múltiples fases, demostrando su adaptabilidad y capacidad de mejora continua.

1. **Fase I - Fundacional:** se estableció la base operativa con un sistema inicial basado en códigos QR dinámicos.
2. **Fase II - Refinamiento:** el sistema evolucionó hacia plataformas web robustas, mejorando la gestión de roles y el control de acceso.
3. **Ciclo III - Tlamati Access (versión actual):** esta fase representa un salto importante en seguridad. Integramos tecnologías avanzadas para crear una solución de doble autenticación, haciendo que la validación de identidad sea prácticamente infalsificable.

---

## 6. Características mejoradas del Ciclo III

Las mejoras introducidas en la última etapa representan el valor principal para la UACM:

- **Autenticación criptográfica dinámica:** implementación de códigos QR generados bajo demanda y con ventana de validez de 5 minutos, eliminando cualquier riesgo asociado a credenciales estáticas o clonables. El código **no se genera automáticamente**: el usuario debe solicitarlo de forma explícita cada vez que necesite acceder; una vez expirado, debe generar uno nuevo.
- **Cifrado AES de matrícula:** el QR no expone datos en texto plano. La matrícula del usuario se cifra junto con una marca de tiempo usando AES (vía `crypto-js`), de modo que solo el sistema lector con la clave secreta puede validar la identidad.
- **Reconocimiento facial (biometría):** módulo avanzado que actúa como una capa de doble autenticación para agilizar el ingreso sin comprometer la seguridad.
- **Validación documental con IA:** uso de análisis avanzados para detectar inconsistencias o falsificaciones en identificaciones oficiales mediante algoritmos entrenados.

---

## 7. Arquitectura y control de versiones

El sistema mantiene un protocolo estricto de desarrollo basado en ramas funcionales para garantizar la estabilidad de producción:

| Rama | Descripción | Propósito |
|------|-------------|-----------|
| `main` | Contiene el código base estable y certificado. | Versión lista para producción, sin funcionalidades de riesgo. |
| `feature/*` | Ramas de desarrollo específicas para nuevas características o correcciones, por ejemplo `feature/biometrics` o `feature/qr-api`. | Desarrollo aislado e integración progresiva, manteniendo el entorno principal limpio y estable. |

### Historial detallado del Ciclo III

Cada mejora ha sido versionada meticulosamente en ramas específicas para asegurar la trazabilidad completa:

- **3.1.0:** implementación de arquitectura MVC, módulos Seed y Factory, e integración de visualizaciones analíticas (Dashboard).
- **3.2.0:** desarrollo detallado de permisos de roles (CRUD) con mecanismos avanzados contra inyección de formularios.
- **3.2.1:** creación de vistas uniformes para gestión de errores HTTP, mejorando la experiencia de usuario ante fallas.
- **3.3.0:** funcionalidad crítica: lectura avanzada de códigos QR con hardware y generación automatizada de reportes PDF.
- **3.3.1:** sistema de notificaciones inter-usuarios y módulo avanzado (OpenCode) para análisis de credenciales oficiales.
- **3.4.0:** implementación rigurosa de pruebas unitarias y suites completas de seguridad.
- **3.5.0:** integración completa del motor de reconocimiento facial en la plataforma web, cerrando el ciclo de autenticación de doble factor.
- **3.6.0:** cifrado AES del payload del QR (matrícula + timestamp), expiración configurable de 5 minutos, generación explícita por el usuario y flujo de renovación tras expiración.

---

## 8. Requisitos técnicos

### Stack requerido

- **PHP** 8.2 o superior
- **Laravel** v13
- **PostgreSQL** en su versión más reciente disponible para `pgsql`
- **Node.js** v18 o superior y **npm** v9 o superior
- **Python 3.x** para módulos de biometría y análisis
- **Hardware:** terminales con lectores QR y cámaras IP de alta resolución

### Dependencias adicionales — Aplicación móvil

La pantalla `CodigoAccesoScreen` requiere las siguientes dependencias adicionales:

```bash
# Cifrado AES del payload del QR
npm install crypto-js
npm install --save-dev @types/crypto-js

# Fuente segura de aleatoriedad requerida por crypto-js en React Native
# (debe importarse ANTES que crypto-js en el archivo)
npm install react-native-get-random-values

# Renderizado del código QR
npx expo install react-native-svg react-native-qrcode-svg
```

### Variable de entorno — móvil

En el archivo `.env` de la aplicación Expo se puede definir la clave secreta de cifrado:

```env
EXPO_PUBLIC_QR_SECRET=tu_clave_secreta_aqui
```

Si la variable no está definida, el sistema utiliza un valor de respaldo por defecto. Se recomienda establecerla explícitamente en entornos de producción.

### Configuración de TypeScript

Para que TypeScript reconozca `process.env` en el contexto de Expo:

```bash
npm install --save-dev @types/node
```

Y en `tsconfig.json`:

```jsonc
{
  "extends": "expo/tsconfig.base",
  "compilerOptions": {
    "types": ["node"]
  }
}
```

---

## 9. Instalación

### Clonar repositorio principal

```bash
git clone https://github.com/Aethr-Dynamics/Tlamati_Access.git tlamati-access
cd tlamati-access
```

### Instalar dependencias PHP y Node.js

```bash
composer install --no-dev
npm install
```

### Configurar entorno

```bash
cp .env.example .env
php artisan key:generate
```

Editar el archivo `.env` y establecer la conexión con PostgreSQL:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nombre_de_la_base
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

### Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

### Compilar assets frontend

```bash
npm run build
```

### Ejecutar el proyecto en local

```bash
php artisan serve
```

---

## 10. Aplicación Móvil de autenticación por QR

App móvil de control de acceso institucional para estudiantes y profesores. Permite autenticarse con credenciales institucionales, consultar el perfil y generar un código QR cifrado y dinámico para acceder a las instalaciones.

---

### ¿Qué hace la app?

1. El usuario ingresa su correo y contraseña institucional.
2. La app lo autentica contra Firebase Auth y consulta sus datos en Firestore.
3. Muestra su perfil completo (nombre, sede, matrícula, etc.).
4. Detecta automáticamente si es **estudiante** o **profesor** según el formato de su matrícula.
5. Permite generar un **código QR cifrado** bajo demanda: el usuario debe pulsarlo explícitamente cada vez. El código expira a los **5 minutos**; una vez expirado, el usuario debe generar uno nuevo manualmente.

---

### Tecnologías utilizadas

| Tecnología | Versión | Uso |
|---|---|---|
| React Native | 0.74 | Framework base de la app |
| Expo | ~51.0 | Plataforma de desarrollo y build |
| Expo Router | ~3.5 | Navegación basada en archivos |
| TypeScript | ~5.3 | Tipado estático |
| Firebase Auth | 10.x | Autenticación de usuarios |
| Firebase Firestore | 10.x | Base de datos de perfiles |
| crypto-js | ^4.x | Cifrado AES del payload del QR |
| react-native-get-random-values | ^1.x | Fuente segura de aleatoriedad para crypto-js |
| react-native-qrcode-svg | ^6.3 | Generación del código QR |
| react-native-svg | 15.2 | Dependencia del QR |

---

### Requisitos previos

Antes de comenzar necesitas tener instalado:

- **Node.js** v18 o superior — [nodejs.org](https://nodejs.org)
- **npm** v9 o superior (viene con Node)
- **Expo CLI** — se instala con `npm install -g expo-cli`
- **Expo Go** en tu teléfono (iOS o Android) para probar en dispositivo físico
- Una cuenta en **Firebase** — [console.firebase.google.com](https://console.firebase.google.com)

---

### Estructura del proyecto

```
tlamati-access/
│
├── app/                        # Pantallas de la aplicación (Expo Router)
│   ├── _layout.tsx             # Configuración del Stack navigator
│   ├── index.tsx               # Redirige automáticamente a /login
│   ├── login.tsx               # Pantalla de inicio de sesión
│   ├── perfil.tsx              # Perfil del usuario autenticado
│   └── codigoAcceso.tsx        # Generador de código QR cifrado y dinámico
│
├── services/
│   └── autenticar.ts           # Lógica de Firebase (Auth + Firestore)
│
├── assets/
│   └── logo.png                # Logo de Tlamati Access (debes colocarlo tú)
│
├── .env                        # Variables de entorno (EXPO_PUBLIC_QR_SECRET)
├── app.json                    # Configuración de Expo
├── babel.config.js             # Configuración de Babel
├── package.json                # Dependencias del proyecto
├── tsconfig.json               # Configuración de TypeScript
└── README.md                   # Este archivo
```

---

### Configuración de Firebase

#### Paso 1 — Crear el proyecto

1. Ve a [console.firebase.google.com](https://console.firebase.google.com)
2. Click en **"Agregar proyecto"**
3. Dale un nombre (ej. `tlamati-access`) y crea el proyecto

#### Paso 2 — Activar Authentication

1. En el menú izquierdo → **Authentication** → **Comenzar**
2. Pestaña **Sign-in method** → habilita **Correo/Contraseña** → Guardar

#### Paso 3 — Crear Firestore

1. Menú izquierdo → **Firestore Database** → **Crear base de datos**
2. Selecciona **Comenzar en modo de prueba**
3. Elige la región `us-central1` (o la más cercana a ti)

#### Paso 4 — Registrar la app

1. En la página principal del proyecto → click en el ícono **</>** (Web)
2. Dale un nombre (ej. `tlamati-app`) → **Registrar app**
3. Copia el objeto `firebaseConfig` que aparece

#### Paso 5 — Pegar credenciales en el código

Abre `services/autenticar.ts` y reemplaza los valores del objeto `firebaseConfig`:

```typescript
const firebaseConfig = {
  apiKey:            'API_KEY',
  authDomain:        'AUTH_DOMAIN',
  projectId:         'PROJECT_ID',
  storageBucket:     'STORAGE_BUCKET',
  messagingSenderId: 'MESSAGING_SENDER_ID',
  appId:             'APP_ID',
};
```

> Estas claves son públicas por diseño de Firebase, pero en producción configura las **reglas de seguridad de Firestore** para proteger los datos.

---

### Instalación y ejecución

```bash
# 1. Clonar o descomprimir el proyecto
cd tlamati-access

# 2. Instalar dependencias base
npm install

# 3. Instalar librerías nativas
npx expo install @react-native-async-storage/async-storage
npx expo install react-native-svg react-native-qrcode-svg firebase
npm install firebase

# 4. Instalar dependencias de cifrado
npm install crypto-js react-native-get-random-values
npm install crypto-js
npm install --save-dev @types/crypto-js @types/node


# 5. Iniciar el servidor de desarrollo
npx expo start
```

Luego escanea el código QR que aparece en la terminal con la app **Expo Go** en tu teléfono, o presiona:
- `a` para abrir en emulador Android
- `i` para abrir en simulador iOS
- `w` para abrir en navegador web

---

### Base de datos

#### Colección: `usuarios`

Cada documento tiene como **ID el UID de Firebase Auth** del usuario.

| Campo | Tipo | Descripción |
|---|---|---|
| `email` | string | Correo institucional |
| `nombre` | string | Primer nombre |
| `apPaterno` | string | Apellido paterno |
| `apMaterno` | string | Apellido materno |
| `sede` | string | Campus o sede institucional |
| `licenciatura` | string | Carrera (solo estudiantes) |
| `departamento` | string | Área académica (solo profesores) |
| `estado` | string | `Activo` o `Inactivo` |
| `matricula` | string | Identificador único (ver formatos) |
| `foto` | string | URL de foto de perfil (puede estar vacío) |

#### Cómo crear un usuario manualmente

1. **Firebase Auth** → **Users** → **Add user** → ingresa email y contraseña → copia el **UID**
2. **Firestore** → **usuarios** → **Add document** → pega el UID como Document ID → agrega los campos de la tabla

---

### Flujo de la aplicación

```
┌─────────┐     credenciales     ┌──────────────────┐
│  Login  │ ──────────────────►  │  Firebase Auth   │
└─────────┘                      └────────┬─────────┘
                                          │ UID
                                          ▼
                                 ┌──────────────────┐
                                 │    Firestore     │
                                 │  usuarios/{uid}  │
                                 └────────┬─────────┘
                                          │ datos + tipo
                                          ▼
                                 ┌──────────────────┐
                                 │     Perfil       │
                                 │  (estudiante /   │
                                 │    profesor)     │
                                 └────────┬─────────┘
                                          │ botón "Generar código"
                                          ▼
                                 ┌──────────────────┐
                                 │   Código QR      │
                                 │  cifrado AES     │
                                 │  (5 min / manual)│
                                 └──────────────────┘
```

En cada pantalla intermedia hay un botón **← Atrás** en el header para regresar a la pantalla anterior.

---

### Cómo funciona el código QR

El QR es **cifrado y dinámico**, generado bajo demanda por el usuario. No se crea automáticamente al abrir la pantalla.

#### Contenido cifrado del QR

Antes de codificarse en el QR, el payload se cifra con AES:

```json
{
  "matricula": "21-123-4567",
  "ts": 1716745200000
}
```

- `matricula` — valor estático del usuario obtenido de Firestore.
- `ts` — timestamp en milisegundos del momento en que se generó el código.

El resultado es un string AES opaco: quien escanee el QR sin la clave secreta no puede leer la matrícula.

#### ¿Por qué es seguro?

El lector del QR descifra el payload con la misma clave (`EXPO_PUBLIC_QR_SECRET`) y verifica que el timestamp no tenga más de 5 minutos de antigüedad. Esto garantiza que:

- Un QR capturado en pantalla **expira en máximo 5 minutos**.
- La matrícula **nunca viaja en texto plano** dentro del código QR.
- El usuario debe **generar un nuevo código manualmente** cada vez que el anterior expire.

#### Indicador visual

El contador cambia de color según el tiempo restante:

| Color | Tiempo restante |
|---|---|
| 🟢 Verde | Más de 2 minutos |
| 🟠 Naranja | Entre 1 y 2 minutos |
| 🔴 Rojo | Menos de 1 minuto |

---

### Detección de tipo de usuario

El tipo se detecta automáticamente al iniciar sesión, según el **formato de la matrícula** guardada en Firestore. No hay ningún campo `tipo` en la base de datos; la app lo deduce sola:

| Tipo | Formato | Ejemplo | Regex |
|---|---|---|---|
| Estudiante | `DD-DDD-DDDD` | `21-123-4567` | `^\d{2}-\d{3}-\d{4}$` |
| Profesor | `DD-DDDD-DD` | `20-4789-21` | `^\d{2}-\d{4}-\d{2}$` |

Donde `D` representa un dígito numérico. Si la matrícula no coincide con ningún formato, la app lanza un error de autenticación.

---

### Colores y tema visual

Los colores están basados en el logo institucional de Tlamati Access:

| Nombre | Hex | Uso |
|---|---|---|
| Navy | `#1a2f5e` | Fondo de botones, textos principales, header |
| Teal | `#2a9d8f` | Acentos, badges de estudiante, bordes activos |
| Teal Light | `#e8f5f3` | Fondos suaves, badge de estudiante |
| Navy Light | `#eef1f8` | Fondo de íconos en filas de info |
| Naranja | `#ff9800` | Badge de profesor |
| Naranja Light | `#fff3e0` | Fondo badge de profesor |
| Blanco | `#ffffff` | Fondo general de la app |
| Gris claro | `#f5f7fb` | Fondo de pantallas internas |

---

### Notas adicionales

- El import de `react-native-get-random-values` debe ser el **primero** en `codigoAcceso.tsx`, antes de cualquier import de `crypto-js`.
- El logo debe estar en `assets/logo.png` — sin él la pantalla de login lanzará un error.
- La foto de perfil acepta cualquier URL pública; si está vacía se muestra un avatar genérico.
- En producción se recomienda configurar las **reglas de seguridad de Firestore** para que cada usuario solo pueda leer su propio documento.
- El proyecto está configurado solo para orientación **portrait** (vertical).

---

## 11. Versiones lanzadas

| Versión   | Característica principal | Descripción técnica |
| --------- | ------------------------ | ------------------- |
| **3.1.0** | Arquitectura MVC y visualización de datos | Integración de Seed, Factory y vistas analíticas con gráficas de usuarios ingresados al plantel. |
| **3.6.0** | QR cifrado con expiración y generación manual | La matrícula se cifra con AES antes de codificarse en el QR. El código expira a los 5 minutos y el usuario debe generarlo explícitamente; no se crea de forma automática. |

---

## 12. Historial de versiones

| Versión   | Característica principal                  | Descripción técnica |
| --------- | ----------------------------------------- | ------------------- |
| **3.2.0** | Control de acceso basado en roles (RBAC)  | Desarrollo de CRUD dependientes del perfil de usuario e implementación de medidas contra inyección SQL/XSS. |
| **3.2.1** | Experiencia de usuario                    | Módulo unificado de vistas de errores HTTP estándar, mejorando la resiliencia visible. |
| **3.3.0** | Lectura y reportes avanzados              | Implementación de lectura física de códigos QR con hardware especializado y generación masiva de reportes PDF auditables. |
| **3.3.1** | Notificación e identidad digital          | Sistema avanzado de notificaciones en tiempo real entre usuarios y módulo OpenCode para análisis seguro de credenciales oficiales. |
| **3.4.0** | Quality Assurance (QA)                    | Desarrollo y ejecución de pruebas unitarias completas y suites de seguridad automatizadas. |
| **3.5.0** | Biometría integrada                       | Finalización e integración exitosa del motor de reconocimiento facial en el backend web. |
| **3.6.0** | QR cifrado con expiración y generación manual | Cifrado AES del payload (matrícula + timestamp), ventana de validez de 5 minutos, generación explícita por el usuario y flujo de renovación tras expiración. |

---

## 13. Licencia

**Aviso legal de propiedad intelectual**

EL CÓDIGO FUENTE, DOCUMENTACIÓN Y ARTEFACTOS CONTENIDOS EN ESTE REPOSITORIO SON MATERIAL PROTEGIDO POR DERECHO PRIVATIVO.

Este proyecto opera bajo una licencia propietaria exclusiva. El uso de esta plataforma no está sujeto a ninguna licencia de código abierto (MIT, GPL, Apache, etc.). Cualquier intento de modificar, reproducir, vender, ceder o publicar cualquier parte del código fuente o documentación sin la autorización expresa y por escrito de AETHR Dynamics y Studio Nails My constituye una violación directa al presente convenio y está sujeto a acciones legales civiles y penales.