<?php
include 'barra.php';
include './controladores/ControladorUsuario.php';
session_start();
$datosusuario = unserialize($_SESSION['Usuario']);
$nombre = $datosusuario['usuario'];

$consultaSelect = new ControladorUsuario();
$usuarios = $consultaSelect->listadoUsuarios();

foreach ($usuarios as $usuario) {

  echo "<tr>
          
                     <th id = 'id'>" . $usuario['id'] . "</th>",

    "<th id = 'usuario'>" . $usuario['usuario'] . "</th>",

    "<th id = 'contraseña'>" . $usuario['contraseña'] . "</th>",

    "<th id = 'fecha'>" . $usuario['fecha_nacimiento'] . "</th>",

    "<th id = 'correo'>" . $usuario['email'] . "</th>",

    "<th id = 'botonModificar'>
                       <a href='modificar_usuario.php?id=" . $usuario['id'] . "' class='btn btn-warning'>
                        <iconify-icon icon='material-symbols:save-as-outline' class='d-inline-block align-top' id = 'iconoModificar'>
                        </iconify-icon>Modificar
                      </a>
                    </th>
            

                    <th id = 'botonEliminar'>
                       <a href='eliminar_usuario.php?id=" . $usuario['id'] . "' class='btn btn-danger'
                       onclick='return confirm(\"¿Estas seguro de que quieres borrar este usuario?\");'>
                        <iconify-icon icon='bi:trash' class='d-inline-block align-top' id = 'iconoEliminar'>
                        </iconify-icon>Eliminar
                      </a>
                    </th>";

}


include 'footer.php';

?>