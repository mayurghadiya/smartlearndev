<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.js"></script>
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.validate.min.js"></script>


<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
	<div class="">
		<div class="vd_content clearfix">
			<div class="vd_title-section clearfix">
				<div class="vd_panel-header">
					<h1><?php echo $page_title?></h1>            
				</div>
			</div>
			<div class="vd_content-section clearfix">
				<div class="row">
					<div class="col-sm-12">								
						<!------CONTROL TABS START------>
						<ul class="nav nav-tabs bordered">
							<li class="active">
								<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
									Study Resource List
								</a></li>
								<li>
									<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
										Add Study Resource
									</a></li>
						</ul>
						<!------CONTROL TABS END------>
						
						<div class="tab-content">
							<!----TABLE LISTING STARTS-->
							<div class="tab-pane box active" id="list">								
								<div class="panel-body table-responsive">
									<table class="table table-striped" id="data-tables">
										<thead>
											<tr>
												<th><div>#</div></th>											
												<th><div>Title</div></th>											
												<th><div>Degree</div></th>											
												<th><div>Batch</div></th>											
												<th><div>Semester</div></th>											
												<th><div>Page url</div></th>											
												<th><div>Date of submission</div></th>									
												<th><div>Download</div></th>									
											</tr>
										</thead>
										<tbody>
											<?php $count = 1;foreach($studyresource as $row): ?>
											<tr>
												<td><?php echo $count++;?></td>	
												<td><?php echo $row->study_title;?></td>	
												<td>
													<?php 
														foreach($degree as $deg)
														{
															if($deg->d_id==$row->study_degree)
															{
																echo $deg->d_name;
															}
														}
													?>
												</td>	
												<td>
													<?php 
														foreach($batch as $bch)
														{
															if($bch->b_id==$row->study_batch)
															{
																echo $bch->b_name;
															}
														}
													?>
												</td>	
												<td>
													<?php 
														foreach($semester as $sem)
														{
															if($sem->s_id==$row->study_sem)
															{
																echo $sem->s_name;
															}
														}
														
													?>
													
												</td>	
												<td><?php echo $row->study_url;?></td>	
												<td><?php echo $row->study_dos;?></td>	
												<td><a href="material_download.php?file_name=<?php echo $row->study_filename;?>"><i class="fa fa-download"></i></a></td>	
												
											</tr>
											<?php endforeach;?>						
										</tbody>
									</table>
								</div>
							</div>
							<!----TABLE LISTING ENDS--->
							
							
							<!----CREATION FORM STARTS---->
							<div class="tab-pane box" id="add" style="padding: 5px">
								<div class="box-content">                	
									<?php echo form_open(base_url() . 'index.php?student/studyresource/create' , array('class' => 'form-horizontal form-groups-bordered validate','role'=>'form','id'=>'frmstudyresource','target'=>'_top','enctype' => 'multipart/form-data'));?>
									<div class="padded">											
										<div class="form-group">
											<label class="col-sm-3 control-label">Degree</label>
											<div class="col-sm-5">
												<select name="degree" id="degree">
													<option value="">Select degree</option>
													<?php
														$datadegree=$this->db->get_where('degree',array('d_status'=>1))->result();
														foreach($datadegree as $rowdegree)
														{
														?>
														<option value="<?=$rowdegree->d_id?>"><?=$rowdegree->d_name?></option>
														<?php
														}
													?>
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
											<label class="col-sm-3 control-label">Date of Submission</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="dateofsubmission" id="dateofsubmission" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Title</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="title" id="title" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Page URL</label>
											<div class="col-sm-5">
												<input type="text" class="form-control" name="pageurl" id="pageurl" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">File Upload</label>
											<div class="col-sm-5">
												<input type="file" class="form-control" name="resourcefile" id="resourcefile" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Description</label>
											<div class="col-sm-5">
												<textarea class="form-control" name="description" id="description"></textarea>
											</div>
										</div>
										
										<div class="form-group">
											<div class="col-sm-offset-3 col-sm-5">
												<button type="submit" class="btn btn-info">Add Participate</button>
											</div>
										</div>
									</form>               
								</div>                
							</div>
							<!----CREATION FORM ENDS-->
						</div>
					</div>
				</div>
			</div>
		</div>              
	</div>
	<!-- row --> 
</div>

<script type="text/javascript">
	$.validator.setDefaults({
		submitHandler: function(form) {			
			form.submit();
		}
	});
	
	$().ready(function() {	
		$("#dateofsubmission").datepicker({
			
		});
		jQuery.validator.addMethod("character", function(value, element) {
			return this.optional( element ) ||  /^[A-z]+$/.test( value );
		}, 'Please enter a valid character');
		
		jQuery.validator.addMethod("url", function(value, element) {
			return this.optional( element ) || /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test( value );
		}, 'Please enter a valid URL');
		
		$("#frmstudyresource").validate({		
			
			rules: {
				degree: "required",
				batch: "required",
				semester: "required",
				dateofsubmission: "required",
				pageurl:
				{
					required:true,
					//url:true,
				},
				resourcefile: "required",
				title: 
				{
					required:true,
					character:true,
				},		
				description: "required",	
			},
			messages: {
				degree: "Degree is required",
				batch: "Batch is required",
				semester: "Semester is required",
				dateofsubmission: "Submission date is required",
				pageurl:
				{
					required:"Page url is required",
				},
				resourcefile: "Study resource file is required",
				title: 
				{
					required:"Title is required",
					character:"Valid title is required",
				},
				description: "Description is required",
			}
		});
	});
</script>