<?php 
session_start();
require "Connection.php";
if(!isset($_SESSION["uid"]))
{
	header("location:index.php");
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
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>

			<div class="col-md-10">
				<h2 align="center" style="color:#;">Interior Design Systems - Feedbacks</h2>
				<div class="panel panel-primary">
					<div class="panel-heading">Feedbacks From Clients</div>
					<div class="panel-body" style="background-color:#EEE8AA;"> 
						<form method="post">
					
									
			<table class="table table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
					<th>Feedback Id</th>
						<th>User Name</th>
						
						<th>Mobile</th>
						
						<th>Feedbacks</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
						$results = mysqli_query($con,"select * from feedbacks");
						while ($row=mysqli_fetch_array($results))
						{
							?>
							<tr>
								<td><?php echo $row['fid']; ?></td>
								
								<td><?php echo $row['Name']; ?></td>
								
								<td><?php echo $row['Mobile']; ?></td>
								<td><?php echo $row['feedback']; ?></td>
								
																								
							</tr>							
					<?php 
						}
					?>

				</tbody>
			</table>						
					
											
																		
						<p></br></p>
																								
						</div>
					</form>
					<div class="panel-footer">Interior Design Systems</div>
				</div>
				
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>

	
	
	