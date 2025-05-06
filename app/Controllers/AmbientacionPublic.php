<?php

namespace App\Controllers;

use App\Models\EntidadModel;
use App\Models\AmbientacionModel;

/**
 * Class AmbientacionPublic
 * Controlador para gestionar las ambientaciones públicas.
 */
class AmbientacionPublic extends BaseController
{
    /**
     * Muestra el listado de ambientaciones para una entidad.
     *
     * @param string $slugEntidad
     * @return string
     */
    public function index($slugEntidad)
    {
        $entidadModel = new EntidadModel();
        $ambientacionModel = new AmbientacionModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();
        if (!$entidad) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Entidad no encontrada');
        }

        $ambientaciones = $ambientacionModel->where('id_entidad', $entidad['id'])->findAll();

        return view('ambientaciones/index', [
            'title'      => 'Ambientaciones de ' . $entidad['nombre'],
            'titulo'     => 'Ambientaciones',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => $entidad['nombre'], 'url' => base_url($slugEntidad)],
                ['label' => 'Ambientaciones'],
            ],
            'sidebar'    => [],
            'entidad'    => $entidad,
            'ambientaciones' => $ambientaciones
        ]);
    }

    /**
     * Muestra una ambientación específica.
     *
     * @param string $slugEntidad
     * @param string $slugAmbientacion
     * @return string
     */
    public function ver($slugEntidad, $slugAmbientacion)
    {
        $entidadModel = new EntidadModel();
        $ambientacionModel = new AmbientacionModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();
        if (!$entidad) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Entidad no encontrada');
        }

        $ambientacion = $ambientacionModel->where('id_entidad', $entidad['id'])
                                          ->where('nombre', $slugAmbientacion)
                                          ->first();
        if (!$ambientacion) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Ambientación no encontrada');
        }

        return view('ambientaciones/ver', [
            'title'      => $ambientacion['nombre'],
            'titulo'     => $ambientacion['nombre'],
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => $entidad['nombre'], 'url' => base_url($slugEntidad)],
                ['label' => 'Ambientaciones', 'url' => base_url("$slugEntidad/ambientaciones")],
                ['label' => $ambientacion['nombre']],
            ],
            'sidebar'    => [],
            'entidad'    => $entidad,
            'ambientacion' => $ambientacion
        ]);
    }
}
