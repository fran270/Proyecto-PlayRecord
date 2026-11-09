<?php
include './controladores/ControladorListas.php';
$controladorListas = new ControladorListas();
$controladorListas->borrarLista();
header("Location: listasGuardadas.php");