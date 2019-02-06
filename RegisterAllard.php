<?php include ('Framework.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Lots of frozen pie</title>
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
	
	<form method="post" action="Framework.php"> 
     <?php include('Error.php'); ?>
  <div class="bg-text">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
     <br>
    <div class="Username">
    <label for="Username"><b>Username</b></label>
	</div>
    <input type="text" placeholder="Enter Username" name="username" class="text_box" value="" maxlength="20" required>
	
	<div class="password">
    <label for="psw"><b>Password</b></label>
	</div> 
    <input type="password" placeholder="Enter Password" name="password" class="text_box" value="" maxlength="20" required>
    
	<div class="repeat">
    <label for="psw-repeat"><b>Repeat Password</b></label>
	</div>
	
    <input type="password" placeholder="Repeat Password" name="psw-repeat" class="text_box" value="" maxlength="20"required>
    
  <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
    <button type="submit" class="registerbtn" style="cursor: pointer;">Register</button>
 

  
   <p>Already have an account? <a href="#">Sign in</a>.</p> 
   
   
  </div>
</form>
</body>
</html>
