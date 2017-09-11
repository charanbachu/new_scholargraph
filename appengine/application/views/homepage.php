<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ScholarGraph</title>
        <meta content="text/html" charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- For polyfill support across non-compatible browsers-->
        <script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>

        <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icons/home-icon.png'?>"/>
        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">

        <!--importing vulcanized polymer dependencies-->
        <link rel="import" href="<?php echo base_url().'assets/polymer_dependency/polymer-imports-vulc.html'?>">

        <!-- common css for header, footer, sidebar, etc. -->
        <link rel="import" href="<?php echo base_url().'assets/polymer_dependency/shared-css.html'?>">



        <!-- <script type="text/javascript" src="/assets/js/encode_req.js"></script> -->

        <style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
            .main-content> div{
                margin: 10px auto;
                width: 100%;
            }
        body {
            overflow-x: hidden;
        }
        .lay1 {
            display: flex; 
            width: 100%; 
            flex-direction: row; 
            align-items: center; 
            justify-content: center;
        }
        .styling {
            display: flex; 
            justify-content: flex-end;
        }
        .img1 {
            width: 50%;
        }
        .iig {
            width: 70%; 
            height: 680px;
        }
        .txt1 {
            width: 50%; 
            color: #595959;
            padding-right: 30px; 
            padding-left: 30px;
        }
        .lfty {
            color: #595959; 
            margin-left: 50px; 
            margin-right: 50px; 
            text-align: right; 
            margin-bottom: 20px; 
            font-size: 34px;
        }
        .rhty {
            color: #595959; 
            margin-left: 50px; 
            margin-right: 50px; 
            text-align: left; 
            margin-bottom: 20px; 
            font-size: 34px;
        }
            @media only screen and (max-width: 1367px){
                .main-content> div{
                    margin: 10px auto;
                    width: 100%;
                }
            }
            .info-para{
                font-size: 14px;
                font-weight: 400;
                line-height: 20px;
                text-align: justify;
                margin-bottom: 20px;
                @apply(--layout-flex);
                color: #595959; 
                margin-left: 50px; 
                margin-right: 50px; 
                font-size: 16px; 
                font-weight: 300; 
                line-height: 1.34; 
                margin-bottom: 15px;
            }
            app-toolbar{
                background-color: transparent;
            }
            #toolbarSearchContainer{
                display: none;
            }
            .account-name{
                color: white;
                font-weight: 400;
            }
            .get-started{
                text-align: center;
                margin-top: 30px;
                margin-bottom: 0px;
            }
            .get-started paper-button{
                position: relative;
                color: white;
                text-decoration: none;
                line-height: 28px;
                padding: 8px 12px;
                background: var(--main-color);
                background: -moz-linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));
                background: linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr= var(--main-color-gradient-start),endColorstr= var(--main-color-gradient-end),GradientType=0);
                -moz-border-radius: 2px;
                border-radius: 2px;
                border: 1px solid var(--main-color);
                font-weight: 500;
                outline: none;
                font-size: 15px;
                text-transform: capitalize !important;
                text-align: center;
                width: 256px;
            }
            .get-started-inr paper-button{
                position: relative;
                color: white;
                text-decoration: none;
                line-height: 20px;
                padding: 8px 12px;
                background: var(--main-color);
                background: -moz-linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));
                background: linear-gradient(top, var(--main-color-gradient-start), var(--main-color-gradient-end));
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr= var(--main-color-gradient-start),endColorstr= var(--main-color-gradient-end),GradientType=0);
                -moz-border-radius: 2px;
                border-radius: 2px;
                border: 1px solid var(--main-color);
                font-weight: 500;
                outline: none;
                font-size: 15px;
                text-transform: uppercase;
                text-align: center;
                width: 160px;
            }
            .get-started-inr {
                text-align: right; 
                margin-right: 50px;
                margin-top: 20px;
            }
            .info-div{
                margin: 10px 15px;
                margin-top: 50px;
                background-color: var(--main-color-shade-1);
                padding: 30px;
                position: relative;
                @apply(--layout-vertical);
            }
            .info-heading{
                font-size: 28px;
                font-weight: 300;
                margin-bottom: 10px;
            }
            #jumbotron{
                /*background: url("<?php echo base_url().'assets/images/backgrounds/homeBackground.jpg'?>"); *//* For browsers that do not support gradients */
                background: -webkit-linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0), rgba(0,0,0,0.5)); /* For Safari 5.1 to 6.0 */
                background: -o-linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0), rgba(0,0,0,0.5));  /*For Opera 11.1 to 12.0*/
                background: -moz-linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0), rgba(0,0,0,0.5)); /* For Firefox 3.6 to 15 */
                background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0), rgba(0,0,0,0.5)); /* Standard syntax */
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                background-blend-mode: overlay;
                /*background-attachment: fixed;*/
                margin-top: -65px;
                position: relative;
            }
            #jumbotronContent{
                padding-top: 140px;
                text-align: center;
            }
            #backgroundImage{
                position: absolute;
                z-index: -1;
                width: 100%;
                height: 100%;
            }
            #logo{
                display: none;
            }
            #logo #pre{
                font-weight: 300;
                color: black;
            }
            #helperSpan{
                display: flex;
            }
            #toolbarAccountIcon iron-icon{
                color: white;
            }
            #largeLogo{
                font-size: 500%;
            }
            .logo{
                color: white;
                word-spacing: -0.15em;
                /*font-size: 2em;*/
            }
            .logo .pre{
                font-weight: 300;
                color: white;
            }
            .logo .post{
                font-weight: 300;
                color: var(--main-color);
            }
            @media only screen and (max-width: 640px){
                #largeLogo{
                    font-size: 200%;
                }
            }
            #menuButton{
                color: white;
            }
            .toolbarLink{
                color: white;
                font-weight: 400;
            }
            #mainSearchContainer{
                margin-top: 50px;
            }
            #mainSearchForm{
                display: inline-block;
                position: relative;
            }
            #mainInput{
                width: 507px;
                box-sizing: border-box;
                padding: 2px 20px 5px 15px;
                font-size: 19px;
                font-weight: 300;
                line-height: 40px;
                border-radius: 0;
                border: 0;
                outline: 0;
                color: #253a52;
            }
            #searchButton{
                background-color: var(--main-color);
                display: inline-block;
                height: 100%;
                padding-top: 2px;
                padding-bottom: 5px;
                vertical-align: middle;
                width: 70px;
                color: white;
                float: right;
                margin-left: -5px;
                cursor: pointer;
                /*margin-top: -3px;*/
            }
            #ajaxSearchResults{
                position: absolute;
                text-align: left;
                left: 0;
                z-index: 100;
                width: 577px;
                margin-top: 10px;
                max-height: calc(100vh - 64px);
                overflow: auto;
            }
            #expandableSearch{
                display: none;
            }
            #notificationIcon{
                color: white;
            }
            @media only screen and (max-width: 640px){
                #mainInput{
                    width: 307px;
                }
                #ajaxSearchResults{
                    width: 377px
                }
                #loginButton {
                    margin-right: 16px; 
                }
                #toolbar {
                    padding-right: 0px;
                    padding-left: 8px;
                }
            }
            @media only screen and (max-width: 887px){
                #notificationIcon{
                    display: none;
                }
                #loginButton{
                    display: inline-block;
                }
            }
            @media only screen and (min-width: 366px) and (max-width: 480px){
                #mainInput{
                    width: 287px;
                }
                #ajaxSearchResults{
                    width: 357px
                }
            }
            @media only screen and (max-width: 1024px){
                .main-content> div{
                    width: 100%;
                }
                .iig {
                    width: 70%; 
                    height: 550px;
                }
                .info-para {
                    margin-left: 20px;
                    margin-right: 20px;
                }
                .lfty {
                    margin-left: 20px;
                    margin-right: 20px;   
                }
                .rhty {
                    margin-left: 20px;
                    margin-right: 20px;   
                }
            }
             @media only screen and (max-width: 768px){
                .iig {
                    width: 70%; 
                    height: 450px;
                }
             }
            @media only screen and (max-width: 365px){
                #mainInput{
                    width: 237px;
                }
                #ajaxSearchResults{
                    width: 307px;
                }
            }
            @media only screen and (max-width: 600px){
                .lay1 {
                    flex-direction: column;
                }
                .txt1 {
                    width: 95%;
                    padding-right: 0px;
                    padding-left: 0px;
                }
                .img1 {
                    width: 98%;
                }
                .odr {
                    order: 2;
                }
                .get-started-inr paper-button {
                    width: 110px;
                    font-size: 13px;
                }
                .lfty {
                    text-align: center;
                    margin-top: 20px;
                }
                .styling {
                    display: flex; 
                    justify-content: center;
                }
                .rhty {
                    text-align: center;
                    margin-top: 20px;
                }
                .info-heading {
                    font-size: 24px;
                }
                .info-para {
                    font-size: 15px;
                    margin-bottom: 10px;
                }
                .get-started-inr {
                    margin-right: 0px;
                    margin-top: 0px;
                    text-align: center;
                }
                .iig {
                    height: 500px;
                    width: 65%;
                }
            }
            @media only screen and (max-width: 500px){
                .iig {
                    height: 460px;
                    width: 75%;
                }
                .info-heading {
                    font-size: 22px;
                }
                .lay1 {
                    width: 95%;
                    margin-left: 2%;
                }
                .info-para {
                    margin-left: 0px;
                    margin-right: 10px;
                }
            }
            @media only screen and (max-width: 460px){
                .lay1 {
                    width: 96%;
                    margin-left: 2.5%;
                }
            }
            @media only screen and (max-width: 400px){
                .iig {
                    height: 430px;
                    width: 80%;
                }
            }
            #description{
                padding-top: 42px;
                padding-bottom: 28px;
                padding-left: 10px;
                padding-right: 10px;
                color: white;
                max-width: 700px;
                margin: auto;
                text-align: center;
            }
            #description span:nth-child(1){
                font-weight: 200;
                font-size: 26px;
                line-height: 50px;
                color: #fff;
                text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
                cursor: default;
            }
            #description span:nth-child(2){
                font-size: 16px;
                line-height: 1.4em;
                margin-top: 0;
                font-weight: 200;
                text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
            }
            @media only screen and (max-width: 365px){
                #description span:nth-child(1){
                    line-height: 35px;
                }
                #secondaryDescription{
                    position: relative;
                    top: 30px;
                }
            }
            #noAds{
                color: white;
                max-width: 700px;
                margin: auto;
                text-align: center;
                padding: 20px 0;
            }
            #noAds span{
                font-size: 15px;
                line-height: 1.4em;
                margin-top: 0;
                font-weight: 200;
                text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
                color: white;
            }
            #noAds span:hover{
                text-decoration: underline;
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
            .myimg /deep/ #img {
                display: block;
                width: 100%;
                height: auto;
            }
        </style>

        <script>
            $(document).ready(function(){ 
                    if ($(window).width() < 1025) { 
                        var mbtn =  document.getElementsByClassName("mbtn"); 
                        mbtn[0].style.display = "block";
                    } 
            });
            document.addEventListener('WebComponentsReady', function () {
                document.getElementById("tabIcon").style.display = "none";
                document.getElementById("srh").style.display = "none";
                var loaderWrapper = document.getElementById("loader-wrapper");
                loaderWrapper.style.opacity = "0";
                setTimeout(function(){
                    loaderWrapper.style.display = "none";
                },300);
            });
        </script>
    </head>

    <body onload="getTrendingQuestions()" id="bdy">

        <div id="loader-wrapper">
        </div>
        <app-drawer-layout fullbleed responsive-width="1024px">
            <?php include "common_components/psycho-struct.php" ?>
            <app-drawer>
                <?php include "common_components/app-drawer.php" ?>
            </app-drawer>

            <app-header-layout>
                <app-header fixed>
                    <?php include "common_components/app-header.php" ?>
                </app-header>

                <paper-toast id="paperToast" text="Link copied!"></paper-toast>

                <div id="container">

                    <?php include "common_components/question-fab.php" ?>

                    <div id="jumbotron">

                        <iron-image id="backgroundImage" placeholder="data:image/jpeg;base64,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" sizing="cover" preload fade src="<?php echo base_url().'assets/images/backgrounds/homeBackground-new.jpg'?>"></iron-image>

                        <div id="jumbotronContent">
                            <div class="logo" id="largeLogo"><span class="pre">Scholar</span><span class="post">Graph</span></div>
                             
                            <div id="mainSearchContainer">

                                <form id="mainSearchForm" action="/search/" method="GET">
                                    <div id="inputWrapper">
                                        <input id="mainInput" name="query" autocomplete="off">
                                        <div id="searchButton" onclick="submitForm('mainSearchForm')"><paper-icon-button icon="search" onclick="stopNsearch('mainSearchForm')"></paper-icon-button></div>
                                        <br>
                                        <paper-card  id="ajaxSearchResults"><div> </div></paper-card>
                                    </div>
                                </form>
                            </div>
                            <div id="description">
                                <span id="mainDescription">Connecting Students & Colleges </span><br>
                                <span id="secondaryDescription">Join Scholargraph to know more about yourself and your college life. Help make the educational experience and culture at your college transparent for everyone and enriching for yourself.</span><br></span>
                            </div>
                            <div id="noAds">
                                <a href="<?php echo site_url('Main/infopage');?>"><span>Why we will never sell Ads?</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="main-content">


                        <div>
                            <div class="info-container flex-container-desktop" style="display: flex; flex-direction: column;">
                                <div class="lay1" style="margin-top: 20px;">
                                    <div class="img1">
                                        <iron-image class="myimg" placeholder="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD//gBcYm9yZGVyIGJzOjAgYmM6IzAwMDAwMCBwczowIHBjOiNlZWVlZWUgZXM6MCBlYzojMDAwMDAwIGNrOjUwMGQwMmE0ZjFmMWQ3NDk3MzQwY2M1ODY4OTZiZjEx/9sAQwAGBAUGBQQGBgUGBwcGCAoQCgoJCQoUDg8MEBcUGBgXFBYWGh0lHxobIxwWFiAsICMmJykqKRkfLTAtKDAlKCko/9sAQwEHBwcKCAoTCgoTKBoWGigoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgo/8AAEQgACAAKAwEiAAIRAQMRAf/EABYAAQEBAAAAAAAAAAAAAAAAAAAECP/EACAQAAEDAwUBAAAAAAAAAAAAAAEAAwQCERITFCEiMUL/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A0vvImdQMiPiBx3pt6VW1IZ06LPN+D6CIg//Z" preload fade src="<?php echo base_url().'assets/images/home/1.jpg'?>"></iron-image>
                                    </div>
                                    <div class="txt1">
                                        <div class="info-heading lfty">My Graph</div>
                                        <p class="info-para">
                                                Am I suited for Harvard or Yale? Will I thrive in Stanford with its entrepreneurial and innovation focused community or are my childhood fascinations with Oxford and its legacies the way to go ahead. Our Alma Mater is possibly the second most important choice we make in our life. Your Graph is a collaborative process to discover what’s the right match for you and your college.
                                        </p>
                                        <div class="get-started-inr">
                                            <a href="javascript:void(0)" onclick="takeSurvey()"><paper-button raised>GET STARTED</paper-button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="lay1" style="margin-top: 50px;">
                                    <div class="txt1 odr">
                                        <div class="info-heading rhty">Compare</div>
                                        <p class="info-para">
                                                We believe in uniqueness of every college and hence no college ranking anywhere on the platform. However, comparing colleges on specific attributes basis someone’s preferences is a key process to connect students with colleges. We thus provide a mechanism to compare colleges side by side on each and every detailed attribute.
                                        </p>
                                    </div>
                                    <div class="img1">
                                        <iron-image class="myimg" placeholder="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD//gBcYm9yZGVyIGJzOjAgYmM6IzAwMDAwMCBwczowIHBjOiNlZWVlZWUgZXM6MCBlYzojMDAwMDAwIGNrOjUwMGQwMmE0ZjFmMWQ3NDk3MzQwY2M1ODY4OTZiZjEx/9sAQwAGBAUGBQQGBgUGBwcGCAoQCgoJCQoUDg8MEBcUGBgXFBYWGh0lHxobIxwWFiAsICMmJykqKRkfLTAtKDAlKCko/9sAQwEHBwcKCAoTCgoTKBoWGigoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgo/8AAEQgACAAKAwEiAAIRAQMRAf/EABYAAQEBAAAAAAAAAAAAAAAAAAABCP/EACAQAAEEAQQDAAAAAAAAAAAAAAEAAgMEEhEUIUExUcL/xAAVAQEBAAAAAAAAAAAAAAAAAAAAAf/EABURAQEAAAAAAAAAAAAAAAAAAAAR/9oADAMBAAIRAxEAPwDRc8lysca9lkzn6uO6lbHj6DcWc9+eVRct6DKSmD2BZJ+UREr/2Q==" preload fade src="<?php echo base_url().'assets/images/home/2.jpg'?>"></iron-image>
                                    </div>
                                </div>
                                
                                <div class="lay1" style="margin-top: 50px;">
                                    <div class="img1">
                                        <iron-image class="myimg" placeholder="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD//gBcYm9yZGVyIGJzOjAgYmM6IzAwMDAwMCBwczowIHBjOiNlZWVlZWUgZXM6MCBlYzojMDAwMDAwIGNrOjUwMGQwMmE0ZjFmMWQ3NDk3MzQwY2M1ODY4OTZiZjEx/9sAQwAGBAUGBQQGBgUGBwcGCAoQCgoJCQoUDg8MEBcUGBgXFBYWGh0lHxobIxwWFiAsICMmJykqKRkfLTAtKDAlKCko/9sAQwEHBwcKCAoTCgoTKBoWGigoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgo/8AAEQgAAwAFAwEiAAIRAQMRAf/EABUAAQEAAAAAAAAAAAAAAAAAAAAI/8QAGhAAAgMBAQAAAAAAAAAAAAAAAAECAxEhYf/EABUBAQEAAAAAAAAAAAAAAAAAAAAB/8QAFREBAQAAAAAAAAAAAAAAAAAAAAH/2gAMAwEAAhEDEQA/AKPptmrJ40tzeL0ABI//2Q==" preload fade src="<?php echo base_url().'assets/images/home/3.jpg'?>"></iron-image>
                                    </div>
                                    <div class="txt1">
                                        <div class="info-heading lfty">Search</div>
                                        <p class="info-para">
                                            Want to find top Law colleges with the most active debating societies? Or a BA degree in Universities that have the most happening parties on campus? Search what matters to you the most among colleges around the world.
                                            <br>

                                        </p>
                                       
                                    </div>
                                </div>
                                <div class="lay1" style="margin-top: 50px;">
                                    <div class="txt1 odr">
                                        <div class="info-heading rhty">Contribute</div>
                                        <p class="info-para">
                                            An active community of Scholargraph editors is working round the clock to update, improve and make information accurate, unbiased and neutral for others to get the most out of it. Join us to be one of the primary contributors of information for your college: show others its hidden gems and what really your alma mater is all about.
                                        </p>
                                         <div class="get-started-inr">
                                            <a href="javascript:void(0)" onclick="takeSurvey()"><paper-button raised>GET STARTED</paper-button></a>
                                        </div>
                                    </div>
                                    <div class="img1 styling">
                                        <iron-image class="myimg iig" placeholder="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD//gBcYm9yZGVyIGJzOjAgYmM6IzAwMDAwMCBwczowIHBjOiNlZWVlZWUgZXM6MCBlYzojMDAwMDAwIGNrOjUwMGQwMmE0ZjFmMWQ3NDk3MzQwY2M1ODY4OTZiZjEx/9sAQwAGBAUGBQQGBgUGBwcGCAoQCgoJCQoUDg8MEBcUGBgXFBYWGh0lHxobIxwWFiAsICMmJykqKRkfLTAtKDAlKCko/9sAQwEHBwcKCAoTCgoTKBoWGigoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgo/8AAEQgAEAAKAwEiAAIRAQMRAf/EABYAAQEBAAAAAAAAAAAAAAAAAAQBBv/EACMQAAIBAwMEAwAAAAAAAAAAAAEDAgQFEQAGBxITFCEiMVH/xAAVAQEBAAAAAAAAAAAAAAAAAAACBP/EABwRAQACAQUAAAAAAAAAAAAAAAEAAgMRIVGB0f/aAAwDAQACEQMRAD8ATu/cvLSt23mNnvqFWxVa5dOuVGuRioTIiPazn0B7ydJquaOQ6apche3rO2CpmEZyZIGQBxk/L7OtPfLnyhT364KtmybFVW8VLfHe2sjGbF9Z6ZSHdGCRg4wNRtdyOGzC9gWVkASIzNyiDIfuO5o6PMlaZx2ud18Sf//Z" preload fade src="<?php echo base_url().'assets/images/home/4.jpg'?>"></iron-image>
                                    </div>
                                </div>
                                <div class="lay1" style="margin-top: 50px; margin-bottom: 100px;">
                                    <div class="img1">
                                        <iron-image class="myimg" placeholder="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEASABIAAD//gBcYm9yZGVyIGJzOjAgYmM6IzAwMDAwMCBwczowIHBjOiNlZWVlZWUgZXM6MCBlYzojMDAwMDAwIGNrOjUwMGQwMmE0ZjFmMWQ3NDk3MzQwY2M1ODY4OTZiZjEx/9sAQwAGBAUGBQQGBgUGBwcGCAoQCgoJCQoUDg8MEBcUGBgXFBYWGh0lHxobIxwWFiAsICMmJykqKRkfLTAtKDAlKCko/9sAQwEHBwcKCAoTCgoTKBoWGigoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgo/8AAEQgACgAKAwEiAAIRAQMRAf/EABcAAAMBAAAAAAAAAAAAAAAAAAIFBgj/xAAfEAACAwAABwAAAAAAAAAAAAABAgADEQUSMmFxkbH/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A08XIVTcxUE9/kMNoBCsN8SY4RfbZeVe12XkJwsSN0RyXbepvcD//2Q==" preload fade src="<?php echo base_url().'assets/images/home/5.jpg'?>"></iron-image>
                                    </div>
                                    <div class="txt1">
                                        <div class="info-heading lfty">Converse</div>
                                        <p class="info-para">
                                                iImagine millions of students, discussing and working together to find answers to informational and perceptual questions about their academic pursuits and current/prospective alma mater - all aided by an intuitive bot to remove fuzziness from the discussion.                                        </p>
                                        <div class="get-started-inr">
                                            <a href="javascript:void(0)" onclick="takeSurvey()"><paper-button raised>GET STARTED</paper-button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-container-desktop">
                                <div class="flex-desktop">

                                </div>

                                <div class="flex-desktop-2">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer>
                    <?php include "common_components/footer.php" ?>
                </footer>

            </app-header-layout>

        </app-drawer-layout>

        <!-- <script type="text/javascript" src="/assets/js/toolbarSearch.js"></script> -->
        <script type="text/javascript" src="/assets/js/commonScript.js"></script>
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
        ?>

        <script>
        
            $(document).ready(
                function()
                {
                    // new Clipboard('.share-btn');
                $("#mainInput").on("keyup focus",function()
                {
                    if($("#mainInput").val().length>2)
                    {
                        $.ajax({
                                type: "post",
                                url: "/search/search_suggestions/",
                                cache: false,
                                data:'search='+$("#mainInput").val(),
                                success: function(response)
                                {
                                    $('#ajaxSearchResults').html("");
                                    var obj = JSON.parse(response);
                                    if(obj.length>0)
                                    {
                                        try
                                        {
                                            for(var i = 0;i < obj.length;i++){
                                                var term = '<a style="text-decoration:none;" href="'+obj[i][2]+'"><div class="searchItem"><span class="search-type"> ';
                                                if(obj[i][0] == "question"){
                                                    term += '<iron-icon icon="question-answer"></iron-icon>';
                                                }
                                                else if(obj[i][0] == "topic"){
                                                    term += '<iron-icon icon="subject"></iron-icon>';
                                                }
                                                else if(obj[i][0] == "profile"){
                                                    term += '<iron-icon icon="social:school"></iron-icon>';
                                                    term += ' ' + obj[i][0] + ' :' ;
                                                }
                                                term += ' </span><span class="search-text"> '+obj[i][1]+' </span></div></a>';
                                                $('#ajaxSearchResults').append(term);
                                            }
                                        }
                                        catch(e)
                                        {
                                            alert(e);
                                            alert('Exception while request.');
                                        }
                                    }
                                    var searchText = '<div class="searchItem" onclick="document.getElementById(\'mainSearchForm\').submit();"><iron-icon icon="search"></iron-icon> Search : <span style="color:black">' + $("#mainInput").val() + '</span></div>';
                                    $('#ajaxSearchResults').append(searchText);
                                }
                            });
                    }
                return false;
                });
        /*  $("#mainInput").blur(function(){
                    setTimeout(function(){
                    //  $('#ajaxSearchResults').html("");
                    },100);
                });  */
            });   
            <?php
                //echo $searchSuggestions;
            ?>
            var input = document.getElementById("mainInput");
            input.value = "";
            var suggestions = <?php echo $searchSuggestions; ?>;//["Harvard University","Medical Colleges","Fees at NLSIU", "Courses at MIT"]
            var currentSuggestion = 0;
            var populating = true;
            if(populating === true){
                var interval = setInterval(populateData,100);
            }
            var wordArray = suggestions[currentSuggestion].split("");
            var currentLetter = 0;
            function getTrendingQuestions()
            {
                $.ajax
                (
                    {
                    type: "post",
                    cache: false,
                    url: "/home/getTrendingQuestions",
                    success: function(response)
                    {
                        $('#trendingQuesDiv').append(response);
                    }
                    }
                );
            }
            function populateData(){
                if(currentLetter < wordArray.length){
                    input.value += wordArray[currentLetter];
                    currentLetter++;
                }
                else{
                    clearInterval(interval);
                    setTimeout(function(){
                        if(populating === true){
                            interval = setInterval(removeData,50);
                        }
                    },1000);
                }
            }
            function removeData(){
                if(currentLetter > 0){
                    input.value = input.value.slice(0,-1);
                    currentLetter--;
                }
                else{
                    currentSuggestion++;
                    if(currentSuggestion > suggestions.length-1){
                        currentSuggestion = 0;
                    }
                    wordArray = suggestions[currentSuggestion];
                    clearInterval(interval);
                    if(populating === true){
                        interval = setInterval(populateData,100);
                    }
                }
            }
            input.addEventListener("focus",function(){
                clearInterval(interval);
                this.select();
                populating = false;
            });
            function stopNsearch(id){
                clearInterval(interval);
                populating = false;
                submitForm(id);
            }
            window.addEventListener("scroll",function(){
                var appHeader = document.getElementsByTagName("app-header")[0];
                var appToolbar = document.getElementsByTagName("app-toolbar")[0];
                var toolbarLink = document.getElementsByClassName("toolbarLink");
                var toolbarSearchContainer = document.getElementById("toolbarSearchContainer");
                var menuButton = document.getElementById("menuButton");
                var logo = document.getElementById("logo");
                var tabIcon = document.getElementById("tabIcon");
                var logoMob = document.getElementsByClassName("logoMob");
                var preLogo = document.getElementById("pre");
                var helperSpan = document.getElementById("helperSpan");
                var expandableSearch = document.getElementById("expandableSearch");
                var toolbarAccountIcon = document.getElementById("toolbarAccountIcon");
                var accountCircle = null;
                var accountName = null;
                var notificationIcon = null;
                if(toolbarAccountIcon != null){
                    accountCircle = toolbarAccountIcon.querySelector("iron-icon");
                    notificationIcon = document.getElementById("notificationIcon");
                    accountName = document.getElementsByClassName("account-name")[0];
                }
                if(document.body.scrollTop > 250 || document.documentElement.scrollTop > 250){
                    appToolbar.style.backgroundColor = "rgba(255, 255, 255, 0.96)";
                    for(i = 0;i < toolbarLink.length;i++){
                        toolbarLink[i].style.color = "#595959";
                        toolbarLink[i].style.fontWeight = "400";
                    }
                    toolbarSearchContainer.style.display = "inline-block";
                    menuButton.style.color = "black";
                    preLogo.style.color = "black";
                    logo.style.display = "inline-block";
                    helperSpan.style.display = "none";
                    logoMob[0].style.display = "none";
                    tabIcon.style.display = "none";
                    appHeader.style.boxShadow = "0 0 15px -2px rgba(0,0,0,0.2)";
                    if(accountCircle != null){
                        accountCircle.style.color = "#009688";
                        accountName.style.color = "rgba(0,0,0,0.87)";
                        accountName.style.fontWeight = "normal";
                        notificationIcon.style.color = "#009688";
                    }
                    // var term = toolbarAccountIcon + " " + $("#toolbarAccountIcon").css("display") + " " + document.getElementById("loginButton") + " " + $("#loginButton").css("display");
                    // console.log(term);
                    if(!((toolbarAccountIcon != null && $("#toolbarAccountIcon").css("display") != "none") || (document.getElementById("loginButton") != null && $("#loginButton").css("display") != "none"))){
                        if(expandableSearch != null){
                            expandableSearch.style.display = "inline-block";
                            notificationIcon.style.display = "inline-block";
                        }
                    }
                }
                else{
                    document.getElementsByTagName("app-toolbar")[0].style.backgroundColor = "transparent";
                    for(i = 0;i < toolbarLink.length;i++){
                        toolbarLink[i].style.color = "white";
                        toolbarLink[i].style.fontWeight = "400";
                    }
                    toolbarSearchContainer.style.display = "none";
                    menuButton.style.color = "white";
                    preLogo.style.color = "white";
                    logo.style.display = "none";
                    tabIcon.style.display = "none";
                    logoMob[0].style.display = "none";
                    helperSpan.style.display = "flex";
                    appHeader.style.boxShadow = "none";
                    if(accountCircle != null){
                        accountCircle.style.color = "white";
                        accountName.style.color = "white";
                        accountName.style.fontWeight = "400";
                        notificationIcon.style.color = "white";
                    }
                    if(!((toolbarAccountIcon != null && $("#toolbarAccountIcon").css("display") != "none") || (document.getElementById("loginButton") != null && $("#loginButton").css("display") != "none"))){
                        if(expandableSearch != null){
                            expandableSearch.style.display = "none";
                            notificationIcon.style.display = "none";
                        }
                    }
                }
            });
            function submitForm(id){
                var form = document.getElementById(id);
                form.submit();
            }
            // function updateupvoteans(aid)
            // {
            //  document.getElementById('upvoteansBtn_'+aid).style.backgroundColor='#87b9dd';
            //   $.ajax({
            //     url: '<?php echo site_url('Communication/saveUpvotesAnswer'); ?>',
            //     method: 'GET',
            //     data: 'ansid='+aid,
            //     success: function(result)
            //     {
            //       var text=$('#ansUpvoteBtnText_'+aid).text();
            //        if(text==="Upvote")
            //        {
            //          if($('#ansDownvoteBtnText_'+aid).text()==="Downvoted")
            //          {
            //              $('#ansDownvoteBtnText_'+aid).text("Downvote");
            //          }
            //          $('#ansUpvoteBtnText_'+aid).text("Upvoted");
            //        }
            //        else
            //        {
            //          $('#ansUpvoteBtnText_'+aid).text("Upvote");
            //        }
            //        $('#answerupvotes_'+aid).text(result);
            //        $.ajax({
            //          url: '<?php echo site_url('Communication/getDownvotesAnswer'); ?>'+'/'+aid,
            //          success:function(result)
            //          {
            //              $('#answerdownvotes_'+aid).text(result);
            //          }
            //          });
            //        document.getElementById('upvoteansBtn_'+aid).style.backgroundColor='#FFFFFF';
            //     }
            //   });
            // }
            // function updatedownvoteans(aid)
            // {
            //  document.getElementById('downvoteansBtn_'+aid).style.backgroundColor='#e37373';
            //   $.ajax({
            //     url: '<?php echo site_url('Communication/saveDownvotesAnswer'); ?>',
            //     method: 'POST',
            //     data: 'ansid='+aid,
            //     success: function(result)
            //     {
            //       var text=$('#ansDownvoteBtnText_'+aid).text();
            //          if(text==="Downvote")
            //          {
            //              if($('#ansUpvoteBtnText_'+aid).text()==="Upvoted")
            //              {
            //                  $('#ansUpvoteBtnText_'+aid).text("Upvote");
            //              }
            //              $('#ansDownvoteBtnText_'+aid).text("Downvoted");
            //          }
            //          else
            //          {
            //              $('#ansDownvoteBtnText_'+aid).text("Downvote");
            //          }
            //          $('#answerdownvotes_'+aid).text(result);
            //          $.ajax({
            //          url: '<?php echo site_url('Communication/getUpvotesAnswer'); ?>'+'/'+aid,
            //          success:function(result)
            //          {
            //              $('#answerupvotes_'+aid).text(result);
            //          }
            //          });
            //          document.getElementById('downvoteansBtn_'+aid).style.backgroundColor='#FFFFFF';
            //     }
            //   });
            // }
            // function updateupvote(qid)
            // {
            //   //var qid=$('#qid').val();
            //   $.ajax({
            //     url: '<?php echo site_url('Communication/saveUpvotes'); ?>',
            //     method: 'POST',
            //     data: 'qid='+qid,
            //     success: function(result)
            //     {
            //     }
            //   });
            // }
            // function updatedownvote(qid)
            // {
            //   //var qid=$('#qid').val();
            //   $.ajax({
            //     url: '<?php echo site_url('Communication/saveDownvotes'); ?>',
            //     method: 'POST',
            //     data: 'qid='+qid,
            //     success: function(result)
            //     {
            //     }
            //   });
            // }
            // function follow(qid)
            // {
            //   var flag=0;
         //      //var text=$('#followBtn').text();
         //      //text=text.trim();
         //      /*if(text=="Follow")
         //      {
         //        flag=1;
         //      }
         //      else
         //      {
         //        flag=0;
         //      }*/
            //    $.ajax({
            //      url: '<?php echo site_url('Communication/updateFollowPreference'); ?>',
            //      method: 'POST',
            //      data: 'qid='+qid+'&flag='+flag,
            //      success:function(result)
            //      {
            //          updateupvote(qid);
            //        //$('#followBtn').val(1-flag);
            //        //if(flag==1)
            //          //$('#followBtn').text("Unfollow");
            //        //else
            //          //$('#followBtn').text("Follow");
            //      }
            //    });
            // }
            // function saveanscomment(aid)
            // {
            //   var comment=$('#commenta_'+aid).val();
            //   if(comment==="")
            //   {
            //     $('#commenta_'+aid+'div').addClass("has-error");
            //     $("#errorc_"+aid).text("Comment cannot be blank");
            //   }
            //   else
            //   {
            //     $('#commenta_'+aid+'div').removeClass("has-error");
            //     $("#errorc_"+aid).text("");
            //     $.ajax({
            //       url:'<?php echo site_url('Communication/saveCommentsAnswer');?>'+"/"+aid+"/"+comment,
            //       success:function(data)
            //       {
            //         if(data==1)
            //         {
            //           showCommentsAns(aid);
            //           //location.reload();
            //         }
            //         else
            //         {
            //           alert("There is some error");
            //         }
            //       }
            //       });
            //   }
            // }
            // function showCommentsAns(aid)
            // {
            //  $.ajax({
            //      url:'<?php echo site_url('Communication/getCommentsAnswer');?>'+"/"+aid,
            //      success:function(response)
            //      {
            //          response=JSON.parse(response);
            //          term="";
            //          for(var i=0;i<response.length;i++)
            //          {
            //              row=response[i];
            //              term=term+'<div class="comment-row"><span class="comment">'+row.comment+'  -</span><span class="comment-author">'+row.email+'</span><span class="comment-time"> '+row.cr_dt+'</span></div>';
            //          }
            //          term=term+'<div class="ansCommentInput flex-container">';
            //          term=term+'<div class="flex-5"><paper-textarea type="text" id="commenta_'+aid+'" placeholder="Start writing your comment" required="required"></paper-textarea></div>';
            //          term=term+'<div class="flex"><paper-button class="ansCommentBtn" onclick="saveanscomment('+aid+');">Comment</paper-button></div></div><p id="errorc_'+aid+'" style="color:red"></p></div></div>';
            //          $('#topAnswerCommentDiv'+aid).html("");
            //          $('#topAnswerCommentDiv'+aid).append(term);
            //      }
            //  });
            // }
            // function showCommentDiv(id){
            //  $("#" + id).toggle("fast");
            // }
            // function initializereadmore()
            // {
            //   // Configure/customize these variables.
            //   var showChar = 150; // How many characters are shown by default
            //   var ellipsestext = "...";
            //   var moretext = "(more)";
            //   // var lesstext = "(less)";
            //   $('.topAnswerText').each(function() {
            //     var content = $(this).html();
            //     if (content.length > showChar) {
            //       var c = content.substr(0, showChar);
            //       var h = content.substr(showChar, content.length - showChar);
            //       var html = c + '<span><span class="morelink" onclick="expandTopAnswer(this)" style="cursor:pointer;color:#2b6dad"> ... ' + moretext + '</span><span class="morecontent" style="display:none">' + h + '</span>&nbsp;&nbsp;</span>';
            //       $(this).html(html);
            //     }
            //   });
            // }
            // function expandTopAnswer(span){
            //  $span = $(span);
            //  $span.next().css("display","inline");
            //  $span.css("display","none");
            // }
        </script>

    </body>
</html>