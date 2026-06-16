var audio = document.querySelector('audio');
var songLength = document.getElementById('SongLength');
var currentTime = document.getElementById('CurrentSongTime');
var progressContainer = document.getElementById('progress-bar');
var progress = document.getElementById('progress');
var titulo = document.getElementById('song-title');


//Audio Controls
var playPause = document.getElementById('playPause');
var plus10 = document.getElementById('Plus10');
var anterior = document.getElementById('button1');
var siguiente = document.getElementById('button2');
var back10 = document.getElementById('Back10');

var ol = document.getElementById('list');


//Este manejador del evento click se encarga de que al pulsar sobre un elemento <li> de la lista se reproduzca la cancion
//en el reproductor
ol.addEventListener("click", function (evento){

  if(evento.target && evento.target.nodeName === "LI"){

    songIndex = Array.from(ol.children).indexOf(evento.target);

    leerCancion(evento.target);

  }

});

