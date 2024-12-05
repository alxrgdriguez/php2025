<?php

namespace AppMongo\modelos;

require_once './vendor/autoload.php';

use Exception;
use MongoDB\Client;


class ConexionBD{

    private $conexion;

    public function __construct() {

        $host = 'mongodb://root:toor@mongo:27017';

        try {
            $this->conexion = (new Client($host))->selectDatabase('COWORKING');
        } catch (Exception $e){
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
