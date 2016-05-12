<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *  @author     : Searchnative India
 *  date        : 02 Nov, 2015
 *  Smart School system
 *  http://searchnative.in
 *  hello@searchnative.in
 */

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        date_default_timezone_set('Asia/Kolkata');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        $this->load->helper('smiley');
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url() . 'site/user_login', 'refresh');
        $this->load->helper('notification');
        $notification = show_notification($this->session->userdata('student_id'));
        $this->session->set_userdata('notifications', $notification);
        $this->load->helper('text');        
       
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    public function index() {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('student_login') == 1)
            redirect(base_url() . 'index.php?student/dashboard', 'refresh');
    }

    /*     * ********Online /Oflline Update ***************** */
    /*     * * DASHBOARD** */

    function dashboard() {
        $this->load->model('Student/Student_model');
        $page_data['widget_order'] = $this->Student_model->student_widget_order(
                $this->session->userdata('student_id'));
       
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if (isset($_POST['online'])) {
            $data['online'] = $_POST['online'];
        } else {
            $data['online'] = 1;
        }
        $this->db->where('std_id', $this->session->userdata('std_id'));
        $this->db->update('student', $data);
        //echo $this->db->last_query();
        //die;
        //echo $this->session->userdata('password_status');
        if ($this->session->userdata('password_status') == 0) {
            $page_data['page_name'] = 'changepassword';
        } else {
            $page_data['page_name'] = 'dashboard';
        }

        $page_data['page_title'] = 'Student Dashboard';
        //$page_data['chat'] = $this->chat_user();
        $this->load->view('backend/index', $page_data);
    }

    function change_password($param1 = '', $param2 = '') {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['password'] = md5($this->input->post('new_password'));
            $data['real_pass'] = $this->input->post('new_password');
            $data['password_status'] = 1;

            $this->db->where('std_id', $this->session->userdata('std_id'));
            $this->db->update('student', $data);

            $this->session->set_userdata('password_status', 1);
            $this->session->set_flashdata('flash_message', get_phrase('password_updated_successfully'));

            redirect(base_url() . 'index.php?student/dashboard/', 'refresh');
        }

        $page_data['page_name'] = 'changepassword';
        $page_data['page_title'] = 'Change Password';
        $this->load->view('backend/index', $page_data);
    }

    function gadgets() {
        $g1 = $this->uri->segment(3);
        switch ($g1) {
            case 1:
                $this->load->view('backend/student/gadgets/widget1');
                break;
            case 2:
                $this->load->view('backend/student/gadgets/widget2');
                break;
            case 3:
                $this->load->view('backend/student/gadgets/widget3');
                break;
            case 4:
                $this->load->view('backend/student/gadgets/widget4');
                break;
            case 5:
                $this->load->view('backend/student/gadgets/widget5');
                break;
            case 6:
                $this->load->view('backend/student/gadgets/widget6');
                break;
            case 7:
                $this->load->view('backend/student/gadgets/widget7');
                break;
            case 8:
                $data['video_streaming'] = $this->db->get('broadcast')->result();
                $this->load->view('backend/student/gadgets/widget8', $data);
                break;
            case 9:
                $this->load->view('backend/student/gadgets/widget9');
                break;
            case 10:
                $this->load->view('backend/student/gadgets/widget10');
                break;
            case 11:
                $this->load->view('backend/student/gadgets/widget11');
                break;
            case 12:
                $this->load->view('backend/student/gadgets/widget12');
                break;
        }
    }
       function holiday()
       {
            $page_data['page_name'] = 'holiday';
            $page_data['page_title'] = 'Holiday List';
            $this->load->view('backend/index', $page_data);           
       }
       
       
       function get_event() {
        $s_date = $this->input->post('date');
        $events = $this->db->get_where('event_manager', array('event_date' => $s_date))->result_array();
        //echo $this->db->last_query();
        if (count($events) > 0) {
            foreach ($events as $erow) {
                echo '<a href="#">' . $erow['event_name'] . '</a></br/>';
            }
        } else {
            echo "No Event";
        }
    }

    function registration($param1 = '', $param2 = '') {
        if ($this->session->userdata('student_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['email'] = $this->input->post('email_id');
            $data['name'] = $this->input->post('name');
            $data['password'] = md5($this->input->post('password'));
            $data['std_first_name'] = $this->input->post('f_name');
            $data['std_last_name'] = $this->input->post('l_name');
            $data['std_gender'] = $this->input->post('gen');
            $data['std_birthdate'] = $this->input->post('birthdate');
            $data['std_marital'] = $this->input->post('maritalstatus');
            $data['std_batch'] = $this->input->post('batch');
            $data['semester_id'] = $this->input->post('semester');
            $data['course_id'] = $this->input->post('course');
            $data['std_about'] = $this->input->post('std_about');
            $data['std_mobile'] = $this->input->post('mobileno');
            $data['real_pass'] = $this->input->post('password');
            $data['address'] = $this->input->post('address');
            $data['city'] = $this->input->post('city');
            $data['zip'] = $this->input->post('zip');
            $data['std_fb'] = $this->input->post('facebook');
            $data['std_twitter'] = $this->input->post('twitter');
            $data['group_id'] = $this->input->post('group');
            $data['user_type'] = $this->input->post('usertype');
            $data['admission_type_id'] = $this->input->post('admissiontype');
            $data['std_status'] = 1;
            $data['created_date'] = date('Y-m-d');
            //roll no
            $this->db->insert('student', $data);
            $lastid = $this->db->insert_id();
            $rollno = date('Y');
            $rollno.=$this->db->get_where('course', array('course_id' => $this->input->post('course')))->row()->course_alias_id;
            ;
            $rollno.='-' . $lastid;
            $updaterollno['std_roll'] = $rollno;
            $this->db->where('std_id', $lastid);
            $this->db->update('student', $updaterollno);
            //end roll no
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?student/registration/', 'refresh');
        }
        $page_data['student'] = $this->db->get('student')->result();
        $page_data['page_name'] = 'registration';
        $page_data['page_title'] = 'Student Registration';
        $this->load->view('backend/index', $page_data);
    }

    function chat_user() {
        $this->load->helper('file');
        $file = FCPATH . 'chat.php';
        //$result = "\$yourVariable = Bobby Bopper;\n";
        $name = $this->session->userdata('name');
        /* */
        //write_file($file, $result,'r+');
        //$f = file_get_contents($file);
        $line_i_am_looking_for = 2;
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        $lines[$line_i_am_looking_for] = "\$_SESSION['username'] = '$name';\n";
        file_put_contents($file, implode("\n", $lines));
    }

    function get_center() {
        $examid = $this->input->post('id');
        $data = $this->db->get_where('exam_manager', array('em_id' => $examid))->result();
        $center_explode = explode(',', $data[0]->center_id);

        foreach ($center_explode as $cen) {
            $data1[] = $this->db->get_where('center_user', array('center_id' => $cen))->result();
        }
        $datacen = array();
        foreach ($data1 as $cc) {
            foreach ($cc as $c) {
                $sittingcount = $this->db->get_where('student_exam_center', array('center_id' => $c->center_id))->result();
                if ($c->setting_number > count($sittingcount)) {
                    $datacen[] = $c;
                }
            }
        }
        echo json_encode($datacen);
    }

    //develop by nikita
        
    function exam_center($param1 = '', $param2 = '') {
        $this->load->model('Student/Student_model');
        if ($param1 == 'create') {
            $data['exam_id'] = $this->input->post('exam');
            $data['center_id'] = $this->input->post('center');
            $data['student_id'] = $this->session->userdata('std_id');
            $data['created_date'] = date('Y-m-d');
            $this->db->insert('student_exam_center', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?student/exam_center/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['exam_id'] = $this->input->post('exam1');
            $data['center_id'] = $this->input->post('center1');
            $this->db->where('student_exam_center_id', $param2);
            $this->db->update('student_exam_center', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?student/exam_center/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('student_exam_center_id', $param2);
            $this->db->delete('student_exam_center');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?student/exam_center/', 'refresh');
        }
        $student_details = $this->db->get_where('student', array(
                    'std_id' => $this->session->userdata('login_user_id')
                ))->row();
        $page_data['exam_listing'] = $this->Student_model->student_exam_list($student_details->course_id, $student_details->semester_id);
        $page_data['centerlist'] = $this->db->get_where('student_exam_center', array('student_id' => $this->session->userdata('std_id')))->result();
        $page_data['examlist'] = $this->db->get('exam_manager')->result();
        $page_data['center'] = $this->db->get('center_user')->result();
        $page_data['page_name'] = 'exam_center';
        $page_data['page_title'] = 'Exam center';
        $this->load->view('backend/index', $page_data);
    }

    function assignment($param1 = '', $param2 = '') {
        if ($param1 == 'submit_assignment') {
            if ($_FILES['document_file']['name'] != "") {
                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	
                if (!$this->upload->do_upload('document_file')) {
                    $datafile = array('msg' => $this->upload->display_errors());
                } else {
                    $file = $this->upload->data();
                    $data['document_file'] = $file['file_name'];
                }
            }
            $data['comment'] = $this->input->post('comment');
            $data['assign_id'] = $this->input->post('assignment_id');
            $data['student_id'] = $this->session->userdata('std_id');
            $data['submited_date'] = date('Y-m-d');
            $this->db->insert('assignment_submission', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?student/assignment/submited_assignment', 'refresh');
        }
        $std_id = $this->session->userdata('std_id');
        $std = $this->db->get_where('student', array('std_id' => $std_id))->result_array();
        $page_data['assignment'] = $this->db->get_where('assignment_manager', array('	assign_degree' => $std[0]['std_degree'],
                    'assign_batch' => $std[0]['std_batch'], 'assign_sem' => $std[0]['semester_id'], 'course_id' => $std[0]['course_id'],'class_id'=>$std[0]['class_id']))->result();

        $page_data['course'] = $this->db->get('course')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['page_name'] = 'assignment';
        $page_data['param'] = $param1;
        $page_data['page_title'] = 'Assignment List';
        clear_notification('assignment_manager', $this->session->userdata('student_id'));
        unset($this->session->userdata('notifications')['assignment_manager']);
        $this->load->view('backend/index', $page_data);
    }

    function studyresource($param1 = '', $param2 = '') {
        if ($param1 == 'create') {
            if ($_FILES['resourcefile']['name'] != "") {
                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('resourcefile')) {
                    $data = array('msg' => $this->upload->display_errors());
                } else {
                    $file = $this->upload->data();
                    $data['study_filename'] = $file['file_name'];
                }
            }
            $data['study_degree'] = $this->input->post('degree');
            $data['study_title'] = $this->input->post('title');
            $data['study_batch'] = $this->input->post('batch');
            $data['study_url'] = $this->input->post('pageurl');
            $data['study_sem'] = $this->input->post('semester');
            $data['student_id'] = $this->session->userdata('std_id');
            $data['study_desc'] = $this->input->post('description');
            $data['study_dos'] = $this->input->post('dateofsubmission');
            $data['study_status'] = 1;
            $data['created_date'] = date('Y-m-d');
            $this->db->insert('study_resources', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?student/studyresource/', 'refresh');
        }
        $page_data['studyresource'] = $this->db->get_where('study_resources', array("student_id" => $this->session->userdata('std_id')))->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['page_name'] = 'studyresource';
        $page_data['page_title'] = 'Study Resource Online';
        $this->load->view('backend/index', $page_data);
    }
    
    
    function project($param1 = '', $param2 = '') {

        if ($param1 == 'create') {
            if ($_FILES['projectfile']['name'] != "") {
                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	
                if (!$this->upload->do_upload('projectfile')) {
                    $data = array('msg' => $this->upload->display_errors());
                } else {
                    $file = $this->upload->data();
                    $data['pm_filename'] = $file['file_name'];
                }
            }
            $data['pm_degree'] = $this->input->post('degree');
            $data['pm_title'] = $this->input->post('title');
            $data['pm_batch'] = $this->input->post('batch');
            $data['pm_url'] = $this->input->post('pageurl');
            $data['pm_semester'] = $this->input->post('semester');
            $data['pm_desc'] = $this->input->post('description');
            $data['pm_dos'] = $this->input->post('dateofsubmission');
            $data['pm_status'] = 1;
            $data['pm_student_id'] = $this->input->post('student');
            $data['created_date'] = date('Y-m-d');
            $this->db->insert('project_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?student/project/submission', 'refresh');
        }
        if ($param1 == "submit_project") {
            if ($_FILES['document_file']['name'] != "") {
                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('document_file')) {
                    //$datafile = array('msg' => $this->upload->display_errors());
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('flash_message', $error);
                    redirect(base_url() . 'index.php?student/project/submission', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['document_file'] = $file['file_name'];
                }
            }
            $data['description'] = $this->input->post('comment');
            $data['project_id'] = $this->input->post('project_id');
            $data['student_id'] = $this->session->userdata('std_id');
            $data['dos'] = date('Y-m-d');
            $this->db->insert('project_document_submission', $data);
            $this->session->set_flashdata('flash_message', get_phrase('project_added_successfully'));
            redirect(base_url() . 'index.php?student/project/submission', 'refresh');
        }
        if ($param1 == "submission") {
            $std_id = $this->session->userdata('std_id');
            $std = $this->db->get_where('student', array('std_id' => $std_id))->result_array();
            // $this->db->get_where('project_manager',array('	pm_degree'=>$std[0]['std_degree'],
            //'pm_batch'=>$std[0]['std_batch'],'pm_semester'=>$std[0]['semester_id'],'pm_course'=>$std[0]['course_id']))->result();
            $degree = $std[0]['std_degree'];
            $batch = $std[0]['std_batch'];
            $sem = $std[0]['semester_id'];
            $course = $std[0]['course_id'];
            $class = $std[0]['class_id'];
            $page_data['project'] = $this->db->query("SELECT * FROM project_manager WHERE pm_degree='$degree' AND pm_batch = '$batch' AND pm_semester = '$sem' AND pm_course = '$course' AND class_id='$class' AND FIND_IN_SET('$std_id',pm_student_id)")->result();
            // $page_data['project'] = $this->db->get_where('project_manager', array("pm_student_id" => $this->session->userdata('std_id')))->result();
            $page_data['degree'] = $this->db->get('degree')->result();
            $page_data['batch'] = $this->db->get('batch')->result();
            $page_data['course'] = $this->db->get('course')->result();
            $page_data['semester'] = $this->db->get('semester')->result();
            $page_data['class'] = $this->db->get('class')->result();
            $page_data['student'] = $this->db->get('student')->result();
            $page_data['page_name'] = 'project';
            $page_data['page_title'] = 'Project List';
            $page_data['param'] = $param1;
            clear_notification('project_manager', $this->session->userdata('student_id'));
            unset($this->session->userdata('notifications')['project_manager']);
            $this->load->view('backend/index', $page_data);
        }
        if ($param1 == "video") {
            $page_data['project'] = $this->db->get('project_manager')->result();
            $page_data['page_name'] = 'project';
            $page_data['page_title'] = 'Project List';
            $page_data['param'] = $param1;
            $this->load->view('backend/index', $page_data);
        }
    }

    /**
     * Live Video streaming 
     * @param int $id
     */
    function video_streaming($id) {
        $page_data['streaming_data'] = $this->db->get_where('broadcast', array('id' => $id))->row();
        $page_data['page_name'] = 'video_streaming';
        $page_data['page_title'] = 'Online Video Streaming';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Exam listing
     */
    function exam_listing() {
        $this->load->model('Student/Student_model');
        $student_details = $this->db->get_where('student', array(
                    'std_id' => $this->session->userdata('login_user_id')
                ))->row();
        $page_data['exam_listing'] = $this->Student_model->
                student_exam_list($student_details->course_id, $student_details->semester_id);

        //check for time table
        $student_id = $this->session->userdata('student_id');
        foreach ($page_data['exam_listing'] as $exam) {
            $is_pass = TRUE;
            //find exam schedule
            $exam_schedule = $this->Student_model->exam_schedule($exam->em_id);

            //find marks
            $exam_marks = $this->Student_model->student_marks($student_id, $exam->em_id);

            //check for pass or fail
            foreach ($exam_marks as $mark) {
                if ($mark->mark_obtained < $exam->passing_mark) {
                    $is_pass = FALSE;
                    break;
                }
            }

            //find remedial exams if fail
            if (!$is_pass) {
                $remedial_exam = $this->Student_model->remedial_exam_list($exam->em_id);

                foreach ($remedial_exam as $remedial) {
                    $is_remedial_exam_pass = FALSE;
                    array_push($page_data['exam_listing'], $remedial);
                    //check for exam schedule
                    $remedial_exam_schedule = $this->Student_model->exam_schedule($remedial->em_id);

                    foreach ($remedial_exam_schedule as $schedule) {
                        //check for marks
                        $marks = $this->Student_model->student_marks($student_id, $remedial->em_id);

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
        $page_data['page_name'] = 'exam_listing';
        $page_data['page_title'] = 'Exam Listing';
        clear_notification('exam_manager', $this->session->userdata('student_id'));
        clear_notification('exam_time_table', $this->session->userdata('student_id'));
        unset($this->session->userdata('notifications')['exam_manager']);
        unset($this->session->userdata('notifications')['exam_time_table']);
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Exam schedule
     * @param string $exam_id
     */
    function exam_schedule($exam_id = '') {
        $this->load->model('Student/Student_model');
        $page_data['exam_details'] = $this->Student_model->exam_detail($exam_id);
        $page_data['time_table'] = $this->Student_model->exam_schedule($exam_id);
        $page_data['page_name'] = 'exam_schedule';
        $page_data['page_title'] = 'Exam Schedule';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Exam marks
     * @param string $exam_id
     */
    function exam_marks($exam_id = '') {
        $this->load->model('Student/Student_model');
        $student_id = $this->session->userdata('student_id');
        $page_data['page_name'] = 'exam_marks';
        $page_data['page_title'] = 'Exam Marks';
        $page_data['exam_id'] = $exam_id;
        $page_data['exam_details'] = $this->Student_model->exam_detail($exam_id);
        $student_details = $this->db->get_where('student', array(
                    'std_id' => $this->session->userdata('login_user_id')
                ))->row();
        $page_data['student_detail'] = $student_details;
        $page_data['batch_detail'] = $this->Student_model->student_batch_course_detail($student_details->std_id);
        $page_data['student_marks'] = $this->Student_model->student_marks($student_details->std_id, $exam_id);
        $page_data['exam_listing'] = $this->Student_model->
                student_exam_list($student_details->course_id, $student_details->semester_id);

        $student_id = $this->session->userdata('student_id');
        foreach ($page_data['exam_listing'] as $exam) {
            $is_pass = TRUE;
            //find exam schedule
            $exam_schedule = $this->Student_model->exam_schedule($exam->em_id);

            //find marks
            $exam_marks = $this->Student_model->student_marks($student_id, $exam->em_id);

            //check for pass or fail
            foreach ($exam_marks as $mark) {
                if ($mark->mark_obtained < $exam->passing_mark) {
                    $is_pass = FALSE;
                    break;
                }
            }

            //find remedial exams if fail
            if (!$is_pass) {
                $remedial_exam = $this->Student_model->remedial_exam_list($exam->em_id);

                foreach ($remedial_exam as $remedial) {
                    $is_remedial_exam_pass = FALSE;
                    array_push($page_data['exam_listing'], $remedial);
                    //check for exam schedule
                    $remedial_exam_schedule = $this->Student_model->exam_schedule($remedial->em_id);

                    foreach ($remedial_exam_schedule as $schedule) {
                        //check for marks
                        $marks = $this->Student_model->student_marks($student_id, $remedial->em_id);

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

        clear_notification('marks_manager', $this->session->userdata('student_id'));
        unset($this->session->userdata('notifications')['marks_manaher']);
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Statements of marks
     */
    function statement_of_marks() {
        $this->load->model('Student/Student_model');
        $student_details = $this->db->get_where('student', array(
                    'std_id' => $this->session->userdata('login_user_id')
                ))->row();
        $page_data['exam_listing'] = $this->Student_model->
                student_exam_list($student_details->course_id, $student_details->semester_id);
        $page_data['page_name'] = 'statement_of_marks';
        $page_data['page_title'] = 'Statement of Marks';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Download exam marsheet report
     * @param string $exam_id
     */
    public function download_statement_marks($exam_id = '') {
        $this->load->model('Student/Student_model');
        $page_data['exam_details'] = $this->Student_model->exam_detail($exam_id);
        $student_details = $this->db->get_where('student', array('std_id' => $this->session->userdata('login_user_id')))->row();
        $page_data['student_detail'] = $student_details;
        $page_data['batch_detail'] = $this->Student_model->student_batch_course_detail($student_details->std_id);
        $page_data['student_marks'] = $this->Student_model->student_marks($student_details->std_id, $exam_id);
        $page_data['exam_listing'] = $this->Student_model->student_exam_list($student_details->course_id, $student_details->semester_id);
        //$page_data = array();
        $html = utf8_encode($this->load->view('backend/student/marks_statement', $page_data, true));
        //this the the PDF filename that user will get to download
        $pdfFilePath = "student marksheet.pdf";
        //load mPDF library
        $this->load->library('m_pdf');
        //load the view and saved it into $html variable
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    function student_fees() {
        $this->load->model('Student/Student_model');
        $page_data['student_detail'] = $this->db->get_where('student', array(
                    'std_id' => $this->session->userdata('login_user_id')
                ))->row();
        $page_data['fees_structure'] = '';
        $page_data['semester'] = $this->Student_model->get_all_semester();
        $page_data['fees_record'] = $this->Student_model->fees_record($this->session->userdata('login_user_id'));
        $page_data['page_name'] = 'student_fees';
        $page_data['page_title'] = 'Student Fees';
        clear_notification('fees_structure', $this->session->userdata('student_id'));
        unset($this->session->userdata('notifications')['fees_structure']);
        $this->load->view('backend/index', $page_data);
    }

    function invoice($id = '') {
        $this->load->model('Student/Student_model');
        $page_data['page_name'] = 'invoice';
        $page_data['page_title'] = 'Student invoice';
        $page_data['invoice'] = $this->Student_model->invoice_detail($id);
        $paid_fees = $this->Student_model->student_paid_fees($page_data['invoice']->fees_structure_id, $page_data['invoice']->std_id);
        $total_paid = 0;
        if (count($paid_fees)) {
            foreach ($paid_fees as $paid) {
                $total_paid += $paid->paid_amount;
            }
        }
        $page_data['due_amount'] = $page_data['invoice']->total_fee - $total_paid;
        $page_data['total_paid'] = $total_paid;
        $this->load->view('backend/index', $page_data);
    }

    function invoice_print($id) {
        $this->load->model('Student/Student_model');
        $page_data['invoice'] = $this->Student_model->invoice_detail($id);
        $paid_fees = $this->Student_model->student_paid_fees($page_data['invoice']->fees_structure_id, $page_data['invoice']->std_id);
        $total_paid = 0;
        if (count($paid_fees)) {
            foreach ($paid_fees as $paid) {
                $total_paid += $paid->paid_amount;
            }
        }
        $page_data['due_amount'] = $page_data['invoice']->total_fee - $total_paid;
        $page_data['total_paid'] = $total_paid;
        $html = utf8_encode($this->load->view('backend/student/invoice_print', $page_data, true));
        //this the the PDF filename that user will get to download
        $pdfFilePath = "invoice copy.pdf";
        //load mPDF library
        $this->load->library('m_pdf');
        //load the view and saved it into $html variable
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D");
    }

    /**
     * Fees structure details
     * @param string $course_id
     * @param string $semester_id
     */
    function fees_structure_details($course_id = '', $semester_id = '') {
        $this->load->model('Student/Student_model');
        $fees_structure = $this->Student_model->fees_structure($course_id, $semester_id);
        echo json_encode($fees_structure);
    }

    /**
     * Student fees structure details
     * @param string $fees_structure_id
     */
    function student_fees_structure_details($fees_structure_id) {
        $this->load->model('Student/Student_model');
        $fees_structure = $this->Student_model->fees_structure_details($fees_structure_id);
        echo json_encode($fees_structure);
    }

    /**
     * Course semester paid fee
     * @param int $fees_structure_id
     */
    function course_semester_paid_fee($fees_structure_id) {
        $this->load->model('Student/Student_model');
        $student_detail = $this->db->get_where('student', array(
                    'std_id' => $this->session->userdata('login_user_id')
                ))->row();
        //$fees_structure = $this->Student_model->fees_structure_details($fees_structure_id);
        $paid_fees = $this->Student_model->student_paid_fees($fees_structure_id, $student_detail->std_id);
        $total_paid = 0;
        if (count($paid_fees)) {
            foreach ($paid_fees as $paid) {
                $total_paid += $paid->paid_amount;
            }
        }
        echo json_encode($total_paid);
    }
   
// payment nikita 
    
    function vocationalcourse($param1 = '', $param2 = '')
    {
        if ($param1 == 'register') {
        $page_data['vocationalcourse']=$this->db->get_where('vocational_course',array('vocational_course_id'=>$param2))->result_array();
        
        $page_data['page_name'] = 'modal_register_vocational_course';
        $page_data['page_title'] = 'Vocational Course Fee';
        $this->load->view('backend/index', $page_data);
        }
        else
        {

          $page_data['vocationalcourse']=$this->db->query('SELECT * FROM vocational_course 
                    WHERE NOT EXISTS (SELECT vocational_course_id FROM vocational_course_fee
                    WHERE vocational_course_fee.vocational_course_id = vocational_course.vocational_course_id and vocational_course_fee.student_id= '.$this->session->userdata('student_id').')')->result_array();
        
          //$page_data['vocationalcourse'] = $this->db->get_where('vocational_course',array('status'=>1))->result_array();
        $page_data['page_name'] = 'vocational_course';
        $page_data['page_title'] = 'Vocational Course';
        $this->load->view('backend/index', $page_data);
        }
      
    }
    
    function pay_online_vocational_course() {
        if ($_POST) {
            //set payment data in session
            $session['payment_info'] = array(
                'student_id' => $this->session->userdata('student_id'),                
                'amount' => $_POST['amount'],
                'vocational_courseid' => $_POST['voc_course'],
            );
            $this->session->set_userdata($session);
            //echo '<pre>';
            //var_dump($_POST);
            redirect(base_url('index.php?student/vocational_payment_gateway_type/' . $_POST['method']));
        } else {
            redirect(base_url('index.php?student/vocationalcourse'));
        }
    }
    
    function vocational_payment_gateway_type($type) {
        $this->load->model('admin/Crud_model');
        if ($type == 'authorize.net') {
            //load authorize.net payment getaway page
            $page_data['authorize_net'] = $this->Crud_model->authorize_net_config();
            
        }
        $page_data['title'] = 'Make Payment';
        $page_data['page_name'] = 'vocational_make_payment';
        $this->load->view('backend/index', $page_data);
    }
     function vocational_authorize_net_make_payment()
    {
         $this->load->library('authorize_net');
        $this->load->model('Student/Student_model');
        if ($_POST) {
            $student_detail = $this->db->get_where('student', array(
                        'std_id' => $this->session->userdata('login_user_id')
                    ))->row();
            
            $cc_details = $this->validateCreditcard_number($_POST['card_number']);
            if ($cc_details['status'] == 'false') {
                // invalid card details
                echo 'invalid card details';
                //$this->do_payment();
            } else {
                $student_data = $this->db->get_where('student', array('std_id' => $this->session->userdata('payment_data')['student_id']))->row();
                $auth_net = array(
                    'x_card_num' => $_POST['card_number'], // Visa
                    'x_exp_date' => $_POST['month'] . '/17',
                    'x_card_code' => $_POST['cvv'],
                    'x_description' => 'Authorize.net transaction',
                    'x_amount' => $this->session->userdata('payment_info')['amount'],
                    'x_first_name' => $student_detail->std_first_name,
                    'x_last_name' => $student_detail->std_last_name,
                    'x_address' => 'Address',
                    'x_city' => $student_detail->city,
                    'x_state' => 'State',
                    'x_zip' => $student_detail->zip,
                    'x_country' => 'India',
                    'x_phone' => $student_detail->std_mobile,
                    'x_email' => 'mayur.ghadiya@searchnative.in',
                    'x_customer_ip' => $this->input->ip_address(),
                );
                $this->authorize_net->setData($auth_net);
                // redirect after order completion
                $status = array();
                // Try to AUTH_CAPTURE
                if ($this->authorize_net->authorizeAndCapture()) {
                    
                    $this->session->set_flashdata('flash_message', 'Transaction is successfully done.');
                    
                    $student_detail = $this->db->get_where('student', array(
                                'std_id' => $this->session->userdata('login_user_id')
                            ))->row();
                    //insert into db
                    $this->Student_model->vocational_add_authorized_payment(array(
                        'student_id' => $this->session->userdata('payment_info')['student_id'],
                        'pay_amount' => $this->session->userdata('payment_info')['amount'],
                        'vocational_course_id' => $this->session->userdata('payment_info')['vocational_courseid'],
                        'pay_date'=>date('Y-m-d')
                    ));
                    //remove session
                    $this->session->unset_userdata('payment_info');
                    redirect(base_url('index.php?student/vocationalcourse'));
                } else {
                    $this->session->set_flashdata('flash_message', '<p>' . $this->authorize_net->getError() . '</p>');
                    //remove session
                    $this->session->unset_userdata('payment_data');
                    //remove session
                    $this->session->unset_userdata('payment_info');
                    redirect(base_url('index.php?student/vocationalcourse'));
                }
            }
        }
    }
    
    //end
    /**
     * Pay online
     */
    function pay_online() {
        if ($_POST) {
            //set payment data in session
            $session['payment_info'] = array(
                'student_id' => $this->session->userdata('student_id'),
                'fees_structure' => $_POST['fees_structure'],
                'semester' => $_POST['semester'],
                'amount' => $_POST['amount'],
                'title' => $_POST['title'],
                'remarks' => $_POST['description']
            );
            $this->session->set_userdata($session);
            //echo '<pre>';
            //var_dump($_POST);
            redirect(base_url('index.php?student/payment_gateway_type/' . $_POST['method']));
        } else {
            redirect(base_url('index.php?student/student_fees'));
        }
    }
 
    /**
     * Payment gateway type
     * @param string $type
     */
    function payment_gateway_type($type) {
        $this->load->model('admin/Crud_model');
        if ($type == 'authorize.net') {
            //load authorize.net payment getaway page
            $page_data['authorize_net'] = $this->Crud_model->authorize_net_config();
            $page_data['degree'] = $this->Crud_model->get_all_degree();
            $page_data['course'] = $this->Crud_model->get_all_course();
            $page_data['semester'] = $this->Crud_model->get_all_semester();
        }
        $page_data['title'] = 'Make Payment';
        $page_data['page_name'] = 'make_payment';
        $this->load->view('backend/index', $page_data);
    }
     
    function authorize_net_make_payment() {
        $this->load->library('authorize_net');
        $this->load->model('Student/Student_model');
        if ($_POST) {
            $student_detail = $this->db->get_where('student', array(
                        'std_id' => $this->session->userdata('login_user_id')
                    ))->row();
            $cc_details = $this->validateCreditcard_number($_POST['card_number']);
            if ($cc_details['status'] == 'false') {
                // invalid card details
                echo 'invalid card details';
                //$this->do_payment();
            } else {
                $student_data = $this->db->get_where('student', array('std_id' => $this->session->userdata('payment_data')['student_id']))->row();
                $auth_net = array(
                    'x_card_num' => $_POST['card_number'], // Visa
                    'x_exp_date' => $_POST['month'] . '/17',
                    'x_card_code' => $_POST['cvv'],
                    'x_description' => 'Authorize.net transaction',
                    'x_amount' => $this->session->userdata('payment_info')['amount'],
                    'x_first_name' => $student_detail->std_first_name,
                    'x_last_name' => $student_detail->std_last_name,
                    'x_address' => 'Address',
                    'x_city' => $student_detail->city,
                    'x_state' => 'State',
                    'x_zip' => $student_detail->zip,
                    'x_country' => 'India',
                    'x_phone' => $student_detail->std_mobile,
                    'x_email' => 'mayur.ghadiya@searchnative.in',
                    'x_customer_ip' => $this->input->ip_address(),
                );
                $this->authorize_net->setData($auth_net);
                // redirect after order completion
                $status = array();
                // Try to AUTH_CAPTURE
                if ($this->authorize_net->authorizeAndCapture()) {
                    $this->session->set_flashdata('Transaction success', 'Transaction is successfully done.');
                    $student_detail = $this->db->get_where('student', array(
                                'std_id' => $this->session->userdata('login_user_id')
                            ))->row();
                    //insert into db
                    $this->Student_model->add_authorized_payment(array(
                        'student_id' => $this->session->userdata('payment_info')['student_id'],
                        'fees_structure_id' => $this->session->userdata('payment_info')['fees_structure'],
                        'paid_amount' => $this->session->userdata('payment_info')['amount'],
                        'course_id' => $student_detail->course_id,
                        'sem_id' => $this->session->userdata('payment_info')['semester'],
                        'fee_title' => $this->session->userdata('payment_info')['title'],
                        'remarks' => $this->session->userdata('payment_info')['remarks']
                    ));
                    //remove session
                    $this->session->unset_userdata('payment_info');
                    redirect(base_url('index.php?student/student_fees'));
                } else {
                    $this->session->set_flashdata('Transaction incomplete', '<p>' . $this->authorize_net->getError() . '</p>');
                    //remove session
                    $this->session->unset_userdata('payment_data');
                    //remove session
                    $this->session->unset_userdata('payment_info');
                    redirect(base_url('index.php?student/student_fees'));
                }
            }
        }
    }
    
   

    /**
     * Verify and print verify card details
     */
    function verify_card_detail($cc_number) {
        $cc_details = $this->validateCreditcard_number($cc_number);
        echo json_encode($cc_details);
    }

    /**
     * Filter and redirect based on payment gateway
     */
    function process_payment() {
        if ($this->session->userdata('payment_data')['payment_gateway'] == 'authorize') {
            $page_data['title'] = 'Process Payment';
            $page_data['page_name'] = 'authorize_payment';
            $this->load->view('backend/index', $page_data);
        } else {
            redirect(base_url('index.php?student/make_payment'));
        }
    }

    /**
     * Validate credit card number
     * @param int $cc_num
     * @return array
     */
    function validateCreditcard_number($cc_num) {
        $credit_card_number = $this->sanitize($cc_num);
        // Get the first digit
        $data = array();
        $firstnumber = substr($credit_card_number, 0, 1);
        // Make sure it is the correct amount of digits. Account for dashes being present.
        switch ($firstnumber) {
            case 3:
                $data['card_type'] = "American Express";
                if (!preg_match('/^3\d{3}[ \-]?\d{6}[ \-]?\d{5}$/', $credit_card_number)) {
                    //return 'This is not a valid American Express card number';
                    $data['status'] = 'false';
                    return $data;
                }
                break;
            case 4:
                $data['card_type'] = "Visa";
                if (!preg_match('/^4\d{3}[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number)) {
                    //return 'This is not a valid Visa card number';
                    $data['status'] = 'false';
                    return $data;
                }
                break;
            case 5:
                $data['card_type'] = "MasterCard";
                if (!preg_match('/^5\d{3}[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number)) {
                    //return 'This is not a valid MasterCard card number';
                    $data['status'] = 'false';
                    return $data;
                }
                break;
            case 6:
                $data['card_type'] = "Discover";
                if (!preg_match('/^6011[ \-]?\d{4}[ \-]?\d{4}[ \-]?\d{4}$/', $credit_card_number)) {
                    //return 'This is not a valid Discover card number';
                    $data['status'] = 'false';
                    return $data;
                }
                break;
            default:
                //return 'This is not a valid credit card number';
                $data['card_type'] = "Invalid";
                $data['status'] = 'false';
                return $data;
        }
        // Here's where we use the Luhn Algorithm
        $credit_card_number = str_replace('-', '', $credit_card_number);
        $map = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 2, 4, 6, 8, 1, 3, 5, 7, 9);
        $sum = 0;
        $last = strlen($credit_card_number) - 1;
        for ($i = 0; $i <= $last; $i++) {
            $sum += $map[$credit_card_number[$last - $i] + ($i & 1) * 10];
        }
        if ($sum % 10 != 0) {
            //return 'This is not a valid credit card number';
            $data['status'] = 'false';
            return $data;
        }
        // If we made it this far the credit card number is in a valid format
        $data['status'] = 'true';
        return $data;
    }

    /**
     * Sanitize the input
     */
    function sanitize($value) {
        return trim(strip_tags($value));
    }

    /**
     * Student profile
     */
    function manage_profile($param1 = "", $param2 = "") {
        $this->load->model('Student/Student_model');
        $page_data['error'] = '';
        if ($param1 == "update") {
            if ($_FILES['userfile']['name'] != "") {

                $ext_img = explode(".", $_FILES['userfile']['name']);
                $ext = strtolower(end($ext_img));

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $ext_arr = explode("|", $config['allowed_types']);

                if (in_array($ext, $ext_arr)) {
                    if (file_exists("uploads/student_image/" . $this->input->post('txtoldfile'))) {
                        unlink("uploads/student_image/" . $this->input->post('txtoldfile'));
                    }
                    $config['file_name'] = date('dmYhis') . '.' . $ext;
                    $config['upload_path'] = 'uploads/student_image';
                    //$config['allowed_types'] = 'gif|jpg|png';
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    $this->upload->do_upload('userfile');
                    $file = $this->upload->data();
                    $data['profile_photo'] = $file['file_name'];
                } else {
                    $this->session->set_flashdata("flash_message", 'Update failed. Invalid Image!');
                    redirect(base_url() . 'index.php?admin/student/', 'refresh');
                }
            } else {
                $data['profile_photo'] = $this->input->post('txtoldfile');
            }

            $data['email'] = $this->input->post('email_id');
            $data['std_first_name'] = $this->input->post('f_name');
            $data['std_last_name'] = $this->input->post('l_name');
            $data['std_gender'] = $this->input->post('gen');
            $data['std_birthdate'] = $this->input->post('birthdate1');
            $data['std_marital'] = $this->input->post('maritalstatus');
            $data['std_about'] = $this->input->post('std_about');
            $data['std_mobile'] = $this->input->post('mobileno');
            $data['address'] = $this->input->post('address');
            $data['city'] = $this->input->post('city');
            $data['zip'] = $this->input->post('zip');
            $data['std_fb'] = $this->input->post('facebook');
            $data['std_twitter'] = $this->input->post('twitter');

            $this->db->where('std_id', $this->session->userdata('std_id'));
            $this->db->update('student', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?student/manage_profile', 'refresh');
        }
        $page_data['title'] = 'Student Profile';
        $page_data['page_name'] = 'student_profile';
        $page_data['profile'] = $this->Student_model->student_details($this->session->userdata('login_user_id'));
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Student profile
     */
    function profile() {
        $this->load->model('Student/Student_model');
        $page_data['error'] = '';
        if ($_POST) {
            //update password
            $old_password = $_POST['password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            if ($old_password != '' && $new_password != '' && $confirm_password != '') {
                $student = $this->Student_model->student_details($this->session->userdata('student_id'));
                if ($old_password == $student->real_pass) {
                    if ($new_password == $confirm_password) {
                        //update password
                        $id = $student->std_id;
                        $data = array(
                            'password' => hash('md5', $new_password),
                            'real_pass' => $new_password
                        );
                        $this->Student_model->update_password($data, $id);
                        $this->session->set_flashdata('message', 'Password is successfully changed.');
                        redirect(base_url('index.php?student/profile'));
                    } else {
                        $page_data['error'] = 'Password is mismatched.';
                    }
                } else {
                    $page_data['error'] = 'Invalid old password';
                }
            }

            //change profile pic
            if ($_FILES['userfile']['name'] != '') {
                $path = FCPATH . 'uploads/student_image/';
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $path . $this->session->userdata('student_id') . '.jpg')) {
                    echo 'uploaded';
                }
                $this->db->where('std_id', $this->session->userdata('student_id'));
                $this->db->update('student', array(
                    'profile_photo' => $this->session->userdata('student_id') . '.jpg '
                ));
                $this->session->set_flashdata('message', 'Profile pic is changed');
                redirect(base_url('index.php?student/profile'));
            }
        }
        $page_data['title'] = 'Student Profile';
        $page_data['page_name'] = 'student_profile';
        $page_data['profile'] = $this->Student_model->student_details($this->session->userdata('login_user_id'));
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Email inbox view
     * 
     * @return response
     */
    function email() {
//set the page title
        $data['title'] = 'Email';
//set the sub view
        $data['content'] = 'backend/student/email_inbox';
//load email template
        $this->load->view('backend/student/includes/email_template', $data);
    }

    /**
     * Email compose
     * 
     * @return response
     */
    function email_compose() {
        //load the Crud model
        ini_set('max_execution_time', 500);
        $this->load->model('admin/Crud_model');
        $this->load->model('Student/Student_model');
        $this->load->helper('system_email');
        if ($_POST) {
            if ($_POST) {
                $filename = '';
                $attachments = array();
                if ($_FILES) {
                    $files = $_FILES;
                    $cpt = count($_FILES['userfile']['name']);
                    for ($i = 0; $i < $cpt; $i++) {
                        $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                        $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                        $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload();
                        $uploaded = $this->upload->data();
                        $filename .= $uploaded['file_name'] . ',';
                        array_push($attachments, $uploaded['full_path']);
                    }
                }
                $filename = rtrim($filename, ',');
                $_POST['file_name'] = $filename;
                student_email_send_to_admin($_POST);
                $teacher_list = array();
                //send mails to others
                if (count($_POST['teacheremail'])) {
                    $teacher_list = $_POST['teacheremail'];
                }
                //cc
                $cc_list = explode(',', $_POST['cc']);
                $email_cc_list = array();
                foreach ($cc_list as $row) {
                    array_push($email_cc_list, $row);
                }
                $this->setemail($teacher_list, $_POST['subject'], $_POST['message'], $email_cc_list, $attachments);
                redirect(base_url('index.php?student/email_inbox'));
            }
        }
        //get all student information
        $data['students'] = $this->Crud_model->get_all_students();
        $data['teacher'] = $this->Crud_model->get_all_teacher();
        $data['all_admin'] = $this->Crud_model->get_all_admin();
        //set the template and view
        $data['title'] = 'Compose Email';
        $data['content'] = 'backend/student/email_compose';
        $this->load->view('backend/student/includes/email_template', $data);
    }

    /**
     * Set mail config
     */
    function setemail($emails, $subject = '', $message = '', $cc, $attachment) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mayur.ghadiya@searchnative.in',
            'smtp_pass' => 'the mayurz97375',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        //$this->load->library('email');
        $subject = $subject;
        $message = $message;
        foreach ($emails as $email) {
            $this->email->clear(TRUE);
            $this->sendEmail($email, $subject, $message, $cc, $attachment);
        }
    }

    function set_upload_options() {
        //upload an image options
        $config = array(
            'upload_path' => './uploads/emails/',
            'allowed_types' => 'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf',
            'max_size' => '10000'
        );
        return $config;
    }

    /**
     * Send email
     * @param string $email
     * @param string $subject
     * @param string $message
     */
    public function sendEmail($email, $subject, $message, $cc, $attachments) {
        //$this->email->set_newline("\r\n");
        $this->email->from('mayur.ghadiya@searchnative.in', 'Search Native India');
        $this->email->to($email);
        foreach ($cc as $row) {
            $this->email->cc($row);
        }
        $this->email->subject($subject);
        $this->email->message($message);
        //$files = array('D:\unit testing.docx', 'D:\vtiger trial version features.docx');
        foreach ($attachments as $row) {
            $this->email->attach($row);
        }
        if ($this->email->send()) {
            echo 'Email send.';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    //send mail
    function sendmail($from, $from_name, $to, $subject, $cc, $bcc, $message) {
        $this->email->clear();
        $this->email->from($from, $from_name);
        //$list = array($to);
        $this->email->to($to);
        $this->email->cc($cc);
        $this->email->bcc($bcc);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    /**
     * View sent email of the admin
     */
    function email_sent() {
        $this->load->model('admin/Crud_model');
        $data['sent_mail'] = $this->Crud_model->my_sent_mail($this->session->userdata('email')); //admin
        $data['title'] = 'Sent Email';
        $data['content'] = 'backend/student/email_sent';
        $this->load->view('backend/student/includes/email_template', $data);
    }

    /**
     * Email inbox
     */
    function email_inbox() {
        $this->load->model('admin/Crud_model');
        $this->load->helper('system_email');
        $data['inbox'] = student_inbox();
        $data['title'] = 'Inbox';
        $data['content'] = 'backend/student/email_inbox';
        $this->load->view('backend/student/includes/email_template', $data);
    }

    function inbox_email($id) {
        $this->load->model('admin/Crud_model');
        $this->load->helper('system_email');
        //$data['email'] = $this->Crud_model->view_mail($id);
        $data['email'] = student_email_view($id);
        $data['title'] = $data['email']->subject;
        $data['content'] = 'backend/student/email_inbox_view';
        $this->load->view('backend/student/includes/email_template', $data);
    }

    function email_reply($id) {
        $this->load->model('admin/Crud_model');
        $this->load->helper('system_email');
        if ($_POST) {
            $filename = '';
            if ($_FILES) {
                $files = $_FILES;
                $cpt = count($_FILES['userfile']['name']);
                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                    $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload();
                    $uploaded = $this->upload->data();
                    $filename .= $uploaded['file_name'] . ',';
                }
                $filename = rtrim($filename, ',');
            }
            $_POST['file_name'] = $filename;
            reply_from_student($_POST);
            redirect(base_url('index.php?student/email_inbox'));
        }
        //$data['email'] = $this->Crud_model->view_mail($id);
        $data['email'] = student_email_view($id);
        $data['title'] = 'Email Reply';
        $data['content'] = 'backend/student/email_reply';
        $this->load->view('backend/student/includes/email_template', $data);
    }

    /**
     * View particular email details
     * @param int $id
     */
    function email_view($id) {
        $this->load->model('admin/Crud_model');
        $data['email'] = $this->Crud_model->view_mail($id);
        if ($data['email']->email_to == $this->session->userdata('email')) {
            //update read status
            $update = array(
                'read' => 1
            );
            $this->Crud_model->update_email_read_status($id, $update);
        }
        $data['title'] = $data['email']->subject;
        $data['content'] = 'backend/student/email_view';
        $this->load->view('backend/student/includes/email_template', $data);
    }

    /**
     * Delete email
     * @param type $id
     */
    function delete_email($id) {
        $this->load->library('user_agent');
        $this->load->model('admin/Crud_model');
        $this->Crud_model->delete_email($id);
        redirect($this->agent->referrer());
    }

    function save_draft() {
        //load the Crud model
        $this->load->model('admin/Crud_model');
        if ($_POST) {
            //load the email library
            $this->load->library('email');
            $config['protocol'] = "smtp";
            $config['smtp_host'] = "ssl://smtp.gmail.com";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = "mayur.ghadiya@searchnative.in";
            $config['smtp_pass'] = "the mayurz97375";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";
            $this->email->initialize($config);
            //get the admin or sender details
            $student_detail = $this->Student_model->student_details($this->session->userdata('student_id'));
            //fetch the compose email information
            $from_name = $student_detail->std_first_name . ' ' . $student_detail->std_last_name;
            $from = $admin_details->email;
            $students = $this->input->post('email_to', TRUE);
            $subject = $this->input->post('subject', TRUE);
            $cc = $this->input->post('cc', TRUE);
            $bcc = $this->input->post('bcc', TRUE);
            $message = $this->input->post('message', TRUE);
            $is_draft = 1;
            $from_role = 'admin';
            $to_role = 'student';
            foreach ($students as $row) {
                //store the info in db
                $insert_data = array(
                    'email_from' => $from,
                    'from_name' => $from_name,
                    'email_to' => $row,
                    'subject' => $subject,
                    'cc' => $cc,
                    'bcc' => $bcc,
                    'message' => $message,
                    'role_from' => $from_role,
                    'role_to' => $to_role,
                    'is_draft' => $is_draft
                );
                $this->Crud_model->store_email($insert_data);
            }
            //set the notification
            $this->session->set_flashdata('message', 'Email is successfully sent.');
        }
    }

    /**
     * My draft emails
     */
    function email_draft() {
        $this->load->model('admin/Crud_model');
        //$email = $this->session->userdata('email');
        $data['draft'] = $this->Crud_model->my_drafts($this->session->userdata('email'));
        $data['title'] = 'Drafts';
        $data['content'] = 'backend/student/email_draft';
        $this->load->view('backend/student/includes/email_template', $data);
    }

    /**
     * View draft email
     * @param int $id
     */
    function draft_email($id) {
        $this->load->model('admin/Crud_model');
        $data['email'] = $this->Crud_model->view_mail($id);
        //get all student information
        $data['students'] = $this->Crud_model->get_all_students();
        $data['title'] = $data['email']->subject;
        $data['content'] = 'backend/student/email_draft_view';
        $this->load->view('backend/student/includes/email_template', $data);
    }

    function search() {
        $this->load->model('admin/Crud_model');
        $this->load->helper('student_search');
        $data['search_result'] = array();
        if ($_POST) {
            $data['title'] = 'Search Result';
            if ($_POST['search'] != '')
                $data['search_result'] = global_search($_POST['search'], $_POST);
            $data['search_string'] = $_POST['search'];
            unset($_POST['search']);
            $data['from'] = $_POST;
        }
        $data['page_name'] = 'search_result';
        $this->load->view('backend/index', $data);
    }

    /**
     * CMS page
     * @param string $id
     */
    function cms_page($id = '') {
        $this->load->model('Student/Student_model');
        $data['page_name'] = 'cms_pages';
        $data['cms_page'] = $this->Student_model->cms_page_detail($id);
        $this->load->view('backend/index', $data);
    }

    /* Chat Start */

    function chat_new() {
        $page_data['page_name'] = 'schat';
        //$page_data['page_title'] = get_phrase('Chat');
        $this->load->view('schat', $page_data);
    }

    function users() {
        if ($this->session->userdata('std_id')) {
            $id = $this->session->userdata('std_id');
            $contacts = $this->db->get("admin")->result_array();
            $page_data['cur_user'] = $this->db->get_where('student', array('std_id' => $id))->result_array();
        }
        $page_data['users'] = $contacts;
        //$this->load->view('chat-form', $data);
        $page_data['page_name'] = 'schatform';
        //$page_data['page_title'] = get_phrase('Chat');
        $this->load->view('schatform', $page_data);
    }

    public function messages() {
        //get paginated messages 
        $per_page = 5;
        $user = $this->session->userdata('std_id');
        $buddy = $this->input->post('user');
        $limit = isset($_POST['limit']) ? $this->input->post('limit') : $per_page;
        $chatbuddy = $buddy;
        $this->db->where('from', $user);
        $this->db->where('to', $chatbuddy);
        $this->db->or_where('from', $chatbuddy);
        $this->db->where('to', $user);
        $this->db->order_by('id', 'desc');
        $messages = $this->db->get('messages', $limit);
        // $this->db->where('to', $user)->where('from',$chatbuddy)->update('messages', array('is_read'=>'1'));
        $reeverse = $messages->result();
        $messages = array_reverse($reeverse);
        $this->db->where('from', $user);
        $this->db->where('to', $chatbuddy);
        $this->db->or_where('from', $chatbuddy);
        $this->db->where('to', $user);
        $this->db->order_by('id', 'desc');
        $total = $this->db->get('messages')->num_rows();
        $thread = array();
        foreach ($messages as $message) {
            if ($message->send_type == '1') {
                $owner = $this->db->get_where("admin", array("admin_id" => $message->from))->result_array();
                $fname = $owner[0]['ad_first_name'];
            }
            if ($message->send_type == '0') {
                $owner = $this->db->get_where("student", array("std_id" => $message->from))->result_array();
                $fname = $owner[0]['std_first_name'];
            }
            $smiley_url = 'assets/images/smileys';
            $chat = array(
                'msg' => $message->id,
                'sender' => $message->from,
                'recipient' => $message->to,
                'avatar' => $owner[0]['avatar'],
                'body' => parse_smileys($message->message, $smiley_url),
                'time' => date("M j, Y, g:i a", strtotime($message->time)),
                'type' => $message->from == $user ? 'out' : 'in',
                'name' => $message->from == $user ? 'You' : ucwords($fname)
            );
            array_push($thread, $chat);
        }
        $chatbuddy = $this->db->get_where('admin', array("admin_id" => $buddy))->result_array();
        $contact = array(
            'name' => ucwords($chatbuddy[0]['ad_first_name'] . ' ' . $chatbuddy[0]['ad_last_name']),
            'status' => $chatbuddy[0]['online'],
            'id' => $chatbuddy[0]['admin_id'],
            'limit' => $limit + $per_page,
            'more' => $total <= $limit ? false : true,
            'scroll' => $limit > $per_page ? false : true,
            'remaining' => $total - $limit
        );
        $response = array(
            'success' => true,
            'errors' => '',
            'message' => '',
            'buddy' => $contact,
            'thread' => $thread
        );
        $dta = array('is_read' => '1');
        $this->db->where('to', $user);
        $this->db->update('messages', $dta);
        //add the header here
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function save_message() {
        if ($this->session->userdata('std_id')) {
            $logged_user = $this->session->userdata('std_id');
            $buddy = $this->input->post('user');
            $message = $this->input->post('message');
            if ($message != '' && $buddy != '') {
                $array = array(
                    'from' => $logged_user,
                    'to' => $buddy,
                    'message' => $message,
                    'send_type' => '0',
                    'rec_type' => '1');
                $this->db->insert('messages', $array);
                $msg_id = $this->db->insert_id();
                $msg = $this->db->get_where("messages", array("id" => $msg_id))->result_array();
                $owner = $this->db->get_where("student", array("std_id" => $msg[0]['from']))->result_array();
                $smiley_url = 'assets/images/smileys';
                $chat = array(
                    'msg' => $msg[0]['id'],
                    'sender' => $msg[0]['from'],
                    'recipient' => $msg[0]['to'],
                    'avatar' => $owner[0]['avatar'],
                    'body' => parse_smileys($msg[0]['message'], $smiley_url),
                    'time' => date("M j, Y, g:i a", strtotime($msg[0]['time'])),
                    'type' => $msg[0]['from'] == $logged_user ? 'out' : 'in',
                    'name' => $msg[0]['from'] == $logged_user ? 'You' : ucwords($owner[0]['std_first_name'])
                );
                $response = array(
                    'success' => true,
                    'message' => $chat
                );
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Empty fields exists'
                );
            }
            //add the header here
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function updates($param = '') {
        $new_exists = false;
        $user_id = $this->session->userdata('std_id');
        $last_seen = $this->db->get_where('last_seen', array('std_id' => $user_id))->row();
        $last_seen = empty($last_seen) ? 0 : $last_seen->message_id;
        $message = $this->db->where('to', $user_id)
                ->where('id  > ', $last_seen)
                ->where('rec_type', '0')
                ->order_by('time', 'desc')
                ->get('messages', 1);
        //echo $this->db->last_query();
        if ($message->num_rows() > 0) {
            $exists = 'true';
        } else {
            $exists = 'false';
        }
        //$exists = $this->message->latest_message($user_id, $last_seen);
        //echo $exists;
        if ($exists == 'true') {
            $new_exists = true;
        }
        // THIS WHOLE SECTION NEED A GOOD OVERHAUL TO CHANGE THE FUNCTIONALITY
        if ($exists == 'true') {
            $messages = $this->db->where('to', $user_id)
                    ->where('is_read', '0')
                    ->where('rec_type', '0')
                    ->order_by('time', 'asc')
                    ->get('messages');
            $new_messages = $messages->result();
            //   $new_messages = $this->message->unread($user_id);
            $thread = array();
            $senders = array();
            foreach ($new_messages as $message) {
                if (!isset($senders[$message->from])) {
                    $senders[$message->from]['count'] = 1;
                } else {
                    $senders[$message->from]['count'] += 1;
                }
                if ($message->send_type == '1') {
                    $owner = $this->db->get_where("admin", array("admin_id" => $message->from))->result_array();
                    $fname = $owner[0]['ad_first_name'];
                    if (file_exists(FCPATH . 'uploads/admin_image/' . $owner[0]['admin_id'] . '.jpg')) {
                        $avatar = base_url() . 'uploads/admin_image/' . $owner[0]['admin_id'] . '.jpg';
                    } else {
                        $avatar = base_url() . 'uploads/user.jpg';
                    }
                }
                if ($message->send_type == '0') {
                    $owner = $this->db->get_where("student", array("std_id" => $message->from))->result_array();
                    $fname = $owner[0]['std_first_name'];
                    if (file_exists(FCPATH . 'uploads/student_image/' . $owner[0]['std_id'] . '.jpg')) {
                        $avatar = base_url() . 'uploads/student_image/' . $owner[0]['std_id'] . '.jpg';
                    } else {
                        $avatar = base_url() . 'uploads/user.jpg';
                    }
                }
                $smiley_url = 'assets/images/smileys';
                $chat = array(
                    'msg' => $message->id,
                    'sender' => $message->from,
                    'recipient' => $message->to,
                    'avatar' => $avatar,
                    'body' => parse_smileys($message->message, $smiley_url),
                    'time' => date("M j, Y, g:i a", strtotime($message->time)),
                    'type' => $message->from == $user_id ? 'out' : 'in',
                    'name' => $message->from == $user_id ? 'You' : ucwords($fname)
                );
                array_push($thread, $chat);
            }
            $groups = array();
            foreach ($senders as $key => $sender) {
                $sender = array('user' => $key, 'count' => $sender['count']);
                array_push($groups, $sender);
            }
            // END OF THE SECTION THAT NEEDS OVERHAUL DESIGN
            //	$this->last->update_lastSeen($user_id);
            $last_msg = $this->db->where(array('to' => $user_id, 'rec_type' => '0'))->order_by('time', 'desc')->get('messages', 1)->row();
            $msg = !empty($last_msg) ? $last_msg->id : 0;
//echo  $this->session->userdata('std_id');
            $record = $this->db->get_where('last_seen', array('std_id' => $user_id))->row();
            $details = array('message_id' => $msg, 'std_id' => $user_id);
            if (empty($record)) {
                $this->db->insert('last_seen', $details);
            } else {
                $id = $record->id;
                $this->db->update('last_seen', $details, array("id" => $id));
            }
            $response = array(
                'success' => true,
                'messages' => $thread,
                'senders' => $groups
            );
            //add the header here
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    public function mark_read() {
        $id = $this->input->post('id');
        $this->db->where('id', $id)->update('messages', array('is_read' => '1'));
    }

    public function last_seen_update($ids, $msg) {
        $this->db->where('id', $ids)->update('last_seen', array('message_id' => $msg));
    }

    function participate($param1 = '', $param2 = '') {

        if ($param1 == "create") {

            $survey = $this->db->get_where('survey_question', array('question_status' => '1'))->result();
            $count = 1;

            foreach ($survey as $res) {

                // echo $count;
                $question[] = $this->input->post('question_id' . $count);
                $field[] = $this->input->post('Field' . $count);
                $que = implode(",", $question);
                $status = implode(",", $field);
                $count++;
            }

            $data['sq_id'] = $que;
            $data['survey_status'] = $status;

            $data['student_id'] = $this->session->userdata('std_id');
            +
                    $this->db->insert('survey_list', $data);
            $this->session->set_flashdata('flash_message', get_phrase('survey_added_successfully'));
            redirect(base_url() . 'index.php?student/participate', 'refresh');
        }
        $std = $this->session->userdata('std_id');
        //$page_data['survey']= $this->db->get_where('survey',array('student_id'=>$std,'created_date'=>date('Y')))->result();
        $page_data['survey'] = $this->db->get_where('survey_question', array('question_status' => '1'))->result();
        $page_data['page_name'] = 'participate';
        $page_data['page_title'] = 'Survey Application Form';
        $page_data['param'] = $param1;
        $this->load->view('backend/index', $page_data);
    }

    function participate_attend($param = '') {
        if ($param == "create") {
            $p_id = $this->input->post('pp_id');
            $std_id = $this->input->post('std_id');
            $status = $this->input->post('p_status');
            $res = $this->db->get_where('participate_student', array('pp_id' => $p_id, 'student_id' => $std_id))->num_rows();
            if ($res > 0) {
                $this->session->set_flashdata('flash_message', get_phrase('data_already_exists'));
                redirect(base_url() . 'index.php?student/participate_attend/' . $p_id, 'refresh');
            }
            $data['pp_id'] = $this->input->post('pp_id');
            $data['student_id'] = $this->input->post('std_id');
            $data['p_status'] = $this->input->post('p_status');
            $data['comment'] = $this->input->post('comment');
            $this->db->insert("participate_student", $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?student/dashboard', 'refresh');
        }
        $page_data['page_name'] = 'participate_form';
        $page_data['page_title'] = 'Survey Application Form';
        $page_data['param'] = $param;
        $this->load->view('backend/index', $page_data);
    }

    function volunteer($param = '') {
        if ($param == "create") {
            $p_id = $this->input->post('pp_id');
            $std_id = $this->input->post('std_id');
            $status = $this->input->post('p_status');
            $res = $this->db->get_where('participate_student', array('pp_id' => $p_id, 'student_id' => $std_id))->num_rows();
            if ($res > 0) {
                $this->session->set_flashdata('flash_message', get_phrase('data_already_exists'));
                redirect(base_url() . 'index.php?student/participate_attend/' . $p_id, 'refresh');
            }
            $data['pp_id'] = $this->input->post('pp_id');
            $data['student_id'] = $this->input->post('std_id');
            $data['p_status'] = $this->input->post('p_status');
            $data['comment'] = $this->input->post('comment');
            $this->db->insert("participate_student", $data);
            $this->session->set_flashdata('flash_message', get_phrase('participation_successfully'));
            redirect(base_url() . 'index.php?student/dashboard', 'refresh');
        }
        clear_notification('participate_manager', $this->session->userdata('student_id'));
        unset($this->session->userdata('notifications')['participate_manager']);
        $page_data['page_name'] = 'participate_form';
        $page_data['page_title'] = 'Participate Form';
        $this->load->view('backend/index', $page_data);
    }

    function activity() {
        $page_data['participate'] = $this->db->get('participate_manager')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['page_name'] = 'activity';
        $page_data['page_title'] = 'Activity';
        $this->load->view('backend/index', $page_data);
    }

    function get_desc() {
        $pp_id = $this->input->post('pp_id');
        if ($pp_id != "") {
            $res = $this->db->get_where('participate_manager', array('pp_id' => $pp_id))->result_array();
            echo '<label class="col-sm-3 control-label">Description : </label>'
            . '<div class="col-sm-5" >' . $res[0]['pp_desc'] . '</div>';
        }
    }

    function uploads() {
        if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
            $config['upload_path'] = 'uploads/project_file';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            //$this->upload->set_allowed_types('*');
            if (!$this->upload->do_upload('fileupload')) {
                $this->session->set_flashdata('flash_message', get_phrase('please_upload_valid_file'));
                redirect(base_url() . 'index.php?student/uploads/', 'refresh');
            } else {
                $file = $this->upload->data();
                $data['upload_file_name'] = $file['file_name'];
                $file_url = base_url() . 'uploads/project_file/' . $data['upload_file_name'];
                $data['upload_url'] = $file_url;
            }
            $data['std_id'] = $this->session->userdata('std_id');
            $this->db->insert("student_upload", $data);
            $this->session->set_flashdata('flash_message', get_phrase('your file uploaded successful'));
            redirect(base_url() . 'index.php?student/uploads/', 'refresh');
        }
        $page_data['page_name'] = 'upload_data';
        $page_data['page_title'] = 'Upload';
        $this->load->view('backend/index', $page_data);
    }

    /* Chat End */

    /**
     * Student fees records
     */
    function fee_record() {
        $this->load->model('Student/Student_model');
        $page_data['student_detail'] = $this->db->get_where('student', array(
                    'std_id' => $this->session->userdata('login_user_id')
                ))->row();
        $page_data['fees_structure'] = '';
        $page_data['semester'] = $this->Student_model->get_all_semester();
        $page_data['fees_record'] = $this->Student_model->fees_record($this->session->userdata('login_user_id'));
        $page_data['page_name'] = 'fees_record';
        $page_data['page_title'] = 'Student Fees Record';
        $this->load->view('backend/index', $page_data);
    }

    function studyresources() {
        clear_notification('study_resources', $this->session->userdata('student_id'));
        unset($this->session->userdata('notifications')['study_resources']);
        redirect(base_url() . 'index.php?student/dashboard/', 'refresh');
    }

    function digitallibrary() {

        clear_notification('library_manager', $this->session->userdata('student_id'));
        unset($this->session->userdata('notifications')['library_manager']);
        redirect(base_url() . 'index.php?student/dashboard/', 'refresh');
    }

    function check_password() {
        $currentpassword = $this->input->post('currentpassword');
        $data = $this->db->get_where('student', array('std_id' => $this->session->userdata('std_id')))->result();
        if ($data[0]->real_pass == $currentpassword) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    /**
     * Insert / update widget order
     * @param string $student_id
     */
    function save_widget_order($student_id = NULL) {
        if ($student_id == NULL) {
            //insert
            $this->db->insert('widget_order', array(
                'student_id' => $_POST['student'],
                'order_data' => $_POST['widget_data']
            ));
        } else {
            //update
            $this->db->where('student_id', $student_id);
            $this->db->update('widget_order', array(
                'student_id' => $_POST['student'],
                'order_data' => $_POST['widget_data']
            ));
        }
    }

    /**
     * 
     * @param string $student_id
     * @return boolean
     */
    function is_present_widget_order($student_id = '') {
        $this->load->model('Student/Student_model');
        $is_present_widget_order = $this->Student_model->is_present_widget_order($student_id);

        echo $is_present_widget_order;
    }
    
    function gallery()
    {
        $this->db->order_by('gallery_id','DESC');
        $this->db->where('gal_status','1');
        $page_data['gallery'] = $this->db->get('photo_gallery')->result();
        $page_data['page_name'] = 'gallery';
        $page_data['page_title'] = 'Gallery';
        $this->load->view('backend/index', $page_data);
    }
    
    /**
     * Student class routine
     */
    function class_routine() {
        $this->load->view('backend/student/class_routine');
    }
    
    /**
     * Student class routine data
     */
    function class_routine_data() {
        $this->load->model('Student/Student_model');        
        $student = $this->Student_model->student_info($this->session->userdata('login_user_id'));        
        $class_routine = $this->Student_model->student_class_routine($student->std_degree, $student->course_id, 
                $student->std_batch, $student->semester_id, $student->class_id);
        
        echo json_encode($class_routine);
        
    }

       public function assessment()
       {
              if ($this->session->userdata('student_login') != 1)
            redirect(base_url() . 'site/user_login', 'refresh');
            $this->load->model('Student/Student_model');
            $page_data['assessments'] = $this->Student_model->student_assessment();
            $page_data['page_name'] = 'assessment';
            $page_data['page_title'] = 'Assessment';
            $this->load->view('backend/index', $page_data);
       }
}
