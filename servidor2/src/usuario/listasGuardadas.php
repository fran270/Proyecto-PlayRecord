<?php
include 'barra.php';
include '../admin/basededatos.php';
include './controladores/ControladorListas.php';
include './controladores/ControladorCanciones.php';
session_start();
$datosusuario = unserialize($_SESSION['Usuario']);
$nombre = $datosusuario['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listas Guardadas</title>
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
  <link href="./css/listasGuardadas.css" rel="stylesheet">
  <link rel="icon" href="./img/icono_musica.png" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./js/añadirCanciones.js"></script>
  <script src="./js/eliminarCanciones.js"></script>
</head>

<body>


  <div class="caja">

    <?php

    $lista = new ControladorListas();
    $datos = $lista->listasPorUsuario();

    echo ' <div class="listas">

          <table class="table table-hover">

            <thead>
             <h2>Listas</h2>
              <th id = "columna1">ID</th>
              <th>
                <b>Nombre Lista</b>
              </th>
              <th>
               <b>OPCIONES</b>
              </th>
            </thead>

          <tbody class="tbody">';

    //Mostramos en una tabla las listas creadas por el usuario con 3 botones de edicion
    foreach ($datos as $row) {

      echo '<tr data-lista-nombre = ' . $row['nombre'] . '">
             
             <td id = "col1"><input type = "hidden" name ="idLista"> ' . $row[0] . '</td>

              <td>' . $row['nombre'] . '</td>

               <td>
                <img src="./img/añadirCancion.png" class="añadirCancion" value = "' . $row[0] . '" data-lista-id=' . $row[0] . '>
                <img src="./img/verLista.png" class="verLista" value = "' . $row[0] . '">
                <a href = "eliminarLista.php?id= "' . $row[0] . '">
                <img src="./img/eliminarCancion.png" class="eliminarLista" value ="' . $row[0] . '" data-lista-nombre = ' . $row[1] . '>
                </a>
              </td>

          </tr>';

    }


    echo '</tbody>
          </table>
        </div>';

    ?>



    <!--Listado de canciones disponibles de la aplicacion-->
    <div class="canciones">

      <h2 id="canciones">Repositorio Canciones</h2>

      <?php

      $cancion = new ControladorCanciones();
      $lista = new ControladorListas();

      $idlistas = $lista->idListasPorUsuario();
      $songs = $cancion->getCanciones();

      echo '<ol id = "playlist">

         <form action = "#" id = "formCanciones" method = "POST">';

      foreach ($idlistas as $idlista) {

        echo '<input type = "hidden" name = "idLista" value = "' . $idlista[0] . '">';

      }

      foreach ($songs as $canciones) {

        echo '<input type = "hidden" name = "idCancion" value = "' . $canciones[0] . '">';

      }


      $carpeta1 = "canciones/";
      $directorio = scandir($carpeta1, SCANDIR_SORT_NONE);

      //Bucle que recorre la carpeta que contiene las canciones
      foreach ($directorio as $carpeta) {

        if ($carpeta != "." && $carpeta != "..") {

          echo '<scroll-container>
                <scroll-page>

                 <li data-src = "canciones/' . $carpeta . '" name = "canci" id = "cancion">
                
                  <input type ="checkbox" name = "opcion[]" id = "opcion" data-nombre = "' . $carpeta . '" value = "' . $carpeta . '">' . $carpeta . '
    
                </li>
  
               </scroll-page>
             </scroll-container>';

        }

      }

      echo '
      <div class = "botones">
        <button type="submit" name="anadir" id="anadir" class="btn btn-primary">Añadir</button>
      </div>
    </form>
    </ol>';

      if ($_SERVER['REQUEST_METHOD'] = 'POST') {

        $cancionLista = new ControladorCanciones();

        if (isset($_POST['opcion'])) {

          if (is_array($_POST['opcion'])) {

            $cancionesSeleccionadas = $_POST['opcion'];

            $idlista = intval($_POST['idLista']);

            // Guardar cada canción seleccionada en la base de datos
            foreach ($cancionesSeleccionadas as $cancion) {

              $resultado = $cancionLista->insertarCancionesLista($cancion, $idlista);

              if ($resultado) {

                //echo "<p>La canción '$cancion' se ha guardado correctamente en la base de datos.</p>";
      
              } else {

                //echo "<p>Error al guardar la canción '$cancion'.</p>";
              }
            }

          }

        }

      }

      ?>

    </div>

    <!--Ver Lista con sus canciones-->
    <div id="listaCompleta"></div>

    <!--Reproductor de audio-->
    <div class="music-player-container">

      <!--Contenedor que muestra el nombre de la cancion y artista que se esta reproduciendo -->
      <div class="title-music-container">
        <h5 id="song-title">Nombre de la cancion</h5>
      </div>

      <!--Barra de progreso del reproductor -->
      <div class="controls-music-container">
        <div class="progress-song-container">
          <div class="progress-bar" id="progress-bar">
            <span class="progress" id="progress"></span>
          </div>
        </div>

        <!--Muestra el tiempo de inicio y fin de la cancion -->
        <div class="time-container">
          <span class="time-left" id="CurrentSongTime"></span>
          <span class="time-left" id="SongLength"></span>
        </div>

      </div>

      <!--Reproductor de audio-->
      <audio controls preload="metadata" id="audioPlayer"></audio>


      <!--Botones de reproduccion-->
      <div class="main-song-controls">

        <img src="./img/backward.svg" class="icon" id="Back10">
        <img src="./img/boton1.svg" class="icon" id="button1">
        <img src="./img/OIP.svg" class="icon" id="playPause">
        <img src="./img/boton2.svg" class="icon" id="button2">
        <img src="./img/forward.svg" class="icon" id="Plus10">

      </div>
    </div>
  </div>



  <!--Eliminar lista-->
  <div id="eliminar"></div>


  <script src="./js/reproductor.js"></script>


  <!--Pie de pagina-->
  <?php

  include 'footer.php';

  ?>


</body>
</html>