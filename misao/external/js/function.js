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
                        url : 'http://localhost/misao/ci/index.php/top_con/user_signup',
                        data : {fname:fname, lname:lname, gender:gender, email:email, phone:phone, pass:pass},
                        dataType : 'text',
                        success : function(response)
                        {
                            if(response == '1')
                            {
                                window.location.href = 'http://localhost/misao/ci/index.php/thanks_con/index';
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
                url : 'http://localhost/misao/ci/index.php/top_con/user_login',
                data : {email:email, pass:pass},
                dataType : 'text',
                success : function(response)
                {
                    if(response == '0'){ alert("Login failed."); }
                    if(response == '1'){ alert("You are not allowed Login now."); }
                    if(response == '2'){ alert("You are student."); }
                    if(response == '3')
                    {
                        var conf = confirm('Do you log in as administer? \n If you want to log in as student, click "Cancel".');
                        if(conf == true)
                        {
                            window.location.href = 'http://localhost/misao/ci/index.php/admin_menu_con/index';
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
    window.location.href = 'http://localhost/misao/ci/';
});

// admin_menu.php
// Click "Logout" button
$(document).on('click','[btn = logout_func]',function()
{
    var logout_confirm = confirm('Are you sure you want to log out?');
    if(logout_confirm == true)
    {
        window.location.href = 'http://localhost/misao/ci/index.php/admin_menu_con/click_logout';
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

// At the first loading, show the new student (first page)
$(document).ready(function()
{
    $.ajax
    ({
        url : 'http://localhost/misao/ci/index.php/admin_new_students_con/index',
        success : function(response){
            $('#admin_menu_container').html(response);
        }
    });
});

// Click "New students" in menu
$(document).on('click','#admin_menu_sidebar_new',function()
{
    $.ajax
    ({
        url : 'http://localhost/misao/ci/index.php/admin_new_students_con/index',
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
        url : 'http://localhost/misao/ci/index.php/admin_students_info_con/index',
        success : function(response){
            $('#admin_menu_container').html(response);
        }
    });
});

// Click "test" in menu
$(document).on('click','#admin_menu_sidebar_test',function()
{
    $.ajax
    ({
        url : 'http://localhost/misao/ci/index.php/admin_test_con/index',
        success : function(response){
            $('#admin_menu_container').html(response);
        }
    });
});

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
        url : 'http://localhost/misao/ci/index.php/admin_new_students_con/take_regi_user',
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
            url : 'http://localhost/misao/ci/index.php/admin_new_students_con/delete_user',
            data : {delete_u_id:delete_u_id},
            dataType : 'text',
            success : function(){
                window.location.href = 'http://localhost/misao/ci/index.php/admin_menu_con/index';
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
        url : 'http://localhost/misao/ci/index.php/admin_new_students_con/user_detail',
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
                                url : 'http://localhost/misao/ci/index.php/admin_new_student_popup_con/en_student_data',
                                data : {u_id:u_id, u_sdate:u_sdate, u_edate:u_edate, u_auth:u_auth, u_type:u_type, u_course:u_course, u_level:u_level},
                                dataType : 'text',
                                success : function(){ window.location.href = 'http://localhost/misao/ci/index.php/admin_menu_con/index'; }
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
                            url : 'http://localhost/misao/ci/index.php/admin_new_student_popup_con/it_student_data',
                            data : {u_id:u_id, u_sdate:u_sdate, u_edate:u_edate, u_auth:u_auth, u_type:u_type, u_course:u_course},
                            dataType : 'text',
                            success : function(){ window.location.href = 'http://localhost/misao/ci/index.php/admin_menu_con/index'; }
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
                        url : 'http://localhost/misao/ci/index.php/admin_new_student_popup_con/teacher_data',
                        data : {u_id:u_id, u_sdate:u_sdate, u_edate:u_edate, u_auth:u_auth, u_type:u_type, u_course:u_course},
                        dataType : 'text',
                        success : function(){ window.location.href = 'http://localhost/misao/ci/index.php/admin_menu_con/index'; }
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
                    url : 'http://localhost/misao/ci/index.php/admin_new_student_popup_con/staff_data',
                    data : {u_id:u_id, u_sdate:u_sdate, u_edate:u_edate, u_auth:u_auth, u_type:u_type},
                    dataType : 'text',
                    success : function(){ window.location.href = 'http://localhost/misao/ci/index.php/admin_menu_con/index'; }
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
            url : 'http://localhost/misao/ci/index.php/admin_students_info_con/search',
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
            url : 'http://localhost/misao/ci/index.php/admin_students_info_con/delete',
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
        url : 'http://localhost/misao/ci/index.php/admin_students_info_con/detail',
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
        url : 'http://localhost/misao/ci/index.php/admin_students_info_con/getInfo',
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
            url : 'http://localhost/misao/ci/index.php/admin_students_info_con/updateTeacher',
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
            url : 'http://localhost/misao/ci/index.php/admin_students_info_con/updateStudent',
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
            url : 'http://localhost/misao/ci/index.php/admin_students_info_con/updateStaff',
            data : {updateId:updateId,updateAuth:updateAuth,updateDOJ:updateDOJ,updateDOE:updateDOE},
            dataType : 'text',
            success : function(response)
            {
                $('#admin_students_info_insertTable').html(response);
            }
        });
    }

});
