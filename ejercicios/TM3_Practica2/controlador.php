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
        barajarSessionBaraja();
        $carta = pedirMazoDeCartas();
        if ($carta !== null) {
            $_SESSION["cartas_mostradas"][] = $carta;
            // Comprobar si hay un ganador después de mostrar la carta
            ganadorJuegoCartas($carta);
        }
        header("Location: index.php");
        exit;
    }

    // Reiniciar juego
    if (strcmp($_GET["accion"], "ReiniciarJuego") === 0) {
        reiniciarPartida();
        header("Location: index.php");
        exit;
    }

    // Reiniciar juego
    if (strcmp($_GET["accion"], "ReiniciarPuntuaciones") === 0) {
        reiniciarPuntuaciones();
        reiniciarPartida();
        header("Location: index.php");
        exit;
    }
}
?>




