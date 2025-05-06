<?php

namespace App\Controllers;

use App\Models\PaginaModel;

/**
 * Class TiendasPublic
 * Controlador para gestionar la visualización de tiendas públicas.
 */
class TiendasPublic extends BaseController
{
    /**
     * Muestra el listado de tiendas públicas.
     *
     * @return string
     */
    public function index(): string
    {
        $paginaModel = new PaginaModel();

        $builder = $paginaModel->builder();
        $builder->select('paginas.*, entidades.url AS entidad_url, entidades.nombre AS entidad_nombre, entidades.imagen_principal');
        $builder->join('entidades', 'entidades.id = paginas.id_entidad');
        $builder->where('paginas.url', 'tienda');
        $builder->where('paginas.estado', 'publicado');
        $builder->where('entidades.estado', 'activo');
        $tiendas = $builder->get()->getResultArray();

        return view('tiendas/index', [
            'title' => 'Tiendas en Frikilander',
            'titulo' => 'Listado de Tiendas de Entidades',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Tiendas']
            ],
            'sidebar' => [
                ['label' => 'Crear Tienda', 'url' => base_url('/tiendas/crear')],
                ['label' => 'Mis Tiendas', 'url' => base_url('/tiendas/mis-tiendas')],
            ],
            'tiendas' => $tiendas
        ]);
    }

    /**
     * Muestra el detalle de una tienda específica.
     *
     * @param string $entidadSlug
     * @return string
     */
    public function ver($entidadSlug)
    {
        $paginaModel = new PaginaModel();
        $productoModel = new \App\Models\ProductoModel();

        $tienda = $paginaModel->select('paginas.*, entidades.nombre as entidad_nombre, entidades.url as entidad_url, entidades.imagen_principal')
            ->join('entidades', 'entidades.id = paginas.id_entidad')
            ->where('paginas.url', 'tienda')
            ->where('paginas.estado', 'publicado')
            ->where('entidades.url', $entidadSlug)
            ->first();

        if (!$tienda) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Tienda no encontrada');
        }

        $productos = $productoModel->where('id_entidad', $tienda['id_entidad'])->findAll();

        return view('tiendas/ver', [
            'title' => $tienda['entidad_nombre'] . ' - Tienda',
            'titulo' => $tienda['entidad_nombre'] . ' - Tienda',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Tiendas', 'url' => base_url('tiendas')],
                ['label' => $tienda['entidad_nombre']]
            ],
            'sidebar' => [],
            'tienda' => $tienda,
            'productos' => $productos
        ]);
    }

    /**
     * Muestra la vista para crear una nueva tienda.
     *
     * @return string
     */
    public function crear(): string
    {
        return view('tiendas/crear', [
            'title' => 'Crear Tienda',
            'titulo' => 'Nueva Tienda',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Tiendas', 'url' => base_url('tiendas')],
                ['label' => 'Crear Tienda']
            ],
            'sidebar' => [
                ['label' => 'Listado de Tiendas', 'url' => base_url('/tiendas')],
                ['label' => 'Crear Tienda', 'url' => base_url('/tiendas/crear')],
            ]
        ]);
    }

    /**
     * Guarda la información de una tienda nueva.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function guardar()
    {
        $paginaModel = new PaginaModel();

        $slug = 'tienda';

        $data = [
            'id_entidad'      => $this->request->getPost('id_entidad'),
            'id_usuario'      => session()->get('user_id') ?? 1,
            'titulo'          => 'Tienda',
            'metadescripcion' => 'Tienda online de la entidad',
            'url'             => $slug,
            'texto'           => 'Bienvenido a nuestra tienda online',
            'estado'          => 'publicado'
        ];

        $paginaModel->save($data);

        return redirect()->to('/tiendas')->with('success', 'Tienda creada con éxito');
    }
}
