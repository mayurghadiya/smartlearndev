<div class="box-content">
	<div class="form-group">
		<label class="col-sm-3 control-label">Select Report</label>
		<div class="">	
			<select name="report_list" style="width:100%;" class="form-control" data-validate="required" id="report_list" data-message-required="<?php echo get_phrase('value_required');?>">
				<option value="">Select Report</option>
				<option value="student_listing">Students Listing</option>
				<option value="ind_student">Individual Student Report</option>
				<option value="non_teaching">Non-Teaching Staff Listing</option>
				<option value="fees_listing">Fees Listing</option>
				<option value="holiday_list">Holiday List</option>
				<option value="notification_list">Notification List</option>				
				<option value="study_materials">Study Materials Uploaded</option>				
				<option value="staff_attendence">Staff Attendance</option>				
				<option value="group_list">Group Listings</option>	
				<option value="parent_list">Parent Listings</option>
				<option value="exam_list">Exam Listings</option>				
			</select>	
		</div>
	</div>		
</div>
		
	<!-- Dev :==> Brijesh Dhami
				Disc :==> Report For Student List --->
				<div class="row" id="student_listing" style="display: none">
					<div class="col-md-12">		
						<form action="" method="post">
							<div class="form-group">
								<select name="report_list" style="width:30%;" class="form-control" id="student_list" style="display: none" >
									<option value="">Select Student list</option>
									<option value="class_wise_student">Class Wise</option>
									<option value="standard_student">Standard wise</option>
									<option value="all_student">All</option>				
								</select>
							</div>
                          </form>	
					</div>
				</div>                
				<div id="main_student_list">
					<div id="student_sub_1" style="display:none;"> 
						<?php echo form_open(base_url() . 'index.php?admin/std_list_pdf/class_wise_std' , array('class' => 'form-horizontal validate'));?>	
							<div class="form-group"> 
								<select name="class_id" style="width:30%;" class="form-control" 
								data-validate="required" id="student_list" data-message-required="<?php echo get_phrase('value_required');?>" style="display: none">
								<option value="">Select Class</option>
								<?php $attandance_class=$this->db->get('class')->result_array(); foreach($attandance_class as $attandance_class_row): ?>
								<option value="<?php echo $attandance_class_row['name_numeric']; ?>"><?php echo $attandance_class_row['name_numeric']; ?> </option>
								<?php endforeach;  ?>				
								</select>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-info">Submit</button>
								</div>
							</div> 
						</form>
					</div>                           
					<div id="student_sub_2" style="display:none;">
						<?php echo form_open(base_url() . 'index.php?admin/std_list_pdf/standard_student' , array('class' => 'form-horizontal validate'));?>	
							<div class="form-group"> 
								<select name="std_name" style="width:30%;" class="form-control" 
								data-validate="required" id="student_list" data-message-required="<?php echo get_phrase('value_required');?>" style="display: none">
									<option value="">Select Standard</option>
									<?php for($h=1; $h<=12; $h++){ ?>
									<option value="<?php echo $h;?>"><?php echo $h;?></option>
									<?php }  ?> 			
								</select>
							</div>                          
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-info">Submit</button>
								</div>
							</div> 
						</form>
					</div>                          
				   <div id="student_sub_3" style="display:none;"> 
						<?php echo form_open(base_url() . 'index.php?admin/std_list_pdf/all_student' , array('class' => 'form-horizontal validate'));?>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-info">Submit</button>
								</div>
							</div> 
						</form>
				   </div>
			</div>
			<!-- End Student list report -->


		<!-- Dev :==> Brijesh Dhami 
				Disc :==> Report For Individual Student list --->
		
				<div class="row" id="ind_student" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/ind_student_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Student Name</label>
										<div class="col-sm-5">
											 <input type="text" class="form-control" name="student_name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"/>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
								</form>	
							</div>		
						</div>
					</div>
				</div>
		<!-- End Non-Teaching report -->

		<!-- Dev :==> Brijesh Dhami 
				Disc :==> Report For Fees List --->
		
				<div class="row" id="fees_listing" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/fees_list_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Fees Listing</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
								</form>	
							</div>		
						</div>
					</div>
				</div>
		<!-- End Non-Teaching report -->

		<!-- Dev :==> Brijesh Dhami 
				Disc :==> Report For Non-Teaching List --->
		
				<div class="row" id="non_teaching" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/non_teaching_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Non-Teaching Staff Listing</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
								</form>	
							</div>		
						</div>
					</div>
				</div>
		<!-- End Non-Teaching report -->
		
		<!-- Dev :==> Brijesh Dhami 
				Disc :==> Report For Holiday List --->
				<div class="row" id="holiday" style="display: none">
					<div class="col-md-12">		
						<?php echo form_open(base_url() . 'index.php?admin/holiday_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
							<div class="form-group">
								<label class="col-sm-3 control-label">Holiday List</label>
							</div>	
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" class="btn btn-info">Submit</button>
								</div>
							</div> 
						</form>	
					</div>
				</div>
			<!-- End Holiday report -->
			
			<!-- Dev :==> Brijesh Dhami 
				Disc :==> Report For Notification List --->	
				<div class="row" id="notification" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/notification_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Notifications List</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
								</form>	
							</div>		
						</div>
					</div>
				</div>	
			<!-- End Non-Teaching report -->
			
			<!-- Dev :==> Brijesh Dhami 
				Disc :==> Report For Study Materials Uploaded List --->
				
		
				<div class="row" id="study_materials" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/share_materials_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Study Materials Listing</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
								</form>	
							</div>		
						</div>
					</div>
				</div>
		<!-- End Non-Teaching report -->	
	
			
			<!-- Dev :==> Brijesh Dhami 
				Disc :==> Report For Staff Attendance List --->
		
				<div class="row" id="staff_attendence" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/staff_attendence_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Staff Attendance Listing</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
								</form>	
							</div>		
						</div>
					</div>
				</div>
		<!-- End Non-Teaching report -->	
				
			<!-- Dev :==> Brijesh Dhami 
				Disc :==> Report For Group List --->
		
				<div class="row" id="group_list" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/group_list_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Group Listing</label>
									</div>	
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
								</form>	
							</div>		
						</div>
					</div>
				</div>
				
				
				<div class="row" id="parent_list" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/parent_list_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Parent Listing</label>
									</div>
									<div class="form-group">
									<div class="col-md-3">
									<div class="form-group">
										<label class="col-sm-5 control-label">Parent List</label>
									</div>
									<select class="form-control" id="pclass" name="poption">
										<option value=''>Select</option>
										<option value='1'>Class</option>
										<option value='2'>Standard</option>
										<option value='3'>All</option>
									</select>
									</div>
									<div class="col-md-3" id="plcass1" style="display:none">	
									<div class="form-group">
										<label class="col-sm-5 control-label">Class</label>
									</div>
									<select class="form-control" id="pclass" name="pclass">
										<?php 
										$this->db->select('class_id,name_numeric');
										$this->db->from('class');
										$query = $this->db->get();
										$classes =$query->result();
										$count = 1;
										foreach($classes as $att_row):			
										?>
										<option value='<?php echo $att_row->name_numeric;?>'><?php echo $att_row->name_numeric;?></option>
										<?php 						
										endforeach;  ?>
									</select>
									<div class="form-group"></div>
									<div class="form-group">
										<div class="col-md-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
									</div>
									<div class="col-md-3" id="plcass2" style="display:none">
									<div class="form-group">
										<label class="col-sm-5 control-label">Standard</label>
									</div>	
										<select class="form-control" id="pstand" name="pstand">
											<?php for($i=1;$i<=12;$i++){ ?>
											<option value="<?php echo $i;?>"><?php echo $i; ?></option>
											<?php } ?>
										</select>
									<div class="form-group"></div>
									<div class="form-group">
										<div class="col-md-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 	
									</div>
									<div class="col-md-3" id="plcass3" style="display:none" >
										<div class="form-group">
											<label class="col-sm-5 control-label"></label>
										</div>
										<div class="form-group"></div>
										<div class="form-group">
											<div class="col-md-5">
												<button type="submit" class="btn btn-info" value="all" name="all">Submit</button>
											</div>
										</div> 
									</div>
									</div>
									<!--<div class="col-md-10">	
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-5">
											<button type="submit" class="btn btn-info">Submit</button>
										</div>
									</div> 
									</div>-->
								</form>	
											
						</div>
					</div>
				</div>
		</div>
		
		
		<div class="row" id="exam_list" style="display: none">
					<div class="col-md-12">	
						<div class="tabs-vertical-env">
							<div class="tab-content">
								<?php echo form_open(base_url() . 'index.php?admin/exam_list_pdf' , array('class' => 'form-horizontal form-groups-bordered validate'));?>
									<div class="form-group">
										<label class="col-sm-3 control-label">Exam Listing</label>
									</div>	
									<div class="col-md-3" id="examlist">	
										<div class="form-group pull-left">
											<label class="col-sm-5 control-label">Exam</label>
										</div>
										<select class="form-control" id="examlist" name="examlist">
										<option value=''>Select Exam</option>
											<?php 
											$this->db->select('exam_id,name');
											$this->db->from('exam');
											$query = $this->db->get();
											$classes =$query->result();
											$count = 1;
											foreach($classes as $att_row):			
											?>
											<option value='<?php echo $att_row->exam_id;?>'><?php echo $att_row->name;?></option>
											<?php 						
											endforeach;  ?>
										</select>
									</div>
									<div class="col-md-3">
									<div class="form-group">
											<label class="col-sm-5 control-label"></label>
										</div>
										<div class="form-group"></div>
											<div class="col-md-5">
												<button type="submit" class="btn btn-info">Submit</button>
											</div>
									</div> 
								</form>	
							</div>		
						</div>
					</div>
				</div>
		<!-- End Non-Teaching report -->
		

 <script type="text/javascript">
        $(function () {
            $("#report_list").change(function () {
                if ($(this).val() == "non_teaching") {
                    $("#holiday").hide();
					$("#notification").hide();
					$("#student_listing").hide();
					$("#group_list").hide();
					$("#fees_listing").hide();
					$("#study_materials").hide();
					$("#staff_attendence").hide();
					$("#ind_student").hide();
					$("#attendance").hide();
					$("#non_teaching").show();
					$("#parent_list").hide();
					$("#exam_list").hide();						
                } else if ($(this).val() == "holiday_list") {
                    $("#holiday").show();
					$("#ind_student").hide();
					$("#notification").hide();
					$("#non_teaching").hide();
					$("#fees_listing").hide();
					$("#student_listing").hide();
					$("#study_materials").hide();
					$("#staff_attendence").hide();
					$("#attendance").hide();
					$("#group_list").hide();
					$("#parent_list").hide();
					$("#exam_list").hide();	
                }else if ($(this).val() == "notification_list") {
                    $("#notification").show();
					 $("#holiday").hide();
					 $("#ind_student").hide();
					 $("#fees_listing").hide();
					 $("#non_teaching").hide();
					 $("#student_listing").hide();
					 $("#study_materials").hide();
					 $("#staff_attendence").hide();
					 $("#attendance").hide();
					 $("#group_list").hide();
					 $("#parent_list").hide();
					$("#exam_list").hide();	
                }else if ($(this).val() == "group_list") {
                    $("#notification").hide();
					 $("#holiday").hide();
					 $("#ind_student").hide();
					 $("#non_teaching").hide();
					 $("#student_listing").hide();
					 $("#fees_listing").hide();
					 $("#study_materials").hide();
					 $("#staff_attendence").hide();
					 $("#attendance").hide();
					 $("#group_list").show();
					 $("#parent_list").hide();
					$("#exam_list").hide();	
                }else if ($(this).val() == "fees_listing") {
                    $("#notification").hide();
					 $("#holiday").hide();
					 $("#ind_student").hide();
					 $("#non_teaching").hide();
					 $("#fees_listing").hide();
					 $("#student_listing").hide();
					 $("#group_list").hide();
					 $("#staff_attendence").hide();
					 $("#study_materials").hide();
					 $("#attendance").show();
					 $("#parent_list").hide();
					$("#exam_list").hide();	
                }else if ($(this).val() == "study_materials") {
                    $("#notification").hide();
					 $("#holiday").hide();
					 $("#ind_student").hide();
					 $("#non_teaching").hide();
					 $("#fees_listing").hide();
					 $("#student_listing").hide();
					 $("#group_list").hide();	
					 $("#staff_attendence").hide();					 
					 $("#study_materials").show();
					 $("#attendance").show();
					 $("#parent_list").hide();
					$("#exam_list").hide();	
                }else if ($(this).val() == "staff_attendence") {
                    $("#notification").hide();
					 $("#holiday").hide();
					 $("#ind_student").hide();
					 $("#non_teaching").hide();
					 $("#student_listing").hide();
					 $("#fees_listing").hide();
					 $("#group_list").hide();	
					 $("#staff_attendence").show();					 
					 $("#study_materials").hide();
					 $("#attendance").hide();
					 $("#parent_list").hide();
					$("#exam_list").hide();	
                }else if ($(this).val() == "ind_student") {
                    $("#notification").hide();
					 $("#holiday").hide();
					 $("#ind_student").show();
					 $("#non_teaching").hide();
					 $("#fees_listing").hide();
					 $("#group_list").hide();
					 $("#student_listing").hide();					 
					 $("#staff_attendence").hide();					 
					 $("#study_materials").hide();
					 $("#attendance").hide();
					 $("#parent_list").hide();
					$("#exam_list").hide();	
                }else if ($(this).val() == "student_listing") {
                    $("#notification").hide();
					 $("#holiday").hide();
					 $("#ind_student").hide();
					 $("#non_teaching").hide();
					 $("#fees_listing").hide();
					 $("#group_list").hide();
					 $("#student_listing").show();					 
					 $("#staff_attendence").hide();					 
					 $("#study_materials").hide();
					 $("#attendance").hide();
					 $("#parent_list").hide();
					 $("#exam_list").hide();	
                }else if ($(this).val() == "attendance") {
					$("#attendance").show();
					$("#notification").hide();
					 $("#holiday").hide();
					 $("#ind_student").hide();
					 $("#non_teaching").hide();
					 $("#fees_listing").hide();
					 $("#group_list").hide();
					 $("#student_listing").show();					 
					 $("#staff_attendence").hide();					 
					 $("#study_materials").hide();
					 $("#parent_list").hide();
					$("#exam_list").hide();	
				}else if ($(this).val() == "parent_list") {
                    $("#notification").hide();
					 $("#holiday").hide();
					 $("#parent_list").show();
					 $("#non_teaching").hide();
					 $("#fees_listing").hide();
					 $("#group_list").hide();	
					 $("#staff_attendence").hide();
					 $("#student_listing").hide();		
					 $("#study_materials").hide();
					 $("#ind_student").hide();
					 $("#exam_list").hide();
					 $("#student_sub_1").hide();
						  $("#student_sub_2").hide();
						  $("#student_sub_3").hide();
                }else if ($(this).val() == "exam_list") {
                    $("#notification").hide();
					 $("#holiday").hide();
					 $("#exam_list").show();
					 $("#non_teaching").hide();
					 $("#fees_listing").hide();
					 $("#group_list").hide();	
					 $("#staff_attendence").hide();					 
					 $("#study_materials").hide();
					 $("#ind_student").hide();
					 $("#parent_list").hide();
                }else{
					 $("#notification").hide();
					  $("#holiday").hide();
					  $("#ind_student").hide();
					  $("#non_teaching").hide();
					  $("#group_list").hide();
					  //$("#student_listing").hide();
					  $("#fees_listing").hide();
					  $("#staff_attendence").hide();
					  $("#study_materials").hide();
					  $("#parent_list").hide();
					$("#exam_list").hide();	
				}
            });
			
			$("#pclass").change(function () {
				
				if ($(this).val() == "1") {
					$("#student_sub_1").hide();
				  $("#student_sub_2").hide();
				  $("#student_sub_3").hide();
					$("#plcass1").show();
					$("#plcass2").hide();
					$("#plcass3").hide();	
                }
				else if($(this).val() == "2")
				{	
				   $("#student_sub_1").hide();
				  $("#student_sub_2").hide();
				  $("#student_sub_3").hide();
					$("#plcass2").show();
					$("#plcass1").hide();
					$("#plcass3").hide();
				}
				else if($(this).val() == "3")
				{	
					$("#student_sub_1").hide();
				  $("#student_sub_2").hide();
				  $("#student_sub_3").hide();
					$("#plcass3").show();
					$("#plcass1").hide();
					$("#plcass2").hide();
				}
				else{
					$("#student_sub_1").hide();
				  $("#student_sub_2").hide();
				  $("#student_sub_3").hide();
					$("#plcass1").hide();
					$("#plcass2").hide();
					$("#plcass3").hide();
				}		
			 });
			 
        });
    </script>	
	 <script type="text/javascript">
		$(function () {
            $("#student_list").change(function () {
					 if($("#student_list").val()=="class_wise_student"){
						  $("#student_sub_1").show();
						  $("#student_sub_2").hide();
						  $("#student_sub_3").hide();
						  $("#attendance").show();
						  $("#notification").hide();
						  $("#holiday").hide();
						  $("#ind_student").hide();
						  $("#non_teaching").hide();
						  $("#group_list").hide();
						  $("#fees_listing").hide();
						  $("#staff_attendence").hide();
						  $("#study_materials").hide();
						  $("#timetable").hide();
					      $("#timetable_sub_1").hide();
					      $("#timetable_sub_2").hide();
					}
					else if($("#student_list").val()=="standard_student"){
						  $("#student_sub_1").hide();
						  $("#student_sub_2").show();
						  $("#student_sub_3").hide();
						  $("#attendance").show();
						  $("#notification").hide();
						  $("#holiday").hide();
						  $("#ind_student").hide();
						  $("#non_teaching").hide();
						  $("#group_list").hide();
						  $("#fees_listing").hide();
						  $("#staff_attendence").hide();
						  $("#study_materials").hide();
						  $("#timetable").hide();
					      $("#timetable_sub_1").hide();
					      $("#timetable_sub_2").hide();
					}
					else if($("#student_list").val()=="all_student"){
						  $("#student_sub_1").hide();
						  $("#student_sub_2").hide();
						  $("#student_sub_3").show();
						  $("#attendance").show();
						  $("#notification").hide();
						  $("#holiday").hide();
						  $("#ind_student").hide();
						  $("#non_teaching").hide();
						  $("#group_list").hide();
						  $("#fees_listing").hide();
						  $("#staff_attendence").hide();
						  $("#study_materials").hide();
						  $("#timetable").hide();
					      $("#timetable_sub_1").hide();
					      $("#timetable_sub_2").hide();
					}
				});
        });
	</script>