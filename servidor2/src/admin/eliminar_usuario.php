<?php

include './controladores/ControladorUsuario.php';
$eliminarUsuario = new ControladorUsuario();

$id = $_GET['id'];

$eliminarUsuario->eliminarUsuarios($id);

header("Location: listado_usuarios.php");

?>