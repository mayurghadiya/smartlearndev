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
                            <img src="<?php echo base_url('uploads/widgets_images/4.jpg'); ?>"/>
                        </div>
                    </div>

                    <div class="text_box">
                        <div class="detials">
                            <ul class="list-wrapper pd-lr-10">

                                <?php
                                $std_id = $this->session->userdata('std_id');
                                $std = $this->db->get_where('student', array('std_id' => $std_id))->result_array();
                                //   $studyresource = $this->db->get_where('study_resources',array('study_degree'=>$std[0]['std_degree'],study_batch'=>$std[0]['std_batch'],'study_sem'=>$std[0]['semester_id'],'study_course'=>$std[0]['course_id']))->result_array();
                                $studyresource = $this->db->get_where('study_resources')->result_array();
                                foreach ($studyresource as $row):
                                    ?>

                                    <li>  <a href="uploads/project_file/<?php echo $row['study_filename']; ?>"  title="<?php echo $row['study_desc']; ?>" download="" target="_newtab" ><?php echo $row['study_title']; ?></a>                  
                                        <?php
                                        $std_id = $this->session->userdata('std_id');
                                        $study_id = $row['study_id'];
                                        $noti = $this->db->query("SELECT * FROM notification WHERE notification_type_id='7' AND FIND_IN_SET('" . $std_id . "',student_ids) AND data_id='" . $study_id . "'")->result_array();


                                        if (!empty($noti)) {
                                            $student_ids = $noti[0]['student_ids'];
                                        } else {
                                            $student_ids = '';
                                        }
                                        if (isset($this->session->userdata('notifications')['study_resources'])) {
                                            ?>
                                            <?php
                                            if ($student_ids != '') {
                                                $student_ids = explode(",", $student_ids);
                                                //  print_r($student_ids);
                                                if (in_array($std_id, $student_ids)) {
                                                    ?>
                                                    <img style="margin-top: 5px;" src="<?php echo base_url('assets/images/new_icon.gif'); ?>"/>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        <?php }
                                        ?>

                                    </li>
                                      <!--<li> <a href="<?php echo base_url(); ?>student/studyresource" target="_blank"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Resources Online</div> </a> </li>-->
                                      <!--<li> <a href="<?php echo base_url(); ?>student/studyresource" target="_blank">  <div class="menu-icon"><i class=" icon-trophy"></i></div> <div class="menu-text">Resources Downloadable</div> </a> </li>-->						
                                <?php endforeach; ?>	
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>