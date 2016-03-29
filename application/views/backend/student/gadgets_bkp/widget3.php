<link href="<?=$this->config->item('css_path')?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
	<div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
		<div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
			  <div class="col-sm-6 ui-sortable">
					<div class="content-list content-menu">
					  <ul class="list-wrapper pd-lr-10">
						<li> <a href="<?php echo base_url();?>index.php?student/assignment/online" target="_blank"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Online</div> </a> </li>
						<li> <a href="<?php echo base_url();?>index.php?student/assignment/offline" target="_blank"> <div class="menu-icon"><i class=" icon-trophy"></i></div> <div class="menu-text">Offline</div> </a> </li>						
						<li><a href="" target="_blank">  <div class="menu-icon"><i class=" fa fa-tasks"></i></div> <div class="menu-text">Assignment Schedules</div> </a> </li>
						<li><a href="<?php echo base_url();?>index.php?student/assignment/completed_assignment" target="_blank"> <div class="menu-icon"><i class=" icon-lock"></i></div> <div class="menu-text">Completed Assignments</div> </a> </li>
					  </ul>
					</div>
			  </div>
		</div>
	</div>
</div>