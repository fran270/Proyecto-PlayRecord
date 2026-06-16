<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <title>Modificar Usuario</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="icon" href="./img/editarUsuario.png" type="image/x-icon">
    <link href="./css/estilos.css" rel="stylesheet">
    <script src="./js/validarForm.js"></script>
    <?php
    include 'barra.php';
    include './controladores/ControladorUsuario.php';
    session_start();
    $datosusuario = unserialize($_SESSION['Usuario']);
    $nombre = $datosusuario['usuario'];
    ?>
</head>

<body>

    <style>
        #contenedor {
            text-align: center;
        }

        #campo1, #campo2, #campo3, #campo4, #campo5 {
            margin:auto;
        }
    </style>

    <?php

    $consultaUpdate = new ControladorUsuario();
    $usuariosModificar = $consultaUpdate->usuariosModificar();

    foreach ($usuariosModificar as $fila) {

        echo '<div id = "contenedor">
       
            <div><br>
                <form action="editar_usuario.php" id="formulario" method="POST">
                    <img src="./img/editarUsuario.png" id = "imagen1">
                    <b id = "titulo">Modificar usuario</b>
                    <br><br>

                    <input type="hidden" name="id" value="' . $fila['id'] . '">

                    <div class="form-group col-md-3" id = "campo1">
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario"
                            value="' . $fila['usuario'] . '">
                    </div>

                    <div class="form-group col-md-3" id = "campo2">
                        <input type="password" name="contraseña" id="contraseña" class="form-control"
                            placeholder="Contraseña" value="' . $fila['contraseña'] . '">
                    </div>

                    <div class="form-group col-md-3" id = "campo3">
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                            placeholder="Fecha_nacimiento" value="' . $fila['fecha_nacimiento'] . '">
                    </div>

                    <div class="form-group col-md-3" id = "campo4">
                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Email"
                            value="' . $fila['email'] . '">
                    </div>

                    <div class="form-group col-md-3" id = "campo5">
                
                        <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Tipo Usuario"
                            value="' . $fila['tipo'] . '">
                      
                    </div>

                    <br>

                    <button type="submit" name="actualizar" value="Actualizar" class="btn btn-warning">
                        <iconify-icon icon="material-symbols:save-as-outline" class="d-inline-block align-top"
                           id = "actualizar"></iconify-icon>Actualizar</button>
                </form>
            </div>
        
    </div>';

    }

    ?>


    <!--Pie de pagina-->
    <?php

    include 'footer.php';

    ?>

</body>

</html>