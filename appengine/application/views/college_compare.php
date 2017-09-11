<!DOCTYPE html>
<html lang="en">
	<head>
		<title>College Comparison</title>
		<meta content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For polyfill support across non-compatible browsers-->
		<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports-vulc.html'?>">

		<!-- common css for header, footer, sidebar, etc. -->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icons/home-icon.png'?>"/>
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>

		<style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
			#loader-wrapper
			{
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
			a
			{
				text-decoration: none;
				color : #009688;
			}
			#addColleges
			{
				margin-top: 2%;
				border: 1px solid var(--main-color);
				max-width: 90%;
				margin: 0 auto;
				box-sizing: border-box;
				padding: 10px;
				height: 100%;
			}
			#addCollegesInput
			{
				margin-top: 5%;
				width: 90%;
				align:center;
				margin-left: 5%;
			}
			#addCollegesTitle
			{
				font-size: 16px;
				color:#009688;
				font-weight: 500;
				text-align: center;
			}
			.searchItem{
				text-decoration: none;
				width: auto;
				color: black;
				font-size: 14px;
				text-transform: capitalize;
			}
			.searchItem:focus{
				outline-style: none;
				background-color: lightgrey;
			}
			.searchItem:hover
			{
				background-color: lightgrey;
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
			#compareButtonDiv
			{
				display: none;
				align:center;
				width: 90%;
				margin-top:2%;
			}
			#compareButton
			{
				margin-left: 40%;
				background-color: #009688;
				color: white;
			}
			#addedCollegesLabel
			{
				display: none;
				width: 90%;
				margin-left: 5%;
				text-align: center;
				border-bottom: solid;
				border-width: 4px;
				border-color: #009688;
				padding-bottom: 1%;
				margin-top: 5%;
			}
			.clearIcon
			{
				background-color: #009688;
				display: inline-block;
				color: white;
				padding: 2%;
				margin-right: 10px;
				cursor: pointer;
			}
			.collegeItem
			{
				width: 90%;
				margin-top: 2%;
				margin-left: 5%;
				display : inline-flex
			}
			.collegeTitle
			{
				font-size:20px;
			}
			:root {
		        --paper-input-container-color: #868686;
		        --paper-input-container-underline-color: #868686;
		        --paper-input-container-input-color: #868686;
			}
			.pCd {
				padding: 20px 20px; 
				height: 100%; 
				width: 35%; 
				box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
			}
			@media only screen and (min-width: 769px)
			{
				#addColleges
				{
					width: 30%;
					margin-left: 35%;
				}
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
			}
			#addCollegesSearchResults
			{
				box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
				max-height: 256px;
				overflow-y: auto;
				width: 35%;
				margin-left: 0%;
			}
			#loginButton {
				 padding: 0 30px;
			}
			.pCd paper-input{
				--paper-input-container-invalid-color: #d38888;
				--paper-input-container-focus-color: var(--main-color);
				--paper-input-prefix: {
					margin: 5px 0;
					margin-right: 5px;
					color: var(--special-font-color);
					cursor: pointer;
				};
				--paper-input-container: {
					padding-top: 0px;
					padding-top: 10px;
					padding-bottom: 8px;
				}
				--paper-input-container-underline: {
					background-color: #eaeaea;
				};
			}
			@media only screen and (max-width: 1024px) {
				.pCd {
					width: 50%;
				}
				#addCollegesSearchResults {
					width: 50%;
				}
			}
			@media only screen and (max-width: 769px) {
				.pCd {
					width: 95%;
				}
				#addCollegesSearchResults {
					width: 95%;
				}
				#loginButton {
				 	padding: 0 50px;
				}
			}
		</style>

		<script>
			document.addEventListener('WebComponentsReady', function () {
				var loaderWrapper = document.getElementById("loader-wrapper");
				loaderWrapper.style.opacity = "0";
				setTimeout(function(){
					loaderWrapper.style.display = "none";
				},300);
			});
		</script>
	</head>

	<body>
		<div id="loader-wrapper">
		</div>
		<app-drawer-layout fullbleed responsive-width="1024px">
			 <?php include "common_components/psycho-struct.php" ?>
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

			<div id="container" style="display: flex; flex-direction: column; align-items: center; margin-top: 40px;">
				<?php include "common_components/question-fab.php" ?>
				<paper-card class="pCd">
						<div id="addCollegesTitle">
						Add Colleges To Compare
						</div>

						<paper-input style="margin-top: 15px;" id="addCollegesInput" name="query" label="College Name" style="color: #868686;" no-label-float>
						<iron-icon icon="social:school" style="opacity: 1; color:#868686;margin-right:2%;" prefix></iron-icon>
						</paper-input>
				</paper-card>
				<div id="addCollegesSearchResults"></div>
				<div id="newcolleges" style="display: flex; flex-direction: column; width: 100%; align-items: center;">
					
				</div>
				<div id="container1" style="display: flex; flex-direction: column; align-items: center; margin-top: 0px;">	
					<div id="compareButtonDiv" style="text-align: center; " >
						<div id="loginButton" style="cursor: pointer; display: flex; margin: 15px; margin-left: 0px; margin-right: 0px; justify-content: center;" onclick = "compare()" ><paper-ripple></paper-ripple>Compare</div>
					</div>
				</div>
				<!-- <div style="text-align: center;">
					<a href="#"><div id="loginButton" style="display: block; margin: 15px;"><paper-ripple></paper-ripple>Done</div></a>
				</div> -->
			</div>
 <script>
 var collegeName = <?php echo json_encode($collegeName['college'], JSON_HEX_TAG); ?>;
 var collegeId = <?php echo json_encode($collegeId, JSON_HEX_TAG); ?>;
 </script>
			<footer>
		    		<?php include "common_components/footer.php" ?>
		    	</footer>

			</app-header-layout>
		</app-drawer-layout>

		<script type="text/javascript" src="/assets/js/toolbarSearch.js"></script>
		<script type="text/javascript" src="/assets/js/commonScript.js"></script>
		<script type="text/javascript" src="/assets/js/encode_req.js"></script>
		<script type="text/javascript">
		var added = [];
		jQuery(document).on("click", function(e) {
			var $clicked = $(e.target);
			if($clicked.attr("id") != "input")
			{
				setTimeout(function()
				{
					document.getElementById('addCollegesSearchResults').style.display = 'none';
				},100);
			}
		});
		$('#addCollegesInput').focus(function()
		{
			document.getElementById('addCollegesSearchResults').style.display = 'block';
		});
		function compare()
		{
			url = "/college/compare";
			for(i=0;i<added.length;i+=1)
			{
				url = url + "/" + encode_id(added[i]);
			}
			location.href = url;
		}
		function addCollege(name,id)
		{

			document.getElementById('addCollegesInput').value = "";
			if(added.length == 2)
			{
				displayMessage('failure',"Sorry, can't add more than 2 colleges",1000);
			}
			else
			{

				id = parseInt(id);
				if(id == NaN)
					return;
				if(added.indexOf(id)!=-1)
				{
					displayMessage('failure',"Sorry, you have already added that college",1000);
					return;
				}
				added.push(id);
				//alert(added.length);
				//if(added.length == 1)
					//document.getElementById('addedCollegesLabel').style.display = 'block';
				if(added.length == 2)
				{
					//alert("entered");
					document.getElementById('compareButtonDiv').style.display = 'block';
				}

				term = '<paper-card class="pCd" style="display: flex; margin-top: 5px;" id="college_'+id+'" >';
				term = term + '<p class="flex-2"  style="display: flex; justify-content: flex-start; font-size: 15px; color: #868686;"><a href="/college/details/'+encode_id(id)+'">'+ name +'</a></p>';
				term = term + '<div onclick="removeCollege('+id+')"><p class="flex-2" style="display: flex; justify-content: flex-end; font-size: 15px; font-weight: 500; color: #24A5BF; cursor: pointer;"> Remove </p></div>';
				term = term +'</paper-card>';
				/*
				term = '<div class="collegeItem" id="college_'+encode_id(id)+'">';
				term = term + '<div class="clearIcon" onclick="removeCollege('+id+')"><iron-icon icon="clear"></iron-icon></div>';
				term = term + '<div class="collegeTitle"><a href="/college/details/'+encode_id(id)+'">'+ name +'</a></div>';
				term = term + '</div>';
				*/
				$('#newcolleges').append(term);
				$('#addCollegesSearchResults').html("");
			}
		}
		if(collegeName)
		{
addCollege(collegeName,collegeId);
		}
		function removeCollege(id)
		{
			
			var index = added.indexOf(id);
			if(index > -1)
			{
				added.splice(index,1);
				document.getElementById('college_'+id).outerHTML = "";
			}
			if(added.length == 1)
				document.getElementById('compareButtonDiv').style.display = 'none';
			if(added.length == 0)
				document.getElementById('addedCollegesLabel').style.display = 'none';
		}
		$(document).ready(function(){
		  	$("#addCollegesInput").on("keyup focus",function(){
				if($("#addCollegesInput").val().length>2)
				{
					$.ajax({
						type: "post",
						url: "/main/auto_search",
						cache: false,
						data:'search='+$("#addCollegesInput").val(),
						success: function(response)
						{
							$('#addCollegesSearchResults').html("");
							var obj = JSON.parse(response);
							console.log(obj);
							if(obj.length>0)
							{
								try
								{
									$.each(obj,function(i,val)
									{
										term = '<div class="searchItem" onclick="addCollege(\''+val.primary_college+'\',\' '+val.colg_id+'\')">'+val.primary_college+'</div>';
										$('#addCollegesSearchResults').append(term);
									});
								}
								catch(e)
								{
								}
							}
							else
							{
								$('#addCollegesSearchResults').append('<div class="searchItem">Couldn\'t find what you are looking for? Try better search terms</div>');
							}
							document.getElementById('addCollegesSearchResults').style.display = 'block';
							addKeyBindings('addColleges');
						}
					});
				}
			return false;
			});
		});
		function addKeyBindings(id)
		{
			var resultsDivId = id+'SearchResults';
			var searchResultsItems = document.getElementById(resultsDivId).getElementsByClassName('searchItem');
			document.getElementById(id).addEventListener('keydown',function(e){
				if(e.which == 40)
				{
					e.preventDefault();
					if(searchResultsItems[0] != null)
					{
						searchResultsItems[0].setAttribute('tabindex','0');//to make them focusable
						searchResultsItems[0].focus();
					}
				}
			});
			for(i = 0;i < searchResultsItems.length;i++)
			{
				searchResultsItems[i].setAttribute('tabindex','0');//to make them focusable
				searchResultsItems[i].addEventListener('keydown',function(e)
				{
					try
					{
						e.preventDefault();
						if(e.which == 40)
						{
							this.nextElementSibling.focus();
						}
						else if(e.which == 38)
						{
							this.previousElementSibling.focus();
						}
						else if(e.which == 13)
						{
							this.click();
						}
					}
					catch(err)
					{
						//just to clear the console errors
					}
				});
			}
		}
		function displayMessage(type,message,delay)
		{
			document.getElementById(type+'-message').innerHTML = message;
			document.getElementById(type).style.display='block';
			setTimeout(function() {
				document.getElementById(type).style.display='none';
			}, delay);
		}
		</script>
		<?php
        $mail=$this->session->email;
        if(!empty($mail))
        {
        echo '<script type="text/javascript">
            function takeSurvey()
            {
                var questionDialog = document.querySelector("psycho-struct");
                questionDialog.toggle();
            }
        </script>';
        }
        else
        {
            $url = "main/login";
            echo '<script type="text/javascript">
            function takeSurvey()
            {
                window.location.href = "'.base_url().'index.php/'.$url.'";
            }
        </script>';
        }
        if($this->session->toggle == 1)
        {
            $data = $this->session->set_userdata;
            $data['toggle'] = 0;
            $this->session->set_userdata($data);
            echo '<script type="text/javascript">
            document.getElementById("contribute").click();
        </script>';
        }
        ?>
	</body>
</html>