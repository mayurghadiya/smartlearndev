<table class="table table-striped" id="search-data-tables">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><?php echo ucwords("Course"); ?></th>
            <th><?php echo ucwords("Branch"); ?></th>
            <th><?php echo ucwords("Batch"); ?></th>
            <th><?php echo ucwords("Semester"); ?></th>
            <th><?php echo ucwords("Exam"); ?></th>
            <th><?php echo ucwords("Subject"); ?></th>
            <th><?php echo ucwords("Date"); ?></th>
            <th><?php echo ucwords("Time"); ?></th>
            <th width="10%"><?php echo ucwords("Action"); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter = 1;
        foreach ($time_table as $row) {
            ?>
            <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $row->d_name; ?></td>
                <td><?php echo $row->c_name; ?></td>
                <td><?php echo $row->b_name; ?></td>
                <td><?php echo $row->s_name; ?></td>
                <td><?php echo $row->em_name; ?></td>
                <td><?php echo $row->subject_name; ?></td>
                <td><?php echo date('F d, Y', strtotime($row->exam_date)); ?></td>
                <td><?php echo date('h:i A', strtotime(date('Y-m-d') . $row->exam_start_time)) . ' to ' . date('h:i A', strtotime(date('Y-m-d') . $row->exam_end_time)); ?></td>
                <td class="menu-action">
                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_exam_time_table/<?php echo $row->exam_time_table_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/exam_time_table/delete/<?php echo $row->exam_time_table_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                </td>
            </tr>
            <?php
            $counter++;
        }
        ?>
    </tbody>
</table>