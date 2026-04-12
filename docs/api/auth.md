# 🔐 Especificación de Autenticación

La API de EcoLogistics utiliza **JSON Web Tokens (JWT)** para garantizar la seguridad en todas las operaciones protegidas.

## Esquema de Autenticación
- **Tipo:** Bearer Authentication
- **Formato:** JWT (RFC 7519)

## Flujo de Acceso
1. **Obtención del Token:** El cliente debe realizar una petición POST a `/auth/login` con sus credenciales.
2. **Uso del Token:** Una vez obtenido el `access_token`, debe incluirse en la cabecera de cada petición HTTP.
3. **Expiración:** Los tokens tienen una validez de 1 hora. Tras este tiempo, el cliente debe re-autenticarse.

## Headers Requeridos
Todas las peticiones a endpoints privados deben incluir las siguientes cabeceras:

| Header | Valor | Ejemplo |
| :--- | :--- | :--- |
| `Authorization` | `Bearer <token>` | `Authorization: Bearer eyJhbGci...` |
| `Content-Type` | `application/json` | `Content-Type: application/json` |

## Códigos de Respuesta de Seguridad
- **401 Unauthorized:** El token no es válido, ha expirado o no se ha proporcionado.
- **403 Forbidden:** El token es válido pero el usuario no tiene permisos suficientes para ese recurso.