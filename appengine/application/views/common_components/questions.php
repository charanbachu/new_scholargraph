<questions>
<link rel="import" href="<?php echo base_url().'assets/polymer_dependency/question-display.html'?>">
<question-display heading="<?php echo $this->session->college1 ?>" url="<?php echo base_url().'main/answer_validation' ?>" exit="<?php echo base_url().'main/questions' ?>"></question-display>
<script>
		var questionDialog = document.querySelector('question-display');
		console.log("takeSurvey");
		questionDialog.toggle();
</script>
</questions>