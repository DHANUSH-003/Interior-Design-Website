<?php
require "Connection.php";
function fill_Id($con)
{
	
	$sql = "select max(EmpNo)+1 from employee";
	$result=mysql_query($sql);
	while($data = mysql_fetch_row($result))
	{
			echo $data[0];
	}	
}

function fill_department($con)
{
	$output='';
	$sql = "select department from subjectmaster";
	$result=mysql_query($sql);
	while($row = mysql_fetch_array($result))
	{
		$output .= '<option value="'.$row["department"].'">'.$row["department"].'</option>';
	}
	return $output;
}

if($_POST)
{
$txtid	= 	$_POST['txtid'];	
$txtstaffname	= 	$_POST['txtstaffnamename'];
$txtquali	= 	$_POST['txtquali'];
$txtdesignation	= 	$_POST['txtdesignation'];
$txtdepartment	= 	$_POST['txtdepartment'];
$txtaddress	= 	$_POST['txtaddress'];
$txtsalary	= 	$_POST['txtsalary'];
$txtmobile	= 	$_POST['txtmobile'];



		mysql_query("insert into employee set 						
						EmpNo		=	'$txtid',
						EmpName		=	'$txtstaffname',
						Qualification		=	'$txtquali',
						Designation		=	'$txtdesignation',
						Department	=	'$txtdepartment',
						Address	=	'$txtaddress',
						Salary	=	'$txtsalary',
						Mobile	=	'$txtmobile'")or die('Query Not Working 2 : '.mysql_error());
						echo "";
						echo "Staffs Added Successfully";
}

?>
<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Hotel Management Systems</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Hotel Management Systems</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="MasterAdmin.php">Home</a></li>										
				<li><a href="clients.php">Clients</a></li>				
				<li><a href="checkin.php">Check In</a></li>				
				<li><a href="checkout.php">Check Out</a></li>				
				<li><a href="rooms.php">Rooms</a></li>				
				<li><a href="staffs.php">Employees</a></li>				
				<li><a href="checkout_report.php">Checkout Report</a></li>							
				<li><a href="logout.php">Logout</a></li>				
			</ul>
		</div>
	</div>
	<p><br></p>
	<p><br></p>
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
		<div class="col-md-12" id="signup_msg">		
		</div>
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading">Staff Details</div>
					<div class="panel-body"> 
						<form method="post">
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Staff Id</label>
								<input type="text" class="form-control" id="txtid" name="txtid" value="<?php echo fill_Id($con); ?>">
							</div>
							<div class="col-md-6">
								<label for="Name">Staff Name</label>
								<input type="text" id="txtstaffname" name="txtstaffname" class="form-control">
							</div>							
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Addres</label>
								<input type="text" id="txtaddress" name="txtaddress" class="form-control">
							</div>							
							<div class="col-md-6">
								<label for="Name">Mobile</label>
								<input type="text" class="form-control" id="txtmobile" name="txtmobile">
							</div>							
						</div>					
						
						<div class="row">
							<div class="col-md-6">
								<label for="Name">Qualification</label>
								<input type="text" class="form-control" id="txtquali" name="txtquali">
							</div>
							<div class="col-md-6">
								<label for="Name">Designation</label>
								<input type="text" class="form-control" id="txtdesignation" name="txtdesignation">
							</div>							
							<div class="col-md-6">
								<label for="Name">Department</label>
								<input type="text" class="form-control" id="txtdepartment" name="txtdepartment">
							</div>							
							<div class="col-md-6">
								<label for="Name">Salary</label>
								<input type="text" class="form-control" id="txtsalary" name="txtsalary">
							</div>														
						</div>						
						<p></br></p>
						<div class="row">
							<div class="col-md-12">								
								<button id="btncst"  name="btncst" class="btn btn-success btn-lg">Signup</button>
							</div>
						</div>																		
						</div>
					</form>
					<div class="panel-footer">Hotel Management Systems</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>		