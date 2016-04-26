
<!-- Main Start -->
<div class="main-section"> 
    <div class="page-section">
        <div class="container">
            <div class="row">
                <!--Element Section Start-->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="cs-signup-form">
                        <h6>forgot password</h6>
                        <form action="<?php echo base_url(); ?>index.php?site/forgot_password" method="post">
                            <div class="row">
                                <?php 
                                $error = $this->session->flashdata('error');
                                if($error != '') { ?>
                                <div class="alert alert-danger">
                                    <button class="close" data-dismiss="alert">&times;</button>
                                    <p><?php echo $error; ?></p>
                                </div>
                                <?php } ?>
                                <?php 
                                $message = $this->session->flashdata('message');
                                if($message != '') { ?>
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert">&times;</button>
                                    <p><?php echo $message; ?></p>
                                </div>
                                <?php } ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-field-holder">
                                        <i class="icon-user"></i>
                                        <input name="email" type="text" placeholder="Email address *" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-btn-submit">
                                        <input type="submit" value="Submit" name="forgot_password">
                                    </div>
                                    <a class="cs-forgot-password" href="<?php echo base_url('index.php?site/user_login'); ?>">
                                        <i class="cs-color icon-help-with-circle"></i>Back to login
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--Element Section End-->
            </div>
        </div>
    </div>
</div>
<!-- Main End --> 
