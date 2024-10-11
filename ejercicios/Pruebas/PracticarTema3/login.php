<?php
include "cabecera.php"
?>

<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
<h1>Login</h1>

<main class="form-signin w-100 m-auto">
    <form action="controladores.php" method="POST" >
        <img class="mb-4" src="./img/amazon.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Log-In</h1>
        <?php

        if (isset($_GET['error'])) {
            if (strcmp($_GET['error'], "NoExiste") == 0){
                echo '<p class="text-danger">Correo y Contraseña no valida</p>';
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            }

        }


        ?>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="contrasenia">
            <label for="floatingPassword">Contraseña</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <input class="btn btn-primary w-100 py-2" type="submit" value="Inciar Sesion" name="boton_login">
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>
</main>


</body>
</html>
