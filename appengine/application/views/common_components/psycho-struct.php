
<?php 
	$ques_count = $this->session->ques_count;
	if($ques_count > 6)
	{
		

		echo 
		'
		<link rel="import" href="'.base_url().'assets/polymer_dependency/psycho-structfe.html">

		<psycho-struct heading="'.$this->session->college1.'" url="'.base_url().'main/psycho_structural" exit="'.base_url().'home">
		</psycho-struct>

		';
	}
	else
	{
		echo 
		'
		<link rel="import" href="'.base_url().'assets/polymer_dependency/psycho-structfe.html">

		<psycho-struct heading="'.$this->session->college1.'" url="'.base_url().'main/psycho_structural" exit="'.base_url().'home">
		</psycho-struct>


		';

	}

?>
