<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Attribute tree</title>
	
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
	</style>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.technicalkeeda.com/js/javascripts/plugin/json2.js"></script>
	<script>
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
	function tree($child_node,$child_name,$child_ques,$child_ansop,$child_nodetype,$node_flag,$node_pos,$child,$string,$country,$attrnode,$question,$option_content)
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
		        		$y = $val+1;
		        		echo '<li>';
			            if($child_nodetype[$j] == 'Structural')
					    {
				        	 echo '<span style="color:#0066ff;font-weight:bold"><i class="icon-folder-open" ></i>';
				        	
					    }
					    else
					    {
					    	echo '<span style="color:#ff33cc;font-weight:bold"><i class="icon-folder-open" ></i>';
					    }
			            if($string[$pos] == 0)
			            {
			            	echo anchor('main/enable_coun_attrbit/'.$pos.'/'.$country.'/'.$attrnode,'Enable',array('style'=>'color:red;font-weight:bold'));
			            	echo ',';
			            }
			            else
			            {
			            	echo anchor('main/disable_coun_attrbit/'.$pos.'/'.$country.'/'.$attrnode,'Disable',array('style'=>'color:#009933;font-weight:bold'));
			            	echo ',';
			            }
			            echo 'Pos:'.$node_pos[$val+1];
			            echo ', '.'ID:'.$y;
			            echo ', Type:';
			            if($child_nodetype[$j] == 'Structural')
					    {
					    	echo 'S, ';
					    }
					    else
					    {
					    	echo "D, ";

					    }
			            echo  $child_name[$j];
			            if($child_ansop[$j] == NULL)
				        {
				        	$q_no = $child_ques[$j] - 1;
		        			echo '<br>'.$child_ques[$j].'.'.$question[$q_no];
				        }
				        else
				        {
				        	$q_no = $child_ques[$j] - 1;
				        	$opt_no = $child_ansop[$j] - 1;
				        	//echo $opt_no;
							$content = $option_content[$q_no];
							//print_r($content);
				        	echo '<br>'.'Options:'.$content[$opt_no];
				        }
			            echo '</span>';
			            $child1_node = $child_node[$j] - 1;
			            $childnode1 = $child[$child1_node];
			        	$child_node1 = $childnode1['child_node'];
			        	$child_name1 = $childnode1['child_name'];
			        	$child_ques1 = $childnode1['child_ques'];
	        			$child_ansop1 = $childnode1['child_ansop'];
	        			$child_nodetype1 = $childnode1['child_nodetype'];

	        		}
	        		if($flag == 1)
	        		{
	        			$node_flag = tree($child_node1,$child_name1,$child_ques1,$child_ansop1,$child_nodetype1,$node_flag,$node_pos,$child,$string,$country,$attrnode,$question,$option_content);
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
	<br>		
	<?php 

	//echo $country;
	if($string[0] == -1)
	{
		 $data1 = array(
		 'name'  => 'country_code',
		 'id'    => 'country_code'
		 );
		 echo form_open('main/change_conbit');
		 echo validation_errors();
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
	echo '
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">

	    <div class="navbar-header navbar-middle">
	      <a class="navbar-brand" href="#">Country Specific Structural Attribute Tree</a>
	    </div>
	    <h4 class="navbar-text">'.$country.'</h4>
	    <div class="navbar-form navbar-right" role="search">
	      <button class="btn btn-info" data-toggle="modal" data-target="#NodeName" >Change Node Name</button>
	      <button class="btn btn-info" data-toggle="modal" data-target="#Option" >Add Options</button>
	      <button class="btn btn-info" data-toggle="modal" data-target="#myNewModal" >Insert Attribute Node</button>
 		</div>
	  </div>
	</nav>
	';

	echo '<!-- Modal -->
		  <div class="modal fade" id="NodeName" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <center><h4 class="modal-title">Change Node Name</h4></center>
		        </div>
		        <div class="modal-body">
		        	<form class="form-horizontal" role="form" method = "post" action = "'.base_url().'main/change_attrnodename">
		        	<div class="form-group">
					    <label class="control-label col-sm-3" for="node_id">Node ID:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control" name="node_id" placeholder="Enter Node ID">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="node_position">Node Name:</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" name="node_name" placeholder="Enter Node Name">
					    </div>
					  </div>
		        </div>
		        <div class="modal-footer">

		         <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Submit</button>
					    </div>
					  </div>
					</form>
		        </div>
		      </div>
		      
		    </div>
		  </div>';
	echo '<!-- Modal -->
		  <div class="modal fade" id="Option" role="dialog">
		    <div class="modal-dialog modal-sm">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <center><h4 class="modal-title">Add New Options</h4></center>
		        </div>
		        <div class="modal-body">
		        	<form class="form-horizontal" role="form" method = "post" action = "'.base_url().'main/add_options">
		        	
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="node_position">Content:</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" name="option_content" placeholder="Enter Option Content">
					    </div>
					  </div>
		        </div>
		        <div class="modal-footer">

		         <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Submit</button>
					    </div>
					  </div>
					</form>
		        </div>
		      </div>
		      
		    </div>
		  </div>';
	
	

		echo '
		<!-- Modal -->
		  <div class="modal fade" id="myNewModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <center><h4 class="modal-title">Insert Attribute Node</h4></center>
		        </div>
		        <div class="modal-body">
		        	<form class="form-horizontal" role="form" method = "post" action = "'.base_url().'main/admin_insertattrnode">
		        	
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="node_position">Node Position:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control" name="node_position" placeholder="Enter Node Position i.e node_position of parent + 1 ">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="node_name">Node Name:</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" name="node_name" placeholder="Enter Node Name">
					    </div>
					  </div>
					  <div class="form-group">
					  <label class="control-label col-sm-3" for="prev_node">Node Type:</label>
						   <div class="col-sm-8">
						   <select class="form-control" id="node_type" name = "node_type" onchange = "myfunction()">
						    <option>Decision</option>
						    <option>Structural</option>
						   
						  </select>
						  </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="prev_node">Parent Node:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control" name="prev_node" placeholder="Enter Parent Node">
					    </div>
					  </div>
					  <div class="form-group hidden">

					    <label class="control-label col-sm-3" for="trigger_ques">Question-ID:</label>
					    <div class="col-sm-4">
					      <input type="number" class="form-control" name="trigger_ques" id = "trigger_ques" placeholder="Enter Question ID">

					    </div>
					   </div>

						<script>
						function myfunction(){
							if($("#node_type").val()=="Structural")
							{
								 
								 $("#new_ques").addClass("hidden");
								 
							
							}
							else if($("#node_type").val()=="Decision")
							{
								$("#new_ques").removeClass("hidden");
								 $("#opt_num").removeClass("hidden");
								
							}
							else
							{
								$("#opt1").addClass("hidden");
								$("#opt2").addClass("hidden");
								$("#opt3").addClass("hidden");
								$("#opt4").addClass("hidden");
								$("#opt5").addClass("hidden");
								$("#opt_num").addClass("hidden");
							}
						}
			

						$(document).ready(function(){
						
						$("#trigger_ans").keyup(function(){
						var str = "#opt"
						for(i=1;i<=$("#trigger_ans").val();i++)
						{	
							var idvalue = str.concat(i);
							$(idvalue).removeClass("hidden");
						}
						for(;i<=5;i++)
						{
							var idvalue = str.concat(i);
							$(idvalue).addClass("hidden");
						}

				
						});

						
						});
						</script>	

					  <div class="form-group" id= "new_ques">
					    <label class="control-label col-sm-3 "  for="new_ques">Question-Content:</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control "  name="new_ques" placeholder="Enter Question ">
					    </div>
					  </div>
					  <div class="form-group " id = "opt_num" >
					    <label class="control-label col-sm-3 "  for="trigger_ans">Options:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control " name="trigger_ans" id="trigger_ans" placeholder="Enter Number of options">
					    </div>
					  </div>
					   <div class="form-group hidden" id = "opt1">
					    <label class="control-label col-sm-3" for="option_value">Option1:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control" name="option1" placeholder="Enter Option ID from options table">
					    </div>
					   </div>
					    <div class="form-group hidden" id = "opt2">
					    <label class="control-label col-sm-3" for="option_value">Option2:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control" name="option2" placeholder="Enter Option ID from options table">
					    </div>
					   </div>
					    <div class="form-group hidden" id = "opt3">
					    <label class="control-label col-sm-3" for="option_value">Option3:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control" name="option3" placeholder="Enter Option ID from options table">
					    </div>
					   </div>
					    <div class="form-group hidden" id = "opt4">
					    <label class="control-label col-sm-3" for="option_value">Option4:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control" name="option4" placeholder="Enter Option ID from options table">
					    </div>
					   </div>
					    <div class="form-group hidden" id = "opt5">
					    <label class="control-label col-sm-3" for="option_value">Option5:</label>
					    <div class="col-sm-8">
					      <input type="number" class="form-control" name="option5" placeholder="Enter Option ID from options table">
					    </div>
					  </div>

					 
					  
		          
		        </div>
		        <div class="modal-footer">

		         <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default">Submit</button>
					    </div>
					  </div>
					</form>
		        </div>
		      </div>
		      
		    </div>
		  </div>';
	

		echo '<br>';

		//$country = $this->input->post('country_code');
		//echo '<center><h3>Country:'.$country.'<br></h3></center>';
		echo '<div class="tree well">';
		
		for($i=0;$i<sizeof($node);$i++)
		{
			$node_flag[$i] = 0;
		}
		
		echo '<center><h3>Structure Tree </h3></center>';
		echo '<ul>';
		$attrnode = $attrnode_id;
		for($i=0;$i<sizeof($node);$i++)
		{
			if($node_flag[$i] == 0)
			{
		 		echo '<li>';
		 		$y = $i+1;
		        $pos = $node_pos[$i+1];
		        if($node_type[$i] == 'Structural')
			    {
		        	 echo '<span style="color:#0066ff;font-weight:bold"><i class="icon-folder-open" ></i>';
		        	 
			    }
			    else
			    {
			    	echo '<span style="color:#ff33cc;font-weight:bold"><i class="icon-folder-open" ></i>';
			    }
		        if($string[$pos] == 0)
			            {
			            	echo anchor('main/enable_coun_attrbit/'.$pos.'/'.$country.'/'.$attrnode_id,'Enable',array('style'=>'color:red;font-weight:bold'));
			            	echo ',';
			            }
			            else
			            {
			            	echo anchor('main/disable_coun_attrbit/'.$pos.'/'.$country.'/'.$attrnode_id,'Disable',array('style'=>'color:#009933;font-weight:bold'));
			            	echo ',';
			            }
		        echo 'Pos: '.$node_pos[$i+1];
		        echo ', ID:'.$y;
		        echo ', Type:';
		        if($node_type[$i] == 'Structural')
		        {
			    	echo 'S, ';
			    }
			    else
			    {
			    	echo "D, ";

			    }

		        echo $node_name[$i];
		        if($node_ansop[$i] == NULL)
		        {
		        	$z = $node_ques[$i] - 1;
		        	echo '<br>'.$node_ques[$i].'.'.$question[$z];
		        }
		        echo '</span>';
	        	$childnode = $child[$i];
	        	$child_node = $childnode['child_node'];
	        	$child_name = $childnode['child_name'];
	        	$child_ques = $childnode['child_ques'];
	        	$child_ansop = $childnode['child_ansop'];
	        	$child_nodetype = $childnode['child_nodetype'];
	        	$attrnode = $attrnode_id;
	        	$node_flag = tree($child_node,$child_name,$child_ques,$child_ansop,$child_nodetype,$node_flag,$node_pos,$child,$string,$country,$attrnode,$question,$option_content);
		        echo '</li>';
		        
			}
		}
		echo '</ul>';
		echo '<center><b> Questions Table</b></center>';
		echo '<br>';
		
		echo '<table class = "table table-bordered">';
		echo '<thead>';
		echo '<tr>';
		echo '<th> QNo</th>';
		echo '<th> Question</th>';
		echo '<th>Option1 </th>';
		echo '<th>Option2 </th>';
		echo '<th>Option3 </th>';
		echo '<th>Option4 </th>';
		echo '<th>Option5 </th>';
		echo '<th>Option6 </th>';
		echo '<th>Option7 </th>';
		echo '<th>Option8 </th>';
		echo '</tr>';
		echo '</thead>';
		for($i=0;$i<sizeof($question);$i++)
		{
			echo '<tbody>';
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
			echo '</tbody>';

		}
		echo '</table>';
		echo '<br>';

		echo '<center><b> Options Table</b></center>';
		echo '<br>';
		echo '<table class = "table table-bordered">';
		echo '<thead>';
		echo '<tr>';
		echo '<th> Option ID</th>';
		echo '<th> Option</th>';
		echo '</tr>';
		echo '</thead>';

		for($i=0;$i<sizeof($opt);$i++)
		{
			echo '<tr>';
			$y = $i +1;
			echo '<td>'.$y.'</td>';
			echo '<td>'.$opt[$i].'</td>';
			echo '<tr>';
			echo '</tbody>';
		}
		
		echo '</table>';

	}
	?>
</div>




<br>


<a href='<?php echo base_url()."main/logout"  ?>'> Logout </a>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>