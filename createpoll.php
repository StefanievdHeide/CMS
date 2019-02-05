
<?php  include('createpollphpcode2.php'); ?>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="test.css">
		
	<style>
		body {margin:0;}
	</style>

</head>

<body>


<ul>
	<li style="float: right"><a href="#Login">Login</a>
    <li style="float: right"><a href="#Register">Register</a>
    <li style="float: right"><a href="#CreatePost">Create a post</a></li>
    <li style="float: right"><a href="#Home">Home</a></li>     
</ul>

<div style="padding-top:40px;margin-top:20px;background-color:#D2B5E1;height:1500px;">


<form method="post" action="createpollphpcode2.php">
	<div>
		<textarea name="poll_title" id="poll_title" placeholder="Type your poll title here" maxlength="100" data-validation-required="true" data-validation-required-message="A title is required." data-validation-length="..100" data-validation-length-message="Poll title must not contain more than 100 characters"></textarea>
	</div>


   	<div class="form-field horizontal">
		<label>1. </label>
		<input type="text" name="option_1" id="option_1" placeholder="Enter poll option" maxlength="30">

			<div></div>

		<label>2. </label>
		<input type="text" name="option_2" id="option_2" placeholder="Enter poll option" maxlength="30">

			<div></div>

		<label>3. </label>
		<input type="text" name="option_3" id="option_3" placeholder="Enter poll option" maxlength="30">	

			<div></div>
	</div>

	<button name="create_button" id="create_button" type="submit" class="button">Create Poll</button>
</form>

</body>

</html>