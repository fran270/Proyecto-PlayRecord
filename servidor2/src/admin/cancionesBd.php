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
    <link href = "./css/listadoCancionesBd.css" rel = "stylesheet"> 
   
    <?php
    include 'barra.php';
    include 'basededatos.php';
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

       /* if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($_FILES) {

                $bd = new basededatos();

                $archivo = $_FILES['archivo'];
                $nombreArchivo = $archivo['name'];
                $rutaTemporal = $archivo['tmp_name'];
                $rutaDestino = "../canciones/" . $nombreArchivo;


                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {

                    $bloque = array();
                    $bloque[0] = $rutaDestino;
                    $canciones = serialize($bloque);
                    $bd->insertarCancionesRepositorio($canciones);

                    //echo "La cancion se ha subido a la base de datos";
        
                } else {

                    //echo "Error al subir la cancion";
                    
                }
            }

        }

        echo '<form id="subirFichero" method="POST" enctype="multipart/form-data">

                  <input type="file" name="archivo" id="archivo" class="btn btn-info">

                  <button type="submit" name="boton4" id="boton4" value="añadir" class="btn btn-info">Añadir</button>

               </form>';*/
        ?>


        <br>

        <div id="contenido-lista">

            <div id="nombre_lista">
                Canciones 
            </div>


            <br>

            <div id="resultado">


                <?php

                #$bd = new basededatos();
                include './controladores/ControladorCancion.php';
                $cancion = new ControladorCancion();

                $canciones = $cancion->getCanciones();

               // $rutaDestino = "../canciones/";

                //Esta variable contiene la funcion que se encarga de escanear el directorio de destino
                //$directorio = scandir($rutaDestino, SCANDIR_SORT_NONE);


                echo "<ol id = 'playlist'>";
                //Bucle que recorre la carpeta que contiene las canciones
                //foreach ($directorio as $carpeta) {

                   // if ($carpeta != "." && $carpeta != "..") {

                        echo "
                             <scroll-container>
                               <scroll-page>";


                                foreach($canciones as $cancion){
                              
                                    echo "<input type = 'hidden' name = 'idcancion' value = '".$cancion[0]."'>";

                                    echo "<li data-src = '../canciones/$cancion[1]' style = 'font-weight:bold;' name = 'cancion' id = 's'>" .$cancion[1]. "  
                                 
                                         <a href = 'borrarCanciones.php?id=".$cancion[0]."' onclick = 'return confirm(\"¿Estas seguro de que quieres borrar esta cancion?\");'><img src = '../img/eliminarCancion.png' style = 'width:30px;' name = 'idCancion' class = 'eliminarCancion' value = '".$cancion[0]."'></a><br>
                                
                                         </li> ";

                               }
                              
                            echo "</scroll-page>
                            </scroll-container>";
                   // }

                //}
           // }

         
                echo "
                </ol>";

                ?>


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

                <img src="../img/backward.svg" alt="" class="icon" id="Back10">
                <img src="../img/boton1.svg" alt="" class="icon" id="button1">
                <img src="../img/OIP.svg" alt="" class="icon" id="playPause">
                <img src="../img/boton2.svg" alt="" class="icon" id="button2">
                <img src="../img/forward.svg" alt="" class="icon" id="Plus10">

            </div>
        </div>

    </div>



    <script src="reproductor.js"></script>


    <!--Pie de pagina-->
    <footer style="background-color:rgb(253, 211, 159); margin-left:-20px; margin-right:-14px; margin-top:15%;"
        data-bs-theme="light">

        <div class="container">
            <div class="row">

                <div class="col-lg-4"><br>
                    <h3 style="color:black; font-family:Lucida Handwriting;">PlayRecord</h3>
                    <b> Crea y reproduce tu <br> musica favorita</b>
                </div>

                <div class="col-lg-4"><br>
                    <h3>Contacto</h3>
                    <p><b>Telefono</b>: 622 90 63 05</p>
                    <p><b>Correo Electronico</b>: playrecord@gmail.com</p>
                </div>

                <div class="col-lg-4"><br>
                    <h3>Derechos de autor</h3>
                    <p>2024 <b>PlayRecord</b>. Todos los derechos reservados.</p>
                </div>

            </div>
        </div>
    </footer>

</body>

</html>