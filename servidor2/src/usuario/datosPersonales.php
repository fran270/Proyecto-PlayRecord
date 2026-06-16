<?php
include 'barra.php';
session_start();
$datosusuario = unserialize($_SESSION['Usuario']);
$nombre = $datosusuario['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link href = "" rel = "stylesheet"/>
</head>
<body>

    <h1>Mi Cuenta</h1>

    <?php 

    include './controladores/ControladorUsuarios.php';
    $bd = new ControladorUsuarios();
    
    //$query = $bd->getUsuariosid($id);
    $query = $bd->getUsuarios();
    

    echo "  <label for = 'usuario'>Usuario:</label>
            <input type = 'text' name = 'usuario' id = 'usuario' value = ".$query['usuario']." readonly/>

            <br><br>

            <label for = 'contraseña'>Contraseña:</label>
            <input type = 'password' name = 'contraseña' id = 'contraseña' value = ".$query['contraseña']." readonly/>

            <br><br>

            <label for = 'correo'>Correo Electronico:</label>
            <input type = 'text' name = 'correo' id = 'correo' value = ".$query['email']." readonly/>

            <button type = 'button'>Editar</button>

            <br><br>

            <label for = 'fecha'>Fecha de Nacimiento:</label>
            <input type = 'date' name = 'fecha' id = 'fecha' value = ".$query['fecha_nacimiento']." readonly/>";

    ?>
    
</body>
</html>