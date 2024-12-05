<?php

namespace AppMongo\modelos;

use AppMongo\modelos\ConexionBD;

class ModeloUsuarios {

    public static function registrarUsuario($usuario){
        $conexion = new ConexionBD();

        // Consultar en mongoDB
        $conexion->getConexion()->usuarios->insertOne(['email' => $usuario->getEmail(),
            'nombre_usuario' => $usuario->getNombreUsuario(),
            'password' => $usuario->getPassword(),
            'telefono' => $usuario->getTelefono(),
            'fecha_creacion' => date('Y-m-d')
        ]);
        $conexion->cerrarConexion();

        return $usuario->getEmail();

    }



    public static function usuarioExiste($usuario){

        $conexion = new ConexionBD();
        $usuarioBD = $conexion ->getConexion()->usuarios->findOne(['email' => $usuario->getEmail()]);
        $conexion->cerrarConexion();

        if($usuarioBD){
            return true;
        }else{
            return false;
        }

    }

    public static function obtenerUsuarioPorEmail($email){
    {
        $conexion = new ConexionBD();
        $usuarioBD = $conexion ->getConexion()->usuarios->findOne(['email' => $email]);
        $conexion->cerrarConexion();

        if($usuarioBD){
            $usuario = new Usuario($usuarioBD['email'], $usuarioBD['nombre_usuario'], $usuarioBD['password'], $usuarioBD['telefono'], $usuarioBD['fecha_creacion']);
            $usuario->setId($usuarioBD['_id']);
            return $usuario;
        }else{
            return null;
        }
    }

    }

}
