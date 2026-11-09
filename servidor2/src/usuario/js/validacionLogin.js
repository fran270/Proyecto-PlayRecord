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

  //Si el campo esta en blanco salta un mensaje de error
  if (usuario.value == "") {
    alert("El nombre de usuario no es valido");
    usuario.focus();
    usuario.className = "error";
  } else if (usuario.length > 100) {
    alert("El nombre de usuario no puede contener mas de 100 caracteres");
    usuario.focus();
    usuario.className = "error";
  }

  //Si no hay error el borde del input se pone en verde
  usuario.style.border = "1px solid green";

  //Si el campo contraseña esta en blanco salta un mensaje de error
  if (contraseña.value == "") {
    alert("El campo contraseña esta en blanco");
    contraseña.focus();
    contraseña.className = "error";
  }

  //Si no hay error el borde del campo se pone en verde
  contraseña.style.border = "1px solid green";

  this.submit();

  iniciar();
}

//Peticion asincrona al iniciar sesion
function iniciar() {
  miXHR = new objetoXHR();

  cargarAsync();
}

function cargarAsync(parametros) {
  if (miXHR) {
    document.getElementById("indicador").innerHTML =
      "<img src = './img/ajax-loader.gif' style = 'margin-top:1px; width:60px; margin-left:-90%;'>";

    miXHR.open("POST", "portada.php", true);

    miXHR.onreadystatechange = estadoPeticion;

    miXHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    miXHR.send(parametros);
  }
}

function estadoPeticion() {
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById("indicador").innerHTML = "";
  }
}
