<?php
//direction de base
$page = "home";
if (empty($_GET)) {
// Vérification si l'user est enregisté
    if (isset($_SESSION['stats']) and $page != "connection_failed" and $page != "sub_failed") {
        $event_list = get_event_by_user_id($_SESSION['id'], $c);
        $page = "main";
    } else {
        $page = "home";
    }


} else {


//script de connection et l'inscription
    if (isset($_GET["ac"])) {

        if ($_GET["ac"] == "signin") {

            if (user_signin($_POST["pseudo"], $_POST["password"], $c, $encryption_key)) {
                $page = "connection_success";
            } else {
                $page = "connection_failed";
            }
        }
        //incription et connection automatique
        if ($_GET["ac"] == "signup") {
            if (user_signup($_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["password"], $c, $encryption_key)) {
                user_signin($_POST["email"], $_POST["password"], $c, $encryption_key);
                $page = "connection_success";

            } else {
                $page = "sub_failed";
            }
        }

        //creation d'éveneement
        if ($_GET["ac"] == "create-event") {
            if (create_event($_SESSION['id'] ,$c, $encryption_key)) {
                $groups_list = get_groups_list($c);
                $users_list = get_users_list($c);
                $page = "set_event_visibility";
            } else {
                echo"creation_failed";
            }
        }
        //creation des invitation d'évenement
        if ($_GET["ac"] == "create-invitation") {
            if (create_invitation($_SESSION['id'] ,$c, $encryption_key)) {
                $groups_list = get_groups_list($c);
                $users_list = get_users_list($c);
                $page = "creation_event_sucess";

            } else {
                echo"creation_failed";
            }
        }
    }
    //formulaire d'incription
    if (isset($_GET["subform"])) {
        $page = "user_sub";
    }

// Page A propos

    if (isset($_GET["propos"])) {
        $page = "propos";
    }
    if (isset($_GET["create-event"])) {
        $page = "create-event";
    }


//formulaire de modification d'information
    if (isset($_GET["infoform"])) {
        $page = "update_info_form";
    }


//déconnection
    if (isset($_GET["logout"])) {
        user_logout();
        header('location: index.php');
    }


}



