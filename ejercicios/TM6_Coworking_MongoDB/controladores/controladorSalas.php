<?php

namespace AppMongo\controladores;

use AppMongo\vistas\VistaSalas;
use AppMongo\modelos\ModeloSalas;
use AppMongo\vistas\VistaLogin;

class controladorSalas{

    /**
     * Metodo que muestra todos los salas
     */
    public static function mostrarSalas(){
        $salas = ModeloSalas::mostrarTodasLasSalas();
        VistaSalas::render($salas);
    }


}
