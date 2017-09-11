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
      margin-top: 80px;
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
                padding: 40px 60px 40px 60px;
				/*box-sizing: border-box;*/
				/*padding-bottom: 1%;*/
				/*padding: 10px;*/
				/*height: 60%;*/
				/*height: 525.4px;*/
			}

	#congrats-message #big {
			color: #595959;
			/*padding-left: :60px;*/
			font-size: 40px;
			font-weight: 700px;
            margin-bottom: 15px;
	}

	#congrats-message {
		color: #595959;
        text-align: center;
		/*padding: 60px;*/
	}

	
		@media only screen and (min-width: 769px)
		{

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
				margin-left: 30%;
				/*box-sizing: border-box;*/
				/*padding-bottom: 1%;*/
				/*padding: 10px;*/
				/*height: 60%;*/
				/*height: 525.4px;*/
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

		/* Position the close button (top right corner) */


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
		   	.skipButton {
      		font-size: 15px;  
      		/*padding-right: 50px; */
      		/*float: right; */
      		color: #009688; 
      		/*padding-left: 30px;*/
      		background-color: transparent;
      		width: 100%;
      		font-weight: 800;

      	}

      	.AddAnotherCollegeButton {
      		font-size: 13px;  
      		/*padding-right: 50px; */
      		/*float: right; */
      		color: #009688; 
      		/*padding-left: 30px;*/
      		background-color: transparent;
      		width: 100%;
      		font-weight: 400;
      	}

      	.GetStartedButton {
      		font-size: 15px; 
      		background-color: #009688; 
      		/*padding-right: 50px; */
      		/*float: right; */
      		color: white; 
      		border-radius: 0px;
      		width: 100%;
      		margin-top: 50px;
      		font-weight: 800;
      		/*padding-left: 50px;*/

      	}
		 @media only screen and (max-width : 640px){
      	.skipButton {
      		font-size: 15px;  
      		/*padding-right: 50px; */
      		float: initial; 
      		color: #009688; 
      		font-weight: 800;
      		/*margin-left: 25%;*/
      		background-color: transparent;
      		text-align: center;
      		float: initial; 
      		/*color: white; */
      		/*margin-left: 25%;*/
      	}
      	.AddAnotherCollegeButton {
      		font-size: 13px;  
      		/*padding-right: 50px; */
      		float: initial; 
      		color: #009688; 
      		font-weight: 400;
      		/*margin-left: 25%;*/
      		background-color: transparent;
      		text-align: center;
      		float: initial; 
      		/*color: white; */
      	}

      	.GetStartedButton {
      		
      		font-size: 13px; 
      		background-color: #009688; 
      		text-align: center;
      		float: initial; 
      		color: white; 
      		/*margin-left: 25%;*/
      	}
        #big {
            font-size: 30px;
        }
        #congrats-message #big {
            color: #595959;
            /*padding-left: :60px;*/
            font-size: 30px;
            font-weight: 700px;
            margin-bottom: 15px;
        }
      }

      @media only screen and (max-width : 640px){


      	.table-container {
      		margin: 15px;
      		padding: 20px;
      		margin-top: 60px;
      	}
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

				<div class="header2">
      <ul class="progressbar">
          <li class="active">Personal Data</li>
          <li class="active">College Data</li>
          <li>Get Started</li>
          <!-- <li></li> -->
  </ul>
  </div>
				<div id="container" class="flex-container-desktop">
					<div class="flex-desktop" style="display: flex; width: 100%; justify-content: center;">
					<!-- <div id = "header"><img src="../assets/images/header1.png" /></div> -->
					  
  <br>
						<div class="table-container">
							<!-- <div class="card-content" id="completeTitle">
							<font color="#009688">Let's Get You Started</font>
							</div> -->
							<div id="congrats-message">
							<div id="big">
								<b style="font-weight: 500;">Congratulations!</b>
							</div>
							
							You have been successfully registered!
							
							</div>

							
					<a href="/main/structure_nodes"><paper-button class = "GetStartedButton" id="GetStartedButton"><center>
									<!-- <iron-icon icon="icons:check" "> </iron-icon>-->Answer Few Questions Of Your College
									</center></paper-button></a>
					<a href="/home"><paper-button class = "skipButton" id="skipButton">
									<!-- <iron-icon icon="icons:check" "> </iron-icon>-->Home Page
									</paper-button></a>
							
					<a href="/user/complete"><paper-button class = "AddAnotherCollegeButton" id="AddAnotherCollegeButton" style="font-weight: 200;">
									<!-- <iron-icon icon="icons:check" "> </iron-icon>-->Add Another College
									</paper-button></a>
 		


					</div>
					

								
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
		</script>

		  
	</body>
</html>