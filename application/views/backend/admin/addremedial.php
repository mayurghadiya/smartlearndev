<?php 
   
  ?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add remedial exam");?>
                    </div>
                </div>
                <div class="panel-body"> 

                     <div class="box-content">                                       
                                    <div class="">
                                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                    </div>                                     
                                    <?php echo form_open(base_url() . 'index.php?admin/remedial_exam/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'examform', 'target' => '_top')); ?>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("department");?><span style="color:red">*</span></label>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Exam Name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="exam_list" name="exam_list">

                                                </select>
                                                <input type="hidden" name="exam_name" id="exam_name" value=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Exam Type");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="exam_type" id="exam_type">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Total Marks");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="total_marks" id="total_marks"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Passing Marks");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="passing_marks" id="passing_marks"/>
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
                      </div>
            </div>
        </div>
</div>
 <script type="text/javascript">
                                            $.validator.setDefaults({
                                                submitHandler: function (form) {
                                                    form.submit();
                                                }
                                            });
                                            $().ready(function () {
                                                $("#examform").validate({
                                                    rules: {
                                                        exam_list: "required",
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
                                                        exam_list: "Please select exam",
                                                        exam_type: "Please select exam type",
                                                        year: "Please select year",
                                                        degree: "Please select department",
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
       $(document).ready(function () {         
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

            $('#total_marks').on('blur', function () {
                var total_marks = $(this).val();
                $('#passing_marks').attr('max', total_marks);
                $('#passing_marks').attr('required', '');
            });
            $('#passing_marks').on('focus', function () {
                var total_marks = $('#total_marks').val();
                $(this).attr('max', total_marks);
            });

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

            $('#date').on('change', function () {
                $('#start_date_time').val($(this).val());
            });

            $('#semester').on('change', function () {
                var course_id = $('#degree').val();
                var branch_id = $('#course').val();
                var batch_id = $('#batch').val();
                var semester_id = $('#semester').val();
                get_exam_list(course_id, branch_id, batch_id, semester_id);
            })

            //get exam list by course, branch, batch and semester
            function get_exam_list(course, branch, batch, semester) {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/get_exam_list_data/' + course + '/' + branch + '/' + batch + '/' + semester + '/reguler',
                    type: 'get',
                    success: function (content) {
                        $('#exam_list').find('option').remove().end();
                        var exam_list = jQuery.parseJSON(content);
                        $('#exam_list').append('<option value="">Select</option>');
                        $.each(exam_list, function (key, value) {
                            $('#exam_list').append('<option value=' + value.em_id + '>' + value.em_name + '</option>');
                        });
                    }
                });
            }

            //exam details
            function exam_details(exam_id) {
                //exam details
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/exam_details/' + exam_id,
                    type: 'get',
                    success: function (content) {
                        console.log(content);
                        var exam_details = jQuery.parseJSON(content);
                        $('#total_marks').val(exam_details[0].total_marks);
                        $('#passing_marks').val(exam_details[0].passing_mark);
                        exam_types(exam_details[0].em_type);
                    }
                });
            }

            //exam types
            function exam_types(exam_type_id) {
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/exam_types/' + exam_type_id,
                    type: 'get',
                    success: function (content) {
                        $('#exam_type').html(content);
                    }
                });
            }

            $('#exam_list').on('change', function () {
                var exam_id = $(this).val();
                var exam_name = $('option:selected', this).text();
                $('#exam_name').val(exam_name);
                exam_details(exam_id);
            });

        })
    </script>

