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
function get_accepeted_event_by_user_id($id, $c){
    $sql = ("SELECT *
FROM events E
INNER JOIN invitation I ON E.id = I.id_event
WHERE I.id_user ='$id' AND I.etat ='valider'
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
function create_event($nom, $description, $idcreator, $start, $start_hour, $end, $end_hour, $c, $encryption_key) {
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

function delete_event_by_id($id_event,$c){
    $sql_event = ("DELETE FROM events 
    WHERE events.id ='$id_event'");
    $sql_invi= ("DELETE FROM invitation
    WHERE invitation.id_event='$id_event'");
    if(mysqli_query($c,$sql_event)){
        if(mysqli_query($c,$sql_invi)){
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
function update_event_by_id($id_event,$nom,$start,$start_hour,$end,$end_hour,$c){
    $sql = ("UPDATE events SET nom = '$nom', start = '$start', start_hour = '$start_hour', end = '$end', end_hour = '$end_hour' WHERE id = '$id_event'");
    if(mysqli_query($c,$sql)){
        return true;
    }
    else{
        return false;
    }
}

