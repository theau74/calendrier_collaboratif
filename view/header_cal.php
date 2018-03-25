<div class="ac-main-header" id="mainHeader">

    <div class="fa fa-envelope-o ac-main-header-invitation" onclick="afficheNav()" id="enveloppe">

        <span class="ac-main-header-invitation-notif">
            <?php echo count($pending_invitation_list); ?>
        </span>

    </div >

    <div id="bouttonCreeGroup" type="submit" class="material-icons ac-main-header-createGroup">
        group_add
    </div>

    <a id="bouttonVoirAllGroup" type="submit" class="fa fa-group ac-main-header-allGroup" href="index.php?list_group">

    </a>

    <a id="bouttonVoirAllEvent" type="submit" class="material-icons ac-main-header-allEvent" href="index.php?list_event">
        event
    </a>

    <a href="index.php?logout" type="submit" class="fa fa-power-off ac-main-header-logout">

    </a>

</div>

<div class="ac-main-nav" style="display: none;" id="nav-bar">

    <div class="ac-main-nav-invit">

        <?php

        foreach ($pending_invitation_list as $invitation) {
            echo "<div class='ac-main-nav-invit-item'>";
            echo "<ul class='ac-main-nav-invit-item-description'>";
            if (!empty($invitation['event_name'])) {
                echo "<li class='ac-main-nav-invit-item-description-name'>" . $invitation['event_name'] . '</li>';
            }
            if (!empty($invitation['start'])) {
                echo "<li class='ac-main-nav-invit-item-description-jourStart'>" . $invitation['start'] . '</li>';
            }
            if (!empty($invitation['start_hour'])) {
                echo "<li class='ac-main-nav-invit-item-description-heureStart'>" . $invitation['start_hour'] . '</li>';
            }
            if (!empty($invitation['end'])) {
                echo "<li class='ac-main-nav-invit-item-description-jourFin'>" . $invitation['end'] . '</li>';
            }
            if (!empty($invitation['end_hour'])) {
                echo "<li class='ac-main-nav-invit-item-description-heureFin'>" . $invitation['end_hour'] . '</li>';
            }
            if (!empty($invitation['description'])) {
                echo "<li class='ac-main-nav-invit-item-description-descript'>" . $invitation['description'] . '</li>';
            }
            echo "</ul>";

            echo "<div class='ac-main-nav-invit-item-boutton'>";

            echo '<form  action="index.php" method="post">
                                <button type="submit" class="ac-main-nav-invit-item-boutton-valider" id="saveEvent"  name="action" value="valid_event_invit">
                                    &#xf00c;
                                </button>
                                <input type="hidden" value="' . $invitation['id_user'] . '" name="id_user">
                                <input type="hidden" value="' . $invitation['id_event'] . '" name="id_event">
                                <input type="hidden" value="true" name="response">
                            </form>';

            echo '<form  action="index.php" method="post">
                                <button type="submit" class="ac-main-nav-invit-item-boutton-refuser" id="saveEvent"  name="action" value="deny_event_invit">
                                    &#xf00d;
                                </button>
                                <input type="hidden" value="' . $invitation['id_user'] . '" name="id_user">
                                <input type="hidden" value="' . $invitation['id_event'] . '" name="id_event">
                                <input type="hidden" value="false" name="response">
                            </form>';

            echo "</div>";

            echo "</div>";
        }
        ?>

    </div>

    <div class="ac-main-footer">

        <h2 class="ac-main-footer-title">
            Pimp My CSS
        </h2>

    </div>

</div>

<div class="ac-createGroup" style="display:none;" id="createGroup">

    <form action="index.php" method="post">

        <div class="ac-createGroup-header">

            <div class="ac-createGroup-header-close" id="closeGroup">
                &#xf00d;
            </div>

            <button type="submit" class="ac-createEvent-header-save" id="saveGroup"  name="action" value="create-group">
                Enregistrer
            </button>

            <input type="text" class="ac-createGroup-header-title" name="nom" placeholder="Nom du Groupe :" required>

        </div>

        <div class="ac-createGroup-body">

            <h1 class="ac-createGroup-body-addTitle">
                Crez un groupe et ajoutez-y des membres
            </h1>

            <div class="ac-createGroup-body-item">
                <input type="text" class="ac-createGroup-body-description-input" name="description" placeholder="Description">
            </div>

            <ul class="ac-createGroup-body-ul">

                <li class="ac-createGroup-body-columns">

                    <h2 class="ac-createGroup-body-h2">
                        Prénom
                    </h2>

                    <h2 class="ac-createGroup-body-h2">
                        Nom
                    </h2>

                    <h2 class="ac-createGroup-body-h2">
                        Rang
                    </h2>

                </li>

                <?php
                foreach ($users_list as $user) {
                    echo"<li class='ac-createGroup-body-item'>";

                    echo "<p class='ac-createGroup-body-item-name'>" . $user['Fname'] . "</p>";
                    echo "<p class='ac-createGroup-body-item-lname'>" . $user['Lname'] . "</p>";
                    echo"<select class='ac-createGroup-body-item-select' name='user_right[]'>
                                 <option value='3'>Utilisateur</option>
                                 <option value='2'>Administrateur</option>
                            </select>";
                    echo "<label class='ac-createGroup-popUp-checkbox-container'>";
                    echo '<input class="ac-container ac-createGroup-body-item-checkbox" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                    echo "<span class='ac-createGroup-popUp-checkbox-container-checkmark'></span>";
                    echo "</label>";

                    echo "</li>";
                }
                ?>

            </ul>



        </div>

    </form>

</div>

<div class="ac-createGroup-popUp" style="display:none;" id="createGroup-popUp">

    <form action="index.php" method="post">

        <div class="ac-createGroup-popUp-content">

            <div class="ac-createGroup-header">

                <div class="ac-createGroup-header-close" id="closeGroup-popUp">
                    &#xf00d;
                </div>

                <button type="submit" class="ac-createEvent-header-save" id="saveGroup"  name="action" value="create-group">
                    Enregistrer
                </button>

                <input type="text" class="ac-createGroup-header-title" name="nom" placeholder="Nom du Groupe ..." required>

            </div>

            <div class="ac-createGroup-popUp-body">

                <h1 class="ac-createGroup-popUp-body-addTitle">
                    Ajouter des membres
                </h1>

                <ul class="ac-createGroup-popUp-body-ul">

                    <li class="ac-createGroup-popUp-body-columns">

                        <h2 class="ac-createGroup-popUp-body-h2">
                            Prénom
                        </h2>

                        <h2 class="ac-createGroup-popUp-body-h2">
                            Nom
                        </h2>

                        <h2 class="ac-createGroup-popUp-body-h2">
                            Rang
                        </h2>

                    </li>

                    <?php
                    foreach ($users_list as $user) {
                        echo"<li class='ac-createGroup-body-item'>";
                        echo "<p class='ac-createGroup-popUp-body-item-name'>" . $user['Fname'] . "</p>";
                        echo "<p class='ac-createGroup-popUp-body-item-lname'>" . $user['Lname'] . "</p>";
                        echo"<select class='ac-createGroup-popUp-body-item-select' name='user_right[]'>
                                     <option value='3'>Utilisateur</option>
                                     <option value='2'>Administrateur</option>
                                </select>";
                        echo "<label class='ac-createGroup-popUp-checkbox-container'>";
                        echo '<input class="ac-container" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
                        echo "<span class='ac-createGroup-popUp-checkbox-container-checkmark'></span>";
                        echo "</label>";
                        echo "</li>";
                    }
                    ?>

                </ul>

            </div>

            <div class="ac-createGroup-popUp-body-description">
                <input type="text" class="ac-createGroup-popUp-body-description-input" name="description" placeholder="Description ...">
            </div>

        </div>

    </form>

</div>
