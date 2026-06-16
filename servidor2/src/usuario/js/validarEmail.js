document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("formulario").addEventListener("submit",validar);
    document.getElementById("correo").focus();
});

function validar(evento){

    evento.preventDefault();

    var correo = document.getElementById("correo").value;

    //patron email
    var patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
 
    if(correo.length == 0){

        alert("El campo email esta en blanco");
        document.getElementById("correo").focus();
        document.getElementById("correo").className = "error";

        return false

    } 

    if (!patronEmail.test(document.getElementById("correo").value)) {

        alert("El correo introducido no es valido");
        document.getElementById("correo").focus();
        document.getElementById("correo").className = "error";

        return false

    }

  
  this.submit();
}
