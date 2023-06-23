<?php
	session_start();

	if(!empty($_POST))
	{
		$_SESSION['error'] = array();
		extract($_POST);

		if(empty($cat))
		{
			$_SESSION['error']['cat'] = "Please Enter Category Name";
		}

		if(!empty($_SESSION['error']['cat']))
		{
			header("location:category_add.php");
		}
		else
		{
			// Create mysqli object and connect to the database
			$mysqli = new mysqli("localhost", "root", "", "bms");

			// Check for any errors during connection
			if ($mysqli -> connect_errno) {
				echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
				exit();
			}

			// Execute the query 
			$q = "INSERT INTO category (cat_nm) VALUES ('$cat')";

			if(mysqli_query($mysqli, $q))
{
  header("location:category_add.php");
}
else
{
  echo "Error: " . mysqli_error($mysqli);
}

		}
	}
	else
	{
		header("location:category.php");
	}
?>
