<?php
echo"<h1>liste des groupes : </h1>";
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
    echo'</ul>';
    if (!empty($groups['level'])){}
        if($groups['level'] == "1" || $groups['level'] == "2"){
            echo'<form  action="index.php" method="post">
                   <button type="submit" class="" id="saveGroup"  name="view" value="set_group">
                        Modifier
                   </button>
                   <input type="hidden" value="'.$groups['id_groups'].'" name="id_groups">  
                 </form>';
        }
}
