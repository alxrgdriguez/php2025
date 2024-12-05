<?php

namespace App\modelos;

use App\modelos\ConexionBD;
use PDO;

class ModeloUsuarios {

    public static function registrarUsuario($usuario)
    {
        $conexion = new ConexionBD();
        $stmt= $conexion->getConexion()->prepare("INSERT INTO usuarios(email, nombre_usuario, password, telefono) VALUES (?,?,?,?)");
        $stmt->bindValue(1, $usuario->getEmail());
        $stmt->bindValue(2, $usuario->getNombreUsuario());
        $stmt->bindValue(3, $usuario->getPassword());
        $stmt->bindValue(4, $usuario->getTelefono());
        $stmt->execute();
        $idSesion = $usuario->getEmail();
        $conexion->cerrarConexion();
        // Si es uno se ha insertado en base de datos
        return $idSesion;

    }

    public static function usuarioExiste($usuario)
    {
        $conexion = new ConexionBD();
        $stmt= $conexion->getConexion()->prepare("SELECT * FROM usuarios WHERE email=?");
        $stmt->bindValue(1, $usuario->getEmail());
        $stmt->execute();
        $conexion->cerrarConexion();
        // Si es uno se ha insertado en base de datos
        return $stmt->rowCount() == 1;
    }


    public static function obtenerUsuarioPorEmail($email){
        $conexion = new ConexionBD();

        $stmt = $conexion->getConexion()->prepare("SELECT * FROM usuarios 
                        WHERE email = ?");
        $stmt->bindValue(1, $email);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\modelos\Usuario');
        $stmt->execute(); //La ejecución de la consulta
        $usuario = $stmt->fetch();

        $conexion->cerrarConexion();

        if($stmt->rowCount() == 0){//Si no hay resultados, devuelve null
            return null;
        }else{
            return $usuario;
        }
    }



}
