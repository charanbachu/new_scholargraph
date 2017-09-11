<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Scholarfact</title>
		<meta content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For polyfill support across non-compatible browsers-->
		<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports-vulc.html'?>">

		<!-- common css for header, footer, sidebar, etc. -->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">

		<style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
		paper-input{
			--paper-input-container: {
					/*padding-bottm: 10px;*/
					padding-top: 20px;
					padding-bottom: 10px;
					font-size: 15px;
				}
		}
		paper-radio-group{
			padding-top: 5px;
					padding-bottom: 5px;
					
					color: red;
		}
		  .header2 {
      /*width: 600px;*/
      width: 100%;
      margin: 100px auto; 
      margin-left: 10%;
  }
  .progressbar {
      counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 25%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 30px;
      height: 30px;
      content: counter(step);
      counter-increment: step;
      line-height: 30px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 15px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
      /*color: green;*/
      color: #009688;
  }
  .progressbar li.active:before {
      border-color: #009688;
  }
  .progressbar li.active + li:after {
      background-color: #009688;
  }
		.table-container{
				/*border-radius: 6px;*/
				/*border: 1px solid var(--main-color);*/
				  @apply(--shadow-elevation-2dp);
				  background-color: #fcfcfc;
				max-width: 410px;
				margin: 0 auto;
				margin-bottom: 15px;
				/*box-sizing: border-box;*/
				/*padding-bottom: 1%;*/
				/*padding: 10px;*/
				/*height: 60%;*/
				/*height: 525.4px;*/
			}
		tr {
			margin-top: 10px;
			margin-bottom: 10px;
		}
		iron-icon
		{
			margin-right: 5px;
		}
		paper-button
		{
			background-color : #009688;
			color : white;
		}
		table{
				width: 100%;
			}
		#countrySearchResults{
			text-align: left;
			width: 100%;
			margin-top: 10px;
			overflow: auto;
		}
		#collegeSearchResults{
			text-align: left;
			width: 100%;
			margin-top: 10px;
			overflow: auto;
		}
		.searchItem{
			text-decoration: none;
			/*padding: 5%;*/
			color: black;
			font-size: 14px;
			text-transform: capitalize;
		}
		.searchItemCountry{
			text-decoration: none;
			padding: 2%;
			color: black;
			font-size: 14px;
			text-transform: capitalize;
		}
		.searchItem:hover ,.searchItemCountry:hover{
			background-color: lightgrey;
		}
		#completeTitle
		{
			padding : 10px;
			margin: 0 auto;
			font-size:24px;
			color: white;
			border-radius: 5px;
			text-align: center;
		}
		#collegeTitle
		{
			margin-top: 5%;
			text-align: center;
			padding-bottom: 5px;
			border-bottom: solid;
			border-width: 4px;
			border-color: #009688;
		}
		      	.editButtonSmall {
      		font-size: 15px;  
      		padding-right: 50px; 
      		float: right; 
      		color: #009688; 
      		padding-left: 30px;
      		background-color: transparent;

      	}

      	.updateButtonSmall {
      		font-size: 15px; 
      		background-color: #009688; 
      		padding-right: 50px; 
      		margin-right: 50px;
      		margin-top: 30px;
      		float: right; 
      		color: white; 
      		padding-left: 50px;

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
			}
		.collegeDetail
		{
			margin-top: 20px;
			width: 100%;
		}
		.submitButtonSmall{
			/*width: 80%;*/
			/*display: block;*/
			margin: 10px auto;
			margin-top: 20px;
			text-align: center;
			color: grey;
			font-size: 13px;
			float: right;
			/*padding-right: 15px;*/
			/*background: var(--main-color);*/
			/*background: -moz-linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));*/
			/*background: linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));*/
			/*filter: progid:DXImageTransform.Microsoft.gradient(startColorstr= var(--main-color-gradient-start),endColorstr= var(--main-color-gradient-end),GradientType=0);*/
		}
		.removeButtonSmall{
			/*width: 80%;*/
			/*display: block;*/
			margin: 10px auto;
			margin-top: 20px;
			text-align: center;
			color: grey;
			font-size: 13px;
			float: left;
			/*padding-right: 15px;*/
			/*background: var(--main-color);*/
			/*background: -moz-linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));*/
			/*background: linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));*/
			/*filter: progid:DXImageTransform.Microsoft.gradient(startColorstr= var(--main-color-gradient-start),endColorstr= var(--main-color-gradient-end),GradientType=0);*/
		}
		#newCollegeForm
		{
			background-color: white;
			width: 90%;
			margin-left: 5%;
		}

		#success,#failure
			{
				z-index: 100;
				position: fixed;
				transition: opacity .2s ease;
				text-align: center;
				border-radius: 8px;
				width: 90%;
				padding: 10px;
				color: white;
			}

		#success
		{
			background-color: #009688;
		}
		#failure
		{
			background-color: red;
		}

		@media only screen and (min-width: 769px)
		{
			#success
			{
				width: 30%;
				margin-left: 35%;
			}

			#failure
			{
				width: 30%;
				margin-left: 35%;
			}
			.table-container
			{
				/*border-radius: 6px;*/
				/*padding: 20px;*/
				width: 30%;
				margin-left: 34%;
				display: inline-table;
				margin-left: 36%;
				/*border: 1px solid var(--main-color);*/
			}
			.table-container{
				/*border-radius: 6px;*/
				/*border: 1px solid var(--main-color);*/
				  @apply(--shadow-elevation-2dp);
				  background-color: #fcfcfc;
				max-width: 410px;
				margin: 0 auto;
				margin-bottom: 15px;
				margin-left: 35%;
				/*box-sizing: border-box;*/
				/*padding-bottom: 1%;*/
				/*padding: 10px;*/
				/*height: 60%;*/
				/*height: 525.4px;*/
			}
			#newCollegeForm
			{
				background-color: white;
				width: 50%;
				margin-left: 25%;
			}

			.overlay a
			{
				font-size: 20px;
			}

			.closebtn
			{
				font-size: 60px;
				top: 60px;
				right: 35px;
			}
		}
				#container{
				width: 100%;
				margin: 0 auto;
				padding-top: 4%;
				padding-bottom: 4%;
				box-sizing: border-box;
			}
		#table-container{
				/*border-radius: 6px;*/
				/*border: 1px solid var(--main-color);*/
				  @apply(--shadow-elevation-2dp);
				  background-color: #fcfcfc;
				max-width: 410px;
				margin: 0 auto;
				margin-bottom: 15px;
				margin-left: 35%;
				/*box-sizing: border-box;*/
				/*padding-bottom: 1%;*/
				/*padding: 10px;*/
				/*height: 60%;*/
				/*height: 525.4px;*/
			}
		      @media only screen and (max-width: 1024px){
				#table-container{
					width: 90%;
				}
			}
			table{
				width: 80%;
				margin-left: 10%;
				margin-right: 10%;
			}
			tr {
				width: 100%;
			}
			paper-button {
				background-color: #fcfcfc;
				color: grey;
			}
			paper-input{
				--paper-input-container-invalid-color: #d38888;
				--paper-input-container-focus-color: var(--main-color);
				font-size: 13px;
				--paper-input-prefix: {
					margin: 5px 0;
					margin-right: 5px;
					color: var(--special-font-color);
					cursor: pointer;
					font-size: 15px;
				};
				--paper-input-container: {
					padding-top: 30px;
					padding-bottom: 10px;
					font-size: 15px;
				};
				--paper-input-container-underline: {
					background-color: #eaeaea;
					font-size: 15px;
				};
				--paper-input-container-label: {
					font-size: 15px;
				};
			
				--paper-input-container-input: {
					font-size: 13px;
				};
			}
			paper-input:hover{
				--paper-input-prefix: {
					color: var(--main-color);
					font-size: 15px;
				};

		}
		paper-radio-group{
			
					padding-top: 5px;
					padding-bottom: 5px;
					font-size: 13px;
					color: red;
				
		}
paper-radio-button {
	--paper-radio-button-unchecked-color: grey;
	--paper-radio-button-label-color: grey;
	font-size: 13px;
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
		.overlay {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 0;
			left: 0;
			top: 0;
			background-color: rgb(0,0,0); /* Black fallback color */
			background-color: rgba(0,0,0, 0.9); /* Black w/opacity */
			overflow-x: hidden; /* Disable horizontal scroll */
			transition: 0.5s;
		}
		.overlay-content
		{
			position: relative;
			top: 25%; /* 25% from the top */
			width: 100%; /* 100% width */
			text-align: center; /* Centered text/links */
			margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
		}
		/* The navigation links inside the overlay */
		.overlay a {
			padding: 8px;
			text-decoration: none;
			font-size: 36px;
			color: #818181;
			display: block; /* Display block instead of inline */
			transition: 0.3s; /* Transition effects on hover (color) */
		}
		/* When you mouse over the navigation links, change their color */
		.overlay a:hover, .overlay a:focus {
			color: #f1f1f1;
		}
		/* Position the close button (top right corner) */
		.closebtn {
			position: absolute;
			top: 60px;
			right: 25px;
			font-size: 60px !important;
		}

		#collegeSearchResults, #streamSearchResults, #degreeSearchResults, #majorSearchResults{
			box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
			max-height: 256px;
			overflow-y: auto;
		}

		.searchHeading{
			font-size: 14px;
			text-transform: capitalize;
			padding: 10px 8px;
			color: #009688;
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
				#fillRequest {
   		 padding: 15px 25px;
   		 padding-right: 5px;
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        background-color: #c62828;
        /*border: 1px solid #dedede;*/
        /*border-top-left-radius: 5px;*/
        /*border-top-right-radius: 5px;*/
        font-size: 15px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 100%;*/
        text-align: left;
        /*color: #404040;*/
        color: #ffffff;
        /*margin-bottom: 15px;*/
        /*margin-right: 20px;*/
      }

		#fillRequest2 {
   		 padding: 15px 25px;
   		 padding-right: 5px;
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*background-color: #4caf50;*/
                background-color: #c62828;
        /*border: 1px solid #dedede;*/
        /*border-top-left-radius: 5px;*/
        /*border-top-right-radius: 5px;*/
        font-size: 15px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 100%;*/
        text-align: left;
        /*color: #404040;*/
        color: #ffffff;
        /*margin-bottom: 15px;*/
        /*margin-right: 20px;*/
      }
      .coll_header{
      	 padding: 15px 25px;
   		 padding-right: 5px;
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*background-color: #4caf50;*/
        background-color: #c62828;
        /*border: 1px solid #dedede;*/
        /*border-top-left-radius: 5px;*/
        /*border-top-right-radius: 5px;*/
        font-size: 15px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 100%;*/
        text-align: left;
        /*color: #404040;*/
        color: #ffffff;
        /*margin-bottom: 15px;*/
        /*margin-right: 20px;*/
      }

		#fillRequest3 {
   		 padding: 15px 25px;
   		 padding-right: 5px;
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*background-color: #4caf50;*/
        background-color: #c62828;
        /*border: 1px solid #dedede;*/
        /*border-top-left-radius: 5px;*/
        /*border-top-right-radius: 5px;*/
        font-size: 15px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 100%;*/
        text-align: left;
        /*color: #404040;*/
        color: #ffffff;
        /*margin-bottom: 15px;*/
        /*margin-right: 20px;*/
      }
      #note {
      	color: #4dd0e1;
      	text-align: center;
      	/*width: 100%;*/
      	display: block;
      	padding: 12px;
      	font-size: 15px;
      	/*padding-left: 35%;*/
      }
      #addMoreCollege {
      	/*color: #009688;*/
      	color: #7f8281;
      	font-size: 25px;
      	/*align-self: center;*/
      	margin-left: 43%;
      	/*width: 100%;*/
      	cursor: pointer;

      }
      .radioButton {
      	color: red;
      }
      #edit,#edit2,#edit3 {
      		/*float: right; */
      		font-size: 11px; 
      		opacity: 1; 
      		padding-top: 4px;
      	}

      	#message1,#message2,#message3,#message0 {
      		display: inline-block;
      	}
      	#header img {
      		width: 900px;
      		margin: 0 auto;
      		margin-left: 15%;
      		cursor: pointer;
      	}
      @media only screen and (max-width : 640px){
      	.editButtonSmall {
      		font-size: 15px;  
      		/*padding-right: 50px; */
      		float: initial; 
      		color: #009688; 
      		padding-left: 50px;
      		margin-left: 25%;
      		background-color: transparent;

      	}

      	.updateButtonSmall {
      		font-size: 15px; 
      		background-color: #009688; 
      		padding-right: 50px; 
      		float: initial; 
      		color: white; 
      		padding-left: 50px;
      		margin-left: 25%;
      	}
      	#addMoreCollege {
      		margin-left: 20%;
      	}
      	.table-container {
      		margin: 15px;
      	}
      #edit {
      	/*float: inherit;*/
      }

       #edit2 {
      	/*float: inherit;*/
      }
      #header img {
      	width: 300px;
      	margin: 0 auto;
      	margin-left: 3%;
      }

      .progressbar {
      	width: 400px;
      	/*padding-left: 40px;*/
      }

      .header2 {
      	width: 350px;
      	padding-left: 0px;
      	margin-left: 0px;
      	margin-bottom: 20px;
      }

      #note {
      	padding-top: 40px;
      }

      }
      #myNav {
      	visibility: hidden;
      	display: none;
      	width: 100%;
      }
      	
      
		</style>
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

				<div id="success" style="display: none;">
					<iron-icon icon="icons:check"></iron-icon>
					<span id="success-message"></span>
				</div>
				<div id="failure" style="display: none;">
					<iron-icon icon="icons:close"></iron-icon>
					<span id="failure-message"></span>
				</div>

				<datalist id="batch-list">
					<?php
					$minimum = 1900;
					$maximum = date("Y")+10;
					for($i = $minimum;$i<$maximum;$i++)
					{
						echo '<option value="'.$i.'"></option>';
					}
					?>
				</datalist>
				<div class="header2">
      				<ul class="progressbar">
				          <li class="active">Personal Data</li>
				          <li>College Data</li>
				          <li>Get Started</li>
          <!-- <li></li> -->
  					</ul>
  				</div>
				<div id="container" class="flex-container-desktop">
					<div class="flex-desktop">
					<!-- <div id = "header"><img src="../assets/images/header1.png" /></div> -->
  					<br>
						<div id="note">
						Updating your data will help us recommend you the right institutes
						</div>
					<div id="addcolleges"> </div>
					<?php
							
						for($i=0;$i<1;$i++)
						{
							echo '<div class="table-container">';
							if(!empty($college))
							{
								echo '<div class="coll_header" id="fillRequest'.$i.'" aria-expanded$="[[isExpanded(opened2)]]" aria-controls="form4"><div id="message'.$i.'">'.$college[$i].'</div><div id="edit'.$i.'" style= "font-size: 11px;opacity: 1;padding-top: 4px;"><em>Please fill this form to continue</em></div></div>';
							}
							echo '
								<iron-collapse id="form'.$i.'"  class="card"  opened="{{opened2}}" >
										<div id="collegeDetails">
											<div id="collegeData">
											
											<div id="addedCollege">
											</div> 
										<form id="signupForm" is="iron-form" method="post" action="'.base_url().'main/signup_validation">
											<table>
												<tr>
													<td>
														<paper-input hidden name = "college" id="college-id" value="-1">
														</paper-input>
														<div id="newcoll">
														</div>';
														if(!empty($college))
														{
														echo'<paper-input label="College Name" id = "college1" type="text" auto-validate value="'.$college[0].'" error-message="College Required" placeholder = "College Name ..." disabled>
															<iron-icon icon="social:location-city" prefix>
															</iron-icon>
														</paper-input>
														<paper-input label="College Name" id = "college" type="text" auto-validate error-message="College Required" placeholder = "College Name ..." hidden>
															<iron-icon icon="social:location-city" prefix>
															</iron-icon>
														</paper-input>
														<div id="collegeSearchResults">
														</div>';
														}
														else
														{
														echo'<paper-input label="College Name" id = "college1" type="text" auto-validate value="" error-message="College Required" placeholder = "College Name ..." hidden>
															<iron-icon icon="social:location-city" prefix>
															</iron-icon>
														</paper-input>
														<paper-input label="College Name" id = "college" type="text" auto-validate error-message="College Required" placeholder = "College Name ..." >
															<iron-icon icon="social:location-city" prefix>
															</iron-icon>
														</paper-input>
														<div id="collegeSearchResults">
														</div>';
														}
												echo '</td>
												</tr>
												<tr>
													<td>
														<div id="myNav">
															<paper-input label="College Name" name="newCollege" id="newCollege" type="text" auto-validate required error-message="College name required!" placeholder = "College Name">
																<iron-icon icon="social:school" prefix>
																</iron-icon>
															</paper-input><paper-input label="Country Name" id = "country_code" type="text" value="'.$country.'" auto-validate error-message="Country Required" placeholder = "Country Name">
																<iron-icon icon="social:location-city" prefix>
																</iron-icon></paper-input>
															<div id="countrySearchResults">
															</div>
															<div id="submitButtons">
																<paper-button class = "submitButton" onclick="addNewCollege()">ADD COLLEGE</paper-button>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<paper-input hidden name="member" id="member" >
														</paper-input>
														<paper-radio-group aria-labelledby="Position" id = "member-select" style="padding-top: 10px; padding-bottom: 10px;">
														<paper-radio-button name="student">Student</paper-radio-button>
														<paper-radio-button name="alumni">Alumni</paper-radio-button>
														<paper-radio-button name="faculty">Faculty</paper-radio-button>
														</paper-radio-group>
													</td>
												</tr>
												<tr>
													<td>
														<paper-input hidden name = "stream-id" id="stream-id" value="-1">
														</paper-input>
														<paper-input label="Stream/School" id="stream" name="stream" type="text" auto-validate error-message="Stream/School Required" placeholder="Engineering, Medical ..." >
															<iron-icon icon="icons:description" prefix>
															</iron-icon>
														</paper-input>
														<div id="streamSearchResults" style="display: none">
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<paper-input hidden name = "degree-id" id="degree-id" value="-1">
														</paper-input>
														<paper-input label="Degree" id="degree" name="degree" type="text" auto-validate error-message="Degree Required" placeholder = "Undergraduate, Masters ..." >
															<iron-icon icon="social:school" prefix>
															</iron-icon>
														</paper-input>
														<div id="degreeSearchResults" style="display: none">
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<paper-input hidden name = "major-id" id="major-id" value="-1">
														</paper-input>
														<paper-input label="Major" id="major" name="major" type="text" auto-validate error-message="Major Required" placeholder = "Computer Science, Geology ..."><iron-icon icon="social:domain" prefix>
															</iron-icon>
														</paper-input>
														<div id="majorSearchResults" style="display: none">
														</div>
													</td>
												</tr>
												<tr>
													<td>
														<paper-input label="Batch" name="batch" type="text" list="batch-list" placeholder="Passing out year ...">
															<iron-icon icon="date-range" prefix>
															</iron-icon>
														</paper-input>
													</td>
												</tr>
												<tr>
													<td>
														<paper-button class = "submitButtonSmall" id="subButton1" onclick=submitCollegeForm("#form'.$i.'") style = "font-size: 15px; background-color: white;" >
															<iron-icon icon="icons:check">
															</iron-icon> Save
															</paper-button>
														<paper-button class = "removeButtonSmall" id="removeButton1" >
															<iron-icon icon="icons:delete">
															</iron-icon>Remove
														</paper-button>
													</td>
												</tr>
											</table>
										</form>
									</div>
								</div>
								</iron-collapse>
								</div>';

						}
						if(!empty($college))
						{
							for($i=1;$i<sizeof($college);$i++)
							{
								echo '<div class="table-container"><div class="coll_header" id="fillRequest'.$i.'" aria-expanded$="[[isExpanded(opened2)]]" aria-controls="form4" onclick=toggle("#form2")><div id="message">'.$college[$i].'</div><div id="edit'.$i.'" style= "font-size: 11px;opacity: 1;padding-top: 4px;"><em>Please fill this form to continue</em></div></div></div>';
							}
						}

					?>		
				
						
					<div id = "addMoreCollege" >
						<iron-icon icon="add-circle-outline" prefix style="width: 55px; height: 55px;"></iron-icon> Add College
					</div>
						<!-- <paper-button class = "editButtonSmall" id="editButton"  >
									<iron-icon icon="icons:check" "></iron-icon>Edit Info
									</paper-button> -->
					<paper-button class = "updateButtonSmall" id="updateButton" onclick="nextPage()">
									<!-- <iron-icon icon="icons:check" "> </iron-icon>-->Update
									</paper-button>
				</div>
			</div>					
				<br>
				<footer>
					<?php include "common_components/footer.php" ?>
				</footer>

			</app-header-layout>

		</app-drawer-layout>

		<!-- <script type="text/javascript" src="/assets/js/toolbarSearch.js"></script> -->
		<script type="text/javascript" src="/assets/js/commonScript.js"></script>
		<!-- <script type="text/javascript" src="/assets/js/encode_req.js"></script> -->

		<script>
		<?php include "common_components/addcollege_js.php" ?>

		function nextPage()
		{
			location.href = "/main/structure_nodes";
		}
		<?php
		if(!empty($college))
		{
	
			
			echo "
			
			

			document.getElementById('collegeSearchResults').style.display = 'none';
			document.getElementById('stream').disabled = false;";
			

		}
		?>

		function submitCollegeForm(selector)
		{
			var social_collg = new Array();
			var i =-1;
			var j =-1;
			var old_collg = document.getElementById('college1').value;
			if(old_collg == "")
			{
				old_collg = document.getElementById('college').value;
			}
			<?php foreach($college as $key => $val){ ?>
				j = j+1;
        		social_collg.push('<?php echo $val; ?>');
        		var val = old_collg.localeCompare(social_collg[j]);
        		if(val == 0)
				{
					
					i = j;
				}
    		<?php } ?>
    		var k = -1;
    		<?php foreach($id as $key => $val){ ?>
				k = k+1;
        		var val = old_collg.localeCompare(social_collg[k]);
        		if(val == 0)
				{
					document.getElementById('college').value = old_collg;
					document.getElementById('college-id').value = '<?php echo $val; ?>';
				}
    		<?php } ?>
    		
			console.log(social_collg.length);
			console.log("i value: "+i);
			var id = selector;
			id = id.replace("#form","");
			var header = "fillRequest";
			header = header.concat(i+1);
			var sub_header = "edit";
			sub_header = sub_header.concat(id);
			console.log(header);
			console.log(sub_header);
			document.getElementById('member').value = document.getElementById('member-select').selected;
			console.log($("#signupForm").serialize());
			var url = "/user/addCollege/";
			$.ajax({
					type: "POST",
					url: url,
					data: $("#signupForm").serialize(),
					success: function(data)
					{
						data = JSON.parse(data);
						message = data['message'];
						college = data['data'];
						if(message == "")
						{
							document.getElementById("signupForm").reset();
							if(i==j || (i==-1 && j==social_collg.length-1))
							{
								if(i!=-1 && j!=-1){
									document.getElementById("fillRequest0").style.display = 'none';
									document.getElementById("message0").innerHTML= document.getElementById('college').value;
								}
								document.getElementById("college1").value = "";
								document.getElementById("college1").hidden = true;

								document.getElementById("college").hidden = false;
								document.getElementById('college').value = "";
								
								document.getElementById("signupForm").style.display  = 'none';
								
								console.log("Signup form is hidden");
								document.getElementById("addMoreCollege").onclick = function() {showform();};

							}
							else
							{
								//element = document.getElementById("college1");
								//element.parentNode.removeChild(element);
								//document.getElementById('newcoll').innerHTML = '<paper-input label="College Name" id = "college1" type="text" auto-validate value="'+social_collg[i+1]+'" error-message="College Required" placeholder = "College Name ..." disabled>';
								document.getElementById('college1').value = social_collg[i+1];
								document.getElementById("message0").innerHTML= social_collg[i+1];
								var element = document.getElementById(header);
								element.parentNode.removeChild(element);


							}
							       						
       						//var coll_name = document.getElementById('college').value;
       						//document.getElementById(sub_header).innerHTML=college["degree"]+", "+college['stream']+", "+college['major'];
							//document.getElementById("#signupForm").reset();
							//term = '<paper-card class="collegeDetail">'+college["member"]+', <a href="/college/details/'+encode_id(college["COLL_ID"])+'"><span style="color: black;"><b>'+coll_name+'</b></span></a><br/>'+college["major"]+', '+college["degree"]+'<br/>';
							term = '<div class="table-container" ><div id="fillRequest" style="background-color:#4caf50" aria-controls="form3"><div id="message">'+old_collg+'</div><div id="edit2"><em>'+college["major"]+', '+college["degree"]+'</em></div></div></div>';
							/*if(college["batch"] != null)
							{
								term = term + 'Batch : '+college["batch"]+'<br/>';
							}*/
							//term = term + '</paper-card>';
       						//document.getElementById("edit").innerHTML="Undergraduate, Engineering, CSE";

							$('#addcolleges').append(term);

							//document.getElementById('skipButton').style.display = 'block';
							message = "College Successfully Added";
							displayMessage('success',message,1000);
						}
						else
						{
							displayMessage('failure',message,1000);
						}
					}
				});


		}
		</script>

		  <script>

  function toggle(selector) {

    document.querySelector(selector).toggle();

}
function showform(){
	document.getElementById("signupForm").style.display  = 'block';
}


  

</script>

<script>
$(document).ready(function(){
	
   $("#subButton1").click(function(){
      // $("#form2").hide(300);
      // $("#form3").show(300);
       
       
       //document.getElementById("fillRequest2").style.background="#c62828";
       //document.getElementById("edit2").innerHTML="Please fill up this form to continue";
       
       
   });
});
</script>
<script>
$(document).ready(function(){
   $("#subButton2").click(function(){
       $("#form3").hide(300);
       $("#form4").show(300);
       document.getElementById("edit2").style.opacity="1";
       document.getElementById("fillRequest2").style.background="#4caf50";
       document.getElementById("message2").innerHTML="IIT Bombay";
       document.getElementById("edit2").innerHTML="Undergraduate, Engineering, CSE";
       // document.getElementById("message2").innerHTML="Undergraduate, Engineering, CSE";
       document.getElementById("fillRequest3").style.background="#c62828";
       // document.getElementById("message3").innerHTML="Please fill up this form to continue";
       
       
   });
});
</script>
<script>
$(document).ready(function(){
   $("#subButton3").click(function(){
       $("#form4").hide(300);
       // $("#form4").show(300);
       document.getElementById("edit3").style.opacity="1";
       document.getElementById("fillRequest3").style.background="#4caf50";
       // document.getElementById("message2").innerHTML="IIT Bombay";
       document.getElementById("edit3").innerHTML="Undergraduate, Engineering, CSE";
       // document.getElementById("message2").innerHTML="Undergraduate, Engineering, CSE";
       // document.getElementById("fillRequest3").style.background="#c62828";
       // document.getElementById("message3").innerHTML="Please fill up this form to continue";
       
       
   });
});
</script>
<script>
	$(document).ready(function(){
   $("#fillRequest").click(function(){
       $("#form2").show(300);
       document.getElementById("edit").style.opacity="0";
       // $("#edit").style.opacity=1;
   });
});
</script>
<script>
	$(document).ready(function(){
   $("#removeButton").click(function(){
       $(".table-container").hide(300);
       // $("#edit").style.opacity=1;
   });
});

</script>
<script>
	$(document).ready(function(){
   $("#addMoreCollege").click(function(){
       $(".table-container").show(300);
       // $("#edit").style.opacity=1;
   });
});
	
</script>
<script type="text/javascript">
window.onload = function(){
    // $("#form1").hide(1);
     $("#form2").hide(1);
     $("#form3").hide(1);
     $("#form4").hide(1);

}
</script>
	</body>
</html>