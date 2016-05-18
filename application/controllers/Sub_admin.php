<?php

class Sub_admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        
    }

    function dashboard() {
        $page_data['page_name'] = 'dashboard';
        $this->load->view('backend/index', $page_data);
    }
    
    function get_course_details($course_id) {
        $this->load->model('admin/Crud_model');
        $course = $this->Crud_model->get_course_details($course_id);
        echo $course->c_name;
    }
    
    function get_semetser_detail($semester_id) {
        $this->load->model('admin/Crud_model');
        $semester = $this->Crud_model->get_semetser_detail($semester_id);
        
        echo $semester->s_name;
    }

}
