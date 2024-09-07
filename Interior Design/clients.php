<?php
include "Connection.php";
if(isset($_POST['btncst']))
{
	
$txtclientname	= 	$_POST['txtclientname'];
$txtaddress	= 	$_POST['txtaddress'];
$txtarea	= 	$_POST['txtarea'];
$txtcity	= 	$_POST['txtcity'];
$txtstate	= 	$_POST['txtstate'];
$txtmobile	= 	$_POST['txtmobile'];
$txtemail	= 	$_POST['txtemail'];
$txtusername	= 	$_POST['txtusername'];
$txtidprough	= 	$_POST['txtidprough'];
$role = "User";

		$sql = "insert into clients set 						
						ClientId		=	NULL,
						Username		=	'$txtclientname',
						Address		=	'$txtaddress',
						Area		=	'$txtaddress',
						City		=	'$txtaddress',
						State		=	'$txtaddress',
						Mobile		=	'$txtmobile',
						Email	=	'$txtemail',
						uname	=	'$txtusername',
						Password	=	'$txtidprough'";
						
		$sql1 = "insert into login set 						
						username		=	'$txtusername',
						password		=	'$txtidprough',
						role	=	'$role'";

	
		if(mysqli_query($con,$sql)) 
		{
			if(mysqli_query($con,$sql1))
			{
				echo "
					alert('<div class='alert alert-success'>
					<p><br></p><p><br></p><p><br></p>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Record Stored Successfully</b>
					</div>')
				";
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
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Interior Design Systems</a>
			</div>
			<ul class="nav navbar-nav">

				<li><a href="index.php">Back</a></li>				
			</ul>
		</div>
	</div>
	
	<div class="container-fluid">
	<p><br></p><p><br></p><p><br></p>
		<div class="row">
				<div class="col-md-12" id="signup_msg">
					
				</div>
		</div>
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading">Client Registrations Area</div>

					<div class="panel-body"> 
					
						<form method="post">
						<div class="row">

							<div class="col-md-12">
								<label for="Name">Client Name</label>
								<input type="text" id="txtclientname" name="txtclientname" class="form-control">
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Addres</label>
								<input type="text" id="txtaddress" name="txtaddress" class="form-control">
							</div>							
							<div class="col-md-6">
								<label for="Name">Area</label>
								<input type="text" class="form-control" id="txtarea" name="txtarea">
							</div>							
						</div>					
						
						<div class="row">
							<div class="col-md-6">
								<label for="Name">City</label>
								<input type="text" class="form-control" id="txtcity" name="txtcity">
							</div>
							<div class="col-md-6">
								<label for="Name">State</label>
								<input type="text" class="form-control" id="txtstate" name="txtstate">
							</div>							
						</div>						
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Mobile</label>
								<input type="text" class="form-control" id="txtmobile" name="txtmobile">
							</div>
							<div class="col-md-6">
								<label for="Name">Email</label>
								<input type="text" class="form-control" id="txtemail" name="txtemail">
							</div>							
						</div>							
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Username</label>
								<input type="text" class="form-control" id="txtusername" name="txtusername">
							</div>							
							<div class="col-md-6">
								<label for="Name">Password</label>
								<input type="password" class="form-control" id="txtidprough" name="txtidprough">
							</div>							
						</div>												
						<p></br></p>
						<div class="row">
							<div class="col-md-5">								
								
							</div>
							<div class="col-md-7">
							<button id="btncst"  name="btncst" class="btn btn-success btn-lg">Signup</button>
							</div>
						</div>																		
						</div>
					</form>
					<div class="panel-footer">copyrights Interior Design System</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>		