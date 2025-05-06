<?php

namespace App\Controllers;

use App\Models\EntidadModel;
use App\Models\PaginaModel;

/**
 * Class EntidadPublic
 * Controlador para mostrar entidades públicas y sus páginas asociadas.
 */
class EntidadPublic extends BaseController
{
    /**
     * Muestra la vista de una entidad específica.
     *
     * @param string $slugEntidad
     * @return string
     */
    public function ver($slugEntidad)
    {
        $entidadModel = new EntidadModel();
        $paginaModel = new PaginaModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();

        if (!$entidad) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Entidad no encontrada');
        }

        $paginas = $paginaModel->where('id_entidad', $entidad['id'])
                               ->whereIn('url', ['tienda', 'donde-estamos', 'quienes-somos', 'contacto'])
                               ->findAll();

        $sidebar = [];
        foreach ($paginas as $pagina) {
            $sidebar[] = [
                'label' => ucfirst(str_replace('-', ' ', $pagina['url'])),
                'url'   => base_url('/' . $slugEntidad . '/' . $pagina['url']),
            ];
        }

        return view('entidad/ver', [
            'title'      => $entidad['nombre'],
            'titulo'     => $entidad['nombre'],
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => 'Entidad', 'url' => base_url('entidad/' . $slugEntidad)],
            ],
            'sidebar'    => $sidebar,
            'entidad'    => $entidad,
        ]);
    }

    /**
     * Muestra una página específica de una entidad.
     *
     * @param string $slugEntidad
     * @param string $slugPagina
     * @return string|\CodeIgniter\HTTP\RedirectResponse
     */
    public function pagina($slugEntidad, $slugPagina)
    {
        $entidadModel = new EntidadModel();
        $paginaModel = new PaginaModel();

        $entidad = $entidadModel->where('url', $slugEntidad)->first();
        if (!$entidad) {
            return redirect()->to('/')->with('error', 'Entidad no encontrada');
        }

        $pagina = $paginaModel->where('id_entidad', $entidad['id'])
                            ->where('url', $slugPagina)
                            ->first();
        if (!$pagina) {
            return redirect()->to('/' . $slugEntidad)->with('error', 'Página no encontrada');
        }

        return view('entidades/pagina', [
            'title'      => $pagina['titulo'],
            'titulo'     => $pagina['titulo'],
            'breadcrumb' => [
                ['label' => 'Inicio', 'url' => base_url()],
                ['label' => $entidad['nombre'], 'url' => base_url($slugEntidad)],
                ['label' => $pagina['titulo']]
            ],
            'sidebar'    => [
                ['label' => 'Tienda', 'url' => base_url("/$slugEntidad/tienda")],
                ['label' => 'Eventos', 'url' => base_url("/$slugEntidad/eventos")],
                ['label' => 'Ambientaciones', 'url' => base_url("/$slugEntidad/ambientaciones")]
            ],
            'entidad'    => $entidad,
            'pagina'     => $pagina
        ]);
    }
}
