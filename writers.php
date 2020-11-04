<?php $pageTitle = 'Searcher Blog'; ?>
<?php include('phpcode/writers_code.php');?>
<?php if (empty($_SESSION['userInfo']['0']['name'])) { ?>
	<?php include('templates/header.php'); ?>
		
		<div class="row" >
			<?php foreach ($writersList as $writer) { ?>
			<div class="column">
			    <div class="card" style="width: fit-content; height: fit-content; background-image: url('img/writer.jpg');">
			    	<img style="height: 300px;" src="img/writers_card.jpg">
				    <h2 style="margin-top: 100px; font-size: 35px; color: red;"><?php echo $writer['name']; ?></h2>
				    <h6 class="date-author" style="font-size: 25px; margin-top: 20px;"><?php echo $writer['email']; ?></h6>
				    <h6 style="font-size: 25px; margin-top: 20px;"><?php echo $writer['phone']; ?></h6>
			    </div>
			</div>
			<?php } ?>
		</div>

<?php } else { ?>
	<?php include('templates/profile_header.php'); ?>
		<div class="row" >
			<?php foreach ($writersList as $writer) { ?>
			<div class="column">
			    <div class="card" style="width: fit-content; height: fit-content; background-image: url('img/writer.jpg');">
			    	<img style="height: 300px;" src="img/writers_card.jpg">
				    <h2 style="margin-top: 100px; font-size: 35px; color: red;"><?php echo $writer['name']; ?></h2>
				    <h6 class="date-author" style="font-size: 25px; margin-top: 20px;"><?php echo $writer['email']; ?></h6>
				    <h6 style="font-size: 25px; margin-top: 20px;"><?php echo $writer['phone']; ?></h6>
			    </div>
			</div>
			<?php } ?>
		</div>

<?php } ?>

<?php include('templates/footer.php'); ?>

