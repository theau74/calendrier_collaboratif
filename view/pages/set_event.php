<div class="ac-listGroup">

    <div class="ac-listEvent-header">

        <a href="index.php" class="ac-listEvent-header-close" id="closeEvent">
            &#xf00d;
        </a>

        <h1 class="ac-listEvent-header-title">
            Liste des évènements :
        </h1>


    </div>

    <div class="ac-listEvent-body">

        <?php
        echo'<form  action="index.php" method="post" class="ac-listEventModif-body-block">
                <input class="ac-listEventModif-body-block-input" type="text" value="' . $one_event[1] . '" name="nom"> 
                <input class="ac-listEventModif-body-block-input" type="date" value="' . $one_event[2] . '" name="start"> 
                <input class="ac-listEventModif-body-block-input" type="time" value="' . $one_event[3] . '" name="start_hour">
                <input class="ac-listEventModif-body-block-input" type="date" value="' . $one_event[4] . '" name="end"> 
                <input class="ac-listEventModif-body-block-input" type="time" value="' . $one_event[5] . '" name="end_hour">
                
                <button type="submit" class="ac-listEventModif-body-block-boutton ac-listEventModif-body-block-boutton-first" id="saveEvent"  name="action" value="set-event">
                    Modifier
                </button>

                <input type="hidden" value="' . $one_event[0] . '" name="id_event">
            </form>';


        echo'<form  action="index.php" method="post" class="ac-listEventModif-body-block ac-listEventModif-body-block-boutton-valide">
                <button type="submit" class="ac-listEventModif-body-block-boutton" id="saveEvent"  name="action" value="delete-event">
                    Supprimer
                </button>
                <input type="hidden" value="'.$one_event[0].'" name="id_event">
            </form>';
        ?>

    </div>

</div>
