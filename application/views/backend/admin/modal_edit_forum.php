<?php 
	$edit_data		=	$this->db->get_where('forum' , array('forum_id' => $param2) )->result_array();
	foreach ( $edit_data as $row):
?>

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
<div class="panel-title" >
        <i class="entypo-plus-circled"></i>
                    <?php echo ucwords("Update Forum");?>    
                </div>
        </div>
        <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                             <div class="">
                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                </div>
                              <?php echo form_open(base_url() . 'forum/crud/update/'.$param2, array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Title<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="forum_title" id="forum_title" value="<?php echo $row['forum_title']; ?>" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="forum_status">
                                                    <option value="1" <?php if($row['forum_status']=="1"){ echo "selected=selected"; } ?>>Active</option>
                                                    <option value="0"  <?php if($row['forum_status']=="0"){ echo "selected=selected"; } ?>>Inactive</option>		
                                                </select>	

                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add forum</button>
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
	$.validator.setDefaults({
		submitHandler: function(form) {			
			form.submit();
		}
	});
	
	$(document).ready(function() {	
		$("#frmadmissiontypeedit").validate({		
			rules: {
				at_name: "required",
				at_status: "required",
			},
			messages: {
				at_name: "Please enter admission type Name",
				at_status: "Please slect admission status",
			}
		});
	});
</script>
