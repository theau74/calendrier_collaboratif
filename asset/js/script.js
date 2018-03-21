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

var addevent = document.getElementById("createEvent");                              // variable fenetre
var butt     = document.getElementById("bouttonCree");                              // variable bouton qui ouvre fenetre
var popup    = document.getElementById("createEvent-Deskstop");
var span     = document.getElementsByClassName("ac-createEvent-header-close")[0];
var close     = document.getElementsByClassName("ac-createEvent-popUp-header-close")[0]; // variable pour close la fenetre
var save     = document.getElementById("save");                                     // quand click sur bouton, ouvre la fenetre
var savepopup = document.getElementById("savepopup")

butt.onclick = function() {
    addevent.style.display = "block";
    popup.style.display = "block";
}

span.onclick = function() {
    addevent.style.display = "none";
}

close.onclick = function() {
    popup.style.display = "none";
}

save.onclick = function() {
    addevent.style.display = "none";
}
savepopup.onclick = function () {
    popup.style.display = "none";
}