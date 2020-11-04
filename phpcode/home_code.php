<?php 
// Start Session
session_start();

//echo $_SESSION['userInfo']['0']['name'];
include('configuration/config.php'); 
$GLOBALS['img'] = '';

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
else  
    $url = "http://";   

// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   
    
// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    
     
$id = strstr($url, '?id=' , false);
$id = str_replace('?id=', '' , $id);

if ($id == 'logout') {
	// Unset all of the session variables.
	$_SESSION = array();

	// Finally, destroy the session.
	session_destroy();
} elseif ($id == 'dele') {
	echo '<div class="alert alert-success" role="alert" style="margin:10px;">';
	echo 'Deleted';
	echo '</div>';
}


if (isset($_GET['searchbtn']))
{
	$search = $_GET['search'];
	$search = str_replace(' ', '&', $search);
	$location = 'Location: search.php?find=' . $search;
	header($location);
}

/* -------------------- Functions -------------------- */
// function to explode content
function explodeContent($content) {
	$explode = explode('</p>', $content);
	if (stripos($explode['0'], 'jpg') || stripos($explode['0'], 'png')) {
		$GLOBALS['img'] = array_shift($explode);
	} else {
		$GLOBALS['img'] = '<p><img style="display: block; margin-left: auto; margin-right: auto;" src="img/logo.jpg" /></p>';
	}

	if (stripos($explode['0'] , '&nbsp;')) {
		$explode['0'] .= $explode['1']; 
	}
	return $explode;
} 



function getBrowser() {
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$browser = "N/A";

$browsers = array(
'/msie/i' => 'Internet explorer',
'/firefox/i' => 'Firefox',
'/safari/i' => 'Safari',
'/chrome/i' => 'Chrome',
'/edge/i' => 'Edge',
'/opera/i' => 'Opera',
'/mobile/i' => 'Mobile browser'
);

foreach ($browsers as $regex => $value) {
if (preg_match($regex, $user_agent)) { $browser = $value; }
}

return $browser;
}
