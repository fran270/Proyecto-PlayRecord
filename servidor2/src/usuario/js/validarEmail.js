document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("formulario").addEventListener("submit", validar);
  document.getElementById("correo").focus();
});

function validar(evento) {
  evento.preventDefault();

  let correo = document.getElementById("correo").value;

  //patron email
  const patronEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if (correo == "") {
    alert("El campo email esta en blanco");
    document.getElementById("correo").focus();
    document.getElementById("correo").className = "error";

    return false;
  }

  if (!patronEmail.test(correo)) {
    alert("El correo introducido no es valido");
    document.getElementById("correo").focus();
    document.getElementById("correo").className = "error";

    return false;
  }

  this.submit();
}
