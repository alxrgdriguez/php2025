<?php

namespace App;

session_start();
//session_destroy();

use App\modelos\Reserva;
use App\modelos\Sala;
use App\modelos\Usuario;
use App\modelos\enums\EstadoReserva;
use App\controladores\ControladorReservas;
use App\controladores\ControladorSalas;
use App\controladores\ControladorUsuarios;


/**
 * AUTOLOAD
 */
spl_autoload_register(function ($class) {
    //echo $class."<br>";
    //echo substr($class, strpos($class,"\\")+1);
    $ruta = substr($class, strpos($class,"\\")+1);
    $ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $ruta . ".php";
});


// ENRUTADOR - CONTROLADOR BASE

// Tratamiento de forms




// Tratamiento de botones, links









