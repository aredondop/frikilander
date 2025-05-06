<?php

namespace App\Controllers;

use App\Models\EntidadModel;
use App\Models\EventoModel;

/**
 * Class EventoPublic
 * Controlador para mostrar los eventos públicos de una entidad.
 */
class EventoPublic extends BaseController
{
    /**
     * Muestra la lista de eventos de una entidad.
     *
     * @param string $slugEntidad
     * @return string
     */
    public function index($slugEntidad)
    {
        $entidadModel = new EntidadModel();
        $eventoModel = new EventoModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();
        if (!$entidad) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Entidad no encontrada');
        }

        $eventos = $eventoModel->where('id_entidad', $entidad['id'])->findAll();

        return view('eventos/index', [
            'title'      => 'Eventos de ' . $entidad['nombre'],
            'titulo'     => 'Eventos',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => $entidad['nombre'], 'url' => base_url($slugEntidad)],
                ['label' => 'Eventos'],
            ],
            'sidebar'    => [],
            'entidad'    => $entidad,
            'eventos'    => $eventos
        ]);
    }

    /**
     * Muestra los detalles de un evento específico.
     *
     * @param string $slugEntidad
     * @param string $slugEvento
     * @return string
     */
    public function ver($slugEntidad, $slugEvento)
    {
        $entidadModel = new EntidadModel();
        $eventoModel = new EventoModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();
        if (!$entidad) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Entidad no encontrada');
        }

        $evento = $eventoModel->where('id_entidad', $entidad['id'])
                              ->where('nombre', $slugEvento)
                              ->first();
        if (!$evento) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Evento no encontrado');
        }

        return view('eventos/ver', [
            'title'      => $evento['nombre'],
            'titulo'     => $evento['nombre'],
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => $entidad['nombre'], 'url' => base_url($slugEntidad)],
                ['label' => 'Eventos', 'url' => base_url("$slugEntidad/eventos")],
                ['label' => $evento['nombre']],
            ],
            'sidebar'    => [],
            'entidad'    => $entidad,
            'evento'     => $evento
        ]);
    }
}
