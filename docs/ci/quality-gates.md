# Definición de Quality Gates - EcoLogistics

Este documento establece los umbrales de calidad obligatorios para el pipeline de CI/CD.

## SonarCloud (Análisis Estático)
* **Cobertura de Código:** Mínimo **80%**.
* **Critical/Blocker Issues:** 0 (Bloqueo inmediato de Pull Requests).
* **Duplicación de Código:** Máximo 3%.

## DAST - OWASP ZAP (Seguridad)
* **Vulnerabilidades Critical/High:** Bloqueo de Merge.
* **Mitigación:** Solo se permiten excepciones si están documentadas en el registro de seguridad.

## Performance - k6 (Rendimiento)
* **Latencia:** 95% de las peticiones deben ser **< 500ms**.
* **Tasa de Error:** Menor al **1%**.
* **Acción:** Warning en PRs; Bloqueo total en despliegue a Staging.