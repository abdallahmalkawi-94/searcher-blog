<?php 
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
else  
    $url = "http://";   

// Append the host(domain name, ip) to the URL.   
$url.= $_SERVER['HTTP_HOST'];   
    
// Append the requested resource location to the URL   
$url.= $_SERVER['REQUEST_URI'];    
     
$search = strstr($url, '?find=' , false);
$search = str_replace(['?find=' , '&'], ['' , ' '] , $search);
?>

<?php $pageTitle = 'Search Blog'; ?>
<?php include('phpcode/home_code.php');?>
<?php if (empty($_SESSION['userInfo']['0']['name'])) { ?>
	<?php include('templates/header.php'); ?>
	<?php $blogs = searchResults ($search); ?>
	<div class="row">
		<?php foreach ($blogs as $blog) { $content = explodeContent($blog['content']);?>
		<div class="column">
			<div class="card">
			    <img  value="<?php echo $GLOBALS['img']; ?>
				<a style="padding: 10px; font-size: 25px;" href="blog_content.php?id=<?php echo $blog['blogID']; ?>"><?php echo $blog['title']; ?></a>
				<p class="date-author">
				<?php echo $blog['createAt']; ?> <span class="author"><?php echo 'By ' . $blog['name']; ?></span>
				</p>
			    <h6 class="card-text" style="padding: 10px; font-size: 20px;"><?php
			    echo $content['0']; 
			    ?>
			    </h6>
			</div>
		</div>
		<?php } ?>
	</div>
		
<?php } else { ?>
	<?php include('templates/profile_header.php'); ?>
	<?php $blogs = searchResults ($search); ?>
	<div class="row">
		<?php foreach ($blogs as $blog) { $content = explodeContent($blog['content']);?>
		<div class="column">
			<div class="card">
			    <img value="<?php echo $GLOBALS['img']; ?>
				<a style="padding: 10px; font-size: 25px;" href="blog_content.php?id=<?php echo $blog['blogID']; ?>"><?php echo $blog['title']; ?></a>
				<p class="date-author">
				<?php echo $blog['createAt']; ?> <span class="author"><?php echo 'By ' . $blog['name']; ?></span>
				</p>
			    <h6 class="card-text" style="padding: 10px; font-size: 20px;"><?php echo $content['0']; ?>
			    </h6>
			</div>
		</div>
		<?php } ?>
	</div>
<?php } ?>

<?php include('templates/footer.php'); ?>

