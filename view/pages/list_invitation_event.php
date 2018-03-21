<?php
echo"<h1> Invitation d'evenement refuser </h1>";
foreach ($invitation_list as $invitation){
    if($invitation['etat']=="refuser"){
        echo "<ul>";
        if(!empty($invitation['id_event'])){
            echo"<li>id de l'evenement : ".$invitation['id_event'].'</li>';
        }if(!empty($invitation['event_name'])){
            echo"<li>nom de l'evenement : ".$invitation['event_name'].'</li>';
        }if(!empty($invitation['start'])){
            echo"<li>debut de l'evenement : ".$invitation['start'].'</li>';
        }if(!empty($invitation['end'])){
            echo"<li>fin de l'evenement : ".$invitation['end'].'</li>';
        }if(!empty($invitation['group_name'])){
            echo"<li>nom du groupe : ".$invitation['group_name'].'</li>';
        }if(!empty($invitation['description'])){
            echo"<li>description de l'evenement : ".$invitation['description'].'</li>';
        }if(!empty($invitation['etat'])){
            echo"<li>etat de l'evenement : ".$invitation['etat'].'</li>';
        }
        echo'<form  action="index.php?ac=set-invitation" method="post">
             <input type="submit" value="valider" >
             <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
             <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
             <input type="hidden" value="true" name="response">
             </form>';
        echo"</ul>";
    }

}

echo"<h1> Invitation d'evenenment valider </h1>";
foreach ($invitation_list as $invitation){
    if($invitation['etat']=="valider"){
        echo "<ul>";
        if(!empty($invitation['id_event'])){
            echo"<li>id de l'evenement : ".$invitation['id_event'].'</li>';
        }if(!empty($invitation['event_name'])){
            echo"<li>nom de l'evenement : ".$invitation['event_name'].'</li>';
        }if(!empty($invitation['start'])){
            echo"<li>debut de l'evenement : ".$invitation['start'].'</li>';
        }if(!empty($invitation['end'])){
            echo"<li>fin de l'evenement : ".$invitation['end'].'</li>';
        }if(!empty($invitation['group_name'])){
            echo"<li>nom du groupe : ".$invitation['group_name'].'</li>';
        }if(!empty($invitation['description'])){
            echo"<li>description de l'evenement : ".$invitation['description'].'</li>';
        }if(!empty($invitation['etat'])){
            echo"<li>etat de l'evenement : ".$invitation['etat'].'</li>';
        }
        echo'<form  action="index.php?ac=set-invitation" method="post">
                    <input type="submit" value="refuser" >
                    <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
                    <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
                    <input type="hidden" value="false" name="response">
                 </form>';
        echo"</ul>";
    }


}

