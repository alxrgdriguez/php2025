<?php
session_start();
if(isset($_SESSION['usuario_conectado'])){
    header("Location: proyectos.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Proyectos - Alejandro
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
</head>

<body class="g-sidenav-show  bg-gray-200">
<?php
if (isset($_SESSION['usuario_conectado'])) {
    include "cabecera.php";
}
?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
         data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pagina</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Registro - Login</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Registro - Login</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                </div>
                <?php
                    include "nav.php";
                ?>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Formulario de registro / inicio de sesion</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card my-4">
                                        <div class="card-body px-4 pb-2">
                                            <div class="row">
                                                <!-- Formulario de Registro -->
                                                <div class="col-md-6">
                                                    <div class="border p-4 rounded shadow-sm">
                                                        <h6 class="text-capitalize">Registro</h6>
                                                        <form id="registro-form" class="mb-4" action="controlador.php" method="POST">
                                                            <div class="mb-3">
                                                                <label for="usuario-registro" class="form-label">Usuario</label>
                                                                <input type="text" class="form-control" name="usuario" style="border: 1px solid #ced4da;" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="correo-registro" class="form-label">Correo</label>
                                                                <input type="email" class="form-control" name="correo" style="border: 1px solid #ced4da;" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="contraseña-registro" class="form-label">Contraseña</label>
                                                                <input type="password" class="form-control" minlength="8" name="contrasena" style="border: 1px solid #ced4da;" required>
                                                            </div>
                                                            <button type="submit" name="registrarse" class="btn btn-primary w-100">Registrarse</button>
                                                        </form>
                                                    </div>
                                                </div>

                                                <!-- Espaciado -->
                                                <div class="col-md-6">
                                                    <div class="border p-4 rounded shadow-sm">
                                                        <h6 class="text-capitalize">Iniciar Sesión</h6>
                                                        <form id="login-form" action="controlador.php" method="POST">
                                                            <div class="mb-3">
                                                                <label for="correo-registro" class="form-label">Correo</label>
                                                                <input type="email" class="form-control" name="correo" style="border: 1px solid #ced4da;" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="contraseña-login" class="form-label">Contraseña</label>
                                                                <input type="password" class="form-control" name="contrasena" style="border: 1px solid #ced4da;" required>
                                                            </div>
                                                            <button type="submit" name="login" class="btn btn-primary w-100">Iniciar Sesión</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>