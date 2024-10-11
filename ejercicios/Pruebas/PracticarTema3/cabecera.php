<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejemplo de Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2">Inicio</a></li>
            <li><a href="productos.php" class="nav-link px-2">Productos</a></li>

        </ul>

        <div class="col-md-3 text-end">
            <?php
            if (!isset($_SESSION['usuario_conectado'])) {
                echo '
                 <a href="login.php">
                <button type="button" class="btn btn-outline-primary me-2">Login</button>
                </a>
                <a href="registro.php">
                <button type="button" class="btn btn-primary">Sign-up</button>
                </a>
                ';
            }else{
                echo '<p>'.$_SESSION['usuario_conectado']['email'].'</p>';
                echo '
                 <a href="controladores.php?accion=cerrarSesion">
                <button type="button" class="btn btn-danger">Cerrar Sesion</button>
                </a>';
            }

            ?>

            <a href="carro.php">
                <img src="./img/carro.png" width="42px" height="42px" alt="">
            </a>

        </div>
    </header>
