
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Fees");?>
                    </div>
                </div>
                <div class="panel-body"> 

                    <div class="box-content">    
                                    <div class="">
                                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
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
                                                <label class="col-sm-3 control-label"><?php echo ucwords("department");?><span style="color:red">*</span></label>
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
                                                                    degree: "Please select department",
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