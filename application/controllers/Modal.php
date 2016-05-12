<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
                  $this->load->model('admin/Crud_model');
                  $this->load->model('professor/Professor_model');
		/*cache control*/
                $this->load->helper('system_setting');
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
        $this->load->model('forum_model');
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
	
		
	}
	
	
	/*
	*	$page_name		=	The name of page
	*/
	function popup($page_name = '' , $param2 = '' , $param3 = '')
	{
		$account_type		=	$this->session->userdata('login_type');
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
                if($page_name=="add_exam_schedual"){
                    if($this->session->userdata('login_type')=="professor")
                    {
                        $page_data['degree'] = $this->Professor_model->get_all_degree();
                        $page_data['course'] = $this->Professor_model->get_all_course();
                        $page_data['semester'] = $this->Professor_model->get_all_semester();
                        $page_data['time_table'] = $this->Professor_model->time_table();
                    }
                    else
                    {
                        $page_data['degree'] = $this->Crud_model->get_all_degree();
                    $page_data['course'] = $this->Crud_model->get_all_course();
                    $page_data['semester'] = $this->Crud_model->get_all_semester();
                    $page_data['time_table'] = $this->Crud_model->time_table();
                    }
                }
                if($page_name=="addexam")
                {
                    if($this->session->userdata('login_type')=="professor")
                    {
                    $page_data['exams'] = $this->Professor_model->exam_details();
                    $page_data['exam_type'] = $this->Professor_model->get_all_exam_type();
                    $page_data['degree'] = $this->Professor_model->get_all_degree();
                    $page_data['course'] = $this->Professor_model->get_all_course();
                    $page_data['semester'] = $this->Professor_model->get_all_semester();
                    }
                    else
                    {
                    $page_data['exams'] = $this->Crud_model->exam_details();
                    $page_data['exam_type'] = $this->Crud_model->get_all_exam_type();
                    $page_data['degree'] = $this->Crud_model->get_all_degree();
                    $page_data['course'] = $this->Crud_model->get_all_course();
                    $page_data['semester'] = $this->Crud_model->get_all_semester();
                    }
                    //$page_data['centerlist'] = $this->db->get('center_user')->result(); 
                }
                if($page_name=="addremedial")
                {
                    $page_data['exams'] = $this->Crud_model->exam_details();
                    $page_data['exam_type'] = $this->Crud_model->get_all_exam_type();
                    $page_data['degree'] = $this->Crud_model->get_all_degree();
                    $page_data['course'] = $this->Crud_model->get_all_course();
                    $page_data['semester'] = $this->Crud_model->get_all_semester();
                    //$page_data['centerlist'] = $this->db->get('center_user')->result(); 
                }
                if($page_name=="addremedial_schedual")
                {
                     $page_data['degree'] = $this->Crud_model->get_all_degree();
                    $page_data['course'] = $this->Crud_model->get_all_course();
                    $page_data['semester'] = $this->Crud_model->get_all_semester();
                    $page_data['time_table'] = $this->Crud_model->time_table();
                }
                if($page_name=="addfees" || $page_name=="addpayment" )
                {
                    $page_data['degree'] = $this->Crud_model->get_all_degree();
                    $page_data['course'] = $this->Crud_model->get_all_course();
                    $page_data['semester'] = $this->Crud_model->get_all_semester();
                    $page_data['fees_structure'] = $this->Crud_model->get_all_fees_structure();
                }
                if($page_name=="add_forum_topic" || $page_name=="modal_edit_forumtopic")
                {
                    $page_data['forum'] = $this->forum_model->getforum();
                }
                if($page_name=="add_forum_question")
                {
                    $page_data['forum'] = $this->forum_model->getforum();
                    $page_data['forum_topic'] = $this->forum_model->getforum_topic();
                    
                }
                if($page_name=="addassessment" || $page_name=="modal_edit_assessment")
                {
                    
                  $page_data['degree'] = $this->Crud_model->get_all_degree();
                    $page_data['course'] = $this->Crud_model->get_all_course();
                    $page_data['semester'] = $this->Crud_model->get_all_semester();
                     $page_data['batch'] = $this->Crud_model->get_all_bacth();
                }
                
		$this->load->view( 'backend/'.$account_type.'/'.$page_name.'.php' ,$page_data);		
		echo '<script src="http://192.168.1.13/smart_learn_dev/assets/js/neon-custom-ajax.js"></script>';
	}
	
}

