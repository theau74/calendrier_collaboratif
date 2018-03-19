<div class="ac-createEvent">
    <div class="ac-createEvent-header">

        <a href="index.php" class="close">
            &#xf00d;
        </a>

        <button type="submit" id="save" name="create">
            Enregistrer
        </button>



    </div>
    <form action="index.php?ac=create-event" method="post">
        <input type="text" id="addEventTitle" placeholder="Titre de l'événement ..." name="nom">
        <div class="ac-createEvent-body">

            <div class="ac-createEvent-body-creneaux">

                <div class="ac-createEvent-body-creneaux-first">

                    <i class="ac-createEvent-body-creneaux-crenTxt">
                        &#xf017;
                    </i>

                    <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="start_date">

                    <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder="type" name="start_time">

                </div>

                <div class="ac-createEvent-body-creneaux-second">

                    <i class="ac-createEvent-body-creneaux-crenTxt">
                        &#xf017;
                    </i>

                    <input class="ac-createEvent-body-creneaux-dateEv" type="Date" placeholder="type" name="end_date">

                    <input class="ac-createEvent-body-creneaux-hoursEv" type="time" placeholder=type name="end_time">

                </div>

            </div>

            <div class="ac-createEvent-body-description">
                <input class="ac-createEvent-body-description-input" type="text" placeholder="Description" name="description">
            </div>


            <label class="container">

                <p id="checkbox-container">
                    Meeting
                </p>

                <input type="checkbox">

                <span class="checkmark">

                        </span>

            </label>

            <label class="container" value="Brainstorming">

                <p id="checkbox-container">
                    Brainstorming
                </p>

                <input type="checkbox">

                <span class="checkmark">

                        </span>

            </label>

            <label class="container">

                <p id="checkbox-container">
                    Panel
                </p>

                <input type="checkbox">

                <span class="checkmark">

                        </span>

            </label>
            <input type="submit" value="valider">
        </div>
    </form>

</div>

</div>

</div>
