<?php 
/*
function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}
*/

function user_exists($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`id`) FROM `user` WHERE `user_name` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_active($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`id`) FROM `user` WHERE `user_name` = '$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_username($username) {
	$username = sanitize($username);
	return mysql_result(mysql_query("SELECT `id` FROM `user` WHERE user_name = '$username'"), 0, 'id');
}

function login($username, $password) {
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `user_name` = '$username' AND `pass_word` = '$password'"), 0) == 1) ? $user_id : false;
}

?>