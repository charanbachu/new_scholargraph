<!DOCTYPE html>
<html lang="en">
    <head>
        <title>College Details</title>
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

        <link rel="shortcut icon" type="image/png" href="<?php echo base_url().'assets/images/icons/home-icon.png'?>"/>
         <!--<script type="text/javascript" src="/assets/js/encode_req.js"></script> -->

        <style is="custom-style" include="shared-css iron-flex iron-flex-alignment">

        body, html {
            max-width: 100%;
            overflow-x: hidden;
        }

        .category-name {
            display: inline-block;
            width: 60%;
            font-size: 13px;
            font-weight: 400;
            opacity: 1;
        }
        .category-detail {
            /*display: inline-block;*/
            /*width: 47%;*/
            font-size: 11px;
            padding-top: 4px;
            /*color: #bdbdbd;*/
            /*width: 50%;*/
            opacity: 0.6;
        }
        .result-detail {
            /*display: inline-block;*/
            /*width: 47%;*/
            font-size: 10px;
            padding-top: 2px;
            opacity: 0.6;
            text-align: right;
            /*width: 30%;*/
        }

        .results {
            display: inline-block;
            float: right;
            font-size: 13px;
            padding-top: 0px;
            font-weight: 400;
            opacity: 1;
            text-align: right;
            width: 40%;
        }

         .heading1 {
            padding: 20px 15px;
            margin-top: 10px;
            background-color: #525460;
            font-size: 18px;
            cursor: pointer;
            -webkit-tap-highlight-color: rgba(100,0,0,0);
            text-align: left;
            color: #ffffff;
            font-weight: 400;
        /*margin-right: 20px;*/
      }
      .heading2 {
        /*padding: 20px 15px;*/
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*border: 1px solid #dedede;*/
/*        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;  */
       font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 90%;*/
        text-align: left;
        /*margin-right: 20px;*/
        cursor: pointer;
        /*margin-left: 10px;*/
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-left: 30px;
        /*padding-top: 20px;*/
        /*padding-bottom: 20px;*/

        color: #01579b;
        /*background-color: #c6efff;*/
        background-color: #f6f6f6;
        margin-bottom: 0px;
        padding-right: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
        margin-top: 1px;
    }
    #coverImg {
        height: 100%;
        width: 100%;
        z-index: -1;
        opacity: 0.5;
    }
  .heading3 {
        /*padding: 20px 15px;*/
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*border: 1px solid #dedede;*/
/*        border-top-left-radius: 5px;
        border-top-right-radius: 5px;*/
        font-size: 15px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 95%;*/
        text-align: left;
        /*margin-right: 20px;*/
        cursor: pointer;
        margin-left: 0px;
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-left: 35px;
        padding-top: 15px;
        padding-bottom: 15px;
        color: #0277bd;
        background-color: #f9f9f9;
        margin-top: 1px;
        font-size: 13px;
        padding-right: 15px;    
    }
    .heading4 {
        /*padding: 20px 15px;*/
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*border: 1px solid #dedede;*/
/*        border-top-left-radius: 5px;
        border-top-right-radius: 5px;*/
        font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 95%;*/
        text-align: left;
        /*margin-right: 20px;*/
        cursor: pointer;
        margin-left: 0px;
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-left: 40px;
        padding-top: 15px;
        padding-bottom: 15px;
        color: #039be5;
        background-color: #fbfbfb;
        margin-top: 1px;
        /*font-size: 15px;*/
        padding-right: 15px;
    }
     .heading5 {
        /*padding: 20px 15px;*/
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*border: 1px solid #dedede;*/
/*        border-top-left-radius: 5px;
        border-top-right-radius: 5px;*/
        font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 95%;*/
        text-align: left;
        /*margin-right: 20px;*/
        cursor: pointer;
        margin-left: 0px;
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-left: 45px;
        padding-top: 15px;
        padding-bottom: 15px;
        color: #29b6f6;
        background-color: #fdfdfd;
        margin-top: 1px;
        /*font-size: 15px;*/
        padding-right: 15px;
    }
      .det {

        font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 90%;*/
        text-align: left;
        /*margin-right: 20px;*/
        cursor: pointer;
        /*margin-left: 10px;*/
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-left: 20px;
        padding-right: 5px;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #6f6f6f;
        padding-right: 20px;
    }
      .desc {
        font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        text-align: left;
        margin-right: 15px;
        cursor: pointer;
        margin-left: 20px;
        padding-top: 15px;
        padding-bottom: 13px;
        color: #6f6f6f;
        border-bottom: 1px #f4f4f4 solid;
    }
      .desc2 {
        /*padding: 20px 15px;*/
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*border: 1px solid #dedede;*/
/*        border-top-left-radius: 5px;
        border-top-right-radius: 5px;*/
        font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 90%;*/
        text-align: left;
        margin-right: 20px;
        cursor: pointer;
        margin-left: 9%;
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-top: 20px;
        padding-bottom: 13px;
        color: #6f6f6f;
        border-bottom: 1px #f4f4f4 solid;
      }
      .desc2-drill {
        /*padding: 20px 15px;*/
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*border: 1px solid #dedede;*/
/*        border-top-left-radius: 5px;
        border-top-right-radius: 5px;*/
        font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 90%;*/
        text-align: left;
        /*margin-right: 20px;*/
        cursor: pointer;
        /*margin-left: 40px;*/
        /*margin-right: 60px;*/
        /*background-color: red;*/
        /*padding-top: 20px;*/
        /*padding-bottom: 13px;*/
        color: #6f6f6f;
        border-bottom: 1px #f4f4f4 solid;
      }
      .desc3 {
        /*padding: 20px 15px;*/
        /*margin-top: 20px;*/
        /*background-color: #f0f0f0;*/
        /*border: 1px solid #dedede;*/
/*        border-top-left-radius: 5px;
        border-top-right-radius: 5px;*/
        font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 90%;*/
        text-align: left;
        margin-right: 20px;
        cursor: pointer;
        margin-left: 12%;
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-top: 20px;
        padding-bottom: 13px;
        color: #6f6f6f;
        border-bottom: 1px #f4f4f4 solid;
      }
      #main {
        /*width: 90%;*/
        padding-bottom: 10%;
        margin-left: 8px;
        margin-right: 8px;
        margin-left: 21.76%;
      }
      .card {
        @apply(--shadow-elevation-2dp);
        background-color: #ffffff;
        font-size: 15px;
        color: #404040;

      }
      .content {
        padding-top: 0px;
        /*padding-bottom: 15px;*/
        /*border: 1px solid #dedede;*/
        border-top: none;
/*        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;*/
        @apply(--shadow-elevation-2dp);
        background-color: #ffffff;
        font-size: 15px;
        color: #404040;
      }

      #collapse3 {
        max-height: 250px;
      }
            .ghost, [hidden] {
        display: none;
      }
      .invisible {
        visibility: hidden;
      }
      .flex-desktop {
        padding-right: 12px;
        padding-left: 6px;
        /*background-color: #fefefe;*/
      }
            .card-map{
                background-color: var(--special-font-color);
                overflow-x: auto;
                color: white;

            }

            #mid-container{
                width: 100%;
                margin: 0 auto;
                margin-top: 0px;
                margin-right: 2px;
                margin-left: 2px;
                background-color: fcfcfc;
            }
            #container{
                background-color: #fefefe;
            }
            #treeCard{
                width: 100%;
                display: block;
                margin: 0 auto;
                border-radius: 5px;
                margin-bottom: 20px;
            }

            #recomCard{
                /*width: 30%;*/
                padding: 0% 0%;
                display: block;
                /*margin: 20px auto;*/
                background-color: #f4f4f4;
                color: white;
                width: 100%;
            }
                #catalog1{
                /*width: 20%;*/
                padding: 5% 0%;
                display: block;
                /*margin: 20px auto;*/
                background-color: #f4f4f4;
                color: white;
                margin-right: 6px;
                font-size: 16pxheight: 60%;
                text-align: center;
                margin-top: 10px;
            }
            .mainCon {
                width: 90%; 
                margin-left: 5%;
            }
            #questionCard{
                width: 100%;
                /*padding: 5% 0%;*/
                display: block;
                background-color: #f4f4f4;
                margin-top: 25px;
                margin-bottom: 20px;
            }
            #leaderboard{
                width: 100%;
                /*padding: 5% 0%;*/
                display: block;
                background-color: #f4f4f4;
                margin-top: 25px;
                margin-bottom: 20px;
            }

            #treeCard .card-content{
                background-color: var(--main-color);
                color: white;
                padding: 32px 16px;
                font-size: 24px;
                /*text-align: center;*/
            }

            #recomCard .card-content{
                /*background-color: white;*/
                /*color: var(--special-font-color);*/
                color: #4db6ac;
                /*border-left: 15px solid #f44336;*/
                /*margin-bottom: 15px;*/
                text-align: center;
                font-size: 16px;
            }
            #catalog1 .card-content{
                /*background-color: white;*/
                /*color: var(--special-font-color);*/
                color: #4db6a9;
                font-size: 16px;
                /*border-left: 15px solid #f44336;*/
                /*margin-bottom: 15px;*/
                text-align: center;
            }
            #recomCard .recommendations1{
                background-color: #fff;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 30px;
                font-size: 14px;
                opacity: 1;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }
            #recomCard .recommendations1top{
                background-color: #fff;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                padding-top: 20px;
                padding-bottom: 10px;
                padding-left: 30px;
                font-size: 14px;
                opacity: 1;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }

            #recomCard .recommendations1bottom{
                background-color: #ffffff;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                padding-top: 10px;
                padding-bottom: 20px;
                padding-left: 30px;
                font-size: 14px;
                opacity: 1;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }



            .options {
                padding-right: 20px;
                display: inline-block;
                padding-top: 10px;
                color: #4db6ac;
            }
             .options:hover {
                cursor: pointer;
             }

            #questionCard .questions1{
                background-color: #f4f4f4;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                /*padding-left: 25px;*/
                /*padding-right: 15px;*/
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 30px;
                font-size: 13px;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }
            #questionCard .questions1top{
                background-color: #ffffff;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                /*padding-left: 25px;*/
                /*padding-right: 15px;*/
                padding-top: 20px;
                padding-bottom: 10px;
                padding-left: 30px;
                font-size: 13px;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }
            #questionCard .questions1bottom{
                background-color: #ffffff;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                /*padding-left: 25px;*/
                /*padding-right: 15px;*/
                padding-top: 10px;
                padding-bottom: 20px;
                padding-left: 30px;
                font-size: 13px;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }
            #leaderboard:hover {
                cursor: pointer;
            }
            #recommendations:hover {
                cursor: pointer;
            }
            #leaderboard .people1{
                background-color: #ffffff;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                /*padding-left: 25px;*/
                /*padding-right: 15px;*/
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 10px;
                font-size: 13px;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }
            #leaderboard .people1top{
                background-color: #ffffff;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                /*padding-left: 25px;*/
                /*padding-right: 15px;*/
                padding-top: 20px;
                padding-bottom: 10px;
                padding-left: 10px;
                font-size: 13px;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }
            #leaderboard .people1bottom{
                background-color: #ffffff;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                /*padding-left: 25px;*/
                /*padding-right: 15px;*/
                padding-top: 10px;
                padding-bottom: 20px;
                padding-left: 10px;
                font-size: 13px;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }

            #questionCard .card-content{
                /*background-color: white;*/
                /*color: var(--special-font-color);*/
                /*border-left: 15px solid #2196f3;*/
                color: #4db6ac;
                font-size: 16px;
                text-align: center;

            }
            #leaderboard .people-content{
                /*background-color: white;*/
                /*color: var(--special-font-color);*/
                /*border-left: 15px solid #2196f3;*/
                color: #4db6ac;
                font-size: 16px;
                text-align: center;
                padding-bottom: 13px;


            }
            #leaderboard #people {
                padding-top: 15px;
                /*padding-bottom: 15px;*/
            }
            .questionCard{
                display: block;
                width: 90%;
                margin: 0 auto;
                margin-top: 20px;
                font-size: 15px;
            }

            .leaderboard{
                display: block;
                width: 90%;
                margin: 0 auto;
                margin-top: 20px;
                font-size: 15px;
            }

            .question{
                color: #0b9e91;
            }

            .question:hover{
                /*text-decoration: underline;*/
                color: #2962ff;
            }

            .question p{
                margin-bottom: 5px;
            }

            .questionCard iron-icon{
                color: var(--main-color);
            }

            .leaderboard iron-icon{
                color: var(--main-color);
            }

            .bottom-bar{
                border-top: 1px solid rgba(0,0,0,0.14);
                @apply(--layout-horizontal);
                color: black;
            }

            .bottom-bar div{
                display: inline-block;
                @apply(--layout-flex);
                padding: 10px;
            }
            .cat-items {
                font-weight: 400;
                padding: 10px;
                padding-left: 20px;
            }
            .fntit {
                opacity: 1; 
                font-weight: 400;
            }
            .detbord {
                display: flex; 
                flex: 2; 
                flex-direction: column; 
                align-items: center; 
                justify-content: center; 
                text-align: center; 
                background-color: #f4f4f4; 
                height: 100px;
                padding-right: 0px; 
                padding-left: 0px; 
                border-right: 2px solid #e8e8e8;
            }
            .dettext {
                color: #595959; 
                display: flex; 
                padding-left: 15px; 
                padding-right: 15px; 
                align-items: center; 
                opacity: 0.7; 
                font-weight: 500; 
                font-size: 13px;
            }
            .detstat {
                margin-top: 5px; 
                color: #4db6a9; 
                font-weight: 400; 
                font-size: 21px;
            }
            .deter {
                display: flex; 
                justify-content: center;
                align-items: center;
            }
            @media only screen and (max-width : 884px) {
                #leaderboard .people1 {
                    padding-left: 0px;
                }
            #leaderboard .people1top {
                padding-left: 0px;
            }
            #leaderboard .people1bottom {
                padding-left: 0px;
            }

            }
            @media only screen and (min-width : 640px){
                #treeCard{
                    width: 90%;
                    display: block;
                    margin: 0 auto;
                    border-radius: 5px;
                }
                #catalog1{
                /*width: 20%;*/
                padding: 0%;
                display: block;
                position: fixed;
                /*margin: 20px auto;*/
                background-color: #f4f4f4;
                color: white;
                /*margin-right: 20px;*/
                /*padding-top: 2%;*/
                text-align: center;
                margin-left: 6px;
                width: 18%;
            }

                #recomCard{
                    background-color: #f4f4f4;
                    display: inline-block;
                    margin: 0;
                    color: white;
                    text-align: center;
                    /*margin-left: 20px;*/
                    margin-top: 10px;
                }
                #catalog1 #catalog{
                background-color: white;
                text-align: left;
                color: grey;
                padding-top: 10px;
                padding-bottom: 10px;
                cursor: pointer;
                font-size: 13px;

            }

                #questionCard{

                    background-color: #f0f0f0;
                    display: inline-block;
                    margin: 0;
                    color: white;
                    text-align: center;
                    margin-top: 20px;
                    color: #070707;
                    font-size: 13px;
                }
                #leaderboard{

                    background-color: #f0f0f0;
                    display: inline-block;
                    margin: 0;
                    color: white;
                    text-align: center;
                    margin-top: 20px;
                    color: #070707;
                    font-size: 13px;
                }
            }


            #coverPicContainer{
                /*height: 270px;*/
                /*overflow: hidden;*/
                background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0), rgba(0,0,0,.5));
                background-size: cover;
                position: relative;
                width: 112%;
                margin-left: -6%;
                /*margin-bottom: 20px;*/
            }

            #collegeName, #address{
                position: absolute;
                /*bottom: 45px;*/
                /*bottom: 60px;*/
                padding-left: 40px;
                color: #04947e;
                font-size: 36px;
                margin-right: 30px;


            }

            #address{
                top: 0px;
                /*bottom: 35px;*/
                font-size: 19px;
                /*margin-bottom: 10px;*/
                margin-top: 205px;


            }
            #collegeName {
                
                bottom: 55px;
            }
            #grad {
                position: absolute;
                width: 100%;
                background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, rgba(222, 222, 222, 1) 100%), no-repeat;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0)), color-stop(50%, rgba(222, 222, 222, 1)), color-stop(100%, rgba(0, 0, 0))), no-repeat;
                background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, rgba(222, 222, 222, 1) 100%), no-repeat;
                background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, rgba(222, 222, 222, 1) 100%), no-repeat;
                background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, rgba(222, 222, 222, 1) 100%), no-repeat;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 50%, rgba(222, 222, 222, 1) 100%), no-repeat;
                height: 260px;
                bottom:0.5px;
            }
            #name-holder{
                position: absolute;
                width: 100%;
                margin-top: 170px;
                height: 260px;
                bottom:0.5px;
            }
                
            @media only screen and (max-width : 640px){
                #coverPicContainer{
                    height: 260px;
                }

                #collegeName{
                    font-size: 36px;
                }

                #address{
                    font-size: 18px;
                }

            }
            @media only screen and (max-width: 962px){
                .cat-items {
                    padding-left: 0px;
                    text-align: center;
                }
                #recomCard .recommendations1 {
                    padding-left: 0px;
                    text-align: center;
                }
                #recomCard .recommendationstop {
                    padding-left: 0px;
                    text-align: center;
                }
                #recomCard .recommendationsbottom {
                    padding-left: 0px;
                    text-align: center;
                }
            }
            @media only screen and (max-width : 1200px){
                #main {
                    margin-left: 23%;
                }
            }
            @media only screen and (max-width: 768px){
                #coverPicContainer{
                        /*height: 270px;*/
                        /*overflow: hidden;*/
                        background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0), rgba(0,0,0,.5));
                        background-size: cover;
                        position: relative;
                        width: 106%;
                        margin-left: -3%;
                        /*margin-bottom: 20px;*/
                }
            }
            @media only screen and (max-width : 450px){
                .deter {
                    flex-wrap: wrap;
                }
                .deter .detbord {
                    width: 100%;
                    flex: 1 1 49%;
                    border-right: 2px solid #e8e8e8;
                    border-bottom: 2px solid #e8e8e8;
                }
                .heading2, .heading3, .heading4, .heading5 {
                    padding-left: 25px;
                }
                .deter .n2 {
                    border-right: none;
                }
            }
            @media only screen and (max-width: 600px){
                .detbord {
                    padding-right: 0px;
                    padding-left: 0px;
                    height: 85px;
                }
                .dettext {
                    padding-right: 5px;
                    padding-left: 5px;
                }
            }
            @media only screen and (max-width: 769px){
                #catalog1 {
                    display: none;
                }
                #mid-container {
                    display: flex;
                    flex-direction: column;
                }
                #main {
                    padding-bottom: 10%;
                    margin-left: 0px;
                    margin-right: 0px;
                }
                #recommendations {
                    padding-left: 0px;
                    padding-right: 0px;
                }
                .mainCon {
                    width: 94.9%;
                    margin-left: 2.5%;
                }
                .cat-items {
                    padding-left: 0px;
                    text-align: center;
                }
                #mid-container{
                    width: 100%;
                    margin: 0 auto;
                    margin-top: 0px;
                    margin-right: 0px;
                    margin-left: 0px;
                }
            }
            @media only screen and (min-width : 640px) and (max-width: 769px){
                #coverPicContainer{
                    height: 200px;
                }
                .options {
                padding-right: 5px;
                display: inline-block;
                padding-top: 10px;
                color: #4db6ac;
            }

                #map {
                    height: 200px;
                }

                #collegeName{
                    font-size: 36px;
                    padding-left: 30px;
                }

                #address{
                    font-size: 18px;
                    padding-left: 30px;
                }

            }
            @media only screen and (max-width : 640px){
                #catalog1 {
                    visibility: hidden;
                    display: none;
                }

                #collegeName{
                    font-size: 36px;
                    padding-left: 30px;
                }

                #address{
                    font-size: 18px;
                    padding-left: 30px;
                }
                .options {
                padding-right: 2px;
                display: inline-block;
                padding-top: 10px;
                color: #4db6ac;
            }


            }

            #backgroundImage{
                position: absolute;
                z-index: -1;
                width: 100%;
                height: 100%;
            }

            .section-card{
                width: 90%;
                display: block;
                margin: 0 auto;
                margin-bottom: 5%;
            }

            .section-card .card-content{
                background-color: var(--main-color);
                color: white;
            }

            .data-element paper-button.label{
                font-size: 14px;
                text-transform: capitalize;
            }
            .collapse-content {
                 padding: 15px;
                 border: 1px solid #dedede;
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
            a {
                font-color: #595959;
            }
            a:hover {
                text-decoration: none;
            }
            .outsty {
                display: flex;
                align-items: center;
                height: 44px;
            }
            .outsty a {
                color: #595959;
            }
            .iron-selected {
              background: #ffa800;
              color: #fff !important;
            }
            .outsty:hover {
                background-color: #ff8400;
                color: #fff;
            }
            .asty {
                width: 86%;
            }
            .outsty a:hover {
                color: #fff !important;
            }
            .outsty #schoolIcon:hover {
                color: #fff !important;
            }
            #schoolIcon {
                margin-left: 10px;
            }
            .ascol {
                color:#595959; 
                text-transform: 
                capitalize; 
                margin-left: 10px;
            }
           /* .outsty:after {
                content: '';
                display: block;
                position: absolute;
                top: 0px;
                left: 100%;
                width: 0;
                height: 0;
                border-color: transparent transparent transparent #ffa800;
                border-style: solid;
                border-width: 22px;
            }*/
            .active {
                color: #fff;
                font-weight: 500;
            }
            .inew {
                --iron-icon-height: 20px;
                --iron-icon-width: 20px;
                margin-right: 2px;
                margin-bottom: 2px;
            }
            .inew:hover {
                fill: #ffa800;
            }
        </style>
        <style type="text/css">
            #map {
                height: 260px;
                width: 100%;
                /*opacity: 0.7;*/


            }
        </style>
        <script>

        $(document).ready(function(){
            //alert('Yes');
            $('html, body').animate({ scrollTop: 0 }, 0);
        });
        </script>
        <script>
        $(document).on('scroll', function() {
            var scrollPosition = window.scrollY;
            // alert(scrollPosition);
            if(scrollPosition<265) {
                var x = 324 - scrollPosition;
                // alert(x);
                document.getElementById("catalog1").style.top = x + 'px';
            }
        })
        </script>
        <script>
        function offsetAnchor() {
          if (location.hash.length !== 0) {
            window.scrollTo(window.scrollX, window.scrollY - 75); 
          }
        }
        $(document).on('click', 'a[href^="#"]', function(event) {
          window.setTimeout(function() {
            offsetAnchor();
          }, 0);
        }); 
        </script>
        <script>
            document.addEventListener('WebComponentsReady', function () {
                var loaderWrapper = document.getElementById("loader-wrapper");
                loaderWrapper.style.opacity = "0";
                setTimeout(function(){
                    loaderWrapper.style.display = "none";
                },300);
            });

            function scrl() {
                document.getElementById("catalog1").style.top = '65px';
            }
            var x;
            function stlng(id) {
                document.getElementById('acad').style.color = '#595959';
                document.getElementById('adm').style.color = '#595959';
                document.getElementById('feest').style.color = '#595959';
                document.getElementById('finance').style.color = '#595959';
                document.getElementById('place').style.color = '#595959';
                document.getElementById('stud').style.color = '#595959';

                x = id;
                document.getElementById(x).style.color = "#fff";
            }

            function initialize()
            {
                generateRecommendations();
                getQuestions("");
            }

            function logEvent(id)
            {
                college = document.getElementById('hidden-college').innerHTML;
                label = document.getElementById('label-'+id);
                console.log(id);
                if(label != undefined)
                {
                    text = label.innerHTML;
                    result = text.split('-');
                    if(result[2]!=undefined)
                        type = "TYPE_ATTRIBUTE";
                    else
                        type = "TYPE_STRUCTURE";
                    url = "/log/addtolog/";
                    console.log(text);
                    console.log(type);

                    $.ajax
                    (
                        {
                        type: "post",
                        cache: false,
                        url: url,
                        data : { action: "COLLEGE_NODE", text: text, type: type},
                        async:true,
                        }
                    );
                }
            }

            function generateRecommendations()
            {
                college = document.getElementById('hidden-college-name').innerHTML;
                url = "/college/getrecommendation/";
                $.ajax
                (
                    {
                    type: "post",
                    cache: false,
                    url: url,
                    data : { college : college },
                    success: function(response)
                    {
                        $('#recommendations1').html("");
                        var obj = JSON.parse(response);
                        if(obj.length>0)
                        {
                            try
                            {
                                $.each(obj,function(i,val)
                                {
                                    var recomdiv_id = document.getElementById("college-recommendations");
                                    if(i==0){

                                        $(recomdiv_id).append('<div class = "recommendations1top"><a style = "color:grey;" href="/college/details/'+id_encode(val.COLL_ID)+'"><iron-icon icon="account-balance" style="color:grey; padding-right:10px;" class="x-scope iron-icon-0"><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" class="style-scope iron-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g class="style-scope iron-icon"><path d="M4 10v7h3v-7H4zm6 0v7h3v-7h-3zM2 22h19v-3H2v3zm14-12v7h3v-7h-3zm-4.5-9L2 6v2h19V6l-9.5-5z" class="style-scope iron-icon"></path></g></svg></iron-icon>'+val.COLL_NAME+'</a></div>');
                                    }else{

                                    }
                                });
                            }
                            catch(e)
                            {
                                console.log('Exception while request..');
                            }
                        }
                        else
                        {
                            $('#recommendations1').html($('<li/>').text("Our bots are fine tuning the results."));
                        }
                    }
                    }
                );
            }

            function getQuestions(id)
            {
                college = document.getElementById('hidden-college').innerHTML;
                url = "/college/getQuestionsNew/";
                tags = new Array();
                tags.push($('#collegeName').html());
                //
               // console.log(tags);
                //tags = tags.replace(/\s+/g, '');
                //alert(tags);
                //tags = tags.trim();

                //get node's parent's label keep getting
                if(id != "")
                {
                    while(id != "0")
                    {
                        tagLabel = document.getElementById('label-'+id);
                        if(tagLabel != undefined)
                        {
                            tag = tagLabel.innerHTML;
                            tags.push(tag);
                            index = id.lastIndexOf('_');
                            if(index != -1)
                                id = id.slice(0,index);
                        }
                    }
                }
               
                $.ajax
                (
                    {
                    type: "post",
                    cache: false,
                    data : { tags : tags },
                    url: url,
                    success: function(response)
                    {
                        $('#questions1').html("");
                        var obj = JSON.parse(response);
                        if(obj.length>0)
                        {
                            try
                            {
                                $.each(obj,function(i,val)
                                {
                                    //alert(val.question);
                                    if(i == 0)
                                    {
                                        
                                        $('#questions1').append('  <div class="recommendations1top"><a style = "color:grey;" href="/Communication/showQuestion?qid='+val.qid+'">'+val.question+'</a></div>');   
                                    }
                                    else
                                    {
                                        $('#questions1').append('<div class="recommendations1"><a style = "color:grey;" href="/Communication/showQuestion?qid='+val.qid+'">'+val.question+'</a></div>');
                                    }
                                    
                                //  $('#questions1').append('Upvotes : '+val.upvotes+' Downvotes : '+val.downvotes+ ' Comments : '+val.comments+'<br/>');
                                });
                            }
                            catch(e)
                            {
                                console.log('Exception while request..');
                            }
                        }
                    }
                    }
                );
            }

            $(document).ready(
            function()
            {
            $("#searchBar").on("keyup focus",function()
            {
                if($("#searchBar").val().length>2)
                {
                    $.ajax({
                            type: "post",
                            url: "/main/auto_search",
                            cache: false,
                            data:'search='+$("#searchBar").val(),
                            success: function(response)
                            {
                                $('#results').html("");
                                var obj = JSON.parse(response);
                                if(obj.length>0)
                                {
                                    try
                                    {
                                        $.each(obj,function(i,val)
                                        {
                                            $('#results').append('<a style="text-decoration:none;" href="/college/details/'+encode_id(val.COLL_ID)+'"><div class="searchItem">'+val.COLL_NAME+'</div></a>');
                                        });
                                    }
                                    catch(e)
                                    {
                                        alert(e);
                                        alert('Exception while request.');
                                    }
                                }
                            }
                        });
                }
            return false;
            });

            $("#searchBar").blur(function(){
                setTimeout(function(){
                    $('#results').html("");
                },100);
            });
            });
        </script>
    </head>

    <body onload = "initialize()">
        <div id="loader-wrapper">
        </div>
        <app-drawer-layout fullbleed responsive-width="1024px">
            <?php include "common_components/psycho-struct.php" ?>
            <app-drawer>
                <?php include "common_components/app-drawer.php" ?>
            </app-drawer>

            <app-header-layout>
                <app-header fixed effects="waterfall">
                    <?php include "common_components/app-header.php" ?>
                </app-header>

                <div id="container" class="mainCon">

                    <?php include "common_components/question-fab.php" ?>

<!-- -->
                    <div id="coverPicContainer">
                        <div id="map"></div>
                        <div id="grad">
                        <div id="name-holder">
                        <div id="collegeName"><?php echo $college['college'];?></div>
                        <div id="address">

                                <iron-icon icon="room" style="color: #e53935"></iron-icon>

                            <span><?php echo $college['city']; ?></span>
                        </div>
                        </div>
                        </div>
                    </div>


                    <div id="mid-container" class="flex-container-desktop">

    <!--<iron-selector selected="item2" attr-for-selected="id">
        <div id="item0">Item 0</div>
        <div id="item1">Item 1</div>
        <div id="item2">Item 2</div>
        <div id="item3">Item 3</div>
        <div id="item4">Item 4</div>
      </iron-selector> -->
      <paper-card id="catalog1">

    <div class="card-content"><b>Catalog</b></div>
    <div id="catalog">
            <iron-selector attr-for-selected="id" onclick="scrl();">
            <div class="outsty" id="Cat-Academics"><iron-icon id="schoolIcon" icon="social:school"></iron-icon><a class="asty" id="acad" onclick="stlng(id);" href="#Academics">
            <div class="cat-items">Academics</div></a></div>
            <div class="outsty" id="Cat-Admissions"><iron-icon id="schoolIcon" icon="icons:class"></iron-icon><a class="asty" id="adm" onclick="stlng(id);" href="#Admissions">
            <div class="cat-items">Admissions</div></a></div>
            <div class="outsty" id="Cat-Expenses"><iron-icon id="schoolIcon" icon="icons:account-balance-wallet"></iron-icon><a class="asty" id="feest" onclick="stlng(id);" href="#Expenses">
            <div class="cat-items">Costs, Expenses & AID</div></a></div>
            <div class="outsty" id="Cat-Career"><iron-icon id="schoolIcon" icon="social:school"></iron-icon><a class="asty" id="finance" onclick="stlng(id);" href="#Career">
            <div class="cat-items">Career</div></a></div>
            <div class="outsty" id="Cat-Infra"><iron-icon id="schoolIcon" icon="icons:class"></iron-icon><a class="asty" id="place" onclick="stlng(id);" href="#Infrastructure">
            <div class="cat-items">Infrastructure</div></a></div>
             <div class="outsty" id="Cat-Students_Culture"><iron-icon id="schoolIcon" icon="icons:account-balance-wallet"></iron-icon><a class="asty" id="stud" onclick="stlng(id);" href="#Students_Culture">
            <div class="cat-items">Students & Culture</div></a></div>
          </iron-selector>

    </div>
    </paper-card>
						<div id="main" class="flex-desktop-2">
							<?php
								$tree = json_decode($jsons);
								//echo $jsons;
								$string = "";
								$id = 1;
								$child_level = 1;
								//$level = 3;
									for($j = 0;$j < count($tree->children)-1;$j++){
										$aria_expanded = "opened";
										$label = $tree->children[$j]->label;
										$child_id =  $label . $id ;
										$toggle_id = "'#".$child_id . "'";
										//echo $tree->children[$j]->label."<br>";
                                        if($label == 'Students_Culture') $head_label = 'Students & Culture';
                                        else $head_label = $label;
										$string = $string . '<div class="heading1" id="'.$label.'" aria-expanded$= "[[isExpanded('.$aria_expanded.$id.')]]" aria-controls="'.$child_id.'" onclick="toggle('.$toggle_id.')">'.$head_label.'</div>';
										//$aria_expanded = "opened3";
										if($label == "Academics"){
											$flag = 1;
											$string =$string.'<div class="deter">';
											for($i=0;$i<5;$i++) 
											{ $string = $string.'<div class="detbord"><p class="dettext">'.$academics[0][$i].'</p><p class="detstat">'.$academics[1][$i].'</p><center><p class="category-detail" >'.$academics[2][$i].'</p></center></div>';}
										    $string =$string.'</div>';
											$sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
										}
                                        else if($label == "Admissions"){
                                            $flag = 2;
                                            $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                                        }
                                        else if($label == "Expenses"){
                                            $flag = 3;
                                            $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                                        }

                                        else if($label == "Infrastructure"){
                                            $flag = 4;
                                            $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                                        }
                                        else if($label == "Students_Culture"){
                                            $flag = 5;
                                            $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                                        }
                                        else{
											$flag = 0;
											$default_opened = 0;
											$sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
										}
										$string = $string . $sub_str["string"] . "</div></iron-collapse>";
										//$string = $string . buildTree($tree->children[$j]->children,$string,$aria_expanded,$label,$id);
										//echo "hello";
									}



								function buildTree($tree,$aria_expanded,$label,$id,$child_level, $flag = 0, $default_opened = 0)//$string,$aria_expanded,$label,$id)
								{
									$string = "";
									//echo json_encode($tree)."hello<br><br>";
									$child_level = $child_level + 1;
									if($child_level > 5){
										$child_level = 6;
									}
									$indent = "";
									$heading = $child_level - 1;
									//if($heading>2){

										for($index = 0; $index<$heading; $index++){
											$indent = $indent . "&nbsp;&nbsp;";
										}
									//}
									$div_category = '<div class = "category-name" >';
									$div_results = '<div class = "results">';
									$end_div = '</div>';
									$div_categorydetail = '<div class = "category-detail" >';
									$div_resultsdetail = '<div class = "result-detail" >';
									//echo $child_level;
									if($child_level<=3 || $default_opened == 1){

										$string = $string .  '<iron-collapse id="'.$label.$id.'" tabindex="0" opened = "{{'.$aria_expanded.$id.'}} "  data-label= '.$child_level.'>';
									}
                                    else{
										$string = $string .  '<iron-collapse style="border-left: 4px solid #0277bd; margin-left: 1px;" id="'.$label.$id.'" tabindex="0" data-label='.$child_level.'>';
									}
									// if($heading == 1){
									//  	$heading = 2;
									// }

									if($child_level == 2){
										$string = $string . '<div class = "content" >';
									}

									$value = array();

									for($i=0;$i<count($tree->children);$i++){
										$value[$i] = "";
										//echo $tree->children[$i]->label." ";
										if(strpos($tree->children[$i]->id, "attribute") == false){
											$value[$i] = $value[$i]. $div_results;
											for($ind = 0;$ind< count($tree->children[$i]->children);$ind++){
												if(strpos($tree->children[$i]->children[$ind]->id, "attribute") == true && $tree->children[$i]->children[$ind]->summary == 1){
												$value[$i] = $value[$i]."  ".$tree->children[$i]->children[$ind]->value.$div_resultsdetail.$tree->children[$i]->children[$ind]->footer_value.$end_div;
												}
                                                
											}
											$value[$i] = $value[$i] .$end_div;
										}
										//echo "alert(".$value[$i].")<br>";
									}
									for($i=0,$acad_flag=1,$exp_flag=1,$infra_flag=1,$stud_flag=1,$car_flag=1;$i<count($tree->children);$i++)
									{
                                        

										$id = $id + 1;
										if ($id <= $level){
											$optional = 'aria-expanded$='. '"[[isExpanded('.$aria_expanded.$id.')]]"' ;
										}else{
											$optional = "";
										}
										//echo $id."<br><br>";
										$toggle_id = "'#" . $label.$id ."'";
										if(!(array)$tree->children[$i]->children){

											if(strpos($tree->children[$i]->id, "attribute") ==true){
                                                    

													if($flag == 1){
														$string = $string .'<div class="desc" style="margin-left: 6%;display: flex;justify-content: center;align-items: center;">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
														$default_opened = 0;
													}
                                                    else if($flag == 2)
                                                    {
                                                        $attr_id = explode("-",$tree->children[$i]->id);
                                                        
                                                        /*
                                                            Values are hardcoded It will change based on database
                                                        */

                                                        if($attr_id[3] < '83' && $attr_id[3] > '23')
                                                        {
                                                            
                                                            if($acad_flag == 1)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b> ACADEMIC CRITERIA</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $acad_flag = 2;
                                                            }
                                                        }
                                                        else if($attr_id[3] > '82')
                                                        {
                                                            if($acad_flag == 2 or $acad_flag == 1)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b> NON ACADEMIC CRITERIA</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $acad_flag = 3;
                                                            }
                                                        }
                                                        if($attr_id[3] < '23')
                                                        {
                                                            $string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
                                                        }

                                                        else
                                                        {
                                                            $string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
                                                        }
                                                        
                                                        $default_opened = 0;
                                                    }
                                                    else if($flag == 3)
                                                    {
                                                        $attr_id = explode("-",$tree->children[$i]->id);
                                                        

                                                        /*
                                                            Values are hardcoded It will change based on database
                                                        */

                                                        if($attr_id[3] > '131' && $attr_id[3] < '141')
                                                        {
                                                           
                                                            if($exp_flag <= 2)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>AID/SCHOLARSHIP</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                              $exp_flag = 3;
                                                            }
                                                        }
                                                        
                                                        if($attr_id[3] < '108' && $attr_id[3] > '103')
                                                        {
                                                            $string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$attr_id[3].$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
                                                        }
                                                        else if($attr_id[3] < '120' && $attr_id[3] > '107')
                                                        {
                                                            $string = $string .  '<div class="desc2">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
                                                        }
                                                        else
                                                        {
                                                            $string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';

                                                        }
                                                        
                                                        $default_opened = 0;
                                                    }
                                                     else if($flag == 4)
                                                    {
                                                        $attr_id = explode("-",$tree->children[$i]->id);
                                                        
                                                        /*
                                                            Values are hardcoded It will change based on database
                                                        */

                                                        if($attr_id[3] > '182' && $attr_id[3] < '195')
                                                        {
                                                            
                                                            if($infra_flag == 1)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b> HOSTEL/BOARDING</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $infra_flag = 2;
                                                            }
                                                        }
                                                        else if($attr_id[3] < '220' && $attr_id[3] > '194' )
                                                        {
                                                            if($infra_flag <= 2)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>FOOD</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $infra_flag = 3;
                                                            }
                                                        }
                                                        else if($attr_id[3] < '304' && $attr_id[3] > '219')
                                                        {
                                                            if($infra_flag <= 3)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>SPORTS</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $infra_flag= 4;
                                                            }
                                                        }
                                                        else if($attr_id[3] < '328' && $attr_id[3] > '303' )
                                                        {
                                                            if($infra_flag <= 4 )
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>CLASSROOMS</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $infra_flag = 5;
                                                            }
                                                        }
                                                        else if($attr_id[3] < '356' && $attr_id[3] > '327' )
                                                        {
                                                            if($infra_flag <= 5)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>OTHERS</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $infra_flag = 6;
                                                            }
                                                        }

                                                            $string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
                                                        
                                                        
                                                        $default_opened = 0;
                                                    } 
                                                    else if($flag == 5)
                                                    {

                                                        $attr_id = explode("-",$tree->children[$i]->id);
                                                        /*
                                                            Values are hardcoded It will change based on database
                                                        */


                                                        if($attr_id[3] < '384' && $attr_id[3] > '355')
                                                        {
                                                            
                                                            if($stud_flag == 1)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b> NIGHTLIFE</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $stud_flag = 2;
                                                            }
                                                        }
                                                        else if($attr_id[3] < '400' && $attr_id[3] > '383' )
                                                        {
                                                            if($stud_flag <= 2)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>FESTS</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $stud_flag = 3;
                                                            }
                                                        }
                                                         else if($attr_id[3] < '418' && $attr_id[3] > '399' )
                                                        {
                                                            if($stud_flag <= 3)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>CRIME ON CAMPUS</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $stud_flag = 4;
                                                            }
                                                        }
                                                        else if($attr_id[3] < '434' && $attr_id[3] > '417' )
                                                        {
                                                            if($stud_flag <= 5)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>STUDENT COMPOSITION</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $stud_flag = 6;
                                                            }
                                                        }
                                                        else if($attr_id[3] < '448' && $attr_id[3] > '433' )
                                                        {
                                                            if($stud_flag <= 6)
                                                            {
                                                               $string = $string.'<div class="desc"> <div class="category-name"><b>STUDENT ORGANISATIONS</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                               $stud_flag = 7;
                                                            }
                                                        }
                                                       
                                                            $string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
                                                      
                                                        
                                                        $default_opened = 0;
                                                    }
                                                    else{

														$string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
														$default_opened = 0;
													}
											}else{
												if($child_level == 2){
													if($flag == 0){

														$string = $string . '<div class="desc" >'.$div_category."<i style=font-size:12px >Varies with streams of study </i>".$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.'</b></div>';
														$default_opened = 0;
													}

                                                    else{
														$string = $string . '<div class="desc"><b style="color: #4db6ac;">'.$div_category.$tree->children[$i]->label.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.'</b></div>';
														$default_opened = 0;
													}
												}else{

													$string = $string . '<div class="heading'.$heading.'"  aria-controls="'.$label.$id.'">'.$div_category.$tree->children[$i]->label.$end_div.$value[$i].'</div>';
													$default_opened = 0;
												}
											}

										}else{
											if(strpos($tree->children[$i]->id, "attribute") ==true){
                                                
                                                if($flag == 3)
                                                {

                                                    $attr_id = explode("-",$tree->children[$i]->id);

                                                    /*
                                                        Values are hardcoded It will change based on database
                                                    */

                                                    if($attr_id[3] < '120' && $attr_id[3] > '103')
                                                    {
                                                        
                                                        if( $exp_flag == 1)
                                                        {
                                                           $string = $string.'<div class="desc"> <div class="category-name"><b> EXPENSES </b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                           $exp_flag = 2;
                                                        }
                                                    }
                                                    else if($attr_id[3] > '119' && $attr_id[3] < '134')
                                                    {
                                                        if($exp_flag == 2 or $exp_flag == 1)
                                                        {
                                                           $string = $string.'<div class="desc"> <div class="category-name"><b>AID/SCHOLARSHIP</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                          $exp_flag = 4;
                                                        }
                                                    }
                                                }
                                                else if($flag == 5)
                                                {

                                                    $attr_id = explode("-",$tree->children[$i]->id);
                                                    /*
                                                    $attr_id = explode("-",$tree->children[$i]->id);
                                                    if($attr_id[3] == '385')
                                                    {
                                                        echo '<script>console.log('.$stud_flag.') </script>';
                                                    }
                                                    */
                                                    /*
                                                        Values are hardcoded It will change based on database
                                                    */

                                                    if($attr_id[3] < '400' && $attr_id[3] > '383' )
                                                    {
                                                        if($stud_flag == 2)
                                                        {
                                                           $string = $string.'<div class="desc"> <div class="category-name"><b>FESTS</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                                           $stud_flag = 3;
                                                        }
                                                    }
                                                }
												if($heading == 1)
                                                {
                                                    $string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
                                                    $default_opened = 0;
														
												}
                                                else
                                                {
													$string = $string .  '<div class="desc" aria-controls="'.$label.$id.'" onclick="toggle('.$toggle_id.')">'.$div_category.$tree->children[$i]->label.': '.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.$div_results.$tree->children[$i]->value.$div_resultsdetail.$tree->children[$i]->footer_value.$end_div.$end_div.'</div>';
													$default_opened = 1;
												}
											}else{

												if($child_level == 2){
													
                                                    if($flag == 0){

														$string = $string . '<div class="desc" >'.$div_category."<i style=font-size:12px>Varies with streams of study </i>".$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.'</b></div>';
														$default_opened = 0;
													}
                                                    else if ($flag == 2 or $flag == 3 )
                                                    {
                                                        $string = $string . '<div class="desc">'.$div_category."<i style=font-size:12px>Varies with streams of study</i>".$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.'</b></div>';
                                                        $default_opened = 0;
                                                        $acad_flag = 1;
                                                    }
                                                    else if($flag!=5 and $flag!= 4){
                                                        
														$string = $string . '<div class="desc"><b style="color: #4db6ac;">'.$div_category.$tree->children[$i]->label.$div_categorydetail.$tree->children[$i]->footer_comment.$end_div.$end_div.'</b></div>';
														$default_opened = 0;
													}
												}else if($flag!=5 and $flag!= 4){

													$string = $string .  '<div style="display: flex; align-items: center; justify-content: center;" class="heading'.$heading.'" id="h'.$heading.'" aria-controls="'.$label.$id.'"'.$optional.'onclick="toggle('.$toggle_id.'); myFunch'.$heading.'();">'.$div_category.'<iron-icon class="inew" icon="icons:add-circle-outline" id="checkIcon" data-args="0"></iron-icon> <span>'.$tree->children[$i]->label.$end_div.$value[$i].'</span></div>';
													$default_opened = 0;
												}
											}
										}
                                        if($flag!=5)
                                        {
                                            $sub_str = buildtree($tree->children[$i],$aria_expanded,$label,$id,$child_level,$flag, $default_opened);
                                            $string = $string . $sub_str["string"];    
                                        }
										
                                        $string = $string . "</iron-collapse>" ;
										$id = $sub_str["id"];
									}

									return array("string"=>$string,"id"=>$id);
								}

								echo $string;
							?>


						</div>

						<div id="recommendations" class="flex-desktop">
							<!--
							<paper-card id="recomCard">

								<div class="card-content" id = "college-recommendations"><b> Also viewed</b></div>
							</paper-card>
							-->
							<paper-card id="recomCard">
								<div class="card-content"><b>Related Questions</b></div>
								<div id="questions1">
								</div>
							</paper-card>
							<paper-card id="leaderboard">
								<div id="people">
									<div class="people-content"><b>Top Contributors</b></div>
									<?php
										$tree = json_decode($jsons);
										
                                        for($i=0;$i<sizeof($tree->children[6]->children);$i++){

											if($i==0)
											{
												echo '<div class="people1top" style="display: flex; align-items:center;">';	
											}
											else if($i == sizeof($tree->children[6]->children)-1)
											{
												echo '<div class="people1bottom">';		
											}
											else
											{
												echo '<div class="people1">';	
											}
											//echo '</div>';
                                                
                                            echo '<iron-icon id="schoolIcon" icon="icons:perm-identity"></iron-icon><a class="ascol" href = "/user/profilepublic/'.$tree->children[6]->children[$i]->id.'">'.$tree->children[6]->children[$i]->Display_Name.'</a></div>'; 
										}
									?>
								</div>
							</paper-card>
						</div>
					</div>
					<p hidden id="hidden-college-name"><?php echo $college["college"]; ?></p>
					<p hidden id="hidden-college"><?php echo encode_id($collegeid);?></p>
				</div>

				<footer>
		    		<?php include "common_components/footer.php" ?>
		    	</footer>

			</app-header-layout>
		</app-drawer-layout>

		<!-- <script type="text/javascript" src="/assets/js/toolbarSearch.js"></script> -->
		<script type="text/javascript" src="/assets/js/commonScript.js"></script>
		<script>
			// var secondaryToolbar = document.createElement("div");
			// secondaryToolbar.setAttribute("id","nav-header");
			// document.getElementsByTagName("app-header")[0].appendChild(secondaryToolbar);
			var headerArray = [];
			<?php
				for($j = 0;$j < count($tree->children);$j++){
					$label = "0_".$j;
					echo 'headerArray['.$j.'] = [["'.$label.'","'.$tree->children[$j]->label.'"]]; ';//two dimensional array, [["0","Home"],["0_0","Engineering"]] : [[id, label]]
				}
			?>

			function flagging(backid,frontid)
			{
				var label = document.getElementById('label-'+frontid).innerHTML;
				var resp_id = prompt(<?php
						echo "'";
						 for($k=0;$k<sizeof($flag);$k++)
						 	{
						 		echo $flag[$k]['R_ID'].'.'.$flag[$k]['Response'].'  ';
						 		// echo "\"hi\"";
							}
							echo ".  Please choose a reason'";

					 ?>);

				var college = <?php echo encode_id($collegeid);?>;
				$.ajax({
					type: "POST",
					url: "/college/flag/",
					data: {'college':college,'id':backid,'resp_id':resp_id},
					success: function(data)
					{
						alert(data);
					}
				});
			}

			function getFlag()
			{
				$.ajax({
					type: "POST",
					url: "/college/flagresponse/",

				});
			}

			function removeFromHeader(headerNo)
			{
				headerArray[headerNo].pop();
			}

			function removeTillRight(id,headerNo)
			{
				for(i = 0;i < headerArray[headerNo].length; i++){
					if(headerArray[headerNo][i][0] == id){
						break;
					}
				}
				headerArray[headerNo] = headerArray[headerNo].slice(0,i+1);
			}

			function addToHeader(id,headerNo)
			{
				var headerLabel = document.getElementById('label-'+id);
				if(headerLabel != null)
				{
					headerLabel = headerLabel.innerHTML;
					var headerElement = [id,headerLabel]
					headerArray[headerNo].push(headerElement);
					// $('#header').append('<paper-button class="label" onclick="selectIronPage(\''+id+'\',3)">'+header+' >> </paper-button>');
				}

			}

			function selectIronPage(id,source,ironPagesNo)
			{
				document.getElementsByTagName('iron-pages')[ironPagesNo].select(id);
				if(source == 1)	// BACK Button
					removeFromHeader(ironPagesNo);
				else if(source == 2)	// DATA-ELEMENT Button
					addToHeader(id,ironPagesNo);
				else //HEADER BUTTON
					removeTillRight(id,ironPagesNo);
				printHeader(ironPagesNo);
				getQuestions(id);
				logEvent(id);
				//also getQuestion()
				//also addToLog()
			}

			function printHeader(headerNo){
				var header = document.getElementById("nav-header"+headerNo);
				header.innerHTML = "";

				for(i = 1;i < headerArray[headerNo].length;i++){
					var headerButton = document.createElement("paper-button");
					var text = document.createTextNode(headerArray[headerNo][i][1] + " >>");
					headerButton.appendChild(text);
					headerButton.setAttribute("onclick","selectIronPage('"+headerArray[headerNo][i][0]+"',3,"+headerNo+")");
					header.appendChild(headerButton);
				}

			}
		</script>
         <script>
    var flag2 = -1;
    var flag3 = -1;
    var flag4 = -1;
    function encode_id(id){
        var encoded_id;
       
        $.ajax({
            type: "post",
            url: "/College/encode_id/"+id,
            cache: false,
            async:false,
            success: function(response)
            {

                 encoded_id = this.url;
            }
        });
        return encoded_id;
    }
    function toggle(selector) {
        document.querySelector(selector).toggle();
        var x = selector.slice(1);
    }
    function myFunch2() {
        if(flag2==0) {
            flag2 = -1;
            document.getElementById('h2').style.borderLeft = "none";
        }
        else {
            flag2 = 0;
            document.getElementById('h2').style.borderLeft = "4px solid #0277bd";
            document.getElementById('h2').style.marginLeft = "1px";
        }
    }
    function myFunch3() {
        if(flag3 ==0) {
            flag3  = -1;
            document.getElementById('h3').style.borderLeft = "none";
        }
        else {
            flag3 = 0;
            document.getElementById('h3').style.borderLeft = "4px solid #0277bd";
            document.getElementById('h3').style.marginLeft = "1px";
        }
    }
    function myFunch4() {
        if(flag4==0) {
            flag4 = -1;
            document.getElementById('h4').style.borderLeft = "none";
        }
        else {
            flag4 = 0;
            document.getElementById('h4').style.borderLeft = "4px solid #0277bd";
            document.getElementById('h4').style.marginLeft = "1px";
        }
    }


  document.querySelector('template[is=dom-bind]').isExpanded = function(opened) {
    return String(opened);
  };

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

<?php
	//$tree = json_decode($college);
	//$tree = $college;
	$a = $college['latitude'];
	$b = $college['longitude'];
	echo ("<script>function initMap() {
        var uluru = {lat:" . $a. "," ."lng:". $b."};
        //console.log(uluru);
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru,
          scrollwheel: false
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }</script>");
    echo ("<script async defer
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAOI2Ji2NcIMnmB9CM6Gd2DclE1RCgjbbg&callback=initMap'></script>");
?>
	</body>
</html>