<?php 

// Inforamtion Of DataBase
const HOSTNAME = '';
const USERNAME = '';
const PASSWORD = '';
const DATABASE = '';

// Start Connsetion With DataBase 
$GLOBALS['connection'] = @(mysqli_connect(HOSTNAME , USERNAME , PASSWORD , DATABASE));

// Check Connection 
if ($GLOBALS['connection']) {
	/* echo '<div class="alert alert-success" role="alert" style="margin:10px;">';
	echo 'Successful Connection';
	echo '</div>'; */
} else {
	echo '<div class="alert alert-danger" role="alert" style="margin:10px;">';
	echo 'Connection Failed';
	echo '</div>';
}

/*
// Set UNIQUE Constraint for Email
$setUnique = "ALTER TABLE bloggers ADD UNIQUE (email)";
if (mysqli_query($GLOBALS['connection'] , $setUnique)) {
	// Successful Set Constraint;
} else {
	echo '<div class="alert alert-danger" role="alert" style="margin:10px;">';
	echo 'Failed Sign Up';
	echo '</div>';
}

*/
/* -------------------- Functions -------------------- */

// Insert New Blogger
function insertNewBlogger ($name , $email , $phone , $password) {
	$password = password_hash($password, PASSWORD_DEFAULT);
	$insert = " INSERT INTO bloggers (name , email , phone , password) VALUES ('$name' , '$email' , '$phone' , '$password') ";
	$query	= mysqli_query($GLOBALS['connection'] , $insert);
	if ($query) {
		echo '<div class="alert alert-success" role="alert" style="margin:10px;">';
		echo 'Successful Sing Up';
		echo '</div>';
	} else {
		echo '<div class="alert alert-danger" role="alert" style="margin:10px;">';
		echo 'Failed Sign Up, Email Is Already Registered';
		echo '</div>';
	}
} // end insertNewBlogger()


// Login Select
function loginInfo ($email , $password) {
	
	$selectUser = "SELECT userid,name,email,phone,password FROM bloggers WHERE email = '$email'";
	$query = mysqli_query($GLOBALS['connection'] , $selectUser);
	$user = mysqli_fetch_all($query , MYSQLI_ASSOC);
	if (count($user) > 0) {
		$storedPass = $user['0']['password'];
		if (password_verify($password, $storedPass))
		{
			echo '<div class="alert alert-success" role="alert" style="margin:10px;">';
			echo 'Successful Login';
			echo '</div>';
		} else {
			echo '<div class="alert alert-danger" role="alert" style="margin:10px;">';
			echo 'Failed Login, Incorrect Password';
			echo '</div>';
		}
	} else {
			echo '<div class="alert alert-danger" role="alert" style="margin:10px;">';
			echo 'Failed Login, Email Not Registered';
			echo '</div>';
	}

	return $user;
} // end loginInfo()


// Insert New Blog 
function insertNewBlog ($userid , $title , $content) {
	$content = addslashes($content);
	$insert = "INSERT INTO blogs (userID , title , content) VALUES ('$userid' , '$title' , '$content') ";
	$query = mysqli_query($GLOBALS['connection'] , $insert);
	if ($query) {
		echo '<div class="alert alert-success" role="alert" style="margin:10px;">';
		echo 'Published';
		echo '</div>';
	} else {
		echo '<div class="alert alert-danger" role="alert" style="margin:10px;">';
		echo 'Failed Publish';
		echo '</div>';
	}
}


// Get Blogs From Database 
function getBlogs () {
	$get = "SELECT blogs.blogID , blogs.title , blogs.content , blogs.createAt , bloggers.name 
			FROM blogs
			INNER JOIN bloggers ON blogs.userID = bloggers.userId ORDER BY blogs.createAt DESC";
	$query = mysqli_query($GLOBALS['connection'] , $get);
	$blogs = mysqli_fetch_all($query , MYSQLI_ASSOC);
	if (count($blogs) > 0) {
		
		// return $blogs;
	} else {
		//return 'No Blogs Published Yet';
	}
return $blogs;
} 


// Get User Blogs From Database 
function getUserBlogs($userId) {
	$get = "SELECT blogs.blogID , blogs.title , blogs.content , blogs.createAt , bloggers.name
			FROM blogs
			INNER JOIN bloggers ON blogs.userID = bloggers.userId AND blogs.userID = '$userId' ORDER BY blogs.createAt DESC";

	$query = mysqli_query($GLOBALS['connection'] , $get);
	$blogs = mysqli_fetch_all($query , MYSQLI_ASSOC);
	if (count($blogs) > 0) {
		
		// return $blogs;
	} else {
		//return 'No Blogs Published Yet';
	}
return $blogs;
} 


// Get Select Blog 
function getCustomBlog ($blogId) {
	$get = "SELECT blogs.title , blogs.content , blogs.createAt , bloggers.name
			FROM blogs
			INNER JOIN bloggers ON blogs.userID = bloggers.userId AND blogs.blogID = '$blogId' ";

	$query = mysqli_query($GLOBALS['connection'] , $get);
	$blogs = mysqli_fetch_all($query , MYSQLI_ASSOC);
return $blogs;
}


// Delete A Blog 
function deleteBlog ($blogId) {
	$delete = "DELETE FROM blogs WHERE blogs.blogID = '$blogId' ";
	if (mysqli_query($GLOBALS['connection'] , $delete)) {
		header('Location: home.php?id=dele');
		mysql_close($GLOBALS['connection']);
	} else {
		echo 'Error <br>' . mysqli_error($GLOBALS['connection']);
	}
}


// Update Blog
function updateBlog ($blogId , $title , $content) {
	$update = "UPDATE blogs SET title = '$title' , content = '$content' WHERE blogID = '$blogId'";
	$query  = mysqli_query($GLOBALS['connection'] , $update);
	if ($query) {
		$location = 'Location: add.php?id=' . $blogId;
		header('Location: add.php?id=edit');
		mysql_close($GLOBALS['connection']);
	} else {
		echo 'Error <br>' . mysqli_error($GLOBALS['connection']);
	}
}


// Search Results
function searchResults ($searchWords) {
	$searchResult = "SELECT blogs.blogID , blogs.title , blogs.content , blogs.createAt , bloggers.name
					FROM blogs
					INNER JOIN bloggers ON blogs.userID = bloggers.userId 
					WHERE blogs.content LIKE '%$searchWords%' OR blogs.title LIKE '%$searchWords%'";

	$query = mysqli_query($GLOBALS['connection'] , $searchResult);
	$result = mysqli_fetch_all($query , MYSQLI_ASSOC);
		if (count($result) > 0) {
			// Found Data	
		} else {
			echo '<div class="form" style="width: 50%;">';
				echo '<h1 style="padding: 50px; font-size: 50px; font-family: serif;">No Data Matching With</h1>';
				echo '<h1 style="padding: 30px; font-size: 50px; font-family: serif;">' . '" ' . $searchWords . ' "</h1>';
			echo '</div>';
			
		}
return $result;
}


// Get Writers 
function getWriters() {
	$writers = "SELECT name,email,phone FROM bloggers";
	$query = mysqli_query($GLOBALS['connection'] , $writers);
	$writersList = mysqli_fetch_all($query , MYSQLI_ASSOC);
	if (count($writersList) > 0) {
		// successful 
	} else {
		echo '<div class="form" style="width: 50%;">';
			echo '<h1 style="padding: 30px; font-size: 50px; font-family: serif;">' . 'No Writers Found' . ' "</h1>';
		echo '</div>';
			
	}
return $writersList;
}
