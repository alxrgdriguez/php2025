<?php

/**
 * Función para crear el mazo de cartas.
 * @return array El mazo de cartas.
 */
function crearMazo()
{
    $rutaCartasImg = "./cartas";
    $baraja = [];
    $palos = ["corazones", "diamantes", "picas", "rombos"];
    $numeros = [1, 2, 3, 4, 5, 6, 7, 11, 12, 13]; // Se eliminan 8, 9 y 10 aquí

    foreach ($palos as $palo) {
        foreach ($numeros as $numero) {
            // Guardamos el valor y el nombre de cartas correspondientes
            $nombre = '';
            $valor = 0;

            switch ($numero) {
                case 1:
                    $nombre = "A"; // As
                    $valor = 0.5;  // Valor para As
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

            // Comprobar que las imágenes coinciden con el tipo
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

            $carta = [
                "palo" => $palo,
                "carta" => $nombre,
                "img" => $img,
                "valor" => $valor
            ];

            $baraja[] = $carta; // Agregar la carta al mazo
        }
    }
    return $baraja;
}

/**
 * Pedir una carta del mazo de cartas que se pasa por parámetro.
 * @param array|null $mazoDeCartas
 * @return array|null La carta pedida o null si el mazo está vacío.
 */
function pedirMazoDeCartas() {
    return array_shift($_SESSION["baraja"]); // Retorna la primera carta y la elimina del mazo
}

/**
 * Función para determinar el ganador de la partida.
 * @param array $carta
 * @return void
 */
function ganadorJuegoCartas($carta) {
    if(!isset($_SESSION["puntuacion"])){
        $_SESSION["puntuacion"] = 0;
    }
    $_SESSION["puntuacion"] += $carta["valor"];

    if ($_SESSION["puntuacion"] === 7.5) {
        header("Location: index.php?resultado=JugadorGana");
        exit; // Siempre es bueno terminar el script después de redirigir
    } elseif ($_SESSION["puntuacion"] > 7.5) {
        header("Location: index.php?resultado=JugadorPierde");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}

/**
 * Reiniciar partida.
 * @return array Un nuevo mazo de cartas y un arreglo vacío para cartas mostradas.
 */
function reiniciarPartida() {
    $_SESSION["baraja"] = crearMazo();
    unset($_SESSION["cartas_mostradas"]);
    unset($_SESSION["puntuacion"]);

}

function reiniciarPuntuaciones() {
    unset($_SESSION["totalPartidas"]);
    unset($_SESSION["partidasGanadas"]);
    unset($_SESSION["partidasPerdidas"]);
}

/**
 * Barajar mazo de cartas.
 * @param array $mazo
 * @return void
 */
function barajarSessionBaraja() {
    return shuffle($_SESSION["baraja"]);
}

?>
