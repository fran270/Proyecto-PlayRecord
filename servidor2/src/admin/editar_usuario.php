<?php

include './controladores/ControladorUsuarios.php';
$modificarUsuario = new ControladorUsuario();

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contraseña'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$email = $_POST['correo'];
$tipo = $_POST['tipo'];

$modificarUsuario->modificarUsuarios($id, $usuario, $contrasena, $fecha_nacimiento, $email);

header("Location: listado_usuarios.php");

?>