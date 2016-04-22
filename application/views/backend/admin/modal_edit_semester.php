<?php 
$edit_data		=	$this->db->get_where('semester' , array('sem_id' => $param2) )->result_array();

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
				 <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>
                <?php echo form_open(base_url() . 'index.php?admin/semester/do_update/'.$row['sem_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                  	<div class="form-group">                       
						<label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
							<div class="col-sm-5">
								<select name="class_id" class="form-control" style="width:100%;">
									<?php 
										$class = $this->db->get('class')->result_array();
										foreach($subjects_list as $crow):
										?>
                                    		<option value="<?php echo $crow['class_id'];?>"  <?php if($row['class_id'] == $crow['class_id'])echo 'selected';?>><?php echo $crow['name'];?></option>
                                        <?php
										endforeach;
										?>
								</select>
							</div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Semester Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="sem_name" value="<?php echo $row['sem_name'];?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Sem-Start</label>
							<div class="col-sm-5">
                                <input type="text" value="<?php echo $row['sem_start'];?>" class="datepicker form-control" name="sem_start" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-3 control-label">Sem-End</label>
							<div class="col-sm-5">
                                <input type="text" value="<?php echo $row['sem_end'];?>" class="datepicker form-control" name="sem_end" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID</label>
                        <div class="col-sm-5">
							<input type="text" class="form-control" name="semester_id" value="<?php echo $row['semester_id'];?>"/>
                          
                        </div>
                    </div>                  
            		<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info">Edit Semester</button>
						</div>
					</div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>


