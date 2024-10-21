<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Tabla proyectos</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="d-flex justify-content-start mb-3 ps-3">
                    <a href="nuevoProyecto.php" class="btn btn-dark">Agregar Proyecto</a>
                </div>
                <div class="table-responsive p-0">

                    <table class="table align-items-center justify-content-center mb-0">
                        <thead>
                        <tr>
                            <th  class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Proyectos</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha Inicio</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha Fin</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dias Transcurridos</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Estado</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($_SESSION['proyectos'])) {
                            foreach ($_SESSION['proyectos'] as $proyecto) {
                                echo "
                                <tr>
                            <td class='border-3'>
                                <div class='d-flex px-2'>
                                    <div class='my-auto'>
                                         <a href='verProyecto.php?id={$proyecto['id']}'><h6 class='enlaces_proyectos mb-0'>{$proyecto['nombre']}</h6></a>
                                    </div>
                                </div>
                            </td>
                            <td class='border-3'>
                                <p class='text-sm font-weight-bold mb-0'>{$proyecto['fechaInicio']}</p>
                            </td>
                            <td class='border-3'>
                                <p class='text-sm font-weight-bold mb-0'>{$proyecto['fechaFin']}</p>
                            </td>
                            <td class='border-3'>
                                <p class='text-sm font-weight-bold mb-0'>{$proyecto['dias']}</p>
                            </td>
                            <td class='align-middle text-center border-3'>
                                <div class='d-flex align-items-center justify-content-center'>
                                    <span class='me-2 text-sm font-weight-bold'>{$proyecto['estado']}</span>
                                    <div>
                                        <div class='progress'>
                                            <div class='progress-bar bg-gradient-info' role='progressbar' aria-valuenow='60'
                                                 aria-valuemin='0' aria-valuemax='100' style='width:{$proyecto['estado']};'></div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class='border-3'>
                                <div class='d-flex px-2 justify-content-center'>
                                    <a href='controlador.php?accion=EliminarUnProyecto&id={$proyecto['id']}'><i class='fa-solid fa-delete-left'></i></a>
                                </div>
                            </td>

                        </tr>
                                ";
                            }
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>