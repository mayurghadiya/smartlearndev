<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo ucwords("home");?></a> </li>
                        <li><a href="#"><?php echo ucwords("Pages");?></a> </li>
                        <li class="active"><?php echo ucwords("Export");?></li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Export");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Export Data");?>
                                </a></li>

                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">
                                <div class="box-content"> 
                                     <div class="">
                                    <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                                </div>              
                                    <form id="exportform" class="form-horizontal validate" action="#" method="post">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Module<?php echo ucwords("home");?> <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="export_module" class="form-control" name="module_name" required="">
                                                    <option value="">Select</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/exam_manager'); ?>">Exam Manager</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/event_manager'); ?>">Event Manager</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/course'); ?>">Branch</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/degree'); ?>">Course</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/semester'); ?>">Semester</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/student'); ?>">Student</option>
                                                    <option value="exam_marks">Exam Marks</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/system_setting'); ?>">System Settings</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/project_manager'); ?>">Project Manager</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/admission_type'); ?>">Admission Type</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/batch'); ?>">Batch</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/fees_structure'); ?>">Fees Structure</option>
                                                    <option value="<?php echo base_url('index.php?admin/export_csv/subject'); ?>">Subject</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div id="main_degree" style="display: none;" class="form-group">
                                            <label class="col-sm-3 control-label">Course</label>
                                            <div class="col-sm-5">
                                                <select id="degree" name="degree" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach ($degree as $row) { ?>
                                                        <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="main_course" style="display: none;" class="form-group">
                                            <label class="col-sm-3 control-label">Branch</label>
                                            <div class="col-sm-5">
                                                <select id="course" name="course" class="form-control">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div id="main_batch" style="display: none;" class="form-group">
                                            <label class="col-sm-3 control-label">Batch</label>
                                            <div class="col-sm-5">
                                                <select id="batch" name="batch" class="form-control">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div id="main_semester" style="display: none;" class="form-group">
                                            <label class="col-sm-3 control-label">Semester</label>
                                            <div class="col-sm-5">
                                                <select id="semester" name="semester" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php
                                                    foreach($semester as $row) { ?>
                                                    <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="main_exam" style="display: none;" class="form-group">
                                            <label class="col-sm-3 control-label">Exam</label>
                                            <div class="col-sm-5">
                                                <select id="exam" name="exam" class="form-control">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button id="export" type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("export");?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  
                            </div>
                            <!----TABLE LISTING ENDS--->

                        </div>
                    </div>
                </div>
            </div>
        </div>              
    </div>
    <!-- row --> 
</div>

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>

<script>
    var custom_link = '';
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit;
        }
    });
    $().ready(function () {
        $("#exportform").validate({
            rules: {
                export_module: "required"
            },
            messages: {
                export_module: "Please enter export module",
            }
        });
    });
    $('#export_module').on('change', function () {
        var module_name = $(this).val();
        if (module_name == 'exam_marks') {
            required_details();
            show_exam_details();
        } else {
            remove_required_details();
            hide_exam_details();
        }
    });

    $('#export').on('click', function () {
        //alert(1);return false;
        var module_name = $('#export_module').val();
        if (module_name != '') {
            if (module_name == 'exam_marks') {
                //show_exam_details();
                var exam_value = $('#exam').val();
                location.href = '<?php echo base_url(); ?>index.php?admin/export_csv/exam_marks/' + exam_value;
            } else {
                location.href = module_name;
            }
        }

    })
    $('form').on('submit', function () {
        return false;
    });

    function hide_exam_details() {
        $('#main_degree').css('display', 'none');
        $('#main_course').css('display', 'none');
        $('#main_batch').css('display', 'none');
        $('#main_semester').css('display', 'none');
        $('#main_exam').css('display', 'none');
    }
    function show_exam_details() {
        $('#main_degree').css('display', 'block');
        $('#main_course').css('display', 'block');
        $('#main_batch').css('display', 'block');
        $('#main_semester').css('display', 'block');
        $('#main_exam').css('display', 'block');
    }
    function required_details() {
        $('#degree').attr('required', 'required');
        $('#course').attr('required', 'required');
        $('#batch').attr('required', 'required');
        $('#semester').attr('required', 'required');
        $('#exam').attr('required', 'required');
    }

    function remove_required_details() {
        $('#course').removeAttr('required');
        $('#semester').removeAttr('required');
        $('#exam').removeAttr('required');
    }
</script>

<script>
    function get_exam_list(course_id, semester_id, exam_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_exam_list/' + course_id + '/' + semester_id,
            type: 'get',
            success: function (content) {
                $('#exam').html(content);
            }
        });
    }

    $(document).ready(function () {
        var course_id = $('#course').val();
        var semester_id = $('#semester').val();
        get_exam_list(course_id, semester_id);

        $('#course').on('change', function () {
            var course_id = $(this).val();
            var semester_id = $('#semester').val();
            get_exam_list(course_id, semester_id);
            //subject_list(course_id, semester_id);
        })

        $('#semester').on('change', function () {
            var course_id = $('#course').val();
            var semester_id = $(this).val();
            var exam_id = $('#exam').val();
            get_exam_list(course_id, semester_id, exam_id);
            //subject_list(course_id, semester_id);
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