<?php 
include '../admin/basededatos.php';
include './controladores/ControladorCanciones.php';
$controladorCanciones = new ControladorCanciones();
$controladorCanciones->borrarCancion($_GET['id']);
header("Location: listasguardadas.php");