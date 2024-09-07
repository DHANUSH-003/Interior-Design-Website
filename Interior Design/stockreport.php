<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lift Equipments Sales Systems</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>		
		<script src="js/jquery-2.2.2.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Lift Equipments Sales Systems</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="MasterAdmin.php">Home</a></li>										
				<li><a href="productmaster.php">Product Master</a></li>				
				<li><a href="purchase.php">Purchase</a></li>				
				<li><a href="staffs.php">Staff</a></li>				
				<li><a href="salesreport.php">Sales Report</a></li>	
				<li><a href="enquiryreport.php">Enquiry Report</a></li>				
				<li><a href="stockreport.php">Stocks</a></li>				
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
					<div class="panel-heading">Sales Reports</div>
					<div class="panel-body"> 

									
					<div class="table-responsive">
						<table class="table table-bordered">
							<form class="col-md-12" method="post" action="#" id="frmexam">
								<h2 style="text-align:center;">Sales Reports</h2>														

								<?php include "stockresult_view.php" ?>
								
							
							</form>
						</table>
					</div>
				

					
					<div class="panel-footer">Lift Equipments Sales Systems</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>		