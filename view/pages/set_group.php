<div class="ac-listGroup">

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
foreach ($users_in_gr as $user) {
    echo"<li class='ac-createGroup-body-item'>";
    echo "<p class='ac-createGroup-body-item-name'>" . $user['Fname'] . "</p>";
    echo "<p class='ac-createGroup-body-item-lname'>" . $user['Lname'] . "</p>";
    if($user['level'] == "2"){
        echo"<select class='ac-createGroup-body-item-select' name='user_right[]'>
           <option value='3'>Utilisateur</option>
           <option value='2' selected>Administrateur</option>
         </select>";
    }
    else{
        echo"<select class='ac-createGroup-body-item-select' name='user_right[]'>
           <option value='3'selected>Utilisateur</option>
           <option value='2' >Administrateur</option>
         </select>";
    }
    echo '<input class="ac-createGroup-body-item-checkbox" type="checkbox" name="users-choice[]" value="' . $user['id'] . '" checked>';
    echo "</li>";
}
foreach ($users_not_in_gr as $user) {
    echo"<li class='ac-createGroup-body-item'>";
    echo "<p class='ac-createGroup-body-item-name'>" . $user['Fname'] . "</p>";
    echo "<p class='ac-createGroup-body-item-lname'>" . $user['Lname'] . "</p>";
    echo"<select class='ac-createGroup-body-item-select' name='user_right[]'>
           <option value='3'selected >Utilisateur</option>
           <option value='2'>Administrateur</option>
         </select>";
    echo '<input class="ac-createGroup-body-item-checkbox" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
    echo "</li>";
}
echo '</form>';

        ?>

    </div>

</div>