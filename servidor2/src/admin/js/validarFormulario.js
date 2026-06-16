document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("formulario").addEventListener("submit", validarCampos);
    document.getElementById("usuario").focus();
});

function validarCampos(evento){

    evento.preventDefault();

    var usuario = document.getElementById("usuario").value;
    var contraseña = document.getElementById("contraseña").value;
    var fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
    var email = document.getElementById("correo").value;

    var patronNombre = /^[a-zA-Z0-9]{8,}$/;

    if(usuario.length == 0){

        alert("El campo usuario esta en blanco");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").className = "error";

        return false;


    } else if(usuario.length > 100){

        alert("El nombre de usuario no puede contener mas de 100 caracteres");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").className = "error";

        return false;
    }
    
    
    if(!patronNombre.test(document.getElementById("usuario").value)){

        alert("El nombre de usuario solo puede contener letras y numeros");
        document.getElementById("usuario").focus();
        document.getElementById("usuario").className = "error";

        return false;

    }



    var patron = /^\d?[a-z]{4}\d{4}$/;

    if(contraseña.length == 0){

        alert("El campo contraseña esta en blanco");
        document.getElementById("contraseña").focus();
        document.getElementById("contraseña").className = "error";

        return false;
    }

    if(!patron.test(document.getElementById("contraseña").value || contraseña.length < 8)){

        alert("La contraseña tiene que tener 4 letras minusculas y 4 numeros");
        document.getElementById("contraseña").focus();
        document.getElementById("contraseña").className = "error";

        return false;
    }
   

    if(fecha_nacimiento.length == 0){

        alert("El campo fecha esta en blanco");
        document.getElementById("fecha_nacimiento").focus();
        document.getElementById("fecha_nacimiento").className = "error";

        return false;

    }

    //patron email
    var patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    if(email.length == 0){

        alert("El campo email esta en blanco");
        document.getElementById("correo").focus();
        document.getElementById("correo").className = "error";

        return false;
    }

    if (!patronEmail.test(document.getElementById("correo").value)) {

        alert("El correo introducido no es valido");
        document.getElementById("correo").focus();
        document.getElementById("correo").className = "error";

        return false

    }

    //Validacion campo tipo usuario
    if (document.getElementById("tipo").selectedIndex == 0) {
        alert("Elige una opcion");
        document.getElementById("tipo").focus();
        document.getElementById("tipo").className = "error";
        return false;
    }

    document.getElementById("tipo").style.border = "1px solid green";

    this.submit();

}
