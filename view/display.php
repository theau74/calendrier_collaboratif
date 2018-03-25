<?php

function display_home(){

	require ("pages/home.php");

}
function display_footer_home(){

    require ("footer_home.php");

}
function display_header_cal($pending_invitation_list){

    require ("header_cal.php");

}
function display_main($event_list,$pending_invitation_list, $groups_list, $users_list){

    require ("pages/main.php");

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
function display_select_slot($nom, $description, $free_slot_list, $users_choice_list){

    require ("pages/select_slot.php");

}
function select_slot_for_modification($id_event, $free_slot_list, $users_choice_list){

    require ("pages/select_slot_for_modification.php");

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
function display_list_event($event_list,$invitation_list){

    require("pages/list_event.php");

}
function display_list_group($groups_list_by_id_user, $invitation_group_list){

    require("pages/list_group.php");

}
function display_set_group($one_group, $users_in_gr, $users_not_in_gr){

    require("pages/set_group.php");

}
function display_set_event($one_event){

    require("pages/set_event.php");

}
function display_create_group($users_list){

    require ("pages/create_group.php");

}
function display_error404(){

    require ("pages/error404.php");

}
function display_error(){

    require ("pages/error.php");

}