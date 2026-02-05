# Software de Gestión de Acceso con Validación QR para la Comunidad UACM
# Sistema de Control de Acceso Universitario mediante QR - UACM

[![Laravel v11.40](https://img.shields.io/badge/Laravel-11.40-FF2D20?style=flat-square&logo=laravel)](https://laravel.com/)
[![PHP v8.x](https://img.shields.io/badge/PHP->=8.1-777BB4?style=flat-square&logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=flat-square&logo=mysql)](https://www.mysql.com/)

Este proyecto consiste en el desarrollo de una aplicación web integral para la gestión de acceso a las instalaciones de la Universidad Autónoma de la Ciudad de México (UACM), implementado utilizando el Framework Laravel (versión 11.40) y una base de datos MySQL. El sistema facilita el control de entrada y salida de la comunidad universitaria y visitantes mediante la lectura de códigos QR y el registro detallado de la información relevante.

## Tabla de Contenidos

- [1. Introducción](#1-introducción)
- [2. Funcionalidades Principales](#2-funcionalidades-principales)
- [3. Arquitectura y Tecnologías](#3-arquitectura-y-tecnologías)
- [4. Documentación](#4-documentación)
- [5. Instalación](#5-instalación)
- [6. Contribuciones y Desarrollo](#6-contribuciones-y-desarrollo)
- [7. Desarrollo Futuro y Propiedad Intelectual](#7-desarrollo-futuro-y-propiedad-intelectual)
- [8. Licencia](#8-licencia)

## 1. Introducción

Este sistema de control de acceso fue desarrollado como proyecto académico dentro del programa de Ingeniería en Software de la Universidad Autónoma de la Ciudad de México (UACM). Su objetivo principal es modernizar y asegurar el proceso de acceso a las instalaciones universitarias, proporcionando herramientas eficientes para el personal de vigilancia y una experiencia fluida para la comunidad universitaria y visitantes.

El desarrollo de este proyecto se ha guiado por estándares de documentación de software reconocidos, incluyendo:

* **IEEE 830-1998:** Especificación de Requisitos de Software.
* **IEEE 12207:2017-11:** Procesos del Ciclo de Vida del Software.
* **IEEE 1016-2009:** Definición de la Arquitectura del Software.

## 2. Funcionalidades Principales

* **Autenticación Segura:** Acceso al sistema para el personal de vigilancia mediante credenciales (usuario y contraseña).
* **Validación Eficiente con QR:** Lectura y validación de códigos QR presentes en las credenciales de la comunidad universitaria.
* **Registro Detallado de Acceso:** Almacenamiento de información relevante al ingreso, como fecha, hora y carrera (para estudiantes).
* **Identificación Visual:** Presentación de la fotografía y asignación del usuario validado.
* **Gestión de Visitantes:** Registro de visitantes mediante captura de identificación oficial (almacenada como fotografía), nombre completo y motivo de visita.
* **Generación de Pases Temporales:** Creación de pases temporales con códigos QR de duración limitada (4 horas) para visitantes, con reasignación automática al vencimiento.
* **Impresión de Pases:** Generación de comprobantes de acceso para visitantes con código QR y hora de entrada.

## 3. Arquitectura y Tecnologías

* **Framework:** [Laravel](https://laravel.com/) v11.40 (PHP Framework para desarrollo web robusto y escalable)
* **Lenguaje de Programación:** PHP (versión >= 8.1)
* **Base de Datos:** [MySQL](https://www.mysql.com/) (Sistema de gestión de bases de datos relacional)

## 4. Documentación

La documentación del proyecto se ha realizado siguiendo los estándares:

* **Especificación de Requisitos de Software:** Basado en IEEE 830-1998.
* **Procesos del Ciclo de Vida del Software:** Basado en IEEE 12207:2017-11.
* **Definición de la Arquitectura del Software:** Basado en IEEE 1016-2009.
* **Directorio de documentación:** La documentación detallada del proyecto se encuentra en el directorio `/docs`.

## 5. Instalación

1.  Clonar el repositorio.
2.  Configurar las variables de entorno (archivo `.env`).
3.  Ejecutar las migraciones de la base de datos (`php artisan migrate`).
4.  Generar las claves de la aplicación (`php artisan key:generate`).

## 6. Contribuciones y Desarrollo

Este proyecto ha sido desarrollado en diferentes etapas con la colaboración de los siguientes miembros:

**Versión 4.00 (Entregada el 27 de noviembre de 2024):**

* **Desarrollador y Gerente de Proyecto:** Rodríguez Cervantes Kevin Manzur
* **Desarrolladores:** Valadez Carmona Guadalupe Yamileth, Cruz Ovando Cristela Adelaida, Rodríguez Sánchez Diana Fabiola, Romero Cervantes Fátima Daniela

En esta etapa inicial, Rodríguez Cervantes Kevin Manzur actuó como desarrollador principal y gerente de proyecto, asignando tareas y supervisando el desarrollo de las funcionalidades base del sistema.

**Versión 6.50 (Entrega planificada para el 19 de mayo de 2025):**

* **Desarrollador y Gerente de Proyecto:** Rodríguez Cervantes Kevin Manzur
* **Diseñador de interfaces:** Valadez Carmona Guadalupe Yamileth
* **Diseñador de base de datos:** Cruz Ovando Cristela Adelaida

## 7. Desarrollo Futuro y Propiedad Intelectual

Este proyecto ha sido desarrollado en diferentes etapas con la colaboración de los siguientes miembros:

**Versión 4.00 (Entregada el 27 de noviembre de 2024):**

* **Desarrollador y Gerente de Proyecto:** Rodríguez Cervantes Kevin Manzur
* **Desarrolladores:** Valadez Carmona Guadalupe Yamileth, Cruz Ovando Cristela Adelaida, Rodríguez Sánchez Diana Fabiola, Romero Cervantes Fátima Daniela

**Versión 6.50 (Entrega planificada para el 19 de mayo de 2025):**

* **Desarrollador y Gerente de Proyecto:** Rodríguez Cervantes Kevin Manzur
* **Diseñador de interfaces:** Valadez Carmona Guadalupe Yamileth
* **Diseñador de base de datos:** Cruz Ovando Cristela Adelaida

Se reconoce la valiosa contribución de todos los colaboradores mencionados en las versiones en las que participaron activamente. Los derechos de autor de cada versión se corresponden con los colaboradores involucrados en su desarrollo.

**Restricciones Posteriores a la Entrega (Versión 6.50):**

Se establece que, una vez superada la fecha de entrega prevista para la versión 6.50 (19 de mayo de 2025), la continuidad del proyecto en un entorno académico, comercial o como base para una tesis requerirá una revisión y acuerdo explícito sobre los derechos de autor y la propiedad intelectual entre todos los colaboradores de la versión 6.50. Cualquier uso posterior sin este acuerdo estará restringido.

**Desarrollos Futuros:**

Dado que el proyecto se originó como un trabajo académico colaborativo, la definición precisa de los derechos de autor y la propiedad intelectual para desarrollos futuros requiere una consulta legal exhaustiva y la revisión detallada de las políticas de propiedad intelectual de la Universidad Autónoma de la Ciudad de México (UACM). Se buscará esta asesoría para determinar los términos y condiciones bajo los cuales se podría continuar el proyecto más allá de su entrega académica.

**Importante:** Los colaboradores de versiones anteriores solo poseen derechos de autor sobre las versiones en las que contribuyeron directamente. Las versiones posteriores a su participación estarán sujetas a los acuerdos de derechos de autor que se definan para esas nuevas etapas de desarrollo.

## 8. Licencia

**Licencia de Propiedad Exclusiva (Trabajo Académico en Desarrollo):**

Este proyecto, en su estado actual de desarrollo (versión 6.50) y como trabajo académico para la UACM, se encuentra bajo una **licencia de propiedad exclusiva** de los colaboradores de esta versión (Rodríguez Cervantes Kevin Manzur, Valadez Carmona Guadalupe Yamileth, Cruz Ovando Cristela Adelaida).

**Términos de la Licencia:**

* **Prohibición de Manipulación y Reproducción:** Queda estrictamente prohibida cualquier manipulación, modificación o reproducción total o parcial del proyecto sin el consentimiento explícito y por escrito de todos los colaboradores de la versión 6.50.
* **Prohibición de Uso Comercial:** Se prohíbe explícitamente la utilización del proyecto o de cualquier parte del mismo para fines comerciales de cualquier índole.
* **Otras Acciones Prohibidas:** Se restringe cualquier otra acción que pueda infringir los derechos de propiedad intelectual de los colaboradores de la versión 6.50.
* **Integridad de la Licencia:** Ninguno de los colaboradores está autorizado a modificar o revocar los términos de esta licencia sin el consentimiento unánime de todos los colaboradores de la versión 6.50.

**Versiones Anteriores:**

Las versiones anteriores del proyecto (específicamente la versión 4.00) están sujetas a los acuerdos de colaboración y propiedad intelectual definidos en su momento por los colaboradores de dicha versión (Rodríguez Cervantes Kevin Manzur, Valadez Carmona Guadalupe Yamileth, Cruz Ovando Cristela Adelaida, Rodríguez Sánchez Diana Fabiola, Romero Cervantes Fátima Daniela).

**Nota Importante:** Dado que la versión 6.50 es un trabajo académico en desarrollo y la definición precisa de los derechos de autor para desarrollos futuros está pendiente de asesoramiento legal y la revisión de las políticas de la UACM, esta licencia se considera provisional y podría ser modificada o complementada en el futuro una vez que se obtenga claridad sobre la propiedad intelectual del proyecto a largo plazo.

---


