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

    <form action="index.php?ac=create-group" method="post">

        <ul>

            <li class="ac-home-sign-item">
                <input type="text" class="ac-home-sign-item-input" name="nom" placeholder="nom">
            </li>

            <li class="ac-home-sign-item">
                <input type="text" class="ac-home-sign-item-input" name="description" placeholder="description">
            </li>
            <?php
            echo'<form action="index.php?ac=create-invitation" method="post">';
                foreach ($users_list as $user) {
                echo"<div>";
                    echo $user['Fname'];
                    echo $user['Lname'];
                    echo"<select name='user_right[]'>
                          <option value='3'>utilisateur</option>
                          <option value='2'>admin</option>
                        </select>";
                    echo '<input class="of-main-block-salle-radio" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                    echo "</div>";
                }
                    ?>

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