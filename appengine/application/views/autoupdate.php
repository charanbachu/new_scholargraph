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
		  $("#admission").keyup(function(){
		  	//alert("charan");
			if($("#admission").val().length>2){
				var search = $("#admission").val();
				//alert("ca");
				//alert(search);
				var college = $("#collegelist").val();
				var paramid = 2;
				//alert(college);
			$.ajax({
				type: "post",
				url: "/main/admission_search",
				cache: false,
				data:{search : search, college : college, paramid : paramid},
				success: function(response){
					$('#result').html("");
					var obj = JSON.parse(response);
					if(obj.length>0){
						try{
						$.each(obj, function(i,val) {  
						     $('#result')
						         .append($('<div onclick="myfunction(\''+val.VAL_DATA+'\')"></div>')
						         .text(val.VAL_DATA)); 
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
		  $("#college_url").keyup(function(){
		  	//alert("charan");
			if($("#college_url").val().length>2){
				var search = $("#college_url").val();
				//alert("ca");
				//alert(search);
				var college = $("#collegelist").val();
				var paramid = 1;
				//alert(college);
			$.ajax({
				type: "post",
				url: "/main/admission_search",
				cache: false,
				data:{search : search, college : college, paramid : paramid},
				success: function(response){
					$('#result1').html("");
					var obj = JSON.parse(response);
					if(obj.length>0){
						try{
						$.each(obj, function(i,val) {  
						     $('#result1')
						         .append($('<div onclick="myfunction(\''+val.VAL_DATA+'\')"></div>')
						         .text(val.VAL_DATA)); 
						});

						}catch(e) {		
							alert('Exception while request..');
						}		
					}else{
						$('#result1').html($('<li/>').text("No Data Found"));		
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
			var elem = document.getElementById("admission");
			elem.value = college;
	}
	function myfunction(college){
			var elem = document.getElementById("college_url");
			elem.value = college;
	}
	</script>
</head>
<body>

<div id="container">
	<h1>Memberspage</h1>
	<?php
	$data = array(
	'name' => 'admission',
	'id'   => 'admission',
	);
	$data1 = array(
	'name' => 'college_url',
	'id'   => 'college_url',
	);
	echo form_open('main/question_validation');
	echo validation_errors();
	echo '<select name="collegelist" id = "collegelist">';
  	echo '<option>';
  	echo $this->session->college1;
  	echo ' </option>';
  	echo '<option>';
  	echo $this->session->college2;
  	echo '</option>';
	echo '</select>';
	echo '<br>';
	echo $question['0'];
	echo form_input($data1);
	echo "<div id = result1 > </div>";
	echo "<p> ";
	echo $question['1'];
	echo form_input($data);
	echo "<div id = result > </div>";
	echo "<p> ";
	echo $question['2'];
	echo form_input('cutoff');
	echo "<p> ";
	echo $question['3'];
	echo form_input('fee');
	echo "<p> ";
	echo $question['4'];
	echo '<br>';
	echo form_checkbox('type[]', 'kindergarten', FALSE);
	echo "Kindergarten";
	echo '<br>';
	echo form_checkbox('type[]', '10+2', FALSE);
	echo "10+2";
	echo '<br>';
	echo form_checkbox('type[]', 'bachelors', FALSE);
	echo "Bachelors (Degree / Diploma)";
	echo '<br>';
	echo form_checkbox('type[]', 'masters', FALSE);
	echo "Masters(Degree / Diploma)";
	echo '<br>';
	echo form_checkbox('type[]', 'doctoral', FALSE);
	echo "Doctoral(Degree / Diploma)";
	echo '<br>';
	echo form_checkbox('type[]', 'research Institute', FALSE);
	echo "Research Institute";
	echo '<br>';
	echo "</p>";
	echo "<p>Year start:";
	echo form_input('year_start');
	echo "</p> ";
	echo "<p>Year End:";
	echo form_input('year_end');
	echo "</p> ";
	echo "<p>";
	echo form_submit('college_submit', 'Submit');
	echo "</p>";

	echo form_close();
	
	

	?>
<a href='<?php echo base_url()."main/logout"  ?>'> Logout </a>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>