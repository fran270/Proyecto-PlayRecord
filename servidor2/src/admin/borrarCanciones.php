<?php
include './controladores/ControladorCancion.php';
$cancion = new ControladorCancion();
$cancion->borrarCanciones();
header("Location:canciones.php");
?>