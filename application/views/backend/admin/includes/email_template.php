
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

    <!-- Specific Page Data -->


    <!-- End of Data -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="keywords" content="<?php echo system_name(); ?> " />
        <meta name="description" content="">
        <meta name="author" content="Searchnative">

        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    


        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/img/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/img/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo.png">


        <!-- CSS -->

        <!-- Bootstrap & FontAwesome & Entypo CSS -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/font-entypo.css" rel="stylesheet" type="text/css">    

        <!-- Fonts CSS -->
        <link href="<?php echo base_url(); ?>assets/css/fonts.css"  rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
        <link href="<?php echo base_url(); ?>assets/plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
        <link href="<?php echo base_url(); ?>assets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 


        <link href="<?php echo base_url(); ?>assets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
        <link href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">            
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script> 

        <!-- Specific CSS -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysiwyg/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet" type="text/css">   
        <script src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>

        <!-- Theme CSS -->
        <link href="<?php echo base_url(); ?>assets/css/theme.min.css" rel="stylesheet" type="text/css">
        <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
        <link href="<?php echo base_url(); ?>assets/css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    



        <!-- Responsive CSS -->
        <link href="<?php echo base_url(); ?>assets/css/theme-responsive.min.css" rel="stylesheet" type="text/css"> 

        <!-- for specific page in style css -->        

        <!-- for specific page responsive in style css -->


        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/custom/custom.css" rel="stylesheet" type="text/css">


        <!-- Head SCRIPTS -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mobile-detect.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mobile-detect-modernizr.js"></script> 


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type="text/javascript" src="js/html5shiv.js"></script>
          <script type="text/javascript" src="js/respond.min.js"></script>     
        <![endif]-->
        
        <?php 
        $skin = $this->db->get_where('system_setting' , array('type' => 'skin_colour'))->row()->description;		
      ?> 
        <!-- Theme CSS -->
    <link id="pagestyle"  href="<?=$this->config->item('css_path')?><?php echo $skin; ?>" rel="stylesheet" type="text/css">
	

    </head>    

    <body id="email" class="full-layout    nav-top-fixed   nav-right-small   responsive    clearfix" data-active="email "  data-smooth-scrolling="1">     
        <div class="vd_body">
            <!-- Header Start -->
            <header class="header-1" id="header">
                <div class="vd_top-menu-wrapper">
                    <div class="container ">
                        <div class="vd_top-nav vd_nav-width  ">
                            <div class="vd_panel-header">
                                <div class="logo">
                                    <a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><img alt="logo" src="<?php echo base_url(); ?>assets/img/logo.png"></a>
                                </div>
                                <!-- logo -->
                                <div class="vd_panel-menu  hidden-sm hidden-xs" data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation." data-step=1>

                                </div>
                                <div class="vd_panel-menu left-pos visible-sm visible-xs">

                                    <span class="menu" data-action="toggle-navbar-left">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </span>  


                                </div>
                                <div class="vd_panel-menu visible-sm visible-xs">
                                    <span class="menu visible-xs" data-action="submenu">
                                        <i class="fa fa-bars"></i>
                                    </span>        

                                    <span class="menu visible-sm visible-xs" data-action="toggle-navbar-right">
                                        <i class="fa fa-comments"></i>
                                    </span>                   

                                </div>                                     
                                <!-- vd_panel-menu -->
                            </div>
                            <!-- vd_panel-header -->

                        </div>    
                        <div class="vd_container">
                            <div class="row">
                                <div class="col-sm-5 col-xs-12">

                                    <div class="vd_menu-search">
                                        <form id="search-box" method="post" action="<?php echo base_url('index.php?admin/search'); ?>">
                                        <input type="text" name="search" class="vd_menu-search-text width-60" placeholder="Search"
                                               value="<?php echo isset($search_string) ? $search_string : ''; ?>">
					<div class="vd_menu-search-category"> <span data-action="click-trigger"> <span class="separator"></span> <span class="text">Category</span> <span class="icon"> <i class="fa fa-caret-down"></i></span> </span>
					  <div class="vd_mega-menu-content width-xs-2 center-xs-2 right-sm" data-action="click-target">
						<div class="child-menu">
						  <div class="content-list content-menu content">
							<ul class="list-wrapper">
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" name="degree" value="degree"
                                                                           <?php if (isset($from['degree'])) echo 'checked'; ?>>
                                                                    <span>Degree</span>
                                                                </label>
                                                            </li>
							  <li>
								<label>
                                                                    <input type="checkbox" name="student" value="student"
                                                                           <?php if (isset($from['student'])) echo 'checked'; ?>>
                                                                    <span>Student</span></label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" name="course" value="course"
                                                                           <?php if (isset($from['course'])) echo 'checked'; ?>>
								  <span>Courses</span></label>
							  </li>
							  <li>
								<label>
                                                                    <input type="checkbox" name="exam" value="exam"
                                                                           <?php if (isset($from['exam'])) echo 'checked'; ?>>
                                                                    <span>Exam</span></label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" name="event" value="event"
                                                                           <?php if (isset($from['event'])) echo 'checked'; ?>>
                                                                    <span>Event</span>
                                                                </label>
                                                            </li>
                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" name="batch" value="batch"
                                                                           <?php if (isset($from['batch'])) echo 'checked'; ?>>
                                                                    <span>Batch</span></label>
							  </li>
							  <li>
								<label>
                                                                    <input type="checkbox" name="assignment" value="assignment"
                                                                           <?php if (isset($from['assignment'])) echo 'checked'; ?>>
                                                                    <span>Assignment</span></label>
							  </li>
							   <li>
								<label>
                                                                    <input type="checkbox" name="participate" value="participate"
                                                                           <?php if (isset($from['participate'])) echo 'checked'; ?>>
                                                                    <span>Participate</span></label>
							  </li>
							  <li>
								<label>
                                                                    <input type="checkbox" name="center" value="center"
                                                                           <?php if (isset($from['center'])) echo 'checked'; ?>>
								  <span>Exam Center</span></label>
                                                            </li>	
							</ul>
						  </div>
						</div>
					  </div>
					</div>
                                        <button class="vd_menu-search-submit fa fa-search"></button>                                        
				  </form>
                                    </div>
                                </div>
                                <div class="col-sm-7 col-xs-12">
                                    <div class="vd_mega-menu-wrapper">
                                        <div class="vd_mega-menu pull-right">
                                            <ul class="mega-ul">


                                                <li id="top-menu-3"  class="one-icon mega-li"> 
                                                    <a href="index.html" class="mega-link" data-action="click-trigger">
                                                        <span class="mega-icon"><i class="fa fa-globe"></i></span> 
                                                        <span class="badge vd_bg-red">0</span>        
                                                    </a>

                                                </li>  

                                                <li id="top-menu-profile" class="profile mega-li"> 
                                                    <a href="#" class="mega-link"  data-action="click-trigger"> 
                                                        <span  class="mega-image">
                                                            <img width="45" height="35" src="<?php echo $this->crud_model->get_image_url('admin', $this->session->userdata('admin_id')); ?>" alt="...">             
                                                        </span>
                                                        <span class="mega-name">
                                                            <?php echo $this->session->userdata('name'); ?> <i class="fa fa-caret-down fa-fw"></i> 
                                                        </span>
                                                    </a> 
                                                    <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
                                                        <div class="child-menu"> 
                                                            <div class="content-list content-menu">
                                                                <ul class="list-wrapper pd-lr-10">
                                                                    <li> <a href="<?php echo base_url('index.php?admin/manage_profile'); ?>"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
                                                                    <li> <a href="<?php echo base_url('index.php?login/logout'); ?>"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
                                                                </ul>
                                                            </div> 
                                                        </div> 
                                                    </div>     

                                                </li>              


                                            </ul>
                                            <!-- Head menu search form ends -->                         
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- container --> 
                </div>
                <!-- vd_primary-menu-wrapper --> 

            </header>
            <!-- Header Ends --> 
            <div class="content">
                <div class="container">
                    <div class="vd_navbar vd_nav-width vd_navbar-email vd_bg-black-80 vd_navbar-left vd_navbar-style-2 ">
                        <div class="navbar-tabs-menu clearfix">
                            <span class="expand-menu" data-action="expand-navbar-tabs-menu">
                                <span class="menu-icon menu-icon-left">
                                    <i class="fa fa-ellipsis-h"></i>
                                    <span class="badge vd_bg-red">
                                        20
                                    </span>                    
                                </span>
                                <span class="menu-icon menu-icon-right">
                                    <i class="fa fa-ellipsis-h"></i>
                                    <span class="badge vd_bg-red">
                                        20
                                    </span>                    
                                </span>                
                            </span>  
                            <div class="menu-container">               
                                <div class="navbar-search-wrapper">
                                    <div class="navbar-search vd_bg-black-30">
                                        <span class="append-icon"><i class="fa fa-search"></i></span>
                                        <input type="text" placeholder="Search" class="vd_menu-search-text no-bg no-bd vd_white width-70" name="search">

                                    </div>
                                </div>  
                            </div>        

                        </div>
                        <div class="navbar-menu clearfix">
                            <h3 class="menu-title hide-nav-medium hide-nav-small">
                                <a href="<?php echo base_url(); ?>index.php?admin/email_compose" class="btn vd_btn vd_bg-red">
                                    <span class="append-icon"><i class="icon-feather"></i></span>
                                    Compose Email
                                </a>
                            </h3>
                            <div class="vd_menu">
                                <ul>
                                    <li class="line vd_bd-grey">
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('index.php?admin/email_inbox'); ?>">
                                            <span class="menu-icon entypo-icon"><i class="icon-mail"></i></span> 
                                            <span class="menu-text">Inbox</span>  
                                        </a> 
                                    </li> 
                                    <!--                                    <li>
                                                                            <a href="<?php echo base_url('index.php?admin/email_draft'); ?>">
                                                                                <span class="menu-icon"><i class="fa fa-archive"></i></span> 
                                                                                <span class="menu-text">Drafts</span>            
                                                                            </a>
                                                                        </li>          -->
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php?admin/email_sent">
                                            <span class="menu-icon entypo-icon"><i class="icon-paperplane"></i></span> 
                                            <span class="menu-text">Sent</span>  
                                        </a>
                                    </li> 
                                    <li class="line vd_bd-grey">
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php?admin/dashboard">
                                            <span class="menu-icon"><i class="fa fa-desktop"></i></span> 
                                            <span class="menu-text">Back to Home</span>  
                                        </a>
                                    </li>                             
                                </ul>
                                <!-- Head menu search form ends -->         </div>  


                        </div>
                        <div class="navbar-spacing clearfix">
                        </div>
                    </div>      

                    <?php
                    // Load the sub view
                    // $content is a sub view name which is assigned from controller
                    $this->load->view($content);
                    ?>

                </div>
                <!-- .container -->
            </div>
            <!-- .content -->

            <!-- Footer Start -->
            <footer class="footer-1"  id="footer">      
                <div class="vd_bottom ">
                    <div class="container">
                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="copyright">
                                    Copyright &copy;2014 . All Rights Reserved 
                                </div>
                            </div>
                        </div><!-- row -->
                    </div><!-- container -->
                </div>
            </footer>
            <!-- Footer END -->
            <div class="vd_chat-menu hidden-xs">
                <div class="vd_mega-menu-wrapper">


                </div>

                <!-- .vd_body END  -->
                <a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

                <!--
                <a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

                <!-- Javascript =============================================== --> 
                <!-- Placed at the end of the document so the pages load faster --> 

                <!--[if lt IE 9]>
                  <script type="text/javascript" src="js/excanvas.js"></script>      
                <![endif]-->
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
                <script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.custom.min.js'></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/caroufredsel.js"></script> 
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/breakpoints/breakpoints.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/dataTables/jquery.dataTables.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tagsInput/jquery.tagsinput.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/blockUI/jquery.blockUI.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/pnotify/js/jquery.pnotify.min.js"></script>

                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/theme.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/custom.js"></script>

                <!-- Specific Page Scripts Put Here -->

                <script>

                    $(function () {
                        "use strict";
                        $('#checkbox-0').click(function () {
                            if ($(this).is(':checked'))
                                $('.checkbox-group').prop('checked', true).closest("tr").addClass('row-warning');
                            else
                                $('.checkbox-group').prop('checked', false).closest("tr").removeClass('row-warning');
                        });

                        $('.checkbox-group').click(function () {
                            if ($(this).is(':checked'))
                                $(this).closest("tr").addClass('row-warning');
                            else
                                $(this).closest("tr").removeClass('row-warning')
                        });
                    });
                </script>
                <!-- Specific Page Scripts END -->


                </body>
                </html>