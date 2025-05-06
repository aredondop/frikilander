<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEntidadUsuarioTable extends Migration
{
    public function up()
    {
        $fields = [
            'id_usuario' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'id_entidad' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'permiso' => [
                'type'       => 'ENUM',
                'constraint' => ['administrador','gestor_tienda'],
                'default'    => 'administrador',
                'null'       => false,
            ],
            // Si deseas marcas de tiempo (opcional)
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];

        $this->forge->addField($fields);

        // Apaño para que sea única por entidad
        $this->forge->addKey(['id_usuario', 'id_entidad'], true); 

        // Creamos la tabla
        $this->forge->createTable('entidad_usuario');
    }

    public function down()
    {
        $this->forge->dropTable('entidad_usuario');
    }
}
