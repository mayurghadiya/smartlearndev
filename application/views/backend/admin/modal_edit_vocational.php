<?php 
$edit_data		=	$this->db->get_where('vocational_course' , array('vocational_course_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
    
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                   <?php echo ucwords("Update vocational course");?>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                         <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>
                <?php echo form_open(base_url() . 'index.php?admin/vocationalcourse/do_update/'.$row['vocational_course_id'] , array('class' => 'form-horizontal form-groups-bordered validate','id'=>'frmvocationalcourseedit','target'=>'_top'));?>
                       <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("course name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="course_name" id="course_name" value="<?php echo $row['course_name'];?>" />
                                            </div>
                                        </div>	
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("start date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" readonly="" name="startdate1" id="startdate1" value="<?php echo date('d F Y', strtotime($row['course_startdate'])); ?>"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("end date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" readonly="" name="enddate1" id="enddate1" value="<?php echo date('d F Y', strtotime($row['course_enddate'])); ?>" />
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                           <label class="col-sm-3 control-label"><?php echo ucwords("Course Category"); ?><span style="color:red">*</span></label>
                                           <div class="col-sm-5">
                                               <?php
                                               $category = $this->db->get('course_category')->result_array();
                                               ?>
                                               <select id="category_id" name="category_id" class="form-control">
                                                   <option value="">Select Category</option>
                                                   <?php foreach ($category as $crow) { ?>
                                                       <option value="<?php echo $crow['category_id']; ?>" <?php if($crow['category_id']==$row['category_id']){  echo "selected=selected"; } ?>><?php echo $crow['category_name']; ?>
                                                       </option>
                                                   <?php } ?>
                                               </select>
                                           </div>	
                                       </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("course fee"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="fee" id="fee" value="<?php echo $row['course_fee'];?>" />
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Professor"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <?php
                                                $professor = $this->db->get('professor')->result_array();
                                                ?>
                                                <select id="professor" name="professor" class="form-control">
                                                    <option value="">Select professor</option>
                                                    <?php foreach ($professor as $srow) { 
                                                        if($srow['professor_id']==$row['professor_id'])
                                                        {
                                                        ?>
                                                        <option selected value="<?php echo $srow['professor_id']; ?>"><?php echo $srow['name']; ?>
                                                        </option>
                                                    <?php
                                                        }
                                                        else {
                                                            ?>
                                                        <option selected value="<?php echo $srow['professor_id']; ?>"><?php echo $srow['name']; ?>
                                                        </option>
                                                        <?php
                                                        }                                                    
                                                        } ?>
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                            <div class="col-sm-5">
                                                <select name="course_status">
                                                  <option value="1" <?php if($row['status'] == '1'){ echo "selected"; } ?>>Active</option>
                                                     <option value="0" <?php if($row['status'] == '0'){ echo "selected"; } ?>>Inactive</option>	
                                                </select>
                                                <lable class="error" id="error_lable_exist" style="color:red"></lable>
                                            	
                                            </div>
                                             
                                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update");?></button>
                            </div>
                        </div>
                    </div> </div> </div>
        </div>
    </div>
</div>
    
<?php
endforeach;
?>

  <script>
         $(document).ready(function () {
         $("#startdate1").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                onClose: function (selectedDate) {
                    $("#enddate1").datepicker("option", "minDate", selectedDate);
                }
            });
            
            $("#enddate1").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                onClose: function (selectedDate) {
                    $("#startdate1").datepicker("option", "maxDate", selectedDate);
                }
            });
            
             $("#frmvocationalcourseedit").validate({
                rules: {
                course_name: "required",
                professor: "required",
                category_id:"required",
                fee: {
                        required: true,
                        currency: ['$', false]
                    },
                course_status: "required",
                startdate1: "required",
                enddate1: "required",
            },
            messages: {
                course_name: "Enter course name",
                professor: "Select professor",
                category_id:"Select category",
                fee: {
                        required: "Enter  fee",
                        currency: "Enter valid amount"
                    },
                course_status: "Select status",
                startdate1: "Select date",
                enddate1: "Select date",
            }
            });
            
          });
        </script>
