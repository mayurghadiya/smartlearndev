<meta charset="utf-8" />
<title><?php echo system_name(); ?> | <?php echo $title; ?></title>
<meta name="keywords" content="HTML5 Template, CSS3, All Purpose professor Template, Smart learn" />
<meta name="description" content="Login Pages - Responsive professor HTML Template">
<meta name="author" content="Venmond">

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">   
<link rel="stylesheet" href="<?php echo base_url() . 'assets/button/'; ?>css/flags.min.css" media="all">

<!-- altair professor -->
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
                                <a href="<?php echo base_url(); ?>index.php?professor/"><img alt="logo" src="<?= $this->config->item('image_path') ?>logo.png"></a>
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
                                    <form id="search-box" method="post" action="<?php echo base_url('index.php?professor/search'); ?>">
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
                                                <a href="<?php echo base_url(); ?>index.php?professor/email" class="mega-link" data-action="click-trigger">
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
                                                        <img width="45" height="35" src="<?php echo $this->crud_model->get_image_url('professor', $this->session->userdata('professor_id')); ?>" alt="...">             
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
                                                                <li> <a href="<?php echo base_url(); ?>index.php?professor/manage_profile"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
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
                                    <a href="javascript:void(0);" data-action="click-trigger" <?php if ($page_name == "degree" || $page_name == "course" || $page_name == "batch" || $page_name == "semesterlist" || $page_name == "admission_type" || $page_name == "student" || $page_name == "subject" || $page_name == "holiday" || $page_name == "chancellor" || $page_name == "assessments" ) { ?> class="open" <?php } ?> >
                                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span> 
                                        <span class="menu-text">Basic Management</span>  
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                                    </a>
                                    <div class="child-menu"  data-action="click-target" <?php if ($page_name == "degree" || $page_name == "course" || $page_name == "batch" || $page_name == "semesterlist" || $page_name == "admission_type" || $page_name == "student" || $page_name == "subject" || $page_name == "syllabus" || $page_name == "holiday" || $page_name == "chancellor" || $page_name == "assessments" ) { ?> style="display: block" <?php } ?>>
                                        <ul>
                                            
                                            <li <?php if ($page_name == "student") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>professor/student"> 
                                                    <span class="menu-text">Student</span>  						
                                                </a> 
                                            </li>	
                                            <li <?php if ($page_name == "subject") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>professor/subject">
                                                    <span class="menu-text">Subject</span>  						
                                                </a> 
                                            </li>
                                            <li <?php if ($page_name == "syllabus") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>professor/syllabus">
                                                    <span class="menu-text">Syllabus Management</span>  						
                                                </a> 
                                            </li>
                                            <li <?php if ($page_name == "holiday") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>professor/holiday">
                                                    <span class="menu-text">Holiday</span>  						
                                                </a> 
                                            </li>     
                                            <li <?php if ($page_name == "assessments") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>professor/assessments">
                                                    <span class="menu-text">Assessments Management</span>  						
                                                </a> 
                                            </li>

                                        </ul> 
                                    </div>
                                </li> 
                                <li>
                                    <a href="javascript:void(0);"   data-action="click-trigger" <?php if ($page_name == "events" || $page_name == "assignment" || $page_name == "project" || $page_name == "participate" || $page_name == "studyresource" || $page_name == "library" ||$page_name == "courseware" ) { ?> class="open" <?php } ?> >
                                        <span class="menu-icon"><i class="fa fa-sitemap"> </i></span>
                                        <span class="menu-text">Asset Management</span>
                                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                                    </a>
                                    <div class="child-menu"   data-action="click-target"  <?php if ($page_name == "events" || $page_name == "assignment" || $page_name == "project" || $page_name == "participate" || $page_name == "studyresource" || $page_name == "library" || $page_name == 'subscriber' ||$page_name == "courseware" ) { ?> style="display: block;" <?php } ?>>
                                        <ul class="clearfix">   
                                            <li  <?php if ($page_name == "events") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url(); ?>professor/events">
                                                    <span class="menu-text">Events</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "assignment") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('professor/assignment'); ?>">
                                                    <span class="menu-text">Assignments</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>
                                            <li  <?php if ($page_name == "studyresource") { ?> class="selectednavmenu" <?php } ?>> 
                                                <a href="<?php echo base_url('professor/studyresource'); ?>">
                                                    <span class="menu-text">Study Resources</span> 
                                                    <span class="menu-badge"></span>
                                                </a>          
                                            </li>   
                                            <li   <?php if ($page_name == "project") { ?> class="selectednavmenu" <?php } ?>>					
                                                <a href="<?php echo base_url('professor/project'); ?>">
                                                    <span class="menu-text">Project/Synopsis</span>  						
                                                </a>
                                            </li>
                                            <li  <?php if ($page_name == "library") { ?> class="selectednavmenu" <?php } ?>>							
                                                <a href="<?php echo base_url('professor/library'); ?>">
                                                    <span class="menu-text">Digital Library</span>  
                                                </a>
                                            </li>
                                            <li <?php if ($page_name == "participate") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url('professor/participate'); ?>">
                                                    <span class="menu-text">Participate</span>  
                                                </a>
                                            </li>  
                                            <li <?php if ($page_name == "courseware") { ?> class="selectednavmenu" <?php } ?>>
                                                <a href="<?php echo base_url('professor/courseware'); ?>">
                                                    <span class="menu-text">Courseware</span>  
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
                                                <a href="<?php echo base_url(); ?>professor/graduate">
                                                    <span class="menu-text">Toppers Graduate</span>  
                                                </a>
                                            </li> 
                                         
                                        </ul>
                                    </div>
                                </li>	
                                 <li class="<?php if($page_name == 'class_routine') echo 'active'; ?>">
                                    <a  href="<?php echo base_url('professor/class_routine'); ?>" <?php if($page_name == "class_routine"){  ?> <?php } ?>>
                                        <span class="menu-icon"><i class="fa fa-road"> </i></span>
                                        <span class="menu-text">Class Routine</span>
                                    </a>
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
                                                <a href="<?php echo base_url('professor/marks'); ?>">
                                                    <span class="menu-text">Marks</span>  
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
                                                <a href="<?php echo base_url(); ?>professor/email_inbox">
                                                    <span class="menu-text">Email Management</span>  
                                                    <span class="menu-badge"></span>
                                                </a> 
                                            </li>
                                            <li>
                                                <a target="_blank" href="http://www.searchnative.in/hosting/smartlearn/chat/index.php/site_professor/user/login">
                                                    <span class="menu-text">Chat</span>  
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
