<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Questions Home Page</title>
		<meta content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For polyfill support across non-compatible browsers-->
		<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>
		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/college-profile-vulc.html'?>">

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/tree.jquery.js"></script>
		<script type="text/javascript" src="/assets/js/encode_req.js"></script>
		<link rel="stylesheet" href="/assets/css/jqtree.css">

		<style is="custom-style" include="iron-flex iron-flex-alignment">
			html,body{
				height: 100%;
				margin: 0;
				font-family:'Roboto', 'Noto', sans-serif;
				background-color: #fafafa;
			}

			a{
				text-decoration: none;
			}

			#toolbar{
				background-color: #253a52;
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

			#menuButton{
				display: none;
			}

			#searchForm{
				width: 0px;
				margin-right: 5%;
				-webkit-transition: width .35s; /* Safari */
				transition: width .35s;
			}

			#searchBar{
				--paper-input-container-focus-color: #ffc107;
				--paper-input-container-input-color: white;
			}

			paper-ripple{
				color: #ffc107;
			}

			app-drawer{
				border-right: 1px solid rgba(0,0,0,0.14);
			}

			.drawer-link{
				text-decoration: none;
			}

			.drawer-item{
				padding: 5%;
				font-family: 'Roboto Slab', 'Roboto', 'Noto', sans-serif;
				font-size: 15px;
				/*border-bottom: 1px solid rgba(0,0,0,0.14);*/
				color: black;
				font-weight: bold;
				opacity: 0.87;
			}

			#profileContainer{
				height: 220px;
				width: 256px;
				background: url("/assets/images/backgrounds/profileBackground.jpg");
				background-size: cover;
			}

			#profilePic{
				position: relative;
				height: 150px;
				width: 150px;
				margin: auto;
				top: 30px;
				border-radius: 50%;
				overflow: hidden;
			}

			#profileDetails{
				display: block;
				color: white;
				text-align: center;
				margin-top: 40px;
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

			@media only screen and (max-width : 640px){
				#menuButton{
					display: inline-block;
				}
			}

			#container{
				margin-top: 5%;
			}

			@media only screen and (min-width: 640px){
				#container{
					@apply(--layout-horizontal);
				}

				#questionContainer, #homeContainer{
					@apply(--layout-flex);
					display: inline-block;
				}
			}

			#questionContainer, #homeContainer{
				text-align: center;
			}

			#questionContainer img, #homeContainer img{
				border-radius: 50%;
				opacity: 1;
				transition: box-shadow .3s cubic-bezier(0.215,0.61,0.355,1), opacity .3s cubic-bezier(0.215,0.61,0.355,1);
			}

			#questionContainer img:hover, #homeContainer img:hover{
				box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
				opacity: 0.85;
			}

			#questionContainer span, #homeContainer span{
				position: relative;
				top: 5%;
				font-size: 24px;
				opacity: 0.87;
			}
		</style>
	</head>

	<body>

	<app-drawer-layout fullbleed>

		<app-drawer>
			<div id="profileContainer">
				<div id="profilePic"><img src="/assets/images/profilePics/profile1.jpg" style="width:150px;height:150px;"></div>
				<div id="profileDetails"><?php echo $this->session->email ?></div>
			</div>
			<a href="/" class="drawer-link"><div class="drawer-item">Home</div></a>
			<a href="/search/" class="drawer-link"><div class="drawer-item">Search</div></a>
			<a href="/Communication/Home_Page" class="drawer-link"><div class="drawer-item">Communication platform</div></a>
			<a href="/college/compare" class="drawer-link"><div class="drawer-item">Compare colleges</div></a>
			<a href="/main/structure_nodes" class="drawer-link"><div class="drawer-item">Take survey</div></a>
			<a href="/user/profile/" class="drawer-link"><div class="drawer-item">My account</div></a>
			<a href="/main/logout/" class="drawer-link"><div class="drawer-item">Logout</div></a>
		</app-drawer>

		<app-header-layout>
			<app-header fixed effects="waterfall">
	    		<app-toolbar id="toolbar">
	    			<paper-icon-button icon="menu" id="menuButton" onclick="document.querySelector('app-drawer').toggle();" style="color: white;"></paper-icon-button>
	        		<span title id="logo"><span id="pre">SCHOLAR</span><span id="post">FACT</span></span>
			    	<form id="searchForm" action="/search/" method="get">
			    		<div id="searchBox">
				    		<paper-input id="searchBar" label="Search" name="query" no-label-float>
				    			<paper-icon-button style="color:white" icon="search" onclick="toggleSearchBar();" prefix></paper-icon-button>
				    		</paper-input>
				    		<paper-card id="results"></paper-card>
			    		</div>
			    	</form>
	      		</app-toolbar>
	    	</app-header>

			<div id="container">
				<div id="questionContainer">
					<a href="structure_nodes"><img src="<?php echo base_url().'assets/images/icons/answer-icon.svg'?>" style="width: 50%;"></a>
					<br>
					<span>Answer more question</span>
				</div>
				<div id="homeContainer">
					<a href="index"><img src="<?php echo base_url().'assets/images/icons/homepage-icon.svg'?>" style="width: 50%;"></a>
					<br>
					<span>Go to homepage</span>
				</div>
			</div>

		</app-header-layout>
	</app-drawer-layout>

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

		function toggleSearchBar(){
			searchForm = document.getElementById("searchForm");
			if(searchForm.style.width == '256px'){
				searchForm.style.width = '0px';
			}
			else{
				searchForm.style.width = '256px';
				document.getElementById("searchBar").focus();
			}
		}
	</script>

	</body>
</html>