<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* 	
 * 	@author : Joyonto Roy
 * 	30th July, 2014
 * 	Creative Item
 * 	www.creativeitem.com
 * 	http://codecanyon.net/user/joyontaroy
 */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/crud_model');
        $this->load->database();
        $this->load->library('session');
		
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2016 05:00:00 GMT");
    }

    //Default function, redirects to logged in user area
    public function index() {

        if ($this->session->userdata('admin_login') == 1)
			
            redirect(base_url() . 'index.php?admin/dashboard');
       
         if ($this->session->userdata('student_login') == 1)
            {
               if($this->session->userdata('password_status') == 0)
               {
                    redirect(base_url() . 'index.php?student/change_password', 'refresh');
             } 
             else {
                  redirect(base_url() . 'index.php?student/dashboard', 'refresh');
               }
            }
		
		if ($this->session->userdata('subadmin_login') == 1) {
            redirect(base_url() . 'index.php?sub_admin/dashboard', 'refresh');
        }
        
        if ($this->session->userdata('centeruser_login') == 1) {
              
            redirect(base_url() . 'index.php?center_user/dashboard','refresh');
        }
      
        $this->load->view('backend/login');
    }

    //Ajax login function 
    function ajax_login() {
        $response = array();

        //Recieving post input of email, password from ajax request
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
		
        $response['submitted_data'] = $_POST;

        //Validating login
        $login_status = $this->validate_login($email, $password);
		
        $response['login_status'] = $login_status;
        if ($login_status == 'success') {
            $response['redirect_url'] = '';
        }

        //Replying ajax request with validation response
        echo json_encode($response);
    }

    //Validating login from ajax request
    function validate_login($email = '', $password = '') {
        $credential = array('email' => $email, 'password' => $password);
		$std_credential = array('email' => $email, 'password' => $password, 'std_status' =>1);
$center_credential = array('emailid' => $email, 'password' => $password, 'center_status' =>1);
		
        // Checking login credential for admin
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
			$this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('login_type', 'admin');
			$update = array("online"=>'1');	
			$this->db->where('admin_id',$row->admin_id);
			$this->db->update('admin',$update);
            return 'success';
        }
        // Checking login credential for student
        $query = $this->db->get_where('student', $std_credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('student_login', '1');
            $this->session->set_userdata('std_id', $row->std_id);
			$this->session->set_userdata('student_id', $row->std_id);
            $this->session->set_userdata('login_user_id', $row->std_id);
            $this->session->set_userdata('std_roll', $row->std_roll);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'student');
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('user_type', '2');
            $this->session->set_userdata('group_id', $row->group_id);
            $this->session->set_userdata('online', '1');	
            $this->session->set_userdata('password_status',$row->password_status);
            $update = array("online"=>'1');	
            $this->db->where('std_id',$row->std_id);
            $this->db->update('student',$update);
            return 'success';
        }
              
         //check for center user
	$query = $this->db->get_where('center_user', $center_credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            $this->session->set_userdata('centeruser_login', '1');
            $this->session->set_userdata('center_id', $row->center_id);
            $this->session->set_userdata('center_user_id', $row->center_id);
             $this->session->set_userdata('login_user_id', $row->center_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('email', $row->emailid);
            $this->session->set_userdata('login_type', 'center');
            return 'success';
        }		
		//check for sub admin
        $query = $this->db->get_where('sub_admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            $this->session->set_userdata('subadmin_login', '1');
            $this->session->set_userdata('sub_admin_id', $row->sub_admin_id);
            $this->session->set_userdata('login_user_id', $row->sub_admin_id);
            $this->session->set_userdata('name', 'sub admin 1');
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('login_type', 'subadmin');
            //redirect(base_url('index.php?sub_admin/dashboard'));

            return 'success';
        }

        return 'invalid';
    }

    /*     * *DEFAULT NOR FOUND PAGE**** */

    function four_zero_four() {
        $this->load->view('four_zero_four');
    }

    // PASSWORD RESET BY EMAIL
    function forgot_password()
    {
        $this->load->view('backend/forgot_password');
    }

    function ajax_forgot_password()
    {
       
        $resp                   = array();
        $resp['status']         = 'false';
        $email                  = $_POST["email"];
        $reset_account_type     = '';
        //resetting user password here
        $new_password           =   substr( md5( rand(100000000,20000000000) ) , 0,7);
			
        // Checking credential for admin
        $query = $this->db->get_where('admin' , array('email' => $email));
		if ($query->num_rows() > 0) 
        {   
            $reset_account_type     =   'admin';
            $this->db->where('email' , $email);
            $this->db->update('admin' , array('pass' => $new_password,'password' => md5($new_password)));
			$resp['status']         = 'true';
        }
        // Checking credential for student
        $query = $this->db->get_where('student' , array('email' => $email));
        if ($query->num_rows() > 0) 
        {
            $reset_account_type     =   'student';
            $this->db->where('email' , $email);
            $this->db->update('student' , array('real_pass' => $new_password,'password' => md5($new_password)));
            $resp['status']         = 'true';
        }
          

        // send new password to user email  
        $this->email_model->password_reset_email($new_password , $reset_account_type , $email);

        $resp['submitted_data'] = $_POST;

        echo json_encode($resp);
    }

    /*     * *****LOGOUT FUNCTION ****** */

    function logout() {
			 $data['online'] = 0;			
			 $this->db->where('std_id', $this->session->userdata('std_id'));
			 $this->db->update('student',$data);
			 if($this->session->userdata('admin_id'))
				 {			
					 $update = array("online"=>'0');
					 $this->db->where('admin_id',$this->session->userdata('admin_id'));
					 $this->db->update('admin',$update);
				}
        $this->session->sess_destroy();		
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url(), 'refresh');
    }
	function active_student($std_id) {
		$data['std_status'] = 1;
		$this->db->where('std_id', $std_id);
		$this->db->update('student', $data);
		redirect(base_url() . 'index.php?login', 'refresh');
	}

}
