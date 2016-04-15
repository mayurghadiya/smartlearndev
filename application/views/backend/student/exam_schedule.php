<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <!--<hr/>-->
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Exam Schedule</h1>
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
                                    <th>Exam Name: <?php echo $exam_details->em_name; ?></th>
                                    <th>Year: <?php echo $exam_details->em_year; ?></th>
                                </tr>
                                <tr>
                                    <th>Course Name: <?php echo $exam_details->c_name; ?></th>
                                    <th>Semester: <?php echo $exam_details->s_name; ?></th>
                                </tr>
                                <tr>
                                    <th>Total Marks: <?php echo $exam_details->total_marks; ?></th>
                                    <th>Passing Marks: <?php echo $exam_details->passing_mark; ?></th>
                                </tr>
                            </thead>                            
                        </table>
                        <table class="table table-bordered">
                            <?php
                            //check for exam type reguler or remedial
                            if ($exam_details->exam_ref_name == 'reguler') {
                                ?>
                                <tbody>
                                    <tr>
                                        <th colspan="<?php echo count($time_table) + 1; ?>" style="text-align: center">Exam Schedule</th>
                                    </tr>
                                    <tr>
                                        <th>Subject</th>
                                        <?php
                                        foreach ($time_table as $row) {
                                            echo "<th>{$row->subject_name}({$row->subject_code})</th>";
                                        }
                                        ?>

                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <?php
                                        foreach ($time_table as $row) {
                                            echo "<td>" . date('F d, Y', strtotime($row->exam_date)) . "</td>";
                                        }
                                        ?>

                                    </tr>
                                    <tr>
                                        <th>Time</th>
                                        <?php
                                        foreach ($time_table as $row) {
                                            echo "<td>" . date('h:i A', strtotime(date('Y-m-d') . $row->exam_start_time)) . " to " . date('h:i A', strtotime(date('Y-m-d') . $row->exam_end_time)) . "</td>";
                                        }
                                        ?>

                                    </tr>
                                </tbody>
                                <?php
                            } else {
                                //check previous exam result
                                $remedial = $this->db->select()
                                        ->from('exam_manager')
                                        ->where('em_id < ', $exam_details->em_id)
                                        ->where('em_id', $exam_details->exam_ref_id)
                                        ->order_by('em_id', 'ASC')
                                        ->limit(1)
                                        ->get()
                                        ->row();
                                //get time table
                                $this->load->model('Student/Student_model');
                                $schedule = $this->Student_model->exam_schedule($remedial->em_id);

                                //check for marks
                                $student_id = $this->session->userdata('student_id');
                                $marks = $this->Student_model->student_marks($student_id, $remedial->em_id);
                                $remedial_schedule = array();
                                foreach ($marks as $mark) {
                                    if ($mark->mark_obtained < $remedial->passing_mark) {
                                        $remedial_schedule_data = $this->Student_model->remedial_exam_schedule($remedial->em_id, $mark->mm_subject_id);
                                        array_push($remedial_schedule, $remedial_schedule_data);
                                    }
                                }
                                ?>

                                <?php foreach ($remedial_schedule as $sc) { ?>
                                    <tbody>
                                        <tr>
                                            <th colspan="<?php echo count($remedial_schedule) + 1; ?>" style="text-align: center">Exam Schedule</th>
                                        </tr>
                                        <tr>
                                            <th>Subject</th>
                                            <?php
                                            foreach ($sc as $row) {
                                                echo "<th>{$row->subject_name}({$row->subject_code})</th>";
                                            }
                                            ?>

                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <?php
                                            foreach ($sc as $row) {
                                                echo "<td>" . date('F d, Y', strtotime($row->exam_date)) . "</td>";
                                            }
                                            ?>

                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <?php
                                            foreach ($sc as $row) {
                                                echo "<td>" . date('h:i A', strtotime(date('Y-m-d') . $row->exam_start_time)) . " to " . date('h:i A', strtotime(date('Y-m-d') . $row->exam_end_time)) . "</td>";
                                            }
                                            ?>

                                        </tr>
                                    </tbody>
                                <?php } ?>

                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>