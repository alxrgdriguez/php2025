<?php

namespace AppMongo\vistas;

class VistaLogin{
    public static function render($error){

        include "cabecera.php";
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 form-container">
                    <!-- Formulario de Login -->
                    <div class="card card-container">
                        <div class="card-header">
                            <h4 class="mb-0">Iniciar sesión</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="index.php">
                                <div class="mb-3">
                                    <?php
                                    if ($error === "Este usuario no existe") {
                                        echo "<p class='text-danger'>{$error}</p>";
                                    }
                                    ?>
                                    <label for="emailLogin" class="form-label">Correo electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope icon"></i></span>
                                        <input type="email" class="form-control" id="emailLogin" name="email" placeholder="Ingresa tu correo" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordLogin" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock icon"></i></span>
                                        <input type="password" class="form-control" id="passwordLogin" name="password" placeholder="Ingresa tu contraseña" required>
                                    </div>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary w-100" >Iniciar sesión</button>
                            </form>
                            <div class="text-center mt-3">
                                <p>¿No tienes cuenta? <a href="#registerForm" class="toggle-btn">Regístrate aquí</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario de Registro -->
                    <div class="card card-container" id="registerForm">
                        <div class="card-header">
                            <h4 class="mb-0">Registrarse</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="index.php">
                                <div class="mb-3">
                                    <?php
                                    if ($error === "Este usuario ya existe") {
                                        echo "<p class='text-danger'>{$error}</p>";
                                    }
                                    ?>
                                    <label for="nombreRegistro" class="form-label">Nombre</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user icon"></i></span>
                                        <input type="text" class="form-control" id="nombreRegistro" name="nombre" placeholder="Ingresa tu nombre" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="emailRegister" class="form-label">Correo Electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope icon"></i></span>
                                        <input type="email" class="form-control" id="emailRegister" name="email" placeholder="Ingresa tu correo" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordRegister" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock icon"></i></span>
                                        <input type="password" class="form-control" minlength="8" id="passwordRegister" name="password" placeholder="Ingresa tu contraseña" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="telefonoRegister" class="form-label">Teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone-alt icon"></i></span>
                                        <input type="tel" pattern="^[0-9]{9}$" class="form-control" minlength="9" maxlength="9" id="telefonoRegister" name="telefono" placeholder="Ingresa tu teléfono" required>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary w-100" name="registro" value="Registrarse">
                            </form>
                            <div class="text-center mt-3">
                                <p>¿Ya tienes cuenta? <a href="#emailLogin" class="toggle-btn">Inicia sesión aquí</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php
        include "pie.php";
    }
}

