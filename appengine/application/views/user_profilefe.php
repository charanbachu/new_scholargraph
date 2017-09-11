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
				float: right;
				margin-left: 12px; 
				padding-right: 5px; 
				padding-top: 0px;
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
				margin-bottom: 5px;
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
				margin-top: 1px; 
				display: flex; 
				flex-direction: column; 
				padding: 12px 5px 15px 8px; 
				border-top: 1px solid rgba(0, 0, 0, 0); 
				width: 100%; 
				box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.14);
			}
			#rightPanel {
				margin-left: 12px; 
				padding-right: 5px; 
				padding-top: 0px;
			}
			.rightQuest {
				display: flex; 
				flex-direction: column;
				border-left: 1px solid rgba(0, 0, 0, 0);  
				padding: 14px 5px 25px 8px;
				border-top: 1px solid rgba(0, 0, 0, 0); 
				width: 100%; 
				box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.14);
			}
			.rightHead {
				display: flex; 
				align-items: center; 
				justify-content: center;
			}
			.covt {
				padding: 20px 20px 0px 20px;
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
			.rghtPaper {
				display: flex; 
				flex-direction: column; 
				border-left: 1px solid rgba(0, 0, 0, 0); 
				padding: 14px 5px 25px 8px; 
				border-top: 2px solid rgba(0, 0, 0, 0.04); 
				width: 100%; 
				box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.14);
			}
			#questions {
				height: 100%; 
				margin-top: 25px; 
				display: flex; 
				flex-direction: column; 
				position: relative;
			}
			.rgtPap {
				display: flex; 
				align-items: center; 
				justify-content: center;
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
				font-size: 22px;
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

				#loginButton {
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

				#loginButton {
					margin-top: 10px;
					display: block;
				}
			}
			.papcd {
			 	display: flex; 
			 	flex-direction: column; 
			 	padding: 14px 5px 20px 8px; 
			 	margin-right: 10px; 
			 	border-top: 2px solid rgba(0, 0, 0, 0.04);
			 	border-left: 1px solid rgba(0, 0, 0, 0.03); 
			 	box-shadow: 2px 1px 0px 1px rgba(0, 0, 0, 0.03); 
			 	height: 100%;
			 }
			 @media only screen and (max-width: 768px) {
			    .mainp {
			    	flex-direction: column;
			    }
			    .psycho {
			    	margin-bottom: 15px;
			    }
			    #rightPanel {
			    	margin-top: 0px;
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
				.rgtPap {
					padding: 20px;
					background-color: #F7F7F7;
				}
				.papcd {
					margin-right: 2px;
				}
				#questions {
					margin-top: 0px;
				}
				#loginButton {
					margin-top: 10px;
					display: block;
				}
				.rghtPaper {
					border-top: 2px solid rgba(0, 0, 0, 0.04);
					padding: 0px 0px 25px 0px; 
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
					    padding-bottom: 5px;
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
					margin-bottom: 15px;
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
			 #accountDropdown .accountDropdownItem {
			 	margin-right: 0px;
			 	min-width: 125px;
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
				<app-header fixed effects="waterfall" class="hdr">
					<?php include "common_components/app-header.php" ?>
				</app-header>
			<div id="container-fluid" class="flex-contain" style="width: 90%;">
			<p id="userId" hidden><?php echo $watched;?></p>
				<template is="dom-bind">
					<div class="mainp" style="display: flex;">
						<paper-card class="papcd">
						<div class="inr flex-2 leftbar" style="padding: 0px; padding-right: 5px;">
							<div id="profilePic">
								<img style="width:110px; height:110px;" src="/assets/images/profilePics/profile1.jpg">
							</div>
							<div id="leftPanel-desktop" style="width: 110%;">
								<div class="intro" style="text-align: center; margin-top: 10px;">
									<h1 class="prohead" style="color: #595959; font-size: 25px; font-weight: normal;"><span style="font-size: 30px; font-weight: normal;"></span>Vatsal <span style="font-size: 30px; font-weight: normal;"></span>Shrivastav</h1>
									<div class="dskIco">
										<p class="fgr" style="font-size: 14px; margin-top: 8px;">Student</p>
										<p class="fgr" style="font-size: 14px;">Star Contributor</p>
									</div>
									<div class="mobIco">
										<li class="fgr" style="font-size: 14px; display: inline;">Student </li><li style="font-size: 14px; display: inline; list-style-type: circle; color: #595959;">Contributor</li>
									</div>
								</div>
								<hr class="horiz" style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
								<div class="badIco dskIco" style="opacity: 0.5;">
									<div class="badgeIco" style="text-align: center; margin-top: 25px;">
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
								<hr class="horiz" style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
								<div id="college" style="margin-top: 35px; margin-left: 10px;">
									<div id="collegeData" style="padding-top: 5px;">
									<div class="collegeDetail ico expose" aria-expanded="false" aria-controls="colp1" onclick="toggle('#colp1')" style="display: flex; padding: 2px 5px 1px 4px;">
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
												echo 'Batch : '.$college->batch.'<br/></div></div>';
											}
											echo '</div>';
										}
									?>
									</div>
									<div id="collegeData" style="padding-top: 5px;">
									<div class="collegeDetail ico expose" aria-expanded="false" aria-controls="colp2" onclick="toggle('#colp2')" style="display: flex; padding: 2px 5px 1px 4px;">
									<?php
										foreach($userColleges as $college)
										{
											echo '
													<div class="itm flex-7">
													<a href="/college/details/'.encode_id($college->COLL_ID).'"><span style="color: #595959; font-weight: 300; font-size: 16px;"><b>'.$college->name.'</b></span></a><br/><div style="font-size: 14px; padding-top:3px; color: #595959;">'.
													$college->major.', '.$college->degree.'<br/>';
											if($college->batch != NULL)
											{
												echo 'Batch : '.$college->batch.'<br/></div></div>';
											}
											echo '</div>';
										}
									?>
									</div>
								</div>
							</div>
						</div>
						</paper-card>
						<div class="inr flex-5 feed" id="feed">
							<div class="tru" id="stats2">
							<paper-card style="display: flex; flex-direction: column; padding: 20px 5px 20px 8px; border-top: 2px solid rgba(0, 0, 0, 0.04); width: 100%; box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.14);">
								<div class="headTop">
									<p style="font-size: 17px; color: #009688; text-align: center;"><span style="font-weight: 500;">Star Contributor - </span><span style="font-size: 16px; color: #009688; font-weight: 500;">345<sup>th</sup></span><span style="font-size: 14px; color: #595959;"> top contributor on site: </span><span style="color: #0BBFB3; font-size: 15px;">follow</span> : <span style="color: #0BBFB3; font-size: 15px;">see all</span></p>
								</div>
								</paper-card>
								<paper-card class="mainInfo">
								<div class="items flexDet">
									<div class="f2">
										<div class="viewsData" style="text-align: center;">
											<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
												<span class="count fgr">Volume</span>
												<span class="countLabel fresp" id="cfont">235</span>
												<span class="countLabel" style="margin-top: 1px; color: #595959;">Questions Answered</span>
											</div>
										</div>
									</div>
									<div class="f2">
										<div class="viewsData" style="text-align: center;">
											<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
												<span class="count fgr">Impact</span>
												<span class="countLabel fresp" id="cfont2">High</span>
												<span class="countLabel" style="margin-top: 1px; color: #595959;">Answered Content</span>
											</div>
										</div>										
									</div>
									<div class="f2">
										<div class="viewsData" style="text-align: center;">
											<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
												<span class="count fgr">Accuracy</span>
												<span class="countLabel fresp" id="cfont3">Trusted</span>
												<span class="countLabel" style="margin-top: 1px; color: #595959;">Questions Asked</span>
											</div>
										</div>										
									</div>
									<div class="f2">
										<div class="viewsData" style="text-align: center;">
											<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
												<span class="count fgr">Community</span>
												<span class="countLabel fresp" id="cfont4">23</span>
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
								<paper-card style="margin-bottom: 5px; display: flex; flex-direction: column; padding: 14px 0px 15px 0px; border-top: 1px solid rgba(0, 0, 0, 0); border-left: 1px solid rgba(0, 0, 0, 0); box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.14);">
									<div class="headTop">
									<p style="font-size: 17px; text-align: center; margin-top: 10px;"><span style="font-weight: bold; font-size: 15px;">Stanford University - <span style="font-size: 14px; color: #009688; font-weight: bold;">Superstar Contributor</span><span style="font-size: 14px; color: #009688;"> - 23rd</span><span style="font-size: 14px; color: #595959;"> top contributor on site</span></p>
									</div>
									<hr style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
									<div class="items flexDet infoD">
										<div class="spce">
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Volume</span>
													<span class="countLabel rresp" id="dfont">235</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Questions Answered</span>
												</div>
											</div>
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex; flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Impact</span>
													<span class="countLabel rresp" id="dfont2">High</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Answered Content</span>
												</div>
											</div>										
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Accuracy</span>
													<span class="countLabel rresp" id="dfont3">Trusted</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Questions Asked</span>
												</div>
											</div>										
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Community</span>
													<span class="countLabel rresp" id="dfont4">23</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Participants</span>
												</div>
											</div>										
										</div>
										<script>
											if((document.getElementById("dfont2").innerHTML.length > 8) || (document.getElementById("dfont3").innerHTML.length > 8)){
												document.getElementById("dfont").style.fontSize = "16px";
												document.getElementById("dfont2").style.fontSize = "16px";
												document.getElementById("dfont3").style.fontSize = "16px";
												document.getElementById("dfont4").style.fontSize = "16px";
												var elements = document.getElementsByClassName('rresp');
												for (var i in elements) {
												    elements[i].className = 'rresp2';
												}
											}
											
										</script>
										<div class="spce">
										</div>
									</div>
									<hr style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
									<div class="retro">
										<div class="fl2">
											<div style="color: #009688; margin: 0px; padding-right: 10px; font-weight: 200; font-size: 35px; margin-left: 5px;">120</div>
											<div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
												<p style="color: #595959; margin: 0px; font-size: 14px; align-self: baseline;">profile views in</p>
												<p style="color: #595959; margin: 0px; font-size: 14px;">the last 30 days</p>
											</div>
										</div>
										<div class="fl4">
											<p class="flex-3" style="color: #595959; font-size: 14px; margin-right: 10px; margin-left: 20px;">Answer 25 questions to rise to the 5th position!</p>
											<div class="doc flex-2" style="text-align: center; margin-right: 6px;">
												<a href="http://localhost:8080/home"><div id="loginButton"><paper-ripple></paper-ripple>Contribute More</div></a>
											</div>
										</div>
									</div>
								</paper-card>
								<paper-card style="margin-bottom: 0px; display: flex; flex-direction: column; padding: 14px 0px 15px 0px; border-top: 1px solid rgba(0, 0, 0, 0); border-left: 1px solid rgba(0, 0, 0, 0); box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.14);">
									<div class="headTop">
									<p style="font-size: 17px; text-align: center; margin-top: 10px;"><span style="font-weight: bold; font-size: 15px;">Stanford University - <span style="font-size: 14px; color: #009688; font-weight: bold;">Superstar Contributor</span><span style="font-size: 14px; color: #009688;"> - 23rd</span><span style="font-size: 14px; color: #595959;"> top contributor on site</span></p>
									</div>
									<hr style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
									<div class="items flexDet infoD">
										<div class="spce">
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Volume</span>
													<span class="countLabel rresp" id="efont">235</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Questions Answered</span>
												</div>
											</div>
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex; flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Impact</span>
													<span class="countLabel rresp" id="efont2">High</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Answered Content</span>
												</div>
											</div>										
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Accuracy</span>
													<span class="countLabel rresp" id="efont3">Trusted</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Questions Asked</span>
												</div>
											</div>										
										</div>
										<div class="f2">
											<div class="viewsData" style="text-align: center;">
												<div class="viewsStats" style="display: flex;flex-direction: column;width: 100%; justify-content: center;align-items: center;">
													<span class="count fgr" style="font-size: 11px;">Community</span>
													<span class="countLabel rresp" id="efont4">23</span>
													<span class="countLabel" style="margin-top: 1px; font-size: 11px; color: #595959;">Participants</span>
												</div>
											</div>										
										</div>
										<script>
											if((document.getElementById("efont2").innerHTML.length > 8) || (document.getElementById("efont3").innerHTML.length > 8)){
												document.getElementById("efont").style.fontSize = "16px";
												document.getElementById("efont2").style.fontSize = "16px";
												document.getElementById("efont3").style.fontSize = "16px";
												document.getElementById("efont4").style.fontSize = "16px";
												var elements = document.getElementsByClassName('rresp');
												for (var i in elements) {
												    elements[i].className = 'rresp2';
												}
											}
											
										</script>
										<div class="spce">
										</div>
									</div>
									<hr style="width: 100%; text-align: center; color: #ccc; opacity: 0.2; margin-top: 20px;">
									<div class="retro">
										<div class="fl2">
											<div style="color: #009688; margin: 0px; padding-right: 10px; font-weight: 200; font-size: 35px; margin-left: 5px;">120</div>
											<div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
												<p style="color: #595959; margin: 0px; font-size: 14px; align-self: baseline;">profile views in</p>
												<p style="color: #595959; margin: 0px; font-size: 14px;">the last 30 days</p>
											</div>
										</div>
										<div class="fl4">
											<p class="flex-3" style="color: #595959; font-size: 14px; margin-right: 10px; margin-left: 20px;">Answer 25 questions to rise to the 5th position!</p>
											<div class="doc flex-2" style="text-align: center;">
												<a href="http://localhost:8080/home"><div id="loginButton"><paper-ripple></paper-ripple>Contribute More</div></a>
											</div>
										</div>
									</div>
								</paper-card>
							</div>
							<div class="psycho">
								<paper-card style="margin-bottom: 0px; display: flex; flex-direction: column; padding: 14px 0px 30px 0px; border-top: 1px solid rgba(0, 0, 0, 0); border-left: 1px solid rgba(0, 0, 0, 0); box-shadow: 0 2px 1px 0 rgba(0, 0, 0, 0.14);">
									<div style="margin-left: 10px;">
										<div class="hd"><b>Vatsal cares about:</b></div>
										<div class="tag" style="width: 100%;">
											<div class="tagContainer" style="margin-left: 5px; background-color: #C6F4EF;"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">Academics</div>
											<div class="tagContainer" style="margin-left: 5px; background-color: #C6F4EF;"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">Food</div>
											<div class="tagContainer" style="margin-left: 5px; background-color: #C6F4EF;"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">Gym</div>
											<div class="tagContainer" style="margin-left: 5px; background-color: #C6F4EF;"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">Sports</div>
											</div>
										<div class="hd" style="margin-top: 40px;"><b>Things which Vatsal is indifferent about:</b></div>
										<div class="tag2" style="width: 100%;">
											<div class="tagContainer" style="margin-left: 5px; background-color: #E8E0D5;"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">Faculty</div>
											<div class="tagContainer" style="margin-left: 5px; background-color: #E8E0D5;"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">Faculty</div>
										</div>
									</div>
								</paper-card>
							</div>
							<div id="tabs" style="width: 100%; margin-top: 0px;">
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
									<div id="followingFeeds" class="flw">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-telegram" id="fcoeft" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">Can you please answer my question and help me out.</p>
										</div>
										<hr style="width: 90%; text-align: center; color: #f7f7f7; opacity: 0.3;">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-telegram" id="fcoeft" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">This is my question can you please answer my question.</p>
										</div>
										<hr style="width: 90%; text-align: center; color: #f7f7f7; opacity: 0.3;">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-telegram" id="fcoeft" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">Can you please answer my question and help me out.</p>
										</div>
										<hr style="width: 90%; text-align: center; color: #f7f7f7; opacity: 0.3;">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-telegram" id="fcoeft" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">This is my question can you please answer my question.</p>
										</div>
									</div>
									<div id="answerFeeds" class="flw">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-check-circle" id="fcoeft2" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">This is my answer to your question. Feel free to ask more of them.</p>
										</div>
										<hr style="width: 90%; text-align: center; color: #f7f7f7; opacity: 0.3;">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-check-circle" id="fcoeft2" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">Answer to your question is here. Feel free to ask more.</p>
										</div>
										<hr style="width: 90%; text-align: center; color: #f7f7f7; opacity: 0.3;">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-check-circle" id="fcoeft2" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">This is my answer to your question. Feel free to ask more of them.</p>
										</div>
										<hr style="width: 90%; text-align: center; color: #f7f7f7; opacity: 0.3;">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-check-circle" id="fcoeft2" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">Answer to your question is here. Feel free to ask more.</p>
										</div>
									</div>
										
									<div id="questionFeeds" class="flw">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-question-circle" id="fcoeft" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">Can you please answer my question and help me out.</p>
										</div>
										<hr style="width: 90%; text-align: center; color: #f7f7f7; opacity: 0.3;">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-question-circle" id="fcoeft" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">This is my question can you please answer my question.</p>
										</div>
										<hr style="width: 90%; text-align: center; color: #f7f7f7; opacity: 0.3;">
										<div class="qbar">
											<span class="comm"><i class="tabico fa fa-question-circle" id="fcoeft" aria-hidden="true"></i><i class="tabdet">Dec 23, 2015</i></span>
											<p class="qans">This is my question can you please answer my question.</p>
										</div>
									</div>
								</iron-pages>
							</div>
						</div>
						<div id="rightPanel" class="inr flex-2" style="margin-left: 0%; padding-top: 0px; background-color: #fff;">
							
							<div id="questions" style="margin: 10px; margin-top: 0px; margin-right: 0px;">
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
					</div>
				</template>
			</div>

			<footer style="margin-top: 50px;">
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
			getFollowedQuestions();
			getAnsweredQuestions();
			getAskedQuestions();
		}

		function getFollowedQuestions()
		{
			user = document.getElementById('userId').innerHTML;
			$.ajax({
					type: "post",
					url: "/user/getFollowedQuestions/"+encode_id(user),
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
					url: "/user/getAnsweredQuestions/"+encode_id(user),
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
					url: "/user/getAskedQuestions/"+encode_id(user),
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

		function toggle(selector) {
		    document.querySelector(selector).toggle();
		}
		</script>
	</body>
	</html>