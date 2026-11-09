document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("formulario")
    .addEventListener("submit", validarClave);
  document.getElementById("contrasena").focus();
});

function validarClave(evento) {
  evento.preventDefault();

  let contraseña = document.getElementById("contrasena");
  let conf_contraseña = document.getElementById("conf_contraseña");

  //Validaciones campos contraseña y conf_contraseña
  if (contraseña.value == "") {
    alert("El campo contraseña esta en blanco");
    document.getElementById("contrasena").focus();
    document.getElementById("contrasena").className = "error";

    return false;
  }

  const patron = /^\d?[a-z]{4}\d{4}$/;

  if (
    !patron.test(
      document.getElementById("contrasena").value || contraseña.length < 8,
    )
  ) {
    alert("La contraseña tiene que tener 4 letras minusculas y 4 numeros");
    document.getElementById("contrasena").focus();
    document.getElementById("contrasena").className = "error";

    return false;
  }

  if (conf_contraseña.value == "") {
    alert("No has confirmado la contraseña");
    document.getElementById("conf_contraseña").focus();
    document.getElementById("conf_contraseña").className = "error";

    return false;
  }

  if (contraseña != conf_contraseña) {
    alert("Las credenciales no coinciden");
    document.getElementById("conf_contraseña").focus();
    document.getElementById("conf_contraseña").className = "error";

    return false;
  }

  this.submit();
}
