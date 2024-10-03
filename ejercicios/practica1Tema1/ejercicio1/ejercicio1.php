<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 1. Ejercicio 1</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div id="container">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./img/carrito.png" alt="Logo" width="50" height="54" class="d-inline-block align-text-top">
            </a>
            <h1 class="display-5 ">Carro de la Compra</h1>
        </div>
    </nav>


    <table class="table w-75 m-auto p-8">
        <tr class=" table-striped table-dark">
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>IVA</th>
            <th>Subtotal</th>

        </tr>
        <?php

        function subtotal($linea_pedido){
            $iva_r = $linea_pedido['iva_r'];
            $subtotal =  $linea_pedido["precio"] * $linea_pedido["cant"];

            if($iva_r === 0){
                $subtotal += $subtotal * 0.21;
            }else{
                $subtotal+= $subtotal * 0.10;
            }
            return $subtotal;
        }
        {

        }

        $carrito = [
            ["id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0],
            ["id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0],
            ["id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1],
            ["id" => 1237, "nombre" => "Samsung Galaxy S10", "precio" => 999.99, "cant" => 2, "iva_r" => 0],
            ["id" => 1238, "nombre" => "Google Pixel 4", "precio" => 799.00, "cant" => 3, "iva_r" => 0],
            ["id" => 1239, "nombre" => "OnePlus 7", "precio" => 649.99, "cant" => 1, "iva_r" => 0],
            ["id" => 1240, "nombre" => "Xiaomi Mi 9", "precio" => 499.99, "cant" => 4, "iva_r" => 0],
            ["id" => 1241, "nombre" => "Sony Xperia 1", "precio" => 999.99, "cant" => 1, "iva_r" => 0],
        ];

        $total = 0;
        foreach ($carrito as $carr){
            echo "<tr>";
            echo "<td>".$carr["id"]."</td>";
            echo "<td>".$carr["nombre"]."</td>";
            echo "<td>".$carr["precio"]."</td>";
            echo "<td>".$carr["cant"]."</td>";
            echo "<td>".$carr["iva_r"]."</td>";
            echo "<td>". subtotal($carr). "</td>";
            $total += subtotal($carr);
            echo"<tr>";
        }
        echo "<tr>";
        echo "<td class='text-end' colspan='5'>Total</td>";
        echo "<td>". $total ."</td>";
        echo "</tr>";
        ?>

    </table>
</div>
</body>

</html>



