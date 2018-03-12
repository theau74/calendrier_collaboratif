<?php

function display_home(){

	require ("pages/home.php");

}
function display_main($event_list){

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

function display_signup_failed(){

    require ("pages/signup_failed.php");

}
function display_create_event(){
    require ("pages/create_event.php");
}
function display_event_visibility($groups_list, $users_list){
    require ("pages/event_visibility.php");
}
function display_creation_event_sucess(){
    require ("pages/creation_event_sucess.php");
}
function display_create_group($users_list){
    require ("pages/create_group.php");
}