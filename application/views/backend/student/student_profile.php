<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <!--<hr/>-->
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Student Profile</h1>
        </div>
    </div>
    <div class="vd_banner vd_bg-white clearfix pd-20">
        <div class="panel widget light-widget">
            <form class="form-horizontal" action="" id="frmstudent_profile" role="form" method="post" enctype="multipart/form-data">
                <div  class="panel-body">
                    <h2 class="mgbt-xs-20"> Profile: <span class="font-semibold"><?php echo ucwords($profile->std_first_name . ' ' . $profile->std_last_name); ?></span> </h2>
                    <br/>
                    <div class="row">
                        <div class="col-sm-3 mgbt-xs-20">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-img text-center mgbt-xs-15"> 
                                        
                                        <?php if($profile->profile_photo != ""){ ?>    
                                        <img alt="example image" src="<?php echo base_url('uploads/student_image/'.$profile->profile_photo);?>"> </div>
                                        <?php } else{?>
                                        <img alt="example image" src="<?php echo base_url('uploads/user.jpg');?>"> </div>
                                        <?php }?>
                                    <br/>
                                    <div>
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Register Since</td>
                                                    <td><?php echo date('d-m-Y', strtotime($profile->Joining_date)); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $message = $this->session->flashdata('message');
                        if ($message != '') {
                            ?>
                            <div class="col-md-9 alert alert-success">
                                <button class="close" data-dismiss="alert">&times;</button>
                                <p><?php echo $message; ?></p>
                            </div>    
                        <?php } ?>

                        <?php if (isset($error) && $error != '') { ?>
                            <div class="col-md-9 alert alert-danger">
                                <button class="close" data-dismiss="alert">&times;</button>
                                <p><?php echo $error; ?></p>
                            </div> 
                        <?php } ?>

                        <div class="col-sm-9">                        
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <input type="email" value="<?php echo $profile->email; ?>" placeholder="email@yourcompany.com">
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
                                            <input type="text" value="<?php echo $profile->email; ?>" readonly="" placeholder="username">
                                        </div>

                                    </div>
                                    <!-- row --> 
                                </div>
                                <!-- col-sm-10 --> 
                            </div>
                            <!-- form-group -->

                            <hr />
                            <h3 class="mgbt-xs-15">Profile Setting</h3>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Profile Pic</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <input type="file" name="userfile" class="form-control">
                                        </div>
                                    </div>
                                    <!-- row --> 
                                </div>
                                <!-- col-sm-10 --> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">First Name</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <input type="text" value="<?php echo $profile->std_first_name; ?>" placeholder="first name">
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
                                            <input type="text" value="<?php echo $profile->std_last_name; ?>" placeholder="last name">
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
                                                <input type="radio" value="option3" id="optionsRadios3" name="gender"
                                                       <?php if ($profile->std_gender == 'Male') echo 'checked' ?>>
                                                <label for="optionsRadios3"> Male </label>
                                            </span>
                                            <span class="vd_radio  radio-danger" > 

                                                <input type="radio" value="option4" id="optionsRadios4" name="gender"
                                                       <?php if ($profile->std_gender == 'Female') echo 'checked' ?>>
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
                                            <input type="text" id="datepicker-normal" value="<?php echo date('F d, Y', strtotime($profile->std_birthdate)); ?>"  />
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
                                            <input type="text" value="<?php echo $profile->std_marital; ?>" class="form-control"/>
                                        </div>
                                    </div>
                                    <!-- row --> 
                                </div>
                                <!-- col-sm-10 --> 
                            </div>
                            <!-- form-group -->
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Degree</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <input readonly type="text" name="degree" value="<?php echo $profile->d_name; ?>" class="form-control"/>
                                        </div>
                                    </div>
                                    <!-- row --> 
                                </div>
                                <!-- col-sm-10 --> 
                            </div>                            
                                                       
                            <!-- form-group -->

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Course</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <input readonly type="text" name="course" value="<?php echo $profile->c_name; ?>" class="form-control"/>
                                        </div>
                                    </div>
                                    <!-- row --> 
                                </div>
                                <!-- col-sm-10 --> 
                            </div>
                            <!-- form-group -->
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Batch</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <input readonly type="text" name="batch" value="<?php echo $profile->b_name; ?>" class="form-control"/>
                                        </div>
                                    </div>
                                    <!-- row --> 
                                </div>
                                <!-- col-sm-10 --> 
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Semester</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <input readonly type="text" name="batch" value="<?php echo $profile->s_id; ?>" class="form-control"/>
                                        </div>
                                    </div>
                                    <!-- row --> 
                                </div>
                                <!-- col-sm-10 --> 
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">About</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <textarea class="form-control" name="about"><?php echo $profile->std_about; ?></textarea>
                                        </div>
                                    </div>
                                    <!-- row --> 
                                </div>
                                <!-- col-sm-10 --> 
                            </div>

                            <hr/>
                            <h3 class="mgbt-xs-15">Contact Setting</h3>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mobile Phone</label>
                                <div class="col-sm-9 controls">
                                    <div class="row mgbt-xs-0">
                                        <div class="col-xs-9">
                                            <input type="text"  value="<?php echo $profile->std_mobile; ?>" placeholder="mobile phone">
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
                                            <input type="text"  value="<?php echo $profile->std_fb; ?>" placeholder="facebook">
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
                                            <input type="text" value="<?php echo $profile->std_twitter; ?>" placeholder="twitter">
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
                <div class="form-group">

                    <div class="col-xs-9 col-md-offset-5">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" class="btn btn-success"/>
                    </div>

                </div>
                <!-- form-group --> 
            </form>
        </div>
    </div>
</div>

<!-- validation -->
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>

    

    <script type="text/javascript">
        $(window).load(function ()
        {
            "use strict";
            $(".datepicker-normal").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true
            });
        });
    </script>