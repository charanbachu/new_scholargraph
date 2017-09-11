<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script> -->
	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
	<script>
		$(document).ready(function(){
		  $("#search").keyup(function(){
			if($("#search").val().length>2){
			$.ajax({
				type: "post",
				url: "/main/auto_search",
				cache: false,				
				data:'search='+$("#search").val(),
				success: function(response){
					$('#result').html("");

					var obj = JSON.parse(response);
					if(obj.length>0){
						//alert("charan");
						try{
						$.each(obj, function(i,val) {  
						     $('#result')
						         .append($('<div onclick="myfunction(\''+val.COLL_NAME+'\')"></div>')
						         .text(val.COLL_NAME)); 
						});

						}catch(e) {		
							alert('Exception while request..');
						}		
					}else{
						$('#finalResult').html($('<li/>').text("No Data Found"));		
					}		
					
				},
				error: function(){						
					alert('Error while request..');
				}
			});
			}
			return false;
		  });

		jQuery("#result").live("click",function(e){ 
		    var $clicked = $(e.target);
		    var $name = $clicked.find('.name').html();
		    var decoded = $("<div/>").html($name).text();
		    $('#searchid').val(decoded);
		});
		jQuery(document).live("click", function(e) { 
		    var $clicked = $(e.target);
		    if (! $clicked.hasClass("search")){
		    jQuery("#result").fadeOut(); 
		    }
		});
		$('#searchid').click(function(){
		    jQuery("#result").fadeIn();
		});
		});
	</script>
	<script type="text/javascript">
	function myfunction(college){
		//alert("sada");
		var elem = document.getElementById("search");
		elem.value = college;
	}
	</script>

</head>
<body>
<div id="container">
	<h1>Login!</h1>
	<?php
	$data = array(
	'name' => 'search',
	'id'   => 'search',
	);
	echo form_open('main/collegedetails');
	echo validation_errors(); 
	echo "<p>Note:- Please start typing</p>";
	echo form_input($data);
	echo form_submit('college_submit', 'Submit');
	echo "<br>";
	echo "<div id = result > </div>";
	echo form_close();
	echo form_open('main/login_validation');
	echo validation_errors();
	echo "<p>Email: ";
	echo form_input('email',$this->input->post('email'));
	echo "</p>";
	echo "<p>Password: ";
	echo form_password('password');
	echo "</p>";
	echo "<p>";
	echo form_submit('login_submit', 'Login');
	echo "</p>";
    
	echo form_close();
	
	?>
	<a href='<?php echo base_url()."main/signup"?>'>Sign Up</a>
	<a href='<?php echo base_url()."Communication/Home_Page"?>'>Communication Platform</a>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>