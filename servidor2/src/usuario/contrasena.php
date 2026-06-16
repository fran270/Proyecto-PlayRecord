<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion contraseña</title>
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <link href = "../css/diseño.css" rel = "stylesheet">
    <link rel = "icon" href = "./img/iniciar-sesion.png" type = "image/x-icon"> 
    <script src="../js/validarClave.js"></script>
</head>

<body>

    <img src="../img/imagen1.jpg" id="imagen">

    <?php 

       //Conexion a la base de datos
       /*$servername = "mysql_db";
       $username = "root";
       $password = "root";
       $dbname =  "proyecto";

       //Crear conexion
       $conn = new mysqli($servername, $username, $password, $dbname);

       //Verificar la conexion
       if($conn->connect_error){

            die("Conexion fallida: ". $conn->connect_error);
       }*/

       include './admin/basededatos.php';
       $bd = new basededatos();

       //Obtener el token de la URL
       $token = $_GET['token'];

       $token = $bd->$conn->real_escape_string($token);

       //Buscar el token en la base de datos
       $sql = "SELECT email FROM contraseñas WHERE token = '$token'";
       $resultado = $bd->ejecutaConsulta($sql);
       
       #$resultado = $conn->query($sql);
       

       if($resultado){

            if($resultado > 0){

                echo "<form action = 'guardar.php' id = 'formulario' method = 'POST'>";
                echo "<h2>Nueva Contraseña</h2>";
                echo "<input type = 'hidden' name = 'token' value = '$token'>";
                echo "<label for = 'contrasena' class = 'contenedor'>Nueva Contraseña:</label>";
                echo "<input type = 'password' name = 'contrasena' id = 'contrasena'>";
                echo "<br><br>";
                echo "<label for = 'conf_contraseña' class = 'contenedor'>Confirmar Contraseña:</label>";
                echo "<input type = 'password' name = 'conf_contraseña' id = 'conf_contraseña'>";
                echo "<br><br>";
                echo "<button type = 'submit' name = 'boton' id = 'boton' value = 'restablecer' class = 'btn btn-success'> 
                <iconify-icon icon = '' class = 'd-inline-block align-top' width = '20px' height = '20px'></iconify-icon>Restablecer</button>";
                echo "</form>";      
            
            } else {

                echo "El token no es valido";
            }

       } else {

           echo "Error en la consulta: ". $conn->error;
       }

       $bd->close();
    ?>
</body>

</html>