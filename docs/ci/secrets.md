# Gestión de Secretos y Política de Rotación

Este documento detalla los secretos almacenados en **GitHub Secrets** y las directrices para su mantenimiento.

## Lista de Secretos (GitHub Actions)

| Secreto | Descripción | Servicio Relacionado |
| :--- | :--- | :--- |
| `SONAR_TOKEN` | Token de autenticación para el análisis de código. | SonarCloud |
| `DOCKER_REGISTRY_USER` | Usuario para el registro de imágenes Docker. | Docker Hub / GHCR |
| `DOCKER_REGISTRY_PASS` | Password o PAT para publicar imágenes. | Docker Hub / GHCR |
| `ZAP_API_KEY` | Clave para interactuar con la API de OWASP ZAP. | ZAP Security |
| `K6_API_KEY` | Token para subir reportes de carga a la nube. | Grafana k6 Cloud |
| `STAGING_SSH_KEY` | Clave privada para despliegue automático. | Servidor Staging |

## Política de Rotación y Auditoría
1. **Frecuencia:** Los secretos deben rotarse cada **90 días**.
2. **Revocación:** En caso de baja de un miembro del equipo con acceso a los secretos, se procederá a la rotación inmediata.
3. **Mínimo Privilegio:** Los tokens deben crearse con los permisos mínimos necesarios (ej. `read/write` solo para repositorios específicos).
4. **Almacenamiento:** Solo se permiten secretos en la bóveda cifrada de GitHub; prohibido el uso de archivos `.env` en el repositorio.