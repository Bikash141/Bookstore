<?php

session_start();

if(isset($_GET['bcid'])) {

include("includes/connection.php");

// Use mysqli_real_escape_string function to sanitize the input
$bcid = mysqli_real_escape_string($link, $_GET['bcid']);

$q="SELECT * FROM book WHERE b_id='".$bcid."'";

$res=mysqli_query($link, $q);

if($res) {

    $row=mysqli_fetch_assoc($res);

    $_SESSION['cart'][]=array("nm"=>$row['b_nm'],"img"=>$row['b_img'],"price"=>$row['b_price'],"qty"=>1);

} else {

    echo "Error: " . $q . "<br>" . mysqli_error($link);

}
}

else if(!empty($_POST)) {

foreach($_POST as $id=>$qty) {

    $_SESSION['cart'][$id]['qty']=$qty;

}
}

else if(isset($_GET['id'])) {

$id=$_GET['id'];

unset($_SESSION['cart'][$id]);
}

header("location:cart.php");

?>