<?php
session_start();
include "Connection.php";

if(isset($_POST["removeFromCart"])){
	$pid = $_POST["pid"];	
	$uid = $_SESSION["uid"];
	$sql = "delete from cart where ClientId='$uid' and Model_Id='$pid'";
	$sql1 = "delete from cart2 where ClientId='$uid' and Model_Id='$pid'";
	
	$run_query = mysqli_query($con,$sql);
	$run_query1 = mysqli_query($con,$sql1);
	if($run_query)
	{
		echo "Product Deleted";
	}
	
}

if(isset($_POST["updateProduct"])){
	$uid = $_SESSION["uid"];
	$pid = $_POST["updateId"];
	$qty = $_POST["qty"];
	$price = $_POST["price"];
	$total = $_POST["total"];
	
	$sql = "update cart set qty='$qty',Book_Price='$price',Total_Price='$total' where ClientId='$uid' and Model_Id='$pid'";
	
	$run_query = mysqli_query($con,$sql);
	if($run_query)
	{
		echo "Product Cart Updated";
	}
}
?>