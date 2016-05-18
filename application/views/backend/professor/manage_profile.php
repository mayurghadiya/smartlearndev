  <!-- Middle Content Start -->
   <style>
   #upload{
    display:none
}
</style>   
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>User Profile Form</h1>            
          </div>
		  </div>
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-12">                 
			  <?php foreach($edit_data as $professor): ?>
                <div class="panel widget light-widget">
				   <?php echo form_open(base_url() . 'index.php?professor/manage_profile/update_profile_info' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' ,'role'=>'form','id'=>'edit_profile', 'enctype' => 'multipart/form-data'));?>
                    <div  class="panel-body">
                      <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold"><?php echo $professor['name'];?></span> </h2>
                      <br/>
                      <div class="row">
                        <div class="col-sm-3 mgbt-xs-20">
                          <div class="form-group">
                            <div class="col-xs-12">
                              <div class="form-img text-center mgbt-xs-15">
								 <img src="<?php echo base_url().'uploads/professor/'.$professor['image_path']; ?>" id="manage_profile"  alt="...">
							  </div>                             
							 <div class="form-img-action text-center mgbt-xs-20">
								
                                                                 <input id="upload" class="form-control coverimage2" type="file" name="userfile" accept="image/*"/>
								<a href="" id="upload_link" class="btn vd_btn  vd_bg-blue"><i class="fa fa-cloud-upload append-icon"></i>Upload</a>
							 </div>	
                              <br/>
                              <div>
                                <table class="table table-striped table-hover">
                                  <tbody>
                                    <!--<tr>
                                      <td style="width:60%;">Status</td>
                                      <td><span class="label label-success">Active</span></td>
                                    </tr>-->
                                   
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-9">                        
                            
                            <div class="box-content"> 
                    <div class="">
                        <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?></span> 
                    </div>                                    
                 
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("professor name"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="professor-name" readonly="" class="form-control" type="text" name="professor_name" required=""
                                       value="<?php echo $professor['name']; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("email"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="email" class="form-control" readonly=""  type="email" name="email" required=""
                                       value="<?php echo $professor['email']; ?>"/>
                            </div>	
                        </div>
                      
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("mobile"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="mobile" class="form-control" type="text" name="mobile" 
                                       value="<?php echo $professor['mobile']; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("address"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <textarea id="address" class="form-control" name="address" ><?php echo $professor['address']; ?></textarea>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("city"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="city" class="form-control" type="text" name="city" 
                                       value="<?php echo $professor['city']; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("zip code"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="zip-code" class="form-control" type="text" name="zip_code"  value="<?php echo $professor['zip']; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("date of birth"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="date-of-birth" class="form-control datepicker-normal" type="text" name="dob"    value="<?php echo $professor['dob']; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("occupation"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="occupation" class="form-control" readonly=""  type="text" name="occupation" required=""
                                       value="<?php echo $professor['occupation']; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("designation"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="designation" class="form-control" readonly=""  type="text" name="designation" required=""
                                       value="<?php echo $professor['designation']; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("department"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select id="degree" name="degree" readonly="" disabled=""   class="form-control" required="">
                                    <option value="">Select</option>
                                    <?php foreach ($degree_list as $degree) { ?>
                                        <option value="<?php echo $degree->d_id; ?>"
                                                <?php if ($professor['department'] == $degree->d_id) echo 'selected'; ?>><?php echo $degree->d_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>	
                        </div>                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("branch"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select id="branch" name="branch" readonly=""  disabled="" class="form-control" required="">
                                    <option value="">Select</option>   
                                     <?php
                                        $course = $this->db->get_where('course', array('course_status' => 1,'degree_id'=>$professor['department']))->result();
                                        foreach ($course as $crs) {
                                            if ($crs->course_id == $professor['branch']) {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" selected><?= $crs->c_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" ><?= $crs->c_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                </select>
                            </div>	
                        </div>
                     
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("about"); ?></label>
                            <div class="col-sm-5">
                                <textarea id="about" class="form-control" name="about"><?php echo  $professor['about']; ?></textarea>
                            </div>	
                        </div>
                     <div class="pd-20">
                      <button class="btn vd_btn vd_bg-green col-md-offset-3"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Update</button>
                    </div>   
                    </div>                
                </div>
                          
                          
                        </div>
                        <!-- col-sm-12 --> 
                      </div>
                      <!-- row --> 
                      
                    </div>
                
                </div>
                    <!-- panel-body -->
                   
                  
                </div>
                </form>
                <!-- Panel Widget --> 
				<?php  endforeach;  ?>
              </div>
              <!-- col-sm-12--> 
            </div>
            <!-- row --> 
            
          </div>
          <!-- .vd_content-section --> 
          
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper -->
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
     <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
                                            $.validator.setDefaults({
                                                submitHandler: function (form) {
                                                    alert('sad');
                                                    form.submit();
                                                }
                                            });
                                            $().ready(function () {
                                                
                                                $("#edit_profile").validate({
                                                    rules: {
                                                        mobile: "required",
                                                        address: "required",
                                                        city: "required",
                                                        zip_code: "required",
                                                        dob: "required",                                                       
                                                        userfile:{								
                                                                         extension:'gif|jpg|png|jpeg',  
                                                                            
                                                        }
                                                    },
                                                    messages: {
                                                        mobile: "Enter mobile no",
                                                        address: "Enter address",
                                                        city: "Enter city",
                                                        zip_code: "Enter zipcode",
                                                        dob: "Select date of birth",
                                                       userfile:{								
                                                        extension:'upload valid image',  
                                                                            
                                                        }
                                                    }
                                                });
                                            });
    </script>

	

<script type="text/javascript">
		$(function(){
			$("#upload_link").on('click', function(e){
				e.preventDefault();
				$("#upload:hidden").trigger('click');
			});
		});
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#manage_profile').attr('src', e.target.result);
            }            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#upload").change(function(){
        readURL(this);
    });
</script>
<script type="text/javascript">
     $(document).ready(function () {
           $( ".datepicker-normal" ).datepicker({ 
		dateFormat: 'dd M yy',
                maxDate:'0',
		changeMonth: true,
		changeYear: true
	
	});
        });

</script>

