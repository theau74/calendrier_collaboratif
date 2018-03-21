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

function verify_user_disponibility($start, $start_hour, $end, $end_hour, $user_id, $c){
    $start_time = date_timestamp_get(date_create(''.$start.' '.$start_hour.''));
    $end_time = date_timestamp_get(date_create(''.$end.' '.$end_hour.''));
    $event_list = get_event_by_user_id($user_id, $c);
    foreach ($event_list as $event){

        $event_start =  date_timestamp_get(date_create(''.$event['start'].' '.$event['start_hour'].''));
        $event_end =  date_timestamp_get(date_create(''.$event['end'].' '.$event['end_hour'].''));
        if($event_start > $start_time && $event_start < $end_time ||  $event_end < $end_time && $event_end > $end_time || $event_start <= $start_time && $event_end >= $end_time){
            return false;
        }
    }
    return true;
}

function verify_user_list_disponibility($start, $start_hour, $end, $end_hour, $user_list, $c){
    $start_timestanp = date_timestamp_get(date_create(''.$start.' '.$start_hour.''));
    $end_timestamp = date_timestamp_get(date_create(''.$end.' '.$end_hour.''));

    foreach ($user_list as $user) {
        $event_list = get_event_by_user_id($user, $c);
        foreach ($event_list as $event) {
            $event_start = date_timestamp_get(date_create('' . $event['start'] . ' ' . $event['start_hour'] . ''));
            $event_end = date_timestamp_get(date_create('' . $event['end'] . ' ' . $event['end_hour'] . ''));
            if ($event_start > $start_timestanp && $event_start < $end_timestamp || $event_end < $end_timestamp && $event_end > $end_timestamp || $event_start <= $start_timestanp && $event_end >= $end_timestamp) {
                return false;
            }
        }
    }
    return true;
}
function search_five_next_free_slot($user_list, $time_date, $time_hour, $step, $start, $limit_hour, $limit_slot, $c){
    $free_slot = 0;
    $loop = 0;
    $day = 0;
    $end = $time_hour + $step;
    var_dump(date_timestamp_get(date_create('' . $time_date . ' ' . $time_hour . '')))+(86400 * $day);
    while ($free_slot < $limit_slot){

        if(verify_user_list_disponibility(date_timestamp_get(date_create('' . $time_date . ' ' . $time_hour . '')))+(86400 * $day)){

        }else{

        }


        //incrémentation du créneau
        if(($end + $step) > $limit_hour){
            $time_hour = $start;
            $end = $start + $step;
            $day++;
        } else{
            $time_hour = $time_hour + $step;
            $end = $end + $step;
        }
    }
}
