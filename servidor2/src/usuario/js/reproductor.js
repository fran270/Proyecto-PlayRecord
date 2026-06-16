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

var ol = document.getElementById('playlist');


//Este manejador del evento click se encarga de que al pulsar sobre un elemento <li> de la lista se reproduzca la cancion
//en el reproductor
ol.addEventListener("click", function (evento){

  if(evento.target && evento.target.nodeName === "LI"){

    songIndex = Array.from(ol.children).indexOf(evento.target);

    leerCancion(evento.target);

  }

});



//Muestra el nombre de la cancion que se esta reproduciendo
function leerCancion(songElement) {

  const audioSrc = songElement.getAttribute('data-src');
  audio.src = audioSrc;
  titulo.textContent = songElement.textContent;
  reproducir();

}

//Cacula el tiempo de la cancion
const calculateTime = (secs) => {

  const minutes = Math.floor(secs / 60);
  const seconds = Math.floor(secs % 60);
  const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;
  return `${minutes}:${returnedSeconds}`;
}

const displayDuration = () => {

  songLength.innerHTML = calculateTime(audio.duration);

}


if (audio.readyState > 0) {

  displayDuration();
  currentTime.innerHTML = calculateTime(audio.currentTime);

} else {

  audio.addEventListener('loadedmetadata', () => {

    displayDuration();
  });
}


audio.ontimeupdate = function () {

  currentTime.innerHTML = calculateTime(audio.currentTime);
  updateProgress();
}

function updateProgress() {

  let percentage = (audio.currentTime / audio.duration) * 100;
  document.querySelector('.progress').style.width = percentage + '%';

}

//funcion para hacer click sobre la linea de progreso de la cancion
function setProgress(e) {

  const width = this.clientWidth;
  const clickX = e.offsetX;
  const { duration } = audio;
  audio.currentTime = (clickX / width) * duration;
}



function reproducir() {

  //Si el audio esta pausado se pulsa al boton y se reproduce y se cambia el icono de control
  if (audio.paused) {

    playPause = document.getElementById('playPause');

    playPause.src = './img/pause.svg';
    audio.play();
    

  }

  else {

    playPause.src = './img/OIP.svg';
    audio.pause();
    
  }

}


let songIndex = 0;


//Volver a la cancion anterior
function anteriorCancion() {

  songIndex--;

  if(songIndex <= 0){

    songIndex = ol.children.length - 1;

  }

  play = document.getElementById('playPause');
  play.src = './img/OIP.svg';

  leerCancion(ol.children[songIndex]);
  reproducir();
}



//Ir a la siguiente cancion
function siguienteCancion() {

  songIndex++;

  if (songIndex <= ol.children.length) {

     songIndex = 0;
     //songIndex = ol.children.length + 1;
  }

  leerCancion(ol.children[songIndex]);
  reproducir();
}


//Avanzar 10 segundos mas
plus10.addEventListener('click', function () {

  audio.currentTime += 10;
});

//Retroceder 10 segundos menos
back10.addEventListener('click', function () {

  audio.currentTime -= 10;
});


playPause.addEventListener('click', reproducir);
anterior.addEventListener('click', anteriorCancion);
siguiente.addEventListener('click', siguienteCancion);
//audio.addEventListener('ended', siguienteCancion);
progressContainer.addEventListener('click', setProgress);

