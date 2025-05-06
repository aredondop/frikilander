<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class EntidadModel
 * Modelo para gestionar entidades.
 */
class EntidadModel extends Model
{
    /**
     * @var string Nombre de la tabla.
     */
    protected $table = 'entidades';

    /**
     * @var string Clave primaria de la tabla.
     */
    protected $primaryKey = 'id';

    /**
     * @var array Campos permitidos para inserción/actualización.
     */
    protected $allowedFields = [
        'id_propietario', 'nombre', 'descripcion', 'imagen_principal', 'url', 'estado', 
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

    /**
     * Obtiene todas las entidades activas.
     *
     * @return array
     */
    public function getActiveTiendas()
    {
        return $this->where('estado', 'activo')->findAll();
    }
}
