<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html" charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<!-- For polyfill support across non-compatible browsers-->
	<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

	<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/encode_req.js"></script>

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

		#loginBlock{
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
			#loginBlock{
				width: 80%;
				padding-bottom: 15%;
				margin-top: 15%;
				margin-bottom: 15%;
			}
		}
	</style>

	<script>
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
	    	<a href="<?php echo base_url().'main/login'?>"><div id="loginButton"><paper-ripple></paper-ripple>LOGIN</div></a>
	    	<a href="<?php echo base_url()."main/signup"?>"><div id="signupButton"><paper-ripple></paper-ripple>SIGNUP</div></a>
	    </paper-toolbar>

	    <div id="content">
	    	<div id="loginBlock">
	    		<span style="color:#253a52;font-size: 2em;">Login</span>
	    		<?php
					$data = array(
					'name' => 'search',
					'id'   => 'search',
					);
				?>
	    		<form id="loginForm" is="iron-form" method="post" action="<?php echo base_url().'main/login_validation';?>">
	    			<paper-input label="Email Id" name="email" type="email" auto-validate error-message="Email required!" value="<?php $this->input->post('email');?>" required style="margin-top: 30px;">
	    				<iron-icon icon="mail" prefix></iron-icon>
	    			</paper-input>
	    			<paper-input label="Password" name="password" id="pass" type="password" auto-validate required error-message="Password required!" style="margin-top: 30px;>
	    				<iron-icon icon="lock" prefix></iron-icon>
	    			</paper-input>
	    			<div id="submitButton" onclick="submitForm('loginForm')">
	    				<paper-ripple></paper-ripple>SUBMIT
	    			</div>
	    			<a href='<?php echo base_url()."main/signup"?>' style="float: right;margin-top:5%;text-decoration: none;color:#253a52;">Haven't registered? Sign Up now</a>
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
</body>
</html>