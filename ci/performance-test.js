import http from 'k6/http';
import { check, sleep } from 'k6';

export const options = {
  thresholds: {
    // Calidad: 95% de las peticiones < 500ms
    http_req_duration: ['p(95)<500'], 
    // Seguridad: Tasa de error < 1%
    http_req_failed: ['rate<0.01'],   
  },
  stages: [
    { duration: '30s', target: 20 }, // Prueba de humo: 20 usuarios virtuales
  ],
};

export default function () {
  const res = http.get('https://staging.ecologistics.com');
  check(res, { 'status is 200': (r) => r.status === 200 });
  sleep(1);
}

/**
 * Esta función es la que genera el archivo summary.json 
 * que tu workflow necesita para el reporte final.
 */
export function handleSummary(data) {
  return {
    'summary.json': JSON.stringify(data), // Crea el archivo para el artefacto
    stdout: JSON.stringify(data, null, 2), // Muestra el resumen en los logs de GitHub
  };
}