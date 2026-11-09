<?php
include 'barra.php';
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

    <div class="listas">

      <table class="table table-hover">

        <thead>
          <h2>Listas</h2>
          <th id="columna1">ID</th>
          <th>
            <b>Lista</b>
          </th>
          <th>
            <b>OPCIONES</b>
          </th>
        </thead>

        <tbody class="tbody">

          <?php

          $controladorListas = new ControladorListas();
          $listas = $controladorListas->listasPorUsuario();

          //Mostramos en una tabla las listas creadas por el usuario con 3 botones de edicion
          foreach ($listas as $lista) {

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

          ?>

        </tbody>
      </table>
    </div>



    <!--Listado de canciones disponibles de la aplicacion-->
    <div class="canciones">

      <h2 id="canciones">Repositorio Canciones</h2>

      <ol id="playlist">

        <form action="#" id="formCanciones" method="POST">

          <?php


          $controladorCanciones = new ControladorCanciones();

          $listas = $controladorListas->idListasPorUsuario();
          $canciones = $controladorCanciones->getCanciones();

          $directorio = scandir("canciones/", SCANDIR_SORT_NONE);



          foreach ($listas as $lista) {

            echo '<input type = "hidden" name = "idLista" value = "' . $lista[0] . '">';

          }

          foreach ($canciones as $cancion) {

            echo '<input type = "hidden" name = "idCancion" value = "' . $cancion[0] . '">';

          }



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


          if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['opcion']) && is_array($_POST['opcion'])) {

              $cancionesSeleccionadas = $_POST['opcion'];

              $idlista = intval($_POST['idLista']);

              // Guardar cada canción seleccionada en la base de datos
              foreach ($cancionesSeleccionadas as $cancion) {

                $controladorCanciones->insertarCancionesLista($cancion, $idlista);

              }

            }

          }
          ?>

          <div class="botones">
            <button type="submit" name="anadir" id="anadir" class="btn btn-primary">Añadir</button>
          </div>
        </form>
      </ol>
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


  <script src="../../usuario/js/reproductor.js"></script>


  <!--Pie de pagina-->
  <?php

  include 'footer.php';

  ?>


</body>

</html>