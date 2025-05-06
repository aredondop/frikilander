<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EntidadSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nombre'            => 'Entidad Demo',
            'descripcion'       => 'Entidad de prueba para desarrollo',
            'imagen_principal'  => null,
            'url'               => 'entidad-demo',
            'estado'            => 'activo',
        ];

        $this->db->table('entidades')->insert($data);
    }
}
