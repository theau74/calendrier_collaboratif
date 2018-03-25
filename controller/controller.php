<?php
//direction de base
$page = "erreur404";
if (empty($_POST) && empty($_GET)) {
// Vérification si l'user est enregisté
    if (isset($_SESSION['stats']) and $page != "connection_failed" and $page != "sub_failed") {
        $event_list = get_accepeted_event_by_user_id($_SESSION['id'], $c);
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
            if (user_signin(protect($_POST["pseudo"]), protect($_POST["password"]), $c, $encryption_key)) {
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
                if (user_signup(protect($_POST["fname"]), protect($_POST["lname"]), protect($_POST["email"]), protect($_POST["password"]), $c, $encryption_key)) {
                    user_signin(protect($_POST["email"]), protect($_POST["password"]), $c, $encryption_key);
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

            $loop= 0;
            $users_choice_list = array();
            if(!empty($_POST['users-choice'])){
                foreach ($_POST['users-choice'] as $user_choice){


                    $users_choice_list[$loop] = array("id" => $user_choice, "right" => $_POST['user_right'][count($users_choice_list)], "id_group" => Null);
                    $loop++;
                }
            }

            if(!empty($_POST['groups-choice'])){
                foreach ($_POST['groups-choice'] as $group){
                    foreach(get_users_by_id_group($group, $c) as $user) {
                        $users_choice_list[$loop] = array("id" => $user['id_users'], "right" => null, "id_group" => $group);
                        $loop++;
                    }
                }
            }


            var_dump(protect($_POST['start_date']), protect($_POST['start_time']), protect($_POST['end_date']), protect($_POST['end_time']), array_column($users_choice_list, 'id'));

            if (verify_user_list_disponibility(protect($_POST['start_date']), protect($_POST['start_time']), protect($_POST['end_date']), protect($_POST['end_time']), array_column($users_choice_list, 'id'), $c)) {

                if (create_event(protect($_POST['nom']), protect($_POST['description']), protect($_SESSION['id']), protect($_POST['start_date']), protect($_POST['start_time']), protect($_POST['end_date']), protect($_POST['end_time']), $c, $encryption_key)) {
                    if(!empty($users_choice_list)){
                        if (create_invitation($users_choice_list, $_SESSION['id'], $c)) {
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
                $nom = $_POST['nom'];
                $description = $_POST['description'];
                $free_slot_list = search_next_free_slot(protect($_POST['start_date']), protect($_POST['start_time']), protect($_POST['end_date']), protect($_POST['end_time']), array_column($users_choice_list, 'id'), 8, 17, 5, 100, $c);
                $page = "select-slot";
            }
        }
        if ($_POST["action"] == "create-event-by-slot-generator") {


            $loop= 0;
            $users_choice_list = array();
            if(!empty($_POST['users-choice'])){
                foreach ($_POST['users-choice'] as $user_choice){
                    $users_choice_list[$loop] = array("id" => $user_choice, "right" => $_POST['user_right'][count($users_choice_list)], "id_group" => Null);
                    $loop++;
                }
            }

            if(!empty($_POST['groups-choice'])){
                foreach ($_POST['groups-choice'] as $group){
                    foreach(get_users_by_id_group($group, $c) as $user) {
                        $users_choice_list[$loop] = array("id" => $user['id_users'], "right" => null, "id_group" => $group);
                        $loop++;
                    }
                }
            }
            $slot = explode(",",$_POST['slot_list']);

            if (verify_user_list_disponibility($slot[0], $slot[1], $slot[2], $slot[3], array_column($users_choice_list, 'id'), $c)) {
                if (create_event($_POST['nom'], $_POST['description'], $_SESSION['id'], $slot[0], $slot[1], $slot[2], $slot[3], $c, $encryption_key)) {
                    if(!empty($users_choice_list)){
                        if (create_invitation($users_choice_list, $_SESSION['id'], $c)) {
                            //($user_list, $user_right, $creator, $c)
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
                $free_slot_list = search_next_free_slot(protect($_POST['start_date']), protect($_POST['start_time']), protect($_POST['end_date']), protect($_POST['end_time']),array_column($users_choice_list, 'id'), 8, 17, 5, 100, $c);
                $page = "select_slot";

            }
        }
        if ($_POST["action"] == "move-event") {
            $users_list = get_users_list_by_event_id($_POST["id"], $c);
            $id_event = $_POST['id'];
            $start = explode("T", $_POST['start']);
            $start[1] = explode(":", $start[1]);
            $start[1] = "".$start[1][0].":".$start[1][1]."";

            $end = explode("T", $_POST['end']);
            $end[1] = explode(":", $end[1]);
            $end[1] = "".$end[1][0].":".$end[1][1]."";

            //verify_user_list_disponibility($start, $start_hour, $end, $end_hour, $user_list, $c)

            if (verify_user_list_disponibility($start[0], $start[1], $end[0], $end[1], array_column($users_list,'id_user'), $c)) {
                if(reset_all_invit_by_id_event($_POST["id"],$c) && valid_invitaiton_by_iduser_and_id_event($_SESSION['id'], $_POST["id"], $c) && move_event($_POST['id'],$start[0], $start[1], $end[0], $end[1], $c)){
                    header('Location: index.php');
                }
                else{
                    $page = "creation_failed";
                }
            }
            else {

                $free_slot_list = search_next_free_slot($start[0], $start[1], $end[0], $end[1],array_column($users_list, 'id_user'), 8, 17, 5, 100, $c);
                $page = "select_slot_for_modification";
            }

        }


        if ($_POST["action"] == "move-event-by-slot-generator") {
            $id_event = $_POST['id_event'];
            $users_list = get_users_list_by_event_id($id_event, $c);
            $slot = explode(",",$_POST['slot_list']);


            //verify_user_list_disponibility($start, $start_hour, $end, $end_hour, $user_list, $c)

            if (verify_user_list_disponibility($slot[0], $slot[1], $slot[2], $slot[3], array_column($users_list,'id_user'), $c)) {
                if(reset_all_invit_by_id_event($id_event,$c) && valid_invitaiton_by_iduser_and_id_event($_SESSION['id'], $id_event, $c) && move_event($id_event,$slot[0], $slot[1], $slot[2], $slot[3], $c)){
                    header('Location: index.php');
                }
                else{
                    $page = "creation_failed";
                }
            }
            else {

                $free_slot_list = search_next_free_slot($start[0], $start[1], $end[0], $end[1],array_column($users_list, 'id_user'), 8, 17, 5, 100, $c);
                $page = "select_slot_for_modification";
            }

        }
        //creation des invitation d'évenement
        if ($_POST["action"] == "create-invitation") {

            if (create_invitation($_SESSION['id'], $c)) {
                header('Location: index.php');
            } else {
                echo "creation_failed";
            }
        }
        if ($_POST["action"] == "create-group") {
            if (create_group($_POST['nom'], $_POST['description'], $_SESSION['id'], $_POST['users-choice'], $c, $encryption_key)) {
                //$nom, $description, $creator, $users_choice, $c, $encryption_key
                header('Location: index.php');
            } else {
                $page ="creation_failed";
            }
        }
        //Valider une invitation d'event
        if ($_POST["action"] == "valid_event_invit") {
            if (set_invitation($_POST["id_user"], $_POST["id_event"], "true", $c)) {
                header('Location: index.php');
            } else {
                echo "set_failed";
            }
        }
        //refuser une invitation d'event
        if ($_POST["action"] == "deny_event_invit") {
            if (set_invitation($_POST["id_user"], $_POST["id_event"], "false", $c)) {
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
        //suppression de groupe
        if ($_POST["action"] == "delete-group"){
            if(delete_groups_by_id($_POST["id_groups"],$c)){
                header('Location: index.php');
            } else{
                echo "delete_failed";
            }
        }
        //modification de groupe
        if ($_POST["action"] == "set-group"){
                delete_groups_by_id($_POST['id_groups'],$c);
                create_group($_POST['nom'], $_POST['description'], $_SESSION['id'], $_POST['users-choice'], $c, $encryption_key);
                header('Location: index.php');
            } else {
                echo "update_failed";
            }
        }
        elseif(isset($_POST["view"])) {
            if ($_POST["view"] == "set_group"){
                $one_group = get_one_group_by_id($_POST["id_groups"],$c);
                $users_in_gr = get_users_list_in_group_by_id($_POST["id_groups"],$c);
                $users_not_in_gr = get_users_list_not_in_group_by_id($_POST["id_groups"],$c);
                $page ="set_group";

        }
        if ($_POST["view"] == "set_event"){
            $one_event = get_one_event_by_id($_POST["id_event"],$c);
            $page ="set_event";
            }
            if ($_POST["view"] == "set_event"){
                $one_event = get_one_event_by_id($_POST["id_event"],$c);
                $page ="set_event";

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


            //Page liste des evenenments
            if (isset($_GET["list_event"])) {
                $event_list = get_event_by_user_id($_SESSION['id'], $c);
                $page = "list_event";
            }
            //Page liste des groupes
            if (isset($_GET["list_group"])) {
                $groups_list_by_id_user = get_groups_by_id_user($_SESSION['id'],$c);
                $page = "list_group";
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



