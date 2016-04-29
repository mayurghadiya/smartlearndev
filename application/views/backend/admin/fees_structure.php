<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                        <li><?php echo ucwords("payment management");?></li>
                        <li class="active"><?php echo ucwords("Fee Management");?></li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Fee Structure");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Fee Structure List");?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add Fee Structure");?>
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
                                                <th><?php echo ucwords("Title");?></th>
                                                <th><?php echo ucwords("Course");?></th>
                                                <th><?php echo ucwords("Branch");?></th>
                                                <th><?php echo ucwords("Batch");?></th>
                                                <th><?php echo ucwords("Semester");?></th>
                                                <th><?php echo ucwords("Fee");?></th>
                                                <th><?php echo ucwords("Action");?></th>
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

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/fees_structure/delete/<?php echo $row->fees_structure_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
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
                                    <form class="form-horizontal form-groups-bordered validate" id="feesstructure" 
                                          action="<?php echo base_url('index.php?admin/fees_structure/create'); ?>" method="post" role="form">
                                        <br/>
                                        <div class="padded">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Title");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="title" name="title" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Course");?><span style="color:red">*</span></label>
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
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="course" name="course">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="batch" name="batch">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="semester" name="semester">
                                                        <option value="">Select</option>                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Fee");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="fees" class="form-control" name="fees"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Start Date");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="start_date" class="form-control datepicker" name="start_date"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("End Date");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="end_date" class="form-control datepicker" name="end_date"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Expiry Date");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="expiry_date" class="form-control datepicker" name="expiry_date"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Penalty");?><span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" id="penalty" class="form-control" name="penalty"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                                <div class="col-sm-5">
                                                    <textarea id="description" name="description" class="form-control"></textarea>
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
                                                                    title: "required",
                                                                    start_date: "required",
                                                                    end_date: "required",
                                                                    expiry_date: "required",
                                                                    penalty: "required"
                                                                },
                                                                messages: {
                                                                    degree: "Please select course",
                                                                    course: "Please select branch",
                                                                    semester: "Please select semester",
                                                                    batch: "Please select batch",
                                                                    fees: {
                                                                        required: "Please Enter  Fee",
                                                                        currency: "Please Enter Valid Amount"
                                                                    },
                                                                    title: "Please enter title",
                                                                    start_date: "Please enter start date",
                                                                    end_date: "Please enter end date",
                                                                    expiry_date: "Please enter expiry date",
                                                                    penalty: "Please enter penalty"
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
        $("#start_date").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            minDate: new Date(),
            onClose: function (selectedDate) {
                $("#end_date").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#end_date").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            onClose: function (selectedDate) {
                $("#start_date").datepicker("option", "maxDate", selectedDate);
                $("#expiry_date").datepicker("option", "minDate", selectedDate);
            }
        });
        $('#expiry_date').datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
        });

    })
    //minDate: new Date(),

</script>
