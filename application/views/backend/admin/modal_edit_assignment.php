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
                        Edit Assignment
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>   
                            <?php echo form_open(base_url() . 'index.php?admin/assignment/do_update/' . $row['assign_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Assignment Title<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['assign_title']; ?>" />
                                </div>
                            </div>
                             <div class="form-group">
                                            <label class="col-sm-3 control-label">Course<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree2">
                                                    <option value="">Select Course</option>
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
                                <label class="col-sm-3 control-label">Branch<span style="color:red">*</span></label>
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
                                <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
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
                                <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="semester" id="semester">
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

                           
                                    <input type="hidden" class="form-control" name="assignmenturl" id="assignmenturl" value="<?php echo $row['assign_url']; ?>"/>
                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Submission Date<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="submissiondate1" id="submissiondate1"  value="<?php echo $row['assign_dos']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="description" id="description"><?php echo $row['assign_desc']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">File Upload</label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['assign_filename']; ?>" />
                                    <input type="file" class="form-control" name="assignmentfile" id="assignmentfile" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="submit btn btn-info">Update</button>
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
    
      $("#degree2").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/'; ?>",
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
                degree:"Select Course",
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
