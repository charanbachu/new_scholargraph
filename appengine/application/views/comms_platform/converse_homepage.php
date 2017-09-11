<?php  
	use google\appengine\api\cloud_storage\CloudStorageTools;
	$options = ['gs_bucket_name' => BUCKET_NAME];
	$upload_url = CloudStorageTools::createUploadUrl(site_url('Communication/saveQuestion'), $options);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Converse | Scholarfact</title>
		<meta content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For polyfill support across non-compatible browsers-->         
		<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

		<!--importing vulcanized polymer dependencies-->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports.html'?>">
		
		<!-- common css for header, footer, sidebar, etc. -->
		<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo asset_url();?>js/clipboard.js"></script>

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
				padding-top: 50px;
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

			#midPanel > div{
				max-width: 634px;
			}

			#mainTabs{
				--paper-tabs:{
					background-color: var(--main-color);
					color: white;
				};
			}

			#readTabs{
				display: none;
			}

			#askFeatures{
				display: none;
			}

			#askField{
				width: 100%;
				margin: 20px auto;
				display: block;
			}

			#askField .card-content{
				color: white;
				background-color: #ec5555;
			}

			#askField .card-actions{
				padding-top: 24px;
			}

			#askField .card-actions .askButtonContainer{
				text-align: right;
				padding: 8px 0;
			}

			#askField paper-textarea{
				margin-bottom: 20px;
			}

			#askField .card-actions .askButtonContainer .askButton{
				background-color: #ec5555;
				color: white;
				--paper-button : {
					padding: 6px;
					text-transform: capitalize;
				};
			}

			.inputfile + label {
				background-color: #ec5555;
				margin-top: 20px;
			}

			@media only screen and (max-width: 900px){
				#rightPanel{
					display: none;
				}
			}

			@media only screen and (max-width: 769px){
				#leftPanel{
					display: none;
				}

				#readTabs{
					display: flex;
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
		<script>
			document.addEventListener('WebComponentsReady', function () {
				var loaderWrapper = document.getElementById("loader-wrapper");
				loaderWrapper.style.opacity = "0";
				setTimeout(function(){
					loaderWrapper.style.display = "none";
				},300);
				var template = document.querySelector('template[is="dom-bind"]');
				template.selectReadType = 0; // selected is an index by default
				template.selectMain = 0;

				var inputs = document.querySelectorAll( '.inputfile' );
				Array.prototype.forEach.call( inputs, function( input )
				{	
					var label	 = input.nextElementSibling,
						labelVal = label.querySelector('span').innerHTML;

					input.addEventListener( 'change', function( e )
					{
						var fileName = '';
						if( this.files && this.files.length > 1 )
							fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
						else
							fileName = e.target.value.split( '\\' ).pop();

						if( fileName )
							label.querySelector('span').innerHTML = fileName;
						else
							label.querySelector('span').innerHTML = labelVal;
					});
				});

				initializereadmore();
				//getvotestatus();
				new Clipboard('.share-btn');
				getnotifications();
				// run the first time; all subsequent calls will take care of themselves
				//setTimeout(getnotifications, 2000);
			});

			var sampleTags;
		  
			  function getTags()
			  {
			  	$('#loadingpara').show();
			  	$('#loadingimage').show();

			      var questionData=$('#question').val();
			      $.ajax({
			        /*url: 'http://api.cortical.io:80/rest/text/keywords?retina_name=en_associative',
			        method: 'POST',
			        async: false,
			        contentType: 'text/plain',
			        data: questionData,
			        headers: {"api-key": "a4a3fb40-30db-11e6-a057-97f4c970893c"},
			        success:function(result)
			        {
			          var jsonString = JSON.stringify(result);
			          $.ajax({*/
			            url: "<?php echo site_url('Communication/getRecommendedTags'); ?>",
			            type: "POST",
			            async: false,
			            data: 'question='+questionData,
			            success: function(response)
			            {
			              $('#tags').val(JSON.parse(response)); 
			            }
			          });
			        //}
			      //});

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
			    $('#loadingpara').hide();
			  	$('#loadingimage').hide();

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

			function updateupvote(qid)
			{
			  $.ajax({
			    url: '<?php echo site_url('Communication/saveUpvotes'); ?>',
			    method: 'POST',
			    data: 'qid='+qid,
			    async:false,
			    success: function(result)
			    {
			    }
			  });
			}
			/*function updatedownvote(qid)
			{
			  $.ajax({
			    url: '<?php echo site_url('Communication/saveDownvotes'); ?>',
			    method: 'POST',
			    data: 'qid='+qid,
			    async: false,
			    success: function(result)
			    {
						var text=$('#downvoteBtnText_'+qid).text();
						if(text==="Downvote")
						{
							if($('#upvoteBtnText_'+qid).text()==="Upvoted")
							{
								$('#upvoteBtnText_'+qid).text("Upvote");
							}
							$('#downvoteBtnText_'+qid).text("Downvoted");	
						}
						else
						{
						  	$('#downvoteBtnText_'+qid).text("Downvote");
						}
						$('#downvotes_'+qid).text(result);
						$.ajax({
				    		url: '<?php echo site_url('Communication/getUpvotes'); ?>'+'/'+qid,
				    		success:function(result)
				    		{
				    			$('#upvotes_'+qid).text(result);
				    		}
				    		});
			    		$('#'+qid).hide();	
			    }

			  });
			}*/
			
			//flagging the question
			function updatedownvote(qid)
			{	//do the color inversion without waiting for ajax response (for better user experience)
				var flagArray = $('.flag-'+qid);
			  if($(flagArray[0]).hasClass('flagged')){
			  	for(var f = 0;f < flagArray.length; f++){
			  		$(flagArray[f]).removeClass("flagged");
			  	}
			  }
			  else{
			  	for(var f = 0;f < flagArray.length; f++){
			  		$(flagArray[f]).addClass("flagged");
			  	}
			  }

			  $.ajax({
				url: '<?php echo site_url('Communication/saveDownvotes'); ?>',
				method: 'POST',
				data: 'qid='+qid,
				success: function(result)
				{
					{
						if(result==0 && !($(flagArray[0]).hasClass('flagged'))){
							for(var f = 0;f < flagArray.length; f++){
						  		$(flagArray[f]).addClass("flagged");
						  	}
						}
						else if(result == 1 && ($(flagArray[0]).hasClass('flagged'))){
							for(var f = 0;f < flagArray.length; f++){
						  		$(flagArray[f]).removeClass("flagged");
						  	}
						}
					}
				}
			  });
			}
			
			function updateupvoteans(aid)
			{
				var upvoteTexts = $('.ansUpvoteBtnText_'+aid);
				var text= $(upvoteTexts[0]).text();
				if(text==="Upvote")
				{
				  	var elements=$('.ansDownvoteBtnText_'+aid);
					text=$(elements[0]).text();
					if(text==="Downvoted")
					{
						for(i=0;i<elements.length;i++)
						{
							$(elements[i]).text("Downvote");
						}
					}

					var elements=$('.ansUpvoteBtnText_'+aid);
					for(i=0;i<elements.length;i++)
					{
						$(elements[i]).text("Upvoted");
					}

					var upvoteButtons = $('.upvoteansBtn_'+aid);
					var upvoteSeperators = $('.upvoteansBtn_'+aid + ' .votesSeperator');
					var downvoteButtons = $('.downvoteansBtn_'+aid);
					var downvoteSeperators = $('.downvoteansBtn_'+aid + ' .votesSeperator');

					for(f = 0;f < upvoteButtons.length;f++){
						$(upvoteButtons[f]).addClass("buttonUpvoted");
						$(upvoteSeperators[f]).addClass('votesSeperatorUpvoted');
						$(downvoteButtons[f]).removeClass("buttonDownvoted");
						$(downvoteSeperators[f]).removeClass('votesSeperatorDownvoted');
					}
				}
				else
				{
					var elements=$('.ansUpvoteBtnText_'+aid);
					for(i=0;i<elements.length;i++)
					{
						$(elements[i]).text("Upvote");
					}

					var upvoteButtons = $('.upvoteansBtn_'+aid);
					var upvoteSeperators = $('.upvoteansBtn_'+aid + ' .votesSeperator');

					for(f = 0;f < upvoteButtons.length;f++){
						$(upvoteButtons[f]).removeClass("buttonUpvoted");
						$(upvoteSeperators[f]).removeClass('votesSeperatorUpvoted');
					}
				}
				var cid=$('#cid').val();
				$.ajax({
					url: '<?php echo site_url('Communication/saveUpvotesAnswer'); ?>',
					method: 'GET',
					data: 'ansid='+aid+'&cid='+cid,
					success: function(result)
					{	
						var elements=$('.answerupvotes_'+aid);
						for(i=0;i<elements.length;i++)
						{
							$(elements[i]).text(result);
						}

					  $.ajax({
						url: '<?php echo site_url('Communication/getDownvotesAnswer'); ?>'+'/'+aid,
						success:function(result)
						{
							var elements=$('.answerdownvotes_'+aid);
							for(i=0;i<elements.length;i++)
							{
								$(elements[i]).text(result);
							}
						}	
					  });
						  //document.getElementById('upvoteansBtn_'+aid).style.backgroundColor='#FFFFFF';
					}
				  });
			}

			function updatedownvoteans(aid)
			{
				var downvoteTexts = $('.ansDownvoteBtnText_'+aid);
		  		var text=$(downvoteTexts[0]).text();
				if(text==="Downvote")
				{
					var elements=$('.ansUpvoteBtnText_'+aid);
					text=$(elements[0]).text();
					if(text==="Upvoted")
					{
						for(i=0;i<elements.length;i++)
						{
							$(elements[i]).text("Upvote");
						}
					}
					
					var elements=$('.ansDownvoteBtnText_'+aid);
					for(i=0;i<elements.length;i++)
					{
						$(elements[i]).text("Downvoted");
					}
					
					var upvoteButtons = $('.upvoteansBtn_'+aid);
					var upvoteSeperators = $('.upvoteansBtn_'+aid + ' .votesSeperator');
					var downvoteButtons = $('.downvoteansBtn_'+aid);
					var downvoteSeperators = $('.downvoteansBtn_'+aid + ' .votesSeperator');

					for(f = 0;f < upvoteButtons.length;f++){
						$(upvoteButtons[f]).removeClass("buttonUpvoted");
						$(upvoteSeperators[f]).removeClass('votesSeperatorUpvoted');
						$(downvoteButtons[f]).addClass("buttonDownvoted");
						$(downvoteSeperators[f]).addClass('votesSeperatorDownvoted');
					}
				}
				else
				{
					var elements=$('.ansDownvoteBtnText_'+aid);
					for(i=0;i<elements.length;i++)
					{
						$(elements[i]).text("Downvote");
					}

					var downvoteButtons = $('.downvoteansBtn_'+aid);
					var downvoteSeperators = $('.downvoteansBtn_'+aid + ' .votesSeperator');

					for(f = 0;f < downvoteButtons.length;f++){
						$(downvoteButtons[f]).removeClass("buttonDownvoted");
						$(downvoteSeperators[f]).removeClass('votesSeperatorDownvoted');
					}
				}
				var cid=$('#cid').val();
				$.ajax({
					url: '<?php echo site_url('Communication/saveDownvotesAnswer'); ?>',
					method: 'GET',
					data: 'ansid='+aid+'&cid='+cid,
					success: function(result)
					{			
						var elements=$('.answerdownvotes_'+aid);
						for(i=0;i<elements.length;i++)
						{
							$(elements[i]).text(result);
						}
						//$('answerdownvotes_'+aid).text(result);
						$.ajax({
						url: '<?php echo site_url('Communication/getUpvotesAnswer'); ?>'+'/'+aid,
						success:function(result)
						{
							var elements=$('.answerupvotes_'+aid);
							for(i=0;i<elements.length;i++)
							{
								$(elements[i]).text(result);
							}
							//$('#answerupvotes_'+aid).text(result);
						}
						});
					}

				});
			}

			function follow(qid)
			{	
				var followArray = $('.follow-'+qid);
				if($(followArray[0]).hasClass('followed'))
				{
					for(f = 0;f < followArray.length;f++){
						$(followArray[f]).removeClass("followed");
					}
				}
				else
				{
					for(f = 0;f < followArray.length;f++){
						$(followArray[f]).addClass("followed");
					}
			  	}
				var flag=0;
				$.ajax({
					url: '<?php echo site_url('Communication/updateFollowPreference'); ?>',
					method: 'POST',
					data: 'qid='+qid+'&flag='+flag,
					async: false,
					success:function(result)
					{
						updateupvote(qid);
						$.ajax({
							url: '<?php echo site_url('Communication/getFollowPreference'); ?>',
							method: 'POST',
							data: 'qid='+qid,
							async: false,
							success:function(result)
							{
							  if(result==1 && !($(followArray[0]).hasClass('followed')))
							  {
							  	//user has followed the question
								for(f = 0;f < followArray.length;f++){
									$(followArray[f]).addClass("followed");
								}
							  }
							  else if(result==0 && ($(followArray[0]).hasClass('followed')))
							  {
							  	//user has unfollowedthe qustion.
								for(f = 0;f < followArray.length;f++){
									$(followArray[f]).removeClass("followed");
								}
							  }
							}
						  });
						// id of the element, +1 icon is follow-qid. 
					 	//add classes here.
					}
				  });
		}			

		function saveanscomment(aid)
		{
		  var comment=$('#commenta_'+aid).val();
		  if(comment==="")
		  {
		    $('#commenta_'+aid+'div').addClass("has-error");
		    $("#errorc_"+aid).text("Comment cannot be blank");
		  }
		  else
		  {
		    $('#commenta_'+aid+'div').removeClass("has-error");
		    $("#errorc_"+aid).text("");
		    $.ajax({
		      url:'<?php echo site_url('Communication/saveCommentsAnswer');?>'+"/"+aid+"/"+comment,
		      success:function(data)
		      {
		        if(data==1)
		        {
		          showCommentsAns(aid);
		          //location.reload();
		        }
		        else
		        {
		          alert("There is some error");
		        }
		      }
		      });
		  }
		}
		function showCommentsAns(aid)
		{
			$.ajax({
				url:'<?php echo site_url('Communication/getCommentsAnswer');?>'+"/"+aid,
				success:function(response)
				{
					response=JSON.parse(response);
					term="";
					for(var i=0;i<response.length;i++)
					{
						row=response[i];
						term=term+'<div class="comment-row"><span class="comment">'+row.comment+'  -</span><span class="comment-author"><a href="<?php echo site_url("User/profile");?>/'+row.CID+'">'+row.Display_Name+'</a></span><span class="comment-time"> '+row.cr_dt+'</span></div>';
					}

					term=term+'<div class="ansCommentInput flex-container">';

					term=term+'<div class="flex-5"><paper-textarea type="text" id="commenta_'+aid+'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';

					term=term+'<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('+aid+');">Comment</paper-button></div></div><p id="errorc_'+aid+'" style="color:red"></p></div></div>';
					$('#topAnswerCommentDiv'+aid).html("");
					$('#topAnswerCommentDiv'+aid).append(term);
				}
			});
		}

			function showCommentDiv(id){
				$("#" + id).toggle("fast");
			}

			function showAnswerInput(){
				$("#answerInputDiv").toggle("fast");
			}

			function showAskFeatures(){
				$("#askFeatures").show("fast");
			}

			function initializereadmore()
			{
			  // Configure/customize these variables.
			  var showChar = 150; // How many characters are shown by default
			  var ellipsestext = "...";
			  var moretext = "(more)";
			  // var lesstext = "(less)";
			  $('.topAnswerText').each(function() {
			    var content = $(this).html();

			    if (content.length > showChar) {

			      var c = content.substr(0, showChar);
			      var h = content.substr(showChar, content.length - showChar);

			      var html = c + '<span><span class="morelink" onclick="expandTopAnswer(this)" style="cursor:pointer;color:#2b6dad"> ... ' + moretext + '</span><span class="morecontent" style="display:none">' + h + '</span>&nbsp;&nbsp;</span>';

			      $(this).html(html);
			    }

			  });
			}

			function expandTopAnswer(span){
				$span = $(span);
				$span.next().css("display","inline");
				$span.css("display","none");
			}

		/*function getvotestatus()
		{
			var elements=document.getElementsByClassName('ansUpvoteBtn');
			for(i=0;i<elements.length;i++)
			{
				var id=$(elements[i]).attr("id");
				var id_length=id.length;
				var ansid=id.substring(13,id_length);
				$.ajax(
					{
						url:'<?php //echo site_url('Communication/getVotedUserAnswer');?>'+'/'+ansid,
						success:function(result)
						{
							if(result==1)
							{
								$('.upvoteansBtn_'+ansid).css({'backgroundColor':'#1976d2','color':'#ffffff'});
								//document.getElementByName('upvoteansBtn_'+ansid).style.backgroundColor='#1976d2';
								//document.getElementById('upvoteansBtn_'+ansid).style.color='#FFFFFF';
								//$('#ansUpvoteBtnText_'+ansid).text("Upvoted");
							}
							else if(result==0)
							{
								document.getElementById('downvoteansBtn_'+ansid).style.backgroundColor='#d32f2f';
								document.getElementById('downvoteansBtn_'+ansid).style.color='#ffffff';
								$('#ansDownvoteBtnText_'+ansid).text("Downvoted");
							}
							else
							{
								document.getElementById('upvoteansBtn_'+ansid).style.backgroundColor='#FFFFFF';
								document.getElementById('upvoteansBtn_'+ansid).style.color='#1976d2';
								document.getElementById('downvoteansBtn_'+ansid).style.backgroundColor='#FFFFFF';
								document.getElementById('downvoteansBtn_'+ansid).style.color='#d32f2f';
							}
						}  
					});
			}
			var questions=document.getElementsByClassName('questionCard');
			for(i=0;i<questions.length;i++)
			{
				var quesid=$(questions[i]).attr("id");
				var qid=quesid.substring(15,quesid.length);
				$.ajax(
					{
						url:'<?php //echo site_url('Communication/getVotedUser');?>',
						method: 'POST',
						data: 'qid='+qid,
						success:function(result)
						{
							if(result==0)
							{
								document.getElementById('flag-'+qid).style.color="rgb(66,64,64)";
							}
						}
					});
			}
		}*/
		</script>
	</head>

	<body>
		

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<app-drawer-layout fullbleed responsive-width="1024px">
			 <?php include "common_components/psycho-struct.php" ?>
			<app-drawer>
				<?php include "common_components/app-drawer.php" ?>
			</app-drawer>

			<app-header-layout>
				<app-header fixed effects="waterfall">
		    		<?php include "common_components/app-header.php" ?>
		    	</app-header>

				<div id="container">
					<?php include "common_components/question-fab.php" ?>
					<template is="dom-bind">
						<paper-toast id="paperToast" text="Link copied!"></paper-toast>
						<div class="flex-container">
							<div id="leftPanel" class="flex-2">
								<paper-card>
									<paper-listbox selected={{selectReadType}}>
										<paper-item onclick="document.getElementById('mainTabs').select(0);">
											<paper-ripple></paper-ripple> Feed
										</paper-item>
										<paper-item onclick="document.getElementById('mainTabs').select(0);">
											<paper-ripple></paper-ripple> Followed
										</paper-item>
										<paper-item onclick="document.getElementById('mainTabs').select(0);">
											<paper-ripple></paper-ripple> Answered
										</paper-item>
										<paper-item onclick="document.getElementById('mainTabs').select(0);">
											<paper-ripple></paper-ripple> Trending
										</paper-item>
									</paper-listbox>
								</paper-card>
							</div>
							<div id="midPanel" class="flex-5">
								<div>
									<paper-tabs id="mainTabs" selected="{{selectMain}}">
										<paper-tab>Read</paper-tab>
										<paper-tab>Answer</paper-tab>
									</paper-tabs>

									<iron-pages selected="{{selectMain}}">
										<div id="read">
											<paper-tabs id="readTabs" selected={{selectReadType}}>
												<paper-tab>Feed</paper-tab>
												<paper-tab>Followed</paper-tab>
												<paper-tab>Answered</paper-tab>
												<paper-tab>Trending</paper-tab>
											</paper-tabs>
											<input type="hidden" id="cid" value="<?php echo $this->session->cid; ?>">
											<iron-pages selected={{selectReadType}}>
												<div>
													<paper-card id="askField">
														<div class="card-content">
															Ask a question
														</div>
														<div class="card-actions">
														 <form id="quesform" name="quesform" enctype="multipart/form-data" action="<?php echo $upload_url; ?>" method="POST">
															<paper-textarea id="question" name="question" label="What's on your mind?" no-label-float onfocus="showAskFeatures()">
															</paper-textarea>
															<div id="askFeatures">
														        <div id="showtags" name="showtags">
														        </div>
														        <div class="form-group has-feedback" id="tagdiv">
														            <label for="tag" style="padding-bottom: 25px;margin-top: 20px;opacity:0.87">Tags</label>
														            <br><br>
														            <input name="tags" id="tags" placeholder="Start Writing your tags (Min. 1 required)" required="required" onclick="getTags()" class="form-control" style="width: 100%;border-radius: 0;box-sizing: border-box;border: 1px solid #eaeaea;padding: 8.4px;">
														            <p id="errort" style="color:red"></p>
														            <span>
														             <span id="loadingpara" style="display:none">Getting Most relevant Tags for you</span>
														             <img src="<?php echo asset_url().'images/icons/loading.gif';?>" width="20px" id="loadingimage" style="display:none">
														             </span>
														        </div>

														        <div class="form-group has-feedback">
														             <input type="file" name="userfile[]" id="userfile" class="inputfile" data-multiple-caption="{count} files selected" multiple="multiple" />
														            <label for="userfile">
														            	<iron-icon icon="image:add-a-photo"></iron-icon>
														            	<span>Upload Images</span>
														            </label>
														        </div>
															</div>

															<div class="askButtonContainer">
																<paper-button class="askButton" onclick="saveQuestion()">Ask</paper-button>
															</div>
															</form>
														</div>
													</paper-card>
													<?php
													$i=0;
														foreach ($relevantQuestions as $row) {
															if($i<10){
															$qid=$row->qid;
															echo '<paper-card class="questionCard" id="questionCardNo-'.$row->qid.'">
																	<div class="card-content">
																		<div>
																			<a href="'.site_url('Communication/showQuestion?qid='.$row->qid).'"><span class="questionText">'.$row->question.'</span></a>
																			<span class="questionEndIcons">
																				<span><paper-tooltip position="left">Follow</paper-tooltip><iron-icon id="follow-'.$row->qid.'" icon="social:plus-one" onclick="follow('.$row->qid.')" class="follow-'.$row->qid.' follow';
																					if($row->followed){
																						echo ' followed';
																					}
																					echo '"></iron-icon></span>
																				<span><paper-tooltip position="right" style="white-space:nowrap;">Flag as inappropriate</paper-tooltip><iron-icon icon="flag" class="flag flag-'.$row->qid;
																					if(!$row->question_upvoted){
																						echo ' flagged';
																					}
																					echo '" id="flag-'.$row->qid.'" onclick="updatedownvote('.$row->qid.')"></iron-icon></span>
																			</span>
																		</div>
																	</div>';
																	if(!empty($row->answer)){
																	echo '<div class="card-actions">
																		<div>
																			<div class="topAnswerImg">
																				<img src="/assets/images/profilePics/profile1.jpg" style="width:40px;height:40px;">
																			</div>
																			<div class="topAnswerAbout" style="display: inline-block;">
																				<span class="topAnswerAuthor"><a href="www.scholarfact.com/User/profile/'.$row->answer->CID.'">'.$row->answer->Display_Name.'</a></span><br>
																				<span class="topAnswerBio"> bio </span><br>
																			</div>
																		</div>';
																		echo '<div class="topAnswer" id="topAnswerId-'.$row->answer->ansid.'">
																			<span class="topAnswerText">'.$row->answer->answer.'</span>';
																			if($row->answer->images!="")
																	      	{
																	        	foreach ($row->answer->images->result() as $key) 
																	        	{
																		        	if($key->imagename=='__UNLINK__' || $key->imagename=='')
																		        	{
																		        		break;
																		        	}
																		        	else
																		        	{
																			            $options = ['size' => 500, 'crop' => false];
																			            $image_file = BUCKET_ANSWERS.$key->imagename;
																			            $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);

																			            echo "<div><img src='".$image_url."' class='questionCardImg'></div>";
																	        		}
																				}
																			}
																		echo '</div>
																		<div class="ansButtonsRow flex-container-desktop">
															    			<paper-button id="upvoteansBtn_'.$row->answer->ansid.'" class="ansUpvoteBtn upvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 1){
															    					echo ' buttonUpvoted';
															    				}
															    				echo '" onclick="updateupvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 1){
															    					echo ' votesSeperatorUpvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-up" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansUpvoteBtnText_'.$row->answer->ansid.'" class="ansUpvoteBtnText ansUpvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 1){
															    							echo 'Upvoted';
															    						}
															    						else{
															    							echo 'Upvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span class="answerupvotes_'.$row->answer->ansid.'" id="answerupvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
															    					($row->answer->upvotes).'
															    				</span>
															    			</paper-button>

															    			<paper-button id="downvoteansBtn_'.$row->answer->ansid.'" class="ansDownvoteBtn downvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 0){
															    					echo ' buttonDownvoted';
															    				}
															    				echo '" onclick="updatedownvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 0){
															    					echo ' votesSeperatorDownvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-down" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansDownvoteBtnText_'.$row->answer->ansid.'" class="ansDownvoteBtnText ansDownvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 0){
															    							echo 'Downvoted';
															    						}
															    						else{
															    							echo 'Downvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span class="answerdownvotes_'.$row->answer->ansid.'" id="answerdownvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
															    					($row->answer->downvotes).'
															    				</span>
															    			</paper-button>

															    			<span class="topAnswerComment" onclick="showCommentDiv(\'topAnswerCommentDiv'.$row->answer->ansid.'\')">Comment</span>

															    			<span class="flex"></span>
															    			<span class="fb-share-button" data-href="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->answer->ansid).'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></span>
															    			<span class="share-btn" onclick="paperToast.open()" data-clipboard-text="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->answer->ansid).'">
															    				<iron-icon icon="link"></iron-icon> Copy Link</span>
															    		</div>';
															    	?>
															    		<div class="ansCommentDiv" id="<?php echo 'topAnswerCommentDiv'.$row->answer->ansid ?>">
																	    	<?php
																		    	if($row->answer->comments!=0)
																		      	{
																		        	foreach($row->answer->comments->result() as $commentdata)
																		        	{
																			          	echo '
																				        	<div class="comment-row">
																				        	<span class="comment">'.$commentdata->comment.'  -</span>
															                                <span class="comment-author"><a href="'.site_url("User/profile/".$commentdata->CID).'">'.$commentdata->Display_Name.'</a></span>
															                                <span class="comment-time"> '.$commentdata->cr_dt.'</span>
																				        	</div>';
																		        	}
																				}
																	    	?>

																		    <?php echo '<div id="commenta_'.$row->answer->ansid.'div" class="ansCommentInput flex-container">';?>
																		    <?php echo '<div class="flex-5"><paper-textarea type="text" id="commenta_'.$row->answer->ansid.'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';?>
																		    <?php echo '<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('.$row->answer->ansid.');">Comment</paper-button></div></div>';?>
																		    <?php echo '<p id="errorc_'.$row->answer->ansid.'" style="color:red"></p>';?>
																		</div>

													<?php
																	echo '</div>';
																}
																echo '</paper-card>';
																$i++;
															}
															else{
																break;
															}
															}
													?>

													<?php
														foreach ($trendingQuestions as $row) {
															$qid=$row->qid;
															echo '<paper-card class="questionCard" id="questionCardNo-'.$row->qid.'">
																	<div class="card-content">
																		<div>
																			<a href="'.site_url('Communication/showQuestion?qid='.$row->qid).'"><span class="questionText">'.$row->question.'</span></a>
																			<span class="questionEndIcons">
																				<span><paper-tooltip position="left">Follow</paper-tooltip><iron-icon id="follow-'.$row->qid.'" icon="social:plus-one" onclick="follow('.$row->qid.')" class="follow-'.$row->qid.' follow';
																					if($row->followed){
																						echo ' followed';
																					}
																					echo '"></iron-icon></span>
																				<span><paper-tooltip position="right" style="white-space:nowrap;">Flag as inappropriate</paper-tooltip><iron-icon icon="flag" class="flag flag-'.$row->qid;
																					if(!$row->question_upvoted){
																						echo ' flagged';
																					}
																					echo '" id="flag-'.$row->qid.'" onclick="updatedownvote('.$row->qid.')"></iron-icon></span>
																			</span>
																		</div>
																	</div>';
																	if(!empty($row->answer)){
																	echo '<div class="card-actions">
																		<div>
																			<div class="topAnswerImg">
																				<img src="/assets/images/profilePics/profile1.jpg" style="width:40px;height:40px;">
																			</div>
																			<div class="topAnswerAbout" style="display: inline-block;">
																				<span class="topAnswerAuthor"><a href="'.site_url("User/profile/".$row->answer->CID).'">'.$row->answer->Display_Name.'</a></span><br>
																				<span class="topAnswerBio"> bio </span><br>
																				
																			</div>
																		</div>';
																		echo '<div class="topAnswer" id="topAnswerId-'.$row->answer->ansid.'">
																			<span class="topAnswerText">'.$row->answer->answer.'</span>';
																			if($row->answer->images!="")
																	      	{
																	        	foreach ($row->answer->images->result() as $key) 
																	        	{
																		        	if($key->imagename=='__UNLINK__' || $key->imagename=='')
																		        	{
																		        		break;
																		        	}
																		        	else
																		        	{
																			            $options = ['size' => 500, 'crop' => false];
																			            $image_file = BUCKET_ANSWERS.$key->imagename;
																			            $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);

																			            echo "<div><img src='".$image_url."' class='questionCardImg'></div>";
																	        		}
																				}
																			}
																		echo '</div>
																		<div class="ansButtonsRow flex-container-desktop">
															    			<paper-button id="upvoteansBtn_'.$row->answer->ansid.'" name="upvoteansBtn_'.$row->answer->ansid.'" class="ansUpvoteBtn upvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 1){
															    					echo ' buttonUpvoted';
															    				}
															    				echo '" onclick="updateupvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 1){
															    					echo ' votesSeperatorUpvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-up" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansUpvoteBtnText_'.$row->answer->ansid.'" class="ansUpvoteBtnText ansUpvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 1){
															    							echo 'Upvoted';
															    						}
															    						else{
															    							echo 'Upvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span class="answerupvotes_'.$row->answer->ansid.'" id="answerupvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
															    					($row->answer->upvotes).'
															    				</span>
															    			</paper-button>

															    			<paper-button id="downvoteansBtn_'.$row->answer->ansid.'" name="downvoteansBtn_'.$row->answer->ansid.'" class="ansDownvoteBtn downvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 0){
															    					echo ' buttonDownvoted';
															    				}
															    				echo '" onclick="updatedownvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 0){
															    					echo ' votesSeperatorDownvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-down" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansDownvoteBtnText_'.$row->answer->ansid.'" class="ansDownvoteBtnText ansDownvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 0){
															    							echo 'Downvoted';
															    						}
															    						else{
															    							echo 'Downvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span class="answerdownvotes_'.$row->answer->ansid.'" id="answerupvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
															    					($row->answer->downvotes).'
															    				</span>
															    			</paper-button>

															    			<span class="topAnswerComment" onclick="showCommentDiv(\'topAnswerCommentDiv'.$row->answer->ansid.'\')">Comment</span>

															    			<span class="flex"></span>
															    			<span class="fb-share-button" data-href="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->answer->ansid).'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></span>
															    			<span class="share-btn" onclick="paperToast.open()" data-clipboard-text="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->answer->ansid).'">
															    				<iron-icon icon="link"></iron-icon> Copy Link</span>
															    		</div>';
															    	?>
															    		<div class="ansCommentDiv" id="<?php echo 'topAnswerCommentDiv'.$row->answer->ansid ?>">
																	    	<?php
																		    	if($row->answer->comments!=0)
																		      	{
																		        	foreach($row->answer->comments->result() as $commentdata)
																		        	{
																			          	echo '
																				        	<div class="comment-row">
																				        	<span class="comment">'.$commentdata->comment.'  -</span>
															                                <span class="comment-author"><a href="'.site_url("User/profile/".$commentdata->CID).'">'.$commentdata->Display_Name.'</a></span>
															                                <span class="comment-time"> '.$commentdata->cr_dt.'</span>
																				        	</div>';
																		        	}
																				}
																	    	?>

																		    <?php echo '<div id="commenta_'.$row->answer->ansid.'div" class="ansCommentInput flex-container">';?>
																		    <?php echo '<div class="flex-5"><paper-textarea type="text" id="commenta_'.$row->answer->ansid.'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';?>
																		    <?php echo '<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('.$row->answer->ansid.');">Comment</paper-button></div></div>';?>
																		    <?php echo '<p id="errorc_'.$row->answer->ansid.'" style="color:red"></p>';?>
																		</div>

													<?php
																	echo '</div>';
																}
																echo '</paper-card>';
															}
													?>
												</div>
												<div>
													<?php
										    			if(empty($followingQuestions))
										    			{
										    				echo "<h4 class='no-content-msg'>You're currently following no questions</h4>";
										    			}
										    			foreach ($followingQuestions as $row) {
										    				$qid=$row->qid;
										    				echo '<paper-card class="questionCard" id="questionCardNo-'.$row->qid.'">
																	<div class="card-content">
																		<div>
																			<a href="'.site_url('Communication/showQuestion?qid='.$row->qid).'"><span class="questionText">'.$row->question.'</span></a>
																			<span class="questionEndIcons">
																				<span><paper-tooltip position="left">Follow</paper-tooltip><iron-icon id="follow-'.$row->qid.'" icon="social:plus-one" onclick="follow('.$row->qid.')" class="follow-'.$row->qid.' follow';
																					if($row->followed){
																						echo ' followed';
																					}
																					echo '"></iron-icon></span>
																				<span><paper-tooltip position="right" style="white-space:nowrap;">Flag as inappropriate</paper-tooltip><iron-icon icon="flag" class="flag flag-'.$row->qid;
																					if(!$row->question_upvoted){
																						echo ' flagged';
																					}
																					echo '" id="flag-'.$row->qid.'" onclick="updatedownvote('.$row->qid.')"></iron-icon></span>
																			</span>
																		</div>
																	</div>';
																	if(!empty($row->answer)){
																	echo '<div class="card-actions">
																		<div>
																			<div class="topAnswerImg">
																				<img src="/assets/images/profilePics/profile1.jpg" style="width:40px;height:40px;">
																			</div>
																			<div class="topAnswerAbout" style="display: inline-block;">
																				<span class="topAnswerAuthor"><a href="'.site_url("User/profile/".$row->answer->CID).'">'.$row->answer->Display_Name.'</a></span><br>
																				<span class="topAnswerBio"> bio </span><br>
																				
																			</div>
																		</div>
																		<div class="topAnswer" id="topAnswerId-'.$row->answer->ansid.'">
																			<span class="topAnswerText">'.$row->answer->answer.'</span>';
																			if($row->answer->images!="")
																	      	{
																	        	foreach ($row->answer->images->result() as $key) 
																	        	{
																		        	if($key->imagename=='__UNLINK__' || $key->imagename=='')
																		        	{
																		        		break;
																		        	}
																		        	else
																		        	{
																			            $options = ['size' => 500, 'crop' => false];
																			            $image_file = BUCKET_ANSWERS.$key->imagename;
																			            $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);

																			            echo "<div><img src='".$image_url."' class='questionCardImg'></div>";
																	        		}
																				}
																			}
																		echo '</div>
																		<div class="ansButtonsRow flex-container-desktop">
															    			<paper-button id="upvoteansBtn_'.$row->answer->ansid.'" class="ansUpvoteBtn upvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 1){
															    					echo ' buttonUpvoted';
															    				}
															    				echo '" name="upvoteansBtn_'.$row->answer->ansid.'" onclick="updateupvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 1){
															    					echo ' votesSeperatorUpvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-up" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansUpvoteBtnText_'.$row->answer->ansid.'" class="ansUpvoteBtnText ansUpvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 1){
															    							echo 'Upvoted';
															    						}
															    						else{
															    							echo 'Upvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span class="answerupvotes_'.$row->answer->ansid.'" id="answerupvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
															    					($row->answer->upvotes).'
															    				</span>
															    			</paper-button>

															    			<paper-button id="downvoteansBtn_'.$row->answer->ansid.'" name="downvoteansBtn_'.$row->answer->ansid.'" class="ansDownvoteBtn downvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 0){
															    					echo ' buttonDownvoted';
															    				}
															    				echo '" onclick="updatedownvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 0){
															    					echo ' votesSeperatorDownvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-down" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansDownvoteBtnText_'.$row->answer->ansid.'" class="ansDownvoteBtnText ansDownvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 0){
															    							echo 'Downvoted';
															    						}
															    						else{
															    							echo 'Downvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span class="answerdownvotes_'.$row->answer->ansid.'" id="answerupvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
															    					($row->answer->downvotes).'
															    				</span>
															    			</paper-button>

															    			<span class="topAnswerComment" onclick="showCommentDiv(\'topAnswerCommentDiv'.$row->answer->ansid.'\')">Comment</span>

															    			<span class="flex"></span>
															    			<span class="fb-share-button" data-href="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->answer->ansid).'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></span>
															    			<span class="share-btn" onclick="paperToast.open()" data-clipboard-text="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->answer->ansid).'">
															    				<iron-icon icon="link"></iron-icon> Copy Link</span>
															    		</div>';
															    	?>
															    		<div class="ansCommentDiv" id="<?php echo 'topAnswerCommentDiv'.$row->answer->ansid ?>">
																	    	<?php
																		    	if($row->answer->comments!=0)
																		      	{
																		        	foreach($row->answer->comments->result() as $commentdata)
																		        	{
																			          	echo '
																				        	<div class="comment-row">
																				        	<span class="comment">'.$commentdata->comment.'  -</span>
															                                <span class="comment-author"><a href="'.site_url("User/profile/".$commentdata->CID).'">'.$commentdata->Display_Name.'</a></span>
															                                <span class="comment-time"> '.$commentdata->cr_dt.'</span>
																				        	</div>';
																		        	}
																				}
																	    	?>

																		    <?php echo '<div id="commenta_'.$row->answer->ansid.'div" class="ansCommentInput flex-container">';?>
																		    <?php echo '<div class="flex-5"><paper-textarea type="text" id="commenta_'.$row->answer->ansid.'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';?>
																		    <?php echo '<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('.$row->answer->ansid.');">Comment</paper-button></div></div>';?>
																		    <?php echo '<p id="errorc_'.$row->answer->ansid.'" style="color:red"></p>';?>
																		</div>

													<?php
																	echo '</div>';
																}
																echo '</paper-card>';
														}
													?>
												</div>
												<div>
													<?php

														if($userAnswers->num_rows()==0)
										    			{
										    				echo "<h4 class='no-content-msg'>Whoa! What are you doing? Start Answering some questions and fill this page up!</h4>";
										    			}
														foreach ($userAnswers->result() as $row) {
															$qid=$row->qid;
															echo '<paper-card class="questionCard" id="questionCardNo-'.$row->qid.'">
																	<div class="card-content">
																		<div>
																			<a href="'.site_url('Communication/showQuestion?qid='.$row->qid).'"><span class="questionText">'.$row->question.'</span></a>
																			<span class="questionEndIcons">
																				<span><paper-tooltip position="left">Follow</paper-tooltip><iron-icon id="follow-'.$row->qid.'" icon="social:plus-one" onclick="follow('.$row->qid.')" class="follow-'.$row->qid.' follow';
																					if($row->followed){
																						echo ' followed';
																					}
																					echo '"></iron-icon></span>
																			</span>
																		</div>
																	</div>';
																	echo '<div class="card-actions">
																		<div>
																			<div class="topAnswerImg">
																				<img src="/assets/images/profilePics/profile1.jpg" style="width:40px;height:40px;">
																			</div>
																			<div class="topAnswerAbout" style="display: inline-block;">
																				<span class="topAnswerAuthor"><a href='.site_url("User/profile/".$row->CID).'">'.$row->Display_Name.'</a></span><br>
																				<span class="topAnswerBio"> bio </span><br>
																				
																			</div>
																		</div>
																		<div class="topAnswer" id="topAnswerId-'.$row->ansid.'">
																			<span class="topAnswerText">'.$row->answer.'</span>';
																			if(isset($row->answer_images))
																	      	{
																	        	foreach ($row->answer_images->result() as $key) 
																	        	{
																		        	if($key->imagename=='__UNLINK__' || $key->imagename=='')
																		        	{
																		        		break;
																		        	}
																		        	else
																		        	{
																			            $options = ['size' => 500, 'crop' => false];
																			            $image_file = BUCKET_ANSWERS.$key->imagename;
																			            $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);

																			            echo "<div><img src='".$image_url."' class='questionCardImg'></div>";
																	        		}
																				}
																			}
																		echo '</div>
																		<div class="ansButtonsRow flex-container-desktop">
															    			<paper-button id="upvoteansBtn_'.$row->ansid.'" name="upvoteansBtn_'.$row->answer->ansid.'" class="ansUpvoteBtn upvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 1){
															    					echo ' buttonUpvoted';
															    				}
															    				echo '" onclick="updateupvoteans('.$row->ansid.')" value="'.$row->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 1){
															    					echo ' votesSeperatorUpvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-up" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansUpvoteBtnText_'.$row->ansid.'" class="ansUpvoteBtnText ansUpvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 1){
															    							echo 'Upvoted';
															    						}
															    						else{
															    							echo 'Upvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span id="answerupvotes_'.$row->ansid.'" style="padding-left: 10px;">'.
															    					($row->upvotes).'
															    				</span>
															    			</paper-button>

															    			<paper-button id="downvoteansBtn_'.$row->ansid.'" name="downvoteansBtn_'.$row->answer->ansid.'" class="ansDownvoteBtn downvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 0){
															    					echo ' buttonDownvoted';
															    				}
															    				echo '" onclick="updatedownvoteans('.$row->ansid.')" value="'.$row->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 0){
															    					echo ' votesSeperatorDownvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-down" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansDownvoteBtnText_'.$row->ansid.'" class="ansDownvoteBtnText ansDownvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 0){
															    							echo 'Downvoted';
															    						}
															    						else{
															    							echo 'Downvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span id="answerdownvotes_'.$row->ansid.'" style="padding-left: 10px;">'.
															    					($row->downvotes).'
															    				</span>
															    			</paper-button>

															    			<span class="topAnswerComment" onclick="showCommentDiv(\'topAnswerCommentDiv'.$row->ansid.'\')">Comment</span>

															    			<span class="flex"></span>
															    			<span class="fb-share-button" data-href="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->ansid).'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></span>
															    			<span class="share-btn" onclick="paperToast.open()" data-clipboard-text="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->ansid).'">
															    				<iron-icon icon="link"></iron-icon> Copy Link</span>
															    		</div>';
															    	?>
															    		<div class="ansCommentDiv" id="<?php echo 'topAnswerCommentDiv'.$row->ansid; ?>">
																	    	<?php
																		    	if($row->comments!=0)
																		      	{
																		        	foreach($row->comments->result() as $commentdata)
																		        	{
																			          	echo '
																				        	<div class="comment-row">
																				        	<span class="comment">'.$commentdata->comment.'  -</span>
															                                <span class="comment-author"><a href="'.site_url("User/profile/".$commentdata->CID).'">'.$commentdata->Display_Name.'</span>
															                                <span class="comment-time"> '.$commentdata->cr_dt.'</span>
																				        	</div>';
																		        	}
																				}
																	    	?>

																		    <?php echo '<div id="commenta_'.$row->ansid.'div" class="ansCommentInput flex-container">';?>
																		    <?php echo '<div class="flex-5"><paper-textarea type="text" id="commenta_'.$row->ansid.'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';?>
																		    <?php echo '<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('.$row->ansid.');">Comment</paper-button></div></div>';?>
																		    <?php echo '<p id="errorc_'.$row->ansid.'" style="color:red"></p>';?>
																		</div>

													<?php
																	echo '</div>';
																echo '</paper-card>';
															}
													?>
												</div>
												<div>
													<?php
														foreach ($trendingQuestions as $row) {
															$qid=$row->qid;
															echo '<paper-card class="questionCard" id="questionCardNo-'.$row->qid.'">
																	<div class="card-content">
																		<div>
																			<a href="'.site_url('Communication/showQuestion?qid='.$row->qid).'"><span class="questionText">'.$row->question.'</span></a>
																			<span class="questionEndIcons">
																				<span><paper-tooltip position="left">Follow</paper-tooltip><iron-icon id="follow-'.$row->qid.'" icon="social:plus-one" onclick="follow('.$row->qid.')" class="follow-'.$row->qid.' follow';
																					if($row->followed){
																						echo ' followed';
																					}
																					echo '"></iron-icon></span>
																				<span><paper-tooltip position="right" style="white-space:nowrap;">Flag as inappropriate</paper-tooltip><iron-icon icon="flag" class="flag flag-'.$row->qid;
																					if(!$row->question_upvoted){
																						echo ' flagged';
																					}
																					echo '" id="flag-'.$row->qid.'" onclick="updatedownvote('.$row->qid.')"></iron-icon></span>
																			</span>
																		</div>
																	</div>';
																	if(!empty($row->answer)){
																	echo '<div class="card-actions">
																		<div>
																			<div class="topAnswerImg">
																				<img src="/assets/images/profilePics/profile1.jpg" style="width:40px;height:40px;">
																			</div>
																			<div class="topAnswerAbout" style="display: inline-block;">
																				<span class="topAnswerAuthor"><a href="'.site_url("User/profile/".$row->answer->CID).'">'.$row->answer->Display_Name.'</a></span><br>
																				<span class="topAnswerBio"> bio </span><br>
																				
																			</div>
																		</div>
																		<div class="topAnswer" id="topAnswerId-'.$row->answer->ansid.'">
																			<p class="topAnswerText">'.$row->answer->answer.'</p>';
																			if($row->answer->images!="")
																	      	{
																	        	foreach ($row->answer->images->result() as $key) 
																	        	{
																		        	if($key->imagename=='__UNLINK__' || $key->imagename=='')
																		        	{
																		        		break;
																		        	}
																		        	else
																		        	{
																			            $options = ['size' => 500, 'crop' => false];
																			            $image_file = BUCKET_ANSWERS.$key->imagename;
																			            $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);

																			            echo "<div><img src='".$image_url."' class='questionCardImg'></div>";
																	        		}
																				}
																			}
																		echo '</div>
																		<div class="ansButtonsRow flex-container-desktop">
															    			<paper-button id="upvoteansBtn_'.$row->answer->ansid.'" name="upvoteansBtn_'.$row->answer->ansid.'" class="ansUpvoteBtn upvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 1){
															    					echo ' buttonUpvoted';
															    				}
															    				echo '" onclick="updateupvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 1){
															    					echo ' votesSeperatorUpvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-up" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansUpvoteBtnText_'.$row->answer->ansid.'" class="ansUpvoteBtnText ansUpvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 1){
															    							echo 'Upvoted';
															    						}
															    						else{
															    							echo 'Upvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span class="answerupvotes_'.$row->answer->ansid.'" id="answerupvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
															    					($row->answer->upvotes).'
															    				</span>
															    			</paper-button>

															    			<paper-button id="downvoteansBtn_'.$row->answer->ansid.'" name="downvoteansBtn_'.$row->answer->ansid.'" class="ansDownvoteBtn downvoteansBtn_'.$row->answer->ansid;
															    				if($row->answer->upvoted == 0){
															    					echo ' buttonDownvoted';
															    				}
															    				echo '" onclick="updatedownvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
															    				<span class="votesSeperator';
															    				if($row->answer->upvoted == 0){
															    					echo ' votesSeperatorDownvoted';
															    				}
															    				echo '">
															    					<iron-icon icon="thumb-down" style="font-size: 14px;margin-right: 5px;"></iron-icon>
															    					<span id="ansDownvoteBtnText_'.$row->answer->ansid.'" class="ansDownvoteBtnText ansDownvoteBtnText_'.$row->answer->ansid.'">';
															    						if($row->answer->upvoted == 0){
															    							echo 'Downvoted';
															    						}
															    						else{
															    							echo 'Downvote';	
															    						}
															    						echo '</span>
															    				</span>
															    				<span class="answerdownvotes_'.$row->answer->ansid.'" id="answerupvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
															    					($row->answer->downvotes).'
															    				</span>
															    			</paper-button>

															    			<span class="topAnswerComment" onclick="showCommentDiv(\'topAnswerCommentDiv'.$row->answer->ansid.'\')">Comment</span>

															    			<span class="flex"></span>
															    			<span class="fb-share-button" data-href="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->answer->ansid).'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></span>
															    			<span class="share-btn" onclick="paperToast.open()" data-clipboard-text="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->answer->ansid).'">
															    				<iron-icon icon="link"></iron-icon> Copy Link</span>
															    		</div>';
															    	?>
															    		<div class="ansCommentDiv" id="<?php echo 'topAnswerCommentDiv'.$row->answer->ansid ?>">
																	    	<?php
																		    	if($row->answer->comments!=0)
																		      	{
																		        	foreach($row->answer->comments->result() as $commentdata)
																		        	{
																			          	echo '
																				        	<div class="comment-row">
																				        	<span class="comment">'.$commentdata->comment.'  -</span>
															                                <span class="comment-author"><a href="'.site_url("User/profile/".$commentdata->CID).'">'.$commentdata->Display_Name.'</a></span>
															                                <span class="comment-time"> '.$commentdata->cr_dt.'</span>
																				        	</div>';
																		        	}
																				}
																	    	?>

																		    <?php echo '<div id="commenta_'.$row->answer->ansid.'div" class="ansCommentInput flex-container">';?>
																		    <?php echo '<div class="flex-5"><paper-textarea type="text" id="commenta_'.$row->answer->ansid.'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';?>
																		    <?php echo '<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('.$row->answer->ansid.');">Comment</paper-button></div></div>';?>
																		    <?php echo '<p id="errorc_'.$row->answer->ansid.'" style="color:red"></p>';?>
																		</div>

													<?php
																	echo '</div>';
																}
																echo '</paper-card>';
															}
													?>
												</div>
											</iron-pages>
										</div>
										<div id="answer">
											<?php
								    			if(empty($unansweredQuestions))
								    			{
								    				echo "<h4 class='no-content-msg'>Now that is cool. There's no question for you to answer!</h4>";
								    			}
								    			foreach ($unansweredQuestions as $row) {
								    				echo '<paper-card class="questionCard" id="questionCardNo-'.$row->qid.'">
															<div class="card-content">
																<div>
																	<a href="'.site_url('Communication/showQuestion/1?qid='.$row->qid).'"><span class="questionText">'.$row->question.'</span></a>
																	<span class="questionEndIcons">
																		<span><paper-tooltip position="left">Follow</paper-tooltip><iron-icon id="follow-'.$row->qid.'" icon="social:plus-one" onclick="follow('.$row->qid.')" class="follow-'.$row->qid.' follow';
																					if($row->followed){
																						echo ' followed';
																					}
																					echo '"></iron-icon></span>
																		<span><paper-tooltip position="right" style="white-space:nowrap;">Flag as inappropriate</paper-tooltip><iron-icon icon="flag" class="flag flag-'.$row->qid;
																					if(!$row->question_upvoted){
																						echo ' flagged';
																					}
																					echo '" id="flag-'.$row->qid.'" onclick="updatedownvote('.$row->qid.')"></iron-icon></span>
																	</span>
																</div>
															</div>
														</paper-card>';
												}
											?>
										</div>
									</iron-pages>
								</div>
							</div>
							<div id="rightPanel" class="flex-2">
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

		

		<!-- required for tagging -->
		<script src="<?php echo asset_url();?>js/jquery-ui.min.js"></script>
		<link href="<?php echo asset_url();?>css/jquery.tagit.css" rel="stylesheet" type="text/css">
		<link href="<?php echo asset_url();?>css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
		<script src="<?php echo asset_url();?>js/tag-it.js" type="text/javascript" charset="utf-8"></script>
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