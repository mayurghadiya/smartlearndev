  <?php 
   $degree = $this->db->get('degree')->result_array();
        $courses = $this->db->get('course')->result_array();
        $semesters = $this->db->get('semester')->result_array();?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Branch");?>
                    </div>
                </div>
                <div class="panel-body"> 

<div class="box-content"> 
                                <div class="">
                                   <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                               </div>                                    
<?php echo form_open(base_url() . 'index.php?admin/courses/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'courseform', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("course");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="degree" name="degree" class="form-control">
                                                    <option value="">--- Select Course ---</option>
                                                        <?php foreach ($degree as $srow) { ?>
                                                        <option value="<?php echo $srow['d_id']; ?>"><?php echo $srow['d_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("branch name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="c_name" id="c_name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("ID");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="course_alias_id" id="course_alias_id"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("semester");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="semester" name="semester[]" class="form-control" multiple>
                                                    <option value="">--- Select Semester ---</option>
                                                        <?php foreach ($semesters as $srow) { ?>
                                                        <option value="<?php echo $srow['s_id']; ?>"><?php echo $srow['s_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("description");?></label>
                                            <div class="col-sm-5">	
                                                <div class="chat-message-box">
                                                    <textarea name="c_description" id="c_description" rows="3" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                            <div class="col-sm-5">
                                                <select name="course_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                        
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("add");?></button>
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
    
        $(document).ready(function () {
         
            $("#courseform").validate({
                rules: {
                    degree:  "required",
                    c_name: 
                        {
                            required:true,
                            remote: {
                              url: "<?php echo base_url().'index.php?admin/check_course'; ?>",
                              type: "post",
                              data: {
                                course: function() {
                                  return $( "#c_name" ).val();
                                },
                                 degree: function() {
                                  return $( "#degree" ).val();
                                },
                              }
                            }
                        },
                    'semester[]':"required",
                    course_alias_id: "required",
                },
                messages: {
                    degree: "Select course",
                    c_name: 
                    {
                        required:"Enter branch name",
                        remote:"Record is already present in the system",
                    },
                    'semester[]':"Select semester",
                    course_alias_id: "Enter branch id",
                },
            });
        });
    </script>
