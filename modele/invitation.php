<?php
//creation d'évenemenent dans la base
function create_invitation($creator, $c, $encryption_key) {
    $loop = 0;
    $creator = $_SESSION['id'];
    $id_event = get_last_event_by_user_id($_SESSION['id'], $c);
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO invitation (`id_event`, `id_user`, `id_groupe`, `etat`, `creator`) VALUES");
    //invitation des utilisateurs sans groupe
    if(!empty($_POST['users-choice'])) {
        foreach ($_POST['users-choice'] as $user) {
            $id_user = $user;
            if ($loop == 0) {
                $sql .= (" ('$id_event', '$id_user', 'null', 'envoie', '$creator')");
                $loop++;
            } else {
                $sql .= (", ('$id_event', '$id_user', 'null', 'envoie', '$creator')");
            }
        }
    }

    //invitation par groupe
    if(!empty($_POST['groups-choice'])) {
        foreach ($_POST['groups-choice'] as $group) {
            $users_list_by_group = get_users_id_by_group_id($group, $c);
            foreach ($users_list_by_group as $user) {
                $id_user = $user['id_users'];
                $sql .= (", ('$id_event', '$id_user', '$group', 'envoie', '$creator')");
            }
        }
    }

    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}
