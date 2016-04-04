<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Import</li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Import</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Import Data
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Download Sample Sheet
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body">
                                    <form id="importform" class="myimportform form-horizontal form-groups-bordered validate" role="form" method="post" action="" 
                                          enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Module</label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="module" name="module">
                                                    <option value="">Select</option>
                                                    <option value="admission_type">Admission Type</option>
                                                    <option value="course">Branch</option>
                                                    <option value="degree">Course</option>
                                                    <option value="batch">Batch</option>
                                                    <option value="event_manager">Event Manager</option>
                                                    <option value="exam_manager">Exam Manager</option>
                                                    <option value="exam_time_table">Exam Time Table</option>
                                                    <option value="fees_structure">Fees Structure</option>
                                                    <option value="subject">Subject</option>
                                                    <option value="student">Student</option>
                                                    <option value="exam_marks">Exam Marks</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group" id="degree_main" style="display: none;">
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
                                        <div class="form-group" id="course_main" style="display: none;">
                                            <label class="col-sm-3 control-label">Branch</label>

                                            <div class="col-sm-5">
                                                <select id="course" name="course" class="form-control">

                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group" id="batch_main" style="display: none;">
                                            <label class="col-sm-3 control-label">Batch</label>

                                            <div class="col-sm-5">
                                                <select id="batch" name="batch" class="form-control">

                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group" id="semester_main" style="display: none;">
                                            <label class="col-sm-3 control-label">Semester</label>
                                            <?php
                                            $semester = $this->db->get('semester')->result();
                                            ?>
                                            <div class="col-sm-5">
                                                <select id="semester" name="course" class="form-control">
                                                    <option value="">--- Select Semester ---</option>
                                                    <?php foreach ($semester as $row) { ?>
                                                        <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group" id="exam_main" style="display: none;">
                                            <label class="col-sm-3 control-label">Exam</label>

                                            <div class="col-sm-5">
                                                <select id="exam" name="exam" class="form-control">

                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File</label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="userfile" id="userfile"/>
                                            </div>
                                        </div>
                                        <input id="exam_post_details" type="hidden" name="exam_detail"/>
                                        <input id="sem_post_details" type="hidden" name="sem_detail"/>
                                        <input id="course_post_details" type="hidden" name="course_detail"/>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <a style="display: none;" id="show_download" class="btn btn-warning">Download Sample File</a>
                                                <button type="submit" class="btn btn-info">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">   
                                    <br/>                                    
                                    <h4>Download Demo sheet</h4>
                                    <br/>
                                    <ul>                                        
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/course'); ?>">Branch</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/degree'); ?>">Course</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/admission_type'); ?>">Admission Type</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/batch'); ?>">Batch</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/event_manager'); ?>">Event Manager</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/exam_manager'); ?>">Exam Manager</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/exam_time_table'); ?>">Exam Time Table</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/fees_structure'); ?>">Fees Structure</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/subject'); ?>">Subject</a></li>
                                        <li><a href="<?php echo base_url('index.php?admin/download_import/student') ?>">Student</a></li>
                                    </ul>
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
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
        $("#importform").validate({
            rules: {
                userfile: "required",
                module: "required"
            },
            messages: {
                userfile: "Please select file",
                module: "Please select module"
            }
        });
    });
</script>

<script>
    function get_exam_list(course_id, semester_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_exam_list/' + course_id + '/' + semester_id,
            type: 'get',
            success: function (content) {
                console.log(content);
                $('#exam').html(content);
            }
        });
    }
    $(document).ready(function () {
        $('#module').on('change', function () {
            var import_type = $(this).val();

            if (import_type == 'exam_marks' || import_type == 'exam_time_table') {
                $('#degree_main').css('display', 'block');
                $('#course_main').css('display', 'block');
                $('#batch_main').css('display', 'block');
                $('#semester_main').css('display', 'block');
                $('#exam_main').css('display', 'block');

            } else {
                $('#degree_main').css('display', 'none');
                $('#course_main').css('display', 'none');
                $('#batch_main').css('display', 'none');
                $('#semester_main').css('display', 'none');
                $('#exam_main').css('display', 'none');
                //$('#show_download').css('display', 'none');
            }
        });

        $('#course').on('change', function () {
            var course_id = $(this).val();
            var semester_id = $('#semester').val();
            get_exam_list(course_id, semester_id);
            $('#course_post_details').val(course_id);
        })
        $('#semester').on('change', function () {
            var semester_id = $(this).val();
            var course_id = $('#course').val();
            get_exam_list(course_id, semester_id);
            $('#sem_post_details').val(semester_id);
        });

        $('#exam').on('change', function () {
            var exam_id = $(this).val();
            if (exam_id > 0)
                $('#show_download').css('display', 'inline');
            else
                $('#show_download').css('display', 'none');

            var module_name = $('#module').val();
            if (module_name == 'exam_time_table') {
                $('#show_download').css('display', 'none');
            }
            $('#exam_post_details').val(exam_id);
        });

        $('#show_download').on('click', function () {
            var exam_id = $('#exam').val();
            location.href = '<?php echo base_url(); ?>index.php?admin/download_marks_csv_sample/' + exam_id;
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