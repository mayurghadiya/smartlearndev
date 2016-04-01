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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Exam Name</th>
                                    <th>Type</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Marks</th>
                                    <th>Passing Marks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($exam_listing as $exam) { ?>
                                <tr>
                                    <td><?php echo $exam->em_id; ?></td>
                                    <td><?php echo $exam->em_name; ?></td>
                                    <td><?php echo $exam->exam_type_name; ?></td>
                                    <td><?php echo date('F d, Y', strtotime($exam->em_start_time)); ?></td>
                                    <td><?php echo date('F d, Y', strtotime($exam->em_end_time)); ?></td>
                                    <td><?php echo $exam->total_marks; ?></td>
                                    <td><?php echo $exam->passing_mark; ?></td>
                                    <td>
                                        <a title="view" href="<?php echo base_url('index.php?student/exam_marks/' . $exam->em_id); ?>"><i class="fa fa-desktop"></i></a>
                                        &nbsp;<a href="<?php echo base_url('index.php?student/download_statement_marks/' . $exam->em_id) ?>" title="download report"><i class="fa fa-download"></i></a>
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