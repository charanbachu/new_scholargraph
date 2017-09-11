<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html" charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For polyfill support across non-compatible browsers-->
	<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>
	<!--importing vulcanized polymer dependencies-->
	<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/question-dialog-vulc.html'?>">
	<title>Attribute Questions</title>		
</head>
<body>

<div id="container">
	<paper-button onclick="document.querySelector('question-dialog').ajaxRequest();dialog.toggle();" style="background-color: #2196f3; color: white">Take Survey</paper-button>
	<question-dialog heading="<?php echo $this->session->college1 ?>" url="<?php echo base_url().'main/attranswer_validation' ?>"></question-dialog>
<br>


<a href='<?php echo base_url()."main/logout"  ?>'> Logout </a>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>