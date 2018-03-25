function afficheNav() {
    var $navBar = $('#nav-bar');
    var $cal = $('#cal');
    var $greyBg = $('#fondGris');
    var $mainHeader = $('#mainHeader');
    var $envelop = $('#enveloppe');

    var navBarResponsiveClass = 'responsive-nav-bar';
    var calResponsiveClass = 'responsive-calendrier';
    var envelopChangeClass = 'fa-envelope-open-o';

    $navBar.toggleClass(navBarResponsiveClass);
    $cal.toggleClass(calResponsiveClass);
    $envelop.toggleClass(envelopChangeClass);

    if ($navBar.hasClass(navBarResponsiveClass)) {
        $mainHeader.css('zIndex', '2');
        $greyBg.css('opacity', '1');
        $greyBg.css('pointer-events', 'auto');

    } else {
        $mainHeader.css('zIndex', '0');
        $greyBg.css('opacity', '0');
        $greyBg.css('pointer-events', 'none');
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

function moove_event_by_id($id, $start, $end) {
    document.getElementById("id_event").value = $id;
    document.getElementById("start_event").value = $start;
    document.getElementById("end_event").value = $end;
    document.forms["moove-event"].submit();
}