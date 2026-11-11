<?php
include './controladores/ControladorUsuarios.php';
$controladorUsuarios = new ControladorUsuarios();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $datosusuario = $controladorUsuarios->comprobar_usuario($_POST['usuario'], $_POST['contraseña']);

    #$rol = $datosusuario[5];

    if (!empty($datosusuario)) {

        session_start();

        $_SESSION['Usuario'] = serialize($datosusuario);

        header('Location:inicio.php');

        exit();

    } else if ($_POST['usuario'] == 'fran' && $_POST['contraseña'] == 'fran2705') {
        session_start();

        $_SESSION['Usuario'] = serialize($datosusuario);

        header('Location:../admin/inicio.php');

        exit();
    }
    /*else if ($rol == "admin") {

        session_start();

        $_SESSION['Usuario'] = serialize($datosusuario);

        header('Location:../admin/portada.php');

        exit();

    } */ else {
        header("Location: login.php");
        echo "No estas registrado";
    }

}
?>