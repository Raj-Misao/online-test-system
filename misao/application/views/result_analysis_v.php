<div id="admin_new_students_title"><center style="border-radius:180px;background-color:red;">Today Test  Aprovel</center></div>
<?php if($user_info->num_rows() == 0){ echo '<div id="admin_new_students_nostudent">No new student now...</div>'; } else { ?>
<table class="table table-hover" style="font-weight:bolder;"> <!--id="admin_new_students_table"-->
    <tr style="color:blue;font-size:17px;">
        <th>ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Check Results</th>
        <th>Image</th>
    </tr>
<?php foreach($user_info->result() as $row){ ?>
    <tr>
        <td><div><?php echo $row->u_id; ?></div></td>
        <td><div><?php echo $row->u_fname; ?> <?php echo $row->u_lname; ?></div></td>
        <td><div><?php echo $row->u_gender; ?></div></td>
        <td><div><?php echo $row->u_email; ?></div></td>
        <td><div><?php echo $row->u_phone; ?></div></td>
        <td>
			<input class="form-control result_check"  type="button" uid_for_test="<?php echo $row->u_id; ?>"  std_name="<?php echo $row->u_fname.''.$row->u_lname; ?>" value="R Check" style="width:50%;background-color:pink;"/>
		</td>
        <td>
		<?php
			if($row->u_image)
			{	
				echo '<div id="imgs" style="width:60px;"><img style="height:60px;"  src="'. base_url().'external/profile_images/'.$row->u_image.'" alt="..." class="img-thumbnail img-responsive"></div></td>';
			}
			else
			{
				echo '<div id="imgs" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div></td>';
			}
		?>
    </tr>
<?php } ?>
    <tr></tr>
</table>
<?php } ?>