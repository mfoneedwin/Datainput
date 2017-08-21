<?php

//include 'databaseConnect/init.php';


if (!empty($_POST['login-submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(empty($username) || empty($password)){
		$errors[]='You need to enter your username and your password';
	} elseif (user_exists($username)==false) {
		$errors[]='Sorry, this username does not exists in our database, please check again or register if you are not a member yet.';
	}else{
		$login = login($username, $password);
		if(!$login){
			$errors[]='This username/password combination is incorrect';
		}else{
			setcookie('user_id',$login);
			header('Location: index.php');
			exit();
		}
	}
}

if (!empty($_POST['register-submit'])){
	$required_fields = array('username','address','city','phone','email','password','confirm-password');
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $required_fields) === true){
			$errorsAll = '* All the fields are required';
			break 1;
		}
	}
	if(empty($errors)){
		if(user_exists($_POST['username'])){
			$errorsName='Sorry, the username \''.htmlentities($_POST['username']).'\' is already taken';
		}
		if(preg_match("/\\s/", $_POST['username'])){
			$errorsName2='Your username must not contain any spaces';
		}
		if(email_exists($_POST['email'])){
			$errorsMail='Sorry, the email \''.$_POST['email'].'\' is already used. Please login.';
		}
		if(strlen($_POST['password']) < 6){
			$errorsPass1='Your password must be at least 6 characters';
		}



	}
}






if (!empty($_POST['change-submit'])){
	$required_fields = array('old_pass','new_pass','conf_new_pass');
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $required_fields) === true){
			$errorsAllCh = '* All the fields are required';
			break 1;
		}
	}
	if(empty($errors)){
		if($_POST['old_pass'] == $user_data['password']){
			if($_POST['new_pass'] != $_POST['conf_new_pass']){
				$errorDupl = 'Your new password does not match';

			} elseif (strlen($_POST['new_pass']) < 6) {
				$errorNewPassLength = 'Your password must be at least 6 characters';
			}

		}else{
			$erroOldPass = 'Your current password does not match';
		}
	}
}

if (!empty($_POST['update-submit'])){
	$required_fields = array('username','address', 'conf_pass','city','phone','email' );
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $required_fields) === true){
			$errorsAllUp = '* All the fields are required';
			break 1;
		}
	}
	if(empty($errors)){
		if(email_exists($_POST['email']) && $user_data['email'] != $_POST['email']){
			$errorsMail='Sorry, the email \''.$_POST['email'].'\' is already used.';
		}
		if(user_exists($_POST['username']) && $user_data['name'] != $_POST['username']){
			$errorsName='Sorry, the username \''.htmlentities($_POST['username']).'\' is already taken';
		}
		if($user_data['password'] != $_POST['conf_pass']){
			$errorPass = 'Please confirm your password.';
		}
	}
}





?>
