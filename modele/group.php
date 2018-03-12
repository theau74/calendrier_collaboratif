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
function create_group($idcreator, $c, $encryption_key) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO groups(nom, description, creator) VALUES('$nom', '$description', '$idcreator')");
    if(mysqli_query($c,$sql)){
        $id_group = get_last_group_by_user_id($idcreator, $c);
        $loop = 0;
        $creator = $_SESSION['id'];
        if(!empty($_POST['users-choice'])) {
            $sql2 = ("INSERT INTO users_groups (`id_users`, `id_groups`, `creator`, `etat`, `level`) VALUES");
            foreach ($_POST['users-choice'] as $user) {
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
