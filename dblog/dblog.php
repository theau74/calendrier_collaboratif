<?php

try {
    //$c = mysqli_connect("127.0.0.1", "l2_gr3", "aBSf6RAY", "l2_gr3");
    $c = mysqli_connect("localhost", "root", "", "agenda");
}

catch (Exception $e) {
        die('Erreur : ' . $e->getMessage(failed));
}
?>