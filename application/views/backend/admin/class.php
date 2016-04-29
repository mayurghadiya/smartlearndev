<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('class_list');?>
                </a>
			</li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_class');?>
                </a>
			</li>
		</ul>
    	<!------CONTROL TABS END------>
        
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">				
                <table class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>Class Name</div></th>
                    		<th><div>Teacher</div></th>                    		
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($classes as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<!--<td><?php echo $row['name'];?></td>
							<td><?php echo $row['std'];?></td>
							<td><?php echo $row['division'];?></td>	-->	
							<td><?php echo $row['name_numeric'];?></td>								
							<td><?php echo $this->crud_model->get_type_name_by_id('teacher',$row['teacher_id']);?>&nbsp;<?php								
								if(!empty($this->crud_model->get_teacher_name_by_id('teacher',$row['teacher_id']))){ ?>
								<a href="download.php?file_name=<?php echo $this->crud_model->get_teacher_name_by_id('teacher',$row['teacher_id']);?>" class="links"><i class="fa fa-download"></i></a>	
								<?php }	?>
							</td>
							<td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK -->
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_class/<?php echo $row['class_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK -->
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/classes/delete/<?php echo $row['class_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>
                                    </li>
                                </ul>
                            </div>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/classes/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Class Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
                                </div>
                            </div>
							<div id="drop">
								<div class="form-group">
									<label class="col-sm-3 control-label">Std</label>
									<div class="col-sm-5">
										<select style="width:100%;" class="form-control" name="std" id="dpstd">
												<option value="">Select Standard </option>
												<option value="1">1 </option>
												<option value="2">2 </option>
												<option value="3">3 </option>
												<option value="4">4 </option>
												<option value="5">5 </option>
												<option value="6">6 </option>
												<option value="7">7 </option>
												<option value="8">8 </option>
												<option value="9">9 </option>
												<option value="10">10 </option>
												<option value="11">11 </option>
												<option value="12">12 </option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Division</label>
									<div class="col-sm-5">
										<select style="width:100%;" class="form-control" name="division" id="dpdiv">
												<option value="">Select Division </option>
												<option value="A">A </option>
												<option value="B">B </option>
												<option value="C">C </option>
												<option value="D">D </option>
												<option value="E">E </option>
												<option value="F">F </option>
												<option value="G">G </option>
												<option value="H">H </option>
												<option value="I">I </option>
												<option value="J">J </option>											
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
                                <div class="col-sm-5">
                                    <select name="teacher_id" class="form-control" style="width:100%;">
                                    	<?php 
										$teachers = $this->db->get('teacher')->result_array();
										foreach($teachers as $row):
										?>
                                    		<option value="<?php echo $row['teacher_id'];?>"><?php echo $row['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">ID</label>
                                <div class="col-sm-5">
                                   <div class="detail">
										<input type="text" name="name_numeric" id="showoption" disabled="disabled">
								   </div>
								    <script type="text/javascript">
										$('#drop').change(
											function() {
												var val1 = $('#dpstd option:selected').val();
												var val2 = $('#dpdiv option:selected').val();
												var total =val1 + val2;
												if(val1 != '' && val2 != ''){
													$('.detail').find(':input').val(total);	
												}			
													// Do something with val1 and val2 ...
											}
										);
									</script>
								      
								   <?php //echo $row['name_numeric'];?></LABEL>
                                </div>
                            </div>                           
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo get_phrase('add_class');?></button>
                              </div>
						</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
		</div>
	</div>
</div>



<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

	jQuery(document).ready(function($)
	{	

		var datatable = $("#table_export").dataTable();
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
		
		$('#example').dataTable( {
				paging: false,
				searching: false
		} );
		
	});
		
</script>
<?php include('plus_icon.php'); ?>