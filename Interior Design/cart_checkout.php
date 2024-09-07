<?php 
session_start();
include "Connection.php";
$txtuname = $_SESSION["uname"];
$cid = $_SESSION["uid"];				
$tot_amnt=0;
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}
if(isset($_GET['clid']))
				{
					$clid=$_GET['clid'];
					// $uname=$_GET['uname'];
$sqlquery = "select sum(Model_Price) from cart where ClientId='$clid'";
$result = mysqli_query($con,$sqlquery);
$norow=mysqli_num_rows($result);
			
			if($norow>0)
			{
				$row=mysqli_fetch_array($result);
				$tot_amnt= $row[0];
			}

				}
if(isset($_POST['btncst']))
{
$clid=$_GET['clid'];
$txtclientname=$_GET['uname'];	
$txtaddress	= 	$_POST['txtaddress'];
$txtmobile	= 	$_POST['txtmobile'];



		$sql = "insert into cart_checkout set 						
						InvId		=	NULL,
						ClientName		=	'$txtclientname',
						ClientId		=	'$clid',
						Address		=	'$txtaddress',
						Mobile		=	'$txtmobile',
						
						NetAmnt	=	'$tot_amnt'";
									
		//$sql1 = "delete  from cart where ClientId='$cid1' and Client_User_Name='$txtuname1'";
	

			if(mysqli_query($con,$sql))
			{
				mysqli_query($con,"update cart set Status='Finished' where ClientId='$clid'");
						header("location:service_request.php");
			}
			else
			{
				echo "
					<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
						<b>Failed</b>
					</div>
				";
			}
		

}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Interior Design Systems</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body style="background-image:url(images/45.jpg);">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Interior Design Systems</a>
			</div>
			<ul class="nav navbar-nav">
				
				<li><a href="model_upload.php">Designs</a></li>	
				<li><a href="service_request.php">Service Request</a></li>	
				<li><a href="orders_view.php">Orders</a></li>				
				<li><a href="payment_list.php">Payment Details</a></li>				
				<li><a href="feedback_view.php">Feedbacks</a></li>				
				<li><a href="logout.php">Log Out</a></li>				
			</ul>
			<ul class="nav navbar-nav navbar-right">

				</li>
			</ul>			
		</div>
	</div>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12" id="product_msg">
						
					</div>
				</div>
				
				
				<?php
				

				
?>


				<h2 align="center" style="color:#;">Interior Design Systems</h2>
				<div class="panel panel-info">
				<?php
				if(isset($_GET['uname']))
				{
					// $clid=$_GET['clid'];
					$uname=$_GET['uname'];
					
				}
				?>
					<div class="panel-heading">Cart Checkout For Invoice Amount : <b>RS- <?php echo $tot_amnt; ?> - Client Name : <?php echo $uname; ?></b></div>
						<div class="panel-body">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="row">	
											<div class="col-md-12">
												<label for="Name">Invoice Amnt</label>
								<input type="text" id="txtamnt" name="txtamnt" class="form-control" value="<?php echo $tot_amnt; ?>" readonly	>
											</div>
									</div>
							<div class="row">	
							<div class="col-md-4">
								<label for="Name">Client Name</label>
								<input type="text" id="txtclientname" name="txtclientname" class="form-control" value="<?php echo $_GET['uname']; ?>" readonly	>
							</div>
							<div class="col-md-4">
								<label for="Name">Address</label>
								<input type="text" id="txtaddress" name="txtaddress" class="form-control">
							</div>
							<div class="col-md-4">
								<label for="Name">Mobile</label>
								<input type="text" id="txtmobile" name="txtmobile" class="form-control">
							</div>
							</div>
							
													




							
							<p><br></p>
							<div class="row">	
							<div class="col-md-5"></div>
								<div class="col-md-4">
									<button id="btncst"  name="btncst" class="btn btn-success btn-lg">Submit</button>
								</div>
							</div>
								
								
							
							<div id="cart_checkout"></div>
</div>

						</div>
						</form>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		
	</div>
	<div class="panel-footer" style="background-color:#000;color:#FFF;">&copy; 2022 Interior Design Systems</div>
</body>
</html>

