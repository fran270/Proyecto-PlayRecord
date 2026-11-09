document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("opcion2").addEventListener("click", function () {
    document.getElementById("menu").hidden = true;
  });
});

document.getElementById("icono").addEventListener("mouseover", function () {
  document.getElementById("icono").src = "./img/logoutazul.png";
});

document.getElementById("icono").addEventListener("mouseout", function () {
  document.getElementById("icono").src = "./img/logoutrojo.png";
});
