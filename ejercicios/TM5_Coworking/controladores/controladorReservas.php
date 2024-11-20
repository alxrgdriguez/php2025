<?php

namespace App\controladores;

use App\modelos\ModeloReservas;
use App\modelos\ModeloSalas;
use App\vistas\VistaCrearReserva;
use App\vistas\VistaReservas;
use App\vistas\VistaSalas;

class controladorReservas{

    public static function mostrarReservas($nombreSala){
        $reservas = ModeloReservas::mostrarReservasPorNombreSala($nombreSala);
        VistaReservas::render($reservas, $nombreSala);

    }

  public static function crearReserva($nombreSala){

        // mostrar vista de crear reserva
        $reserva = ModeloReservas::crearReserva($nombreSala);
        VistaCrearReserva::render($reserva);
  }

}
