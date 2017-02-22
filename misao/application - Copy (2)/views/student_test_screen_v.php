<div class="col-md-12">
<?php
	$today_test_data;
		echo '<center style="border-radius:180px;"><h3 style="border-radius:180px;background-color:red;">Test Paper</h3></center>';
		echo '<div class="col-md-8">';
		echo '<div class="form-group">';
			if(isset($today_test_data))
			{	
				$test_data = $today_test_data[0]['test_data'];
				$test_data =  json_decode($test_data,true);
				$qustion_no = 0;
				foreach($test_data as $each_qus_data)
				{
					$qustion_type = explode('_',$each_qus_data['qustion_no_type']);
					if($qustion_type[4] == 'imgt')
					{	
						$qustion_no_type = $each_qus_data['qustion_no_type'];
						echo  '<div class="col-sm-12">';
						echo  '<div class="col-sm-6" style="color:blue;"> <h4>Question No '.$qustion_type[1].'</h4></div>';
						echo  '<div class="each_q_box" qus_type="'.$qustion_no_type.'" >';
						echo  '<div class="col-sm-10" style="margin-top:1%;">';
						echo  '<p class="form-control" style="font-weight:bolder">'.ucfirst($each_qus_data[1]).'</p>';
						echo  '</div>';
						array_pop($each_qus_data);
						array_pop($each_qus_data);
						array_shift($each_qus_data);
						$option_namee = "A";
						foreach($each_qus_data as $each_qus_index)
						{
							echo  '<div id="container" class="col-md-4 '.$qustion_no_type.'" style="margin-top:1%">';
							echo  '<div class="col-md-12 "><img src="'.base_url().'external/test_images/'.$each_qus_index.'" class="img-rounded" style="width:70%;height:150px;"/></div>';
							echo  '<div style="margin-left:25%" class="  btn btn-primary "><label>'.$option_namee.'<input  type="radio" class="'.$qustion_no_type.'" name="'.$qustion_no_type.'" style="margin-left:18%" value="'.$option_namee.'" ></label></div>';
							echo  '</div>';
							$option_namee++;
						}
						echo  '</div>';
						echo  '</div>';
						echo  '</div>';
					}
					elseif($qustion_type[4] == 'optt')
					{ 
						$qustion_no_type = $each_qus_data['qustion_no_type'];
						echo  '<div class="col-sm-12">';
						echo  '<div class="col-sm-6" style="color:blue;"> <h4>Qustion No '.$qustion_type[1].'</h4></div>';
						echo '<div class="each_q_box" qus_type="'.$qustion_no_type.'" >';
						echo '<div class="col-sm-10" style="margin-top:1%;">';
						echo '<p class="form-control " style="font-weight:bolder">'.ucfirst($each_qus_data[1]).'</p>';
						echo '</div>';
						array_pop($each_qus_data);
						array_shift($each_qus_data);
						array_shift($each_qus_data);
						$option_namee = "A";
						foreach($each_qus_data as $each_qus_index)
						{
							echo '<div class="col-sm-10">';
							echo '<div class="col-sm-1 btn btn-primary">';
							echo  '<label>'.$option_namee.'<input  type="radio" class="'.$qustion_no_type.'" name="'.$qustion_no_type.'" style="margin-left:18%;margin-right:18%" value="'.$each_qus_index.'" ></label>';
							echo '</div>';
							echo '<div class="col-sm-11" style="margin-left:-1%;">';
							echo '	<p class="form-control pull-left" style="margin-top:1%">'.$each_qus_index.'</p>';
							echo '</div>';
							echo '</div>';
							$option_namee++;
						}
						echo '</div>';
						echo  '</div>';
					}
					elseif($qustion_type[4] == 'clozt')
					{
						$qustion_no_type = $each_qus_data['qustion_no_type'];
						echo  '<div class="col-sm-12">';
						echo  '<div class="col-sm-6" style="color:blue;"> <h4>Qustion No '.$qustion_type[1].'</h4></div>';
						echo '<div class="each_q_box" qus_type="'.$qustion_no_type.'" >';
						echo '<div class="col-sm-10" style="margin-top:1%;">';
						echo '<p class="form-control " style="font-weight:bolder">'.ucfirst($each_qus_data[1]).'</p>';
						echo '</div>';
						array_shift($each_qus_data);
						$size  = count($each_qus_data);
						$clzno = 1;
						$optno = 0;
						$option_namee = "A";
						for($i = 1 ;$i < $size;$i++)
						{	echo '<div class="'.$qustion_no_type.'_clzbox'.'">';
							if($i == 1)
							{
							echo '<div class="col-sm-6 " style="color:green;"> <h4>Cloze No '.$clzno.'</h4></div>';
							echo '<div class="col-sm-10 ">';
								
							echo '<div class="col-sm-1 btn btn-primary">';
							echo  '<label>'.$option_namee.'<input  type="radio" class="'.$qustion_no_type.'" name="'.$qustion_no_type.'_'.$clzno.'" style="margin-left:18%;margin-right:18%" value="'.$each_qus_data[$i-1].'" ></label>';
							echo '</div>';
							echo '<div class="col-sm-11" style="margin-left:-1%;">';
							echo '	<p class="form-control pull-left" style="margin-top:1%" >'.$each_qus_data[$i-1].'</p>';
							echo '</div>';
							echo '</div>';
							$option_namee++;
							}
							else if($i%5 == 0)
							{
								$optno = 0;
								if($i != $size-1)
								{
								$clzno++;
								echo '<div class="col-sm-6 " style="color:green;"> <h4>Cloze No '.$clzno.'</h4></div>';
								$option_namee = "A";
								}
							}
							else
							{
								echo '<div class="col-sm-10 ">';
								echo '<div class="col-sm-1 btn btn-primary">';
								echo  '<label>'.$option_namee.'<input  type="radio" class="'.$qustion_no_type.'" name="'.$qustion_no_type.'_'.$clzno.'" style="margin-left:18%;margin-right:18%" value="'.$each_qus_data[$i-1].'" ></label>';
								echo '</div>';
								echo '<div class="col-sm-11" style="margin-left:-1%;">';
								echo '	<p class="form-control pull-left" style="margin-top:1%" >'.$each_qus_data[$i-1].'</p>';
								echo '</div>';
								echo '</div>';
								$option_namee++;
							}
							echo '</div>';
						}
						echo  '</div>';
						echo  '</div>';
					}
					elseif($qustion_type[4] == 'blankqt')
					{
						$qustion_no_type = $each_qus_data['qustion_no_type'];
						array_pop($each_qus_data);
						echo  '<div class="col-sm-12">';
						echo  '<div class="col-sm-6" style="color:blue;"> <h4>Qustion No '.$qustion_type[1].'</h4></div>';
						echo  '<div class="each_q_box" qus_type="'.$qustion_no_type.'" >';
						echo  '<div class="col-sm-12" style="margin-top:1%;">';
						$replace_textbox = '<input type="text" class=" '.$qustion_no_type.'	"   style="border: none;border-bottom: 1px solid;"/>';
						echo  '<p >'.str_replace("@raj",$replace_textbox,$each_qus_data[1]).'</p>';//str_replace("@raj"," hiii ",$each_qus_data[1]);
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					$qustion_no = $qustion_type[1]+1;
				}
			}
		?>
				<div class="col-sm-10">
					<button id="btn_std_test_submit"  type="button" class="btn btn-primary btn-lg btn-block form-control" testno="<?php echo $today_test_data[0]['test_no'];?>">Submit</button>
				</div>
			</div>
		</div>
</div>

