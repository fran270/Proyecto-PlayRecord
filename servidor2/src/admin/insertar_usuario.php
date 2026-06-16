<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <title>Insertar Usuario</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="icon" href="./img/agregarUsuario.png" type="image/x-icon">
    <link href="./css/estilos.css" rel="stylesheet">
    <script src="./js/validarFormulario.js"></script>

    <?php
    include 'barra.php';
    session_start();
    $datosusuario = unserialize($_SESSION['Usuario']);
    $nombre = $datosusuario['usuario'];
    ?>

</head>

<body>

    <?php

    include './controladores/ControladorUsuario.php';
    $insertarUsuario = new ControladorUsuario();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Llamada a la funcion verificarUsuario con el parametro usuario
        $verificar_usuario = $insertarUsuario->verificar_usuario($_POST['usuario']);

        //Llamada a la funcion verificarCorreo con el parametro correo
        $verificar_correo = $insertarUsuario->verificar_correo($_POST['correo']);

        //En el caso de que el usuario exista salta un mensaje de error
        if ($verificar_usuario) {

            $error1 = "Este usuario ya existe";
        }

        //Si existe el correo salta un mensaje de error
        if ($verificar_correo) {

            $error2 = "Este correo ya existe";

        } else {

            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contraseña'];
            $fecha = $_POST['fecha_nacimiento'];
            $correo = $_POST['correo'];

            $insertarUsuario->insertarUsuario($usuario, $contrasena, $fecha, $correo);

        }
    }

    ?>

    <style>
        #contenedor{
            text-align: center;
        }

        #campo1, #campo2, #campo3, #campo4, #campo5{
            margin:auto;
        }
       
    </style>

    <div id = "contenedor">
        
            <div id = "co2"><br>
                <form action="insertar_usuario.php" id="formulario" method="POST">
                    <img src="./img/agregarUsuario.png" id = "imagen1">
                    <b id = "titulo">Insertar nuevo usuario</b>
                    <br><br>

                    <div class="form-group col-md-3" id = "campo1">
                        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
                    </div>

                    <span id='error1'><?php echo $error1; ?></span>

                    <div class="form-group col-md-3" id = "campo2">
                        <input type="password" name="contraseña" id="contraseña" class="form-control"
                            placeholder="Contraseña">
                    </div>

                    <div class="form-group col-md-3" id = "campo3">
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                            placeholder="Fecha_nacimiento">
                    </div>

                    <div class="form-group col-md-3" id = "campo4">
                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Email">
                    </div>

                    <span id='error2'><?php echo $error2; ?></span>
                  
                    <br>

                    <div class="form-group cold-md-3">
                        <button type="submit" id="boton" value="insertar" class="btn btn-success">
                            <iconify-icon icon="material-symbols-light:save-as-outline" class="d-inline-block align-top"
                                id = "iconoInsertar"></iconify-icon>Insertar</button>
                    </div>
                </form>
            </div>

        <br><br>
       
    </div>

    <div>

        <table id="tablausuarios">
            <thead class="thead-dark">
                <tr>
                    <th class="id">ID</th>
                    <th class="usuario">Usuario</th>
                    <th class="contraseña">Contraseña</th>
                    <th class="fecha">Fecha Nacimiento</th>
                    <th class="correo">Email</th>
                </tr>
            </thead>

            <tbody>

                <?php
                //Dibujamos la cabecera de la tabla
                $datos = $insertarUsuario->getUsuarios();

                //Mediante un bucle cada una de las columnas de la base de datos
                foreach ($datos as $row) {
                    echo '<tr>';
                    echo "<td id = 'id'><b>$row[id]<b></td>";
                    echo "<td id = 'user'><b>$row[usuario]</b></td>";
                    echo "<td id = 'contra'><b>$row[contraseña]</b></td>";
                    echo "<td id = 'fecha'><b>$row[fecha_nacimiento]</b></td>";
                    echo "<td id = 'email'><b>$row[email]</b></td>";
                    echo '</tr>';
                }

                ?>

            </tbody>

        </table>

    </div>

    <!--Pie de pagina-->
    <?php

    include 'footer.php';

    ?>

</body>

</html>