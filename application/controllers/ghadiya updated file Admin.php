<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author 	: Searchnative India
 * 	date		: 02 Nov, 2015
 *  Smart School system
 * 	http://searchnative.in
 * 	hello@searchnative.in
 */

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        $this->chat_user();
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
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
        //$this->chat_user();
            redirect(base_url() . 'index.php?admin/dashboard', $page_data, 'refresh');
    }

    function status($str) {
        if ($str) {
            return 1;
        } else {
            return 0;
        }
    }

    /*     * ****MANAGE OWN PROFILE AND CHANGE PASSWORD	
      Auth : Brij  Dhami
      /******** */

    function manage_profile($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'update_profile_info') {
            if (!empty($_POST)) {
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['password'] = md5($this->input->post('password'));
                $data['pass'] = $this->input->post('password');

                $data['ad_first_name'] = $this->input->post('ad_first_name');
                $data['ad_last_name'] = $this->input->post('ad_last_name');
                $data['ad_gender'] = $this->input->post('ad_gender');
                $data['ad_birthdate'] = $this->input->post('ad_birthdate');
                $data['ad_marital'] = $this->input->post('ad_marital');
                $data['ad_branch'] = $this->input->post('ad_branch');
                $data['ad_about'] = $this->input->post('ad_about');
                $data['ad_mobile'] = $this->input->post('ad_mobile');
                $data['ad_fb'] = $this->input->post('ad_fb');
                $data['ad_twitter'] = $this->input->post('ad_twitter');


                //$data['identification_num'] = rand(1111,9999);
            }

            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        $page_data['page_name'] = 'manage_profile';
        $page_data['page_title'] = 'Manage Profile';
        $page_data['edit_data'] = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('admin_id')))->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*     * *ADMIN DASHBOARD
      Auth : Brij  Dhami
      /******** */

    function dashboard() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');


        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = 'Admin Dashboard';
        $numOfDraws = $this->input->post('name');
        // echo $numOfDraws;
        $page_data['calender_json'] = $this->calendar_json();
        $page_data['chat'] = $this->chat_user();

        //$page_data['human_date'] = APPPATH . 'views/backend/admin/event.humanDate.json.php';
        //exit;
        $this->load->view('backend/index', $page_data);
    }

    /*     * **MANAGE COURSES	
      Auth : Brij  Dhami
      /******** */

   function courses($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['c_name'] = $this->input->post('c_name');
            $data['course_alias_id'] = $this->input->post('course_alias_id');
            $data['c_description'] = $this->input->post('c_description');
            $data['course_status'] = $this->status($this->input->post('course_status'));
            $data['degree_id'] = $this->input->post('degree');
            $this->db->insert('course', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/courses/', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['c_name'] = $this->input->post('c_name');
            $data['course_alias_id'] = $this->input->post('course_alias_id');
            $data['c_description'] = $this->input->post('c_description');
            $data['course_status'] = $this->status($this->input->post('course_status'));
              $data['degree_id'] = $this->input->post('degree');
            $this->db->where('course_id', $param2);
            $this->db->update('course', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/courses/', 'refresh');
            
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('course', array(
                        'course_id' => $param2
                    ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('course_id', $param2);
            $this->db->delete('course');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/courses/', 'refresh');
        }
        $page_data['degree'] = $this->db->get('degree')->result_array();
        $page_data['courses'] = $this->db->get('course')->result_array();
        $page_data['page_name'] = 'course';
        $page_data['page_title'] = 'Course Management';
        $this->load->view('backend/index', $page_data);
    }

    /*     * *MANAGE Events
      Auth : Brij  Dhami
      /******** */

    function events($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['event_name'] = $this->input->post('event_name');
            $data['event_desc'] = $this->input->post('event_desc');
            $data['event_date'] = $this->input->post('event_date');

            $this->db->insert('event_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/events/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['event_name'] = $this->input->post('event_name');
            $data['event_desc'] = $this->input->post('event_desc');
            $data['event_date'] = $this->input->post('event_date');
            $this->db->where('event_id', $param2);
            $this->db->update('event_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/events/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('event_manager', array(
                        'event_id' => $param2
                    ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('event_id', $param2);
            $this->db->delete('event_manager');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/events/', 'refresh');
        }
        $page_data['events'] = $this->db->get('event_manager')->result_array();
        $page_data['page_name'] = 'events';
        $page_data['page_title'] = 'Event Management';
        $this->load->view('backend/index', $page_data);
    }

    /*     * *SITE/SYSTEM SETTINGS
      Auth : Brij  Dhami
     * *** */

    function system_settings($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'do_update') {

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type', 'system_name');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('system_title');
            $this->db->where('type', 'system_title');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('address');
            $this->db->where('type', 'address');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('phone');
            $this->db->where('type', 'phone');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('paypal_email');
            $this->db->where('type', 'paypal_email');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('currency');
            $this->db->where('type', 'currency');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('system_email');
            $this->db->where('type', 'system_email');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('system_name');
            $this->db->where('type', 'system_name');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('userfile');
            $this->db->where('type', 'userfile');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('language');
            $this->db->where('type', 'language');
            $this->db->update('system_setting', $data);

            $data['description'] = $this->input->post('text_align');
            $this->db->where('type', 'text_align');
            $this->db->update('system_setting', $data);
            //$path = "uploads/system_image/" . $this->session->userdata('admin_id');
            //unlink($path);
            $as = move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/system_image/' . $this->session->userdata('admin_id') . '.jpg');

            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        if ($param1 == 'change_skin') {
            $data['description'] = $param2;
            $this->db->where('type', 'skin_colour');
            $this->db->update('system_setting', $data);
            $this->session->set_flashdata('flash_message', get_phrase('theme_selected'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        $page_data['page_name'] = 'system_settings';
        $page_data['page_title'] = 'System Settings';
        $page_data['settings'] = $this->db->get('system_setting')->result_array();
        $this->load->view('backend/index', $page_data);
    }

    /*     * *Chat Management 
      Auth : Brij  Dhami
     * *** */

    function chat($me = '', $you = '') {
        $data['me'] = $me;
        $data['you'] = $you;
        $data['page_name'] = 'chatty';
        $this->load->view('backend/index', $data);
    }

    /*     * *CMS Management 
      Auth : Brij  Dhami
     * *** */

    function cms($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            //echo "<pre/>";
            //print_r($this->input->post());
            //die;
            $data['c_title'] = $this->input->post('c_title');
            $data['c_slug'] = $this->input->post('c_slug');
            $data['c_description'] = $this->input->post('c_description');
            $data['c_status'] = $this->status($this->input->post('c_status'));


            $this->db->insert('cms_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/cms/', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['c_title'] = $this->input->post('c_title');
            $data['c_slug'] = $this->input->post('c_slug');
            $data['c_description'] = $this->input->post('edit_content_data');
            $data['c_status'] = $this->status($this->input->post('c_status'));
            $this->db->where('c_id', $param2);
            $this->db->update('cms_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/cms/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('cms_manager', array(
                        'c_id' => $param2
                    ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('c_id', $param2);
            $this->db->delete('cms_manager');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/cms/', 'refresh');
        }
        $page_data['cms'] = $this->db->get('cms_manager')->result_array();
        $page_data['page_name'] = 'cms';
        $page_data['page_title'] = 'CMS Management';
        $this->load->view('backend/index', $page_data);
    }

    /*     * *CMS Management 
      Auth : Brij  Dhami
     * *** */

    function exam_result($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'search') {

            $page_data['student_id'] = $this->input->post('std');
            $page_data['year'] = $this->input->post('year');
            $page_data['batch'] = $this->input->post('batch');
            $page_data['semester'] = $this->input->post('sem');
            $page_data['exam'] = $this->input->post('exam');
            $page_data['std_roll'] = $this->input->post('student_roll');
            $std_year = $this->db->get_where('student', array('std_id' => $page_data['student_id']))->result_array();
            //echo "<pre/>";
            //print_r($std_year);			
            //die;
            $c_batch = @$std_year[0]['std_batch'];
            $c_sem = @$std_year[0]['semester_id'];
            $c_year = date('Y', strtotime(@$std_year[0]['created_date']));
            //echo $c_year;
            if (!empty($page_data['student_id'])) {
                $array = array("student.std_id" => $page_data['student_id'], $c_year => @$page_data['year'], @$c_sem => $page_data['semester'], "exam_manager.em_name" => $page_data['exam']);
            } else {
                $array = array("student.std_id" => $page_data['student_id'], "exam_manager.em_name" => $page_data['exam']);
            }
            $this->db->select('student.std_status as Status,batch.b_name as batch,student.std_id as student_id,student.std_first_name as first_name,student.std_last_name as last_name,exam_manager.em_name as Exam_name');
            $this->db->from('student');
            $this->db->join('batch', 'batch.b_id = student.std_batch');
            $this->db->join('exam_manager', 'exam_manager.em_semester = student.semester_id');
            $this->db->where($array);
            $this->db->or_where('student.std_roll', $page_data['std_roll']);
            $queryaaa = $this->db->get();

            //echo $this->db->last_query();
            //die;						

            $page_data['s_id'] = $queryaaa->result_array();
            //echo count($page_data['s_id']);
            //echo "<pre/>";
            //print_r($page_data['s_id123']);
            //die;
            //$page_data['page_name']  = 'result';
            //$page_data['page_title'] = 'Result Management';
            //$this->load->view('backend/index', $page_data);
            //redirect(base_url() . 'index.php?admin/exam_result/', 'refresh');          
        }
        //$page_data['degree']    = $this->db->get('degree')->result_array();
        //$page_data['year']    = $this->db->get('exam_manager')->result_array();
        $page_data['page_name'] = 'result';
        $page_data['page_title'] = 'Result Management';
        $this->load->view('backend/index', $page_data);
    }

    function get_batch($d_id) {
        $batch = $this->db->get_where('batch', array('degree_id' => $d_id))->result_array();
        echo '<option value="">Select Batch</option>';
        foreach ($batch as $row) {
            echo '<option value="' . $row['b_id'] . '">' . $row['b_name'] . '</option>';
        }
    }

    function get_sem($s_id) {
        $sem = $this->db->get_where('semester', array('batch_id' => $s_id))->result_array();
        echo '<option value="">Select Semester</option>';
        foreach ($sem as $srow) {
            echo '<option value="' . $srow['s_id'] . '">' . $srow['s_name'] . '</option>';
        }
    }

    function get_exam($s_id) {
        //echo $s_id;
        $ex = $this->db->get_where('exam_manager', array('em_semester' => $s_id))->result_array();
        echo '<option value="">Select Exam</option>';
        foreach ($ex as $erow) {
            echo '<option value="' . $erow['em_name'] . '">' . $erow['em_name'] . '</option>';
        }
    }

    function get_student($std_id) {
        $sem = $this->db->get_where('student', array('semester_id' => $std_id))->result_array();
        echo '<option value="">Select Student</option>';
        foreach ($sem as $strow) {
            echo '<option value="' . $strow['std_id'] . '">' . $strow['name'] . '</option>';
        }
    }

    function calendar_json() {
        $this->load->helper('file');
        $this->db->select('event_date AS date, event_name AS title, event_desc AS description');
        $this->db->from('event_manager');
        $query = $this->db->get();
        $file = FCPATH . 'event.humanDate.json.php';
        $result = json_encode($query->result());
        write_file($file, $result);
    }

    function chat_user() {
        $this->load->helper('file');
        $file = FCPATH . 'admin_chat.php';
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

    //Starting Herry Patel

    /*     * **GROUP MANAGEMENT**** */
    /*     * **Develop By Hardik Bhut 29-Feb-2016**** */
    function create_group($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['group_name'] = $this->input->post('group_name');
            $data['user_type'] = $this->input->post('user_type');
            $data['user_role'] = implode(',', $this->input->post('user_role'));
            //print_r($data); die;
            $check_already_exist_name = $this->db->get_where('group', array('group_name' => $this->input->post('group_name')))->row();
            if (count($check_already_exist_name) > 0) {
                $this->session->set_flashdata('flash_message', get_phrase('group_name_already_exist.'));
            } else {
                $this->db->insert('group', $data);
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            }
            redirect(base_url() . 'index.php?admin/create_group', 'refresh');
        }
        $page_data['user_role'] = $param1;
        $page_data['groups'] = $this->db->get('group')->result_array();
        $page_data['groups'] = $this->db->get_where('group', array('user_role' => $param1))->result_array();
        $page_data['page_name'] = 'create_group';
        $page_data['page_title'] = get_phrase('Create Group');
        $this->load->view('backend/index', $page_data);
    }

    function list_group($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'do_update') {
            $data['user_role'] = implode(',', $this->input->post('user_role'));
            $this->db->where('g_id', $this->input->post('group_name'));
            $this->db->update('group', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/list_group', 'refresh');
        }
        if ($param1 == 'delete') {

            $this->input->post('group_name_delete');
            $this->db->where('group_id', $this->input->post('group_name_delete'));
            $this->db->delete('group');
            $this->db->where('group_id', $this->input->post('group_name_delete'));
            $this->db->delete('assign_module');

            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/list_group', 'refresh');
        }
        $page_data['user_role'] = $param1;
        $page_data['group_list'] = $this->db->get_where('group')->result_array();
        $page_data['groups'] = $this->db->get_where('group', array('user_role' => $param1))->result_array();
        $page_data['page_name'] = 'list_group';
        $page_data['page_title'] = get_phrase('List Group');
        $this->load->view('backend/index', $page_data);
    }

    /*     * **Develop By Hardik Bhut 29-Feb-2016**** */

    function get_user($user_id) {
        //For Student
        if ($user_id == '1') {
            $sections = $this->db->get_where('student', array('user_type' => $user_id))->result_array();
            foreach ($sections as $row) {
                echo '<option value="' . $row['std_id'] . '">' . $row['name'] . '</option>';
            }
        }
    }

    /*     * **Develop By Hardik Bhut 14-december-2015**** */

    function get_group_ajax($group_id) {
        $get_group_list = $this->db->get_where('group', array('g_id' => $group_id))->result_array();
        foreach ($get_group_list as $row_key => $row_value) {
            $user_role = explode(',', $row_value['user_role']);
            $user_type[] = $row_value['user_type'];
            if ($row_value['user_type'] == 1) {
                $user_type[] = '<option value="1">Student</option>';
                $sections = $this->db->get_where('student', array('user_type' => $row_value['user_type']))->result_array();
                foreach ($sections as $row) {
                    if (!in_array($row['std_id'], $user_role)) {
                        $full_user_list[] = '<option value="' . $row['std_id'] . '">' . $row['name'] . '</option>';
                    }
                }
            }
            foreach ($user_role as $user_role_value) {
                if ($row_value['user_type'] == '1') {

                    $user_role_student_query = $this->db->get_where('student', array('std_id' => $user_role_value))->result_array();
                    foreach ($user_role_student_query as $user_role_student_row) {
                        $group[] = '<option value="' . $user_role_student_row['std_id'] . '">' . $user_role_student_row['name'] . '</option>';
                    }
                }
            }
            $out = array('group' => $group, 'user_type' => $user_type, 'full_user_list' => $full_user_list);
            echo json_encode($out);
        }
    }

    /*     * ** Develop By Hardik Bhut 15-december-2015 **** */

    function assign_module($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['group_id'] = $this->input->post('group_name');
            $data['module_id'] = implode(',', $this->input->post('module_name'));
            //print_r($data); die;
            $this->db->where(array('group_id' => $this->input->post('group_name')));
            $module_row = $this->db->get('assign_module')->row();
            $this->db->where(array('group_id' => $this->input->post('group_name')));
            $group_count = $this->db->count_all_results('assign_module');

            if ($group_count > 0) {
                $this->db->where('assign_module_id', $module_row->assign_module_id);
                $this->db->update('assign_module', $data);
            } else {
                $this->db->insert('assign_module', $data);
            }
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/assign_module', 'refresh');
        }
        $page_data['page_name'] = 'assign_module';
        $page_data['page_title'] = get_phrase('Assign Module');
        $this->load->view('backend/index', $page_data);
    }

    function list_module($param1 = '', $param2 = '', $param3 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'do_update') {
            $data['group_id'] = $this->input->post('group_name');
            $data['module_id'] = implode(',', $this->input->post('module_name'));
            $this->db->where('group_id', $data['group_id']);
            $this->db->update('assign_module', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'index.php?admin/list_module', 'refresh');
        }
        $page_data['page_name'] = 'list_module';
        $page_data['page_title'] = 'List Module';
        $this->load->view('backend/index', $page_data);
    }

    /*     * ** Develop By Hardik Bhut 15-december-2015 **** */

    function get_module_ajax($group_id) {
        $get_assign_module_list = $this->db->get_where('assign_module', array('group_id' => $group_id))->result_array();

        foreach ($get_assign_module_list as $row_key => $row_value) {
            $module_record = explode(',', $row_value['module_id']);
            $modules_query = $this->db->get('modules')->result_array();
            foreach ($modules_query as $modules_row) {
                if (!in_array($modules_row['module_id'], $module_record)) {
                    $full_module_list[] = '<option value="' . $modules_row['module_id'] . '">' . $modules_row['module_name'] . '</option>';
                }
            }
            foreach ($module_record as $module_record_value) {
                $user_role_query = $this->db->get_where('modules', array('module_id' => $module_record_value))->result_array();
                foreach ($user_role_query as $user_role_row) {
                    $assigned_module_list[] = '<option value="' . $user_role_row['module_id'] . '">' . $user_role_row['module_name'] . '</option>';
                }
            }
        }
        $out = array('assigned_module_list' => $assigned_module_list, 'full_module_list' => $full_module_list);
        echo json_encode($out);
    }

    // End Herry Patel
    //created by nikita 
     function batch($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['b_name'] = $this->input->post('b_name');
            $data['degree_id'] = implode(',',$this->input->post('degree'));
            $data['course_id'] =implode(',',$this->input->post('course'));
            $data['b_status'] = $this->status($this->input->post('batch_status'));
            $data['created_date'] = date('Y-m-d');          
            $this->db->insert('batch', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/batch/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['b_name'] = $this->input->post('b_name');            
           $data['degree_id'] = implode(',',$this->input->post('degree1'));
            $data['course_id'] =implode(',',$this->input->post('course1'));
            $data['b_status'] = $this->status($this->input->post('batch_status'));
            $this->db->where('b_id', $param2);
            $this->db->update('batch', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/batch/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('b_id', $param2);
            $this->db->delete('batch');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/batch/', 'refresh');
        }
        $page_data['batches'] = $this->db->get('batch')->result_array();
         $page_data['degree'] = $this->db->get_where('degree',array('d_status'=>1))->result_array();
        $page_data['page_name'] = 'batch';
        $page_data['page_title'] = 'Batch Management';
        $this->load->view('backend/index', $page_data);
    }

    function degree($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['d_name'] = $this->input->post('d_name');
            $data['d_status'] = $this->status($this->input->post('degree_status'));
            $data['created_date'] = date('Y-m-d');

            $this->db->insert('degree', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/degree/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['d_name'] = $this->input->post('d_name');
            $data['d_status'] = $this->status($this->input->post('degree_status'));
            $this->db->where('d_id', $param2);
            $this->db->update('degree', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/degree/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('d_id', $param2);
            $this->db->delete('degree');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/degree/', 'refresh');
        }
        $page_data['degrees'] = $this->db->get('degree')->result_array();
        $page_data['page_name'] = 'degree';
        $page_data['page_title'] = 'Degree Management';
        $this->load->view('backend/index', $page_data);
    }

    function semester($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['s_name'] = $this->input->post('s_name');
            $data['s_status'] = $this->status($this->input->post('semester_status'));
            $data['created_date'] = date('Y-m-d');

            $this->db->insert('semester', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/semester/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['s_name'] = $this->input->post('s_name');
            $data['s_status'] = $this->status($this->input->post('semester_status'));

            $this->db->where('s_id', $param2);
            $this->db->update('semester', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/semester/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('s_id', $param2);
            $this->db->delete('semester');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/semester/', 'refresh');
        }
        $page_data['semesters'] = $this->db->get('semester')->result_array();
        $page_data['page_name'] = 'semesterlist';
        $page_data['page_title'] = 'Semester Management';
        $this->load->view('backend/index', $page_data);
    }

    function admission_type($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            $data['at_name'] = $this->input->post('at_name');
            $data['at_status'] = $this->status($this->input->post('at_status'));
            $data['created_date'] = date('Y-m-d');

            $this->db->insert('admission_type', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/admission_type/', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['at_name'] = $this->input->post('at_name');
            $data['at_status'] = $this->status($this->input->post('at_status'));
            $this->db->where('at_id', $param2);
            $this->db->update('admission_type', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/admission_type/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('at_id', $param2);
            $this->db->delete('admission_type');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/admission_type/', 'refresh');
        }
        $page_data['admission_type'] = $this->db->get('admission_type')->result_array();
        $page_data['page_name'] = 'admission_type';
        $page_data['page_title'] = 'Admission Type Management';
        $this->load->view('backend/index', $page_data);
    }

    function student($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {

            if ($_FILES['profilefile']['name']!='') {
	
		  $config['upload_path'] = 'uploads/student_image';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('profilefile')) {
                      $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/student/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['profile_photo'] = $file['file_name'];
  		//$file_url = base_url().'uploads/project_file/'.$data['lm_filename'];
                }

		/*
                $ext_img = explode(".",$_FILES['profilefile']['name']);
             $ext = strtolower(end($ext_img));
            
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $ext_arr = explode("|",$config['allowed_types']);
                
                if(in_array($ext, $ext_arr))
                {
$config['file_name'] = date('dmYhis').'.'.$ext;
                 $config['upload_path'] = 'uploads/student_image';
                //$config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $data['profile_photo'] = $config['file_name'];
                 $this->upload->do_upload('profilefile');

                
                }
                else{
                    
                       //$data = array('msg' => $this->upload->display_errors());
                     $this->session->set_flashdata("flash_message",'Invalid Image!');
                     redirect(base_url() . 'index.php?admin/student/', 'refresh');
                
                }
*/
                
                
             
            }
            else{
                
                 $data['profile_photo'] = '';
            }
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
 $data['std_degree'] =  $this->input->post('degree');
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
            redirect(base_url() . 'index.php?admin/student/', 'refresh');
        }
        if ($param1 == 'do_update') {
             if ($_FILES['profilefile']['name'] != "") {

                  
                   
                   
                    $ext_img = explode(".",$_FILES['profilefile']['name']);
             $ext = strtolower(end($ext_img));
            
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $ext_arr = explode("|",$config['allowed_types']);
                
                if(in_array($ext, $ext_arr))
                {
 			if(file_exists("uploads/student_image/" . $this->input->post('txtoldfile')))
                   {
                    unlink("uploads/student_image/" . $this->input->post('txtoldfile'));
                   }
		$config['file_name'] = date('dmYhis').'.'.$ext;
                 $config['upload_path'] = 'uploads/student_image';
                //$config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                 $this->upload->do_upload('profilefile');

                   
                 $file = $this->upload->data();
                 $data['profile_photo'] = $file['file_name'];  
                   
                }
                else{
                      $this->session->set_flashdata("flash_message",'Update failed. Invalid Image!');
                     redirect(base_url() . 'index.php?admin/student/', 'refresh');
                }
                
                

            }
            $data['email'] = $this->input->post('email_id');
            $data['name'] = $this->input->post('name');
            $data['std_first_name'] = $this->input->post('f_name');
            $data['std_last_name'] = $this->input->post('l_name');
            $data['std_gender'] = $this->input->post('gen');
            $data['std_birthdate'] = $this->input->post('birthdate1');
            $data['std_marital'] = $this->input->post('maritalstatus');
            $data['std_batch'] = $this->input->post('batch');
            $data['semester_id'] = $this->input->post('semester');
            $data['course_id'] = $this->input->post('course');
            $data['std_about'] = $this->input->post('std_about');
            $data['std_mobile'] = $this->input->post('mobileno');
            $data['address'] = $this->input->post('address');
            $data['city'] = $this->input->post('city');
            $data['zip'] = $this->input->post('zip');
            $data['std_fb'] = $this->input->post('facebook');
            $data['std_twitter'] = $this->input->post('twitter');
            $data['group_id'] = $this->input->post('group');
            $data['user_type'] = $this->input->post('usertype');
            $data['admission_type_id'] = $this->input->post('admissiontype');
 $data['std_degree'] =  $this->input->post('degree');

            $this->db->where('std_id', $param2);
            $this->db->update('student', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/student/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('std_id', $param2);
            $this->db->delete('student');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/student/', 'refresh');
        }
        $page_data['student'] = $this->db->get('student')->result();
        $page_data['page_name'] = 'student';
        $page_data['page_title'] = 'Student Management';
        $this->load->view('backend/index', $page_data);
    }

    function project($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            if ($_FILES['projectfile']['name'] != "") {
              
                
                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('projectfile')) {
                    $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/project/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['pm_filename'] = $file['file_name'];
 $file_url = base_url().'uploads/project_file/'.$data['pm_filename'];
                }
                 
              
            }
            else{
                
                $file_url = '';
            }
            $data['pm_degree'] = $this->input->post('degree');
            $data['pm_title'] = $this->input->post('title');
            $data['pm_batch'] = $this->input->post('batch');
            $data['pm_url'] = $file_url;
            $data['pm_semester'] = $this->input->post('semester');
            $data['pm_desc'] = $this->input->post('description');
            $data['pm_dos'] = $this->input->post('dateofsubmission');
            $data['pm_status'] = 1;
            $data['pm_student_id'] = $this->input->post('student');
$data['pm_course'] = $this->input->post('course');
            $data['created_date'] = date('Y-m-d');


            $this->db->insert('project_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/project/', 'refresh');
        }
        if ($param1 == 'do_update') {
           /* if ($_FILES['projectfile']['name'] != "") {

                unlink("uploads/project_file/" . $this->input->post('txtoldfile'));

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('projectfile')) {
                    $data = array('msg' => $this->upload->display_errors());
                } else {
                    $file = $this->upload->data();
                    $data['pm_filename'] = $file['file_name'];
                }
            }*/


 if ($_FILES['projectfile']['name'] != "") {

 $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('projectfile')) {
                    $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/project/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['pm_filename'] = $file['file_name'];
 $file_url = base_url().'uploads/project_file/'.$data['pm_filename'];
                }
                 
                 
               
            }
            else{
                
                $file_url = $this->input->post('pageurl');
            }

            $data['pm_degree'] = $this->input->post('degree');
            $data['pm_title'] = $this->input->post('title');
            $data['pm_batch'] = $this->input->post('batch');
            $data['pm_url'] = $file_url;
            $data['pm_semester'] = $this->input->post('semester');
            $data['pm_desc'] = $this->input->post('description');
            $data['pm_dos'] = $this->input->post('dateofsubmission1');
            $data['pm_status'] = 1;
            $data['pm_student_id'] = $this->input->post('student');
$data['pm_course'] = $this->input->post('course');

            $this->db->where('pm_id', $param2);
            $this->db->update('project_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));

            redirect(base_url() . 'index.php?admin/project/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('pm_id', $param2);
            $this->db->delete('project_manager');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/project/', 'refresh');
        }
        $page_data['project'] = $this->db->get('project_manager')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['student'] = $this->db->get('student')->result();
        $page_data['page_name'] = 'project';
        $page_data['page_title'] = 'Project Management';
        $this->load->view('backend/index', $page_data);
    }

    function library($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {


		 if ($_FILES['libraryfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('libraryfile')) {
                    $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/library/', 'refresh');
                    
                } else {
                    $file = $this->upload->data();
                   
 			$data['lm_filename'] = $file['file_name'];
                     $file_url = base_url().'uploads/project_file/'.$data['lm_filename'];
                }
            }else{
                
                $file_url = '';
            }

            $data['lm_degree'] = $this->input->post('degree');
            $data['lm_title'] = $this->input->post('title');
            $data['lm_batch'] = $this->input->post('batch');
            $data['lm_url'] = $file_url;
            $data['lm_semester'] = $this->input->post('semester');
            $data['lm_desc'] = $this->input->post('description');
            $data['lm_dos'] = $this->input->post('dateofsubmission');
            $data['lm_status'] = 1;
            $data['lm_student_id'] = $this->input->post('student');
 		$data['lm_course'] =  $this->input->post('course');
            $data['created_date'] = date('Y-m-d');


            $this->db->insert('library_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/library/', 'refresh');
        }
        if ($param1 == 'do_update') {
            /*if ($_FILES['libraryfile']['name'] != "") {

                unlink("uploads/project_file/" . $this->input->post('txtoldfile'));

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('libraryfile')) {
                    $data = array('msg' => $this->upload->display_errors());
                } else {
                    $file = $this->upload->data();
                    $data['lm_filename'] = $file['file_name'];
                }
            }*/
		
 if ($_FILES['libraryfile']['name'] != "") {
                if(file_exists("uploads/project_file/" . $this->input->post('txtoldfile')))
                {
                unlink("uploads/project_file/" . $this->input->post('txtoldfile'));
                }

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('libraryfile')) {
                      $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/library/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['lm_filename'] = $file['file_name'];
  		$file_url = base_url().'uploads/project_file/'.$data['lm_filename'];
                }
               
            }
            else{
                
                $file_url = $this->input->post('pageurl');
            }


            $data['lm_degree'] = $this->input->post('degree');
            $data['lm_title'] = $this->input->post('title');
            $data['lm_batch'] = $this->input->post('batch');
            $data['lm_url'] = $file_url;
            $data['lm_semester'] = $this->input->post('semester');
            $data['lm_desc'] = $this->input->post('description');
            $data['lm_dos'] = $this->input->post('dateofsubmission1');
            $data['lm_status'] = 1;
            $data['lm_student_id'] = $this->input->post('student');
	 	$data['lm_course'] =  $this->input->post('course');

            $this->db->where('lm_id', $param2);
            $this->db->update('library_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));

            redirect(base_url() . 'index.php?admin/library/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('lm_id', $param2);
            $this->db->delete('library_manager');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/library/', 'refresh');
        }
        $page_data['library'] = $this->db->get('library_manager')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['student'] = $this->db->get('student')->result();
        $page_data['page_name'] = 'library';
        $page_data['page_title'] = 'Library Management';
        $this->load->view('backend/index', $page_data);
    }

    function participate($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
           if ($_FILES['participatefile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('participatefile')) {
                    $dataerror = array('msg' => $this->upload->display_errors());
 			redirect(base_url() . 'index.php?admin/participate/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['pp_filename'] = $file['file_name'];
 $file_url = base_url().'uploads/project_file/'.$data['pp_filename'];
                }
            }
            else{

                
                $file_url = '';
            }		

               

            $data['pp_degree'] = $this->input->post('degree');
            $data['pp_title'] = $this->input->post('title');
            $data['pp_batch'] = $this->input->post('batch');
            $data['pp_url'] = $file_url;
            $data['pp_semester'] = $this->input->post('semester');
            $data['pp_desc'] = $this->input->post('description');
            $data['pp_dos'] = $this->input->post('dateofsubmission');
            $data['pp_status'] = 1;
            $data['pp_student_id'] = $this->input->post('student');
$data['pp_course'] = $this->input->post('course');
            $data['created_date'] = date('Y-m-d');


            $this->db->insert('participate_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/participate/', 'refresh');
        }
        if ($param1 == 'do_update') {
             if ($_FILES['participatefile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('participatefile')) {
                    $dataerror = array('msg' => $this->upload->display_errors());
 			redirect(base_url() . 'index.php?admin/participate/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['pp_filename'] = $file['file_name'];
 $file_url = base_url().'uploads/project_file/'.$data['pp_filename'];
                }
            }
            else{
                
                $file_url = $this->input->post('pageurl');
            }
            $data['pp_degree'] = $this->input->post('degree');
            $data['pp_title'] = $this->input->post('title');
            $data['pp_batch'] = $this->input->post('batch');
            $data['pp_url'] = $file_url;
            $data['pp_semester'] = $this->input->post('semester');
            $data['pp_desc'] = $this->input->post('description');
            $data['pp_dos'] = $this->input->post('dateofsubmission1');
$data['pp_course'] = $this->input->post('course');
            $data['pp_status'] = 1;

            $data['pp_student_id'] = $this->input->post('student');

            $this->db->where('pp_id', $param2);
            $this->db->update('participate_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));

            redirect(base_url() . 'index.php?admin/participate/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('pp_id', $param2);
            $this->db->delete('participate_manager');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/participate/', 'refresh');
        }
        $page_data['participate'] = $this->db->get('participate_manager')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['student'] = $this->db->get('student')->result();
        $page_data['page_name'] = 'participate';
        $page_data['page_title'] = 'Participate Management';
        $this->load->view('backend/index', $page_data);
    }

    function subject($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['sm_course_id'] = $this->input->post('course');
            $data['sm_sem_id'] = $this->input->post('semester');
            $data['subject_name'] = $this->input->post('subname');
            $data['subject_code'] = $this->input->post('subcode');
            $data['sm_status'] = 1;
            $data['created_date'] = date('Y-m-d');


            $this->db->insert('subject_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/subject/', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['sm_course_id'] = $this->input->post('course');
            $data['sm_sem_id'] = $this->input->post('semester');
            $data['subject_name'] = $this->input->post('subname');
            $data['subject_code'] = $this->input->post('subcode');
            $data['sm_status'] = 1;


            $this->db->where('sm_id', $param2);
            $this->db->update('subject_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/subject/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('sm_id', $param2);
            $this->db->delete('subject_manager');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/participate/', 'refresh');
        }
        $page_data['subject'] = $this->db->get('subject_manager')->result();
        $page_data['course'] = $this->db->get('course')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['page_name'] = 'subject';
        $page_data['page_title'] = 'Subject Management';
        $this->load->view('backend/index', $page_data);
    }

    function assignment($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {
		 if ($_FILES['assignmentfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('assignmentfile')) {
                     $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/assignment/', 'refresh');
                    
                } else {
                    $file = $this->upload->data();
                   
 			$data['assign_filename'] = $file['file_name'];
                     $file_url = base_url().'uploads/project_file/'.$data['assign_filename'];
                }
            }
            else{
                 $data['assign_filename'] = '';
                 $file_url = '';
            }
            

            $data['course_id'] = $this->input->post('course');
            $data['assign_title'] = $this->input->post('title');
            $data['assign_batch'] = $this->input->post('batch');
            $data['assign_url'] = $file_url;
            $data['assign_sem'] = $this->input->post('semester');
            $data['assign_desc'] = $this->input->post('description');
            $data['assign_dos'] = $this->input->post('submissiondate');
            $data['assign_status'] = 1;
            $data['created_date'] = date('Y-m-d');
 $data['assign_degree'] = $this->input->post('degree');

            $this->db->insert('assignment_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/assignment/', 'refresh');
        }
        if ($param1 == 'do_update') {
           /* if ($_FILES['assign_filename']['name'] != "") {

               

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('assign_filename')) {
                    $data = array('msg' => $this->upload->display_errors());
                } else {
                    $file = $this->upload->data();
                    $data['assign_filename'] = $file['file_name'];
                }
$file_url ='';
            }*/

		 if ($_FILES['assignmentfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('assignmentfile')) {
                     $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/assignment/', 'refresh');
                    
                } else {
                    $file = $this->upload->data();
                   
 			$data['assign_filename'] = $file['file_name'];
                     $file_url = base_url().'uploads/project_file/'.$data['assign_filename'];
                }
            }
            else{
                
                $file_url = $this->input->post('assignmenturl');
            }


            $data['course_id'] = $this->input->post('course');
            $data['assign_title'] = $this->input->post('title');
            $data['assign_batch'] = $this->input->post('batch');
            $data['assign_url'] = $file_url;
            $data['assign_sem'] = $this->input->post('semester');
            $data['assign_desc'] = $this->input->post('description');
            $data['assign_dos'] = $this->input->post('submissiondate1');
 $data['assign_degree'] = $this->input->post('degree');
            $data['assign_status'] = 1;

            $this->db->where('assign_id', $param2);
            $this->db->update('assignment_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
            redirect(base_url() . 'index.php?admin/assignment/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('sm_id', $param2);
            $this->db->delete('subject_manager');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/assignment/', 'refresh');
        }
        $page_data['assignment'] = $this->db->get('assignment_manager')->result();
        $page_data['course'] = $this->db->get('course')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['page_name'] = 'assignment';
        $page_data['page_title'] = 'Assignment Management';
        $this->load->view('backend/index', $page_data);
    }

    function studyresource($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
           if ($_FILES['resourcefile']['name'] != "") {
               
 		$config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('resourcefile')) {
                    $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/studyresource/', 'refresh');
                    
                } else {
                    $file = $this->upload->data();
                    $data['study_filename'] = $file['file_name'];
                     $file_url = base_url().'uploads/project_file/'.$data['study_filename'];
                } 
               
            }
            else{
                
                $file_url = '';
            }
            $data['study_degree'] = $this->input->post('degree');
            $data['study_title'] = $this->input->post('title');
            $data['study_batch'] = $this->input->post('batch');
            $data['study_url'] = $file_url;
            $data['study_sem'] = $this->input->post('semester');
            $data['study_desc'] = $this->input->post('description');
            $data['study_dos'] = $this->input->post('dateofsubmission');
$data['study_course'] = $this->input->post('course');
            $data['study_status'] = 1;
            $data['created_date'] = date('Y-m-d');

            $this->db->insert('study_resources', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(base_url() . 'index.php?admin/studyresource/', 'refresh');
        }
        if ($param1 == 'do_update') {
             if ($_FILES['resourcefile']['name'] != "") {
                  

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('resourcefile')) {
                    $this->session->set_flashdata('flash_message',  "Invalid File!");
                        redirect(base_url() . 'index.php?admin/studyresource/', 'refresh');
                    
                } else {
                    $file = $this->upload->data();
                    $data['study_filename'] = $file['file_name'];
                     $file_url = base_url().'uploads/project_file/'.$data['study_filename'];
                } 
               

                
            }
            else{
                $file_url = $this->input->post('pageurl');
            }
            $data['study_degree'] = $this->input->post('degree');
            $data['study_title'] = $this->input->post('title');
            $data['study_batch'] = $this->input->post('batch');
            $data['study_url'] =$file_url;
            $data['study_sem'] = $this->input->post('semester');
            $data['study_desc'] = $this->input->post('description');
            $data['study_dos'] = $this->input->post('dateofsubmission1');
$data['study_course'] = $this->input->post('course');
            $data['study_status'] = 1;

            $this->db->where('study_id', $param2);
            $this->db->update('study_resources', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated'));

            redirect(base_url() . 'index.php?admin/studyresource/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('study_id', $param2);
            $this->db->delete('study_resources');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(base_url() . 'index.php?admin/studyresource/', 'refresh');
        }
        $page_data['studyresource'] = $this->db->get('study_resources')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['page_name'] = 'studyresource';
        $page_data['page_title'] = 'Study Resource Management';
        $this->load->view('backend/index', $page_data);
    }

    /// MAYUR GHADIYA ///
    /**
     * Email inbox view
     * 
     * @return response
     */
    function email() {
//set the page title
        $data['title'] = 'Email';
//set the sub view
        $data['content'] = 'backend/admin/email_inbox';
//load email template
        $this->load->view('backend/admin/includes/email_template', $data);
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
     * Email compose
     * 
     * @return response
     */
    function email_compose() {
        ini_set('max_execution_time', 500);
        //load the Crud model
        $this->load->model('admin/Crud_model');
        $this->load->helper('system_email');
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

            if ($_POST['course'] == 'all') {
                // send to all students 
                send_to_all_course($_POST);
            } else if ($_POST['semester'] == 'all') {
                //send to all semester of the course
                send_to_course_all_semester($_POST, $_POST['course']);
            } else if ($_POST['student'] == 'all') {
                //send to all students of the course and semeter
                send_to_all_student_course_semester($_POST, $_POST['course'], $_POST['semester']);
            } else {
                //send particular student
				send_to_single_student($_POST);
            }

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

            //send email
            //var_dump($teacher_list);
            //exit;
            $this->setemail($teacher_list, $_POST['subject'], $_POST['message'], $email_cc_list, $attachments);

            redirect(base_url('index.php?admin/email_inbox'));
        }

        $data['course'] = $this->Crud_model->get_all_course();
        $data['semester'] = $this->Crud_model->get_all_semester();
        $data['teacher'] = $this->Crud_model->get_all_teacher();
        //set the template and view
        $data['title'] = 'Compose Email';
        $data['content'] = 'backend/admin/email_compose';
        $this->load->view('backend/admin/includes/email_template', $data);
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
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
        //$this->load->library('email');
		//$this->email->initialize($config);
        $subject = $subject;
        $message = $message;
        foreach ($emails as $email) {
            $this->email->clear(TRUE);
            $this->sendEmail($email, $subject, $message, $cc, $attachment);
        }
    }

    /**
     * Send emails
     * @param type $email
     * @param type $subject
     * @param type $message
     * @param type $cc
     * @param type $attachments
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
        $this->load->helper('system_email');
        $data['sent_mail'] = admin_sent_email(); //admin
        $data['title'] = 'Sent Email';
        $data['content'] = 'backend/admin/email_sent';
        $this->load->view('backend/admin/includes/email_template', $data);
    }

    /**
     * Email inbox
     */
    function email_inbox() {
        $this->load->model('admin/Crud_model');
        $this->load->helper('system_email');

        $data['inbox'] = admin_inbox();
        $data['title'] = 'Inbox';
        $data['content'] = 'backend/admin/email_inbox';
        $this->load->view('backend/admin/includes/email_template', $data);
    }

    /**
     * Admin inbox email view
     * @param int $id
     */
    function inbox_email($id) {
        $this->load->model('admin/Crud_model');
        $this->load->helper('system_email');

        $data['email'] = admin_inbox_email_view($id);
        $data['title'] = $data['email']->subject;
        $data['content'] = 'backend/admin/email_inbox_view';
        $this->load->view('backend/admin/includes/email_template', $data);
    }

    /**
     * Email reply from admin
     * @param int $id
     */
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
            }
            $filename = rtrim($filename, ',');
            $_POST['file_name'] = $filename;

            admin_email_reply($_POST);

            redirect(base_url('index.php?admin/email_inbox'));
        }

        $data['email'] = admin_inbox_email_view($id);
        $data['title'] = $data['email']->subject;
        $data['content'] = 'backend/admin/email_reply';
        $this->load->view('backend/admin/includes/email_template', $data);
    }

    /**
     * View particular email details
     * @param int $id
     */
    function email_view($id) {
        $this->load->model('admin/Crud_model');
        $this->load->helper('system_email');
        $data['email'] = view_email($id);
        $data['title'] = $data['email']->subject;
        $data['content'] = 'backend/admin/email_view';
        $this->load->view('backend/admin/includes/email_template', $data);
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

    /**
     * My draft emails
     */
    function email_draft() {
        $this->load->model('admin/Crud_model');
        //$email = $this->session->userdata('email');
        $data['draft'] = $this->Crud_model->my_drafts($this->session->userdata('email'));
        $data['title'] = 'Drafts';
        $data['content'] = 'backend/admin/email_draft';
        $this->load->view('backend/admin/includes/email_template', $data);
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
        $data['content'] = 'backend/admin/email_draft_view';
        $this->load->view('backend/admin/includes/email_template', $data);
    }

    //// Exam ////
    function exam($param1 = '', $param2 = '') {
        $this->load->model('admin/Crud_model');
        if ($param1 == 'delete') {
            //delete
            $this->db->where('em_id', $param2);
            $this->db->delete('exam_manager');
            redirect(base_url('index.php?admin/exam'));
        }
        if ($_POST) {
            if ($param1 == 'create') {
                // check for validation
                if ($this->form_validation->run('exam_insert_update') != FALSE) {
                    $data = array(
                        'em_name' => $this->input->post('exam_name', TRUE),
                        'em_type' => $this->input->post('exam_type', TRUE),
                        'total_marks' => $this->input->post('total_marks', TRUE),
						'passing_mark' => $this->input->post('passing_marks', TRUE),
                        'em_year' => $this->input->post('year', TRUE),
						'degree_id' => $this->input->post('degree', TRUE),
                        'course_id' => $this->input->post('course', TRUE),
						'batch_id' => $this->input->post('batch', TRUE),
                        'em_semester' => $this->input->post('semester', TRUE),
                        'em_status' => $this->input->post('status', TRUE),
                        'em_date' => $this->input->post('date', TRUE),
                        'em_start_time' => $this->input->post('start_date_time', TRUE),
                        'em_end_time' => $this->input->post('end_date_time', TRUE),
                    );
                    $this->Crud_model->insert_exam($data);

                    redirect(base_url('index.php?admin/exam'));
                }
            } elseif ($param1 == 'do_update') {

                //do validation
                if ($this->form_validation->run('exam_insert_update') != FALSE) {
                    $data = array(
                        'em_name' => $this->input->post('exam_name', TRUE),
                        'em_type' => $this->input->post('exam_type', TRUE),
                        'total_marks' => $this->input->post('total_marks', TRUE),
                        'em_year' => $this->input->post('year', TRUE),
						'degree_id' => $this->input->post('degree', TRUE),
                        'course_id' => $this->input->post('course', TRUE),
						'batch_id' => $this->input->post('batch', TRUE),
                        'em_semester' => $this->input->post('semester', TRUE),
                        'em_status' => $this->input->post('status', TRUE),
                        'em_date' => $this->input->post('date', TRUE),
                        'em_start_time' => $this->input->post('start_date_time', TRUE),
                        'em_end_time' => $this->input->post('end_date_time', TRUE),
                    );
                    $this->Crud_model->update_exam($param2, $data);

                    redirect(base_url('index.php?admin/exam'));
                } else {
                    $page_data['edit_error'] = validation_errors();
                }
            }
        }

        $page_data['page_name'] = 'exam';
        $page_data['page_title'] = 'Exam Management';
        $page_data['exams'] = $this->Crud_model->exam_details();
        $page_data['exam_type'] = $this->Crud_model->get_all_exam_type();
		$page_data['degree'] = $this->Crud_model->get_all_degree();
        $page_data['course'] = $this->Crud_model->get_all_course();
        $page_data['semester'] = $this->Crud_model->get_all_semester();
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Import data
     */
    function import($param1 = '') {
        $this->load->helper('import_export');
		$this->load->model('admin/Crud_model');
        if ($_FILES) {
            $file_name = $_FILES['userfile']['tmp_name'];
            $this->load->library('CSVReader');
            $csv_result = $this->csvreader->parse_file($file_name);

            switch ($_POST['module']) {
                case 'degree':
                    //import degree CSV
                    foreach ($csv_result as $result) {
                        $where = array(
                            'd_name' => $result['Degree Name']
                        );
                        $data = array(
                            'd_name' => $result['Degree Name'],
                            'd_status' => 1
                        );
                        import_degree($data, $where);
                    }
                    break;

                case 'admission_type':
                    //import admission type
                    foreach ($csv_result as $result) {
                        $where = array(
                            'at_name' => $result['Admission Type']
                        );
                        $data = array(
                            'at_name' => $result['Admission Type'],
                            'at_status' => 1
                        );
                        import_admission_type($data, $where);
                    }
                    break;
                case 'batch':
                    //import batch
                    foreach ($csv_result as $result) {
                        $where = array(
                            'd_name' => $result['Degree Name']
                        );
                        $data = array(
                            'b_name' => $result['Batch Name'],
                            'd_name' => $result['Degree Name'],
                            'b_status' => 1
                        );
                        import_batch($data, $where);
                    }
                    break;
                case 'event_manager':
                    //import event manager
                    foreach ($csv_result as $result) {
                        $where = array(
                            'event_name' => $result['Event Name']
                        );
                        $data = array(
                            'event_name' => $result['Event Name'],
                            'event_desc' => $result['Event Description'],
                            'event_date' => $result['Event Date']
                        );
                        import_event_manager($data, $where);
                    }
                    break;
                case 'exam_manager':
                    //exam manager csv import					 
                    foreach ($csv_result as $result) {
                        $where = array(
                            'course_name' => array(
                                'c_name' => $result['Course Name']
                            ),
                            'semester' => array(
                                's_name' => $result['Semester']
                            ),
                            'exam_type' => array(
                                'exam_type_name' => $result['Exam Type']
                            )
                        );
                        $data = array(
                            'em_name' => $result['Exam Name'],
                            'em_year' => $result['Year'],
                            'em_date' => $result['Date'],
                            'em_status' => 1,
                            'total_marks'   => $result['Total Marks'],
                            'passing_mark' => $result['Passing Marks'],
                            'em_start_time' => $result['Start Time'],
                            'em_end_time'   => $result['End Time']
                        );
                        import_exam_manager($data, $where);
                    }
                    break;
                case 'fees_structure':
                    //fees structure csv import
                    foreach ($csv_result as $result) {
                        $where = array(
                            'semester' => array(
                                's_name' => $result['Semester']
                            ),
                            'course' => array(
                                'c_name' => $result['Course Name']
                            ),
                            'fees_structure' => array(
                                'title' => $result['Title']
                            )
                        );
                        $data = array(
                            'title' => $result['Title'],
                            'total_fee' => $result['Fees']
                        );
                        import_fees_structure($data, $where);
                    }
                    break;
                case 'subject':
                    //import subject csv
                    foreach ($csv_result as $result) {
                        $where = array(
                            'semester' => array(
                                's_name' => $result['Semester']
                            ),
                            'course' => array(
                                'c_name' => $result['Course']
                            ),
                            'subject' => array(
                                'subject_name' => $result['Subject Name']
                            //'subject_code'  => $result['Subject Code']
                            )
                        );
                        $data = array(
                            'subject_name' => $result['Subject Name'],
                            'subject_code' => $result['Subject Code']
                        );
                        import_subject($data, $where);
                    }
                    break;
                case 'exam_marks':
                    $this->load->model('Admin/Crud_model');
                    $exam_id = $_POST['exam_detail'];
                    $course_id = $_POST['course_detail'];
                    $semester_id = $_POST['sem_detail'];
                    $subjects = $this->Crud_model->exam_subjects($exam_id);

                    $exam_subject = array();
                    foreach ($subjects as $row) {
                        array_push($exam_subject, $row->subject_name);
                    }
                    foreach ($csv_result as $result) {
                        $where = array(
                            'marks' => array(
                                'mm_exam_id' => $exam_id,
                                'mm_std_id' => $result['Student Roll No']
                            ),
                            'subject' => $exam_subject
                        );
                        $data = $result;
                        import_exam_marks($data, $where);
                    }
                    break;
                case 'student':
                    //import student
                    foreach ($csv_result as $result) {
                        $where = array(
                            'student_roll_no' => array(
                                'std_roll' => $result['Roll No']
                            ),
                            'semester' => array(
                                's_name' => $result['Semester']
                            ),
                            'course' => array(
                                'c_name' => $result['Course Name']
                            ),
                            'batch' => array(
                                'b_name' => $result['Batch']
                            )
                        );
                        $data = array(
                            'email' => $result['Email'],
                            'std_roll' => $result['Roll No'],
                            'std_first_name' => $result['First Name'],
                            'std_last_name' => $result['Last Name'],
                            'std_gender' => $result['Gender'],
                            'address' => $result['Address'],
                            'city' => $result['City'],
                            'zip' => $result['Zip'],
                            'std_birthdate' => $result['Birth Date'],
                            'std_marital' => $result['Merital'],
                            'std_about' => $result['About'],
                            'std_mobile' => $result['Mobile']
                        );
                        import_student($data, $where);
                    }
                    break;
            }

            redirect(base_url('index.php?admin/import'));
        }
		$page_data['degree'] = $this->Crud_model->get_all_degree();
        $page_data['title'] = 'Import Data';
        $page_data['page_name'] = 'import';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Download sample csv for marks
     * @param type $exam_id
     */
    function download_marks_csv_sample($exam_id) {
        $this->load->helper('import_export');
        $this->import_demo_sheet_download_config('Exam Marks');
        exam_marks($exam_id);
    }

    /**
     * Download import sheet
     * @param string $param1
     */
    function download_import($param1 = '') {
        $this->load->helper('download');
        $this->load->helper('import_export');
        $sheet_name = '';

        switch ($param1) {
            case 'exam_manager':
                //exam manager
                $this->import_demo_sheet_download_config('Exam Manager');
                //import_export_helper function
                exam_manager();
                break;
            case 'course':
                $this->import_demo_sheet_download_config('Course');
                //import_export_helper function
                course();
                break;
            case 'degree':
                $this->import_demo_sheet_download_config('Degree');
                degree();
                break;
            case 'admission_type':
                $this->import_demo_sheet_download_config('Admission Type');
                admission_type();
                break;
            case 'batch':
                $this->import_demo_sheet_download_config('Batch');
                batch();
                break;
            case 'event_manager':
                $this->import_demo_sheet_download_config('Event Manager');
                event_manager();
                break;
            case 'exam_manager':
                $this->import_demo_sheet_download_config('Exam Manager');
                exam_manager();
                break;
            case 'fees_structure':
                $this->import_demo_sheet_download_config('Fees Structure');
                fees_structure();
                break;
            case 'subject':
                $this->import_demo_sheet_download_config('Subject');
                subject();
                break;
            case 'exam_marks':
                $this->import_demo_sheet_download_config('Exam Marks');
                exam_marks();
                break;
            case 'student':
                $this->import_demo_sheet_download_config('Student');
                student_import_sample();
                break;
            default:
            //default sheet
        }
    }

    /**
     * Import demo sheet download configuration
     * @param string $sheet_name
     */
    function import_demo_sheet_download_config($sheet_name) {
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename={$sheet_name}" . ".csv");
        header("Pragma: no-cache");
        header("Expires: 0");
    }

    /**
     * Import
     */
    function export() {
        $this->load->model('admin/Crud_model');
        $page_data['title'] = 'Export';
        $page_data['page_name'] = 'export';
        $page_data['course'] = $this->Crud_model->get_all_course();
        $page_data['semester'] = $this->Crud_model->get_all_semester();
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Download backup of whole database
     */
    function backup() {
        //load backup and restore helper
        $this->load->helper('backup_restore');
        $list = list_tables();
        $this->load->dbutil();

        //backup and restore ignore table list
        $remove_list = backup_restore_table_ignore_list();

        foreach ($remove_list as $search) {
            if (($key = array_search($search, $list)) !== FALSE) {
                unset($list[$key]);
            }
        }

        $prefs = array(
            'tables' => $list,
            'ignore' => array(),
            'format' => 'txt',
            'filename' => $this->db->database . ' ' . date("Y-m-d-H-i-s") . '-backup.sql',
            'add_drop' => TRUE,
            'add_insert' => TRUE,
            'newline' => "\n"
        );

        $backup = & $this->dbutil->backup($prefs);

        $this->load->helper('download');
        force_download('System-Backup_' . date('d-m-Y h:i:s A') . '.sql', $backup);
    }

    /**
     * Restore databse
     */
    function restore() {
        $this->load->helper('backup_restore');
        if ($_FILES) {
            $this->load->helper('file');
            $file_name = $_FILES['userfile']['tmp_name'];
            $file_restore = $this->load->file($file_name, true);
            $file_array = explode(';', $file_restore);

            //truncate the table
            //get the list of table which will going to truncate
            $truncate_list = backup_and_restore_table();

            foreach ($truncate_list as $truncate) {
                $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
                $this->db->query('TRUNCATE `' . $truncate . '`');
                $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
            }

            foreach ($file_array as $query) {
                if (trim($query) != '') {
                    $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
                    $this->db->query($query);
                    $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
                }
            }
            $this->session->set_flashdata('message', 'System is restored successfully.');
            redirect(base_url('index.php?admin/restore'));
        }
        $page_data['title'] = 'Restore System';
        $page_data['page_name'] = 'restore';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Export csv from data
     * @param string $name
     */
    function export_csv($name = '', $type = '') {
        $this->load->model('admin/Export_model');
        $this->load->helper('import_export');
        switch ($name) {
            case 'exam_manager':
                //download exam manager csv
                $result = $this->Export_model->exam_manager();
                csv_from_result($result, 'Exam Manager'); //@param $result object, string filename
                break;
            case 'event_manager':
                //download event manager csv
                $result = $this->Export_model->event_manager();
                csv_from_result($result, 'Event Manager');
                break;
            case 'course':
                //download course csv
                $result = $this->Export_model->course();
                csv_from_result($result, 'Course');
                break;
            case 'degree':
                //download degree csv
                $result = $this->Export_model->degree();
                csv_from_result($result, 'Degree');
                break;
            case 'semester':
                //download semester csv
                $result = $this->Export_model->semester();
                csv_from_result($result, 'Semester');
                break;
            case 'student':
                //download student csv
                $result = $this->Export_model->student();
                csv_from_result($result, 'Student');
                break;
            case 'system_setting':
                //download system setting csv
                $result = $this->Export_model->system_setting();
                csv_from_result($result, 'System Settings');
                break;
            case 'project_manager':
                //download project manager csv
                $result = $this->Export_model->project_manager();
                csv_from_result($result, 'Project Manager');
                break;
            case 'admission_type':
                //download admission type
                $result = $this->Export_model->admission_type();
                csv_from_result($result, 'Admission Type');
                break;
            case 'batch':
                //download batch csv
                $result = $this->Export_model->batch();
                csv_from_result($result, 'Batch');
                break;
            case 'fees_structure':
                //download batch csv
                $result = $this->Export_model->fees_structure();
                csv_from_result($result, 'Fees Structure');
                break;
            case 'subject':
                //download subject csv
                $result = $this->Export_model->subject_export();
                csv_from_result($result, 'Subject');
                break;
            case 'exam_marks':
                $this->load->helper('import_export');
                $this->import_demo_sheet_download_config('Exam Marks');
                exam_marks($type);
                break;
            default:
                redirect(base_url('index.php?admin/export'));
        }
    }

    /**
     * Make payment via payment gateway
     */
    function make_payment() {
        $this->load->model('admin/Crud_model');
        if ($_POST) {
            $session['payment_data'] = array(
                'payment_gateway' => $_POST['payment_gateway'],
                'fees' => $_POST['fees'],
                'student_id' => $_POST['student'],
                'semester' => $_POST['semester'],
                'course' => $_POST['course'],
                'description' => $_POST['c_description'],
                'fees_structure_id' => $_POST['fees_structure']
            );
            $this->session->set_userdata($session);

            redirect(base_url('index.php?admin/process_payment'));
        }
        $page_data['title'] = 'Make Payment';
        $page_data['page_name'] = 'make_payment';
        $page_data['authorize_net'] = $this->Crud_model->authorize_net_config();
        $page_data['degree'] = $this->Crud_model->get_all_degree();
        $page_data['course'] = $this->Crud_model->get_all_course();
        $page_data['semester'] = $this->Crud_model->get_all_semester();
        $page_data['student_fees'] = $this->Crud_model->all_student_fees();
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
     * Authorize.net payment process
     */
    function authorize_net_make_payment() {
        $this->load->library('authorize_net');
        $this->load->model('admin/Crud_model');

        if ($_POST) {
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
                    'x_amount' => $this->session->userdata('payment_data')['fees'],
                    'x_first_name' => $student_data->std_first_name,
                    'x_last_name' => $student_data->std_last_name,
                    'x_address' => 'Address',
                    'x_city' => $student_data->city,
                    'x_state' => 'State',
                    'x_zip' => $student_data->zip,
                    'x_country' => 'India',
                    'x_phone' => $student_data->std_mobile,
                    'x_email' => $student_data->email,
                    'x_customer_ip' => $this->input->ip_address(),
                );

                $this->authorize_net->setData($auth_net);

                //insert into db
                $payment_data = array(
                    'student_id' => $this->session->userdata('payment_data')['student_id'],
                    'fees_structure_id' => $this->session->userdata('payment_data')['fees_structure_id'],
                    'paid_amount' => $this->session->userdata('payment_data')['fees'],
                    'course_id' => $this->session->userdata('payment_data')['course'],
                    'sem_id' => $this->session->userdata('payment_data')['semester'],
                    'remarks' => $this->session->userdata('payment_data')['description'],
                );
                $this->Crud_model->student_fees_save($payment_data);


                // redirect after order completion
                $status = array();

                // Try to AUTH_CAPTURE
                if ($this->authorize_net->authorizeAndCapture()) {
                    $this->session->set_flashdata('Transaction success', 'Transaction is successfully done.');

                    //remove session
                    $this->session->unset_userdata('payment_data');
                    redirect(base_url('index.php?admin/make_payment'));
                } else {
                    $this->session->set_flashdata('Transaction incomplete', '<p>' . $this->authorize_net->getError() . '</p>');
                    //remove session
                    $this->session->unset_userdata('payment_data');
                    redirect(base_url('index.php?admin/make_payment'));
                }
            }
        }
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
            redirect(base_url('index.php?admin/make_payment'));
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
     * Students of the particular course
     * @param int $course_id
     */
    function course_students($course_id = '') {
        $this->load->model('admin/Crud_model');
        $students = $this->Crud_model->course_students($course_id);
        echo "<option value=''>Select</option>";
        foreach ($students as $row) {
            ?>
            <option value="<?php echo $row->std_id; ?>"><?php echo $row->name; ?></option>
            <?php
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
     * Authorize payment gateway configuration
     */
    function authorize_payment_config() {
        $this->load->model('admin/Crud_model');
        if ($_POST) {
            $id = $this->input->post('config_id', TRUE);
            if ($id != '') {
                // update configuration
                $this->Crud_model->authorize_net_config_update($id, array(
                    'login_id' => $this->input->post('login_id', TRUE),
                    'transaction_key' => $this->input->post('transaction_key', TRUE),
                    'success_url' => $this->input->post('success_url', TRUE),
                    'failure_url' => $this->input->post('failure_url', TRUE),
                    'cancel_url' => $this->input->post('cancel_url', TRUE),
                    'status' => $this->input->post('status', TRUE)
                        )
                );
                $this->session->set_flashdata('Configuration updated.', 'Authorize.net payment gateway configutaion updated.');
            } else {
                // add new configuration
                $this->Crud_model->authorize_net_config_insert(array(
                    'login_id' => $this->input->post('login_id', TRUE),
                    'transaction_key' => $this->input->post('transaction_key', TRUE),
                    'success_url' => $this->input->post('success_url', TRUE),
                    'failure_url' => $this->input->post('failure_url', TRUE),
                    'cancel_url' => $this->input->post('cancel_url', TRUE),
                    'status' => $this->input->post('status', TRUE)
                        )
                );
                $this->session->set_flashdata('Configuration added.', 'Authorize.net configuration successfully added.');
            }
            redirect(base_url('index.php?admin/authorize_payment_config'));
        }
        $page_data['title'] = 'Authorize.net Payment Gateway Configuration';
        $page_data['page_name'] = 'authorize_payment_config';
        $page_data['authorize_net'] = $this->Crud_model->authorize_net_config();
        $this->load->view('backend/index', $page_data);
    }

    /**
     * CMS Manager
     * @param string $param1
     * @param string $param2
     */
    function cms_manager($param1 = '', $param2 = '') {
        $this->load->model('admin/Crud_model');
		if ($param1 == 'delete') {
            $this->db->where('am_id', $param2);
            $this->db->delete('cms_pages');

            redirect(base_url('index.php?admin/cms_manager'));
        }
        if ($_POST) {
            if ($param1 == 'create') {
                $this->Crud_model->cms_manager_save(array(
				    'degree_id' => $this->input->post('degree', TRUE),
                    'am_course' => $this->input->post('course', TRUE),
                    'am_batch' => $this->input->post('batch', TRUE),
                    'am_semester' => $this->input->post('semester', TRUE),
                    'am_title' => $this->input->post('page_title', TRUE),
                    'am_url' => $this->input->post('page_slug', TRUE),
                    'is_form' => $this->input->post('content_type', TRUE),
                    'am_content' => $this->input->post('content_data', TRUE)
                ));
                $this->session->set_flashdata('messge', 'CMS content is added successfully.');
            } elseif ($param1 == 'update') {
                $this->Crud_model->cms_manager_save(array(
				    'degree_id' => $this->input->post('degree', TRUE),
                    'am_course' => $this->input->post('course', TRUE),
                    'am_batch' => $this->input->post('batch', TRUE),
                    'am_semester' => $this->input->post('semester', TRUE),
                    'am_title' => $this->input->post('page_title', TRUE),
                    'am_url' => $this->input->post('page_slug', TRUE),
                    'is_form' => $this->input->post('content_type', TRUE),
                    'am_content' => $this->input->post('content_data', TRUE)
                        ), $param2);
                $this->session->set_flashdata('message', 'CMS page is successfully updated.');
            }
            redirect(base_url('index.php?admin/cms_manager'));
        }
        $this->load->model('admin/Crud_model');

        //fetch data
        $page_data['batch'] = $this->Crud_model->get_all_bacth();
        $page_data['degree'] = $this->Crud_model->get_all_degree();
        $page_data['course'] = $this->Crud_model->get_all_course();
        $page_data['student'] = $this->Crud_model->get_all_students();
        $page_data['semester'] = $this->Crud_model->get_all_semester();
        $page_data['admission_type'] = $this->Crud_model->get_all_admission_type();
        $page_data['cms_pages'] = $this->Crud_model->get_all_cms_pages();

        $page_data['title'] = 'CMS Manager';
        $page_data['page_name'] = 'cms_manager';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Exam time table
     * @param string $param1
     * @param string $param2
     */
    function exam_time_table($param1 = '', $param2 = '') {
        $this->load->model('admin/Crud_model');
        if ($param1 == 'delete') {
            //delete
            $this->db->where('exam_time_table_id', $param2);
            $this->db->delete('exam_time_table');
            $this->session->set_flashdata('message', 'Exam time table deleted successfully');
            redirect(base_url('index.php?admin/exam_time_table'));
        }
        if ($_POST) {
            if ($param1 == 'create') {
                // do form validation
                if ($this->form_validation->run('time_table_insert_update') != FALSE) {
                    //create
                    $this->Crud_model->exam_time_table_save(array(
						'degree_id' => $this->input->post('degree', TRUE),
                        'course_id' => $this->input->post('course', TRUE),
                        'batch_id' => $this->input->post('batch', TRUE),
                        'semester_id' => $this->input->post('semester', TRUE),
                        'exam_id' => $this->input->post('exam', TRUE),
                        'subject_id' => $this->input->post('subject', TRUE),
                        'exam_date' => $this->input->post('exam_date', TRUE),
                        'exam_start_time' => $this->input->post('start_time', TRUE),
                        'exam_end_time' => $this->input->post('end_time', TRUE),
                    ));
                    $this->session->set_flashdata('message', 'Time table is added successfully.');
                    redirect(base_url('index.php?admin/exam_time_table'));
                }
            } elseif ($param1 == 'update') {
                // do form validation
                if ($this->form_validation->run('time_table_insert_update') != FALSE) {
                    //update
                    $this->Crud_model->exam_time_table_save(array(
						'degree_id' => $this->input->post('degree', TRUE),
                        'course_id' => $this->input->post('course', TRUE),
                        'batch_id' => $this->input->post('batch', TRUE),
                        'exam_id' => $this->input->post('exam', TRUE),
                        'subject_id' => $this->input->post('subject', TRUE),
                        'exam_date' => $this->input->post('exam_date', TRUE),
                        'exam_start_time' => $this->input->post('start_time', TRUE),
                        'exam_end_time' => $this->input->post('end_time', TRUE),
                            ), $param2);
                    $this->session->set_flashdata('message', 'Time table updated successfully');
                    redirect(base_url('index.php?admin/exam_time_table'));
                }
            }
        }
		$page_data['degree'] = $this->Crud_model->get_all_degree();
        $page_data['course'] = $this->Crud_model->get_all_course();
        $page_data['semester'] = $this->Crud_model->get_all_semester();
        $page_data['time_table'] = $this->Crud_model->time_table();
        $page_data['title'] = 'Exam Time Table';
        $page_data['page_name'] = 'exam_time_table';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Get exam list by course name and semester
     * @param type $course_id
     * @param type $semester_id
     */
    function get_exam_list($course_id = '', $semester_id = '', $time_table = '') {
        $this->load->model('admin/Crud_model');
        $exam_detail = $this->Crud_model->get_exam_list($course_id, $semester_id);
        echo "<option value=''>Select</option>";
        foreach ($exam_detail as $row) {
            ?>
            <option value="<?php echo $row->em_id ?>"
                    <?php if ($row->em_id == $time_table) echo 'selected'; ?>><?php echo $row->em_name . '  (Marks' . $row->total_marks . ')'; ?></option>
            <!--echo "<option value={$row->em_id}>{$row->em_name}  (Marks{$row->total_marks})</option>";-->
            <?php
        }
    }

    /**
     * Get subject list by course and semester
     * @param type $course_id
     * @param type $semester_id
     */
    function subject_list($course_id = '', $semester_id, $time_table = '') {
        $this->load->model('admin/Crud_model');
        $subjects = $this->Crud_model->subject_list($course_id, $semester_id);
        echo "<option vale=''>Select</option>";
        foreach ($subjects as $row) {
            ?>
            <option value="<?php echo $row->sm_id; ?>"
                    <?php if ($row->sm_id == $time_table) echo 'selected'; ?>><?php echo $row->subject_name . '  Code: ' . $row->subject_code; ?></option>
            <!--echo "<option value={$row->sm_id}>{$row->subject_name}  (Code: {$row->subject_code})</option>";-->
            <?php
        }
    }

    /**
     * Exam marks CRUD
     * @param string $course_id
     * @param string $semester_id
     * @param string $exam_id
     */
    function marks($course_id = '', $semester_id = '', $exam_id = '') {
        $this->load->model('admin/Crud_model');
        if ($_POST) {
            //exam details
            $exam_detail = $this->Crud_model->exam_detail($exam_id);

            //subject details
            $subject_details = $this->Crud_model->subject_list($course_id, $semester_id);

            //student list
            $student_list = $this->Crud_model->student_list_by_course_semester($course_id, $semester_id);

            $total_students = $_POST['total_student'];

            for ($i = 1; $i <= $total_students; $i++) {
                //subject loop
                for ($j = 0; $j < count($subject_details); $j++) {
                    //where
                    $where = array(
                        'mm_std_id' => $student_list[$i - 1]->std_id,
                        'mm_subject_id' => $subject_details[$j]->sm_id,
                        'mm_exam_id' => $exam_detail[0]->em_id,
                    );

                    $marks = $this->Crud_model->student_exam_mark($where);

                    if (count($marks)) {
                        //udpate
                        $this->Crud_model->mark_update(array(
                            'mm_std_id' => $student_list[$i - 1]->std_id,
                            'mm_subject_id' => $subject_details[$j]->sm_id,
                            'mm_exam_id' => $exam_detail[0]->em_id,
                            'mark_obtained' => $_POST["mark_{$i}_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}_{$subject_details[$j]->sm_id}"],
                            'mm_remarks' => $_POST["remark_{$i}_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}"],
                                ), $where);
                    } else {
                        //insert
                        $this->Crud_model->mark_insert(array(
                            'mm_std_id' => $student_list[$i - 1]->std_id,
                            'mm_subject_id' => $subject_details[$j]->sm_id,
                            'mm_exam_id' => $exam_detail[0]->em_id,
                            'mark_obtained' => $_POST["mark_{$i}_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}_{$subject_details[$j]->sm_id}"],
                            'mm_remarks' => $_POST["remark_{$i}_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}"],
                        ));
                    }
                }
            }
            $this->session->set_userdata('message', 'Marks is successfully updated.');
            redirect(base_url('index.php?admin/marks/' . $course_id . '/' . $semester_id . '/' . $exam_id));
        }
        $page_data['course_id'] = '';
        $page_data['semester_id'] = '';
        $page_data['exam_id'] = '';
        $page_data['student_list'] = array();
        $page_data['subject_details'] = array();
        $page_data['exam_detail'] = array();

        if ($course_id != '' && $semester_id != '' && $exam_id != '') {
            //assign variable
            $page_data['course_id'] = $course_id;
            $page_data['semester_id'] = $semester_id;
            $page_data['exam_id'] = $exam_id;

            //exam details
            $page_data['exam_detail'] = $this->Crud_model->exam_detail($exam_id);

            //subject details
            $page_data['subject_details'] = $this->Crud_model->subject_list($course_id, $semester_id);

            //student list
            $page_data['student_list'] = $this->Crud_model->student_list_by_course_semester($course_id, $semester_id);
        }
		$page_data['degree'] = $this->Crud_model->get_all_degree();
        $page_data['course'] = $this->Crud_model->get_all_course();
        $page_data['semester'] = $this->Crud_model->get_all_semester();
        $page_data['time_table'] = $this->Crud_model->time_table();
        $page_data['title'] = 'Exam Marks';
        $page_data['page_name'] = 'exam_marks';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Fees structure
     * @param string $param1
     * @param string $param2
     */
    function fees_structure($param1 = '', $param2 = '') {
        $this->load->model('admin/Crud_model');

        if ($param1 == 'delete') {
            $this->db->where('fees_structure_id', $param2);
            $this->db->delete('fees_structure');

            redirect(base_url('index.php?admin/fees_structure'));
        }
        if ($_POST) {
            if ($param1 == 'create') {
                $this->Crud_model->fees_structure_save(array(
                   'title' => $this->input->post('title', TRUE),
                    'degree_id' => $this->input->post('degree', TRUE),
                    'course_id' => $this->input->post('course', TRUE),
                    'batch_id' => $this->input->post('batch', TRUE),
                    'sem_id' => $this->input->post('semester', TRUE),
                    'total_fee' => $this->input->post('fees', TRUE),
                    'description' => $this->input->post('description', TRUE),
                ));
                $this->session->set_flashdata('message', 'Fees structure is added successfully.');
            } elseif ($param1 == 'update') {
                $this->Crud_model->fees_structure_save(array(
                    'title' => $this->input->post('title', TRUE),
                    'course_id' => $this->input->post('course', TRUE),
                    'sem_id' => $this->input->post('semester', TRUE),
                    'total_fee' => $this->input->post('fees', TRUE),
                        ), $param2);
                $this->session->set_flashdata('message', 'Fees structure is updated successfully.');
            }
            redirect(base_url('index.php?admin/fees_structure'));
        }
		$page_data['degree'] = $this->Crud_model->get_all_degree();
        $page_data['course'] = $this->Crud_model->get_all_course();
        $page_data['semester'] = $this->Crud_model->get_all_semester();
        $page_data['fees_structure'] = $this->Crud_model->get_all_fees_structure();
        $page_data['title'] = 'Fees Structure';
        $page_data['page_name'] = 'fees_structure';
        $this->load->view('backend/index', $page_data);
    }

    /**
     * Course semester fees structure
     * @param string $course_id
     * @param string $semester_id
     */
    function course_semester_fees_structure($course_id = '', $semester_id = '') {
        $this->load->model('admin/Crud_model');
        $fees_structure = $this->Crud_model->course_semester_fees_structure($course_id, $semester_id);

        echo json_encode($fees_structure);
    }
/**
     * Start or stop video streaming
     * @param type $stream_name
     */
    function start_stop_streaming($stream_name, $status) {
        $this->load->model('admin/Crud_model');
        $this->Crud_model->start_stop_streaming($stream_name, $status);
    }
    /**
     * Student paid fees
     * @param string $fees_structure_id
     * @param string $student_id
     */
    function student_paid_fees($fees_structure_id = '', $student_id = '') {
        $this->load->model('Student/Student_model');
        $this->load->model('admin/Crud_model');
        $page_data = array();
        $total_paid = 0;
        $fees_structure = $this->Crud_model->fees_structure_details($fees_structure_id);
        $page_data['total_fees'] = $fees_structure->total_fee;
        $paid_fees = $this->Student_model->student_paid_fees($fees_structure_id, $student_id);
        if (count($paid_fees)) {
            foreach ($paid_fees as $paid) {
                $total_paid += $paid->paid_amount;
            }
        }
        if (count($fees_structure)) {
            $page_data['due_amount'] = $fees_structure->total_fee - $total_paid;
            $page_data['total_paid'] = $total_paid;
        } else {
            $page_data['due_amount'] = $fees_structure->total_fee;
            $page_data['total_paid'] = 0;
        }

        echo json_encode($page_data);
    }

    /**
     * Report chart
     * @param string $param1
     */
    function report_chart($param1 = '') {
        $this->load->helper('report_chart');
        $course = $this->db->get('course')->result();
        switch ($param1) {
            case 'student':
                $data['male_female_pie_chart'] = male_female_students();
                $data['new_student_joining'] = new_student_registration();
                $data['male_vs_female_course_wise'] = male_vs_female_course_wise();
                $data['page_name'] = 'report_chart';
                break;
            default:
                echo 'exam table';
                $data['page_name'] = 'report_chart_exam';
        }
        $this->load->view('backend/index', $data);
    }

    /**
     * Search module
     * 
     * @return response
     */
    function search() {
        $this->load->model('admin/Crud_model');
        $this->load->helper('search');
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
     * Video streaming using YT api
     */
    function video_streaming() {
        $this->load->model('admin/Crud_model');
        $page_data['page_name'] = 'video_streaming';
        $page_data['page_title'] = 'Manage Profile';
        $page_data['course'] = $this->Crud_model->get_all_course();
        $page_data['semester'] = $this->Crud_model->get_all_semester();
        $this->load->view('backend/index', $page_data);
    }

    function create_private_broadcast() {
        $this->db->insert('broadcast_and_streaming', array(
            'title' => $_POST['title'],
            'course' => $_POST['course'],
            'semester' => $_POST['semester'],
            'url_link' => $_POST['url_link'],
            'is_active' => 1
        ));
    }

    /**
     * Get all student by course and semester
     * @param string $course_id
     * @param string $semester_id
     */
    function course_semester_student($course_id = '', $semester_id = '') {
        $this->load->model('admin/Crud_model');
        $students = $this->Crud_model->course_semester_student($course_id, $semester_id);
        foreach ($students as $row) {
            ?>
            <option value="<?php echo $row->std_id; ?>"><?php echo $row->std_first_name . ' ' . $row->std_last_name; ?></option>
            <?php
        }
    }
	
	function truncate_table($table) {
		$this->db->truncate($table);
	}
        
        
        // Mayur Panchal 21-3-2016
    
    function batchwisestudent()
    {
      $batch = $this->input->post("batch");
      if( $batch!="" )
      {
             $datastudent = $this->db->get_where("student",array("std_batch"=>$batch,'std_status' => 1))->result();
            //  $datastudent = $this->db->get_where('student', array('std_status' => 1))->result();
            $html ='<option value="">Select student</option>';
            foreach ($datastudent as $rowstu) {                                        
               $html .='<option value="'.$rowstu->std_id.'">'.$rowstu->name.'</option>';
              }     
      }    
      else
      {
          $html ='<option value="">Select student</option>';          
      }
       echo  $html;
    }
    
    function semwisestudent()
    {
        $batch = $this->input->post("batch");
        $sem = $this->input->post("sem");
        $degree = $this->input->post("degree");
        $course = $this->input->post("course");
     
               $datastudent = $this->db->get_where("student",array("std_batch"=>$batch,'std_status' => 1,"semester_id"=>$sem,'course_id'=>$course,'std_degree'=>$degree))->result();     
                $html ='<option value="">Select student</option>';
                foreach ($datastudent as $rowstu) 
                {
                    $html .='<option value="'.$rowstu->std_id.'">'.$rowstu->name.'</option>';
                }
        echo  $html;
    }
    
        
        
        function checkduplicate()
        {
            $email  = $this->input->post("email");
          if(!empty( $email ))
          {
             $count  =  $this->db->get_where("student",array("email"=>$email))->num_rows();
                if($count > 0)
                {
                    echo "false";
                }
                else
                {
                    echo "true";
                }
           }
            
        }
        
        function getstudentemail()
        {
            $eid=$this->input->post('eid');
            $data=$this->db->get_where('student',array('email'=>$eid));
            if($data->num_rows()>0)
            {
                echo "false";
            }
            else
            {
                echo "true";
            }
           // echo $data->num_rows();
        }
        
        function checksubject()
        {
            
           $eid=$this->input->post('subname');
           $subcode=$this->input->post('subcode');
           $course=$this->input->post('course');
           $semester = $this->input->post('semester');
            $data=$this->db->get_where('subject_manager',array("sm_course_id"=>$course,"sm_sem_id"=>$semester,"subject_name"=>$eid,"subject_code"=>$subcode));
            if($data->num_rows()>0)
            {
                echo "false";
            }
            else
            {
                echo "true";
            } 
        }
        function checksubcode()
        {
            
           $eid=$this->input->post('subcode');
            $data=$this->db->get_where('subject_manager',array('subject_code'=>$eid));
            if($data->num_rows()>0)
            {
                echo "false";
            }
            else
            {
                echo "true";
            } 
        }
        
        
        function get_cource($param='')
        {
            
            $did = $this->input->post("degree");
            if($did!='')
            {
            
                $cource = $this->db->get_where("course",array("degree_id"=>$did))->result_array();
                $html = '<option value="">Select Course</option>';
                foreach($cource as $crs):
                    $html .='<option value="'.$crs['course_id'].'">'.$crs['c_name'].'</option>';
                    
                endforeach;
                echo $html;
              
                
            }
            
        }
        
        function get_batchs()
        {
             $cid = $this->input->post("course");
             $did = $this->input->post("degree");
            if($cid!='')
            {
            
               // $cource = $this->db->get_where("batch",array("degree_id"=>$cid))->result_array();
               $batch = $this->db->query("SELECT * FROM batch WHERE FIND_IN_SET('".$did."',degree_id) AND FIND_IN_SET('".$cid."',course_id)")->result_array();
              // echo $this->db->last_query();
               
                $html = '<option value="">Select Batch</option>';
                foreach($batch as $btc):
                    $html .='<option value="'.$btc['b_id'].'">'.$btc['b_name'].'</option>';
                    
                endforeach;
                echo $html;
              
                
            }
            
        }


	 function get_cource_multiple($param='')
        {
            $did = $this->input->post("degree");
            $cource =  $this->db->query("select * from course where degree_id in($did)")->result_array();
         
            $html = '<option value="">Select Course</option>';              
          foreach($cource as $c)
          {
             $html .='<option value="'.$c['course_id'].'">'.$c['c_name'].'</option>';
          }
           echo $html;             
        }
    /**
     * Course list from degree
     * @param int $degree_id
     */
    function course_list_from_degree($degree_id) {
        $this->load->model('admin/Crud_model');
        $course = $this->Crud_model->course_list_from_degree($degree_id);

        echo json_encode($course);
    }

    /**
     * Batch list from degree and course
     * @param int $degree
     * @param int $course
     */
    function batch_list_from_degree_and_course($degree = '', $course = '') {
        $this->load->model('admin/Crud_model');
        $batch = $this->Crud_model->batch_list_from_degree_and_course($degree, $course);

        echo json_encode($batch);
    }

    function student_list_from_degree_course_batch($degree, $course, $batch) {
        $this->load->model('admin/Crud_model');
    }

    /**
     * Exam list from degree, course, batch and sem
     * @param int $degree
     * @param int $course
     * @param int $batch
     * @param int $semester
     */
    function exam_list_from_degree_and_course($degree, $course, $batch, $semester) {
        $this->load->model('admin/Crud_model');
        $exam_list = $this->Crud_model->exam_list_from_degree_and_course($degree, $course, $batch, $semester);

        echo json_encode($exam_list);
    }

    /**
     * Subject list from course and semester
     * @param int $course
     * @param int $semester
     */
    function subject_list_from_course_and_semester($course, $semester) {
        $this->load->model('admin/Crud_model');
        $subjects = $this->Crud_model->subject_list_from_course_and_semester($course, $semester);

        echo json_encode($subjects);
    }    

}
