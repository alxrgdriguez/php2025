<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducion a PHP</title>
</head>

<body>

    <h1>Sintaxis básica PHP</h1>

    <?php

    //Ejemplo comentario una linea
    /*Comentario
    mas de una linea*/

    echo "Hola Mundo, ESTOY EN PHP <br>";

    // Declaracion de variables

    $precio = 5.6;

    echo "<br> El precio es " . $precio;

    $precio = "Cadena"; // La variable es una cadena

    echo "<br> El precio es " . $precio;

    var_dump($precio); // Depurar el valor de las variables, especialmente objetos y arrays

    ?>

    <?= "<br>Esto es más rapido aún" ?>



    <p>Fin de la pagina</p>

</body>

</html>