<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <link href="./css/diseño.css" rel="stylesheet">
    <link rel="icon" href="./img/iniciar-sesion.png" type="image/x-icon">
    <script src="./js/validarRegistro.js"></script>
    <script src="./js/funciones.js"></script>
</head>

<body>

    <?php

    include './controladores/ControladorUsuarios.php';
    $controladorUsuarios = new ControladorUsuarios();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contraseña'];
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        $correo = $_POST['correo'];

        $insertarUsuario = new Usuario($usuario, $contrasena, $fechaNacimiento, $correo);
        
        $controladorUsuarios->insertarNuevoUsuario(0, $insertarUsuario->getUsuario(), $insertarUsuario->getContrasena(), $insertarUsuario->getFechaNacimiento(), $insertarUsuario->getCorreo());
       // $controladorUsuarios->insertarNuevoUsuario(0, $usuario, $contrasena, $fechaNacimiento, $correo);
    }

    ?>

    <div class="caja">

        <img src="./img/imagen1.jpg" id="imagen">

        <?php

        echo '<form action="formularioRegistro.php" id="formulario" method="POST">

        <h1>REGISTRO</h1>

        <label for="usuario" class="contenedor">Usuario:</label>
        <input type="text" name="usuario" id="usuario">

        <br>

        <span id="error1">' . '</span>

        <br><br>

        <label for="contraseña" class="contenedor">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña">

        <br><br>

        <label for="fecha_nacimiento" class="contenedor">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
    
        <br><br>

        <label for="correo" class="contenedor">Email:</label>
        <input type="text" name="correo" id="correo">
        
        <span id="error2">' . '</span>

        <br><br>

        <input type="text" name="rol" id="rol" value = "usuario" hidden>


        <button type="submit" name = "registrar" id="boton1" value="Registrarse" class="btn btn-primary">Registrarse</button>

        <br>

        <a href="login.php">Volver a inicio de sesion</a>

        <br>

        <div id="indicador"></div>

        </form>';

        ?>
    </div>

</body>

</html>