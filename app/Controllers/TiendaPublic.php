<?php

namespace App\Controllers;

use App\Models\EntidadModel;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;
use App\Models\PaginaModel;

/**
 * Class TiendaPublic
 * Controlador para mostrar la tienda pública, categorías y productos de una entidad.
 */
class TiendaPublic extends BaseController
{
    /**
     * Muestra la página principal de la tienda para una entidad.
     *
     * @param string $slugEntidad
     * @return string
     */
    public function index($slugEntidad)
    {
        $entidadModel = new EntidadModel();
        $categoriaModel = new CategoriaModel();
        $productoModel = new ProductoModel();
        $paginaModel = new PaginaModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();
        if (!$entidad) {
            return redirect()->to('/')->with('error', 'Entidad no encontrada');
        }

        $pagina = $paginaModel->where('id_entidad', $entidad['id'])
                              ->where('url', 'tienda')
                              ->where('estado', 'publicado')
                              ->first();
        if (!$pagina) {
            return redirect()->to('/')->with('error', 'Tienda no encontrada para esta entidad');
        }

        $categorias = $categoriaModel->where('id_entidad', $entidad['id'])->findAll();
        $productos = $productoModel->where('id_entidad', $entidad['id'])->findAll();

        return view('tienda/index', [
            'title'      => 'Tienda de ' . $entidad['nombre'],
            'titulo'     => $pagina['titulo'],
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Tiendas', 'url' => base_url('tiendas')],
                ['label' => $entidad['nombre']]
            ],
            'sidebar' => [
                ['label' => $entidad['nombre'], 'url' => base_url('/' . $slugEntidad . '/donde-estamos')],
                ['label' => 'Dónde estamos', 'url' => base_url('/' . $slugEntidad . '/donde-estamos')],
                ['label' => 'Quiénes somos', 'url' => base_url('/' . $slugEntidad . '/quienes-somos')],
                ['label' => 'Contacto', 'url' => base_url('/' . $slugEntidad . '/contacto')],
            ],
            'entidad'    => $entidad,
            'pagina'     => $pagina,
            'categorias' => $categorias,
            'productos'  => $productos
        ]);
    }

    /**
     * Muestra los productos de una categoría específica de una entidad.
     *
     * @param string $slugEntidad
     * @param string $slugCategoria
     * @return string
     */
    public function categoria($slugEntidad, $slugCategoria)
    {
        $entidadModel = new EntidadModel();
        $categoriaModel = new CategoriaModel();
        $productoModel = new ProductoModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();
        if (!$entidad) {
            return redirect()->to('/')->with('error', 'Entidad no encontrada');
        }

        $categoria = $categoriaModel->where('id_entidad', $entidad['id'])
                                    ->where('nombre', $slugCategoria)
                                    ->first();
        if (!$categoria) {
            return redirect()->to("/$slugEntidad/tienda")->with('error', 'Categoría no encontrada');
        }

        $productos = $productoModel->where('id_entidad', $entidad['id'])
                                   ->where('id_categoria', $categoria['id'])
                                   ->findAll();

        return view('tienda/categoria', [
            'title'      => 'Categoría: ' . $categoria['nombre'],
            'titulo'     => 'Categoría: ' . $categoria['nombre'],
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Tienda', 'url' => base_url("$slugEntidad/tienda")],
                ['label' => $categoria['nombre']]
            ],
            'sidebar'    => [],
            'entidad'    => $entidad,
            'categoria'  => $categoria,
            'productos'  => $productos
        ]);
    }

    /**
     * Muestra el detalle de un producto específico de una entidad.
     *
     * @param string $slugEntidad
     * @param string $slugProducto
     * @return string
     */
    public function producto($slugEntidad, $slugProducto)
    {
        $entidadModel = new EntidadModel();
        $productoModel = new ProductoModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();
        if (!$entidad) {
            return redirect()->to('/')->with('error', 'Entidad no encontrada');
        }

        $producto = $productoModel->where('id_entidad', $entidad['id'])
                                  ->where('slug', $slugProducto)
                                  ->first();
        if (!$producto) {
            return redirect()->to("/$slugEntidad/tienda")->with('error', 'Producto no encontrado');
        }

        return view('tienda/producto', [
            'title'      => $producto['titulo'],
            'titulo'     => $producto['titulo'],
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Tienda', 'url' => base_url("$slugEntidad/tienda")],
                ['label' => $producto['titulo']]
            ],
            'sidebar'    => [],
            'entidad'    => $entidad,
            'producto'   => $producto
        ]);
    }
}
