<!DOCTYPE html>
<html>
<head>
	<title>Uploaded Data</title>
</head>

<body>
<table>
    <tr>
            <td width = "20%">ID</td>
            <td width = "40%">Coll ID</td>
            <td width = "40%">String</td>
    </tr>

            <?php foreach($csvData as $field){?>
                <tr>
                    <td><?php echo $field['ID']?></td>
                    <td><?php echo encode_id($field['Coll_ID'])?></td>
                    <td><?php echo $field['Answer_String']?></td>
                </tr>
            <?php }?>
</table>

</body>
</html>