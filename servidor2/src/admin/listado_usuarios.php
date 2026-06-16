<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
  <title>Listado de Usuarios</title>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <link href="./css/estilos.css" rel="stylesheet">
  <link href="./css/diseñoListadoUsuarios.css" rel="stylesheet">
  <link rel="icon" href="./img/agregarUsuario.png" type="image/x-icon">

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
      display: flex;
      flex-direction: column;
      flex-wrap: nowrap;
      justify-content: center;
      text-align: center;
      background-color: antiquewhite;
      border: 1px solid black;
      border-radius: 3px;
      width: 90%;
      margin: auto;
      margin-top: 20px;
      margin-bottom: 20px;
      padding-bottom: 3%;
    }

    #tableusuarios {
      margin-left: 20px;
      border-radius: 3px;
    }

    #imagen1 {
      width: 80px;
    }

    #titulo {
      font-size: 30px;
    }

    tr,
    .id,
    .usuario,
    .contraseña,
    .fecha,
    .email,
    .tipo,
    .modificar,
    .eliminar {
      color: blue;
      background-color: bisque;
      border: 1px solid gray;
      height: 20px;
      border-radius: 3px;
      text-align: center;
    }

    #id,
    #usuario,
    #contraseña,
    #fecha,
    #correo,
    #tipo {
      text-align: left;
      color: black;
      background-color: rgb(243, 234, 222);
      border: 1px solid gray;
      border-radius: 3px;
      text-align: center;
    }

    #botonModificar,
    #botonEliminar {
      color: black;
      background-color: rgb(243, 234, 222);
      border: 1px solid gray;
      border-radius: 3px;
      text-align: center;
    }

    body {

      background-color: rgb(245, 255, 162);
    
    }

    #iconoInsertar,
    #iconoModificar,
    #iconoEliminar {
      width: 20px;
      height: 20px;
    }
  </style>

  <div id="contenedor">

    <div><br>
      <img src="./img/imagen.jpg" id="imagen1">&nbsp;
      <b id="titulo">Listado de Usuarios Registrados</b>
    </div>

    <br><br>

    <div id="listadoUsuarios">
      <div class="form-group cold-md-3" id="contenedor">Insertar nuevos usuarios
        <a href="./insertar_usuario.php">
          <button type="submit" id="boton" value="insertar" class="btn btn-success">
            <iconify-icon icon="material-symbols-light:save-as-outline" class="d-inline-block align-top"
              id="iconoInsertar">
            </iconify-icon>Insertar</button>
        </a>
      </div>

      <br><br>

      <table id="tablausuarios">

        <!--Cabecera de la tabla-->
        <thead class="thead-dark">
          <tr>
            <th class="id">ID</th>
            <th class="usuario">Usuario</th>
            <th class="contraseña">Contraseña</th>
            <th class="fecha">Fecha Nacimiento</th>
            <th class="email">Email</th>
            <th class="modificar">Modificar</th>
            <th class="eliminar">Eliminar</th>
          </tr>
        </thead>

        <!--Cuerpo de la tabla-->
        <tbody>

          <?php

          $consultaSelect = new ControladorUsuario();
          $usuarios = $consultaSelect->listadoUsuarios();

          foreach ($usuarios as $usuario) {

            echo "<tr>
          
                     <th id = 'id'>" . $usuario['id'] . "</th>",

                     "<th id = 'usuario'>" . $usuario['usuario'] . "</th>",

                     "<th id = 'contraseña'>" . $usuario['contraseña'] . "</th>",

                     "<th id = 'fecha'>" . $usuario['fecha_nacimiento'] . "</th>",

                     "<th id = 'correo'>" . $usuario['email'] . "</th>",

              "<th id = 'botonModificar'>
                       <a href='modificar_usuario.php?id=" . $usuario['id'] . "' class='btn btn-warning'>
                        <iconify-icon icon='material-symbols:save-as-outline' class='d-inline-block align-top' id = 'iconoModificar'>
                        </iconify-icon>Modificar
                      </a>
                    </th>
            

                    <th id = 'botonEliminar'>
                       <a href='eliminar_usuario.php?id=" . $usuario['id'] . "' class='btn btn-danger'
                       onclick='return confirm(\"¿Estas seguro de que quieres borrar este usuario?\");'>
                        <iconify-icon icon='bi:trash' class='d-inline-block align-top' id = 'iconoEliminar'>
                        </iconify-icon>Eliminar
                      </a>
                    </th>";

          }

          ?>
        </tbody>
      </table>
    </div>
  </div>


  <?php

  include 'footer.php';

  ?>

</body>

</html>