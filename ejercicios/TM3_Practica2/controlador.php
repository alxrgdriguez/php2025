<?php
session_start();
include "lib.php";

// Inicializar el mazo y las cartas mostradas si no existen
if (!isset($_SESSION["baraja"])) {
    $_SESSION["baraja"] = crearMazo();
}
if (!isset($_SESSION["cartas_mostradas"])) {
    $_SESSION["cartas_mostradas"] = [];
}


// Procesar las acciones
if (isset($_GET["accion"])) {
    if (strcmp($_GET["accion"], "mostrar_carta") === 0) {
        $carta = pedirMazoDeCartas($_SESSION["baraja"]);
        if ($carta) {
            $_SESSION["cartas_mostradas"][] = $carta;
            // Comprobar si hay un ganador después de mostrar la carta
            ganadorJuegoCartas($_SESSION["cartas_mostradas"]);
        }
        header("Location: index.php");
        exit;
    }

    // Reiniciar juego
    if (strcmp($_GET["accion"], "ReiniciarJuego") === 0) {
        list($_SESSION["baraja"], $_SESSION["cartas_mostradas"]) = reiniciarPartida();
        header("Location: index.php");
        exit;
    }
}
?>




