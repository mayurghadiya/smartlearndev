<html>
    <head>
        <title>Marksheet</title>
        <?php
        @require_once 'includes/includes_top.php';
        ?>
        <style>

            .box.box-solid.box-warning > .box-header {
                background: #f39c12 none repeat scroll 0 0;
                color: #ffffff;
            }
            .box.box-solid.box-warning {
                border: 1px solid #f39c12;
            }
            .box {
                background: #ffffff none repeat scroll 0 0;
                border-radius: 3px;
                border-top: 3px solid #d2d6de;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
                margin-bottom: 20px;
                position: relative;
                width: 100%;
            }
            .box.box-solid.box-info {
                border: 1px solid #00c0ef;
            }
            .box.box-solid.box-info > .box-header {
                background: #00c0ef none repeat scroll 0 0;
                color: #ffffff;
            }
            .box-header.with-border {
                border-bottom: 1px solid #f4f4f4;
            }
            .box-header {
                color: #444;
                display: block;
                padding: 10px;
                position: relative;
            }
            .box-body {
                border-radius: 0 0 3px 3px;
                padding: 10px;
            }
            .box-footer {
                background-color: #ffffff;
                border-radius: 0 0 3px 3px;
                border-top: 1px solid #f4f4f4;
                padding: 10px;
            }
        </style>
        <link href="<?= $this->config->item('asset') ?>student/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
    </head>
    <body>

        <!-- Data -->
        <div class="well well-sm">
            <h4 class="page-header edusec-border-bottom-warning">
                <i class="fa fa-info-circle"></i> Student Current Details 
            </h4>
            <div class="table-responsive">
                <table>
                    <colgroup><col style="width:500px">
                        <col style="width:80%">
                    </colgroup><tbody><tr>
                            <td>
                                <h3 class="text-primary">
                                    <b><span class="glyphicon glyphicon-user"></span> 
                                        <?php echo $student_detail->std_first_name . ' ' . $student_detail->std_last_name; ?>
                                    </b>
                                </h3>
                                <p>
                                    <strong>Student ID : </strong> 
                                    <?php echo $student_detail->std_id; ?>
                                </p>
                                <p>
                                    <strong>Batch :   </strong> 
                                    <?php echo $batch_detail->b_name; ?>
                                </p>
                                
                            </td>
                        </tr>
                    </tbody></table>
            </div><!--/table-responsive-->
        </div><!--/well-->

        <?php if (count($student_marks)) { ?>
            <!--Start display all exam results block for students wise-->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Academic Year : 2015-16</h3>
                </div><!--/box-header-->
                <div class="box-body">
                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Branch : <?php echo $batch_detail->b_name; ?> (<?php echo $batch_detail->c_name; ?>)</h3>
                        </div><!--/box-header-->
                        <div class="box-body">
                            <div class="box box-info box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Exam Name : <?php echo $exam_details->em_name; ?></h3>
                                    <!--<div class="pull-right">
                                            <strong>Exam Type : </strong>Marks and Grade
                                    </div>-->
                                </div><!--/box-header-->
                                <div class="box-body no-padding table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th>SI NO.</th>
                                                <th>Subject Code</th>
                                                <th>Subject Name</th>
                                                <th>Total Marks</th>
                                                <th>Passing Marks</th>
                                                <th>Obtained Marks</th>
                                                <th>Grade</th>
                                                <th>Results</th>
                                                <th>Remarks</th>
                                            </tr>
                                            <?php
                                            $counter = 1;
                                            $total_marks = 0;
                                            $obtained_marks = 0;
                                            $is_failed = FALSE;
                                            foreach ($student_marks as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $counter++; ?></td>
                                                    <td><?php echo $row->subject_code; ?></td>
                                                    <td><?php echo $row->subject_name; ?></td>
                                                    <td><?php echo $exam_details->total_marks; ?></td>
                                                    <?php $total_marks += $exam_details->total_marks; ?>
                                                    <td><?php echo $exam_details->passing_mark; ?></td>
                                                    <td><?php echo $row->mark_obtained; ?></td>
                                                    <?php if ($row->mark_obtained < $exam_details->passing_mark) $is_failed = TRUE; ?>
                                                    <?php $obtained_marks += $row->mark_obtained; ?>
                                                    <?php
                                                    $percentage = ($row->mark_obtained * 100) / $exam_details->total_marks;
                                                    ?>
                                                    <td>
                                                        <?php
                                                        $grade = $percentage;
                                                        //echo $grade;
                                                        //exit;
                                                        switch ($grade) {
                                                            case $grade > 90:
                                                                echo 'A+';
                                                                break;
                                                            case $grade > 85:
                                                                echo 'A';
                                                                break;
                                                            case $grade > 76:
                                                                echo 'B+';
                                                                break;
                                                            case $grade > 71:
                                                                echo 'B';
                                                                break;
                                                            case $grade > 60:
                                                                echo 'C';
                                                                break;
                                                            case $grade > $exam_details->passing_mark:
                                                                echo 'D';
                                                                break;
                                                            default:
                                                                echo 'F';
                                                            //$is_failed = TRUE;
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php if ($row->mark_obtained > $exam_details->passing_mark)
                                                    echo 'Pass';
                                                else
                                                    echo 'Fail';
                                                ?></td>
                                                    <td><?php echo ''; ?></td>

                                                </tr>
    <?php } ?>

                                        </tbody>
                                    </table>
                                </div><!--/box-body-->
                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <strong>Total Marks : </strong><?php echo $total_marks; ?>	
                                        </div>
                                        <div class="col-sm-3">
                                            <strong>Total Obtained Marks : </strong><?php echo $obtained_marks; ?>	
                                        </div>
                                        <div class="col-sm-3">
                                            <strong>Total Percentages Marks : </strong><?php echo number_format((($obtained_marks * 100) / $total_marks), 2, '.', ''); ?>%</div>
                                        <div class="col-sm-3">
                                            <strong>Results : </strong>
                                            <?php if (!$is_failed) { ?>
                                                <span class="label label-success">Pass</span>    
                                            <?php } else { ?>
                                                <span class="label label-danger">Failed</span>
    <?php }
    ?>

                                        </div>
                                    </div>
                                </div><!--/box-footer-->
                            </div><!--/box-->

                        </div><!--/box-body-->
                    </div><!--/box-->
                </div><!--/box-body-->
            </div><!--/box-->
    <?php } ?>

    </body>
<?php
@require_once 'includes/footer.php';
?>
</html>