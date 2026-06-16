<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <link href="./css/login.css" rel="stylesheet">
    <link rel="icon" href="./img/iniciar-sesion.png" type="image/x-icon">
    <script src="./js/validacionLogin.js"></script>
    <script src="./js/funciones.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?php
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    echo $usuario;
    ?>
</head>

<body>

    <div class="caja">

        <img src="./img/imagen1.jpg" id="imagen">

        <!--Formulario inicio sesion-->
        <form action="#" id="formulario" method="POST">

            <h1>LOGIN</h1><br>

            <label for="usuario" class="contenedor">Usuario:</label>
            <input type="text" name="usuario" id="usuario">

            <br><br>

            <label for="contraseña" class="contenedor">Contraseña:</label>
            <input type="password" name="contraseña" id="contraseña">

            <br><br>

            <span id="error">'</span>

            <div class="col-sm-offset-5 col-sm-12">
                <a href="soliciContraseña.php">¿Olvido su contraseña?</a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="formularioRegistro.php">¿Estas registrado?</a>
            </div>

            <br>

            <button type="submit" id="boton" value="Acceder" class="btn btn-primary">
                <a href="login.php">Iniciar Sesion</a>
            </button>
            <br>

            <div id="indicador"></div>

        </form>
    </div>

</body>

</html>