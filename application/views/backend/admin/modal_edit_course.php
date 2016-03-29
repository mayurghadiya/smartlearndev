
<?php 
$edit_data		=	$this->db->get_where('course' , array('course_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					Edit Course
            	</div>
            </div>
			<div class="panel-body">
				<div class="tab-pane box" id="add" style="padding: 5px">
					<div class="box-content">  
                <?php echo form_open(base_url() . 'index.php?admin/courses/do_update/'.$row['course_id'], array('class' => 'form-horizontal form-groups-bordered validate','id'=>'frmcourseedit','target'=>'_top'));?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Course Name<span style="color:red">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="c_name" id="c_name" value="<?php echo $row['c_name'];?>" />
                        </div>
                    </div>                   
                    <div class="form-group">
                       <label class="col-sm-3 control-label">ID<span style="color:red">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="course_alias_id" name="course_alias_id" value="<?php echo $row['course_alias_id'];?>"/>
                        </div>	
                    </div>
                        <div class="form-group">
                             <label class="col-sm-3 control-label">Select Degree<span style="color:red">*</span></label>
                              <div class="col-sm-5">
                                     <select id="degree" name="degree" class="form-control">
                                             <option value="">--- Select Degree ---</option>
                                             <?php 
                                             $sem = $this->db->get_where('degree')->result_array();
                                             foreach ($sem as $srow) { ?>
                                                     <option value="<?php echo $srow['d_id']; ?>" <?php if( $srow['d_id'] ==$row['degree_id']){ echo "selected=selected"; }?> ><?php echo $srow['d_name']; ?>
                                                     </option>
                                             <?php } ?>
                                     </select>
                             </div>	
                        </div>                 
                         <div class="form-group">
                       <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-5">
                             <textarea name="c_description" id="c_description" rows="5" class="form-control"><?php echo $row['c_description'];?></textarea>
                        </div>	
                    </div>                    
			<div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-5">
                                   <select name="course_status">
                                   <option value="1" <?php if($row['course_status'] == '1'){ echo "selected"; } ?>>Active</option>
                                   <option value="0" <?php if($row['course_status'] == '0'){ echo "selected"; } ?>>Inactive</option>	
                                   </select>
                            </div>	
                       </div>		
            		<div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                        <button type="submit" class="submit btn btn-info">Edit</button>
                                </div>
                        </div>
            </div> </div> </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>
<script type="text/javascript">
	$.validator.setDefaults({
		submitHandler: function(form) {			
			 form.submit();
		}
	});

	$(document).ready(function() {	
		$("#frmcourseedit").validate({		
			rules: {
				c_name: "required",
				course_alias_id: "required",
				  degree:  "required",
			},
			messages: {
                            c_name: "Enter course name",
                            course_alias_id: "Enter course id",
                            degree: "Select degree",
			}
		});
	});
	</script>
        
        