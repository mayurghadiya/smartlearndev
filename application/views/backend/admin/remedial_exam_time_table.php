<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_head-section clearfix">
                    <div class="vd_panel-header">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("Home");?></a> </li>
                            <li><?php echo ucwords("examinations");?></li>
                            <li class="active"><?php echo ucwords("Remedial Exam Schedule");?></li>
                        </ul>                  
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Remedial Exam Schedule");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Remedial Exam Schedule List");?>
                                </a></li>
                            <li>
                                <a id="add_time_table" href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add Remedial Exam Schedule");?>
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("Course");?></th>
                                                <th><?php echo ucwords("Branch");?></th>
                                                <th><?php echo ucwords("Batch");?></th>
                                                <th><?php echo ucwords("Semester");?></th>
                                                <th><?php echo ucwords("Exam");?></th>
                                                <th><?php echo ucwords("Subject");?></th>
                                                <th><?php echo ucwords("Date");?></th>
                                                <th><?php echo ucwords("Time");?></th>
                                                <th><?php echo ucwords("Action");?></th>
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
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">  
                                    <div class="">
                                        <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                                    </div>                                     
                                    <?php echo form_open(base_url() . 'index.php?admin/exam_time_table/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'exam_time_table_form', 'target' => '_top')); ?>
                                    <br/>
                                    <div class="padded">
                                        <?php
                                        $validation_error = validation_errors();
                                        if ($validation_error != '') {
                                            ?>
                                            <div class="alert alert-danger">
                                                <button class="close" data-dismiss="alert">&times;</button>
                                                <p><?php echo $validation_error; ?></p>
                                            </div>                                            
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Course");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach ($degree as $row) { ?>
                                                        <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course" class="form-control">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="batch" id="batch">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="semester" name="semester">
                                                    <option value="">Select</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Exam");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="exam" name="exam">

                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Subject");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="subject" name="subject">

                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input readonly="" type="text" id="exam_date" class="form-control datepicker-normal" name="exam_date"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Start Time");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="time" id="start_time" class="form-control timepicker" name="start_time"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("End Time");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="time" id="end_time" class="form-control timepicker" name="end_time"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add");?></button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <?php if ($validation_error != '') { ?> 
        <script>
                                                            $(document).ready(function () {
                                                                $('#add_time_table').click();
                                                            });
        </script>
    <?php } ?>

    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>

    <script type="text/javascript">
                                                        $.validator.setDefaults({
                                                            submitHandler: function (form) {
                                                                form.submit();
                                                            }
                                                        });

                                                        $().ready(function () {
                                                            $("#exam_time_table_form").validate({
                                                                rules: {
                                                                    degree: "required",
                                                                    course: "required",
                                                                    batch: "required",
                                                                    semester: "required",
                                                                    exam: "required",
                                                                    subject: "required",
                                                                    exam_date: "required",
                                                                    start_time: "required",
                                                                    end_time: "required"
                                                                },
                                                                messages: {
                                                                    degree: "Please select course",
                                                                    course: "Please select branch",
                                                                    batch: "Please select batch",
                                                                    semester: "Please select semester",
                                                                    exam: "Please select exam",
                                                                    subject: "Please select subject",
                                                                    exam_date: "Please enter date",
                                                                    start_time: "Please enter start time",
                                                                    end_time: "Please enter end time"
                                                                }
                                                            });
                                                        });
    </script>


    <script type="text/javascript">
        $(window).load(function ()
        {
            "use strict";
            $(".datepicker-normal").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                minDate: new Date()

            });
        });

    </script>

    <script>
        $(document).ready(function () {
            //course by degree
            $('#degree').on('change', function () {
                var course_id = $('#course').val();
                var degree_id = $(this).val();
                var batch_id = $('#batch').val();
                var semester = $('#semester').val();

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
                exam_list_from_degree_and_course(degree_id, course_id, batch_id, semester);
                subject_list(course_id, semester);
            });

            //batch from course and degree
            $('#course').on('change', function () {
                var degree_id = $('#degree').val();
                var course_id = $(this).val();
                var batch_id = $('#batch').val();
                var semester = $('#semester').val();
                batch_from_degree_and_course(degree_id, course_id);
                exam_list_from_degree_and_course(degree_id, course_id, batch_id, semester);
                subject_list(course_id, semester);
                get_semester_from_branch(course_id);
            })

            //exam list from degree, course, batch, and sem
            $('#batch').on('change', function () {
                var degree = $('#degree').val();
                var course = $('#course').val();
                var batch = $(this).val();
                var semester = $('#semester').val();
                exam_list_from_degree_and_course(degree, course, batch, semester);
                subject_list(course, semester);
            })

            $('#semester').on('change', function () {
                var degree = $('#degree').val();
                var course = $('#course').val();
                var batch = $('#batch').val();
                var semester = $(this).val();
                exam_list_from_degree_and_course(degree, course, batch, semester);
                subject_list(course, semester);
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

            //exam list from degree and course
            function exam_list_from_degree_and_course(d_id, c_id, b_id, s_id) {
                $('#exam').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/get_exam_list_data/' + d_id + '/' + c_id + '/' + b_id + '/' + s_id + '/remedial',
                    type: 'get',
                    success: function (content) {
                        $('#exam').append('<option value="">Select</option>');
                        var exam_list = jQuery.parseJSON(content);
                        $.each(exam_list, function (key, value) {
                            $('#exam').append('<option value=' + value.em_id + '>' + value.em_name + '</option>');
                        })
                    }
                })
            }

            // subject list from course and semester
            function subject_list(course, semester) {
                $('#subject').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/subject_list_from_course_and_semester/' + course + '/' + semester,
                    type: 'get',
                    success: function (content) {
                        $('#subject').append('<option value="">Select</option>');
                        var subject = jQuery.parseJSON(content);
                        $.each(subject, function (key, value) {
                            $('#subject').append('<option value=' + value.sm_id + '>' + value.subject_name + '</option>');
                        })
                    }
                })
            }

            //get semester from brach
            function get_semester_from_branch(branch_id) {
                $('#semester').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/get_semesters_of_branch/' + branch_id,
                    type: 'get',
                    success: function (content) {
                        $('#semester').append('<option value="">Select</option>');
                        var semester = jQuery.parseJSON(content);
                        $.each(semester, function (key, value) {
                            $('#semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                        })
                    }
                })
            }
        })
    </script>
    <?php include('plus_icon.php'); ?>