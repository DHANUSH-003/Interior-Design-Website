<?php
session_start();
if(!isset($_SESSION["uid"]))
{
	header("location:MasterAdmin.php");
}

require "Connection.php";
$results = mysql_query("select * from feedbacks");

?>

<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Online Auction System</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</head>
	
<body style="background-image:url(images/6.jpg)">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Online Auction System</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="products_view.php">Products</a></li>
				<li><a href="clients_view.php">Clients</a></li>
				<li><a href="auction_view.php">Auctions</a></li>
				<li><a href="feedbackview.php">Feedbacks</a></li>
				<li><a href="logout.php">Logout</a></li>			
								
			</ul>
			<ul class="nav navbar-nav navbar-right">				
				<li><a href="#"><?php echo "Hi ".$_SESSION["uname"]; ?></a>
				</li>
				<li><a href="logout.php">Logout</a></li>
			</ul>			
		</div>
	</div>
	
	<p><br></p>
	<div class="container-fluid">
	<p><br></p>
		<div class="row">


			
			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading text-center">Products Auction Rate Details</div>
					<div class="panel-body"> 

						
								<div class="col-md-12">		
			<table class="table table-striped table-hover table-bordered">
				<thead class="thead-dark" style="background-color:#BDB76B">
					<tr>
						
						<th>Name</th>
						<th>Mobile</th>
						<th>Feedbacks</th>
						
						
						
					</tr>
				</thead>
				<tbody>
					<?php 
						while ($row=mysql_fetch_array($results))
						{
							?>
							<tr>
								<td><?php echo $row['Name']; ?></td>
								<td><?php echo $row['Mobile']; ?></td>
								<td><?php echo $row['feedback']; ?></td>								
								
							</tr>							
					<?php 
						}
					?>

				</tbody>
			</table>
		</div>
		
						

						</div>
					</form>
					<div class="panel-footer">Online Auction System</div>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>		
