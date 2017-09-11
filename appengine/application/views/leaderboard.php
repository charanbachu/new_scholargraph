<?php
use google\appengine\api\cloud_storage\CloudStorageTools;
$options = ['gs_bucket_name' => BUCKET_NAME];
//$upload_url = CloudStorageTools::createUploadUrl(site_url('Communication/saveQuestion'), $options);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>LeaderBoard</title>
<meta content="text/html" charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- For polyfill support across non-compatible browsers-->
<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/encode_req.js"></script>

<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icons/home-icon.png'?>"/>
<link href="<?php echo asset_url();?>css/jquery.tagit.css" rel="stylesheet" type="text/css">
<link href="<?php echo asset_url();?>css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
<!--importing vulcanized polymer dependencies-->
<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports-vulc.html'?>">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- common css for header, footer, sidebar, etc. -->
<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">

<script type="text/javascript" src="<?php echo asset_url();?>js/clipboard.js"></script>
<script src="<?php echo asset_url();?>js/tag-it.js" type="text/javascript" charset="utf-8"></script>

<style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
	html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
	.college {
		/*width: inherit;*/
	}
	#container{
		width: 90%;
		margin: 10px auto;
		margin-top: 0px;
		margin-bottom: 5%;
		background-color: #fff;
	}

	#leftPanel{
		margin-left: 0px;
		/*padding-right: 6px;*/
		margin-top: 10px;
		 @apply(--shadow-elevation-2dp);
				 background-color: white;
				 overflow: auto;

	}

      #collapse3 {
        max-height: 250px;
      }
	.categoryOptions paper-checkbox {
		width: 100%;
	}

	#rightPanel{
		padding-left: 15px;
		padding-right: 12px;
		padding-top: 0px;
		display: inline-table;
		width: 78%;
	}

	paper-card{
		color: black;
	}

	#leftSort {
		/*visibility: hidden;
		display: none;*/
	}

	#profilesResults paper-card {
		display: block;
		margin-top: 5px;
		padding: 12px;
		padding-left: 15px;
		padding-right: 15px;
	}

	.college-heading {
		color: #009688;
		font-weight: 500;
		text-transform: capitalize;
		font-size: 14px;
		margin-bottom: 3px;
		/*width: 70%;*/

	}



	.college-loc {
		display: inline-block;
		color: #868686;
		/*padding-left: 10px;*/
		font-size: 12px;
	}

	.college-affil {
		display: inline-block;
		color: #868686;
		margin-left: 20px;
		font-size: 12px;
	}

     .left-up {
     	display: inline-block;
    }

     .right-up {
     	display: inline-block;
     	text-align: right;
     	color: #ffd400;
     	display: flex; 
     	flex-direction: column; 
     	justify-content: space-between;
     }
     .fnew {
     	font-size: 11px;
     }
     .newfnt {
     	margin-right: 7px;
     }

     .other-details {
     	margin-top: 15px;
     }

     .detail1 {
     	display: inline-block;
     	font-size: 13px;
     	color: #959595;
     	margin-right: 10px;
     }

     .detail2 {
     	display: inline-block;
     	/*font-weight: 600;*/
     	font-size: 13px;
     	color: #959595;
     	/*padding-left: 10px;*/
     }
	.mobile-bottom-bar div{
		position: relative;
		cursor: pointer;
	}
     .det1 {
     	display: inline-block;
     }

     .det1-res {
     	font-weight: 600;
     	display: inline-block;
     }

     .rating {
     	/*height: 400px;*/
     }

     .rating-point {
     	font-size: 30px;
     	font-weight: 600;
     	display: inline-block;
     }

     .rating-det {
     	height: 15px;
     	display: inline-block;
     }

     .rating-stars {
     	display: inline-block;
     }

     .rating-stars iron-icon {
     	height: 10px;
     	width: 10px;
     	padding-left: 1px;
     }


     .rating-label {
     	font-size: 10px;
     	color: #959595;
     	text-align: right;
     }

     .compare-button paper-button {
     	background-color: #009688;
     	color: white;
     	font-size: 12px;
     	border-top-right-radius: 0px;
     	border-top-left-radius: 0px;
     	border-bottom-left-radius: 0px;
     	border-bottom-right-radius: 0px;
     	margin-top: 2px;
     }

	#filterHeading{
		width: 90%;
		margin: 0 auto;
		line-height: 48px;
		font-weight: 500;
		font-size: 14px;
		letter-spacing: 0.018em;
		text-rendering: optimizeLegibility;
	}

	#collegeFilters{
		color : black;
		width: 90%;
		display: block;
		margin: 0 auto;
	}

	#closeFilter{
		display: none;
	}

	#mobileBottomBar{
		display: none;
	}

	.abst {
		--paper-tabs-selection-bar-color: #009688;
	}
	.custom2 {
		width: 220px;
	}
	.lbar {
		height: 100%; 
		overflow-x: hidden; 
		width: 20%;
	}
	.applyBar{
		display: none;
	}
				#filter-res {
				width: 89.5%;
				margin: 0 auto;
				/*line-height: 48px;*/
				/*font-weight: 500;*/
				font-size: 14px;
				letter-spacing: 0.018em;
				text-rendering: optimizeLegibility;
				display: inline-block;
				font-size: 13px;
				/*width: 90%;*/
				padding-left: 15px;
				padding-right: 15px;
			}

			#found {
				color: grey;
				text-align: left;
				width: 60%;
				display: inline-block;
				/*font-size: 10px;*/
			}

			#def {
				color: #278a80;
				text-align: right;
				/*width: 50%;*/
				display: inline-block;
				float: right;
			}
			.filterName {
				width: 100%;
				margin: 0 auto;
				/*line-height: 48px;*/
				/*font-weight: 500;*/
				font-size: 14px;
				letter-spacing: 0.018em;
				text-rendering: optimizeLegibility;
				margin-top: 5px;
				color: #278a80;
				background-color: #f9f9f9;
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 9px;
				display: inline-block;
				padding-left: 15px;
				padding-right: 15px;
				/*width: 90.5%;*/
				/*margin-right: 10px;*/
				cursor: pointer;
			}

			#name-detail {
				width: 60%;
				display: inline-block;
				text-align: left;
				/*padding-top: 5px;*/
				font-size: 13px;
				font-weight: 900;
			}

			#cross {
				float: right;
				/*display: inline-block;*/
				font-size: 5px;
			}

			#cross iron-icon {
				/*padding-top: 3px;*/
			}

			.searchBox {
				width: 89.5%;
				margin: 0 auto;
				margin-bottom: 10px;
				color: #f0f0f0;
				border-bottom-right-radius: 2px;
				border-bottom-left-radius: 2px;
				border-top-left-radius: 2px;
				border-top-right-radius: 2px;
				border: 0.5px #f2f2f2 solid;
			}

			.listOptions {
				width: 89.5%;
				margin: 0 auto;
				color: #f0f0f0;
				font-size: 13px;
				min-height: 50px;
				max-height: 150px;
				overflow: auto;
			}

			.listOptions .categoryOptions{
				display: block;
				margin-bottom: 3px;
				margin-top: 3px;
			}
	@media only screen and (max-width: 1300px){
		.custom2 {
			width: 200px;
		}
	}
	@media only screen and (max-width: 1200px){
		.custom2 {
			width: 180px;
		}
	}
	@media only screen and (max-width: 1024px){
		.custom2 {
			width: 155px;
		}
	}
	@media only screen and (max-width: 900px){
		.custom2 {
			width: 140px;
		}
	}
	@media only screen and (max-width: 800px){
		.custom2 {
			width: 125px;
		}
	}
	@media only screen and (max-width: 769px){
		#rightPanel{
			padding-right: 0px;
			padding-left: 0px;
			width: initial;
			width: 100%;
		}
		.lbar {
			height: 100%; 
			overflow-x: hidden; 
			width: 95%;
		}
		.custom2 {
			width: 100%;
		}
		.lftbar {
			display: none;
		}
		#container {
		    width: 95%;
		    margin: 0px;
		    margin-left: 2.5%;
		    margin-top: 0px;
		    margin-bottom: 5%;
		    background-color: #fff;
		}
		.rating-point:not([style-scope]):not(.style-scope) {
		    font-size: 22px;
		    font-weight: 600;
	    display: inline-block;
		}
		#leftPanel{
			display: none;
			padding: 0;
			position: fixed;
			z-index: 1;
			background-color: white;
			height: 81.4vh;
			overflow: auto;
			overflow-x: hidden;
			margin-top: 0px;
			margin-left: 0px;
		}

		.left-up {
			width: 100%;
		}

		.rating {
			display: inline-block;
			/*margin-right: 40px;*/
			float: left;
		}

		.compare-button {
			display: inline-block;
			float: right;
		}

		.right-up {
			padding-top: 10px;
			width: 100%;
		}

		.detail1 {
			float: left;
			font-size: 12px;
		}

		.detail2 {
			float: right;
			font-size: 12px;
			padding-right: 4px;
		}

		#profilesResults paper-card {
			padding-left: 15px;
		}

		.categoryOptions paper-checkbox {
			padding-top: 5px;
			padding-bottom: 5px;
		}

		.college-heading {
			width: 100%;
		}

		#collegeFilters{
			padding-top: 48px;
			padding-bottom: 60px;
		}
		#filterHeading{
			padding: 0 5%;
			background-color: var(--main-color);
			color: white;
			/*position: fixed;*/
			width: 100%;
			z-index: 1;
			display: table;
		}
		#tagsBar {
			/*visibility: hidden;
			display: none;*/
		}
		#filter-res {
			padding-top: 10px;
		}
		#closeFilter{
			display: inline-flex;
		}

		#mobileBottomBar{
			display: block;
		}

		.mobile-bottom-bar{
			display: flex;
			position: fixed;
			bottom: 0;
			left: 0;
			width: 100vw;
			height: 55px;
			background-color: var(--main-color);
			color: white;
			z-index: 1;
			text-align: center;
		}

		.applyBar{
			display: block;
			position: fixed;
			bottom: 0;
			left: 0;
			width: 100%;
			text-align: center;
			background-color: var(--main-color);
			color: white;
			padding: 15px 0;
			font-size: 16px;
			line-height: 16px;
		}
	}
	.fltr {
		display: flex; 
		justify-content: center; 
		align-items: center; 
		padding: 0px; 
		padding-right: 75px;
	}
	@media only screen and (max-width: 500px){
		.boxdr {
			flex-direction: column;
		}
		.right-up {
			flex-direction: row;
			text-align: left;
			font-size: 13px;
		}
		.fnew {
	     	font-size: 12px;
	     }
	     .compare-button paper-button {
	     	font-size: 10px;
	     }
	}
	@media only screen and (max-width: 350px){
		.fltr {
			padding-right: 45px;
		}
	}
	.collegeCard
	{
		width: 100%;
		min-height: 150px;
		margin-top: 1%;
		margin-bottom: 1%;
	}

	.college-header {
		@apply(--paper-font-headline);
	}

	.college-light {
		color: var(--paper-grey-600);
	}

	.college-location {
		float: right;
		font-size: 15px;
		vertical-align: middle;
	}

	.college-compare {
		color: var(--main-color);
	}

	.college-details span{
		margin: 5px 0;
	}


	.college-name{
		color: black;
	}

	iron-icon.star {
		--iron-icon-width: 16px;
		--iron-icon-height: 16px;
		color: var(--paper-amber-500);
	}

	iron-icon.star:last-of-type {
		color: var(--paper-grey-500);
	}

	.category
	{
		margin-top: 5%;
		width: 100%;
	}

	.categoryOption
	{
		display: block;
		margin-top: 5%;
	}

	paper-checkbox{
		--paper-checkbox-checked-color: var(--main-color);
	}

	#searchTabs{
		--paper-tabs:{
			background-color: #fff;
			color: #000;
			font-size: 16px;
			font-weight: 500;
		};
	}

	.questionCard{
		width: 100%;
		display: block;
		margin-top: 1%;
		margin-bottom: 1%;
	}

	.card-content{
		font-size: 14px;
		font-weight: bold;
	}

	.tagContainer{
		display: inline-block;
		background-color: #f44336;
		border-radius: 5px;
		padding: 5px;
		margin-top: 2%;
	}

	.tagLink{
		text-decoration: none;
		color: white;
		margin: 2%;
		margin-bottom: 0;
	}

	.question{
		color: rgba(0,0,0,0.87);
		font-size: 24px;
		font-weight: bold;
	}

	.question:hover{
		text-decoration: underline;
	}

	.question p{
		margin-bottom: 5px;
	}

	.author{
		color: rgba(0,0,0,0.54);
		margin-bottom: 15px;
	}

	.bottom-bar{
		border-top: 1px solid rgba(0,0,0,0.14);
		@apply(--layout-horizontal);
		/*background-color: #f44336;*/
	}

	.bottom-bar div{
		display: inline-block;
		@apply(--layout-flex);
		padding: 10px;
	}

	.bottom-bar div:nth-child(2){
		@apply(--layout-flex-2);
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
		.showTag{
				display: inline-block;
				font-size: 14px;
				color: black;
				opacity: 0.87;
				padding: 0px 10px;
				color: #07c;
				transition: background-color .3s cubic-bezier(0.215,0.61,0.355,1);
			}
#overlay {
    background-color: #009688;
    z-index: 999;
    position: fixed;
    left: 0;
	opacity:0.7;
    top: 0;
    width: 100%;
    height: 100%;
}
#sortby_button{position:relative;z-index:50;}
#sortby_button:before{
    position:absolute;
    content:'';
    top:-1.1vh;
    right:-10vw;
    left:-15vw;
    bottom:-4vh;
    z-index:40;
}
ul.tagit {
    border-style: solid;
    border-width: 1px;
    border-color: #C6C6C6;
    background: inherit;
}
ul.tagit {
    padding: 4px 5px;
    overflow-x: auto;
    margin-left: inherit;
    margin-right: inherit;
}
ul.tagit li.tagit-choice {
    -moz-border-radius: 6px;
    border-radius: 6px;
    -webkit-border-radius: 6px;
    border: 1px solid #fedcec;
    background: none;
    background-color: #fedcec;
    font-weight: normal;
}
ul.tagit li.tagit-choice .tagit-label:not(a) {
     color: #555;
    font-size: 0.8em;
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
	
	</script>

</head>

<body >
<div id="loader-wrapper">
</div>
			
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<app-drawer-layout fullbleed responsive-width="1024px">

	<app-drawer>
		<?php include "common_components/app-drawer.php" ?>
	</app-drawer>

	<app-header-layout>
		<app-header fixed effects="waterfall">
			<?php include "common_components/app-header.php" ?>
		</app-header>
		<paper-toast id="paperToast" text="Link copied!"></paper-toast>
	<div id="container" class="flex-container-desktop" >
		<?php include "common_components/question-fab.php" ?>
	<template is="dom-bind">
		<input type="hidden" id="cid" value="<?php echo $this->session->cid; ?>">				
		<div class="flex-4" id="rightPanel">
					<paper-tabs id="searchTabs" class="abst" selected="viewProfiles">
						<!-- <paper-tab>All</paper-tab> -->
						<paper-tab onclick="viewProfiles()" style="color: #009688; font-size: 14px;">Profile</paper-tab>
						
						<!-- <paper-tab>Contributors</paper-tab> -->
					</paper-tabs>

			<iron-pages selected="{{selected}}">
				<div class="tab-page">
					<div id="searchResults">
						<div id = "loadMoreProfilesAll"> 
							<div class="tab-page">	<!-- Profiles -->
								<div id="profilesResults">
									<div id = 'college_list'>
										<?php
											$show_length = sizeof($rank);

										for ($i=0;$i<$show_length;$i++)
										{
											$j = $i+1;
									     	echo	'<paper-card>';
											echo	'<div class="college">';
											echo 	'<a href="'.site_url('user/profilepublic/'.$rank[$i]["cid"]).'" style="cursor: pointer;">';
										    echo	'<div class="college-heading">';
											echo    $j.".".$rank[$i]['name'].' ';
											echo 	'</div>';
											echo	'</a>';
											echo	'</div>';
											echo 	'</paper-card>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</iron-pages>
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
  function toggle(selector) {
    document.querySelector(selector).toggle();
  }
  document.addEventListener('WebComponentsReady', function () {
    var template = document.querySelector('template[is="dom-bind"]');
    template.selected = 0; // selected is an index by default
  });

  document.querySelector('template[is=dom-bind]').isExpanded = function(opened) {
    return String(opened);
  };
	
</script>
		
	
</body>
</html>