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

if (isset($_POST['registro'])){
    $nombre = $_POST['nombreRegistro'];
    $email = $_POST['emailRegistro'];
    $password = $_POST['passwordRegistro'];
    ControladorUsuarios::registro($nombre, $email, $password);
}

if (isset($_POST['login'])){
    $email = $_POST['emailLogin'];
    $password = $_POST['passwordLogin'];
    ControladorUsuarios::login($email, $password);
}


// Tratamiento de botones, links

//Login
if (strcmp($_REQUEST["accion"], "login") == 0) {
    ControladorUsuarios::mostrarLogin("");
}









