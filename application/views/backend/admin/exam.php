<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Exam Management</li>
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
                    <h1><?php echo $page_title; ?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Exam List
                                </a></li>
                            <li>
                                <a href="#add" id="add_exam" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Exam
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
                                                <th>Exam Name</th>
                                                <th>Type</th>
                                                <th>Degree</th>
                                                <th>Course</th>
                                                <th>Batch</th>
                                                <th>Semester</th>
                                                <th>Center</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 0;
                                            foreach ($exams as $row) {
                                                $counter++;
                                                $cenlist=array();
                                                ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row->em_name; ?></td>
                                                <td><?php echo $row->exam_type_name; ?></td>
                                                <td><?php echo $row->d_name; ?></td>
                                                <td><?php echo $row->c_name; ?></td>
                                                <td><?php echo $row->b_name; ?></td>
                                                <td><?php echo $row->s_name; ?></td>
                                                <td><?php 
                                                    $this->db->get('center_user')->result();
                                                    $centerexplode=explode(',',$row->center_id);
                                                    foreach($centerexplode as $cen)
                                                    {
                                                        $cenlist[]=$this->db->get_where('center_user',array('center_id'=>$cen))->result();
                                                            
                                                    }
                                                    foreach ($cenlist as $cc)
                                                    {
                                                       foreach ($cc as $c)
                                                        {      
                                                            echo $c->center_name."<br>"; 
                                                        }
                                                    }
                                                        
                                                    ?></td>
                                                <td><?php echo date('F d, Y', strtotime($row->em_date)); ?></td>
                                                <td class="menu-action">
                                                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_exam/<?php echo $row->em_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
                                                        
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/exam/delete/<?php echo $row->em_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->
                                
                                
                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">                	
                                    <?php echo form_open(base_url() . 'index.php?admin/exam/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'examform', 'target' => '_top')); ?>
                                    <div class="padded">
									<?php
                                        $validation_error = validation_errors();
                                        if ($validation_error != '') {
                                            ?>
                                            <div class="alert alert-danger">
                                                <button class="close" data-dismiss="alert">&times;</button>
                                                <?php echo $validation_error; ?>
                                            </div>
                                            <script>
                                                $(document).ready(function () {
                                                    $('#add_exam').click();
                                                });
                                            </script>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Exam Name</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="exam_name" id="exam_name"
                                                       value="<?php echo set_value('exam_name'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Exam Type</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="exam_type" id="exam_type">
                                                    <?php
                                                    $exam_type_id = set_value('exam_type');
                                                    ?>
                                                    <option value="">Select</option>
                                                    <?php foreach ($exam_type as $row) { ?>
                                                        <option value="<?php echo $row->exam_type_id; ?>"
                                                                <?php if ($row->exam_type_id == $exam_type_id) echo 'selected'; ?>><?php echo $row->exam_type_name; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Total Marks</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="total_marks" id="total_marks"
                                                       value="<?php echo set_value('total_marks'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Passing Marks</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="passing_marks" id="passing_marks"/>
                                            </div>
                                        </div>
                                            <div class="form-group" style="display: none;">
                                            <label class="col-sm-3 control-label">Year</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="year" id="year">
                                                    <?php
                                                    $year = set_value('year');
                                                    ?>
                                                    <?php for ($i = 2016; $i >= 2010; $i--) { ?>
                                                        <option value="<?php echo $i; ?>"
                                                                <?php if ($year == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Degree</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="degree" id="degree">
                                                    <option value="">Select</option>
                                                    <?php foreach ($degree as $row) { ?>
                                                        <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Course</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="course" id="course">

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
                                                <select class="form-control" name="semester" id="semester">
                                                    <?php
                                                    $semester_select_id = set_value('semester');
                                                    ?>
                                                    <option value="">Select</option>
                                                    <?php foreach ($semester as $row) { ?>
                                                        <option value="<?php echo $row->s_id; ?>"
                                                                <?php if ($row->s_id == $semester_select_id) echo 'selected'; ?>><?php echo $row->s_name; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Center</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="center[]" id="center" multiple>
                                                    <option value="">Select</option>
                                                    <?php foreach ($centerlist as $row) { ?>
                                                    <option value="<?php echo $row->center_id; ?>"><?php echo $row->center_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="status" id="status">
                                                    <?php
                                                    $status_select_id = set_value('status');
                                                    ?>
                                                    <option value="">Select</option>
                                                    <option value="1" <?php if ($status_select_id == '1') echo 'selected'; ?>>Active</option>
                                                    <option value="0" <?php if ($status_select_id == '0') echo 'selected'; ?>>In-active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date</label>
                                            <div class="col-sm-5">
                                                <input type="text" name="date" id="date" class="form-control datepicker-normal"
                                                       value="<?php echo set_value('date'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Start Date/Time</label>
                                            <div class="col-sm-5">
                                                <input type="datetime-local" name="start_date_time" id="start_date_time" class="form-control"
                                                       value="<?php echo set_value('start_date_time'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">End Date/Time</label>
                                            <div class="col-sm-5">
                                                <input type="datetime-local" name="end_date_time" id="end_date_time" class="form-control"
                                                       value="<?php echo set_value('end_date_time'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Exam</button>
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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
                                            $.validator.setDefaults({
                                                submitHandler: function (form) {
                                                    form.submit();
                                                }
                                            });

                                            $().ready(function () {
                                                $("#examform").validate({
                                                    rules: {
                                                        exam_name: "required",
                                                        exam_type: "required",
                                                        year: "required",
                                                        degree: "required",
                                                        course: "required",
                                                        batch: "required",
                                                        semester: "required",
                                                        total_marks: "required",
                                                        passing_marks: "required",
                                                        status: "required",
                                                        date: "required",
                                                        start_date_time: "required",
                                                        end_date_time: "required",
                                                        total_marks: "required"
                                                    },
                                                    messages: {
                                                        exam_name: "Please enter Exam Name",
                                                        exam_type: "Please select Exam type",
                                                        year: "Please select year",
                                                        degree: "Please select degree",
                                                        course: "Please select course",
                                                        batch: "Please select batch",
                                                        semester: "Please select semester",
                                                        total_marks: "Please enter total marks",
                                                        passing_marks: "Please enter passing marks",
                                                        status: "Please select status",
                                                        date: "Please enter date",
                                                        start_date_time: "Please enter start date time",
                                                        end_date_time: "Please enter end date time",
                                                        total_marks: "Please enter total marks"
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