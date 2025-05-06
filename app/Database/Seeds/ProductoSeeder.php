<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $productoModel = new \App\Models\ProductoModel();

        $productos = [];
        for ($i = 1; $i <= 40; $i++) {
            $productos[] = [
                'id_entidad'         => 1,
                'id_categoria'       => null,
                'id_usuario'         => 1,
                'titulo'             => 'Producto Pop #' . $i,
                'slug'               => 'producto-pop-' . $i,
                'metadescripcion'    => 'Producto de cultura pop #' . $i,
                'descripcion_corta'  => 'Descripción breve del producto pop #' . $i,
                'descripcion_larga'  => 'Descripción larga y detallada del producto pop #' . $i,
                'numero_serie'       => 'SN' . $i,
                'numero_producto'    => 'NP' . $i,
                'ean'                => 'EAN' . $i,
                'imagen'             => null,
                'precio_sin_impuestos' => rand(10, 100),
                'impuesto_1'         => 21.00,
                'impuesto_2'         => 0.00,
                'stock'             => rand(10, 100),
            ];
        }

        $productoModel->insertBatch($productos);
    }
}
