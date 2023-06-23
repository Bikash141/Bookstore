<?php
	session_start();
	include("../includes/connection.php");

	$id = (int) $_GET['id']; // Sanitize the input as an integer
	
	$query = "DELETE FROM contact WHERE c_id = $id";
	$result = mysqli_query($link, $query); // use mysqli extension

	if ($result) {
		header("Location: contact_view.php");
		exit(); // exit the script after redirecting
	} else {
		echo "Error deleting record: " . mysqli_error($link);
	}

	mysqli_close($link); // close the database connection
?>
