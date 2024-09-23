<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>


<body>

    <h1>Ejercicio 1- Saludo Nombre</h1>
    <h2>Escribir un programa que pregunte al usuario su nombre, y luego lo salude.</h2>


</body>


<?php

/*
  Ejercicio 1 
  Escribir un programa que pregunte al usuario su nombre, y luego lo salude.
 */

if (!isset($_REQUEST['name'])) {
    echo '

    <form action="ejercicio1.php" method="get">
        <label for="nombre">
            <input type="text" name="name" id="nombre" placeholder="Escriba su nombre">
        </label>
        <input type="submit">
    </form>

    ';
} else {
    $name = $_REQUEST['name'];

    if (strlen($name) < 1) {
        echo "<h2> NO ERES NADIE <h2>";
        echo '<a href="/">Volver</a>';
    } else {
        echo "Tu nombre es {$name}";
    }
}

?>

</html>