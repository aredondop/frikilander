<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePersonajesTable extends Migration
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
            'id_partida' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nombre' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => false,
            ],
            'biografia' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'atributos' => [
                'type' => 'TEXT', // Podría usar JSON , no lo tengo claro aún
                'null' => true,
            ],
            'estado' => [
                'type'       => 'ENUM',
                'constraint' => ['disponible','ocupado','inactivo'],
                'default'    => 'disponible',
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
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ];

        $this->forge->addField($fields);
        $this->forge->addPrimaryKey('id');

        // FK a la tabla 'partidas'
        $this->forge->addForeignKey('id_partida', 'partidas', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('personajes');
    }

    public function down()
    {
        $this->forge->dropForeignKey('personajes', 'personajes_id_partida_foreign');
        $this->forge->dropTable('personajes');
    }
}
