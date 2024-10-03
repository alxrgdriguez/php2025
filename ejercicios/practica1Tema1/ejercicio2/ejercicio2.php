<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2. Alejandro Rodriguez</title>
</head>

<body>

    <header>

        <h1>Librería IES JAROSO</h1>

    </header>

    <?php
    $libros_img = "http://localhost:8088/practica1Tema1/ejercicio2/imagenes/";

    $libreria =
        [
            "ISBN" => "000000000000A",
            "titulo" => "Despierta y combate a los bárbaros que arruinan tu vida",
            "descripcion" => "Desde hace décadas estamos metidos en una guerra sin saberlo. Es diferente a las conocidas: no se moviliza armamento pesado ni carros de combate. Tampoco los soldados entran en acción. Es una guerra más sutil que no pretende conquistar territorios, sino personas. Y es posible que la mayoría de los conquistados no sean conscientes de que han sido dominados, y reaccionan con mansedumbre ante las directrices que les imponen. Los bárbaros, que son los impulsores de esta guerra, pretenden deconstruir la sociedad actual y crear un ilusorio Paraíso en la tierra, y para ello quieren destruir los pilares que sustentan nuestro modo de vida. Es la dictadura perfecta. Bajo apariencia de democracia se implanta una tiranía.",
            "categoria" => "historica",
            "editorial" => "LibrosLibres",
            "foto" => $libros_img . "/000000000000A.jpg",
            "precio" => "11,40€"
        ];

    echo "<img src= '{$libreria["foto"]}'>";

    ?>

</body>

</html>