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
                    <h1><?php echo ucwords("CMS Manager");?></h1>
                </div>
            </div>

            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("CMS Page List");?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add CMS Page");?>
                                </a>
                            </li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <div class="tab-pane box active" id="list">
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("Title");?></th>
                                                <th><?php echo ucwords("URL");?></th>                                                
                                                <th><?php echo ucwords("Course");?></th>
                                                <th><?php echo ucwords("Branch");?></th>
                                                <th><?php echo ucwords("Batch");?></th>
                                                <th><?php echo ucwords("Semester");?></th>
                                                <th><?php echo ucwords("Action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 1;
                                            foreach ($cms_pages as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><?php echo $row->am_title; ?></td>
                                                    <td><?php echo $row->am_url; ?></td>                                                    
                                                    <td><?php echo $row->d_name; ?></td>
                                                    <td><?php echo $row->c_name; ?></td>
                                                    <td><?php echo $row->b_name; ?></td>
                                                    <td><?php echo $row->s_name; ?></td>
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_cms_page/<?php echo $row->am_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/cms_manager/delete/<?php echo $row->am_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>
                                                </tr>
                                                <?php $counter++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane box" id="add">
                                <br/>
                                <div class="box-content">
                                    <div class="">
                                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                    </div>   
                                    <form class="form-horizontal form-groups-bordered validate" id="admissionform" method="post" 
                                          action="<?php echo base_url('index.php?admin/cms_manager/create'); ?>" role="form">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php echo ucwords("Course");?></label>
                                                <div class="col-sm-5 controls">
                                                    <select id="degree" name="degree" class="form-control">
                                                        <option value="">Select</option>
                                                        <?php foreach ($degree as $row) { ?>
                                                            <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
<?php } ?>
                                                    </select>
                                                </div>
                                            </div><!--./col-->
                                        </div><!--./row-->
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5 controls">
                                                    <select id="course" name="course" class="form-control">

                                                    </select>
                                                </div>
                                            </div><!--./col-->
                                        </div><!--./row-->
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="callout callout-info">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                            <select name="batch" id="batch" class="form-control">

                                                            </select>
                                                        </div>	
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="callout callout-info">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                            <select id="semester" name="semester" class="form-control">

                                                            </select>
                                                            <div id="test"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="callout callout-info">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label"><?php echo ucwords("Page Title");?><span style="color:red">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                            <input id="page_title" name="page_title" type="text" placeholder="Page Title">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="callout callout-info">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label"><?php echo ucwords("Page Slug");?><span style="color:red">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                            <input id="page_slug" name="page_slug" type="text" placeholder="Page Slug">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="callout callout-info">
                                                    <div class="form-group">
                                                        <label class="col-sm-4 control-label"><?php echo ucwords("Content Type");?><span style="color:red">*</span></label>
                                                        <div class="col-sm-5 controls">
                                                            <select class="form-control" id="content_type" name="content_type" id="content_type">
                                                                <option value="">Select</option>
                                                                <option value="0">Plain Content</option>
                                                                <option value="1">Form Content</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="ck-editor">
                                            <div class="col-sm-12 col-xs-12">	
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label"><?php echo ucwords("Page Content");?><span style="color:red">*</span></label>
                                                    <div class="col-sm-7 controls">												
                                                        <div class="form-group">							
                                                            <textarea id="content_data" name="content_data" class="ckeditor" data-rel="ckeditor" rows="3" ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Panel Widget --> 
                                            </div>
                                            <!-- col-md-12 -->
                                        </div>
                                        <div class="form-group form-actions">
                                            <div class="col-sm-4"> </div>
                                            <div class="col-sm-7">
                                                <button type="submit" class="btn vd_btn vd_bg-green vd_white"><i class="icon-ok"></i> Save</button>
                                                <button type="button" class="btn vd_btn">Cancel</button>
                                            </div>
                                        </div>
                                    </form>	
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- row --> 

        </div>
        <!-- .vd_content-section --> 

    </div>
    <!-- .vd_content --> 
</div>
<!-- .vd_container --> 
</div>
<!-- .vd_content-wrapper --> 

<!-- Middle Content End --> 

<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>

<!-- Specific Page Scripts END -->
<script type="text/javascript">
                                                        $(window).load(function ()
                                                        {
                                                            //CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
                                                            //$('.ckeditor').ckeditor();                                                                
                                                        })
</script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">
                                                        $.validator.setDefaults({
                                                            submitHandler: function (form) {
                                                                form.submit();
                                                            }
                                                        });

                                                        $().ready(function () {
                                                            $("#admissionform").validate({
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
            course_semester(course_id);
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

        //get all semester of course
        function course_semester(course_id) {
            $('#semester').find('option').remove().end();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?admin/get_semesters_of_branch/' + course_id,
                type: 'get',
                success: function (content) {
                    $('#semester').append('<option value="">Select</option>');
                    var semester = jQuery.parseJSON(content);
                    $.each(semester, function (key, value) {
                        $('#semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                    });
                }
            });
        }

    })
</script>
<?php include('plus_icon.php'); ?>