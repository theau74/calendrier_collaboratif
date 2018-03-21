<?php
foreach ($event_list as $events) {
    echo"<h1>liste des events</h1>";
    echo"<ul>";
    if (!empty($events['id_event'])) {
        echo '<li>id : '. $events['id_event'].'</li>';
    }
    if (!empty($events['nom'])) {
        echo '<li>title : '.$events['nom'].'</li>';
    }
    if (!empty($events['description'])) {
        echo '<li>description : ' . $events['description'].'</li>';
    }
    if (!empty($events['type'])) {
        echo '<li>type : ' . $events['type'].'</li>';
    }
    if (!empty($events['start'])) {
        echo '<li>debut : ' . $events['start'].'</li>';
    }
    if (!empty($events['start_hour'])) {
        echo '<li>heure du debut : ' . $events['start_hour'].'</li>';
    }
    if (!empty($events['end'])) {
        echo '<li>fin : ' . $events['end'].'</li>';
    }
    if (!empty($events['end_hour'])) {
        echo '<li>heure de  fin : ' . $events['end_hour'].'</li>';
    }
    echo"</ul>";
    echo'<form  action="index.php?ac=delete-event" method="post">
        <input type="submit" value="supprimer" name="delete">
        <input type="hidden" value="'.$events['id_event'].'" name="id_event">
        </form>';
    echo'<form  action="index.php?ac=update-event" method="post">
         <input type="submit" value="modifier" name="modify">
         <input type="text" value="'.$events['nom'].'" name="nom"> 
         <input type="date" value="'.$events['start'].'" name="start"> 
         <input type="time" value="'.$events['start_hour'].'" name="start_hour">
         <input type="date" value="'.$events['end'].'" name="end"> 
         <input type="time" value="'.$events['end_hour'].'" name="end_hour">
         <input type="hidden" value="'.$events['id_event'].'" name="id_event">
         </form>';
}