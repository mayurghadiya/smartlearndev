<table class="table table-striped table-responsive" id="exam-data-tables">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><?php echo ucwords("Exam Name"); ?></th>
            <th><?php echo ucwords("Course"); ?></th>
            <th width="14%"><?php echo ucwords("Branch"); ?></th>
            <th><?php echo ucwords("Batch"); ?></th>
            <th width="10%"><?php echo ucwords("Semester"); ?></th>
            <th width="10%"><?php echo ucwords("Date"); ?></th>
            <th><?php echo ucwords("Action"); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter = 0;
        foreach ($exams as $row) {
            $counter++;
            $cenlist = array();
            ?>
            <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $row->em_name; ?></td>
                <td><?php echo $row->d_name; ?></td>
                <td><?php echo $row->c_name; ?></td>
                <td><?php echo $row->b_name; ?></td>
                <td><?php echo $row->s_name; ?></td>

                <td><?php echo date('F d, Y', strtotime($row->em_date)); ?></td>
                <td class="menu-action">
                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_exam/<?php echo $row->em_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/exam/delete/<?php echo $row->em_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        "use strict";
        $('#exam-data-tables').dataTable({
            "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
        });
        $('.filter-rows').on('change', function () {
            var filter_id = $(this).attr('data-filter');
            filter_column(filter_id);
        });

        function filter_column(filter_id) {
            $('#exam-data-tables').DataTable().column(filter_id).search(
                    $('#filter' + filter_id).val()
                    ).draw();
        }
    });
</script>