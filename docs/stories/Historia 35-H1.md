# Historia 35-H1 - Acceder con Matrícula Olvidada

## Descripción

Como Estudiante,
Quiero que el sistema me permita acceder al plantel educativo si olvido mi credencial y proporciono mi matrícula.
Para poder ingresar al plantel en caso de olvido de mi credencial.

---

## Story Points

8

---

## Criterios de aceptación

- [ ] Se implementa un flujo para permitir la entrada a un usuario que ha olvidado su credencial, proporcionando su matrícula.
- [ ] El sistema verifica si la matrícula existe en la base de datos.
- [ ] Si la matrícula es válida, se muestra la fotografía del usuario con su información.
- [ ] El personal de seguridad verifica si la fotografía concuerda con el usuario que intenta acceder.
- [ ] Si la verificación es exitosa, se presiona el botón "Permitir" y se permite al usuario ingresar.
- [ ] Se guarda un registro como visitante en este caso especial, indicando el motivo del acceso (El estudiante-trabajador olvido su credencial. Su matricula: xxx-xxxx-xxx).
- [ ] Para la opción de INE, se genera un QR con los datos del usuario.

---

## Dependencias

- Ninguna

---

## Riesgos

- Necesidad de implementar lógica para comparar imágenes y verificar la identidad.

---
