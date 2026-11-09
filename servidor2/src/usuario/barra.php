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