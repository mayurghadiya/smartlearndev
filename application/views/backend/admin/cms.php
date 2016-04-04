    <!-- Middle Content Start -->    
		<div class="vd_content-wrapper">
			<div class="vd_container">
				<div class="vd_content clearfix">				 
				  <div class="vd_head-section clearfix">
                                    <div class="vd_panel-header">
                                        <ul class="breadcrumb">
                                            <li><a href="#">Home</a> </li>
                                            <li><a href="#">Pages</a> </li>
                                            <li class="active">CMS Management</li>
                                        </ul>                  
                                    </div>
                                </div>
                                    <div class="vd_title-section clearfix">
					<div class="vd_panel-header no-subtitle">
					  <h1><?php echo $page_title; ?></h1>
					</div>
				  </div>
					<div class="vd_content-section clearfix">
						<div class="row">
							<div class="col-sm-12">								
								<!------CONTROL TABS START------>
								<ul class="nav nav-tabs bordered">
									<li class="active">
										<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
											CMS List
										</a>
									</li>
									<li>
										<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
											Add CMS
										</a>
									</li>
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
													<th>Name</th>
													<th>Slug</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											  </thead>
											  <tbody>
												<?php $count = 1;foreach($cms as $row): ?>
												<tr>
													  <td><?php echo $count++;?></td>
													  <td><?php echo $row['c_title'];?></td>
													  <td><?php echo $row['c_slug'];?></td>                          
													  <td class="text-center">
														<?php if($row['c_status'] == '1'){?>
															<span class="label label-success">Active</span>
														<?php } else { ?>	
															<span class="label label-default">InActive</span>
														<?php } ?>
													  </td>
													  <td class="menu-action">
														<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_cms/<?php echo $row['c_id'];?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
														
														<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/cms/delete/<?php echo $row['c_id'];?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
													</td>
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
											<?php echo form_open(base_url() . 'index.php?admin/cms/create' , array('class' => 'form-horizontal form-groups-bordered validate','role'=>'form','id'=>'cmsform','target'=>'_top'));?>
												<div class="padded">
													<div class="form-group">
														<label class="col-sm-3 control-label">Page Name</label>
														<div class="col-sm-5">
															<input type="text" class="form-control" name="c_title" id="	c_title"/>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-3 control-label">Page Slug</label>
														<div class="col-sm-5">
															<input type="text" class="form-control" name="c_slug" id="c_slug"/>
														</div>
													</div>
													 <div class="form-group" id="ck-editor">					
														<label class="col-sm-3 control-label">Page Content</label>
															<div class="col-sm-7">		
																<textarea name="c_description"  class="ckeditor" data-rel="ckeditor" rows="3" required></textarea>
															</div>														
													</div> 
													<div class="form-group">
														 <label class="col-sm-3 control-label">Status</label>
														 <div class="col-sm-5">
														<select name="c_status">
															<option value="1">Active</option>
															<option value="0">Inactive</option>		
														</select>
														</div>	
													</div>
													<div class="form-group">
													  <div class="col-sm-offset-3 col-sm-5">
														  <button type="submit" class="btn btn-info">Add CMS</button>
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
		<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>

<!-- Specific Page Scripts END -->
<script type="text/javascript">
                                                        $(window).load(function ()
                                                        {
                                                            //CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
                                                            //$('.ckeditor').ckeditor();                                                                
                                                        })
</script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">
                                                        $.validator.setDefaults({
                                                            submitHandler: function (form) {
                                                                form.submit();
                                                            }
                                                        });

                                                        $().ready(function () {
                                                            $("#cmsform").validate({
                                                                ignore: [],
                                                                rules: {
                                                                    content_data: {
                                                                        required: function () {
                                                                            CKEDITOR.instances.content_data.updateElement();
                                                                        }
                                                                    },
                                                                    c_title: "required",
                                                                    c_slug: "required",
                                                                    c_description: "required",                                                                   

                                                                },
                                                                messages: {
                                                                    c_title: "Please enter title",
                                                                    c_slug: "Please select slug",
                                                                    c_description: "Please enter Page Content",                                                                   
                                                                }
                                                            });
                                                        });
</script>
