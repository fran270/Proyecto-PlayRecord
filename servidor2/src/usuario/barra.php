<?php
session_start();
$datosusuario = unserialize($_SESSION['Usuario']);
$nombre = $datosusuario['usuario'];
?>

<link href="./css/diseñoBarra.css" rel="stylesheet">
<script src="./js/barra.js"></script>

<header>
    <h3>
        <a href="./inicio.php">PlayRecord</a>
    </h3>

    <nav class="menu">
        <div>
            <a href="./inicio.php">Inicio</a>
        </div>
        <div>
            <a href="./nombreListas.php">Crear Lista</a>
        </div>
        <div>
            <a href="./listasGuardadas.php">Listas Guardadas</a>
        </div>
    </nav>

    <ul>
        <li class="nav-link dropdown" class="na">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">

                <img src="./img/imagen1.jpg" id="logo_perfil" />
            </a>

            <ul class="dropdown-menu">
                <li class="dropdown-item">
                    <?php echo $nombre; ?>
                </li>

                <li>
                    <hr class="dropdown-divider" />
                </li>

                <li>
                    <a class="dropdown-item" href="./datos_personales.php">Mi Cuenta</a>
                </li>

                <li>
                    <hr class="dropdown-divider" />
                </li>

                <li>
                    <a class="dropdown-item" href="./logout.php">Cerrar Sesion</a>
                </li>
            </ul>
        </li>
    </ul>

</header>

<!--<nav class="navbar navbar-expand-lg" data-bs-theme="light">

    <div class="container-fluid">

        <a class="navbar-brand" href="inicio.php">
            <h3>PlayRecord</h3>
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">

                <li>
                    <a class="dropdown-item" href="./inicio.php" id="opcion1">Inicio</a>
                </li>

                </li>
            </ul>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="opcion2">
                            Listas de Reproduccion
                        </a>

                        <ul class="dropdown-menu" id="menu">
                            <li>
                                <a class="dropdown-item" href="./nombreListas.php">Crear Listas</a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="./listasguardadas.php">Listas Guardadas</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right navbar-text">
                    <a class="navbar-brand" href="#">
                        <span id="nom">
                            <?php

                            echo $nombre;

                            ?>
                        </span>
                    </a>
                </ul>-->

<!--<ul class="nav navbar-nav navbar-right navbar-text">
                    <a href="logout.php" onclick="return confirm('¿Estas seguro de que quieres cerrar sesion?');">
                        <img src="./img/logoutrojo.png" id="icono1">
                    </a>
                </ul>-->


</div>
</div>
</nav>