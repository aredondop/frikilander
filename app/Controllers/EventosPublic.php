<?php

namespace App\Controllers;

/**
 * Class EventosPublic
 * Controlador para gestionar eventos públicos.
 */
class EventosPublic extends BaseController
{
    /**
     * Muestra el listado de eventos públicos.
     *
     * @return string
     */
    public function index(): string
    {
        $eventos = []; // En el futuro: $this->eventoModel->findAll()

        return view('eventos/index', [
            'title' => 'Eventos en Frikilander',
            'titulo' => 'Listado de Eventos Públicos',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Eventos']
            ],
            'sidebar' => [
                ['label' => 'Listado de Eventos', 'url' => base_url('/eventos')],
                ['label' => 'Crear Evento', 'url' => base_url('/eventos/crear')],
                ['label' => 'Mis Eventos', 'url' => base_url('/eventos/mis-eventos')],
            ],
            'eventos' => $eventos
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo evento.
     *
     * @return string
     */
    public function crear(): string
    {
        return view('eventos/crear', [
            'title' => 'Crear Evento',
            'titulo' => 'Nuevo Evento',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Eventos', 'url' => base_url('eventos')],
                ['label' => 'Crear Evento']
            ],
            'sidebar' => [
                ['label' => 'Listado de Eventos', 'url' => base_url('/eventos')],
                ['label' => 'Crear Evento', 'url' => base_url('/eventos/crear')],
            ]
        ]);
    }

    /**
     * Guarda un nuevo evento en la base de datos.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function guardar()
    {
        $partidaModel = new \App\Models\PartidaModel();

        $data = [
            'id_ambientacion' => 1, // por ahora un valor a fuego luego dinámico
            'nombre'          => $this->request->getPost('titulo'),
            'descripcion'     => $this->request->getPost('descripcion_larga'),
            'fecha_inicio'    => $this->request->getPost('fecha_evento'),
            'estado'          => 'activa'
        ];

        $partidaModel->save($data);

        return redirect()->to('/eventos')->with('success', 'Evento creado con éxito');
    }
}
