<?php
include 'barra.php';
include './controladores/ControladorUsuario.php';
session_start();
$datosusuario = unserialize($_SESSION['Usuario']);
$nombre = $datosusuario['usuario'];

$controladorUsuarios = new ControladorUsuario();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Llamada a la funcion verificarUsuario con el parametro usuario
    $verificar_usuario = $controladorUsuarios->verificar_usuario($_POST['usuario']);

    //Llamada a la funcion verificarCorreo con el parametro correo
    $verificar_email = $controladorUsuarios->verificar_correo($_POST['correo']);

    //En el caso de que el usuario exista salta un mensaje de error
    if ($verificar_usuario) {

        $errorUsuario = "Este usuario ya existe";
    }

    //Si existe el correo salta un mensaje de error
    if ($verificar_correo) {

        $errorEmail = "Este correo ya existe";

    } else {

        $controladorUsuarios->insertarUsuario(
            $_POST['usuario'],
            $_POST['contraseña'],
            $_POST['fecha_nacimiento'],
            $_POST['correo']
        );
    }
}

?>



<div>

    <table id="tablausuarios">
        <thead class="thead-dark">
            <tr>
                <th class="id">ID</th>
                <th class="usuario">Usuario</th>
                <th class="contraseña">Contraseña</th>
                <th class="fecha">Fecha Nacimiento</th>
                <th class="correo">Email</th>
            </tr>
        </thead>

        <tbody>

            <?php
            //Dibujamos la cabecera de la tabla
            $usuarios = $controladorUsuarios->getUsuarios();

            //Mediante un bucle cada una de las columnas de la base de datos
            foreach ($usuarios as $usuario) {
                echo '<tr>';
                echo "<td id = 'id'><b>$row[id]<b></td>";
                echo "<td id = 'user'><b>$row[usuario]</b></td>";
                echo "<td id = 'contra'><b>$row[contraseña]</b></td>";
                echo "<td id = 'fecha'><b>$row[fecha_nacimiento]</b></td>";
                echo "<td id = 'email'><b>$row[email]</b></td>";
                echo '</tr>';
            }

            ?>

        </tbody>

    </table>

</div>

<!--Pie de pagina-->
<?php

include 'footer.php';

?>