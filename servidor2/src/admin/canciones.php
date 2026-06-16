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
    include 'basededatos.php';
    session_start();
    $datosusuario = unserialize($_SESSION['Usuario']);
    $nombre = $datosusuario['usuario'];
    ?>
    
</head>

<body>

    <style>
         /*Diseño listas.php*/
 #titulo {
    margin-top: 5%;
    color: black;
    font-family: Lucida Handwriting;
    text-align: center;
}

#boton3 {

    margin-left: 10%;
    margin-top: 2%;
    width: 20%;

}

label {
    margin-left: 15%;
}

#playlist {
    margin-left: 25%;
}

#nombre_lista {
    font-size: 130%;
    background-color: turquoise;
    width: 50%;
    height: 5%;
    border-radius: 3px;
    margin-left: 25%;
    display: flex;
    justify-content: center;
    align-content: center;
}

#contenido-lista {

    background-color: bisque;
    width: 90%;
    margin-left: 5%;
    border-radius: 4px;
    border-color: black;
    border: 1px solid black;
}


#nombre {

    width: 40%;
}

#subirFichero {

    display: flex;
    align-content: center;
    justify-content: center;
    margin-top: 20px;
}

#boton4 {

    margin-left: 1%;
    width: 10%;

}

audio {

    display: none;
}

.contenedor {

    margin-right: 5%;
    margin-left: 5%;
    border-radius: 5px;
    box-shadow: 0px 2px 8px cornflowerblue;
    height: 130%;
    border: 2px solid black;
    background-color: cornsilk;
}

body {

    background-color: color-mix(in srgb, rgb(255, 255, 255) 80%, bisque 20%);

}

#op:hover,
#op1:hover {
    border-bottom: 5px solid white;
}


#op1:hover {
    cursor: pointer;
    text-decoration: none;
}

#playlist {

    height: 90px;
}

#resultado {

    display: flex;
    overflow-y: scroll;
    scroll-behavior: smooth;
    height: 420px;

}

scroll-page {
    /*display: flex;*/
    align-items: center;
    align-content: flex-start;
    justify-content: center;
    flex-direction: column-reverse;
    flex-wrap: wrap;
    height: 35%;
    font-size: 1em;
}


#cancion:hover {

    cursor: pointer;
}


#sec1 {
    cursor: pointer;
    text-decoration: none;
}

th {

    border-bottom: 3px solid black;
    border-radius: 3px;
    border: 1px solid black;
}

#menu {

    width: 55%;
}

#s {
    cursor: pointer;
}



body {

    background-color: rgb(174, 217, 217);
}

/*Diseño reproductor de audio*/
.music-player-container {

    background: linear-gradient(30deg, darkgrey, darkgrey);
    backdrop-filter: blur(10px);
    height: fit-content;
    width: 100%;
    height: 23%;
    border-radius: 10px;
    padding: 2rem 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    box-shadow: 0px 2px 8px darkgrey;

}

.title-music-container {

    width: 80%;
    height: 80%;
    width: fit-content;
    color: azure;
    margin-right: auto;
    margin-left: 10%;
}

/*Estilo letra nombre cancion*/
.song-title {

    font-weight: 600;
    font-size: 17px;
    letter-spacing: 0.5px;
}


.controls-music-container {

    width: 80%;
    height: fit-content;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

}

.progress-song-container {

    margin-top: 0.6rem;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.progress-bar {

    height: 8px;
    border-radius: 5px;
    width: 100%;
    background-color: rgb(102, 102, 102);
    position: relative;
    transition: width 0.1s linear;

}

.progress {

    position: relative;
    height: 100%;
    width: 0%;
    border-radius: 3px;
    background-color: white;
    transition: width 0.1s linear;
}

.time-container {

    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: rgb(167, 167, 167);
    font-size: 12px;
}

.time-left {

    margin-top: 0.3rem;
}



.main-song-controls {

    height: 30px;
    width: 100%;
    margin-top: 1rem;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.icon {

    height: 100%;
    width: auto;
    opacity: 0.6;
    cursor: pointer;
    user-select: none;
}

.icon:hover {

    opacity: 1;
}

#mensaje {
    margin-left: -300px;
}


#CurrentSongTime {

    color: black;
}

#SongLength {

    color: black;
}

audio {

    display: none;
}
    </style>

    <h3 id='titulo'>Listado de Canciones</h3>

    <br><br>

    <div class="contenedor">

        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($_FILES) {

                #$bd = new basededatos();
                $cancion = new ControladorCancion();

                $archivo = $_FILES['archivo'];
                $nombreArchivo = $archivo['name'];
                $rutaTemporal = $archivo['tmp_name'];
                $rutaDestino = "../canciones/" . $nombreArchivo;


                if (move_uploaded_file($rutaTemporal, $rutaDestino)) {

                    $bloque = array();
                    $bloque[0] = $rutaDestino;
                    $canciones = serialize($bloque);
                    $cancion->insertarCancionesRepositorio($canciones);

                    //echo "La cancion se ha subido a la base de datos";
        
                } else {

                    //echo "Error al subir la cancion";
                    //Variable que extrae la extension del fichero a subir
                    $extension = pathinfo($archivo, PATHINFO_EXTENSION);

                    //Array con los formatos de archivos permitidos
                    $formatos = ['mp3', 'ogg', 'aac', 'wav', 'flac', 'm4a'];

                    //En el caso de que la extension del fichero a subir no este dentro del array formatos salta un mensaje de error
                    if (!in_array($extension, $formatos)) {

                        echo "<p style = 'color:red; text-align:center;'>Solo se pueden subir archivos de audio <b>$formatos[0]</b>, <b>$formatos[1]</b>, <b>$formatos[2]</b>, <b>$formatos[3]</b>, <b>$formatos[4]</b></p>";
        
                    //En el caso contrario se sube el fichero al servidor y se mueve a la carpeta de destino
                    } else {

                        move_uploaded_file($rutaTemporal, $ruta);
                        $bloque = array();
                        $bloque[0] = $rutaDestino;
                        $canciones = serialize($bloque);
                        $cancion->insertarCancionesRepositorio($canciones);

                        echo "<p style = 'color:green; text-align:center;'>El archivo se ha subido correctamente</p>";
        
                    }

                }
            }

        }

        echo '<form id="subirFichero" method="POST" enctype="multipart/form-data">

                  <input type="file" name="archivo" id="archivo" class="btn btn-info">

                  <button type="submit" name="boton4" id="boton4" value="añadir" class="btn btn-info">Añadir</button>

               </form>';
        ?>


        <br>

        <div id="contenido-lista">

            <div id="nombre_lista">
                Repositorio Canciones
            </div>

            <br>

            <div id="resultado">

                <?php

                include './controladores/ControladorCancion.php';
                $canciones = new ControladorCancion();
                $canciones->getCanciones();

                $rutaDestino = "./canciones/";

                //Esta variable contiene la funcion que se encarga de escanear el directorio de destino
                $directorio = scandir($rutaDestino, SCANDIR_SORT_NONE);


                echo "<ol id = 'playlist'>";

                //Bucle que recorre la carpeta que contiene las canciones
                foreach ($directorio as $carpeta) {

                    if ($carpeta != "." && $carpeta != "..") {

                        echo "
                             <scroll-container>
                               <scroll-page>";


                        echo "<li data-src = './canciones/$carpeta' style = 'font-weight:bold;' name = 'cancion' id = 's'>" . $carpeta . "  
                                 
                               <a class = 'borrarArchivo' data-file = '" . $carpeta . "'>
                               
                                 <img src = '../usuario/img/eliminarCancion.png' style = 'width:30px;' name = 'idCancion' class = 'eliminarCancion' value = '" . $carpeta . "'>
                               
                               </a><br>
                      
                               </li>";

                        echo "</scroll-page>
                            </scroll-container>";

                        if (file_exists($carpeta)) {

                            unlink($carpeta);

                            echo "La cancion se ha borrado";

                        }

                    }

                }

                echo "</ol>";

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
                <img src="../usuario/img/backward.svg" class="icon" id="Back10">
                <img src="../usuario/img/boton1.svg"  class="icon" id="button1">
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