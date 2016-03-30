<?php // 

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author 	: Searchnative India
 * 	date		: 28 march, 2016
 *  Smart Learn
 */

class Center_user extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if ($this->session->userdata('centeruser_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
//       $this->chat_user();
        /* cache control */
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    /*     * *default functin, redirects to login page if no admin logged in yet	
      Auth : Brij  Dhami
      /******** */

    public function index() {
        if ($this->session->userdata('centeruser_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('centeruser_login') == 1)
        //$this->chat_user();
            redirect(base_url() . 'index.php?center_user/dashboard', $page_data);
    }

    function dashboard() {
        if ($this->session->userdata('centeruser_login') != 1)
            redirect(base_url(), 'refresh');

        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = 'Center Dashboard';
        $numOfDraws = $this->input->post('name');

        $this->load->view('backend/index', $page_data);
    }

    function exam($param1 = '', $param2 = '') {
        $c_id = $this->session->userdata('center_id');
        $page_data['exam_list'] = $this->db->query("select * from exam_manager where FIND_IN_SET('" . $c_id . "',center_id)")->result();

        $page_data['page_name'] = 'exam';
        $page_data['page_title'] = '';
        $this->load->view('backend/index', $page_data);
    }

    function get_registered_student($param1 = "") {
        $examid = $this->input->post('examid');
        $this->db->select('ec.*,s.*,em.*');
        $this->db->where('ec.exam_id', $examid);
        $this->db->where('ec.center_id', $this->session->userdata('center_id'));
        $this->db->from('student_exam_center ec');
        $this->db->join('student s', 'ec.student_id=s.std_id');
        $this->db->join('exam_manager em', 'ec.exam_id=em.em_id');
        $data['studentlist'] = $this->db->get()->result();
        $data['timetableid'] = $this->input->post('timetabeleid');
        $count=0;
        if ($data['timetableid'] != '') {
            foreach ($data['studentlist'] as $std) {
                $is_present = $this->db->get_where('exam_attendance', array('student_exam_center_id' => $std->student_exam_center_id,
                            'exam_time_table_id' => $data['timetableid']))->result();
                 if (!empty($is_present)) {
               $count++;
            }
            }
            if ($count==0) {
                $data['action'] = "insert";
            } else {
                $data['action'] = "update";
            }
        }
        $data['param'] = $param1;
        $this->load->view('backend/center/ajax_exam_student_list', $data);
    }

    function attendance($param = '') {
        if ($param == 'create') {
            if($this->input->post('presentaction')=='insert')
            {
            $exam_time_table_id = $this->input->post('timetable');

            for ($i = 1; $i <= $this->input->post('stdcount'); $i++) {
                if ($this->input->post('attend' . $i) == '1' ? '1' : '0' == 1) {
                    $ispresent = "present";
                } else {
                    $ispresent = "absent";
                }
                $data = array();
                $data = array('student_exam_center_id' => $this->input->post('student_exam_center' . $i),
                    'exam_time_table_id' => $exam_time_table_id,
                    'created_date' => date('Y-m-d'),
                    'is_present' => $ispresent);
                 $this->db->insert('exam_attendance',$data);
            }
            }
            else
            {
                for ($i = 1; $i <= $this->input->post('stdcount'); $i++) 
                {
                    
                    if ($this->input->post('attend' . $i) == '1' ? '1' : '0' == 1) {
                    $ispresent = "present";
                } else {
                    $ispresent = "absent";
                }
                $data = array();
                $data = array('is_present' => $ispresent);
                print_r($data);
                $this->db->where('exam_attendance_id',$this->input->post('attendanceid'.$i));
                $this->db->update('exam_attendance',$data);
                }
            }
            redirect(base_url() . 'index.php?center_user/attendance_list');
        }
        $c_id = $this->session->userdata('center_id');
        $page_data['exam_list'] = $this->db->query("select * from exam_manager where FIND_IN_SET('" . $c_id . "',center_id)")->result();

        $page_data['page_name'] = 'attendance';
        $page_data['page_title'] = '';
        $this->load->view('backend/index', $page_data);
    }

    function attendance_list() {
        $c_id = $this->session->userdata('center_id');
        $page_data['exam_list'] = $this->db->query("select * from exam_manager where FIND_IN_SET('" . $c_id . "',center_id)")->result();

        $page_data['page_name'] = 'attendance_list';
        $page_data['page_title'] = '';
        $this->load->view('backend/index', $page_data);
    }

    function get_attendance() {
        $timetableid = $this->input->post('timetabeleid');
        $this->db->select('ea.*,s.*,ec.*,et.*,std.name,std.std_roll,em.*');
        $this->db->where('ea.exam_time_table_id', $timetableid);
        $this->db->where('ec.center_id', $this->session->userdata('center_id'));
        $this->db->from('exam_attendance ea');
        $this->db->join('student_exam_center ec', 'ea.student_exam_center_id=ec.student_exam_center_id');
        $this->db->join('exam_time_table et', 'ea.exam_time_table_id=et.exam_time_table_id');
        $this->db->join('subject_manager s', 'et.subject_id=s.sm_id');
        $this->db->join('student std', 'ec.student_id=std.std_id');
        $this->db->join('exam_manager em', 'ec.exam_id=em.em_id');
        $data['studentlist'] = $this->db->get()->result();
         $this->load->view('backend/center/ajax_get_attendance', $data);
    }

    function get_timetable() {
        $examid = $this->input->post('examid');
        $this->db->select('et.*,s.*');
        $this->db->where('et.exam_id', $examid);
        $this->db->from('exam_time_table et');
        $this->db->join('subject_manager s', 'et.subject_id=s.sm_id');
        $data = $this->db->get()->result();

        $option = '<option value="">Select exam</option> ';
        foreach ($data as $d) {
            $option.="<option value='" . $d->exam_time_table_id . "'>" . $d->subject_name . "&nbsp[" . $d->exam_date . "]</option>";
        }
        echo $option;
    }
    function manage_profile($param1 = '', $param2 = '', $param3 = '') {
        
        $page_data['page_name'] = 'manage_profile';
        $page_data['page_title'] = 'Manage Profile';
        $page_data['edit_data'] = $this->db->get_where('center_user', array('center_id' => $this->session->userdata('center_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }
   

}
