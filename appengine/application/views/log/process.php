<!DOCTYPE html>
<html lang="en">
	<head>
		<title>College Comparison</title>
		<meta content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
	</head>

	<body>

	<div>
	Information : The College Logs would be processed only upto the LOG ID where the User Logs have been processed. To make sure, all the logs gets processed, first run PROCESS USER LOGS and then run PROCESS COLLEGE LOGS.
	</div>
	<div id="statusUser">
		<b>STATUS OF USER LOGS : </b>
		<div id="statusUserValue">
		</div>
	</div>
	<div id="statusCollege">
		<b>STATUS OF COLLEGE LOGS : </b>
		<div id="statusCollegeValue">
		</div>
	</div>

	<button onclick="processUserLog()">PROCESS USER LOGS</button>
	<br/>
	<button onclick="processLog()">PROCESS COLLEGE LOGS</button>
	<br/>


	<form method="POST" action="/log/query">
	ENTER THE ID UPTO WHICH TO DELETE THE LOGS : <input name="id">
	<button type="submit">RUN QUERY</button>
<script>

function processLog()
{
	$.ajax({
		type : "GET",
		cache: false,
		url : '/log/process_weekly_logs/',
		success: function(response)
		{
			if(response == 100)
				$('#statusCollegeValue').html("Successfully Completed Processing");
			else
			{
				$('#statusCollegeValue').html("Completed "+response+" %");
				processLog();
			}
		}
	});
}

function processUserLog()
{
	$.ajax({
		type : "GET",
		cache: false,
		url : '/log/process_user_logs/',
		success: function(response)
		{
			if(response == 100)
				$('#statusUserValue').html("Successfully Completed Processing");
			else
			{
				$('#statusUserValue').html("Completed "+response+" %");
				processUserLog();
			}
		}
	});
}
</script>

</body>
</html>