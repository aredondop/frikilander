<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductosTable extends Migration
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
            'id_categoria' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true, 
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
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'null'       => false,
            ],
            'metadescripcion' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'descripcion_corta' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'descripcion_larga' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'numero_serie' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'numero_producto' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'ean' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'imagen' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'precio_sin_impuestos' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
                'default'    => 0.00,
            ],
            'impuesto_1' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'null'       => true,
                'default'    => 0.00,
            ],
            'impuesto_2' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'null'       => true,
                'default'    => 0.00,
            ],
            'descuento_valor' => [
                'type'       => 'DECIMAL',
                'constraint' => '6,2',
                'null'       => true,
                'default'    => 0.00,
            ],
            'descuento_es_porcentaje' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'null'       => false,
                'default'    => 0,
                // 0 => fijo, 1 => porcentaje
            ],
            'descuento_desde' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'descuento_hasta' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'stock' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
                'default'    => 0,
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
        
        // Clave primaria
        $this->forge->addPrimaryKey('id');

        // Título único dentro de la misma entidad
        $this->forge->addUniqueKey(['id_entidad', 'titulo']);
        
        // Creamos la tabla
        $this->forge->createTable('productos');

        $this->forge->addForeignKey('id_entidad', 'entidades', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_categoria', 'categorias', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_usuario', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropForeignKey('productos', 'productos_id_entidad_foreign');
        $this->forge->dropForeignKey('productos', 'productos_id_categoria_foreign');
        $this->forge->dropForeignKey('productos', 'productos_id_usuario_foreign');
        
        $this->forge->dropTable('productos');
    }
}
