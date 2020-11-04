<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/content_style.css">


<!-- Script and Css For Contnet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/styles/default.min.css">
<script type="text/javascript" src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/highlight.min.js"></script>
<script type="text/javascript" src="js/blog_content.js"></script>
<!-- End Content -->

<title><?php echo $pageTitle; ?></title>
  <header class="bg-dark" style="text-align: center; margin: 10px;">
    <div>
      <nav class="menu-middle">
        <ul>
          <li style="font-size:25px;"><a href="home.php">Home</a></li>
          <li style="font-size:25px;"><a href="writers.php">Writers</a></li>
          <li style="font-size:25px;"><a href="home.php?id=logout">Logout</a></li>
          <li style="font-size:25px;"><a href="add.php">Add Blog</a></li>
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
<body style="background-color:#e7e7e7 ;">