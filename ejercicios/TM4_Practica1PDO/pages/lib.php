<?php
include "modelo.php";



/**
 * Función para calcular el número de días transcurridos entre dos fechas
 * @param $fechaInicio
 * @return string
 * @throws DateMalformedStringException
 */
function diasTranscurridos($fechaInicio, $fechaFin)
{
    $fechaActual = new DateTime($fechaFin);
    $fechaInicioActual = new DateTime($fechaInicio);
    $dias = $fechaActual->diff($fechaInicioActual)->format('%a dias'); // %a saca el calculo de los dias transcurridos
    return $dias;
}








?>