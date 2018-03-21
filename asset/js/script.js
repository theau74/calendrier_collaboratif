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


var creeEvent           = document.getElementById("createEvent");                              // variable fenetre
var bouttonCreeEvent    = document.getElementById("bouttonCreeEvent");                              // variable bouton qui ouvre fenetre
var saveEvent           = document.getElementById("saveEvent");                                     // quand click sur bouton, ouvre la fenetre
var closeEvent          = document.getElementById("closeEvent");   // variable pour close la fenetre

var popupEvent          = document.getElementById("createEvent-Deskstop");
var savePopup           = document.getElementById("savePopup");
var closePopup          = document.getElementById("closePopup");

var bouttonCreeGroup    = document.getElementById("bouttonCreeGroup");                              // variable bouton qui ouvre fenetre
var creeGroup           = document.getElementById("createGroup");                              // variable fenetre
var saveGroup           = document.getElementById("saveGroup");                                     // quand click sur bouton, ouvre la fenetre
var closeGroup          = document.getElementById("closeGroup");   // variable pour close la fenetre



bouttonCreeEvent.onclick = function() {
    creeEvent.style.display = "block";
    popupEvent.style.display = "block";
}

saveEvent.onclick = function() {
    creeEvent.style.display = "none";
}

closeEvent.onclick = function() {
    creeEvent.style.display = "none";
}





savePopup.onclick = function () {
    popupEvent.style.display = "none";
}

closePopup.onclick = function() {
    popupEvent.style.display = "none";
}




bouttonCreeGroup.onclick = function() {
    creeGroup.style.display = "block";
}

saveGroup.onclick = function() {
    creeGroup.style.display = "none";
}

closeGroup.onclick = function() {
    creeGroup.style.display = "none";
}