<?php

namespace App\controladores;

use App\modelos\ModeloReservas;
use App\modelos\ModeloSalas;
use App\modelos\Reserva;
use App\vistas\VistaCrearReserva;
use App\vistas\VistaReservas;
use App\vistas\VistaSalas;

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

  public static function crearReserva($reserva){

        if($reserva->getHoraFin() <= $reserva->getHoraInicio()){
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
