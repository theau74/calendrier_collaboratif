<?php
foreach ($groups_list_by_id_user as $groups) {
    echo"<h1>liste des groupes : </h1>";
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
    echo'<form  action="index.php" method="post">
       <button type="submit" class="" id="saveEvent"  name="action" value="delete-group">
                    supprimer
                </button>
        <input type="hidden" value="'.$groups['id_users'].'" name="id_users">
        <input type="hidden" value="'.$groups['id_groups'].'" name="id_groups">
        ';
    echo'
        <button type="submit" class="" id="saveEvent"  name="action" value="set-group">
                    modifier
                </button>
         <input type="text" value="'.$groups['nom'].'" name="nom"> 
         <input type="text" value="'.$groups['description'].'" name="description"> 
         <input type="hidden" value="'.$groups['id_groups'].'" name="id_groups">
         </form>';
}
