<?php
include './controladores/ControladorUsuario.php';
$controladorUsuarios = new ControladorUsuario();
$id = $_GET['id'];
$controladorUsuarios->eliminarUsuarios($id);
header("Location: listado_usuarios.php");