<?php
include 'barra.php';
include './controladores/ControladorListas.php';
session_start();
$datosusuario = unserialize($_SESSION['Usuario']);
$nombre = $datosusuario['usuario'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listas de musica</title>
  <link rel="icon" href="./img/icono_musica.png" type="image/x-icon">
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <link rel="icon" href="./img/crearLista.png" type="image/x-icon">
  <link href="./css/listas.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./js/listas.js"></script>
</head>

<body>

  <h3>Crea el nombre de tus listas de reproduccion</h3>

  <br><br>

  <div class="contenedor">

    <?php
    include 'crearLista.html';
    ?>

    <br>

    <div id="contenido-lista">

      <div id="nombre_lista">
        Listas de Reproduccion
      </div>


      <div id="resultado">

        <table>
          <tbody id='list'>
            <tr>
              <td>
                <?php
                $controladorListas = new ControladorListas();
                $listas = $controladorListas->listasPorUsuario();

                foreach ($listas as $lista) {

                  echo "" . $lista['nombre'] . "<br>";

                }
                ?>

              </td>
            </tr>
          </tbody>
        </table>

      </div>

    </div>

  </div>

  <script src="../js/reproductor.js"></script>

  <?php

  include 'footer.php';

  ?>

</body>

</html>