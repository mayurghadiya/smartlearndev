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
                         <li><?php echo set_breadcrumb(); ?></li>
                    </ul>                  
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
                                    <?php echo ucwords("Exam List");?>
                                </a></li>
                            <li>
                                <a href="#add" id="add_exam" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add Exam");?>
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">                            
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">   
                                <br/>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Course");?></label>
                                    <select class="form-control filter-rows" id="filter3" data-filter="3" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Branch");?></label>
                                    <select id="filter4" name="branch" data-filter="4" class="form-control filter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Batch");?></label>
                                    <select id="filter5" name="batch" data-filter="5" class="form-control filter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> <?php echo ucwords("Semester");?></label>
                                    <select id="filter6" name="semester" data-filter="6" class="form-control filter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                                <div class="panel-body">
                                    <table class="table table-striped table-responsive" id="exam-data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("Exam Name");?></th>
                                                <th><?php echo ucwords("Course");?></th>
                                                <th width="14%"><?php echo ucwords("Branch");?></th>
                                                <th><?php echo ucwords("Batch");?></th>
                                                <th width="10%"><?php echo ucwords("Semester");?></th>
                                                <th width="10%"><?php echo ucwords("Date");?></th>
                                                <th><?php echo ucwords("Action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 0;
                                            foreach ($exams as $row) {
                                                $counter++;
                                                $cenlist = array();
                                                ?>
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><?php echo $row->em_name; ?></td>
                                                    <td><?php echo $row->d_name; ?></td>
                                                    <td><?php echo $row->c_name; ?></td>
                                                    <td><?php echo $row->b_name; ?></td>
                                                    <td><?php echo $row->s_name; ?></td>

                                                    <td><?php echo date('F d, Y', strtotime($row->em_date)); ?></td>
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_exam/<?php echo $row->em_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/exam/delete/<?php echo $row->em_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
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
                                    <div class="">
                                        <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                                    </div>                                     
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Exam Name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="exam_name" id="exam_name"
                                                       value="<?php echo set_value('exam_name'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Exam Type");?><span style="color:red">*</span></label>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Total Marks");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="total_marks" id="total_marks"
                                                       value="<?php echo set_value('total_marks'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Passing Marks");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="passing_marks" id="passing_marks"
                                                       value="<?php echo set_value('total_marks'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Year");?></label>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Course");?><span style="color:red">*</span></label>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="course" id="course">

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
                                                <select class="form-control" name="semester" id="semester">

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Status");?><span style="color:red">*</span></label>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Start Date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input readonly="" type="text" name="date" id="date" class="form-control datepicker-normal"
                                                       value="<?php echo set_value('date'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Start Date/Time");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input readonly="" type="text" name="start_date_time" id="start_date_time" class="form-control"
                                                       value="<?php echo set_value('start_date_time'); ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("End Date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input readonly="" type="text" name="end_date_time" id="end_date_time" class="form-control"
                                                       value="<?php echo set_value('end_date_time'); ?>"/>
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
                                                        passing_marks: {
                                                            required: true
                                                        },
                                                        status: "required",
                                                        date: "required",
                                                        start_date_time: "required",
                                                        end_date_time: "required"
                                                    },
                                                    messages: {
                                                        exam_name: "Please enter exam name",
                                                        exam_type: "Please select exam type",
                                                        year: "Please select year",
                                                        degree: "Please select course",
                                                        course: "Please select branch",
                                                        batch: "Please select batch",
                                                        semester: "Please select semester",
                                                        total_marks: "Please enter total marks",
                                                        passing_marks: {
                                                            required: "Please enter passing marks"
                                                        },
                                                        status: "Please select status",
                                                        date: "Please enter date",
                                                        start_date_time: "Please enter start date time",
                                                        end_date_time: "Please enter end date time"
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
                minDate: new Date(),
                onClose: function (selectedDate) {
                    $("#end_date_time").datepicker("option", "minDate", selectedDate);
                }
            });
            $("#end_date_time").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                minDate: new Date(),
                onClose: function (selectedDate) {
                    //$(".datepicker-normal").datepicker("option", "maxDate", new Date());
                }
            })
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
                get_semester_from_branch(course_id);
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

    <script>
        $(document).ready(function () {
            $('#total_marks').on('blur', function () {
                var total_marks = $(this).val();
                $('#passing_marks').attr('max', total_marks);
                $('#passing_marks').attr('required', '');
            });
            $('#passing_marks').on('focus', function () {
                var total_marks = $('#total_marks').val();
                $(this).attr('max', total_marks);
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#exam-data-tables').dataTable({
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.filter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#exam-data-tables').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #exam-data-tables_filter{
            margin-top: -50px;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('#date').on('change', function () {
                $('#start_date_time').val($(this).val());
            })
        })
    </script>
<?php include('plus_icon.php'); ?>