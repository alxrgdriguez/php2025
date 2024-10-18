<?php
session_start();
include "cabecera.php";
?>

    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-md-7">
                    <div class="header-content">
                        <h3 class="header-title"><strong class="text-primary">Space</strong><span>X</span></h3>
                        <h4 class="header-subtitle">AVANZANDO EN LOS VUELOS ESPACIALES</h4>
                        <p>La innovación continua en el diseño y las operaciones de las naves espaciales es fundamental para garantizar que Dragon siga volando de forma segura hacia y desde la órbita terrestre. Esta nueva ruta contribuirá a que esto sea posible y, al mismo tiempo, mantendrá a salvo al público mientras trabajamos para convertirnos en una civilización espacial.</p>
                        <button class="btn btn-outline-light btn-flat">MAS INFO</button>
                    </div>  
                </div>
                <div class="col-md-5 d-none d-md-block">
                    <form class="header-form">
                        <div class="head"> Iniciar Sesion</div>
                        <div class="body">
                            <div class="form-group">
                                <input type="email" class="form-control" required name="emailLogin" placeholder="Email*">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" required name="passwordLogin" placeholder="Password*">
                            </div>
                        </div>
                        <div class="footer">
                            <button class="btn btn-primary btn-block">Autenticar</button>
                        </div>
                    </form> 
                </div>
            </div>  
        </div>
    </header>

    <section class="section" id="contact">
        <div class="container text-center">
            <h6 class="display-4 has-line">CONTACTO</h6>
            <p class="mb-5 pb-2"></p>

            <form role="form" method="POST" action="controlador.php">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group pb-1">
                            <input type="text" class="form-control" required placeholder="Nombre">
                        </div>

                        <div class="form-group ">
                            <input type="text" class="form-control" required name="apellidos" placeholder="Apellidos">
                        </div>

                        <div class="form-group pb-1">
                            <input type="email" class="form-control" required placeholder="Email">          
                        </div>
                    </div>
                    <div class="col-md-6">
                        <textarea name="" id="" cols="" rows="7" class="form-control" required placeholder="Mensaje"></textarea>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="registro" value="ENVIAR">
            </form>
        </div>
    </section>

<?php
include "pie.php"

?>
	
	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Rubic js -->
    <script src="assets/js/rubic.js"></script>
</body>
</html>
