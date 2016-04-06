<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
    <div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
        <div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
            <div class="col-sm-6 ui-sortable">
                <div class="content-list content-menu">
                    <ul class="list-wrapper pd-lr-10">
                        <li> 
                            <a href="<?php echo base_url('index.php?student/exam_listing'); ?>" target="_parent">  
                                <div class="menu-text">Schedule</div> 
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