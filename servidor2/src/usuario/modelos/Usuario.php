<?php

//Capa modelo

class Usuario
{
    //Atributos
    private $usuario;
    private $contrasena;
    private $email;
    private $nombre;

    //Constructor de la clase
    public function __construct($usuario, $contrasena, $nombre, $email)
    {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->nombre = $nombre;
    }

    //Metodos getters y setters
    public function getUsuario()
    {

        return $this->usuario;
    }

    public function setUsuario($usuario)
    {

        $this->usuario = $usuario;
    }

    public function getContrasena()
    {

        return $this->contrasena;
    }

    public function getEmail()
    {

        return $this->email;
    }

    public function setEmail($email)
    {

        $this->email = $email;
    }

    public function getNombre()
    {

        return $this->nombre;
    }

    public function setFechaNacimiento($nombre)
    {

        $this->nombre = $nombre;
    }

}
?>