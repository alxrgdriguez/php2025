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

    public static function login(Usuario $usuario)
    {
        // Buscar el usuario en la base de datos por su email
        $usuarioDB = ModeloUsuarios::obtenerUsuarioPorEmail($usuario->getEmail());

        // Verificar si existe el usuario
        if ($usuarioDB) {
            // Comparar la contraseña introducida con la almacenada en la base de datos
            if (password_verify($usuario->getPassword(), $usuarioDB['password'])) {
                // Si la contraseña es correcta, iniciar sesión
                $_SESSION['usuario'] = array(
                    'id' => $usuarioDB['id'],
                    'email' => $usuarioDB['email']
                );
                header("Location: index.php");
                exit();
            } else {
                // Si la contraseña no es correcta
                header("Location: index.php?accion=mostrarLogin&info=incorrectPassword");
                exit();
            }
        } else {
            // Si el usuario no existe
            header("Location: index.php?accion=mostrarLogin&info=usuarioNoExiste");
            exit();
        }
    }


    public static function mostrarLogin()
    {
        VistaLogin::render("");
    }



}

