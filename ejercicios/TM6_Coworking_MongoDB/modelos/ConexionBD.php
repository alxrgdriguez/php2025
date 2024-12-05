<?php

namespace App\modelos;

use \PDO;
use \PDOException;

class ConexionBD{

    private $conexion;

    public function __construct() {

        $host = 'mariadb:3306'; //La IP del contenedor Mysql, y el puerto interno del contenedor

        try {
            if ($this->conexion == null) {
                $this->conexion = new PDO("mysql:host=" . $host . ";dbname=" . "COWORKING", "root", "toor");
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }

        } catch (PDOException $e){
            echo $e->getMessage();
        }

    }

    /**
     * Cogemos la conexion a BBDD
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * Cerramos la sesión a BBDD
     */

    public function cerrarConexion() {
        $this->conexion = null;
    }

}
