<?php
session_start();
include "Connection.php";

if(isset($_POST["getProduct_index"]))
{
	$product_query = "select * from designs  order by RAND() limit 0,6";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while($row = mysqli_fetch_array($run_query))
		{
			$prod_id=$row["id"];
			$prod_modelNo=$row["Model_no"];			
			$prod_title=$row["Title"];			
			$prod_price=$row["Price"];			
			$prod_image=$row["image_type"];
			$prod_desc=$row["Description"];
			echo "	
				<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_modelNo - $prod_title</div>
									<div class='panel-body'>
										<img src='uploads/$prod_image' style='width:140px; height:100px;'/>
									</div>
									<div class='panel-heading'>$prod_price
										<p>$prod_desc</p>
									</div>
								</div>
				</div>
			";
		}
	}
}

if(isset($_POST["getProduct_admin"]))
{
	$product_query = "select * from designs  order by RAND() limit 0,6";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while($row = mysqli_fetch_array($run_query))
		{
			$prod_id=$row["id"];
			$prod_modelNo=$row["Model_no"];			
			$prod_title=$row["Title"];			
			$prod_price=$row["Price"];			
			$prod_image=$row["image_type"];
			$prod_desc=$row["Description"];
			echo "	
				<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_modelNo - $prod_title</div>
									<div class='panel-body'>
										<img src='uploads/$prod_image' style='width:140px; height:100px;'/>
									</div>
									<div class='panel-heading'>$prod_price
										<p>$prod_desc</p>
									</div>
								</div>
				</div>
			";
		}
	}
}


if(isset($_POST["getProduct"]))
{
	$product_query = "select * from designs order by RAND() limit 0,6";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while($row = mysqli_fetch_array($run_query))
		{
			$prod_id=$row['id'];
			$prod_modelNo=$row["Model_no"];			
			$prod_title=$row["Title"];			
			$prod_price=$row["Price"];			
			$prod_image=$row["image_type"];
			$prod_desc=$row["Description"];
			echo "	
				<div class='col-md-4'>
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_title</div>
									<div class='panel-body'>
										<img src='uploads/$prod_image' style='width:140px; height:100px;'/>
										
									</div>
									<button pid='$prod_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>AddService</button>
									<div class='panel-heading'>$prod_price
									<p>$prod_desc</p>
										
									</div>
								</div>
				</div>
			";
		}
	}
}


if(isset($_POST["getProduct_selected"]))
{
	$uid = $_SESSION["uid"];
	$product_query = "select * from cart where user_id='$uid'";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0)
	{
		while($row = mysqli_fetch_array($run_query))
		{			
			$prod_title=$row["product_title"];			
			$prod_image=$row["product_image"];
			$prod_price=$row["price"];
			echo "	
				<div class='col-md-4'>
								
								<div class='panel panel-info'>
									<div class='panel-heading'>$prod_title</div>
									<div class='panel-body'>
										<img src='product_images/$prod_image' style='width:160px; height:250px;'/>
									</div>
									<div class='panel-heading'>$prod_price
								
									</div>
								</div>
				</div>
			";
		}
	}
}




if(isset($_POST["addToProduct"])){
	$p_id = $_POST["proId"];
	$user_id = $_SESSION["uid"];
	$user_name = $_SESSION["uname"];
	
	$sql = "select  * from cart where Model_Id = '$p_id' and ClientId= '$user_id'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	echo "
					<div class='alert alert-success'>
					<p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>$p_id - $user_id</b>
					</div>
					";
	if($count > 0 )
	{
		echo "
					<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
						<b>This Service is Already Added.</b>
					</div>
				";
	}
	else
	{
		$sql = "select  * from designs where id = '$p_id'";
		$run_query = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($run_query);
			$id = $row["id"];
			$Model_No = $row["Model_no"];			
			$Model_Title = $row["Title"];						
			$Model_Price = $row["Price"];
			$Model_Description = $row["Description"];
			$Model_Image = $row["image_type"];
			$status="No";
			$sql = "INSERT INTO `cart`(`CartId`, `ClientId`, `Client_User_Name`, `Model_Id`,`Model_No`, `Model_Title`,`Model_Image`, `Model_Price`, `Status`) VALUES (Null,$user_id,'$user_name',$p_id,'$Model_No','$Model_Title','$Model_Image',$Model_Price,'$status')";
			
			$sql_2 = "INSERT INTO `cart2`(`CartId`, `ClientId`, `Client_User_Name`, `Model_Id`,`Model_No`, `Model_Title`,`Model_Image`, `Model_Price`, `Status`) VALUES (Null,$user_id,'$user_name',$p_id,'$Model_No','$Model_Title','$Model_Image',$Model_Price,'$status')";
			
			if(mysqli_query($con,$sql))
			{
				
				if(mysqli_query($con,$sql_2))
			{
				echo "
					<div class='alert alert-success'>
					<p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Service Is Added</b>
					</div>
					";
			}
			}
	}
}

if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
	$user_id = $_SESSION["uid"];
	$sql = "select  * from cart where ClientId = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
	if($count > 0 )
	{
			$no = 1;
			$total_amt =0;
			while($row = mysqli_fetch_array($run_query))
			{
				$id = $row["CartId"];
				$book_id = $row["Model_Id"];			
				$book_title = $row["Model_Title"];			
				$book_image = $row["Model_Image"];
				
				$book_price = $row["Model_Price"];
				$total_amnt = $row["Status"];
				$price_array = array($total_amnt);
				$total_sum = array_sum($price_array);
				$total_amt = $total_amt + $total_sum;
				if(isset($_POST["get_cart_product"]))
				{
				echo "
							<div class='row'>
								<div class='col-md-3'>$no</div>
								<div class='col-md-3'>$book_id</div>
								<div class='col-md-3'>$book_title</div>
								<div class='col-md-3'><img src='uploads/$book_image' widht='30px' height='20px' ></img></div>
								<div class='col-md-3'>Price : $book_price</div>
							</div>
				";
				$no = $no + 1;					
				}
				else
				{
					echo "			
						<hr>
					<div class='row'>
								<div class='col-md-2'>
									<div class='btn-group'>
										<a href='#' remove_id='$book_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
										
									</div>
								</div>
								<div class='col-md-2'><img src='uploads/$book_image' width='90px' height='50px'></img></div>
								<div class='col-md-3'>$book_id</div>
								<div class='col-md-2'>$book_title</div>
								<div class='col-md-3'>$book_price</div>
							</div>
					
					";
				}
			}
			

}

if(isset($_POST["removeFromCart"])){
	$p_id = $_POST["rid"];
	$t = 2;
	$uid = $_SESSION["uid"];
	echo "
					<div class='alert alert-success'>
					<p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Service Removed From List</b>
					</div>
					";
}

if(isset($_POST["updateProduct"])){
	$uid = $_SESSION["uid"];
	$pid = $_POST["updateId"];
	$qty = $_POST["qty"];
	$price = $_POST["price"];
	$total = $_POST["total"];
	
	$sql = "update cart set qty='$qty',Book_Price='$price',Total_Price='$total' where ClientId='$uid' and BookId='$pid'";
	
	$run_query = mysqli_query($con,$sql);
	if($run_query)
	{
		echo "Updated";
	}
}
}
?>