<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html" charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For polyfill support across non-compatible browsers-->
	<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/polymer_dependency/web-animations-next-lite.min.js'?>"></script>	
	<!--importing vulcanized polymer dependencies-->
	<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/question-struct.html'?>">
	<title>Questions</title>		
</head>
<body>

<div id="container">
	<?php include "common_components/psycho-struct.php" ?>
<br>


<a href='<?php echo base_url()."main/logout"  ?>'> Logout </a>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

	<?php 
		
		if($this->session->ques_count > 6)
		{
		echo '<script type="text/javascript">
				var questionDialog = document.querySelector("question-structs");
				questionDialog.toggle();
		</script>';
		}
		else
		{
		echo '<script type="text/javascript">
				var questionDialog = document.querySelector("psychographic-ques");
				questionDialog.toggle();
		</script>';
		}
		?>

</body>
</html>