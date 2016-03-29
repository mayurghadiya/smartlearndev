<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<!-- Panel Widget -->
<div class="panel widget dark-widget  vd_bg-blue">
    <div class="col-sm-6 ui-sortable">
        <div class="content-list content-menu">
            <ul class="list-wrapper pd-lr-10">
                <li> 
                    <a href="<?php echo base_url('index.php?student/profile'); ?>" target="_blank"> 
                        <div class="menu-text">Profile</div> 
                    </a> 
                </li>
                <li> <a href="#" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. " target="_blank"> <div class="menu-icon"><i class=" icon-trophy"></i></div> <div class="menu-text">Guidelines</div> </a> </li>
                <li> <a href="#" target="_blank"> <div class="menu-icon"><i class=" fa fa-envelope"></i></div> <div class="menu-text">Admission for next Semester</div> </a> </li>								
                <li> 
                    <a href="<?php echo base_url('index.php?student/fee_record'); ?>" target="_blank"> 
                        <div class="menu-text"> Fee Record</div> 
                    </a> 
                </li>
                <li> <a href="<?php echo base_url('index.php?student/student_fees'); ?>" target="_blank"> <div class="menu-icon"><i class=" icon-lock"></i></div> <div class="menu-text">Pay Online</div> </a> </li>
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
                        <a href="<?php echo base_url('index.php?student/cms_page/' . $page->am_id); ?>" target="_blank">
                            <div><?php echo $page->am_title; ?></div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<!-- Panel Widget -->
