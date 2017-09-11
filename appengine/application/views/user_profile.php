	<?php

	$GLOBALS['a'] = 0;
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title><?php echo $userData["Display_Name"];?> - Scholarfact</title>
		<meta content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For polyfill support across non-compatible browsers-->
		<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports-vulc.html'?>">

		<!-- common css for header, footer, sidebar, etc. -->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">

		<style is="custom-style" include="shared-css iron-flex iron-flex-alignment">

		div
		{
			box-sizing: border-box;
		}
		a
		{
			text-decoration: none;
		}

		#container
		{
			margin-left: 5%;
			margin-right: 5%;
		}

		#leftPanel-desktop
		{
			display: none;
		}

		#feeds
		{
		  height: 100px;
		  width: 100%;
		  display: inline-block;
		}

		#profile
		{
			margin: 5px;
			display: flex;
			padding-bottom: 10px;
		}

		#profilePic
		{
			position: relative;
			height: 140px;
			width: 140px;
			border-radius: 50%;
			overflow: hidden;
			display: inline-block;
		}

		#profileDetails
		{
			display: inline-block;
			text-align: left;
			margin-left: 5%;
			align-items: center;
		}

		#follow,#edit
		{
			font-size: 15px;
			padding : 5px;
			margin-left: 0;
			margin-top: 5px;
			background-color: #009688;
			opacity: 0.75;
			color: white;
		}

		#name
		{
			font-weight: bold;
			font-size : 30px;
			color : #595959;
		}

		#description
		{
			font-style: italic;
			font-size: 15px;
			color : #595959;
		}

		.views,.stats
		{
			margin-bottom: 40px;
		}

		.viewsTitle,.statsTitle,#collegeTitle
		{
			padding-bottom: 5px;
			border-bottom: solid;
			border-width: 2px;
			border-color: #009688;
		}
		.viewsData,.statsData,#collegeData
		{
			margin-top: 10px;
		}

		paper-tab
		{
			width: 10%;
			display: block;
		}

		#feedTabs
		{
			--paper-tabs:{
				background-color: var(--main-color);
				color: white;
			};
		}

		.collegeDetail
		{
			margin-bottom: 20px;
			width: 100%;
		}

		#answerFeeds,#questionFeeds,#followersFeeds,#followingFeeds
		{
			width: 100%;
		}

		#followingTabs
		{
			--paper-tabs:{
				background-color: var(--main-color);
				color: white;
			};
		}

		iron-icon
		{
			margin-right: 5px;
		}

		.questionCard
		{
			width: 100%;
		}

		.time,.downvotes,.upvotes
		{
			display: inline-block;
			margin-right: 10px;
		}

		.viewsStats
		{
			display: inline-block;
			text-align: center;
			width: 49%;
		}

		.statsStats
		{
			display: inline-block;
			text-align: center;
			width: 49%;
		}

		#questions
		{
			height: 155px;
		}

		.count
		{
			text-align: center;
			font-style: bold;
			display: block;
		}

		.countLabel
		{
			font-size: 12px;
		}

		footer
		{
			margin-top: 500px;
		}

		@media only screen and (min-width: 769px)
		{
			#description
			{
				font-style: italic;
				font-size: 18px;
				color : #595959;
			}
			#profileDetails
			{
				display: inline-flex;
			}

			#leftPanel-mobile
			{
				display: none;
			}

			#leftPanel-desktop
			{
				display: inline-block;
				width: 22.5%;
				margin-right: 2.5%;
				vertical-align: top;
			}

			#profile
			{
				width: 72.5%;
			}

			#rightPanel
			{
				display: inline-block;
				width: 22.5%;
				margin-left: 2.5%;
				float: right;
			}

			#feeds
			{
				width: 49%;
				display: inline-block;
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
		</style>

		<script type="text/javascript">
			document.addEventListener('WebComponentsReady', function () {
				var loaderWrapper = document.getElementById("loader-wrapper");
				loaderWrapper.style.opacity = "0";
				setTimeout(function(){
					loaderWrapper.style.display = "none";
				},300);
			});

			<?php
			echo '
			function takeSurvey()
			{
			var questionDialog = document.querySelector("psychographic-ques");
			console.log("takeSurvey");
			questionDialog.toggle();
			'.
			$GLOBALS["a"] = 0
			.'
			}
			'
			?>
		</script>

	</head>

	<body onload = "initialize()">
		<div id="loader-wrapper">
		</div>
		<app-drawer-layout fullbleed responsive-width="1024px">

			<?php
			if($GLOBALS['a'] == 1)
			{
			include "common_components/psycho-struct.php" ;
			}
			?>

			<app-drawer>
				<?php include "common_components/app-drawer.php" ?>
			</app-drawer>

			<app-header-layout>
				<app-header fixed effects="waterfall">
					<?php include "common_components/app-header.php" ?>
				</app-header>

			<div id="container">
			<p id="userId" hidden><?php echo $watched;?></p>
				<template is="dom-bind">
				<div id="profile">
					<div id="profilePic"><img src="/assets/images/profilePics/profile1.jpg" style="width:150px;height:150px;"></div>

					<div id="profileDetails" style="color:black">
						<div id="userData">
						<span id="name"><?php echo $userData["Display_Name"];?></span><br/>
						<span id="description">
						<?php
						if(isset($userData["About"]))
							echo $userData["About"];
						else if($watched == $watcher)
							echo "Write a description.";
						?>
						</span><br/>
						</div>
						<div id="editButton">
						<?php
						if($watched == $watcher)
							echo '<a href="/user/edit/"><paper-button id="edit"><iron-icon icon="icons:create"></iron-icon></paper-button></a>';
						else if($watcher == 0)
							echo '<a href="/main/login"><paper-button id="follow"><iron-icon icon="icons:add" style="margin-right: 5px;width: 20px;height: 20px;"></iron-icon>Follow | 1024</paper-button></a>';
						else
							echo '<paper-button id="follow"><iron-icon icon="icons:add" style="margin-right: 5px;width: 20px;height: 20px;"></iron-icon>Follow | 1024</paper-button>';
						?>
						</div>
					</div>
				</div>

				<div id="leftPanel-mobile">
					<div class="views">
						<div class="viewsTitle"><iron-icon icon="icons:view-day"></iron-icon>
						<?php
							if($watched == $watcher)
								echo 'My Answer\'s Views';
							else
								echo 'Answer\'s Views';
						?>
						</div>
						<div class="viewsData">
							<div class="viewsStats">
								<span class="count">1,242</span>
								<span class="countLabel">Last 30 Days</span>
							</div>
							<div class="viewsStats">
								<span class="count">112,242</span>
								<span class="countLabel">All Time</span>
							</div>
						</div>
					</div>
					<div class="stats">
						<div class="statsTitle"><iron-icon icon="social:poll"></iron-icon>
						<?php
							if($watched == $watcher)
								echo 'My Statistics';
							else
								echo 'Statistics';
						?>
						</div>
						<div class="statsData">
							<div class="statsStats">
								<span class="count">290</span>
								<span class="countLabel">Discussions Answered</span>
							</div>
							<div class="statsStats">
								<span class="count">1242</span>
								<span class="countLabel">Survey Filled</span>
							</div>
						</div>
					</div>
				</div>


				<div id="leftPanel-desktop">
					<div class="views">
						<div class="viewsTitle"><iron-icon icon="icons:view-day"></iron-icon>
						<?php
							if($watched == $watcher)
								echo 'My Answer\'s Views';
							else
								echo 'Answer\'s Views';
						?>
						</div>
						<div class="viewsData">
							<div class="viewsStats">
								<span class="count">1,242</span>
								<span class="countLabel">Last 30 Days</span>
							</div>
							<div class="viewsStats">
								<span class="count">112,242</span>
								<span class="countLabel">All Time</span>
							</div>
						</div>
					</div>
					<div class="stats">
						<div class="statsTitle"><iron-icon icon="social:poll"></iron-icon>
						<?php
							if($watched == $watcher)
								echo 'My Statistics';
							else
								echo 'Statistics';
						?>
						</div>
						<div class="statsData">
							<div class="statsStats">
								<span class="count">290</span>
								<span class="countLabel">Discussions Answered</span>
							</div>
							<div class="statsStats">
								<span class="count">1242</span>
								<span class="countLabel">Survey Filled</span>
							</div>
						</div>
					</div>

					<div id="college">
						<div id="collegeTitle"><iron-icon icon="social:school"></iron-icon>
						<?php
							if($watched == $watcher)
								echo 'My Colleges';
							else
								echo 'Colleges';
						?>
						</div>
						<div id="collegeData">
						<?php
							foreach($userColleges as $college)
							{
								echo '<paper-card class="collegeDetail">
										<a href="/college/details/'.encode_id($college->COLL_ID).'"><span style="color: black;"><b>'.$college->name.'</b></span></a><br/>'.
										$college->major.', '.$college->degree.'<br/>';
								if($college->batch != NULL)
								{
									echo 'Batch : '.$college->batch.'<br/>';
								}
								echo '</paper-card>';
							}
						?>
						</div>
					</div>
				</div>

				<div id="feeds">
					<div id="tabs">
						<paper-tabs id="feedTabs" selected="{{selected}}">
							<paper-tab>Following</paper-tab>
							<paper-tab>
							<?php
								if($watched == $watcher)
									echo 'My Answers';
								else
									echo 'Top Answers';
							?>
							</paper-tab>
							<paper-tab>
							<?php
								if($watched == $watcher)
									echo 'My Questions';
								else
									echo 'Top Questions';
							?>
							</paper-tab>
						</paper-tabs>
					</div>
					<div id="pages">
						<iron-pages selected="{{selected}}">
							<div id="followingFeeds">
							</div>
							<div id="answerFeeds"></div>
							<div id="questionFeeds"></div>
						</iron-pages>
					</div>
				</div>
				<div id="rightPanel">
					<div id="questions">


						<?php
							$ques_count = $this->session->ques_count;
							if($ques_count > 6 && $GLOBALS['a'] == 0)
							{


								echo
								'
								<link rel="import" href="'.base_url().'assets/polymer_dependency/question-display.html">

								<question-display heading="'.$this->session->college1.'"url="'.base_url().'main/psycho_structural" exit="'.base_url().'home">
								</question-display>

								';
							}
							else if($GLOBALS['a'] == 0)
							{
								echo
								'
								<link rel="import" href="'.base_url().'assets/polymer_dependency/question-display.html">

								<question-display heading="'.$this->session->college1.'"url="'.base_url().'main/psycho_structural" exit="'.base_url().'home">
								</question-display>


								';

							}

						?>
					</div>




				</div>
				</template>
			</div>

			<footer>
				<?php include "common_components/footer.php" ?>
			</footer>

			</app-header-layout>

		</app-drawer-layout>

		<!-- <script type="text/javascript" src="/assets/js/toolbarSearch.js"></script> -->
		<script type="text/javascript" src="/assets/js/commonScript.js"></script>
		<!-- <script type="text/javascript" src="/assets/js/encode_req.js"></script> -->

		<script>

		function initialize()
		{
			getFollowedQuestions();
			getAnsweredQuestions();
			getAskedQuestions();
		}

		function getFollowedQuestions()
		{
			user = document.getElementById('userId').innerHTML;
			$.ajax({
					type: "post",
					url: "/user/getFollowedQuestions/"+user,
					cache: false,
					success: function(response)
					{
						$('#followingFeeds').append(response);
					}
				});
		}

		function getAnsweredQuestions()
		{
			user = document.getElementById('userId').innerHTML;
			$.ajax({
					type: "post",
					url: "/user/getAnsweredQuestions/"+user,
					cache: false,
					success: function(response)
					{
						$('#answerFeeds').append(response);
					}
				});
		}

		function getAskedQuestions()
		{
			user = document.getElementById('userId').innerHTML;
			$.ajax({
					type: "post",
					url: "/user/getAskedQuestions/"+user,
					cache: false,
					success: function(response)
					{
						$('#questionFeeds').append(response);
					}
				});
		}

		document.addEventListener('WebComponentsReady', function () {
			var template = document.querySelector('template[is="dom-bind"]');
			template.selected = 0;
			template.following_selected = 0;
		});

		</script>
	</body>
	</html>
