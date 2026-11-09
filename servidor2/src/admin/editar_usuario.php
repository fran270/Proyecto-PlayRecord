<?php
include './controladores/ControladorUsuarios.php';
$controladorUsuarios = new ControladorUsuario();

$controladorUsuarios->modificarUsuarios(
    $_POST['id'],
    $_POST['usuario'],
    $_POST['contraseña'],
    $_POST['fecha_nacimiento'],
    $$_POST['correo']
);

header("Location: listado_usuarios.php");