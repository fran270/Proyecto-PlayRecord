<?php
session_start();
$datosusuario = unserialize($_SESSION['Usuario']);
$nombre = $datosusuario['usuario'];
?>

<link href = "../css/diseñoBarra.css" rel = "stylesheet">

<style>
#opcion1,
#opcion2,
#opcion3 {
  text-decoration: none;

}

#opcion1:hover {
  border-bottom: 3px solid white;
}

#opcion2:hover {
  border-bottom: 3px solid white;
}

#opcion3:hover {
  border-bottom: 3px solid white;
}

#opcion1 {
  color: black;
  display: flex;
}

#opcion1,
#opcion2,
#opcion3 {
  color: black;
}

h3 {

  margin-left: 20px;
  font-family: Lucida Handwriting;
  font-weight: bold;
  color: black;
}

nav {
  margin-left: 0%;
  margin-right: 0%;
  background-color: rgb(243, 188, 120);
}

#barra {
  width: 102%;
}

.opciones {
  list-style: none;
  /*Quita el punto negro de la lista*/
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: -20px;
}

.opciones li {
  padding: 30px 30px;
  padding-bottom: 0%;
}

#cerrar{
  height: 40px;
}
</style>
<nav class="navbar navbar-expand-lg">

  <div class="container-fluid">

    <a class="navbar-brand" href="portada.php">
      <h3>PlayRecord</h3>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="opciones">

        <li>
          <a href="./portada.php" id="opcion1">INICIO</a>
        </li>

        <li>
          <a href="./canciones.php" id="opcion2">CANCIONES</a>
        </li>

        <li>
          <a href="./listado_usuarios.php" id="opcion3">USUARIOS</a>
        </li>

      </ul>

      <ul class="cerrar">
        <a class="navbar-brand" href="#">
          <span id="nom">

            <?php

            echo $nombre;

            ?>

          </span>
        </a>
      </ul>

      <ul class="cerrar1">

        <a href="logout.php" onclick='return confirm("¿Estas seguro de que quieres cerrar sesion?");'>

          <img src="./img/logoutrojo.png" onmouseover="this.src='./img/logoutazul.png';"
            onmouseout="this.src='./img/logoutrojo.png';" id = "cerrar"/>
        </a>
      </ul>
    </div>
  </div>
</nav>