<?php
use google\appengine\api\cloud_storage\CloudStorageTools;
$options = ['gs_bucket_name' => BUCKET_NAME];
$upload_url_answer = CloudStorageTools::createUploadUrl(site_url('Communication/saveAnswer'), $options);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $questiontitle; ?></title>
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

		<!-- <link rel="stylesheet" href="<?php echo asset_url();?>css/jqtree.css">
		<script src="<?php echo asset_url();?>js/tree.jquery.js"></script> -->

		<script type="text/javascript" src="<?php echo asset_url();?>js/jquery.shorten.js"></script>
		<script type="text/javascript" src="<?php echo asset_url();?>js/readmore.min.js"></script>

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

			#midPanel{
				padding-right: 50px;
			}

			#questionBox{
				margin-bottom: 40px;
			}

			#questionText{
				line-height: 1.25;
				font-weight: bold;
				opacity: 0.87;
				color: black;
				font-size: 24px;
			}

			.questionActionRow{
				margin: 15px 0;
			}

			.answerThisQuestion, .requestBtn{
				font-size: 13px;
				border: 1px solid var(--main-color);
				color: var(--main-color);
				padding: 3px 7px 4px 7px;
				opacity: 0.87;
			}

			.answerThisQuestion:hover, .requestBtn:hover{
				opacity: 1;
			}

			.answerThisQuestion .answerThisQuestionText, .requestBtn .requestBtnText{
				vertical-align: middle;
				text-transform: capitalize;
			}

			.fb-share-button{
				margin: 0 5px;
			}

			#voting-actions > div, #voting-actions > span, #voting-actions > paper-button{
				margin-right: 12px;
			}

			#commentqdiv{
				border: 1px solid #e2e2e2;
				border-radius: 5px;
				background-color: #f6f6f6;
				padding: 10px;
				margin-bottom: 20px;
				display: none;
			}

			#commentqdiv #commentdiv .flex{
				text-align: center;
			}

			#commentBtn{
				margin-top: 24px;
				background-color: var(--paper-red-700);
				color: white;
				opacity: 1;
				--paper-button : {
					font-size: 14px;
					padding: 8px;
					text-transform: capitalize;
				};
			}

			#answerInputDiv{
				border: 1px solid var(--main-color);
				border-radius: 5px;
				padding: 10px;
				padding-top: 0;
				background-color: #f6f6f6;
				display: none;
			}

			#answerInputDiv #submitBtn{
				margin-top: 24px;
				background-color: var(--main-color);
				color: white;
				opacity: 1;
				--paper-button : {
					font-size: 14px;
					padding: 8px;
					text-transform: capitalize;
				};
			}

			.inputfile + label{
				margin-top: 10px;
			}

			.ansCommentDiv{
				border: 1px solid #e2e2e2;
				border-radius: 5px;
				background-color: #f6f6f6;
				padding: 10px;
				margin-bottom: 20px;
				display: none;
			}

			.ansCommentDiv .ansCommentInput .flex{
				text-align: center;
			}

			.ansCommentBtn{
				margin-top: 24px;
				background-color: var(--paper-red-700);
				color: white;
				opacity: 1;
				--paper-button : {
					font-size: 14px;
					padding: 8px;
					text-transform: capitalize;
				};
			}

			.oneAnswer{
				border-bottom: 1px solid rgba(0,0,0,0.14);
				margin-bottom: 10px;
			}

			.show_more_main{
				text-transform: capitalize;
				font-size: 14px;
			}

			.divHeading{
				border-bottom: 1px solid rgba(0,0,0,0.14);
				padding-bottom: 10px;
			}

			#rightPanel .questionText{
				font-weight: normal;
				font-size: 16px;
			}

			.viewAllBtn{
				text-transform: capitalize;
				color: black;
				opacity: 0.87;
			}

			#imageOverlay{
				position: fixed;
				top: 0;
				left: 0;
				width: 0px;
				height: 100%;
				background-color: rgba(0,0,0,0.8);
				z-index: 1000;
				overflow-x: hidden;
				overflow-y: hidden;
			}

			#imageOverlay paper-fab{
				--paper-fab-background: black;
				--paper-fab-keyboard-focus-background: rgba(0,0,0,0.5);
				position: absolute;
				top: 20px;
				right: 20px;
			}

			#imageOverlay img{
				opacity: 1;
				max-height: 90vh;
				max-width: 90vw;
				position: absolute;
				left: 50%;
				top: 50%;
				transform : translate(-50%,-50%);
			}

			.image-expandable{
				max-width: 156px;
				cursor: zoom-in;
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
			});
		</script>
	</head>

	<body>
		<div id="loader-wrapper">
		</div>
		<div id="imageOverlay">
			<paper-fab icon="close" onclick="closeImageOverlay()"></paper-fab>
			<img src="" class="popup-image">
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
		    		<?php
						foreach($question->result() as $row)
							$qdata=$row;
							$qid=$qdata->qid;
					?>
					<div class="flex-container-desktop">
						<div id="midPanel" class="flex-desktop-2">
							<div id="questionBox">	
								<div>
						    		<a href="<?php echo site_url('Communication/showQuestion?qid='.$qdata->qid) ?>"><h2 id="questionText"><?php echo $qdata->question;?></h2></a>
						    		<br>
						    		<?php 
										if($qdata->images->num_rows()!=0)
										{
											foreach ($qdata->images->result() as $key) {
												if($key->imagename=='__UNLINK__')
												{
													break;
												}
												else
												{
										            $options = ['size' => 400, 'crop' => true];
										            $image_file = BUCKET_QUESTIONS.$key->imagename;
										            $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);
										            echo "<img src='".$image_url."' class='image-expandable' onclick='openImageOverlay(this)'>";
												}
											}
										}
									?>
									<br>
								</div>

								<form>
								    <input type="hidden" id="qid" value="<?php echo $qdata->qid; ?>">
								    <input type="hidden" id="cid" value="<?php echo $this->session->userid; ?>">
								</form>

					 			<div id="tags-bar">
							    	<?php
							    		foreach($qdata->tags->result() as $tag)
							        	{
							            	if($tag->tags!="")
							            	echo '<a href="'.site_url('Communication/showTagPage?tid='.$tag->tags).'" class="tagLink"><div class="tagContainer"><img src="/assets/images/backgrounds/tag.png" style="width:10px;vertical-align:middle;margin-right:2px;">'.$tag->tags.'</div></a>';
							          	}
									?>
							    </div>

							    <div id="voting-actions" class="questionActionRow">
							    <?php if($this->session->is_logged_in!=0){ ?>
									<paper-button class="answerThisQuestion" onclick="showAnswerInput()">
										<span class="answerThisQuestionText">Answer</span>
									</paper-button>
								<?php }
								?>	
									<paper-button id="downvoteBtn" class="requestBtn" onclick=''>
										<span class="requestBtnText">Request</span>
									</paper-button>

								 <?php if($this->session->is_logged_in!=0){ ?>	
									<span class="topAnswerComment" onclick="showCommentDiv('commentqdiv')">Comment</span>
									<span class="followBtn topAnswerComment" id="followBtn" onclick="follow()">Follow</span>
									<?php }
								?>	

									<div class="fb-share-button" data-href="<?php echo site_url('Communication/showQuestion?qid='.$qdata->qid);?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>

									<span class="share-btn" onclick="paperToast.open()" data-clipboard-text="<?php echo site_url('Communication/showQuestion?qid='.$qdata->qid);?>">
					    				<iron-icon icon="link"></iron-icon> Copy Link
					    			</span>

					    			<?php if($this->session->is_logged_in!=0){ ?>	
					    			<span>
					    				<paper-tooltip position="right" style="white-space:nowrap;">Flag as inappropriate</paper-tooltip>
					    				<iron-icon icon="flag" class="flag" id="flag-<?php echo $qdata->qid;?>"
					    				style="color:#f44336;cursor:pointer;" onclick="updatedownvote(<?php echo $qdata->qid;?>)"></iron-icon>
					    			</span>
					    			<?php } ?>
								</div>
								<?php if($this->session->is_logged_in!=0){ ?>	
								<div id="commentqdiv">
							    	<?php
								    	if($qdata->comments!=0)
								      	{
								        	foreach($qdata->comments->result() as $commentdata)
								        	{
								        		echo '
									        	<div class="comment-row">
									        	<span class="comment">'.$commentdata->comment.'  -</span><span class="comment-author"><a href="'.site_url("User/profile/".$commentdata->CID).'">'.$commentdata->Display_Name.'</a></span><span class="comment-time"> '.$commentdata->cr_dt.'</span>
									        	</div>';
									        }
								      	}
								    ?>
									<div id="commentdiv" class="flex-container">
										<div class="flex-5">
											<paper-textarea type="text" id="comment" placeholder="Start writing your comment" required></paper-textarea>
										</div>
										<div class="flex">
											<paper-button id="commentBtn" onclick="savequescomment()">Comment</paper-button>
										</div>
									</div>
									<p id="errorcq" style="color:red"></p>
								</div>
								<?php } ?>

								<?php if($this->session->is_logged_in!=0){ ?>	
								<div id="answerInputDiv">
									<form id="answerform" name="answerform" enctype="multipart/form-data" action="<?php echo $upload_url_answer;?>" method="POST">
							        	<div class="form-group">
							            	<paper-textarea id="answer" name="answer" placeholder="Write your answer" required="required"></paper-textarea>
							            	<p id="ansp" style="color:red"></p>
							        	</div>
							        
							        	<div class="form-group">
								            <input type="file" name="userfile[]" id="userfile" class="inputfile" data-multiple-caption="{count} files selected" multiple="multiple" />
								            <label for="userfile"><iron-icon icon="image:add-a-photo"></iron-icon> <span>Upload Images</span></label>
										</div>
							        
							        	<div class="form-group">
							        		<input type="hidden" id="quesid" name="quesid" value="<?php echo $qdata->qid;?>">
							        	</div>
							        
							        	<div class="form-group">
							        		<input type="hidden" id="userid" value="<?php echo $this->session->userid;?>">
										</div>
							        	
							        	<paper-button id="submitBtn" onclick="saveAnswer()">Submit</paper-button>
									</form>
								</div> 
								<?php } ?> 
							</div>

							<div id="answersBlock">
								<?php
									if($answer->num_rows==0)
							   		{
							      		echo '<h3>No answers have been submitted for this question by Users yet!</h3>';
							    	}
							    	else{
							    		echo "<div style='font-size: 18px;opacity: 0.87;color: black;border-bottom: 1px solid rgba(0,0,0,0.14); padding-bottom: 7px;'>";
							    		echo count($answer->result())." ".(count($answer->result()) == 1 ? "Answer" : "Answers")."
					                      	</div>
					                      	<br>";
					            		$lastRank=0;
								    	foreach($answer->result() as $row){
								    		echo '<div class="oneAnswer">';
                        					if(isset($row->rank))
								    		  $lastRank=$row->rank;
								    		echo '<div>
													<div class="topAnswerImg">
														<img src="/assets/images/profilePics/profile1.jpg" style="width:40px;height:40px;">
													</div>
													<div class="topAnswerAbout" style="display: inline-block;">
														<span class="topAnswerAuthor"><a href="www.scholarfact.com/User/profile/'.$row->CID.'">'.$row->Display_Name.'</a></span><br>
														<span class="topAnswerBio"> bio </span><br>
													</div>
												</div>

												<div class="topAnswer" id="topAnswerId-'.$row->ansid.'">
													<span class="topAnswerText">'.$row->answer.'</span>
													<br>';

											      	if($row->images!="")
											      	{
											        	foreach ($row->images->result() as $key) {
												        	if($key->imagename=='__UNLINK__' || $key->imagename=='')
												        	{
												        		break;
												        	}
												        	else
												        	{
													            $options = ['size' => 500, 'crop' => false];
													            $image_file = BUCKET_ANSWERS.$key->imagename;
													            $image_url = CloudStorageTools::getImageServingUrl($image_file, $options);

													            echo "<img src='".$image_url."' class='image-expandable' onclick='openImageOverlay(this)'>";
											        		}
														}
													}
												echo '<br></div>';
												?>
									
											<?php
											if($this->session->is_logged_in!=0){
										    echo '<div class="ansButtonsRow">
									    			<paper-button id="upvoteansBtn_'.$row->ansid.'" class="ansUpvoteBtn" onclick="updateupvoteans('.$row->ansid.')" value="'.$row->ansid.'">
									    				<span class="votesSeperator">
									    					<iron-icon icon="thumb-up" style="font-size: 14px;margin-right: 5px;"></iron-icon>
									    					<span id="ansUpvoteBtnText_'.$row->ansid.'" class="ansUpvoteBtnText">Upvote</span>
									    				</span>
									    				<span id="answerupvotes_'.$row->ansid.'" style="padding-left: 10px;">'.
									    					($row->upvotes).'
									    				</span>
									    			</paper-button>

									    			<paper-button id="downvoteansBtn_'.$row->ansid.'" class="ansDownvoteBtn" onclick="updatedownvoteans('.$row->ansid.')" value="'.$row->ansid.'">
									    				<span class="votesSeperator">
									    					<iron-icon icon="thumb-down" style="font-size: 14px;margin-right: 5px;"></iron-icon>
									    					<span id="ansDownvoteBtnText_'.$row->ansid.'" class="ansDownvoteBtnText">Downvote</span>
									    				</span>
									    				<span id="answerdownvotes_'.$row->ansid.'" style="padding-left: 10px;">'.
									    					($row->downvotes).'
									    				</span>
									    			</paper-button>

									    			<span class="topAnswerComment" onclick="showCommentDiv(\'commenta_'.$row->ansid.'div\')">Comment</span>

									    			<span class="flex"></span>
									    			<span class="fb-share-button" data-href="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->ansid).'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></span>
									    			<span class="share-btn" onclick="paperToast.open()" data-clipboard-text="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->ansid).'">
									    				<iron-icon icon="link"></iron-icon> Copy Link</span>
									    		</div>';
											?>

										    <div class="ansCommentDiv" id="<?php echo 'commenta_'.$row->ansid.'div'; ?>">
										    	<?php
											    	if($row->comments!=0)
											      	{
											        	foreach($row->comments->result() as $commentdata)
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

											    <?php echo '<div class="ansCommentInput flex-container">';?>
											    <?php echo '<div class="flex-5"><paper-textarea type="text" id="commenta_'.$row->ansid.'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';?>
											    <?php echo '<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('.$row->ansid.');">Comment</paper-button></div>
											    			</div>';?>
											    <?php echo '<p id="errorc_'.$row->ansid.'" style="color:red"></p>';?>
											</div>
										<?php
										echo '</div>';
											}
										}
										?>

							  	<?php
									}
								?>
							</div>

							<a href="<?php echo site_url('Communication/showQuestion?qid='.$qdata->qid) ?>">
								<paper-button class="viewAllBtn">View all answers</paper-button>
							</a>
						</div>
						<div id="rightPanel" class="flex-desktop">
							<h2 class="divHeading">Related Questions</h2>
							<?php
							$i=0;
							foreach ($relatedQuestions as $row) {
								if($i<3){
									if($qid!=$row->qid){
										echo '<paper-card class="questionCard" id="questionCardNo-'.$row->qid.'">
												<div class="card-content">
													<div>
														<a href="'.site_url('Communication/showQuestion?qid='.$row->qid).'"><span class="questionText">'.$row->question.'</span></a>
													</div>
												</div>
												</paper-card>'; 
												$i++;
											}
											}
											else
											{
												break;
											}
										}
							?>
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

	    <script type="text/javascript">
	    $(document).ready(function(){
			//setTimeout(getnotifications, 2000);
			getnotifications();
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

		function updatedownvote(qid)
		{
		  //var qid=$('#qid').val();
		  $.ajax({
			url: '<?php echo site_url('Communication/saveDownvotes'); ?>',
			method: 'POST',
			data: 'qid='+qid,
			success: function(result)
			{
				if(result==0)
					$('#flag-'+qid).addClass("flagged");//style.color="rgb(66,64,64)";
				else
					$('#flag-'+qid).removeClass("flagged");//style.color="#d32f2f";
			}
		  });
		}

		function updateupvoteans(aid)
		{

			// document.getElementById('upvoteansBtn_'+aid).style.backgroundColor='#1976d2';
			// document.getElementById('upvoteansBtn_'+aid).style.color='#FFFFFF';
			var cid=$('#cid').val();
			$.ajax({
				url: '<?php echo site_url('Communication/saveUpvotesAnswer'); ?>',
				method: 'GET',
				data: 'ansid='+aid+'&cid='+cid,
				success: function(result)
				{
				  var text=$('#ansUpvoteBtnText_'+aid).text();
					  if(text==="Upvote")
					  {
						if($('#ansDownvoteBtnText_'+aid).text()==="Downvoted")
						{
							$('#ansDownvoteBtnText_'+aid).text("Downvote");	
						}
						$('#ansUpvoteBtnText_'+aid).text("Upvoted");
						$('#upvoteansBtn_'+aid).addClass("buttonUpvoted");
						$('#upvoteansBtn_'+aid + ' .votesSeperator').addClass('votesSeperatorUpvoted');
						$('#downvoteansBtn_'+aid).removeClass("buttonDownvoted");
						$('#downvoteansBtn_'+aid + ' .votesSeperator').removeClass('votesSeperatorDownvoted');	
					  }
					  else
					  {
						$('#ansUpvoteBtnText_'+aid).text("Upvote");
						$('#upvoteansBtn_'+aid).removeClass("buttonUpvoted");
						$('#upvoteansBtn_'+aid + ' .votesSeperator').removeClass('votesSeperatorUpvoted');
					  }
					  $('#answerupvotes_'+aid).text(result);
					  $.ajax({
						url: '<?php echo site_url('Communication/getDownvotesAnswer'); ?>'+'/'+aid,
						success:function(result)
						{
							$('#answerdownvotes_'+aid).text(result);
						}	
					});
					  //document.getElementById('upvoteansBtn_'+aid).style.backgroundColor='#FFFFFF';
				}
			  });
		}

		function updatedownvoteans(aid)
		{
			// document.getElementById('downvoteansBtn_'+aid).style.backgroundColor='#d32f2f';
			// document.getElementById('downvoteansBtn_'+aid).style.color='#ffffff';
			var cid=$('#cid').val();
			$.ajax({
				url: '<?php echo site_url('Communication/saveDownvotesAnswer'); ?>',
				method: 'GET',
				data: 'ansid='+aid+'&cid='+cid,
				success: function(result)
				{
				  var text=$('#ansDownvoteBtnText_'+aid).text();
						if(text==="Downvote")
						{
							if($('#ansUpvoteBtnText_'+aid).text()==="Upvoted")
							{
								$('#ansUpvoteBtnText_'+aid).text("Upvote");
							}
							$('#ansDownvoteBtnText_'+aid).text("Downvoted");
							$('#upvoteansBtn_'+aid).removeClass("buttonUpvoted");
							$('#upvoteansBtn_'+aid + ' .votesSeperator').removeClass('votesSeperatorUpvoted');
							$('#downvoteansBtn_'+aid).addClass("buttonDownvoted");
							$('#downvoteansBtn_'+aid + ' .votesSeperator').addClass('votesSeperatorDownvoted');	
						}
						else
						{
							$('#ansDownvoteBtnText_'+aid).text("Downvote");
							$('#downvoteansBtn_'+aid).removeClass("buttonDownvoted");
							$('#downvoteansBtn_'+aid + ' .votesSeperator').removeClass('votesSeperatorDownvoted');
						}
						$('#answerdownvotes_'+aid).text(result);
						$.ajax({
						url: '<?php echo site_url('Communication/getUpvotesAnswer'); ?>'+'/'+aid,
						success:function(result)
						{
							$('#answerupvotes_'+aid).text(result);
						}
						});
						//document.getElementById('downvoteansBtn_'+aid).style.backgroundColor='#FFFFFF';	
				}

			});
		}

		function follow()
		{
		  var qid=$('#qid').val();
		  var flag=$('#followBtn').val();
	      var text=$('#followBtn').text();
	      text=text.trim();
	      if(text=="Follow")
	      {
	        flag=1;
	      }
	      else
	      {
	        flag=0;
	      }
			  $.ajax({
			    url: '<?php echo site_url('Communication/updateFollowPreference'); ?>',
			    method: 'POST',
			    data: 'qid='+qid+'&flag='+flag,
			    success:function(result)
			    {
			    	updateupvote(qid);
			      $('#followBtn').val(1-flag);
			      if(flag==1)
			        $('#followBtn').text("Unfollow");
			      else
			        $('#followBtn').text("Follow");
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
		        }
		        else
		        {
		          alert("There is some error");
		        }
		      }
		      });
		  }
		}

		function showCommentsQues(qid)
		{
			$.ajax({
				url:'<?php echo site_url('Communication/getCommentsQuestion');?>'+"/"+qid,
				success:function(response)
				{
					response=JSON.parse(response);
					term="";
					for(var i=0;i<response.length;i++)
					{
						row=response[i];
						term=term+'<div class="comment-row"><span class="comment">'+row.comment+'  -</span><span class="comment-author"><a href="www.scholarfact.com/User/profile/'+row.CID+'">'+row.Display_Name+'</a></span><span class="comment-time"> '+row.cr_dt+'</span></div>';
					}
					term=term+'<div id="commentdiv" class="flex-container"><div class="flex-5"><paper-textarea type="text" id="comment" placeholder="Start writing your comment" required></paper-textarea></div><div class="flex"><paper-button id="commentBtn" onclick="savequescomment()">Comment</paper-button></div></div><p id="errorcq" style="color:red"></p></div>';
					$('#commentqdiv').html("");
					$('#commentqdiv').append(term);
				}
			});
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
						term=term+'<div class="comment-row"><span class="comment">'+row.comment+'  -</span><span class="comment-author"><a href="www.scholarfact.com/User/profile/'+row.CID+'">'+row.Display_Name+'</a></span><span class="comment-time"> '+row.cr_dt+'</span></div>';
					}

					term=term+'<div class="ansCommentInput flex-container">';

					term=term+'<div class="flex-5"><paper-textarea type="text" id="commenta_'+aid+'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';

					term=term+'<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('+aid+');">Comment</paper-button></div></div><p id="errorc_'+aid+'" style="color:red"></p></div></div>';
					$('#commenta_'+aid+'div').html("");
					$('#commenta_'+aid+'div').append(term);
				}
			});
		}

		function showCommentDiv(id){
			$("#" + id).toggle("fast");
		}

		function showAnswerInput(){
			$("#answerInputDiv").toggle("fast");
		}


		$(document).ready()
		{
			new Clipboard('.share-btn');
			getvotestatus();
			<?php if($this->session->is_logged_in!=0){ ?>
			  var qid=$('#qid').val();
			  $.ajax({
			    url: '<?php echo site_url('Communication/getFollowPreference'); ?>',
			    method: 'POST',
			    data: 'qid='+qid,
			    success:function(result)
			    {
			      if(result==1)
			      {
			        $('#followBtn').val(1-result);
			        $('#followBtn').text("Unfollow");
			      }
			      else if(result==0)
			      {
	            $('#followBtn').val(1-result);
			        $('#followBtn').text("Follow");
			      }
			    }
			  });
			   <?php } ?>
		}

		function saveAnswer()
		{
		  var answerData=$('#answer').val();
		  if(answerData==="")
		  {
		    $("#ansp").text("Answer cannot be blank");
		  }
		  else
		  {
		    $("#ansp").text("");
		    var qid=$('#quesid').val();
		    var cid=$('#userid').val();
		    $('#answerform').submit();
		  }
		}
		function getvotestatus()
		{
			var elements=document.getElementsByClassName('ansUpvoteBtn');
			for(i=0;i<elements.length;i++)
			{
				var id=$(elements[i]).attr("id");
				var id_length=id.length;
				var ansid=id.substring(13,id_length);
				$.ajax(
					{
						url:'<?php echo site_url('Communication/getVotedUserAnswer');?>'+'/'+ansid,
						success:function(result)
						{
							if(result==1)
							{
								$('#upvoteansBtn_'+ansid).addClass("buttonUpvoted");
								$('#upvoteansBtn_'+ansid + ' .votesSeperator').addClass('votesSeperatorUpvoted');
								$('#ansUpvoteBtnText_'+ansid).text("Upvoted");
							}
							else if(result==0)
							{
								$('#downvoteansBtn_'+ansid).addClass("buttonDownvoted");
								$('#downvoteansBtn_'+ansid + ' .votesSeperator').addClass('votesSeperatorDownvoted');
								$('#ansDownvoteBtnText_'+ansid).text("Downvoted");
							}
							else
							{
								$('#upvoteansBtn_'+ansid).removeClass("buttonUpvoted");
								$('#upvoteansBtn_'+ansid + ' .votesSeperator').removeClass('votesSeperatorUpvoted');
								$('#downvoteansBtn_'+ansid).removeClass("buttonDownvoted");
								$('#downvoteansBtn_'+ansid + ' .votesSeperator').removeClass('votesSeperatorDownvoted');
							}
						}  
					});
			}
			var qid=$('#qid').val();
			$.ajax(
				{
					url:'<?php echo site_url('Communication/getVotedUser');?>',
					method: 'POST',
					data: 'qid='+qid,
					success:function(result)
					{
						if(result==0)
						{
							$('#flag-'+qid).addClass("flagged");
						}
					}
				});
		}

		function openImageOverlay(image){
			document.getElementsByClassName("popup-image")[0].src = image.src;
			//added a time delay to nullify the click event.
			setTimeout(function(){
				document.getElementById("imageOverlay").style.width = "100%";
			},100);
			//prevent vertical scrolling while image is open
			document.body.style.height = "100vh";
			document.body.style.overflow = "hidden";
		}

		function closeImageOverlay(){
			document.getElementById("imageOverlay").style.width = "0px";
			document.body.style.height = "auto";
			document.body.style.overflow = "auto";
		}

		jQuery(document).on("click", function(e) {
		    var $clicked = $(e.target);

		    if(! $clicked.hasClass("popup-image")){
		    	if(jQuery("#imageOverlay").css("width") != "0px"){
		    		closeImageOverlay();
		    	}
		    }
		});

		</script>
	</body>
</html>