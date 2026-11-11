<?php
session_start();
$datosusuario = unserialize($_SESSION['Usuario']);
$nombre = $datosusuario['usuario'];
?>

<link href="./css/barra.css" rel="stylesheet" />
<script src="./js/barra.js"></script>

<style>
    /* Regla CSS para colocar en horizontal 
    las opciones del menu con FlexBox*/
    .menu ul {
        display: flex;
        gap: 120px;
    }

    .menu ul li {
        list-style: none;
    }
</style>
<header>

    <h3>
        <a href="./inicio.php">PlayRecord</a>
    </h3>

    <nav class="menu">
        <ul>
            <li>
                <a href="./inicio.php">Inicio</a>
            </li>

            <li>
                <a href="./nombreListas.php">Crear Lista</a>
            </li>

            <li>
                <a href="./listasGuardadas.php">Listas</a>
            </li>
        </ul>
    </nav>

    <ul class="menu_usuario">
        <li class="nav-link dropdown">
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
                    <a class="dropdown-item" href="./datosPersonales.php?id=<?php echo $datosusuario['id']; ?>">Mi
                        Cuenta</a>
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