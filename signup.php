<?php $pageTitle = 'New Blogger'; ?>
<?php include('templates/header.php'); ?>
<?php include('phpcode/signup_code.php');?>
 

 <div class="form" style="background-image: url('img/card_background.png'); background-size: 100%;">
 	
 	<form method="POST">
 		<h1 style="text-align: center; margin: 50px; font-size: 50px;">Create New Account</h1>
 		<input class="text" type="text" name="name" placeholder="Blogger Name" value="<?php echo $name; ?>" required><br>
 		<input class="text" type="email" name="email" placeholder="Blogger Email" value="<?php echo $email; ?>" required><br>
 		<div style="color: red; font-size: 18px; font-weight: bold;"><?php echo $errors['email']; ?></div>
 		<input class="text" type="tel" name="phone" placeholder="Blogger Phone" value="<?php echo $phone; ?>" required><br>
 		<input class="text" type="password" name="password" placeholder="Password" required><br>
 		<div style="color: red; font-size: 18px; font-weight: bold;"><?php echo $errors['password']; ?></div>
 		<input class="text" type="password" name="confirmpassword" placeholder="Confirm Password" required><br>
		<div style="color: red; font-size: 18px; font-weight: bold;"><?php echo $errors['confirmPassword']; ?></div>
 		<input class="signupbtn" type="submit" name="signup" value="Sign Up">
 	</form>
 </div>

</body>
</html>