<?php
include './barra.php';
include './controladores/ControladorUsuarios.php';
$controladorUsuarios = new ControladorUsuarios();
$controladorUsuarios->actualizarEmail($_POST['correo'], $datosusuario['id']);
header("datosPersonales.php");
