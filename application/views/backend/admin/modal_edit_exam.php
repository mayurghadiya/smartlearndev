<?php
$edit_data = $this->db->select('exam_manager.*, exam_type.*, course.*, semester.*')
        ->from('exam_manager')
        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
        ->join('course', 'course.course_id = exam_manager.course_id')
        ->join('semester', 'semester.s_id = exam_manager.em_semester')
        ->where('exam_manager.em_id', $param2)
        ->get()
        ->row();

$exam_type = $this->db->get('exam_type')->result();
$degree = $this->db->get('degree')->result();
$query = "SELECT * FROM batch ";
$query .= "WHERE FIND_IN_SET($edit_data->degree_id, degree_id) ";
$query .= "AND FIND_IN_SET($edit_data->course_id, course_id)";
$batch = $this->db->query($query)->result();
$course = $this->db->get('course')->result();
$semester = $this->db->get('semester')->result();
$centerlist = $this->db->get('center_user')->result();
?>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Exam
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                        <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div> 
                        <?php echo form_open(base_url() . 'index.php?admin/exam/do_update/' . $edit_data->em_id, array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'edit-exam-form', 'target' => '_top')); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Exam Name<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="exam_name" id="exam_name"
                                       value="<?php echo $edit_data->em_name; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Exam Type<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" name="exam_type" id="exam_type" required="">
                                    <option value="">Select</option>
                                    <?php foreach ($exam_type as $row) { ?>
                                        <option value="<?php echo $row->exam_type_id; ?>"
                                                <?php if ($edit_data->em_type == $row->exam_type_id) echo 'selected'; ?>><?php echo $row->exam_type_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Total Marks<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" required="" name="total_marks" id="edit_total_marks" value="<?php echo $edit_data->total_marks; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Passing Marks<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" required="" name="passing_marks" id="edit_passing_marks" value="<?php echo $edit_data->passing_mark; ?>"/>
                            </div>
                        </div>
                        <div class="form-group" style="display: none">
                            <label class="col-sm-3 control-label">Year</label>
                            <div class="col-sm-7">
                                <select class="form-control" required="" name="year" id="year">

                                    <?php for ($i = 2016; $i >= 2010; $i--) { ?>
                                        <option <?php echo $i; ?>
                                            <?php if ($edit_data->em_year == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Course<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" required="" name="degree" id="edit_degree">
                                    <option>Select</option>
                                    <?php foreach ($degree as $d) { ?>
                                        <option value="<?php echo $d->d_id; ?>"
                                                <?php if ($d->d_id == $edit_data->degree_id) echo 'selected'; ?>><?php echo $d->d_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Branch<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" required="" name="course" id="edit_course">
                                    <option value="">Select</option>
                                    <?php foreach ($course as $row) { ?>
                                        <option value="<?php echo $row->course_id; ?>"
                                                <?php if ($edit_data->course_id == $row->course_id) echo 'selected'; ?>><?php echo $row->c_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" required="" name="batch" id="edit_batch">
                                    <option value="">Select</option>
                                    <?php foreach ($batch as $b) { ?>
                                        <option value="<?php echo $b->b_id; ?>"
                                                <?php if ($b->b_id == $edit_data->batch_id) echo 'selected'; ?>><?php echo $b->b_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" required="" name="semester" id="edit_semester">
                                    <option value="">Select</option>
                                    <?php foreach ($semester as $s) { ?>
                                        <option value="<?php echo $s->s_id; ?>"
                                                <?php if ($s->s_id == $edit_data->em_semester) echo 'selected'; ?>><?php echo $s->s_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" required="" name="status" id="status">
                                    <option value="">Select</option>
                                    <option value="1"
                                            <?php if ($edit_data->em_status == 1) echo 'selected'; ?>>Active</option>
                                    <option value="0"
                                            <?php if ($edit_data->em_status == 0) echo 'selected'; ?>>In-active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Start Date<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required="" id="datepicker-date123" name="date" class="form-control datepicker-normal-edit"
                                       value="<?php echo $edit_data->em_date; ?>"/>
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label class="col-sm-3 control-label">Start Date<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" name="start_date_time" id="edit_start_date_time" class="form-control"
                                       value="<?php echo $edit_data->em_start_time; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">End Date<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" required="" name="end_date_time" id="edit_end_date_time" class="form-control"
                                       value="<?php echo $edit_data->em_end_time; ?>"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="submit btn btn-info">Edit</button>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>

<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
        $("#edit-exam-form").validate({
            rules: {
                exam_name: "required",
                exam_type: "required",
                year: "required",
                degree: "required",
                course: "required",
                batch: "required",
                semester: "required",
                edit_total_marks: "required",
                edit_passing_marks: "required",
                status: "required",
                date: "required",
                start_date_time: "required",
                end_date_time: "required"
            },
            messages: {
                exam_name: "Please enter Exam Name",
                exam_type: "Please select Exam type",
                year: "Please select year",
                degree: "Please select degree",
                course: "Please select course",
                batch: "Please select batch",
                semester: "Please select semester",
                edit_total_marks: "Please enter total marks",
                edit_passing_marks: "Please enter passing marks",
                status: "Please select status",
                date: "Please enter date",
                start_date_time: "Please enter start date time",
                end_date_time: "Please enter end date time"
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {

        $(".datepicker-normal-edit").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            onClose: function (selectedDate) {
                $("#edit_end_date_time").datepicker("option", "minDate", selectedDate);
            }

        });
        $("#edit_end_date_time").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            minDate: new Date(),
            onClose: function (selectedDate) {
                //$(".datepicker-normal-edit").datepicker("option", "maxDate", selectedDate);
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

<script>
    $(document).ready(function () {
        $('#edit_total_marks').on('blur', function () {
            var total_marks = $(this).val();
            $('#edit_passing_marks').attr('max', total_marks);
        });

        $('#edit_passing_marks').on('focus', function () {
            var total_marks = $('#edit_total_marks').val();
            $(this).attr('max', total_marks);
        })
    })
</script>

<script>
    $(document).ready(function () {
        $('#datepicker-date123').on('change', function () {
            $('#edit_start_date_time').val($(this).val());
        })
    })
</script>
