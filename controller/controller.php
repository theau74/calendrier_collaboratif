<?php
//direction de base
$page ="home";

//script de connection et l'inscription
if(isset($_GET["ac"])){
    if($_GET["ac"]=="signin"){
        if(user_signin($_POST[ "pseudo"], $_POST["password"], $c, $encryption_key)){
            $page = "connection_success";
        }
        else{
            $page = "connection_failed";
        }
    }
    //incription et connection automatique
    if($_GET["ac"]=="signup"){
        if(user_signup($_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["password"], $c, $encryption_key)){
            user_signin($_POST["email"], $_POST["password"], $c, $encryption_key);

        }
        else {
            $page = "sub_failed";
        }
    }
}


// Vérification si l'user est enregisté

if(isset($_SESSION['stats']) and $page != "connection_failed" and $page != "sub_failed"){
    if(isset($_GET["user_log"])){
        $page = "main";
    }
}
else {
    $_SESSION['stats'] = "new_user";
}

//formulaire d'incription
if(isset($_GET["subform"])){
    $page="user_sub";
}

// Page A propos

if(isset($_GET["propos"])){
    $page = "propos";
}



//formulaire de modification d'information
if(isset($_GET["infoform"])){
    $page="update_info_form";
}




//déconnection
if(isset($_GET["logout"])){
    user_logout();
    header('location: index.php');
}



