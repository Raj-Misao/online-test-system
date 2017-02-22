<?php

class Students_test_model extends CI_MODEL
{
    public function check_today_test($u_id)
    {
        $this->load->database();
        $user_data = $this->db->query("SELECT * FROM misao_student WHERE u_id = '".$u_id."';");
		$result= $user_data->result_array();
        return $result;
    }
	
	public function get_today_test_data($test_no)
    {
        $this->load->database();
        $q = $this->db->query("SELECT * FROM test_info WHERE test_no = '".$test_no."';");
		$result= $q->result_array();
		
        return $result;
    }

    public function delete_new_student($delete_user_id)
    {
        $this->load->database();
        $delete = $this->db->query("DELETE FROM misao_user WHERE u_id = '$delete_user_id'");
    }

    public function take_regi_info($regi_user_id)
    {
        $this->load->database();
        $regi_info = $this->db->query("SELECT * FROM misao_user WHERE u_id = '$regi_user_id'");
        return $regi_info;
    }
    public function test_record_insert($u_id,$test_no,$t_result_data)
    {
		// echo $u_id;
		// echo $test_no;
		 // $t_result_data;
		 
		  $insert_test_result_data = array(
            'tr_id' => '',
            'tr_uid' => $u_id,
            'tr_no' => $test_no,
            'tr_data' => $t_result_data
        );
	
		$this->load->database();
		// $where = "tr_uid='".$u_id."' AND tr_no='".$test_no."'";
        // // $this->db->where($where);
        // // $this->db->where('u_pass',$pass);
        $query = $this->db->query("select * from test_record WHERE tr_uid = '".$u_id."' AND tr_no = '".$test_no."' ");
        $test_record_insert = $query->num_rows();
        if($test_record_insert > 0)
		{ 
			$query = $this->db->query("UPDATE test_record SET  	tr_data = '".$t_result_data."' WHERE tr_uid = '".$u_id."' AND tr_no = '".$test_no."' ");
			//$results = $query->num_rows();
			if($query)
			{
				//$where = "tr_uid='".$u_id."' AND tr_no='".$test_no."'";
				$query = $this->db->query("select * from test_record WHERE tr_uid = '".$u_id."'");
				return $test_record_insert = $query->result_array();
				//print_r($test_record_insert);
			}
			else
			{
				echo "Try Again Test not Approved";
			}
		} 
		else 
		{ 
			
			$result = $this->db->insert('test_record',$insert_test_result_data);
			if($result)
			{
				//$where = "tr_uid='".$u_id."' AND tr_no='".$test_no."'";
				$query = $this->db->query("select * from test_record WHERE tr_uid = '".$u_id."' ");
				return $test_record_insert = $query->result_array();
				//print_r($test_record_insert);
			}
			else
			{
				echo "Try Again";
			}
		
		}
    }
    public function test_record_show($u_id)
    {
		$u_id;
		$this->load->database();
		$where = "tr_uid='".$u_id."'";
        $query = $this->db->query("select * from test_record WHERE tr_uid = '".$u_id."'");
        $test_record_show = $query->result_array();;
        if(isset($test_record_show))
		{ 
			return $test_record_show;
		} 
		else 
		{ 
			echo 'false';
		}
    }

}

?>
