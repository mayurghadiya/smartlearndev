<?php
$edit_data = $this->db->select()
        ->from('cms_pages')
        ->join('degree', 'degree.d_id = cms_pages.degree_id')
        ->join('course', 'course.course_id = cms_pages.am_course')
        ->join('semester', 'semester.s_id = cms_pages.am_semester')
        ->join('batch', 'batch.b_id = cms_pages.am_batch')
        ->where('am_id', $param2)
        ->get()
        ->row();

$batch = $this->db->get('batch')->result();
$degree = $this->db->get('degree')->result();
$course = $this->db->get_where('course', array(
            'degree_id' => $edit_data->d_id
        ))->result();
$query = "SELECT * FROM batch ";
$query .= "WHERE FIND_IN_SET($edit_data->d_id, degree_id) ";
$query .= "AND FIND_IN_SET($edit_data->am_course, course_id)";
$batch = $this->db->query($query)->result();
$semester = explode(',', $edit_data->semester_id);
$this->db->where_in('s_id', $semester);
$semester = $this->db->get('semester')->result();
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Update CMS Page
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                        <?php echo form_open(base_url() . 'index.php?admin/cms_manager/update/' . $edit_data->am_id, array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'edit_cms_page', 'target' => '_top')); ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <select id="edit_degree" required="" name="degree" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach ($degree as $d) { ?>
                                        <option value="<?php echo $d->d_id; ?>"
                                                <?php if ($d->d_id == $edit_data->d_id) echo 'selected'; ?>><?php echo $d->d_name; ?></option>
                                            <?php } ?>
                                </select>
                                <div id="test"></div>
                            </div>
                        </div>                   
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Branch<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <select id="edit_course" required="" name="course" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach ($course as $row) { ?>
                                        <option value="<?php echo $row->course_id; ?>"
                                                <?php if ($edit_data->am_course == $row->course_id) echo 'selected'; ?>><?php echo $row->c_name; ?></option>
                                            <?php } ?>
                                </select>
                                <div id="test"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Batch<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <select name="batch" required="" id="edit_batch" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach ($batch as $row) { ?>
                                        <option value="<?php echo $row->b_id; ?>"
                                                <?php if ($edit_data->am_batch == $row->b_id) echo 'selected'; ?>><?php echo $row->b_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>	
                        </div>                 
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Semester<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <select id="edit_semester" required="" name="semester" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach ($semester as $row) { ?>
                                        <option value="<?php echo $row->s_id; ?>"
                                                <?php if ($edit_data->am_semester == $row->s_id) echo 'selected'; ?>><?php echo $row->s_name; ?></option>
                                            <?php } ?>
                                </select>
                                <div id="test"></div>
                            </div>
                        </div>                   
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Page Title<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <input id="page_title" required="" name="page_title" type="text" placeholder="Page Title" 
                                       value="<?php echo $edit_data->am_title; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Page Slug<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <input id="page_slug" required="" name="page_slug" type="text" placeholder="Page Slug"
                                       value="<?php echo $edit_data->am_url; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Content Type<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <select class="form-control" required="" id="content_type" required="" name="content_type" id="content_type">
                                    <option value="">Select</option>
                                    <option value="0" <?php if ($edit_data->is_form == 0) echo 'selected'; ?>>Plain Content</option>
                                    <option value="1" <?php if ($edit_data->is_form == 1) echo 'selected'; ?>>Form Content</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Page Content<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">												
                                <div class="form-group">							
                                    <textarea id="edit_content_data" required="" name="content_data" rows="3" ><?php echo $edit_data->am_content; ?></textarea>

                                </div>
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

<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>

<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
        $("#edit_cms_page").validate({
            ignore: [],
            rules: {
                content_data: {
                    required: function () {
                        CKEDITOR.instances.content_data.updateElement();
                    }
                },
                degree: "required",
                course: "required",
                batch: "required",
                //year: "required",
                page_title: "required",
                semester: "required",
                page_slug: "required",
                content_type: "required",
                //content_data: "required"

            },
            messages: {
                degree: "Please select course",
                course: "Please select branch",
                batch: "Please select batch",
                //year: "Please select year",
                page_title: "Please enter page title",
                semester: "Please select semester",
                page_slug: "Please enter page slug",
                content_type: "Please enter content type",
                content_data: "Please enter content"
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function ()
    {
        //CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
        $('#edit_content_data').ckeditor();
        $('.submit').on('click', function () {
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
            //$('#edit_cms_page').submit();
        });

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
            get_semester_from_branch(course_id);
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

        //get semester from brach
        function get_semester_from_branch(branch_id) {
            $('#edit_semester').find('option').remove().end();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?admin/get_semesters_of_branch/' + branch_id,
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

    })
</script>
