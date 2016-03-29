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

class Register extends CI_Controller {

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
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
       
        if ($this->session->userdata('student_login') == 1)
            redirect(base_url() . 'index.php?student/dashboard', 'refresh');
      
        $this->load->view('backend/register');
    }

   
	function register($param1 = '', $param2 = '')
		{
			
			if ($param1 == 'create') {
				
				$data['email']         = $this->input->post('email_id');
				$data['name'] = $this->input->post('name');				
				$data['password'] = md5($this->input->post('password'));
				$data['std_first_name'] = $this->input->post('f_name');
				$data['std_last_name'] = $this->input->post('l_name');
				$data['std_gender'] = $this->input->post('gen');
				$data['std_birthdate'] = $this->input->post('birthdate');				
				$data['degree'] = $this->input->post('degree');
				$data['semester_id'] = $this->input->post('semester');
				//$data['course_id'] = $this->input->post('course');
				$data['std_about'] = $this->input->post('std_about');
				$data['std_mobile'] = $this->input->post('mobileno');
				$data['real_pass'] = $this->input->post('password');
				$data['country'] =$this->input->post('country');
				$data['state'] =$this->input->post('state');
				$data['city'] =$this->input->post('city');
				$data['zip'] =$this->input->post('zipcode');
				$data['std_fb'] =$this->input->post('facebook');
				$data['std_twitter'] =$this->input->post('twitter');
				$data['std_status'] = 0;
				$data['created_date'] = date('Y-m-d') ;
				//echo 'in' .$_FILES['userfile']['name'];
				//roll no
				$this->db->insert('student', $data);
				$lastid= $this->db->insert_id();
				$rollno=date('Y');				
				$rollno.=$this->db->get_where('course',array('course_id'=>$this->input->post('course')))->row()->course_alias_id;
				$rollno.='-'.$lastid;
				$updaterollno['std_roll']=$rollno;
				$this->db->where('std_id',$lastid);
				$this->db->update('student',$updaterollno);
				
				@move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$lastid.'.jpg');	
				//echo $_FILES['userfile']['tmp_name'], 'uploads/student_image/'.$lastid.'.jpg';
				//die;				
				//end roll no
				$this->session->set_flashdata('flash_message' , 'Student Register Admin contact Soon');
				$this->email_model->account_opening_email('student', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
				redirect(base_url() . 'index.php?student/registration/', 'refresh');				
			}
			$page_data['student']    = $this->db->get('student')->result();
			$page_data['page_name']  = 'registration';
			$page_data['page_title'] = 'Student Registration';
			$this->load->view('backend/index', $page_data);
		}	
	

}
