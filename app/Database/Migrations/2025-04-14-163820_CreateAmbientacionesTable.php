<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAmbientacionesTable extends Migration
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
            'id_entidad' => [
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
            'estado' => [
                'type'       => 'ENUM',
                'constraint' => ['borrador','activo','baneado','borrado'],
                'default'    => 'borrador',
                'null'       => false,
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

        // Foreign key hacia la tabla 'entidades'
        $this->forge->addForeignKey('id_entidad', 'entidades', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('ambientaciones');
    }

    public function down()
    {
        // Primero se retira la FK antes de borrar la tabla (buena práctica)
        $this->forge->dropForeignKey('ambientaciones', 'ambientaciones_id_entidad_foreign');
        $this->forge->dropTable('ambientaciones');
    }
}
