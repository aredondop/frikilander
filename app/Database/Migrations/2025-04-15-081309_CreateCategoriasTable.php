<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoriasTable extends Migration
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
                'null'       => false,
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
        
        // Para que no se repitan nombres dentro de la misma entidad:
        $this->forge->addUniqueKey(['id_entidad', 'nombre']);
        
        // Crea la tabla
        $this->forge->createTable('categorias');

        // Añadir la foreign key
        $this->forge->addForeignKey('id_entidad', 'entidades', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        // Si creaste la FK, debes quitarla antes de dropear la tabla:
        $this->forge->dropForeignKey('categorias', 'categorias_id_entidad_foreign');
        $this->forge->dropTable('categorias');
    }
}
