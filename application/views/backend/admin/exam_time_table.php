<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
    webshims.setOptions('waitReady', false);
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>
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
                        <li class="active">Time Table</li>
                    </ul>                  
                </div>
            </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Time Table</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Time Table List
                                </a></li>
                            <li>
                                <a id="add_time_table" href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Exam Time Table
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
                                                <th>Degree</th>
                                                <th>Course</th>
                                                <th>Batch</th>
                                                <th>Semester</th>
                                                <th>Exam</th>
                                                <th>Subject</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Action</th>
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

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/exam_time_table/delete/<?php echo $row->exam_time_table_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
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
                                            <label class="col-sm-3 control-label">Degree</label>
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
                                            <label class="col-sm-3 control-label">Course Name</label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course" class="form-control">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="batch" id="batch">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Semester</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="semester" name="semester">
                                                    <option value="">Select</option>
                                                    <?php foreach ($semester as $row) { ?>
                                                        <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Exam</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="exam" name="exam">

                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Subject</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="subject" name="subject">

                                                </select>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date</label>
                                            <div class="col-sm-5">
                                                <input type="text" id="exam_date" class="form-control datepicker-normal" name="exam_date"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Start Time</label>
                                            <div class="col-sm-5">
                                                <input type="time" id="start_time" class="form-control timepicker" name="start_time"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">End Time</label>
                                            <div class="col-sm-5">
                                                <input type="time" id="end_time" class="form-control timepicker" name="end_time"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Time Table</button>
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
                                                                    degree: "Please select degree",
                                                                    course: "Please select Course Name",
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
                changeYear: true

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
                    url: '<?php echo base_url(); ?>index.php?admin/exam_list_from_degree_and_course/' + d_id + '/' + c_id + '/' + b_id + '/' + s_id,
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
                    url: '<?php echo base_url(); ?>index.php?admin/subject_list_from_course_and_semester/'+course+'/'+semester,
                    type: 'get',
                    success: function (content) {
                        $('#subject').append('<option value="">Select</option>');
                        var subject = jQuery.parseJSON(content);
                        $.each(subject, function (key, value) {
                            $('#subject').append('<option value='+value.sm_id+'>'+value.subject_name+'</option>');
                        })
                    }
                })
            }
        })
    </script>