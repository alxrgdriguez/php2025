<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Ejemplo PHP</h2>

    <?php
    //Ejemplo de comentario
    echo "<strong>Generado desde PHP</strong>";

    /*
            Declaración de variables
    */
    $precio = 5.6;  //La variable precio es un decimal

    echo "<br>El precio es " . $precio;

    $precio = "Cinco como seis";  //La variable precio es una cadena

    echo "<br>El precio es " . $precio . "<br>";

    var_dump($precio); //Depurar el valor de las variables, especialmente objetos y arrays


    $mayorEdad = 0; //Falso: 0, null, array vacío

    if ($mayorEdad) {
        echo "Soy mayor";
    }

    $pib = 3.5E7; //float
    echo $pib;

    echo "<br>";
    echo 'Mc\'Donald';

    echo "<br><a href='http://www.marca.com'>Link</a>";
    echo '<br><a href="http://www.google.es">Link</a><br>';

    $frutas = array("pera", "manzana", "plátano");
    $numeros = [1, 2, 3, 4];

    for ($i = 0; $i < count($numeros); $i++) {
        echo $numeros[$i] . "<br>";
    }

    echo "<br>" . $frutas[1];

    $frutas[5] = "melón";
    $frutas[6] = "naranja";

    echo "frutas<br>";
    foreach ($frutas as $fruta) {
        echo $fruta . "<br>";
    }

    //Arrays asociativos
    $persona1 = array("nombre" => "Juan", "edad" => 25, "sexo" => "H");
    $persona2 = array("nombre" => "Pepe", "edad" => 30, "sexo" => "H");

    $personas = array($persona1, $persona2);

    foreach ($personas as $persona) {
        foreach ($persona as $valor) {
            echo $valor . " ";
        }
        echo "<br>";
    }

    foreach ($persona1 as $clave => $valor) {
        echo $clave . " -> " . $valor . "<br>";
    }

    phpinfo();

    ?>

    <a href="http://localhost:8080/otro.php?id=3&nombre=pepe">Otro php</a>

    <?= "<br>Esto es más rápido aún" ?>

    <p>Fin de página</p>
</body>

</html>