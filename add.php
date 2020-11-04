
<?php include('phpcode/add_code.php');?>
<?php if(!empty($_SESSION['userInfo']['0']['name'])) { ?>

<?php $pageTitle = 'Add Blog'; ?>
<?php include('templates/profile_header.php'); ?>
	 <form style="background-color:#1e4867; opacity: 0.9; margin: 50px; border: 5px solid; border-radius: 10px; padding: 20px;" method="POST">
    	<input style="width:50%;height:50px;padding:10px;font-size:20px;margin-bottom:20px;" type="text" name="title" placeholder="Blog Title" required value="<?php echo $title; ?>">
    	<textarea name="content" id="tempalte"><?php echo $content; ?></textarea>
    	<div style="color: red; font-size: 18px; font-weight: bold;"><?php echo $contentError; ?></div>
    	<?php if ($blogid == 0) { ?>
    		<div style="text-align: center;">
    			<input class="button" type="submit" name="publish" value="Publish">
    		</div>
    	<?php } else { ?>
    		<div style="text-align: center;">
    			<input class="button" type="submit" name="edit" value="Save">
    		</div>
    	<?php } ?>
    </form>
	
<?php include('templates/footer.php'); ?>

<!-- If Session empty -->

<?php } else {  ?>

	<?php $pageTitle = '404 Error'; ?>
	<?php include('templates/header.php'); ?>
		<div class="form" style="width: 50%;">
			<h1 style="padding: 50px; font-size: 50px; font-family: serif;">404</h1>
			<h1 style="padding: 30px; font-size: 50px; font-family: serif;">Oops! Something is wrong.</h1>
		</div>
	<?php include('templates/footer.php'); ?>

<?php } ?>