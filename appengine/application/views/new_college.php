<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html" charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New College</title>
	<!-- For polyfill support across non-compatible browsers-->
	<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>
	<!--importing vulcanized polymer dependencies-->
	<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/poly-imports-vulc.html'?>">

	<style is="custom-style" include="iron-flex iron-flex-alignment">
		html,body{
			height: 100%;
			margin: 0;
			font-family:'Roboto', 'Noto', sans-serif;
			/*background-color: #ffc107;*/
		}
		#header{
			--paper-toolbar-background: #253a52;
		}
		#logo{
			color: white;
			word-spacing: -0.15em;
			/*font-size: 2em;*/
		}
		#logo #pre{
			font-weight: 300;
		}
		#logo #post{
			font-weight: 800;
			color: #ffc107;
		}
		#logoutButton{
			margin-left: 15%;
			margin-right: 15%;
			position: relative;
			display: inline-block;
			padding: 10%;
			cursor: pointer;
			color: white;
		}
		#searchForm{
			margin-right: 12%;
			width: 50%;
		}
		#searchBar{
			--paper-input-container-focus-color: #ffc107;
			--paper-input-container-input-color: white;
		}

		#results{
			position: absolute;
			width: 256px;
			z-index: 100;
		}

		.searchItem{
			text-decoration: none;
			padding: 5%;
			color: black;
			font-size: 14px;
			text-transform: capitalize;
		}

		.searchItem:hover{
			background-color: lightgrey;
		}
		paper-ripple{
			color: #ffc107;
		}
		#footer{
			width: 100%;
			padding: 5%;
			background-color: #253a52;
			color: white;
		}
		#collegeBlock{
			width: 40%;
			padding: 5%;
			margin: 0 auto;
			margin-top: 5%;
			margin-bottom: 5%;
			border: 4px solid #253a52;
		}
		paper-input{
			--paper-input-container-focus-color: #ffc107;
		}
		iron-icon{
			margin-right: 2%;
			color: #253a52;
		}
		#submitButton{
			width: 100%;
			text-align: center;
			padding-top: 4%;
			padding-bottom: 4%;
			margin-top: 5%;
			background-color: #253a52;
			color: white;
			position: relative;
			cursor: pointer;
			word-spacing: -0.15em;
			font-weight: 300;
		}
		@media only screen and (max-width : 600px){
			html,body{
				height: 100vh;
			}
			#collegeBlock{
				width: 80%;
				padding-bottom: 15%;
				margin-top: 15%;
				margin-bottom: 15%;
			}
		}
		.suggestion{
			padding: 2%;
		}
		.suggestion:hover{
			background-color: lightgrey;
		}
		paper-listbox{
			border: 1px solid #e5e5e5;
			display: none;
		}
	</style>
	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->

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
						         .append($('<div class="suggestion" onclick="myfunction(\''+val.COLL_NAME+'\')"></div>')
						         .text(val.COLL_NAME));
						     $('#result').css("display","block");
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
		});
		$(document).ready(function(){
		  $("#country_code").keyup(function(){
			if($("#country_code").val().length>2){
				//alert($("#country_code").val());
			$.ajax({
				type: "post",
				url: "/main/country_search",
				cache: false,
				data:'search='+$("#country_code").val(),
				success: function(response){
					$('#result1').html("");
					//alert($data);
					var obj = JSON.parse(response);
					if(obj.length>0){
						try{
						$.each(obj, function(i,val) {
						     $('#result1')
						         .append($('<div class="suggestion" onclick="myfunction2(\''+val.Country_Name+'\')"></div>')
						         .text(val.Country_Name));
						     $('#result1').css("display","block");
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
		});

		$(document).ready(
			function()
			{
		  	$("#searchBar").on("keyup focus",function()
		  	{
				if($("#searchBar").val().length>2)
				{
					$.ajax({
							type: "post",
							url: "/main/auto_search",
							cache: false,
							data:'search='+$("#searchBar").val(),
							success: function(response)
							{
								$('#results').html("");
								var obj = JSON.parse(response);
								if(obj.length>0)
								{
									try
									{
										$.each(obj,function(i,val)
										{
											$('#results').append('<a style="text-decoration:none;" href="/college/details/'+encode_id(val.COLL_ID)+'"><div class="searchItem">'+val.COLL_NAME+'</div></a>');
										});
									}
									catch(e)
									{
										alert(e);
										alert('Exception while request.');
									}
								}
							}
						});
				}
			return false;
			});

			$("#searchBar").blur(function(){
				setTimeout(function(){
					$('#results').html("");
				},100);
			});
		});

	function myfunction(college){
			var elem = document.getElementById("college1");
		elem.value = college;
		document.getElementById('result').style.display = "none";
	}
	function myfunction2(college){
			var elem = document.getElementById("country_code");
		elem.value = college;
		document.getElementById('result1').style.display = "none";
	}
	</script>
</head>
<body>
	<paper-header-panel class="flex" mode="waterfall">
	    <paper-toolbar id="header">
	    	<span class="title" id="logo"><span id="pre">SCHOLAR</span><span id="post">FACT</span></span>
	    	<form id="searchForm" action="/search/">
	    		<paper-input id="searchBar" label="SEARCH" name="query" no-label-float>
	    			<iron-icon style="color:white" icon="search" prefix></iron-icon>
	    		</paper-input>
	    		<paper-card id="results"></paper-card>
	    	</form>
	    	<a href="<?php echo base_url()."main/logout"?>"><div id="logoutButton"><paper-ripple></paper-ripple>LOGOUT</div></a>
	    </paper-toolbar>

	    <div id="content">
	    	<div id="collegeBlock">
	    		<span style="color:#253a52;font-size: 2em;">Enter College Details</span>

	    		<form id="collegeForm" is="iron-form" method="post" action="<?php echo base_url().'main/college_validation';?>">
	    			<paper-input label="College Name" name="college1" id="college1" type="text" auto-validate required error-message="College name required!">
	    				<iron-icon icon="social:school" prefix></iron-icon>
	    			</paper-input>
	    			<paper-listbox id="result"></paper-listbox>
	    			<paper-input label="Country Name" name="country_code" id="country_code" type="text" auto-validate required error-message="Country required!">
	    				<iron-icon icon="room" prefix></iron-icon>
	    			</paper-input>
	    			<paper-listbox id="result1"></paper-listbox>
	    			<div id="submitButton" onclick="submitForm('collegeForm')">
	    				<paper-ripple></paper-ripple>SUBMIT
	    			</div>
	    		</form>
	    	</div>

	    	<div id="footer">
	    		<div>Contact us</div>
			</div>
	    </div>
	</paper-header-panel>
	<script>
		function submitForm(id) {
  			document.getElementById(id).submit();
  			console.log(id);
		}
	</script>

	<?php
	// $data = array(
	// 'name' => 'college1',
	// 'id'   => 'college1',
	// );
	// $data1 = array(
	// 'name'  => 'country_code',
	// 'id'    => 'country_code'
	// );
	// echo form_open('main/college_validation');
	// echo validation_errors();
	// echo "<p>College1: ";
	// echo form_input($data);
	// echo "</p>";
	// echo "<div id = result > </div>";
	// echo '<br>';
	// echo 'Country Name:';
	// echo form_input($data1);
	// echo "</p>";
	// echo "<div id = result1 > </div>";
	// echo form_submit('college_submit', 'Submit');
	// echo "</p>";
	// echo form_close();
	?>
<br>
</body>
</html>