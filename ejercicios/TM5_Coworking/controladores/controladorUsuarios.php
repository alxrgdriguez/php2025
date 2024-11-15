<?php

namespace App\controladores;

use App\modelos\ModeloUsuarios;
use App\modelos\Usuario;
use App\vistas\VistaLogin;

class controladorUsuarios{


    public static function registro($usuario)
    {
       $usuarioExiste = ModeloUsuarios::usuarioExiste($usuario);
       if($usuarioExiste){
           header("Location: index.php?accion=mostrarLogin&info=usuarioExiste");
           exit();
       }

       // Hashear password
       $passwordHash = password_hash($usuario->getPassword(), PASSWORD_BCRYPT);
       $usuario->setPassword($passwordHash);
       $usuarioId =ModeloUsuarios::registrarUsuario($usuario);
       if($usuarioId){
           $_SESSION['usuario'] = array('id' => $usuarioId, 'email' => $usuario->getEmail());
           header("Location: index.php");
           exit();
       }
    }

    public static function login($email, $password) {
        $usuario = ModeloUsuarios::getPassword($email);

        if (password_verify($password, $usuario->getPassword())) {
            $_SESSION['usuario'] = $usuario->getEmail();
            header("Location: index.php?accion=UsuarioConectado");
        } else {
            ControladorUsuarios::mostrarLogin("Error login");
        }
    }


    public static function mostrarLogin()
    {
        VistaLogin::render("");
    }



}

