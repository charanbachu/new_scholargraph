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
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icons/home-icon.png'?>"/>
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports.html'?>">

		<!-- common css for header, footer, sidebar, etc. -->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/bower_components/iron-icons.html'?>">
		<!--  Google Font  -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:500" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
		html, body {
			font-family: 'Roboto', sans-serif;
			overflow-x: hidden;
			width: 100%;
			color: #595959;
		}
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

		#feeds
		{
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
			height: 110px;
			width: 110px;
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
			margin-bottom: 30px;
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
			font-size: 15px;
			padding-top: 10px;
		}

		.statsStats
		{
			display: inline-block;
			text-align: center;
			width: 49%;
			padding-top: 10px;
		}

		#questions
		{
			height: 155px;
			margin: 10px; 
			margin-top: 0px; 
			margin-right: 0px;
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

			#rightPanel
			{
				display: inline-block;
				margin-left: 2.5%;
				float: right;
			}

			#feeds
			{
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

			/* vatsal css  */
			#profileDetails:not([style-scope]):not(.style-scope) {
			    display: inline-flex;
			    text-align: left;
			    margin-left: 2%;
			    align-items: center;
			}
			.inr {
			}
			.leftbar {
				display: flex;
				flex-direction: column;
				align-items: center;
				flex-wrap: wrap;
			}
			.smaller {
				padding-top: 1px;
			    --iron-icon-height: 20px;
			    --iron-icon-width: 20px;
			}
			.accesicon {
			    --iron-icon-height: 24px;
			    --iron-icon-width: 24px;
			}
			#feed {
				display: flex;
				flex-direction: column;
				align-items: center;
				padding-left: 5px;
			}
			.clr {
				background-color: #eee;
				color: #fff;
				padding: 5px;
			}
			.ico:hover {
				cursor: pointer;
			}
			.ico2:hover {
				cursor: pointer;
			}
			.ico3:hover {
				cursor: pointer;
			}
			.ico:hover > .icoeft {
				cursor: pointer;
			    fill: #f09300;
			}
			.icoeft {
			    transition: all 0.2s;
			    -webkit-transition: all 0.2s;
			}
			.clbtn:hover {
				cursor: pointer;
				color: #ff1111;
			}
			.clbtn {
			    transition: all 0.5s;
			    -webkit-transition: all 0.5s;
			}
			.cico:hover > .cicoeft {
				cursor: pointer;
			    fill: #ff1111;
			}
			.cicoeft {
				cursor: pointer;
			    transition: all 0.5s;
			    -webkit-transition: all 0.5s;
			}

			#fcoeft:hover {
				cursor: pointer;
				color: #ff1111;
			}
			#fcoeft {
			    transition: all 0.2s;
			    -webkit-transition: all 0.2s;
			}
			#fcoeft2:hover {
				cursor: pointer;
				color: #00c853;
			}
			#fcoeft2 {
			    transition: all 0.2s;
			    -webkit-transition: all 0.2s;
			}
			.ico2:hover > .icoeft2 {
				cursor: pointer;
			    fill: #00c853;
			    opacity: 1;
			}
			.icoeft2 {
				opacity: 0.85;
				fill: #0A963D;
				margin-right: 5px;
			    transition: all 0.2s;
			    -webkit-transition: all 0.2s;
			}
			.ico3:hover > .icoeft3 {
				cursor: pointer;
			    fill: #ff1111;
			    opacity: 1;
			}
			.icoeft3 {
				opacity: 0.85;
				fill: #CE2812;
			    transition: all 0.2s;
			    margin-right: 5px;
			    -webkit-transition: all 0.2s;
			}
			.icochk {
				fill: #009688;
				margin-left: 5px;
				--iron-icon-height: 22px;
    			--iron-icon-width: 22px;
			}
			.icoout {
				fill: #595959;
				opacity: 0.7;
				--iron-icon-height: 35px;
    			--iron-icon-width: 35px;
			}
			.paper-tabs-0 #selectionBar.paper-tabs {
			    position: absolute;
			    height: 3px;
			    bottom: 0;
			    left: 0;
			    right: 0;
			    background-color: #eaeaea;
			    -webkit-transform: scale(0);
			    transform: scale(0);
			    -webkit-transform-origin: left center;
			    transform-origin: left center;
			    transition: -webkit-transform;
			    transition: transform;
			}
			.paper-tab-0 paper-ripple.paper-tab {
			    color: #eaeaea;
			}
			.mobclp {
				display: none;
			}
			.feed {
				padding-top: 0px;
			}
			.line {
				display: none;
			}
			#stats2 {
				display: flex;
				flex-direction: column; 
				width: 100%; 
				padding-top: 0px;
			}
			#psyc {
				font-size: 18px; 
				width: 80%; 
				text-align: center; 
				margin-top: 20px; 
				margin-bottom: 15px;
			}
			.qans {
				padding-left: 8px; 
				font-size: 17px; 
				padding-top: 8px;
			}
			.qbar {
				padding-bottom: 10px; 
				display: flex; 
				padding-top: 15px; 
				padding-left: 10px; 
				width: 100%;
			}
			.tabico {
				font-size: 35px;
			    margin-left: 0px;
			}
			.tabdet {
				text-align: center; 
				padding-top: 5px; 
				font-size: 13px;
			}
			.icodec {
				font-size: 16px;
			}
			.flw {
				display: flex; 
				flex-direction: column; 
				margin-right: 300px;
			}
			.dat {
				font-size: 24px; 
				font-weight: bold; 
				padding-left: 10px;
			}
			.mdat {
				font-size: 20px; 
				font-weight: bold; 
				padding-left: 10px;
			}
			.ara {
				font-size: 18px; 
				width: 100%; 
				text-align: center; 
				padding-top: 10px; 
				padding-bottom: 10px;
			}
			.mtru {
				display: flex; 
				width: 100%; 
				padding-top: 18px;
			}
			.mprg {
				width: 100%; 
				padding-top: 20px;
				padding-bottom: 15px;
			}
			.mstats {
				width: 50%; 
				padding-top: 1%; 
				text-align: center;
			}
			.mviews {
				width: 50%; 
				padding-top: 1%; 
				text-align: center;
			}
			.perc {
				font-size: 20px; 
				font-weight: bold; 
				padding-left: 5px
			}
			.sviews {
				width: 40%; 
				padding-top: 2%; 
				margin-left: 5%;
			}
			.sstats {
				width: 40%; 
				padding-top: 2%;
			}
			.psycho {
				display: flex; 
				justify-content: center; 
				width: 100%;
				margin-top: 5px;
				flex-direction: column; 
				margin-bottom: 30px;
			}
			.fillspc {
				display: flex; 
				flex-direction: column; 
				flex-wrap: wrap;
				margin-bottom: 20px;
			}
			.hdr iron-icon {
				margin-right: 0px;
			}
			.comm {
				display: flex; 
				flex-direction: column; 
				align-items: center; 
				font-size: 13px;
			}
			.prohead {
				font-size: 20px;
				font-family: 'Roboto', sans-serif;
				font-weight: 500;
			}
			.flexDet {
				display: flex; 
				flex-direction: row; 
				width: 100%; 
				margin-bottom: 20px;
			}
			.flexDet .f2 {
				flex: 1;
			}
			.tru {
				justify-content: center; 
				align-items: center; 
				width: 100%; 
				margin-bottom: 5px;
			}
			.infoD {
				display: flex; 
				flex-direction: row; 
				width: 100%; 
				margin-top: 10px; 
				margin-bottom: 20px;
			}
			.mainInfo {
				margin-top: 5px; 
				display: flex; 
				flex-direction: column; 
				padding: 12px 5px 15px 8px; 
				width: 100%; 
				box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
				border-top: 1px solid rgba(0, 0, 0, 0.04);
			}
			#rightPanel {
				margin-left: 15px;  
				padding-top: 0px;
			}
			.rightQuest {
				display: flex; 
				flex-direction: column;  
				padding: 14px 5px 25px 8px; 
				width: 100%; 
				box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
				border-top: 1px solid rgba(0, 0, 0, 0.04);
			}
			.rightHead {
				display: flex; 
				align-items: center; 
				justify-content: center;
			}
			.covt {
				padding: 10px 20px 0px 20px;
			}
			.retro {
				width: 100%; 
				display: flex; 
				flex-direction: row;
			}
			.fl2 {
				display: flex;
				flex: 2;
				justify-content: center; 
				align-items: center;
			}
			.fl4 {
				display: flex; 
				flex: 4;
				justify-content: center; 
				align-items: center;
			}
			.spce {
				display: flex;
				flex: 1;
			}
			.mobIco {
				display: none;
			}
			.smallbge {
				width:40px; 
				height:40px;
			}
			.bigbge {
				width:30px; 
				height:30px;
			}
			/* new */
			.fresp {
				margin-top: 3px; 
				color: #009688; 
				font-size: 27px; 
				font-weight: 200;
			}
			.fresp2 {
				margin-top: 3px; 
				color: #009688; 
				font-size: 20px; 
				font-weight: 200;
			}
			.rresp {
				margin-top: 3px; 
				color: #595959;
				font-size: 16px;
			}
			.rresp2 {
				margin-top: 3px; 
				color: #595959; 
				font-size: 16px;
			}
			paper-progress.blue {
			    --paper-progress-active-color: var(--paper-light-blue-500);
			    --paper-progress-secondary-color: var(--paper-light-blue-100);
			    --paper-progress-height: 20px;
			  }
			 @media only screen and (max-width: 1367px)  {
				.flex-contain {
				    margin: 10px auto;
				    width: 90%;
				}

				#loginbutton2 {
					display: block;
				}
			}
			@media only screen and (max-width: 1024px) {
				.flex-contain {
				    width: 90%;
				}
				.spce {
					display: none;
				}
				.fl2 {
					flex: 1;
					flex-direction: column;
				}
				.fl4 {
					flex: 1;
					flex-direction: column;
				}

				#loginbutton2 {
					margin-top: 10px;
					display: block;
				}
			}
			.papcd {
			 	display: flex; 
			 	flex-direction: column; 
			 	padding: 14px 5px 20px 8px; 
			 	margin-right: 5px; 
			 	box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
			 	border-top: 1px solid rgba(0, 0, 0, 0.04);
			 	height: 100%;
			 }
			 @media only screen and (max-width: 768px) {
			    .mainp {
			    	flex-direction: column;
			    }
			    #questions {
			    	margin-left: 0px;
			    }
			    .psycho {
			    	margin-bottom: 15px;
			    }
			    #rightPanel {
			    	margin-left: 0px;
			    }
			    .mobIco {
			    	display: block;
			    }
			    .dskIco {
			    	display: none;
			    }
			    .flex-contain {
				    width: 90%;
				}
				.papcd {
					margin-right: 2px;
				}

				#loginbutton2 {
					margin-top: 10px;
					display: block;
				}
			    #college {
			    	display: none;
			    }
			    .mobclp {
			    	display: block;
			    }
			    .dskclp {
			    	display: none;
			    }
			    .line {
			    	display: block;
			    	padding-top: 5px;
			    }
			    .horiz {
			    	display: none;
			    }
			    #stats2 {
			    	    padding-top: 10px;
					    padding-bottom: 22px;
				}
			    #feed {
			    	padding-top: 2px;
			    	padding-left: 0px;
			    }
			    .views {
			    	margin-bottom: 24px;
			    }
			    .stats {
			    	margin-bottom: 24px;
			    }
			    .dspclp {
			    	display: none;
			    }
			    #psyc {
					font-size: 18px; 
					width: 80%; 
					text-align: center; 
					margin-top: 25px; 
					margin-bottom: 5px;
				}
				.collpsed {
					border: 2px solid #efefef;
				}
				#rightPanel {
				}
				.qans {
					font-size: 15px;
				}
				.qbar {
					padding-bottom: 5px;
				    display: flex;
				    padding-top: 15px;
				    padding-left: 10px;
				    width: 100%;
				}
				.tabico {
					font-size: 29px;
				}
				.tabdet {
					font-size: 10px;
				}
				.icodec {
					font-size: 13px;
				}
			}
			@media only screen and (max-width: 680px) {
				.fillspc {
			 		margin-bottom: 10px;
			 	}
			}
			@media only screen and (max-width: 532px) {
			 	.mtru {
			 		flex-direction: column;
			 		text-align: center;
			 	}
			 	.mstats {
			 		width: 100%;
			 	}
			 	.mviews {
			 		width: 100%;
			 		padding-top: 20px;
			 	}
			 }
			@media only screen and (max-width: 532px) {
			 	.mdat {
			 		font-size: 18px;
			 	}
			 	.perc {
			 		font-size: 18px;
			 	}
			 }
			@media only screen and (max-width: 472px) {
				.qans {
					font-size: 13px;
				}
				.tabico {
					font-size: 25px;
				}
				.tabdet {
					font-size: 8px;
				}
				.psycho {
					margin-top: 15px;
				}
			}
			 @media only screen and (max-width: 375px) {
			 	.flw {
					display: flex; 
					flex-direction: column; 
					margin-right: 100px;
				}
				.emt {
					display: none;
				}
				.fillspc {
					padding-left: 10px;
				}
			 }
			 @media only screen and (max-width: 360px) {
			 	.viewsTitle {
			 		font-size: 14px;
			 	}
			 	.statisTit {
			 		font-size: 14px;
			 	}
			 }
			 @media only screen and (max-width: 352px) {
			 	#stats2 {
			 		flex-direction: column;
			 	}
			 	.sviews {
			 		width: 80%;
				    padding-top: 15px;
				    margin-left: 10%;
			 	}
			 	.sstats {
			 		width: 80%;
			 		padding-top: 18px;
			 		margin-left: 10%;
			 	}
			 	.viewsStats {
					padding-top: 3px;
				}
				.statsStats {
					padding-top: 3px;
				}
			 }
			 @media only screen and (max-width: 541px) {
			 	.flexDet {
			 		flex-wrap: wrap;
			 	}
			 	.flexDet .f2 {
					flex: 1 1 50%;
				}
				.tru {
					margin-bottom: 0px;
				}
				#stats2 {
					padding-bottom: 5px;
				}
				.infoD {
					margin-top: 0px;
					margin-bottom: 10px;
				}
				.mainInfo {
					padding: 5px 5px 5px 8px;
				}
				#rightPanel {
					padding-top: 0px;
				}
				.psycho {
					margin-bottom: 5px;
				}
				.rightHead {
					padding: 20px;
					background-color: #F7F7F7;
				}
				.rightQuest {
					padding: 5px 0px 25px 0px;
				}
				.covt {
					padding: 5px 20px 0px 20px;
				}
				.fl2 {
					flex: 1;
					flex-direction: column;
				}
				.fl4 {
					flex: 1;
					flex-direction: column;
				}
			 }
			 @media only screen and (max-width: 300px) {
			 	#rec {
			 		display: none;
			 	}
			 }
			 .fgr {
			 	color: #595959;
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
			var questionDialog = document.querySelector("psycho-struct");
			console.log("takeSurvey");
			document.getElementById("wfl").style.zIndex = "0";
			questionDialog.toggle();
			'.
			$GLOBALS["a"] = 1
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
				<app-header fixed effects="waterfall" class="hdr">
					<?php include "common_components/app-header.php" ?>
				</app-header>

			<div id="container-fluid" class="flex-contain" style="width: 95%; margin-left:2.5%; padding-top: 10px;">
			<div id= "cid" hidden><?php echo $userData["id"];?></div>
			<p id="userId" hidden><?php echo $watched;?></p>
				<p id="userId" hidden><?php echo $watched;?></p>
				<template is="dom-bind">
					<div class="mainp" style="display: flex;">
						<div class="inr flex-2 leftbar">
							<div id="leftPanel-desktop" style="width: 100%;">
								<paper-card class="papcd">
								<div style="width: 100%; display: flex; justify-content: center;">
									<div id="profilePic">
										<img style="width:110px; height:110px;" src="/assets/images/profilePics/profile1.jpg">
									</div>
								</div>
								<div class="intro" style="text-align: center; margin-top: 10px;">
									<h1 class="prohead" style="color: #595959; font-size: 25px; font-weight: normal;"><span style="font-size: 30px; font-weight: normal;"></span><?php echo $userData["Display_Name"];?></h1>
									<div class="dskIco">
										<p class="fgr" style="font-size: 14px; margin-top: 8px;">
											<?php
											$member = '';
											foreach($userColleges as $college)
											{
												if($college->member == 'student' && $member!='faculty')
												{
													$member = 'student';
												}
												else if($college->member == 'faculty')
												{
													$member = 'faculty';
												}
												else if($college->member == 'alumini' && ($member!='faculty' or $member!='student'))
												{
													$member = 'alumini';	
												}
											}
											echo $member;
											?>
										</p>
										<p class="fgr" style="font-size: 14px;"><?php echo $total_data['contributor']; ?></p>
									</div>
									<div class="mobIco">
										<li class="fgr" style="font-size: 14px; display: inline;">Student </li><li style="font-size: 14px; display: inline; list-style-type: circle; color: #595959;">Contributor</li>
									</div>
								</div>
								<hr class="horiz" style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
								<div class="badIco dskIco" style="opacity: 0.5;">
									<div class="badgeIco" style="text-align: center; margin-top: 20px;">
										<iron-image class="smallbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="smallbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="smallbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
									</div>
									<div class="badgeIco" style="text-align: center; margin-top: 8px;">
										<iron-image class="smallbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="smallbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="smallbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
									</div>
								</div>
								<div class="badIco mobIco" style="opacity: 0.5;">
									<div class="badgeIco" style="text-align: center; margin-top: 15px;">
										<iron-image class="bigbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="bigbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="bigbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="bigbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="bigbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
										<iron-image class="bigbge" sizing="cover" src="/assets/images/icons/badge.png"></iron-image>
									</div>
								</div>
								</paper-card>
								<paper-card class="papcd" style="margin-top: 5px;">
								<div id="college" style="margin-top: 0px; margin-left: 15px;">
									<div id="collegeData">
									<div class="collegeDetail ico expose" aria-expanded="false" aria-controls="colp1" onclick="toggle('#colp1')" style="display: flex;"></div>
									<?php
										foreach($userColleges as $college)
										{
											echo '
													<div class="itm flex-7">
													<a href="/college/details/'.encode_id($college->COLL_ID).'"><span style="color: #595959; font-weight: 300; font-size: 16px;"><b>'.$college->name.'</b></span>
													</a><br/><div style="font-size: 14px; padding-top:2px; color: #595959;">'.
													$college->major.', '.$college->degree.'<br/>';
											if($college->batch != NULL)
											{
												echo 'Batch : '.$college->batch.'<br/></div>';
											}
											else{
												echo '</div>';
											}
											echo '</div>';
											echo '<br>';
										}
									?>
								</div>
								
									</div>
								</paper-card>
							</div>
						</div>
						<div class="inr flex-5 feed" id="feed">
							<div class="tru" id="stats2">
							<paper-card style="display: flex; flex-direction: column; padding: 20px 5px 20px 8px; box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2); border-top: 1px solid rgba(0, 0, 0, 0.04); width: 100%;">
								<div class="headTop">
									<?php
									if($total_data['rank'] == 1) $tot_rank = $total_data['rank'].'<sup>st</sup>';
									else if($total_data['rank'] == 2) $tot_rank = $total_data['rank'].'<sup>nd</sup>';
									else if($total_data['rank'] == 3) $tot_rank = $total_data['rank'].'<sup>rd</sup>';
									else $tot_rank = $total_data['rank'].'<sup>th</sup>';
									?>
									<p style="font-size: 17px; color: #009688; text-align: center;"><span style="font-weight: 500;"><?php echo $total_data['contributor']; ?> - </span><span style="font-size: 16px; color: #009688; font-weight: 500;"> <?php echo $tot_rank; ?> </span><span style="font-size: 14px; color: #595959;"> top contributor on site: </span><span style="color: #0BBFB3; font-size: 15px;">follow</span> : <span style="color: #0BBFB3; font-size: 15px;"><a style="color: #0BBFB3; font-size: 15px;"  href="<?php echo base_url().'user/getLeaderboard'?>"">see all</a>	</span></p>
								</div>
								</paper-card>
								<paper-card class="mainInfo">
								<div class="items flexDet">
									<div class="f2">
										<div class="viewsData" style="text-align: center;">
											<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
												<span class="count fgr">Volume</span>
												<span class="countLabel fresp" id="cfont"><?php echo $total_data['volume']; ?></span>
												<span class="countLabel" style="margin-top: 1px; color: #595959;">Questions Answered</span>
											</div>
										</div>
									</div>
									<div class="f2">
										<div class="viewsData" style="text-align: center;">
											<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
												<span class="count fgr">Impact</span>
												<span class="countLabel fresp" id="cfont2"><?php echo $total_data['impact']; ?></span>
												<span class="countLabel" style="margin-top: 1px; color: #595959;">Answered Content</span>
											</div>
										</div>										
									</div>
									<div class="f2">
										<div class="viewsData" style="text-align: center;">
											<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
												<span class="count fgr">Accuracy</span>
												<span class="countLabel fresp" id="cfont3"><?php echo $total_data['accuracy']; ?></span>
												<span class="countLabel" style="margin-top: 1px; color: #595959;">Questions Asked</span>
											</div>
										</div>										
									</div>
									<div class="f2">
										<div class="viewsData" style="text-align: center;">
											<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
												<span class="count fgr">Community</span>
												<span class="countLabel fresp" id="cfont4"><?php echo $total_data['community']; ?></span>
												<span class="countLabel" style="margin-top: 1px; color: #595959;">Participants</span>
											</div>
										</div>										
									</div>
									<script>
										if((document.getElementById("cfont2").innerHTML.length > 8) || (document.getElementById("cfont3").innerHTML.length > 8)){
											document.getElementById("cfont").style.fontSize = "20px";
											document.getElementById("cfont2").style.fontSize = "20px";
											document.getElementById("cfont3").style.fontSize = "20px";
											document.getElementById("cfont4").style.fontSize = "20px";
											var elements = document.getElementsByClassName('fresp');
											for (var i in elements) {
											    elements[i].className = 'fresp2';
											}
										}
									</script>
								</div>
								</paper-card>
							</div>
							
							<div class="pCard" style="display: flex; width: 100%; flex-direction: column;">
								<?php
									$var=-1;
									
									foreach($userColleges as $college)
									{

										//$var =  (string)$college->name;
										$var++;
										//print_r($userColleges[0]);
										
										
										if($college->rank[0] == 1) $coll_rank = $college->rank[0].'<sup>st</sup>';
										else if($college->rank[0] == 2) $coll_rank = $college->rank[0].'<sup>nd</sup>';
										else if($college->rank[0] == 3) $coll_rank = $college->rank[0].'<sup>rd</sup>';
										else $coll_rank = $college->rank[0].'<sup>th</sup>';
										
										if($college->rank[1] == 1) $hike_rank = $college->rank[1].'<sup>st</sup>';
										else if($college->rank[1] == 2) $hike_rank = $college->rank[1].'<sup>nd</sup>';
										else if($college->rank[1] == 3) $hike_rank = $college->rank[1].'<sup>rd</sup>';
										else $hike_rank = $college->rank[1].'<sup>th</sup>';
										//echo $var;
										echo '
										<paper-card style="margin-bottom: 0px; display: flex; flex-direction: column; padding: 14px 0px 15px 0px; box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2); border-top: 1px solid rgba(0, 0, 0, 0.04);">
									<div class="headTop">
									<p style="font-size: 17px; text-align: center; margin-top: 10px;"><span style="font-weight: bold; font-size: 15px;">'.$college->name.' - <span style="font-size: 14px; color: #009688; font-weight: bold;">'.$college->contributor.'</span><span style="font-size: 14px; color: #009688;"> - '.$coll_rank.'</span><span style="font-size: 14px; color: #595959;"> top contributor on site</span></p>
									</div>
									<hr style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
									<div class="items flexDet infoD">
										<div class="spce">
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Volume</span>
													<span class="countLabel rresp" id="dfont">'.$college->volume.'</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Questions Answered</span>
												</div>
											</div>
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex; flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Impact</span>
													<span class="countLabel rresp" id="dfont2">'.$college->impact.'</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Answered Content</span>
												</div>
											</div>										
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Accuracy</span>
													<span class="countLabel rresp" id="dfont3">'.$college->accuracy.'</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Questions Asked</span>
												</div>
											</div>										
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Community</span>
													<span class="countLabel rresp" id="dfont4">'.$college->community.'</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Participants</span>
												</div>
											</div>										
										</div>'; ?>
										<?php echo '<script type="text/javascript">',
										     'myFunction();',
										     '</script>'
										; ?>
										<?php echo '<div class="spce">
										</div>
									</div>
									<hr style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
									<div class="retro">
										<div class="fl2">
											<p style="color: #009688; margin: 0px; padding-right: 10px; font-weight: 200; font-size: 35px; margin-left: 5px;">'.$college->views.'</p>
											<div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
												<p style="color: #595959; margin: 0px; font-size: 14px; align-self: baseline;">profile views </p>
												<p style="color: #595959; margin: 0px; font-size: 14px;">after '.$userData["Display_Name"].' contribution starts.</p>
											</div>
										</div>
										<div class="fl4">
											<p class="flex-3" style="color: #595959; font-size: 14px; margin-right: 10px; margin-left: 20px;">Answer 20 questions to rise to the '.$hike_rank.' position!</p>
											
										</div>
									</div>
								</paper-card>
										';
									}
								?>
							</div>
							<?php
							if(sizeof($tags)!=0)
							{
								echo '<div class="psycho">
								<paper-card style="margin-bottom: 0px; display: flex; flex-direction: column; padding: 14px 0px 30px 0px; box-shadow:0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2); border-top: 1px solid rgba(0, 0, 0, 0.04);">
									<div style="margin-left: 10px;">
										<div class="hd"><b>'.$userData["Display_Name"].' cares about:</b></div>
										<div class="tag" style="width: 100%;">';
										for($i=0;$i<sizeof($tags);$i++)
												{
													if($tags[$i][1]==-1)
													{
														echo '
														<div class="tagContainer" style="margin-left: 5px; background-color: #C6F4EF;"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">'.$tags[$i][0].'</div>
														';
													}
												}
									echo '</div>
										<div class="hd" style="margin-top: 40px;"><b>Things which '.$userData["Display_Name"].' is indifferent about:</b></div>
										<div class="tag2" style="width: 100%;">';
									for($i=0;$i<sizeof($tags);$i++)
											{
												if($tags[$i][1]== 1)
												{
													echo '
													<div class="tagContainer" style="margin-left: 5px; background-color: #E8E0D5;"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">'.$tags[$i][0].'</div>
													';
												}
											}
									echo '</div>
									</div>
								</paper-card>
							</div>';	
							} 
							?>
						</div>
						<div id="rightPanel" class="inr flex-2">
							<paper-card class="rightQuest">
								<div class="rightHead">
									<div style="font-size: 15px; color: #009688; font-weight: bold;"><span>Top answered questions by <?php echo $userData["Display_Name"]; ?> </span></div>
								</div>
							</paper-card>
						</div>
					</div>
				</template>
			</div>

			<footer id="footer1" style="margin-top: 130px; ">
				<?php 
				if(sizeof($userColleges) == 1)
				{

				}
				?>
				<?php include "common_components/footer.php" ?>
			</footer>

			</app-header-layout>

		</app-drawer-layout>

		<!-- <script type="text/javascript" src="/assets/js/toolbarSearch.js"></script> -->
		<script type="text/javascript" src="/assets/js/commonScript.js"></script>
		<!-- <script type="text/javascript" src="/assets/js/encode_req.js"></script> -->

		<script>
		$(document).ready(function(){
		    $('.expose').click(function(){
			    $('.expose').css('z-index','99999');
			});
		});
		function initialize()
		{
			 getPublicAnswered();
			 var val = '<?php echo sizeof($userColleges); ?>';
			
		}

		function getPublicAnswered()
		{
			user = document.getElementById('userId').innerHTML;
			$.ajax({
					type: "post",
					url: "/user/getPublicAnswered/"+user,
					cache: false,
					success: function(response)
					{
						$('#rightPanel').append(response);
					}
				});
		}

		document.addEventListener('WebComponentsReady', function () {
			var template = document.querySelector('template[is="dom-bind"]');
			template.selected = 0;
			template.following_selected = 0;
		});

		function toggle(selector) {
		    document.querySelector(selector).toggle();
		}
		</script>
	</body>
	</html>