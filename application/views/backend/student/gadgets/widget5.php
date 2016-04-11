<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
    <div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
        <div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
            <div class="col-sm-6 ui-sortable">
                <div class="content-list content-menu">
                    <ul class="list-wrapper pd-lr-10">
                        <li> 
                            <a href="<?php echo base_url('index.php?student/exam_listing'); ?>" target="_parent">  
                                <div class="menu-text">Schedule 
                                    <?php
                                    if (!check_notification('exam_manager') || check_notification('exam_time_table')) {
                                        unset($this->session->userdata('notifications')['exam_manager']);
                                        unset($this->session->userdata('notifications')['exam_time_table']);
                                    }
                                    ?>
                                    <?php
                                    if (isset($this->session->userdata('notifications')['exam_manager']) ||
                                            isset($this->session->userdata('notifications')['exam_time_table'])) {
                                        ?>

                                        <img src="<?php echo base_url('assets/images/new_icon.gif'); ?>"/>
                                    <?php }
                                    ?>
                                </div> 
                            </a> 
                        </li>
                        <!--                        <li> 
                                                    <a href="<?php echo base_url('index.php?student/exam_listing'); ?>" target="_parent"> 
                                                        <div class="menu-text">Listing</div> 
                                                    </a> 
                                                </li>-->

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>