<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/chrome_style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">

<!-- Compiled and minified CSS 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
-->
<link rel="stylesheet" type="text/css" href="css/content_style.css">

<title><?php echo $pageTitle; ?></title>
  <header class="bg-dark" style="text-align: center; margin: 10px;">
    <div >
      <nav class="menu-middle">
        <ul>
          <li style="font-size:25px;"><a href="home.php">Home</a></li>
          <li style="font-size:25px;"><a href="writers.php">Writers</a></li>
          <li style="font-size:25px;"><a href="login.php">Login</a></li>
          <li style="font-size:25px;"><a href="signup.php">Sign Up</a></li>
          <li>
            <form method="GET">
               <input style="font-size:20px; padding:10px; border-radius:10px;" type="text" name="search" placeholder="search">
               <input class="searchBtn" type="submit" name="searchbtn" value="Search">
            </form>
          </li>
        </ul>
      </nav>
    </div>
  </header>
</head>
<body style="background-color:#e7e7e7;">