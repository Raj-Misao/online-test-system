<?php if($searchInfo->num_rows() == 0){ echo "<div id='adminSearchResult_noResult'>No Result...</div>"; exit; } ?>
    <table id="adminSearchResult_table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach($searchInfo->result() as $infoRow) { ?>
        <tr>
            <td><?php echo $infoRow->u_id; ?></td>
            <td><?php echo ucfirst(strtolower($infoRow->u_fname)); ?> <?php echo ucfirst(strtolower($infoRow->u_lname)); ?></td>
            <td><div id="adminSearchResult_detailBtn" getId="<?php echo $infoRow->u_id; ?>">Details</div></td>
            <td><div id="adminSearchResult_updateBtn" getId="<?php echo $infoRow->u_id; ?>">Update</div></td>
            <td><div id="adminSearchResult_deleteBtn" getId="<?php echo $infoRow->u_id; ?>">Delete</div></td>
        </tr>
        <?php } ?>
    </table>
