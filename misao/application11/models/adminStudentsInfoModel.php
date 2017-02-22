<?php

class AdminStudentsInfoModel extends CI_MODEL
{
	public function get_profile_info($u_id)
    {
        $this->load->database();
        $q = $this->db->query("SELECT  a.u_id, a.u_fname,a.u_lname,a.u_gender,a.u_email,a.u_phone,a.u_pass,a.u_image, b.u_course,b.u_en_level,c.u_doj,c.u_doe FROM    misao_user a 
		INNER JOIN misao_student b ON a.u_id = b.u_id INNER JOIN misao_user_add c  ON a.u_id = c.u_id WHERE a.u_id = '".$u_id."'");
		$result= $q->result_array();
		
        return $result;
    }

    public function searchInfo($userType,$userName,$userDOJ,$userDOE,$userAuth,$userCourse,$userLevel)
    {
        $this->load->database();

        $this->db->select('misao_user.u_id');
        $this->db->select('misao_user.u_fname');
        $this->db->select('misao_user.u_lname');
        $this->db->from('misao_user');
        $this->db->where('u_type',$userType);
        if($userName != '')
        {
            $searchName = "(u_fname LIKE '%$userName%' OR u_lname LIKE '%$userName%')";
            $this->db->where($searchName);
        }
        if($userDOJ != '')
        {
            $searchDOJ = "u_doj >= '$userDOJ'";
            $this->db->where($searchDOJ);
        }
        if($userDOE != '')
        {
            $searchDOE = "u_doe <= '$userDOE'";
            $this->db->where($searchDOE);
        }
        if($userAuth != ''){ $this->db->where('u_authority',$userAuth); }
        if($userType == 'student' && $userCourse != ''){ $this->db->like('misao_student.u_course',$userCourse); }
        if($userType == 'teacher' && $userCourse != ''){ $this->db->like('misao_teacher.u_course',$userCourse); }
        if($userType == 'student' && $userLevel != ''){ $this->db->where('u_en_level',$userLevel); }

        $this->db->join('misao_user_add','misao_user.u_id = misao_user_add.u_id','left');
        $this->db->join('misao_student','misao_user.u_id = misao_student.u_id','left');
        $this->db->join('misao_teacher','misao_user.u_id = misao_teacher.u_id','left');

        $query = $this->db->get();

        return $query;
    }

    public function delete($userId)
    {
        $this->load->database();

        $daleteTables = array('misao_user','misao_user_add','misao_student','misao_teacher');
        $this->db->where('u_id',$userId);
        $this->db->delete($daleteTables);
    }

    public function detail($userId)
    {
        $this->load->database();

        $this->db->select('u_type');
        $this->db->from('misao_user');
        $this->db->where('u_id',$userId);
        $userType = $this->db->get();

        $this->db->from('misao_user');
        $this->db->where('misao_user.u_id',$userId);

        $this->db->join('misao_user_add','misao_user.u_id = misao_user_add.u_id','left');
        if($userType->row()->u_type == 'student'){ $this->db->join('misao_student','misao_user.u_id = misao_student.u_id','left'); }
        if($userType->row()->u_type == 'teacher'){ $this->db->join('misao_teacher','misao_user.u_id = misao_teacher.u_id','left'); }

        $query = $this->db->get();
        return $query;
    }

    public function updateStaff($updateId,$updateAuth,$updateDOJ,$updateDOE)
    {
        $this->load->database();

        $updateDataArr = array('u_doj' => $updateDOJ, 'u_doe' => $updateDOE, 'u_authority' => $updateAuth);
        $this->db->where('u_id',$updateId);
        $this->db->update('misao_user_add',$updateDataArr);

        $this->db->from('misao_user');
        $this->db->where('misao_user.u_id',$updateId);
        $this->db->join('misao_user_add','misao_user.u_id = misao_user_add.u_id','left');
        $query = $this->db->get();
        return $query;
    }

    public function updateTeacher($updateId,$updateAuth,$updateDOJ,$updateDOE,$updateCourse)
    {
        $this->load->database();

        $updateDataArr = array('u_doj' => $updateDOJ, 'u_doe' => $updateDOE, 'u_authority' => $updateAuth);
        $this->db->where('u_id',$updateId);
        $this->db->update('misao_user_add',$updateDataArr);

        $updateCourseArr = array('u_course' => $updateCourse);
        $this->db->where('u_id',$updateId);
        $this->db->update('misao_teacher',$updateCourseArr);

        $this->db->from('misao_user');
        $this->db->where('misao_user.u_id',$updateId);
        $this->db->join('misao_user_add','misao_user.u_id = misao_user_add.u_id','left');
        $this->db->join('misao_teacher','misao_user.u_id = misao_teacher.u_id','left');
        $query = $this->db->get();
        return $query;
    }

    public function updateStudent($updateId,$updateAuth,$updateDOJ,$updateDOE,$updateCourse,$updateLevel)
    {
        $this->load->database();

        $updateDataArr = array('u_doj' => $updateDOJ, 'u_doe' => $updateDOE, 'u_authority' => $updateAuth);
        $this->db->where('u_id',$updateId);
        $this->db->update('misao_user_add',$updateDataArr);

        $updateStudentArr = array('u_course' => $updateCourse, 'u_en_level' => $updateLevel);
        $this->db->where('u_id',$updateId);
        $this->db->update('misao_student',$updateStudentArr);

        $this->db->from('misao_user');
        $this->db->where('misao_user.u_id',$updateId);
        $this->db->join('misao_user_add','misao_user.u_id = misao_user_add.u_id','left');
        $this->db->join('misao_student','misao_user.u_id = misao_student.u_id','left');
        $query = $this->db->get();
        return $query;
    }

}

?>
