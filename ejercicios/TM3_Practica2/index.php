<?php
session_start();
include_once "lib.php";

// Asegúrate de inicializar las variables de sesión necesarias
if (!isset($_SESSION["cartas_mostradas"])) {
    $_SESSION["cartas_mostradas"] = [];
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Juego Siete y Media</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .card-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .card-image {
            width: 200px;
            transition: transform 0.3s;
        }
        .card-image:hover {
            transform: scale(1.05);
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 15px;
            border-radius: 8px;
        }
        .alert-custom {
            background-color: #007bff;
            color: white;
            border-radius: 8px;
        }

        h1{
            margin-top: 20px;
        }

        h2{
            font-size: 24px;
        }
    </style>
</head>

<body>

<div class="container">
    <h1 class="text-center header">JUEGO SIETE Y MEDIA</h1>
</div>

<h2 class="text-center mb-4 alert alert-custom w-50 mx-auto">Pincha en el Mazo de Cartas para comenzar el juego</h2>

<div class="container card-container d-flex flex-wrap">
    <?php
    echo "
          <a href='controlador.php?accion=mostrar_carta'><img class='card-image' src='./cartas/dorso-rojo.svg' alt='Dorso Rojo'></a> 
        ";

    if (isset($_SESSION["baraja"])) {
        foreach ($_SESSION["cartas_mostradas"] as $cartaMostrada) {
            echo "<a href=''><img class='card-image' src='{$cartaMostrada["img"]}'></a>";

        }
    }
    ?>
</div>
<div class="container card-container">
    <?php
    // Comprobar si las cartas se han mostrado mostrar botón de reiniciar si no pues no se muestra nada porque aún no se ha empezado a jugar
    if (isset($_SESSION["cartas_mostradas"]) && (count($_SESSION["cartas_mostradas"]) != 0)) {
        echo "<a href='controlador.php?accion=ReiniciarJuego' class='btn btn-primary d-flex mt-4 justify-content-center '>Reinciar Juego</a>";
    }
    ?>
</div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
