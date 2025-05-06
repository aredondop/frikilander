<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSolicitudesTable extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_personaje' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'id_usuario' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'mensaje' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'estado' => [
                'type'       => 'ENUM',
                'constraint' => ['pendiente','aceptada','rechazada'],
                'default'    => 'pendiente',
                'null'       => false,
            ],
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
        $this->forge->addPrimaryKey('id');

        // FKs hacia 'personajes' y 'users'
        $this->forge->addForeignKey('id_personaje', 'personajes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_usuario', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('solicitudes');
    }

    public function down()
    {
        $this->forge->dropForeignKey('solicitudes', 'solicitudes_id_personaje_foreign');
        $this->forge->dropForeignKey('solicitudes', 'solicitudes_id_usuario_foreign');
        $this->forge->dropTable('solicitudes');
    }
}
