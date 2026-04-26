# Tlamati Access
# Sistema Inteligente de Gestión y Control de Acceso Institucional para UACM

[![Laravel v13.00](https://img.shields.io/badge/Laravel-11.40-FF2D20?style=flat-square&logo=laravel)](https://laravel.com/)
[![PHP v8.x](https://img.shields.io/badge/PHP->=8.1-777BB4?style=flat-square&logo=php)](https://www.php.net/)
[![PostgreSQL](https://www.postgresql.org/media/img/about/press/elephant.png)](https://www.postgresql.org/)

Implementación en: Universidad Autónoma de la Ciudad de México (UACM) | Plantel Cuautepec GAM 1

## Tabla de Contenidos

- [1. Introducción: Elevando el Estándar de Seguridad Institucional](#1-introducción)
- [2. Propósito del Proyecto](#2-funcionalidades-principales)
- [3. Colaboración Corporativa](#3-arquitectura-y-tecnologías)
- [4. Stack Tecnológico](#4-stack-tecnológico)
- [5. Evolución del Producto](#5-evolución-del-producto)
- [6. Características Mejoradas del Ciclo III](#6-contribuciones-y-desarrollo)
- [7. Desarrollo Futuro y Propiedad Intelectual](#7-desarrollo-futuro-y-propiedad-intelectual)
- [8. Licencia](#8-licencia)

## 1. Introducción: Elevando el Estándar de Seguridad Institucional

Tlamati Access es una plataforma integral y avanzada diseñada para modernizar completamente los protocolos de ingreso a instituciones educativas críticas. En un entorno donde la seguridad física está constantemente amenazada por métodos de identificación vulnerables (fotocopias, credenciales físicas clonadas), nuestro sistema eleva la gestión del acceso a estándares criptográficos y biométricos de vanguardia.

Nuestro objetivo principal es resolver una brecha crítica: la fricción entre la alta demanda de flujo de personas en las entradas y la necesidad absoluta de garantizar una validación infalsificable para el personal de seguridad. Tlamati Access garantiza eficiencia operativa sin sacrificar un nivel superior de seguridad, protegiendo así al plantel, su comunidad y sus activos.

## 2. Propósito del Proyecto

El proyecto está diseñado para transicionar los procesos manuales de control de acceso a un ecosistema digital inteligente que ofrece:

1. Seguridad Cero Confianza: Cada interacción es tratada como una potencial amenaza, requiriendo múltiples capas de validación.
2. Escalabilidad: La arquitectura modular permite integrar nuevas funcionalidades (biometría, nuevos tipos de credenciales) sin detener las operaciones existentes.
3. Trazabilidad Forense: Registro completo e inmutable de quién, cuándo y por qué accedió a las instalaciones, esencial para auditorías de seguridad y gestión de crisis.

## 3. Colaboración Corporativa

Este proyecto es el resultado de una alianza tecnológica estratégica entre dos corporaciones líderes en desarrollo de software: **AETHR Dynamics** y **Studio Nails My**. La unión de estas fuerzas especializadas ha permitido combinar la visión gerencial y la experiencia en User Experience con un desarrollo técnico robusto y avanzado, garantizando un producto que no solo es seguro, sino también usable y adaptado al entorno académico mexicano.

## 4. Stack Tecnológico

Tlamati Access fue desarrollado utilizando un stack tecnológico moderno y de alto rendimiento, asegurando escalabilidad y baja deuda técnica:

* Backend: Laravel v13 (PHP Framework) - Para la lógica de negocio central y gestión de APIs.
* Database: PostgreSQL (PgSQL) - Base de datos robusta, confiable y excelente para el manejo de grandes volúmenes de datos transaccionales.
* Análisis Avanzado: Python - Utilizado específicamente para los módulos de análisis biométrico y detección de patrones en documentación oficial (OpenCV).

## 5. Evolución del Producto

Tlamati Access no fue un desarrollo único; es el resultado de una evolución planificada en múltiples fases, demostrando su adaptabilidad y capacidad de mejora continua.

1. **Fase I** - Fundacional: Se estableció la base operativa con un sistema inicial basado en códigos QR dinámicos.
2. **Fase II** - Refinamiento: El sistema evolucionó hacia plataformas web robustas, mejorando la gestión de roles y el control de acceso.
3. **Ciclo III** - Tlamati Access (El Sistema Actual): Esta fase representa un salto cuántico en seguridad. Integramos tecnologías avanzadas para crear una solución de Doble Autenticación, haciendo que la validación de identidad sea prácticamente infalsificable.

## 6. Características Mejoradas del Ciclo III

Las mejoras introducidas en la última etapa representan el valor principal para la UACM:

* **Autenticación Criptográfica Dinámica:** Implementación de códigos QR generados al momento y con uso único, eliminando cualquier riesgo asociado a credenciales estáticas o clonables.
* **Reconocimiento Facial (Biometría):** Módulo avanzado que actúa como una capa de doble autenticación para agilizar el ingreso sin comprometer la seguridad en caso de fallas del dispositivo móvil.
* **Validación Documental IA:** Uso de análisis avanzados para detectar inconsistencias o falsificaciones en identificaciones oficiales mediante algoritmos entrenados.

## 7. Arquitectura y Control de Versiones (DevOps Focus)


## 8. Instalación

# Clonar repositorio principal
git clone <URL_DEL_REPOSITORIO> tlamati-access
cd tlamati-access

# Instalar dependencias PHP y Node.js
composer install --no-dev 
npm install

# Migrar la base de datos (se debe usar PgSQL)
php artisan migrate

# Ejecutar seeders y factories para poblar datos iniciales
php artisan db:seed 

### Licencia: PROPIETARIA EXCLUSIVA

**AVISO LEGAL DE PROPIEDAD INTELECTUAL (LICENSE AGREEMENT)**

EL CÓDIGO FUENTE, DOCUMENTACIÓN Y ARTEFACTOS CONTENIDOS EN ESTE REPOSITORIO SON MATERIAL PROTEGIDO POR DERECHO PRIVATIVO.
Este proyecto opera bajo una licencia PROPIETARIA EXCLUSIVA. El uso de esta plataforma no está sujeto a ninguna licencia de código abierto (MIT, GPL, Apache, etc.). Cualquier intento de modificar, reproducir, vender, ceder o publicar cualquier parte del código fuente o documentación sin la autorización expresa y por escrito de AETHR Dynamics y Studio Nails My, constituye una violación directa al presente Convenio y está sujeto a acciones legales civiles y penales.
---


