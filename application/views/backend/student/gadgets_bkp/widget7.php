<link href="<?=$this->config->item('css_path')?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
	<div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
		<div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
			  <div class="col-sm-6 ui-sortable">
					<div class="content-list content-menu">
					  <ul class="list-wrapper pd-lr-10">
						<li> <a href="#" target="_blank">Guidelines </a> </li>
						<li> <a href="#" target="_blank">Schedule </a> </li>
						<li><a href="<?php echo base_url();?>index.php?student/project/submission" target="_blank"> <div class="menu-icon"><i class=" fa fa-envelope"></i></div> <div class="menu-text">Project Submission</div> </a> </li>
						<li> <a href="<?php echo base_url();?>index.php?student/project/video" target="_blank">  <div class="menu-icon"><i class=" fa fa-envelope"></i></div> <div class="menu-text">Videos</div> </a> </li>
					  </ul>
					</div>
			  </div>
		</div>
	</div>
</div>