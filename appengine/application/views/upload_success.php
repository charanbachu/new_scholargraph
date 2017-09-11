<html>
<head>
<title>Upload File Specification</title>
</head>
<body>
<h3>Your file was successfully uploaded!</h3>
<!-- Uploaded file specification will show up here -->
<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>
<p><?php echo anchor('main/addbulk', 'Upload data in database!'); ?></p>
</body>
</html>
