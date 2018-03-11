<div class="ac-main-header">

    <form action="index.php?logout" method="post">
        <button type="submit" class="of-header-nav-item-button" name="logout">
            Déconnexion
        </button>
    </form>

    <form action="index.php?create-event" method="post">
        <button type="submit" class="" name="create">
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
                <input type="text" class="ac-home-sign-item-input" name="nom" placeholder="nom">
            </li>

            <li class="ac-home-sign-item">
                <input type="text" class="ac-home-sign-item-input" name="description" placeholder="description">
            </li>

            <li class="ac-home-sign-item">
                <input type="text" class="ac-home-sign-item-input" name="type" placeholder="type">
            </li>

            <li class="ac-home-sign-item">
                <input type="date" class="ac-home-sign-item-input" name="start_date" placeholder="type">
                <input type="time" class="ac-home-sign-item-input" name="start_time" placeholder="type">
            </li>

            <li class="ac-home-sign-item">
                <input type="date" class="ac-home-sign-item-input" name="end_date" placeholder="type">
                <input type="time" class="ac-home-sign-item-input" name="end_time" placeholder="type">
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

</div>
