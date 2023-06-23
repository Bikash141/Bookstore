<?php session_start();

include("../includes/connection.php");

$query="delete from category where cat_id =".$_GET['id'];

$result=mysqli_query($link, $query);

// Check if the query was successful
if($result)
{
	header("location:category_view.php");
}
else
{
	echo "Error: " . mysqli_error($link);
}
?>