<?php
include './controladores/ControladorUsuarios.php';
$controladorUsuarios = new ControladorUsuarios();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $datosusuario = $controladorUsuarios->comprobar_usuario($_POST['usuario'], $_POST['contraseña']);

    $rol = $datosusuario[5];

    if (!empty($datosusuario) && $rol == "usuario") {

        session_start();

        $_SESSION['Usuario'] = serialize($datosusuario);

        header('Location:portada.php');

        exit();

    } else if ($rol == "admin") {

        session_start();

        $_SESSION['Usuario'] = serialize($datosusuario);

        header('Location:../admin/portada.php');

        exit();

    } else {
        echo "No estas registrado";
    }

}

?>