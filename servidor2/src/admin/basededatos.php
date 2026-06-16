<?php
class basededatos
{
  //variable para la conexión
  public $conn; 

  // Metodo constructor que realiza la conexión
  public function __construct()
  {

    $config = parse_ini_file('configuracion.ini');
    
    try {
     
      $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
      $dsn = 'mysql:host=' . $config['server'] . ';dbname=' . $config['base'];
      $this->conn = new PDO($dsn, $config['user'], $config['pass'], $opc);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    } catch (Exception $ex) {
      throw $ex;
    }
  }
  
  // Metodo destructor para eliminar la conexión
  public function close()
  {
    $this->conn = null;
  }

  //Metodo privado para realizar consultas en la Base de datos  
  public function ejecutaConsulta($sql)
  {
    try {
      $resultado = null;
      if (isset($this->conn)) {
        $resultado = $this->conn->query($sql);
      }
      return $resultado;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

}
?>