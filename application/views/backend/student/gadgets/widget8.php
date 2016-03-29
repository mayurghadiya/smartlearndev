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
                    <ul class="list-wrapper pd-lr-10">
                        <?php foreach ($live_streaming as $video) { ?>
                            <li>
                                <a target="_blank" href="<?php echo base_url('index.php?video_streaming#' . $video->url_link); ?>">
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
                                <a target="_blank" href="<?php echo base_url('index.php?video_streaming#' . $video->url_link); ?>">
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