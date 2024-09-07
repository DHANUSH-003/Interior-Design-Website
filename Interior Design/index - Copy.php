<?php 
session_start();
	if(!$_POST)
	{
		$_SESSION['uid'] = "";
		$_SESSION['uname'] = "";
		$_SESSION['role'] = "";
	}	
require "Connection.php";

if($_POST)
{
			$result = mysqli_query($con,"select * from login where username='$_POST[txtUserName]' and  password='$_POST[txtPWD]'")			
				or die('Invalid User : '.mysqli_error());
			$norow=mysqli_num_rows($result);
			$hlocation="";
			if($norow>0)
			{
				$row=mysqli_fetch_array($result);
				$_SESSION['uid']= $row[0];
                $_SESSION['role']= $row[2];
				
				if($row[2]=='admin')					
				{				
					header("location:MasterAdmin.php");
				}
				else if($row[2]=='user')
				{
					header("location:Masteruser.php");
				}
				else
			{
				header("location:index.php");
			}
			}
		
			mysqli_close($con);
}
?>
<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Bookstore</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body style="background-image:url(images/1.jpg);">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Book Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"></a></li>				
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

			<div class="col-md-9">
				<h2 align="center" style="color:#;">Book Store Management Systems</h2>
				<div class="panel panel-info">
					<div class="panel-heading"></div>
						<div class="panel-body">
							<div class="table-responsive" align="center">
						<table class="table table-bordered" style="width:250px;" align"center">
														
							<form class="col-md-12" action="#" method="post">
							<tr><td colspan="2"><h4 align="center">Login</h4></td></tr>
					 		<tr><td>UserName</td>
									<td><input type="text" class="form-control input-md" id="txtUserName" name="txtUserName" placeholder="Username">
								</td></tr>								
							<tr><td>Password</td>		
									<td><input type="password" class="form-control input-md" id="txtPWD" name="txtPWD" placeholder="Password">
								</td></tr>
							<tr><td colspan="2">											
									<button id="login" class="btn btn-primary btn-md btn-block">Sign In</button>
								</td></tr>

							</form>
						</table>
					</div>
						</div>
						<div class="panel-footer">&copy; 2020 Book Store Management Systems</div>
				</div>
				
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>
