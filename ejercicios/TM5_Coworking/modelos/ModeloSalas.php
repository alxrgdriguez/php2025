<?php

namespace App\modelos;

use App\modelos\Sala;
use App\modelos\ConexionBD;
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
}