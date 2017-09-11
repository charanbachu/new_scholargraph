function encode_id(id){
    var encoded_id;
    $.ajax({
        type: "post",
        url: "/College/encode_id/" + id,
        cache: false,
        async:false,
        success: function(response)
        {
             encoded_id = JSON.parse(response);
        }
    });

    return encoded_id.id;
}
function toggleAccountDropdown(){
    var dropdown = document.getElementById('accountDropdown');
    if(dropdown != null){
        if(dropdown.style.display == "none"){
            dropdown.style.display = "inline-block";
        }
        else{
            dropdown.style.display = "none";
        }
    }
}

toggleAccountDropdown();

function displayDropdown(id){
    var dropdown = $("#" + id);
    if($(dropdown).css("display") == "none"){
        $(dropdown).css("display","inline-block");
    }
    else{
        $(dropdown).css("display","none");
    }
}

document.addEventListener('WebComponentsReady', function () {
    getnotifications();
});

jQuery(document).on("click", function(e) {
    var $clicked = $(e.target);

    if(! $clicked.hasClass("account-dropdown")){
        jQuery("#accountDropdown").fadeOut();
    }
    if(! $clicked.hasClass("notification-card")){
        jQuery("#notificationCard").fadeOut();
    }
});

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
            
    
            // document.getElementById("toolbarSearchContainer").style.marginRight = "0px";
            // document.getElementById("toolbarSearchForm").style.display = "block";
            // document.getElementById("toolbarSearchForm").style.width = "100%";
            // document.getElementById("ajaxSearchResults2").style.display = "block";
            // document.getElementById("ajaxSearchResults2").style.width = "100%";
            // document.getElementById("menuButton").style.display = "none";
            // var n1 = document.getElementsByClassName("mbtn");
            // n1[0].style.display = "none";
            // var n2 = document.getElementsByClassName("tabIco");
            // n2[0].style.display = "none";
            // var n3 = document.getElementsByClassName("logoMob");
            // n3[0].style.display = "none";
            // var n4 = document.getElementsByClassName("notification-card");
            // n4[0].style.display = "none";
            // document.getElementById("logo").style.display = "none";
            // document.getElementById("expandableSearch").style.display = "none";
            // document.getElementById("searchPrefix").style.display = "none";
            // document.getElementById("backPrefix").style.display = "inline-block";
            // document.getElementById("clearSuffix").style.display = "inline-block";
            // document.getElementById("bdy").style.height = "100vh";
            // document.getElementById("searchPrefix").style.overflow = "hidden";


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

            // document.getElementById("toolbarSearchContainer").style.marginRight = "0px";
            // document.getElementById("toolbarSearchForm").style.display = "none";
            // document.getElementById("toolbarSearchForm").style.width = "507px";
            // document.getElementById("ajaxSearchResults2").style.display = "none";
            // document.getElementById("ajaxSearchResults2").style.width = "507px";
            // document.getElementById("menuButton").style.display = "inline-block";
            // var n1 = document.getElementsByClassName("mbtn");
            // n1[0].style.display = "none";
            // var n2 = document.getElementsByClassName("tabIco");
            // n2[0].style.display = "flex";
            // n2[0].style.width = "95%";
            // var n3 = document.getElementsByClassName("logoMob");
            // n3[0].style.display = "block";
            // var n4 = document.getElementsByClassName("notification-card");
            // n4[0].style.display = "none";
            // document.getElementById("logo").style.display = "none";
            // document.getElementById("expandableSearch").style.display = "flex";
            // document.getElementById("searchPrefix").style.display = "inline-block";
            // document.getElementById("backPrefix").style.display = "none";
            // document.getElementById("clearSuffix").style.display = "none";
            // document.getElementById("bdy").style.height = "auto";
            // document.getElementById("searchPrefix").style.overflow = "hidden";


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