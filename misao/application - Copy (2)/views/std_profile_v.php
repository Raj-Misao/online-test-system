<?php
 $u_id = $this->session->userdata('u_id');
 $user_fname = $this->session->userdata('u_fname');
 $user_lname = $this->session->userdata('u_lname');
	// echo '<pre>';
	// print_r($profile_Info[0]['u_phone']);
	// print_r($profile_Info[0]);
	// echo '</pre>';
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 style="font-weight:bolder;"><?php echo ucwords($profile_Info[0]['u_fname'].' '.$profile_Info[0]['u_lname']);?></h4>
					<img style="width:11%;height:11%;" src="
					<?php 
					if($profile_Info[0]['u_image'])
					{ echo base_url().'external/profile_images/'.$profile_Info[0]['u_image']; }
					else
					{echo base_url().'external/profile_images/img_upload_icon.png';}
					?>
					" id="pro_pic" class="img-rounded img-responsive"/>
				</div>				
				<div class="col-md-1">
					<input type="file" class="fileInput" name="fileInput" style="display:none;"/>
					<button class="btn btn-primary"  id="change_img" image_name="<?php echo $profile_Info[0]['u_id'].$profile_Info[0]['u_fname'].' '.$profile_Info[0]['u_lname']; ?>">
					Change Picture</button>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6" >
					<div class="row">
						<div class="col-md-6" >
							<h4 style="font-weight: bolder;">Personal Details</h4>
						</div>
					</div>
				
					<table class="table borderless">
						<tr>
							<td>Name</td>
							<td><?php echo ucwords($profile_Info[0]['u_fname'].' '.$profile_Info[0]['u_lname']);?></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td><?php echo $profile_Info[0]['u_gender'];?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $profile_Info[0]['u_email'];?></td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><?php echo $profile_Info[0]['u_phone'];?></td>
						</tr>
						<tr>
							<td>
							<div class="form-inline">
								<div class="form-group">
									<button class="btn btn-primary" id="btn_edit_personal_detail" e_u_id="<?php echo $u_id;?>"  e_u_fname="<?php echo $profile_Info[0]['u_fname'];?>"  e_u_lname="<?php echo $profile_Info[0]['u_lname'];?>"  e_u_email="<?php echo $profile_Info[0]['u_email'];?>"  e_u_phone="<?php echo $profile_Info[0]['u_phone'];?>" >Edit Personal Details</button>
								</div>
							</div>
							</td>
							<td>
							<div class="form-inline">
								<div class="form-group">
									<button class="btn btn-primary form-control" id="change_pass" u_id="<?php echo $u_id;?>" u_pass_old="<?php echo $profile_Info[0]['u_pass'];?>">Change Password</button>
								</div>
							</div>
							</td>
						</tr>
					</table>
				</div>

				<div class="col-md-6" >
					<div class="row">
						<div class="col-md-6" >
							<h4 style="font-weight: bolder;">Professional Details</h4>
						</div>
					</div>
				
					<table class="table borderless">
						<tr>
							<td>Student Id</td>
							<td><?php echo $profile_Info[0]['u_id'];?></td>
						</tr>
						<tr>
							<td>Joining Date</td>
							<td><?php echo $profile_Info[0]['u_doj'];?></td>
						</tr>
						<tr>
							<td>Existing Date</td>
							<td><?php echo $profile_Info[0]['u_doe'];?></td>
						</tr>
						<tr>
							<td>Course Name</td>
							<td><?php echo $profile_Info[0]['u_course'];?></td>
						</tr>
						<tr>
							<td>Level</td>
							<td><?php echo $profile_Info[0]['u_en_level'];?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--for model by raj -->