$(document).on('click', '.borrarArchivo', function (e) {
    e.preventDefault(); // Evitar la navegación predeterminada
    
    const fileName = $(this).data('file'); // Obtener el nombre del archivo del atributo data-file

    if (confirm(`¿Estás seguro de que quieres borrar la cancion: ${fileName}?`)) {
       
        $.ajax({
            url: 'borrarCancionCarpeta.php', // Archivo PHP que manejará la eliminación
            type: 'POST',
            data: { 
                file: fileName
            },
            success: function (response) {
                alert(response); // Mostrar el mensaje del servidor
                location.reload(); // Recargar la página para actualizar la lista
            },
            error: function () {
                alert('Ocurrió un error al intentar eliminar el archivo.');
            }
        });

    }
});
