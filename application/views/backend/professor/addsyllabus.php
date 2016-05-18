 <?php 
 ?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Syllabus");?>
                    </div>
                </div>
                <div class="panel-body"> 
<div class="box-content">  
<div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>                                       
<?php echo form_open(base_url() . 'index.php?professor/syllabus/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmsyllabus', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Syllabus Title");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                             <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Course");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select Course</option>
                                                    <?php
                                                   
                                                    foreach ($degree as $dgr) {
                                                        ?>
                                                        <option value="<?= $dgr->d_id ?>"><?= $dgr->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select Branch</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester">
                                                    <option value="">Select Semester</option>
                                                    <?php
                                                    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                                    foreach ($datasem as $rowsem) {
                                                        ?>
                                                        <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                       
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("File Upload");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="syllabusfile" id="syllabusfile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add ");?></button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                    
                  </div>
              </div>
      </div>
               </div>  <script type="text/javascript"> 
      
        
        
        $("#degree").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?professor/get_course/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#course").html(response);
                    }
                });
        });
        
        
         $("#course").change(function(){
                var course = $(this).val();
                 var degree = $("#degree").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?professor/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch").html(response);
                        
                        $.ajax({
                           type: "POST",
                           url: "<?php echo base_url() . 'index.php?professor/get_semester'; ?>",
                           data: dataString,
                           success: function (response1) {
                               $("#semester").html(response1);
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
        $("#submissiondate").datepicker({
            dateFormat: ' MM dd, yy',
            minDate: 0
        });

        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z ]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

        $("#frmsyllabus").validate({
            rules: {
                degree: "required",
                course: "required",                
                semester: "required",
                submissiondate: "required",
                syllabusfile: {
                            required:true,
                            extension:'pdf|doc|docx|ppt|pptx',  

                    },
                title:
                        {
                            required: true,                                                                              
                        },

            },
            messages: {
                degree:"Select Course",
                course: "Select Branch",
                
                semester: "Select Semester",
                syllabusfile: {
                    required: "Upload file",
                        extension:'Upload PDF file only',  
                    },
                title:
                        {
                            required: "Enter title",
                        },
            }
        });
    });
    </script>