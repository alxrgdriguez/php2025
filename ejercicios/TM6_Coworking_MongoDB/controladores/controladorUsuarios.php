<?php

namespace AppMongo\controladores;

use AppMongo\modelos\ModeloUsuarios;
use AppMongo\modelos\Usuario;
use AppMongo\vistas\VistaLogin;
use AppMongo\vistas\VistaSalas;

class controladorUsuarios{


    public static function registro($usuario)
    {
       $usuarioExiste = ModeloUsuarios::usuarioExiste($usuario);
       if($usuarioExiste){
           controladorUsuarios::mostrarLogin("Este usuario ya existe");
           exit();
       }

       // Hashear password
       $passwordHash = password_hash($usuario->getPassword(), PASSWORD_BCRYPT);
       $usuario->setPassword($passwordHash);
       $usuarioId =ModeloUsuarios::registrarUsuario($usuario);
       if($usuarioId){
           $_SESSION['usuario'] = array('id' => $usuarioId, 'email' => $usuario->getEmail());
           header("Location: index.php?accion=mostrarSalas");
           exit();
       }
    }

    public static function login($email, $password) {
        $usuario = ModeloUsuarios::obtenerUsuarioPorEmail($email);
        if($usuario === null){
            controladorUsuarios::mostrarLogin("Este usuario no existe");
            exit();
        }

        if (password_verify($password, $usuario->getPassword())) {
            $_SESSION['usuario'] = array(
                'email' => $usuario->getEmail(),
                'nombre_usuario' => $usuario->getNombreUsuario()
            );
            header("Location: index.php?accion=mostrarSalas");
        } else {
            controladorUsuarios::mostrarLogin("Este usuario ya existe");
        }
    }



    public static function mostrarLogin($error) {
        VistaLogin::render($error);
    }



}

