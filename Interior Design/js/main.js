$(document).ready(function(){
	cat();
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data:	{category:1},
			success	:	function(data){
				$("get_category").html(data);
			}
			
		})
	}
})