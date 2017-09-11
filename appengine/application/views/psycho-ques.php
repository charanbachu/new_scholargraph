<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html" charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For polyfill support across non-compatible browsers-->
	<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/polymer_dependency/web-animations-next-lite.min.js'?>"></script>
	<!--importing vulcanized polymer dependencies-->
	<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/psychographic-ques-vulc.html'?>">
	<title>Questions</title>
</head>
<body>

<div id="container">
	<paper-button onclick="takeSurvey()" style="background-color: #2196f3; color: red">Take Survey</paper-button>
	<psychographic-ques heading="<?php echo $this->session->college1 ?>" url="<?php echo base_url().'main/psychoans_validation' ?>" exit="<?php echo base_url().'main/questions' ?>"></psychographic-ques>
<br>


<a href='<?php echo base_url()."main/logout"  ?>'> Logout </a>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<script>
	function takeSurvey(){
		var psychographicQues = document.querySelector('psychographic-ques');
		console.log("takeSurvey");
		psychographicQues.toggle();
	}
</script>
</body>
</html>