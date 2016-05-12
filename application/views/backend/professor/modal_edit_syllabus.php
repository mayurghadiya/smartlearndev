<?php
$edit_data = $this->db->get_where('smart_syllabus', array('syllabus_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                      <?php echo ucwords("Update Syllabus");?>  
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>   
                            <?php echo form_open(base_url() . 'index.php?professor/syllabus/do_update/' . $row['syllabus_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditsyllabus', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Syllabus title");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['syllabus_title']; ?>" />
                                </div>
                            </div>
                             <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Course");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree2">
                                                    <option value="">Select Course</option>
                                                    <?php
                                                    
                                                    foreach ($degree as $dgr) {
                                                        ?>
                                                    <option value="<?= $dgr->d_id ?>" <?php if($row['syllabus_degree']==$dgr->d_id){  echo "selected=selected"; } ?>><?= $dgr->d_name ?></option>
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
                                        $course = $this->db->get_where('course', array('course_status' => 1,'degree_id'=>$row['syllabus_degree']))->result();
                                        foreach ($course as $crs) {
                                            if ($crs->course_id == $row['syllabus_course']) {
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
                                <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="semester" id="semester1">
                                        <option value="">Select semester</option>
                                        <?php
                                        $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                        foreach ($datasem as $rowsem) {
                                            if ($rowsem->s_id == $row['syllabus_sem']) {
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
                                <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="description" id="description"><?php echo $row['syllabus_desc']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("File Upload");?></label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['syllabus_filename']; ?>" />
                                    <input type="file" class="form-control" name="syllabusfile" id="syllabusfile" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update");?></button>
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
                    url:"<?php echo base_url().'index.php?professor/get_cource/edit'; ?>",
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
                    url:"<?php echo base_url().'index.php?professor/get_batchs/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch2").html(response);
                        $.ajax({
                                type: "POST",
                                url: "<?php echo base_url() . 'index.php?professor/get_semester'; ?>",
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

        $("#frmeditsyllabus").validate({
            rules: {
                degree:"required",
                course: "required",               
                semester: "required",                
                title:
                        {
                            required: true,
                           
                        },
                syllabusfile: {
                    
                    extension:'pdf|doc|docx|ppt|pptx',                                                                              
                },
            },
            messages: {
                degree:"Select Course",
                course: "Select Branch",               
                semester: "Select Semester",
                submissiondate: "Select date of submission",
                title:
                        {
                            required: "Enter title",                            
                        },
                syllabusfile: 
                        {
                            extension:'Upload valid file',  
                        },
            }
        });
    });
</script>
