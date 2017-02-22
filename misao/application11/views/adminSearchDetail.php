
<div id="adminSearchDetail_title">Member Details</div>

<table id="adminSearchDetail_table">
    <tr><th>ID</th><td><?php echo $detailInfo->row()->u_id; ?></td></tr>
    <tr><th>Name</th><td><?php echo ucfirst(strtolower($detailInfo->row()->u_fname)); ?> <?php echo ucfirst(strtolower($detailInfo->row()->u_lname)); ?></td></tr>
    <tr><th>Gender</th><td><?php echo ucfirst($detailInfo->row()->u_gender); ?></td></tr>
    <tr><th>Email</th><td><?php echo $detailInfo->row()->u_email; ?></td></tr>
    <tr><th>Phone</th><td><?php echo $detailInfo->row()->u_phone; ?></td></tr>
    <tr><th>Type</th><td><?php echo ucfirst($detailInfo->row()->u_type); ?></td></tr>
    <tr><th>Authority</th><td><?php echo ucfirst($detailInfo->row()->u_authority); ?></td></tr>
    <tr><th>Start</th><td><?php echo $detailInfo->row()->u_doj; ?></td></tr>
    <tr><th>End</th><td><?php echo $detailInfo->row()->u_doe; ?></td></tr>
    <?php if($detailInfo->row()->u_type == 'teacher' || $detailInfo->row()->u_type == 'student'){ ?>
    <tr><th>Course</th><td><?php echo $detailInfo->row()->u_course; ?></td></tr><?php } ?>
    <?php if($detailInfo->row()->u_type == 'student'){ ?>
    <tr><th>English Level</th><td><?php echo ucfirst($detailInfo->row()->u_en_level); ?></td></tr><?php } ?>
</table>

<table id="adminSearchDetail_tableBtn">
    <tr>
        <td><div id="adminSearchResult_updateBtn" class="" getId="<?php echo $detailInfo->row()->u_id; ?>">Update</div></td>
        <td><div id="adminSearchResult_deleteBtn" class="" getId="<?php echo $detailInfo->row()->u_id; ?>">Delete</div></td>
    </tr>
</table>
