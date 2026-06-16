<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_POST['file']; // Obtener el nombre del archivo enviado desde JavaScript
    $filePath = "../canciones/" . $file; // Ruta completa del archivo

    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            echo "Archivo eliminado exitosamente.";
        } else {
            echo "No se pudo eliminar el archivo.";
        }
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "Método no permitido.";
}
?>
