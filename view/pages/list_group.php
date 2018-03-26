<div class="ac-listGroup" id="listGroup">

    <div class="ac-listGroup-header">

        <a href="index.php" class="ac-listGroup-header-close" id="closeEvent">
            &#xf00d;
        </a>

        <h1 class="ac-listGroup-header-title">
            Liste et invitations de groupe :
        </h1>


    </div>

    <div class="ac-listGroup-body">

        <div class="ac-listGroup-body-liste">

            <?php

            foreach ($invitation_group_list as $groups) {
                echo "<div class='ac-listGroup-body-block'>";

                echo "<ul>";

                if (!empty($groups['nom'])) {
                    echo '<li class="ac-listGroup-body-block-item ac-listGroup-body-block-item-nom">' . $groups['nom'] . '</li>';
                }
                if (!empty($groups['description'])) {
                    echo '<li class="ac-listGroup-body-block-item ac-listGroup-body-block-item-description">' . $groups['description'] . '</li>';
                }
                if (!empty($groups['level'])) {
                    if ($groups['level'] == "1" || $groups['level'] == "2" ) {
                        echo "<li class='ac-listGroup-body-block-item ac-listGroup-body-block-item-boutton'>";
                        echo '<form  action="index.php" method="post">
                               <button type="submit" class="ac-listGroup-body-block-item-boutton-link" id="saveGroup"  name="view" value="set_group">
                                    Modifier
                               </button>
                               <input type="hidden" value="' . $groups['id_groups'] . '" name="id_groups">  
                             </form>';
                        echo "</li>";
                    }
                }


                echo "</ul>";

                echo "</div>";

            }
            ?>

        </div>

        <div class="ac-listGroup-body-invitation">

            <div class="ac-listGroup-body-invitation-item ac-listGroup-body-invitation-accepte">

                <h1> Liste des invitations de groupe accepter : </h1>

                <?php

                foreach ($invitation_group_list as $invitation_group) {
                    if ($invitation_group['etat'] == "valider") {
                        echo "<ul class='ac-listGroup-body-invitation-item-ul'>";
                        if (!empty($invitation_group['nom'])) {
                            echo "<li class='ac-listGroup-body-invitation-item-li'>nom du groupe : " . $invitation_group['nom'] . '</li>';
                        }
                        if (!empty($invitation_group['description'])) {
                            echo "<li class='ac-listGroup-body-invitation-item-li'>description du groupe : " . $invitation_group['description'] . '</li>';
                        }
                        echo "<li class='ac-listGroup-body-invitation-item-li ac-listGroup-body-invitation-item-li-boutton ac-listGroup-body-invitation-item-li-boutton-solo'>";
                        echo '<form  action="index.php" method="post">
                                            <button type="submit" class="ac-listGroupModif-body-block-boutton ac-listGroup-body-invitation-item-li-boutton-solo-item"   name="action" value="set-group-invitation">
                                                Refuser
                                            </button>
                                            <input type="hidden" value="' . $invitation_group['id_users'] . '" name="id_users">
                                            <input type="hidden" value="' . $invitation_group['id_groups'] . '" name="id_groups">
                                            <input type="hidden" value="false" name="response">
                                        </form>';
                        echo "</li>";
                        echo "</ul>";
                    }

                }
                ?>

            </div>

            <div class="ac-listGroup-body-invitation-item ac-listGroup-body-invitation-envoye">

                <h1> Liste des invitations de groupe envoyer : </h1>

                <?php
                foreach ($invitation_group_list as $invitation_group) {
                    if ($invitation_group['etat'] == "envoie") {
                        echo "<ul class='ac-listGroup-body-invitation-item-ul'>";
                        if (!empty($invitation_group['nom'])) {
                            echo "<li class='ac-listGroup-body-invitation-item-li'>" . $invitation_group['nom'] . '</li>';
                        }
                        if (!empty($invitation_group['description'])) {
                            echo "<li class='ac-listGroup-body-invitation-item-li'>" . $invitation_group['description'] . '</li>';
                        }

                        echo "<li class='ac-listGroup-body-invitation-item-li ac-listGroup-body-invitation-item-li-boutton'>";
                        echo '<form  action="index.php" method="post">
                                    <button type="submit" class="ac-listGroup-body-invitation-item-li-boutton-item"   name="action" value="set-group-invitation">
                                        Valider
                                    </button>
                                    <input type="hidden" value="' . $invitation_group['id_users'] . '" name="id_users">
                                    <input type="hidden" value="' . $invitation_group['id_groups'] . '" name="id_groups">
                                    <input type="hidden" value="true" name="response">
                                </form>';
                        echo "</li>";

                        echo "<li class='ac-listGroup-body-invitation-item-li ac-listGroup-body-invitation-item-li-boutton'>";
                        echo '<form  action="index.php" method="post">
                                    <button type="submit" class="ac-listGroup-body-invitation-item-li-boutton-item"   name="action" value="set-group-invitation">
                                        Refuser
                                    </button>
                                    <input type="hidden" value="' . $invitation_group['id_users'] . '" name="id_users">
                                    <input type="hidden" value="' . $invitation_group['id_groups'] . '" name="id_groups">
                                    <input type="hidden" value="false" name="response">
                                    </form>';
                        echo "</li>";

                        echo "</ul>";
                    }

                }
                ?>

            </div>

            <div class="ac-listGroup-body-invitation-item ac-listGroup-body-invitation-refuse">

                <h1> Liste des invitations de groupe refuser : </h1>

                <?php
                foreach ($invitation_group_list as $invitation_group) {
                    if ($invitation_group['etat'] == 'refuser') {
                        echo "<ul class='ac-listGroup-body-invitation-item-ul'>";
                        if (!empty($invitation_group['nom'])) {
                            echo "<li class='ac-listGroup-body-invitation-item-li'>" . $invitation_group['nom'] . '</li>';
                        }
                        if (!empty($invitation_group['description'])) {
                            echo "<li class='ac-listGroup-body-invitation-item-li'>" . $invitation_group['description'] . '</li>';
                        }
                        echo "<li class='ac-listGroup-body-invitation-item-li ac-listGroup-body-invitation-item-li-boutton ac-listGroup-body-invitation-item-li-boutton-solo'>";
                        echo '<form  action="index.php" method="post">
                                            <button type="submit" class="ac-listGroupModif-body-block-boutton ac-listGroup-body-invitation-item-li-boutton-solo-item"   name="action" value="set-group-invitation">
                                                Valider
                                            </button>
                                            <input type="hidden" value="' . $invitation_group['id_users'] . '" name="id_users">
                                            <input type="hidden" value="' . $invitation_group['id_groups'] . '" name="id_groups">
                                            <input type="hidden" value="true" name="response">
                                        </form>';
                        echo "</li>";
                        echo "</ul>";

                    }

                }
                ?>

            </div>

        </div>

    </div>

</div>

