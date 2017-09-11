<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sign up | Scholarfact</title>
		<meta content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For polyfill support across non-compatible browsers-->
		<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icons/home-icon.png'?>"/>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports-vulc.html'?>">

		<!-- common css for header, footer, sidebar, etc. -->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">

		<style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
			body{
				min-height: 100vh;
			}
			#container{
				width: 100%;
				margin: 0 auto;
				padding-top: 3%;
				padding-bottom: 4%;
				box-sizing: border-box;
			}
			.tab-container{
				border-bottom: 1px solid var(--main-color);
				padding-bottom: 5px;
			}
			.tab{
				display: inline-block;
				text-align: center;
				padding: 10px 0;
				margin: 0 5px;
				color: white;
				transition: background-color .3s cubic-bezier(0.215,0.61,0.355,1);
				cursor: pointer;
			}
			.signup-tab{
				background-color: var(--main-color);
			}
			.login-tab{
				color: var(--special-font-color);
			}
			#table-container{
				/*border-radius: 6px;*/
				/*border: 1px solid var(--main-color);*/
				  @apply(--shadow-elevation-2dp);
				  background-color: #fcfcfc;
				max-width: 410px;
				margin: 0 auto;
				box-sizing: border-box;
				padding: 10px;
				/*height: 525.4px;*/
			}
			@media only screen and (max-width: 1024px){
				#table-container{
					width: 90%;
				}
			}
			@media only screen and (max-width: 640px){
                #toolbar {
                    padding-right: 0px;
                    padding-left: 8px;
                }
            }
			table{
				width: 100%;
			}
			paper-input{
				--paper-input-container-invalid-color: #d38888;
				--paper-input-container-focus-color: var(--main-color);
				--paper-input-prefix: {
					margin: 5px 0;
					margin-right: 5px;
					color: var(--special-font-color);
					cursor: pointer;
				};
				--paper-input-container: {
					padding-top: 0px;
					padding-bottom: 8px;
				}
				--paper-input-container-underline: {
					background-color: #eaeaea;
				};
			}
			paper-input:hover{
				--paper-input-prefix: {
					color: var(--main-color);
				};
			}
			#match{
				font-size: 12px;
			}
			.submitButton{
				width: 80%;
				display: block;
				margin: 10px auto;
				margin-top: 20px;
				text-align: center;
				color: white;
				background: var(--main-color);
				background: -moz-linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));
				background: linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr= var(--main-color-gradient-start),endColorstr= var(--main-color-gradient-end),GradientType=0);
				text-transform: capitalize;
			}
			.social-login{
				text-align: center;
				margin-top: 30px;
			}
			.social-login h2{
				width: 100%;
				text-align: center;
				border-bottom: 1px solid rgba(0,0,0,0.28);
				line-height: 0.1em;
				margin: 10px 0 20px;
				margin-top: 30px;
				font-size: 18px;
				opacity: 0.87;
				color: black;
			}
			h2 span {
				background:#fff;
				padding:0 10px;
				/*text-transform: uppercase;*/
			}
			#loginForm{
				display: none;
			}
			#toolbarSearchContainer, .toolbarLink, #loginButton, #toolbarAccountIcon, #expandableSearch{
				display: none;
			}
			#loader-wrapper{
			    position: fixed;
			    top: 0;
			    left: 0;
			    width: 100%;
			    height: 100%;
			    opacity: 1;
			    z-index: 1000;
				display: table;
				background-color: white;
				margin: 0;
				overflow-x: hidden;
				overflow-y: hidden;
				transition: 0.3s opacity;
			}
			.acor:hover {
				text-decoration: underline;
			}
			.sup {
				color: #595959;
			}
			.faceBox:hover {
				cursor: pointer;
			}
		</style>

		<script>
			$(document).ready(function(){ 
                    if ($(window).width() < 1025) { 
                        var mbtn =  document.getElementsByClassName("mbtn"); 
                        mbtn[0].style.display = "block";
                    } 
            });
			document.addEventListener('WebComponentsReady', function () {
				var loaderWrapper = document.getElementById("loader-wrapper");
				document.getElementById("tabIcon").style.display = "none";
				document.getElementById("srh").style.display = "none";
				document.getElementById("logo").style.display = "block";
				var x = document.getElementsByClassName("logoMob");
				x[0].style.display = "none";
				loaderWrapper.style.opacity = "0";
				setTimeout(function(){
					loaderWrapper.style.display = "none";
				},300);
			});
		</script>
	</head>

	<body>
		<div id="loader-wrapper">
		</div>
		<app-drawer-layout fullbleed responsive-width="1024px">

			<app-drawer>
				<?php include "common_components/app-drawer.php" ?>
			</app-drawer>

			<app-header-layout>
				<app-header fixed effects="waterfall">
		    		<?php include "common_components/app-header.php" ?>
		    	</app-header>

		    	<div id="container" class="flex-container-desktop">
		    		<div class="flex-desktop">
		    			<div id="table-container">
		    				<div class="tab-container flex-container" style="background-color: #fcfcfc;">
			    				<div class="tab flex signup-tab sup" onclick="switchTab('signupForm','loginForm','signup-tab','login-tab')" style="border-right: 1px solid #009688;  background-color: #fcfcfc; color: #595959; 
			    				"><span>Sign up</span></div>
			    				<div class="tab flex login-tab sup" onclick="switchTab('loginForm','signupForm','login-tab','signup-tab')">Log in</div>
		    				</div>
	    					<form id="signupForm" is="iron-form" method="post" action="<?php echo base_url().'main/signup_validation';?>">
	    						<div class="social-login" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
				    				<div class="faceBox" style="display: flex; justify-content: center; align-items: center; width: 250px; height: 47px; border-radius: 3px; background-color: #3b5998;"><a href="<?php echo $this->facebook->login_url(); ?>"><span style="color: #fff; font-size: 17px;">Login with Facebook</span></a></div>
				    				<br>
				    				<div class="faceBox" style="display: flex; justify-content: center; align-items: center; width: 250px; height: 47px; border-radius: 3px; background-color: #007bb6;"><span style="color: #fff; font-size: 17px;">Login with LinkedIn</span></a></div>
				    				<h2><span style="background-color: #fcfcfc;">or</span></h2>
				    			</div>
	    						<table>
	    						<tr><td>
		    						<paper-input label="Name" name="user_name" id="user_name" type="text" auto-validate error-message="Name required!" value="<?php echo $this->input->post('name')?>" required">
					    				<iron-icon icon="account-circle" prefix></iron-icon>
					    			</paper-input>
					    			<p><font color="red", size="2px"><?php echo $name_error ?></font></p>
		    					</td></tr>
		    					<tr><td>
		    						<paper-input label="Email Id" name="email" id="new_email" type="email" auto-validate error-message="Email required!" value="<?php echo $this->input->post('email')?>" required style="margin-top: 30px;">
					    				<iron-icon icon="mail" prefix></iron-icon>
					    			</paper-input>
					    			<p><font color="red", size="2px"><?php echo $email_error ?></font></p>
		    					</td></tr>
		    					<tr><td>
		    						<paper-input label="Password" name="password" id="signupPass" type="password" auto-validate required error-message="Password required!" style="margin-top: 30px;">
					    				<iron-icon icon="lock" prefix></iron-icon>
					    			</paper-input>
		    					</td></tr>
				    			</table>
				    			<paper-button class="submitButton" onclick="submitForm('signupForm')">
				    				Sign up
				    			</paper-button>
				    			<div style="width: 100%; display: flex; justify-content: center; margin-top: 15px; margin-bottom: 10px;">
					    			<a class="acor" style="color: #009688; cursor: pointer; text-decoration: none;" onclick="switchTab2('signupForm','loginForm','signup-tab','login-tab')">
					    			Already a user? Login
					    			</a>
				    			</div>
	    					</form>
	    					<form id="loginForm" is="iron-form" method="post" action="<?php echo base_url().'main/login_validation';?>">
	    						<div class="social-login" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
				    				<div class="faceBox" style="display: flex; justify-content: center; align-items: center; width: 250px; height: 47px; border-radius: 3px; background-color: #3b5998;"><a href="<?php echo $this->facebook->login_url(); ?>"><span style="color: #fff; font-size: 17px;">Login with Facebook</span></a></div>
				    				<br>
				    				<div class="faceBox" style="display: flex; justify-content: center; align-items: center; width: 250px; height: 47px; border-radius: 3px; background-color: #007bb6;"><span style="color: #fff; font-size: 17px;">Login with LinkedIn</span></a></div>
				    				<h2><span style="background-color: #fcfcfc;">or</span></h2>
				    			</div>
				    			<paper-input label="Email Id" name="email" type="email" auto-validate error-message="Email required!" value="<?php $this->input->post('email');?>" required>
				    				<iron-icon icon="mail" prefix></iron-icon>
				    			</paper-input>
				    			<p><font color="red", size="2px"><?php echo $login_emailerror ?></font></p>
				    			<paper-input label="Password" name="password" id="pass" type="password" auto-validate required error-message="Password required!" style="margin-top: 30px;">
				    				<iron-icon icon="lock" prefix></iron-icon>
				    			</paper-input>
				    			<p><font color="red", size="2px"><?php echo $login_password ?></font></p>
				    			<paper-button class="submitButton" onclick="submitForm('loginForm')">
				    				Log in
				    			</paper-button>
				    			<div style="width: 100%; display: flex; justify-content: center; margin-top: 15px; margin-bottom: 10px;">
					    			<a class="acor" style="color: #009688; text-decoration: none;" href="window.location='<?php echo base_url().'user/forget_password';?>'">
					    				Forgot Password
					    			</a>
				    			</div>
				    		</form>
		    			</div>
		    		</div>
		    		<div>
		    		<form id="myForm" method="post" action = "<?php echo base_url().'main/signup_validation';?>">
						  <input type="hidden" id="name" name = "name">
						  <input type="hidden" id="email" name = "email">
						  <input type="hidden" id="password" name = "password">
						  <input type="hidden" id="ref_email" name = "ref_email">
					</form>
					<form id="myLoginForm" method="post" action = "<?php echo base_url().'main/login_validation';?>">
						  <input type="hidden" id="login_email" name = "email">
						  <input type="hidden" id="login_password" name = "password">
					</form>
		    		</div>
		    	</div>
		    	<footer>
		    		<?php include "common_components/footer.php" ?>
		    	</footer>
			</app-header-layout>
		</app-drawer-layout>
		<script type="text/javascript" src="/assets/js/toolbarSearch.js"></script>
		<script>
			if(<?php echo $tab ?> == 1)
			{
				var form2 = document.getElementById("signupForm");
				var form1 = document.getElementById("loginForm");
				var text2 = document.getElementsByClassName("signup-tab")[0];
				var text1 = document.getElementsByClassName("login-tab")[0];
				form1.style.display = "none";
				form2.style.display = "block";
				text2.style.backgroundColor = "#009688";
				text1.style.backgroundColor = "white";
				text2.style.color = "white";
				text1.style.color = "#595959";
			}
			function submitForm(id){
				var form = document.getElementById(id);
				if(id == "signupForm")
				{
					//console.log(document.getElementById('signupForm').elements[0].value);
					//console.log(document.getElementById('signupForm').elements[1].value);
					//console.log(document.getElementById('signupForm').elements[2].value);
					document.getElementById("name").value = document.getElementById('signupForm').elements[0].value;
					document.getElementById("email").value = document.getElementById('signupForm').elements[1].value;
					document.getElementById("password").value = document.getElementById('signupForm').elements[2].value;
					document.getElementById("password").value = document.getElementById('signupForm').elements[2].value;
					document.getElementById("ref_email").value = "";
					document.getElementById("myForm").submit();
				}
				else
				{
					document.getElementById("login_email").value = document.getElementById('loginForm').elements[0].value;
					document.getElementById("login_password").value = document.getElementById('loginForm').elements[1].value;
					//console.log(document.getElementById('myLoginForm').elements[0].value);
					//console.log(document.getElementById('myLoginForm').elements[1].value);
					document.getElementById("myLoginForm").submit();
				}
			}
			// function passwordConfirmation(){
			// 	var confirm = document.getElementById("signupConfirmPass");
			// 	var pass = document.getElementById("signupPass");
			// 	var match = document.getElementById("match");
			// 	if(confirm.value != ""){
			// 		if(confirm.value != pass.value){
			// 			match.innerHTML = "Password do not match!";
			// 			match.style = "color:#d38888;";
			// 		}
			// 		else{
			// 			match.innerHTML = "Password match!";
			// 			match.style = "color:#009688;";
			// 		}
			// 	}
			// }
			function switchTab(toId, fromId, activate, deactivate){
				var form1 = document.getElementById(toId);
				var form2 = document.getElementById(fromId);
				var text1 = document.getElementsByClassName(activate)[0];
				var text2 = document.getElementsByClassName(deactivate)[0];
				form2.style.display = "none";
				form1.style.display = "block";
				text1.style.backgroundColor = "#009688";
				text2.style.backgroundColor = "white";
				text1.style.color = "white";
				text2.style.color = "#595959";
			}
			function switchTab2(toId, fromId, activate, deactivate){
				var form1 = document.getElementById(toId);
				var form2 = document.getElementById(fromId);
				var text1 = document.getElementsByClassName(activate)[0];
				var text2 = document.getElementsByClassName(deactivate)[0];
				form1.style.display = "none";
				form2.style.display = "block";
				text2.style.backgroundColor = "#009688";
				text1.style.backgroundColor = "white";
				text2.style.color = "white";
				text1.style.color = "#595959";
			}
		</script>
	</body>
</html>