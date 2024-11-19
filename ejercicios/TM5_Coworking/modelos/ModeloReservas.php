<?php

namespace App\modelos;

use App\modelos\Reserva;
use App\modelos\Usuario;
use App\modelos\Sala;
use \PDO;

class ModeloReservas{
    public static function obtenerNombreUsuarioPorId($id){
        $conexion = new ConexionBD();

        $stmt = $conexion->getConexion()->prepare("SELECT nombre FROM usuarios 
                        WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\modelos\Reserva');
        $stmt->execute(); //La ejecución de la consulta
        $nombre = $stmt->fetch();

        $conexion->cerrarConexion();

        if($stmt->rowCount() == 0){//Si no hay resultados, devuelve null
            return null;
        }else{
            return $nombre;
        }
    }

    public static function mostrarReservasPorNombreSala($nombreSala)
    {
        $conexion = new ConexionBD();

        $stmt= $conexion->getConexion()->prepare("SELECT * FROM reservas
                        WHERE nombre_sala= ? AND estado='confirmada'");
        $stmt->bindValue(1, $nombreSala);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\modelos\Reserva');
        $stmt->execute();
        $reservas = $stmt->fetchAll();

        $conexion->cerrarConexion();

        return $reservas;

    }
}


