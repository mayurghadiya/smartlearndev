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
                    <a href="javascript:void(0);" data-action="click-trigger" <?php if ($page_name == "degree" || $page_name == "course" || $page_name == "batch" || $page_name == "semesterlist" || $page_name == "admission_type" || $page_name == "student" || $page_name == "subject") { ?> class="open" <?php } ?> >
                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span> 
                        <span class="menu-text">Basic Management</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu"  data-action="click-target" <?php if ($page_name == "degree" || $page_name == "course" || $page_name == "batch" || $page_name == "semesterlist" || $page_name == "admission_type" || $page_name == "student" || $page_name == "subject") { ?> style="display: block" <?php } ?>>
                        <ul>
                            <li <?php if ($page_name == "degree") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/degree"> 
                                    <span class="menu-text">Course</span>  						
                                </a> 
                            </li>
                            <li <?php if ($page_name == "course") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/courses">
                                    <span class="menu-text">Branch</span>  						
                                </a> 
                            </li>	
                            <li <?php if ($page_name == "batch") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/batch">
                                    <span class="menu-text">Batch</span>  						
                                </a> 
                            </li>

                            <li <?php if ($page_name == "semesterlist") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/semester">
                                    <span class="menu-text">Semester</span>  						
                                </a> 
                            </li>	
                            <li  <?php if ($page_name == "admission_type") { ?> class="selectednavmenu" <?php } ?>> 
                                <a href="<?php echo base_url(); ?>index.php?admin/admission_type">
                                    <span class="menu-text">Admission Type</span>  						
                                </a> 
                            </li>
                            <li <?php if ($page_name == "student") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/student"> 
                                    <span class="menu-text">Student</span>  						
                                </a> 
                            </li>	
                            <li <?php if ($page_name == "subject") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/subject">
                                    <span class="menu-text">Subject</span>  						
                                </a> 
                            </li>
                            <li>
                                                         <!--  <a href="<?php echo base_url(); ?>index.php?admin/center">
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
                                <a href="<?php echo base_url(); ?>index.php?admin/events">
                                    <span class="menu-text">Events</span>  
                                </a>
                            </li>
                            <li <?php if ($page_name == "assignment") { ?> class="selectednavmenu" <?php } ?>> 
                                <a href="<?php echo base_url('index.php?admin/assignment'); ?>">
                                    <span class="menu-text">Assignments</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                            <li  <?php if ($page_name == "studyresource") { ?> class="selectednavmenu" <?php } ?>> 
                                <a href="<?php echo base_url('index.php?admin/studyresource'); ?>">
                                    <span class="menu-text">Study Resources</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>   
                            <li   <?php if ($page_name == "project") { ?> class="selectednavmenu" <?php } ?>>					
                                <a href="<?php echo base_url('index.php?admin/project'); ?>">
                                    <span class="menu-text">Project/Synopsis</span>  						
                                </a>
                            </li>
                            <li  <?php if ($page_name == "library") { ?> class="selectednavmenu" <?php } ?>>							
                                <a href="<?php echo base_url('index.php?admin/library'); ?>">
                                    <span class="menu-text">Digital Library</span>  
                                </a>
                            </li>
                            <li <?php if ($page_name == "participate") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url('index.php?admin/participate'); ?>">
                                    <span class="menu-text">Participate</span>  
                                </a>
                            </li> 
                            <li <?php if ($page_name == "subscriber") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url('index.php?admin/subscriber'); ?>">
                                    <span class="menu-text">Subscriber</span>  
                                </a>
                            </li> 
                        </ul>
                    </div>
                </li>
                <li class="hidden">
                    <a class="<?php if($page_name == 'graduate') echo 'open'; ?>" href="javascript:void(0);" data-action="click-trigger">
                        <span class="menu-icon"><i class="fa fa-building"> </i></span>
                        <span class="menu-text">University</span>
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                    </a>
                    <div class="child-menu"   data-action="click-target">
                        <ul class="clearfix">   
                            <li  <?php if ($page_name == "graduate") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/graduate">
                                    <span class="menu-text">Recent Graduates</span>  
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
                                <a href="<?php echo base_url(); ?>index.php?admin/exam">
                                    <span class="menu-text">Exam</span>  
                                </a>
                            </li>              
                            <li <?php if ($page_name == "exam_time_table") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/exam_time_table">
                                    <span class="menu-text">Exam Schedule</span>  
                                </a>
                            </li>   
                            <li <?php if ($page_name == "exam_marks") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url('index.php?admin/marks'); ?>">
                                    <span class="menu-text">Marks</span>  
                                </a>
                            </li> 
                            <li <?php if ($page_name == "grade") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url('index.php?admin/grade'); ?>">
                                    <span class="menu-text">Exam Grade</span>  
                                </a>
                            </li>
                            <li <?php if ($page_name == "remedial_exam") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/remedial_exam">
                                    <span class="menu-text">Remedial Exam</span>  
                                </a>
                            </li>
                            <li <?php if ($page_name == "remedial_exam_time_table") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/remedial_exam_schedule">
                                    <span class="menu-text">Remedial Exam Schedule</span>  
                                </a>
                            </li>
                            <li <?php if ($page_name == "remedial_exam_marks") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/remedial_exam_marks">
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
                            <li <?php if ($page_name == "cms_manager") { ?> class="selectednavmenu" <?php } ?>> 
                                <a href="<?php echo base_url('index.php?admin/cms_manager'); ?>">
                                    <span class="menu-text">CMS Dynamic Pages</span>
                                </a>          
                            </li>
                            <li <?php if ($page_name == "cms") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/cms">
                                    <span class="menu-text">CMS Static Pages</span>  
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
                                <a href="<?php echo base_url('index.php?admin/fees_structure'); ?>">
                                    <span class="menu-text">Fees Structure</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                            <li <?php if ($page_name == "make_payment") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url('index.php?admin/make_payment'); ?>">
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
                                <a href="<?php echo base_url(); ?>index.php?admin/report_chart/student">
                                    <span class="menu-text">Student</span>  
                                </a>
                            </li> 
                            <!-- <li>
                                 <a href="<?php echo base_url(); ?>index.php?admin/report_chart/exam">
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
                                <a href="<?php echo base_url('index.php?admin/backup'); ?>">
                                    <span class="menu-text">Backup</span>  
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                            <li <?php if ($page_name == "restore") { ?> class="selectednavmenu" <?php } ?>> 
                                <a href="<?php echo base_url('index.php?admin/restore'); ?>">
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
                                <a href="<?php echo base_url('index.php?admin/import'); ?>">
                                    <span class="menu-text">Import</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                            <li  <?php if ($page_name == "export") { ?> class="selectednavmenu" <?php } ?>> 
                                <a href="<?php echo base_url('index.php?admin/export'); ?>">
                                    <span class="menu-text">Export</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                        </ul>
                    </div>
                </li>	

                <li> 
                    <a href="<?php echo base_url('index.php?video_streaming'); ?>">
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
                                <a href="<?php echo base_url(); ?>index.php?admin/email_inbox">
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
                    <a href="javascript:void(0);"   data-action="click-trigger" >
                        <span class="menu-icon entypo-archive"><i class="fa fa-cubes"></i></span>
                        <span class="menu-text">Media</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                    </a>
                    <div class="child-menu" data-action="click-target" >
                        <ul class="clearfix">          
                            <li >
                                <a href="<?php echo base_url(); ?>index.php?media/photogallery">
                                    <span class="menu-text">Photo Gallery</span>  
                                </a>
                            </li>
                            <li >
                                <a href="<?php echo base_url(); ?>index.php?media/bannerslider">
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
                                <a href="<?php echo base_url(); ?>index.php?admin/create_group">
                                    <span class="menu-text">Create Groups</span>  
                                </a>
                            </li>
                            <li <?php if ($page_name == "list_group") { ?> class="selectednavmenu" <?php } ?>>
                                <a href="<?php echo base_url(); ?>index.php?admin/list_group">
                                    <span class="menu-text">List Groups</span>  
                                </a>
                            </li>
                            <!--  <li>
                                  <a href="<?php echo base_url(); ?>index.php?admin/assign_module">
                                      <span class="menu-text">Assign Module</span>  
                                  </a>
                              </li>
                              <li>
                                  <a href="<?php echo base_url(); ?>index.php?admin/list_module">
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
                                <a href="<?php echo base_url(); ?>index.php?admin/system_settings">
                                    <span class="menu-text">General Settings</span>  
                                </a>
                            </li>
                            <li <?php if ($page_name == "authorize_payment_config") { ?> class="selectednavmenu" <?php } ?>> 
                                <a href="<?php echo base_url('index.php?admin/authorize_payment_config'); ?>">
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
