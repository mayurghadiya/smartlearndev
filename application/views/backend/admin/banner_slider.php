<!-- Middle Content Start -->  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
     
        $(document).ready(function($){
	images = new Array();
	$(document).on('change','.coverimage',function(){
		 files = this.files;
		 $.each( files, function(){
			 file = $(this)[0];
			 if (!!file.type.match(/image.*/)) {
	        	 var reader = new FileReader();
	             reader.readAsDataURL(file);
	             reader.onloadend = function(e) {
	            	img_src = e.target.result; 
	            	html = "<img class='img-thumbnail' style='width:300px;margin:20px;' src='"+img_src+"'>";
	            	$('#image_container').html( html );
	             };
        	 } 
		});
	});
});
    </script>
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Banner Slider</li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Banner Slider</h1>

                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                   Banner Slider
                                </a></li>
                             <li >
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Banner Slider
                                </a></li>
                                <li >
                                <a href="#general" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                   Slider General Setting
                                </a></li>
                                
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">		
                                
                                    
                                    <div class="panel-body table-responsive" id="getresponse">
                                        <table class="table table-striped" id="survey-table">
                                            <thead>
                                                <tr>
                                                    <th><div>#</div></th>                                                                                              
                                                    <th><div>Title</div></th>  
                                                    <th><div>Description</div></th>                                                                                  
                                                    <th><div>Action</div></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                foreach ($banners as $row):
                                                    ?>
                                                    <tr>
                                                       <td><?php echo $count++; ?></td>    
                                                    <td><?php echo $row->banner_title; ?></td>    
                                                    <td><?php echo $row->banner_desc; ?></td>  
                                                    
                                                  <td>  <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_banner/<?php echo $row->banner_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?media/bannerslider/delete/<?php echo $row->banner_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	</td>
                                                       
                                                    </tr>
                                                <?php endforeach; 
                                               ?>                        
                                            </tbody>
                                        </table>
                                    </div>
                                
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">  
<div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>                                      
<?php echo form_open(base_url() . 'index.php?media/bannerslider/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmgallery', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Title </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                        </div>
                               

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description </label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Slide Image <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input id="main_img" class="form-control coverimage" type="file" name="main_img"  />
                                            </div>
                                            <div id="image_container"></div>
                                        </div>                                                                              
                                        
                                        <div class="form-group">
                                                    <label class="col-sm-3 control-label">Slide</label>
                                                    <div class="col-sm-5">
                                                        <select name="slide_option" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="slideInLeft">Left</option>
                                                            <option value="slideInRight">Right</option>
                                                            <option value="sliceDown">sliceDown</option>
                                                            <option value="sliceDownLeft">sliceDownLeft</option>
                                                            <option value="sliceUp">sliceUp</option>
                                                            <option value="sliceUpLeft">sliceUpLeft</option>
                                                            <option value="sliceUpDown">sliceUpDown</option>
                                                            <option value="sliceUpDownLeft">sliceUpDownLeft</option>
                                                            <option value="fold">fold</option>
                                                            <option value="fade">fade</option>
                                                            <option value="random">random</option>
                                                            <option value="boxRandom">boxRandom</option>
                                                            <option value="boxRain">boxRain</option>
                                                            <option value="boxRainReverse">boxRainReverse</option>
                                                            <option value="boxRainGrow">boxRainGrow</option>
                                                            <option value="boxRainGrowReverse">boxRainGrowReverse</option>
                                                        </select>
                                                    </div>
                                        </div>
                                         <div class="form-group">
                                                    <label class="col-sm-3 control-label">Status  <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <select name="status" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add Banner Image</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div> 
                                    <div id="dvPreview">
                                  </div>
                                </div>
                                 
                                <!----CREATION FORM ENDS-->
                            </div>
                             <div class="tab-pane box" id="general" style="padding: 5px">
                                <div class="box-content">  
<div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>                                      
<?php echo form_open(base_url() . 'index.php?media/bannerslider/general', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmgeneral', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        
                                      
                              
                                       
                                        
                                          <div class="form-group">
                                                    <label class="col-sm-3 control-label">Pause Time <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        
                                                        <input type="text" class="form-control" name="pause_time" placeholder="Ex 4000" id="pause_time" value="<?php if(!empty($general)) { echo $general[0]->pause_time; } ?>" />
                                                        
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="col-sm-3 control-label">Animation Speed <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">                                                        
                                                        <input type="text" placeholder="Ex 340" class="form-control" name="anim_speed" id="anim_speed" value="<?php if(!empty($general)) {  echo $general[0]->anim_speed; } ?>" />
                                                    </div>
                                         </div>
                                        
                                        
                                        <div class="form-group">
                                                    <label class="col-sm-3 control-label">Pause On Hover  <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <select name="pause_on_hover" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="true" <?php  if(!empty($general)) {  if($general[0]->pause_on_hover=="true"){ echo "selected=selected";} } ?>>True</option>
                                                            <option value="false"  <?php  if(!empty($general)) {  if($general[0]->pause_on_hover=="false"){ echo "selected=selected";} } ?>>False</option>
                                                        </select>
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="col-sm-3 control-label">Caption Opacity  <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">                                                        
                                                        <input type="text" placeholder="Ex 0.8" class="form-control" name="caption_opacity" id="caption_opacity" value="<?php  if(!empty($general)) {  echo $general[0]->caption_opacity; } ?>" />
                                                    </div>
                                         </div>                                                                             
                                        
                                        

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Update</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div> 
                                    <div id="dvPreview">
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
    
     <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
      

        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        $().ready(function () {

            $("#frmgallery").validate({
                rules: {                    
                    main_img:{ 
                        required:true,
                        extension:"gif|jpg|png|jpeg"
                    },
                    status:"required",                 
                },
                messages: {
                   
                    main_img:{ 
                        required:"Please upload slide image",
                        extension:"Only gif,jpg,png file is allowed!"
                    },
                    status:"Select Status",                    
                },
            });
              $("#frmgeneral").validate({
                rules: {
                    pause_time:{
                        required:true,
                         number: true
                    },
                    pause_on_hover:"required",
                    anim_speed:{
                        required :true,
                         number: true
                    },
                    caption_opacity:"required",
                   
                },
                messages: {
                  
                    pause_time:{
                        required: "Please enter pause time",                    
                         number: "Enter Number only",
                    },
                    pause_on_hover:"Please select option",
                    anim_speed:{
                        required:"Please enter animation speed",
                         number: "Enter Number only",
                    },
                    caption_opacity:"Please enter caption opacity",
                    
                },
            });
        });
    </script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#survey-table').dataTable({
            });

        });

    </script>

