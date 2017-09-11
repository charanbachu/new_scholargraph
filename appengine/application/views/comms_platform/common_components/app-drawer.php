<div style="height: 100%; overflow: auto; background-color:#FFF">
					<a href="/" class="drawer-link"><div class="drawer-item"><iron-icon class="drawer-icon" icon="home"></iron-icon> Home</div></a>
					<a href="/search/" class="drawer-link"><div class="drawer-item"><iron-icon class="drawer-icon" icon="search"></iron-icon> Search</div></a>
					<a href="/Communication/Home_Page" class="drawer-link"><div class="drawer-item"><iron-icon class="drawer-icon" icon="question-answer"></iron-icon> Converse</div></a>
					<a href="/college/compare" class="drawer-link"><div class="drawer-item"><iron-icon class="drawer-icon" icon="compare-arrows"></iron-icon> Compare </div></a>
					<a href="/psychographic/answers" class="drawer-link"><div class="drawer-item"><iron-icon class="drawer-icon" icon="assessment"></iron-icon> PsychoGraph </div></a>
					<?php
    					$this->load->library('session');
						$mail=$this->session->email;
						if(!empty($mail))
			    		{
							echo '<a href="#" onclick="takeSurvey()" class="drawer-link" id="contribute"><div class="drawer-item"><iron-icon class="drawer-icon" icon="create"></iron-icon> Contribute </div></a>';
							echo '<a href="/user/profile/" class="drawer-link"><div class="drawer-item"><iron-icon class="drawer-icon" icon="account-circle"></iron-icon> My account</div></a>';
							echo '<a href="/main/logout/" class="drawer-link"><div class="drawer-item"><iron-icon class="drawer-icon" icon="power-settings-new"></iron-icon> Log Out</div></a>';
						}
						else
						{
							echo '<a href="/main/login/" class="drawer-link"><div class="drawer-item"><iron-icon class="drawer-icon" icon="account-circle"></iron-icon> Login</div></a>';
						}
					?>
				</div>
