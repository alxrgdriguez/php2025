<ul class="navbar-nav  justify-content-end">
    <li class="nav-item d-flex align-items-center">
    </li>
    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
        <a href="javascript:" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
            </div>
        </a>
    </li>
    <?php
    if (!isset($_SESSION['usuario_conectado'])) {
    ?>
    <li class="nav-item d-flex align-items-center">
        <a href="login.php" class="nav-link text-body font-weight-bold px-0">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-sm-inline d-none">Iniciar Sesion / Registrarse</span>
        </a>
    </li>
    <?php
    } else {
    ?>
        <li class="nav-item d-flex align-items-center">
            <a href="#" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Bienvenid@ <?php echo $_SESSION['usuario_conectado']['email']?></span>
            </a>
        </li>
    <?php
    }
    ?>
</ul>