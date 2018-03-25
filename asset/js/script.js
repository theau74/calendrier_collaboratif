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
        z.style.pointerEvents = "auto";
    } else {
        z.style.opacity = "0";
        z.style.pointerEvents = "none";
    }



}



$("#bouttonCreeEvent").click(function(){
    $("#createEvent").css("display","block");
    $("#createEvent-Deskstop").css("display","block");
    $("#fondGris").css("opacity","1");
});

$("#closeEvent").click(function(){
    $("#createEvent").css("display","none");
    $("#fondGris").css("opacity","0");
});

$("#closeEventPopUp").click(function(){
    $("#createEvent-Deskstop").css("display","none");
    $("#fondGris").css("opacity","0");
});

$("#bouttonCreeEvent").click(function(){
    $("#createEvent").css("display","block");
});

$("#closeFail").click(function(){
    $("#popUpFail").css("display","none");
});

$("#bouttonCreeGroup").click(function(){
    $("#createGroup").css("display","block");
    $("#createGroup-popUp").css("display","block");
    $("#fondGris").css("opacity","1");
});

$("#closeGroup").click(function(){
    $("#createGroup").css("display","none");
    $("#fondGris").css("opacity","0");
});

$("#closeGroup-popUp").click(function(){
    $("#createGroup-popUp").css("display","none");
    $("#fondGris").css("opacity","0");
});
function hide_envent_popup(id) {
    if(document.getElementById("popup_stat").value == "display") {
        document.getElementById('event_' + id).style.display = "none";
        document.getElementById('popup_event').style.display = "none";
        document.getElementById("popup_stat").value = "hide";
    }
}
function display_event_popup(id) {
    if(document.getElementById("popup_stat").value == "hide") {
        document.getElementById('popup_event').style.display = "block";
        document.getElementById('event_' + id).style.display = "block";
        document.getElementById("popup_stat").value = "display";
    }
}