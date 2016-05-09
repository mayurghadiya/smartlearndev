 <?php 
   $degree = $this->db->get('degree')->result_array();
        $courses = $this->db->get('course')->result_array();
        $semesters = $this->db->get('semester')->result_array();
        $professor = $this->db->get('professor')->result_array();
        ?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Subject Association");?>
                    </div>
                </div>
                <div class="panel-body"> 

                    <div class="box-content"> 
                                <div class="">
                                   <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                               </div>                                    
<?php echo form_open(base_url() . 'index.php?admin/subject/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmsubject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Subject Name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="subname" id="subname" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Subject Code");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="subcode" id="subcode" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select branch</option>
                                                    <?php
                                                    $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($course as $crs) {
                                                        ?>
                                                        <option value="<?= $crs->course_id ?>"><?= $crs->c_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester">
                                                    <option value="">Select semester</option>
                                                    
                                                </select>
                                                 <lable class="error" id="error_lable_exist" style="color:red"></lable>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("professor");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="professor[]" id="professor" multiple=""> 
                                                    <option value="">Select Professor</option>
                                                    <?php foreach($professor as $prof) : ?>
                                                    <option value="<?php echo $prof['professor_id']; ?>"><?php echo $prof['name']; ?></option>
                                                    <?php endforeach; ?>
                                                    
                                                </select>
                                                 
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" id="addsubject" class="btn btn-info vd_bg-green"><?php echo ucwords("Add ");?></button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                  </div>
              </div>
      </div>
               </div>
    <script type="text/javascript">
        
         $( "#addsubject" ).click(function( event ) {
          if($("#subname").val()!=null & $("#semester").val()!=null & $("#subcode").val()!=null & $("#course").val()!=null )
          { 
         $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/checksubjects'; ?>",
                    dataType:'json',
                   data:
                        {
                            'subname':$("#subname").val(),
                            'semester':$("#semester").val(),
                            'subcode':$("#subcode").val(),
                            'course':$("#course").val()
                        }, 
                                success:function(response){
                                    if(response.length == 0){
                                         $("#error_lable_exist").html('');
                                    $('#frmsubject').attr('validated',true);
                                    $('#frmsubject').submit();
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
       $("#course").change(function () {
        var course = $(this).val();
        var degree = $("#degree").val();
        var dataString = "course=" + course;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
            data: dataString,
            success: function (response) {
                $("#semester").html(response);
            }
        });
    });
        
        $(document).ready(function(){
        $("#subname").change(function(){ 
           $('#semester').val($("#semester option:eq(0)").val());
        });
        $("#course").change(function(){
             $('#semester').val($("#semester option:eq(0)").val());
        });
        $("#subcode").change(function(){
              $('#semester').val($("#semester option:eq(0)").val());
        });
        });
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        $().ready(function () {

            $("#frmsubject").validate({
                rules: {

                      subname:"required",                                                                  
                    subcode:"required",
                    course:"required",
                    semester:"required",                    
                    'professor[]': 
                            {
                    
                                 required:true,
                            },
                },
                messages: {

                subname: "Enter subject name",
                 subcode: "Enter subject code",                                                                  
                    course: "Select branch",
                    semester: "Select semester",                                       
                    'professor[]': 
                            {
                    
                                 required:"Select Professor",
                            },
                }
            });
        });
    </script>