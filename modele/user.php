<?php
//script de connection pour les streamer
//prend un pseudo et un mot de pass
//renvoie les parametre dans la session
//return true si elle réussi et false sinon
function user_signin($pseudo, $password, $c, $encryption_key) {
//récupération des compte streamer
	//cryptage du password
	$password = crypt($password,$encryption_key);
	$sql = ("SELECT * FROM users WHERE mail='$pseudo' AND password='$password'");
	$result = mysqli_query($c,$sql);

	//test des résultat
	if($row = mysqli_fetch_row($result)){
		if (isset($row[0])) {
			//attribution d'une session
			$_SESSION['stats'] = "login-done";
			$_SESSION['id'] = $row[0];
			$_SESSION['mail'] = $row[3];
			return true;
		}
		else {
			//attribution d'une session vide
			unset ($_SESSION['stats']);

			return false;
		}
	}
$result->close();
}

//script d'inscription pour les user 
//ajoute dans la bdd les valeurs
//renvoi true si la connection a fonctionné sinon false
function user_signup($fname, $lname, $email,$password, $c, $encryption_key) {
	//cryptage du password
	$password = crypt($password,$encryption_key);
	//insertion des valeurs dans la bdd
	$sql = ("INSERT INTO users(fname, lname, mail, password) VALUES('$fname', '$lname', '$email', '$password')");
	if(mysqli_query($c,$sql)){
		return true;
	}
	else{
		return false;
	}
}


function get_info_user_by_id($id, $c){
    $sql = ("SELECT * FROM users WHERE id ='$id'");
    $result = mysqli_query($c,$sql);
    $user_info= array ();
    if($row = mysqli_fetch_row($result)){
        $user_info= $row;
    }
    return $user_info;
}

function get_users_list($c){
    $sql = ("SELECT id, Fname, Lname FROM users");
    $result = mysqli_query($c,$sql);
    $users_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $users_list[$loop]= $donnees;
        $loop++;
    }
    return $users_list;
}
function get_users_list_not_in_group_by_id($id,$c){
    $sql = ("SELECT * FROM users WHERE id NOT IN 
    ( SELECT id_users FROM users_groups 
     WHERE id_groups='$id')");
    $result = mysqli_query($c,$sql);
    $users_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $users_list[$loop]= $donnees;
        $loop++;
    }
    return $users_list;
}
function get_users_list_in_group_by_id($id,$c){
    $sql = ("SELECT * FROM users E INNER JOIN users_groups U ON E.id = U.id_users WHERE E.id IN
            ( SELECT id_users FROM users_groups WHERE id_groups=16)
            AND U.id_groups = 16 ");
    $result = mysqli_query($c,$sql);
    $users_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $users_list[$loop]= $donnees;
        $loop++;
    }
    return $users_list;
}
function get_level_of_user_by_id($id,$c){

}

function get_users_id_by_group_id($id_groups, $c){
    $sql = ("SELECT id_users FROM users_groups WHERE id_groups='$id_groups'");
    $result = mysqli_query($c,$sql);
    $users_list= array ();
    $loop = 0;
    while ($donnees = mysqli_fetch_assoc($result))
    {
        $users_list[$loop]= $donnees;
        $loop++;
    }
    return $users_list;
}




function user_logout() {
	$_SESSION = array();
	unset ($_SESSION['stats']);
}