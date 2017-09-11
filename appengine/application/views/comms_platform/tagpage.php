<!DOCTYPE html>
<html lang="en">
	<head>
		<title>#<?php echo $tag;?> | Scholarfact</title>
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

			#midPanel > div{
				max-width: 634px;
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
			}

			.tagHeading{
				font-size: 24px;
				opacity: 0.87;
				font-weight: bold;
				margin-bottom: 20px;
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
	</head>

	<body>
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

				<div id="container">
				<?php include "common_components/question-fab.php" ?>
					<div class="flex-container">
						<div id="midPanel" class="flex-2">
							<div>
								<?php 
						    		if($isCollege==0)
							        	echo '<h3 class="tagHeading">#'.$tag.'</h3>';
							        else
							        	 echo '<a href="'.site_url('College/details/'.$collegeID).'">
							        			<h3 class="tagHeading">#'.$tag.'</h3>
							        			</a>';
							        ?>
							        <input type="hidden" id="cid" value="<?php echo $this->session->cid; ?>">
							        <?php
										foreach ($Questions->result() as $row) {
											$qid=$row->qid;
											echo '<input type="hidden" id="qid" value="'.$qid.'">';
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
																<span class="topAnswerAuthor">'.$row->answer->email.',</span>
																<span class="topAnswerBio"> bio </span><br>
																<span class="topAnswerViews">24k Views</span>
															</div>
														</div>';
														echo '<div class="topAnswer" id="topAnswerId-'.$row->answer->ansid.'">
															<span class="topAnswerText">'.$row->answer->answer.'</span>';
															if($row->answer->images!="")
													      	{
													        	foreach ($row->answer->images->result() as $key) 
													        	{
														        	if($key->imagename=='__UNLINK__' || $key->image==NULL || $key->imagename=='')
														        	{
														        		break;
														        	}
														        	else
														        	{
															            $options = ['size' => 400, 'crop' => true];
															            $image_file = BUCKET_ANSWERS.$key->imagename;
															            $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);

															            echo "<div class='topAnswerImg'><img src='".$image_url."' class='img-responsive' style='width:20%;'></div>";
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
											}
										?>
							</div>
						</div>

						<div id="righPanel" class="flex">
						</div>
					</div>
				</div>

				<footer>
		    		<?php include "common_components/footer.php" ?>
		    	</footer>

			</app-header-layout>
		</app-drawer-layout>

		<script type="text/javascript" src="/assets/js/toolbarSearch.js"></script>
		<script type="text/javascript" src="/assets/js/commonScript.js"></script>

		<script>
			document.addEventListener('WebComponentsReady', function () {
				var loaderWrapper = document.getElementById("loader-wrapper");
				loaderWrapper.style.opacity = "0";
				setTimeout(function(){
					loaderWrapper.style.display = "none";
				},300);

				initializereadmore();
				new Clipboard('.share-btn');
				// run the first time; all subsequent calls will take care of themselves
				//setTimeout(getnotifications, 2000);
			});

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
		  //var qid=$('#qid').val();
		  $.ajax({
			url: '<?php echo site_url('Communication/saveUpvotes'); ?>',
			method: 'POST',
			data: 'qid='+qid,
			success: function(result)
			{
			}
		  });
		}
		
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

		$(document).ready()
		{
			//setTimeout(getnotifications, 2000);
			initializereadmore();
			new Clipboard('.share-btn');
		}

		function savequescomment()
		{
		  var comment=$('#comment').val();
		  if(comment==="")
		  {
		    $("#errorcq").text("Comment cannot be blank");
		    $('#commentqdiv').addClass("has-error");
		  }
		  else
		  {
		    $("#errorcq").text("");
		    $('#commentqdiv').removeClass("has-error");
		    var qid=$('#qid').val();
		    $.ajax({
		      url:'<?php echo site_url('Communication/saveCommentsQuestion');?>'+"/"+qid+"/"+comment,
		      success:function(data)
		      {
		        if(data==1)
		        {
		          showCommentsQues(qid);
		        }
		        else
		        {
		          alert("There is some error");
		        }
		      }
		    });
		  }
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
						term=term+'<div class="comment-row"><span class="comment">'+row.comment+'  -</span><span class="comment-author"><a href="www.scholarfact.com/User/profile/'+row.CID+')">'+row.Display_Name+'</a></span><span class="comment-time"> '+row.cr_dt+'</span></div>';
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

		</script>
	</body>
</html>