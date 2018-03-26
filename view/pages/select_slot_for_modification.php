<div class="ac-createEventMaj">
    <div class="ac-createEvent-header">

        <a href="index.php" class="fa fa-close ac-createEvent-header-close">
        </a>

        <h1 class="ac-createEventModif-header-title">
            Liste des Créneaux disponible :
        </h1>

    </div>

    <div class="ac-createEvent-body">

        <div class="ac-createEvent-body-creneaux">

            <form action="index.php" method="post">

                <div class="ac-createEvent-body-description-radio">

                    <?php
                    foreach ($free_slot_list as $free_slot) {

                        echo '
                        <div class="ac-createEvent-body-description-radio-item">
                        
                            <input class="ac-createEvent-body-radio" type ="radio" name="slot_list" value="' . $free_slot[1] . ',' . $free_slot[2] . ',' . $free_slot[3] . ',' . $free_slot[4] . '"> 
                                <span class="ac-createEvent-body-radio-span">Le ' . $free_slot[1] . ' à ' . $free_slot[2] . ' au ' . $free_slot[3] . ' à ' . $free_slot[4] . '
                                </span>
                            </input>
                            
                        </div>';
                    }
                    ?>

                    <input type="hidden" id="addEventTitle" name="id_event" value="<?php echo $id_event; ?>">

                    <button type="submit" class="ac-createEvent-header-save ac-createEventModif-header-save" id="saveEvent" name="action"
                            value="move-event-by-slot-generator">
                        valider
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>