<body id="ui" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed  responsive  clearfix" data-active="ui " data-smooth-scrolling="1">     
    <div class="vd_body">
        <!-- Header Start -->
        <header class="header-1" id="header">
            <div class="vd_top-menu-wrapper">
                <div class="container ">
                    <div class="vd_top-nav vd_nav-width  ">
                        <div class="vd_panel-header">
                            <div class="logo">
                                <a href="<?php echo base_url(); ?>"><img alt="logo" src="<?= $this->config->item('image_path') ?>logo.png"></a>
                            </div>
                            <!-- logo -->           
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
                                    <form id="search-box" method="post" action="<?php echo base_url('index.php?student/search'); ?>">
                                        <input type="text" name="search" class="vd_menu-search-text width-60" placeholder="Search"
                                               value="<?php echo isset($search_string) ? $search_string : ''; ?>">
                                        <div class="vd_menu-search-category"> <span data-action="click-trigger"> <span class="separator"></span> <span class="text">Category</span> <span class="icon"> <i class="fa fa-caret-down"></i></span> </span>
                                            <div class="vd_mega-menu-content width-xs-2 center-xs-2 right-sm" data-action="click-target">
                                                <div class="child-menu">
                                                    <div class="content-list content-menu content">
                                                        <ul class="list-wrapper">

                                                            <li>
                                                                <label>
                                                                    <input type="checkbox" name="exam" value="exam"
                                                                           <?php if (isset($from['exam'])) echo 'checked'; ?>>
                                                                    <span>Exam</span></label>
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

                                                            <span>Participate</span></label>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="vd_menu-search-submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-sm-7 col-xs-12">
                                <div class="vd_mega-menu-wrapper">
                                    <div class="vd_mega-menu pull-right">
                                        <ul class="mega-ul">
                                            <li id="top-menu-1"  class="one-icon mega-li"> 
                                                <span id="et-info-phone" >Toll Free: <a href="tel:+123456789">+91 123.456.789</a></span>
                                            </li>

                                            <li id="top-menu-2"  class="one-icon mega-li"> 
                                                <a href="<?php echo base_url(); ?>index.php?admin/email" class="mega-link" data-action="click-trigger">
                                                    <span class="mega-icon"><i class="fa fa-globe"></i></span> 
                                                    <span class="badge vd_bg-red">
                                                        <?php echo $this->session->userdata('notifications')['total_notification']; ?></span>        
                                                </a> 
                                                <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
                                                    <div class="child-menu">  
                                                        <div class="title"> 
                                                            Notifications 
                                                            <div class="vd_panel-menu">
                                                                <span data-original-title="Notification Setting" data-toggle="tooltip" data-placement="bottom" class="menu">
                                                                    <i class="fa fa-cog"></i></h3>
                                                                </span>                           
                                                            </div>
                                                        </div>    
                                                        <div class="content-list">	
                                                            <div style="overflow: hidden;" class="mCustomScrollbar _mCS_3" data-rel="scroll"><div class="mCustomScrollBox mCS-light" id="mCSB_3" style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 400px;"><div class="mCSB_container mCS_no_scrollbar" style="position: relative; top: 0px;">	
                                                                        <ul class="list-wrapper pd-lr-10">
                                                                            <?php if (isset($this->session->userdata('notifications')['fees_structure'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/student_fees'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> New fee structure was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?>

                                                                            <?php if (isset($this->session->userdata('notifications')['exam_manager']) ||
                                                                                    isset($this->session->userdata('notifications')['exam_time_table'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/exam_listing'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> New exam or exam schedule was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?>
                                                                             <?php if (isset($this->session->userdata('notifications')['assignment_manager'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/assignment/assignment_list'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> New assignment was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?>
                                                                                 <?php if (isset($this->session->userdata('notifications')['project_manager'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/project/submission'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> New Project was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?> 
                                                                                <?php if (isset($this->session->userdata('notifications')['marks_manager'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/exam_marks'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> Exam marks was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?> 
                                                                                <?php if (isset($this->session->userdata('notifications')['marks_manager'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/exam_marks'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> Exam marks was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?>  
                                                                                 <?php if (isset($this->session->userdata('notifications')['participate_manager'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/volunteer'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> New Participate was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?>
                                                                                 <?php if (isset($this->session->userdata('notifications')['study_resources'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/studyresources'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> New Study Resources was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?>
                                                                                 <?php if (isset($this->session->userdata('notifications')['library_manager'])) { ?>
                                                                                <li> 
                                                                                    <a href="<?php echo base_url('index.php?student/digitallibrary'); ?>"> 
                                                                                        <div class="menu-icon vd_yellow"><i class="fa fa-suitcase"></i></div> 
                                                                                        <div class="menu-text"> New Digital Library was added.
                                                                                        </div> 
                                                                                    </a> 
                                                                                </li>
                                                                            <?php } ?>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- child-menu  -->             
                                                        </div>  
                                                        </li> 
                                                        <li id="top-menu-profile" class="profile mega-li"> 
                                                            <?php if ($this->session->userdata('student_login') == 1) { ?>
                                                                <a href="#" class="mega-link"  data-action="click-trigger"> 
                                                                    <span  class="mega-image">
                                                                        <img width="45" height="35" src="<?php echo $this->crud_model->get_image_url('student', $this->session->userdata('std_id')); ?>" alt="...">             
                                                                    </span>
                                                                    <span class="mega-name">
                                                                        <?php echo $this->session->userdata('name'); ?> <i class="fa fa-caret-down fa-fw"></i> 
                                                                    </span>
                                                                </a> 
                                                                <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
                                                                    <div class="child-menu"> 
                                                                        <div class="content-list content-menu">
                                                                            <ul class="list-wrapper pd-lr-10">
                                                                                <li> <a href="<?php echo base_url(); ?>index.php?student/profile"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
                                                                                <li> <a href="<?php echo base_url(); ?>index.php?login/logout"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
                                                                            </ul>
                                                                        </div> 
                                                                    </div> 
                                                                </div>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <a href="<?php base_url() ?>index.php">Login</a>
                                                            <?php } ?>
                                                        </li> 
                                                        </ul>
                                                        <!-- Head menu search form ends -->                         
                                                    </div>
                                                </div>
                                                </div>

                                                </div>  
                                                </div>
                                                </div>
                                                </div>
                                                <!-- container --> 
                                                </div>
                                                <!-- vd_primary-menu-wrapper -->

                                                <nav class="">
                                                    <div class="container-fluid">
                                                        <ul class="nav navbar-nav">
                                                            <li><a href="<?php echo base_url('index.php?student/dashboard'); ?>">Dashboard</a></li>
                                                            <?php
                                                            $news_conent = $this->db->get_where('cms_manager', array('c_status' => 1))->result_array();
                                                            foreach ($news_conent as $row):
                                                                ?>	
                                                                <li><a target="_blank" href="<?php echo base_url(); ?>index.php?/pages/<?php echo @$row['c_slug']; ?>"><?php echo @$row['c_title']; ?></a></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </nav>
                                                </header>
                                                <!-- Header Ends -->

                                                <div class="content">
                                                    <div class="container">

                                                        <!-----------code by h------------
                                                         <a target="_blank" href="<?php echo base_url(); ?>chat?index.php?act=<?php echo $gochat; ?>">Go To Chat</a>-->
                                                        <?php
                                                        $sess = $this->session->userdata('std_roll');

                                                        $gochat = "chatuser" . $sess;
                                                        $gochat = base64_encode($gochat);
                                                        ?>
                                                        <a class='btn btn-info chat-button' target="_blank"  href='<?php echo base_url(); ?>chat?index.php?act=<?php echo $gochat; ?>'><i class="fa fa-comment"></i>Go To Chat<?php // include($_SERVER['DOCUMENT_ROOT'] . '/smart_learn_main_chat2/lhc_web/index.php');       ?>
                                                        </a>

                                                        <div class='chat-link-box'>
                                                            <p class='title'>Welcome to Support</p>

                                                            <div class='content'>

                                                                <?php
                                                                /* $sess =  $this->session->userdata('std_roll');

                                                                  $gochat = "chatuser".$sess;
                                                                  $gochat = base64_encode($gochat);
                                                                 * 
                                                                 */





//require_once($_SERVER['DOCUMENT_ROOT'] . '/smart_learn_main_chat2/lhc_web/index.php'); 
                                                                ?> 
                                                                <?php //include($_SERVER['DOCUMENT_ROOT'] . '/smart_learn_main_chat/lhc_web/design/defaulttheme/tpl/pagelayouts/userchat.php');  ?>


                                                                <?php //echo $_SERVER['DOCUMENT_ROOT'] . '/smart_learn_main_chat/lhc_web/index.php';
                                                                ?>

                                                            </div>
                                                        </div>
