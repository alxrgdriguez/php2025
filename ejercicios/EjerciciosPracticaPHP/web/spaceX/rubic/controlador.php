<?php
session_start();
include "modelo.php";

// FORMULARIOS ---------------------

/**
 * Formulario de registro -------------
 */

if ($_POST){
    // Cada formulario se distingue por name en el boton summit
    if (isset($_POST['registro'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Comprobar si el email ya esta registrado sino se registra en BBDD
        if (consularUsuarioPorEmail($email)){
            header("Location: registro.php?error=yaRegistrado");
        }else{
            //Registrar usuario en BBDD
            registrarUsuario($nombre, $email, $password);

            //Si ha funcionado bien lo metemos en la sesión
            $_SESSION['usuario'] = array("email" => $email);
            header("Location: index.php"); //Usuario nuevo registrado
        }
    }
}
