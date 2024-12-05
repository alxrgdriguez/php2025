<?php

namespace AppMongo\modelos;

class Sala{

    private $id;
    private $nombre_sala;
    private $capacidad;
    private $ubicacion;

    /**
     * @param $nombre_sala
     * @param $capacidad
     * @param $ubicacion
     */
    public function __construct( $nombre_sala="", $capacidad="", $ubicacion="")
    {
        $this->nombre_sala = $nombre_sala;
        $this->capacidad = $capacidad;
        $this->ubicacion = $ubicacion;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|string
     */
    public function getNombreSala()
    {
        return $this->nombre_sala;
    }

    /**
     * @param mixed|string $nombre_sala
     */
    public function setNombreSala($nombre_sala)
    {
        $this->nombre_sala = $nombre_sala;
    }

    /**
     * @return mixed|string
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * @param mixed|string $capacidad
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;
    }

    /**
     * @return mixed|string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * @param mixed|string $ubicacion
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

}

