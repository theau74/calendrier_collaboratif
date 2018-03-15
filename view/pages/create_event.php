<div class="ac-main-header">

    <form action="index.php?logout" method="post">
        <button type="submit" class="ac-main-header-logout" name="logout">
            Déconnexion
        </button>
    </form>

    <form action="index.php?create-event" method="post">
        <button type="submit" class="ac-main-header-create" name="create">
            Créer
        </button>
    </form>

</div>

<div class="ac-main-createEvent">

    <a href="index.php">
        Retour
    </a>

    <form action="index.php?ac=create-event" method="post">

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

    <div id="addEvent" class="event">

        <div class="event-content">
            <div class="event-header">

                <span class="close">
                    &times;
                </span>

                <input type="text" id="addEventTitle" placeholder="Titre de l'événement">

            </div>

            <div class="event-body">

                <input type="text" name="nom">

                <div class="creneaux">
                    <p class="crenTxt">
                        Du
                    </p>

                    <input class="dateEv" type="Date" placeholder="type" name="start_date">

                    <input class="hoursEv" type="time" placeholder="type" name="start_time">

                    <p class="crenTxt">
                        au
                    </p>

                    <input class="dateEv" type="Date" placeholder="type" name="end_date">

                    <input class="hoursEv" type="time" placeholder=type name="end_time">

                </div>

                <div>
                    <input class="descript" type="text" placeholder="Description" name="description">
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
            <div class="event-footer">
                <button type="submit" id="save" name="create">Enregister</button>
            </div>
        </div>

    </div>

</div>
