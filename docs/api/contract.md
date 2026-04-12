# 📖 Contrato de API - EcoLogistics

Este documento define la interfaz de comunicación oficial para los servicios de logística sostenible.

## 1. Listado de Endpoints

| Método | Ruta | Descripción | Código HTTP |
| :--- | :--- | :--- | :--- |
| `GET` | `/shipments` | Obtiene todos los envíos activos | 200, 401 |
| `POST` | `/shipments` | Crea un nuevo envío sostenible | 201, 400, 401 |
| `GET` | `/shipments/{id}` | Detalle de un envío específico | 200, 404 |
| `DELETE` | `/shipments/{id}` | Cancela un envío pendiente | 204, 403, 404 |

---

## 2. Definición de Operaciones

### 📦 Crear Envío (`POST /shipments`)
Registra un nuevo paquete en la red de transporte ecológico.

**Ejemplo de Request (Lo que envía el cliente):**
```json
{
  "origin": "Madrid, ES",
  "destination": "Barcelona, ES",
  "weight": 10.5,
  "eco_friendly": true,
  "service_type": "express"
}