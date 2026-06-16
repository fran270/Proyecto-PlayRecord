document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("formulario").addEventListener("submit",valida);
    document.getElementById("usuario").focus();
});

function valida(evento){

    evento.preventDefault();

    var nombre = document.getElementById("usuario").value;
    var contraseña = document.getElementById("contraseña").value;

    var patronUsuario = /^[a-zA-Z0-9]{8,}$/;
    
    if(nombre.length == 0){

        alert("El nombre no es valido");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").className = "error";

        return false

    } else if(nombre.length > 100) {

        alert("El nombre de usuario no puede contener mas de 100 caracteres");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").className = "error";

        return false
    }

    if(!patronUsuario.test(document.getElementById("usuario").value)){

        alert("El nombre de usuario solo puede contener letras y numeros");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").className = "error";

        return false
    }

    var patronContraseña = /^\d?[a-z]{4}\d{4}$/;

    if(contraseña.length == 0 || !patronContraseña.test(document.getElementById("contraseña").value)){

        alert("La contraseña no es valida");
        document.getElementById("contraseña").focus();
        document.getElementById("contraseña").className = "error";

        return false;
    }

    this.submit();
}


