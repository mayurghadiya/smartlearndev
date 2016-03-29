 
<!-- Middle Content Start -->    
		<div class="vd_content-wrapper">
			<div class="vd_container">
				<div class="vd_content clearfix">
				  <div class="vd_head-section clearfix">
					<div class="vd_panel-header">
						  <ul class="breadcrumb">
							<li><a href="index.html">Home</a> </li>
							<li><a href="pages-custom-product.html">Pages</a> </li>
							<li class="active">System Settings</li>
						  </ul>
						  <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
								<div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
								<div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
								<div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
						</div>
					</div>
				  </div>
				  <div class="vd_title-section clearfix">
					<div class="vd_panel-header no-subtitle">
					  <h1>System Setting</h1>
					</div>
				  </div>
					<div class="vd_content-section clearfix">
						<div class="row">
							<div class="col-sm-12">
								
								<!------CONTROL TABS START------>
								<ul class="nav nav-tabs bordered">
									<li class="active">
										<a href="#system" data-toggle="tab"><i class="entypo-menu"></i> 
											System Setting
										</a>
									</li>
									<li>
										<a href="#theme_setting" data-toggle="tab"><!--<i class="entypo-plus-circled"></i>-->
											Theme Setting
										</a>
									</li>
								</ul>
								<!------CONTROL TABS END------>
	
						<div class="tab-content">
						<!----TABLE LISTING STARTS-->
							<div class="tab-pane box active" id="system">
								<?php echo form_open(base_url() . 'index.php?admin/system_settings/do_update' , 
							  array('class' => 'form-horizontal form-groups-bordered validate','id'=>'systemform','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
								<div class="col-md-12">					
									<div class="panel panel-primary" >
									
										<div class="panel-heading">
											<div class="panel-title">
												System Setting
											</div>
										</div>
										<div class="panel-body">                    
											<div class="form-group">
											  <label  class="col-sm-3 control-label">System Name</label>
											  <div class="col-sm-9">
												  <input type="text" class="form-control" name="system_name" id="system_name" value="<?php echo $this->db->get_where('system_setting' , array('type' =>'system_name'))->row()->description;?>">
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-3 control-label">phone</label>
											  <div class="col-sm-9">
												  <input type="text" class="form-control" name="phone" id="system_phone" value="<?php echo $this->db->get_where('system_setting' , array('type' =>'phone'))->row()->description;?>">
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-3 control-label">Paypal Email</label>
											  <div class="col-sm-9">
												   <input type="text" class="form-control" name="paypal_email" id="paypal_email" value="<?php echo $this->db->get_where('system_setting' , array('type' =>'paypal_email'))->row()->description;?>">
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-3 control-label">Currency</label>
											  <div class="col-sm-9">
												  <input type="text" class="form-control" name="currency" id="currency" value="<?php echo $this->db->get_where('system_setting' , array('type' =>'currency'))->row()->description;?>">
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-3 control-label">System Email</label>
											  <div class="col-sm-9">
												  <input type="text" class="form-control" name="system_email" id="system_email" value="<?php echo $this->db->get_where('system_setting' , array('type' =>'system_email'))->row()->description;?>">
											  </div>
											</div>	
										  <div class="form-group">
										  <label for="field-1" class="col-sm-3 control-label">Photo</label>                          
										  <div class="col-sm-9">
											  <div class="fileinput fileinput-new" data-provides="fileinput">
												  <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
													   <img src="<?php echo $this->crud_model->get_image_url('system' , $this->session->userdata('admin_id'));?>" id="blah" alt="...">
												  </div>
												  <!--<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>-->
												  <div>
													  <span class="btn btn-white btn-file">                                        
														  <input type="file" id="imgInp" name="userfile"  accept="image/*"  >
													  </span>
												   </div>
											  </div>
										  </div>
									  </div>	 	
										  <div class="form-group">
											<div class="col-sm-offset-3 col-sm-9">
												<button type="submit" class="btn btn-info">Save</button>
											</div>
										  </div>
											
										</div>
									
									</div>
								
								</div>
								</form>	
							
							<div class="clearfix"></div>
						</div>
							<div class="tab-pane box" id="theme_setting" style="padding: 5px">
     
							<div class="col-md-12">			
								<div class="panel panel-primary" >
								
									<div class="panel-heading">
										<div class="panel-title">
										   Theme Setting
										</div>
									</div>
									
									<div class="panel-body">

									<div class="gallery-env">
										<div class="col-sm-4">
											<article class="album">
												<header>
													<a href="#" id="theme.min.css">
														Default
													</a>
													
												</header>
											</article>
										</div>
										<div class="col-sm-4">
											<article class="album">
												<header>
													<a href="#" id="theme_gold.min.css">
														Gold
													</a>
													
												</header>
											</article>
										</div>
										<div class="col-sm-4">
											<article class="album">
												<header>
													<a href="#" id="theme_blue.min.css">
														Blue
													</a>
													
												</header>
											</article>
										</div>
										<div class="col-sm-4">
											<article class="album">
												<header>
													<a href="#" id="theme_green.min.css">
														Green
													</a>													
												</header>
											</article>
										</div>									   
									</div>
								</div>
							</div>
							</div>
							<div class="clearfix"></div>
							</div>		
							
							<!----CREATION FORM ENDS-->	
								
								
							<!----TABLE LISTING ENDS--->
							</div>
							</div>
						</div>
					</div>              
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
		<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery-1.7.1.min.js"></script>
		<script type="text/javascript">
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
		</script>
		
<script type="text/javascript">
    $(".gallery-env").on('click', 'a', function () {
        skin = this.id;
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/system_settings/change_skin/'+ skin,
            success: window.location = '<?php echo base_url();?>index.php?admin/system_settings/'
        });
});
</script>