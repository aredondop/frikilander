<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AmbientacionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_entidad'  => 1,  // Relacionado con Entidad Demo
            'nombre'      => 'Ambientación Demo',
            'descripcion' => 'Ambientación de prueba para partidas',
            'estado'      => 'activo',
        ];

        $this->db->table('ambientaciones')->insert($data);
    }
}
