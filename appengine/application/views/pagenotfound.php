<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sorry, We Couldn't Find What You Are Looking For</title>
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
			body{
				min-height: 100vh;
			}

			#container{
				width: 90%;
				margin: 0 auto;
				margin-top: 4%;
				margin-bottom: 5%;
			}

			paper-input{
				--paper-input-container-invalid-color: #d38888;
				--paper-input-container-focus-color: var(--main-color);
				--paper-input-prefix: {
					margin: 5px 0;
					margin-right: 5px;
					color: var(--special-font-color);
					cursor: pointer;
				};

				--paper-input-container-underline: {
					background-color: #eaeaea;
				};				
			}

			paper-input:hover{
				--paper-input-prefix: {
					color: var(--main-color);
				};
			}

			paper-card
			{
				color : black;
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

			#notfound
			{
				width: 100%;
			}


		</style>

	</head>

	<body onload = "initialize()">
		<app-drawer-layout fullbleed responsive-width="1024px">

			<app-drawer>
				<?php include "common_components/app-drawer.php" ?>
			</app-drawer>

			<app-header-layout>
				<app-header fixed effects="waterfall">
					<?php include "common_components/app-header.php" ?>
				</app-header>

				<div id="container" class="flex-container-desktop">
					<img id="notfound" src="/assets/images/pageNotFound.jpg">
				</div>

				<footer>
					<?php include "common_components/footer.php" ?>
				</footer>

			</app-header-layout>
		
		</app-drawer-layout>

		<script type="text/javascript" src="/assets/js/toolbarSearch.js"></script>
		<script>
		function submitForm(id)
		{
			var form = document.getElementById(id);
			form.submit();
		}
		</script>
	</body>
</html>