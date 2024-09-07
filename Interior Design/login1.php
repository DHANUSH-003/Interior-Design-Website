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
				$_SESSION['uname']= $row[1];
                $_SESSION['role']= $row[3];
				$_SESSION['uid']= $row[0];
				if($row[3]=='Admin')					
				{				
					header("location:MasterAdmin.php");
				}
				else if($row[3]=='User')
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
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Interior Design systems</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body style="background-color:#e1e1e1;">

<div class="container">
<div class="row">

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Interior Design</a>
				<img src="" class="navbar-image"/>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav"> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

</div>
</div>
<div class="container">
<div class="row">


				<div class="col-md-2"><div class="row"></div></div>
				<div class="col-md-8">
					<div class="table-responsive" align="center">
						<table class="table table-bordered" style="width:250px;" align"center">
														
							<form class="col-md-12" action="#" method="post">
							<tr><td colspan="2"><h4 align="center">Interior Design Login Portal</h4></td></tr>
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
				<div class="col-md-2"><div class="row"></div></div>


</div>
</div>

<div class="container" style="background-color:#000;color:#cccccc;">
<div class="row">

<p style="text-align:center;">Copyrights &copy Interior Design Systems</p>

</div>
</div>
</body>
</html>