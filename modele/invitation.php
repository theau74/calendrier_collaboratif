<?php
//creation d'évenemenent dans la base
function create_invitation($user_list, $groups_choice, $creator, $c)
{
    $loop = 0;
    $id_event = get_last_event_by_user_id($_SESSION['id'], $c);
    //insertion des valeurs dans la bdd
    $sql = ("INSERT INTO invitation (`id_event`, `id_user`, `id_group`, `etat`, `creator`) VALUES");
    $sql2 = null;
    //invitation des utilisateurs sans groupe
    if (!empty($user_list)) {
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
    if (!empty($groups_choice)) {

        foreach ($groups_choice as $group) {

            $users_list_by_group = get_users_id_by_group_id($group, $c);
            if (isset($users_list_by_group)) {
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
    if (isset($sql2)) {
        $sql .= $sql2;
        if (mysqli_query($c, $sql)) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function get_invitation_by_id_user($id_user, $c)
{
    $sql = ("SELECT I.id_event, I.id_user, I.id_group, I.etat, E.nom as event_name, E.start, E.end, G.nom as group_name, G.description FROM invitation I 
INNER JOIN events E ON E.id = I.id_event 
INNER JOIN groups G ON G.id = I.id_group
WHERE I.id_user ='$id_user' GROUP BY id_event");
    $result = mysqli_query($c, $sql);
    $invitation_list = array();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result)) {
        $invitation_list[$loop] = $donnees;
        $loop++;
    }
    return $invitation_list;

}

function get_group_invitation($id_user, $c)
{
    $sql = ("SELECT * FROM groups G INNER JOIN users_groups U ON G.id = U.id_groups WHERE U.id_users ='$id_user'");
    $result = mysqli_query($c, $sql);
    $invitation_group_list = array();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result)) {
        $invitation_group_list[$loop] = $donnees;
        $loop++;
    }
    return $invitation_group_list;
}

function set_invitation($id_user, $id_event, $response, $c)
{
    if ($response == "true") {
        $sql = ("UPDATE invitation SET etat ='valider' WHERE id_user ='$id_user' AND id_event='$id_event'");

    } elseif ($response == "false") {
        $sql = ("UPDATE invitation SET etat ='refuser' WHERE id_user ='$id_user' AND id_event='$id_event'");
    }
    if (mysqli_query($c, $sql)) {
        return true;
    } else {
        return false;
    }
}

function set_group_invitation($id_user, $id_group, $response, $c)
{
    if ($response == "true") {
        $sql = ("UPDATE users_groups SET etat ='valider' WHERE id_users ='$id_user' AND id_groups ='$id_group'");
    } elseif ($response == "false") {
        $sql = ("UPDATE users_groups SET etat ='refuser' WHERE id_users ='$id_user' AND id_groups ='$id_group'");
    }
    if (mysqli_query($c, $sql)) {
        return true;
    } else {
        return false;
    }
}

function get_pending_invitation_by_id_user($id_user, $c)
{
    $sql = ("SELECT I.id_event, I.id_user, I.id_group, I.etat, E.nom as event_name, E.start, E.start_hour, E.end, E.end_hour, E.description as description FROM invitation I 
INNER JOIN events E ON E.id = I.id_event 
    WHERE I.id_user ='$id_user' AND I.etat = 'envoie' GROUP BY I.id_event ");
    $result = mysqli_query($c, $sql);
    $pending_invitation_list = array();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result)) {
        $pending_invitation_list[$loop] = $donnees;
        $loop++;
    }

    return $pending_invitation_list;
}

function verify_user_disponibility($start, $start_hour, $end, $end_hour, $user_id, $c)
{
    $start_time = date_timestamp_get(date_create('' . $start . ' ' . $start_hour . ''));
    $end_time = date_timestamp_get(date_create('' . $end . ' ' . $end_hour . ''));
    $event_list = get_event_by_user_id($user_id, $c);
    foreach ($event_list as $event) {

        $event_start = date_timestamp_get(date_create('' . $event['start'] . ' ' . $event['start_hour'] . ''));
        $event_end = date_timestamp_get(date_create('' . $event['end'] . ' ' . $event['end_hour'] . ''));
        if ($event_start > $start_time && $event_start < $end_time || $event_end < $end_time && $event_end > $end_time || $event_start <= $start_time && $event_end >= $end_time) {
            return false;
        }
    }
    return true;
}

function verify_user_list_disponibility($start, $start_hour, $end, $end_hour, $user_list, $c)
{
    $start_timestanp = date_timestamp_get(date_create('' . $start . ' ' . $start_hour . ''));
    $end_timestamp = date_timestamp_get(date_create('' . $end . ' ' . $end_hour . ''));
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

function int_to_string_time($int)
{
    if ($int < 9) {
        return "0" . $int . ":00";
    } else {
        return "" . $int . ":00";
    }
}

function search_next_free_slot($start, $start_hour, $end, $end_hour, $user_list, $limit_start, $limit_end, $nb_slot, $max_turn, $c)
{
    $free_slot = 0;
    $start_date = date_create($start);
    $end_date = date_create($end);
    $step = $end_hour - $start_hour;
    $loop = 0;
    $free_slot_list = array();
    while ($free_slot < $nb_slot && $loop < $max_turn) {
        $loop++;
        if (verify_user_list_disponibility(date_format($start_date, 'Y-m-d'), $start_hour, date_format($end_date, 'Y-m-d'), $end_hour, $user_list, $c)) {
            $free_slot_list[$free_slot] = array($free_slot, date_format($start_date, 'Y-m-d'), $start_hour, date_format($end_date, 'Y-m-d'),  $end_hour);
            $free_slot++;
        }
        //incrémentation du créneau
        if (($start_hour + $step) < $limit_end) {
            $start_hour = int_to_string_time($start_hour + $step);
            $end_hour = int_to_string_time($end_hour + $step);
        } else {
            $start_date->add(new DateInterval('P1D'));
            $end_date->add(new DateInterval('P1D'));
            $start_hour = int_to_string_time($limit_start);
            $end_hour = int_to_string_time($limit_start + $step);
        }
        $loop++;
    }
    return $free_slot_list;
}
