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
        $dsn = "mysql:host=mariadb;port=3306;dbname=ejemplo";

        // Creamos una nueva instancia de PDO para conectar a la base de datos
        $dbh = new PDO($dsn, "usuario", "usuario");

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
function consularUsuarioPorEmail($email){

    // Iniciamos la conexion a la base de datos
    $dbh = conectarBD();

    // stmt se refiere al objeto que permite manejar la consulta SQL de manera segura y eficiente.
    $stmt = $dbh->prepare("SELECT * FROM usuarios WHERE email =:email");
    $stmt->bindParam(":email", $email);
    $stmt->setFetchMode(PDO::FETCH_ASSOC); //Nos devuelve los resultados como array asociativo
    $stmt->execute(); //La ejecución de la consulta

    $dbh = null;

    // Mostramos los resultados, fetch() devuelve una fila cada vez que lo llamamos
    if ($row = $stmt->fetch()){  //Select es sobre un campo UNIQUE solo va a devolver 1 o nada
        return 1;
    } else {
        return 0;
    }

}

function registrarUsuario($nombre, $email, $password){

    // Conectarse a la base de datos
    $sbh = conectarBD();

    // Insertar con stmt todos los campos
    $stmt = $sbh->prepare("INSERT INTO usuarios (nombre, email, password) 
    VALUES (?, ?, ?)");


    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $passwordHash);
    $stmt->execute(); //La ejecución de la consulta

    $sbh = null;

}

?>





