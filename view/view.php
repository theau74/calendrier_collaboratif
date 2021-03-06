<?php

if ($page == "home") {
    display_home();
    display_footer_home();
}
elseif ($page == "main") {
    display_header_cal($pending_invitation_list,$users_list);
    display_main($event_list,$pending_invitation_list, $groups_list, $users_list);
}

elseif ($page == "connection_failed") {
    display_home();
    display_footer_home();
    display_signin_failed();
}

elseif ($page == "creation_failed") {
    display_creation_failed();
}

elseif ($page == "sub_failed") {
    display_home();
    display_signup_failed();
}

elseif ($page == "user_sub") {
    display_user_sub();
}

elseif ($page == "create-event") {
    display_create_event($groups_list, $users_list);
}

elseif ($page == "select_slot") {
    display_select_slot($nom, $description, $free_slot_list, $users_choice_list);
}
elseif ($page == "select_slot_for_modification") {
    select_slot_for_modification($id_event, $free_slot_list, $users_choice_list);

}


elseif ($page == "invitation"){
    display_invitation($invitation_list,$invitation_group_list);
}

elseif ($page == "list_invitation"){
    display_list_invitation_event($invitation_list);
}

elseif ($page == "list_invitation_gr"){
    display_list_invitation_group($invitation_group_list);
}

elseif ($page == "list_event"){
    display_header_cal($pending_invitation_list,$users_list);
    display_list_event($event_list,$invitation_list);
}
elseif (($page == "list_group")){
    display_header_cal($pending_invitation_list,$users_list);
    display_list_group($groups_list_by_id_user, $invitation_group_list);
}
elseif ($page == "set_group"){
    display_header_cal($pending_invitation_list,$users_list);
    display_set_group($one_group, $users_in_gr, $users_not_in_gr);
}
elseif ($page == "set_event"){
    display_header_cal($pending_invitation_list,$users_list);
    display_set_event($one_event);
}
elseif ($page == "create-group") {
    display_create_group($users_list);
}
elseif ($page == "erreur404") {
    display_error404();
    display_footer_home();
}
elseif ($page == "erreur") {
    display_error();
    display_footer_home();
}
elseif ($page == "erreur") {
    display_error();
}


