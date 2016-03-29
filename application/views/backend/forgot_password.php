<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        //$system_name = $this->db->get_where('system_setting', array('type' => 'system_name'))->row()->description;
       // $system_title = $this->db->get_where('system_setting', array('type' => 'system_title'))->row()->description;
        ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="" />

        <title>Reset Password | Smart Learn </title>


        <link rel="stylesheet" href="assets/login/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
        <link rel="stylesheet" href="assets/login/css/font-icons/entypo/css/entypo.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="assets/login/css/bootstrap.css">
        <link rel="stylesheet" href="assets/login/css/neon-core.css">
        <link rel="stylesheet" href="assets/login/css/neon-theme.css">
        <link rel="stylesheet" href="assets/login/css/neon-forms.css">
        <link rel="stylesheet" href="assets/login/css/custom.css">

        <script src="assets/login/js/jquery-1.11.0.min.js"></script>

        <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="assets/images/favicon.png">

    </head>
    <body class="page-body login-page login-form-fall" data-url="http://neon.dev">

        <!-- This is needed when you send requests via Ajax -->
        <script type="text/javascript">
            var baseurl = '<?php echo base_url(); ?>';
        </script>

        <div class="login-container">

            

                    <!-- progress bar indicator -->
                    <div class="login-progressbar-indicator">
                        <h3>43%</h3>
                        <span>resetting password...</span>
                    </div>

            <div class="login-progressbar">
                <div></div>
            </div>

            <div class="login-form">

                <div class="login-content">

                    <div class="form-login-error">
                        <h3>Invalid Email</h3>
                        <p>Please enter correct email!</p>
                    </div>
                    <p class="description">Enter your email for resetting password.</p>
                    <form method="post" role="form" id="form_forgot_password">

                        <div class="form-forgotpassword-success">
                            <i class="entypo-check"></i>
                            <h3>Reset email has been sent.</h3>
                            <p>Please check your email inbox, password reset instruction is sent!</p>
                        </div>

                        <div class="form-steps">

                            <div class="step current" id="step-1">

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="entypo-mail"></i>
                                        </div>

                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email"  autocomplete="off" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block btn-login">
                                        Reset password                                    
                                    </button>
                                </div>

                            </div>

                        </div>

                    </form>



                    <div class="login-bottom-links">

                        <a href="<?php echo base_url(); ?>index.php?login" class="link">
                            <i class="entypo-lock"></i>Return To login page
                            <?php //echo get_phrase('return_to_login_page'); ?>
                        </a>


                    </div>

                </div>

            </div>

        </div>


        <!-- Bottom Scripts -->
        <script src="assets/login/js/gsap/main-gsap.js"></script>
        <script src="assets/login/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
        <script src="assets/login/js/bootstrap.js"></script>
        <script src="assets/login/js/joinable.js"></script>
        <script src="assets/login/js/resizeable.js"></script>
        <script src="assets/login/js/neon-api.js"></script>
        <script src="assets/login/js/jquery.validate.min.js"></script>
        <script src="assets/login/js/neon-forgotpassword.js"></script>
        <script src="assets/login/js/jquery.inputmask.bundle.min.js"></script>
        <script src="assets/login/js/neon-custom.js"></script>
        <script src="assets/login/js/neon-demo.js"></script>

    </body>
</html>
