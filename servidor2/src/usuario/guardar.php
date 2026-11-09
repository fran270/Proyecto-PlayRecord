<?php

$usuario = new ControladorUsuarios();
$usuario->actualizarContraseña();

// Obtiene el token y la nueva contraseña del formulario
$token = $_POST['token'];
$nueva_contraseña = $_POST['contrasena'];

// Actualiza la contraseña en la base de datos
$sql = "UPDATE usuarios SET contraseña ='$nueva_contraseña' WHERE email = (SELECT email FROM contraseñas WHERE token='$token')";


if ($conexion->query($sql) === true) {

    // Elimina el token de la base de datos
    $sql_borrar = "DELETE FROM contraseñas WHERE token='$token'";
    $bd->ejecutaConsulta($sql_borrar);
    #$conn->query($sql_borrar);

    echo "Se ha restablecido la contraseña";
    echo "<form>";
    echo "<a href = 'index.php'>Regresar a Inicio Sesion</a> ";
    echo "</form>";
  
} else {

    echo "No se ha podido restablecer la contraseña";
}


?>
