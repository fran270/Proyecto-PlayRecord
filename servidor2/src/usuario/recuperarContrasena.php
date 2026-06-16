<?php
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\OAuthTokenProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\POP3;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\GenericProvider;

require_once('./email/src/Exception.php');
require_once('./email/src/PHPMailer.php');
require_once('./email/src/SMTP.php');
require_once('./email/src/POP3.php');
require_once('./email/src/OAuth.php');
require_once('./email/src/OAuthTokenProvider.php');
require_once('./email/vendor/autoload.php');


/*require_once ('./correo/Exception.php');
require_once ('./correo/PHPMailer.php');
require_once ('./correo/SMTP.php');*/

// Conexión a la base de datos (asegúrate de ajustar estos valores según tu configuración)
$servername = "mysql_db";
$username = "root";
$password = "root";
$dbname = "proyecto";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el correo electrónico del formulario
$email = $_POST['correo'];

// Generar un token único
$token = bin2hex(random_bytes(50));


// Insertar el token en la base de datos
$sql = "INSERT INTO contraseñas (email, token) VALUES ('$email', '$token')";

if ($conn->query($sql) === TRUE) {

    /* Sección de variables */

  
    //Quien envía
    $cuentaRemitente = 'franjose2004@hotmail.com';
    $PassCuentaRemitente = 'francisco14';

    //Quien recibe
    $cuentaDestinatario = "franjose2004@hotmail.com";

    //Que se envía
    $Asunto = "Recuperar contrasena";
    $Mensaje = "Pulsa en este <a href = 'http://localhost:8088/contrasena.php?email=$email&token=$token'> enlace </a> para generar la nueva contrasena";


    $mail = new PHPMailer(true);


    try {
        // Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.outlook.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; 
        
        $mail->AuthType = 'XOAUTH2';
        $mail->oauth = new OAuth([
            'provider' => new GenericProvider([
                'clientId'                => 'e454a617-9822-4166-aaa3-3808f0ef130a',
                'clientSecret'            => '85d09469-0b4a-419e-9ac6-35cf9d844244',
                'redirectUri'             => 'https://localhost:8088',
                'urlAuthorize'            => 'https://login.microsoftonline.com/64eeea35-d558-4b06-a9f7-e98d0ffcf190/oauth2/v2.0/authorize',
                'urlAccessToken'          => 'https://login.microsoftonline.com/64eeea35-d558-4b06-a9f7-e98d0ffcf190/oauth2/v2.0/token',
                'urlResourceOwnerDetails' => '',
            ]),
            'token' => 'ACCESS_TOKEN',
        ]);
    

        $mail->Username = $cuentaRemitente;
        $mail->Password = $PassCuentaRemitente;

        $mail->setFrom($cuentaRemitente, 'Correo del sistema');
        $mail->addAddress($cuentaDestinatario, '');
        $mail->addReplyTo($cuentaRemitente, '');


        $mail->isHTML(true);
        $mail->Subject = $Asunto;
        $mail->Body = $Mensaje;
        $mail->AltBody = $MensajeAlterno;

        echo $mail->send();
        echo "Si el dato esta correcto, recibira en su correo un mensaje con un enlace para generar la nueva contraseña";

    } catch (Exception $e) {

        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }

} else {

    echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close();
?>