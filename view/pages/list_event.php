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
            echo"<ul class='ac-listEvent-body-ul'>";

            if (!empty($events['nom'])) {
                echo '<li class="ac-listEvent-body-li">Titre: '.$events['nom'].'</li>';
            }
            if (!empty($events['description'])) {
                echo '<li class="ac-listEvent-body-li">Description: ' . $events['description'].'</li>';
            }
            if (!empty($events['type'])) {
                echo '<li class="ac-listEvent-body-li">Type: ' . $events['type'].'</li>';
            }
            if (!empty($events['start'])) {
                echo '<li class="ac-listEvent-body-li">Debut: ' . $events['start'].'</li>';
            }
            if (!empty($events['start_hour'])) {
                echo '<li class="ac-listEvent-body-li">Heure de debut: ' . $events['start_hour'].'</li>';
            }
            if (!empty($events['end'])) {
                echo '<li class="ac-listEvent-body-li">Fin: ' . $events['end'].'</li>';
            }
            if (!empty($events['end_hour'])) {
                echo '<li class="ac-listEvent-body-li">Heure de fin: ' . $events['end_hour'].'</li>';
            }
            echo"</ul>";
            if($events['level'] == "1" || $events['level'] == "2"){
                echo'<form class="ac-listEvent-body-button" action="index.php" method="post">
                            <button type="submit" class="ac-listEvent-body-button-content" id="saveGroup"  name="view" value="set_event">
                                Modifier
                            </button>
                            <input type="hidden" value="'.$events['id_event'].'" name="id_event">
                        </form>';
            }

        }

        echo"<h1 class='ac-listEvent-body-h1'> Invitations d'évènement refusée </h1>";
        foreach ($invitation_list as $invitation){
            echo "<ul class='ac-listEvent-body-ul'>";
            if($invitation['etat']=="refuser") {

                if (!empty($invitation['event_name'])) {
                    echo "<li class='ac-listEvent-body-li'>Nom de l'évènement: " . $invitation['event_name'] . '</li>';
                }
                if (!empty($invitation['start'])) {
                    echo "<li class='ac-listEvent-body-li'>Debut de l'évènement: " . $invitation['start'] . '</li>';
                }
                if (!empty($invitation['end'])) {
                    echo "<li class='ac-listEvent-body-li'>Fin de l'évènement: " . $invitation['end'] . '</li>';
                }
                if (!empty($invitation['group_name'])) {
                    echo "<li class='ac-listEvent-body-li'>Nom du groupe: " . $invitation['group_name'] . '</li>';
                }
                if (!empty($invitation['description'])) {
                    echo "<li class='ac-listEvent-body-li'>Description de l'évènement: " . $invitation['description'] . '</li>';
                }
                if (!empty($invitation['etat'])) {
                    echo "<li class='ac-listEvent-body-li'>Etat de l'évènement: " . $invitation['etat'] . '</li>';
                }
                echo "</ul>";
                echo '<form class="ac-listEvent-body-button" action="index.php" method="post">
                                <button type="submit" class="ac-listEvent-body-button-content" id="saveGroup"  name="action" value="set-event-invitation">
                                    Valider
                                </button>
                                 <input type="hidden" value="' . $invitation['id_user'] . '" name="id_user">
                                 <input type="hidden" value="' . $invitation['id_event'] . '" name="id_event">
                                 <input type="hidden" value="true" name="response">
                             </form>';

            }

        }

        echo"<h1 class='ac-listEvent-body-h1'> Invitations d'évènement validée </h1>";
        foreach ($invitation_list as $invitation){
            echo "<ul class='ac-listEvent-body-ul'>";
            if($invitation['etat']=="valider") {

                if (!empty($invitation['event_name'])) {
                    echo "<li class='ac-listEvent-body-li'>Nom de l'évènement: " . $invitation['event_name'] . '</li>';
                }
                if (!empty($invitation['start'])) {
                    echo "<li class='ac-listEvent-body-li'>Debut de l'évènement: " . $invitation['start'] . '</li>';
                }
                if (!empty($invitation['end'])) {
                    echo "<li class='ac-listEvent-body-li'>Fin de l'évènement: " . $invitation['end'] . '</li>';
                }
                if (!empty($invitation['group_name'])) {
                    echo "<li class='ac-listEvent-body-li'>Nom du groupe: " . $invitation['group_name'] . '</li>';
                }
                if (!empty($invitation['description'])) {
                    echo "<li class='ac-listEvent-body-li'>Description de l'évènement: " . $invitation['description'] . '</li>';
                }
                if (!empty($invitation['etat'])) {
                    echo "<li class='ac-listEvent-body-li'>Etat de l'évènement: " . $invitation['etat'] . '</li>';
                }
                echo "</ul>";
                echo '<form class="ac-listEvent-body-button" action="index.php" method="post">
                            <button type="submit" class="ac-listEvent-body-button-content" id="saveGroup"  name="action" value="set-event-invitation">
                                Refuser
                            </button>
                            <input type="hidden" value="' . $invitation['id_user'] . '" name="id_user">
                            <input type="hidden" value="' . $invitation['id_event'] . '" name="id_event">
                            <input type="hidden" value="false" name="response">
                         </form>';


            }

        }
        ?>

    </div>

</div>

