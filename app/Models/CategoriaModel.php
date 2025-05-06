<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class CategoriaModel
 * Modelo para gestionar las categorías.
 */
class CategoriaModel extends Model
{
    /**
     * @var string Nombre de la tabla.
     */
    protected $table = 'categorias';

    /**
     * @var string Clave primaria de la tabla.
     */
    protected $primaryKey = 'id';

    /**
     * @var array Campos permitidos para inserción/actualización.
     */
    protected $allowedFields = [
        'id_entidad', 'nombre', 'descripcion', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @var bool Usa timestamps automáticos.
     */
    protected $useTimestamps = true;

    /**
     * @var bool Usa soft deletes.
     */
    protected $useSoftDeletes = true;
}
