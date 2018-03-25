<div class="ac-listEvent" id="listEvent">

    <div class="ac-listEvent-header">

        <a href="index.php" class="ac-listEvent-header-close" id="closeEvent">
            &#xf00d;
        </a>

        <div class="ac-listEvent-header-title">
        Liste des évènements
        </div>

    </div>

    <div class="ac-listEvent-body">

        <?php
        foreach ($event_list as $events) {
            echo"<h1>liste des events</h1>";
            echo"<ul>";
            if (!empty($events['id_event'])) {
                echo '<li>id : '. $events['id_event'].'</li>';
            }
            if (!empty($events['nom'])) {
                echo '<li>title : '.$events['nom'].'</li>';
            }
            if (!empty($events['description'])) {
                echo '<li>description : ' . $events['description'].'</li>';
            }
            if (!empty($events['type'])) {
                echo '<li>type : ' . $events['type'].'</li>';
            }
            if (!empty($events['start'])) {
                echo '<li>debut : ' . $events['start'].'</li>';
            }
            if (!empty($events['start_hour'])) {
                echo '<li>heure du debut : ' . $events['start_hour'].'</li>';
            }
            if (!empty($events['end'])) {
                echo '<li>fin : ' . $events['end'].'</li>';
            }
            if (!empty($events['end_hour'])) {
                echo '<li>heure de  fin : ' . $events['end_hour'].'</li>';
            }
            echo"</ul>";
            if($events['level'] == "1" || $events['level'] == "2"){
                echo'<form  action="index.php" method="post">
                    <button type="submit" class="" id="saveGroup"  name="view" value="set_event">
                        Modifier
                    </button>
                    <input type="hidden" value="'.$events['id_event'].'" name="id_event">
                </form>';
            }
        }
        ?>
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
                echo'<form  action="index.php" method="post">
            <button type="submit" class="" id="saveGroup"  name="action" value="set-event-invitation">
                        Valider
                    </button>
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
                echo'<form  action="index.php" method="post">
                    <button type="submit" class="" id="saveGroup"  name="action" value="set-event-invitation">
                        Refuser
                    </button>
                    <input type="hidden" value="'.$invitation['id_user'].'" name="id_user">
                    <input type="hidden" value="'.$invitation['id_event'].'" name="id_event">
                    <input type="hidden" value="false" name="response">
                 </form>';
                echo"</ul>";
            }


        }
        ?>

    </div>

</div>

