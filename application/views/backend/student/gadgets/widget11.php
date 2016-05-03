<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
    <div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
        <div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
            <div class="col-sm-6 ui-sortable">
                <div class="content-list content-menu">

                    <style> 
                        .image_box, .text_box{width: 50%; display: inline-block; float: left; }
                        .text_box{position: relative;}
                        .text_box .detials{height: 10em; display: flex; align-items: center; justify-content: center}                        
                        .image_box img{ max-width: 100%; display: block;}
                        .image_box1 {width:150px; height:150px;display:table-cell; vertical-align:middle; }
                        .image_box img{ display:block;margin-left:auto;margin-right:auto;vertical-align:middle;}                        
                    </style>

                    <div class="image_box">
                        <div class="image_box1">
                            <img src="<?php echo base_url('uploads/widgets_images/3.jpg'); ?>"/>
                        </div>
                    </div>

                    <div class="text_box">
                        <div class="detials">
                            <ul class="list-wrapper pd-lr-10">
                                <li> 
                                    <a href="<?php echo base_url('student/email_inbox'); ?>" target="_blank"> 
                                        <div class="menu-text">Email</div> 
                                    </a> 
                                </li>
                            </ul>
                        </div>
                    </div>                   

                </div>
            </div>
        </div>
    </div>
</div>