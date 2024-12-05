<?php

namespace App\controladores;

use App\vistas\VistaSalas;
use App\modelos\ModeloSalas;
use App\vistas\VistaLogin;

class controladorSalas{

    /**
     * Metodo que muestra todos los salas
     */
    public static function mostrarSalas(){
        $salas = ModeloSalas::mostrarTodasLasSalas();
        VistaSalas::render($salas);
    }


}
