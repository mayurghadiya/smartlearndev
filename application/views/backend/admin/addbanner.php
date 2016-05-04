 <?php 
   $degree = $this->db->get('degree')->result_array();
        $courses = $this->db->get('course')->result_array();
        $semesters = $this->db->get('semester')->result_array();?>
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
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Bannner Slider");?>
                    </div>
                </div>
                <div class="panel-body"> 
                    <div class="box-content">  
<div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
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
                    
                  </div>
              </div>
      </div>
               </div>  <script type="text/javascript">
      

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
    