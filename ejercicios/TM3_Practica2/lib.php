<?php

/**
 * Funcion para crear la baraja de cartas
 * @return void
 */
function crearMazo()
{
    $rutaCartasImg = "./cartas";
    $baraja = array();
    $palos = array("corazones", "diamantes", "picas", "rombos");
    $numeros = array(1,2,3,4,5,6,7,8,9,10,11,12,13);

    foreach ($palos as $palo) {
        foreach ($numeros as $numero) {
            if ($numero == 8 || $numero == 9 || $numero == 10) {
                continue; // quitar 8, 9 y 10
            }

            // Guardamos el valor y el nombre de cartas correspondientes
            $nombre = '';
            $valor = 0;

            switch ($numero) {
                case 1:
                    $nombre = "A"; // A
                    $valor = 0.5;  // Valor para A
                    break;
                case 11:
                    $nombre = "J"; // J
                    $valor = 0.5;  // Valor para J
                    break;
                case 12:
                    $nombre = "Q"; // Q
                    $valor = 0.5;  // Valor para Q
                    break;
                case 13:
                    $nombre = "K"; // K
                    $valor = 0.5;  // Valor para K
                    break;
                default:
                    $nombre = (string)$numero; // Cartas del 2 al 7
                    $valor = $numero;           // Valor correspondiente
                    break;
            }

           // Comprobar que las imagenes coinciden con el tipo (corazones, diamantes, picas, rombos)

            $img = '';
            switch ($palo) {
                case "corazones":
                    $img = "{$rutaCartasImg}/c{$numero}.svg"; // c para corazones
                    break;
                case "diamantes":
                    $img = "{$rutaCartasImg}/d{$numero}.svg"; // d para diamantes
                    break;
                case "picas":
                    $img = "{$rutaCartasImg}/p{$numero}.svg"; // p para picas
                    break;
                case "rombos":
                    $img = "{$rutaCartasImg}/t{$numero}.svg"; // t para rombos
                    break;
            }

            $carta = array(
                "palo" => $palo,
                "carta" => $nombre,
                "img" => $img,
                "valor" => $valor
            );

            array_push($baraja, $carta);
        }
    }
    return $baraja;

}

?>
