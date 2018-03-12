<?php

if ($page == "home") {
    display_home();
}
elseif ($page == "main") {
    display_main($event_list);
}
elseif ($page == "propos") {
    display_apropos();
}
elseif (($page == "connection_success")) {
    display_signin_success();
}
elseif (($page == "connection_failed")) {
    display_signin_failed();
}
elseif (($page == "sub_failed")) {
    display_signup_failed();
}
elseif (($page == "user_sub")) {
    display_user_sub();
}
elseif (($page == "create-event")) {
    display_create_event();
}elseif (($page == "set_event_visibility")) {
    display_event_visibility($groups_list, $users_list);
}
elseif (($page == "creation_event_sucess")) {
    display_creation_event_sucess();
}
elseif (($page == "create-group")) {
    display_create_group($users_list);

}
