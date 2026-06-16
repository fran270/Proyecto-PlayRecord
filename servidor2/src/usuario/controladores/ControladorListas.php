<?php

class ControladorListas
{
    //funcion que filtra las listas de cada usuario
    public function listasPorUsuario()
    {
        $basededatos = new basededatos();

        $datosusuario = unserialize($_SESSION['Usuario']);
        $nombre = $datosusuario['usuario'];

        $sql = "SELECT * FROM listas INNER JOIN usuarios ON listas.usuarios_id = usuarios.id WHERE usuarios.usuario = :nombre";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->execute();

        if ($resultado) {
            $lista = $resultado->fetchAll();
            return $lista;
        }

    }


    //funcion de visualizacion nombre de la lista
    public function getListas()
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM listas order by id";
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }


    public function idListasPorUsuario()
    {

        $basededatos = new basededatos();

        $datosusuario = unserialize($_SESSION['Usuario']);
        $nombre = $datosusuario['usuario'];

        $sql = "SELECT * FROM listas INNER JOIN usuarios ON listas.usuarios_id = usuarios.id WHERE usuarios.usuario = :nombre
        order by listas.id";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $resultado->execute();

        if ($resultado) {
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }


    public function nombreLista()
    {

        $basededatos = new basededatos();
        $idLista = $_POST['idLista'];

        $sql = "SELECT nombre FROM listas WHERE :id = listas.id";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindParam(':id', $idLista, PDO::PARAM_STR);
        $resultado->execute();

        if ($resultado) {
            $cancionLista = $resultado->fetchAll();
            return $cancionLista;
        }
    }


    //Comprueba si la lista existe
    public function verificarLista($lista)
    {

        $basededatos = new basededatos();
        $datosusuario = unserialize($_SESSION['Usuario']);
        $id = $datosusuario['id'];

        $sql = "SELECT nombre FROM listas INNER JOIN usuarios ON listas.usuarios_id = usuarios.id WHERE usuarios.id = $id AND nombre = '$lista';";
        $consulta = $basededatos->ejecutaConsulta($sql);

        if ($consulta) {
            $resultado = $consulta->fetch();
            return $resultado;
        }

    }


    //funcion insertar nombreLista
    public function insertarNombreLista($list)
    {

        $basededatos = new basededatos();
        $datosusuario = unserialize($_SESSION['Usuario']);
        $lista[1] = $datosusuario['id'];

        $idUsuario = intVal($lista[1]);

        $lista = unserialize($list);

        #$basededatos->conn->beginTransaction();

        $sql = "INSERT INTO listas VALUES (?, ?, ?);";
        $stmt = $basededatos->conn->prepare($sql);
        $stmt->execute(array(0, $lista[0], $idUsuario));

        #$basededatos->conn->commit();
    }

    //funcion que borra la lista
    public function borrarLista()
    {

        $basededatos = new basededatos();
        $idList = $_POST['idLista'];

        #$this->conn->beginTransaction();

        $sql = "DELETE FROM listas WHERE :id = listas.id";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindParam(':id', $idList, PDO::PARAM_INT);
        $resultado->execute();


        #$this->conn->commit();

    }

}

?>