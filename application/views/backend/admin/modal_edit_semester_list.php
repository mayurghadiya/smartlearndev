<?php 
	$edit_data		=	$this->db->get_where('semester' , array('s_id' => $param2) )->result_array();
	foreach ( $edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					Update Semester
				</div>
			</div>
			<div class="panel-body">
				<div class="tab-pane box" id="add" style="padding: 5px">
					<div class="box-content">  
                                             <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>
						<?php echo form_open(base_url() . 'index.php?admin/semester/do_update/'.$row['s_id'] , array('class' => 'form-horizontal form-groups-bordered validate','id'=>'editsem','target'=>'_top'));?>
						<div class="form-group">
							<label class="col-sm-3 control-label">Semester Name<span style="color:red">*</span></label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="s_name" id="s_name" value="<?php echo $row['s_name'];?>"   />
							</div>
						</div>                  
						<div class="form-group">
							<label class="col-sm-3 control-label">Status</label>
							<div class="col-sm-5">
							<select name="semester_status">
								<option value="1" <?php if($row['s_status'] == '1'){ echo "selected"; } ?>>Active</option>
								<option value="0" <?php if($row['s_status'] == '0'){ echo "selected"; } ?>>Inactive</option>		
							</select>
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
	$.validator.setDefaults({
		submitHandler: function(form) {			
			form.submit();
		}
	});
	
	$().ready(function() {	
		$("#editsem").validate({		
			rules: {
				s_name: "required",
			},
			messages: {
				s_name: "Enter semester name",
			}
		});
	});
</script>

