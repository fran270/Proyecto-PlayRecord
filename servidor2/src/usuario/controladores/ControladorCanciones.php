<?php

class ControladorCanciones
{
    //funcion insercion canciones a la lista
    public function insertarCancionesLista($cancion, $idlista)
    {

        $basededatos = new basededatos();
        $sql = "INSERT INTO canciones (id, archivo, LISTAS_id) VALUES(?,?,?);";
        $stmt = $basededatos->conn->prepare($sql);
        #$stmt = $this->conn->prepare($sql);

        return $stmt->execute(array(0, $cancion, intval($idlista)));

    }

    //funcion visualizacion canciones
    public function getCanciones()
    {

        $basededatos = new basededatos();
        $sql = "SELECT * FROM canciones order by id";
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {
            $cancion = $resultado->FetchAll();
            return $cancion;
        }
    }

    //function visualizacion canciones por listas
    public function cancionesPorLista()
    {

        $basededatos = new basededatos();
        $idlista = $_POST['idLista'];

        $sql = "SELECT * FROM canciones WHERE :id = canciones.LISTAS_id";
        $resultado = $basededatos->conn->prepare($sql);
        #$resultado = $this->conn->prepare($sql);
        $resultado->bindParam(':id', $idlista, PDO::PARAM_INT);
        $resultado->execute();

        if ($resultado) {
            $cancionesLista = $resultado->fetchAll();
            return $cancionesLista;
        }

    }

    //funcion que borra la cancion
    public function borrarCancion()
    {

        $basededatos = new basededatos();

        //id de la lista
        $idlista = intval($_POST['idLista']);

        //id de la cancion
        $cancion = intval($_POST['id']);

        //echo $cancion;

        //$this->conn->beginTransaction();
        $sql = "DELETE FROM canciones WHERE :idLista = LISTAS_id AND :idCancion = canciones.id";
        //$resultado = $this->conn->prepare($sql);
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindParam(':idLista', $idlista, PDO::PARAM_INT);
        $resultado->bindParam(':idCancion', $cancion, PDO::PARAM_INT);
        $resultado->execute();

        //$this->conn->commit();

    }
}

?>