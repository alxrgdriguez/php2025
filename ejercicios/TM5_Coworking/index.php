<?php

namespace App;

session_start();
//session_destroy();


use App\modelos\Reserva;
use App\modelos\Sala;
use App\modelos\Usuario;
use App\controladores\controladorReservas;
use App\controladores\controladorSalas;
use App\controladores\controladorUsuarios;


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


// Tratamiento de botones, links

if($_GET){

    // Usuario existe
    if(isset($_GET['accion']) && strcmp($_GET['accion'], 'usuarioExiste') == 0){
        controladorUsuarios::mostrarLogin("");
    }

    // Cerrar Sesion
    if(isset($_GET['accion']) && strcmp($_GET['accion'], 'cerrarSesion') == 0){
        unset($_SESSION['usuario']);
        controladorUsuarios::mostrarLogin("");
        exit();
    }

    if(isset($_SESSION['usuario'])){
        // Mostrar Salas
        if(isset($_GET['accion']) && strcmp($_GET['accion'], 'mostrarSalas') == 0){
            controladorSalas::mostrarSalas();
        }
        if (isset($_GET['accion']) && strcmp($_GET['accion'], 'verReservas') == 0) {
            controladorReservas::mostrarReservas($_GET["nombreSala"]);
        }
    }else{
        ControladorUsuarios::mostrarLogin("");
    }
// Tratamiento de formularios
}elseif ($_POST){
    if (isset($_POST['registro'])){
        $nombre =$_POST['nombre'];
        $email =$_POST['email'];
        $password =$_POST['password'];
        $telefono =$_POST['telefono'];
        $usuario = new Usuario($email, $nombre, $password, $telefono, "");

        controladorUsuarios::registro($usuario);
    }

    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        controladorUsuarios::login($email, $password);
    }


// Tratamiento para entrar al index para comprobar si tiene sesion o no
}else
        //Página de inicio
        if (isset($_SESSION['usuario'])) {
            //Inicio de la app
            controladorSalas::mostrarSalas();
        } else {
            //Formulario de login
            ControladorUsuarios::mostrarLogin("");
        }







