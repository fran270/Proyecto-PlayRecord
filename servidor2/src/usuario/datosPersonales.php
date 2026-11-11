<?php
include 'barra.php';
include './controladores/ControladorUsuarios.php';
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
    <link href="" rel="stylesheet" />
</head>

<body>

    <h1>Mi Cuenta</h1>

    <?php

    $controladorUsuarios = new ControladorUsuarios();
    $usuarios = $controladorUsuarios->getUsuariosid($_GET['id']);

    foreach ($usuarios as $usuario) {
        echo " <label for = 'usuario'>Usuario:</label>
            <input type = 'text' name = 'usuario' id = 'usuario' value = '" . $usuario[1] . "' readonly/>

            <br><br>

            <label for = 'contraseña'>Contraseña:</label>
            <input type = 'password' name = 'contraseña' id = 'contraseña' value = '" . $usuario[2] . "' readonly/>

            <br><br>

            <form action='actualizarEmail.php' method='POST'>
            <label for = 'correo'>Correo Electronico:</label>
            <input type = 'text' name = 'correo' id = 'correo' value = '" . $usuario[3] . "'/>

            <button type = 'submit'>Editar</button>
            </form>
            
            <label for = 'nombre'>Nombre:</label>
            <input type = 'text' name = 'nombre' id = 'nombre' value = '" . $usuario[4] . "' readonly/>";
    }


    include 'footer.php';
    ?>

</body>

</html>