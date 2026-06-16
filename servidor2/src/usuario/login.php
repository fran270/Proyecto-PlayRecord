<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include './controladores/ControladorUsuarios.php';
    $controladorUsuarios = new ControladorUsuarios();

    $datosusuario = $controladorUsuarios->comprobar_usuario($_POST['usuario'], $_POST['contraseña']);
    
    $rol = $datosusuario[5];
    echo $rol;
    if (!empty($datosusuario) && $rol == "usuario") {

        session_start();

        $_SESSION['Usuario'] = serialize($datosusuario);
        
        header('Location:portada.php');
        echo "DDD1";
        exit();

    } else if ($rol == "admin") {
         
        session_start();

        $_SESSION['Usuario'] = serialize($datosusuario);
        
        header('Location:../admin/portada.php');
        echo "DDD";
        exit();

    } else {

        $error = "No estas registrado";
        echo $error;
    }

}

?>
