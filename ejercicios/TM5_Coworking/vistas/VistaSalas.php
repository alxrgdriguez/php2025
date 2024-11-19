<?php

namespace App\vistas;

class VistaSalas {
    public static function render($salas) {
        include("cabecera.php");
        ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 shadow-lg">
                        <div class="card-header border-0 text-black-50 text-center">
                            <h3>Salas Disponibles</h3>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table table-striped table-hover align-items-center mx-auto mb-0" style="width: 80%;"> <!-- Centrado de la tabla -->
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nombre</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Capacidad</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Ubicación</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Reserva</th> <!-- Alineación de encabezado -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($salas as $sala) {
                                        ?>
                                        <tr class="align-middle">
                                            <td class="align-middle text-start">
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm"><?= $sala->getNombreSala() ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm font-weight-bold mb-0"><?= $sala->getCapacidad() ?></p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-xs font-weight-bold"><?= $sala->getUbicacion() ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex justify-content-center align-items-center">
                                                    <a href="index.php?accion=verReservas&nombreSala=<?= $sala->getNombreSala() ?>" class="btn btn-success btn-sm px-4 py-2 rounded-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalReserva">
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
