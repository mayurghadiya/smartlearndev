
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Payment");?>
                    </div>
                </div>
                <div class="panel-body"> 

                    <div class="box-content">                	
                                <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>  
                                    <form id="makepayment" class="form-horizontal form-groups-bordered validate" action="" method="post" role="form">
                                        <br/>
                                        <div class="padded">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">department<span style="color:red">*</span></label>
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
                                            <div id="fees_main" class="form-group">
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
                                                    <button id="submit-form" type="submit" class="btn btn-info vd_bg-green">Make Payment</button>
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
        $("#makepayment").validate({
            rules: {
                course: "required",
                student: "required",
                fees: "required",
                semester: "required",
                fees_structure:"required",
            },
            messages: {
                course: "Please select department Name",
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
        
        $('#fees_structure').on('blur', function () {
            var fees_structure_id = $(this).val();
            var student_id = $('#student').val();
            fees_structure(fees_structure_id, student_id);
        });
        
        $('#fees_structure').on('focus', function () {
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
                    
                    if(amount.total_fees == amount.total_paid) {
                        $('#fees_main').css('display', 'none');
                        $('#submit-form').attr('disabled', '');
                    } else {
                        $('#fees_main').css('display', 'block');
                        $('#submit-form').removeAttr('disabled');
                    }
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