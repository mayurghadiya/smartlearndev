<meta charset="utf-8" />
<title><?php echo system_name(); ?> | <?php echo $title; ?></title>
<meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, Smart learn" />
<meta name="description" content="Login Pages - Responsive Admin HTML Template">
<meta name="author" content="Venmond">

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">   
<link rel="stylesheet" href="<?php echo base_url() . 'assets/button/'; ?>css/flags.min.css" media="all">

<!-- altair admin -->
<link rel="stylesheet" href="<?php echo base_url() . 'assets/button/'; ?>css/main.min.css" media="all">
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="img/ico/favicon.png">

<!-- CSS -->

<!-- Bootstrap & FontAwesome & Entypo CSS -->
<link href="<?= $this->config->item('css_path') ?>bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<link href="<?= $this->config->item('css_path') ?>font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
<link href="<?= $this->config->item('css_path') ?>font-entypo.css" rel="stylesheet" type="text/css">    

<!-- Fonts CSS -->
<link href="<?= $this->config->item('css_path') ?>fonts.css"  rel="stylesheet" type="text/css">

<!-- Plugin CSS -->
<link href="<?= $this->config->item('custom_plugin') ?>jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
<link href="<?= $this->config->item('custom_plugin') ?>prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>isotope/css/isotope.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
<link href="<?= $this->config->item('custom_plugin') ?>google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
<link href="<?php echo base_url(); ?>assets/plugins/dataTables/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">    


<link href="<?= $this->config->item('custom_plugin') ?>mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
<link href="<?= $this->config->item('custom_plugin') ?>daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
<link href="<?= $this->config->item('custom_plugin') ?>bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
<link href="<?= $this->config->item('custom_plugin') ?>/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">
<!-- Specific CSS -->
<?php
$skin = $this->db->get_where('system_setting', array('type' => 'skin_colour'))->row()->description;
?>     

<!-- Theme CSS -->
<link id="pagestyle"  href="<?= $this->config->item('css_path') ?><?php echo $skin; ?>" rel="stylesheet" type="text/css">


<!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
<link href="<?= $this->config->item('css_path') ?>chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->

<!-- Responsive CSS -->
<link href="<?= $this->config->item('css_path') ?>theme-responsive.min.css" rel="stylesheet" type="text/css"> 
<!-- for specific page in style css -->

<!-- for specific page responsive in style css -->


<!-- Custom CSS -->
<link href="<?= $this->config->item('asset') ?>custom/custom.css" rel="stylesheet" type="text/css">
    <!--<link href="<?= $this->config->item('css_path') ?>dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">    -->
<!-- Head SCRIPTS -->
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>modernizr.js"></script> 
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>mobile-detect.min.js"></script> 
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>mobile-detect-modernizr.js"></script> 

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script type="text/javascript" src="js/html5shiv.js"></script>
  <script type="text/javascript" src="js/respond.min.js"></script>     
<![endif]-->


<body id="dashboard" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="dashboard "  data-smooth-scrolling="1">     
    <div class="vd_body">
        <!-- Header Start -->
        <header class="header-1" id="header">
            <div class="vd_top-menu-wrapper">
                <div class="container ">
                    <div class="vd_top-nav vd_nav-width  ">
                        <div class="vd_panel-header">
                            <div class="logo">
                                <a href="<?php echo base_url(); ?>index.php?admin/"><img alt="logo" src="<?= $this->config->item('image_path') ?>logo.png"></a>
                            </div>
                            <!-- logo -->
                            <div class="vd_panel-menu  hidden-sm hidden-xs" data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation." data-step=1>
                                <span class="nav-medium-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Medium Nav Toggle" data-action="nav-left-medium"><i class="fa fa-bars"></i>
                                </span>																
                                <span class="nav-small-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Small Nav Toggle" data-action="nav-left-small">
                                    <i class="fa fa-ellipsis-v"></i>
                                </span> 			   
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
                                            <li id="top-menu-1"  class="one-icon mega-li"> 
                                                <span class="icon-phone" > <a href="tel:+<?php echo system_info('country_code'); ?> <?php echo system_info('phone'); ?>">+<?php echo system_info('country_code'); ?> <?php echo system_info('phone'); ?></a></span>
                                            </li>
                                            <li id="top-menu-88"  class="one-icon mega-li"> 
                                                <span class="fa fa-envelope" > &nbsp;<a href="mail:<?php echo system_info('system_email'); ?>"><?php echo system_info('system_email'); ?></a></span>
                                            </li>

                                            <li id="top-menu-2"  class="one-icon mega-li"> 
                                                <a href="<?php echo base_url(); ?>index.php?admin/email" class="mega-link" data-action="click-trigger">
                                                    <span class="mega-icon"><i class="fa fa-globe"></i></span> 
                                                    <span class="badge vd_bg-red">
                                                        <?php
                                                        $new_mail = $this->db->get_where('email', array('read' => 0, 'email_to' => $this->session->userdata('email')))->result_array();
                                                        if (count($new_mail) > 0) {
                                                            echo count($new_mail);
                                                        } else {
                                                            echo '0';
                                                        }
                                                        ?>
                                                    </span>        
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
                                                                <li> <a href="<?php echo base_url(); ?>index.php"> <div class="menu-icon"><i class=" fa fa-dashboard"></i></div> <div class="menu-text">Home</div> </a> </li>
                                                                <li> <a href="<?php echo base_url(); ?>index.php?admin/manage_profile"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
                                                                <li> <a href="<?php echo base_url(); ?>index.php?login/logout"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
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

                <div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left  ">

                    <div class="navbar-menu clearfix">
                        <div class="vd_panel-menu hidden-xs">
                            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu" data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu." data-step=4 >
                                <i class="fa fa-sort-amount-asc"></i>
                            </span>                   
                        </div>
                        <h3 class="menu-title hide-nav-medium hide-nav-small"></h3>
                        <div class="vd_menu">
                            <ul>                  

                                <li>
                                    <a href="javascript:void(0);" data-action="click-trigger" <?php if ($page_name == "degree" || $page_name == "course" || $page_name == "batch" || $page_name == "semesterlist" || $page_name == "admission_type" || $page_name == "student" || $page_name == "subject" || $page_name == "holiday" || $page_name == "chancellor") { ?> class="open" <?php } ?> >
                                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span> 
                                        <span class="menu-text">Basic Management</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                                    </a>
                                    <div class="child-menu"  data-action="click-target" <?php if ($page_name == "degree" || $page_name == "course" || $page_name == "batch" || $page_name == "semesterlist" || $page_name == "admission_type" || $page_name == "student" || $page_name == "subject" || $page_name == "syllabus" || $page_name == "holiday" || $page_name == "chancellor") { ?> style="display: block" <?php } ?>>
                                        <ul>
                                            <li <?php if ($page_name == "degree") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/degree"> 
                                                    <span class="menu-text">Course</span>  						
                                                </a> 
                                            </li>
                                            <li <?php if ($page_name == "course") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/courses">
                                                    <span class="menu-text">Branch</span>  						
                                                </a> 
                                            </li>	
                                            <li <?php if ($page_name == "batch") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/batch">
                                                    <span class="menu-text">Batch</span>  						
                                                </a> 
                                            </li>

                                            <li <?php if ($page_name == "semesterlist") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/semester">
                                                    <span class="menu-text">Semester</span>  						
                                                </a> 
                                            </li>	
                                            <li  <?php if ($page_name == "admission_type") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url(); ?>admin/admission_type">
                                                    <span class="menu-text">Admission Type</span>  						
                                                </a> 
                                            </li>
                                            <li <?php if ($page_name == "student") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/student"> 
                                                    <span class="menu-text">Student</span>  						
                                                </a> 
                                            </li>	
                                            <li <?php if ($page_name == "subject") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/subject">
                                                    <span class="menu-text">Subject</span>  						
                                                </a> 
                                            </li>
                                            <li <?php if ($page_name == "syllabus") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/syllabus">
                                                    <span class="menu-text">Syllabus Management</span>  						
                                                </a> 
                                            </li>
                                            <li <?php if ($page_name == "holiday") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/holiday">
                                                    <span class="menu-text">Holiday</span>  						
                                                </a> 
                                            </li>
                                            <li <?php if ($page_name == "chancellor") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/chancellor">
                                                    <span class="menu-text">Chancellor</span>  						
                                                </a> 
                                            </li>
                                            <li>
                                                                         <!--  <a href="<?php echo base_url(); ?>admin/center">
                                                                               <span class="menu-text">Exam Center</span>  						
                                                                           </a>--> 
                                            </li>	
                                        </ul> 
                                    </div>
                                </li> 
                                <li>
                                    <a href="javascript:void(0);"   data-action="click-trigger" <?php if ($page_name == "events" || $page_name == "assignment" || $page_name == "project" || $page_name == "participate" || $page_name == "studyresource" || $page_name == "library") { ?> class="open" <?php } ?> >
                                        <span class="menu-icon"><i class="fa fa-sitemap"> </i></span>
                                        <span class="menu-text">Asset Management</span>
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu"   data-action="click-target"  <?php if ($page_name == "events" || $page_name == "assignment" || $page_name == "project" || $page_name == "participate" || $page_name == "studyresource" || $page_name == "library" || $page_name == 'subscriber') { ?> style="display: block;" <?php } ?>>
                                        <ul class="clearfix">   
                                            <li  <?php if ($page_name == "events") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/events">
                                                    <span class="menu-text">Events</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "assignment") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('admin/assignment'); ?>">
                                                    <span class="menu-text">Assignments</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                            <li  <?php if ($page_name == "studyresource") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('admin/studyresource'); ?>">
                                                    <span class="menu-text">Study Resources</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>   
                                            <li   <?php if ($page_name == "project") { ?> class="selectednavmenu" <?php } ?>>					
                                                <a href="<?php echo base_url('admin/project'); ?>">
                                                    <span class="menu-text">Project/Synopsis</span>  						
                                                </a>
                                            </li>
                                            <li  <?php if ($page_name == "library") { ?> class="selectednavmenu" <?php } ?>>							
                                                <a href="<?php echo base_url('admin/library'); ?>">
                                                    <span class="menu-text">Digital Library</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "participate") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url('admin/participate'); ?>">
                                                    <span class="menu-text">Participate</span>  
                                                </a>
                                            </li> 
                                            <li <?php if ($page_name == "subscriber") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url('admin/subscriber'); ?>">
                                                    <span class="menu-text">Subscriber</span>  
                                                </a>
                                            </li> 
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a  href="javascript:void(0);" data-action="click-trigger" <?php if ($page_name == "graduate" || $page_name == 'charity_fund') { ?> class="open" <?php } ?>>
                                        <span class="menu-icon"><i class="fa fa-building"> </i></span>
                                        <span class="menu-text">University</span>
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu"   data-action="click-target"  <?php if ($page_name == "graduate" || $page_name == 'charity_fund') { ?> style="display: block;" <?php } ?>>
                                        <ul class="clearfix">   
                                            <li  <?php if ($page_name == "graduate") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/graduate">
                                                    <span class="menu-text">Toppers Graduate</span>  
                                                </a>
                                            </li> 
                                            <li  <?php if ($page_name == "charity_fund") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/charity_fund">
                                                    <span class="menu-text">Charity Fund</span>  
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>	
                                <li>
                                    <a  href="javascript:void(0);" data-action="click-trigger" <?php if ($page_name == "professor") { ?> class="open" <?php } ?>>
                                        <span class="menu-icon"><i class="fa fa-user"> </i></span>
                                        <span class="menu-text">Professor</span>
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu"   data-action="click-target"  <?php if ($page_name == "professor") { ?> style="display: block;" <?php } ?>>
                                        <ul class="clearfix">   
                                            <li  <?php if ($page_name == "professor") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/professor">
                                                    <span class="menu-text">Add Professor</span>  
                                                </a>
                                            </li> 
                                        </ul>
                                    </div>
                                </li>	
                                <li>
                                    <a href="javascript:void(0);" data-action="click-trigger" <?php if ($page_name == "exam" || $page_name == "exam_time_table" || $page_name == "exam_marks" || $page_name == "grade" || $page_name == "remedial_exam" || $page_name == "remedial_exam_time_table" || $page_name == "remedial_exam_marks") { ?> class="open" <?php } ?>>
                                        <span class="menu-icon"><i class="fa fa-th-list"></i></span> 
                                        <span class="menu-text">Examinations</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                                    </a>
                                    <div class="child-menu" data-action="click-target" <?php if ($page_name == "exam" || $page_name == "exam_time_table" || $page_name == "exam_marks" || $page_name == "grade" || $page_name == "remedial_exam" || $page_name == "remedial_exam_time_table" || $page_name == "remedial_exam_marks") { ?> style="display: block" <?php } ?>>
                                        <ul>
                                            <li <?php if ($page_name == "exam") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>professor/exam">
                                                    <span class="menu-text">Exam</span>  
                                                </a>
                                            </li>              
                                            <li <?php if ($page_name == "exam_time_table") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>professor/exam_time_table">
                                                    <span class="menu-text">Exam Schedule</span>  
                                                </a>
                                            </li>   
                                            <li <?php if ($page_name == "exam_marks") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url('admin/marks'); ?>">
                                                    <span class="menu-text">Marks</span>  
                                                </a>
                                            </li> 
                                            <li <?php if ($page_name == "grade") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url('admin/grade'); ?>">
                                                    <span class="menu-text">Exam Grade</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "remedial_exam") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/remedial_exam">
                                                    <span class="menu-text">Remedial Exam</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "remedial_exam_time_table") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/remedial_exam_schedule">
                                                    <span class="menu-text">Remedial Exam Schedule</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "remedial_exam_marks") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/remedial_exam_marks">
                                                    <span class="menu-text">Remedial Exam Marks</span>  
                                                </a>
                                            </li>                            
                                        </ul>   
                                    </div>
                                </li>  

                                <li>
                                    <a href="javascript:void(0);"   data-action="click-trigger" <?php if ($page_name == "cms_manager" || $page_name == "cms") { ?> class="open" <?php } ?>>
                                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span>
                                        <span class="menu-text">CMS Management</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu" data-action="click-target" <?php if ($page_name == "cms_manager" || $page_name == "cms") { ?> style="display: block" <?php } ?>>
                                        <ul class="clearfix">          
                                            <li <?php if ($page_name == "cms_manager") { ?> class="selectednavmenu" <?php } ?> style="display: none;"> 
                                                <a href="<?php echo base_url('admin/cms_manager'); ?>">
                                                    <span class="menu-text">CMS Dynamic Pages</span>
                                                </a>          
                                            </li>
                                            <li <?php if ($page_name == "cms") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/cms">
                                                    <span class="menu-text">CMS Pages</span>  
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>               

                                <li>
                                    <a href="javascript:void(0);"   data-action="click-trigger" <?php if ($page_name == "fees_structure" || $page_name == "make_payment") { ?> class="open" <?php } ?>>
                                        <span class="menu-icon entypo-archive"><i class="fa fa-dollar"></i></span>
                                        <span class="menu-text">Payment Management</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu" data-action="click-target" <?php if ($page_name == "fees_structure" || $page_name == "make_payment") { ?> style="display: block" <?php } ?>>
                                        <ul class="clearfix">          
                                            <li <?php if ($page_name == "fees_structure") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('admin/fees_structure'); ?>">
                                                    <span class="menu-text">Fees Structure</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                            <li <?php if ($page_name == "make_payment") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url('admin/make_payment'); ?>">
                                                    <span class="menu-text">Make Payment</span>  
                                                </a>
                                            </li> 
                                        </ul>
                                    </div>
                                </li>                

                                <li>
                                    <a href="javascript:void(0);" data-action="click-trigger" <?php if ($page_name == "report_chart" || $page_name == "report_chart_exam") { ?> class="open" <?php } ?>>
                                        <span class="menu-icon"><i class="fa fa-bar-chart-o"></i></span> 
                                        <span class="menu-text">Reports</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                                    </a>
                                    <div class="child-menu"  data-action="click-target" <?php if ($page_name == "report_chart" || $page_name == "report_chart_exam") { ?> style="display: block" <?php } ?>>
                                        <ul>
                                            <li <?php if ($page_name == "report_chart") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/report_chart/student">
                                                    <span class="menu-text">Student</span>  
                                                </a>
                                            </li> 
                                            <!-- <li>
                                                 <a href="<?php echo base_url(); ?>admin/report_chart/exam">
                                                     <span class="menu-text">Exam</span>  
                                                 </a>
                                             </li>                             -->
                                        </ul>   
                                    </div>
                                </li>  

                                <!--<li>
                                    <a href="reports.html">
                                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span>
                                        <span class="menu-text">Reports</span>  
                                    </a>
                                </li>-->
                                <li>
                                    <a href="javascript:void(0);"   data-action="click-trigger" <?php if ($page_name == "restore") { ?> class="open" <?php } ?>>
                                        <span class="menu-icon entypo-download"><i class="icon-download"></i></span>
                                        <span class="menu-text">Backup/Restore</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu" data-action="click-target"  <?php if ($page_name == "restore") { ?>  style="display: block" <?php } ?>>
                                        <ul class="clearfix">
                                            <li > 
                                                <a href="<?php echo base_url('admin/backup'); ?>">
                                                    <span class="menu-text">Backup</span>  
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                            <li <?php if ($page_name == "restore") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('admin/restore'); ?>">
                                                    <span class="menu-text">Restore</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"   data-action="click-trigger" <?php if ($page_name == "import" || $page_name == "export") { ?> class="open"<?php } ?>>
                                        <span class="menu-icon entypo-icon"><i class="icon-upload"></i></span>
                                        <span class="menu-text">Import/Export</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu" data-action="click-target"  <?php if ($page_name == "import" || $page_name == "export") { ?> style="display: block" <?php } ?>>
                                        <ul class="clearfix">
                                            <li  <?php if ($page_name == "import") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('admin/import'); ?>">
                                                    <span class="menu-text">Import</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                            <li  <?php if ($page_name == "export") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('admin/export'); ?>">
                                                    <span class="menu-text">Export</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                        </ul>
                                    </div>
                                </li>	

                                <li> 
                                    <a href="<?php echo base_url('video_streaming'); ?>">
                                        <span class="menu-icon entypo-icon"><i class="fa fa-desktop"></i></span>
                                        <span class="menu-text">Live Video Streaming</span> 
                                        <span class="menu-badge"></span>
                                    </a>          
                                </li>

                                <li>
                                    <a href="javascript:void(0);" data-action="click-trigger">
                                        <span class="menu-icon entypo-icon"><i class="fa fa-envelope"></i></span> 
                                        <span class="menu-text">Email &amp; Chat</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                                    </a>
                                    <div class="child-menu"  data-action="click-target">
                                        <ul>
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/email_inbox">
                                                    <span class="menu-text">Email Management</span>  
                                                    <span class="menu-badge"></span>
                                                </a> 
                                            </li>
                                            <li>
                                                <a target="_blank" href="http://www.searchnative.in/hosting/smartlearn/chat/index.php/site_admin/user/login">
                                                    <span class="menu-text">Chat</span>  
                                                    <span class="menu-badge"></span>
                                                </a> 
                                            </li>
                                        </ul> 
                                    </div>
                                </li> 
                                <li>
                                    <a href="javascript:void(0);"   data-action="click-trigger" <?php if ($page_name == "photo_gallery" || $page_name == "banner_slider") { ?> class="open"<?php } ?> >
                                        <span class="menu-icon entypo-archive"><i class="fa fa-cubes"></i></span>
                                        <span class="menu-text">Media</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu" data-action="click-target" <?php if ($page_name == "photo_gallery" || $page_name == "banner_slider") { ?> style="display:block" <?php } ?>  >
                                        <ul class="clearfix">          
                                            <li <?php if ($page_name == "photo_gallery") { ?> class="selectednavmenu" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>media/photogallery">
                                                    <span class="menu-text">Photo Gallery</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "banner_slider") { ?> class="selectednavmenu" <?php } ?> >
                                                <a href="<?php echo base_url(); ?>media/bannerslider">
                                                    <span class="menu-text">Banner Slider</span>  
                                                </a>
                                            </li>


                                        </ul>
                                    </div>
                                </li>
                                <li >
                                    <a href="javascript:void(0);" data-action="click-trigger" <?php if ($page_name == "create_group" || $page_name == "list_group") { ?> class="open" <?php } ?>>
                                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span> 
                                        <span class="menu-text">User Management</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                                    </a>
                                    <div class="child-menu"  data-action="click-target" <?php if ($page_name == "create_group" || $page_name == "list_group") { ?> style="display: block" <?php } ?>>
                                        <ul>
                                            <li <?php if ($page_name == "create_group") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/create_group">
                                                    <span class="menu-text">Create Groups</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "list_group") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/list_group">
                                                    <span class="menu-text">List Groups</span>  
                                                </a>
                                            </li>
                                            <!--  <li>
                                                  <a href="<?php echo base_url(); ?>admin/assign_module">
                                                      <span class="menu-text">Assign Module</span>  
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="<?php echo base_url(); ?>admin/list_module">
                                                      <span class="menu-text">List Module</span>  
                                                  </a>
                                              </li>-->			
                                        </ul>   
                                    </div>
                                </li> 

                                <li>
                                    <a href="javascript:void(0);"   data-action="click-trigger" <?php if ($page_name == "system_settings" || $page_name == "authorize_payment_config") { ?> class="open" <?php } ?>>
                                        <span class="menu-icon entypo-archive"><i class="fa fa-cubes"></i></span>
                                        <span class="menu-text">Settings</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu" data-action="click-target" <?php if ($page_name == "system_settings" || $page_name == "authorize_payment_config") { ?> style="display: block" <?php } ?>>
                                        <ul class="clearfix">          
                                            <li  <?php if ($page_name == "system_settings") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>admin/system_settings">
                                                    <span class="menu-text">General Settings</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "authorize_payment_config") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('admin/authorize_payment_config'); ?>">
                                                    <span class="menu-text">Authorize.net Config</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                            <li> 
                                                <a href="#">
                                                    <span class="menu-text">Paypal Config</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                            <!-- Head menu search form ends -->         
                        </div>             
                    </div>
                </div>    
                <!-- Middle Content Start -->
