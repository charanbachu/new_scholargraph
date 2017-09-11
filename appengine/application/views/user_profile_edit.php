<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Edit Profile</title>
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
			body {
				font-family: 'Roboto';
			}
			#container > div{
				margin: 10px auto;
				width: 80%;
			}
			@media only screen and (max-width: 1367px){
				#container > div{
					margin: 10px auto;
					width: 90%;
				}
			}
			@media only screen and (max-width: 1024px){
				#container > div{
					width: 95%;
				}
			}
			#leftPanel{
				padding-right: 50px;
			}
			#leftPanel paper-card{
				display: block;
			}
			#leftPanel paper-item{
				cursor: pointer;
				--paper-item-selected: {
					border-left: 3px solid var(--paper-blue-700);
				};
			}
			#profileTabs
			{
				display: none;
			}
			#collegeDetails
			{
				display: flex;
				width: 100%;
			}
			#addedColleges,#newColleges
			{
				width: 50%;
			}
			#addedColleges
			{
				margin-right: 2%;
			}
			.collegeDetail
			{
				width: 100%;
				margin-bottom: 10px;
			}
			#midPanel > div{
				max-width: 634px;
			}
			@media only screen and (max-width: 769px){
				#leftPanel{
					display: none;
				}
				#profileTabs{
					display: flex;
				}
				#collegeDetails
				{
					display: block;
					width: 100%;
				}
				#collegeDetails,#personalDetails,#passwordDetails
				{
					margin-top: 5%;
				}
				#addedColleges,#newColleges
				{
					width: 100%;
				}
				#newColleges
				{
					margin-top: 5%;
				}
			}
			.table-container{
					align-content: center;
					width: 90%;
					margin-left: 5%;
					margin-right: 5%;
				}
			#countrySearchResults{
				text-align: left;
				width: 100%;
				margin-top: 10px;
				overflow: auto;
			}
			.inpt {
				--paper-input-container-input: {
			      font-size: 15px;
			    };
			}
			.searchItem{
				text-decoration: none;
				/*padding: 5%;*/
				color: black;
				font-size: 15px;
				font-family: 'Roboto';
				text-transform: capitalize;
			}
			.searchItem:focus{
				outline-style: none;
				background-color: lightgrey;
			}
			.searchItemCountry{
				text-decoration: none;
				padding: 2%;
				color: black;
				font-size: 14px;
				text-transform: capitalize;
			}
			.searchItem:hover ,.searchItemCountry:hover
			{
				background-color: lightgrey;
			}
			#collegeAddTitle,#personalTitle,#collegeTitle,#passwordTitle
			{
				text-align: center;
				padding-bottom: 5px;
				border-bottom: solid;
				border-width: 4px;
				border-color: #009688;
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
			.submitButton
			{
				width: 40%;
				font-size: 15px;
				align-self: center;
				margin: 10px auto;
				margin-top: 20px;
				text-align: center;
				display: flex;
				color: white;
				background: var(--main-color);
			}
			table
			{
				width: 100%;
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
					border-radius: 6px;
					padding: 20px;
					width: 30%;
					display: inline-table;
					border: 1px solid var(--main-color);
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
				font-family: 'Roboto';
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
		</style>
		<script>
			document.addEventListener('WebComponentsReady', function () {
			var template = document.querySelector('template[is="dom-bind"]');
			template.selectEditType = 1;
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

				<div id="container">
					<?php include "common_components/question-fab.php" ?>
					<template is="dom-bind">
					<div class="flex-container">
						<div id="leftPanel" class="flex-2">
							<paper-card>
								<paper-listbox selected={{selectEditType}}>
									<paper-item onclick="document.getElementById('profileTabs').select(0);">
										<paper-ripple></paper-ripple> Personal Details
									</paper-item>
									<paper-item onclick="document.getElementById('profileTabs').select(1);">
										<paper-ripple></paper-ripple> College Details
									</paper-item>
									<paper-item onclick="document.getElementById('profileTabs').select(2);">
										<paper-ripple></paper-ripple> Password Details
									</paper-item>
								</paper-listbox>
							</paper-card>
						</div>

						<div id="midPanel" class="flex-5">
							<div>
								<paper-tabs id="profileTabs" selected={{selectEditType}}>
									<paper-tab>Personal</paper-tab>
									<paper-tab>College</paper-tab>
									<paper-tab>Password</paper-tab>
								</paper-tabs>

								<iron-pages selected={{selectEditType}}>
									<div id="personalDetails">
										<div id="personalTitle"><b>Personal Details</b></div>
										<div id="personalData">
											<form id="personalForm">
												<table>
												<tr><td>
													<paper-input label="Full Name" name = "name" type="text" auto-validate error-message="Name required" value = "<?php echo $userData["Display_Name"];?>" required>
														<iron-icon icon="social:person" prefix></iron-icon>
													</paper-input>
												</td></tr>
												<tr><td>
													<paper-textarea label="About Me" name = "about" type="text" value = "<?php echo $userData["About"];?>"></paper-textarea>
												</td></tr>
												</table>
												<div>
												<paper-button class = "submitButton" onclick="updatePersonal()">
													UPDATE
												</paper-button>
												</div>
											</form>
										</div>
									</div>

									<div id="collegeDetails">
										<div id="addedColleges">
											<div id="collegeTitle"><b>My Colleges</b></div>
											<div id="addedCollege">
												<br/>
												<?php
													foreach($userColleges as $college)
													{
														//echo encode_id($college->COLL_ID);
														echo '<paper-card class="collegeDetail">'.$college->member.',
																<a href="/college/details/'.encode_id($college->COLL_ID).'"><span style="color: black;"><b>'.$college->name["college"].'</b></span></a><br/>'.
																$college->major.', '.$college->degree.'<br/>';
														if($college->batch != NULL)
														{
															echo 'Batch : '.$college->batch.'<br/>';
														}
														echo '</paper-card>';
													}
												?>
												<!--Display College Details in a condensed form -->
											</div>
										</div>

										<div id="newColleges">
											<div id="collegeAddTitle"><b>Add Another College</b></div>
												<form id="collegeForm">
													<table>
													<tr><td>
														<paper-input hidden name = "college" id="college-id" value="-1"></paper-input>
														<paper-input label="College Name" class="inpt" id = "college" type="text" auto-validate error-message="College Required" placeholder = "College Name ...">
															<iron-icon icon="social:location-city" prefix></iron-icon>
														</paper-input>
														<div id="collegeSearchResults"></div>
													</td></tr>
													<tr><td>
														<paper-input hidden name="member" class="inpt" id="member" ></paper-input>
														<paper-dropdown-menu id = "member-select" label="Member" style="width: 100%;" placeholder = "Alumni, Student ..." icon = "icons:description" auto-validate error-message="Member required">
															<paper-listbox class="dropdown-content">
																<paper-item>Alumni</paper-item>
																<paper-item>Student</paper-item>
																<paper-item>Faculty</paper-item>
															</paper-listbox>
														</paper-dropdown-menu>
													</td></tr>
													<tr><td>
														<paper-input hidden name = "stream-id" class="inpt" id="stream-id" value="-1"></paper-input>
														<paper-input label="Stream/School" class="inpt" id="stream" name="stream" type="text" auto-validate error-message="Stream/School Required" placeholder="Engineering, Medical ..." disabled>
															<iron-icon icon="icons:description" prefix></iron-icon>
														</paper-input>
														<div id="streamSearchResults" style="display: none"></div>
													</td></tr>
													<tr><td>
														<paper-input hidden name = "degree-id" id="degree-id" value="-1"></paper-input>
														<paper-input label="Degree" class="inpt" id="degree" name="degree" type="text" auto-validate error-message="Degree Required" placeholder = "Undergraduate, Postgraduate ..." disabled>
															<iron-icon icon="social:school" prefix></iron-icon>
														</paper-input>
														<div id="degreeSearchResults" style="display: none"></div>
													</td></tr>
													<tr><td>
														<paper-input hidden name = "major-id" id="major-id" value="-1"></paper-input>
														<paper-input label="Major" class="inpt" id="major" name="major" type="text" auto-validate error-message="Major Required" placeholder = "Computer Science, Geology ..." disabled>
															<iron-icon icon="social:domain" prefix></iron-icon>
														</paper-input>
														<div id="majorSearchResults" style="display: none"></div>
													</td></tr>
													<tr><td>
														<paper-input label="Batch" class="inpt" name="batch" type="text" list="batch-list" placeholder="Passing out year ...">
															<iron-icon icon="date-range" prefix></iron-icon>
														</paper-input>
													</td></tr>
													</table>
												</form>
												<div id="submitButtons" style="display: flex;text-align: center;">
													<paper-button class = "submitButton" onclick="addCollege()">
														UPDATE
													</paper-button>
												</div>
										</div>
									</div>

									<div id="passwordDetails">
										<div id="passwordTitle"><b>Password Details</b></div>
										<div id="passwordData">
											<form id="passwordForm">
												<table>
												<tr><td>
													<paper-input label="Current Password" name = "currentPassword" type="password" auto-validate error-message="Password required" required>
														<iron-icon icon="lock" prefix></iron-icon>
													</paper-input>
												</td></tr>
												<tr><td>
													<paper-input label="New Password" name = "newPassword" type="password" auto-validate error-message="Password required" required>
														<iron-icon icon="lock" prefix></iron-icon>
													</paper-input>
												</td></tr>
												<tr><td>
													<paper-input label="Confirm New Password" name = "newPasswordConfirm" type="password" auto-validate error-message="Password required" required>
														<iron-icon icon="lock" prefix></iron-icon>
													</paper-input>
												</td></tr>
											</table>
											<div>
												<paper-button class = "submitButton" onclick="updatePassword()">
													UPDATE
												</paper-button>
											</div>
											</form>
										</div>
									</div>
								</iron-pages>
							</div>
						</div>

					<div id="myNav" class="overlay">
						<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
						<div class="overlay-content">
							<div id="newCollege">
								<form id="newCollegeForm">
									<table>
									<tr><td>
									<paper-input label="College Name" name="newCollege" id="newCollege" type="text" auto-validate required error-message="College name required!">
										<iron-icon icon="social:school" prefix></iron-icon>
									</paper-input>
									</td></tr>
									<tr><td>
									<paper-input label="Country Name" name="country_code" id="country_code" type="text" auto-validate required error-message="Country required!">
										<iron-icon icon="room" prefix></iron-icon>
									</paper-input>
									<div id="countrySearchResults"></div>
									</td></tr>
									<tr><td>
									<div id="submitButtons">
										<paper-button class = "submitButton" onclick="addNewCollege()">
											ADD COLLEGE
										</paper-button>
									</div>
									</td></tr>
									</table>
								</form>
							</div>
						</div>
					</div>

					</div>
					</template>
				</div>

				<footer>
					<?php include "common_components/footer.php" ?>
				</footer>
			</app-header-layout>

		</app-drawer-layout>

		<script type="text/javascript" src="/assets/js/toolbarSearch.js"></script>
		<script type="text/javascript" src="/assets/js/commonScript.js"></script>

		<script>
		<?php include "common_components/addcollege_js.php" ?>
		function updatePersonal()
		{
			var url = "/user/addName/";
			$.ajax({
				type: "POST",
				url: url,
				data: $("#personalForm").serialize(),
				success: function(data)
				{
					if(data == "")
						displayMessage('success',"Successfully Updated",1000);
					else
						displayMessage('failure',data,1000);
				}
				});
		}
		function updatePassword()
		{
			var url = "/user/password/";
			$.ajax({
				type: "POST",
				url: url,
				data: $("#passwordForm").serialize(),
				success: function(data)
				{
					document.getElementById("passwordForm").reset();
					if(data == "")
						displayMessage('success',"Successfully Updated",1000);
					else
						displayMessage('failure',data,1000);
				}
				});
		}
		</script>

	</body>
</html>
