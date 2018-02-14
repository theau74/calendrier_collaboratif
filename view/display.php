<?php

function display_home(){

	require ("pages/home.php");

}
function display_main(){

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

