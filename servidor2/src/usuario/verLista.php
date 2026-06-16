<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Listas / Eliminar Canciones</title>
  <link href = "./css/diseñoListas.css" rel = "stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./js/eliminarCancion.js"></script>
  <link rel = "icon" href = "" type="image/x-icon">
</head>

<body>

  <?php
        include '../admin/basededatos.php';
        include './controladores/ControladorListas.php';
        include './controladores/ControladorCanciones.php';

        $lista = new ControladorListas();
        $cancion = new ControladorCanciones();

        $id = $lista->idListasPorUsuario();
        $nombreLista = $lista->nombreLista();
        $cancionesLista = $cancion->cancionesPorLista();
        $cancion->borrarCancion();

        //Con este bucle obtenemos los nombres de cada una de las listas creadas
        foreach ($nombreLista as $lista) {

            echo "<div id = 'contenedor'>
           <strong>
              <p>Nombre de la lista:</p>
              <h4 id = 'nombreLista'>" . $lista[0] . "</h4>
           </strong>
          </div>
          <br>";

        }

        //Id de la lista
        foreach ($id as $idLista) {

            echo "<input type = 'hidden' name = 'idlist' value = '" . $idLista[0] . "'>";
        }


        //Canciones que contiene la lista
        echo '<ol id = "list">
          <scroll-container>
           <scroll-page>';

        foreach ($cancionesLista as $canciones) {

            echo '<li data-src = "canciones/' . $canciones[1] . '" name = "idsong" id = "song">' . $canciones[1] . '
           <input type = "hidden" name = "idcancion" value = "' . $canciones[0] . '">
           <a href = "eliminarCancion.php?id=' . $canciones[0] . '">
           <img src = "./img/eliminarCancion.png" name = "cancion" class = "borrarCancion" value = ' . $canciones[0] . '>
           </a>
          </li>';

        }

        echo ' </scroll-page>
        </scroll-container>
       </ol>';

  ?>

  <script src="./js/reproductorlist.js"></script>

</body>

</html>