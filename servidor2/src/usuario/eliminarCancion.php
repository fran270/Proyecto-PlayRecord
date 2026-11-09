<?php 
include './controladores/ControladorCanciones.php';
$controladorCanciones = new ControladorCanciones();
$controladorCanciones->borrarCancion();
header("Location: listasguardadas.php");