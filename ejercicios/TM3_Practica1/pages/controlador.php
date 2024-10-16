<?php
include "lib.php";


// --- $_POST ---

//Comprobar si hubo algun envio de formulario
if($_POST){
    if (isset($_POST['registrarse'])) {
        //comprobamos que todos los campos esten bien
        if(isset($_POST['usuario']) && isset($_POST['contrasena']) && isset($_POST['correo'])){
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $correo = $_POST['correo'];
            if(!isset($_SESSION['usuarios'])){
                $_SESSION['usuarios'] = [];
            }

            if (buscar($correo, $contrasena) == 0) {
                $_SESSION['usuarios'][] = ['usuario' => $usuario, 'correo' => $correo, 'contrasena' => $contrasena];
                header("Location: proyectos.php?info=UsuarioCreado");
                $_SESSION['usuario_conectado'] = [$correo, $contrasena];
            }else{
                header("Location: proyectos.php?info=UsuarioExistente");
            }
        }
    }

    if (isset($_POST['login'])) {
        if(isset($_POST['contrasena']) && isset($_POST['correo'])){
            $contrasena = $_POST['contrasena'];
            $correo = $_POST['correo'];

            if (buscar($correo, $contrasena) == 1) {
                //si existe igual, eliminamos su contenido
                if (isset($_SESSION['usuario_conectado'])) {
                    unset($_SESSION['usuario_conectado']);
                }
                    $_SESSION['usuario_conectado'] = [$correo, $contrasena];
                    $_SESSION['proyectos'] = generarProyecto();
                    header("Location: proyectos.php?info=UsuarioConectado");


            }else{
                header("Location: proyectos.php?info=UsuarioNoExistente");
            }
        }
    }

    //--- $_GET ---
}else if($_GET) {
    if (isset($_GET['accion'])) {
        if ($_GET['accion'] == 'desconectar') {
            unset($_SESSION['usuario_conectado']);
            header("Location: proyectos.php?info=UsuarioDesconectado");
        }
    }
}else{
    header("Location: proyectos.php");
}

if (isset($_GET['accion']) && $_GET['accion'] == 'EliminarUnProyecto') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Convierte a entero
        $eliminado = deleteProyecto($id);
        header("Location: proyectos.php?info=ProyectoEliminado");
    }
}

?>