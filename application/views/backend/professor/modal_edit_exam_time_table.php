<?php
$edit_data = $this->db->select()
        ->from('exam_time_table')
        ->join('exam_manager', 'exam_manager.em_id = exam_time_table.exam_id')
        ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
        ->join('course', 'course.course_id = exam_manager.course_id')
        ->join('semester', 'semester.s_id = exam_manager.em_semester')
        ->where('exam_time_table.exam_time_table_id', $param2)
        ->get()
        ->row();

$exam_type = $this->db->get('exam_type')->result();
$department = $this->session->userdata('department');
$this->db->where('d_id',$department);
$degree = $this->db->get('degree')->result();
$course = $this->db->get_where('course', array(
    'degree_id' => $edit_data->degree_id
))->result();
$query = "SELECT * FROM batch ";
$query .= "WHERE FIND_IN_SET($edit_data->degree_id, degree_id) ";
$query .= "AND FIND_IN_SET($edit_data->course_id, course_id)";
$batch = $this->db->query($query)->result();
$semester = explode(',',$edit_data->semester_id);
$this->db->where_in('s_id', $semester);
$semester = $this->db->get('semester')->result();
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ucwords("Update Exam Schedule");?>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                        <div class="">
                            <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                        </div> 
                        <?php echo form_open(base_url() . 'index.php?professor/exam_time_table/update/' . $edit_data->exam_time_table_id, array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'edit-exam-time-table', 'target' => '_top')); ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Course");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select name="degree" id="edit_degree" class="form-control" required="">
                                    <option value="">Select</option>
                                    <?php foreach ($degree as $d) { ?>
                                        <option value="<?php echo $d->d_id; ?>"
                                                <?php if ($d->d_id == $edit_data->degree_id) echo 'selected'; ?>><?php echo $d->d_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>                  
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select name="course" id="edit_course" class="form-control" required="">
                                    <option value="">Select</option>
                                    <?php foreach ($course as $c) { ?>
                                        <option value="<?php echo $c->course_id; ?>"
                                                <?php if ($c->course_id == $edit_data->course_id) echo 'selected'; ?>><?php echo $c->c_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select name="batch" id="edit_batch" class="form-control" required="">
                                    <option value="">Select</option>
                                    <?php foreach ($batch as $b) { ?>
                                        <option value="<?php echo $b->b_id; ?>" 
                                                <?php if ($b->b_id == $edit_data->batch_id) echo 'selected'; ?>><?php echo $b->b_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>                 
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="edit_semester" name="semester" required="">
                                    <option value="">Select</option>
                                    <?php foreach ($semester as $row) { ?>
                                        <option value="<?php echo $row->s_id; ?>"
                                                <?php if ($edit_data->s_id == $row->s_id) echo 'selected'; ?>><?php echo $row->s_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>
                        </div>                   
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Exam");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="edit_exam" name="exam" required="">
                                    <option value="">Select</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Subject");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="edit_subject" name="subject" required="">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Date");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input readonly="" type="text" required=""  name="exam_date" class="form-control datepicker-normal-edit"
                                       value="<?php echo $edit_data->em_date; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Start Time");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="time" id="start_time" class="form-control" name="start_time"
                                       value="<?php echo $edit_data->exam_start_time; ?>" required=""/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("End Time");?><span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="time" id="end_time" class="form-control" name="end_time"
                                       value="<?php echo $edit_data->exam_end_time ?>" required=""/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update");?></button>
                            </div>
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
        $("#edit-exam-time-table").validate({
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
    $(function () {

        $(".datepicker-normal-edit").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true

        });
    });
</script>

<script>
    var time_table_exam_id = '<?php echo $edit_data->exam_id; ?>';
    var subject_id = '<?php echo $edit_data->subject_id; ?>';
    
    function get_exam_list(degree_id,course_id,batch_id, semester_id,time_table_exam_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?professor/get_exam_list/' + degree_id + '/' + course_id + '/' + batch_id+ '/' + semester_id+'/'+time_table_exam_id,
            type: 'get',
            success: function (content) {
               // alert('final');
                $('#edit_exam').html(content);
            }
        });
    }

    function subject_list(course_id, semester_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?professor/subject_list/' + course_id + '/' + semester_id + '/' + subject_id,
            type: 'get',
            success: function (content) {
                $('#edit_subject').html(content);
            }
        })
    }

    $(document).ready(function () {
        var course_id = $('#edit_course').val();
        var semester_id = $('#edit_semester').val();
        var batch_id = $('#edit_batch').val();
        var degree_id = $('#edit_degree').val();
        
        get_exam_list(degree_id,course_id,batch_id, semester_id, time_table_exam_id);
      
        subject_list(course_id, semester_id, subject_id);

        $('#edit_course').on('click', function () {
            var course_id = $(this).val();
            var semester_id = $('#edit_semester').val();
            get_exam_list(course_id, semester_id, time_table_exam_id);
            subject_list(course_id, semester_id, subject_id);
        })

       
    })
</script>

<script>
    $(document).ready(function () {
        //course by degree
        $('#edit_degree').on('change', function () {
            var course_id = $('#edit_course').val();
            var degree_id = $(this).val();

            //remove all present element
            $('#edit_course').find('option').remove().end();
            $('#edit_course').append('<option value="">Select</option>');
            var degree_id = $(this).val();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?professor/course_list_from_degree/' + degree_id,
                type: 'get',
                success: function (content) {
                    var course = jQuery.parseJSON(content);
                    $.each(course, function (key, value) {
                        $('#edit_course').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                    })
                }
            })
            batch_from_degree_and_course(degree_id, course_id);
        });

        //batch from course and degree
        $('#edit_course').on('change', function () {
            var degree_id = $('#edit_degree').val();
            var course_id = $(this).val();
            batch_from_degree_and_course(degree_id, course_id);
            get_semester_from_branch(course_id);
        })

        //find batch from degree and course
        function batch_from_degree_and_course(degree_id, course_id) {
            //remove all element from batch
            $('#edit_batch').find('option').remove().end();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?professor/batch_list_from_degree_and_course/' + degree_id + '/' + course_id,
                type: 'get',
                success: function (content) {
                    $('#edit_batch').append('<option value="">Select</option>');
                    var batch = jQuery.parseJSON(content);
                    console.log(batch);
                    $.each(batch, function (key, value) {
                        $('#edit_batch').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                    })
                }
            })
        }

        //get semester from brach
        function get_semester_from_branch(branch_id) {
            $('#edit_semester').find('option').remove().end();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?professor/get_semesters_of_branch/' + branch_id,
                type: 'get',
                success: function (content) {
                    $('#edit_semester').append('<option value="">Select</option>');
                    var semester = jQuery.parseJSON(content);
                    $.each(semester, function (key, value) {
                        $('#edit_semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                    })
                }
            })
        }
        $('#edit_semester').on('change', function () {
                var degree = $('#edit_degree').val();
                var course = $('#edit_course').val();
                var batch = $('#edit_batch').val();
                var semester = $(this).val();
               // alert(degree+" "+course+" "+batch+" "+semester+" "+time_table_exam_id);
                get_exam_list(degree, course, batch, semester,time_table_exam_id);
                subject_list(course, semester);
            });
        function exam_list_from_degree_and_course(d_id, c_id, b_id, s_id) {
                $('#edit_exam').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?professor/exam_list_from_degree_and_course/' + d_id + '/' + c_id + '/' + b_id + '/' + s_id + '/reguler',
                    type: 'get',
                    success: function (content) {
                        $('#edit_exam').append('<option value="">Select</option>');
                        var exam_list = jQuery.parseJSON(content);
                        $.each(exam_list, function (key, value) {
                            $('#edit_exam').append('<option value=' + value.em_id + '>' + value.em_name + '</option>');
                        })
                    }
                })
            }
                 function subject_list(course, semester) {
                $('#edit_subject').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?professor/subject_list_from_course_and_semester/' + course + '/' + semester,
                    type: 'get',
                    success: function (content) {
                        $('#edit_subject').append('<option value="">Select</option>');
                        var subject = jQuery.parseJSON(content);
                        $.each(subject, function (key, value) {
                            $('#edit_subject').append('<option value=' + value.sm_id + '>' + value.subject_name + '</option>');
                        })
                    }
                })
            }

    })
    
            //exam list from degree and course
            
</script>