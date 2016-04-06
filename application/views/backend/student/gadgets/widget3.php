<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
    <div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
        <div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
            <div class="col-sm-6 ui-sortable">
                <div class="content-list content-menu">
                    <ul class="list-wrapper pd-lr-10">
                     <li><a href="<?php echo base_url(); ?>index.php?student/assignment/assignment_list" target="_blank"> <div class="menu-icon"><i class=" icon-lock"></i></div> <div class="menu-text">Assignments List
                             <?php
                            if(isset($this->session->userdata('notifications')['assignment_manager'])){ ?>
                            <img style="margin-top: 5px;" src="<?php echo base_url('assets/images/new_icon.gif'); ?>"/>
                            <?php } ?>
                             </div> </a> </li>
                      <li> <a href="<?php echo base_url(); ?>index.php?student/assignment/submited_assignment" target="_blank"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Submited Assignment List</div> </a> </li>
                 <!--   <li> <a href="<?php echo base_url(); ?>index.php?student/assignment/offline" target<!--="_blank"> <d<!--iv class="menu-icon"><i class=" icon-trophy"></i></div> <div class="menu-text">Offline</div> </a> </li>-->
                   
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>