 <!DOCTYPE html>
<html lang="en">
    <head>
        <title>College Comparison Page</title>
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
        <!-- <script type="text/javascript" src="/assets/js/encode_req.js"></script> -->

        <style is="custom-style" include="shared-css iron-flex iron-flex-alignment">
    .my-selected {
      background: red;
    }
        .results1 {
            /*display: inline-block;*/
            /*width: 48%;*/
            /*text-align: right;*/
            /*padding-right: 15px;*/
            float: right;
            padding-left: 8px;
            padding-right: 8px;
            color: #1e88e5;
            display: inline-block;
            /*padding-top: 10px;*/
            /*padding-bottom: 3px;*/
            font-size: 13px;
            border-left: 1px rgba(0, 0, 0, 0.12) solid;
            /*margin-top: 5px;*/
            text-align: right;
            display: flex;
            flex-direction: column;
            flex: 1;
            align-items: center;
            justify-content: center;
        }
        .results2 {
            float: right;
            padding-right: 8px;
            color: #e53935;
            display: inline-block;
            /*padding-top: 10px;*/
            /*padding-bottom: 3px;*/
            font-size: 13px;
            border-left: 1px rgba(0, 0, 0, 0.12) solid;
            /*margin-top: 5px;*/
            padding-left: 8px;
            text-align: right;
            display: flex;
            flex-direction: column;
            flex: 1;
            align-items: center;
        }
            .heading2 .results1 {
            /*display: inline-block;*/
            /*width: 48%;*/
            /*text-align: right;*/
            /*padding-right: 15px;*/
            float: right;
            padding-left: 8px;
            /*color: red;*/
            display: inline-block;
            /*padding-top: 10px;*/
            /*padding-bottom: 3px;*/
            font-size: 13px;
            border-left: 1px rgba(0, 0, 0, 0.12) solid;
            /*margin-top: 5px;*/
            display: flex;
            flex-direction: column;
            flex: 1;
            align-items: center;
        }
        .heading2 .results2 {
            float: right;
            padding-right: 8px;
            /*color: blue;*/
            display: inline-block;
            /*padding-top: 10px;*/
            /*padding-bottom: 3px;*/
            font-size: 13px;
            border-left: 1px rgba(0, 0, 0, 0.12) solid;
            /*margin-top: 5px;*/
            padding-left: 8px;
            display: flex;
            flex-direction: column;
            flex: 1;
            align-items: center;
        }
            .category-name {
            display: inline-block;
            width: 45%;
        }
        .category-detail {
            /*display: inline-block;*/
            /*width: 47%;*/
            font-size: 10px;
            padding-top: 4px;
            /*color: #bdbdbd;*/
            /*width: 50%;*/
            opacity: 0.6;
        }
        .result-detail {
            /*display: inline-block;*/
            /*width: 47%;*/
            font-size: 9px;
            padding-top: 2px;
            /*color: #bdbdbd;*/
            opacity: 0.6;
            text-align: center;
            /*width: 30%;*/
        }
        .results {
            display: inline-block;
            /*width: 48%;*/
            /*text-align: right;*/
            /*padding-right: 15px;*/
            float: right;
            font-size: 15px;
            font-weight: 400;
            text-align: right;
            width: 55%;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }
         .heading1 {
            padding: 20px 15px;
            margin-top: 21px;
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
        display: flex;
        align-items: center;
    }
    .dnt {
        margin-left: 30px; 
        margin-right: 15px;
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
        padding-top: 16px;
        padding-bottom: 16px;
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
        padding-top: 16px;
        padding-bottom: 16px;
        color: #6f6f6f;
        border-bottom: 1px #f4f4f4 solid;
      }
      .card {
        @apply(--shadow-elevation-2dp);
        background-color: #ffffff;
        font-size: 15px;
        color: #404040;
      }
      .content {
        padding-top: 15px;
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
                .dec {
                    /*display: inline-block;*/
                    /*margin-left: 30%;*/
                    /*margin-right: 30%;*/
                    /*width: 100%;*/
                    /*float: none;*/
                    margin: 0 auto;
                    margin-left: auto;
                    margin-right: auto;
                    /*margin-left: 30%;*/
                    display: flex;
                    justify-content: center;
                }
                #blue {
                    background-color: #1e88e5;
                    width: 20px;
                    color: #1e88e5;
                    display: inline-block;
                }
                #red {
                    background-color: #e53935;
                    width: 20px;
                    color: #e53935;
                    display: inline-block;
                }
                .college-colors {
                    display: inline-block;
                    margin-right: 5%;
                }
                #college-name {
                    display: inline-block;
                    /*margin-right: 2%;*/
                    color: #060606;
                    padding-left: 3px;
                }
            .ghost, [hidden] {
        display: none;
      }
      .invisible {
        visibility: hidden;
      }
      .flex-desktop {
        padding-right: 0px;
        margin-left: 0px;
        /*background-color: #fefefe;*/
      }
      .detrr {
        height: 100px; 
        background-color: #ececec; 
        width: 100%; 
        display: flex; 
        flex-direction: column; 
        justify-content: center; 
        align-items: center;
    }
    .blocked {
        flex: 1;
    }
    .inrht {
        height: 55px; 
        display: flex; 
        width: 100%;
        border-bottom: 2px solid #ddd;
        border-right: 2px solid #ddd;
    }
    .bottomht {
        height: 48px; 
        display: flex; 
        width: 102%;
    }
            .card-map{
                background-color: var(--special-font-color);
                overflow-x: auto;
                color: white;
            }
            #main {
                margin-bottom: 20px;
                padding-right: 4px;
                padding-left: 4px;
            }
            #mid-container{
                width: 100%;
                margin: 0 auto;
                margin-top: 10px;
                margin-right: 2px;
                margin-left: 2px;
                background-color: fcfcfc;
            }
            #container{
                background-color: #fefefe;
                width: 90%;
                margin-left: 5%;
            }
            #treeCard{
                width: 100%;
                display: block;
                margin: 0 auto;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            #recommendations {
                margin-top: 18px;
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
                /*padding: 5% 0%;*/
                display: block;
                /*margin: 20px auto;*/
                background-color: #f4f4f4;
                color: white;
                margin-right: 6px;
                text-align: center;
                margin-top: 39px;
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
                background-color: white;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 30px;
                font-size: 13px;
                /*border-bottom: 1px #f4f4f4 solid;*/
            }
            #recomCard .recommendations1top{
                background-color: white;
                text-align: left;
                color: grey;
                /*margin-left: 5px;*/
                /*margin-right: 5px;*/
                padding-top: 20px;
                padding-bottom: 10px;
                padding-left: 30px;
                font-size: 13px;
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
                font-size: 13px;
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
                padding-left: 30px;
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
                padding-left: 30px;
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
                padding-left: 30px;
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
            #main {
            /*width: 90%;*/
            padding-bottom: 10%;
            margin-left: 8px;
            margin-right: 8px;
            margin-left: 13.6%;
          }
    .inrstl {
        height: 45px; 
        display: flex; 
        width: 100%; 
        align-items: center; 
        justify-content: center;
    }
    .wd {
        width: 20%;
    }
    .spwd {
        padding-left: 5px;
        padding-right: 5px;
    }
    .a1 {
        display: flex; 
        flex: 1; 
        justify-content: center;
        height: 45px;
        align-items: center;
        width: 20%;
    }
    .a2 {
        display: flex; 
        flex: 1; 
        justify-content: center;
        border-right: 2px solid #ddd;
        height: 45px;
        align-items: center;
        color: #e53935;
        font-weight: 400px;
    }
    .a3 {
        display: flex; 
        flex: 1; 
        justify-content: center;
        border-right: 2px solid #ddd;
        height: 45px;
        align-items: center;
        color: #1e88e5;
        font-weight: 400px;
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
                border-right: 2px solid #ddd;
            }
            .dettext {
                color: #595959; 
                display: flex; 
                align-items: center; 
                opacity: 0.7; 
                font-weight: 500; 
                font-size: 13px;
                display: flex; 
                justify-content: center; 
                text-align: center; 
                width: 100%;
                height: 55px;
            }
            .detstat {
                font-weight: 400; 
                font-size: 15px;
                text-align: center;
            }
            .deter {
                display: flex; 
                justify-content: center;
                align-items: center;
                background-color: #ececec; 
                width: 100%;
                height: 100px;
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
                    margin-top: 20px;
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
                /*margin-bottom: 20px;*/
            }
            #collegeName, #address{
                position: absolute;
                bottom: 45px;
                /*bottom: 60px;*/
                padding-left: 50px;
                color: #ffffff;
                font-size: 34px;
            }
            #address{
                bottom: 20px;
                /*bottom: 35px;*/
                font-size: 24px;
            }
            #grad {
                position: absolute;
                width: 100%;
                background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.45) 100%), no-repeat;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 0)), color-stop(59%, rgba(0, 0, 0, 0)), color-stop(100%, rgba(0, 0, 0, 0.45))), no-repeat;
                background: -webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.45) 100%), no-repeat;
                background: -o-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.45) 100%), no-repeat;
                background: -ms-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.45) 100%), no-repeat;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0) 59%, rgba(0, 0, 0, 0.45) 100%), no-repeat;
                height: 260px;
                bottom:0.5px;
            }
            @media only screen and (max-width : 450px){
                .deter {
                    flex-wrap: wrap;
                }
                .heading2, .heading3, .heading4, .heading5 {
                    padding-left: 25px;
                }
                .dnt {
                    margin-left: 25px;
                }
                .dettext {
                    padding-left: 1px;
                    padding-right: 1px;
                    font-size: 13px;
                    height: 40px;
                }
                .detstat {
                    font-size: 14px;
                }
                .deter .detbord {
                    width: 100%;
                    flex: 1 1 49%;
                    border-right: 2px solid #ddd;
                    border-bottom: 2px solid #ddd;
                }
                .deter .n2 {
                    border-right: none;
                }
                .a1 {
                    display: flex; 
                    flex: 1; 
                    justify-content: center;
                    height: 35px;
                    align-items: center;
                }
                .a2 {
                    display: flex; 
                    flex: 1; 
                    justify-content: center;
                    border-right: 2px solid #ddd;
                    height: 35px;
                    align-items: center;
                    color: #1e88e5;
                    font-weight: 400px;
                }
                .a3 {
                    display: flex; 
                    flex: 1; 
                    justify-content: center;
                    border-right: 2px solid #ddd;
                    height: 35px;
                    align-items: center;
                    color: #e53935;
                    font-weight: 400px;
                }
                .inrht {
                    height: 40px; 
                    display: flex; 
                    width: 100%;
                }
                .bottomht {
                    height: 35px; 
                    display: flex; 
                    width: 100.7%;
                }
                .deter {
                    flex-wrap: wrap;
                    height: auto;
                }
                .deter .blocked {
                    width: 100%;
                    flex: 1 1 49%;
                    border-right: 2px solid #ddd;
                    border-bottom: 2px solid #ddd;
                }
                .deter .n2 {
                    border-right: none;
                }
            }
            @media only screen and (max-width : 400px){
                .dettext {
                    padding-left: 0px;
                    padding-right: 0px; 
                    font-size: 13px;
                }
            }
            @media only screen and (max-width: 600px){
                .detbord {
                    padding-right: 0px;
                    padding-left: 0px;
                    height: 85px;
                }
                .dettext {
                    padding-right: 0px;
                    padding-left: 0px;
                }
            }
            @media only screen and (max-width : 640px){
                #coverPicContainer{
                    height: 300px;
                }
                #main {
                    margin-left: 8px;
                }
                #collegeName{
                    font-size: 34px;
                }
                #address{
                    font-size: 24px;
                }
            }
            @media only screen and (max-width: 769px){
                #coverPicContainer{
                    height: 200px;
                }
                #map {
                    height: 200px;
                }
                #collegeName{
                    font-size: 34px;
                    padding-left: 30px;
                }
                .cat-items {
                    padding-left: 0px;
                    text-align: center;
                }   
                #address{
                    font-size: 24px;
                    padding-left: 30px;
                }
            }
            @media only screen and (max-width : 640px){
                #catalog1 {
                    visibility: hidden;
                    display: none;
                }
                .options {
                    padding-right: 2px;
                }
                #collegeName{
                    font-size: 34px;
                    padding-left: 30px;
                }
                #address{
                    font-size: 24px;
                    padding-left: 30px;
                }
            }
            @media only screen and (max-width : 1000px){
                .detstat {
                    font-weight: 400; 
                    font-size: 13px;
                }
            }
            @media only screen and (max-width : 769px){
                #container {
                    background-color: #fefefe;
                    width: 95%;
                    margin-left: 2.5%;
                }
                .detstat {
                    font-weight: 400; 
                    font-size: 13px;
                }
                .cat-items {
                    padding-left: 0px;
                    text-align: center;
                } 
                #mid-container{
                    width: 110%;
                    margin: 0 auto;
                    margin-top: 10px;
                    margin-right: 0px;
                    margin-left: -5%;
                    background-color: fcfcfc;
                }
                #main {
                    margin-bottom: 20px;
                    padding-right: 0px;
                    padding-left: 0px;
                }
            }
            @media only screen and (max-width : 450px){
                .detstat {
                    font-size: 15px;
                }
                .inrht {
                    border-right: none;
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
                document.getElementById("catalog1").style.top = '75px';
            }
            var x;
            function stlng(id) {
                document.getElementById('acad').style.color = '#595959';
                document.getElementById('adm').style.color = '#595959';
                document.getElementById('feest').style.color = '#595959';
                document.getElementById('finance').style.color = '#595959';
                document.getElementById('place').style.color = '#595959';
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
                                    $('#recommendations1').append('<a href="/college/details/'+id_encode(val.COLL_ID)+'"><div class="recommendedCollege"><paper-ripple style="color: white;"></paper-ripple><iron-icon icon="social:school" style="margin-right: 24px;"></iron-icon>'+val.COLL_NAME+'</div></a>');
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
                                    $('#questions1').append('<paper-card class="questionCard"><div class="card-actions"><a href="/Communication/showQuestion?qid='+val.qid+'"><div class="question">'+val.question+'</div></a><div class="bottom-bar"><div class="views"><iron-icon icon="communication:comment" style = "margin-right:2%;" prefix></iron-icon>'+val.comments+'</div><div class="upvotes"><iron-icon icon="icons:thumb-up" style = "margin-right:2%;" prefix></iron-icon>'+val.upvotes+'</div><div class="downvotes"><iron-icon icon="icons:thumb-down" style = "margin-right:2%;" prefix></iron-icon>'+val.downvotes+'</div>');
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
<!-- -->

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

                <div id="container" style="overflow-x: hidden;">

                    <?php include "common_components/question-fab.php" ?>

<!-- -->



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
            <div class="outsty" id="Cat-Infra"><iron-icon id="schoolIcon" icon="icons:class"></iron-icon><a class="asty" id="place" onclick="stlng(id);" href="#Infra">
            <div class="cat-items">Infrastructure</div></a></div>
             <div class="outsty" id="Cat-Students_Culture"><iron-icon id="schoolIcon" icon="icons:account-balance-wallet"></iron-icon><a class="asty" id="feest" onclick="stlng(id);" href="#Students_Culture">
            <div class="cat-items">Students & Culture</div></a></div>
          </iron-selector>

    </div>
    </paper-card>






<div id="main" class="flex-desktop-2">
    <div id="main" class="flex-desktop-2">
         <div class = "dec">
                <?php
                    $colors = array("red","blue");
                    $string = "";
                    //$college_name = json_decode($college_names);
                    for($index = sizeof($college_names)-1;$index>=0;$index--){
                        $string = $string . '<div class = "college-colors"><div id = '.$colors[$index].'>h</div><div id = "college-name">'.$college_names[$index]["college"] . '</div></div>';
                    }
                    //echo json_encode($college_names[0]["college"]);
                    echo $string;
                ?>
        </div>
        <?php
        $tree = json_decode($final_tree);
        //echo $final_tree;
            $string = "";
            $id = 1;
            $child_level = 1;
            //$level = 3;
                for($j = 0;$j < count($tree->children);$j++){
                    $aria_expanded = "opened";
                    $label = $tree->children[$j]->label[0];
                    $child_id =  $label . $id ;
                    $toggle_id = "'#".$child_id . "'";
                    //echo $tree->children[$j]->label."<br>";
                    $show_label = $label; 
                    if($label == "Students_Culture") $show_label = "Students & Culture";

                    $string = $string . '<div class="heading1" id="'.$label.'" aria-expanded$= "[[isExpanded('.$aria_expanded.$id.')]]" aria-controls="'.$child_id.'" onclick="toggle('.$toggle_id.')">'.$show_label.'</div>';
                    //$aria_expanded = "opened3";
                   if($label == "Academics"){
                        
                        $string =$string.'<div class="deter">';
                        for($i=0;$i<5;$i++) 
                        { $string = $string.'<div class="blocked"><div class="inrht"><p class="dettext wd">'.$academics[0][0][$i].'</p></div>';
                          $string = $string.'<div class="bottomht"><p class="detstat a3">'.$academics[1][1][$i].'</p>
                          <p class="detstat a2">'.$academics[0][1][$i].'</p></div></div>';
                        }
                        
                        $string =$string.'</div>';
                        $flag = 1;
                        $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                   }
                    else if($label == "Admissions"){
                        $flag = 2;
                        $default_opened = 0;
                        $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                    }
                    else if($label == "Expenses"){
                        $flag = 3;
                        $default_opened = 0;
                        $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                    }
                    else if($label == "Infrastructure"){
                        $flag = 4;
                        $default_opened = 0;
                        $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                    }
                    else if($label == "Students_Culture"){
                        $flag = 5;
                        $default_opened = 0;
                        $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                    }
                    else{
                        $flag = 0;
                        $default_opened = 0;
                        $sub_str = buildTree($tree->children[$j],$aria_expanded,$label,$id,$child_level, $flag);
                    }
                    
                    // <div class="deter">
                    //     <div class="blocked">
                    //         <div class="inrht">
                    //             <p class="dettext wd">Class Effectiveness</p>
                    //         </div>
                    //         <div class="bottomht">
                    //             <p class="detstat a2">70%</p>
                    //             <p class="detstat a3">60%</p>
                    //         </div>
                    //     </div>
                    //     <div class="blocked">
                    //         <div class="inrht">
                    //             <p class="dettext wd">Academic Pace</p>
                    //         </div>
                    //         <div class="bottomht">
                    //             <p class="detstat a2">70%</p>
                    //             <p class="detstat a3">60%</p>
                    //         </div>
                    //     </div>
                    //     <div class="blocked">
                    //         <div class="inrht">
                    //             <p class="dettext wd">Daily class hours</p>
                    //         </div>
                    //         <div class="bottomht">
                    //             <p class="detstat a2">70%</p>
                    //             <p class="detstat a3">60%</p>
                    //         </div>
                    //     </div>
                    //     <div class="blocked">
                    //         <div class="inrht">
                    //             <p class="dettext wd">Daily non-class study</p>
                    //         </div>
                    //         <div class="bottomht">
                    //             <p class="detstat a2">5-6</p>
                    //             <p class="detstat a3">2 or less</p>
                    //         </div>
                    //     </div>
                    //     <div class="blocked">
                    //         <div class="inrht">
                    //             <p class="dettext wd">Student evaluation</p>
                    //         </div>
                    //         <div class="bottomht">
                    //             <p class="detstat a2">70%</p>
                    //             <p class="detstat a3">60%</p>
                    //         </div>
                    //     </div>
                    // </div>
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
                    $string = $string .  '<iron-collapse id="'.$label.$id.'" tabindex="0" opened = "{{'.$aria_expanded.$id.'}} " data-label= '.$child_level.'>';
                }else{
                    $string = $string .  '<iron-collapse style="border-left: 4px solid #0277bd; margin-left: 1px;" id="'.$label.$id.'" tabindex="0" data-label='.$child_level.'>';
                }
                // if($heading == 1){
                //      $heading = 2;
                // }
                if($child_level == 2){
                    $string = $string . '<div class = "content" >';
                }
                $value = array();
                for($i=0;$i<count($tree->children);$i++){
                    $value[$i] = "";
                    $samecollege_value = array();
                    //echo $tree->children[$i]->label." ";
                    if(strpos($tree->children[$i]->id[0], "attribute") == false){
                        $value[$i] = $value[$i]. $div_results;
                        for($ind = 0;$ind< count($tree->children[$i]->children);$ind++){
                            if(strpos($tree->children[$i]->children[$ind]->id[0], "attribute") == true){
                                $temp_val = "";
                                for($val=0;$val<sizeof($tree->children[$i]->children[$ind]->value);$val++){
                                    if($tree->children[$i]->children[$ind]->summary[0] == 1){
                                        //$result_no = $val + 1;
                                        // $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->children[$ind]->value[$val].'</div>';
                                        $samecollege_value[$val] = $samecollege_value[$val] ." ".$tree->children[$i]->children[$ind]->value[$val].$div_resultsdetail.$tree->children[$i]->children[$ind]->footer_value[$val].$end_div;
                                    }
                                }
                                    //$value[$i] = $value[$i] . $temp_val ;
                            }
                        }
                        for($j=0;$j<sizeof($samecollege_value);$j++){
                            $result_no = $j + 1;
                            $temp_val =  '<div class = "results'.$result_no.'">'.$samecollege_value[$j].'</div>';
                            $value[$i] = $value[$i] . $temp_val ;
                        }
                        $value[$i] = $value[$i] .$end_div;
                    }
                    //echo "alert(".$value[$i].")<br>";
                }
                for($i=0,$acad_flag=1,$exp_flag=1,$infra_flag=1,$stud_flag=1;$i<count($tree->children);$i++)
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
                        if(strpos($tree->children[$i]->id[0], "attribute") ==true){
                                if($flag == 1){
                                    $temp_val = "";
                                    for($val = 0;$val<sizeof($tree->children[$i]->value);$val++){
                                        $result_no = $val + 1;
                                        $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->value[$val].$div_resultsdetail.$tree->children[$i]->footer_value[$val].$end_div.'</div>';
                                    }
                                    $string = $string .'<div class="desc" style="margin-left: 6%;">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                    $default_opened = 0;
                                }
                                 else if($flag == 2)
                                {
                                   $temp_val = "";
                                    for($val = 0;$val<sizeof($tree->children[$i]->value);$val++){
                                        $result_no = $val + 1;
                                        $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->value[$val].$div_resultsdetail.$tree->children[$i]->footer_value[$val].$end_div.'</div>';
                                    }
                                    $attr_id = explode("-",$tree->children[$i]->id[0]);
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
                                    $string = $string .'<div class="desc" style="margin-left: 6%;">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                    $default_opened = 0;
                                }
                                else if($flag == 3)
                                {
                                    $temp_val = "";
                                    for($val = 0;$val<sizeof($tree->children[$i]->value);$val++){
                                        $result_no = $val + 1;
                                        $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->value[$val].$div_resultsdetail.$tree->children[$i]->footer_value[$val].$end_div.'</div>';
                                    }
                                    $attr_id = explode("-",$tree->children[$i]->id[0]);
                                    /*
                                        Values are hardcoded It will change based on database
                                    */

                                   if($attr_id[3] > '131' && $attr_id[3] < '141')
                                    {
                                        if($exp_flag == 2 or $exp_flag == 1)
                                        {
                                           $string = $string.'<div class="desc"> <div class="category-name"><b>AID/SCHOLARSHIP</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                          $exp_flag = 3;
                                        }
                                    }
                                    if($attr_id[3] < '108' && $attr_id[3] > '103')
                                    {
                                         $string = $string .'<div class="desc" style="margin-left: 6%;">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                    }
                                    else if($attr_id[3] < '120' && $attr_id[3] > '107')
                                    {
                                         $string = $string .'<div class="desc2" style="margin-left: 6%;">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                    }
                                    else
                                    {
                                        $string = $string .'<div class="desc" style="margin-left: 6%;">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';

                                    }
                                    
                                    $default_opened = 0;
                                }
                                 else if($flag == 4)
                                {
                                    $attr_id = explode("-",$tree->children[$i]->id[0]);
                                    $temp_val = "";
                                    for($val = 0;$val<sizeof($tree->children[$i]->value);$val++){
                                        $result_no = $val + 1;
                                        $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->value[$val].$div_resultsdetail.$tree->children[$i]->footer_value[$val].$end_div.'</div>';
                                    }
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

                                        $string = $string .'<div class="desc" style="margin-left: 6%;">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                    
                                    
                                    $default_opened = 0;
                                } 
                                else if($flag == 5)
                                {
                                    $attr_id = explode("-",$tree->children[$i]->id[0]);
                                    $temp_val = "";
                                    for($val = 0;$val<sizeof($tree->children[$i]->value);$val++){
                                        $result_no = $val + 1;
                                        $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->value[$val].$div_resultsdetail.$tree->children[$i]->footer_value[$val].$end_div.'</div>';
                                    }
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
                                   
                                        $string = $string .'<div class="desc" style="margin-left: 6%;">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                  
                                    
                                    $default_opened = 0;
                                }
                                else{
                                    $temp_val = "";
                                    for($val = 0;$val<sizeof($tree->children[$i]->value);$val++){
                                        $result_no = $val + 1;
                                        $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->value[$val].$div_resultsdetail.$tree->children[$i]->footer_value[$val].$end_div.'</div>';
                                    }
                                    $string = $string .  '<div class="desc2">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                    $default_opened = 0;
                                }
                        }else{
                            if($child_level == 2){
                                if($flag == 0){
                                    $string = $string . '<div class="desc">'.$div_category."Varies with streams of study".$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.'</b></div>';
                                    $default_opened = 0;
                                }

                                else if($flag!=5 and $flag!=4){
                                    $string = $string . '<div class="desc"><b style="color: #4db6ac; width: 100%;">'.$div_category.$tree->children[$i]->label[0].$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.'</b></div>';
                                    $default_opened = 0;
                                }
                            }else{
                                $string = $string . '<div class="heading'.$heading.'"  aria-controls="'.$label.$id.'">'.$div_category.$tree->children[$i]->label[0].$end_div.$value[$i].'</div>';
                                $default_opened = 0;
                            }
                        }
                    }else{
                        if(strpos($tree->children[$i]->id[0], "attribute") ==true){
                                $attr_id = explode("-",$tree->children[$i]->id[0]);
                                if($flag == 3)
                                {
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
                                          $exp_flag = 3;
                                        }
                                    }
                                }
                                else if($flag == 5)
                                {
                                    if($attr_id[3] < '400' && $attr_id[3] > '383' )
                                    {
                                        if($stud_flag <= 2)
                                        {
                                           $string = $string.'<div class="desc"> <div class="category-name"><b>FESTS</b><div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>';
                                           $stud_flag = 3;
                                        }
                                    }
                                }

                                if($heading == 1){
                                    $temp_val = "";
                                    for($val = 0;$val<sizeof($tree->children[$i]->value);$val++){
                                        $result_no = $val + 1;
                                        $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->value[$val].$div_resultsdetail.$tree->children[$i]->footer_value[$val].$end_div.'</div>';
                                    }
                                    $string = $string .  '<div class="desc">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                    $default_opened = 0;
                                }else{
                                    $temp_val = "";
                                    for($val = 0;$val<sizeof($tree->children[$i]->value);$val++){
                                        $result_no = $val + 1;
                                        $temp_val = $temp_val . '<div class = "results'.$result_no.'">'.$tree->children[$i]->value[$val].$div_resultsdetail.$tree->children[$i]->footer_value[$val].$end_div.'</div>';
                                    }
                                    $string = $string .  '<div class="desc" aria-controls="'.$label.$id.'" onclick="toggle('.$toggle_id.')">'.$div_category.$tree->children[$i]->label[0].': '.$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.$div_results.$temp_val.$end_div.'</div>';
                                    $default_opened = 1;
                                }
                        }else{
                            if($child_level == 2){
                                if($flag == 0){
                                    $string = $string . '<div class="desc">'.$div_category."Varies with streams of study".$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.'</b></div>';
                                    $default_opened = 0;
                                }
                                else if ($flag == 2 or $flag == 3)
                                {
                                   $string = $string . '<div class="desc">'.$div_category."Varies with streams of study".$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.'</b></div>';
                                    $default_opened = 0;
                                    $acad_flag = 1;
                                }
                                else if($flag!=5 and $flag!=4){
                                    $string = $string . '<div class="desc"><b style="color: #4db6ac; width: 100%;">'.$div_category.$tree->children[$i]->label[0].$div_categorydetail.$tree->children[$i]->footer_comment[0].$end_div.$end_div.'</b></div>';
                                    $default_opened = 0;
                                }
                            }else if($flag!=5 and $flag!=4){
                                //echo $value[$i];
                                $string = $string .  '<div class="heading'.$heading.'" id="h'.$heading.'" aria-controls="'.$label.$id.'"'.$optional.'onclick="toggle('.$toggle_id.'); myFunch'.$heading.'();">'.$div_category.'<iron-icon class="inew" icon="icons:add-circle-outline" id="checkIcon" data-args="0"></iron-icon> <span>'.$tree->children[$i]->label[0].$end_div.$value[$i].'</div>';
                                $default_opened = 0;
                            }
                        }
                    }
                    $sub_str = buildtree($tree->children[$i],$aria_expanded,$label,$id,$child_level,$flag, $default_opened);
                    $string = $string . $sub_str["string"];
                    $string = $string . "</iron-collapse>" ;
                    $id = $sub_str["id"];
                }
                return array("string"=>$string,"id"=>$id);
            }
            echo $string;
        ?>



    </div>


</div>

                        <div id="recommendations" class="flex-desktop">
                    </div>
                    <!-- <p hidden id="hidden-college-name"><?php echo $college; ?></p>
                    <p hidden id="hidden-college"><?php echo $collegeid;?></p> -->
                    </div>

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
                var college = <?php echo $collegeid;?>;
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
                if(source == 1) // BACK Button
                    removeFromHeader(ironPagesNo);
                else if(source == 2)    // DATA-ELEMENT Button
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
 function initMap() {
        // var uluru = {lat: <?php echo $college['latitude']; ?> , lng: <?php echo $college['longitude'];?>};
        var uluru = {lat: 29.8648599, lng: 77.8965787};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru,
          scrollwheel: false,
          mapTypeControl: false
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOI2Ji2NcIMnmB9CM6Gd2DclE1RCgjbbg&callback=initMap">
    </script>
    <script>
  var flag2 = -1;
    var flag3 = -1;
    var flag4 = -1;
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
    </body>
</html>