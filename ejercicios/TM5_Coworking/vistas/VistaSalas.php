<?php

namespace App\vistas;

class VistaSalas{
    public static function render($salas){
        include("cabecera.php");
        ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Salas</h6>
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevoModulo">
                                Nueva Sala
                            </button>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">

                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Capacidad</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ubicacion</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reserva</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($salas as $sala) {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm"><?= $sala->getNombre(); ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0"><?= $sala->getCapacidad(); ?></p>
                                            </td>
                                            <td>
                                                <span class="text-xs font-weight-bold"><?= $sala->getUbicacion(); ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalReserva">Realizar Reserva</a>
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
        include ("pie.php");
    }
}


