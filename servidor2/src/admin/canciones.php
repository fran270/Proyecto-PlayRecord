<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de canciones</title>
    <link rel="icon" href="./img/canciones.png" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link href="./css/listadoCanciones.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/borrarCanciones.js"></script>

    <?php
    include 'barra.php';
    include './controladores/ControladorCancion.php';
    session_start();
    $datosusuario = unserialize($_SESSION['Usuario']);
    $nombre = $datosusuario['usuario'];
    ?>

</head>

<body>

    <h3 id='titulo'>Listado de Canciones</h3>

    <br><br>

    <div class="contenedor">

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $controladorCanciones = new ControladorCancion();

            $archivo = $_FILES['archivo'];
            $nombreArchivo = $archivo['name'];
            $rutaTemporal = $archivo['tmp_name'];
            $rutaDestino = "../canciones/" . $nombreArchivo;

            if (move_uploaded_file($rutaTemporal, $rutaDestino)) {

                $canciones = serialize($rutaDestino);
                $controladorCanciones->insertarCancionesRepositorio($canciones);

                //echo "La cancion se ha subido a la base de datos";
        
            } else {

                $extension = pathinfo($archivo, PATHINFO_EXTENSION);

                //Array con los formatos de archivos permitidos
                $formatos = ['mp3', 'ogg', 'aac', 'wav', 'flac', 'm4a'];

                //En el caso de que la extension del fichero a subir no este dentro del array formatos salta un mensaje de error
                if (!in_array($extension, $formatos)) {

                    echo "<p style = 'color:red; text-align:center;'>Solo se pueden subir archivos de audio <b>$formatos[0]</b>, <b>$formatos[1]</b>, <b>$formatos[2]</b>, <b>$formatos[3]</b>, <b>$formatos[4]</b></p>";

                    //En el caso contrario se sube el fichero al servidor y se mueve a la carpeta de destino
                } else {

                    move_uploaded_file($rutaTemporal, $ruta);
                    $canciones = serialize($rutaDestino);
                    $controladorCanciones->insertarCancionesRepositorio($canciones);

                    echo "<p style = 'color:green; text-align:center;'>El archivo se ha subido correctamente</p>";

                }
            }
        }

        ?>

        <form id="subirFichero" method="POST" enctype="multipart/form-data">

            <input type="file" name="archivo" id="archivo" class="btn btn-info">

            <button type="submit" name="boton4" id="boton4" value="añadir" class="btn btn-info">Añadir</button>

        </form>

        <div id="contenido-lista">

            <div id="nombre_lista">
                Repositorio Canciones
            </div>

            <br>

            <div id="resultado">

                <ol id='playlist'>
                    <?php

                    $controladorCanciones->getCanciones();

                    //Esta variable contiene la funcion que se encarga de escanear el directorio de destino
                    $directorio = scandir("./canciones/", SCANDIR_SORT_NONE);

                    //Bucle que recorre la carpeta que contiene las canciones
                    foreach ($directorio as $carpeta) {

                        if ($carpeta != "." && $carpeta != "..") {


                            echo "<scroll-container>
                               <scroll-page>
                               <li data-src = './canciones/$carpeta' style = 'font-weight:bold;' name = 'cancion' id = 's'>" . $carpeta . "  
                                 
                               <a class = 'borrarArchivo' data-file = '" . $carpeta . "'>
                               
                                 <img src = '../usuario/img/eliminarCancion.png' style = 'width:30px;' name = 'idCancion' class = 'eliminarCancion' value = '" . $carpeta . "'>
                               
                               </a><br>
                      
                               </li>
                               </scroll-page>
                            </scroll-container>";


                            if (file_exists($carpeta)) {

                                unlink($carpeta);

                                echo "La cancion se ha borrado";

                            }

                        }

                    }

                    ?>
                </ol>
            </div>
        </div>


        <br><br>

        <div class="music-player-container">

            <!--Contenedor que muestra el nombre de la cancion y artista que se esta reproduciendo -->
            <div class="title-music-container">
                <h4 id="song-title">Nombre de la cancion</h4>
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


            <!--Botones de reproduccion -->
            <div class="main-song-controls">
                <img src="../usuario/img/backward.svg" class="icon" id="Back10">
                <img src="../usuario/img/boton1.svg" class="icon" id="button1">
                <img src="../usuario/img/OIP.svg" class="icon" id="playPause">
                <img src="../usuario/img/boton2.svg" class="icon" id="button2">
                <img src="../usuario/img/forward.svg" class="icon" id="Plus10">
            </div>

        </div>

    </div>

    <script src="./js/reproductor.js"></script>

    <!--Pie de pagina-->
    <?php

    include 'footer.php';

    ?>

</body>

</html>