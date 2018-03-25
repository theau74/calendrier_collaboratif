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
        echo'<form  action="index.php" method="post" class="ac-listGroupModif-body-block">
                <input class="ac-listGroupModif-body-block-input" type="text" value="'.$one_group[1].'" name="nom"> 
                <input class="ac-listGroupModif-body-block-input" type="text" value="'.$one_group[2].'" name="description"> 
                <button type="submit" class="ac-listGroupModif-body-block-boutton" id="saveEvent"  name="action" value="set-group">
                    Enregistrer
                </button>
                <input type="hidden" value="'.$one_group[0].'" name="id_groups">
            </form>';

        echo'<form  action="index.php" method="post" class="ac-listGroupModif-body-block">
                <button type="submit" class="ac-listGroupModif-body-block-boutton id="saveGroup"  name="action" value="delete-group">
                    Supprimer
                </button>
                <input type="hidden" value="'.$one_group[0].'" name="id_groups">
            </form>';


        ?>

    </div>

</div>

<?php
foreach ($groups_list_by_id_user as $groups) {
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
?>
