<?php

namespace App\controladores;

use App\vistas\VistaSalas;
use App\modelos\ModeloSalas;
use App\vistas\VistaLogin;

class controladorSalas{


    public static function mostrarSalas($error)
    {
        $salas = ModeloSalas::mostrarSalasDisponibles();
        VistaSalas::render($salas);
    }
}
