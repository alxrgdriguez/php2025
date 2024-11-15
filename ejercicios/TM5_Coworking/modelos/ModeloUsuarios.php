<?php

namespace App\modelos;

use App\modelos\ConexionBD;
use PDO;

class ModeloUsuarios {

    public static function registrarUsuario($usuario)
    {
        $conexion = new ConexionBD();
        $stmt= $conexion->getConexion()->prepare("INSERT INTO usuarios(nombre, email, password, telefono) VALUES (?,?,?,?)");
        $stmt->bindValue(1, $usuario->getNombre());
        $stmt->bindValue(2, $usuario->getEmail());
        $stmt->bindValue(3, $usuario->getPassword());
        $stmt->bindValue(4, $usuario->getTelefono());
        $stmt->execute();
        $idSesion = $conexion->getConexion()->lastInsertId();
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

    public static function obtenerUsuarioPorEmail($usuario)
    {
        // Conexión a la base de datos
        $conexion = new ConexionBD();

        // Obtener el email del usuario
        $email = $usuario->getEmail();

        // Consulta para obtener al usuario por su email
        $stmt = $conexion->getConexion()->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bindValue(1, $email);
        $stmt->execute();
        $conexion->cerrarConexion();

        // Retorna el primer resultado encontrado
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorna el primer registro o false si no se encuentra
    }

    public static function getPassword($email){
        $conexion = new ConexionBD();

        $stmt = $conexion->getConexion()->prepare("SELECT * FROM usuarios 
                        WHERE email = ?");
        $stmt->bindValue(1, $email);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\modelos\Usuario');
        $stmt->execute(); //La ejecución de la consulta
        $usuario = $stmt->fetch();

        $conexion->cerrarConexion();

        return $usuario;
    }



}
