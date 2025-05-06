<?php

namespace App\Controllers;

use App\Models\EventoModel;
use App\Models\AmbientacionModel;
use App\Models\ProductoModel;

/**
 * Class Publicos
 * Controlador para mostrar vistas públicas de eventos, ambientaciones, productos y entidades.
 */
class Publicos extends BaseController
{
    /**
     * Muestra la lista de eventos públicos.
     *
     * @return string
     */
    public function eventos()
    {
        $eventoModel = new EventoModel();
        $eventos = $eventoModel->select('partidas.*, ambientaciones.nombre as ambientacion_nombre, entidades.nombre as entidad_nombre')
            ->join('ambientaciones', 'ambientaciones.id = partidas.id_ambientacion')
            ->join('entidades', 'entidades.id = ambientaciones.id_entidad')
            ->where('partidas.estado', 'activa')
            ->findAll();

        return view('publicos/eventos', [
            'title' => 'Eventos Públicos',
            'titulo' => 'Eventos Públicos',
            'breadcrumb' => [['label' => 'Inicio', 'url' => base_url()], ['label' => 'Eventos']],
            'sidebar' => [],
            'eventos' => $eventos
        ]);
    }

    /**
     * Muestra la lista de ambientaciones públicas.
     *
     * @return string
     */
    public function ambientaciones()
    {
        $ambientacionModel = new AmbientacionModel();
        $ambientaciones = $ambientacionModel->select('ambientaciones.*, entidades.nombre as entidad_nombre')
            ->join('entidades', 'entidades.id = ambientaciones.id_entidad')
            ->where('ambientaciones.estado', 'activo')
            ->findAll();

        return view('publicos/ambientaciones', [
            'title' => 'Ambientaciones Públicas',
            'titulo' => 'Ambientaciones Públicas',
            'breadcrumb' => [['label' => 'Inicio', 'url' => base_url()], ['label' => 'Ambientaciones']],
            'sidebar' => [],
            'ambientaciones' => $ambientaciones
        ]);
    }

    /**
     * Muestra la lista de productos públicos.
     *
     * @return string
     */
    public function productos()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel->select('productos.*, entidades.nombre as entidad_nombre')
            ->join('entidades', 'entidades.id = productos.id_entidad')
            ->where('productos.stock >', 0)
            ->findAll();

        return view('publicos/productos', [
            'title' => 'Productos Públicos',
            'titulo' => 'Productos Públicos',
            'breadcrumb' => [['label' => 'Inicio', 'url' => base_url()], ['label' => 'Productos']],
            'sidebar' => [],
            'productos' => $productos
        ]);
    }

    /**
     * Muestra la lista de entidades públicas.
     *
     * @return string
     */
    public function entidades()
    {
        $entidadModel = new \App\Models\EntidadModel();
        $entidades = $entidadModel->where('estado', 'activo')->findAll();

        return view('publicos/entidades', [
            'title' => 'Entidades Públicas',
            'titulo' => 'Entidades Públicas',
            'breadcrumb' => [['label' => 'Inicio', 'url' => base_url()], ['label' => 'Entidades']],
            'sidebar' => [],
            'entidades' => $entidades
        ]);
    }
}
