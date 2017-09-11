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

        <script type="text/javascript" src="/assets/js/encode_req.js"></script>

        <style is="custom-style" include="shared-css iron-flex iron-flex-alignment">

.iron-selected {
      background: #ccc;
    }

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
            color: #1e88e5;
            display: inline-block;
            /*padding-top: 10px;*/
            /*padding-bottom: 3px;*/
            font-size: 15px;
            border-left: 1px #f4f4f4 solid;
            /*margin-top: 5px;*/
            text-align: center;
            min-width: 40%;
        }

        .results2 {
            float: right;
            padding-right: 8px;
            color: #e53935;
            display: inline-block;
            /*padding-top: 10px;*/
            /*padding-bottom: 3px;*/
            font-size: 15px;
            border-left: 1px #f4f4f4 solid;
            /*margin-top: 5px;*/
            padding-left: 8px;
            text-align: center;
            min-width: 40%;
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
            font-size: 15px;
            border-left: 1px #eeeeee solid;
            /*margin-top: 5px;*/
        }

        .heading2 .results2 {
            float: right;
            padding-right: 8px;
            /*color: blue;*/
            display: inline-block;
            /*padding-top: 10px;*/
            /*padding-bottom: 3px;*/
            font-size: 15px;
            border-left: 1px #eeeeee solid;
            /*margin-top: 5px;*/
            padding-left: 8px;
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
            font-weight: 300;
            text-align: right;
            width: 55%;
        }

         .heading1 {
        padding: 20px 15px;
        margin-top: 20px;
        /*background-color: #f0f0f0;*/
        background-color: #525460;
        /*border: 1px solid #dedede;*/
        /*border-top-left-radius: 5px;*/
        /*border-top-right-radius: 5px;*/
        font-size: 18px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 100%;*/
        text-align: left;
        /*color: #404040;*/
        color: #ffffff;
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
        padding-left: 6%;
        /*padding-top: 20px;*/
        /*padding-bottom: 20px;*/
        
        color: #01579b;
        /*background-color: #c6efff;*/
        background-color: #f6f6f6;
        margin-bottom: 1px;
        padding-right: 15px;
        padding-top: 20px;
        padding-bottom: 20px;
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
        padding-left: 9%;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #0277bd;
        background-color: #f9f9f9;
        margin-top: 1px;
        font-size: 13px;
        padding-right: 20px;
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
        padding-left: 12%;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #039be5;
        background-color: #fbfbfb;
        margin-top: 1px;
        /*font-size: 15px;*/
        padding-right: 20px;
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
        padding-left: 15%;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #29b6f6;
        background-color: #fdfdfd;
        margin-top: 1px;
        /*font-size: 15px;*/
        padding-right: 20px;
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
        margin-left: 6%;
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-top: 20px;
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
        /*margin-left: 32px;*/
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

        color: #6f6f6f;
        border-bottom: 1px #f4f4f4 solid;
      }
      .desc3 {
    
        font-size: 13px;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(100,0,0,0);
        /*width: 90%;*/
        text-align: left;
        margin-right: 20px;
        cursor: pointer;
        /*margin-left: 44px;*/
        margin-left: 12%;
        /*margin-right: 60px;*/
        /*background-color: red;*/
        padding-top: 20px;
        padding-bottom: 13px;
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
        padding-right: 6px;
        margin-left: 6px;
        /*background-color: #fefefe;*/
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
                height: 60%;
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
                padding: 10px;
                padding-left: 30px;
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
                /*margin: 20px auto;*/
                background-color: #f4f4f4;
                color: white;
                /*margin-right: 20px;*/
                height: 60%;
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

            @media only screen and (max-width : 640px){
                #coverPicContainer{
                    height: 300px;
                }

                #collegeName{
                    font-size: 34px;
                }

                #address{
                    font-size: 24px;
                }

            }


            @media only screen and (min-width : 640px) and(max-width: 769){
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


        </style>
        <style type="text/css">
            #map {
                height: 260px;
                width: 100%;
                /*opacity: 0.7;*/


            }
        </style>
    <script>
            document.addEventListener('WebComponentsReady', function () {
                var loaderWrapper = document.getElementById("loader-wrapper");
                loaderWrapper.style.opacity = "0";
                setTimeout(function(){
                    loaderWrapper.style.display = "none";
                },300);
            });

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

            <app-drawer>
                <?php include "common_components/app-drawer.php" ?>
            </app-drawer>

            <app-header-layout>
                <app-header fixed effects="waterfall">
                    <?php include "common_components/app-header.php" ?>
                </app-header>

                <div id="container">

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
                                        <iron-selector attr-for-selected="id">
        <div id="Cat-Academics" class="cat-items">Academics</div>
        <div id="Cat-Admissions" class="cat-items">Admissions</div>
        <div id="Cat-FeeStructure" class="cat-items">Fee Structure</div>
        <div id="Cat-Financial" class="cat-items"> Financial Aid</div>
        <div id="Cat-Placements" class="cat-items">Placements</div>
      </iron-selector>

    </div>
    </paper-card>



                        <div id="main" class="flex-desktop-2">



<div id="main" class="flex-desktop-2">
                        <div class = "dec">
                                <div class = "college-colors">
                                    <div id = "red">h</div>
                                    <div id = "college-name">
                                    IIT Roorkee
                                    </div>
                                </div> 
                                <div class = "college-colors">
                                    <div id = "blue">h</div>
                                    <div id = "college-name">
                                    IIT Delhi
                                    </div>
                                </div> 
                            </div>
                             <div class="heading1" aria-expanded$="[[isExpanded(opened2)]]" aria-controls="Acad1" onclick="toggle('#Acad1')">Fee Structure</div>
                              <iron-collapse id="Acad1" class="card" opened="{{opened2}}">
<div class="desc"> <div class="category-name"> Enrolled Students:<div class="category-detail">Number of students enrolled </div></div> <div class="results"><div class="results1"> 10k <div class="result-detail"></div></div><div class="results2"> 9k <div class="result-detail"></div></div></div></div>
             <div class="desc"> <div class="category-name">Faculty:Student Ratio:<div class="category-detail">Ratio of Faculty to Student </div></div> <div class="results"><div class="results1"> 1:8 <div class="result-detail"></div></div><div class="results2"> 1:6 <div class="result-detail"></div></div></div></div>
              <div class="desc"> <b style="color: #4db6ac;"> PROGRAMS/STREAMS </b> </div>


        <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad2"  onclick="toggle('#Acad2')"> <div class="category-name"> + Engineering<div class="category-detail">Includes 17 streams </div></div> <div class="results"><div class="results1"> 5k <div class="result-detail"></div></div><div class="results2"> 5k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad2" tabindex="0">
          <div class="desc2-drill">
            <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad11"  onclick="toggle('#Acad11')"><div class="category-name"> + Undergraduate<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 4k <div class="result-detail"></div></div><div class="results2"> 4.5k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad11" tabindex="0">
        <div class="desc2-drill">
         <div class="heading4" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad30"  onclick="toggle('#Acad30')"><div class="category-name"> + CSE<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 124 <div class="result-detail"></div></div><div class="results2"> 153 <div class="result-detail"></div></div></div></div>
          <iron-collapse id="Acad30" tabindex="0">
          <div class="desc2-drill">
            <div class="heading5" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad31"  onclick="toggle('#Acad31')"><div class="category-name"> + Faculty<div class="category-detail"> </div></div> <div class="results"><div class="results1">  <div class="result-detail"></div></div><div class="results2">  <div class="result-detail"></div></div></div></div>
             <iron-collapse id="Acad31" tabindex="0">
             <div class="det">Data about this section goes here</div>
             </iron-collapse>
             <div class="heading5" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad31"  onclick="toggle('#Acad31')"><div class="category-name">+ Students<div class="category-detail"> </div></div> <div class="results"><div class="results1">  <div class="result-detail"></div></div><div class="results2">  <div class="result-detail"></div></div></div></div>
             <iron-collapse id="Acad31" tabindex="0">
             <div class="det">Data about this section goes here</div>
             </iron-collapse>

          </div>
        </iron-collapse>
        <div class="heading4" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad33"  onclick="toggle('#Acad33')"><div class="category-name"> + EE<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 102 <div class="result-detail"></div></div><div class="results2"> 146 <div class="result-detail"></div></div></div></div>
          <iron-collapse id="Acad33" tabindex="0">
          <div class="desc2-drill">
            <div class="heading5" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad34"  onclick="toggle('#Acad34')"><div class="category-name"> + Faculty<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 5k <div class="result-detail"></div></div><div class="results2"> 5k <div class="result-detail"></div></div></div></div>
             <iron-collapse id="Acad34" tabindex="0">
             <div class="det">Data about this section goes here</div>
             </iron-collapse>
             <div class="heading5" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad35"  onclick="toggle('#Acad35')"><div class="category-name"> + Students<div class="category-detail"> </div></div> <div class="results"><div class="results1">  <div class="result-detail"></div></div><div class="results2">  <div class="result-detail"></div></div></div></div>
             <iron-collapse id="Acad35" tabindex="0">
             <div class="det">Data about this section goes here</div>
             </iron-collapse>

          </div>
        </iron-collapse>
        <div class="heading4" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad36"  onclick="toggle('#Acad36')"><div class="category-name"> + ECE<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 107 <div class="result-detail"></div></div><div class="results2"> 98 <div class="result-detail"></div></div></div></div>
          <iron-collapse id="Acad36" tabindex="0">
          <div class="desc2-drill">
            <div class="heading5" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad37"  onclick="toggle('#Acad37')"><div class="category-name"> + Faculty<div class="category-detail"> </div></div> <div class="results"><div class="results1"><div class="result-detail"></div></div><div class="results2">  <div class="result-detail"></div></div></div></div>
             <iron-collapse id="Acad37" tabindex="0">
             <div class="det">Data about this section goes here</div>
             </iron-collapse>
             <div class="heading5" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad38"  onclick="toggle('#Acad38')"><div class="category-name"> + Students<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <div class="result-detail"></div></div><div class="results2">  <div class="result-detail"></div></div></div></div>
             <iron-collapse id="Acad38" tabindex="0">
             <div class="det">Data about this section goes here</div>
             </iron-collapse>

          </div>
        </iron-collapse>
        </div>

        </iron-collapse>

        <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad12"  onclick="toggle('#Acad12')"><div class="category-name"> + Masters<div class="category-detail"> </div></div> <div class="results"><div class="results1"> .5k <div class="result-detail"></div></div><div class="results2"> .3k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad12" tabindex="0">
          <div class="det">
            <div>Data about Engineering Masters goes here.</div>
          </div>
        </iron-collapse>

        <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad13"  onclick="toggle('#Acad13')"><div class="category-name"> + Doctoral<div class="category-detail"> </div></div> <div class="results"><div class="results1"> .5k <div class="result-detail"></div></div><div class="results2"> .2k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad13" tabindex="0">
          <div class="det">
            <div>Data about Engineering Doctoral goes here.</div>
          </div>
        </iron-collapse>
          </div>
        </iron-collapse>

        <div class="heading2" aria-expanded$="[[isExpanded(opened4)]]" aria-controls="Acad3"  onclick="toggle('#Acad3')"><div class="category-name"> + Architecture<div class="category-detail">Includes 5 streams </div></div> <div class="results"><div class="results1"> 2k <div class="result-detail"></div></div><div class="results2"> 2k <div class="result-detail"></div></div></div></div>

                <iron-collapse id="Acad3" tabindex="0">
          <div class="desc2-drill">
            <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad15"  onclick="toggle('#Acad15')"><div class="category-name"> + Undergraduate<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1.5k <div class="result-detail"></div></div><div class="results2"> 1.3k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad15" tabindex="0">
          <div class="det">
            <div>Data about Engineering Undergraduate goes here.</div>
          </div>
        </iron-collapse>

        <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad16"  onclick="toggle('#Acad16')"><div class="category-name"> + Masters<div class="category-detail"> </div></div> <div class="results"><div class="results1"> .4k <div class="result-detail"></div></div><div class="results2"> .6k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad16" tabindex="0">
          <div class="det">
            <div>Data about Masters goes here.</div>
          </div>
        </iron-collapse>

        <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad17"  onclick="toggle('#Acad17')"><div class="category-name"> + Doctoral<div class="category-detail"> </div></div> <div class="results"><div class="results1"> .1k <div class="result-detail"></div></div><div class="results2"> .1k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad17" tabindex="0">
          <div class="det">
            <div>Data about Doctoral goes here.</div>
          </div>
        </iron-collapse>
          </div>
        </iron-collapse>

        <div class="heading2" aria-expanded$="[[isExpanded(opened4)]]" aria-controls="Acad4"  onclick="toggle('#Acad4')"><div class="category-name"> + Medical<div class="category-detail">Includes 8 streams </div></div> <div class="results"><div class="results1"> 2k <div class="result-detail"></div></div><div class="results2"> 3k <div class="result-detail"></div></div></div></div>

        <iron-collapse id="Acad4" tabindex="0">
          <div class="desc2-drill">
            <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad21"  onclick="toggle('#Acad21')"><div class="category-name"> + Undergraduate<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1k <div class="result-detail"></div></div><div class="results2"> 2k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad21" tabindex="0">
          <div class="det">
            <div>Data about Medical Undergraduate goes here.</div>
          </div>
        </iron-collapse>

        <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad22"  onclick="toggle('#Acad22')"><div class="category-name"> + Masters<div class="category-detail"> </div></div> <div class="results"><div class="results1"> .5k <div class="result-detail"></div></div><div class="results2"> .3k <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad22" tabindex="0">
          <div class="det">
            <div>Data about Medical Masters goes here.</div>
          </div>
        </iron-collapse>

        <div class="heading3" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad23"  onclick="toggle('#Acad23')"><div class="category-name"> + Doctoral<div class="category-detail"> </div></div> <div class="results"><div class="results1"> .5k <div class="result-detail"></div></div><div class="results2"> .7 <div class="result-detail"></div></div></div>
</div>

        <iron-collapse id="Acad23" tabindex="0">
          <div class="det">
            <div>Data about Medical Doctoral goes here.</div>
          </div>
        </iron-collapse>
          </div>
        </iron-collapse>

        <div class="desc"> <b style="color: #4db6ac;"> DEGREE PROGRAMS</b></div>


        <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad5"  onclick="toggle('#Acad5')"><div class="category-name"> + Undergraduate<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 6.5k <div class="result-detail"></div></div><div class="results2"> 7.8k <div class="result-detail"></div></div></div></div>

        <iron-collapse id="Acad5" tabindex="0">
          <div class="det">
            <div>Data about Undergraduate Programs goes here.</div>
          </div>
        </iron-collapse>

        <div class="heading2" aria-expanded$="[[isExpanded(opened4)]]" aria-controls="Acad6"  onclick="toggle('#Acad6')"><div class="category-name"> + Masters<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1.5k <div class="result-detail"></div></div><div class="results2"> 1.3k <div class="result-detail"></div></div></div></div>

        <iron-collapse id="Acad6" tabindex="0">
          <div class="det">
            <div>Data about Masters Programs goes here.</div>
          </div>
        </iron-collapse>

         <div class="heading2" aria-expanded$="[[isExpanded(opened5)]]" aria-controls="Acad7"  onclick="toggle('#Acad7')"><div class="category-name"> + Undergraduate<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1k <div class="result-detail"></div></div><div class="results2"> .9k <div class="result-detail"></div></div></div></div>

        <iron-collapse id="Acad7" tabindex="0">
          <div class="det">
            <div>Data about Doctoral Programs goes here.</div>
          </div>
        </iron-collapse>

        <div class="desc"><b style="color: #4db6ac;"> MAJORS OF STUDY </b></div>


        <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Acad8"  onclick="toggle('#Acad8')"><div class="category-name"> + CSE<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1.5k <div class="result-detail"></div></div><div class="results2"> 1.3k <div class="result-detail"></div></div></div></div>

        <iron-collapse id="Acad8" tabindex="0">
          <div class="det">
            <div>Data about CSE goes here.</div>
          </div>
        </iron-collapse>

        <div class="heading2" aria-expanded$="[[isExpanded(opened4)]]" aria-controls="Acad9"  onclick="toggle('#Acad9')"><div class="category-name"> + Anthropolgy<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1.5k <div class="result-detail"></div></div><div class="results2"> 2.3k <div class="result-detail"></div></div></div></div>

        <iron-collapse id="Acad9" tabindex="0">
          <div class="det">
            <div>Data about Anthropology goes here.</div>
          </div>
        </iron-collapse>

         <div class="heading2" aria-expanded$="[[isExpanded(opened5)]]" aria-controls="Acad10"  onclick="toggle('#Acad10')"><div class="category-name"> + Electrical Engineering<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1.1k <div class="result-detail"></div></div><div class="results2"> 1.6k <div class="result-detail"></div></div></div></div>

        <iron-collapse id="Acad10" tabindex="0">
          <div class="det">
            <div>Data about EE goes here.</div>
          </div>
        </iron-collapse>


        </iron-collapse>




<div class="heading1" aria-expanded$="[[isExpanded(opened2)]]" aria-controls="Adm1" onclick="toggle('#Adm1')">Admissions</div>
<iron-collapse id="Adm1" class="card" opened="{{opened2}}">
    <div class="desc"> <div class="category-name">  Acceptance Rate<div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1/500 <div class="result-detail"></div></div><div class="results2"> 2/500 <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Academic Criteria<div class="category-detail"></div></div> <div class="results">  <div class="result-detail"></div></div></div>

    <div class="desc3"> <div class="category-name"> Standardized Tests Required:<div class="category-detail">Any one entrance </div></div> <div class="results"><div class="results1"> GMAT <div class="result-detail">Av Score:760</div></div><div class="results2"> GMAT <div class="result-detail">Av Score:720</div></div></div></div>

    <div class="desc3"> <div class="category-name"> Standardized Tests Required:<div class="category-detail"> Any one entrance</div></div> <div class="results"><div class="results1"> GRE <div class="result-detail">Av Score:1520</div></div><div class="results2"> GRE <div class="result-detail">Av Score:1500</div></div></div></div>

    <div class="desc3"><div class="category-name">  Secondary School Score<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div></div></div>

    <div class="desc3"> <div class="category-name"> Letter of recommendations :<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div></div></div>
    <div class="desc3"> <div class="category-name"> Statement of Purpose / Essay:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div></div></div>


    <div class="desc2"> <div class="category-name"> Non-Academic Criteria<div class="category-detail"></div></div> <div class="results"> <div class="result-detail"></div></div></div>


    <div class="desc3"> <div class="category-name"> Interviews:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div></div></div>

    <div class="desc3"> <div class="category-name"> Alumni Relationship:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div></div></div>

    <div class="desc3"> <div class="category-name"> Geographical Residence:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div></div></div>

    <div class="desc3"> <div class="category-name"> Nationality:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="clear" style=""></iron-icon> <div class="result-detail"></div></div></div></div>

    <div class="desc3"> <div class="category-name"> State of Residence:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div></div></div>

    <div class="desc3"> <div class="category-name"> Extra-Curricular Activities:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div><div class="results2"> <iron-icon icon="check" style=""></iron-icon> <div class="result-detail"></div></div></div></div>


    <div class="desc"> <div class="category-name"> Varies with streams of study<div class="category-detail"> </div></div> <div class="results">  <div class="result-detail"></div></div></div>

     <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Adm2"  onclick="toggle('#Adm2')"><div class="category-name"> + Engineering <div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1/500 <div class="result-detail"></div></div><div class="results2"> 2/500 <div class="result-detail"></div></div></div></div>

      <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Adm3"  onclick="toggle('#Adm3')"><div class="category-name"> + Medical <div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1/500 <div class="result-detail"></div></div><div class="results2"> 2/500 <div class="result-detail"></div></div></div></div>

       <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Adm4"  onclick="toggle('#Adm4')"><div class="category-name"> + Business <div class="category-detail"> </div></div> <div class="results"><div class="results1"> 1/500 <div class="result-detail"></div></div><div class="results2"> 2/500 <div class="result-detail"></div></div></div></div>


 </iron-collapse>   






<div class="heading1" aria-expanded$="[[isExpanded(opened2)]]" aria-controls="Fee1" onclick="toggle('#Fee1')">Fee Structure</div>
<iron-collapse id="Pla1" class="card" opened="{{opened2}}">
    <div class="desc"> <div class="category-name"> Average Fee:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Tuition Fees:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Hostel & Boarding:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc"> <div class="category-name"> Varies with streams of study<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

     <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Fee2"  onclick="toggle('#Fee2')"><div class="category-name"> + Engineering <div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>
      <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Fee3"  onclick="toggle('#Fee3')"><div class="category-name"> + Medical <div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>
       <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Fee4"  onclick="toggle('#Fee4')"><div class="category-name"> + Business <div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

 </iron-collapse>   
    





<div class="heading1" aria-expanded$="[[isExpanded(opened2)]]" aria-controls="Fin1" onclick="toggle('#Fin1')">Financial Aid</div>
<iron-collapse id="Fin1" class="card" opened="{{opened2}}">
    <div class="desc"> <div class="category-name"> Average Scholarship:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Scholarship from College:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> External Scholarship:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Fee Waiver:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Loan Availability:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc"> <div class="category-name"> Varies with streams of study<div class="category-detail"> </div></div> <div class="results">  <div class="result-detail"></div></div></div>

     <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Fin2"  onclick="toggle('#Fin2')"><div class="category-name"> + Engineering <div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>
      <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Fin3"  onclick="toggle('#Fin3')"><div class="category-name"> + Medical <div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>
       <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Fin4"  onclick="toggle('#Fin4')"><div class="category-name"> + Business <div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

 </iron-collapse>   











<div class="heading1" aria-expanded$="[[isExpanded(opened2)]]" aria-controls="Pla1" onclick="toggle('#Pla1')">Placements</div> 
 <iron-collapse id="Pla1" class="card" opened="{{opened2}}">
    <div class="desc"> <div class="category-name"> Average Salary:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Maximum Salary:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Minimum Salary:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Average Earnings post 3 years:<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc2"> <div class="category-name"> Pre-course Earnings<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

    <div class="desc"> <div class="category-name"> Varies with streams of study<div class="category-detail"> </div></div> <div class="results">  <div class="result-detail"></div></div></div>

     <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Pla2"  onclick="toggle('#Pla2')"><div class="category-name"> + Engineering<div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>
      <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Pla3"  onclick="toggle('#Pla3')"><div class="category-name"> + Medical <div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>
       <div class="heading2" aria-expanded$="[[isExpanded(opened3)]]" aria-controls="Pla4"  onclick="toggle('#Pla4')"><div class="category-name"> + Business <div class="category-detail"> </div></div> <div class="results"><div class="results1"> $80k/yr <div class="result-detail"></div></div><div class="results2"> $60k/yr <div class="result-detail"></div></div></div></div>

 </iron-collapse>   
                 
                        

                        </div>


    </div>

                        <div id="recommendations" class="flex-desktop">
                            <paper-card id="recomCard">

                                <div class="card-content"><b>Also Viewed</b></div>
                                <div class="recommendations1top">
                                    <iron-icon icon="account-balance" style="color:grey; padding-right:10px;"></iron-icon> IIT Madras
                                </div>
                                <div class="recommendations1">
                                <iron-icon icon="account-balance" style="color:grey; padding-right:10px;"></iron-icon> 
                                        IIT Bombay
                                </div>
                                <div class="recommendations1">
                                <iron-icon icon="account-balance" style="color:grey; padding-right:10px;"></iron-icon> 
                                        IIT Kharagpur
                                </div>
                                <div class="recommendations1bottom">
                                <iron-icon icon="account-balance" style="color:grey; padding-right:10px;"></iron-icon> 
                                        IIT Delhi
                                </div>
                            </paper-card>

                            <paper-card id="questionCard">
                                <div id="questions">
                                    <div class="card-content"><b>Some questions you may be interested in</b></div>
                                    <div class="questions1top">
                                        Are you satisfied with the fees in your college?
                                        <br>
                                        <div class="options"><iron-icon icon="account-balance" style="color: #4db6ac;; padding-right:5px;"></iron-icon> Yes</div>
                                        <div class="options"><iron-icon icon="account-balance" style="color: #4db6ac; padding-right:5px;"></iron-icon> No</div>
                                        <div class="options"><iron-icon icon="account-balance" style="color: #4db6ac; padding-right:5px;"></iron-icon> Not Sure</div>

                                    </div>
                                    <div class="questions1bottom">
                                    Do seniors and juniors have good connection?
                                    <br>
                                    <div class="options"><iron-icon icon="account-balance" style="color: #4db6ac; padding-right:5px;"></iron-icon> Yes</div>
                                        <div class="options"><iron-icon icon="account-balance" style="color: #4db6ac; padding-right:5px;"></iron-icon> No</div>
                                        <div class="options"><iron-icon icon="account-balance" style="color: #4db6ac; padding-right:5px;"></iron-icon> Not Sure</div>

                                </div>
                                </div>
                            </paper-card>

                            <paper-card id="leaderboard">
                                <div id="people">
                                    <div class="people-content"><b>Leaderboard</b></div>
                                    <div class="people1top">
                                            Person 1
                                    </div>
                                    <div class="people1">
                                            Person 2
                                    </div>
                                    <div class="people1">
                                            Person 3
                                    </div>
                                    <div class="people1bottom">
                                            Person 4
                                    </div>

                                </div>
                            </paper-card>

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

        <script type="text/javascript" src="/assets/js/toolbarSearch.js"></script>
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

  function toggle(selector) {
    document.querySelector(selector).toggle();

}


  document.querySelector('template[is=dom-bind]').isExpanded = function(opened) {
    return String(opened);
  };

</script>
    </body>
</html>
