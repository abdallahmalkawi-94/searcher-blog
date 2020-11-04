<?php 
include('configuration/config.php');
$email = '';
$errors = ['email' => '' , 'password' => ''];

// Start Login 

if (isset($_POST['login'])) {
	$email = $_POST['email'];

	// Check if email valid or not
	if (!filter_var($email , FILTER_VALIDATE_EMAIL))
	{
		$errors['email'] = 'Please Enter Valid Email';
	}

	if (!array_filter($errors)) 
	{
		$user = loginInfo ($email , $_POST['password']);
		if (count($user) > 0) {
			// Start Session 
			session_start();
			$_SESSION['userInfo'] = $user;
			$userId = $_SESSION['userInfo']['0']['userid'];
			$errors['email'] = '';
			$email = '';

			// Goto profile page
			header("Location: home.php?id=$userId");
		}
		
	}
}


if (isset($_GET['searchbtn']))
{
	$search = $_GET['search'];
	$search = str_replace(' ', '&', $search);
	$location = 'Location: search.php?find=' . $search;
	header($location);
}