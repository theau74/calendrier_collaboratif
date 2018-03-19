function afficheNav() {
    var x = document.getElementById('nav-bar');
    var y = document.getElementById('cal');
    var z = document.getElementById('fondGris');
    var h = document.getElementById('mainHeader');


    if (x.className === "ac-main-nav") {
        x.className += " responsive-nav-bar";
        h.style.zIndex = "2";
    } else {
        x.className = "ac-main-nav";
        h.style.zIndex = "0";
    }

    if (y.className === "ac-main-calendrier") {
        y.className += " responsive-calendrier";
    } else {
        y.className = "ac-main-calendrier";
    }

    if (x.className === "ac-main-nav responsive-nav-bar") {
        z.style.opacity = "1";
    } else {
        z.style.opacity = "0";
    }


}

var addevent = document.getElementById("createEvent");                          // variable fenetre
var butt     = document.getElementById("bouttonCree");                              // variable bouton qui ouvre fenetre
var span     = document.getElementsByClassName("ac-createEvent-header-close")[0];   // variable pour close la fenetre
var save     = document.getElementById("save");       // quand click sur bouton, ouvre la fenetre

butt.onclick = function() {
    addevent.style.display = "block";
}

span.onclick = function() {
    addevent.style.display = "none";
}

save.onclick = function() {
    addevent.style.display = "none";
}
