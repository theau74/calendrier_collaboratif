<?php

function display_home(){

	require ("pages/home.php");
    include ("footer_home.php");

}
function display_main($event_list,$pending_invitation_list, $groups_list, $users_list){

    require ("pages/main.php");

}
function display_apropos(){

    require ("pages/propos.php");

}

function display_user_session(){
    if(isset($_SESSION['stats'])) {
        if ($_SESSION['stats'] == "login-done") {

            require("pages/user_session_true.php");

        } else {

            require("pages/user_session_false.php");

        }
    }
    else {
        require("pages/user_session_false.php");
    }
}

function display_signin_success(){

    require ("pages/signin_success.php");

}

function display_signin_failed(){

	require ("pages/signin_failed.php");

}
function display_creation_failed(){

	require ("pages/creation_failed.php");

}

function display_signup_failed(){

    require ("pages/signup_failed.php");

}
function display_create_event($groups_list, $users_list){

    require ("pages/create_event.php");

}
function display_select_slot($post){

    require ("pages/select_slot.php");

}
function display_event_visibility($groups_list, $users_list){

    require ("pages/event_visibility.php");

}
function display_creation_event_sucess(){

    require ("pages/creation_event_sucess.php");

}
function display_invitation($invitation_list,$invitation_group_list){

    require("pages/set_invitation.php");

}
function display_list_invitation_event($invitation_list){

    require("pages/list_invitation_event.php");

}
function display_list_invitation_group($invitation_group_list){

    require("pages/list_invitation_group.php");

}
function display_list_event($event_list){

    require("pages/list_event.php");

}
function display_create_group($users_list){

    require ("pages/create_group.php");

}
function display_error404(){

    require ("pages/error404.php");

}