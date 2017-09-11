<div class="flex-container-desktop">
			    		<span><a href="<?php echo base_url('Main/infopage');?>">About us</a></span>
			    		<span><a href="<?php echo base_url('Main/infopage');?>">Blog</a></span>
			    		<span><a href="<?php echo base_url('Main/infopage');?>">Contact</a></span>
			    		<span><a href="<?php echo  base_url('main/privacypolicy');?>">Privacy Policy</a></span>
			    		<span><a href="<?php echo base_url('Main/infopage');?>">Join us</a></span>
			    		<span><a href="<?php echo base_url('Main/infopage');?>">Terms of use</a></span>
			    		<span class="flex-desktop"></span>
			    		<span>Copyright © ScholarGraph Inc. All Rights Reserved.</span>
		    		</div>

		    		<script>
		      			function getnotifications()
						{
							$.ajax({
								url:'<?php echo site_url('Communication/getNotifications'); ?>',
								success: function(response)
								{
									response=JSON.parse(response);
									$('#notificationCard').empty();
									if(response.length==0)
									{
										div='<div class="notificationItem">No New Notifications</div>';
										$('#notificationCard').append(div);
									}
									else
									{
										$('#notificationCard').append('<div class="markRead notificationItem"><a onclick="read()">Mark all as read</a></div>');
										var i=0;
										for(i=0;i<response.length;i++)
										{
											row=response[i];
											term='<div class="notificationItem">'+row.notification.replace(/\"/g, "")+'</div>';
											$('#notificationCard').append(term);
										}
									}
								}
							});
							//setTimeout(getnotifications, 2000);
						}
		      		</script>
