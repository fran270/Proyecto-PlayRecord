<?php
include 'barra.php';
include './controladores/ControladorListas.php';
$controladorListas = new ControladorListas();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listas de musica</title>
  <link rel="icon" href="./img/icono_musica.png" type="image/x-icon">
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
  <link rel="icon" href="./img/crearLista.png" type="image/x-icon">
  <link href="./css/listas.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./js/listas.js"></script>
</head>

<body>

  <h3>Crea el nombre de tus listas de reproduccion</h3>

  <div class="contenedor">

    <?php
    include 'crearLista.html';

    if (!empty($_POST['lista'])) {
      $lista = $_POST['lista'];
      $controladorListas->insertarNombreLista($lista);
    }

    ?>

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

                $listas = $controladorListas->listasPorUsuario();

                foreach ($listas as $lista) {
                  echo "" . $lista[1] . "<br>";
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