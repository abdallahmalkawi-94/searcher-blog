<?php 
// Start Session 
session_start();
include('configuration/config.php'); 

$userId = $_SESSION['userInfo']['0']['userid'];
$title = '';
$content = '';
$contentError = '';

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
else  
    $url = "http://";   

// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   
    
// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    
     
$blogid = strstr($url, '?id=' , false);
$blogid = str_replace('?id=', '' , $blogid);
if ($blogid != 0) {
	$blogs = getCustomBlog ($blogid);
	
	$title = $blogs['0']['title'];
	$content = $blogs['0']['content'];
} elseif ($blogid == 'edit') {
	echo '<div class="alert alert-success" role="alert" style="margin:10px;">';
	echo 'Successful Edited';
	echo '</div>';
}

if (isset($_POST['publish'])) {
	if (empty($_POST['content'])) {
		$contentError = 'Please Don\'t Keep This Field Empty';
	} else {
		$title = $_POST['title'];
		$content = $_POST['content'];
		insertNewBlog ($userId , $title , $content);
		$title = '';
		$content = '';
	}
} elseif (isset($_POST['edit'])) {
		updateBlog ($blogid , $_POST['title'] , $_POST['content']);
		$title = '';
		$content = '';
}


if (isset($_GET['searchbtn']))
{
	$search = $_GET['search'];
	$search = str_replace(' ', '&', $search);
	$location = 'Location: search.php?find=' . $search;
	header($location);
}