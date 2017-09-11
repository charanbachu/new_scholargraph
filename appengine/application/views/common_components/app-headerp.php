<style>
.tabIco {
    display: none;
}
.logoMob {
    display: none;
}
#toolbarSearchContainer {
     padding-bottom: 0%;
}
@media only screen and (max-width: 640px) {
    .tabIco {
        display: flex; 
        justify-content: center;
        align-items: center;
        width: 96%;
        padding-left: 2%;
    }

    #expandableSearch {
        display: flex !important;
        width: 15%;
        justify-content: flex-end;
    }   
    #notificationWrapper {
        margin-right: 0px !important;
    }
    .notification-card {
        display: none;
    }
    .mbtn {
        display: none;
    }
    .logo {
        display: none;
    }
    .logoMob {
        display: block;
    }
    #toolbar {
        padding-right: 0px;
        padding-left: 0px;
    }
    .toolbh /deep/ .paper-input {
        width: 90%;
    }
    #toolbarSearchContainer {
         padding-bottom: 11%;
    }
}
</style>
<app-toolbar id="toolbar">
                        <paper-icon-button class="mbtn" icon="menu" style="padding: 8px; opacity: 1;" id="menuButton" drawer-toggle></paper-icon-button>
                        <a href="/home"><span class="logo" id="logo"><span id="pre">Scholar</span><span id="post">Graph</span></span></a>
                        <span class="flex" id="helperSpan"></span>
                        <div class="tabIco" id="tabIcon">
                            <div style="display: flex; flex: 7; align-items: center;"><paper-icon-button icon="menu" style="padding: 8px; opacity: 0.64; padding-right: 2px;" id="menuButton" drawer-toggle></paper-icon-button><a href="/home"><span class="logoMob" style="font-size: 22px;" id="logo"><span id="pre">S</span><span id="post">G</span></span></a></div>
                            <a href="/psychographic/answers" style="margin-left: 0px; height: 25px; width: 25px; display: flex; flex: 3; margin-right: 0px; justify-content: center;"><iron-icon class="drawer-icon" icon="assessment"></iron-icon></a>
                            <a href="/college/compare" style="height: 25px; width: 25px; display: flex; flex: 3; margin-right: 0px; justify-content: center;"><iron-icon class="drawer-icon" icon="compare-arrows"></iron-icon></a>
                            <a href="/Communication/Home_Page" style="height: 25px; width: 25px; display: flex; flex: 3; margin-right: 0px; justify-content: center;"><iron-icon class="drawer-icon" icon="question-answer"></iron-icon></a>
                            <div id="expandableSearch" onclick="expandSearch()" style="display: flex; flex: 3; justify-content: center;"><iron-icon icon="search" id="srh" style="color: black; opacity: 0.64; padding-left: 4px; width: 25px; height: 25px;"></iron-icon></div>
                        </div>
                        <div id="toolbarSearchContainer" class="flex" style="margin-right: 0px;">
                            <form id="toolbarSearchForm" action="/search/" method="GET">
                                <div id="toolbarInputWrapper"  style="width: 90%; margin-left: 4.5%;">
                                    <paper-input id="toolbarPaperSearch" class="toolbh" style="width: 92%; padding-left: 0%;" name = "query" label="Search" no-label-float >
                                        <iron-icon icon="search" id="searchPrefix" prefix></iron-icon>
                                        <iron-icon icon="arrow-back" id="backPrefix" prefix onclick="collapseSearch()"></iron-icon>
                                        <iron-icon icon="clear" id="clearSuffix" suffix onclick="collapseSearch()"></iron-icon>
                                    </paper-input>
                                    <paper-card id="ajaxSearchResults2"></paper-card>
                                </div>
                            </form>
                        </div>
                        <a href="/psychographic/answers"  class="toolbarLink"><span>My Graph</span></a>
                        <a href="#" onclick="takeSurvey()" class="toolbarLink" id="contribute"><span>Contribute</span></a>
                        <a href="/Communication/Home_Page" class="toolbarLink"><span>Converse</span></a>
                        <a href="/college/compare" class="toolbarLink"><span>Compare</span></a>
                        <?php
                            if(!empty($mail)){
                                echo '<div class="notification-card" id="notificationWrapper" onclick="displayDropdown(\'notificationCard\');" style="display:none;border-radius: 50%; padding: 10px;">
                                    <paper-ripple></paper-ripple>
                                    <iron-icon class="notification-card" id="notificationIcon" icon="social:notifications"></iron-icon>
                                    <paper-card id="notificationCard" class="notification-card">
                                    </paper-card>
                                </div>';
                            }
                        ?>
                        

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
                                echo '<div id="toolbarAccountIcon" class="account-dropdown" onclick="toggleAccountDropdown()" style="align-items: center; justify-content: center;">
                                        <span class="account-dropdown account-name">'.$firstname.'</span>
                                        <iron-icon icon="arrow-drop-down" class="account-dropdown"></iron-icon><br>
                                        <paper-card id="accountDropdown" class="account-dropdown" style="margin-right: 1%; top: 3pc;">
                                            <a href="'.site_url('user/profile/').'"><div class="accountDropdownItem">My profile</div></a>
                                            <a href="/main/logout"><div class="accountDropdownItem">Log out</div></a>
                                        </paper-card>
                                    </div>';
                            }
                        ?>
                    </app-toolbar>
                    <!-- <a href="#"><div class="accountDropdownItem">Edit profile</div></a> -->