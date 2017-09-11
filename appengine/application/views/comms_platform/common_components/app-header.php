<app-toolbar>
		    			<paper-icon-button icon="menu" id="menuButton" drawer-toggle></paper-icon-button>
		    			<a href="/home"><span id="logo"><span id="pre">Scholar</span><span id="post">Graph</span></span></a>
		    			<span class="flex" id="helperSpan"></span>
		    			<div id="toolbarSearchContainer" class="flex">
							<form id="toolbarSearchForm" action="/search/" method="GET">
								<div id="toolbarInputWrapper">
									<paper-input id="toolbarPaperSearch" name = "query" label="Search" no-label-float >
										<iron-icon icon="search" id="searchPrefix" prefix></iron-icon>
										<iron-icon icon="arrow-back" id="backPrefix" prefix onclick="collapseSearch()"></iron-icon>
										<iron-icon icon="clear" id="clearSuffix" suffix onclick="clearSearch()"></iron-icon>
									</paper-input>
									<paper-card id="ajaxSearchResults2"></paper-card>
								</div>
							</form>
						</div>
						<a href="/psychographic/answers"  class="toolbarLink"><span>PsychoGraph</span></a>
						<a href="#" onclick="takeSurvey()" class="toolbarLink" id="contribute"><span>Contribute</span></a>
						<a href="/Communication/Home_Page" class="toolbarLink"><span>Converse</span></a>
						<a href="/college/compare" class="toolbarLink"><span>Compare</span></a>
						<?php
							if(!empty($mail)){
								echo '<div class="notification-card" id="notificationWrapper" onclick="displayDropdown(\'notificationCard\');" style="display:inline-block;border-radius: 50%; padding: 10px;">
									<paper-ripple></paper-ripple>
									<iron-icon class="notification-card" id="notificationIcon" icon="social:notifications"></iron-icon>
						    		<paper-card id="notificationCard" class="notification-card">
						    		</paper-card>
						    	</div>';
				    		}
				    	?>
						<div id="expandableSearch" onclick="expandSearch()"><iron-icon icon="search"></iron-icon></div>
						

						<?php
	    					$this->load->library('session');
							$mail=$this->session->email;
							if(empty($mail))
			    			{
								echo '<a href="/main/login"><div id="loginButton"><paper-ripple></paper-ripple>Sign in</div></a>';
							}
							else{
								$firstname = explode(" ",$this->session->user_name)[0];
								if(strlen($firstname) > 9){
									$firstname = substr($firstname, 0, 6);
									$firstname = $firstname."...";
								}
								echo '<div id="toolbarAccountIcon" class="account-dropdown" onclick="toggleAccountDropdown()">
										<span class="account-dropdown account-name">'.$firstname.'</span>
										<iron-icon icon="arrow-drop-down" class="account-dropdown"></iron-icon><br>
										<paper-card id="accountDropdown" class="account-dropdown">
											<a href="'.site_url('user/profile/').'"><div class="accountDropdownItem">My profile</div></a>
											<a href="'.site_url('/user/edit/').'"><div class="accountDropdownItem">Edit profile</div></a>
											<a href="/main/logout"><div class="accountDropdownItem">Log out</div></a>
										</paper-card>
									</div>';
							}
						?>
		      		</app-toolbar>
