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
    <style>
        .navbar {
            background-color: #0056b3; /* Color de fondo profesional */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.8rem;
            color: #fff;
        }
        .search-input {
            width: 300px;
            border-radius: 25px;
            padding: 10px;
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
        <a class="navbar-brand" href="#">Coworking</a>

        <!-- Barra de búsqueda -->
        <form class="d-flex ms-auto">
            <input class="form-control me-2 search-input" type="search" placeholder="Buscar..." aria-label="Buscar">
            <button class="btn btn-outline-light" type="submit">Buscar</button>
        </form>
    </div>
</nav>

<!-- Barra de navegación secundaria con enlaces -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-home"></i> Salas Disponibles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-cogs"></i> Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-calendar-check"></i> Reservas</a>
        </ul>
    </div>
</nav>


