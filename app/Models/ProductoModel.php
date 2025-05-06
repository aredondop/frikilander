<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class ProductoModel
 * Modelo para gestionar productos.
 */
class ProductoModel extends Model
{
    /**
     * @var string Nombre de la tabla.
     */
    protected $table = 'productos';

    /**
     * @var string Clave primaria de la tabla.
     */
    protected $primaryKey = 'id';

    /**
     * @var array Campos permitidos para inserción/actualización.
     */
    protected $allowedFields = [
        'id_entidad', 'id_categoria', 'id_usuario', 'titulo', 'slug', 'metadescripcion',
        'descripcion_corta', 'descripcion_larga', 'numero_serie', 'numero_producto', 'ean',
        'imagen', 'precio_sin_impuestos', 'impuesto_1', 'impuesto_2',
        'descuento_valor', 'descuento_es_porcentaje', 'descuento_desde', 'descuento_hasta',
        'stock', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @var bool Usa timestamps automáticos.
     */
    protected $useTimestamps = true;

    /**
     * @var bool Usa borrado lógico.
     */
    protected $useSoftDeletes = true;
}
