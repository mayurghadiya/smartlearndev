<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <!--<hr/>-->
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Exam Listing</h1>
        </div>
    </div>
    <div class="vd_banner vd_bg-white clearfix pd-20">
        <div class="container">
            <div class="vd_content clearfix">
                <div class="row">           
                    <div class="panel-body"> 							
                        <table class="table table-bordered" id="data-tables-exam">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Exam Name</th>
                                    <th>Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Marks</th>
                                    <th>Passing Marks</th>
                                    <th>Exam Ref</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //$exam_listing = sort($exam_listing);
                                foreach ($exam_listing as $exam) {
                                    ?>
                                    <tr>
                                        <td><?php echo $exam->em_id; ?></td>
                                        <td><?php echo $exam->em_name; ?></td>
                                        <td><?php echo $exam->exam_type_name; ?></td>
                                        <td><?php echo date('F d, Y', strtotime($exam->em_start_time)); ?></td>
                                        <td><?php echo date('F d, Y', strtotime($exam->em_end_time)); ?></td>
                                        <td><?php echo $exam->total_marks; ?></td>
                                        <td><?php echo $exam->passing_mark; ?></td>
                                        <td><?php echo ucfirst($exam->exam_ref_name); ?></td>
                                        <td>
                                            <a href="<?php echo base_url('index.php?student/exam_schedule/' . $exam->em_id); ?>">Schedule</a>
                                        </td>
                                    </tr>
<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#data-tables-exam').dataTable({
            "order": [[0, "desc"]],
        });
    })

</script>