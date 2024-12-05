<?php

namespace AppMongo\modelos;

class Usuario{

    private $id;
    private $email;
    private $nombre_usuario;
    private $password;
    private $telefono;
    private $fecha_creacion;

    /**
     * @param $nombre_usuario
     * @param $email
     * @param $password
     * @param $telefono
     * @param $fecha_creacion
     */
    public function __construct($email="", $nombre_usuario="",  $password="", $telefono="", $fecha_creacion="")
    {
        $this->email = $email;
        $this->nombre_usuario = $nombre_usuario;
        $this->password = $password;
        $this->telefono = $telefono;
        $this->fecha_creacion = $fecha_creacion;
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
     * @return mixed
     */
    public function getNombreUsuario()
    {
        return $this->nombre_usuario;
    }

    /**
     * @param mixed $nombre_usuario
     */
    public function setNombreUsuario($nombre_usuario)
    {
        $this->nombre_usuario = $nombre_usuario;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * @param mixed $fecha_creacion
     */
    public function setFechaCreacion($fecha_creacion)
    {
        $this->fecha_creacion = $fecha_creacion;
    }

}

