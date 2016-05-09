<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
		<div class="vd_content clearfix">
			<div class="vd_content-section clearfix">
				<div class="row">
					<div class="col-sm-12">		
							<!----CREATION FORM STARTS---->
							<div class="tab-pane box" id="add" style="padding: 5px">
								<div class="box-content">                	
									<?php echo form_open(base_url() . 'index.php?admin/registration/create' , array('class' => 'form-horizontal form-groups-bordered validate','role'=>'form','id'=>'frmstudent','target'=>'_top'));?>
									<div class="padded">
										<div class="form-group">
											<label class="col-sm-3 control-label">Name</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="name" id="name" />
											</div>
										</div>												
										<div class="form-group">
											<label class="col-sm-3 control-label">First Name</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="f_name" id="f_name" />
											</div>
										</div>												
										<div class="form-group">
											<label class="col-sm-3 control-label">Last Name</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="l_name" id="l_name" />
											</div>
										</div>												
										<div class="form-group">
											<label class="col-sm-3 control-label">Email Id</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="email_id" id="email_id" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Password</label>
											<div class="col-sm-5">
												<input type="password" class="form-control" name="password" id="password" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Gender</label>
											<div class="col-sm-5">
												<input type="radio" name="gen" value="male" >Male
												<input type="radio" name="gen" value="female" >Female
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Address</label>
											<div class="col-sm-5">
												<textarea class="form-control" name="address" id="address" ></textarea>
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">City</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="city" id="city" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Zip</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="zip" id="zip" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Birth Date</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="birthdate" id="birthdate" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Marital Status</label>
											<div class="col-sm-5">
												<select name="maritalstatus" id="maritalstatus">
													<option value="">Select marital status</option>
													<option value="single">Single</option>
													<option value="married">Married</option>
													<option value="separated">Separated</option>
													<option value="widowed">Widowed</option>
												</select>
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Batch</label>
											<div class="col-sm-5">
												<select name="batch" id="batch">
													<option value="">Select batch</option>
													<?php
														$databatch=$this->db->get_where('batch',array('b_status'=>1))->result();
														foreach($databatch as $row)
														{
														?>
														<option value="<?=$row->b_id?>"><?=$row->b_name?></option>
														<?php
														}
													?>
												</select>
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Course</label>
											<div class="col-sm-5">
												<select name="course" id="course">
													<option value="">Select course</option>
													<?php
														$datacourse=$this->db->get_where('course',array('course_status'=>1))->result();
														foreach($datacourse as $rowcourse)
														{
														?>
														<option value="<?=$rowcourse->course_id?>"><?=$rowcourse->c_name?></option>
														<?php
														}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Semester</label>
											<div class="col-sm-5">
												<select name="semester" id="semester">
													<option value="">Select semester</option>
													<?php
														$datasem=$this->db->get_where('semester',array('s_status'=>1))->result();
														foreach($datasem as $rowsem)
														{
														?>
														<option value="<?=$rowsem->s_id?>"><?=$rowsem->s_name?></option>
														<?php
														}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Mobile No</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="mobileno" id="mobileno" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Facebook URL</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="facebook" id="facebook" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Twitter URL</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="twitter" id="twitter" />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Group </label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="group" id="group" placeholder="readonly" readonly />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">User Type</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="usertype" id="usertype" placeholder="readonly" readonly />
											</div>
										</div>	
										<div class="form-group">
											<label class="col-sm-3 control-label">Admission Type</label>
											<div class="col-sm-5">
												<select name="admissiontype" id="admissiontype">
													<option value="">Select admission type</option>
													<?php
														$admissiontype=$this->db->get_where('admission_type',array('at_status'=>1))->result();
														foreach($admissiontype as $rowtype)
														{
														?>
														<option value="<?=$rowtype->at_id?>"><?=$rowtype->at_name?></option>
														<?php
														}
													?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Description</label>
											<div class="col-sm-5">
												<textarea class="form-control" name="std_about" id="std_about" ></textarea>
											</div>
										</div>	
										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-5">
												<button type="submit" class="btn btn-info">Register</button>
											</div>
										</div>
									</form>   
							</div>
							<!----CREATION FORM ENDS-->
						</div>
					</div>
				</div>
			</div>
		</div>              
	</div>
	<!-- row --> 

<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.js"></script>
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.validate.min.js"></script>
<script type="text/javascript">
	$.validator.setDefaults({
		submitHandler: function(form) {			
			form.submit();
		}
	});
	
	$().ready(function() {	
		$("#birthdate").datepicker({
			maxDate: 0
		});
		
		jQuery.validator.addMethod("mobile_no", function(value, element) {
			return this.optional( element ) ||  /^[0-9-+]+$/.test( value );
		}, 'Please enter a valid contact no.');
		jQuery.validator.addMethod("email_id", function(value, element) {
			return this.optional( element ) ||  /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test( value );
		}, 'Please enter a valid email address.');
		
		jQuery.validator.addMethod("character", function(value, element) {
			return this.optional( element ) ||  /^[A-z]+$/.test( value );
		}, 'Please enter a valid character.');
		
		jQuery.validator.addMethod("zip_code", function(value, element) {
			return this.optional( element ) ||  /^[0-9]{6}$/.test( value );
		}, 'Please enter a valid zip code.');
		
		jQuery.validator.addMethod("url", function(value, element) {
			return this.optional( element ) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test( value );
		}, 'Please enter a valid URL.');
		
		$("#frmstudent").validate({		
			
			rules: {
				name: 
				{
					required:true,
					character:true,
				},
				f_name: 
				{
					character:true,
				},
				l_name: 
				{
					character:true,
				},
				email_id: 
				{
					required:true,
					email_id:true,
				},
				password: "required",
				gen: "required",
				birthdate: "required",
				mobileno: 
				{
					required:true,
					maxlength: 11,
					mobile_no: true,
					minlength: 10,
					
				},
				city:
				{
					required:true,
					character:true,
				},
				zip:
				{
					required:true,
					zip_code:true,
				},
				facebook: 
				{
					url:true,
				},
				twitter: 
				{
					url:true,
				},
				admissiontype:"required",
			},
			messages: {
				name:
				{
					required:"Please enter name",
					character:"Please enter valid name",
				},
				f_name:
				{
					character:"Please enter valid name",
				},
				l_name:
				{
					character:"Please enter valid name",
				},
				email_id: 	{
					required:"Please enter email id",
					email_id:"Please enter valid email id",
				},
				password: "Please enter password",
				gen: "Please slect gender",
				birthdate: "Please select birthdate",
				mobileno: 
				{
					required:"Please enter mobile no",	
					maxlength:"Please enter maximum 10 digit number",
					mobile_no:"Please enter valid mobile number",
					minlength:"Please enter minimum 10 digit number",	
					
				},
				city:
				{
					required:"Please enter city",
					character:"Please enter valid city name",
				},
				zip:
				{
					required:"Please enter zip code",
				},
				admissiontype:"Plese select admission type",
			}
		});
	});
</script>