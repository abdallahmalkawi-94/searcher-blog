<?php 

// Start Session
session_start();
include('configuration/config.php'); 


if (isset($_GET['searchbtn']))
{
	$search = $_GET['search'];
	$search = str_replace(' ', '&', $search);
	$location = 'Location: search.php?find=' . $search;
	header($location);
}

$writersList = getWriters();