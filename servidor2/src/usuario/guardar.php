<?php

$controladorUsuarios = new ControladorUsuarios();
$controladorUsuarios->actualizarContraseña($_POST['token'], $_POST['contrasena']);

if ($conexion->query($sql) === true) {

    // Elimina el token de la base de datos
    $controladorUsuarios->borrarToken($_POST['token']);
    
    echo "Se ha restablecido la contraseña";
    echo "<a href = 'index.php'>Regresar a Inicio Sesion</a> ";
    
} else {

    echo "No se ha podido restablecer la contraseña";
}

?>
