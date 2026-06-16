<?php

include './basededatos.php';

class ControladorUsuario
{
    public function comprobarUsuario($usuario, $contraseña)
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and contraseña = '$contraseña' LIMIT 1";
        $filas = $basededatos->ejecutaConsulta($sql);
        $resultado = $filas->fetch();
        $basededatos->close();
        return $resultado;
    }

    public function verificar_usuario($usuario)
    {
        $basededatos = new basededatos();
        $sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario';";
        $consulta = $basededatos->ejecutaConsulta($sql);
        $resultado = $consulta->fetch();
        $basededatos->close();
        return $resultado;
    }

    public function verificar_correo($correo)
    {

        $basededatos = new basededatos();
        $sql = "SELECT email FROM usuarios WHERE email = '$correo'";
        $consulta = $basededatos->ejecutaConsulta($sql);
        $resultado = $consulta->fetch();
        $basededatos->close();
        return $resultado;
    }

    // Metodo publico que comprueba usuario de un login
    public function compruebaUsuario($usuario)
    {
        $basededatos = new basededatos();
        $sql = 'SELECT * FROM usuarios WHERE nombre ="' . $usuario . '" LIMIT 1';
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {
            $datos = $resultado->fetch();
            return $datos;
        }
    }

    //funcion de visualizacion datos del usuario
    public function getUsuarios()
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios order by id;";
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {

            $datos = $resultado->FetchAll();
            return $datos;

        } else {

            echo "Error al ejecutar la consulta";
        }
    }


    //function que muestra el listado de usuarios registrados
    public function listadoUsuarios()
    {
        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios";
        $resultado = $basededatos->ejecutaConsulta($sql);

        if ($resultado) {
            $datos = $resultado->FetchAll();
            return $datos;
        }

    }

    /*Operaciones CRUD*/

    //Metodo que inserta nuevos usuarios en la base de datos
    public function insertarUsuario($usuario, $contrasena, $fecha, $correo)
    {

        $basededatos = new basededatos();

        $sql = "INSERT INTO usuarios VALUES(0,'$usuario', '$contrasena', '$fecha', '$correo')";
        $consulta = $basededatos->ejecutaConsulta($sql);
        $basededatos->close();
        return $consulta;
    }

    //Metodo que recibe los datos del usuario a modificar
    public function modificarUsuarios($id, $usuario, $contrasena, $fecha_nacimiento, $email)
    {
        $basededatos = new basededatos();
        $sql = "UPDATE usuarios SET usuario = '$usuario', contraseña = '$contrasena', fecha_nacimiento = '$fecha_nacimiento', email = '$email' WHERE id = '$id'";
        $consulta = $basededatos->ejecutaConsulta($sql);
        $resultado = $consulta->fetch();
        return $resultado;
    }

    public function usuariosModificar()
    {

        $id = $_GET['id'];

        $basededatos = new basededatos();
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $consulta = $basededatos->ejecutaConsulta($sql);

        if ($consulta) {
            $resultado = $consulta->fetchAll();
            return $resultado;
        }
    }


    //Metodo que eliminar usuarios de la base de datos
    public function eliminarUsuarios($id)
    {
        $basededatos = new basededatos();
        $sql = "DELETE FROM usuarios WHERE id = '$id'";
        $consulta = $basededatos->ejecutaConsulta($sql);
        $resultado = $consulta->fetch();
        $basededatos->close();
        return $resultado;
    }

}

?>