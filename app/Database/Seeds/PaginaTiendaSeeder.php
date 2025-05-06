<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaginaTiendaSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Verificamos si ya existe la tienda para la entidad 1
        $paginaExistente = $db->table('paginas')
            ->where('id_entidad', 1)
            ->where('url', 'tienda')
            ->get()
            ->getRow();

        if (!$paginaExistente) {
            $data = [
                'id_entidad'      => 1,
                'id_usuario'      => 1,
                'titulo'          => 'Tienda',
                'metadescripcion' => 'Tienda online de la entidad demo',
                'url'             => 'tienda',
                'texto'           => 'Bienvenido a nuestra tienda online',
                'estado'          => 'publicado',
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ];

            $this->db->table('paginas')->insert($data);

            echo "✅ Página de tienda creada.\n";
        } else {
            echo "⚠️  La página de tienda ya existe, no se creó de nuevo.\n";
        }
    }
}
