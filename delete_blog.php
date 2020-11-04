<?php 
include('configuration/config.php'); 
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

?>

<?php deleteBlog ($blogid) ?>
