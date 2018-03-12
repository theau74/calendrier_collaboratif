<?php

try
{
		$c = mysqli_connect("localhost", "root", "", "agenda");
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage(failed));
}
?>