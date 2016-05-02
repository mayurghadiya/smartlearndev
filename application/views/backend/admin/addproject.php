<div class="box-content">  
<div class="">
                                    <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                                </div>                                      
<?php echo form_open(base_url() . 'index.php?admin/project/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmproject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Project Title");?><span style="color:red">*</span></label>
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
$datadegree = $this->db->get_where('degree', array('d_status' => 1))->result();
foreach ($datadegree as $rowdegree) {
    ?>
                                                        <option value="<?= $rowdegree->d_id ?>"><?= $rowdegree->d_name ?></option>
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
                                                    <?php
                                                 /*   $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($course as $crs) {
                                                        ?>
                                                        <option value="<?= $crs->course_id ?>"><?= $crs->c_name ?></option>
                                                        <?php
                                                    }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch" onchange="get_student2(this.value);" >
                                                    <option value="">Select batch</option>
                                                    <?php
                                                    /*$databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                    foreach ($databatch as $row) {
                                                        ?>
                                                        <option value="<?= $row->b_id ?>"><?= $row->b_name ?></option>
                                                            <?php
                                                        }                                                    
                                                     */
                                                        ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester"  onchange="get_students2(this.value);">
                                                    <option value="">Select semester</option>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Student");?><span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                 <input type="checkbox" name="checkall" id="select_all"  >Check All<br>
                                                <div id="student"></div>
                                                <label class="error" for="student[]"></label>
                                                <!--<select name="student[]" id="student" multiple="">
                                                    <option value="">Select student</option>
                                                                                                  </select>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Date of Submission");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text"  readonly="" class="form-control" name="dateofsubmission" id="dateofsubmission" />
                                            </div>
                                        </div>
                                           <input type="hidden" class="form-control" name="pageurl" id="pageurl" />
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("File Upload");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="projectfile" id="projectfile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" id="btnadd" class="btn btn-info vd_bg-green"><?php echo ucwords("Add");?></button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
      <script type="text/javascript">
     
      
    $("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
        
          $("#degree").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/project'; ?>",
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
                    url:"<?php echo base_url().'index.php?admin/get_batchs/project'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch").html(response);
                        $.ajax({
                                    type:"POST",
                                    url:"<?php echo base_url().'index.php?admin/get_semester/'; ?>",
                                    data:{'course':course},                   
                                    success:function(response){
                                        $("#semester").html(response);
                                    }
                                });
                    }
                });
        });
        
        function get_student2(batch, semester = '') {
         var batch = $("#batch").val();
        var course = $("#course").val();
         var degree = $("#degree").val();
         var semester = $("#semester").val();
        $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/batchwisestudentcheckbox/',
           type: 'POST',
          data:{'batch':batch,'sem':semester,'course':course,'degree':degree},
           success: function(content){
               $("#student").html(content);
           }
        });
    }
    
    function get_students2(sem)
    {
       var batch = $("#batch").val();
        var course = $("#course").val();
         var degree = $("#degree").val();
         $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/checkboxstudent/',
           type: 'POST',
           data: {'batch':batch,'sem':sem,'course':course,'degree':degree},
           success: function(content){
               //alert(content);
               $("#student").html(content);
           }
        });
        
        
    }
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

$( "#btnadd" ).click(function( event ) {
          if($("#degree").val()!=null & $("#course").val()!=null & $("#batch").val()!=null & $("#semester").val()!=null & $("#title").val()!=null)
          { 
         $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/checkprjects'; ?>",
                    dataType:'json',
                   data:
                        {
                            'degree':$("#degree").val(),
                            'course':$("#course").val(),
                            'batch':$("#batch").val(),
                            'semester':$("#semester").val(),
                            'title':$("#title").val(),
                        }, 
                                success:function(response){
                                    if(response.length == 0){
                                         $("#error_lable_exist").html('');
                                    $('#frmproject').attr('validated',true);
                                    $('#frmproject').submit();
                                     } else
                                         {
                                             $("#error_lable_exist").html('Project is already present in the system');
                                         return false;
                                     }
                    }
                });
                    return false; 
                    }
        event.preventDefault();
      });
    $().ready(function () {
        $("#dateofsubmission").datepicker({
            dateFormat: ' MM dd, yy',
            minDate:0           
        });
        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z ]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

        $("#frmproject").validate({
            rules: {
                degree: "required",
                course:"required",
                batch: "required",
                semester: "required",
                'student[]': "required",
                dateofsubmission: "required",
                pageurl:
                        {
                            required: true,
                            url: true,
                        },
                projectfile: {
                    required:true,
                   extension:'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt', 
                },
                title:
                        {
                            required: true,                                                                          },
            },
            messages: {                                                                  
                        degree: "Select Course",
                        course:"Select Branch",
                        batch: "Select Batch",
                        semester:"Select Semester",                                                                           
                        'student[]':"Select Student",
                        dateofsubmission: "Select date of submission",
                        projectfile: {
                            required:"Upload file!",
                           extension:'Upload valid file!',  
                        },
                        title:
                            {
                                required: "Enter project name",                                                                            
                            },
            }
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox1').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox1').each(function(){
                this.checked = false;
            });
        }
    });
    
});
    
    </script>