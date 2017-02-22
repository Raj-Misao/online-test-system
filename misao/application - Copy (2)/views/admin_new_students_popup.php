<!-- NEW STUDENT REGISTER POP UP -->
<?php if($regi_info->num_rows() > 0){ ?>

<div id="admin_new_students_popup_closebtn"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>CLOSE</div>

<div id="admin_new_students_popup_container">

    <div id="admin_new_students_popup_title">Registar new member</div>

    <div id="admin_new_students_popup_name">Name : <?php echo ucfirst(strtolower($regi_info->row()->u_fname)); ?> <?php echo ucfirst(strtolower($regi_info->row()->u_lname)); ?> (ID:<?php echo $regi_u_id = $regi_info->row()->u_id; ?>)</div>

    <input type="hidden" id="admin_new_students_popup_id" value="<?php echo $regi_u_id; ?>">

    <div id="admin_new_students_popup_start" class="admin_new_students_popup_item">Starting date</div>
    <label><input type="text" id="admin_new_students_popup_startdate" class="admin_new_students_popup_date" placeholder="yyyy-mm-dd" readonly> <span class="glyphicon glyphicon-calendar calendar" aria-hidden="true"></span></label>

    <div id="admin_new_students_popup_end" class="admin_new_students_popup_item">Ending date</div>
    <label><input type="text" id="admin_new_students_popup_enddate" class="admin_new_students_popup_date" placeholder="yyyy-mm-dd" readonly> <span class="glyphicon glyphicon-calendar calendar" aria-hidden="true"></span></label>

    <div id="admin_new_students_popup_auth" class="admin_new_students_popup_item">Authority</div>
    <select id="admin_new_students_popup_auth_select" class="form-control">
        <option value="">SELECT</option>
        <option value="normal">Normal</option>
        <option value="admin">Admin</option>
    </select>

    <div id="admin_new_students_popup_type" class="admin_new_students_popup_item">Type</div>
    <select id="admin_new_students_popup_type_select" class="form-control">
        <option value="">SELECT</option>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
        <option value="staff">Staff</option>
    </select>

    <div id="admin_new_students_popup_course_hide">
        <div id="admin_new_students_popup_course" class="admin_new_students_popup_item">Course</div>
        <select id="admin_new_students_popup_course_select" class="form-control">
            <option value="">SELECT</option>
            <option value="English">English</option>
            <option value="IT(Web deve)">IT(Web deve)</option>
            <option value="IT(android)">IT(android)</option>
            <option value="IT(Web deve and android)">IT(Web deve&amp;android)</option>
            <option value="English and IT(Web deve)">English&amp;IT(Web deve)</option>
            <option value="English and IT(android)">English&amp;IT(android)</option>
            <option value="English and IT(Web deve and android)">English&amp;IT(Web deve&amp;android)</option>
            <option value="Internship">Internship</option>
            <option value="Internship and English">Internship&amp;English</option>
            <option value="Internship and English and IT(Web deve)">Internship&amp;English&amp;IT(Web deve)</option>
            <option value="Internship and English and IT(android)">Internship&amp;English&amp;IT(android)</option>
            <option value="Internship and English and IT(Web deve and android)">Internship&amp;English&amp;IT(Web deve&amp;android)</option>
            <option value="Internship and IT(Web deve)">Internship&amp;IT(Web deve)</option>
            <option value="Internship and IT(android)">Internship&amp;IT(android)</option>
            <option value="Internship and IT(Web deve and android)">Internship&amp;IT(Web deve&amp;android)</option>
        </select>
    </div>

    <div id="admin_new_students_popup_level_hide">
        <div id="admin_new_students_popup_level" class="admin_new_students_popup_item">English level</div>
        <select id="admin_new_students_popup_level_select" class="form-control">
            <option value="">SELECT</option>
            <option value="elem">Elem</option>
            <option value="pre">Pre</option>
            <option value="inter">Inter</option>
            <option value="upper">Upper</option>
            <option value="adv">Adv</option>
        </select>
    </div>

    <div id="admin_new_students_popup_btn">Confirm</div>

</div>

<?php } ?>