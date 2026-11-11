<?php
include '../admin/basededatos.php';
include './modelos/Usuario.php';

class ControladorUsuarios
{
    private $usuario;

    public function getUsuariosid($id)
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios WHERE id = $id";
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
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and contraseña = '$contraseña' LIMIT 1";
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
        $select_sql = "SELECT email FROM usuarios WHERE email = ?";
        $consulta = $basededatos->conn->prepare($select_sql);
        $consulta->bindValue(1, $correo, PDO::PARAM_STR);
        $resultado = $basededatos->ejecutaConsulta($select_sql);

        if ($resultado) {
            return $resultado->fetchAll();
        }
    }

    // Actualizar la contraseña de un usuario
    public function actualizarContraseña($contrasena, $token)
    {
        $basededatos = new basededatos();
        $update_sql = "UPDATE usuarios SET contraseña = ? WHERE email = (SELECT email FROM contraseñas WHERE token= ?)";
        $resultado = $basededatos->conn->prepare($update_sql);
        $resultado->bindValue(1, $contrasena, PDO::PARAM_STR);
        $resultado->bindValue(2, $token, PDO::PARAM_STR);
        $resultado->execute();
    }


    //Buscar el token en la base de datos
    public function buscarEmail($token)
    {
        $basededatos = new basededatos();
        $sql = "SELECT email FROM contraseñas WHERE token = ?";
        $resultado = $basededatos->conn->prepare($sql);
        $resultado->bindValue(1, $token, PDO::PARAM_STR);
        $resultado->execute();

        if ($resultado) {
            return $resultado->fetch();
        }
    }

    // Elimina el token de la base de datos
    public function borrarToken($token)
    {
        $basededatos = new basededatos();
        $delete_sql = "DELETE FROM contraseñas WHERE token=?";
        $resultado = $basededatos->conn->prepare($delete_sql);
        $resultado->bindValue(1, $token, PDO::PARAM_STR);
        $resultado->execute();
    }

    public function actualizarEmail($nuevoEmail, $idUsuario)
    {
        $basededatos = new basededatos();
        $update_sql = "UPDATE usuarios SET email = ? WHERE id = ?";
        $resultado = $basededatos->conn->prepare($update_sql);
        $resultado->bindValue(1, $nuevoEmail, PDO::PARAM_STR);
        $resultado->bindValue(2, $idUsuario, PDO::PARAM_STR);
        $resultado->execute();
    }


    public function insertarNuevoUsuario($usuario, $contrasena, $fechaNacimiento, $email)
    {

        $id = 0;
        $basededatos = new basededatos();
        $usuario = new Usuario($usuario, $contrasena, $fechaNacimiento, $email);

        $insert_sql = "INSERT INTO usuarios VALUES(?, ?, ?, ?, ?)";
        $consultaInsert = $basededatos->conn->prepare($insert_sql);
        $consultaInsert->bindValue(1, $id, PDO::PARAM_INT);
        $consultaInsert->bindValue(2, $usuario->getUsuario(), PDO::PARAM_STR);
        $consultaInsert->bindValue(3, $usuario->getContrasena(), PDO::PARAM_STR);
        $consultaInsert->bindValue(4, $usuario->getEmail(), PDO::PARAM_STR);
        $consultaInsert->bindValue(5, $usuario->getNombre(), PDO::PARAM_STR);
        $consultaInsert->execute();

        if ($consultaInsert) {
            return $consultaInsert->fetchAll();
        }
    }

}

?>