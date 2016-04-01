<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Fees Management</li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Fees Structure</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Fees Structure List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Fees Structure
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
                                                <th>Title</th>
                                                <th>Degree</th>
                                                <th>Course Name</th>
                                                <th>Batch</th>
                                                <th>Semester</th>
                                                <th>Fees</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($fees_structure as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->fees_structure_id; ?></td>
                                                    <td><?php echo $row->title; ?></td>
                                                    <td><?php echo $row->d_name; ?></td>
                                                    <td><?php echo $row->c_name; ?></td>
                                                    <td><?php echo $row->b_name; ?></td>
                                                    <td><?php echo $row->s_name; ?></td>
                                                    <td><?php echo $row->total_fee; ?></td>
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_fees_structure/<?php echo $row->fees_structure_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/fees_structure/delete/<?php echo $row->fees_structure_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
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
                                    <form class="form-horizontal form-groups-bordered validate" id="feesstructure" 
                                          action="<?php echo base_url('index.php?admin/fees_structure/create'); ?>" method="post" role="form">
                                        <br/>
                                        <div class="padded">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Title</label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="title" name="title" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Degree</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="degree" name="degree">
                                                        <option value="">Select</option>
                                                        <?php foreach ($degree as $row) { ?>
                                                            <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Course Name</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="course" name="course">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Batch</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="batch" name="batch">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Semester Name</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="semester" name="semester">
                                                        <option value="">Select</option>
                                                        <?php foreach ($semester as $row) { ?>
                                                            <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Fees</label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="fees" class="form-control" name="fees"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Description</label>
                                                <div class="col-sm-5">
                                                    <textarea id="description" name="description" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-5">
                                                    <button type="submit" class="btn btn-info">Add Fees Structure</button>
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
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">
                                                            $.validator.setDefaults({
                                                                submitHandler: function (form) {
                                                                    form.submit();
                                                                }
                                                            });

                                                            $().ready(function () {
                                                                $("#feesstructure").validate({
                                                                    rules: {
                                                                        degree: "required",
                                                                        course: "required",
                                                                        semester: "required",
                                                                        batch: "required",
                                                                        fees: {
                                                                            required: true,
                                                                            currency: ['$', false]
                                                                        },
                                                                        title: "required"
                                                                    },
                                                                    messages: {
                                                                        degree: "Please select degree",
                                                                        course: "Please select Course Name",
                                                                        semester: "Please select semester name",
                                                                        batch: "Please select batch",
                                                                        fees: {
                                                                            required: "Please Enter  Fees",
                                                                            currency: "Please Enter Valid Amount"
                                                                        },
                                                                        title: "Please enter title"
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