<?php
require "Connection.php";
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
}

function fill_Id($con)
{
	
	$sql = "select max(DesignId)+1 from designs";
	$result=mysqli_query($con,$sql);
	while($data = mysqli_fetch_row($result))
	{
			echo $data[0];
	}	
}

if(isset($_POST['btndesigns']))
{         
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	$txtno	 	= 	$_POST['txtno'];
	$txttitle		= 	$_POST['txttitle'];	
	$txtdesc		= 	$_POST['txtdesc'];	
	$txtamt			= 	$_POST['txtamt'];	
		
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		mysqli_query($con,"insert into designs set 
							id		=	Null,
						Model_no	=	'$txtno',
						Title		=	'$txttitle',						
						Price		=	'$txtamt',												
						Description	=	'$txtdesc',
						image_type		=	'$file'")or die('Query Not Working 2 : '.mysqli_error());		
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
	<p></b></p>

<div class="container">
<div class="row">

				<div class="col-md-2"><div class="row"></div></div>
				<div class="col-md-8">
				<p></b></p>
				
				<div class="panel panel-info">
				<div class="panel-heading"></div>
				<div class="panel-body">				
					
						<table class="table table-bordered">
							<form class="col-md-12" method="post" action="#" id="frmdesigns" enctype="multipart/form-data">
								<h2 style="text-align:center;">Model Master</h2>														

							<table class="table table-bordered table-responsive">
					<tbody>
						<div class="form-group">
						<tr style="height="10px;">
							<td>Model No : <input type="text" name="txtno" id="txtno" class="form-control" >
				
							</td>
							
							<td>Model Name : <input type="text" name="txttitle" id="txttitle" class="form-control">
				
							</td>
						</tr>	
						<tr>
							
							<td>Price : <input type="text" name="txtamt" id="txtamt" class="form-control">
							<td colspan="2">Model Image : 	<input type="file" name="file" /></td>
						</tr>
						<tr>
								<td>Descriptions : <input type="text" name="txtdesc" multiline="true" id="txtdesc" class="form-control">						
						</tr>

						<tr>
							<td colspan="2"><button type="submit" id="btndesigns" name="btndesigns" class="btn btn-primary save center-block">Save</button>		</td>
						</tr>
						</div>
					</tbody>	
				</table>		
							
							</form>
						</table>
					</div>
				</div>
				</div>
				</div>
				<div class="col-md-2"><div class="row"></div></div>
</div>
</div>

<div class="container" style="background-color:#000;color:#cccccc;">
<div class="row">

<p style="text-align:center;">Copyrights &copy 2024 Interior Design Systems</p>

</div>
</div>
</body>
</html>