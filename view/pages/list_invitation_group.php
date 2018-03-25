<h1> Liste des invitations de groupe refuser : </h1>
<?php
foreach ($invitation_group_list as $invitation_group){
    if($invitation_group['etat']=="refuser"){
        echo "<ul>";
        if(!empty($invitation_group['nom'])){
            echo"<li>nom du groupe : ".$invitation_group['nom'].'</li>';
        }if(!empty($invitation_group['description'])){
            echo"<li>description du groupe : ".$invitation_group['description'].'</li>';
        }
        echo"<li>";
        echo'<form  action="index.php?ac=set-group-invitation" method="post">
        <input type="submit" value="valider" >
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        <input type="hidden" value="true" name="response">
        </form>';
        echo"</li>";
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
        echo"<li>";
        echo'<form  action="index.php?ac=set-group-invitation" method="post">
        <input type="submit" value="refuser" >
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        <input type="hidden" value="false" name="response">
        </form>';
        echo"</li>";
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
        echo"<li>";
        echo'<form  action="index.php?ac=set-group-invitation" method="post">
        <input type="submit" value="refuser" >
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        <input type="hidden" value="false" name="response">
        </form>';
        echo"</li>";
        echo"<li>";
        echo'<form  action="index.php?ac=set-group-invitation" method="post">
        <input type="submit" value="valider" >
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        <input type="hidden" value="true" name="response">
        </form>';
        echo"</li>";
        echo"</ul>";
    }

}
