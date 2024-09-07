<?php 
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Bookstore</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body  style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Book Store</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="Masteruser.php">Home</a></li>				
				<li><a href="cart_details.php">Cart Details</a></li>
					<li><a href="feedback.php">Feedbacks</a></li>
				<li><a href="logout.php">Log out</a></li>	
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge"></span></a>
				<div class="dropdown-menu" style="width:400px;">
					<div class="panel panel-success">
						<div class="panel-heading">
						</div>
						<div class="panel-body">

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
				<div class="row">
					<div class="col-md-12" id="product_msg">
						
					</div>
				</div>
				
				


				<h2 align="center" style="color:#;">Thank You For Your Shopping</h2>
				<div class="panel panel-info">
					<div class="panel-heading"></div>
						<div class="panel-body">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									
							<h2 align="center" style="color:#cc9966;"><?php echo $_SESSION['uname']; ?></h2>
							




							
							<p><br></p>
							
								
								
							
							
</div>

						</div>
						</form>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		
	</div>
	<div class="panel-footer" style="background-color:#000;color:#FFF;">&copy; 2020 Book Store Management Systems</div>
</body>
</html>

