<?php
include "cabecera.php";
?>

<style>

     .navbar{
        background-color: #1b1e21; !important;
    }

     .card{
         margin-top: 60px;
         margin-bottom: 30px;
     }

     .footer{
         margin-top:80px;
     }

     .navbar a .nav-link{
         color: white !important;
         display: none;
     }

     .text-dark{
         display: none !important;
     }

     .card-body button{
         margin-top: 20px;

     }

     .boton_registro{
         color: white;
     }

     .boton_registro:hover{
         color: white;
     }


</style>
<body>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <form role="form" action="controlador.php" method="POST">
                            <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
                            <p class="text-white-50 mb-5">Rellene el formulario para tener una cuenta</p>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <label class="form-label" for="nombre">Nombre*</label>
                                <input type="text" id="typeEmailX" required name="nombre" class="form-control form-control-lg" />
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <label class="form-label" for="email">Email*</label>
                                <input type="email" id="typeEmailX" required name="email" class="form-control form-control-lg" />
                            </div>

                            <div data-mdb-input-init class="form-outline form-white mb-4">
                                <label class="form-label" for="password">Password*</label>
                                <input type="password" id="typePasswordX" required name="password" minlength="8" class="form-control form-control-lg" />
                            </div>

                            <?php
                            if (isset($_GET['error'])) {
                                echo "<p class='text-danger'>Este email ya está en la base de datos</p>";
                            }
                            ?>

                            <div class="text-center">
                                <input type="submit" class="boton_registro btn bg-gradient-info w-100 mt-2 mb-0" name="registro">
                            </div>
                        </form>
                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "pie.php"
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>