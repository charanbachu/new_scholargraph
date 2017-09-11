<?php
	foreach ($questions->result() as $row)
	{
		$qid=$row->qid;
		echo '<paper-card class="questionCard" id="questionCardNo-'.$row->qid.'">
				<div class="card-content">
					<div>
						<a href="'.site_url('Communication/showQuestion?qid='.$row->qid).'"><span class="questionText">'.$row->question.'</span></a>
						<span class="questionEndIcons">
							<span><paper-tooltip position="left">Follow</paper-tooltip><iron-icon icon="social:plus-one" onclick="follow('.$row->qid.')"></iron-icon></span>
							<span><paper-tooltip position="right" style="white-space:nowrap;">Flag as inappropriate</paper-tooltip><iron-icon icon="flag" onclick="updatedownvote('.$row->qid.')"></iron-icon></span>
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
									//$image_file = "gs://hyrize/uploads/answers/".$key->imagename;
									$image_file = "gs://test4114/uploads/answers/".$key->imagename;
									
									$image_url = CloudStorageTools::getImageServingUrl($image_file, $options);

									echo "<div class='topAnswerImg'><img src='".$image_url."' class='img-responsive' style='width:20%;'></div>";
								}
							}
						}
					echo '</div>
					<div class="ansButtonsRow flex-container-desktop">
						<paper-button id="upvoteansBtn_'.$row->answer->ansid.'" class="ansUpvoteBtn" onclick="updateupvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
							<span class="votesSeperator">
								<iron-icon icon="thumb-up" style="font-size: 14px;margin-right: 5px;"></iron-icon>
								<span id="ansUpvoteBtnText_'.$row->answer->ansid.'" class="ansUpvoteBtnText">Upvote</span>
							</span>
							<span id="answerupvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
								($row->answer->upvotes).'
							</span>
						</paper-button>

						<paper-button id="downvoteansBtn_'.$row->answer->ansid.'" class="ansDownvoteBtn" onclick="updatedownvoteans('.$row->answer->ansid.')" value="'.$row->answer->ansid.'">
							<span class="votesSeperator">
								<iron-icon icon="thumb-down" style="font-size: 14px;margin-right: 5px;"></iron-icon>
								<span id="ansDownvoteBtnText_'.$row->answer->ansid.'" class="ansDownvoteBtnText">Downvote</span>
							</span>
							<span id="answerdownvotes_'.$row->answer->ansid.'" style="padding-left: 10px;">'.
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
										<span class="comment-author">'.$commentdata->email.'</span>
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