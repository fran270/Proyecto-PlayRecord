<?php

//Capa modelo

class Usuario
{
    //Atributos
    private $usuario;
    private $contrasena;
    private $fechaNacimiento;
    private $email;

    //Constructor de la clase
    public function __construct($usuario, $contrasena, $fechaNacimiento, $email) {

        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->email = $email;
    }

    //Metodos getters y setters
    public function getUsuario(){

        return $this->usuario;
    }

    public function setUsuario($usuario){

        $this->usuario = $usuario;
    }

    public function getContrasena(){

        return $this->contrasena;
    }

    public function getFechaNacimiento(){

        return $this->fechaNacimiento;
    }

    public function setFechaNacimiento($fechaNacimiento){

        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getCorreo(){

        return $this->email;
    }

    public function setCorreo($email){

        $this->email = $email;
    }
    
}
?>