<?php
if(count($questions) == 0)
	echo $message;
foreach ($questions as $row)
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
			if(!empty($row->answer))
			{
			echo '<div class="card-actions">
				<div>
					<div class="topAnswerAbout" style="display: inline-block;">
						<span class="topAnswerViews">24k Views</span>
					</div>
				</div>';
				echo '<div class="topAnswer" id="topAnswerId-'.$row->ansid.'">
					<span class="topAnswerText">'.$row->answer.'</span>';
				echo '</div>
				<div class="ansButtonsRow flex-container-desktop">
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

					<span class="topAnswerComment" onclick="showCommentDiv(\'topAnswerCommentDiv'.$row->ansid.'\')">Comment</span>

					<span class="flex"></span>
					<span class="fb-share-button" data-href="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->ansid).'" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></span>
					<span class="share-btn" onclick="paperToast.open()" data-clipboard-text="'.site_url("Communication/showQuestionAnswer/".$qid."/".$row->ansid).'">
						<iron-icon icon="link"></iron-icon> Copy Link</span>
				</div>';
			?>
<?php
			echo '</div>';
			}
	echo '</paper-card>';
}
?>