<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
               <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Exam Marks</li>
                    </ul>                  
                </div>
            </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Exam Marks</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title" style="color:#000;">Enter Marks </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group col-sm-4 validating">
                                                <label>Course</label>
                                                <select id="degree" name="degree" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach ($degree as $row) { ?>
                                                        <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 validating">
                                                <label>Branch</label>
                                                <select id="course" name="course" class="form-control">

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 validating">
                                                <label>Batch</label>
                                                <select id="batch" name="batch" class="form-control">

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 validating">
                                                <label>Semester</label>
                                                <select id="semester" name="semester" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach ($semester as $row) { ?>
                                                        <option value="<?php echo $row->s_id; ?>"
                                                                <?php if ($row->s_id == $semester_id) echo 'selected'; ?>><?php echo $row->s_name; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4 validating">
                                                <label>Exam</label>
                                                <select id="exam" name="exam" class="form-control">
                                                    <option value="">--- Select Exam --- </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $show_exam_details = $this->db->select('exam_manager.*, exam_type.*, course.*, batch.*, semester.*, degree.*')
                                    ->from('exam_manager')
                                    ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                                    ->join('course', 'course.course_id = exam_manager.course_id')
                                    ->join('semester', 'semester.s_id = exam_manager.em_semester')
                                    ->join('degree', 'degree.d_id = exam_manager.degree_id')
                                    ->join('batch', 'batch.b_id = exam_manager.batch_id')
                                    ->where('exam_manager.em_id', $exam_id)
                                    ->get()
                                    ->row();
                            ?>

                            <?php if (count($show_exam_details)) { ?> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="panel-title">Exam Details</div>
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Exam Name</th>
                                                        <th>Total Marks</th>
                                                        <th>Passing Marks</th>
                                                        <th>Course</th>
                                                        <th>Branch</th>
                                                        <th>Batch</th>
                                                        <th>Semester</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $show_exam_details->em_name; ?></td>
                                                        <td><?php echo $show_exam_details->total_marks; ?></td>
                                                        <td><?php echo $show_exam_details->passing_mark; ?></td>
                                                        <td><?php echo $show_exam_details->d_name; ?></td>
                                                        <td><?php echo $show_exam_details->c_name; ?></td>
                                                        <td><?php echo $show_exam_details->b_name; ?></td>
                                                        <td><?php echo $show_exam_details->s_name; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="row">
                                <div id="gridview" class="col-sm-12">
                                    <div style="" id="entermarks" class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title" style="color:#000;">Enter Marks</h4>
                                        </div>
                                        <form class="form-horizontal" action="" method="post">
                                            <div class="table-responsive">
                                                <table data-filter="#filter" id="marklist" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">Student ID</th>
                                                            <th width="20%">Student Name</th>
                                                            <?php foreach ($subject_details as $subject) { ?>
                                                                <th>Sub: <?php echo $subject->subject_name; ?></th>
                                                            <?php } ?>
                                                            <th width="15%">Remarks</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <input type="hidden" name="total_student" value="<?php echo count($student_list); ?>"/>
                                                    <?php
                                                    $counter = 1;
                                                    ?>
                                                    <?php if (count($student_list)) { ?>
                                                        <?php foreach ($student_list as $student) { ?>
                                                            <tr>
                                                                <td><?php echo $student->std_id; ?></td>
                                                                <td data-id="63"><?php echo $student->std_first_name . ' ' . $student->std_last_name; ?></td>

                                                                <?php foreach ($subject_details as $subject) { ?>
                                                                    <?php
                                                                    $where = array(
                                                                        'mm_std_id' => $student->std_id,
                                                                        'mm_subject_id' => $subject->sm_id,
                                                                        'mm_exam_id' => $exam_detail[0]->em_id,
                                                                    );
                                                                    $marks = $this->Crud_model->student_exam_mark($where);
                                                                    ?>
                                                                    <td><input type="number" class="form-control" placeholder="Obtained Mark: <?php echo $exam_detail[0]->total_marks; ?>"
                                                                               min="0" max="<?php echo $exam_detail[0]->total_marks; ?>"
                                                                               name="mark_<?php echo $counter; ?>_<?php echo $student->std_id; ?>_<?php echo $exam_detail[0]->em_id; ?>_<?php echo $subject->sm_id; ?>"
                                                                               value="<?php if (count($marks)) echo $marks->mark_obtained; ?>"/></td>
                                                                    <?php } ?>

                                                                <td><input type="text" class="form-control" 
                                                                           value="<?php if (count($marks)) echo $marks->mm_remarks; ?>"
                                                                           name="remark_<?php echo $counter; ?>_<?php echo $student->std_id; ?>_<?php echo $exam_detail[0]->em_id; ?>"/></td>
                                                            </tr>
                                                            <?php
                                                            $counter++;
                                                        }
                                                        ?>

                                                        <?php
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="4">No data found</td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br/>
                                            <?php if (count($student_list)) { ?>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <div class="form_sep">
                                                            &nbsp;<input type="submit" class="btn btn-success" value="Submit"/> 
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </form>


                                    </div>
                                </div>
                            </div>

                        </div>							
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
            <script>
                function get_exam_list(course_id, semester_id, exam_id) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>index.php?admin/get_exam_list/' + course_id + '/' + semester_id + '/' + exam_id,
                        type: 'get',
                        success: function (content) {
                            $('#exam').html(content);
                        }
                    });
                }

                $(document).ready(function () {
                    var course_id = $('#course').val();
                    var semester_id = $('#semester').val();
                    var exam_id = '<?php echo $exam_id; ?>';
                    get_exam_list(course_id, semester_id, exam_id);

                    $('#course').on('click', function () {
                        var course_id = $(this).val();
                        var semester_id = $('#semester').val();
                        var exam_id = $('#exam').val();
                        get_exam_list(course_id, semester_id, exam_id);
                        //subject_list(course_id, semester_id);
                    })

                    $('#semester').on('click', function () {
                        var course_id = $('#course').val();
                        var semester_id = $(this).val();
                        var exam_id = $('#exam').val();
                        get_exam_list(course_id, semester_id, exam_id);
                        //subject_list(course_id, semester_id);
                    })

                    $('#exam').on('change', function () {
                        var course_id = $('#course').val();
                        var semester_id = $('#semester').val();
                        var exam_id = $(this).val();
                        location.href = '<?php echo base_url(); ?>index.php?admin/marks/' + course_id + '/' + semester_id + '/' + exam_id
                    })
                })
            </script>

            <script>
                $(document).ready(function () {
                    //course by degree
                    $('#degree').on('change', function () {
                        var course_id = $('#course').val();
                        var degree_id = $(this).val();

                        //remove all present element
                        $('#course').find('option').remove().end();
                        $('#course').append('<option value="">Select</option>');
                        var degree_id = $(this).val();
                        $.ajax({
                            url: '<?php echo base_url(); ?>index.php?admin/course_list_from_degree/' + degree_id,
                            type: 'get',
                            success: function (content) {
                                var course = jQuery.parseJSON(content);
                                $.each(course, function (key, value) {
                                    $('#course').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                                })
                            }
                        })
                        batch_from_degree_and_course(degree_id, course_id);
                    });

                    //batch from course and degree
                    $('#course').on('change', function () {
                        var degree_id = $('#degree').val();
                        var course_id = $(this).val();
                        batch_from_degree_and_course(degree_id, course_id);
                    })

                    //find batch from degree and course
                    function batch_from_degree_and_course(degree_id, course_id) {
                        //remove all element from batch
                        $('#batch').find('option').remove().end();
                        $.ajax({
                            url: '<?php echo base_url(); ?>index.php?admin/batch_list_from_degree_and_course/' + degree_id + '/' + course_id,
                            type: 'get',
                            success: function (content) {
                                $('#batch').append('<option value="">Select</option>');
                                var batch = jQuery.parseJSON(content);
                                console.log(batch);
                                $.each(batch, function (key, value) {
                                    $('#batch').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                                })
                            }
                        })
                    }

                })
            </script>