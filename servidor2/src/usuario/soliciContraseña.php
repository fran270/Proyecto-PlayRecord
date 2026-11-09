<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud Contraseña</title>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link href="./css/diseñoEmail.css" rel="stylesheet">
    <link rel="icon" href="./img/iniciar-sesion.png" type="image/x-icon">
    <script src="./js/validarEmail.js"></script>
</head>

<body>

    <div class="caja">

        <?php

        include '../controladores/ControladorUsuarios.php';
        $usuario = new ControladorUsuarios();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Llamada a la funcion verificarCorreo con el parametro correo
            $verificar_correo = $usuario->verificarCorreo($_POST['correo']);

            //Si existe el correo salta un mensaje de error
            if (!$verificar_correo) {

                echo "Este correo no esta registrado";
            }
        }

        ?>

        <img src="./img/imagen1.jpg" id="imagen">';

        <form action="recuperar_contrasena.php" id="formulario" method="POST">

            <h1>Solicitud Contraseña</h1>

            <p>Escribe y mandanos tu email para generar la nueva contraseña</p>

            <label for="correo">Email:</label>
            <input type="text" name="correo" id="correo">

            <br><br>

            <div id="mensaje"></div>

            <br><br>

            <button type="submit" id="boton2" value="Enviar" class="btn btn-secondary">
                <iconify-icon icon="iconoir:submit-document" id="icono"></iconify-icon>
                Enviar
            </button>

            <br>

            <a href="login.php">Volver a inicio de sesion</a>

        </form>
    </div>


</body>

</html>