<?php
include '../admin/basededatos.php';
include './modelos/Lista.php';

class ControladorListas
{
    //funcion que filtra las listas de cada usuario
    public function listasPorUsuario()
    {
        $basededatos = new basededatos();
        $datosusuario = unserialize($_SESSION['Usuario']);
    
        $sql = "SELECT * FROM listas INNER JOIN usuarios ON listas.usuarioId = usuarios.id WHERE usuarios.usuario = :nombre";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindParam(':nombre', $datosusuario['usuario'], PDO::PARAM_STR);
        $resultado->execute();

        if ($resultado) {
            return $resultado->fetchAll();
        }

    }


    //funcion de visualizacion nombre de la lista
    public function getListas()
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM listas order by id";
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {
            return $resultado->fetchAll();
        }
    }


    public function obtenerNombreListas()
    {

        $basededatos = new basededatos();
    
        $sql = "SELECT idLista, lista FROM listas WHERE :id = listas.idLista";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindParam(':id', $_POST['idLista'], PDO::PARAM_STR);
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

        $sql = "SELECT nombre FROM listas INNER JOIN usuarios ON 
        listas.usuarioId = usuarios.id WHERE usuarios.id = $id AND nombre = '$lista';";
        $consulta = $basededatos->ejecutaConsulta($sql);

        if ($consulta) {
            $resultado = $consulta->fetch();
            return $resultado;
        }

    }


    //funcion insertar nombreLista
    public function insertarNombreLista($lista)
    {

        $basededatos = new basededatos();
        $datosusuario = unserialize($_SESSION['Usuario']);
       
        $sql = "INSERT INTO listas VALUES (?, ?, ?);";
        $insert_sql = $basededatos->conn->prepare($sql);
        $insert_sql->bindValue(1, 0, PDO::PARAM_INT);
        $insert_sql->bindValue(2, $lista, PDO::PARAM_STR);
        $insert_sql->bindValue(3, intVal($datosusuario['id']), PDO::PARAM_INT);
        $insert_sql->execute();

        if ($insert_sql) {
            return $insert_sql->fetch();
        }

    }

    //funcion que borra la lista
    public function borrarLista()
    {

        $basededatos = new basededatos();

        $sql = "DELETE FROM listas WHERE :id = listas.idLista";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindParam(':id', $_POST['idLista'], PDO::PARAM_INT);
        $resultado->execute();

    }

}

?>