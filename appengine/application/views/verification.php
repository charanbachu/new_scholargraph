<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html" charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Verification</title>
	<!-- For polyfill support across non-compatible browsers-->
	<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>
	<!--importing vulcanized polymer dependencies-->
	<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/poly-imports-vulc.html'?>">

	<style is="custom-style" include="iron-flex iron-flex-alignment">
		html,body{
			height: 100%;
			margin: 0;
			font-family:'Roboto', 'Noto', sans-serif;
/*			background-color: #ffc107;
*/		}

		#header{
			--paper-toolbar-background: #253a52;
		}

		#logo{
			color: white;
			word-spacing: -0.15em;
/*			font-size: 2em;
*/		}

		#logo #pre{
			font-weight: 300;
		}

		#logo #post{
			font-weight: 800;
			color: #ffc107;
		}

		#loginButton, #signupButton{
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

		paper-ripple{
			color: #ffc107;
		}

		#footer{
			width: 100%;
			padding: 5%;
			background-color: #253a52;
			color: white;
		}

		#otpBlock{
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
			#otpBlock{
				width: 80%;
				padding-bottom: 15%;
				margin-top: 15%;
				margin-bottom: 15%;
			}
		}
	</style>
</head>
<body>
	<paper-header-panel class="flex" mode="waterfall">
	    <paper-toolbar id="header">
	    	<span class="title" id="logo"><span id="pre">SCHOLAR</span><span id="post">FACT</span></span>
	    	<form id="searchForm">
	    		<paper-input id="searchBar" label="SEARCH" no-label-float>
	    			<iron-icon style="color:white" icon="search" prefix></iron-icon>
	    		</paper-input>
	    	</form>
	    	<a href="<?php echo base_url()?>"><div id="loginButton"><paper-ripple></paper-ripple>LOGIN</div></a>
	    	<a href="<?php echo base_url()."main/signup"?>"><div id="signupButton"><paper-ripple></paper-ripple>SIGNUP</div></a>	    	
	    </paper-toolbar>

	    <div id="content">
	    	<div id="otpBlock">
	    		<span style="color:#253a52;font-size: 2em;">OTP Verification</span>
	    		
	    		<form id="otpForm" is="iron-form" method="post" action="<?php echo base_url().'main/otp_verification';?>">
	    			<paper-input label="OTP" name="otp" id="otp" type="password" auto-validate required error-message="OTP required!">
	    				<iron-icon icon="lock" prefix></iron-icon>
	    			</paper-input>
	    			<div id="submitButton" onclick="submitForm('otpForm')">
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

	//echo form_open('main/otp_verification');
	//echo validation_errors();
	//echo "<p>Enter Your OTP: ";
	// echo form_input('otp',$this->input->post('otp'));
	// echo "</p>";
	// echo "<p>";
	// echo form_submit('signup_submit', 'Login');
	//echo "</p>";
	//echo form_close();

	?>
</body>
</html>