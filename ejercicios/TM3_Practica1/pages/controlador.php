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
                $_SESSION['usuario_conectado'] = [$correo, $contrasena];
                if (!isset($_SESSION['proyectos'])){
                    $_SESSION['proyectos'] = generarProyecto();
                }
                header("Location: proyectos.php?info=UsuarioCreado");

            }else{
                header("Location: proyectos.php?info=UsuarioExistente");
            }
        }
    }

    if (isset($_POST['login'])) {
        if(isset($_POST['contrasena']) && isset($_POST['correo'])){
            $contrasena = $_POST['contrasena'];
            $correo = $_POST['correo'];
            if(!isset($_SESSION['usuarios'])){
                $_SESSION['usuarios'] = [];
            }
            if (buscar($correo, $contrasena) == 1) {
                //si existe igual, eliminamos su contenido
                if (isset($_SESSION['usuario_conectado'])) {
                    unset($_SESSION['usuario_conectado']);
                }
                    $_SESSION['usuario_conectado'] = [$correo, $contrasena];
                    if (!isset($_SESSION['proyectos'] )){
                        $_SESSION['proyectos'] = generarProyecto();
                    }

                    header("Location: proyectos.php?info=UsuarioConectado");


            }else{
                header("Location: proyectos.php?info=UsuarioNoExistente");
            }
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

            // Comprobar si no existe la sesion de proyectos para crearla
            if (!isset($_SESSION['proyectos'])){
                $_SESSION['proyectos'] = [];
            }

            if (buscarProyecto($nombre_proyecto) === 0){
                $_SESSION['proyectos'][] = ['id' => $id_proyecto, 'nombre' => $nombre_proyecto, 'fechaInicio' => $fecha_inicio,
                'fechaFin' => $fecha_fin, 'dias' => diasTranscurridos($fecha_inicio, $fecha_fin), 'estado' => $estado . '%'];
                header("Location: proyectos.php?info=ProyectoCreado");
            }else{
                header("Location: proyectos.php?info=ProyectoYaExistente");
            }


    }

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

// Accion eliminar Proyecto
if (isset($_GET['accion']) && strcmp($_GET['accion'] ,'EliminarUnProyecto') == 0) {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Convierte a entero
        $eliminado = deleteProyecto($id);
        header("Location: proyectos.php?info=ProyectoEliminado");
    }
}

?>