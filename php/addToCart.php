<?php
require_once("config.php");

$item_id    =  mysqli_real_escape_string($con, $_POST['item_id']);
$dbname     =  mysqli_real_escape_string($con, $_POST['dbname']);
$user_id    =  mysqli_real_escape_string($con, $_POST['user_id']);

mysqli_query($con, "INSERT INTO cart_tb(item_id, item_db, user_id) VALUES('$item_id', '$dbname', '$user_id')");

echo"<script>alert('Item added to cart.')</script>";
echo '<script>window.history.go(-1)</script>';
?>