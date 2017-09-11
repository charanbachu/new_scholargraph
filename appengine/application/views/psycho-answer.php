<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MyGraph-Questions</title>
        <meta content="text/html" charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- For polyfill support across non-compatible browsers-->
        <script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

        <!--importing vulcanized polymer dependencies-->
        <link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports-vulc.html'?>">
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icons/home-icon.png'?>"/>
        <!-- common css for header, footer, sidebar, etc. -->
        <link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">

        <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url();?>js/clipboard.js"></script>



        <style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
            body {
                -webkit-font-smoothing: antialiased;
            }
            .cat-items {
                font-weight: 400;
                padding: 10px;
                padding-left: 20px;
            }
            #container > div{
                margin: 10px auto;
                width: 80%;
            }
            .newPsy {
                width: 90%;
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
                .cat-items {
                    padding-left: 0px;
                    text-align: center;
                    display: flex;
                }
            }
            paper-card.question{
              width: 100%;
              min-width: 300px;
              position: relative;
              background: white;
              z-index: 1;
            }
            .cdFlt {
                display: flex; 
                flex-direction: column; 
                width: 96%; 
                padding: 0px 0px 10px 0px; 
                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
            }
            .nme {
                padding: 10px 0px; 
                padding-top: 10px; 
                display: flex; 
                font-size: 15px; 
                font-weight: 400; 
                background-color: #f9f9f9; 
                color: #009688; 
                justify-content: flex-start; 
                padding-left: 15px; 
                align-items: center;
            }
            .cdFl {
                display: flex; 
                flex-direction: column; 
                width: 96%; 
                padding: 10px 8px 10px 8px; 
                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
            }
            .card-content{
              background-color: #fff;
              margin: 0px;
              padding: 20px;
              padding-top: 10px;
              padding-right: 15px;
              padding-bottom: 15px;
              color: #595959;
              display: flex;
              align-items: center;
              justify-content: center;
            }
             #subheading{
              margin-top: 10%;
              font-size: 18px;
              font-weight: 500;
            }
            .card-actions{
              height: auto;
              margin: 0%;
              margin-top: 5px;
              margin-bottom: 5px;
              padding-right: 5px;
              padding-left: 5px;
            }
            #ans_radio{
              width: 100%;
              @apply(--layout-horizontal);
              display: inline;
            }
            .percentage {
                color: #999;
                font-weight: bold;
                position: relative;
                float: right;
                z-index: 2;
                margin-top: 1px;
            }
            .answer-radio {
                float: left;
                position: relative;
                z-index: 2;
                margin-top: 1px;
            }
            .radioAction{
              margin: 5px;
              -webkit-transition: background 2s;
              transition: background 2s;
              width: 94%;
              color: #333;
              background: white;
              padding: 6px;
              padding-top: 3px;
              position: relative;
              height: 17px;
            }
            #leftPanel{
                padding-top: 45px;
            }
            #filterHeading{
                width: 90%;
                margin: 0 auto;
                line-height: 48px;
                font-weight: 500;
                font-size: 14px;
                letter-spacing: 0.018em;
                text-rendering: optimizeLegibility;
            }
            #collegeFilters{
                color : #595959;
                width: 100%;
                margin-top: 0px;
                display: block;
                margin: 0 auto;
            }
            .mgtop {
                margin-top: 10px;
            }
            #closeFilter{
                display: none;
            }
            #mobileBottomBar{
                display: none;
            }
            .mobile-bottom-bar div{
                position: relative;
                cursor: pointer;
                padding: 15px 0;
            }
            .applyBar{
                display: none;
            }
            .questions-heading
            {
                font-size: 150%;
                font-weight: 500;
                color: #009688;
                padding-right: 10%;
            }
            #nextCheckButton{
            display: none;
            color: white;
            background-color: #009688;
            /*margin-top: -20px;*/
            }
            .stly {
                margin-top: 10px; 
                display: flex; 
                font-size: 14px; 
                font-weight: 400; 
                color: #595959; 
                justify-content: center; 
                align-items: center;
            }
            @media only screen and (max-width: 640px){
                paper-card{
                display:block;
                margin: 0 auto;
                width: 80%;
                }
                .newPsy {
                    width: 90%;
                 }
                paper-dropdown-menu.custom /deep/ #menuButton {
                    width: 90%;
                }
                .mgtop {
                    margin-top: 2px;
                }
                .stly {
                    margin-top: 0px;
                }
                #collegeFilters {
                    padding-top: 0px;
                }
                .cdfl {
                    padding: 0px 5px 5px 3px;
                }
                #nextCheckButton{
                display: block;
                color: white;
                background-color: #009688;
                width: 90px;
                margin-left: 70%;
                /*margin-top: -20px;*/
                }
                .questions-heading
                {
                    font-size: 150%;
                    font-weight: 500;
                    color: #009688;
                    padding-right: 10%;
                }
                #collegeFilters{
                    padding-top: 48px;
                    padding-bottom: 60px;
                    padding-left: 40px;
                }
                #filterHeading{
                    padding: 0 5%;
                    background-color: var(--main-color);
                    color: white;
                    position: fixed;
                    width: 100%;
                    z-index: 1;
                    display: table;
                }
                #closeFilter{
                    display: inline-flex;
                }
                #mobileBottomBar{
                    display: block;
                }
                .mobile-bottom-bar{
                    display: flex;
                    position: fixed;
                    bottom: 0;
                    left: 0;
                    width: 100vw;
                    background-color: var(--main-color);
                    color: white;
                    z-index: 5;
                    text-align: center;
                }
                .applyBar{
                    display: block;
                    position: fixed;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    text-align: center;
                    background-color: var(--main-color);
                    color: white;
                    padding: 15px 0;
                    font-size: 16px;
                    line-height: 16px;
                }
                #readTabs{
                    display: flex;
                }
                #leftPanel{
                    display: none;
                    padding: 0;
                    position: fixed;
                    width: 100%;
                    z-index: 5;
                    background-color: white;
                    overflow: auto;
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
            .bottom-bar{
                border-top: 1px solid rgba(0,0,0,0.14);
                @apply(--layout-horizontal);
                /*background-color: #f44336;*/
            }
            .bottom-bar div{
                display: inline-block;
                @apply(--layout-flex);
                padding: 10px;
            }
            .bottom-bar div:nth-child(2){
                @apply(--layout-flex-2);
            }
            .abs {
                --paper-tabs-selection-bar-color: #009688;
            }
            .clr {
              --iron-icon-width: 20px;
              --iron-icon-height: 20px;
              --iron-icon-fill-color: #ccc;
            }
            .cbox {
                --paper-checkbox-label-color: #889696;
                --paper-checkbox-label-spacing: 10px;
                --paper-checkbox-unchecked-color: #C7C1CC;
                --paper-checkbox-size: 15px;
            }
            .hd5:hover {
                cursor: pointer;
            }
            .search {
              position: relative;
              color: #aaa;
              font-size: 16px;
            }
            .search input {
              width: 100%;
              height: 32px;
              background: #fff;
              border: 1px solid #ccc;
              border-radius: 2px;
            }
            .search input { text-indent: 36px;}
            .search .srch { 
              position: absolute;
              top: 6px;
              left: 10px;
            }
            input {
                font-family: inherit;
                font-size: 17px;
            }
            .question {
                display: flex;
            }
            .qbar {
                background-color: white;
                border: 2px solid #f2f2f2;
                align-self: center; 
                border-top: 1px solid #fff;
                border-bottom: 1px solid #fff;
                padding-left: 30px;
                padding-right: 30px;
                padding-bottom: 15px;
                padding-top: 15px;
            }
            .analys {
                font-size: 16px; 
                font-weight: 500; 
                padding: 9px; color: #009688; 
                justify-content: center;
                align-items: center; 
                display: none;
                margin-right: 20px; 
                margin-bottom: 10px;
            }
            .cont {
                font-size: 13px;
                font-weight: 400; 
                text-align: left; 
                color: #595959; 
            }
            .contbx {
                margin-top: 10px; 
                margin-bottom: 10px; 
                font-size: 13px; 
                font-weight: 400; 
                text-align: left; 
                color: #595959; 
            }
            .qresp {
                font-size: 15px;
                font-weight: 500;
            }
            .presp {
                color:#505A57; 
                font-weight: 400; 
                font-size: 14px; 
                padding-left: 5px; 
            }
            .presp2 {
                color:#029681; 
                font-weight: 400; 
                font-size: 14px; 
                padding-left: 5px;
            }
            .perc {
                color:#029681; 
                font-weight: 400; 
                font-size: 14px;
            }
            .perc2 {
                color:black; 
                font-weight: 400; 
                font-size: 14px;
            }
            .bardiv {
                display: flex; 
                margin-top: 10px;
                margin-bottom: 5px;
            }
            #midPanel {
                margin-top: 0px; 
                margin-left: 10px;
            }
            #msg {
                display: flex; 
                flex-direction: column; 
                padding: 12px; 
                color: #fff; 
                background-color: #1e88e5; 
                margin-bottom: 10px; 
                border: 2px solid #1F84DD;
                box-shadow: 0 3px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
            }
            .msgHead {
                margin-bottom: 12px; 
                font-size: 18px; 
                margin-top: 7px;
                font-weight: 500;
            }
            .msgBody {
                margin-top: 0px; 
                margin-bottom: 5px; 
                font-size: 16px;
            }
            .msgClose {
                margin-top: 0px; 
                display: flex; 
                justify-content: flex-end; 
                cursor: pointer;
                font-weight: 500;
            }
            @media only screen and (max-width: 910px){
                .qbar {
                    background-color: white;
                    border: 2px solid #ccc;
                    align-self: center; 
                    border-top: 1px solid #fff;
                    border-bottom: 1px solid #fff;
                    padding-left: 20px;
                    padding-right: 20px;
                    padding-bottom: 5px;
                    padding-top: 5px;
                }
                .cont {
                    font-size: 13px;
                }
                .qresp {
                    font-size: 15px;
                }
                .presp {
                    font-size: 14px;
                }
                .presp2 {
                    font-size: 14px;
                }
                .perc {
                    font-size: 14px;
                }
                .perc2 {
                    color:black; 
                    font-weight: 400; 
                    font-size: 14px;
                }
            }
            #loginButton {
                display: none;
            }
            @media only screen and (max-width: 768px){
                .question {
                    flex-direction: column;
                }
                .asty {
                    width: 86%;
                }
                paper-input {
                  --paper-input-container: {
                        position: fixed;
                        left: 45;
                        width: 78%;
                  };
                } 
                paper-input {
                      position: fixed;
                      left: 45;
                      width: 78%;
                }
                #loginButton {
                    display: block;
                }
                #midPanel {
                    margin-top: 0px; 
                    margin-left: 0px;
                }
                .bardiv {
                    display: none;
                }
                .qresp {
                    margin-top: 10px;
                }
                #leftPanel {
                    display: none;
                }
                .contbx {
                    font-size: 13px;
                    margin-left: 15px;
                    margin-right: 5px;
                }
                .qresp {
                    font-size: 15px;
                }
                #collegeFilters {
                    padding-top: 15px;
                    padding-bottom: 0px;
                    padding-left: 0px;
                }
                #filterHeading {
                    display: none;
                }
                .radioAction{
                  margin: 5px;
                  -webkit-transition: background 2s;
                  transition: background 2s;
                  width: 96.5%;
                  color: #333;
                  background: white;
                  padding: 6px;
                  padding-top: 5px;
                  position: relative;
                  height: 17px;
                }
                .card-actions{
                  height: auto;
                  cursor: pointer;
                  margin: 0%;
                  margin-top: 0px;
                  border-top: 1px solid #fff;
                  padding: 0px 16px;
                  margin-bottom: 0px;
                  padding-right: 5px;
                  padding-left: 5px;
                }
                .qbar {
                    background-color: white;
                    border: 2px solid #fff;
                    align-self: center; 
                    border-top: 1px solid #fff;
                    border-bottom: 1px solid #fff;
                    padding: 0px;
                    margin-top: 20px;
                    width: 96%;
                }
                #leftPanel {
                    width: 95%;
                }
                #filterHeading{
                }
                .cdFlt {
                    display: flex; 
                    flex-direction: column; 
                    width: 95%;
                    margin-right: 2.5%;
                    padding: 0px 0px 20px 0px; 
                    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
                }
                .cdfl {
                    padding: 0px 5px 16px 3px; 
                }
                .nme {
                    background-color: #fff;
                    padding-bottom: 5px;
                }
                #nextCheckButton{
                    display: block;
                    color: white;
                    background-color: #009688;
                    width: 105px;
                    margin-left: 60%;
                    /*margin-top: -20px;*/
                }
                .card-content {
                    margin-top: 20px;
                    justify-content: center;
                }
                .ana {
                    display: none;
                }
                .analys {
                    display: flex;
                    font-size: 16px; 
                    font-weight: 500; 
                    padding: 9px; color: #009688; 
                    justify-content: center;
                    align-items: center; 
                    margin-top: 2px;
                    margin-right: 10px; 
                    margin-bottom: 10px;
                }
                #filterHeading{
                    padding: 0px 10px 0px 10px;
                    background-color: #fff;
                    color: white;
                    position: fixed;
                    width: 100%;
                    z-index: 1;
                    line-height: 22px;
                    display: table;
                }
                .cont {
                    display: none;
                }
            }
            .custom2 {
                width: 190px;
                max-height: 300px;
            }
            @media only screen and (max-width: 1300px){
                .custom2 {
                    width: 180px;
                }
            }
            @media only screen and (max-width: 1200px){
                .custom2 {
                    width: 180px;
                }
            }
            @media only screen and (max-width: 1024px){
                .custom2 {
                    width: 155px;
                }
            }
            @media only screen and (max-width: 900px){
                .custom2 {
                    width: 140px;
                }
            }
            @media only screen and (max-width: 800px){
                .custom2 {
                    width: 125px;
                }
            }
            @media only screen and (max-width: 640px){
                .cdfl {
                    padding: 0px 5px 5px 3px;
                }
                .cat-items {
                   padding-left: 10px;
               }
                .custom2 {
                    width: 330px;
                    max-height: 160px;
                }
                .cdFlt {
                    padding: 0px;
                }
                paper-dropdown-menu.custom /deep/ #menuButton {
                    width: 90%;
                    margin-bottom: 2px;
                }
                .msgHead {
                    margin-bottom: 12px; 
                    font-size: 17px; 
                    margin-top: 7px;
                    font-weight: 500;
                }
                .msgBody {
                    margin-top: 0px; 
                    margin-bottom: 5px; 
                    font-size: 15px;
                }
                .msgClose {
                    margin-top: 0px;
                    font-size: 16px;
                    display: flex;
                    justify-content: flex-end;
                    cursor: pointer;
                }
            }
            @media only screen and (max-width: 500px){
                .qresp {
                    font-size: 15px;
                }
                #leftpanel {
                    position: fixed;
                    bottom: 60;
                }
                .radioAction{
                  margin: 5px;
                  -webkit-transition: background 2s;
                  transition: background 2s;
                  width: 93.5%;
                  color: #333;
                  background: white;
                  padding: 6px;
                  padding-top: 5px;
                  position: relative;
                  height: 17px;
                }
                .analys {
                    font-size: 13px;
                    margin-right: 10px; 
                    margin-bottom: 10px;
                }
                .contbx {
                    font-size: 13px;
                    margin-left: 15px;
                    margin-right: 5px;
                }
            }
            @media only screen and (max-width: 380px){
                .custom2 {
                    width: 285px;
                }
            }
            @media only screen and (max-width: 340px){
                .cdFlt {
                    padding: 0px;
                }
                .custom2 {
                    width: 255px;
                }
                .cdfl {
                    padding: 0px 5px 5px 3px;
                }
                #collegeFilters {
                    padding-top: 10px;
                }
                .mgtop {
                    margin-top: 10px;
                }
            }
            paper-dropdown-menu {
                --paper-menu-button: {
                    display: none;
                };
            }
            
            paper-dropdown-menu.custom {
                --paper-input-container-label: {
                  color: #009688;
                  text-align: left;
                  margin-left: 8px;
                  font-weight: 400;
                  font-size: 14px;
            };
            --paper-input-container-input: {
                  color: #333;
                  text-align: left;
                  margin-left: 9px;
                  font-weight: 400;
                  font-size: 14px;
            }
            /* no underline */
            --paper-input-container-underline: {
                  display: block;
            };
            --paper-input-container-color: #ddd;
          }
          .searchItem {
                text-decoration: none;
                padding: 7px 15px;
                color: #595959;
                font-size: 14px;
                text-transform: capitalize;
            }
            .searchItem:focus {
                outline-style: none;
                background-color: lightgrey;
            }
            .searchItem:hover ,.searchItemCountry:hover {
                background-color: lightgrey;
            }
            .results {
                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
                max-height: 220px;
                max-width: 100%;
                overflow-x: auto;
                overflow-y: auto;
            }
             :root {
                --paper-input-container-underline: {
                    display: block;
                };
                --paper-input-container-color: red;
                --paper-input-container-underline-focus: {
                    display: block;
                };
                --paper-input-container-underline-disabled: {
                    display: block;
                };
                --paper-input-container.custom {
                    --paper-input-container-color: #009688;
                    --paper-input-container-font-weight: 500;
                };
             }
             ul.tagit {
                background: inherit;
            }
            ul.tagit {
                padding: 4px 5px;
                overflow-x: auto;
                margin-left: inherit;
                margin-right: inherit;
            }
            ul.tagit li.tagit-choice {
                -moz-border-radius: 6px;
                border-radius: 6px;
                -webkit-border-radius: 6px;
                border: 1px solid #fedcec;
                background: none;
                background-color: #fedcec;
                font-weight: normal;
            }
            ul.tagit li.tagit-choice .tagit-label:not(a) {
                color: #555;
                font-size: 0.8em;
            }
            ul.tagit li {
                display: block;
                float: left;
                margin: 2px 5px 2px 0;
            }
            ul.tagit li.tagit-choice-editable {
                padding: .2em 18px .2em .5em;
            }
            a {
                color: #595959;
            }
            a:hover {
                text-decoration: none;
            }
            .outsty {
                display: flex;
                align-items: center;
                height: 40px;
            }
            .outsty a {
                color: #595959;
            }
            .iron-selected {
              background: #ddd;
              color: #009688 !important;
            }
            .asty {
                width: 86%;
            }
            #schoolIcon {
                margin-left: 10px;
            }
            #loginButton {
                cursor: pointer;
            }
            .logBtn {
                display: flex; 
                margin-left: 70%; 
                margin-top: 0px;
            }
            #loginButton {
                margin-top: 0px;
            }
            .listOptions {
                width: 100%;
                margin: 0 auto;
                color: #595959;
                margin-top: 7px;
                font-size: 14px;
                min-height: 50px;
                max-height: 300px;
                font-weight: 400;
                overflow: auto;
                cursor: pointer;
            }
            :root {
                --paper-input-container-width: 130%;
            }
            .paper-input-container-2 {
                display: block;
                padding: 8px 0;
                width: 130%;
                position: relative;
                left: -30px;
            }
        </style>
        
        <script>
	        function fadeOut() {
             var pos = 2;
             $.ajax({
                type: "post",
                url: "/main/disable_visit_bit",
                cache: false,
                data:{ pos: pos},
                success: function(response){
                    $("#msg").fadeOut(500, function(){
                    $("#msg").remove();
                    });
                },
                error: function(){
                    alert('Error while request..');
                }
                });
	 	 	
			}

        </script>
        <script>
            document.addEventListener('WebComponentsReady', function () {
                var loaderWrapper = document.getElementById("loader-wrapper");
                loaderWrapper.style.opacity = "0";
                setTimeout(function(){
                    loaderWrapper.style.display = "none";
                },300);
                var template = document.querySelector('template[is="dom-bind"]');
                template.name_selection = '<?php echo $sel_name; ?>'; // selected is an index by default
                template.con_selection = '<?php echo $sel_country; ?>'; // selected is an index by default
                template.stream_selection = '<?php echo $sel_stream; ?>'; // selected is an index by default
                template.degree_selection = '<?php echo $sel_degree; ?>'; // selected is an index by default
                template.major_selection = '<?php echo $sel_major; ?>'; // selected is an index by default
            });
            function myFunc() {
                document.getElementById('nodename').style.display = 'block';
            }
            function myFunc2() {
                document.getElementById('nodename2').style.display = 'block';
            }
            function myFunc3() {
                document.getElementById('nodename3').style.display = 'block';
            }
            function myFunc4() {
                document.getElementById('nodename4').style.display = 'block';
            }
            function myFunc5() {
                document.getElementById('nodename5').style.display = 'block';
            }
            $(document).mouseup(function (e) {
                var container = $(".results");
                if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
                {
                    container.hide();
                }
            });
            function myFct() {
                // var h1 = document.getElementById("vert");
                // alert(h1);
                // var att = document.createAttribute("abc");
                // att.value = "democlass";
                // h1.setAttributeNode(att);
                //document.getElementById("vert").setAttribute('vertical-align', 'bottom');
                document.getElementById("vert2").setAttribute('vertical-align', 'bottom');
            }
        </script>
        <script>
        $(document).ready(function(){
            if ($(window).width() < 514) {
                //alert('Hello');
            }
        });
        </script>
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
            <?php include "common_components/psycho-struct.php" ?>
            <app-drawer>
                <?php include "common_components/app-drawer.php" ?>
            </app-drawer>

            <app-header-layout>
                <app-header fixed effects="waterfall">
                    <?php include "common_components/app-headerp.php" ?>
                </app-header>
                <div id="container" class="flex-container-desktop">
                        <?php include "common_components/question-fab.php" ?>
                        <template is="dom-bind">
                        <div class="flex-container" style="margin-top: 0px;">
                            <div id="mobileBottomBar">
                                    <div class="mobile-bottom-bar flex-container" style="width:100%">
                                        <div class="flex" onclick="openFilter(); myFct();">
                                            <paper-ripple></paper-ripple>
                                            <iron-icon icon="filter-list"></iron-icon> Filters
                                        </div>
                                    </div>
                                    <div class="mobile-bottom-bar flex-container"></div>
                            </div>
                            <div id="leftPanel" class="flex" style="padding-right: 0px;">
                            <div>
                            <paper-card class="cdFlt">
                                <h2 id="filterHeading" style="width: 100%; line-height: 22px;">
                                        
                                        <span style="display: table-cell; text-align: center;" onclick="closeFilter()">
                                            <paper-ripple></paper-ripple>
                                            <iron-icon icon="close" id="closeFilter"></iron-icon>
                                        </span>
                                </h2>
                                <div id="collegeFilters" class="filterName" aria-expanded$="[[isExpanded()]]" aria-controls="State-div" onclick="toggle('#State-div')">
                                <div class="custom nme" >NAME</div>
                                </div>
                                <iron-collapse id="State-div" opened="{{}}">
                                    <div class="listOptions" id='stream'>

                                    <iron-selector id="psycho_names" attr-for-selected="name" selected="{{name_selection}}">
                                       
                                     
                                        <div class="outsty" id="Cat-Academics" name = <?php echo $Node_Name[0] ?>><iron-icon id="schoolIcon" icon="social:school"></iron-icon><a class="asty" id="acad" onclick="getQuestions()">
                                        <div class="cat-items" id= <?php echo $Node_Name[0] ?> >Academics</div></a></div>
                                        <div class="outsty" id="Cat-Admissions" name = <?php echo $Node_Name[1] ?> ><iron-icon id="schoolIcon" icon="icons:class"></iron-icon><a class="asty" id="adm" onclick="getQuestions()">
                                        <div class="cat-items" id= <?php echo $Node_Name[1] ?> >Admissions</div></a></div>
                                        <div class="outsty" id="Cat-FeeStructure" name = <?php echo $Node_Name[2] ?> ><iron-icon id="schoolIcon" icon="icons:account-balance-wallet"></iron-icon><a class="asty" id="feest" onclick="getQuestions()">
                                        <div class="cat-items" id= <?php echo $Node_Name[2] ?> >Fee Structure</div></a></div>
                                        <div class="outsty" id="Cat-Financial" name = <?php echo $Node_Name[3] ?> ><iron-icon id="schoolIcon" icon="social:school"></iron-icon><a class="asty" id="finance" onclick="getQuestions()">
                                        <div class="cat-items" id= <?php echo $Node_Name[3] ?> > Financial Aid</div></a></div>
                                        <div class="outsty" id="Cat-Placements" name = <?php echo $Node_Name[4] ?> ><iron-icon id="schoolIcon" icon="icons:account-balance-wallet"></iron-icon><a class="asty" id="place" onclick="getQuestions()">
                                        <div class="cat-items" id= <?php echo $Node_Name[4] ?> >Placements</div></a></div>
                                    </iron-selector>
                                    </div>
                                    
                                </iron-collapse>
                                <paper-button id="nextCheckButton" class="one" onclick= "closeFilter()" style = "background-color:#009688; display: none; ">Submit <iron-icon icon="arrow-forward"></iron-icon></paper-button>
                                </paper-card>
                                </div>
                                <div class="mgtop">
                                <paper-card class="cdFl">
                                <h2 id="filterHeading" style="width: 100%; line-height: 22px;">
                                        <span style="display: table-cell; text-align: center;" onclick="closeFilter()">
                                            <paper-ripple></paper-ripple>
                                            <iron-icon icon="close" id="closeFilter"></iron-icon>
                                        </span>
                                </h2>

                                <div id="collegeFilters">
                                    
                                    <paper-dropdown-menu label="COUNTRY"  class="custom stly" >
                                        <paper-listbox  attr-for-selected="value" selected="{{con_selection}}" class="dropdown-content custom2" >
                                         <?php
                                        for($i=0;$i<sizeof($Country);$i++)
                                        {
                                             
                                             echo '<paper-item style="color: #333; font-size: 15px; font-weight: 400;" onclick ="getQuestions()" value='.$Country[$i].'>'.$Country[$i].'</paper-item>';
                                        }
                                        ?>
                                        </paper-listbox>
                                    </paper-dropdown-menu>
                                        <paper-dropdown-menu label="STREAM"  class="custom stly" >
                                        <paper-listbox   attr-for-selected="value" selected="{{stream_selection}}" class="dropdown-content custom2" >
                                         <?php
                                        for($i=0;$i<sizeof($Filters['stream']);$i++)
                                        {
                                            echo '<paper-item style="color: #333; font-size: 15px; font-weight: 400;" onclick ="getQuestions()" data-args='.$i.' value = '.$Filters['stream'][$i].'> '.$Filters['stream'][$i].'</paper-item>';
                                        }
                                        ?>
                                        </paper-listbox>
                                    </paper-dropdown-menu>
                                    <paper-dropdown-menu label="DEGREE" id="vert" class="custom stly" >
                                        <paper-listbox   attr-for-selected="value" selected="{{degree_selection}}" class="dropdown-content custom2" >
                                         <?php
                                        for($i=0;$i<sizeof($Filters['degree']);$i++)
                                        {
                                            echo '<paper-item style="color: #333; font-size: 15px; font-weight: 400;" onclick ="getQuestions()" data-args='.$i.' value = '.$Filters['degree'][$i].'>'.$Filters['degree'][$i].'</paper-item>';
                                        }
                                        ?>
                                        </paper-listbox>
                                    </paper-dropdown-menu>
                                    <paper-dropdown-menu label="MAJORS" id="vert2" class="custom stly" >
                                        <paper-listbox   attr-for-selected="value" selected="{{major_selection}}" class="dropdown-content custom2" >
                                         <?php
                                        for($i=0;$i<sizeof($Filters['major']);$i++)
                                        {
                                            echo '<paper-item style="color: #333; font-size: 15px; font-weight: 400;" onclick ="getQuestions()" data-args='.$i.' value = '.$Filters['major'][$i].'>'.$Filters['major'][$i].'</paper-item>';
                                        }
                                        ?>
                                        </paper-listbox>
                                    </paper-dropdown-menu>
                                   
                                    <br>

                                    <form id="myForm" method="post" action = "<?php echo base_url().'main/signup_validation';?>">
                                      <input type="hidden" id="name" name = "name" value=[[name_selection]]>
                                      <input type="hidden" id="country" name = "country" value=[[con_selection]]>
                                      <input type="hidden" id="stream" name = "stream" value=[[stream_selection]]>
                                      <input type="hidden" id="degree" name = "degree" value=[[degree_selection]]>
                                      <input type="hidden" id="major" name = "major" value=[[major_selection]]>
                                    </form>
                                </div>
                                <div class="logBtn" onclick = "closeFilter()"><div id="loginButton"  ><paper-ripple></paper-ripple>Submit</div></div>
                                </paper-card>
                                </div>
                            </div>

                            <div id="midPanel" class="flex-4">
                                <div class="bardiv">
                                    <div class="b1 flex-4" style="opacity: 0.4">
                                        <hr style="width: 100%">
                                    </div>
                                    <h1 class="flex-2 questions-heading" style="opacity: 0.5; color: #595959; font-size: 17px;margin-bottom: 10px; text-align: center; padding-right: 0px;">MyGraph Stats</h1>
                                    <div class="b1 flex-4" style="opacity: 0.4">
                                        <hr style="width: 100%">
                                    </div>
                                </div>
                                <?php 
                                $page_visit = $this->session->page_visit;
                                if($page_visit[1] == 1)
                                {
                                    echo '
                                    <div id="msg">
                                        <p class="msgHead">MyGraph:</p>
                                        <p class="msgBody">You can see how your feelings about your college life compares with other students in the same stream in your country. This helps you know your preferences and how that differs from others and makes you unique.</p>
                                        <p id="gotIt" class="msgClose" onclick=fadeOut()>OK. Got it.</p>
                                    </div>';    
                                }
                                
                                ?>
                                <div>
                                    <paper-card style="box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2); border-top: 1px solid rgba(0, 0, 0, 0); margin-bottom: 0px; width: 100%;">
                                        <paper-tabs class="abs" style="display: flex; flex-direction: row;" selected="0" scrollable>
                                            <?php
                                                for($i=0;$i<sizeof($college);$i++)
                                                {
                                                    echo '<paper-tab class="newPsy flex-3"  onclick="getQuestions()" >'.$college[$i].'</paper-tab>';
                                                }
                                            ?>
                                        </paper-tabs>
                                    </paper-card>
                                </div>

                            <div id="psychoQuestions" style="margin-top: 5px;">
                            <?php
                                for($i=0;$i<sizeof($question);$i=$i+1)
                                {
                                    echo '
                                    <div class="row" style="padding-top: 5px; margin-bottom: 0px;">
                                    <div class="row-column flex-desktop">
                                    <paper-card id="dialog" style="box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);" class = "question">
                                        <div class="card-content flex" >
                                            <div id="q_id'.$i.'" class="qresp">'.$question[$i].'</div>
                                        </div>
                                        <div class="flex-3 qbar" id="phd">
                                            <div id="ans_radio">';
                                                for($j=0;$j<sizeof($opt_content[$i]);$j++)
                                                {
                                                    if($answer[$i] == 0)
                                                    {
                                                        echo'<div class = "radioAction"  style="background: linear-gradient(to right, #f6f6f6 0%, #f6f6f6 100%); ">
                                                             <div class="answer-radio" id="opt_id'.$i.$j.'">
                                                            <paper-ripple></paper-ripple><p class="presp">
                                                            '.$opt_content[$i][$j].'</p></div>
                                                            </div>';
                                                    }
                                                    else if($answer[$i] == $j+1)
                                                    {
                                                        echo'<div class = "radioAction"  style="background: linear-gradient(to right,  #73DCCB 0%,#73DCCB '.$percentage[$i][$j].'%,#f6f6f6 '.$percentage[$i][$j].'%,#f6f6f6 100%); ">';
                                                        if($answer[$i] == $j+1) {
                                                             echo '<div class="answer-radio" id="opt_id'.$i.$j.'">
                                                            <paper-ripple></paper-ripple><p class="presp2">
                                                            '.$opt_content[$i][$j].'</p></div>';
                                                                echo'<div class="percentage perc">'.$percentage[$i][$j].'%</div>
                                                                </div>';
                                                            }
                                                    }
                                                    else
                                                    {
                                                         echo'<div class = "radioAction"  style="background: linear-gradient(to right,  #D5CEB1 0%,#D5CEB1 '.$percentage[$i][$j].'%,#f6f6f6 '.$percentage[$i][$j].'%,#f6f6f6 100%); ">
                                                             <div class="answer-radio" id="opt_id'.$i.$j.'">
                                                            <paper-ripple></paper-ripple><p class="presp">
                                                            '.$opt_content[$i][$j].'</p></div>
                                                            <div class="percentage perc2">'.$percentage[$i][$j].'%</div>
                                                            </div>';
                                                    }
                                                }
                                       echo '</div>
                                        </div>
                                        <div class="ask" style="display: flex; flex-direction: column;">
                                        <div class="analys" onclick="toggle(#bx1)" style="align-self: flex-end;">View Analysis</div>
                                            <iron-collapse id="bx1" style="margin-bottom: 0px; font-size: 14px; align-self: center;">
                                                <div id="q_id'.$i.'" class="contbx" style="margin-top: 0px;">'.$coll_content[$i].'</div>
                                            </iron-collapse>
                                        </div>
                                        <div class="card-content flex ana" >
                                            <div id="q_id'.$i.'" class="cont">
                                            '.$user_content[$i].'</div>
                                        </div> 
                                    </paper-card>
                                    </div>
                                     </div>';
                                }
                                // echo print_r($coll_content);
                            ?>
                                </div>
                                <!-- <ul id="tags" onclick="getTags()" class="tagit ui-widget ui-widget-content ui-corner-all">
                                    <li class="tagit-choice ui-widget-content ui-state-default ui-corner-all tagit-choice-editable"><span class="tagit-label">iit</span><a class="tagit-close"><span class="text-icon">×</span><span class="ui-icon ui-icon-close"></span></a><input type="hidden" value="iit" name="tags" class="tagit-hidden-field"></li>
                                </ul> -->


                            </div>


                            </template>
                </div>

                <footer>
                    <?php include "common_components/footer.php" ?>
                </footer>

            </app-header-layout>
        </app-drawer-layout>
        <!-- <script type="text/javascript" src="/assets/js/toolbarSearch.js"></script> -->
        <script type="text/javascript" src="/assets/js/commonScript.js"></script>
        </script>
        <script>
        function toggle(selector) {
            document.querySelector(selector).toggle();
        }
        </script>
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
        <script type="text/javascript">
        function openFilter(){
            document.getElementById("nextCheckButton").style.display = "block";
            document.getElementById("questionFab").style.display = "none";
            document.body.style.height = window.innerHeight;
            document.body.style.overflow = "hidden";
            
            document.getElementById("psychoQuestions").style.display = "none";
            document.getElementById("midPanel").style.display = "none";
            document.getElementById("leftPanel").style.display = "block";
            document.getElementById("leftpanel").style.position = "fixed";
            document.getElementById("leftpanel").style.bottom = "55px";



        }
        function closeFilter(){
            document.getElementById("nextCheckButton").style.display = "none";
            document.getElementById("questionFab").style.display = "block";
            document.body.style.height = "100%";
            document.body.style.overflow = "auto";
            document.getElementById("psychoQuestions").style.display = "block";
            document.getElementById("midPanel").style.display = "block";
            document.getElementById("leftPanel").style.display = "none";


        }
            // selected is an index by default
            function getQuestions()
            {
                setTimeout(function(){
                    var coll_val = document.querySelector('paper-tabs').selected;
                    console.log(document.querySelector('paper-tabs').selected);
                    
                    //console.log(document.getElementById('psycho_names').selectedItem.innerHTML);
                  //  var name = document.getElementById('psycho_names').selectedItem.innerHTML;
                    var name = document.getElementById('myForm').elements[0].value
                    var country = document.getElementById('myForm').elements[1].value;
                    var stream = document.getElementById('myForm').elements[2].value;
                    var degree = document.getElementById('myForm').elements[3].value;
                    var major  = document.getElementById('myForm').elements[4].value;
                    
                    //console.log(document.getElementById('myForm').elements[0].value);
                    console.log(document.getElementById('myForm').elements[0].value);
                    console.log(document.getElementById('myForm').elements[1].value);
                    console.log(document.getElementById('myForm').elements[2].value);
                    console.log(document.getElementById('myForm').elements[3].value);
                    console.log(document.getElementById('myForm').elements[4].value);

                    $.ajax({
                        type: "post",
                        url: "/psychographic/showstats",
                        cache: false,
                        data:{ name: name, country: country, stream: stream, degree: degree, major: major, coll_val: coll_val},
                        success: function(response){
                            $('#psychoQuestions').empty()
                            response = JSON.parse(response);
                            for(var i=0;i < response.question.length;i=i+1)
                            {
                                div = '<div class="row" style="padding-top: 5px; margin-bottom: 0px;"><div class="row-column flex-desktop"><paper-card id="dialog"  class = "question"><div class="card-content flex" > <div class="qresp">'+response.question[i]+'</div></div><div class="flex-3 qbar" id="phd"><div id="ans_radio">';
                                for(var j=0; j<response.option_content[i].length; j++)
                                {
                                    if(response.answer[i] == 0)
                                    {
                                        div = div + '<div class = "radioAction"  style="background: linear-gradient(to right,  #f6f6f6 0%,#f6f6f6 100%);"><div class="answer-radio"><paper-ripple></paper-ripple><p class="presp">'+response.option_content[i][j]+'</p></div></div>';
                                    }
                                    else if(response.answer[i] == j+1)
                                    {
                                        div = div + '<div class = "radioAction"  style="background: linear-gradient(to right,  #73DCCB 0%,#73DCCB '+response.percentage[i][j]+'%,#f6f6f6 '+response.percentage[i][j]+'%,#f6f6f6 100%);"><div class="answer-radio"><paper-ripple></paper-ripple><p class="presp">'+response.option_content[i][j]+'</p></div><div class="percentage perc2">'+response.percentage[i][j]+'%</div></div>';
                                    }
                                    else
                                    {
                                        div = div + '<div class = "radioAction"  style="background: linear-gradient(to right,  #D5CEB1 0%,#D5CEB1 '+response.percentage[i][j]+'%,#f6f6f6 '+response.percentage[i][j]+'%,#f6f6f6 100%);"><div class="answer-radio"><paper-ripple></paper-ripple><p class="presp">'+response.option_content[i][j]+'</p></div><div class="percentage perc2">'+response.percentage[i][j]+'%</div></div>';
                                    }
                                    //document.getElementById("opt_id"+i+j).innerText = response.option_content[i][j];
                                    //console.log(response.option_content[i][j]);
                                }
                                div = div + '</div></div><div class="ask" style="display: flex; flex-direction: column;"><div class="analys" onclick="toggle(#bx2)" style="align-self: flex-end;">View Analysis</div><iron-collapse id="bx2" style="margin-bottom: 0px; font-size: 14px; align-self: center;"><div id="q_id'+i+'"class="contbx" style="margin-top: 0px;">'+response.coll_content[i]+'</div></iron-collapse></div><div class="card-content flex ana" ><div id="q_id'+i+'" class="cont">'+response.user_content[i]+'</div></div> </paper-card></div>';
                                //div = div + '</div></div><div class="card-content flex" >'+response.user_content[i]+'</div></paper-card></div>';
                                div = div + '</div>';
                                $('#psychoQuestions').append(div);
                            }
                        },
                        error: function(){
                            alert('Error while request..');
                        }
                    });
                    },10);
            }
        </script>
    </body>
</html>