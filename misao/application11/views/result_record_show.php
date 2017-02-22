
<?php 
	if(!empty($get_test_result_data))
	{
		$flag = 1;
		foreach($get_test_result_data as $each_test_result_data)
		{
			//echo 'hello';
			echo '<center style="margin-top:1%;font-weight:bolder;font-size:20px;"> Test No '.$flag++.'</center>';
			echo '<table class="table table-striped table-hover" style="margin-top:1%;font-weight:bolder;">';
			echo '<tr style="background-color:#9f81f7;color:yellow;"><th>Question No</th><th>Your Answer</th><th>Correct Answer</th><th>Answer Status</th></tr>';
			$result_Q_data = json_decode($each_test_result_data['tr_data'],true);
			foreach($result_Q_data as $key => $each_result_Q_data)
			{
				if($key == 'Final Result')
				{
					echo '<tr style="background-color:#9f81f7;color:yellow;font-weight:bolder;">';
				}
				else
				{
					echo '<tr>';
				}	
				echo '<td>';
				echo $key;
				echo '</td>';
				foreach($each_result_Q_data as  $each_result_data)
				{
					echo '<td>';
					echo $each_result_data;
					echo '</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
			// echo '<pre>';
			// print_r($each_test_result_data['tr_date'] );
			// echo '</pre>';
		}
	
	// echo '<pre>';
	// print_r($get_test_result_data);
	// echo '</pre>';
	}
	else
	{
		echo '<div id="admin_new_students_nostudent">No Test Results Found ...</div>';
	}

?>
