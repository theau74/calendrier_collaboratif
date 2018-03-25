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
        foreach ($groups_list_by_id_user as $groups) {
            echo"<ul>";
            if (!empty($events['id_groups'])) {
                echo '<li>id du groupe : '. $groups['id_groups'].'</li>';
            }
            if (!empty($groups['id_users'])) {
                echo "<li>id de l'utilisateur : ".$groups['id_users']."</li>";
            }
            if (!empty($groups['level'])) {
                echo '<li>niveau de gestion : ' . $groups['level'].'</li>';
            }
            if (!empty($groups['nom'])) {
                echo '<li>nom : ' . $groups['nom'].'</li>';
            }
            if (!empty($groups['description'])) {
                echo '<li>description : ' . $groups['description'].'</li>';
            }
            echo"</ul>";

        if (!empty($groups['level'])){
            if($groups['level'] == "1" || $groups['level'] == "2"){
                echo'<form  action="index.php" method="post">
                   <button type="submit" class="" id="saveGroup"  name="view" value="set_group">
                        Modifier
                   </button>
                   <input type="hidden" value="'.$groups['id_groups'].'" name="id_groups">  
                 </form>';
            }
        }
        }
        ?>

    </div>

</div>

