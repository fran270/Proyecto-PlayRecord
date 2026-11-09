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
            return $resultado->fetchAll();
        }
    }


    public function getUsuarios()
    {

        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios ORDER BY id";
        $consulta = $basededatos->ejecutaConsulta($sql);
        $resultado = $consulta->fetch();
        return $resultado;

    }

    // Metodo que comprueba si el usuario esta registrado
    public function comprobar_usuario($usuario, $contraseña)
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and contrasena = '$contraseña' LIMIT 1";
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {
            return $resultado->fetch();
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
        $select_sql = "SELECT email FROM usuarios WHERE email = '$correo'";
        $consulta = $basededatos->conn->prepare($select_sql);
        $consulta->bindParam(1, $correo, PDO::PARAM_STR);
        $resultado = $basededatos->ejecutaConsulta($select_sql);

        if ($resultado) {
            return $resultado->fetchAll();
        }
    }

    // Actualizar la contraseña de un usuario
    public function actualizarContraseña()
    {

        $basededatos = new basededatos();

        $token = $_POST['token'];
        $nueva_contraseña = $_POST['contrasena'];

        $update_sql = "UPDATE usuarios SET contraseña ='$nueva_contraseña' WHERE email = (SELECT email FROM contraseñas WHERE token='$token')";
        $resultado = $basededatos->conn->prepare($update_sql);
        $resultado->execute();

        $basededatos->conn->commit();

    }

    public function insertarNuevoUsuario($id, $usuario, $contrasena, $fechaNacimiento, $email)
    {

        $basededatos = new basededatos();
        $usuario = new Usuario($usuario, $contrasena, $fechaNacimiento, $email);
        $insert_sql = "INSERT INTO usuarios VALUES(?, ?, ?, ?, ?)";
        $consultaInsert = $basededatos->conn->prepare($insert_sql);
        $consultaInsert->bindValue(0, $id, PDO::PARAM_INT);
        $consultaInsert->bindValue(1, $usuario->getUsuario(), PDO::PARAM_STR);
        $consultaInsert->bindValue(2, $usuario->getContrasena(), PDO::PARAM_STR);
        $consultaInsert->bindValue(3, $usuario->getFechaNacimiento(), PDO::PARAM_STR);
        $consultaInsert->bindValue(4, $usuario->getEmail(), PDO::PARAM_INT);

        if ($consultaInsert) {
            return $consultaInsert->fetchAll();
        }
    }

}

?>