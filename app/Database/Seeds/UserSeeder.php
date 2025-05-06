<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'   => 'demo',
            'email'      => 'demo@example.com',
            'nombre_completo' => 'Usuario Demo',
            'apellidos'  => 'Demo',
            'password'   => password_hash('demo', PASSWORD_DEFAULT),
            'avatar'     => null,
            'is_admin'   => 1
        ];

        $this->db->table('users')->insert($data);
    }
}
