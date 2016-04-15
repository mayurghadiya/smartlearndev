<?php
$edit_data = $this->db->get_where('library_manager', array('lm_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        Edit Library
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                            <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>  
                            <?php echo form_open(base_url() . 'index.php?admin/library/do_update/' . $row['lm_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditlibrary', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Course <span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="degree" id="degree2">
                                        <option value="">Select Course</option>
                                         <option value="All" <?php if($row['lm_degree']=="All"){ echo "selected=selected"; } ?>>All</option>
                                        <?php
                                        $datadegree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                        foreach ($datadegree as $rowdegree) {
                                            if ($rowdegree->d_id == $row['lm_degree']) {
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
                                <label class="col-sm-3 control-label">Branch <span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="course" id="course2">
                                        <option value="">Select Branch</option>
                                         <option value="All" <?php if($row['lm_course']=="All"){ echo "selected=selected"; } ?>>All</option>
                                        <?php
                                        $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                        foreach ($course as $crs) {
                                           
                                                ?>
                                                <option value="<?php echo $crs->course_id ?>" <?php if($crs->course_id==$row['lm_course']){ echo "selected='selected'";} ?> ><?= $crs->c_name ?></option>
                                           <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Batch <span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="batch" id="batch2" onchange="get_student(this.value);"  >
                                        <option value="">Select batch</option>
                                          <option value="All" <?php if($row['lm_batch']=="All"){ echo "selected=selected"; } ?>>All</option>
    <?php
    $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
    foreach ($databatch as $row1) {
        if ($row1->b_id == $row['lm_batch']) {
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
                                <label class="col-sm-3 control-label">Semester <span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="semester" id="semester2" onchange="get_students(this.value);">
                                        <option value="">Select semester</option>
                                        <option value="All" <?php if($row['lm_semester']=="All"){ echo "selected=selected"; } ?>>All</option>   
    <?php
    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
    foreach ($datasem as $rowsem) {
        if ($rowsem->s_id == $row['lm_semester']) {
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
                                <label class="col-sm-3 control-label">Library Name <span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="title" id="title"  value="<?php echo $row['lm_title']; ?>"/>
                                </div>
                            </div>

                             <div class="form-group">
                                <label class="col-sm-3 control-label">Date <span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="dateofsubmission1" id="dateofsubmission1" value="<?php echo $row['lm_dos']; ?>"/>
                                </div>
                            </div>
                            
                             <input type="hidden" class="form-control" name="pageurl" id="pageurl" value="<?php echo $row['lm_url']; ?>" />
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="description" id="description" ><?php echo $row['lm_desc']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">File Upload <span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['lm_filename']; ?>" />

                                    <input type="file" class="form-control" name="libraryfile" id="libraryfile" />
                                   
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

    function get_student(batch, semester = '') {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/batchwisestudent/',
            type: 'POST',
            data: {'batch': batch},
            success: function (content) {
                $("#student2").html(content);
            }
        });
    }

    function get_students(sem)
    {
       /* var batch = $("#batch2").val();
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/semwisestudent/',
            type: 'POST',
            data: {'batch': batch, 'sem': sem},
            success: function (content) {
                //alert(content);
                $("#student2").html(content);
            }
        });
        */
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
                    url:"<?php echo base_url().'index.php?admin/get_cource/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        if(degree=="All")
                        {

                             $("#batch2").val($("#batch2 option:eq(1)").val());
                             $("#course2").val($("#course2 option:eq(1)").val());
                              $("#semester2").val($("#semester2 option:eq(1)").val());
                        /*$("#course2").html(response);
                        $("#batch2").html(response);
                        $("#semester2").prepend(response);
                        
                         $("#semester2").val($("#semester2 option:first").val());

                         */
                    }else{
                        $("#course2").html(response);
                    }

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
                                $.ajax({
                                type:"POST",
                                url:"<?php echo base_url().'index.php?admin/get_semesterall/'; ?>",
                                data:{'course':course},                   
                                success:function(response1){
                                 $("#semester2").html(response1);
                                 $("#semester2").val($("#semester2 option:eq(1)").val());
                                }
                                });
                         // $("#semester2").val($("#semester2 option:eq(1)").val());
                        $("#batch2").html(response);
                    }
                });
        });


    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });
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

    $().ready(function () {
        $("#frmeditlibrary").validate({
            rules: {
                degree: "required",
                course:"required",
                batch: "required",
                semester: "required",
                student: "required",
                dateofsubmission1: "required",               
                title:
                        {
                            required: true,
                           
                        },
                libraryfile: {
                    
                    extension:'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt',  
                                                                            
                },
            },
            messages: {
                degree: "Please select Course",
                course:"Please select Branch",
                batch: "Please select batch",
                semester: "Please select semester",
                student: "Please select student",
                dateofsubmission1: "Please select date of submission",              
                title:
                        {
                            required: "Please enter title",
                           
                        },
                        libraryfile: {
                                   
                                    extension:'Please upload valid file',  
                                },
            }
        });
    });
</script>
