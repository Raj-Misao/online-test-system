<?php

class Test_data_model extends CI_MODEL
{
	public function last_test_info()
    {
        $this->load->database();
        $q = $this->db->query("SELECT * FROM test_info order by test_no DESC limit 1");
		$result= $q->result_array();
		
        return $result;
    }
	public function get_all_test_tbl_data()
    {
        $this->load->database();
        $q = $this->db->query("SELECT * FROM test_info ");
		$result= $q->result_array();
		
        return $result;
    }
	public function insert_new_test_data($test_no,$test_data)
    {
        $this->load->database();
        $insert_test_info = array(
            'tid' => '',
            'test_no' => $test_no,
            'test_data' => $test_data
        );
        $query = $this->db->query("SELECT * FROM test_info WHERE test_no = '".$test_no."'");
		$results = $query->num_rows();
		if($results > 0)
		{
			echo "Try Again This Test No Is Already present";
		}
		else
		{
			$result = $this->db->insert('test_info',$insert_test_info);
			if($result)
			{
				echo "Test is Saved Successfully";
			}
			else
			{
				echo "Try Again";
			}
		}
    }
	public function insert_updated_test_data($test_no,$test_data)
    {
        $this->load->database();
        $query = $this->db->query("UPDATE test_info SET test_data = '".$test_data."' WHERE test_no = '".$test_no."'");
		//$results = $query->num_rows();
		if($query)
		{
			echo "Test is Updated Successfully";
		}
		else
		{
			echo "Try Again Its not saved";
		}
    }
	
	public function student_for_test_aprovel()
    {
        $this->load->database();
        $user_data = $this->db->query("SELECT * FROM misao_user WHERE u_type = 'student';");
        return $user_data;
    }
	
	public function updated_aprovel_test_id($test_aprove_uid,$test_aprove_id)
    {
        $this->load->database();
        $query = $this->db->query("UPDATE misao_student SET test_aproved = '".$test_aprove_id."' WHERE u_id = '".$test_aprove_uid."'");
		//$results = $query->num_rows();
		if($query)
		{
			echo "Test No '".$test_aprove_id."' has Approved To Student ID NO  '".$test_aprove_uid."'";
		}
		else
		{
			echo "Try Again Test not Approved";
		}
    }
}

?>
