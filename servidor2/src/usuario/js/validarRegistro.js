document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener("submit", validarCampos);
    document.getElementById("usuario").focus();
});

function validarCampos(evento) {

    evento.preventDefault();

    let usuario = document.getElementById("usuario").value;
    let contraseña = document.getElementById("contraseña").value;
    let fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
    let email = document.getElementById("correo").value;
    

    //Patron campo usuario
    let patronNombre = /^[a-zA-Z0-9]{8,}$/;

    //Validaciones campo usuario
    if (usuario == "") {

        alert("El campo usuario esta en blanco");
        usuario.focus();
        document.getElementById("usuario").focus();
        document.getElementById("usuario").style.border = "1px solid red";

        return false

    } else if (usuario.length > 100) {

        alert("El nombre de usuario no puede contener mas de 100 caracteres");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").style.border = "1px solid red";

        return false
    }

    if (!patronNombre.test(document.getElementById("usuario").value)) {

        alert("El nombre de usuario solo puede contener letras y numeros");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").style.border = "1px solid red";

        return false

    }

    //Si no hay error el borde del input se pone en verde
    document.getElementById("usuario").style.border = "1px solid green";



    //Patron campo contraseña
    var patronContraseña = /^\d?[a-zA-Z]{4}\d{4}$/;
    ///^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{8,}$/
    
    //Validaciones campo contraseña
    if (contraseña == "") {

        alert("El campo contraseña esta en blanco");
        document.getElementById("contraseña").focus();
        document.getElementById("contraseña").style.border = "1px solid red";

        return false
    }

    if (!patronContraseña.test(document.getElementById("contraseña").value || contraseña.length < 8)) {

        alert("La contraseña tiene que tener 4 letras y 4 numeros");
        //alert("La contraseña tiene que tener 8 caracteres entre los cuales una 1 letra mayuscula, 1 minuscula, 1 numero y 1 caracter especial como minimo");
        document.getElementById("contraseña").focus();
        document.getElementById("contraseña").style.border = "1px solid red";

        return false
    }


    document.getElementById("contraseña").style.border = "1px solid green";

    //Validacion campo fecha_nacimiento
    if (fecha_nacimiento == "") {

        alert("El campo fecha esta en blanco");
        document.getElementById("fecha_nacimiento").focus();
        document.getElementById("fecha_nacimiento").style.border = "1px solid red";

        return false

    }

    document.getElementById("fecha_nacimiento").style.border = "1px solid green";

    //patron email
    var patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    //Validacion campo email
    if (email = "") {

        alert("El campo email esta en blanco");
        document.getElementById("correo").focus();
        document.getElementById("correo").style.border = "1px solid red";

        return false
    }

    if (!patronEmail.test(document.getElementById("correo").value)) {

        alert("El correo introducido no es valido");
        document.getElementById("correo").focus();
        document.getElementById("correo").style.border = "1px solid red";

        return false

    }

    document.getElementById("correo").style.border = "1px solid green";

    iniciar();
}



//Peticion asincrona para registro de nuevos usuarios
function iniciar() {

    //Creamos un objeto XHR
    miXHR = new objetoXHR();

    cargarAsync();

}



//Con esta funcion cargamos el contenido de la url usando una peticion
//AJAX de forma asincrona

function cargarAsync(parametros) {

    if (miXHR) {

        document.getElementById("indicador").innerHTML = "<img src = 'ajax-loader.gif' style = width:60px; margin-left:-90%;'>";

        //Si existe el objeto miXHR
        miXHR.open("POST", "respuesta.php", true);

        miXHR.onreadystatechange = estadoPeticion;

        miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        //Mandamos los parametros
        miXHR.send(parametros);

    }

}


function estadoPeticion() {

    if (this.readyState == 4 && this.status == 200) {

        document.getElementById("indicador").innerHTML = "";

        alert("Ya esta registrado en nuestro sistema");

        var formulario = document.getElementById("formulario");
        formulario.submit();

    }


}

