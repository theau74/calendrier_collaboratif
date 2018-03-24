<?php
var_dump($one_group);
echo'<form  action="index.php" method="post">
       <button type="submit" class="" id="saveGroup"  name="action" value="delete-group">
                    Supprimer
                </button>
        <input type="hidden" value="'.$one_group[0].'" name="id_groups">
        </form>';
echo'<form  action="index.php" method="post">
        <button type="submit" class="" id="saveEvent"  name="action" value="set-group">
                    Enregistrer
                </button>
         <input type="text" value="'.$one_group[1].'" name="nom"> 
         <input type="text" value="'.$one_group[2].'" name="description"> 
         <input type="hidden" value="'.$one_group[0].'" name="id_groups">
         </form>';

