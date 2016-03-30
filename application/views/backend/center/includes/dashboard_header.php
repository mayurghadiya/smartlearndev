<body id="dashboard" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="dashboard "  data-smooth-scrolling="1">     
<div class="vd_body">
<!-- Header Start -->
  <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width  ">
          <div class="vd_panel-header">
				<div class="logo">
					<a href="<?php echo base_url();?>index.php?admin/dashboard"><img alt="logo" src="<?=$this->config->item('image_path')?>logo.png"></a>
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
				  <form id="search-box" method="post" action="#">
					<input type="text" name="search" class="vd_menu-search-text width-60" placeholder="Search">
					<div class="vd_menu-search-category"> <span data-action="click-trigger"> <span class="separator"></span> <span class="text">Category</span> <span class="icon"> <i class="fa fa-caret-down"></i></span> </span>
					  <div class="vd_mega-menu-content width-xs-2 center-xs-2 right-sm" data-action="click-target">
						<div class="child-menu">
						  <div class="content-list content-menu content">
							<ul class="list-wrapper">
							  <li>
								<label>
								  <input type="checkbox" value="Courses">
								  <span>Courses</span></label>
							  </li>
							  <li>
								<label>
								  <input type="checkbox" value="Assignment">
								  <span>Assignment</span></label>
							  </li>
							  <li>
								<label>
								  <input type="checkbox" value="Participate">
								  <span>Participate</span></label>
							  </li>
							   <li>
								<label>
								  <input type="checkbox" value="Exam">
								  <span>Exam</span></label>
							  </li>
							  <li>
								<label>
								  <input type="checkbox" value="video">
								  <span>Video</span></label>
							  </li>
							</ul>
						  </div>
						</div>
					  </div>
					</div>
					<span class="vd_menu-search-submit"><i class="fa fa-search"></i> </span>
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
								  <a href="<?php echo base_url();?>index.php?admin/email" class="mega-link" data-action="click-trigger">
									<span class="mega-icon"><i class="fa fa-globe"></i></span> 
									<span class="badge vd_bg-red">
									<?php $new_mail	=$this->db->get_where('email' , array('read' => 0) )->result_array();
									echo count($new_mail); ?></span>        
								  </a>
								  <!--<div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
									<div class="child-menu">  
									   <div class="title"> 
											Notifications 
										   <div class="vd_panel-menu">
												 <span data-original-title="Notification Setting" data-toggle="tooltip" data-placement="bottom" class="menu">
													<i class="fa fa-cog"></i>
												</span>                           
											</div>
									   </div>                     
									</div> <!-- child-menu               
								  </div>   <!-- vd_mega-menu-content -->         
								</li> 
								<li id="top-menu-profile" class="profile mega-li"> 
									<a href="#" class="mega-link"  data-action="click-trigger"> 
										<span  class="mega-image">
											<img width="45" height="35" src="<?php echo $this->crud_model->get_image_url('admin' , $this->session->userdata('admin_id'));?>" alt="...">             
										</span>
										<span class="mega-name">
											<?php echo $this->session->userdata('name'); ?> <i class="fa fa-caret-down fa-fw"></i> 
										</span>
									</a> 
									<div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
										<div class="child-menu"> 
											<div class="content-list content-menu">
												<ul class="list-wrapper pd-lr-10">
													<li> <a href="<?php echo base_url(); ?>index.php?admin/manage_profile"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Edit Profile</div> </a> </li>
													<li> <a href="<?php echo base_url();?>index.php?login/logout"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  <div class="menu-text">Sign Out</div> </a> </li>
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
		
                     <!-----------code by h------------->
                    <a class='btn btn-info chat-button' href='#'><i class="fa fa-comment"></i> Chat with us</a>
                    
                     <div class='chat-link-box'>
					 <p class='title'>Welcome to Support</p>
						  <div class='content'>
							
							<?php 
									$all_std		=	$this->db->get_where('student')->result_array();
									foreach($all_std as $row):

									?>
									<?php  
									$not_read	=$this->db->get_where('student' , array('online' => 1) )->result_array();	
										foreach($not_read as $nrow):
										if($nrow['name'] == $row['name']){
											echo "<img src='http://192.168.1.13/smart_learn_dev/assets/img/online.png' height='12px' width='12px'>";
											
										}else{
											echo "<img src='http://192.168.1.13/smart_learn_dev/assets/img/offline.png' height='12px' width='12px'>";
											
										}									
										endforeach;
									?>
									<a href="javascript:void(0)" onclick="javascript:chatWith('<?php echo $row['name']; ?>')">
									
											
									<?php echo $row['name']; ?></a><br/>

									<!-- YOUR BODY HERE -->
									<?php endforeach;?>
						   
						  </div>
						</div>



 <!-----------code by h------------->