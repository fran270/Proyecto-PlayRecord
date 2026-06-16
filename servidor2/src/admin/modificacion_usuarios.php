<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <title>Modificacion Usuarios</title>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link rel="icon" href="./img/editarUsuario.png" type="image/x-icon">
    <link href="./css/estilos.css" rel="stylesheet">
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
    </style>

    <div id="contenedor">
        
            <div><br>
                <form action="insertar_usuario.php" id="formulario" method="POST">
                    <img src="../img/editarUsuario.png" id="imagen1">&nbsp;
                    <b id="titulo">Modificación Usuarios</b>
                </form>
            </div>
            <br><br>

            <div>

                <table id="tablausuarios">
                    <thead class="thead-dark">
                        <tr>
                            <th class="id">ID</th>
                            <th class="usuario">Usuario</th>
                            <th class="contraseña">Contraseña</th>
                            <th class="fecha">Fecha Nacimiento</th>
                            <th class="correo">Email</th>
                            <th class="tipo">Tipo</th>
                            <th class="modificar">Modificar</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php

                        $consulta = new ControladorUsuario();
                        $usuarios = $consulta->listadoUsuarios();

                        foreach ($usuarios as $usuario) {

                            echo "<tr>
          
                                <th id = 'id'>" . $usuario['id'] . "</th>",

                                "<th id = 'usuario'>" . $usuario['usuario'] . "</th>",

                                "<th id = 'contraseña'>" . $usuario['contraseña'] . "</th>",

                                "<th id = 'fecha'>" . $usuario['fecha_nacimiento'] . "</th>",

                                "<th id = 'correo'>" . $usuario['email'] . "</th>",

                                "<th id = 'tipo'>" . $usuario['tipo'] . "</th>
                            
                                 <th id = 'botonModificar'>
                                    <a href='modificar_usuario.php?id=" . $usuario['id'] . "' class='btn btn-warning'>
                                        <iconify-icon icon='material-symbols:save-as-outline'class='d-inline-block align-top' id = 'modificar'>
                                        </iconify-icon>Modificar
                                    </a>
                                </th>

                            </tr>";
                        }


                        ?>

                    </tbody>
                </table>
            </div>
        
    </div>


    <!--Pie de pagina-->
    <?php

    include 'footer.php';

    ?>

</body>

</html>