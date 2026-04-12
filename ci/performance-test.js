import http from 'k6/http';
import { check, sleep } from 'k6';

export const options = {
  thresholds: {
    // 95% de las peticiones deben ser menores a 1.5s (Google a veces tarda un poco más)
    http_req_duration: ['p(95)<1500'], 
    // Tasa de error menor al 1%
    http_req_failed: ['rate<0.01'],   
  },
  stages: [
    { duration: '30s', target: 20 }, // 20 usuarios virtuales durante 30 segundos
  ],
};

export default function () {
  // CAMBIAMOS A GOOGLE: Para que el test reciba un "200 OK" real
  const res = http.get('https://www.google.com');
  
  check(res, { 
    'status is 200': (r) => r.status === 200 
  });
  
  sleep(1);
}

export function handleSummary(data) {
  return {
    'summary.json': JSON.stringify(data),
    stdout: JSON.stringify(data, null, 2),
  };
}
