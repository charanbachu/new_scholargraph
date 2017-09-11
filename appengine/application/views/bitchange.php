<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Insert nodes</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}
	.tree {
    min-height:20px;
    padding:19px;
    margin-bottom:20px;
    background-color:#fbfbfb;
    border:1px solid #999;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
	}
	.tree li {
	    list-style-type:none;
	    margin:0;
	    padding:10px 5px 0 5px;
	    position:relative
	}
	.tree li::before, .tree li::after {
	    content:'';
	    left:-20px;
	    position:absolute;
	    right:auto
	}
	.tree li::before {
	    border-left:1px solid #999;
	    bottom:50px;
	    height:100%;
	    top:0;
	    width:1px
	}
	.tree li::after {
	    border-top:1px solid #999;
	    height:20px;
	    top:25px;
	    width:25px
	}
	.tree li span {
	    -moz-border-radius:5px;
	    -webkit-border-radius:5px;
	    border:1px solid #999;
	    border-radius:5px;
	    display:inline-block;
	    padding:3px 8px;
	    text-decoration:none
	}
	.tree li.parent_li>span {
	    cursor:pointer
	}
	.tree>ul>li::before, .tree>ul>li::after {
	    border:0
	}
	.tree li:last-child::before {
	    height:30px
	}
	.tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
	    background:#eee;
	    border:1px solid #94a0b4;
	    color:#000
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	}
	th, td {
	    padding: 15px;
	}
	</style>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
	<script>
		$(document).ready(function(){
		  $("#college").keyup(function(){
			if($("#college").val().length>2){
			$.ajax({
				type: "post",
				url: "/main/auto_search",
				cache: false,				
				data:'search='+$("#college").val(),
				success: function(response){
					$('#result').html("");
					var obj = JSON.parse(response);
					if(obj.length>0){
						try{
						$.each(obj, function(i,val) {  
						     $('#result')
						         .append($('<div class="suggestion" onclick="myfunction(\''+val.COLL_NAME+'\')"></div>')
						         .text(val.COLL_NAME)); 
						     $('#result').css("display","block");
						});

						}catch(e) {		
							alert('Exception while request..');
						}		
					}else{
						$('#result').html($('<li/>').text("No Data Found"));		
					}		
					
				},
				error: function(){						
					alert('Error while request..');
				}
			});
			}
			return false;
		  });
		});
		$(document).ready(function(){
		  $("#country_code").keyup(function(){
			if($("#country_code").val().length>2){
				//alert($("#country_code").val());
			$.ajax({
				type: "post",
				url: "/main/country_search",
				cache: false,				
				data:'search='+$("#country_code").val(),
				success: function(response){

					$('#result1').html("");
					//alert($data);

					var obj = JSON.parse(response);
					if(obj.length>0){
						try{
						$.each(obj, function(i,val) {  
						     $('#result1')
						         .append($('<div class="suggestion" onclick="myfunction2(\''+val.Country_Name+'\')"></div>')
						         .text(val.Country_Name));
						     $('#result1').css("display","block"); 
						});

						}catch(e) {		
							alert('Exception while request..');
						}		
					}else{
						$('#result').html($('<li/>').text("No Data Found"));		
					}		
					
				},
				error: function(){						
					alert('Error while request..');
				}
			});
			}
			return false;
		  });
		});
	function myfunction(college){
			var elem = document.getElementById("college");
		elem.value = college;
		document.getElementById('result').style.display = "none";
	}
	function myfunction2(college){
			var elem = document.getElementById("country_code");
		elem.value = college;
		document.getElementById('result1').style.display = "none";
	}
	$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});
	</script>
	<?php
	function tree($child_node,$child_name,$child_ques,$child_ansop,$child_nodetype,$node_flag,$node_pos,$child,$string,$college,$country)
	{
		echo '<ul>';
		for($j=0;$j<sizeof($child_node);$j++)
	    {
		        	if($child_node[$j] == "0")
		        	{
		        		$flag = 0;
		        	}
		        	else
		        	{
			            $flag = 1;
		        		$val = $child_node[$j] -1;
		        		$node_flag[$val] = 1;
		        		$pos = $node_pos[$val+1];
		        		$y = $val +1;
		        		echo '<li>';
			            if($j%2 ==0)
			            {
			            	echo '<span><i class="icon-minus-sign"></i>';
			            }
			            else
			            {
			            	echo '<span><i class="icon-leaf"></i>';
			            }
			             if($child_nodetype[$j] == 'Structural')
			            {
			            	 echo anchor('main/show_attrtree/'.$y.'/'.$country,'expand_AttrTree');
			            	 echo '<br>';
			            }
			         
			            if($string[$pos] == 0)
			            {
			            	echo anchor('main/enable_coll_bit/'.$pos.'/'.$college.'/'.$country,'Enable Node');
			            	echo '<br>';
			            }
			            else
			            {
			            	echo anchor('main/disable_coll_bit/'.$pos.'/'.$college.'/'.$country,'Disable Node');
			            	echo '<br>';
			            }
			            echo 'Node-position: '.$node_pos[$val+1];
			            
			            echo '<br>'.'Node-ID:'.$y.'<br>';
			            echo 'Type:'.$child_nodetype[$j].'<br>';
			            echo  $child_name[$j];
			            if($child_ansop[$j] == NULL)
				        {
				        	echo '<br>'.'QNo:'.$child_ques[$j];
				        }
			            echo '</span>';
			            $child1_node = $child_node[$j] - 1	;
			            $childnode1 = $child[$child1_node];
			        	$child_node1 = $childnode1['child_node'];
			        	$child_name1 = $childnode1['child_name'];
			        	$child_ques1 = $childnode1['child_ques'];
	        			$child_ansop1 = $childnode1['child_ansop'];
	        			$child_nodetype1 = $childnode1['child_nodetype'];

	        		}
	        		if($flag == 1)
	        		{
	        			$node_flag = tree($child_node1,$child_name1,$child_ques1,$child_ansop1,$child_nodetype1,$node_flag,$node_pos,$child,$string,$college,$country);
			            echo '</li>';
	        		}
		}
		echo '</ul>';
		return $node_flag;
	}
	?>
</head>
<body>
<div id="container">
	<center><h1>Change College Bit String</h1></center>
	

	
	<?php 
	
	if($string[0] == 1)
	{
		
		 $data = array(
		 'name' => 'college',
		 'id'   => 'college',
		 );
		 $data1 = array(
		 'name'  => 'country_code',
		 'id'    => 'country_code'
		 );
		 echo form_open('main/change_bit');
		 echo validation_errors();
		 echo "<p>College Name: ";
		 echo form_input($data);
		 echo "</p>";
		 echo "<div id = result > </div>";
		 echo '<br>';
		 echo 'Country Name:';
		 echo form_input($data1);
		 echo "</p>";
		 echo "<div id = result1 > </div>";
		 echo '<br>';
		 echo form_submit('node_submit', 'Submit');
		 echo "</p>";
		 echo form_close();
	

	}
	else
	{
		$college = $this->input->post('college');
		$country = $this->input->post('country_code');
		echo '<center><h3>College:'.$college.'<br></h3></center>';
		echo '<center><h3>Country:'.$country.'<br></h3></center>';
		echo '<div class="tree well">';
		
		for($i=0;$i<sizeof($node);$i++)
		{
			$node_flag[$i] = 0;
		}
		echo '<center> Questions Table</center>';
		echo '<table style="width:100%">';
		for($i=0;$i<sizeof($question);$i++)
		{
			echo '<tr>';
			$y = $i +1;
			echo '<td>'.$y.'</td>';
			echo '<td>'.$question[$i].'</td>';
			$option_value = $option_content[$i];
			for($j=0;$j<$opt_num[$i];$j++)
			{
				echo '<td>'.$option_value[$j].'</td>';
			}
			echo '<tr>';

		}
		echo '</table>';
		echo '<h3>Structure Tree </h3>';
		echo '<ul>';
		for($i=0;$i<sizeof($node);$i++)
		{
			if($node_flag[$i] == 0)
			{
		 		echo '<li>';
		        echo '<span><i class="icon-folder-open"></i>';
		        $y = $i+1;
		        
		         if($node_type[$i] == 'Structural')
			    {
		        	 echo anchor('main/show_attrtree/'.$y.'/'.$country,'expand_AttrTree');
	            	 echo '<br>';
			    }
		        echo 'Node-position: '.$node_pos[$i+1];
		        echo '<br>'.'Node-ID:'.$y;
		        echo '<br>'.'Type:'.$node_type[$i];
		        echo '<br>'.$node_name[$i];
		        if($node_ansop[$i] == NULL)
		        {
		        	echo '<br>'.'QNo:'.$node_ques[$i];
		        }
		        echo '</span>';
	        	$childnode = $child[$i];
	        	$child_node = $childnode['child_node'];
	        	$child_name = $childnode['child_name'];
	        	$child_ques = $childnode['child_ques'];
	        	$child_ansop = $childnode['child_ansop'];
	        	$child_nodetype = $childnode['child_nodetype'];
	        	$node_flag = tree($child_node,$child_name,$child_ques,$child_ansop,$child_nodetype,$node_flag,$node_pos,$child,$string,$college,$country);
		        echo '</li>';
		        
			}
		}
		echo '</ul>';

	}
	?>
</div>




<br>


<a href='<?php echo base_url()."main/logout"  ?>'> Logout </a>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>