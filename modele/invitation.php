<?php
//creation d'évenemenent dans la base
function create_invitation($user_list, $creator, $c, $encryption_key) {
    $loop = 0;
    $creator = $_SESSION['id'];
    $id_event = get_last_event_by_user_id($_SESSION['id'], $c);
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO invitation (`id_event`, `id_user`, `id_group`, `etat`, `creator`) VALUES");
    $sql2 = null;
    //invitation des utilisateurs sans groupe
    if(!empty($user_list)) {
        foreach ($user_list as $user) {
            $id_user = $user;
            if ($loop == 0) {
                $sql2 = (" ('$id_event', '$id_user', '0', 'envoie', '$creator')");
                $loop++;
            } else {
                $sql2 .= (", ('$id_event', '$id_user', '0', 'envoie', '$creator')");
            }
        }
    }

    //invitation par groupe
    if(!empty($_POST['groups-choice'])) {
        foreach ($_POST['groups-choice'] as $group) {

            $users_list_by_group = get_users_id_by_group_id($group, $c);
            if(isset($users_list_by_group)) {
                foreach ($users_list_by_group as $user) {
                    $id_user = $user['id_users'];
                    if ($loop == 0) {
                        $sql2 = ("('$id_event', '$id_user', '$group', 'envoie', '$creator')");
                        $loop++;
                    } else {
                        $sql2 .= (", ('$id_event', '$id_user', '$group', 'envoie', '$creator')");
                    }
                }
            }
        }
    }
    if(isset($sql2)){
        $sql .= $sql2;
        if(mysqli_query($c,$sql)){
            return true;
        }
        else{
            return false;
        }
    } else{
        return true;
    }
}
function get_invitation_by_id_user($id_user,$c){
    $sql = ("SELECT I.id_event, I.id_user, I.id_group, I.etat, E.nom as event_name, E.start, E.end, G.nom as group_name, G.description FROM invitation I 
INNER JOIN events E ON E.id = I.id_event 
INNER JOIN groups G ON G.id = I.id_group
WHERE I.id_user ='$id_user' GROUP BY id_event");
    $result = mysqli_query($c,$sql);
    $invitation_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $invitation_list[$loop]= $donnees;
        $loop++;
    }
    return $invitation_list;

}
function get_group_invitation($id_user,$c){
    $sql =("SELECT * FROM groups G INNER JOIN users_groups U ON G.id = U.id_groups WHERE U.id_users ='$id_user'");
    $result = mysqli_query($c,$sql);
    $invitation_group_list = array();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $invitation_group_list[$loop]= $donnees;
        $loop++;
    }
    return $invitation_group_list;
}
function set_invitation($id_user,$id_event,$response,$c){
    if ($response) {
        $sql = ("UPDATE invitation SET etat ='valider' WHERE id_user ='$id_user' AND id_event='$id_event'");
    } else {
        $sql = ("UPDATE invitation SET etat ='refuser' WHERE id_user ='$id_user' AND id_event='$id_event'");
    }
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}
