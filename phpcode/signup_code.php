<?php 
include('configuration/config.php'); 
$name = '';
$email = '';
$phone = '';
$password = '';
$errors = ['email' => '' , 'password' => '' , 'confirmPassword' => ''];

// Start Sign Up 

if (isset($_POST['signup'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	// Check if email valid or not
	if (!filter_var($email , FILTER_VALIDATE_EMAIL))
	{
		$errors['email'] = 'Please Enter Valid Email';
	} 

	// Check Passeord String
	if (strlen($password) < 8)
	{
		$errors['password'] = 'Entered Password Not Strong, Password Should Be More Than 8 digit';
	} 

	// Check Password Matching
	if (strcmp($password, $_POST['confirmpassword']))
	{
		$errors['confirmPassword'] = 'Entered Passwords Not Matching';
	}

	if (!array_filter($errors)) 
	{
		insertNewBlogger ($name , $email , $phone , $password);
		$name = '';
		$email = '';
		$phone = '';
		$password = '';
		$errors = ['email' => '' , 'password' => '' , 'confirmPassword' => ''];
	}

}


if (isset($_GET['searchbtn']))
{
	$search = $_GET['search'];
	$search = str_replace(' ', '&', $search);
	$location = 'Location: search.php?find=' . $search;
	header($location);
}