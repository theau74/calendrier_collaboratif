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
    $sql = ("INSERT INTO events(nom, description, creator,  type, start, end) VALUES('$nom', '$description', '$idcreator')");
    if(mysqli_query($c,$sql)){
        $id_group = get_last_group_by_user_id($idcreator, $c);

    }
    else{
        return false;
    }
}
