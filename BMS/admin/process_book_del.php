<?php

    session_start();

    include("../includes/connection.php");

    $query = "DELETE FROM book WHERE book_id = " . $_GET['id'];

    $result = mysql_query($query, $link);

    header("location:category_view.php");

?>
