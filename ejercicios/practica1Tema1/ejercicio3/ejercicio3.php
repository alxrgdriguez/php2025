<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3. Alejandro Rodriguez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/jpg" href="./imagenes/favicon.svg"/>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            transition: transform 0.2s;
            padding: 10px;

        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px 0;
        }

        h5{
            font-size: 50px;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            width: 100%;

        }
    </style>
</head>
<?php
$personajes = [
    "1" => [
        "nombre" => "Tracer",
        "rol" => "DPS",
        "dano" => 120,  // daño por segundo
        "vida" => 150,
        "habilidades" => ["Blink", "Recall", "Pulse Bomb"],
        "imagen" => "./imagenes/tracer.png",
        "descripcion" => "Una heroína rápida y ágil que utiliza su velocidad y movilidad para desorientar a sus enemigos."
    ],
    "2" => [
        "nombre" => "Reinhart",
        "rol" => "Tanque",
        "dano" => 75,
        "vida" => 300,
        "habilidades" => ["Charge", "Fire Strike", "Barrier Field"],
        "imagen" => "./imagenes/reinhardt.png",
        "descripcion" => "Un caballero blindado que protege a su equipo con su escudo y lanza ataques poderosos."
    ],
    "3" => [
        "nombre" => "Mercy",
        "rol" => "Soporte",
        "dano" => 0,
        "vida" => 200,
        "habilidades" => ["Caduceus Staff", "Guardian Angel", "Resurrect"],
        "imagen" => "./imagenes/mercy.png",
        "descripcion" => "Una médica de combate que puede curar y revivir a sus compañeros de equipo, asegurando su supervivencia."
    ],
    "4" => [
        "nombre" => "D.Va",
        "rol" => "Tanque",
        "dano" => 200,
        "vida" => 600,
        "habilidades" => ["Defense Matrix", "Boosters", "Self-Destruct"],
        "imagen" => "./imagenes/dva.png",
        "descripcion" => "Una piloto de mech que combina su agilidad y poder de fuego para dominar el campo de batalla."
    ],
    "5" => [
        "nombre" => "Widowmaker",
        "rol" => "DPS",
        "dano" => 15,
        "vida" => 200,
        "habilidades" => ["Grappling Hook", "Infra-Sight", "Venom Mine"],
        "imagen" => "./imagenes/widowmaker.png",
        "descripcion" => "Una francotiradora fría y calculadora, famosa por su precisión letal y su habilidad para jugar a la sombra."
    ],
    "6" => [
        "nombre" => "Genji",
        "rol" => "DPS",
        "dano" => 140,
        "vida" => 200,
        "habilidades" => ["Shuriken", "Deflect", "Dragonblade"],
        "imagen" => "./imagenes/genji.png",
        "descripcion" => "Un ninja cibernético que utiliza su velocidad y habilidades de reflejo para desatar una devastadora ofensiva."
    ],
    "7" => [
        "nombre" => "Orisa",
        "rol" => "Tanque",
        "dano" => 200,
        "vida" => 200,
        "habilidades" => ["Fortify", "Halt!", "Supercharger"],
        "imagen" => "./imagenes/orisa.png",
        "descripcion" => "Un robot de asalto que proporciona protección y soporte a su equipo, capaz de detener a sus enemigos en su camino."
    ],
    "8" => [
        "nombre" => "Zenyatta",
        "rol" => "Soporte",
        "dano" => 48,
        "vida" => 150,
        "habilidades" => ["Orb of Destruction", "Transcendence", "Orb of Harmony"],
        "imagen" => "./imagenes/zenyatta.png",
        "descripcion" => "Un monje omnic que ofrece sanación y daño a sus aliados, usando orbes para proteger y potenciar a su equipo."
    ],
    "9" => [
        "nombre" => "Bastion",
        "rol" => "DPS",
        "dano" => 25,
        "vida" => 300,
        "habilidades" => ["Configuration: Sentry", "Reconfigure", "Self-Repair"],
        "imagen" => "./imagenes/bastion.png",
        "descripcion" => "Un robot que puede transformarse en una torreta, causando estragos en sus enemigos mientras se repara a sí mismo."
    ]
];
?>
<body>
<div class="header text-center">
    <h1>Personajes de Overwatch</h1>
    <p>Descubre los héroes del campo de batalla</p>
</div>
<div class="container mt-5">
    <div class="row">
        <?php

        foreach ($personajes as $info) {
            echo '<div class="col-md-4 mb-4">';
            echo '    <div class="card">';
            echo '        <img src="' . $info["imagen"] . '" class="card-img-top" alt="' . $info["nombre"] . '">';
            echo '        <div class="card-body">';
            echo '            <h5 class="card-title">' . $info["nombre"] . '</h5>';
            echo '            <p class="card-text"><i class="fas fa-shield-alt"></i> <strong>Rol:</strong> ' . $info["rol"] . '</p>';
            echo '            <p class="card-text"><i class="fas fa-bolt"></i> <strong>Daño:</strong> ' . $info["dano"] . '</p>';
            echo '            <p class="card-text"><i class="fas fa-heart"></i> <strong>Vida:</strong> ' . $info["vida"] . '</p>';
            echo '            <p class="card-text"><i class="fas fa-star"></i> <strong>Habilidades:</strong> ' . implode(", ", $info["habilidades"]) . '</p>';//implode, Une elementos de un array en un string
            echo '            <p class="card-text"><strong>Descripción:</strong> ' . $info["descripcion"] . '</p>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="footer text-center">
    <p>&copy; 2024 Personajes de Overwatch. Alejandro Rodriguez Gallardo.</p>
</div>
</body>
</html>


