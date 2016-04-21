<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <!--<hr/>-->
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Search Result: "<?php echo isset($search_string) ? $search_string : ''; ?>"</h1>
        </div>
    </div>
    <div class="vd_banner vd_bg-white clearfix pd-20">
        <div class="container">
            <div class="vd_content clearfix">
                <div class="row">           
                    <br/>
                    <?php
                    if (isset($search_result)) {
                        if (isset($search_result['student']) && count($search_result['student'])) {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="11"><strong>Student Details</strong></td>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Roll No</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Birth date</th>
                                    <th>Course</th>
                                    <th>Semester</th>
                                </tr>
                                <?php
                                $isseter = 1;
                                foreach ($search_result['student'] as $student) {
                                    ?>
                                    <tr>
                                        <td><?php echo $isseter; ?></td>
                                        <td><?php echo $student->name; ?></td>
                                        <td><?php echo $student->std_first_name . ' ' . $student->std_last_name; ?></td>
                                        <td><?php echo $student->std_roll; ?></td>
                                        <td><?php echo $student->email; ?></td>
                                        <td><?php echo $student->std_gender; ?></td>
                                        <td><?php echo $student->std_mobile; ?></td>
                                        <td><?php echo $student->city; ?></td>
                                        <td><?php echo $student->std_birthdate; ?></td>
                                        <td><?php echo $student->c_name; ?></td>
                                        <td><?php echo $student->s_name; ?></td>
                                    </tr>
                                    <?php
                                    $isseter++;
                                }
                                ?>
                            </table>
                            <br/>
                            <?php
                        }
                        if (isset($search_result['exam']) && count($search_result['exam'])) {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="9"><strong>Exam Details</strong></td>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Exam Name</th>
                                    <th>Degree</th>
                                    <th>Course Name</th>
                                    <th>Batch</th>
                                    <th>Semester</th>
                                    <th>Exam Type</th>
                                    <th>Total Marks</th>
                                    <th>Passing Marks</th>
                                </tr>                                
                                <?php
                                $isseter = 1;
                                foreach ($search_result['exam'] as $exam) {
                                    ?>
                                    <tr>
                                        <td><?php echo $isseter; ?></td>
                                        <td><?php echo $exam->em_name; ?></td>
                                        <td><?php echo $exam->d_name; ?></td>
                                        <td><?php echo $exam->c_name; ?></td>
                                        <td><?php echo $exam->b_name; ?></td>
                                        <td><?php echo $exam->s_name; ?></td>
                                        <td><?php echo $exam->exam_type_name; ?></td>
                                        <td><?php echo $exam->total_marks; ?></td>
                                        <td><?php echo $exam->passing_mark; ?></td>
                                    </tr>
                                    <?php
                                    $isseter++;
                                }
                                ?>
                            </table>
                            <br/>
                            <?php
                        }
                        if (isset($search_result['course']) && count($search_result['course'])) {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="4"><strong>Course Details</strong></td>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Course Alias</th>
                                    <th>Description</th>                                        
                                </tr>
                                <?php
                                $isseter = 1;
                                foreach ($search_result['course'] as $course) {
                                    ?>
                                    <tr>
                                        <td><?php echo $isseter; ?></td>
                                        <td><?php echo $course->c_name; ?></td>
                                        <td><?php echo $course->course_alias_id; ?></td>
                                        <td><?php echo $course->c_description; ?></td>
                                    </tr>
                                    <?php
                                    $isseter++;
                                }
                                ?>
                            </table>
                            <br/>
                            <?php
                        }
                        if (isset($search_result['batch']) && count($search_result['batch'])) {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="4"><strong>Batch Details</strong></td>
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <td>Batch Name</td>
                                    <td>Degree Name</td>
                                </tr>
                                <?php
                                $isseter = 1;
                                foreach ($search_result['batch'] as $batch) {
                                    ?>
                                    <tr>
                                        <td><?php echo $isseter; ?></td>
                                        <td><?php echo $batch->b_name; ?></td>
                                        <td><?php echo $batch->d_name; ?></td>
                                    </tr>
                                    <?php
                                    $isseter++;
                                }
                                ?>
                            </table>
                            <br/>
                            <?php
                        }
                        if (isset($search_result['assignment']) && count($search_result['assignment'])) {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="9"><strong>Assignment Details</strong></td>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Degree</th>
                                    <th>Course</th>
                                    <th>Batch</th>
                                    <th>Semester</th>
                                    <th>Date</th>
                                    <th>File</th>
                                </tr>
                                <?php
                                $counter = 1;
                                foreach ($search_result['assignment'] as $assignment) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $assignment->assign_title; ?></td>
                                        <td><?php echo $assignment->assign_desc; ?></td>
                                        <td><?php echo $assignment->d_name; ?></td>
                                        <td><?php echo $assignment->c_name; ?></td>
                                        <td><?php echo $assignment->b_name; ?></td>
                                        <td><?php echo $assignment->s_name; ?></td>
                                        <td><?php echo $assignment->assign_dos; ?></td>
                                        <td><?php echo $assignment->assign_filename; ?></td>
                                    </tr>
                                    <?php
                                    $counter++;
                                }
                                ?>
                            </table>
                            <?php
                        }
                        if (isset($search_result['participate']) && count($search_result['participate'])) {
                            ?>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="7"><strong>Participate Details</strong></td>
                                </tr>
                                <tr>
                                    <td>#</td>
                                    <td>Title</td>
                                    <td>Description</td>
                                    <td>Student Name</td>
                                    <td>Course</td>
                                    <td>Semester</td>
                                    <td>File</td>
                                </tr>
                                <?php
                                $counter = 1;
                                foreach ($search_result['participate'] as $participate) {
                                    ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $participate->pp_title; ?></td>
                                        <td><?php echo $participate->pp_desc; ?></td>
                                        <td><?php echo $participate->std_first_name . ' ' . $participate->std_last_name; ?></td>
                                        <td><?php echo $participate->c_name; ?></td>
                                        <td><?php echo $participate->s_name; ?></td>
                                        <td><?php echo $participate->pp_filename; ?></td>
                                    </tr>
                                    <?php
                                    $counter++;
                                }
                                ?>
                            </table>
                            <?php
                        }
                        if(isset($search_result['event']) && count($search_result['event'])){?>
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="6">Event Details</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Event Name</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Start time</th>                                    
                                </tr>
                                <?php
                                $counter = 1;
                                foreach($search_result['event'] as $event) { ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo $event->event_name; ?></td>
                                    <td><?php echo $event->event_desc; ?></td>
                                    <td><?php echo $event->event_location; ?></td>
                                    <td><?php echo date('F d, Y', strtotime($event->event_date)); ?></td>
                                    <td><?php echo date('h:i A', strtotime($event->event_date)); ?></td>
                                </tr>
                                <?php }
                                ?>
                            </table>
                        <?php }
                    }
                    if (!array_filter($search_result)) {
                        ?>
                        <h3>No data found!</h3>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>