<?php
session_start();

// Formularios POST

if (isset($_POST)){
    if (isset($_POST['boton_login'])){
       $email =  $_POST["email"];
       $password = $_POST["contrasenia"];

       foreach ($_SESSION['personas'] as $persona){
           if (strcmp($persona['email'], $email) == 0){
               if (strcmp($persona['contrasenia'], $password) == 0){
                   $_SESSION['usuario_conectado'] = array(
                       'email' => $email,
                       'contrasenia' => $password
                   );
                  return header('Location: index.php');
               }
           }
       }
       header('Location: login.php?error=NoExiste');
    }
}

//Links GET
if(isset($_GET['accion'])){
    if (strcmp($_GET['accion'], 'cerrarSesion') == 0){
        session_destroy();
        header('Location: index.php');
    }
}





?>


