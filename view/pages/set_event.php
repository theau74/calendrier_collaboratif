<?php
echo'<form  action="index.php" method="post">
       <button type="submit" class="" id="saveEvent"  name="action" value="delete-event">
                    supprimer
                </button>
        <input type="hidden" value="'.$one_event[0].'" name="id_event">
        </form>';
echo'<form  action="index.php" method="post">
        <button type="submit" class="" id="saveEvent"  name="action" value="set-event">
                    modifier
                </button>
         <input type="hidden" value="'.$one_event[0].'" name="id_event">
         <input type="text" value="'.$one_event[1].'" name="nom"> 
         <input type="date" value="'.$one_event[2].'" name="start"> 
         <input type="time" value="'.$one_event[3].'" name="start_hour">
         <input type="date" value="'.$one_event[4].'" name="end"> 
         <input type="time" value="'.$one_event[5].'" name="end_hour">';