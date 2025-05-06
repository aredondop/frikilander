<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class EventoModel
 * Modelo para gestionar eventos.
 */
class EventoModel extends Model
{
    /**
     * @var string Nombre de la tabla.
     */
    protected $table = 'eventos';

    /**
     * @var string Clave primaria de la tabla.
     */
    protected $primaryKey = 'id';

    /**
     * @var array Campos permitidos para inserción/actualización.
     */
    protected $allowedFields = [
        'id_entidad', 'nombre', 'descripcion', 'fecha_inicio', 'estado',
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
