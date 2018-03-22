<?php
//direction de base
$page = "home";
if (empty($_POST) && empty($_GET)) {
// Vérification si l'user est enregisté
    if (isset($_SESSION['stats']) and $page != "connection_failed" and $page != "sub_failed") {
        $event_list = get_event_by_user_id($_SESSION['id'], $c);
        $pending_invitation_list = get_pending_invitation_by_id_user($_SESSION['id'], $c);
        $groups_list = get_groups_list($c);
        $users_list = get_users_list($c);
        $page = "main";
    } else {
        $page = "home";
    }


} else {


//script de connection et l'inscription
    if (isset($_POST["action"])) {
        if ($_POST["action"] == "signin") {

            if (user_signin($_POST["pseudo"], $_POST["password"], $c, $encryption_key)) {
                header('Location: index.php');
            } else {
                $page = "connection_failed";
            }
        } else {
            $page = "connection_failed";
        }
        //incription et connection automatique
        if ($_POST["action"] == "signup") {
            if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) && isset($_POST["password"])) {
                if (user_signup($_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["password"], $c, $encryption_key)) {
                    user_signin($_POST["email"], $_POST["password"], $c, $encryption_key);
                    header('Location: index.php');

                } else {
                    $page = "sub_failed";
                }
            } else {
                $page = "sub_failed";
            }
        }

        //creation d'éveneement
        if ($_POST["action"] == "create-event") {
            if (verify_user_list_disponibility($_POST['start_date'], $_POST['start_time'], $_POST['end_date'], $_POST['end_time'], $_POST['users-choice'], $c)) {
                if (create_event($_POST['nom'], $_POST['description'], $_SESSION['id'], $_POST['start_date'], $_POST['start_time'], $_POST['end_date'], $_POST['end_time'], $c, $encryption_key)) {
                    if(!empty($_POST['users-choice']) && !empty($_POST['groups-choice'])){
                        if (create_invitation($_POST['users-choice'], $_POST['groups-choice'], $_SESSION['id'], $c, $encryption_key)) {
                            header('Location: index.php');

                        } else {
                            echo "creation_failed";
                        }
                    }
                    else{
                        header('Location: index.php');
                    }
                } else {
                    echo "creation_failed";
                }
            } else {
                $page = "select-slot";
            }
        }

        //creation des invitation d'évenement
        if ($_POST["action"] == "create-invitation") {
            if (create_invitation($_SESSION['id'], $c, $encryption_key)) {
                header('Location: index.php');
            } else {
                echo "creation_failed";
            }
        }
        if ($_POST["action"] == "create-group") {
            if (create_group($_SESSION['id'], $c, $encryption_key)) {
                header('Location: index.php');
            } else {
                $page ="creation_failed";
            }
        }
        //Valider ou refuser une invitation d'event
        if ($_POST["action"] == "set-invitation") {
            if (set_invitation($_POST["id_user"], $_POST["id_event"], $_POST["response"], $c)) {
                header('Location: index.php');
            } else {
                echo "set_failed";
            }


        }
        //Valider ou refuser une invitation de groupe
        if ($_POST["action"] == "set-group-invitation") {
            if (set_group_invitation($_POST["id_users"], $_POST["id_groups"], $_POST["response"], $c)) {
                header('Location: index.php');
            } else {
                echo "set_failed";
            }


        }
        //suppression d'évenement
        if ($_POST["action"] == "delete-event") {
            if (delete_event_by_id($_POST["id_event"], $c)) {
                header('Location: index.php');
            } else {
                echo "delete_failed";
            }


        }
        //modification d'évenement
        if ($_POST["action"] == "set-event") {
            if (update_event_by_id($_POST["id_event"], $_POST["nom"], $_POST["start"], $_POST["start_hour"], $_POST["end"], $_POST["end_hour"], $c)) {
                header('Location: index.php');
            } else {
                echo "update_failed";
            }


        }
    }
    else{
        //formulaire d'incription
        if (isset($_GET["subform"])) {
            $page = "user_sub";
        }

// Page A propos

        if (isset($_GET["propos"])) {
            $page = "propos";
        }
        if (isset($_SESSION['stats']) and $page != "connection_failed" and $page != "sub_failed") {
            if (isset($_GET["create-event"])) {
                $groups_list = get_groups_list($c);
                $users_list = get_users_list($c);
                $page = "create-event";
            }
            if (isset($_GET["create-group"])) {
                $users_list = get_users_list($c);
                $page = "create-group";
            }
            // Page invitation
            if (isset($_GET["invitation"])) {
                $invitation_list = get_invitation_by_id_user($_SESSION['id'], $c);
                $invitation_group_list = get_group_invitation($_SESSION['id'], $c);
                $page = "invitation";

            }
            //Page liste des invitation d'evenement
            if (isset($_GET["list_invitation"])) {
                $invitation_list = get_invitation_by_id_user($_SESSION['id'], $c);
                $page = "list_invitation";

            }
            //Page liste des invitation de groupe
            if (isset($_GET["list_invitation_gr"])) {
                $invitation_group_list = get_group_invitation($_SESSION['id'], $c);
                $page = "list_invitation_gr";
            }


            //Page liste des evenenment
            if (isset($_GET["list_event"])) {
                $event_list = get_event_by_user_id($_SESSION['id'], $c);
                $page = "list_event";
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
    }




}



