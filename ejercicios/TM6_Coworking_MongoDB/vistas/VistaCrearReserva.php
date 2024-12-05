<?php

namespace AppMongo\vistas;

class VistaCrearReserva {

    public static function render($salas, $error) {
        include("cabecera.php");
        ?>

        <div class="container mt-5">
            <h2>Crear Reserva</h2>
            <?php
            if ($error !== "") {
                echo "<p class='text-danger'>{$error}</p>";
            }
            ?>
            <form method="POST" action="index.php">

                <!-- Campo para seleccionar la sala -->
                <div class="mb-3">
                    <label for="nombre_sala" class="form-label">Sala</label>
                    <select class="form-select" id="nombre_sala" name="nombre_sala" required>
                        <?php
                        foreach ($salas as $index => $sala) {
                            if ($index === 0) {
                                echo "<option value=\"".$sala."\" selected>".$sala."</option>";
                            } else {
                                echo "<option value=\"".$sala."\">".$sala."</option>";
                            }

                        }
                        ?>
                    </select>
                </div>

                <!-- Campo para la fecha de reserva -->
                <div class="mb-3">
                    <label for="fecha_reserva" class="form-label">Fecha de Reserva</label>
                    <input type="date" class="form-control" id="fecha_reserva" name="fecha_reserva" min="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <!-- Campo para hora de inicio -->
                <div class="mb-3">
                    <label for="hora_inicio_reserva" class="form-label">Hora de Inicio</label>
                    <select class="form-control" id="hora_inicio_reserva" name="hora_inicio_reserva">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                </div>

                <!-- Campo para hora de fin -->
                <div class="mb-3">
                    <label for="hora_fin_reserva" class="form-label">Hora de Fin</label>
                    <select class="form-control" id="hora_fin_reserva" name="hora_fin_reserva">
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                </div>

                <!-- Botón para enviar el formulario -->
                <button type="submit" name="crear_reserva" class="btn btn-primary">Crear Reserva</button>
            </form>
            <br>
        </div>

        <?php
        include("pie.php");
    }
}
