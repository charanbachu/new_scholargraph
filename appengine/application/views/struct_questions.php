<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html" charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- For polyfill support across non-compatible browsers-->
	<script src="<?php echo base_url().'assets/polymer_dependency/webcomponents-lite.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/polymer_dependency/web-animations-next-lite.min.js'?>"></script>	
	<!--importing vulcanized polymer dependencies-->

	<title>Questions</title>		
</head>
<body>

<div id="container">
	<?php 
	$ques_count = $this->session->ques_count;
	if($ques_count > 6)
	{
		echo 
		'
		<link rel="import" href="'.base_url().'assets/polymer_dependency/question-struct-vulc.html">

		<question-struct heading="'.$this->session->college1.'"url="'.base_url().'main/answer_validation" exit="'.base_url().'home">
		</question-struct>

		';
	}
	else
	{
		echo 
		'
		<link rel="import" href="'.base_url().'assets/polymer_dependency/psychographic-ques-vulc.html">

		<psychographic-ques heading="'.$this->session->college1.'"url="'.base_url().'main/psychoans_validation" exit="'.base_url().'home">
		</psychographic-ques>

		';

	}

?>
<br>



</div>


		<?php 
		if($this->session->ques_count > 6)
		{
		echo '<script type="text/javascript">
				var questionDialog = document.querySelector("question-struct");
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

		if($this->session->ques_count > 6 && $this->session->toggle == 1)
		{
			$data = $this->session->set_userdata;
			$data['toggle'] = 0;
			$this->session->set_userdata($data);
		}

		?>

</body>
</html>