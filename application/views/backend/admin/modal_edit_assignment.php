<?php
$edit_data = $this->db->get_where('assignment_manager', array('assign_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                      <?php echo ucwords("Update Assignment");?>  
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>   
                            <?php echo form_open(base_url() . 'index.php?admin/assignment/do_update/' . $row['assign_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Assignment Name");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" id="title1" value="<?php echo $row['assign_title']; ?>" />
                                </div>
                                 <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                            </div>
                             <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("department");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree2">
                                                    <option value="">Select department</option>
                                                    <?php
                                                    $degree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                                    foreach ($degree as $dgr) {
                                                        ?>
                                                    <option value="<?= $dgr->d_id ?>" <?php if($row['assign_degree']==$dgr->d_id){  echo "selected=selected"; } ?>><?= $dgr->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="course" id="course2">
                                        <option value="">Select Branch</option>
                                        <?php
                                        $course = $this->db->get_where('course', array('course_status' => 1,'degree_id'=>$row['assign_degree']))->result();
                                        foreach ($course as $crs) {
                                            if ($crs->course_id == $row['course_id']) {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" selected><?= $crs->c_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" ><?= $crs->c_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">                                    
                                    <select name="batch" id="batch2">
                                        <option value="">Select batch</option>
    <?php
    
     $databatch = $this->db->query("SELECT * FROM batch WHERE b_status=1 AND FIND_IN_SET('".$row['assign_degree']."',degree_id) AND FIND_IN_SET('".$row['course_id']."',course_id)")->result();
   
       
    foreach ($databatch as $row1) {
        if ($row1->b_id == $row['assign_batch']) {
            ?>
                                                <option value="<?= $row1->b_id ?>" selected><?= $row1->b_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $row1->b_id ?>" ><?= $row1->b_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="semester" id="semester1">
                                        <option value="">Select semester</option>
                                        <?php
                                        $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                        foreach ($datasem as $rowsem) {
                                            if ($rowsem->s_id == $row['assign_sem']) {
                                                ?>
                                                <option value="<?= $rowsem->s_id ?>" selected><?= $rowsem->s_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                <option value="<?= $rowsem->s_id ?>" ><?= $rowsem->s_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("class");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="class" id="class">
                                        <option value="">Select class</option>
                                        <?php 
                                        $class=$this->db->get('class')->result_array();

                                        foreach($class as $c)
                                        {
                                            if($c['class_id']==$row['class_id'])
                                            {
                                        ?>
                                            <option selected value="<?php echo $c['class_id']?>"><?php echo $c['class_name']?></option>
                                        <?php
                                        }
                                        else 
                                            {                                        
                                        ?>
                                           <option value="<?php echo $c['class_id']?>"><?php echo $c['class_name']?></option>
                                        <?php                                            
                                        }
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>
                           
                                    <input type="hidden" class="form-control" name="assignmenturl" id="assignmenturl" value="<?php echo $row['assign_url']; ?>"/>
                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Submission Date");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" readonly="" name="submissiondate1" id="submissiondate1"  value="<?php echo $row['assign_dos']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="description" id="description"><?php echo $row['assign_desc']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("File Upload");?></label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['assign_filename']; ?>" />
                                    <input type="file" class="form-control" name="assignmentfile" id="assignmentfile" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" id="btnupd" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update");?></button>
                                </div>
                            </div>
                            </form>
                        </div> </div> </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>
<script type="text/javascript">
    
    $("#btnupd").click(function (event) {
        if ($("#title1").val() != null & $("#degree2").val() != null & $("#batch2").val() != null & $("#semester1").val() != null & $("#course2").val() != null)
        {   
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php?admin/checkassignment/'.$param2; ?>",
                dataType: 'json',
                async: false,
                data:
                        {
                            'title': $("#title1").val(),
                            'semester': $("#semester1").val(),
                            'degree': $("#degree2").val(),
                            'batch': $("#batch2").val(),
                            'course': $("#course2").val()
                        },
                success: function (response) {

                   
                    if (response.length == 0) {
                        $("#error_lable_exist").html('');
                        $('#frmeditassignment').attr('validated', true);
                        $('#frmeditassignment').submit();
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
      $("#degree2").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/edit'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#course2").html(response);
                    }
                });
        });
        
         $("#course2").change(function(){
                var course = $(this).val();
                 var degree = $("#degree2").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batchs/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch2").html(response);
                        $.ajax({
                                type: "POST",
                                url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                                data: dataString,
                                success: function (response1) {
                                    $("#semester1").html(response1);
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
        $("#submissiondate1").datepicker({
            dateFormat: ' MM dd, yy',
            minDate: 0
        });

        $("#frmeditassignment").validate({
            rules: {
                degree:"required",
                course: "required",
                batch: "required",
                semester: "required",
                submissiondate: "required",              
                title:
                        {
                            required: true,
                           
                        },
                assignmentfile: {
                    
                    extension:'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|txt',                                                                              
                },
            },
            messages: {
                degree:"Select department",
                course: "Select Branch",
                batch: "Select Batch",
                semester: "Select Semester",
                submissiondate: "Select date of submission",
                title:
                        {
                            required: "Enter title",                            
                        },
                assignmentfile: 
                        {
                            extension:'Upload valid file',  
                        },
            }
        });
    });
</script>
