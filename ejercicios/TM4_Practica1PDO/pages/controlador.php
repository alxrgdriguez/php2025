<?php
ob_start();
session_start();
include "modelo.php";


// --- $_POST ---

/**
 * Formulario de registro -------------
 */

if ($_POST){
    // Cada formulario se distingue por name en el boton summit
    if (isset($_POST['registro'])){
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Comprobar si el email ya esta registrado sino se registra en BBDD
        if (existeUsuario($email, $password, "registrado")){
            header("Location: registro.php?error=yaRegistrado");
        }
        else{
            //Registrar usuario en BBDD
            registrarUsuario($nombre, $email, $password);

            //Si ha funcionado bien lo metemos en la sesión
            $_SESSION['usuario_conectado'] = array("email" => $email);
            header('Location: proyectos.php?info=registrado'); //Usuario nuevo registrado
        }

    }

    if (isset($_POST['login'])){
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        if (existeUsuario($correo, $contrasena, "logueado")){
            $_SESSION['usuario_conectado'] = ['email'=> $correo];
            header("Location: proyectos.php?info=UsuarioConectado");
        }else{
            header("Location: login.php?info=UsuarioNoExiste");

        }
    }

    if (isset($_POST['agregarProyecto'])) {
        if (isset($_POST["id_proyecto"]) && isset($_POST['nombre_proyecto']) && (isset($_POST['fecha_inicio'])) && (isset($_POST['fecha_fin']))
            && (isset($_POST['estado'])));


        $id_proyecto = $_POST["id_proyecto"];
        $nombre_proyecto = $_POST['nombre_proyecto'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_fin = $_POST['fecha_fin'];
        $estado = $_POST['estado'];
        $id_usuario = $_POST['id_usuario'];


        if (buscarProyectoPorNombre($nombre_proyecto) === 0){
            agregarProyecto($id_proyecto, $nombre_proyecto, $fecha_inicio, $fecha_fin, $estado, $id_usuario);
            header("Location: proyectos.php?info=ProyectoCreado");
        }else{
            header("Location: proyectos.php?info=ProyectoYaExistente");
        }


    }


}

else if($_GET) {
    if (isset($_GET['accion'])) {
        if ($_GET['accion'] == 'desconectar') {
            unset($_SESSION['usuario_conectado']);
            header("Location: proyectos.php?info=UsuarioDesconectado");
        }

        if (isset($_GET['accion']) == 'EliminarUnProyecto') {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']); // Convierte a entero
                if(deleteProyectofromId($id) == 1){
                    header("Location: proyectos.php?info=ProyectoEliminado");
                }else{
                    header("Location: proyectos.php?info=ErrorAlBorrar");
                }


            }
        }
    }


}else{
    header("Location: proyectos.php");
}
?>