<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class PaginaModel
 * Modelo para gestionar páginas.
 */
class PaginaModel extends Model
{
    /**
     * @var string Nombre de la tabla.
     */
    protected $table = 'paginas';

    /**
     * @var string Clave primaria de la tabla.
     */
    protected $primaryKey = 'id';

    /**
     * @var array Campos permitidos para inserción/actualización.
     */
    protected $allowedFields = [
        'id_entidad', 'id_usuario', 'titulo', 'metadescripcion',
        'url', 'texto', 'estado', 'created_at', 'updated_at'
    ];

    /**
     * @var bool Usa timestamps automáticos.
     */
    protected $useTimestamps = true;

    /**
     * Obtiene las tiendas con datos de entidad relacionados.
     *
     * @return array
     */
    public function getTiendasConEntidad()
    {
        return $this->select('paginas.*, entidades.nombre as entidad_nombre, entidades.url as entidad_url, entidades.imagen_principal')
                    ->join('entidades', 'entidades.id = paginas.id_entidad')
                    ->where('paginas.url', 'tienda')
                    ->where('paginas.estado', 'publicado')
                    ->where('entidades.estado', 'activo')
                    ->findAll();
    }

    /**
     * Obtiene las tiendas publicadas.
     *
     * @return array
     */
    public function getTiendasPublicadas()
    {
        return $this->where('estado', 'publicado')
                    ->where('titulo', 'tienda')
                    ->findAll();
    }
}
