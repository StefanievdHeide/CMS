<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'pollingwebsite');

	// initialize variables
	$poll_title = "";
	$option_1 = "";
	$option_2 = "";
	$option_3 = "";

	if (isset($_POST['create_button'])) {
		$poll_title = $_POST['poll_title'];
		$option_1 = $_POST['option_1'];
		$option_2 = $_POST['option_2'];
		$option_3 = $_POST['option_3'];



		mysqli_query($db, "INSERT INTO poll_title (poll_title) VALUES ('$poll_title')"); 
		$_SESSION['message'] = "Poll saved"; 
		//header('location: createpoll.php');

		mysqli_query($db, "INSERT INTO polls_choices (choice_name) VALUES ('$option_1')"); 
		$_SESSION['message'] = "Poll saved"; 

		mysqli_query($db, "INSERT INTO polls_choices (choice_name) VALUES ('$option_2')"); 
		$_SESSION['message'] = "Poll saved"; 

		mysqli_query($db, "INSERT INTO polls_choices (choice_name) VALUES ('$option_3')"); 
		$_SESSION['message'] = "Poll saved"; 
		//header('location: createpoll.php');
	}
		/*
	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
    }

    if (isset($_GET['del'])) {
		$id = $_GET['del'];
	
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['message'] = "Address deleted!"; 
		header('location: index.php');
	}	*/
?>