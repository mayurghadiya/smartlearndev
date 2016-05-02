<link href="<?= $this->config->item('css_path') ?>student/sDashboard.css" rel="stylesheet">
<div class="vd_panel-menu">					
    <div data-original-title="Config" data-toggle="tooltip" data-placement="bottom" class=" menu entypo-icon smaller-font">
        <div data-action="click-target" class="vd_mega-menu-content  width-xs-2  left-xs">
            <div class="col-sm-6 ui-sortable">
                <div class="content-list content-menu">
                    <ul class="list-wrapper pd-lr-10">
                        <?php
                        //$this->load->model('Student/Student_model');
                        $student_details = $this->db->get_where('student', array(
                                    'std_id' => $this->session->userdata('login_user_id')
                                ))->row();

                        $page_data['exam_listing'] = $this->db->select()
                                ->from('exam_manager')
                                ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                                ->join('semester', 'semester.s_id = exam_manager.em_semester')
                                ->where(array(
                                    'exam_manager.course_id' => $student_details->course_id,
                                    'exam_manager.em_semester' => $student_details->semester_id,
                                    'exam_manager.exam_ref_name' => 'reguler'
                                ))
                                ->order_by('exam_manager.em_start_time', 'DESC')
                                ->get()
                                ->result();

                        //check for time table
                        $student_id = $this->session->userdata('student_id');
                        foreach ($page_data['exam_listing'] as $exam) {
                            $is_pass = TRUE;
                            //find exam schedule
                            $exam_schedule = $this->db->select()
                                    ->from('exam_time_table')
                                    ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
                                    ->where('exam_time_table.exam_id', $exam->em_id)
                                    ->get()
                                    ->result();

                            //find marks
                            $exam_marks = $this->db->select()
                                    ->from('marks_manager')
                                    ->join('subject_manager', 'subject_manager.sm_id = marks_manager.mm_subject_id')
                                    ->where(array(
                                        'mm_std_id' => $student_id,
                                        'mm_exam_id' => $exam->em_id
                                    ))
                                    ->get()
                                    ->result();

                            //check for pass or fail
                            foreach ($exam_marks as $mark) {
                                if ($mark->mark_obtained < $exam->passing_mark) {
                                    $is_pass = FALSE;
                                    break;
                                }
                            }

                            //find remedial exams if fail
                            if (!$is_pass) {
                                $remedial_exam = $this->db->select()
                                        ->from('exam_manager')
                                        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                                        ->where(array(
                                            'exam_manager.exam_ref_id' => $exam->em_id
                                        ))
                                        ->order_by('exam_manager.em_start_time', 'DESC')
                                        ->get()
                                        ->result();

                                foreach ($remedial_exam as $remedial) {
                                    $is_remedial_exam_pass = FALSE;
                                    array_push($page_data['exam_listing'], $remedial);
                                    //check for exam schedule
                                    $remedial_exam_schedule = $this->db->select()
                                            ->from('exam_time_table')
                                            ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
                                            ->where('exam_time_table.exam_id', $remedial->em_id)
                                            ->get()
                                            ->result();

                                    foreach ($remedial_exam_schedule as $schedule) {
                                        //check for marks
                                        $marks = $this->db->select()
                                                ->from('marks_manager')
                                                ->join('subject_manager', 'subject_manager.sm_id = marks_manager.mm_subject_id')
                                                ->where(array(
                                                    'mm_std_id' => $student_id,
                                                    'mm_exam_id' => $remedial->em_id
                                                ))
                                                ->get()
                                                ->result();

                                        //check for pass or fail
                                        foreach ($marks as $m) {
                                            if ($m->mark_obtained >= $remedial->passing_mark) {
                                                $is_remedial_exam_pass = TRUE;
                                            } else {
                                                $is_remedial_exam_pass = FALSE;
                                                break;
                                            }
                                        }
                                        if (!$is_remedial_exam_pass)
                                            break;
                                    }
                                    if ($is_remedial_exam_pass)
                                        break;
                                }
                            }
                        }
                        ?>

                        <?php foreach ($page_data['exam_listing'] as $row) { ?>
                            <li> 
                                <a href="<?php echo base_url('student/exam_schedule/' . $row->em_id); ?>" target="_blank">  
                                    <div class="menu-text"><?php echo $row->em_name; ?></div> 
                                </a> 
                            </li>
                        <?php } ?>

                        <!--                        <li> 
                                                    <a href="<?php echo base_url('student/exam_listing'); ?>" target="_parent"> 
                                                        <div class="menu-text">Listing</div> 
                                                    </a> 
                                                </li>-->

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>