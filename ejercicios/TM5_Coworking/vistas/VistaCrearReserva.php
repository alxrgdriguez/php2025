<?php

namespace App\vistas;

class VistaCrearReserva {

    public static function render($error) {
        include("cabecera.php");
        ?>

        <div class="container mt-5">
            <h2>Crear Reserva</h2>
            <form method="POST" action="index.php">
                <!-- Campo para correo del usuario -->
                <div class="mb-3">
                    <label for="correo_usuario" class="form-label">Correo del Usuario</label>
                    <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" required>
                </div>

                <!-- Campo para seleccionar la sala -->
                <div class="mb-3">
                    <label for="nombre_sala" class="form-label">Sala</label>
                    <select class="form-select" id="nombre_sala" name="nombre_sala" required>
                        <option value="" disabled selected>Seleccionar Sala</option>
                        <!-- Ejemplo de opciones para las salas -->
                        <option value="Sala 1">Sala 1</option>
                        <option value="Sala 2">Sala 2</option>
                        <option value="Sala 3">Sala 3</option>
                    </select>
                </div>

                <!-- Campo para la fecha de reserva -->
                <div class="mb-3">
                    <label for="fecha_reserva" class="form-label">Fecha de Reserva</label>
                    <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" required>
                </div>

                <!-- Campo para hora de inicio -->
                <div class="mb-3">
                    <label for="hora_inicio" class="form-label">Hora de Inicio</label>
                    <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" required>
                </div>

                <!-- Campo para hora de fin -->
                <div class="mb-3">
                    <label for="hora_fin" class="form-label">Hora de Fin</label>
                    <input type="time" class="form-control" id="hora_fin" name="hora_fin" required>
                </div>

                <!-- Campo para seleccionar el estado de la reserva -->
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado de la Reserva</label>
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="confirmada">Confirmada</option>
                        <option value="cancelada">Cancelada</option>
                    </select>
                </div>

                <!-- Botón para enviar el formulario -->
                <button type="submit" class="btn btn-primary">Crear Reserva</button>
            </form>
        </div>

        <?php
        include("pie.php");
    }
}
