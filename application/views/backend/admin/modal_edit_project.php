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
                            <?php echo form_open(base_url() . 'index.php?admin/project/do_update/' . $row['pm_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditproject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Degree</label>
                                <div class="col-sm-5">
                                    <select name="degree" id="degree2">
                                        <option value="">Select degree</option>
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
                                <label class="col-sm-3 control-label">Course</label>
                                <div class="col-sm-5">
                                    <select name="course" id="course2">
                                        <option value="">Select course</option>
                                        <?php
                                        $course = $this->db->get_where('course', array('course_status' => 1))->result();
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
                                <label class="col-sm-3 control-label">Batch</label>
                                <div class="col-sm-5">
                                    <select name="batch"  id="batch2" onchange="get_student(this.value);">
                                        <option value="">Select batch</option>
                                            <?php
                                            $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
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
                                <label class="col-sm-3 control-label">Semester</label>
                                <div class="col-sm-5">
                                    <select name="semester"  id="semester"  onchange="get_students(this.value);">
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
                                <label class="col-sm-3 control-label">Student</label>
                                <div class="col-sm-5">
                                    <select name="student[]" id="student2" multiple>
                                        <option value="">Select student</option>
                                        <?php
                                        $stu=explode(',',$row['pm_student_id']);
                                        
                                        $datastudent = $this->db->get_where('student', array('std_degree'=>$row['pm_degree'],
                                                                                            'course_id'=>$row['pm_course'],
                                                                                             'std_batch'=>$row['pm_batch'],
                                                                                              'semester_id'=>$row['pm_semester']))->result();
//                                       
                                        foreach ($datastudent as $rowstu) {
                                             if(in_array($rowstu->std_id, $stu)) {
                                                ?>
                                                <option value="<?= $rowstu->std_id ?>" selected><?= $rowstu->name ?></option>
            <?php
        } else {
            ?>
                                                <option value="<?= $rowstu->std_id ?>"><?= $rowstu->name ?></option>
            <?php
        }
    }
    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Date of Submission</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="dateofsubmission1" id="dateofsubmission1" value="<?php echo $row['pm_dos']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Title</label>
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
                                    <button type="submit" class="submit btn btn-info">Edit</button>
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
    
    function get_student(batch, semester = '') {
        $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/batchwisestudent/',
           type: 'POST',
           data: {'batch':batch},
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
         $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/semwisestudent/',
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
                student: "required",
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
                degree: "Please select degree",
                course:"Please select course",
                batch: "Please select batch",
                semester: "Please select semester",
                student: "Please select student",
                dateofsubmission1: "Please select date of submission",
                pageurl:
                        {
                            required: "Please enter page url",
                        },
                 projectfile: {
                                                                        
                                                                       
                                                                       extension:'Please upload valid file!',  
                                                                    },
                title:
                        {
                            required: "Please enter title",
                           
                        },
            }
        });
    });
</script>
