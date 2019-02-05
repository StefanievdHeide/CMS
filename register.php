<?php 
//TEST
//include ('Register2.php');
session_start();

// initializing variables
$username = "";
$password = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'website');

// REGISTER USER
if (isset($_POST)) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
 
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    }
    

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, password) 
  			  VALUES('$username','$password')";

  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	//header('location: register.php');
         
  }
}

?> 
<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
    <link rel="stylesheet" type="text/css" href="CLANG.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>

	</style>
</head>
<body>
	
	
	<div class="bg-image"></div>
	<div class="bg-logo">
	 <img class="logo" src="logo.png">
	</div>
    
	<div class="bg-stuff"></div>
	
	<form action="register.php" method="post">
        
  <div class="bg-text">
    <h1 style="font-family: impact">Register</h1>
    <p style="font-family: impact">Please fill in this form to create an account.</p>
     <br>
    <div class="Username">
    <label for="Username"><b>Username</b></label>
	</div>
      
    <input type="text" placeholder="Enter Username..." name="username" class="form-control" required>
	
	<div class="password">
    <label for="psw"><b>Password</b></label>
	</div> 
      
    <input type="password" placeholder="Enter Password..." name="password" class="form-control" required>
    
	<div class="repeat">
  
	</div>
	
    <button type="submit" class="btn btn-primary" style="cursor: pointer;">Register</button>
    

  
   <p style="font-family: impact">Already have an account? <a href="login.php">Sign in</a>.</p> 
   
   
  </div>
</form>
</body>
</html>
