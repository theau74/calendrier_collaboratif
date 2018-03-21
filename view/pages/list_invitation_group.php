<?php
echo "<h1> Liste des invitations de groupe refuser : </h1>";
var_dump($invitation_group_list);
foreach ($invitation_group_list as $invitation_group){
    if($invitation_group['etat']=="refuser"){
        echo "<ul>";
        if(!empty($invitation_group['nom'])){
            echo"<li>nom du groupe : ".$invitation_group['nom'].'</li>';
        }if(!empty($invitation_group['description'])){
            echo"<li>description du groupe : ".$invitation_group['description'].'</li>';
        }
        echo'<form  action="index.php?set_group_invitation=true" method="post">
        <input type="submit" value="valider" name="valider">
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        </form>';
        echo"</ul>";
    }

}
echo "<h1> Liste des invitations de groupe accepter : </h1>";

foreach ($invitation_group_list as $invitation_group) {
    if ($invitation_group['etat'] == "valider") {
        echo "<ul>";
        if (!empty($invitation_group['nom'])) {
            echo "<li>nom du groupe : " . $invitation_group['nom'] . '</li>';
        }
        if (!empty($invitation_group['description'])) {
            echo "<li>description du groupe : " . $invitation_group['description'] . '</li>';
        }
        echo'<form  action="index.php?set_group_invitation=false" method="post">
        <input type="submit" value="refuser" name="refuser">
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        </form>';
        echo"</ul>";
    }

}
echo "<h1> Liste des invitations de groupe envoyer : </h1>";

foreach ($invitation_group_list as $invitation_group) {
    if ($invitation_group['etat'] == "envoie") {
        echo "<ul>";
        if (!empty($invitation_group['nom'])) {
            echo "<li>nom du groupe : " . $invitation_group['nom'] . '</li>';
        }
        if (!empty($invitation_group['description'])) {
            echo "<li>description du groupe : " . $invitation_group['description'] . '</li>';
        }
        echo'<form  action="index.php?set_group_invitation=false" method="post">
        <input type="submit" value="refuser" name="refuser">
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        </form>';
        echo'<form  action="index.php?set_group_invitation=true" method="post">
        <input type="submit" value="valider" name="valider">
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        </form>';
        echo"</ul>";
    }

}