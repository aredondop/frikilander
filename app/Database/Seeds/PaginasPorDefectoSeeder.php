<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaginasPorDefectoSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        $paginas = [
            [
                'titulo'          => 'Dónde estamos',
                'metadescripcion' => 'Información de localización de la entidad demo',
                'url'             => 'donde-estamos',
                'texto'           => 'Aquí puedes encontrarnos físicamente o en nuestras redes.',
            ],
            [
                'titulo'          => 'Quiénes somos',
                'metadescripcion' => 'Conoce al equipo detrás de la entidad demo',
                'url'             => 'quienes-somos',
                'texto'           => 'Somos un grupo apasionado por la cultura pop y los juegos de rol.',
            ],
            [
                'titulo'          => 'Contacto',
                'metadescripcion' => 'Contáctanos para más información',
                'url'             => 'contacto',
                'texto'           => 'Escríbenos a contacto@demo.com o llámanos al 123-456-789.',
            ],
        ];

        foreach ($paginas as $pagina) {
            $paginaExistente = $db->table('paginas')
                ->where('id_entidad', 1)
                ->where('url', $pagina['url'])
                ->get()
                ->getRow();

            if (!$paginaExistente) {
                $data = [
                    'id_entidad'      => 1,
                    'id_usuario'      => 1,
                    'titulo'          => $pagina['titulo'],
                    'metadescripcion' => $pagina['metadescripcion'],
                    'url'             => $pagina['url'],
                    'texto'           => $pagina['texto'],
                    'estado'          => 'publicado',
                    'created_at'      => date('Y-m-d H:i:s'),
                    'updated_at'      => date('Y-m-d H:i:s'),
                ];

                $db->table('paginas')->insert($data);
                echo "✅ Página '{$pagina['titulo']}' creada.\n";
            } else {
                echo "⚠️  La página '{$pagina['titulo']}' ya existe, no se creó de nuevo.\n";
            }
        }
    }
}
