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
				<li><a href="Masteruser.php">Home</a></li>				
				<li><a href="cart_details.php">Service Request</a></li>	
				<li><a href="feedback.php">Feedbacks</a></li>				
				<li><a href="logout.php">Log out</a></li>	
			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li><a href="#"><?php echo "Hi ".$_SESSION["uname"]; ?></a></li>			
			</ul>			
		</div>
	</div>
	
	<p><br></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12" id="product_msg">
						
					</div>
				</div>
				<h2 align="center" style="color:#;">Interior Design Systems</h2>
				<div class="panel panel-info">
					<div class="panel-heading">Service Request Details</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-2" >Action</div>
								<div class="col-md-2">Product Image</div>
								<div class="col-md-2">Model Id</div>
								<div class="col-md-2" align="center">Model Title</div>
								
								
								<div class="col-md-2" align="center">Price</div>
								
							</div>
							<div id="cart_checkout"></div>
							
						</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		
	</div>
	<div class="panel-footer" style="background-color:#000;color:#FFF;">&copy; 2024 Interior Design Systems</div>
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
			data	:	{getProduct:1},
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

$("body").delegate("#product","click",function(event){
	event.preventDefault();
	var p_id=$(this).attr('pid');
	$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{addToProduct:1,proId:p_id},
			success	:	function(data){
				$("#product_msg").html(data);
			}

	})
})

$("#cart_container").click(function(event){
	event.preventDefault();
	$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_cart_product:1},
			success	:	function(data){
				$("#cart_product").html(data);
			}

	})
})

	cart_checkout();
	function cart_checkout()
	{
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{cart_checkout:1},
			success	:	function(data){
				$("#cart_checkout").html(data);
			}

			})
	}
	
	
$("body").delegate(".qty","keyup",function(event){
	var pid = $(this).attr("pid");
	var qty = $("#qty-"+pid).val();
	var price = $("#price-"+pid).val();
	var total = qty * price;
	$("#total-"+pid).val(total);

})	
	
	$("body").delegate(".remove","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("remove_id");
		alert(pid);
		$.ajax({
			url		:	"action1.php",
			method	:	"POST",
			data	:	{removeFromCart:1,pid:pid},
			success	:	function(data){
				alert(data);
				cart_checkout();
			}

		})
})	


	$("body").delegate(".update","click",function(event){
		event.preventDefault();
	var pid = $(this).attr("update_id");
	var qty = $("#qty-"+pid).val();
	var price = $("#price-"+pid).val();
	var total = $("#total-"+pid).val();
		$.ajax({
			url	:"action1.php",
			method	:	"POST",
			data	:	{updateProduct:1,updateId:pid,qty:qty,price:price,total:total},
			success	:	function(data){
				alert(data);
				cart_checkout();
			}
			
		})
})	

})

</script>