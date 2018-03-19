<?php
function get_event_by_user_id($id, $c){
    $sql = ("SELECT *
FROM events E
INNER JOIN invitation I ON E.id = I.id_event
WHERE I.id_user ='$id'
GROUP BY I.id_event");
    $result = mysqli_query($c,$sql);
    $event_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $event_list[$loop]= $donnees;
        $loop++;
    }
    return $event_list;
}

//creation d'évenemenent dans la base
function create_event($idcreator, $c, $encryption_key) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    //$type = $_POST['type'];
    $start = $_POST["start_date"];
    $start_hour = $_POST["start_time"];
    $end = $_POST["end_date"];
    $end_hour = $_POST["end_time"];
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO events(nom, creator, description, start, start_hour, end, end_hour) VALUES('$nom', '$idcreator', '$description', '$start', '$start_hour', '$end', '$end_hour')");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

//recuperation du dernier event crée par un utilisateur
function get_last_event_by_user_id($id, $c) {
    $sql = ("SELECT id FROM EVENTS 
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





