<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaginasTable extends Migration
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
            'id_usuario' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'titulo' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => false,
            ],
            'metadescripcion' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => false,
            ],
            'texto' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'estado' => [
                'type'       => 'ENUM',
                'constraint' => ['borrador', 'publicado'],
                'default'    => 'borrador',
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

        // Definimos la estructura
        $this->forge->addField($fields);
        
        // Clave primaria
        $this->forge->addPrimaryKey('id');
        
        // Apaño para que sea unica por entidad
        $this->forge->addUniqueKey(['id_entidad', 'url']);
        
  
        $this->forge->createTable('paginas');
        
        $this->forge->addForeignKey('id_entidad', 'entidades', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_usuario', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropTable('paginas');
    }
}
