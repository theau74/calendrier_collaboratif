<div class="ac-main-header" id="mainHeader">


    <a href="javascript:void(0);" class="ac-main-header-menue-sandwish" onclick="afficheNav()">
        &#xf003;
    </a>

    <div id="bouttonCreeGroup" type="submit" class="ac-main-header-createGroup">
        &#xe7f0;
    </div>

    <a id="bouttonVoirAllGroup" type="submit" class="ac-main-header-allGroup" href="index.php?list_group">
        &#xf0c0;
    </a>

    <a id="bouttonVoirAllEvent" type="submit" class="ac-main-header-allEvent" href="index.php?list_event">
        &#xe878;
    </a>

    <div href="index.php?logout" type="submit" class="ac-main-header-logout">
        &#xf011;
    </div>


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

