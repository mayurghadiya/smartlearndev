<?php

class Video_streaming extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function index() {
        $this->load->model('admin/Crud_model');

        if ($this->session->userdata('login_type') == 'admin') {
            $page_data['course'] = $this->Crud_model->get_all_course();
            $page_data['semester'] = $this->Crud_model->get_all_semester();
            $page_data['page_name'] = 'video_streaming';
        } elseif ($this->session->userdata('login_type') == 'student') {
            $page_data['page_name'] = 'video_streaming';
        } elseif ($this->session->userdata('login_type') == 'subadmin') {
            $page_data['course'] = $this->Crud_model->get_all_course();
            $page_data['semester'] = $this->Crud_model->get_all_semester();
            $page_data['page_name'] = 'video_streaming';
        }
        $page_data['degree'] = $this->Crud_model->get_all_degree();
        $this->load->view('backend/index', $page_data);
    }

    function create_private_broadcast() {
        if ($_POST['url_link'] != '') {
            $url = $_POST['url_link'];
        } else {
            $url = '';
        }

        if ($this->session->userdata('login_type') == 'admin') {
            $is_active = 1;
        } else {
            $is_active = 0;
        }
        
        $this->db->insert('broadcast_and_streaming', array(
            'title' => $_POST['title'],
            'course' => $_POST['course'],
            'semester' => $_POST['semester'],
            'url_link' => $url,
            'is_active' => $is_active
        ));
    }

    function assign_live_stream() {
        $this->db->where('title', $_POST['title']);
        $this->db->update('broadcast_and_streaming', array(
            'course'    => $_POST['course'],
            'semester'  => $_POST['semester'],
            'is_active' => $_POST['is_active']
        ));
    }
    
    function in_active_streaming($id) {
        $this->db->where('title', $id);
        $this->db->update('broadcast_and_streaming', array(
            'is_active' => '0'
        ));
    }

}
