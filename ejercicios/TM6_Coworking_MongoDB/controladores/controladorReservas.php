<?php

namespace AppMongo\controladores;

use AppMongo\modelos\ModeloReservas;
use AppMongo\modelos\ModeloSalas;
use AppMongo\modelos\Reserva;
use AppMongo\vistas\VistaCrearReserva;
use AppMongo\vistas\VistaMisReservas;
use AppMongo\vistas\VistaReservas;
use AppMongo\vistas\VistaSalas;
use DateTime;

class controladorReservas{

    public static function mostrarReservas($nombreSala){
        $reservas = ModeloReservas::mostrarReservasPorNombreSala($nombreSala);
        VistaReservas::render($reservas, $nombreSala);

    }

  public static function mostrarCrearReserva(){

        // mostrar vista de crear reserva
        $salas = ModeloSalas::obtenerNombreSalas();
        VistaCrearReserva::render($salas, "");
  }

  public static function mostrarMisReservas($email){

    // mostrar vista de crear reserva
    $reservas = ModeloReservas::obtenerReservasPorEmail($email);
    VistaMisReservas::render($reservas);
    }

  public static function crearReserva($reserva){
      $horaInicio = new DateTime($reserva->getHoraInicio());
      $horaFin = new DateTime($reserva->getHoraFin());

        if($horaFin <= $horaInicio){
            $salas = ModeloSalas::obtenerNombreSalas();
            VistaCrearReserva::render($salas, "La hora de fin debe ser mayor a la hora de inicio");
            exit();
        }

        if(ModeloReservas::existeReservaPorRango($reserva->getNombreSala(), $reserva->getFechaReserva(), $reserva->getHoraInicio(), $reserva->getHoraFin())){
            $salas = ModeloSalas::obtenerNombreSalas();
            VistaCrearReserva::render($salas, "La reserva ya existe");
            exit();
        }

        ModeloReservas::crearReserva($reserva);

        header("Location: index.php?accion=mostrarSalas");
        exit();

  }

  public static function cancelarReserva($id){
      ModeloReservas::cancelarReserva($id);
      header("Location: index.php?accion=mostrarSalas");
      exit();
  }

}
