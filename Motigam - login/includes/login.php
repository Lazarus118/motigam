<?php 
include '../core/init.php';

if (empty($_POST) === false) {
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];
	
	if(empty($username) === true || empty($password) === true) {
	$errors[] = 'You need to enter a Username or password';
	} else if(user_exists($username) === false) {
		$errors[] = 'We can\'t find that username. Have you registered?';
	} else if (user_active($username) === false) {
		$errors[] = 'You have\'t activated your account!';
	} else {
		$login = login($username,$password);
		if ($login === false) {
		$errors[] = 'That username/password combination is incorrect';
		} else {
		$_SESSION['user_id'] = $login;
		header('Location: C:\Users\lazarus\Desktop\Motigam Mobile App\Motigam Mobile\index.html');
		exit();
		}
	}
	print_r($errors);
}

?>