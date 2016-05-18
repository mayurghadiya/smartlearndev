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
                            <img src="<?php echo base_url('uploads/widgets_images/9.jpg'); ?>"/>
                        </div>
                    </div>

                    <div class="text_box">
                        <div class="detials">
                            <ul class="list-wrapper pd-lr-10">
                        <?php
                        $std_id = $this->session->userdata('std_id');
                        $std = $this->db->get_where('student', array('std_id' => $std_id))->result_array();
                        //,array('lm_degree'=>$std[0]['std_degree'],                                                  'lm_batch'=>$std[0]['std_batch'],'lm_semester'=>$std[0]['semester_id'],'lm_course'=>$std[0]['course_id'])
                        $library = $this->db->get_where('library_manager')->result_array();
                        foreach ($library as $lbr):
                            ?>

                            <li><a  download=""  href="uploads/project_file/<?php echo $lbr['lm_filename']; ?>" target="_blank" ><?php echo $lbr['lm_title']; ?></a>

                                <?php
                                $std_id = $this->session->userdata('std_id');
                                $study_id = $lbr['lm_id'];
                                $noti = $this->db->query("SELECT * FROM notification WHERE notification_type_id='4' AND FIND_IN_SET('" . $std_id . "',student_ids) AND data_id='" . $study_id . "'")->result_array();


                                if (!empty($noti)) {
                                    $student_ids = $noti[0]['student_ids'];
                                } else {
                                    $student_ids = '';
                                }
                                if (isset($this->session->userdata('notifications')['library_manager'])) {
                                    ?>
                                    <?php
                                    if ($student_ids != '') {
                                        $student_ids = explode(",", $student_ids);
                                        //  print_r($student_ids);
                                        if (in_array($std_id, $student_ids)) {
                                            ?>
                                            <img style="margin-top: 5px;" src="<?php echo base_url('assets/images/new_icon.gif'); ?>"/>
                                        <?php }
                                    }
                                    ?>
                                <?php }
                                ?>
                            </li>
<?php endforeach; ?>

                </div>
                        </div>
                    </div>
                    
                    
            </div>
        </div>
    </div>
</div>