<?php 

include './admin/basededatos.php';
$bd = new basededatos();

$cancion = new ControladorCanciones();
$cancion->borrarCancion();

header("Location: listasguardadas.php");
?>