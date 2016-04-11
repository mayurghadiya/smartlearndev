
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

<style>    
    .select2-container-multi .select2-choices .select2-search-field input{
        padding: 0px;
    }
</style>

<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Make Payment</li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Make Payment</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Payment List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Payment
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="example">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th>Student Name</th>
                                                <th>Course</th>
                                                <th>Branch</th>
                                                <th>Batch</th>
                                                <th>Semester</th>
                                                <th>Paid Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1; ?>
                                            <?php foreach ($student_fees as $row) { ?>
                                                <tr>
                                                    <td><?php echo $counter++; ?></td>
                                                    <td><?php echo $row->std_first_name . ' ' . $row->std_last_name; ?></td>
                                                    <td><?php echo $row->d_name; ?></td>
                                                    <td><?php echo $row->c_name; ?></td>
                                                    <td><?php echo $row->b_name; ?></td>
                                                    <td><?php echo $row->s_name; ?></td>
                                                    <td><?php echo $row->paid_amount; ?></td>
                                                    <td><?php echo date('F d, Y', strtotime(strtotime($row->paid_created_at))); ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                Action <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                                                <!-- VIEWING LINK -->
                                                                <li>
                                                                    <a target="_blank" href="<?php echo base_url('index.php?admin/invoice/' . $row->fees_structure_id); ?>" >

                                                                        View Invoice
                                                                    </a>
                                                                </li> 
                                                                <li>
                                                                    <a target="_blank" href="<?php echo base_url('index.php?admin/invoice_print/' . $row->student_fees_id); ?>" >

                                                                        Download Invoice
                                                                    </a>
                                                                </li> 
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">                	
                                <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>  
                                    <form id="makepayment" class="form-horizontal form-groups-bordered validate" action="" method="post" role="form">
                                        <br/>
                                        <div class="padded">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Course<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="degree" id="degree" required="">
                                                        <option value="">Select</option>
                                                        <?php foreach ($degree as $row) { ?>
                                                            <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Branch<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="course" id="course" required="">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="batch" id="batch" required="">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" name="semester" id="semester" required="">
                                                        <option value="">Select</option>                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Student<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select style="width: 100%;" class="student form-control" id="student" name="student" required="">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Fees Structure<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="fees_structure" name="fees_structure" required="">

                                                    </select>
                                                </div>
                                            </div>
                                            <div id="main_total_fees" class="form-group" style="display: none;">
                                                <label class="col-sm-3 control-label">Total Fees<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="total_fees" id="total_fees" class="form-control" readonly=""/>
                                                </div>
                                            </div>
                                            <div id="main_total_amount" class="form-group" style="display: none;">
                                                <label class="col-sm-3 control-label">Total Paid Amount</label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="total_fees_amount" id="total_fees_amount" class="form-control" readonly=""/>
                                                </div>
                                            </div>
                                            <div id="main_due_amount" class="form-group" style="display: none;">
                                                <label class="col-sm-3 control-label">Due Amount<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="due_amount" id="due_amount" class="form-control" readonly=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Amount<span style="color:red">*</span></label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="fees" id="fees" class="form-control" placeholder="In dollar" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Description</label>
                                                <div class="col-sm-5">
                                                    <textarea name="c_description" id="c_description" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Payment Gateway</label>
                                                <div class="col-sm-5">
                                                    <select class="form-control" id="payment_gateway" name="payment_gateway" required="">
                                                        <option value="authorize">Authorize.net Payment Gatway</option>
                                                        <option value="paypal">Paypal</option>
                                                    </select>
                                                </div>	
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-5">
                                                    <button type="submit" class="btn btn-info vd_bg-green">Make Payment</button>
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

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
        $("#makepayment").validate({
            rules: {
                course: "required",
                student: "required",
                fees: "required",
                semester: "required",
                fees_structure:"required",
            },
            messages: {
                course: "Please select course Name",
                student: "Please select student",
                fees: "Please enter fees",
                semester: "Please select semester",
                fees_structure:"Please select fees structure",
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#course').on('change', function () {
            var course_id = $(this).val();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?admin/course_students/' + course_id,
                type: 'get',
                success: function (content) {
                    $('#student').html(content);
                }
            })
            $('#main_total_fees').css('display', 'none');
            $('#main_total_amount').css('display', 'none');
            $('#main_due_amount').css('display', 'none');
        });

        $('#semester').on('change', function () {
            var semester_id = $(this).val();
            var course_id = $('#course').val();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?admin/course_semester_fees_structure/' + course_id + '/' + semester_id,
                type: 'get',
                success: function (content) {
                    var fees_struture = jQuery.parseJSON(content);
                    $('#fees_structure').find('option').remove();
                    $('#fees_structure').append("<option value=''>Select</option>");
                    $.each(fees_struture, function (key) {
                        $('#fees_structure').append("<option value=" + fees_struture[key].fees_structure_id + ">" + fees_struture[key].title + "</option>");
                    })
                    //console.log(fees_struture);
                }
            })
            $('#main_total_fees').css('display', 'none');
            $('#main_total_amount').css('display', 'none');
            $('#main_due_amount').css('display', 'none');
        });

        $('#fees_structure').on('change', function () {
            var fees_structure_id = $(this).val();
            var student_id = $('#student').val();
            fees_structure(fees_structure_id, student_id);
        });

        $('#student').on('change', function () {
            var student_id = $(this).val();
            var fees_structure_id = $('#fees_structure').val();
            fees_structure(fees_structure_id, student_id);
        })

        function fees_structure(fees_structure_id, student_id) {
            clear_amount();
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?admin/student_paid_fees/' + fees_structure_id + '/' + student_id,
                type: 'get',
                success: function (content) {
                    var amount = jQuery.parseJSON(content);
                    $('#total_fees').val(amount.total_fees);
                    $('#total_fees_amount').val(amount.total_paid);
                    $('#due_amount').val(amount.due_amount);
                }
            })
            $('#main_total_fees').css('display', 'block');
            $('#main_total_amount').css('display', 'block');
            $('#main_due_amount').css('display', 'block');
        }

        function clear_amount() {
            $('#total_fees').val('');
            $('#total_fees_amount').val('');
            $('#due_amount').val('');
        }
    })
</script>

<script>
    $(document).ready(function () {
        var table = $('#example').DataTable();

        $("#example tfoot th").each(function (i) {
            var select = $('<select><option value=""></option></select>')
                    .appendTo($(this).empty())
                    .on('change', function () {
                        table.column(i)
                                .search($(this).val())
                                .draw();
                    });

            table.column(i).data().unique().sort().each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>')
            });
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
<script type="text/javascript">
    $(".student").select2();
    
</script>
