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

            <div class="">
                <form action="index.php" method="post">

                    <input type="hidden" id="addEventTitle" name="nom" value="<?php echo $nom; ?>">
                    <input type="hidden" placeholder="Description" name="description" value="<?php echo $description; ?>">

                    <?php
                    if (isset($users_choice_list)) {
                        foreach ($users_choice_list as $user) {
                            if (isset($user['right'])) {
                                echo '<input type="hidden" name="users-choice[]" value="' . $user['id'] . '">';
                            }

                        }
                        foreach ($users_choice_list as $user) {
                            if (isset($user['right'])) {
                                echo '<input type="hidden" name="user_right[]" value="' . $user['right'] . '">';
                            }
                        }

                        foreach (array_filter(array_unique(array_column($users_choice_list, "id_group"), null)) as $user) {
                            if (isset($user)) {
                                echo '<input type="hidden" name="groups-choice[]" value="' . $user . '">';
                            }
                        }

                    }
                    ?>

                    <div class="ac-createEvent-body-creneaux-first">

                        <i class="ac-createEvent-body-creneaux-crenTxt">
                            &#xf017;
                        </i>

                        <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="start_date"
                               required>

                        <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder="type" name="start_time"
                               required>

                    </div>

                    <div class="ac-createEvent-body-creneaux-second">

                        <i class="ac-createEvent-body-creneaux-crenTxt">
                            &#xf017;
                        </i>

                        <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="end_date"
                               required>

                        <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder=type name="end_time"
                               required>

                    </div>

                    <button type="submit" class="ac-createEvent-header-save ac-createEventModif-header-save" id="saveEvent" name="action"
                            value="create-event">
                        enregistrer
                    </button>

                </form>
            </div>

            <div>
                <form action="index.php" method="post">

                    <input type="hidden" id="addEventTitle" name="nom" value="<?php echo $nom; ?>">
                    <input type="hidden" placeholder="Description" name="description" value="<?php echo $description; ?>">

                    <?php

                    if (isset($users_choice_list)) {
                        foreach ($users_choice_list as $user) {
                            if (isset($user['right'])) {
                                echo '<input type="hidden" name="users-choice[]" value="' . $user['id'] . '">';
                            }

                        }
                        foreach ($users_choice_list as $user) {
                            if (isset($user['right'])) {
                                echo '<input type="hidden" name="user_right[]" value="' . $user['right'] . '">';
                            }
                        }

                        foreach (array_filter(array_unique(array_column($users_choice_list, "id_group"), null)) as $user) {
                            if (isset($user)) {
                                echo '<input type="hidden" name="groups-choice[]" value="' . $user . '">';
                            }
                        }

                    }

                    ?>

                    <input type="hidden" id="addEventTitle" name="nom" value="<?php echo $nom; ?>">
                    <input type="hidden" placeholder="Description" name="description" value="<?php echo $description; ?>">
                    <div class="ac-createEvent-body-description">

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

                        <button type="submit" class="ac-createEvent-header-save ac-createEventModif-header-save" id="saveEvent" name="action"
                                value="create-event-by-slot-generator">
                            valider
                        </button>

                    </div>

                </form>
            </div>


        </div>

    </div>

</div>