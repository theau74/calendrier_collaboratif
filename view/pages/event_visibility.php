<?php
echo'<form action="index.php?ac=create-invitation" method="post">';
foreach ($users_list as $user) {
    echo"<div>";
    echo $user['Fname'];
    echo $user['Lname'];
    echo '<input class="of-main-block-salle-radio" type="checkbox" name="users-choice[]" value="' . $user['id'] . '">';
    echo "</div>";
}
foreach ($groups_list as $group) {
    echo"<div>";
    echo $group['nom'];
    echo $group['description'];
    echo '<input class="of-main-block-salle-radio" type="checkbox" name="groups-choice[]" value="' . $group['id'] . '">';
    echo "</div>";
}
echo '<div>
            <input class="of-main-button-item" type="submit" class="button" value="valider" name="subscribe">
        </div>
</form>';
