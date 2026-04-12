import http from 'k6/http';
import { check, sleep } from 'k6';

export const options = {
  thresholds: {
    // 95% de las peticiones < 500ms
    http_req_duration: ['p(95)<500'], 
    // Tasa de error < 1%
    http_req_failed: ['rate<0.01'],   
  },
  stages: [
    { duration: '30s', target: 20 }, // Humo: 20 usuarios por 30 segundos
  ],
};

export default function () {
  const res = http.get('https://staging.ecologistics.com');
  check(res, { 'status is 200': (r) => r.status === 200 });
  sleep(1);
}

// ESTO ES LO QUE ACABAS DE AÑADIR:
export function handleSummary(data) {
  return {
    'summary.json': JSON.stringify(data), // Esto genera el archivo para el artifact
    stdout: JSON.stringify(data, null, 2), // Esto muestra el resumen en la consola de GitHub
  };
}