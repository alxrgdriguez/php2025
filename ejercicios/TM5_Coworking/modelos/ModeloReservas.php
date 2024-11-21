<?php

namespace App\modelos;

use App\modelos\Reserva;
use App\modelos\Usuario;
use App\modelos\Sala;
use \PDO;
use PDOException;

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

    public static function crearReserva($reserva)
    {
        $conexion = new ConexionBD();
        $stmt= $conexion->getConexion()->prepare("INSERT INTO reservas(correo_usuario, nombre_sala, fecha_reserva, hora_inicio, hora_fin, estado) VALUES (?,?,?,?,?,?)");
        $stmt->bindValue(1, $reserva->getCorreoUsuario());
        $stmt->bindValue(2, $reserva->getNombreSala());
        $stmt->bindValue(3, $reserva->getFechaReserva());
        $stmt->bindValue(4, $reserva->getHoraInicio());
        $stmt->bindValue(5, $reserva->getHoraFin());
        $stmt->bindValue(6, $reserva->getEstado());
        $stmt->execute();
        $conexion->cerrarConexion();
    }

    public static function existeReservaPorRango($nombre_sala, $fecha_reserva, $hora_inicio, $hora_fin) {
        // Crear la conexión a la base de datos
        $conexion = new ConexionBD();

        // Preparar la consulta SQL para verificar si existe alguna reserva que se solape con el rango de horas
        $stmt = $conexion->getConexion()->prepare(
            "SELECT COUNT(*) FROM reservas 
                    WHERE fecha_reserva = ?
                        AND nombre_sala = ?
                        AND estado = 'confirmada'
                        AND (
                            (? BETWEEN  hora_inicio AND hora_fin)
                                OR (? BETWEEN hora_inicio AND hora_fin)
                                OR (hora_inicio BETWEEN ? AND ?)
                                OR (hora_fin BETWEEN ? AND ?)
                        )"
        );

        // Bindear los parámetros
        $stmt->bindValue(1, $fecha_reserva);
        $stmt->bindValue(2, $nombre_sala);
        $stmt->bindValue(3, $hora_inicio);
        $stmt->bindValue(4, $hora_fin);
        $stmt->bindValue(5, $hora_inicio);
        $stmt->bindValue(6, $hora_fin);
        $stmt->bindValue(7, $hora_inicio);
        $stmt->bindValue(8, $hora_fin);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado (la cantidad de registros que coinciden)
        $resultado = $stmt->fetchColumn();

        // Cerrar la conexión
        $conexion->cerrarConexion();

        // Si hay al menos una coincidencia, significa que hay un solapamiento
       if ($resultado > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function cancelarReserva($id)
    {
        $conexion = new ConexionBD();

        $stmt= $conexion->getConexion()->prepare("UPDATE reservas SET estado='cancelada'
                        WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\modelos\Reserva');
        $stmt->execute();

        $conexion->cerrarConexion();

    }
}


