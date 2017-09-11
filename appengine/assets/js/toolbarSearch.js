$(document).ready(
                function()
                {
                $("#toolbarPaperSearch").on("keyup focus",function()
                {
                    if($("#toolbarPaperSearch").val().length>2)
                    {
                        $.ajax({
                                type: "post",
                                url: "/search/search_suggestions/",
                                cache: false,               
                                data:'search='+$("#toolbarPaperSearch").val(),
                                success: function(response)
                                {
                                    $('#ajaxSearchResults2').html("");
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
                                                }

                                                term += ' ' + obj[i][0]+' :</span><span class="search-text"> '+obj[i][1]+' </span></div></a>';
                                                $('#ajaxSearchResults2').append(term);
                                            }

                                        }
                                        catch(e)
                                        {   
                                            alert(e);   
                                            alert('Exception while request.');
                                        }       
                                    }
                                    var searchText = '<div class="searchItem" onclick="document.getElementById(\'toolbarSearchForm\').submit();"><iron-icon icon="search"></iron-icon> Search : <span style="color:black">' + $("#toolbarPaperSearch").val() + '</span></div>';
                                    $('#ajaxSearchResults2').append(searchText);
                                }
                            });
                    }
                return false;
                });

                $("#toolbarPaperSearch").blur(function(){
                    setTimeout(function(){
                        $('#ajaxSearchResults2').html("");
                    },100);
                });
            });

            function expandSearch(){
                $("#toolbarSearchContainer").css("margin-right","0px");
                $("#toolbarSearchForm").css({"display":"block","width":"100%"});
                $("#ajaxSearchResults2").css({"display":"block","width":"100%"});
                $("#toolbarPaperSearch").focus();
                $("#menuButton").css("display","none");
                $(".mbtn").css("display","none");
                $(".tabIco").css("display","none");
                $(".logoMob").css("display","none");
                $(".notification-card").first().css("display","none");
                $("#logo").css("display","none");
                $("#expandableSearch").css("display","none");
                $("#searchPrefix").css("display","none");
                $("#backPrefix").css("display","inline-block");
                $("#clearSuffix").css("display","inline-block");
                $("body").css({"height":"100vh","overflow":"hidden"});
            }

            function collapseSearch(){
                $("#toolbarSearchContainer").css("margin-right","0px");
                $("#toolbarSearchForm").css({"display":"none","width":"507px"});
                $("#ajaxSearchResults2").css({"display":"none","width":"507px"});
                $("#menuButton").css("display","inline-block");
                $(".mbtn").css("display","none");
                $(".tabIco").css("display","flex");
                $(".tabIco").css("justifyContent","center");
                $(".logoMob").css("display","block");
                $(".tabIco").css("width","95%");
                $(".notification-card").first().css("display","none");
                $("#expandableSearch").css("display","inline-block");
                $("#searchPrefix").css("display","inline-block");
                $("#backPrefix").css("display","none");
                $("#clearSuffix").css("display","none");
                $("body").css({"height":"auto","overflow":"auto"});
            }

            function clearSearch(){
                document.getElementById("toolbarSearchForm").reset();
                document.getElementById("ajaxSearchResults2").innerHTML = "";
            }