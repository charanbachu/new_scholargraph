<html>
<head>
<title>Test Flag</title>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"> -->
</head>
<body>
<div class="main">
<div id="content">
<br/>
<div id="form_input">
<?php

// Open form and set URL for submit form
echo form_open('college/flag');

// Show College ID Field in View Page
echo form_label('College Id :', 'college');
$data= array(
'name' => 'college',
'placeholder' => 'Please Enter College ID',
'class' => 'input_box'
);
echo form_input($data);

// Show ID Field in View Page
//format is same as placeholder
echo form_label('ID:', 'id');
$data= array(
'name' => 'id',
'placeholder' => 'node-<node id>-attribute-<attribute id>',
'class' => 'input_box'
);
echo form_input($data);

// Show Response ID Field in View Page
echo form_label('Response:', 'resp_id');
$data= array(
'name' => 'resp_id',
'placeholder' => 'resp_id-1,2,3,4 for testing purpose',
'class' => 'input_box'
);
echo form_input($data);
?>


</div>

<!-- // Show Submit button in View Page -->

<div id="form_button">
<?php
$data = array(
'type' => 'submit',
'value'=> 'Submit',
'class'=> 'submit'
);
echo form_submit($data); ?>
</div>

<!-- // Close Form -->
<?php echo form_close();?>

<!-- // Display Entered values in View Page -->

</div>
</div>
</body>
</html>