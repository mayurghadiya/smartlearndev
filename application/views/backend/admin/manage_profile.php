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
			  <?php foreach($edit_data as $row): ?>
                <div class="panel widget light-widget">
				   <?php echo form_open(base_url() . 'index.php?admin/manage_profile/update_profile_info' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' ,'role'=>'form','id'=>'edit_profile', 'enctype' => 'multipart/form-data'));?>
                    <div  class="panel-body">
                      <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold"><?php echo $row['ad_first_name'] .'&nbsp;'. $row['ad_last_name'];?></span> </h2>
                      <br/>
                      <div class="row">
                        <div class="col-sm-3 mgbt-xs-20">
                          <div class="form-group">
                            <div class="col-xs-12">
                              <div class="form-img text-center mgbt-xs-15">
								 <img src="<?php echo $this->crud_model->get_image_url('admin' , $row['admin_id']);?>" id="manage_profile"  alt="...">
							  </div>                             
							 <div class="form-img-action text-center mgbt-xs-20">
								<input id="upload" name="userfile" type="file"  accept="image/*"/>
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
                                    <tr>
                                      <td>Register Since</td>
                                      <td> <?php echo date("F j, Y", strtotime($row['created_date']));  ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-9">                        
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="email" value="<?php echo $row['email'];?>" name="email" id="email" placeholder="email@yourcompany.com">
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" value="<?php echo $row['name'];?>" name="name" id="name" placeholder="username">
                                </div>
                               
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->                        
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="password" value="<?php echo $row['pass'];?>" name="password" id="password" placeholder="password">
                                </div>
                                <!-- col-xs-12 --> 
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                   <input id="confirm_password" name="confirm_password" type="password">
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- form-group -->                        
                          
                          <hr />
                          <h3 class="mgbt-xs-15">Profile Setting</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">First Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" value="<?php echo $row['ad_first_name'];?>" name="ad_first_name" placeholder="first name">
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Last Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" value="<?php echo $row['ad_last_name'];?>" name="ad_last_name" placeholder="last name">
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <span class="vd_radio radio-info">
                                    <input type="radio" <?php if($row['ad_gender'] == 'Male'){ echo "checked"; } ?> value="Male" id="optionsRadios3" name="ad_gender">
                                    <label for="optionsRadios3"> Male </label>
                                  </span>
                                  <span class="vd_radio  radio-danger" > 
                                    <input type="radio" value="Female" <?php if($row['ad_gender'] == 'Female'){ echo "checked"; } ?> id="optionsRadios4" name="ad_gender">
                                    <label for="optionsRadios4"> Female </label>
                                  </span> 
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Birthday</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" id="datepicker-normal" name="ad_birthdate" value="<?php echo $row['ad_birthdate'];?>"  />
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Marital Status</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select name="ad_marital">
                                    <option value="Single" <?php if($row['ad_marital'] == 'Single'){ echo "selected"; } ?>>Single</option>
                                    <option value="Married" <?php if($row['ad_marital'] == 'Married'){ echo "selected"; } ?>>Married</option>
                                  </select>
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Branch</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select name="ad_branch" id="ad_branch">
                                   	<option value="">--- Select Batch ---</option>
									 <?php 
										$batch = $this->db->get('batch')->result_array();
										foreach($batch as $row2):
										?>
											<option value="<?php echo $row2['b_id'];?>" <?php if($row['ad_branch'] == $row2['b_id'])echo 'selected';?>><?php echo $row2['b_name'];?></option>
										<?php
										endforeach;
									?>
                                  </select>
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">About</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <textarea rows="3" name="ad_about"><?php echo $row['ad_about'];?></textarea>
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <hr/>
                          <h3 class="mgbt-xs-15">Contact Setting</h3>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Mobile Phone</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text"  value="<?php echo $row['ad_mobile'];?>" name="ad_mobile" id="ad_mobile" placeholder="mobile phone">
                                </div>
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                         
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Facebook</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text"  value="<?php echo $row['ad_fb'];?>" name="ad_fb" placeholder="https://www.facebook.com/">
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
                          
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Twitter</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" value="<?php echo $row['ad_twitter'];?>" name="ad_twitter" placeholder="https://www.twitter.com/">
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row --> 
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group --> 
                          
                        </div>
                        <!-- col-sm-12 --> 
                      </div>
                      <!-- row --> 
                      
                    </div>
                    <!-- panel-body -->
                    <div class="pd-20">
                      <button class="btn vd_btn vd_bg-green col-md-offset-3"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Edit</button>
                    </div>
                  </form>
                </div>
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
	
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery-1.7.1.min.js"></script>
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
$(window).load(function() 
{	"use strict";	
	$( "#datepicker-normal" ).datepicker({ 
		dateFormat: 'dd M yy',
		changeMonth: true,
		changeYear: true
	
	});
});
</script>