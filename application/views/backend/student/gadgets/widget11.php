<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
	<div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
		<div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
			  <div class="col-sm-6 ui-sortable">
					<div class="content-list content-menu">
					  <ul class="list-wrapper pd-lr-10">
						<li> <a href="http://192.168.1.13/smart_learning/student_panel/staff-directory.html" target="_blank"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Search</div> </a> </li>
                        <li> 
                            <a href="<?php echo base_url('index.php?student/email_inbox'); ?>" target="_blank"> 
                                <div class="menu-text">Email</div> 
                            </a> 
                        </li>
					  </ul>
					</div>
			  </div>
		</div>
	</div>
</div>