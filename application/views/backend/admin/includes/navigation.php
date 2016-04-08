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
                    <a href="javascript:void(0);" data-action="click-trigger">
                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span> 
                        <span class="menu-text">Basic Management</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu"  data-action="click-target">
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/degree"> 
                                    <span class="menu-text">Course</span>  						
                                </a> 
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/courses">
                                    <span class="menu-text">Branch</span>  						
                                </a> 
                            </li>	
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/batch">
                                    <span class="menu-text">Batch</span>  						
                                </a> 
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/semester">
                                    <span class="menu-text">Semester</span>  						
                                </a> 
                            </li>	
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/admission_type">
                                    <span class="menu-text">Admission Type</span>  						
                                </a> 
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/student"> 
                                    <span class="menu-text">Student</span>  						
                                </a> 
                            </li>	
                            <li>
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
                    <a href="javascript:void(0);"   data-action="click-trigger">
                        <span class="menu-icon"><i class="fa fa-sitemap"> </i></span>
                        <span class="menu-text">Asset Management</span>
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                    </a>
                    <div class="child-menu"   data-action="click-target">
                        <ul class="clearfix">   
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/events">
                                    <span class="menu-text">Events</span>  
                                </a>
                            </li>
                            <li> 
                                <a href="<?php echo base_url('index.php?admin/assignment'); ?>">
                                    <span class="menu-text">Assignments</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                            <li> 
                                <a href="<?php echo base_url('index.php?admin/studyresource'); ?>">
                                    <span class="menu-text">Study Resources</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>   
                            <li>					
                                <a href="<?php echo base_url('index.php?admin/project'); ?>">
                                    <span class="menu-text">Project/Synopsis</span>  						
                                </a>
                            </li>
                            <li>							
                                <a href="<?php echo base_url('index.php?admin/library'); ?>">
                                    <span class="menu-text">Digital Library</span>  
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php?admin/participate'); ?>">
                                    <span class="menu-text">Participate</span>  
                                </a>
                            </li>                            
                        </ul>
                    </div>
                </li>	

                <li>
                    <a href="javascript:void(0);" data-action="click-trigger">
                        <span class="menu-icon"><i class="fa fa-th-list"></i></span> 
                        <span class="menu-text">Examinations</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu" data-action="click-target">
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/exam">
                                    <span class="menu-text">Exam</span>  
                                </a>
                            </li>              
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/exam_time_table">
                                    <span class="menu-text">Exam Schedule</span>  
                                </a>
                            </li>   
                            <li>
                                <a href="<?php echo base_url('index.php?admin/marks'); ?>">
                                    <span class="menu-text">Marks</span>  
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php?admin/grade'); ?>">
                                    <span class="menu-text">Grade</span>  
                                </a>
                            </li>                            
                        </ul>   
                    </div>
                </li>  

                <li>
                    <a href="javascript:void(0);"   data-action="click-trigger">
                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span>
                        <span class="menu-text">CMS Management</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                    </a>
                    <div class="child-menu" data-action="click-target">
                        <ul class="clearfix">          
                            <li> 
                                <a href="<?php echo base_url('index.php?admin/cms_manager'); ?>">
                                    <span class="menu-text">CMS Dynamic Pages</span>
                                </a>          
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/cms">
                                    <span class="menu-text">CMS Static Pages</span>  
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>               

                <li>
                    <a href="javascript:void(0);"   data-action="click-trigger">
                        <span class="menu-icon entypo-archive"><i class="fa fa-dollar"></i></span>
                        <span class="menu-text">Payment Management</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                    </a>
                    <div class="child-menu" data-action="click-target">
                        <ul class="clearfix">          
                            <li> 
                                <a href="<?php echo base_url('index.php?admin/fees_structure'); ?>">
                                    <span class="menu-text">Fees Structure</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php?admin/make_payment'); ?>">
                                    <span class="menu-text">Make Payment</span>  
                                </a>
                            </li> 
                        </ul>
                    </div>
                </li>                

                <li>
                    <a href="javascript:void(0);" data-action="click-trigger">
                        <span class="menu-icon"><i class="fa fa-bar-chart-o"></i></span> 
                        <span class="menu-text">Reports</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu"  data-action="click-target">
                        <ul>
                            <li>
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
                    <a href="javascript:void(0);"   data-action="click-trigger">
                        <span class="menu-icon entypo-download"><i class="icon-download"></i></span>
                        <span class="menu-text">Backup/Restore</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                    </a>
                    <div class="child-menu" data-action="click-target">
                        <ul class="clearfix">
                            <li> 
                                <a href="<?php echo base_url('index.php?admin/backup'); ?>">
                                    <span class="menu-text">Backup</span>  
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                            <li> 
                                <a href="<?php echo base_url('index.php?admin/restore'); ?>">
                                    <span class="menu-text">Restore</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="javascript:void(0);"   data-action="click-trigger">
                        <span class="menu-icon entypo-icon"><i class="icon-upload"></i></span>
                        <span class="menu-text">Import/Export</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                    </a>
                    <div class="child-menu" data-action="click-target">
                        <ul class="clearfix">
                            <li> 
                                <a href="<?php echo base_url('index.php?admin/import'); ?>">
                                    <span class="menu-text">Import</span> 
                                    <span class="menu-badge"></span>
                                </a>          
                            </li>
                            <li> 
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

                <li >
                    <a href="javascript:void(0);" data-action="click-trigger">
                        <span class="menu-icon entypo-icon"><i class="icon-tools"></i></span> 
                        <span class="menu-text">User Management</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
                    <div class="child-menu"  data-action="click-target">
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/create_group">
                                    <span class="menu-text">Create Groups</span>  
                                </a>
                            </li>
                            <li>
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
                    <a href="javascript:void(0);"   data-action="click-trigger">
                        <span class="menu-icon entypo-archive"><i class="fa fa-cubes"></i></span>
                        <span class="menu-text">Settings</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>            
                    </a>
                    <div class="child-menu" data-action="click-target">
                        <ul class="clearfix">          
                            <li>
                                <a href="<?php echo base_url(); ?>index.php?admin/system_settings">
                                    <span class="menu-text">General Settings</span>  
                                </a>
                            </li>
                            <li> 
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
