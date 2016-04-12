<?php
$edit_data = $this->db->get_where('grade', array('grade_id' => $param2))->result_array();
foreach ($edit_data as $row){}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo get_phrase('edit_student'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?admin/grade/update/' . $row['grade_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'edit-grade-form', 'target' => '_top')); ?>
                <div class="padded">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Grade Name<span style="color:red">*</span></label>
                        <div class="col-sm-7">
                            <input id="grade_name" class="form-control" type="text" name="grade_name"
                                   value="<?php echo $row['grade_name']; ?>"/>
                        </div>	
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">From Marks<span style="color:red">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="from_marks" id="edit_from_marks"
                                   value="<?php echo $row['from_marks']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">To Marks<span style="color:red">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="to_marks" id="edit_to_marks"
                                   value="<?php echo $row['to_marks']; ?>"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-7">	
                            <div class="chat-message-box">
                                <textarea name="description" id="description" rows="3" class="form-control"><?php echo $row['comment']; ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" class="btn btn-info">Edit Grade</button>
                        </div>
                    </div>                                              
                </div>    
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            $("#edit-grade-form").validate({
                rules: {
                    grade_name: "required",
                    from_marks: "required",
                    to_marks: "required",
                },
                messages: {
                    grade_name: "Please enter grade name",
                    from_marks: "Please enter valid marks",
                    to_marks: "Please enter valid marks",
                },
            });
        });
    </script>
    
    <script>
    $(document).ready(function(){
        $('#edit_from_marks').on('blur',function(){
            $('#edit_to_marks').attr('min', $(this).val());
            $('#edit_to_marks').attr('required', 'required');
        });
    })
    </script>