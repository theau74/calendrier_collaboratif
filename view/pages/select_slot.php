<div class="ac-createEvent">
    <div class="ac-createEvent-header">

        <a href="index.php" class="close">
            &#xf00d;
        </a>





    </div>

        <div class="ac-createEvent-body">

            <div class="ac-createEvent-body-creneaux">
                <form action="index.php" method="post">
                    <input type="hidden" id="addEventTitle" name="nom" value="<?php echo$post['nom']; ?>">
                    <input type="hidden" placeholder="Description" name="description" value="<?php echo$post['description']; ?>">
                    <?php
                    if(isset($post['users-choice'])) {
                        foreach ($post['users-choice'] as $user) {
                            echo '<input type="hidden" name="users-choice[]" value="' . $user . '">';
                        }
                    }
                    if(isset($post['groups-choice'])) {
                        foreach ($post['groups-choice'] as $group) {
                            echo '<input type="hidden" name="users-choice[]" value="' . $group . '">';
                        }
                    }
                    ?>
                    <div class="ac-createEvent-body-creneaux-first">

                    <i class="ac-createEvent-body-creneaux-crenTxt">
                        &#xf017;
                    </i>

                    <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="start_date" required>

                    <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder="type" name="start_time" required>

                     </div>

                     <div class="ac-createEvent-body-creneaux-second">

                    <i class="ac-createEvent-body-creneaux-crenTxt">
                        &#xf017;
                    </i>

                    <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="end_date" required>

                    <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder=type name="end_time" required>

                </div>
                <button type="submit" class="ac-createEvent-header-save" id="saveEvent"  name="action" value="create-event">
                    enregistrer
                </button>
                </form>
                <form action="index.php" method="post" >
                    <input type="hidden" id="addEventTitle" name="nom" value="<?php echo$post['nom']; ?>">
                    <input type="hidden" placeholder="Description" name="description" value="<?php echo$post['description']; ?>">
                    <?php
                    if(isset($post['users-choice'])) {
                        foreach ($post['users-choice'] as $user) {
                            echo '<input type="hidden" name="users-choice[]" value="' . $user . '">';
                        }
                    }

                    if(isset($post['user_right'])) {
                        foreach ($post['users-choice'] as $right) {
                            echo '<input type="hidden" name="users-right[]" value="' . $right . '">';
                        }
                    }
                    if(isset($post['groups-choice'])) {
                        foreach ($post['groups-choice'] as $group) {
                            echo '<input type="hidden" name="users-choice[]" value="' . $group . '">';
                        }
                    }
                    ?>
                    <input type="hidden" id="addEventTitle" name="nom" value="<?php echo$post['nom']; ?>">
                    <input type="hidden" placeholder="Description" name="description" value="<?php echo$post['description']; ?>">
                    <div class="ac-createEvent-body-description">
                        <?php
                        foreach ($free_slot_list as $free_slot){
                            echo'<input type ="radio" name="slot_list" value="'.$free_slot[1].','.$free_slot[2].','.$free_slot[3].','.$free_slot[4].'">'.$free_slot[1].','.$free_slot[2].','.$free_slot[3].','.$free_slot[4].' ';
                        }
                        ?>
                        <button type="submit" class="ac-createEvent-header-save" id="saveEvent" name="action" value="create-event-by-slot-generator">
                            valider
                        </button>
                    </div>

                </form>
            </div>




        </div>




</div>

</div>

</div>
