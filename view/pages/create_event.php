<div class="ac-createEvent">

    <form style="display:none;" action="index.php?ac=create-event" method="post">

        <ul>

            <li class="ac-home-sign-item">
                <input type="text" class="ac-home-sign-item-input" name="titre" placeholder="Titre de l'Evenement">
            </li>

            <li class="ac-home-sign-item">
                <input type="text" class="ac-home-sign-item-input" name="Description" placeholder="Description">
            </li>

            <li class="ac-home-sign-item">
                <input type="text" class="ac-home-sign-item-input" name="Type" placeholder="Type">
            </li>

            <li class="ac-home-sign-item">
                <input type="date" class="ac-home-sign-item-input" name="start_date" placeholder="Type">
                <input type="time" class="ac-home-sign-item-input" name="start_time" placeholder="Type">
            </li>

            <li class="ac-home-sign-item">
                <input type="date" class="ac-home-sign-item-input" name="end_date" placeholder="Type">
                <input type="time" class="ac-home-sign-item-input" name="end_time" placeholder="Type">
            </li>

            <li class="ac-home-sign-allBoutton">
                <ul>

                    <li class="ac-home-sign-item-boutton-left">
                        <button type="submit" class="ac-home-sign-item-boutton-log" name="subscribe">
                            valider
                        </button>
                    </li>


                </ul>
            </li>

        </ul>

    </form>

    <div class="ac-createEvent-header">

        <a href="index.php" class="close">
            &#xf00d;
        </a>

        <button type="submit" id="save" name="create">
            Enregistrer
        </button>

        <input type="text" id="addEventTitle" placeholder="Titre de l'événement ...">

    </div>

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

        <label class="container">

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


    </div>

</div>

</div>

</div>
