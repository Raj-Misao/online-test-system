
<div id="adminSearchDetail_title">Member Details</div>

<table id="adminSearchDetail_table">
    <tr><th>ID</th><td><?php echo $detailInfo->row()->u_id; ?></td></tr>
    <tr><th>Name</th><td><?php echo ucfirst(strtolower($detailInfo->row()->u_fname)); ?> <?php echo ucfirst(strtolower($detailInfo->row()->u_lname)); ?></td></tr>
    <tr><th>Gender</th><td><?php echo ucfirst($detailInfo->row()->u_gender); ?></td></tr>
    <tr><th>Email</th><td><?php echo $detailInfo->row()->u_email; ?></td></tr>
    <tr><th>Phone</th><td><?php echo $detailInfo->row()->u_phone; ?></td></tr>
    <tr><th>Type</th><td><?php echo ucfirst($detailInfo->row()->u_type); ?><input type="hidden" id="adminUpdate_type" value="<?php echo $detailInfo->row()->u_type; ?>"></td></tr>
    <tr><th>Authority</th>
        <td>
            <select id="adminUpdate_selectAuth" class="form-control">
                <option value="<?php echo $detailInfo->row()->u_authority; ?>"><?php echo ucfirst($detailInfo->row()->u_authority); ?></option>
                <option value="normal">Normal</option>
                <option value="admin">Admin</option>
            </select>
        </td>
    </tr>
    <tr><th>Start</th>
        <td>
            <label>
                <input type="text" id="adminUpdate_inputDOJ" class="adminUpdate_inputDate" placeholder="yyyy-mm-dd" value="<?php echo $detailInfo->row()->u_doj; ?>" readonly>
                <span class="glyphicon glyphicon-calendar calendar" aria-hidden="true"></span>
            </label>
        </td>
    </tr>
    <tr><th>End</th>
        <td>
            <label>
                <input type="text" id="adminUpdate_inputDOE" class="adminUpdate_inputDate" placeholder="yyyy-mm-dd" value="<?php echo $detailInfo->row()->u_doe; ?>" readonly>
                <span class="glyphicon glyphicon-calendar calendar" aria-hidden="true"></span>
            </label>
        </td>
    </tr>

    <?php if($detailInfo->row()->u_type == 'teacher' || $detailInfo->row()->u_type == 'student'){ ?>
    <tr>
        <th>Course</th>
        <td>
            <select id="adminUpdate_selectCourse" class="form-control">
                <option value="<?php echo $detailInfo->row()->u_course; ?>"><?php echo $detailInfo->row()->u_course; ?></option>
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
        </td>
    </tr>
    <?php } ?>

    <?php if($detailInfo->row()->u_type == 'student'){ ?>
    <tr>
        <th>English Level</th>
        <td>
            <select id="adminUpdate_selectLevel" class="form-control">
                <option value="<?php echo strtolower($detailInfo->row()->u_en_level); ?>"><?php echo ucfirst($detailInfo->row()->u_en_level); ?></option>
                <option value="elem">Elem</option>
                <option value="pre">Pre</option>
                <option value="inter">Inter</option>
                <option value="upper">Upper</option>
                <option value="adv">Adv</option>
            </select>

        </td>
    </tr>
    <?php } ?>

</table>

<table id="adminSearchDetail_tableBtn">
    <tr>
        <td><div id="adminSearchResult_compBtn" class="" getId="<?php echo $detailInfo->row()->u_id; ?>">Complete</div></td>
        <td><a id="admin_menu_sidebar_info"><div id="adminSearchResult_cancelBtn">Cancel</div></a></td>
    </tr>
</table>
