<body>
<?php
$check_login = $this->session->userdata('u_id');
if(!$check_login){ header('Location:'.base_url()); }
$user_fname = $this->session->userdata('u_fname');
$user_lname = $this->session->userdata('u_lname');
$title_name = $user_fname . ' ' . $user_lname;
?>
<div id="admin_menu_header">
    <div id="admin_menu_header_inner_logo">
        <img src="<?php echo base_url(); ?>external/images/logo.jpg" alt="logo"><span id="admin_menu_header_inner_text">(TEST SYSTEM FOR STUDENTS)</span>
    </div>
    <div id="admin_menu_header_inner_alert">Student page</div>
    <div id="admin_menu_header_inner_btn" btn="logout_func">Logout</div>
    <div id="admin_menu_header_inner_name"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Hi, <?php  echo strtoupper($title_name); ?>.</div>
    <div id="admin_menu_header_inner_ham">
        <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
    </div>
</div>

<div id="admin_menu_sidebar">
    <ul>
        <li>MENU</li>	
            <?php 
            if($today_test[0]['test_aproved'] > 0)
			{ 
               echo  '<li id="btn_test_screen" select="now">';
               echo  '<span id="admin_menu_sidebar_newnum" style="border-radius: 12px;padding: 9px 30px;"> Click For Test</span>';
               echo  '<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>';
               echo  '</li>';
            } 
			?>
        <li id="btn_std_profile" select="">Profile<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>
        <li id="btn_std_test_result_show" select="">Test Results<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>
    </ul>
</div>

<div id="admin_menu_container">
</div>
<div id=admin_menu_footer>&copy; 2016 MISAO. ALL RIGHTS RESERVED</div>
<div id="admin_new_students_popup">
</div>
<!--for model by raj -->
	<div class="modal fade " id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-sm"> <!--For Smoll Model or Large Model-->
			<div class="modal-content">
				<div class="modal-header">
					<button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body" id="myModalBody">
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
							<button type="button" id="create_new_test" data-dismiss="modal" class="btn btn-danger btn-lg btn-block " >Create New Test</button>
							</div></br></br></br>
							<div class="col-md-12">
							<button type="button" id="update_old_test_btn" data-dismiss="modal" class="btn btn-danger btn-lg btn-block" >Update Old One Test</button>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" id="myModalFooter">		
				</div>
			</div>
		</div>
	</div>

<script>
// Add "Logout" bar in the case of small screen size
$(window).on('load',function()
{
    var x = $(window).width();
    if(x <= 750)
    {
        $('#admin_menu_sidebar ul').append('<li select="" btn="logout_func">Logout (User : <?php echo strtoupper($title_name); ?>)<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>');
    }
});

// Add and remove "Logout" bar when change screen size
$(window).on('resize',function()
{
    var x = $(window).width();
    if(x > 750)
    {
        var flag = $('#admin_menu_sidebar li:last-child').attr('btn')
        if(flag == 'logout_func')
        {
            $('#admin_menu_sidebar li:last-child').remove();
        }
    }
    if(x <= 750)
    {
        var flag = $('#admin_menu_sidebar li:last-child').attr('btn')
        if(flag != 'logout_func')
        {
            $('#admin_menu_sidebar ul').append('<li select="" btn="logout_func">Logout (User : <?php echo strtoupper($title_name); ?>)<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></li>');
        }
    }
});

</script>
</body>
</html>