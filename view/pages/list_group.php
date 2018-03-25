<div class="ac-main-header" id="mainHeader">

    <div class="fa fa-envelope-o ac-main-header-invitation" onclick="afficheNav()" id="enveloppe">

        <span class="ac-main-header-invitation-notif">
            <?php echo count($invitation_group_list); ?>
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

<div class="ac-listGroup" id="listGroup">

    <div class="ac-listGroup-header">

        <a href="index.php" class="ac-listGroup-header-close" id="closeEvent">
            &#xf00d;
        </a>

        <h1 class="ac-listGroup-header-title">
            Liste des groupes :
        </h1>


    </div>

    <div class="ac-listGroup-body">

        <?php

        foreach ($invitation_group_list as $groups) {
            echo"<div class='ac-listGroup-body-block'>";

                echo"<ul>";

                if (!empty($groups['nom'])) {
                    echo '<li class="ac-listGroup-body-block-item ac-listGroup-body-block-item-nom">' . $groups['nom'] . '</li>';
                }
                if (!empty($groups['description'])) {
                    echo '<li class="ac-listGroup-body-block-item ac-listGroup-body-block-item-description">' . $groups['description'] . '</li>';
                }
                if (!empty($groups['level'])){
                    if($groups['level'] == "1" || $groups['level'] == "2"){
                        echo"<li class='ac-listGroup-body-block-item ac-listGroup-body-block-item-boutton'>";
                        echo'<form  action="index.php" method="post">
                           <button type="submit" class="ac-listGroup-body-block-item-boutton-link" id="saveGroup"  name="view" value="set_group">
                                Modifier
                           </button>
                           <input type="hidden" value="'.$groups['id_groups'].'" name="id_groups">  
                         </form>';
                    }
                }   echo"</li>";

                echo"</ul>";

            echo"</div>";

        }


        echo "<h1> Liste des invitations de groupe refuser : </h1>";
        foreach ($invitation_group_list as $invitation_group){
            if($invitation_group['etat']=="refuser"){
                echo "<ul>";
                if(!empty($invitation_group['nom'])){
                    echo"<li>nom du groupe : ".$invitation_group['nom'].'</li>';
                }if(!empty($invitation_group['description'])){
                    echo"<li>description du groupe : ".$invitation_group['description'].'</li>';
                }
                echo'<form  action="index.php?ac=set-group-invitation" method="post">
        <input type="submit" value="valider" >
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        <input type="hidden" value="true" name="response">
        </form>';
                echo"</ul>";
            }

        }
        echo "<h1> Liste des invitations de groupe accepter : </h1>";

        foreach ($invitation_group_list as $invitation_group) {
            if ($invitation_group['etat'] == "valider") {
                echo "<ul>";
                if (!empty($invitation_group['nom'])) {
                    echo "<li>nom du groupe : " . $invitation_group['nom'] . '</li>';
                }
                if (!empty($invitation_group['description'])) {
                    echo "<li>description du groupe : " . $invitation_group['description'] . '</li>';
                }
                echo'<form  action="index.php?ac=set-group-invitation" method="post">
        <input type="submit" value="refuser" >
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        <input type="hidden" value="false" name="response">
        </form>';
                echo"</ul>";
            }

        }
        echo "<h1> Liste des invitations de groupe envoyer : </h1>";

        foreach ($invitation_group_list as $invitation_group) {
            if ($invitation_group['etat'] == "envoie") {
                echo "<ul>";
                if (!empty($invitation_group['nom'])) {
                    echo "<li>nom du groupe : " . $invitation_group['nom'] . '</li>';
                }
                if (!empty($invitation_group['description'])) {
                    echo "<li>description du groupe : " . $invitation_group['description'] . '</li>';
                }
                echo'<form  action="index.php?ac=set-group-invitation" method="post">
        <input type="submit" value="refuser" >
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        <input type="hidden" value="false" name="response">
        </form>';
                echo'<form  action="index.php?ac=set-group-invitation" method="post">
        <input type="submit" value="valider" >
        <input type="hidden" value="'.$invitation_group['id_users'].'" name="id_users">
        <input type="hidden" value="'.$invitation_group['id_groups'].'" name="id_groups">
        <input type="hidden" value="true" name="response">
        </form>';
                echo"</ul>";
            }

        }
        ?>

    </div>

</div>

