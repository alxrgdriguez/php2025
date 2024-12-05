<?php

namespace App\modelos;

use App\modelos\ConexionBD;
use App\modelos\Sala;
use \PDO;
use PDOException;

class ModeloSalas{

    public static function mostrarTodasLasSalas()
    {
        $conexion = new ConexionBD();

        $stmt= $conexion->getConexion()->prepare("SELECT * FROM salas");

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\modelos\Sala');
        $stmt->execute();
        $salas = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $salas;
    }

    public static function obtenerNombreSalas()
    {
        $conexion = new ConexionBD();

        $stmt= $conexion->getConexion()->prepare("SELECT nombre_sala FROM salas");

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\modelos\Sala');
        $stmt->execute();
        // Se obtiene los resultados como un array de solo los nombres de las salas
        $salas = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        $conexion->cerrarConexion();

        return $salas;
    }
}