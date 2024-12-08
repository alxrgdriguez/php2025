<?php

namespace AppMongo\modelos;

use AppMongo\modelos\Reserva;
use AppMongo\modelos\Usuario;
use AppMongo\modelos\Sala;
use MongoDB\BSON\ObjectId;


class ModeloReservas{

    public static function crearReserva($reserva){
        $conexion = new ConexionBD();
        $conexion->getConexion()->reservas->insertOne(['correo_usuario' => $reserva->getCorreoUsuario(),
            'nombre_sala' => $reserva->getNombreSala(), 'fecha_reserva' => $reserva->getFechaReserva(),
            'hora_inicio' => $reserva->getHoraInicio(), 'hora_fin' => $reserva->getHoraFin(),
            'estado' => $reserva->getEstado()]);
        $conexion->cerrarConexion();

    }

    public static function existeReservaPorRango($nombre_sala, $fecha_reserva, $hora_inicio, $hora_fin) {

        $conexion = new ConexionBD();
        $coleccion = $conexion->getConexion()->reservas; // Reemplazar por el nombre de tu colección

        // Construir la consulta
        $query = [
            'fecha_reserva' => $fecha_reserva,
            'nombre_sala' => $nombre_sala,
            'estado' => 'confirmada',
            '$or' => [
                // Verificar si $hora_inicio está dentro de un rango existente
                [
                    '$and' => [
                        ['hora_inicio' => ['$lte' => $hora_inicio]],
                        ['hora_fin' => ['$gte' => $hora_inicio]]
                    ]
                ],
                // Verificar si $hora_fin está dentro de un rango existente
                [
                    '$and' => [
                        ['hora_inicio' => ['$lte' => $hora_fin]],
                        ['hora_fin' => ['$gte' => $hora_fin]]
                    ]
                ],
                // Verificar si el rango existente está completamente dentro del nuevo rango
                [
                    '$and' => [
                        ['hora_inicio' => ['$gte' => $hora_inicio]],
                        ['hora_fin' => ['$lte' => $hora_fin]]
                    ]
                ],
                // Verificar si el rango existente incluye al nuevo rango
                [
                    '$and' => [
                        ['hora_inicio' => ['$lte' => $hora_inicio]],
                        ['hora_fin' => ['$gte' => $hora_fin]]
                    ]
                ]
            ]
        ];

        // Ejecutar la consulta
        $resultado = $coleccion->countDocuments($query);
        // Retornar verdadero si hay al menos un documento que coincide
        return $resultado > 0;
    }

    public static function cancelarReserva($id)
    {
        $conexion = new ConexionBD();
        $idMongo = new ObjectId($id);
        $conexion->getConexion()->reservas->updateOne(['_id' => $idMongo], ['$set' => ['estado' => 'cancelada']]);
        $conexion->cerrarConexion();
    }


    public static function obtenerReservasPorEmail($email)
    {
        // Crear la conexión a la base de datos
        $conexion = new ConexionBD();

        // Realizar la consulta en la colección "reservas"
        $consulta = $conexion->getConexion()->reservas->find([
            'correo_usuario' => $email,
            'estado' => 'confirmada'
        ]);

        // Cerrar la conexión
        $conexion->cerrarConexion();
        // Crear un array vacío para almacenar los resultados
        $reservas = [];
        foreach ($consulta as $reserva) {
            // Convertir cada resultado en un objeto Reserva
            $reservas[] = new Reserva($reserva);
        }

        return $reservas;
    }

    public static  function mostrarReservasPorNombreSala($nombreSala)
    {
        // Crear la conexión a la base de datos
        $conexion = new ConexionBD();

        // Realizar la consulta en la colección "reservas"
        $consulta = $conexion->getConexion()->reservas->find([
            'nombre_sala' => $nombreSala,
            'estado' => 'confirmada'
        ]);

        // Cerrar la conexión
        $conexion->cerrarConexion();
        // Crear un array vacío para almacenar los resultados
        $reservas = [];
        foreach ($consulta as $reserva) {
            // Convertir cada resultado en un objeto Reserva
            $reservas[] = new Reserva($reserva);
        }

        return $reservas;
    }

}


