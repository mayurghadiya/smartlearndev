                                   
<?php echo form_open(base_url() . 'index.php?admin/assignment/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
<div class="padded">
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo ucwords("Assignment Name"); ?><span style="color:red">*</span></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="title" id="title" />
        </div>
        <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo ucwords("Course"); ?><span style="color:red">*</span></label>
        <div class="col-sm-5">
            <select name="degree" id="degree">
                <option value="">Select Course</option>
                <?php
                $degree = $this->db->get_where('degree', array('d_status' => 1))->result();
                foreach ($degree as $dgr) {
                    ?>
                    <option value="<?= $dgr->d_id ?>"><?= $dgr->d_name ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo ucwords("Branch"); ?><span style="color:red">*</span></label>
        <div class="col-sm-5">
            <select name="course" id="course">
                <option value="">Select Branch</option>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo ucwords("Batch"); ?><span style="color:red">*</span></label>
        <div class="col-sm-5">
            <select name="batch" id="batch">
                <option value="">Select Batch</option>

            </select>
        </div>
    </div>	
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo ucwords("Semester"); ?><span style="color:red">*</span></label>
        <div class="col-sm-5">
            <select name="semester" id="semester">
                <option value="">Select Semester</option>
                <?php
                $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                foreach ($datasem as $rowsem) {
                    ?>
                    <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo ucwords("Submission Date"); ?><span style="color:red">*</span></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" readonly="" name="submissiondate" id="submissiondate" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo ucwords("Description"); ?></label>
        <div class="col-sm-5">
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label"><?php echo ucwords("File Upload"); ?><span style="color:red">*</span></label>
        <div class="col-sm-5">
            <input type="file" class="form-control" name="assignmentfile" id="assignmentfile" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="button" id="btnadd" class="btn btn-info vd_bg-green"><?php echo ucwords("Add "); ?></button>
        </div>
    </div>

</div>             
</form>               


<script type="text/javascript">
    $("#btnadd").click(function (event) {
        if ($("#title").val() != null & $("#degree").val() != null & $("#batch").val() != null & $("#semester").val() != null & $("#course").val() != null)
        {   
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php?admin/checkassignments'; ?>",
                dataType: 'json',
                async: false,
                data:
                        {
                            'title': $("#title").val(),
                            'semester': $("#semester").val(),
                            'degree': $("#degree").val(),
                            'batch': $("#batch").val(),
                            'course': $("#course").val()
                        },
                success: function (response) {

                   
                    if (response.length == 0) {
                        $("#error_lable_exist").html('');
                        $('#frmassignment').attr('validated', true);
                        $('#frmassignment').submit();
                    } else
                    {                         
                        $("#error_lable_exist").html('Record is already present in the system');
                        return false;
                    }
                }
            });
            return false;
        }
        event.preventDefault();

    });

    $("#degree").change(function () {
        var degree = $(this).val();
        var dataString = "degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_course/'; ?>",
            data: dataString,
            success: function (response) {
                $("#course").html(response);
            }
        });
    });




    $("#course").change(function () {
        var course = $(this).val();
        var degree = $("#degree").val();
        var dataString = "course=" + course + "&degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_batches/'; ?>",
            data: dataString,
            success: function (response) {
                $("#batch").html(response);

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                    data: dataString,
                    success: function (response1) {
                        $("#semester").html(response1);
                    }
                });
            }
        });
    });



    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
        $("#submissiondate").datepicker({
            dateFormat: ' MM dd, yy',
            minDate: 0
        });

        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z ]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

        $("#frmassignment").validate({
            rules: {
                title: {
                  required: true,
                },
                degree: "required",
                course: "required",
                batch: "required",
                semester: {
                    required: true,
                },
                submissiondate: "required",
                assignmentfile: {
                    required: true,
                    extension: 'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|txt',
                },
            },
            messages: {
                title:
                        {
                            required: "Enter title",
                        },
                degree: "Select Course",
                course: "Select Branch",
                batch: "Select Batch",
                semester: {
                    required: "Select semester",
                },
                submissiondate: "Select date of submission",
                assignmentfile: {
                    required: "Upload file",
                    extension: 'Upload valid file',
                },
            }
        });


    });
</script>