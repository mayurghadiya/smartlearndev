<table class="table table-striped table-responsive" id="fee-structure-data-tables">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><?php echo ucwords("Title"); ?></th>
            <th><?php echo ucwords("Course"); ?></th>
            <th><?php echo ucwords("Branch"); ?></th>
            <th><?php echo ucwords("Batch"); ?></th>
            <th><?php echo ucwords("Semester"); ?></th>
            <th><?php echo ucwords("Fee"); ?></th>
            <th><?php echo ucwords("Action"); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($fees_structure as $row) { ?>
            <tr>
                <td><?php echo $row->fees_structure_id; ?></td>
                <td><?php echo $row->title; ?></td>
                <td><?php echo $row->d_name; ?></td>
                <td><?php echo $row->c_name; ?></td>
                <td><?php echo $row->b_name; ?></td>
                <td><?php echo $row->s_name; ?></td>
                <td><?php echo $row->total_fee; ?></td>
                <td class="menu-action">
                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_fees_structure/<?php echo $row->fees_structure_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/fees_structure/delete/<?php echo $row->fees_structure_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>