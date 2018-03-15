function afficheNav() {
    var x = document.getElementById('nav-bar');
    if (x.className === "ac-main-nav") {
        x.className += " responsive-nav-bar";
    } else {
        x.className = "ac-main-nav";
    }
    var y = document.getElementById('cal');
    if (y.className === "ac-main-calendrier") {
        y.className += " responsive-calendrier";
    } else {
        y.className = "ac-main-calendrier";
    }
}

// popup création événement
// variable fenetre
var addevent = document.getElementById('addEvent');

// variable bouton qui ouvre fenetre
var butt = document.getElementById("addButt");

// variable pour close la fenetre
var span = document.getElementsByClassName("close")[0];

var save = document.getElementById("save");
// quand click sur bouton, ouvre la fenetre
butt.onclick = function() {
    addevent.style.display = "block";
}

// quand click sur la croix, ferme la fenetre
span.onclick = function() {
    addevent.style.display = "none";
}
save.onclick = function(){
    addevent.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == event) {
        addevent.style.display = "none";
    }
}