<!-- cabecera.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coworking</title>
    <!-- Vinculando Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos Bootstrap y Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .navbar {
            background-color: #0056b3; /* Color de fondo profesional */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 2rem;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }
        .search-input {
            width: 300px;
            border-radius: 25px;
            padding: 10px;
        }
        .card-body {
            padding: 2rem;
        }
        .form-control {
            border-radius: 0.375rem;
        }
        .btn {
            border-radius: 0.375rem;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #f7f7f7;
            border-bottom: 2px solid #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        .form-container {
            display: flex;
            margin: 50px;
            justify-content: space-between;
            gap: 2rem;
            flex-wrap: wrap;
        }
        .card-container {
            flex-basis: 48%;
            margin-bottom: 1.5rem;
        }
        .toggle-btn {
            border: none;
            background: transparent;
            color: #007bff;
            font-size: 1rem;
            text-decoration: underline;
        }
        .toggle-btn:hover {
            color: #0056b3;
        }
        .icon {
            font-size: 1.2rem;
            color: #007bff;
        }
        .input-group-text {
            background-color: #f7f7f7;
            border-color: #ccc;
        }
        .form-container .card-body {
            padding: 2rem;
        }
        .navbar-nav .nav-item .nav-link {
            color: white !important;
            font-weight: 600;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #f8f9fa !important;
            text-decoration: underline;
        }

        /* Estilos del Footer */
        footer {
            background-color: #343a40; /* Fondo oscuro */
            color: white;
            padding: 40px 0;
        }
        footer a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            margin: 0 15px;
            transition: all 0.3s ease;
        }
        footer a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        footer .social-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        footer .social-icons i:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<!-- Navbar superior con logo, búsqueda y login -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!-- Persona/Login en la izquierda -->
        <a class="navbar-brand" href="index.php">Coworking</a>

        <!-- Barra de búsqueda -->
        <form class="d-flex ms-auto">
            <?php
            if (isset($_SESSION['usuario'])) {
                $nombreUsuario = $_SESSION['usuario']['email'];
                echo '
                    <input class="form-control me-2 search-input" type="search" placeholder="Buscar..." aria-label="Buscar">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                    <div class="d-flex align-items-center">
                        <button class="btn btn-dark mx-3 me-2 d-flex align-items-center shadow-lg border-0 rounded-pill px-2 py-2" type="button">
                            <i class="fas fa-user-circle fs-4 me-2"></i> ' . ($nombreUsuario) . '
                        </button>
                        <a href="index.php?accion=cerrarSesion" class="btn btn-danger me-4 px-3 mx-2">
                            <i class="fas fa-sign-out-alt mt-2"></i> Cerrar sesión
                        </a>
                    </div>';
            }
            ?>
        </form>
    </div>
</nav>

<!-- Barra de navegación secundaria con enlaces -->
<?php
if (isset($_SESSION['usuario'])) {
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Salas Disponibles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-calendar-check"></i> Mis Reservas</a>
        </ul>
    </div>
</nav>
    ';
}
?>


