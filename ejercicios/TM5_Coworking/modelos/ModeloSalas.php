<?php


namespace App\modelos;

use App\modelos\Sala;
use \PDO;

class ModeloSalas{

    public static function mostrarSalasDisponibles()
    {
        $conexion = new ConexionBD();

        $stmt= $conexion->getConexion()->prepare("SELECT * FROM salas");

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\modelos\Sala');

        $conexion->cerrarConexion();

        return $stmt->fetchAll();
    }
}