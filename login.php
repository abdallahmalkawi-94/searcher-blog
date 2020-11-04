<?php $pageTitle = 'Login Blogger'; ?>
<?php include('templates/header.php'); ?>
<?php include('phpcode/login_code.php');?>
 

 <div class="form" style="background-image: url('img/card_background.png'); background-size: 100%;">
 	<img style="height: 400px; width: 400px; margin: 20px;" src="https://cdn.iconscout.com/icon/free/png-512/laptop-user-1-1179329.png">
 	<form method="POST">
 		<input class="text" type="email" name="email" placeholder="Blogger Email" value="<?php echo $email; ?>" required><br>
 		<div style="color: red; font-size: 18px; font-weight: bold;"><?php echo $errors['email']; ?></div>
 		
 		<input class="text" type="password" name="password" placeholder="Password" required><br>
 		
 		
 		<input class="signupbtn" type="submit" name="login" value="Login">
 	</form>

 	<div style="text-align: left; margin-left: 50px; height: 80px;">
	    <a style="font-size: 16px; font-weight: bold;" href="#">Forget Password</a><br>
	    <a style="font-size: 16px; font-weight: bold;" href="signup.php">New Blogger</a>
	</div>
 </div>

</body>
</html>