<div class="ac-createEvent">
    <div class="ac-createEvent-header">

        <a href="index.php" class="close">
            &#xf00d;
        </a>

        <button type="submit" id="save" name="create">
            Enregistrer
        </button>



    </div>
    creneau deja pris, veuillez en choisir un autre
    <form action="index.php?ac=create-event" method="post">
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
        <div class="ac-createEvent-body">

            <div class="ac-createEvent-body-creneaux">

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

            </div>

            <div class="ac-createEvent-body-description">

            </div>

            <input type="submit" value="valider">
        </div>
    </form>

</div>

</div>

</div>
