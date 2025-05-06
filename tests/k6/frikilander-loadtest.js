import http from 'k6/http';
import { check, sleep } from 'k6';

export let options = {
    stages: [
        { duration: '1m', target: 10 },
        { duration: '3m', target: 30 },
        { duration: '2m', target: 50 }, 
        { duration: '1m', target: 10 },
    ],
};

export default function () {
    let res = http.get('http://localhost:8080');
    check(res, {
        'inicio status 200': (r) => r.status === 200,
        'inicio <1s': (r) => r.timings.duration < 1000,
    });

    http.get('http://localhost:8080/tiendas');
    http.get('http://localhost:8080/eventos');
    http.get('http://localhost:8080/ambientaciones');
    http.get('http://localhost:8080/productos');

    sleep(1);
}
