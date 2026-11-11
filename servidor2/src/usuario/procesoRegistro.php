<?php
include './controladores/ControladorUsuarios.php';
$controladorUsuarios = new ControladorUsuarios();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $controladorUsuarios->insertarNuevoUsuario(
        $_POST['usuario'],
        $_POST['contrasena'],
        $_POST['correo'],
        $_POST['nombre']
    );
}

header("Location: registro.html");
?>