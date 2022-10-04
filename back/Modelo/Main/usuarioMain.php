<?php

    class UsuarioMain{

    protected $enlace_conexion;
    protected $id;
    protected $nombre;
    protected $apellido;
    protected $DNI;
    protected $correo;
    protected $celular;
    protected $password;
    protected $rol;
            
    public function __construct()
    {
        $this->enlace_conexion=BD::conectar();
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $this->enlace_conexion->real_escape_string($nombre);

        return $this;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $this->enlace_conexion->real_escape_string($apellido);

        return $this;
    }

    /**
     * Get the value of DNI
     */
    public function getDNI()
    {
        return $this->DNI;
    }

    /**
     * Set the value of DNI
     *
     * @return  self
     */
    public function setDNI($DNI)
    {
        $this->DNI = $this->enlace_conexion->real_escape_string($DNI);

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */
    public function setCorreo($correo)
    {
        $this->correo = $this->enlace_conexion->real_escape_string($correo);

        return $this;
    }

    /**
     * Get the value of celular
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set the value of celular
     *
     * @return  self
     */
    public function setCelular($celular)
    {
        $this->celular = $this->enlace_conexion->real_escape_string($celular);

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $this->enlace_conexion->real_escape_string($password);

        return $this;
    }

    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     *
     * @return  self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

}
