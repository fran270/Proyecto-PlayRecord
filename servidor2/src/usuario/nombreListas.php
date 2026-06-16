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

  <?php
  include 'barra.php';
  include '../admin/basededatos.php';
  session_start();
  $datosusuario = unserialize($_SESSION['Usuario']);
  $nombre = $datosusuario['usuario'];
  ?>

</head>

<body>

  <h3>Crea el nombre de tus listas de reproduccion</h3>

  <br><br>

  <div class="contenedor">

    <?php

    echo '<form id="crearLista" method="POST">
          
           <label for="nombre">Nombre de la Lista:</label>
           <input type="text" name="nombre" id="nombre">
      
           <button type="submit" name="boton3" id="boton3" class="btn btn-primary">Crear</button>

          </form>
          
          <span id="error">' . '</span>';

    ?>

    <br>

    <div id="contenido-lista">

      <div id="nombre_lista">
        Listas de Reproduccion
      </div>

      <br>

      <div id="resultado">

        <?php

        include './controladores/ControladorListas.php';
        $lista = new ControladorListas();
        $datos = $lista->listasPorUsuario();

        echo "<table>
                  <tbody id = 'list'>
                  <tr>
                   <td>";


        foreach ($datos as $row) {

            echo "" . $row['nombre'] . "<br>";

        }

        echo "  
                </td>
                </tr>
                </tbody>
                </table>";


        ?>

      </div>

    </div>

  </div>

  <script src="../js/reproductor.js"></script>

  <?php

  include 'footer.php';

  ?>

</body>

</html>