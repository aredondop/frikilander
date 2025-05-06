<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class PartidaModel
 * Modelo para gestionar partidas.
 */
class PartidaModel extends Model
{
    /**
     * @var string Nombre de la tabla.
     */
    protected $table = 'partidas';

    /**
     * @var string Clave primaria de la tabla.
     */
    protected $primaryKey = 'id';

    /**
     * @var array Campos permitidos para inserción/actualización.
     */
    protected $allowedFields = [
        'id_ambientacion', 'nombre', 'descripcion', 'fecha_inicio', 'estado',
        'max_jugadores', 'created_at', 'updated_at', 'deleted_at'
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
