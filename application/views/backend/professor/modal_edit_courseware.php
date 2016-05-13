
<?php
$edit_data = $this->db->get_where('courseware', array('courseware_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("update courseware"); ?>		
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content"> 
                            <div class="">
                                <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?> </span> 
                            </div>
                            <?php echo form_open(base_url() . 'index.php?professor/courseware/do_update/' . $row['courseware_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmcoursewareedit', 'target' => '_top','enctype'=>'multipart/form-data')); ?>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Branch"); ?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="branch" id="branch">
                                        <option value="">Select Branch</option>                                    
                                        <?php
                                        foreach ($branch as $b) {
                                            if($b['course_id']==$row['branch_id'])
                                            {
                                            ?>
                                            <option selected value="<?php echo $b['course_id'] ?>"><?php echo $b['c_name'] ?></option>
                                            <?php
                                            }
                                            else
                                            {
                                                ?>
                                            <option value="<?php echo $b['course_id'] ?>"><?php echo $b['c_name'] ?></option>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>												
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("topic"); ?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="topic" id="topic" value="<?php echo $row['topic'] ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("attachment"); ?><span style="color:red"></span></label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" name="attachment" id="attachment"/>
                                    <input type="hidden" class="form-control" name="oldfile" id="oldfile" value="<?php echo $row['attachment'] ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Description"); ?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="description" id="description"> <?php echo $row['description'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("status"); ?></label>
                                <div class="col-sm-5">
                                    <select name="status">
                                        <option value="1" <?php if ($row['status'] == '1') {
                                        echo "selected";
                                    } ?>>Active</option>
                                        <option value="0" <?php if ($row['status'] == '0') {
                                        echo "selected";
                                    } ?>>Inactive</option>	
                                    </select>
                                </div>	
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info vd_bg-green" ><?php echo ucwords("update"); ?></button>
                                </div>
                            </div>
                            </form>                            


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });


    $().ready(function () {

        $("#frmcoursewareedit").validate({
            rules: {
                branch:
                    {
                        required: true,
                    },
                topic:
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
                
            }
        });
    });
</script>
