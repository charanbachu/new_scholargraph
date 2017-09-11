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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	
	<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
	<script>
		$(document).ready(function(){
		  $("#college1").keyup(function(){
			if($("#college1").val().length>2){
			$.ajax({
				type: "post",
				url: "/main/auto_search",
				cache: false,				
				data:'search='+$("#college1").val(),
				success: function(response){
					$('#result').html("");
					var obj = JSON.parse(response);
					if(obj.length>0){
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
						$('#result').html($('<li/>').text("No Data Found"));		
					}		
					
				},
				error: function(){						
					alert('Error while request..');
				}
			});
			}
			return false;
		  });
		$("#college2").keyup(function(){
			if($("#college2").val().length>2){
			$.ajax({
				type: "post",
				url: "/main/auto_search",
				cache: false,				
				data:'search='+$("#college2").val(),
				success: function(response){
					$('#result2').html("");
					var obj = JSON.parse(response);
					if(obj.length>0){
						try{
						$.each(obj, function(i,val) {  
						     $('#result2')
						         .append($('<div onclick="myfunction2(\''+val.COLL_NAME+'\')"></div>')
						         .text(val.COLL_NAME)); 
						});

						}catch(e) {		
							alert('Exception while request..');
						}		
					}else{
						$('#result2').html($('<li/>').text("No Data Found"));		
					}		
					
				},
				error: function(){						
					alert('Error while request..');
				}
			});
			}
			return false;
		  });
		});
	function myfunction(college){
			var elem = document.getElementById("college1");
		elem.value = college;
	}
	function myfunction2(college){
			var elem = document.getElementById("college2");
		elem.value = college;
	}
	</script>
</head>
<body>

<div id="container">
	<h1>Enter College Details</h1>
	<?php
	$data = array(
	'name' => 'college1',
	'id'   => 'college1',
	);
	$data1 = array(
	'name' => 'college2',
	'id'   => 'college2',
	);
	echo form_open('main/college_validation');
	echo validation_errors();
	echo "<p>College1: ";
	echo form_input($data);
	echo "</p>";
	echo "<div id = result > </div>";
	echo "<p>College2: ";
	echo form_input($data1);
	echo "</p>";
	echo "<div id = result2 > </div>";
	echo "<p>";
	echo form_submit('college_submit', 'Submit');
	echo "</p>";
	echo form_close();


	?>
<br>


<a href='<?php echo base_url()."main/logout"  ?>'> Logout </a>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>