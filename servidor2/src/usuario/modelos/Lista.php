<?php

//Capa modelo

class Lista
{
    // Atributos
    private $idLista;
    private $nombre;
    private $idUsuario;

    // Constructor de la clase
    public function __construct($idLista, $nombre, $idUsuario) {

        $this->idLista = $idLista;
        $this->nombre = $nombre;
        $this->idUsuario = $idUsuario;
    }

    // Metodos getters y setters
    public function getIdLista(){
        return $this->idLista;
    }

    public function setIdLista($idLista){
        $this->idLista = $idLista;
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

}


?>