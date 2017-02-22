<?php
$u_type = $this->session->userdata('u_type');
if($u_type == 'normal')
{
	//Student Desh Bord
	$user_fname = $this->session->userdata('u_fname');
	$user_lname = $this->session->userdata('u_lname');
 	$title_name = $user_fname . ' ' . $user_lname;
	if(empty($user_info))
	{
		echo '<div id="admin_new_students_title" style="color:blue;">Hi '.ucwords($title_name).' You Are Welcome To Misao Online Test System </div>';
	}
	else
	{
		if($user_info[0]['test_aproved'] == 0)
		{
			echo '<div id="admin_new_students_title" style="color:blue;">Hi '.ucwords($title_name).' Welcome To Misao Online Test System  </div>';
		}
		else
		{
			echo '<div id="admin_new_students_title" style="color:blue;">Hi '.ucwords($title_name).' Today Is Your Test   We Wish You All The Best </div>';
		}
		
	}
}
else
{
	//Admin Desh Bord
?>

	<div id="admin_new_students_title">New Members</div>
	<?php if($user_info->num_rows() == 0){ echo '<div id="admin_new_students_nostudent">No new student now...</div>'; } else { ?>

	<div id="admin_new_students_replace">

		<table id="admin_new_students_table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Details</th>
				<th>Approve</th>
				<th>Refuse</th>
			</tr>
		<?php foreach($user_info->result() as $row){ ?>
			<tr>
				<td><?php echo $row->u_id; ?></td>
				<td><?php echo ucfirst(strtolower($row->u_fname)); ?> <?php echo ucfirst(strtolower($row->u_lname)); ?></td>
				<td><div id="admin_new_students_table_detailbtn" delebtn="<?php echo $row->u_id; ?>">Details</div></td>
				<td><div id="admin_new_students_table_regibtn" delebtn="<?php echo $row->u_id; ?>">Enroll</div></td>
				<td><div id="admin_new_students_table_delebtn" delebtn="<?php echo $row->u_id; ?>">Delete</div></td>
			</tr>
		<?php } ?>
			<tr></tr>
		</table>

	</div>
	<?php } ?>	
	
<?php
}
?>
