<?php
include '../admin/basededatos.php';
include './modelos/Usuario.php';

class ControladorUsuarios
{
    private $usuario;

    public function getUsuariosid($id)
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {
            $datos = $resultado->fetchAll();
            return $datos;
        }
    }


    public function getUsuarios()
    {

        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios ORDER BY id";
        $consulta = $basededatos->ejecutaConsulta($sql);
        $resultado = $consulta->fetch();
        //$basededatos->close();
        return $resultado;

    }

    // Metodo que comprueba si el usuario esta registrado
    public function comprobar_usuario($usuario, $contraseña)
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and contrasena = '$contraseña' LIMIT 1";
        $resultado = $basededatos->ejecutaConsulta($sql);
        
        if ($resultado) {
            $res = $resultado->fetch();
            return $res;
        }
        
    }

    // Metodo que comprueba si el nombre de usuario ya existe
    public function verificarUsuario($usuario)
    {

        $basededatos = new basededatos();
        $sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario';";
        $filas = $basededatos->ejecutaConsulta($sql);
        $resultado = $filas->fetch();
        $basededatos->close();
        return $resultado;

    }

    // Metodo que comprueba si un usuario que tenga un mismo correo
    public function verificarCorreo($correo)
    {

        $basededatos = new basededatos();
        $sql = "SELECT email FROM usuarios WHERE email = '$correo'";
        $consulta = $basededatos->conn->prepare($sql);
        $consulta->bindParam(1, $correo, PDO::PARAM_STR);
        $resultado = $basededatos->ejecutaConsulta($sql);
       
        if ($resultado) {
            $res = $resultado->fetchAll();
            return $resultado;
        }
    }

    // Actualizar la contraseña de un usuario
    public function actualizarContraseña()
    {

        $basededatos = new basededatos();

        $token = $_POST['token'];
        $nueva_contraseña = $_POST['contrasena'];

        $basededatos->conn->beginTransaction();
        $sql = "UPDATE usuarios SET contraseña ='$nueva_contraseña' WHERE email = (SELECT email FROM contraseñas WHERE token='$token')";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->execute();

        $basededatos->conn->commit();

    }

    //Operaciones CRUD
    public function insertarNuevoUsuario($id, $usuario, $contrasena, $fechaNacimiento, $email)
    {

        $basededatos = new basededatos();
        $sql = "INSERT INTO usuarios VALUES('$id', '$usuario', '$contrasena', '$fechaNacimiento', '$email')";
        $consulta = $basededatos->ejecutaConsulta($sql);
       
        if ($consulta) {
            $resultado = $consulta->fetchAll();
            return $resultado;
        }

    }

}

?>