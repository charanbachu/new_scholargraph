<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Scholarfact | Info</title>
		<meta content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For polyfill support across non-compatible browsers-->         
		<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports-vulc.html'?>">
		
		<!-- common css for header, footer, sidebar, etc. -->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

		<style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
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
				min-height: 400px;
			}

			#mainPanel{
				min-height: 400px;
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

			.descriptive-image{
				max-width: 100%;
				margin-top: 50px;
				margin-bottom: 50px;
			}

			#content p{
			    display: block;
			    color: #757575;
			    font-size: 1.25em;
				font-weight: 400;
				letter-spacing: 0;
				line-height: 1.6;
				text-rendering: optimizeLegibility;
			    margin-bottom: 1rem;
			    margin-top: 1rem;
			}

			h1{
				font-size: 2em;
				font-weight: 300;
				letter-spacing: -.005em;
				line-height: 1;
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

				<div id="container">
					<div class="flex-container-desktop">
						
						<div id="mainPanel" class="flex-desktop-3">
							<center><h1> A community can not be charged for it's own collective knowledge.
</h1></center><br>
							

							<div id="content">
								
								<p>Advertising is not an evil. It is an efficient non-monetary “service charge” that a company collects from its users. This has significantly improved the affordability of information and content for a vast majority of people today.
</p>

								<p>Traditional advertising on TV and print relied on the money generated to fund creative artists and journalists make better films, programs and write some of the best books and articles (not to say that even this has its own flaws). However, most online platforms today are simply using consumer’s activity and personal data collected on the platform and monetizing it in the form of ads. These companies do deserve credit and profits for building such platforms, however, much more credit is deserved by people who constantly provide the raw material for such a thing to work - it's consumers.
</p>

								<p>We believe in building a community of people to share information and build a platform that can be beneficial for everyone. However, we want to take the least credit for building this community. The credit should be given to the people who have actively contributed to this endeavor selflessly in order to help others. This credit can not be given by showing them ads and making money in the process. It will be morally wrong to ask people to build a beautiful garden without paying them any money and then charge the same people an entry ticket for the garden they made. Whatever the merits and demerits of advertising, we don't believe this is a place for it.
</p>

								
							</div>
						</div>
					</div>
				</div>

				<footer>
		    		<?php include "common_components/footer.php" ?>
		    	</footer>

			</app-header-layout>
		</app-drawer-layout>

		<!-- <script type="text/javascript" src="/assets/js/toolbarSearch.js"></script> -->
		<script type="text/javascript" src="/assets/js/commonScript.js"></script>

		<script>
			document.addEventListener('WebComponentsReady', function () {
				var loaderWrapper = document.getElementById("loader-wrapper");
				loaderWrapper.style.opacity = "0";
				setTimeout(function(){
					loaderWrapper.style.display = "none";
				},300);

				getnotifications();
				// run the first time; all subsequent calls will take care of themselves
				//setTimeout(getnotifications, 2000);
			});

			$(function(){
				jQuery(document).on("click", function(e) {
				    var $clicked = $(e.target);
				    if(! $clicked.hasClass("notification-card")){
				    	jQuery("#notificationCard").fadeOut();
				    }

				    if(! $clicked.hasClass("account-card")){
				    	jQuery("#accountCard").fadeOut();
				    }
				});
			});

			function displayDropdown(id){
				var dropdown = $("#" + id);
				if($(dropdown).css("display") == "none"){
					$(dropdown).css("display","inline-block");
				}
				else{
					$(dropdown).css("display","none");
				}
			}
		</script>
	</body>
</html>