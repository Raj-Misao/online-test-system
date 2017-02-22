<?php
	$test_qustion_data;
	$test_Q_data = json_decode($test_qustion_data[0]['test_data'],true);
	$test_answer_data;
	$test_result;
	$qno = 0;
	$correct_ans_count = 0;
	$total_qus_count = 0;
	foreach($test_Q_data as $test_qustion_d )
	{
		$qus_qus_type = explode('__',$test_qustion_d['qustion_no_type']);
		//print_r($qus_qus_type);
		foreach($test_answer_data as $test_Ans_data )
		{
			
			//echo $test_Ans_data['qustion_no_type'];
			//echo $test_qustion_d['qustion_no_type'];
			if($test_qustion_d['qustion_no_type'] == $test_Ans_data['qustion_no_type'])
			{
				if($qus_qus_type[1] == '1_imgt')
				{
					++$total_qus_count;
					if(empty($test_Ans_data[1]))
					{
						$test_Ans_data[1] = '--';
					}
					$test_result['Que.  '.++$qno]['s_ans'] = $test_Ans_data[1];
					$test_result['Que.  '.$qno]['t_ans'] = $test_qustion_d[5];
					if(strtolower($test_qustion_d[5]) == strtolower($test_Ans_data[1]))
					{
						++$correct_ans_count;
						
						$test_result['Que.  '.$qno]['ans_states'] = 'correct';
						//print_r( strtolower($test_qustion_d[5]));
						//print_r(strtolower($test_Ans_data[1]));
						//echo "\n";
					}
					else
					{
						$test_result['Que.  '.$qno]['ans_states'] = 'wrong';
					}
					//echo "img type";
					
				}
				else if($qus_qus_type[1] == '2_optt')
				{
					++$total_qus_count;
					if(empty($test_Ans_data[1]))
					{
						$test_Ans_data[1] = '--';
					}
					$test_result['Que.  '.++$qno]['s_ans'] = $test_Ans_data[1];
					$test_result['Que.  '.$qno]['t_ans'] = $test_qustion_d[5];
					if(strtolower($test_qustion_d[5]) == strtolower($test_Ans_data[1]))
					{
						++$correct_ans_count;
						$test_result['Que.  '.$qno]['ans_states'] = 'correct';
						//print_r( strtolower($test_qustion_d[5]));
						//print_r( strtolower($test_Ans_data[1]));
						//echo "\n";
					}
					else
					{
						$test_result['Que.  '.$qno]['ans_states'] = 'wrong';
					}
					//echo "optt type";
					
				}
				else if($qus_qus_type[1] == '3_clozt')
				{
					$test_qustion_d_temp = $test_qustion_d;
					
					array_shift($test_qustion_d_temp);
					
					array_pop($test_qustion_d_temp);
					
					$flag = 1;
					$flag_ans = 1;
					// echo '<pre>';
					// print_r($test_qustion_d_temp);
					// echo '<pre>';
					//$all_cloz_check = 0;
					//$test_result[++$qno]['cloz'] = 'Cloz Type';
					foreach($test_qustion_d_temp as $cloz_test_qustion_d)
					{
						if($flag%5 == 0)
						{		
							++$total_qus_count;
							if(empty($test_Ans_data[$flag_ans]))
							{
								$test_Ans_data[$flag_ans] = '--';
							}
							// echo '<pre>';
							// print_r($flag-1);
							// echo '<pre>';
							$test_result['Cloz '.$flag_ans]['s_ans'] = $test_Ans_data[$flag_ans];
							$test_result['Cloz '.$flag_ans]['t_ans'] = $test_qustion_d_temp[$flag-1];
							if(strtolower($test_qustion_d_temp[$flag-1]) == strtolower($test_Ans_data[$flag_ans]))
							{
								//++$all_cloz_check;
								$test_result['Cloz '.$flag_ans]['ans_states'] = 'correct';
								++$correct_ans_count;
							//	print_r(strtolower( $test_qustion_d_temp[$flag]));
							//	print_r(strtolower( $test_Ans_data[$flag_ans]));
							}
							else
							{
								$test_result['Cloz '.$flag_ans]['ans_states'] = 'wrong';
							}
							$flag_ans++;
							
							//echo "\n";
						}
						$flag++;
					}
					// echo "\n";
					// echo "\n";
					// echo $all_cloz_check;
					// echo $flag_ans -1;
					// echo "\n";
					// echo "\n";
					// // if($all_cloz_check > 0 && $all_cloz_check == $flag_ans - 1 )
					// // {
						// // ++$correct_ans_count;
						// // //print_r( $test_qustion_d_temp);
						// // //print_r( $test_qustion_d);
					// // }
					//echo "cloz type";
					
				}
				else if($qus_qus_type[1] == '4_blankqt')
				{
					++$total_qus_count;
					$test_result['Que.  '.++$qno]['s_ans'] = $test_Ans_data[1];
					$test_result['Que.  '.$qno]['t_ans'] = $test_qustion_d[2];
					if(strtolower($test_qustion_d[2]) == rtrim(strtolower($test_Ans_data[1]),','))
					{
						++$correct_ans_count;
						$test_result['Que.  '.$qno]['ans_states'] = 'correct';
						//print_r( strtolower($test_qustion_d[2]));
						//print_r( strtolower($test_Ans_data[1]));
					}
					else
					{
						$test_result['Que.  '.$qno]['ans_states'] = 'wrong';
					}
					//echo "blanck type";
					
				}
				
				//$ans_qus_type = explode('__',$test_Ans_data['qustion_no_type']);
				//print_r($qus_qus_type[1]);
				//print_r($ans_qus_type);
				//echo $test_qustion_d['qustion_no_type'];
			}
			
			//echo "\n";
			
			//print_r($test_qustion_d['qustion_no_type']);
		}
	}
	
	//echo "total no of correct qustion are = ".$correct_ans_count;
	$test_result['Final Result']['total_qus_count;'] = 'Total No Of Quetion = '.$total_qus_count;;
	$test_result['Final Result']['total_correct'] = 'Total Correct Answer = '.$correct_ans_count;
	$test_result['Final Result']['r_date'] = 'Date Of Test = '.date("d-m-Y");
	$student_test_result = json_encode($test_result);
	echo $student_test_result;
	//print_r($student_test_result);
	// foreach($test_Q_data as $test_qustion_d )
	// {
		// //$qustion_no_type = end($test_qustion_d);
		// print_r($test_qustion_d);
		
	// }
	// echo "RRRRRRRRRRRRRRR";
	// foreach($test_answer_data as $test_Ans_data )
	// {
	
		// print_r($test_Ans_data);
		// //echo "Raj";
	
	// }
?>


