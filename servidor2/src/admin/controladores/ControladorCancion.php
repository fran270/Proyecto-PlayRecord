<?php 

class ControladorCancion {

//funcion que inserta las canciones disponibles de la aplicacion en la bd
  public function insertarCancionesRepositorio($canciones)
  {

    $basededatos = new basededatos();
    $cancion = unserialize($canciones);
   
    $sql = "INSERT INTO repositorio_canciones VALUES (?,?);";
    $stmt = $basededatos->conn->prepare($sql);
    $stmt->execute(array(0, $cancion[0]));

    $basededatos->conn->commit();
  }


  public function getCanciones()
  {
    $basededatos = new basededatos();
    $sql = "SELECT * FROM repositorio_canciones order by id;";
    $resultado = $basededatos->ejecutaConsulta($sql);

    if ($resultado) {
      $datos = $resultado->FetchAll();
      return $datos;
    }
  }

  //Metodo para borrar canciones del repositorio
  public function borrarCanciones()
  {

    $basededatos = new basededatos();

    $id = intval($_GET['id']);
    
    #$this->conn->beginTransaction();
    $sql = "DELETE FROM repositorio_canciones WHERE id = :id";
    $stmt = $basededatos->conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $basededatos->conn->commit();


  }
}

?>
  