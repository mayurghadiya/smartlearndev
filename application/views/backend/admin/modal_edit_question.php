<?php
$edit_data = $this->db->get_where('survey_question', array('sq_id' => $param2))->result_array();

    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        Edit Question
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <?php echo form_open(base_url() . 'index.php?admin/survey/do_update/' . $edit_data[0]['sq_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditquestion', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                            <label class="col-sm-3 control-label">Question <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="question" value="<?php echo $edit_data[0]['question']; ?>" id="question" />
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Short Description <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"><?php echo $edit_data[0]['question_description']; ?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Status <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="radio" id="status" name="status" value="1" <?php if($edit_data[0]['question_status']=="1"){ echo "checked=checked"; } ?> >Active
                                                 <input type="radio" id="status" name="status" value="0" <?php if($edit_data[0]['question_status']=="0"){ echo "checked=checked"; } ?> > Deactive
                                                   <label for="status" class="error"></label>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Update</button>
                                            </div>
                                        </div>
                            
                            </form>
                        </div> </div> </div>
            </div>
        </div>
    </div>

    <?php

?>
<script type="text/javascript">
    
    
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });
    
   



    $().ready(function () {

        $("#dateofsubmission1").datepicker({
            minDate:0
        });
        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

                                                          $("#frmeditquestion").validate({
                                                                    rules: {
                                                                        question:"required",
                                                                        description:"required",
                                                                        status:"required"
                                                                    },
                                                                    messages: {
                                                                        question:"enter question",
                                                                        description:"enter description",
                                                                        status:"select status"
                                                                    },
                                                                });
    });
</script>
