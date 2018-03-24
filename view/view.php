<?php

if ($page == "home") {
    display_home();
}
elseif ($page == "main") {
    display_main($event_list,$pending_invitation_list, $groups_list, $users_list);
}

elseif ($page == "propos") {
    display_apropos();
}

elseif (($page == "connection_success")) {
    display_signin_success();
}

elseif (($page == "connection_failed")) {
    display_home();
    display_signin_failed();
}

elseif (($page == "creation_failed")) {
    display_creation_failed();
}

elseif (($page == "sub_failed")) {
    display_signup_failed();
}

elseif (($page == "user_sub")) {
    display_user_sub();
}

elseif (($page == "create-event")) {
    display_create_event($groups_list, $users_list);
}

elseif (($page == "select-slot")) {
    display_select_slot($_POST, $free_slot_list, $users_choice_list);
}

elseif (($page == "set_event_visibility")) {
    display_event_visibility($groups_list, $users_list);
}

elseif (($page == "creation_event_sucess")) {
    display_creation_event_sucess();
}

elseif (($page == "invitation")){
    display_invitation($invitation_list,$invitation_group_list);
}

elseif (($page == "list_invitation")){
    display_list_invitation_event($invitation_list);
}

elseif (($page == "list_invitation_gr")){
    display_list_invitation_group($invitation_group_list);
}

elseif (($page == "list_event")){
    display_list_event($event_list);
}
elseif (($page == "list_group")){
    display_list_group($groups_list_by_id_user);
}
elseif (($page == "set_group")){
    display_set_group($one_group);
}
elseif (($page == "set_event")){
    display_set_event($one_event);
}
elseif (($page == "create-group")) {
    display_create_group($users_list);
}
elseif (($page == "erreur404")) {
    display_error404();
}


