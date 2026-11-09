document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarCampos);
  document.getElementById("usuario").focus();
});

function validarCampos(evento) {
  evento.preventDefault();

  let usuario = document.getElementById("usuario");
  let contraseña = document.getElementById("contraseña");
  let fecha_nacimiento = document.getElementById("fecha_nacimiento");
  let email = document.getElementById("correo");

  //Patron campo usuario
  const patronUsuario = /^[a-zA-Z0-9]{8,}$/;

  //Validaciones campo usuario
  if (usuario.value == "") {
    alert("El campo usuario esta en blanco");
    usuario.focus();
    usuario.style.border = "1px solid red";
  } else if (usuario.length > 100) {
    alert("El nombre de usuario no puede contener mas de 100 caracteres");
    usuario.focus();
    usuario.style.border = "1px solid red";
  }

  if (!patronUsuario.test(usuario.value)) {
    alert("El nombre de usuario solo puede contener letras y numeros");
    usuario.focus();
    usuario.style.border = "1px solid red";
  }

  //Si no hay error el borde del input se pone en verde
  usuario.style.border = "1px solid green";

  //Patron campo contraseña
  const patronContraseña = /^\d?[a-zA-Z]{4}\d{4}$/;
  ///^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*!])[A-Za-z\d@#$%^&*!]{8,}$/

  //Validaciones campo contraseña
  if (contraseña.value == "") {
    alert("El campo contraseña esta en blanco");
    contraseña.focus();
    contraseña.style.border = "1px solid red";
  }

  if (!patronContraseña.test(contraseña.value || contraseña.length < 8)) {
    alert("La contraseña tiene que tener 4 letras y 4 numeros");
    //alert("La contraseña tiene que tener 8 caracteres entre los cuales una 1 letra mayuscula, 1 minuscula, 1 numero y 1 caracter especial como minimo");
    contraseña.focus();
    contraseña.style.border = "1px solid red";
  }

  contraseña.style.border = "1px solid green";

  //Validacion campo fecha_nacimiento
  if (fecha_nacimiento.value == "") {
    alert("El campo fecha esta en blanco");
    fecha_nacimiento.focus();
    fecha_nacimiento.style.border = "1px solid red";
  }

  fecha_nacimiento.style.border = "1px solid green";

  //patron email
  const patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  //Validacion campo email
  if ((email.value = "")) {
    alert("El campo email esta en blanco");
    email.focus();
    email.style.border = "1px solid red";
  }

  if (!patronEmail.test(email)) {
    alert("El correo introducido no es valido");
    email.focus();
    email.style.border = "1px solid red";
  }

  email.style.border = "1px solid green";

  iniciar();
}

//Peticion asincrona para registro de nuevos usuarios
function iniciar() {
  //Creamos un objeto XHR
  miXHR = new objetoXHR();

  cargarAsync();
}

/* Con esta funcion cargamos el contenido de la url usando una peticion
AJAX de forma asincrona*/

function cargarAsync(parametros) {
  if (miXHR) {
    document.getElementById("indicador").innerHTML =
      "<img src = 'ajax-loader.gif' style = width:60px; margin-left:-90%;'>";

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
