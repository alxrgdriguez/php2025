<?php

// Funciones relativas a BBDD ---------------------------------

/**
 * Crear una conexión a BBDD y devolverla
 */
function conectarBD() {
    // Creamos una variable para almacenar la conexión a la base de datos
    $dbh = null;

    // Intentamos establecer la conexión a la base de datos
    try {
        // 'host' -> Este es el nombre del contenedor de MariaDB
        // Debe coincidir con el nombre que se configuró en el docker-compose
        // '3306' es el puerto predeterminado de MariaDB
        $dsn = "mysql:host=mariadb;port=3306;dbname=proyectosPDOTM4";

        // Creamos una nueva instancia de PDO para conectar a la base de datos
        $dbh = new PDO($dsn, "root", "toor");

        // Configuramos PDO para lanzar excepciones en caso de error
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        // Capturamos cualquier error de conexión y mostramos un mensaje
        echo "ERROR EN LA CONEXIÓN: " . $e->getMessage();
    }
    // Devolvemos el objeto de conexión para su uso posterior
    return $dbh;
}

/**
 * Consular si un email ya está registrado
 */
function consultarUsuarioPorEmail($email){

    // Iniciamos la conexion a la base de datos
    $dbh = conectarBD();

    // stmt se refiere al objeto que permite manejar la consulta SQL de manera segura y eficiente.
    var_dump($dbh);
    $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bindParam(1, $email);
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //Nos devuelve los resultados como array asociativo
    $stmt->execute(); //La ejecución de la consulta

    $dbh = null;

    // Mostramos los resultados, fetch() devuelve una fila cada vez que lo llamamos
    if ($stmt->fetch()){  //Select es sobre un campo UNIQUE solo va a devolver 1 o nada
        return 1;
    } else {
        return 0;
    }

}

/**
 * Consular si un email ya está registrado
 */
function existeUsuario($email, $password, $modo){

    // Iniciamos la conexion a la base de datos
    $dbh = conectarBD();

    // stmt se refiere al objeto que permite manejar la consulta SQL de manera segura y eficiente.
    if ($modo == "registrado"){
        $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE email =?");
        $stmt->bindParam(1, $email);
    }elseif ($modo == "logueado"){
        $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE email =? AND password =? ");
        $stmt->bindParam(1, $email);
        //$password = password_hash($password, PASSWORD_BCRYPT);
        $passwordHash = md5(sha1($password));
        $stmt->bindParam(2, $passwordHash);
    }else{
        return 2;
    }

    $stmt->setFetchMode(PDO::FETCH_ASSOC); //Nos devuelve los resultados como array asociativo
    $stmt->execute(); //La ejecución de la consulta

    $dbh = null;

    // Mostramos los resultados, fetch() devuelve una fila cada vez que lo llamamos
    if ($stmt->fetch()){  //Select es sobre un campo UNIQUE solo va a devolver 1 o nada
        return 1;
    } else {
        return 0;
    }

}

function buscarProyectoPorNombre($nombre)
{
// Iniciamos la conexion a la base de datos
    $dbh = conectarBD();

    // stmt se refiere al objeto que permite manejar la consulta SQL de manera segura y eficiente.
    $stmt = $dbh->prepare("SELECT * FROM proyectos WHERE nombreProyectos =?");
    $stmt->bindParam(1, $nombre);

    $stmt->setFetchMode(PDO::FETCH_ASSOC); //Nos devuelve los resultados como array asociativo
    $stmt->execute(); //La ejecución de la consulta

    $dbh = null;

    // Mostramos los resultados, fetch() devuelve una fila cada vez que lo llamamos
    if ($stmt->fetch()){  //Select es sobre un campo UNIQUE solo va a devolver 1 o nada
        return 1;
    } else {
        return 0;
    }
}

function recuperarIdDelUsuario($email)
{
    $dbh = conectarBD();
    $stmt = $dbh->prepare("SELECT id FROM usuarios WHERE email = ?");
    $stmt->bindParam(1, $email);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(); //La ejecución de la consulta

    return $stmt->fetch();


}




function registrarUsuario($nombre, $email, $password){

    // Conectarse a la base de datos
    $sbh = conectarBD();

    // Insertar con stmt todos los campos
    $stmt = $sbh->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");

    //$passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $passwordHash = md5(sha1($password)); //md5 y sha1 son algoritmos que sirven para cifrar, se mezclan 2 para una mayor seguridad
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $passwordHash);
    $stmt->execute(); //La ejecución de la consulta

    $sbh = null;
}


function  consultarProyectos()
{
    $dbh = conectarBD();
    $stmt = $dbh->prepare("SELECT * FROM proyectos");
    $stmt->setFetchMode(PDO::FETCH_ASSOC); // Nos devuelve los resultados como array asociativo
    $stmt->execute(); // Ejecuta la consulta


    $resultados = $stmt->fetchAll(); // Obtiene todos los resultados

    return $resultados;

}

function consultarProyectosPorUsuario($id_usuario)
{
    $dbh = conectarBD();
    $stmt = $dbh->prepare("SELECT * FROM proyectos WHERE usuario_id = ?");
    $stmt->bindParam(1, $id_usuario);
    $stmt->setFetchMode(PDO::FETCH_ASSOC); // Nos devuelve los resultados como array asociativo
    $stmt->execute(); // Ejecuta la consulta

    $resultados = $stmt->fetchAll(); // Obtiene todos los resultados

    return $resultados;
}

function deleteProyectofromId($id) {
    $dbh = conectarBD(); // Asegúrate de que esta función conecta correctamente a tu base de datos
    $stmt = $dbh->prepare("DELETE FROM proyectos WHERE idProyectos = ?");
    $stmt->bindParam(1, $id); // Vincula el parámetro
    $stmt->execute(); // Ejecuta la consulta

    // Verifica cuántas filas se han eliminado
    if ($stmt->rowCount() > 0) {
        return 1;
    } else {
        return 0;
    }
}

function obtenerUltimoIdProyecto() {
    $dbh = conectarBD();
    $stmt = $dbh->prepare("SELECT idProyectos FROM proyectos order by idProyectos desc limit 1");
    $stmt->setFetchMode(PDO::FETCH_ASSOC); // Nos devuelve los resultados como array asociativo
    $stmt->execute(); // Ejecuta la consulta


    $resultado = $stmt->fetch(); // Obtiene el resultado

    if ($resultado) {
        return $resultado['idProyectos'] + 1; // Devuelve el id del siguiente disponible si hay resultados
    } else {
        return 1; // Devuelve 1 si no hay resultados
    }
}

function agregarProyecto($idProyectos, $nombreProyecto, $fechaInicio, $fechaFin, $estado, $id_usuario)
{
    // Conectarse a la base de datos
    $sbh = conectarBD();

    // Insertar con stmt todos los campos
    $stmt = $sbh->prepare("INSERT INTO proyectos  VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bindParam(1, $idProyectos);
    $stmt->bindParam(2, $nombreProyecto);
    $stmt->bindParam(3, $fechaInicio);
    $stmt->bindParam(4, $fechaFin);
    $stmt->bindParam(5, $estado);
    $stmt->bindParam(6, $id_usuario);
    $stmt->execute(); //La ejecución de la consulta

    $sbh = null;

}

function recuperarProyectoPorID($idProyectos)
{
    $dbh = conectarBD();
    $stmt = $dbh->prepare("SELECT * FROM proyectos WHERE idProyectos = ?");
    $stmt->bindParam(1, $idProyectos);
    $stmt->setFetchMode(PDO::FETCH_ASSOC); // Nos devuelve los resultados como array asociativo
    $stmt->execute(); // Ejecuta la consulta


    $resultados = $stmt->fetchAll(); // Obtiene todos los resultados

    if (count($resultados) > 0) {
        return $resultados[0]; // Devuelve los resultados si hay coincidencias --OJO con esto, porque es un array de arrays
    } else {
        return 0; // Devuelve 0 si no hay resultados
    }
}


