<?php

include 'Usuarios.php';
$cancion = new Cancion();

$cancion->borrarCanciones();

header("Location:canciones.php");


?>