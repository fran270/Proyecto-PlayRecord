document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("opcion2").addEventListener("click",mostrarMenu);
});

function mostrarMenu(){

    document.getElementById("menu").hidden = true;
}

document.getElementById("icono").addEventListener("mouseover",cambiarAzul);
document.getElementById("icono").addEventListener("mouseout",cambiarRojo);

function cambiarAzul(){

    document.getElementById("icono").src = "./img/logoutazul.png";
}

function cambiarRojo(){

    document.getElementById("icono").src = "./img/logoutrojo.png";
}