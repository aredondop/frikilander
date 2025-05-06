<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePartidasTable extends Migration
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
            'id_ambientacion' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => false,
            ],
            'descripcion' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'fecha_inicio' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'estado' => [
                'type'       => 'ENUM',
                'constraint' => ['borrador','activa','cerrada','cancelada'],
                'default'    => 'borrador',
                'null'       => false,
            ],
            'max_jugadores' => [
                'type'       => 'INT',
                'constraint' => 4,
                'null'       => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'deleted_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');

        // FK a la tabla 'ambientaciones'
        $this->forge->addForeignKey('id_ambientacion', 'ambientaciones', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('partidas');
    }

    public function down()
    {
        $this->forge->dropForeignKey('partidas', 'partidas_id_ambientacion_foreign');
        $this->forge->dropTable('partidas');
    }
}
