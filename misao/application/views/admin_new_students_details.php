<div id="admin_new_students_table_detail_title">New Student Details</div>
<table id="admin_new_students_table_detail">
    <tr><th>ID</th><td><?php echo $user_info->row()->u_id; ?></td></tr>
    <tr><th>Name</th><td><?php echo ucfirst(strtolower($user_info->row()->u_fname)); ?> <?php echo ucfirst(strtolower($user_info->row()->u_lname)); ?></td></tr>
    <tr><th>Gender</th><td><?php echo ucfirst($user_info->row()->u_gender); ?></td></tr>
    <tr><th>Email</th><td><?php echo $user_info->row()->u_email; ?></td></tr>
    <tr><th>Phone</th><td><?php echo $user_info->row()->u_phone; ?></td></tr>
</table>
<table id="admin_new_students_table_btn">
    <tr>
        <td><div id="admin_new_students_table_regibtn" class="admin_new_students_btn" delebtn="<?php echo $user_info->row()->u_id; ?>">Enroll</div></td>
        <td><div id="admin_new_students_table_delebtn" class="admin_new_students_btn" delebtn="<?php echo $user_info->row()->u_id; ?>">Delete</div></td>
    </tr>
    <tr>
        <td colspan="2">
            <a href="http://localhost/misao/ci/index.php/admin_menu_con/index">
                <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>Back to new students list.
            </a>
        </td>
    </tr>
</table>
