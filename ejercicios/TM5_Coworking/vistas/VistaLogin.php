<?php

namespace App\vistas;

class VistaLogin{
    public static function render($error)
    {
        // Incluimos la cabecera
        include("cabecera.php");
?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- Formulario de Login -->
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4 class="mb-0 text-center">Iniciar sesión</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            if (strlen($error) > 0) {
                                echo "<p class='text-danger'>{$error}</p>";
                            }
                            ?>
                            <form method="POST" action="index.php">
                                <div class="mb-3">
                                    <label for="emailLogin" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="emailLogin" name="email" placeholder="Ingresa tu correo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordLogin" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="passwordLogin" name="password" placeholder="Ingresa tu contraseña" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" name="login">Iniciar sesión</button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <p>¿No tienes cuenta? <a href="#registro" class="text-decoration-none">Regístrate aquí</a></p>
                    </div>

                    <!-- Formulario de Registro -->
                    <div class="card mt-5" id="registro">
                        <div class="card-header">
                            <h4 class="mb-0 text-center">Registrarse</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="index.php">
                                <div class="mb-3">
                                    <label for="nombreRegistro" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombreRegistro" name="nombre" placeholder="Ingresa tu nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="emailRegister" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="emailRegister" name="email" placeholder="Ingresa tu correo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordRegister" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="passwordRegister" name="password" placeholder="Ingresa tu contraseña" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" name="registro">Registrarse</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Incluimos el pie de página
        include("pie.php");
    }
}
