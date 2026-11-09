<?php
include './controladores/ControladorUsuarios.php';
$controladorUsuarios = new ControladorUsuarios();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $insertarUsuario = new Usuario(
        $_POST['usuario'],
        $_POST['contrasena'],
        $_POST['fecha_nacimiento'],
        $_POST['correo']
    );

    $controladorUsuarios->insertarNuevoUsuario(
        0,
        $insertarUsuario->getUsuario(),
        $insertarUsuario->getContrasena(),
        $insertarUsuario->getFechaNacimiento(),
        $insertarUsuario->getEmail()
    );
}
?>