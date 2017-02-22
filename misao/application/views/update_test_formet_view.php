<?php
	if(isset($_POST['test_no']))
	{
		$test_no 		= $_POST['test_no'];
		$no_of_question = $_POST['no_of_question'];
		echo '<center style="border-radius:180px;"><h3 style="border-radius:180px;background-color:red;">Update Test Formet is Ready To Use</h3></center>';
		echo '<div class="col-md-8">';
		echo '<div class="form-group">';		
		foreach($get_all_test_tbl_data as $each_test_data)
		{
			if($each_test_data['test_no'] == $test_no)
			{	
				$test_data = $each_test_data['test_data'];
				$test_data =  json_decode($test_data,true);
				$qustion_no = 0;
				foreach($test_data as $each_qus_data)
				{
					$qustion_type = explode('_',$each_qus_data['qustion_no_type']);
					if($qustion_type[4] == 'imgt')
					{		 
						$qustion_no_type = $each_qus_data['qustion_no_type'];
						echo  '<div class="col-sm-12">';
						echo  '<div class="col-sm-6" style="color:blue;"> <h4>Qustion No '.$qustion_type[1].'</h4></div>';
						echo  '<div class="each_q_box" qus_type="'.$qustion_no_type.'" >';
						echo '<div class="col-sm-10" style="margin-top:1%;">';
						echo '	<textarea class="form-control '.$qustion_no_type.'" rows="3"  placeholder="Qustion">'.$each_qus_data[1].'</textarea>';
						echo '</div>';
						array_pop($each_qus_data);
						array_pop($each_qus_data);
						array_shift($each_qus_data);
						foreach($each_qus_data as $each_qus_index)
						{
							echo  '<div id="container" class="col-md-10 '.$qustion_no_type.'" style="margin-top:1%">';
							echo  '<img src="'.base_url().'external/test_images/'.$each_qus_index.'" class="img-rounded" style="width:20%;height:20%;"/>';
							echo  '</div>';
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
						echo '	<textarea class="form-control '.$qustion_no_type.'" rows="3"  placeholder="Qustion">'.$each_qus_data[1].'</textarea>';
						echo '</div>';
						array_pop($each_qus_data);
						array_shift($each_qus_data);
						foreach($each_qus_data as $each_qus_index)
						{
							echo '<div class="col-sm-10">';
							echo '<input type="text" class="form-control '.$qustion_no_type.'"   value="'.$each_qus_index.'">';
							echo '</div>';
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
						echo '	<textarea class="form-control '.$qustion_no_type.'  " rows="3"  placeholder="Qustion">'.$each_qus_data[1].'</textarea>';
						echo '</div>';
						echo '<div class="col-sm-6" style="color:green;"> <h4>Cloze No 1</h4></div>';
						array_shift($each_qus_data);
						$size  = count($each_qus_data);
						$clzno = 1;
						$optno = 0;
						for($i = 1 ;$i < $size;$i++)
						{	
							if($i%5 == 0)
							{
								echo '<div class="col-sm-10">';
								echo '	<input type="text" class="form-control '.$qustion_no_type.'"  value="'.$each_qus_data[$i-1].'"   placeholder="Correct Answer">';
								echo '</div>';
								$optno = 0;
								if($i != $size-1)
								{
								$clzno++;
								echo '<div class="col-sm-6" style="color:green;"> <h4>Cloze No '.$clzno.'</h4></div>';
								}
							}
							else
							{
								echo '<div class="col-sm-10">';
								echo '	<input type="text" class="form-control '.$qustion_no_type.'"  value="'.$each_qus_data[$i-1].'"  placeholder="Option  '.++$optno.'">';
								echo '</div>';
							}
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
						echo '<div class="col-sm-10" style="margin-top:1%;">';
						echo'	<textarea class="form-control '.$qustion_no_type.'" rows="3"  placeholder="Enter Paragraph Using Of Token As ,, ">'.$each_qus_data[1].'</textarea>';
						echo '</div>';
						echo '<div class="col-sm-10">';
						echo '	<input type="text" class="form-control '.$qustion_no_type.'" value="'.$each_qus_data[2].'"  placeholder="Enter Answer Using Of Token As ,,">';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					$qustion_no = $qustion_type[1]+1;
				}
				
				for($i= $qustion_no;$i<$no_of_question+$qustion_no;$i++)
				{
				?>	
					<div class="col-sm-12">
						<div class="col-sm-6" style="color:blue;"> <h4>Qustion No <?php echo $i; ?></h4></div>
						<select class="form-control qustion_type col-sm-6"  style="font-size:medium; font-weight:bolder;color:red;">
							<option value="-1" style="font-size:medium; font-weight:bolder;color:blue;">Select Qustion Type</option>
							<option value="qno_<?php echo $i;?>__1_imgt" style="font-size:medium; font-weight:bolder;color:blue;">1 -> Image Type Qustion</option>
							<option value="qno_<?php echo $i;?>__2_optt" style="font-size:medium; font-weight:bolder;color:blue;">2 -> Optional Type Qustion</option>
							<option value="qno_<?php echo $i;?>__3_clozt" style="font-size:medium; font-weight:bolder;color:blue;">3 -> Choose Clue Type Qustion </option>
							<option value="qno_<?php echo $i;?>__4_blankqt" style="font-size:medium; font-weight:bolder;color:blue;">4 -> Fillin the Blanks Type Qustion</option>
						<select>
						<div class=" formetresdiv" style="margin-left:-2%;">
							
						</div>
					</div>
				<?php			
				}
			}
		}
		?>
				<div class="col-sm-10">
					<button id="updated_tes_data_ins_btn"  type="button" class="btn btn-primary btn-lg btn-block form-control">Submit</button>
				</div>
			</div>
		</div>
		<?php
	}
	else
	{
		echo "Error Retry To Create";
	}
?>