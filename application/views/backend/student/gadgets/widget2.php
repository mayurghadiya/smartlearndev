<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<!-- Panel Widget -->
<div class="panel widget dark-widget  vd_bg-blue">
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
                    <img src="<?php echo base_url('uploads/widgets_images/2.jpg'); ?>"/>
                </div>
            </div>

            <div class="text_box">
                <div class="detials">
                    <ul class="list-wrapper pd-lr-10">
                        <li> 
                            <a href="<?php echo base_url('student/profile'); ?>" target="_blank"> 
                                <div class="menu-text">Profile</div> 
                            </a> 
                        </li>
                        <li> 
                            <a href="<?php echo base_url('student/fee_record'); ?>" target="_blank"> 
                                <div class="menu-text"> Student Payment Record</div> 
                            </a> 
                        </li>
                        <li> <a href="<?php echo base_url('student/student_fees'); ?>" target="_blank"> 
                                <div class="menu-icon"><i class=" icon-lock"></i></div> 
                                <div class="menu-text">Pay Online 
                                    <?php if (isset($this->session->userdata('notifications')['fees_structure'])) { ?>
                                        <img style="margin-top: 5px;" src="<?php echo base_url('assets/images/new_icon.gif'); ?>"/>
                                    <?php } ?>
                                </div> </a> </li>
                        <?php
                        $student_detail = $this->db->get_where('student', array(
                                    'std_id' => $this->session->userdata('login_user_id')
                                ))->row();
                        //echo $student_detail->std_batc
                        $cms_pages = $this->db->get_where('cms_pages', array(
                                    'am_course' => $student_detail->course_id,
                                    'am_semester' => $student_detail->semester_id,
                                    'am_batch' => $student_detail->std_batch
                                ))->result();
                        //var_dump($cms_pages);

                        foreach ($cms_pages as $page) {
                            ?>
                            <li>
                                <a href="<?php echo base_url('student/cms_page/' . $page->am_id); ?>" target="_blank">
                                    <div><?php echo $page->am_title; ?></div>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Panel Widget -->
