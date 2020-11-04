
<?php $pageTitle = 'Searcher Blog'; ?>
<?php include('phpcode/home_code.php');?>
<?php if (empty($_SESSION['userInfo']['0']['name'])) { ?>
	<?php if (getBrowser() == 'Firefox') { ?>
	<?php include('templates/header.php'); } else { include('templates/chrome_header.php'); } ?>
	

	<?php $blogs = getBlogs(); ?>
		<div class="row">
			<?php foreach ($blogs as $blog) { $content = explodeContent($blog['content']);?>
			<div class="column">
			    <div class="card" style="background-image: url('img/card_background.png');">
			    	<img style="height: 300px;" value= "<?php echo $GLOBALS["img"]; ?>
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
	<?php $blogs = getUserBlogs($_SESSION['userInfo']['0']['userid']); ?>
	<?php if (getBrowser() == 'Firefox') { ?>
	<?php include('templates/profile_header.php'); } else { include('templates/chrome_profile_header.php'); } ?>
		<div class="row">
			<?php foreach ($blogs as $blog) { $content = explodeContent($blog['content']);?>
			<div class="column">
			    <div class="card" style="background-image: url('img/card_background.png'); background-size: 100%;">
			    	<img style="height: 300px;" value="<?php echo $GLOBALS['img']; ?> 
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
<?php } ?>

<?php include('templates/footer.php'); ?>

