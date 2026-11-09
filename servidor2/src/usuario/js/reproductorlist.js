var ol = document.getElementById("list");

//Este manejador del evento click se encarga de que al pulsar sobre un elemento <li> de la lista se reproduzca la cancion
//en el reproductor
ol.addEventListener("click", function (evento) {
  if (evento.target && evento.target.nodeName === "LI") {
    songIndex = Array.from(ol.children).indexOf(evento.target);

    leerCancion(evento.target);
  }
});
