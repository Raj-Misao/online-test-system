<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>MISAO English Test System</title>
    <link href="<?php echo base_url(); ?>external/css/reset.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>external/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>external/css/google_font.css" rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>external/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/blitzer/jquery-ui.css" > 
    <script src="<?php echo base_url(); ?>external/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>external/js/jquery_ui.js"></script>
	<script src="<?php echo base_url(); ?>external/js/bootstrap.js"></script>
   <!-- <script src="<?php echo base_url(); ?>external/js/function.js"></script> -->
	
	<script>
	// function chooseFile() {
			// //document.getElementById("fileInput").click();
			 // alert("HelloRRR"); 
			// }
	</script>
	<script>
	//<<<<<<<<<<<<<<<<<<<<<<<<<<<< Raj Sharma Start Student test portion
	$(document).ready(function(){
	
	// Student Profile OR Menu Start
	
	$(document).on('click','#btn_edit_personal_detail',function()
	{
		var user_id = $(this).attr('e_u_id');
		var u_fname = $(this).attr('e_u_fname');
		var u_lname = $(this).attr('e_u_lname');
		var u_email = $(this).attr('e_u_email');
		var u_phone = $(this).attr('e_u_phone');
		// alert(user_id);
		// return false;
		var body_html = '';
		body_html += '<div class=" form-horizontal">';
		
		body_html += '<div class="form-group">';
		body_html += '<div class="col-sm-12">';
		body_html += '<input type="email" id="c_uf_name" class="form-control"  placeholder="Enter First name">';
		body_html += '</div>';
		body_html += '</div>';
		body_html += '<div class="form-group">';
		body_html += '<div class="col-sm-12">';
		body_html += '<input type="email" id="c_ul_name" class="form-control"  placeholder="Enter Last Name">';
		body_html += '</div>';
		body_html += '</div>';
		body_html += '<div class="form-group">';
		body_html += '<div class="col-sm-12">';
		body_html += ' <input type="email" id="c_u_email"  class="form-control"  placeholder="Enter Email">';
		body_html += '</div>';
		body_html += '</div>';
		body_html += '<div class="form-group">';
		body_html += '<div class="col-sm-12">';
		body_html += '<input type="email" id="c_u_phone" class="form-control"  placeholder="Enter Phone No">';
		body_html += '</div>';
		body_html += '</div>';
		body_html += '</div>';
		popup();
		$('.modal-header').html('<h3>Update Personal Details</h3>');
		$('.modal-body').html(body_html);
		$('.modal-footer').html('<button class="btn btn-primary btn-lg btn-block" id="btn_update_profile_info" user_id="'+user_id+'" u_fname="'+u_fname+'" u_lname="'+u_lname+'" u_email="'+u_email+'" u_phone="'+u_phone+'" type="button">Save</button>');
	});
	$(document).on('click','#change_pass',function()
	{
		var user_id = $(this).attr('u_id');
		var old_pass = $(this).attr('u_pass_old');
		//alert(user_id+" "+old_pass);return false;
		var body_html = '';
		body_html += '<div class=" form-horizontal">';
		body_html += '<div class="form-group">';
		body_html += '<div class="col-sm-12">';
		body_html += '<input type="email" id="c_new_pass" class="form-control"  placeholder="Enter New Password">';
		body_html += '</div>';
		body_html += '</div>';
		body_html += '<div class="form-group">';
		body_html += '<div class="col-sm-12">';
		body_html += '<input type="email" id="c_con_pass" class="form-control"  placeholder="Enter Confirm Password">';
		body_html += '</div>';
		body_html += '</div>';
		body_html += '</div>';
		popup();
		$('.modal-header').html('<h3>Change Password</h3>');
		$('.modal-body').html(body_html);
		$('.modal-footer').html('<button class="btn btn-primary btn-lg btn-block" id="btn_p_pass_change" user_id="'+user_id+'" old_pass="'+old_pass+'" type="button">Save</button>');
	});
	$(document).on('click','#btn_p_pass_change',function()
	{
		var user_id = $(this).attr('user_id');
		var old_pass = $(this).attr('old_pass');
		var new_pass = $('#c_new_pass').val();
		var con_pass = $('#c_con_pass').val();
		if(new_pass == '')
		{
			//alert('Enter New Password');
			$('#btn_p_pass_change').text('Please Enter New Password');
			return false;
		}
		if(con_pass == '')
		{
			//alert('Enter Confirm Password');
			$('#btn_p_pass_change').text('Please Enter Confirm Password');
			return false;
		}
		if(con_pass != new_pass)
		{
			//alert('New Password And Confirm Password Are Not Match Try Again');
			$('#btn_p_pass_change').text('New Password And Confirm Password Are Not Match Try Again');
			return false;
		}
		else
		{
			
			$.ajax
			({
				type: "POST",
				url : '<?php echo base_url(); ?>index.php/std_profile_con/change_pass',
				data:{user_id:user_id,new_pass:new_pass},
				dataType: 'text',
				success : function(responses){
					$('#btn_p_pass_change').text(responses);
					$('#btn_std_profile').click();
				//	location.reload();
					//alert(response);
					//$('#admin_menu_container').html(responses);
					//$('#imgs').html(response);
				}
			});

		}
		
	});
	$(document).on('click','#btn_update_profile_info',function()
	{
		var user_id = $(this).attr('user_id');
		var u_fname = $(this).attr('u_fname');
		var u_lname = $(this).attr('u_lname');
		var u_email = $(this).attr('u_email');
		var u_phone = $(this).attr('u_phone');
		var c_uf_name = $('#c_uf_name').val();
		if(c_uf_name == ''){c_uf_name = u_fname;}
		var c_ul_name = $('#c_ul_name').val();
		if(c_ul_name == ''){c_ul_name = u_lname;}
		var c_u_email = $('#c_u_email').val();
		if(c_u_email == ''){c_u_email = u_email;}
		var c_u_phone = $('#c_u_phone').val();
		if(c_u_phone == ''){c_u_phone = u_phone;}
		$.ajax
		({
			type: "POST",
			url : '<?php echo base_url(); ?>index.php/std_profile_con/change_personal_info',
			data:{user_id:user_id,c_uf_name:c_uf_name,c_ul_name:c_ul_name,c_u_email:c_u_email,c_u_phone:c_u_phone},
			dataType: 'text',
			success : function(responses){
				$('#btn_update_profile_info').text(responses);
				$('#btn_std_profile').click();
			//	location.reload();
				//alert(response);
				//$('#admin_menu_container').html(responses);
				//$('#imgs').html(response);
			}
		});

	});
	$(document).on('click','#change_img',function()
	{
		//var image_name = $(this).attr('image_name');
		
		//var form_data = new FormData(document.getElementById("fileInput").click());
		//document.getElementById("fileInput");
		var zzz = $('.fileInput').click();
		//alert(image_name);
		alert("Press Ok");
		var file_data = $('.fileInput').prop("files")[0]; // Getting the properties of file from file field
		var imageName = $('.fileInput').val();
		//alert(imageName);
		var form_data = new FormData();
		form_data.append("file", file_data) // Appending parameter named file with properties of file_field to form_data
		form_data.append("user_id", 123) // Adding extra parameters to form_data
		$.ajax
		({
			url: '<?php echo base_url(); ?>index.php/std_profile_con/upload_profile_image', // Upload Script
			dataType: 'text',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data, // Setting the data attribute of ajax with file_data
			//data: form_data, // Setting the data attribute of ajax with file_data
			//data:{image_name:image_name},
			type: 'POST',
			success: function(response) {
			var path = '../../'+response;
			//alert(path);
			//$("#pro_pic").attr("src",path);
			location.reload();
			//$('#btn_std_profile').click();
			//location.reload();
			//alert(response);
				//$('#admin_menu_container').html(response);
			}
		});						
		//alert('mmmios');
	});
	$(document).on('click','#btn_std_profile',function()
	{
		$.ajax
		({
			url : '<?php echo base_url(); ?>index.php/std_profile_con/index',
			success : function(response){
				$('#admin_menu_container').html(response);
			}
		});
	});
	$(document).on('click','#btn_std_test_result_show',function()
	{
		$.ajax
		({
			type: "POST",
			url : '<?php echo base_url(); ?>index.php/admin_test_con/std_test_record_show',
			//data:{},
			dataType: 'text',
			beforeSend: function()
			{
				//$('#imgs').text('Processing...');
			},
			success : function(responses){
				
				//alert(response);
				$('#admin_menu_container').html(responses);
				//$('#imgs').html(response);
			}
		});
	});
	// Student Profile OR Menu end
	// Teacher Result Check start
	$(document).on('click','.result_check',function()
	{
		var std_uid_by_admin = $(this).attr('uid_for_test');
		//alert(std_uid_by_admin);
		$.ajax
		({
			type: "POST",
			url : '<?php echo base_url(); ?>index.php/admin_test_con/std_test_record_show',
			data:{std_uid_by_admin:std_uid_by_admin},
			success : function(response){
				// alert("hello");
				$('#admin_menu_container').html(response);
				//$('.modal').attr('aria-hidden','false');
				
			}
		});
	});
	$(document).on('click','#result_analysis_btn',function()
	{
		$.ajax
		({
			url : '<?php echo base_url(); ?>index.php/admin_test_con/std_result_analysis',
			success : function(response){
				// alert("hello");
				$('#admin_menu_container').html(response);
				//$('.modal').attr('aria-hidden','false');
				
			}
		});
	});
	// Teacher Result Check end
	 // Test Qustion Formet Start
			$(document).on('click','#btn_std_test_submit',function()
			{
				//alert("ok");
				var filed_count = 1;
				var array_count = 1;
				var array_no = 1;
				var array_obj = {};
				array_obj[array_count] = {};
				$(".each_q_box").each(function(){
					var qus_types = $(this).attr('qus_type');
					var qus_types_split = qus_types.split('__');
					//alert(qus_types);//return false;
					//alert(qus_types_split[1]);return false;
					//alert(qus_types);
					if(qus_types_split[1] == '1_imgt')
					{	
						var array_nos = 1;
						//array_obj[array_count ][array_no ] = $('input[name='+qus_types+']:checked').val();
						// if(array_obj[array_count ][array_no ])
						// {
							
						// }
						// else
						// {
							// alert( (qus_types_split[0]+' Not Attempt ').toUpperCase());
							// return false;
						// }
						
						array_obj[array_count ][array_no ] = $('input[name='+qus_types+']:checked').val();
						array_obj[array_count ]['qustion_no_type' ] = qus_types;
					//	alert("raj img " + array_no + " " +array_nos  );
						array_no = 1;
						array_nos++;
						array_count++;
						array_obj[array_count] = {};
						
					//var array_nos = $('input[name='+qus_types+']:checked').val();
					
						//alert(array_obj);
					}
					else if(qus_types_split[1]  == '2_optt')
					{
						var array_nos = 1;
						array_obj[array_count ][array_no ] = $('input[name='+qus_types+']:checked').val();
						// if(array_obj[array_count ][array_no ])
						// {
						// }
						// else
						// {
							// alert( (qus_types_split[0]+' Not Attempt ').toUpperCase());
							// return false;
						// }
						array_obj[array_count ]['qustion_no_type' ] = qus_types;
					//	alert("raj img " + array_no + " " +array_nos  );
						array_no = 1;
						array_nos++;
						array_count++;
						array_obj[array_count] = {};
						//alert(qus_types);
					}
					else if(qus_types_split[1]== '3_clozt')
					{
						var array_nos = 1;
						var clzno = 1;
						var mycount = 0;
						//alert(qus_types);
						$('.'+qus_types+'_clzbox').each(function(){
							// if($('input:radio[name='+qus_types+'_'+clzno+']:checked'))
							// {
							
								//var test_data =  $('input[name='+qus_types+'_'+clzno+']').val();
								array_obj[array_count ][array_no ] =  $('input[name='+qus_types+'_'+clzno+']:checked').val();
								// if(array_obj[array_count ][array_no ])
								// {
									// //alert( (" Cloz No "+clzno+' Not Attempt ').toUpperCase());
								// }
								// else
								// {
									// array_obj[array_count ][array_no ] = 'notcloz';
									// alert( (" Cloz No "+clzno+' Not Attempt ').toUpperCase());
									// //return false;
								// }
								//alert(test_data);
								array_no++;
								clzno++;
							//}

						});
						array_obj[array_count ]['qustion_no_type' ] = qus_types;
						array_no = 1;
						array_count++;
								//array_nos++;

						array_obj[array_count] = {};
						//alert(mycount);
					}
					else if(qus_types_split[1]== '4_blankqt')
					{
						var array_nos = 1;
						var clzno = 1;
						var mycount = 0;
						//alert(qus_types);
						$ansdatas = '';
						$('.'+qus_types).each(function(){
							
								$xyz =  $(this).val();
								
								$ansdatas = $ansdatas + $xyz +',';
							

						});
						array_obj[array_count ][array_no ] =  $ansdatas;
							//alert(array_obj[array_count ][array_no ]);	
						array_no++;
						clzno++;
						//alert(test_data);
						array_obj[array_count ]['qustion_no_type' ] = qus_types;
						array_no = 1;
						array_count++;
								//array_nos++;

						array_obj[array_count] = {};
						//alert(mycount);
					}
				});
				var test_number = $(this).attr('testno');
				//alert($(this).attr('testno'));
				array_obj[array_count ]['test_no'] = $(this).attr('testno');
				var test_fileds_values_array = JSON.stringify(array_obj);
				// alert(test_fileds_values_array);
				 $.ajax
				({
					type: "POST",
					url : '<?php echo base_url(); ?>index.php/admin_test_con/std_test_checking',
					data:{test_fileds_values_array:test_fileds_values_array,test_number:test_number},
					dataType: 'text',
					beforeSend: function()
					{
						//$('#imgs').text('Processing...');
					},
					success : function(response){
						var std_ans_submit_confirm = confirm('Are you sure you want to Submit Test Answer?');
						if(std_ans_submit_confirm == true)
						{
							// alert(response);
							$.ajax
							({
								type: "POST",
								url : '<?php echo base_url(); ?>index.php/admin_test_con/std_test_record_insert',
								data:{t_result_data:response,test_number:test_number},
								dataType: 'text',
								beforeSend: function()
								{
									//$('#imgs').text('Processing...');
								},
								success : function(responses){
									
									//alert(response);
									$('#admin_menu_container').html(responses);
									//$('#imgs').html(response);
								}
							});
						}
						
						
						//$('#imgs').html(response);
					}
				});
				 
			});
			//RRRRRRRRRRRRRRRRRRRRRRRRSSSSSSSSSSSSSSSSSSSS
			$(document).on('change','.qustion_type',function()
			{
				var qus_type = $(this).val().split('__');
				//alert(qus_type[1]);return false;
				if(qus_type[1] == '1_imgt')
				{
				var uploads_html = '';
				uploads_html += '<div class="each_q_box" qus_type="'+qus_type[0]+'__'+qus_type[1]+'" >';
				uploads_html += '<div class="col-sm-10" style="margin-top:1%;">';
				uploads_html += '	<textarea class="form-control '+ qus_type[0]+'__'+qus_type[1] +'" rows="3"  placeholder="Qustion"></textarea>';
				uploads_html += '</div>';
				uploads_html += '<div  class="col-md-10 " style="margin-top:1%"><input class="'+qus_type[0]+'__'+qus_type[1]+' btn btn-primary" type="file"/> </div>';
				uploads_html += '<div  class="col-md-10 " style="margin-top:1%"><input class="'+qus_type[0]+'__'+qus_type[1]+' btn btn-primary" type="file"/></div>';
				uploads_html += '<div  class="col-md-10 " style="margin-top:1%"><input class="'+qus_type[0]+'__'+qus_type[1]+' btn btn-primary" type="file"/></div>';
				uploads_html += '<div  class="col-md-10 '+qus_type[0]+'__'+qus_type[1]+'" style="margin-top:1%"><div style="margin-right:1%" class=" pull-left btn btn-primary "><label>A<input type="radio" class=""name="'+qus_type[0]+'__'+qus_type[1]+'"  value="A" ></label></div><div style="margin-right:1%" class=" pull-left btn btn-primary "><label>B<input type="radio" name="'+qus_type[0]+'__'+qus_type[1]+'"  value="B" ></label></div><div style="margin-right:1%" class=" pull-left btn btn-primary "><label>C<input type="radio" name="'+qus_type[0]+'__'+qus_type[1]+'"  value="C" ></label></div></div>';
				uploads_html += '</div>';
				$(this).siblings(".formetresdiv").html(uploads_html);
				}
				else if(qus_type[1] == '2_optt')
				{
				var option_html = '';
					option_html += '<div class="each_q_box" qus_type="'+qus_type[0]+'__'+qus_type[1]+'" >';
					option_html += '<div class="col-sm-10" style="margin-top:1%;">';
					option_html += '	<textarea class="form-control '+ qus_type[0]+'__'+qus_type[1] +'" rows="3"  placeholder="Qustion"></textarea>';
					option_html += '</div>';
					option_html += '<div class="col-sm-10">';
					option_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'"   placeholder="1st Option">';
					option_html += '</div>';
					
					option_html += '<div class="col-sm-10">';
					option_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'"   placeholder="2nd Option">';
					option_html += '</div>';
					
					option_html += '<div class="col-sm-10">';
					option_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'"   placeholder="3rd Option">';
					option_html += '</div>';
					
					option_html += '<div class="col-sm-10">';
					option_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'"   placeholder="Correct Answer">';
					option_html += '</div>';
					option_html += '</div>';
					$(this).siblings(".formetresdiv").html(option_html);
				}
				else if(qus_type[1] == '3_clozt')
				{
					var cloze_html = '';	
					cloze_html += '<div class="each_q_box" qus_type="'+qus_type[0]+'__'+qus_type[1]+'" >';
					cloze_html += '<div class="col-md-12 clozeformetresdiv'+qus_type[0]+'__'+qus_type[1]+'" ><select qus_type="'+qus_type[0]+'__'+qus_type[1]+'" class="form-control cloze_type col-sm-6"  style="font-size:medium; font-weight:bolder;color:green;">';
					cloze_html += '<option value="-1" style="font-size:medium; font-weight:bolder;color:blue;">Select No OF Cloze</option>';
					for(var i = 1; i <= 15; i++)
					{
					cloze_html += '<option value="'+ i +'" style="font-size:medium; font-weight:bolder;color:blue;">'+ i +'</option>';
					}	
					cloze_html += '	</select></div></div>';
					$(this).siblings(".formetresdiv").html(cloze_html);
				}
				else if(qus_type[1] == '4_blankqt')
				{
					var fill_blankq_html = '';
					fill_blankq_html += '<div class="each_q_box" qus_type="'+qus_type[0]+'__'+qus_type[1]+'" >';
					fill_blankq_html += '<div class="col-sm-10" style="margin-top:1%;">';
					fill_blankq_html += '	<textarea class="form-control '+ qus_type[0]+'__'+qus_type[1] +'" rows="3"  placeholder="Enter Paragraph Using Of Token As ,, "></textarea>';
					fill_blankq_html += '</div>';
					fill_blankq_html += '<div class="col-sm-10">';
					fill_blankq_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'"   placeholder="Enter Answer Using Of Token As ,,">';
					fill_blankq_html += '</div>';
					fill_blankq_html += '</div>';
					$(this).siblings(".formetresdiv").html(fill_blankq_html);
				}
			});
			
			$(document).on('change','.cloze_type',function()
			{
				var no_of_cloze = $(this).val();
				var qus_type = $(this).attr('qus_type').split('__');
				var qus_types = $(this).attr('qus_type');
				var cloze_opt_html = '';
				cloze_opt_html += '<div class="col-sm-10" style="margin-top:1%;">';
				cloze_opt_html += '	<textarea class="form-control '+ qus_type[0]+'__'+qus_type[1] +'  " rows="3"  placeholder="Qustion"></textarea>';
				cloze_opt_html += '</div>';
				for(var i = 1; i <= no_of_cloze; i++)
				{
					cloze_opt_html += '<div class="col-sm-6" style="color:green;"> <h4>Cloze No '+ i +'</h4></div>';
					cloze_opt_html += '<div class="col-sm-10">';
					cloze_opt_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'   "   placeholder="1st Option">';
					cloze_opt_html += '</div>';
					
					cloze_opt_html += '<div class="col-sm-10">';
					cloze_opt_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'  "   placeholder="2nd Option">';
					cloze_opt_html += '</div>';
					
					cloze_opt_html += '<div class="col-sm-10">';
					cloze_opt_html += '	<input type="text" class="form-control  '+ qus_type[0]+'__'+qus_type[1] +' "   placeholder="3rd Option">';
					cloze_opt_html += '</div>';
					
					cloze_opt_html += '<div class="col-sm-10">';
					cloze_opt_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'  "   placeholder="4th Option">';
					cloze_opt_html += '</div>';
					
					cloze_opt_html += '<div class="col-sm-10">';
					cloze_opt_html += '	<input type="text" class="form-control '+ qus_type[0]+'__'+qus_type[1] +'  "   placeholder="Correct Answer">';
					cloze_opt_html += '</div>';
					
				}
				$('.clozeformetresdiv'+qus_types).html(cloze_opt_html);
			});
 // Test Aprovel Start
		 $(document).on('change','.test_aprov_select',function()
			{
				var test_aprove_id = $(this).val();
				var test_aprove_uid = $(this).attr('uid_for_test');
				
				//alert(test_aprove_id);
				//alert(test_aprove_uid);
				$.ajax
				({
					type: "POST",
					url : '<?php echo base_url(); ?>index.php/admin_test_con/update_test_aprovel_id',
					data:{test_aprove_uid:test_aprove_uid,test_aprove_id:test_aprove_id},
					dataType: 'text',
					beforeSend: function()
					{
						//$('#imgs').text('Processing...');
					},
					success : function(response){
						 alert(response);
						//$('#imgs').html(response);
					}
				});
			});
			
			$(document).on('click','#test_aprovel_btn',function()
			{
				$.ajax
				({
					url : '<?php echo base_url(); ?>index.php/admin_test_con/test_aprovel_formet',
					success : function(response){
						// alert("hello");
						$('#admin_menu_container').html(response);
						//$('.modal').attr('aria-hidden','false');
						
					}
				});
			});
			
		 // Test Aprovel End
		 
			//Update OLD Test Start
			$(document).on('click','#update_old_test_btn',function()
			{
				$.ajax
				({
					url : '<?php echo base_url(); ?>index.php/admin_test_con/update_test',
					success : function(response){
						// alert("hello");
						$('#admin_menu_container').html(response);
						//$('.modal').attr('aria-hidden','false');
						
					}
				});
			});
			
			//for update test formet
			$(document).on('click','#update_test_formet_btn',function(){
				var test_no 		= $('#test_no').val();
				//var last_test		= $('#last_test').attr('test_no');
				//alert(last_test);
				if(test_no == '-1')
				{
					alert("Select Test NO");
					return false;
				}
				
				var no_of_question  = $('#no_of_question').val();
			
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>index.php/admin_test_con/update_test_formet',
					data:{test_no:test_no,no_of_question:no_of_question},
					dataType: 'text',
					beforeSend: function()
					{
						$('#creating_test').text('Processing...');
					},
					success: function(response)
					{
						
						$('#show_test_formet').html(response);
						$('#creating_test').text('Submit');
					}
				});
			});
			//end update test formet
			//Start updated test data insert
		// end updated data insert
			
			//********Update OLD Test END
			
				
			//NEW Test CREATE
			$(document).on('click','#create_new_test',function()
			{
				$.ajax
				({
					url : '<?php echo base_url(); ?>index.php/admin_test_con/index',
					success : function(response){
						// alert("hello");
						$('#admin_menu_container').html(response);
						//$('.modal').attr('aria-hidden','false');
						
					}
				});
			});
			
			//for test formet
			$(document).on('click','#creating_test',function(){
				var test_no 		= $('#test_no').val();
				var last_test		= $('#last_test').attr('test_no');
				//alert(last_test);
				if(test_no == '-1')
				{
					if(last_test == '0')
					{
						alert("Select Test NO");
						return false;
					}
					else
					{
						test_no = last_test;
					}
					
				}
				var no_of_question  = $('#no_of_question').val();
				if(no_of_question == '')
				{
					alert("Enter No OF Qustion");
					return false;
				}
				// alert(test_no);
				// alert(no_of_question);
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>index.php/admin_test_con/new_test_formet',
					data:{test_no:test_no,no_of_question:no_of_question},
					dataType: 'text',
					beforeSend: function()
					{
						$('#creating_test').text('Processing...');
					},
					success: function(response)
					{
						
						$('#show_test_formet').html(response);
						$('#creating_test').text('Submit');
					}
				});
				//function test_formet(test_no,no_of_question);
			});
			//hhhhhhhhhhhhhhhhhhhhhhhhhhhhh ////////   start insert data  rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
			$(document).on('click','#updated_tes_data_ins_btn',function(){
				var test_no 		= $('#test_no').val();
				var last_test		= $('#last_test').attr('test_no');
				if(test_no == '-1')
				{
					if(last_test == '0')
					{
						alert("Select Test NO");
						return false;
					}
					else
					{
						test_no = ++last_test;
					}
					
				}
				var filed_count = 1;
				var array_count = 1;
				var array_no = 1;
				var array_obj = {};
				array_obj[array_count] = {};
				$(".each_q_box").each(function(){
					var qus_types = $(this).attr('qus_type');
					var qus_types_split = qus_types.split('__');
					//alert(qus_types);return false;
					//alert(qus_types_split[1]);return false;
					if(qus_types_split[1] == '1_imgt')
					{	var array_nos = 1;
						$('.'+qus_types).each(function(){
							var test_data = $(this).html();
							//alert("hello");
							if(array_nos%3 == 0)
							{
							
								array_obj[array_count ][array_no ] = "raj img "+qus_types_split[0];
								array_obj[array_count ]['qustion_no_type' ] = qus_types;
							//	alert("raj img " + array_no + " " +array_nos  );
								array_no = 1;
								array_nos++;
								array_count++;
								array_obj[array_count] = {};
								
							}
							else
							{
								
								array_obj[array_count ][array_no ] = "raj img "+qus_types_split[0];
								//alert("raj img " + array_no + " " +array_nos  );
								array_no++;	
								array_nos++;	
							}
						});
							
						
					}
					else if(qus_types_split[1]  == '2_optt')
					{
						var array_nos = 1;
						$('.'+qus_types).each(function(){
							var test_data = $(this).val();
							//alert("HELLO");
							if(array_nos%5 == 0)
							{
								
								array_obj[array_count ][array_no ] = test_data;
								array_obj[array_count ]['qustion_no_type' ] = qus_types;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								array_no = 1;
								array_count++;
								array_nos++;
								array_obj[array_count] = {};
							}
							else
							{
								array_obj[array_count][array_no] = test_data;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								 array_no++;	
								 array_nos++;	
							}
							 

						});
						
					}
					else if(qus_types_split[1]== '3_clozt')
					{
						var array_nos = 1;
						var mycount = 0;
						$('.'+qus_types).each(function(){
							var test_data = $(this).val();
						//	mycount++;
							//alert("HELLO");
							
							if(mycount == 0)
							{
								array_obj[array_count][array_no] = test_data;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								 array_no++;	
								// array_nos++;
								mycount = 1;
							}
							else
							{
								array_obj[array_count][array_no] = test_data;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								 array_no++;	
								// array_nos++;
							}
						});
						array_obj[array_count ]['qustion_no_type' ] = qus_types;
						array_no = 1;
						array_count++;
								//array_nos++;

						array_obj[array_count] = {};
						//alert(mycount);
					}
					else if(qus_types_split[1] == '4_blankqt')
					{
						var array_nos = 1;
						array_no = 1;
						$('.'+qus_types).each(function(){
							var test_data = $(this).val();
							//alert("HELLO");
							if(array_nos%2 == 0)
							{
								
								array_obj[array_count ][array_no ] = test_data;
								array_obj[array_count ]['qustion_no_type' ] = qus_types;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								array_no = 1;
								array_count++;
								array_nos++;
								array_obj[array_count] = {};
							}
							else
							{
								array_obj[array_count][array_no] = test_data;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								 array_no++;	
								 array_nos++;	
							}
						});
					}
					//alert(qus_types);
				});
			
				// console.log(array_obj);
				var test_fileds_values_array = JSON.stringify(array_obj);
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>index.php/admin_test_con/updated_test_data_insert',
					data:{test_fileds_values_array:test_fileds_values_array,test_no:test_no},
					dataType: 'text',
					beforeSend: function()
					{
						$('#updated_tes_data_ins_btn').text('Processing...');
					},
					success: function(response)
					{
						//$('#show_test_formet_result').html(response);
						$('#no_of_question').val('');
						$('#updated_tes_data_ins_btn').text(response);
						//$('#test_creation_btn_sub').text('Submit');
					}
				});
				 //console.log(array_obj);
			});
			//rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr
			$(document).on('click','#test_creation_btn_sub',function(){
				var test_no 		= $('#test_no').val();
				var last_test		= $('#last_test').attr('test_no');
				if(test_no == '-1')
				{
					if(last_test == '0')
					{
						alert("Select Test NO");
						return false;
					}
					else
					{
						test_no = ++last_test;
					}
					
				}
				var filed_count = 1;
				var array_count = 1;
				var array_no = 1;
				var array_obj = {};
				array_obj[array_count] = {};
				$(".each_q_box").each(function(){
					var qus_types = $(this).attr('qus_type');
					var qus_types_split = qus_types.split('__');
					//alert(qus_types);return false;
					//alert(qus_types_split[1]);return false;
					if(qus_types_split[1] == '1_imgt')
					{	
						var array_nos = 1;
						var img_qustion = 4;
						$('.'+qus_types).each(function(){
							var test_data = $(this).val();
							//alert(test_data);
							//alert("hello");
							if(img_qustion%4 == 0)
							{
								//alert("i am inner hello");
								
								//array_obj[array_count ][array_no ] = imageName;
								img_qustion = 1;
								array_obj[array_count ][array_no ] = test_data;
								array_no++;	
								array_nos++;
							}
							else if(array_nos%5 == 0)
							{
								var radio_answer =$(this).find(':checked').val();// $(this).$('input[name='+qus_types+']').val(); //$(this).filter(':checked').val()// Getting the properties of file from file field
								
								//alert("hello raj");
								alert(radio_answer);
								array_obj[array_count ][array_no ] = radio_answer;
								array_obj[array_count ]['qustion_no_type' ] = qus_types;
								//alert("raj img " + array_no + " " +array_nos  );
								
								array_no = 1;
								array_nos++;
								img_qustion =  4;
								array_count++;
								array_obj[array_count] = {};
								
							}
							else
							{
								var file_data = $(this).prop("files")[0]; // Getting the properties of file from file field
								var imageName = $(this).val();
					
								//alert("raj img " + array_no + " " +array_nos  );
								var form_data = new FormData(); // Creating object of FormData class
								form_data.append("file", file_data) // Appending parameter named file with properties of file_field to form_data
								form_data.append("user_id", 123) // Adding extra parameters to form_data
								$.ajax({
									url: '<?php echo base_url(); ?>index.php/admin_test_con/upload_test_image_c', // Upload Script
									dataType: 'text',
									cache: false,
									contentType: false,
									processData: false,
									data: form_data, // Setting the data attribute of ajax with file_data
									type: 'POST',
									success: function(response) {
									if(response == 'file type is wrong')
									{
										alert("SELECT IMAGE AGAIN");
										return false;
									}
									else if(response == 'file is not selected')
									{
										alert("IMAGE ARE NOT SELECTED SELECT AGAIN");
										return false;
									}
									// alert('hiii');
									// return false;
									// Do something after Ajax completes 
									//alert(data);
									//$('#h').html(response);
									}
								});
								//alert(imageName);
								array_obj[array_count ][array_no ] = imageName;
								array_no++;	
								array_nos++;	
							}
						});
							
						
					}
					else if(qus_types_split[1]  == '2_optt')
					{
						var array_nos = 1;
						$('.'+qus_types).each(function(){
							var test_data = $(this).val();
							//alert("HELLO");
							if(array_nos%5 == 0)
							{
								
								array_obj[array_count ][array_no ] = test_data;
								array_obj[array_count ]['qustion_no_type' ] = qus_types;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								array_no = 1;
								array_count++;
								array_nos++;
								array_obj[array_count] = {};
							}
							else
							{
								array_obj[array_count][array_no] = test_data;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								 array_no++;	
								 array_nos++;	
							}
							 

						});
						
					}
					else if(qus_types_split[1]== '3_clozt')
					{
						var array_nos = 1;
						var mycount = 0;
						$('.'+qus_types).each(function(){
							var test_data = $(this).val();
						//	mycount++;
							//alert("HELLO");
							
							if(mycount == 0)
							{
								array_obj[array_count][array_no] = test_data;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								 array_no++;	
								// array_nos++;
								mycount = 1;
							}
							else
							{
								array_obj[array_count][array_no] = test_data;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								 array_no++;	
								// array_nos++;
							}
						});
						array_obj[array_count ]['qustion_no_type' ] = qus_types;
						array_no = 1;
						array_count++;
								//array_nos++;

						array_obj[array_count] = {};
						//alert(mycount);
					}
					else if(qus_types_split[1] == '4_blankqt')
					{
						var array_nos = 1;
						array_no = 1;
						$('.'+qus_types).each(function(){
							var test_data = $(this).val();
							//alert("HELLO");
							if(array_nos%2 == 0)
							{
								
								array_obj[array_count ][array_no ] = test_data;
								array_obj[array_count ]['qustion_no_type' ] = qus_types;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								array_no = 1;
								array_count++;
								array_nos++;
								array_obj[array_count] = {};
							}
							else
							{
								array_obj[array_count][array_no] = test_data;
								//alert(test_data+ "  " + array_no + " " +array_nos  );
								 array_no++;	
								 array_nos++;	
							}
						});
					}
					//alert(qus_types);
				});
				
				var test_fileds_values_array = JSON.stringify(array_obj);
				$.ajax({
					type: "POST",
					url: '<?php echo base_url(); ?>index.php/admin_test_con/new_test_data_insert',
					data:{test_fileds_values_array:test_fileds_values_array,test_no:test_no},
					dataType: 'text',
					beforeSend: function()
					{
						$('#test_creation_btn_sub').text('Processing...');
					},
					success: function(response)
					{
						//$('#show_test_formet_result').html(response);
						$('#test_creation_btn_sub').text(response);
						//$('#test_creation_btn_sub').text('Submit');
					}
				});
				 //console.log(array_obj);
			});	// end of data insert
			
	});   ////document close ///////////
		

	//FOR POP OVER MODEL
		function popup()
		{
			$('.modal').modal();
			$.ajax({
				type: "POST",
				//url: 'insert_new_cond_info.php',
				//data: {new_username:new_username,new_password:new_password},
				dataType: 'text',
				beforeSend: function()
				{
					$('.modal-title').html('SELECT OPTION');
					//$('.modal-body').html('<center><br><i style="font-size:30px;color:#297D18;" class="fa fa-cog fa-spin"></i><br><br></center>');
					//$('.modal-footer').html('');
				},
				success: function(response)
				{
					//$('#created_success').html(response);
					var footer_html = '<span class="pull-left" id="prosssing_result_update"></span> <button class="btn btn-primary btn-sm" id="update_insert">SELECT OPTION</button>';
					//$('.modal-footer').html(footer_html);
					
				}
			});
		}
	//<<<<<<<<<<<<<<<<<<<<<<<<<<<< Raj Sharma End
	// top.php

	// Login & Sign up form pop up
	$('document').ready(function()
	{

		$('#top_header_inner_btn').click(function()
		{
			$('#top_popup_login').fadeIn();
		});

		$('#top_popup_login_closebtn').click(function()
		{
			$('#top_popup_login').fadeOut();
		});

		$(document).on('click','#top_popup_login_container_signupbtn',function()
		{
			var signup_container =  '<div id="top_popup_signup_container">'+
										'<div id="top_popup_signup_container_title">Sign up</div>'+
										'<div id="top_popup_signup_container_subtext1">Name (*)</div>'+
										'<input id="top_popup_signup_input_fname" class="" name="" type="text" placeholder="First Name">'+
										'<input id="top_popup_signup_input_lname" class="" name="" type="text" placeholder="Last Name">'+
										'<div id="top_popup_signup_container_subtext2">Gender (*)</div>'+
										'<div id="top_popup_signup_input_gender_wrap">'+
											'<select id="top_popup_signup_input_gender" class="form-control">'+
											  '<option value="">Select Gender</option>'+
											  '<option value="female">Female</option>'+
											  '<option value="male">Male</option>'+
											'</select>'+
										'</div>'+
										'<div id="top_popup_signup_container_subtext3">Email (*)</div>'+
										'<input id="top_popup_signup_input_email" class="top_popup_signup_input" name="" type="text" placeholder="Email">'+
										'<div id="top_popup_signup_container_subtext4">Phone</div>'+
										'<input id="top_popup_signup_input_phone" class="top_popup_signup_input" name="" type="text" placeholder="Phone">'+
										'<div id="top_popup_signup_container_subtext5">Password (*)</div>'+
										'<input id="top_popup_signup_input_pass" class="top_popup_signup_input" name="" type="password" placeholder="Password">'+
										'<div id="top_popup_signup_container_subtext6">Confirm Password (*)</div>'+
										'<input id="top_popup_signup_input_cpass" class="top_popup_signup_input" name="" type="password" placeholder="Confirm Password">'+
										'<div id="top_popup_signup_container_loginbtn">Sign up</div>'+
										'<hr id="top_popup_signup_container_hr">'+
										'<div id="top_popup_signup_container_subtext7">Already have an account? <a id="top_popup_signup_container_subtext7_a"> →Go to Login page</a></div>'+
									'</div>';
			$('#replace').html(signup_container);
		});

		$(document).on('click','#top_popup_signup_container_subtext7_a',function()
		{
			var login_container = '<div id="top_popup_login_container">'+
										'<div id="top_popup_login_container_title">Login</div>'+
										'<div id="top_popup_login_container_subtext1">Email or Phone number</div>'+
										'<input id="top_popup_login_input_email" class="top_popup_login_input" name="" type="text" placeholder="Email or Phone number">'+
										'<div id="top_popup_login_container_subtext2">Password</div>'+
										'<input id="top_popup_login_input_pass" class="top_popup_login_input" name="" type="password" placeholder="Password">'+
										'<div id="top_popup_login_container_loginbtn">Login</div>'+
										'<hr id="top_popup_login_container_hr">'+
										'<div id="top_popup_login_container_subtext3">New student?</div>'+
										'<div id="top_popup_login_container_signupbtn">Create your account</div>'+
									'</div>';
			$('#replace').html(login_container);
		});

	// Check sign up form and insert database
		$(document).on('click','#top_popup_signup_container_loginbtn',function()
		{
			var fname = $('#top_popup_signup_input_fname').val();
			var lname = $('#top_popup_signup_input_lname').val();
			var gender = $('#top_popup_signup_input_gender').val();
			var email = $('#top_popup_signup_input_email').val();
			var phone = $('#top_popup_signup_input_phone').val();
			var pass = $('#top_popup_signup_input_pass').val();
			var cpass = $('#top_popup_signup_input_cpass').val();
			if(fname != '' && lname != '' && gender != '' && email != '' && pass != '' && cpass != '')
			{
				if(phone.match( /[^0-9.,-]+/ ))
				{
					alert('Please type using half-width characters in your phone number.');
					return false;
				}
				else
				{
					if(pass == cpass)
					{
						$.ajax
						({
							type : 'POST',
							url : '<?php echo base_url(); ?>index.php/top_con/user_signup',
							data : {fname:fname, lname:lname, gender:gender, email:email, phone:phone, pass:pass},
							dataType : 'text',
							success : function(response)
							{
								if(response == '1')
								{
									window.location.href = '<?php echo base_url(); ?>index.php/thanks_con/index';
								}
								if(response == '0')
								{
									alert('Your request Failed');
								}
							}
						});
					}
					else
					{
						alert('Please confirm your password.');
					}
				}
			}
			else
			{
				alert('(*) are required items.');
				return false;
			}
		});

	// Check login form and move to student page or admin page
		$(document).on('click','#top_popup_login_container_loginbtn',function()
		{
			var email = $('#top_popup_login_input_email').val();
			var pass = $('#top_popup_login_input_pass').val();
			if(email != '' && pass != '')
			{
				$.ajax
				({
					type : 'POST',
					url : '<?php echo base_url(); ?>index.php/top_con/user_login',
					data : {email:email, pass:pass},
					dataType : 'text',
					success : function(response)
					{
						if(response == '0'){ alert("Login failed."); }
						if(response == '1'){ alert("You are not allowed Login now."); }
						if(response == '2')
						{ 
							window.location.href = '<?php echo base_url(); ?>index.php/student_menu_con/index';
						}
						if(response == '3')
						{
							var conf = confirm('Do you log in as administer? \n If you want to log in as student, click "Cancel".');
							if(conf == true)
							{
								window.location.href = '<?php echo base_url(); ?>index.php/admin_menu_con/index';
							}
							else
							{
								alert('You are student.');
							}
						}
					}
				});
			}
			else
			{
				alert('Please fill in blanks.');
			}
		});

	});

	// thanks.php
	$(document).on('click','#thanks_comm_container_btn',function()
	{
		window.location.href = '<?php echo base_url(); ?>';
	});

	// admin_menu.php
	// Click "Logout" button
	$(document).on('click','[btn = logout_func]',function()
	{
		var logout_confirm = confirm('Are you sure you want to log out?');
		if(logout_confirm == true)
		{
			window.location.href = '<?php echo base_url(); ?>index.php/admin_menu_con/click_logout';
		}
	});

	// Open and close with click "Hamburger" button and "Remove" button
	$(document).on('click','.glyphicon-menu-hamburger',function()
	{
		$('#admin_menu_header_inner_ham').html('<span id="remove_btn" class="glyphicon glyphicon-remove" aria-hidden="true"></span>');
		$("#admin_menu_sidebar").slideDown(function()
		{
			$('#admin_menu_sidebar li:not("[btn = logout_func]")').on('click',function()
			{
				if($(window).width() <= 750)
				{
					setTimeout(function()
					{
						$("#admin_menu_sidebar").slideUp();
						$('#admin_menu_header_inner_ham').html('<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>');
					},300);
				}
			});
		});
	});

	// Click "Remove" button
	$(document).on('click','#remove_btn',function()
	{
		$('#admin_menu_header_inner_ham').html('<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>');
		$("#admin_menu_sidebar").slideUp();
	});

	// Click menu bar and change css
	$(document).on('click','#admin_menu_sidebar li:not(:first-child,[btn = logout_func])',function()
	{
		$('#admin_menu_sidebar li').css({
			'background-color': 'white',
			'color': '#E260BF',
			'padding-top': '5px',
			'padding-bottom': '5px'
		});
		$('#admin_menu_sidebar li').removeAttr('select');

		$(this).css({
			'background-color': '#E260BF',
			'color': 'white',
			'padding-top': '10px',
			'padding-bottom': '10px'
		});
		$(this).attr('select','now');
	});

	// Mouseover menu bar
	$(document).on('mouseover','#admin_menu_sidebar li:not(:first-child)',function()
	{
		var flag = $(this).attr('select');
		if(flag != 'now')
		{
			$(this).css({
				'padding-top': '10px',
				'padding-bottom': '10px'
			});
			$('[select = now]').css({
				'padding-top': '5px',
				'padding-bottom': '5px'
			});
		}
	});

	// Mouseout menu bar
	$(document).on('mouseout','#admin_menu_sidebar li:not(:first-child)',function()
	{
		var flag = $(this).attr('select');
		if(flag != 'now')
		{
			$(this).css({
				'padding-top': '5px',
				'padding-bottom': '5px'
			});
			$('[select = now]').css({
				'padding-top': '10px',
				'padding-bottom': '10px'
			});
		}
	});
		
	//At the first loading, show the new student (first page)
	$(document).ready(function()
	{
		$.ajax
		({
			url : '<?php echo base_url(); ?>index.php/admin_new_students_con/index',
			success : function(response){
				$('#admin_menu_container').html(response);
			}
		});
	});

	//Click "student test screen" in menu
	$(document).on('click','#btn_test_screen',function()
	{
		$.ajax
		({
			url : '<?php echo base_url(); ?>index.php/student_menu_con/today_test_screen',
			success : function(response){
				$('#admin_menu_container').html(response);
			}
		});
	});
	//Click "New students" in menu
	$(document).on('click','#admin_menu_sidebar_new',function()
	{
		$.ajax
		({
			url : '<?php echo base_url(); ?>index.php/admin_new_students_con/index',
			success : function(response){
				$('#admin_menu_container').html(response);
			}
		});
	});

	// Click "Students info" in menu
	$(document).on('click','#admin_menu_sidebar_info',function()
	{
		$.ajax
		({
			url : '<?php echo base_url(); ?>index.php/admin_students_info_con/index',
			success : function(response){
				$('#admin_menu_container').html(response);
			}
		});
	});

	// // Click "test" in menu
	// $(document).on('click','#admin_menu_sidebar_test',function()
	// {
		// $.ajax
		// ({
			// url : '<?php echo base_url(); ?>index.php/admin_test_con/index',
			// success : function(response){
				// $('#admin_menu_container').html(response);
			// }
		// });
	// });

	// Change the style "display:none" to "display:block" for side bar
	$(window).on('resize',function()
	{
		var x = $(window).width();
		if(x > 750)
		{
			var flag = $('#admin_menu_sidebar').css('display');
			if(flag == 'none')
			{
				$('#admin_menu_sidebar').css('display','block');
			}
		}
		if(x <= 750)
		{
			var flag = $('#admin_menu_sidebar').css('display');
			if(flag == 'block')
			{
				$('#admin_menu_header_inner_ham').html('<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>');
				$('#admin_menu_sidebar').css('display','none');
			}
		}
	});

	// Show the popup for new student registration
	$(document).on('click','#admin_new_students_table_regibtn',function()
	{
		$('#admin_new_students_popup').fadeIn();
	});

	// Close the popup for new student registration
	$(document).on('click','#admin_new_students_popup_closebtn',function()
	{
		$('#admin_new_students_popup').fadeOut();
	});

	// Click "Enroll" button and take "ID" and "Name"
	$(document).on('click','#admin_new_students_table_regibtn',function()
	{
		var regi_id = $(this).attr('delebtn');
		$.ajax
		({
			type : 'POST',
			url : '<?php echo base_url(); ?>index.php/admin_new_students_con/take_regi_user',
			data : {regi_id:regi_id},
			dataType : 'text',
			success : function(response)
			{
				$('#admin_new_students_popup').html(response);
			}
		});
	});

	// admin_new_students.php
	$(document).on('click','#admin_new_students_table_delebtn',function()
	{
		var conf = confirm('Are you sure that you delete this row?');
		if(conf == true)
		{
			var delete_u_id = $(this).attr('delebtn');
			$.ajax
			({
				type : 'POST',
				url : '<?php echo base_url(); ?>index.php/admin_new_students_con/delete_user',
				data : {delete_u_id:delete_u_id},
				dataType : 'text',
				success : function(){
					window.location.href = '<?php echo base_url(); ?>index.php/admin_menu_con/index';
				}
			});
		}
		else
		{
			return false;
		}
	});

	// admin_new_students_popup.php
	$(document).on('click','#admin_new_students_popup_startdate, #admin_new_students_popup_enddate',function()
	{
		$(this).datepicker({dateFormat:'yy-mm-dd'});
	});

	// Select "Type" and show the input according to "Type"
	$(document).on('change','#admin_new_students_popup_type_select',function()
	{
		var u_type = $(this).val();
		if(u_type == "student")
		{
			$('#admin_new_students_popup_course_hide').show();
			$('#admin_new_students_popup_course_hide').change(function()
			{
				var u_course = $('#admin_new_students_popup_course_select').val();
				var u_type = $('#admin_new_students_popup_type_select').val();
				if(u_type == 'student')
				{
					if(u_course.match(/English/))
					{
						$('#admin_new_students_popup_level_hide').show();
					}
					else
					{
						$('#admin_new_students_popup_level_hide').hide();
					}
				}
			});
		}
		else if(u_type == "teacher")
		{
			$('#admin_new_students_popup_course_hide').show();
			$('#admin_new_students_popup_level_hide').hide();
		}
		else
		{
			$('#admin_new_students_popup_course_hide, #admin_new_students_popup_level_hide').hide();
		}
	});

	// Click "Detail" button
	$(document).on('click','#admin_new_students_table_detailbtn',function()
	{
		var u_id = $(this).attr('delebtn');
		$.ajax
		({
			type : 'POST',
			url : '<?php echo base_url(); ?>index.php/admin_new_students_con/user_detail',
			data : {u_id:u_id},
			dataType : 'text',
			success : function(response)
			{
				$('#admin_new_students_replace').html(response);
			}
		});
	});

	// Check value before insert value
	$(document).on('click','#admin_new_students_popup_btn',function()
	{
		var u_id = $('#admin_new_students_popup_id').val();
		var u_sdate = $('#admin_new_students_popup_startdate').val();
		var u_edate = $('#admin_new_students_popup_enddate').val();
		var u_auth = $('#admin_new_students_popup_auth_select').val();
		var u_type = $('#admin_new_students_popup_type_select').val();
		var u_course = $('#admin_new_students_popup_course_select').val();
		var u_level = $('#admin_new_students_popup_level_select').val();

		if(u_id != '' && u_sdate != '' && u_edate != '' && u_auth != '' && u_type != '')
		{
			if(u_type == 'student')
			{
				if(u_course != '')
				{
					if(u_course.match(/English/))
					{
						if(u_level != '')
						{
							var conf = confirm('Are you sure that you will register this line as "Student"?')
							if(conf == true)
							{
								$.ajax
								({
									type : 'POST',
									url : '<?php echo base_url(); ?>index.php/admin_new_student_popup_con/en_student_data',
									data : {u_id:u_id, u_sdate:u_sdate, u_edate:u_edate, u_auth:u_auth, u_type:u_type, u_course:u_course, u_level:u_level},
									dataType : 'text',
									success : function(){ window.location.href = '<?php echo base_url(); ?>index.php/admin_menu_con/index'; }
								});
							} else { return false; }
						}
						else
						{
							alert('Please fill in blanks.');
							return false;
						}
					}
					else
					{
						var conf = confirm('Are you sure that you will register this line as "Student"?')
						if(conf == true)
						{
							$.ajax
							({
								type : 'POST',
								url : '<?php echo base_url(); ?>index.php/admin_new_student_popup_con/it_student_data',
								data : {u_id:u_id, u_sdate:u_sdate, u_edate:u_edate, u_auth:u_auth, u_type:u_type, u_course:u_course},
								dataType : 'text',
								success : function(){ window.location.href = '<?php echo base_url(); ?>index.php/admin_menu_con/index'; }
							});
						} else { return false; }
					}
				}
				else
				{
					alert('Please fill in blanks.');
					return false;
				}
			}
			else if(u_type == 'teacher')
			{
				if(u_course != '')
				{
					var conf = confirm('Are you sure that you will register this line as "Teacher"?')
					if(conf == true)
					{
						$.ajax
						({
							type : 'POST',
							url : '<?php echo base_url(); ?>index.php/admin_new_student_popup_con/teacher_data',
							data : {u_id:u_id, u_sdate:u_sdate, u_edate:u_edate, u_auth:u_auth, u_type:u_type, u_course:u_course},
							dataType : 'text',
							success : function(){ window.location.href = '<?php echo base_url(); ?>index.php/admin_menu_con/index'; }
						});
					} else { return false; }
				}
				else
				{
					alert('Please fill in blanks.');
					return false;
				}
			}
			else
			{
				var conf = confirm('Are you sure that you will register this line as "Staff"?')
				if(conf == true)
				{
					$.ajax
					({
						type : 'POST',
						url : '<?php echo base_url(); ?>index.php/admin_new_student_popup_con/staff_data',
						data : {u_id:u_id, u_sdate:u_sdate, u_edate:u_edate, u_auth:u_auth, u_type:u_type},
						dataType : 'text',
						success : function(){ window.location.href = '<?php echo base_url(); ?>index.php/admin_menu_con/index'; }
					});
				} else { return false; }
			}
		}
		else
		{
			alert('Please fill in blanks.');
			return false;
		}
	});


	// admin_students_info.php

	// searching option open & close
	$(document).on('click','#admin_students_info_subSearch_title',function()
	{
		if($('#admin_students_info_subSearch_title span:last-child').attr('class') == 'glyphicon glyphicon-triangle-top')
		{
			$('#admin_students_info_subSearch_title span:last-child').removeClass('glyphicon glyphicon-triangle-top').addClass('glyphicon glyphicon-triangle-bottom');
			$('#admin_students_info_open').slideUp();
		}
		else
		{
			$('#admin_students_info_subSearch_title span:last-child').removeClass('glyphicon glyphicon-triangle-bottom').addClass('glyphicon glyphicon-triangle-top');
			$('#admin_students_info_open').slideDown();
		}
	});

	// datepicker
	$(document).on('click','#admin_students_info_subSearch_doj_input, #admin_students_info_subSearch_doe_input',function()
	{
		$(this).datepicker({dateFormat:'yy-mm-dd'});
	});

	// Show the extra searching option
	$(document).on('change','#admin_students_info_mainSearch_select',function()
	{
		var typeSelect = $(this).val();
		if(typeSelect == '')
		{
			$('#admin_students_info_subSearch_course, #admin_students_info_subSearch_level').hide();
		}
		else if(typeSelect == 'staff')
		{
			$('#admin_students_info_subSearch_course, #admin_students_info_subSearch_level').hide();
		}
		else if(typeSelect == 'teacher')
		{
			$('#admin_students_info_subSearch_course').show();
			$('#admin_students_info_subSearch_level').hide();
		}
		else if(typeSelect == 'student')
		{
			$('#admin_students_info_subSearch_course').show();
			$('#admin_students_info_subSearch_level').show();
		}
	});

	// Click "Search" button
	$(document).on('click','#admin_students_info_subSearch_searchBtn',function()
	{
		var userType = $('#admin_students_info_mainSearch_select').val();
		var userName = $('#admin_students_info_subSearch_name_input').val();
		var userDOJ = $('#admin_students_info_subSearch_doj_input').val();
		var userDOE = $('#admin_students_info_subSearch_doe_input').val();
		var userAuth = $('#admin_students_info_subSearch_auth_input').val();
		var userCourse = $('#admin_students_info_subSearch_course_input').val();
		var userLevel = $('#admin_students_info_subSearch_level_input').val();

		if(userType == "")
		{
			alert('Please select user type.');
		}
		else
		{
			$.ajax
			({
				type : 'POST',
				url : '<?php echo base_url(); ?>index.php/admin_students_info_con/search',
				data : {userType:userType, userName:userName, userDOJ:userDOJ, userDOE:userDOE, userAuth:userAuth, userCourse:userCourse, userLevel:userLevel},
				dataType : 'text',
				success : function(response)
				{
					$('#admin_students_info_insertTable').html(response);
				}
			});
		}
	});

	// Click "Delete" button in user searcing page
	$(document).on('click','#adminSearchResult_deleteBtn',function()
	{
		var userId = $(this).attr('getId');
		var conf = confirm('Are you sure that you will delete this line?');
		if(conf == true)
		{
			$.ajax
			({
				type : 'POST',
				url : '<?php echo base_url(); ?>index.php/admin_students_info_con/delete',
				data : {userId:userId},
				dataType : 'text',
				success : function(response)
				{
					$('#admin_menu_container').html(response);
				}
			});
		}
		else
		{
			return false;
		}
	});

	// Click "Details" button in user seaching page
	$(document).on('click','#adminSearchResult_detailBtn',function()
	{
		var userId = $(this).attr('getId');
		$.ajax
		({
			type : 'POST',
			url : '<?php echo base_url(); ?>index.php/admin_students_info_con/detail',
			data : {userId:userId},
			dataType : 'text',
			success : function(response)
			{
				$('#admin_students_info_insertTable').html(response);
			}
		});
	});

	// Click "Update" button in user searching page
	$(document).on('click','#adminSearchResult_updateBtn',function()
	{
		var userId = $(this).attr('getId');
		$.ajax
		({
			type : 'POST',
			url : '<?php echo base_url(); ?>index.php/admin_students_info_con/getInfo',
			data : {userId:userId},
			dataType : 'text',
			success : function(response)
			{
				$('#admin_students_info_insertTable').html(response);
			}
		});
	});


	// adminUpdate.php
	// datepicker
	$(document).on('click','#adminUpdate_inputDOJ, #adminUpdate_inputDOE',function()
	{
		$(this).datepicker({dateFormat:'yy-mm-dd'});
	});

	// Click "Update" button
	$(document).on('click','#adminSearchResult_compBtn',function()
	{
		var updateId = $('#adminSearchResult_compBtn').attr('getId');
		var updateType = $('#adminUpdate_type').val();
		var updateAuth = $('#adminUpdate_selectAuth').val();
		var updateDOJ = $('#adminUpdate_inputDOJ').val();
		var updateDOE = $('#adminUpdate_inputDOE').val();

		if(updateType == 'teacher')
		{
			var updateCourse = $('#adminUpdate_selectCourse').val();
			$.ajax
			({
				type : 'POST',
				url : '<?php echo base_url(); ?>index.php/admin_students_info_con/updateTeacher',
				data : {updateId:updateId,updateAuth:updateAuth,updateDOJ:updateDOJ,updateDOE:updateDOE,updateCourse:updateCourse},
				dataType : 'text',
				success : function(response)
				{
					$('#admin_students_info_insertTable').html(response);
				}
			});
		}

		if(updateType == 'student')
		{
			var updateCourse = $('#adminUpdate_selectCourse').val();
			var updateLevel = $('#adminUpdate_selectLevel').val();
			$.ajax
			({
				type : 'POST',
				url : '<?php echo base_url(); ?>index.php/admin_students_info_con/updateStudent',
				data : {updateId:updateId,updateAuth:updateAuth,updateDOJ:updateDOJ,updateDOE:updateDOE,updateCourse:updateCourse,updateLevel:updateLevel},
				dataType : 'text',
				success : function(response)
				{
					$('#admin_students_info_insertTable').html(response);
				}
			});
		}

		if(userType == 'staff')
		{
			$.ajax
			({
				type : 'POST',
				url : '<?php echo base_url(); ?>index.php/admin_students_info_con/updateStaff',
				data : {updateId:updateId,updateAuth:updateAuth,updateDOJ:updateDOJ,updateDOE:updateDOE},
				dataType : 'text',
				success : function(response)
				{
					$('#admin_students_info_insertTable').html(response);
				}
			});
		}

	});

	</script>
</head>
