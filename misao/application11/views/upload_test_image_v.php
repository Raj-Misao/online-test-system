<?php
	// print_r($_FILES);
	// print_r($_POST);

	$name = $_FILES['file']['name'];
	$type = $_FILES['file']['type'];
	$size = $_FILES['file']['size'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$name = preg_replace("#[^a-z0-9.]#i","",$name);
	if (isset($_FILES['file']) && $name!="") {
		
		if (($type=="image/jpg") || ($type=="image/jpeg") || ($type=="image/png") || ($type=="image/gif") && ($size<=30000))
		{
			 $path =  'D:/xampp/htdocs/misaoraj/external/test_images/'.$name;
			// $paths =  base_url().'assets/hhh/';
			move_uploaded_file($tmp_name,$path);
			//echo "file is submit successfully";
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