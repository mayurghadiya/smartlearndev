<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?> | <?php echo system_name(); ?></title>
        <link href="<?php echo base_url(); ?>site_assets/css/bootstrap_theme.css" rel="stylesheet"/>

        <link href="<?php echo base_url(); ?>site_assets/style1.css" rel="stylesheet"/>

        <!-- <link href="<?php echo base_url(); ?>site_assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>site_assets/scripts/jquery.js.pagespeed.jm.J-8M9bCq0j.js"></script>
        <script src="<?php echo base_url(); ?>site_assets/scripts/modernizr.js.pagespeed.jc._Ez36Dl5Ej.js"></script>
        <script>eval(mod_pagespeed_m5wYI4Lltk);</script>
        <script>eval(mod_pagespeed_8U31Wg3Ylw);</script>
    </head>
    <body class="wp-smartstudy">
        <div class="wrapper">             
            <!-- Header Start -->
            <header id="header" class=""> 
                <div class="top-bar">
                    <div class="container">
                        <div class="row">    
                            <div class="col-lg-4 col-md-4"></div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="cs-user">
                                    <ul>                                        
                                        <?php
                                        $login_type = $this->session->userdata('login_type');
                                        if ($login_type != '') {
                                            switch ($login_type) {
                                                case 'admin':
                                                    //find admin details
                                                    $admin = $this->db->get_where('admin', array(
                                                                'admin_id' => $this->session->userdata('admin_id')
                                                            ))->row();

                                                    $name = $admin->ad_first_name . ' ' . $admin->ad_last_name;
                                                    $dashboard_url = base_url('admin/dashboard');
                                                    $profile_url = base_url('admin/manage_profile');
                                                    break;
                                                case 'student':
                                                    //find students details
                                                    $student = $this->db->get_where('student', array(
                                                                'std_id' => $this->session->userdata('student_id')
                                                            ))->row();

                                                    $name = $student->std_first_name . ' ' . $student->std_last_name;
                                                    $dashboard_url = base_url('student/dashboard');
                                                    $profile_url = base_url('student/profile');
                                                    $image = base_url('uploads/student_image/' . $student->profile_photo);
                                                    break;
                                                case 'subadmin':
                                                    //find sub admin details                                                
                                                    $sub_admin = $this->db->get_where('sub_admin', array(
                                                                'sub_admin_id' => $this->session->userdata('sub_admin_id')
                                                            ))->row();

                                                    $name = 'Sub Admin';
                                                    $dashboard_url = base_url('sub_admin/dashboard');
                                                    $profile_url = '';
                                                    break;
                                                  case 'professor':
                                                    //find sub admin details                                                
                                                    $professor = $this->db->get_where('professor', array(
                                                                'professor_id' => $this->session->userdata('login_id')
                                                            ))->row();

                                                    $name = 'Professor';
                                                    $dashboard_url = base_url('professor');
                                                    $profile_url = '';
                                                    break;
                                            }
                                            ?>
                                            <li>
                                                <div class="cs-user-login">
                                                    <div class="cs-media">
                                                        <figure><img alt="" src="<?php echo isset($image) ? $image : base_url('site_assets/extra-images/xuser-login-img-1.jpg.pagespeed.ic.HDstrn5dKp.jpg'); ?>"></figure>
                                                    </div>
                                                    <a href="#"><?php echo $name; ?></a>
                                                    <ul>
                                                        <li><a href="<?php echo $dashboard_url; ?>"><i class="icon-user3"></i> Dashboard</a></li>
                                                        <li><a href="<?php echo $profile_url; ?>"><i class="icon-gear"></i> Profile</a></li>
                                                        <li><a href="<?php echo base_url('login/logout'); ?>"><i class="icon-log-out"></i> Logout</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php } else {
                                            ?>
                                            <li><a href="<?php echo base_url('site/user_login'); ?>"><i class="icon-login"></i>Login</a></li>
                                            <?php
                                        }
                                        ?>    

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                                <div class="cs-logo cs-logo-dark">
                                    <div class="cs-media">
                                        <figure><a href="<?php echo base_url('home'); ?>"><img style="margin-top: -20px;" src="<?php echo base_url(); ?>assets/img/logo.png" alt=""/></a></figure>
                                    </div>
                                </div>
                                <div class="cs-logo cs-logo-light">
                                    <div class="cs-media">
                                        <figure><a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url(); ?>site_assets/images/xcs-logo-light.png.pagespeed.ic.Q1HdweYLsy.png" alt=""/></a></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
                                <div class="cs-main-nav pull-right">
                                    <nav class="main-navigation">
                                        <ul>
                                            <li><a href="<?php echo base_url('home'); ?>">Home</a><span>About College</span></li>
                                            <li><a href="<?php echo base_url('about'); ?>">About</a><span>About Us</span></li>
                                            <li class="menu-item-has-children"><a href="#">Courses</a>
                                                <span>Online Education</span>
                                                <ul>
                                                    <?php foreach ($courses as $course) { ?>
                                                        <li><a href="<?php echo base_url('course/' . $course->d_id); ?>"><?php echo $course->d_name; ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo base_url('alumni'); ?>">ALUMNI</a><span>Alumni</span>
                                            <li><a href="<?php echo base_url('events'); ?>">Events</a><span>University Events</span>

                                            </li>
                                            <li><a href="<?php echo base_url('syllabus'); ?>">Syllabus</a><span>Syllabus</span>
                                            </li>
                                            <li><a href="<?php echo base_url('site/forums'); ?>">Forum</a><span>Forum</span>
                                            </li>

                                            <li><a href="<?php echo base_url('contact'); ?>">Contact</a><span>inquire with us</span>

                                            </li>
                                            <li class="cs-search-area">
                                                <div class="cs-menu-slide">
                                                    <div class="mm-toggle">
                                                        <i class="icon-align-justify"></i>
                                                    </div>            
                                                </div>
                                                <div class="search-area">
                                                    <a href="#"><i class="icon-search2"></i></a>
                                                    <form>
                                                        <div class="input-holder">
                                                            <i class="icon-search2"></i>
                                                            <input type="text" placeholder="Enter any keyword">
                                                            <label class="cs-bgcolor">
                                                                <i class="icon-search5"></i>
                                                                <input type="submit" value="search">
                                                            </label>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="cs-search-area hidden-md hidden-lg">
                                        <div class="cs-menu-slide">
                                            <div class="mm-toggle">
                                                <i class="icon-align-justify"></i>
                                            </div>            
                                        </div>
                                        <div class="search-area">
                                            <a href="#"><i class="icon-search2"></i></a>
                                            <form>
                                                <div class="input-holder">
                                                    <i class="icon-search2"></i>
                                                    <input type="text" placeholder="Enter any keyword">
                                                    <label class="cs-bgcolor">
                                                        <i class="icon-search5"></i>
                                                        <input type="submit" value="search">
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header End --> 