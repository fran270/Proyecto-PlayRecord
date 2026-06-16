<?php

include '../admin/basededatos.php';
include './controladores/ControladorListas.php';
$listaBorrar = new ControladorListas();
$listaBorrar->borrarLista();

header("Location: listasGuardadas.php");

?>