<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
    <div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
        <div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
            <div class="col-sm-6 ui-sortable">
                <div class="content-list content-menu">
                    <?php
                    $date = date('Y-m-d');
                    $student_details = $this->db->get_where('student', array(
                                'std_id' => $this->session->userdata('student_id')
                            ))->row();
                    //var_dump($student_details);
                    $where = array(
                        'course' => $student_details->course_id,
                        'semester' => $student_details->semester_id,
                        'is_active' => '1'
                    );
                    $live_streaming = $this->db->select()
                                    ->from('broadcast_and_streaming')
                                    ->where($where)
                                    ->like('created_at', $date)
                                    ->get()->result();
                    ?>
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
                            <img src="<?php echo base_url('uploads/video_streaming.jpg'); ?>"/>
                        </div>
                    </div>
                    <div class="text_box">
                        <div class="detials">
                            <ul class="list-wrapper pd-lr-10">
                                <?php foreach ($live_streaming as $video) { ?>
                                    <li>
                                        <a target="_blank" href="<?php echo base_url('video_streaming#' . $video->url_link); ?>">
                                            <div class="menu-icon">
                                                <i class=" icon-trophy"></i>
                                            </div>
                                            <div class="menu-text"><?php echo $video->title; ?></div>
                                        </a>
                                    </li>
                                <?php } ?>

                                <?php
                                $all = $this->db->select()->from('broadcast_and_streaming')
                                        ->where('course', 'all')
                                        //->or_where('semester', 'all')
                                        ->where('is_active', '1')
                                        ->like('created_at', $date)
                                        ->get()
                                        ->result();
                                ?>
                                <?php foreach ($all as $video) { ?>
                                    <li>
                                        <a target="_blank" href="<?php echo base_url('video_streaming#' . $video->url_link); ?>">
                                            <div class="menu-icon">
                                                <i class=" icon-trophy"></i>
                                            </div>
                                            <div class="menu-text"><?php echo $video->title; ?></div>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>