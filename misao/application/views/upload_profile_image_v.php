<?php
	$u_id = $this->session->userdata('u_id');
	$user_fname = $this->session->userdata('u_fname');
	$user_lname = $this->session->userdata('u_lname');
	$image_name = $u_id.$user_fname.$user_lname.'.jpg';
	$name = $_FILES['file']['name'];
	$type = $_FILES['file']['type'];
	$size = $_FILES['file']['size'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$name = preg_replace("#[^a-z0-9.]#i","",$name);
	if (isset($_FILES['file']) && $name!="") 
	{	
		if (($type=="image/jpg") || ($type=="image/jpeg") || ($type=="image/png") || ($type=="image/gif") && ($size<=30000))
		{
			 $path =  'D:/xampp/htdocs/misao/external/profile_images/'.$image_name;
			move_uploaded_file($tmp_name,$path);
			echo 'external/profile_images/'.$image_name;
		}
		else
		{
			echo "file type is wrong";
		}
	}
	else
	{
		echo "file is not selected.";
	}
?>