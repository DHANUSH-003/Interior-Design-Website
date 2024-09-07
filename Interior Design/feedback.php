<?php 
require "Connection.php";
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}

if($_POST)
{
$txtname	= 	$_POST['txtname'];
$txtmobile=$_POST['txtmobile'];
$txtfeedback=$_POST['txtfeedback'];

				mysqli_query($con,"insert into feedbacks set 						
						Name			=	'$txtname',
						Mobile		=	'$txtmobile',
						feedback		=	'$txtfeedback'")or die('Query Not Working 2 : '.mysqli_error());		

						header("location: feedback.php");	
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
				<li><a href="Masteruser.php">Home</a></li>				
				<li><a href="cart_details.php">Cart Details</a></li>				
				<li><a href="feedback.php">Feedbacks</a></li>
				<li><a href="logout.php">Log out</a></li>	
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
				<div class="dropdown-menu" style="width:400px;">
					<div class="panel panel-success">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-3">S.No</div>
								<div class="col-md-3">Book Title</div>
								<div class="col-md-3">Book Image</div>
								<div class="col-md-3">Price</div>
							</div>
						</div>
						<div class="panel-body">
							<div id="cart_product">
							<!--<div class="row">
								<div class="col-md-3">S.No</div>
								<div class="col-md-3">Book Title</div>
								<div class="col-md-3">Book Image</div>
								<div class="col-md-3">Price</div>
							</div>-->
							</div>
						</div>
						
						<div class="panel-footer"></div>
					</div>
				</div>
				</li>
				<li><a href="#"><?php echo "Hi ".$_SESSION["uname"]; ?></a></li>			
			</ul>			
		</div>
	</div>

	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>			
			<div class="col-md-10">
				<div class="panel panel-info" style="background-image:url(images/6.jpg)">
					<div class="panel-heading">Online Interior Design Systems</div>
						<div class="panel-body">
						

							<form method="post" id="frmfeedback" action="#">							
							<div class="row">
								<div class="col-md-6">
									<label for="Name">Name</label>
									<input type="text" class="form-control" id="txtname" name="txtname">
								</div>
								<div class="col-md-6">
									<label for="Name">Mobile</label>
									<input type="text" class="form-control" id="txtmobile" name="txtmobile">
								</div>							
							</div>
							<div class="row">

								<div class="col-md-12">
									<label for="Name">Feedback</label>
										<select name="txtfeedback" id="txtfeedback" class="form-control">
											<option value="">Select Your Feedback</option>
											<option value="Super">Super</option>
											<option value="Normal">Normal</option>											
											<option value="Good">Good</option>											
											<option value="Excellent">Excellent</option>
											<option value="Bad">Bad</option>
										</select>											
								</div>							
							</div>						

							<p></br></p>
							<div class="row">
								<div class="col-md-5">
								</div>
								<div class="col-md-2">																
									<button type="submit" id="btnsave"  name="btnsave" class="btn btn-success btn-lg center-block">Save</button>			
								</div>
								<div class="col-md-5">
								</div>							
							</div>																		
						</div>

						
						
						
							
						</div>
						<div class="panel-footer" style="background-image:url(images/6.jpg)">&copy; 2024 Interior Design Systems</div>
				</div>
				
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
