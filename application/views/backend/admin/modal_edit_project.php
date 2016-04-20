<?php
$edit_data = $this->db->get_where('project_manager', array('pm_id' => $param2))->result_array();
foreach ($edit_data as $row):

    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        Edit Project
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>  
                            <?php echo form_open(base_url() . 'index.php?admin/project/do_update/' . $row['pm_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditproject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Course<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="degree" id="degree2">
                                        <option value="">Select Course</option>
                                        <?php
                                        $datadegree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                        foreach ($datadegree as $rowdegree) {
                                            if ($rowdegree->d_id == $row['pm_degree']) {
                                                ?>
                                                <option value="<?= $rowdegree->d_id ?>" selected><?= $rowdegree->d_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $rowdegree->d_id ?>"><?= $rowdegree->d_name ?></option>							
                                                <?php
                                            }
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
                                        $course = $this->db->get_where('course', array('course_status' => 1,'degree_id'=>$row['pm_degree']))->result();
                                        foreach ($course as $crs) {
                                            if ($crs->course_id == $row['pm_course']) {
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
                                    <select name="batch"  id="batch2" onchange="get_student(this.value);">
                                        <option value="">Select batch</option>
                                            <?php
                                            $databatch = $this->db->query("SELECT * FROM batch WHERE b_status=1 AND FIND_IN_SET('".$row['pm_degree']."',degree_id) AND FIND_IN_SET('".$row['pm_course']."',course_id)")->result();
                                            foreach ($databatch as $row1) {
                                                if ($row1->b_id == $row['pm_batch']) {
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
                                    <select name="semester"  id="semester2"  onchange="get_students(this.value);">
                                        <option value="">Select semester</option>
                                <?php
                                $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                foreach ($datasem as $rowsem) {
                                    if ($rowsem->s_id == $row['pm_semester']) { 
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
                                  <?php
                                        $stu=explode(',',$row['pm_student_id']);
                                        
                                        $datastudent = $this->db->get_where('student', array('std_degree'=>$row['pm_degree'],
                                                                                            'course_id'=>$row['pm_course'],
                                                                                             'std_batch'=>$row['pm_batch'],
                                                                                              'semester_id'=>$row['pm_semester']))->result();
//                                       
                                        
                                        ?>
                                
                                <label class="col-sm-3 control-label">Student<span style="color:red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="checkbox" name="checkall" id="checkAll2"  >Check All<br>
                                   <div id="student2">
                                        <?php
                                        $stu=explode(',',$row['pm_student_id']);
                                        
                                        $datastudent = $this->db->get_where('student', 
                                                array('std_degree'=>$row['pm_degree'],
                                                    'course_id'=>$row['pm_course'],
                                                    'std_batch'=>$row['pm_batch'],
                                                    'semester_id'=>$row['pm_semester']))->result();
                                       
                                        foreach ($datastudent as $rowstu) {
                                             if(in_array($rowstu->std_id, $stu)) {
                                                ?>
                                       <div class="checkedstudent"> <input type="checkbox" name="student[]" value="<?php echo $rowstu->std_id; ?>" checked=""><?php echo $rowstu->std_first_name.'&nbsp'.$rowstu->std_last_name; ?> </div>                                               
                                     <?php     } else { ?>
                                       <div class="checkedstudent"><input type="checkbox" name="student[]" value="<?php echo $rowstu->std_id; ?>" ><?php echo $rowstu->std_first_name.'&nbsp'.$rowstu->std_last_name; ?></div>
                                    <?php        }    }    ?>
                                   </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date of Submission<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" readonly="" class="form-control" name="dateofsubmission1" id="dateofsubmission1" value="<?php echo $row['pm_dos']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Project Title<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" id="title"  value="<?php echo $row['pm_title']; ?>"/>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label class="col-sm-3 control-label">Page URL</label>
                                <div class="col-sm-5">
                                    
                                </div>
                            </div>-->
                            <input type="hidden" class="form-control" name="pageurl" id="pageurl" value="<?php echo $row['pm_url']; ?>" />
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="description" id="description" ><?php echo $row['pm_desc']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">File Upload</label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['pm_filename']; ?>" />
                                    <input type="file" class="form-control" name="projectfile" id="projectfile" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="submit btn btn-info vd_bg-green">Update</button>
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
      $("#checkAll2").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
    function get_student(batch, semester = '') {
       var batch = $("#batch2").val();
        var course = $("#course2").val();
         var degree = $("#degree2").val();
         var semester = $("#semester2").val();
           var param = '<?php echo $param2; ?>';
        $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/batchwisestudentcheckbox/'+param,
           type: 'POST',
          data:{'batch':batch,'sem':semester,'course':course,'degree':degree},
           success: function(content){
               $("#student2").html(content);
           }
        });
    }
    
    function get_students(sem)
    {
       
       var batch = $("#batch2").val();
        var course = $("#course2").val();
         var degree = $("#degree2").val();
         var param = '<?php echo $param2; ?>';
         
         $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/checkboxstudent/'+param,
           type: 'POST',
           data: {'batch':batch,'sem':sem,'course':course,'degree':degree},
           success: function(content){
               //alert(content);
               $("#student2").html(content);
           }
        });
        
    }
    
    
    
    $("#degree2").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/project'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#course2").html(response);
                        $("#student2").html('');
                    }
                });
        });
        
         $("#course2").change(function(){
                var course = $(this).val();
                 var degree = $("#degree2").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batchs/project'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch2").html(response);
                        $("#student2").html('');
                        $.ajax({
                                type:"POST",
                                url:"<?php echo base_url().'index.php?admin/get_semester/'; ?>",
                                data:{'course':course},                   
                                success:function(response1){
                                    $("#semester2").html(response1);
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
        $("#dateofsubmission1").datepicker({
            dateFormat: ' MM dd, yy',
            minDate:0
        });
        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

        $("#frmeditproject").validate({
            rules: {
                degree: "required",
                course:"required",
                batch: "required",
                semester: "required",
               'student[]': "required",
                dateofsubmission1: "required",
                pageurl:
                        {
                            required: true,
                            url: true,
                        },
                projectfile: {
                    extension:'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt', 
                },
                title:
                        {
                            required: true,
                          
                        },
            },
            messages: {
                degree: "Select Course",
                course:"Select Branch",
                batch: "Select Batch",
                semester:"Select Semester", 
               'student[]':"Select Student",
                dateofsubmission1: "Select date of submission",
                pageurl:
                        {
                            required: "Enter page url",
                        },
                 projectfile: {                 
                        extension:'Upload valid file!',  
                     },
                title:
                        {
                            required: "Enter title",
                        },
            }
        });
    });
</script>
