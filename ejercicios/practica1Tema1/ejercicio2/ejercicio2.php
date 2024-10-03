<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2. Alejandro Rodriguez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <h1 class="text-center p-3">Librería IES JAROSO</h1>


    </div>

</body>

</html>

<?php
$libros_img = "http://localhost:8088/practica1Tema1/ejercicio2/imagenes/";
$libreria = [

    // Libros de Novela Historica

    [
        "ISBN" => "000000000000A",
        "titulo" => "Despierta y combate a los bárbaros que arruinan tu vida",
        "descripcion" => "Desde hace décadas estamos metidos en una guerra sin saberlo. Es diferente a las conocidas: no se moviliza armamento pesado ni carros de combate. Tampoco los soldados entran en acción. Es una guerra más sutil que no pretende conquistar territorios, sino personas. Y es posible que la mayoría de los conquistados no sean conscientes de que han sido dominados, y reaccionan con mansedumbre ante las directrices que les imponen. Los bárbaros, que son los impulsores de esta guerra, pretenden deconstruir la sociedad actual y crear un ilusorio Paraíso en la tierra, y para ello quieren destruir los pilares que sustentan nuestro modo de vida. Es la dictadura perfecta. Bajo apariencia de democracia se implanta una tiranía.",
        "categoria" => "Novela Historica",
        "editorial" => "LibrosLibres",
        "foto" => $libros_img . "/000000000000A.jpg",
        "precio" => "11.40€"
    ],

    [
        "ISBN" => "000000000000B",
        "titulo" => "Alpha et Omega: Volumen 1",
        "descripcion" => "En Alpha et Omega, el primer volumen de la Trilogía Magdala Tempus Fugit, seguimos a Anetta, una intrépida antropóloga canadiense, en una odisea fascinante donde el aroma de la lavanda y los susurros del pasado la guían hacia una verdad oculta durante siglos.",
        "categoria" => "Novela Historica",
        "editorial" => "Independently published",
        "foto" => $libros_img . "/000000000000B.jpg",
        "precio" => "17.99€"
    ],


    [
        "ISBN" => "000000000000C",
        "titulo" => "La hija del silencio",
        "descripcion" => "Tras varios años en el internado volvía a Múnich, una ciudad muy diferente a la que yo recordaba y donde me esperaban mis padres, mi pasado y miles de preguntas de las que no tenía respuesta… y que temía hacer en voz alta.",
        "categoria" => "Novela Histórica",
        "editorial" => "Anaya",
        "foto" => $libros_img . "/000000000000C.jpg",
        "precio" => "16.00€"
    ],

    [
        "ISBN" => "000000000000D",
        "titulo" => "La heredera del mar",
        "descripcion" => "1348. La Corona de Aragón vive una de sus épocas más convulsas. Una enfermedad terrible y desconocida llega al puerto de Barcelona y comienza a propagarse por sus calles cuando Marina Montaner, descendiente de un largo linaje de mercaderes valencianos, desembarca en una Ciudad Condal sumida en el caos. ",
        "categoria" => "Novela Historica",
        "editorial" => "GRIJALBO",
        "foto" => $libros_img . "/000000000000D.jpg",
        "precio" => "27.70€"
    ],

    [
        "ISBN" => "000000000000F",
        "titulo" => "El manuscrito de piedra",
        "descripcion" => "Salamanca, 1497. Fernando de Rojas, estudiante de Leyes y futuro autor de La Celestina, deberá investigar el asesinato de un catedrático de Teología en una ciudad llena de misterios y conflictos y en una época de gran agitación y cambio",
        "categoria" => "Novela Historica",
        "editorial" => "Booket",
        "foto" => $libros_img . "/000000000000F.jpg",
        "precio" => "11.35€"
    ],


    // Libros de Novela Negra

    [
        "ISBN" => "000000000000G",
        "titulo" => "POR OBRA Y GRACIA",
        "descripcion" => "Un delincuente de poca monta acaba de cumplir condena. En la misma puerta de la cárcel comete su último error, publica en internet una despiadada crítica sobre su estancia en prisión que se hace viral en redes sociales y medios de comunicación.",
        "categoria" => "Novela Negra",
        "editorial" => "Independently published",
        "foto" => $libros_img . "/000000000000G.jpg",
        "precio" => "14.99€"
    ],

    [
        "ISBN" => "000000000000H",
        "titulo" => "El sicario de Satán",
        "descripcion" => "Dos mendigos y dos prostitutas descuartizados en seis partes, el número 666 rasgado en la piel, una cruz satánica acuchillada en el pecho y la impronta del asesino grabada en el antebrazo: EL SICARIO DE SATÁN.",
        "categoria" => "Novela Negra",
        "editorial" => "Independently published",
        "foto" => $libros_img . "/000000000000H.jpg",
        "precio" => "16.33€"
    ],

    [
        "ISBN" => "000000000000I",
        "titulo" => "Un invitado inesperado",
        "descripcion" => "Los huéspedes que van llegando al encantador y remoto hotelito Mitchell's Inn se observan mutuamente con interés pero desde una prudente distancia. Todos ellos han recalado allí en busca de un relajante (quizá hasta romántico) fin de semana en medio del bosque y lejos de sus vidas. ",
        "categoria" => "Novela Negra",
        "editorial" => "Debolsillo",
        "foto" => $libros_img . "/000000000000I.jpg",
        "precio" => "10.40€"
    ],

    [
        "ISBN" => "000000000000J",
        "titulo" => "No es lo que parece",
        "descripcion" => "Parece una muerte natural, pero los acontecimientos dan un giro inesperado… Cuando el inspector Salazar y su nueva compañera comienzan a investigar, descubren que el caso que tienen entre manos no es lo que parece.",
        "categoria" => "Novela Negra",
        "editorial" => "Debolsillo",
        "foto" => $libros_img . "/000000000000J.jpg",
        "precio" => "13.67€"
    ],

    [
        "ISBN" => "000000000000K",
        "titulo" => "El ladrón de miedos",
        "descripcion" => "Un matrimonio, bajo los efectos de una nueva droga, ha cometido la mayor atrocidad de sus vidas. El hombre es Rodri, un exjugador de fútbol profesional.",
        "categoria" => "Novela Negra",
        "editorial" => "Luis David Pérez Pérez",
        "foto" => $libros_img . "/000000000000K.jpg",
        "precio" => "12.90€"
    ],

    // Libros de Cocina

    [
        "ISBN" => "000000000000L",
        "titulo" => "Cocina de 10 con Karlos Arguiñano",
        "descripcion" => "Con más de un millón de ejemplares vendidos de todos sus libros, este año Karlos Arguiñano alcanza una cifra redonda: su título número 10 publicado en editorial Planeta. Y qué mejor para hacerlo que un nuevo recetario donde el truco, de nuevo, reside en la sencillez, en reivindicar la cocina casera, de mercado, sana y sin elaboraciones que nos compliquen la vida",
        "categoria" => "Cocina",
        "editorial" => "Editorial Planeta",
        "foto" => $libros_img . "/000000000000L.jpg",
        "precio" => "23.70€"
    ],

    [
        "ISBN" => "000000000000M",
        "titulo" => "Cocina Mexicana Auténtica",
        "descripcion" => "¡Descubre el auténtico arte culinario de México en cada página de este irresistible libro de recetas",
        "categoria" => "Cocina",
        "editorial" => "Independently published",
        "foto" => $libros_img . "/000000000000M.jpg",
        "precio" => "10.95€"
    ],

    [
        "ISBN" => "000000000000N",
        "titulo" => "La Biblia saludable de MasterChef",
        "descripcion" => "Este libro recoge las mejores recetas para llevar una alimentación sana y cuidarte a ti y a los tuyos. Cocina de forma equilibrada con productos de temporada que, además de sabor, aportan energía para todos los días.",
        "categoria" => "Cocina",
        "editorial" => "Espasa",
        "foto" => $libros_img . "/000000000000N.jpg",
        "precio" => "20.80€"
    ],

    [
        "ISBN" => "000000000000O",
        "titulo" => "El arte de un buen arroz",
        "descripcion" => "El valenciano Héctor Medina comparte en estas páginas todos sus trucos para que ninguna receta se te resista. Conocido en redes como @elchefkent, sabe de buena tinta que puedes llegar a preparar arroces de restaurante en tu propia casa con solo un puñado de conceptos claros, y te ofrece las claves para elegir el tipo de arroz adecuado para cada ocasión y cómo cocinarlo para lograr el punto perfecto.",
        "categoria" => "Cocina",
        "editorial" => "Zenith",
        "foto" => $libros_img . "/000000000000O.jpg",
        "precio" => "19.95€"
    ],

    [
        "ISBN" => "000000000000P",
        "titulo" => "Cocinar el mediterráneo",
        "descripcion" => "Un homenaje a la cocina mediterránea de la mano de uno de los grandes referentes de la cocina mundial, Joan Roca, para disfrutar en casa de la mejor cocina del mundo, la mediterránea.",
        "categoria" => "Cocina",
        "editorial" => "Planeta Gastro",
        "foto" => $libros_img . "/000000000000P.jpg",
        "precio" => "23.90€"
    ],

];



function pintarLibro($libro) {}


?>