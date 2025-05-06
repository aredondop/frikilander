<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EntidadUsuarioSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id_usuario' => 1,  // Asegúrate de que el usuario demo tenga ID 1
            'id_entidad' => 1,  // Asegúrate de que la entidad demo tenga ID 1
            'permiso'    => 'administrador',
        ];

        $this->db->table('entidad_usuario')->insert($data);
    }
}
