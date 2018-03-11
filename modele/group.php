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


