document.write('<scr'+'ipt type="text/javascript" src="/assets/js/encode_req.js" ></scr'+'ipt>');
document.addEventListener('WebComponentsReady', function () {
	var loaderWrapper = document.getElementById("loader-wrapper");
	loaderWrapper.style.opacity = "0";
	setTimeout(function(){
		loaderWrapper.style.display = "none";
	},300);

	$("#country_code").keyup(function()
	{
		if($("#country_code").val().length>2)
		{
			$.ajax({
				type: "post",
				url: "/main/country_search",
				cache: false,
				data:'search='+$("#country_code").val(),
				success: function(response)
				{
					$('#countrySearchResults').html("");
					var obj = JSON.parse(response);
					if(obj.length>0)
					{
						try
						{
							$.each(obj, function(i,val)
								{
									$('#countrySearchResults').append('<div class="searchItem" onclick="selectCountry(\''+val.Country_Name+'\')">'+val.Country_Name+'</div>');
								});
						}
						catch(e)
						{

						}
					}
					else
					{
						$('#countrySearchResults').html($('<li/>').text("No Country Found"));
					}
				}
			});
		}
	});

	$("#college").on("keyup focus",function()
	{
		if($("#college").val().length>2)
		{
			$.ajax({
					type: "post",
					url: "/main/auto_search",
					cache: false,
					data:'search='+$("#college").val(),
					success: function(response)
					{
						$('#collegeSearchResults').html("");
						var obj = JSON.parse(response);
						if(obj.length>0)
						{
							try
							{
								$.each(obj,function(i,val)
								{
									$('#collegeSearchResults').append('<div class="searchItem" onclick="selectCollege(\''+val.primary_college+'\',\''+val.colg_id+'\')">'+val.primary_college+'</div>');
								});
							}
							catch(e)
							{

							}
						}
						else
						{
							$('#collegeSearchResults').append('<div class="searchItem" onclick="openNav()">College Not found <strong>Click to add college<strong></div>');
						}
						document.getElementById('collegeSearchResults').style.display = 'block';
						addKeyBindings('college');
					}
				});
		}
	return false;
	});














	jQuery(document).on("click", function(e) {
		var $clicked = $(e.target);

		if(!$clicked.parents("#college").length){
			setTimeout(function(){
				document.getElementById('collegeSearchResults').style.display = 'none';
			},100);
		}
		if(!$clicked.parents("#stream").length){
			setTimeout(function(){
				document.getElementById('streamSearchResults').style.display = 'none';
			},100);
		}
		if(!$clicked.parents("#degree").length){
			setTimeout(function(){
				document.getElementById('degreeSearchResults').style.display = 'none';
			},100);
		}
		if(!$clicked.parents("#major").length){
			setTimeout(function(){
				document.getElementById('majorSearchResults').style.display = 'none';
			},100);
		}
	});

	$('#stream').focus(function(){
		document.getElementById('degree').disabled = false;
		document.getElementById('streamSearchResults').style.display='block';
		college = document.getElementById('college-id').value;
		stream = document.getElementById('stream').value;
		if(stream.length < 2)
		{
			$('#streamSearchResults').html("");
			$.ajax({
				type: "post",
				url: "/college/getAllStreams",
				cache: false,
				data: {college :  college},
				success: function(response)
				{
					addSuggestionsDropDown(response,'stream','Stream');
				}
			});
		}
	});

	$('#degree').focus(function() {
		document.getElementById('major').disabled = false;
		document.getElementById('degreeSearchResults').style.display='block';
		college = document.getElementById('college-id').value;
		stream = document.getElementById('stream-id').value;
		degree = document.getElementById('degree').value;
		if(degree.length < 2)
		{
			$('#degreeSearchResults').html("");
			$.ajax({
				type: "post",
				url: "/college/getAllDegrees",
				cache: false,
				data: {college : college,stream : stream},
				success: function(response)
				{
					addSuggestionsDropDown(response,'degree','Degree');
				}
			});
		}
	});

	$('#major').focus(function() {
		document.getElementById('majorSearchResults').style.display='block';
		college = document.getElementById('college-id').value;
		degree = document.getElementById('degree-id').value;
		major = document.getElementById('major').value;
		if(major.length < 2)
		{
			$('#majorSearchResults').html("");
			$.ajax({
				type: "post",
				url: "/college/getAllMajors",
				cache: false,
				data: {college : college,degree : degree},
				success: function(response)
				{
					addSuggestionsDropDown(response,'major','Major');
				}
			});
		}
	});

	$("#stream").on("keyup focus",function()
	{
		reduceSuggestions('stream');
	});

	$("#degree").on("keyup focus",function()
	{
		reduceSuggestions('degree');
	});

	$("#major").on("keyup focus",function()
	{
		reduceSuggestions('major');
	});

});

function addNewCollege()
{
document.getElementById('submitButtons').style.visibility='hidden';
					document.getElementById('submitButtons').style.display='none';
	
var formData = {newCollege:document.getElementById('newCollege').value,country_code:document.getElementById('country_code').value,submit:true};	
	console.log(document.getElementById('newCollege').value);
	if(document.getElementById('newCollege').value == "")
		displayMessage('failure','Please hello Select A College',1000);
	else if(document.getElementById('country_code').value == "")
		displayMessage('failure','Please Select A Country',1000);
	else
	{
		var url = "/college/addCollege";
		$.ajax({
			type: "POST",
			url : url,
			data : formData,
			success: function(data)
			{
				data = JSON.parse(data);
				message = data['message'];
				college = data['college'];
				if(message == "")
				{
					selectCollege(college['COLL_NAME'],college['COLL_ID']);
				}
				else
					displayMessage('failure',message,1000);
			}
		});
	}

}

function addCollege()
{
	if(document.getElementById('college').value == "")
		displayMessage('failure','Please Select A College',1000);
	else if(document.getElementById('member-select').selectedItemLabel == undefined)
		displayMessage('failure','Please Select The Member Type',1000);
	else
	{
		document.getElementById('member').value = document.getElementById('member-select').selectedItemLabel;
		var url = "/user/addCollege/";
		$.ajax({
			type: "POST",
			url: url,
			data: $("#collegeForm").serialize(),
			success: function(data)
			{
				data = JSON.parse(data);
				message = data['message'];
				college = data['data'];
				if(message == "")
				{
					document.getElementById("collegeForm").reset();
					term = '<paper-card class="collegeDetail">'+college["member"]+', <a href="/college/details/'+encode_id(college["COLL_ID"])+'"><span style="color: black;"><b>'+college["name"]+'</b></span></a><br/>'+college["major"]+', '+college["degree"]+'<br/>';
					if(college["batch"] != null)
						term = term + 'Batch : '+college["batch"]+'<br/>';
					term = term + '</paper-card>';
					$('#addedCollege').append(term);
					message = "College Successfully Added";
					document.getElementById('skipButton').style.display = 'block';
					displayMessage('success',message,1000);
				}
				else
					displayMessage('failure',message,1000);
			}
			});
	}
}

function selectCountry(name)
{
	document.getElementById('country_code').value = name;
	$('#countrySearchResults').html("");
}

function selectCollege(name,id)
{
	document.getElementById('college').value = name;
	document.getElementById('college-id').value = id;
	document.getElementById('collegeSearchResults').style.display = 'none';
	document.getElementById('stream').disabled = false;
}

function selectStream(name,id)
{
	document.getElementById('stream').value = name;
	document.getElementById('stream-id').value = id;
	window.scrollBy(0, 30);
	document.getElementById('streamSearchResults').style.display = 'none';
	document.getElementById('degree').disabled = false;
};

function selectDegree(name,id)
{
	document.getElementById('degree').value = name;
	document.getElementById('degree-id').value = id;
	window.scrollBy(0, 30);
	document.getElementById('degreeSearchResults').style.display = 'none';
	document.getElementById('major').disabled = false;
};

function selectMajor(name,id)
{
	document.getElementById('major').value = name;
	document.getElementById('major-id').value = id;
	window.scrollBy(0, 30);
	document.getElementById('majorSearchResults').style.display = 'none';
}

/* Open when someone clicks on the span element */
function openNav()
{

	document.getElementById("college").style.visibility = "hidden";
	document.getElementById("college").style.display = "none";
	document.getElementById("college-id").style.visibility = "hidden";
	document.getElementById("college-id").style.display = "none";

	document.getElementById("myNav").style.visibility = "visible";
	document.getElementById("myNav").style.display = "inline-block";
		

}
/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav()
{
	document.getElementById("myNav").style.width = "0%";
}

function displayMessage(type,message,delay)
{
	document.getElementById(type+'-message').innerHTML = message;
	document.getElementById(type).style.display='block';
	setTimeout(function() {
		document.getElementById(type).style.display='none';
	}, delay);
}

function addSuggestionsDropDown(response,resultDiv,functionName)
{
	var res = JSON.parse(response);
	var resultsDivId = resultDiv+'SearchResults';
	$('#'+resultsDivId).html("");
	
	for(i=0;i<res["suggestions"].length;i++)
	{
		suggest = res["suggestions"][i];
		$('#'+resultsDivId).append('<div class="searchItem" onclick="select'+functionName+'(\''+suggest['Node_Name']+'\',\''+suggest['Node_ID']+'\')">'+suggest['Node_Name']+'</div>');
	}
	
	for(i=0;i<res["all"].length;i++)
	{
		all = res["all"][i];
		$('#'+resultsDivId).append('<div class="searchItem" onclick="select'+functionName+'(\''+all['Node_Name']+'\',\''+all['Node_ID']+'\')">'+all['Node_Name']+'</div>');
	}
	addKeyBindings(resultDiv);
}

function addKeyBindings(id)
{
	var resultsDivId = id+'SearchResults';
	var searchResultsItems = document.getElementById(resultsDivId).getElementsByClassName('searchItem');
	document.getElementById(id).addEventListener('keydown',function(e){
		if(e.which == 40){
			e.preventDefault();
			if(searchResultsItems[0] != null){
				searchResultsItems[0].setAttribute('tabindex','0');//to make them focusable
				searchResultsItems[0].focus();
			}
		}
	});

	for(i = 0;i < searchResultsItems.length;i++){
		searchResultsItems[i].setAttribute('tabindex','0');//to make them focusable

		searchResultsItems[i].addEventListener('keydown',function(e){
			try
			{
				e.preventDefault();
				if(e.which == 40)
				{
					element = this.nextElementSibling;
					while(element.classList.contains('invalid'))
						element = element.nextElementSibling;
					element.focus();
				}
				else if(e.which == 38)
				{
					element = this.previousElementSibling;
					while(element.classList.contains('invalid'))
					{
						element = element.previousElementSibling;
						if(element == null)
						{
							// element = document.getElementById(id).focus();
						}
					}
					element.focus();
				}
				else if(e.which == 13)
				{
					this.click();
				}
			}
			catch(err)
			{
				//just to clear the console errors
			}
		});
	}
}

function reduceSuggestions(source)
{
	text = document.getElementById(source).value.toLowerCase();
	var resultsDivId = source+'SearchResults';
	document.getElementById(resultsDivId).style.display = 'block';
	var searchResultsItems = document.getElementById(resultsDivId).getElementsByClassName('searchItem');
	group = 0;
	for(i = 0;i < searchResultsItems.length;i++)
	{
		searchItem = searchResultsItems[i];
		if(!searchItem.classList.contains('searchHeading'))
		{
			data = searchItem.innerHTML.toLowerCase();
			if(data.indexOf(text) !== -1)
			{
				if(searchItem.classList.contains('invalid'))
				{
					searchItem.classList.remove('invalid');
					searchItem.style.display = 'block';
				}
			}
			else
			{
				searchItem.classList.add('invalid');
				searchItem.style.display = 'none';
			}
		}
		else
		{

		}
	}
}