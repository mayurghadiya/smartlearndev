<?php 
   
  ?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add exam Grade");?>
                    </div>
                </div>
                <div class="panel-body"> 

                     <div class="box-content"> 
                                    <div class="">
                                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                    </div>   
                                    <?php echo form_open(base_url() . 'index.php?admin/grade/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'gradeform', 'target' => '_top')); ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Grade Name");?><span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input id="grade_name" class="form-control" type="text" name="grade_name"/>
                                        </div>	
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("From Percentage");?><span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" name="from_marks" id="from_marks" min="0"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("To Percentage");?><span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" name="to_marks" id="to_marks"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                        <div class="col-sm-5">	
                                            <div class="chat-message-box">
                                                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                                            </div>
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

    <script type="text/javascript">

                                                        $(document).ready(function () {
                                                            $("#gradeform").validate({
                                                                rules: {
                                                                    grade_name: "required",
                                                                    from_marks: "required",
                                                                    to_marks: "required"
                                                                },
                                                                messages: {
                                                                    grade_name: "Please enter grade name",
                                                                    from_marks: "Please enter valid grade number percentage",
                                                                    to_marks: "Please enter valid grade number percentage"
                                                                },
                                                            });
                                                        });
    </script>

    <script>
        $(document).ready(function () {
            $('#from_marks').on('blur', function () {
                $('#to_marks').attr('min', $(this).val());
                $('#to_marks').attr('required', 'required');
            });
        })
    </script>