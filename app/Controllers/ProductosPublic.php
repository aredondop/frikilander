<?php

namespace App\Controllers;

/**
 * Class ProductosPublic
 * Controlador para la gestión pública de productos.
 */
class ProductosPublic extends BaseController
{
    /**
     * Muestra el listado de productos.
     *
     * @return string
     */
    public function index(): string
    {
        $productos = []; // Aquí luego: $this->productoModel->findAll()

        return view('productos/index', [
            'title' => 'Productos en Frikilander',
            'titulo' => 'Productos destacados',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Productos']
            ],
            'sidebar' => [
                ['label' => 'Todos los Productos', 'url' => base_url('/productos')],
                ['label' => 'Crear Producto', 'url' => base_url('/productos/crear')],
                ['label' => 'Mis Productos', 'url' => base_url('/productos/mis-productos')],
            ],
            'productos' => $productos
        ]);
    }

    /**
     * Muestra el formulario para crear un nuevo producto.
     *
     * @return string
     */
    public function crear(): string
    {
        return view('productos/crear', [
            'title' => 'Crear Producto',
            'titulo' => 'Nuevo Producto',
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Productos', 'url' => base_url('productos')],
                ['label' => 'Crear Producto']
            ],
            'sidebar' => [
                ['label' => 'Listado de Productos', 'url' => base_url('/productos')],
                ['label' => 'Crear Producto', 'url' => base_url('/productos/crear')],
            ]
        ]);
    }

    /**
     * Guarda un nuevo producto en la base de datos.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function guardar()
    {
        $productoModel = new \App\Models\ProductoModel();

        $slug = url_title($this->request->getPost('titulo'), '-', true);

        $data = [
            'id_entidad'            => 1, // A fuego
            'id_usuario'            => 1, // A fuego
            'titulo'                => $this->request->getPost('titulo'),
            'slug'                  => $slug,
            'descripcion_corta'     => $this->request->getPost('descripcion_corta'),
            'descripcion_larga'     => $this->request->getPost('descripcion_larga'),
            'precio_sin_impuestos'  => $this->request->getPost('precio_sin_impuestos'),
            'stock'                 => $this->request->getPost('stock_disponible')
        ];

        $productoModel->save($data);

        return redirect()->to('/productos')->with('success', 'Producto creado con éxito');
    }
}
