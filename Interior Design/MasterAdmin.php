<?php 
session_start();
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
				<h2 align="center" style="color:#;">Interior Design Systems</h2>
				<div class="panel panel-info">
					<div class="panel-heading"></div>
						<div class="panel-body">
							<div class="table-responsive" align="center">

								<div id="get_product"></div>
								
							

							</div>
						</div>
						<div class="panel-footer" style="background-color:#000;color:#FFF;">&copy; 2024 Interior Design Systems</div>
				</div>
				
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</body>
</html>

<script>
$(document).ready(function(){
	
	product();
	function cat(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
			}
			
		})
	}
	
function product(){
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{getProduct_admin:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
			
		})
	}		
	
$("body").delegate("#category","click",function(event){
	event.preventDefault();
	var cid = $(this).attr('cid');

		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
			}
			
		})
})	


$("body").delegate(".product","click",function(event){
event.preventDefault();
var p_id= $(this).attr('pid');
	
		$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{addToProduct:1,proId:p_id},
			success	:	function(data){
				alert(data);
			}
			
		})
		
})		
$("#login").click(function(event){
	event.preventDefault();
	var email = $("#email").val();
	var pass = $("#password").val();
alert("hi");	
	$.ajax({
			url		:	"login.php",
			method	:	"POST",
			data	:	{UserLogin:1,userEmail:email,userPassword:pass},
			success	:	function(data){
					if(data == "Welcome To Petzone")
					{
						window.location.href="profile.php";
					}
			}
			
		})
})



	
	
})

</script>