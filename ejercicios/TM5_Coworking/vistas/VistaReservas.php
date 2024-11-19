<?php

namespace  App\vistas;

class VistaReservas{

    public static function render($reservas, $sala) {
        include("cabecera.php");
        ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 shadow-lg">
                        <div class="card-header border-0 text-black-50 text-center">
                            <h3>Reservas realizadas <?php $sala ?></h3>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table table-striped table-hover align-items-center mx-auto mb-0" style="width: 80%;"> <!-- Centrado de la tabla -->
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Correo</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Fecha Reserva</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Hora Inicio</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Hora Fin</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Accion</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($reservas as $reserva) {
                                        ?>
                                        <tr class="align-middle">
                                            <td class="align-middle text-start">
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm"><?= echo $reserva->getNombre() ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm font-weight-bold mb-0"><?= $reserva->getCapacidad() ?></p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-xs font-weight-bold"><?= $reserva->getUbicacion() ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="index.php?accion=verReservas&id=?<?= $reserva->getNombre() ?>" class="btn btn-success btn-sm px-4 py-2 rounded-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalReserva">
                                                        <i class="bi bi-calendar-check"></i> Ver Reservas
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("pie.php");
    }
}
