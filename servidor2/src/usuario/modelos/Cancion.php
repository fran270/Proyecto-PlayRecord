<?php

//Capa modelo

class Cancion
{
    // Atributos
    private $id;
    private $cancion;
    private $idLista;

    // Constructor de la clase
    public function __construct($id, $cancion, $idLista)
    {
        $this->id = $id;
        $this->cancion = $cancion;
        $this->idLista = $idLista;
    }

    // Metodos getters y setters
    public function getIdCancion()
    {
        return $this->id;
    }

    public function getCancion()
    {
        return $this->cancion;
    }

    public function setCancion($cancion)
    {
        $this->cancion = $cancion;
    }

    public function getIdLista()
    {
        return $this->idLista;
    }

    public function setIdLista($idLista)
    {
        $this->idLista = $idLista;
    }
}

?>