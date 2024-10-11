<?php
include "cabecera.php";
?>

<h1>Produtos</h1>
<div class="container mt-5">
    <div class="row">
        <?php
        $iphones = [
            [
                'imagen' => './img/iphone_14.jpg',
                'nombre' => 'iPhone 14',
                'precio' => 999.99
            ],
            [
                'imagen' => './img/iphone_14_pro.jpg',
                'nombre' => 'iPhone 14 Pro',
                'precio' => 1099.99
            ],
            [
                'imagen' => './img/iphone_14_pro_max.jpg',
                'nombre' => 'iPhone 14 Pro Max',
                'precio' => 1199.99
            ],
            [
                'imagen' => './img/iphone_14.jpg',
                'nombre' => 'iPhone 13',
                'precio' => 799.99
            ],
            [
                'imagen' => './img/iphone_14_pro.jpg',
                'nombre' => 'iPhone 13 Pro',
                'precio' => 699.99
            ],
            [
                'imagen' => './img/iphone_14_pro_max.jpg',
                'nombre' => 'iPhone 13 pro Max',
                'precio' => 429.99
            ],
            [
                'imagen' => './img/iphone_14.jpg',
                'nombre' => 'iPhone 12',
                'precio' => 699.99
            ],
            [
                'imagen' => './img/iphone_14_pro.jpg',
                'nombre' => 'iPhone 12 Pro',
                'precio' => 999.99
            ],

            [
                'imagen' => './img/iphone_14_pro_max.jpg',
                'nombre' => 'iPhone 11 Pro Max',
                'precio' => 350.99
            ],
        ];

        foreach ($iphones as $iphone) {
            echo '<div class="col-md-4 mb-4">';
            echo '    <div class="card">';
            echo '        <img src="' . $iphone['imagen'] . '" class="card-img-top" alt="' . $iphone['nombre'] . '">';
            echo '        <div class="card-body">';
            echo '            <h5 class="card-title">' . $iphone['nombre'] . '</h5>';
            echo '            <p class="card-text">$' . number_format($iphone['precio'], 2) . '</p>';
            echo '            <a href="#" class="btn btn-primary">Comprar</a>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>
</div>


</body>
</html>




