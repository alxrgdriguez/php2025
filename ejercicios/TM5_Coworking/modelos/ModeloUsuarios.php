<?php

namespace App\Modelos;

use App\controladores\ControladorUsuarios;
use PDO;

class ModeloUsuarios {

    // Obtener un usuario por email
    public static function getByEmail($email) {
        $conexion = new ConexionBD();

        $stmt = $conexion->getConexion()->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bindValue(1, $email);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\Modelos\Usuario');
        $usuario = $stmt->fetch();

        $conexion->cerrarConexion();

        return $usuario;
    }

    // Guardar un nuevo usuario
    public static function guardarUsuario($usuario) {
        $conexion = new ConexionBD();
        $stmt = $conexion->getConexion()->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $usuario->getNombre());
        $stmt->bindValue(2, $usuario->getEmail());
        $stmt->bindValue(3, $usuario->getPassword());

        // Ejecutar la consulta y devolver si la operación fue exitosa
        $resultado = $stmt->execute();
        $conexion->cerrarConexion();
        return $resultado;
    }
}
