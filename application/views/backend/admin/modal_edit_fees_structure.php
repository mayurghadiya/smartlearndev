<?php
$edit_data = $this->db->get_where('fees_structure', array('fees_structure_id' => $param2))->row();
$degree = $this->db->get('degree')->result();
$course = $this->db->get_where('course', array(
            'degree_id' => $edit_data->degree_id
        ))->result();
$semester = $this->db->get('semester')->result();

$query = "SELECT * FROM batch ";
$query .= "WHERE FIND_IN_SET($edit_data->degree_id, degree_id) ";
$query .= "AND FIND_IN_SET($edit_data->course_id, course_id)";
$batch = $this->db->query($query)->result();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Fees Structure
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                        <form class="form-horizontal form-groups-bordered validate" id="feesstructure" 
                              action="<?php echo base_url('index.php?admin/fees_structure/update/' . $edit_data->fees_structure_id); ?>" method="post" role="form">

                            <div class="padded">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" id="title" name="title" class="form-control"
                                               value="<?php echo $edit_data->title; ?>" required=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Degree</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="edit_degree" name="degree" required="">
                                            <option value="">Select</option>
                                            <?php foreach ($degree as $d) { ?>
                                                <option value="<?php echo $d->d_id; ?>"
                                                        <?php if ($d->d_id == $edit_data->degree_id) echo 'selected'; ?>><?php echo $d->d_name; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Course Name</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="edit_course" name="course" required="">
                                            <option value="">Select</option>
                                            <?php foreach ($course as $row) { ?>
                                                <option value="<?php echo $row->course_id; ?>"
                                                        <?php if ($edit_data->course_id == $row->course_id) echo 'selected'; ?>><?php echo $row->c_name; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Batch</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" required="" name="edit_batch" id="edit_batch">
                                            <option value="">Select</option>
                                            <?php foreach ($batch as $b) { ?>
                                                <option value="<?php echo $b->b_id; ?>"
                                                        <?php if ($b->b_id == $edit_data->batch_id) echo 'selected'; ?>><?php echo $b->b_name; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Semester Name</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="edit_semester" name="semester" required="">
                                            <option value="">Select</option>
                                            <?php foreach ($semester as $row) { ?>
                                                <option value="<?php echo $row->s_id; ?>"
                                                        <?php if ($edit_data->sem_id == $row->s_id) echo 'selected'; ?>><?php echo $row->s_name; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Fees</label>
                                    <div class="col-sm-7">                                        
                                        <input type="text" id="fees" class="form-control" name="fees" required=""
                                               value="<?php echo $edit_data->total_fee; ?>"/>                                               
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-7">
                                        <button type="submit" class="btn btn-info">Edit Fees Structure</button>
                                    </div>
                                </div>
                        </form> 
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">
	$.validator.setDefaults({
		submitHandler: function (form) {
			var form = document.getElementsByTagName("form");
			form.submit();
		}
	});

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
                url: '<?php echo base_url(); ?>index.php?admin/course_list_from_degree/' + degree_id,
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
        })

        //find batch from degree and course
        function batch_from_degree_and_course(degree_id, course_id) {
            //remove all element from batch
            $('#edit_batch').find('option').remove().end();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?admin/batch_list_from_degree_and_course/' + degree_id + '/' + course_id,
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

    })
</script>