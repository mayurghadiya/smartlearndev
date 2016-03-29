<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Search Result </li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Search Result for "<?php echo isset($search_string) ? $search_string : ''; ?>"</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Search Result 
                                </a>
                            </li>                          
                        </ul>
                        <!------CONTROL TABS END------>
                        <br/>
                        <?php
                        if (isset($search_result)) {
                            if (isset($search_result['student']) && count($search_result['student'])) {
                                ?>
                                <table class="table table-bordered table-responsive">
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
                                        <td colspan="5"><strong>Course Details</strong></td>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Degree</th>
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
                                            <td><?php echo $course->d_name; ?></td>
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
                                        <th>#</th>
                                        <th>Degree Name</th>
                                        <th>Batch Name</th>                                        
                                    </tr>
                                    <?php
                                    $isseter = 1;
                                    foreach ($search_result['batch'] as $batch) {
                                        ?>
                                        <tr>
                                            <td><?php echo $isseter; ?></td>
                                            <td><?php echo $batch->d_name; ?></td>
                                            <td><?php echo $batch->b_name; ?></td>                                            
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
                                <br/>
                                <?php
                            }
                            if (isset($search_result['participate']) && count($search_result['participate'])) {
                                ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="9"><strong>Participate Details</strong></td>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Student Name</th>
                                        <th>Degree</th>
                                        <th>Course</th>
                                        <th>Batch</th>
                                        <th>Semester</th>
                                        <th>File</th>
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
                                            <td><?php echo $participate->d_name; ?></td>
                                            <td><?php echo $participate->b_name; ?></td>
                                            <td><?php echo $participate->c_name; ?></td>
                                            <td><?php echo $participate->s_name; ?></td>
                                            <td><?php echo $participate->pp_filename; ?></td>
                                        </tr>
                                        <?php
                                        $counter++;
                                    }
                                    ?>
                                </table>
                                <br/>
                                <?php
                            }
                            if (isset($search_result['degree']) && count($search_result['degree'])) {
                                ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2">Degree Details</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Degree Name</th>
                                    </tr>
                                    <?php
                                    $counter = 1;
                                    foreach ($search_result['degree'] as $de) {
                                        ?>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo $de->d_name; ?></td>
                                        </tr>
                                        <?php $counter++;
                                    }
                                    ?>
                                </table>
                                <br/>
                                <?php
                            }
                            if (isset($search_result['event']) && count($search_result['event'])) {
                                ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="4"></th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th width="20%">Event Name</th>
                                        <th>Event Description</th>
                                        <th width="15%">Event Date</th>
                                    </tr>
                                    <?php
                                    $counter = 1;
                                    foreach ($search_result['event'] as $event) {
                                        ?>
                                        <tr>
                                            <td><?php echo $counter; ?></td>
                                            <td><?php echo $event->event_name; ?></td>
                                            <td><?php echo $event->event_desc; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($event->event_date)); ?></td>
                                        </tr>
                                        <?php $counter++;
                                    }
                                    ?>
                                </table>
                                <br/>
                                <?php
                            }
                            if(isset($search_result['center']) && count($search_result['center'])) { ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="8">
                                            Exam Center Details
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Center Name</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>City</th>
                                        <th>Zip</th>
                                        <th>Address</th>
                                    </tr>
                                    <?php
                                    $counter = 1;
                                    foreach($search_result['center'] as $center) { ?>
                                    <tr>
                                        <td><?php echo $counter; ?></td>
                                        <td><?php echo $center->center_name; ?></td>
                                        <td><?php echo $center->name; ?></td>
                                        <td><?php echo $center->emailid; ?></td>
                                        <td><?php echo $center->contactno; ?></td>
                                        <td><?php echo $center->city; ?></td>
                                        <td><?php echo $center->zipcode; ?></td>
                                        <td><?php echo $center->address; ?></td>
                                    </tr>
                                    <?php $counter++; }
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
        <!-- row --> 
    </div>