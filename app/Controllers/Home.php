<?php

namespace App\Controllers;

/**
 * Class Home
 * Controlador principal para la página de inicio.
 */
class Home extends BaseController
{
    /**
     * Muestra la página principal.
     *
     * @return string
     */
    public function index(): string
    {
        return view('home', [
            'title' => 'Frikilander. Tu sitio web de ocio alternativo y más',
            'titulo' => 'Frikilander. Tu sitio web de ocio alternativo y más',
        ]);
    }    

    /**
     * @deprecated Mantenido por compatibilidad con versiones anteriores, como un "recuerdo de Vietnam"
     *
     * @return string
     */
    public function welcome(): string
    {
        return view('welcome_message');
    }
}
