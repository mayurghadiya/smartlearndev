
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ucwords("Add courseware"); ?>
                </div>
            </div>
            <div class="panel-body"> 

                <div class="box-content">     
                    <div class="">
                        <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?></span> 
                    </div>                                    
                    <?php echo form_open(base_url() . 'index.php?professor/courseware/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmcourseware', 'target' => '_top','enctype'=>'multipart/form-data')); ?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                               
                                <select name="branch" id="branch">
                                    <option value="">Select Branch</option>                                    
                                    <?php 
                                    foreach ($branch as $b)
                                    {
                                        ?>
                                    <option value="<?php echo $b['course_id']?>"><?php echo $b['c_name']?></option>>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>												
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("topic"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="topic" id="topic"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("attachment"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" name="attachment" id="attachment"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Description"); ?></label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                            <div class="col-sm-5">
                                <select name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>	
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info vd_bg-green" ><?php echo ucwords("add"); ?></button>
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

        $("#frmcourseware").validate({
            rules: {
                branch:
                    {
                        required: true,
                    },
                topic:
                    {
                        required: true,
                    },
                attachment:
                    {
                        required: true,
                    },
            },
            messages: {
                 branch:
                    {
                        required: "Select branch",
                    },
                topic:
                    {
                        required: "Enter topic ",
                    },
                attachment:
                    {
                        required: "Select attachment",
                    },
            }
        });
    });
</script>