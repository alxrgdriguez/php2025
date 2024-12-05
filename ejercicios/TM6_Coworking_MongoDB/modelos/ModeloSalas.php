<?php

namespace AppMongo\modelos;

use AppMongo\modelos\ConexionBD;
use AppMongo\modelos\Sala;


class ModeloSalas{

    public static function mostrarTodasLasSalas()
    {
        $conexion = new ConexionBD();
        $salas = $conexion->getConexion()->salas->find();
        $conexion->cerrarConexion();
        $salasBD = array();
        foreach ($salas as $sala) {
            $salaBD = new Sala($sala['nombre_sala'], $sala['capacidad'], $sala['ubicacion']);
            $salaBD->setId($sala['_id']);
            $salasBD[] = $salaBD;
        }
        return $salasBD;
    }

    public static function obtenerNombreSalas()
    {
        $conexion = new ConexionBD();
        $salas = $conexion->getConexion()->salas->find();
        $conexion->cerrarConexion();
        $salasBD = array();
        foreach ($salas as $sala) {
            $salasBD[] = $sala['nombre_sala'];
        }
        return $salasBD;

    }
}