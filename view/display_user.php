<?php
//formulaire de d'inscription streamer
function display_user_sub() {

    require("pages/user_sub.php");

}

//formulaire de reservation
function display_user_reserv($salle, $formules, $reservs) {

    $loop = 0;
    echo "<script> ";
    echo 'var Creneau = [10, 13, 15, 17];';
    echo "var Formules = new Array();";
    foreach ($formules as $formule) {
        echo 'Formules[' . $loop . '] =["' . implode('","', $formule) . '"];';
        $loop++;
    }
    echo "</script> ";
    $loop = 0;
    echo "<script> ";
    echo "var Reservs = new Array();";
    foreach ($reservs as $reserv) {
        echo 'Reservs[' . $loop . '] =["' . implode("/", $reserv) . '"];';
        //echo 'alert(Reservs[' . $loop . ']);';
        $loop++;
    }


    echo "</script> ";

    require "pages/user_reserv.php";

}

//choix de la salle
function display_hall_select($salles) {

    require "pages/hall_select.php";

}


//prend un pseudo
//affiche le pseudo
function display_user_log($reservations, $user_infos) {
    require "pages/user_log.php";

}