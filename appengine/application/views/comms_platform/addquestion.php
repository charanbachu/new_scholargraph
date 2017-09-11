<?php  
	use google\appengine\api\cloud_storage\CloudStorageTools;
	$options = ['gs_bucket_name' => BUCKET_NAME];
	$upload_url = CloudStorageTools::createUploadUrl(site_url('Communication/saveQuestion'), $options);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ask Question</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For polyfill support across non-compatible browsers-->
		<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>
		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/add-question-vulc.html'?>">

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- required for tagging -->
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link href="<?php echo asset_url();?>css/jquery.tagit.css" rel="stylesheet" type="text/css">
		<link href="<?php echo asset_url();?>css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
		<script src="<?php echo asset_url();?>js/tag-it.js" type="text/javascript" charset="utf-8"></script>

		<style is="custom-style" include="iron-flex iron-flex-alignment">
			html,body{
			height: 100%;
			margin: 0;
			font-family:'Roboto', 'Noto', sans-serif;
			background-color: #fafafa;
			}

			a{
			text-decoration: none;
			}

			#toolbar{
			background-color: #253a52;
			}

			#logo{
			color: white;
			word-spacing: -0.15em;
			/*      font-size: 2em;
			*/    }

			#logo #pre{
			font-weight: 300;
			}

			#logo #post{
			font-weight: 800;
			color: #ffc107;
			}

			#menuButton{
			display: none;
			}

			@media only screen and (max-width : 640px){
			#menuButton{
			  display: inline-block;
			}
			}

			#searchForm{
			width: 25%;
			-webkit-transition: width .35s; /* Safari */
			transition: width .35s;
			margin-right: 5%;
			}

			#searchBar{
			--paper-input-container-focus-color: #ffc107;
			--paper-input-container-input-color: white;
			}

			#results{
			position: absolute;
			width: 25%;
			z-index: 100;
			}

			.showQuestionBox{
				border-bottom: 1px solid rgba(0,0,0,0.14);
			}

			.showQuestion{
				font-size: 14px;
				color: black;
				opacity: 0.87;
				text-decoration: none;
				padding: 10px;
				transition: background-color .3s cubic-bezier(0.215,0.61,0.355,1);
			}

			.showQuestion p{
				margin: 0;
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

			.showQuestion:hover, .showTag:hover{
				background-color: #eaeaea;
			}

			paper-ripple{
			color: #ffc107;
			}

			app-drawer{
			border-right: 1px solid rgba(0,0,0,0.14);
			}

			.drawer-link{
			text-decoration: none;
			}

			.drawer-item{
			padding: 5%;
			font-family: 'Roboto Slab', 'Roboto', 'Noto', sans-serif;
			font-size: 15px;
			/*border-bottom: 1px solid rgba(0,0,0,0.14);*/
			color: black;
			font-weight: bold;
			opacity: 0.87;
			}

			#profileContainer{
			height: 220px;
			width: 256px;
			background: url("/assets/images/backgrounds/profileBackground.jpg");
			background-size: cover;
			}

			#profilePic{
			position: relative;
			height: 150px;
			width: 150px;
			margin: auto;
			top: 30px;
			border-radius: 50%;
			overflow: hidden;
			}

			#profileDetails{
			display: block;
			color: white;
			text-align: center;
			margin-top: 40px;
			}

			.toolbarLink{
			color: white;
			position: relative;
			padding: 10px;
			font-size: 17px;
			cursor: pointer;
			}

			#notificationCard, #accountCard{
			position: absolute;
			display: none;
			left: 0;
			top: 100%;
			z-index: 1000;
			}

			#accountCard{
			left: -25%;
			}

			.notificationItem, .accountItem{
			padding: 5%;
			color: black;
			opacity: 0.87;
			transition: background-color .3s cubic-bezier(0.215,0.61,0.355,1);
			min-width: 256px;
			font-size: 14px;
			}

			.notificationItem:hover{
			background-color: #eaeaea;
			}

			.accountItem:hover{
			background-color: #eaeaea;
			}

			#addCard{
				display: block;
				width: 90%;
				margin: 20px auto;
				padding: 0;
				margin-bottom: 20px;
			}

			.card-actions{
				padding: 5%;
			}

			label{
				font-size: 24px;
				opacity: 0.87;
				font-weight: 400;
			}
		</style>
	</head>

	<body>
		<app-drawer-layout fullbleed>

			<app-drawer>
				<div id="profileContainer">
					<?php include "common_components/question-fab.php" ?>
					<div id="profilePic"><img src="/assets/images/profilePics/profile1.jpg" style="width:150px;height:150px;"></div>
					<div id="profileDetails"><?php echo $this->session->email ?></div>
				</div>
				<a href="/" class="drawer-link"><div class="drawer-item">Home</div></a>
				<a href="/search/" class="drawer-link"><div class="drawer-item">Search</div></a>
				<a href="/Communication/Home_Page" class="drawer-link"><div class="drawer-item">Communication platform</div></a>
				<a href="/college/compare" class="drawer-link"><div class="drawer-item">Compare colleges</div></a>
				<a href="/main/structure_nodes" class="drawer-link"><div class="drawer-item">Take survey</div></a>
				<a href="/user/profile/" class="drawer-link"><div class="drawer-item">My account</div></a>
				<a href="/main/logout/" class="drawer-link"><div class="drawer-item">Logout</div></a>
			</app-drawer>

			<app-header-layout>

				<app-header fixed effects="waterfall">
		    		<app-toolbar id="toolbar">
		    			<paper-icon-button icon="menu" id="menuButton" onclick="document.querySelector('app-drawer').toggle();" style="color: white;"></paper-icon-button>
		        		<span title id="logo"><span id="pre">SCHOLAR</span><span id="post">FACT</span></span>
				    	<form id="searchForm" action="/search/" method="get">
				    		<div id="searchBox">
					    		<paper-input id="searchBar" label="Search" name="query" no-label-float>
					    			<paper-icon-button style="color:white" icon="search" onclick="toggleSearchBar();" prefix></paper-icon-button>
					    		</paper-input>
					    		<paper-card id="results"></paper-card>
				    		</div>
				    	</form>
				    	<a href="<?php echo site_url('Communication/Home_Page');?>"><div class="toolbarLink"><paper-ripple></paper-ripple>Homepage</div></a>
				    	<a href="<?php echo site_url('Communication/getUnansweredQuestions');?>"><div class="toolbarLink"><paper-ripple></paper-ripple>Answer</div></a>
				    	<a href="<?php echo site_url('Communication/addquestion');?>"><div class="toolbarLink"><paper-ripple></paper-ripple>Ask Question</div></a>
				    	<div class="toolbarLink notification-card" onclick="displayDropdown('notificationCard');"><paper-ripple></paper-ripple>Notifications<iron-icon class="notification-card" icon="arrow-drop-down"></iron-icon>
				    		<paper-card id="notificationCard" class="notification-card">
				    			<?php 
						          	if(empty($Notifications->result()))
						          	{
						          		echo '<div class="notificationItem">No New Notifications</div>';
						          	}
						          	else
						          	{	
						          		echo '<div><a onclick="read()">Mark all as read</a></div>';
						          		foreach($Notifications->result() as $row)
						          		{
						          			echo '<div class="notificationItem">'.$row->notification.'</div>';
						          		}
						          	}
						    	?>
				    		</paper-card>
				    	</div>
				    	<div class="toolbarLink account-card" onclick="displayDropdown('accountCard');"><paper-ripple></paper-ripple><?php echo $this->session->email;?><iron-icon class="account-card" icon="arrow-drop-down"></iron-icon>
				    		<paper-card id="accountCard" class="account-card">
				    			<a href="<?php echo site_url('User/profile/'.$this->session->userid);?>"><div class="accountItem">My Profile</div></a>
				              	<a href="<?php echo site_url('Communication/getUserQuestions');?>"><div class="accountItem">Your Questions</div></a>
				              	<a href="<?php echo site_url('Communication/getUserAnswers');?>"><div class="accountItem">Your Answers</div></a>
				              	<a href="<?php echo site_url('Communication/getUserVotedQA');?>"><div class="accountItem">My Upvoted Questions/Answers</div></a>
				              	<a href="<?php echo site_url('Communication/getFollowingQuestions');?>"><div class="accountItem">My Followed Questions</div></a>
				              	<a href="<?php echo site_url('Communication/logOut');?>"><div class="accountItem">Log Out</div></a>
				    		</paper-card>
				    	</div>
		      		</app-toolbar>
		    	</app-header>

		    	<div id="container">

		    		<paper-card id="addCard">
						<div class="card-content" style="padding: 5%;margin: 0 auto;font-size:24px;font-weight: 500;opacity: 0.87;background-color: #f44336;color: white;">Ask a question
						</div>

						<div class="card-actions">
					        <form id="quesform" name="quesform" enctype="multipart/form-data" action="<?php echo $upload_url; ?>" method="POST">
				  				<div id="quesdiv" style="margin-bottom: 30px;">
								    <label for="question">Question</label>
								    <paper-textarea id="question" name="question" placeholder="Start Typing your question" required="required"></paper-textarea>
								    <p id="errorp" style="color:red"></p>
					        	</div>
					        
					        
						        <div class="form-group has-feedback">
						            <label for="userfile" style="margin-bottom: 25px;">Upload Images</label>
						            <input type="file" name="userfile[]" id="userfile" multiple="multiple" />
						        </div>

						        <div id="showtags" name="showtags">
						        </div>
						        <div class="form-group has-feedback" id="tagdiv">
						            <label for="tag" style="margin-bottom: 25px;margin-top: 20px;">Tags</label>
						            <br>
						            <input name="tags" id="tags" placeholder="Start Writing your tags (Min. 1 required)" required="required" onclick="getTags()" class="form-control">
						            <p id="errort" style="color:red"></p>
						        </div>
								
								<paper-button id="submitBtn" onclick="saveQuestion()" style="color:white;background-color: #f44336;">Submit</paper-button>
							
							</form>
						</div>

					</paper-card>

				</div>
	    	</app-header-layout>
		</app-drawer-layout>

		<script>
		  var sampleTags;
		  
		  function getTags()
		  {
		      var questionData=$('#question').val();
		      $.ajax({
		        url: 'http://api.cortical.io:80/rest/text/keywords?retina_name=en_associative',
		        method: 'POST',
		        async: false,
		        contentType: 'text/plain',
		        data: questionData,
		        headers: {"api-key": "a4a3fb40-30db-11e6-a057-97f4c970893c"},
		        success:function(result)
		        {
		          var jsonString = JSON.stringify(result);
		          $.ajax({
		            url: "<?php echo site_url('Communication/getRecommendedTags'); ?>",
		            type: "POST",
		            async: false,
		            data: 'question='+questionData,
		            success: function(response)
		            {
		              $('#tags').val(JSON.parse(response)); 
		            }
		          });
		        }
		      });

		    $.ajax({
		      url: '<?php echo site_url('Communication/getTags'); ?>',
		      type: 'POST',
		      async: false,
		      dataType: "json",
		      success: function(data)
		      {
		        sampleTags=data;
		        $('#tags').tagit({
		                availableTags: sampleTags,
		                onlyAvailableTags: true,
		                caseSensitive: false,
		                allowSpaces: true,
		                showAutocompleteOnFocus: true,
		                beforeTagAdded:   
		                function(event, ui) {
		                  if($.inArray(ui.tagLabel, sampleTags)==-1) return false;
		                }
		            });
		      }
		      });
		  }


		 function read()
		  {
		    $.ajax({
		      url: '<?php echo site_url('Communication/makeAllNotificationRead'); ?>',
		      success:function(result)
		      {
		        location.reload();
		      }
		    });
		  }

		function saveQuestion()
		{
			var questionData=$('#question').val();
			var tags=$('#tags').val();
		  if(questionData==="")
		  {
		    $("#errorp").text("Question Can't be Empty");
		    $("#errort").text("");
		    $("#tagdiv").removeClass("has-error");
		  }
		  else if(tags==="")
		  {
		    $("#errorp").text("");
		    $("#tagdiv").addClass("has-error");
		    $("#errort").text("Atleast one tag is required");
		  }
		  else
		  {
		    $('#quesform').submit();
		  }
		}

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