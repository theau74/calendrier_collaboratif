<?php
function get_groups_list($c){
    $sql = ("SELECT * FROM groups");
    $result = mysqli_query($c,$sql);
    $groups_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $groups_list[$loop]= $donnees;
        $loop++;
    }
    return $groups_list;
}

function get_groups_by_id_user($id_user,$c){
    $sql = ("SELECT U.level, U.id_users, U.id_groups, U.etat, G.id, G.nom, G.description FROM users_groups U INNER JOIN groups G ON U.id_groups = G.id WHERE U.id_users ='$id_user'");
    $result = mysqli_query($c,$sql);
    $groups_list_by_id_user = array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $groups_list_by_id_user[$loop]= $donnees;
        $loop++;
    }
    return $groups_list_by_id_user;
}
function get_one_group_by_id($id_group,$c){
    $sql = ("SELECT id, nom, description FROM groups WHERE id='$id_group'");
    $result = mysqli_query($c,$sql);
    $one_group = array ();
    if($row = mysqli_fetch_row($result)){
        $one_group= $row;
    }
    return $one_group;



}
function get_users_by_id_group($id_group,$c){
    $sql = ("SELECT id_users FROM users_groups WHERE id_groups ='$id_group'");
    $result = mysqli_query($c,$sql);
    $groups_list_by_id_user = array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $groups_list_by_id_user[$loop]= $donnees;
        $loop++;
    }
    return $groups_list_by_id_user;
}
function delete_groups_by_id($id_groups,$c){
    $sql_groups = ("DELETE FROM groups 
    WHERE groups.id ='$id_groups'");
    $sql_users_groups= ("DELETE FROM users_groups
    WHERE users_groups.id_groups='$id_groups'");
    if(mysqli_query($c,$sql_users_groups)){
        if(mysqli_query($c,$sql_groups)){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
}
function update_groups_by_id($id_groups,$nom,$description,$c){
    $sql = ("UPDATE groups SET nom = '$nom', description = '$description' WHERE id = '$id_groups'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}


//obtient l'id du dernier groupe créé par un utilisateur
function get_last_group_by_user_id($id, $c) {
    $sql = ("SELECT id FROM groups 
WHERE creator ='$id'
ORDER BY id DESC 
LIMIT 1");
    $result = mysqli_query($c,$sql);
    //test des résultat
    if($row = mysqli_fetch_row($result)){
        if (isset($row[0])) {
            return $row[0];
        }
        else {
            return false;
        }
    }
    $result->close();
}

//creation de groupe dans la base
function create_group($nom, $description, $creator, $users_choice, $c, $encryption_key) {
    //insertion des valeurs dans la bdd
    var_dump($creator);
    var_dump($description);
    $sql = ("INSERT INTO groups(nom, description, creator) VALUES('$nom', '$description', '$creator')");
    if(mysqli_query($c,$sql)){
        $id_group = get_last_group_by_user_id($creator, $c);
        $loop = 0;
        if(!empty($users_choice)) {
            $sql2 = ("INSERT INTO users_groups (`id_users`, `id_groups`, `creator`, `etat`, `level`) VALUES");
            foreach ($users_choice as $user) {
                $id_user = $user;
                $user_right = $_POST['user_right'][$loop];
                if ($loop == 0) {
                    $sql2 .= (" ('$id_user', '$id_group', '$creator', 'envoie', '$user_right')");
                } else {
                    $sql2 .= (", ('$id_user', '$id_group', '$creator', 'envoie', '$user_right')");

                }
                $loop++;
            }
            if(mysqli_query($c,$sql2)){
                return true;
            }else{
                return false;
            }

        }else{
            return true;
        }
    }
    else{
        return false;
    }
}
