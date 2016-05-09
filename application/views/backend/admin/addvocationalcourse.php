<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ucwords("Add vocational course"); ?>
                </div>
            </div>
            <div class="panel-body"> 
                <div class="box-content"> 
                    <div class="">
                        <span style="color:red">*<?php echo "is " . ucwords("mandatory field"); ?> </span> 
                    </div>
                    <?php echo form_open(base_url() . 'index.php?admin/vocationalcourse/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmvocationalcourse', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("course name"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="course_name" id="course_name"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("start date"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="startdate" id="startdate"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("end date"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="enddate" id="enddate"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("course fee"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="fee" id="fee"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Professor"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <?php
                                $professor = $this->db->get('professor')->result_array();
                                ?>
                                <select id="professor1" name="professor1" class="form-control">
                                    <option value="">Select professor</option>
                                    <?php foreach ($professor as $srow) { ?>
                                        <option value="<?php echo $srow['professor_id']; ?>"><?php echo $srow['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("status"); ?></label>
                            <div class="col-sm-5">
                                <select name="course_status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>	
                                </select>
                                <lable class="error" id="error_lable_exist" style="color:red"></lable>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("add"); ?></button>
                            </div>
                        </div>
                        </form>               
                    </div>                
                </div>

            </div>
        </div>
    </div>
</div> 

<script>
    $(document).ready(function () {
        $("#startdate").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            onClose: function (selectedDate) {
                $("#enddate").datepicker("option", "minDate", selectedDate);
            }
        });

        $("#enddate").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            onClose: function (selectedDate) {
                $("#startdate").datepicker("option", "maxDate", selectedDate);
            }
        });

        $("#frmvocationalcourse").validate({
            rules: {
                course_name: "required",
                professor1: "required",
                fee: "required",
                course_status: "required",
                startdate: "required",
                enddate: "required",
            },
            messages: {
                course_name: "Enter course name",
                professor1: "Select professor",
                fee: "Enter course fee",
                course_status: "Select status",
                startdate: "Select date",
                enddate: "Select date",
            }
        });
    });
</script>