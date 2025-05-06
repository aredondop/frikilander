<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class AmbientacionModel
 * Modelo para gestionar las ambientaciones.
 */
class AmbientacionModel extends Model
{
    /**
     * @var string Nombre de la tabla.
     */
    protected $table = 'ambientaciones';

    /**
     * @var string Clave primaria de la tabla.
     */
    protected $primaryKey = 'id';

    /**
     * @var array Campos permitidos para inserción/actualización.
     */
    protected $allowedFields = [
        'id_entidad', 'nombre', 'descripcion', 'estado',
        'created_at', 'updated_at', 'deleted_at'
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
