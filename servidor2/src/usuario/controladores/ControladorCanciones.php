<?php
#include '../admin/basededatos.php';
include './modelos/Cancion.php';

class ControladorCanciones
{

    public function getCanciones()
    {

        $basededatos = new basededatos();
        $sql = "SELECT * FROM canciones order by idCancion";
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {
            return $resultado->FetchAll();
        }
    }

    public function cancionesPorLista()
    {

        $basededatos = new basededatos();

        $sql = "SELECT * FROM canciones WHERE listaId = ?";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindValue(1, $_POST['idLista'], PDO::PARAM_INT);
        $resultado->execute();

        if ($resultado) {
            return $resultado->fetchAll();
        }

    }


    public function insertarCancionesLista($cancion, $idLista)
    {

        $basededatos = new basededatos();
        $sql = "INSERT INTO canciones (idCancion, cancion, listaId) VALUES(?,?,?);";
        $insert_sql = $basededatos->conn->prepare($sql);
        $insert_sql->bindValue(1, 0, PDO::PARAM_INT);
        $insert_sql->bindValue(2, $cancion, PDO::PARAM_STR);
        $insert_sql->bindValue(3, $idLista, PDO::PARAM_INT);
        $insert_sql->execute();
    }


    public function borrarCancion($idCancion)
    {

        $basededatos = new basededatos();
        $sql = "DELETE FROM canciones WHERE idCancion = ?";
        $resultado = $basededatos->conn->prepare($sql);
        #$resultado->bindValue(1, intval($_GET['idLista']), PDO::PARAM_INT);
        $resultado->bindValue(1, intval($idCancion), PDO::PARAM_INT);
        $resultado->execute();

    }
}

?>