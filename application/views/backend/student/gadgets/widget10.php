
<link href="<?=$this->config->item('css_path')?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
	<div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
		<div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
			  <div class="col-sm-6 ui-sortable">
					<div class="content-list content-menu">
					  <ul class="list-wrapper pd-lr-10">
                                              <?php  ?>
                                              
                                              <li><a href="<?php echo base_url();?>index.php?student/volunteer" target="_blank">Volunteer
                                                  <?php
                            if(isset($this->session->userdata('notifications')['participate_manager'])){ ?>
                            <img style="margin-top: 5px;" src="<?php echo base_url('assets/images/new_icon.gif'); ?>"/>
                            <?php } ?>
                                                  </a></li>                                            
                                              <li>  <a href="<?php echo base_url();?>index.php?student/participate" target="_blank"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Survey</div> </a> </li>
                                              <li>  <a href="<?php echo base_url();?>index.php?student/uploads" target="_blank"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Upload</div> </a> </li>
                                            	
						
					  </ul>
					</div>
			  </div>
		</div>
	</div>
</div>
