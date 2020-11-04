<?php  
include('phpcode/home_code.php');
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

<?php $pageTitle = 'Searcher Blog'; ?>
<?php if (empty($_SESSION['userInfo']['0']['name'])) { ?>
    <?php include('templates/header.php'); ?>
    <?php $blogs = getCustomBlog ($blogid); ?>
	<?php foreach ($blogs as $blog) { ?>
	
		<div style="background-color: white; margin:auto; width: 80%; padding: 50px;">
            <div class="card-body">
                <h2 class="card-title">
                    <a><?php echo $blog['title']; ?></a>
                </h2>
                <h6 style="font-size: 16px;" class="date-author"><?php echo $blog['createAt']; ?> <span class="author"><?php echo 'By ' . $blog['name']; ?></span><hr><br>
                </h6>
                <h6 style="font-size: 20px; font-weight: lighter;"><?php echo $blog['content']; ?></h6>
            </div>
        </div>

<?php } } else { ?>
    <?php $blogs = $blogs = getCustomBlog ($blogid); ?>
    <?php include('templates/profile_header.php'); ?>
        <?php foreach ($blogs as $blog) { ?>
            <div style="background-color: white; margin:auto; width: 80%; padding: 50px;">
                <div class="card-body">
                    <h2 class="card-title">
                         <a><?php echo $blog['title']; ?></a>
                    </h2>
                    <h6 style="font-size: 16px;" class="date-author"><?php echo $blog['createAt']; ?> <span class="author"><?php echo 'By ' . $blog['name']; ?></span><hr><br>
                    </h6>
                    <h6 style="font-size: 20px; font-weight: lighter;"><?php echo $blog['content']; ?></h6>
                </div>
                <div style="text-align: center; border:solid; border-radius: 10px; width: 40%; margin: auto; padding: 10px;">
                    <a style="margin: 50px; font-size: 35px; 10px;" href="delete_blog.php?id=<?php echo $blogid;?>">DELETE BLOG</a>
                    <a style="margin: 50px; font-size: 35px; 10px;" href="add.php?id=<?php echo $blogid;?>">EDIT BLOG</a>
                </div>
            </div>
        <?php } } ?>

<?php include('templates/footer.php'); ?>