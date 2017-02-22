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
		foreach($test_answer_data as $test_Ans_data )
		{
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
					}
					else
					{
						$test_result['Que.  '.$qno]['ans_states'] = 'wrong';
					}
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
					}
					else
					{
						$test_result['Que.  '.$qno]['ans_states'] = 'wrong';
					}
				}
				else if($qus_qus_type[1] == '3_clozt')
				{
					$test_qustion_d_temp = $test_qustion_d;
					array_shift($test_qustion_d_temp);
					array_pop($test_qustion_d_temp);
					$flag = 1;
					$flag_ans = 1;
					foreach($test_qustion_d_temp as $cloz_test_qustion_d)
					{
						if($flag%5 == 0)
						{		
							++$total_qus_count;
							if(empty($test_Ans_data[$flag_ans]))
							{
								$test_Ans_data[$flag_ans] = '--';
							}
							$test_result['Cloz '.$flag_ans]['s_ans'] = $test_Ans_data[$flag_ans];
							$test_result['Cloz '.$flag_ans]['t_ans'] = $test_qustion_d_temp[$flag-1];
							if(strtolower($test_qustion_d_temp[$flag-1]) == strtolower($test_Ans_data[$flag_ans]))
							{
								$test_result['Cloz '.$flag_ans]['ans_states'] = 'correct';
								++$correct_ans_count;
							}
							else
							{
								$test_result['Cloz '.$flag_ans]['ans_states'] = 'wrong';
							}
							$flag_ans++;
						}
						$flag++;
					}
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
					}
					else
					{
						$test_result['Que.  '.$qno]['ans_states'] = 'wrong';
					}
				}
			}
		}
	}
	$test_result['Final Result']['total_qus_count;'] = 'Total No Of Quetion = '.$total_qus_count;;
	$test_result['Final Result']['total_correct'] = 'Total Correct Answer = '.$correct_ans_count;
	$test_result['Final Result']['r_date'] = 'Date Of Test = '.date("d-m-Y");
	$student_test_result = json_encode($test_result);
	echo $student_test_result;
	}
?>


