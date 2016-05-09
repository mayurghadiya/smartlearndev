<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
         public function __construct() {
             parent::__construct();
           $this->load->database();
        $this->load->library('session');
        if (!$this->session->userdata('admin_login'))
            redirect(base_url() . 'site/user_login', 'refresh');       
        /* cache control */
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->helper('notification');
        $this->load->model('forum_model');
         }
    
	public function index()
	{
            
        $page_data['page_name'] = 'forum';
        $page_data['page_title'] = 'Forum';
        $page_data['forum'] = $this->forum_model->getforum();
        $this->load->view('backend/index', $page_data);
	
	}
        
        function crud($param='',$id='')
        {
            if($param=="create")
            {
                $data['forum_title']  = $this->input->post("forum_title");
                $data['forum_status'] = $this->input->post("forum_status");
                $this->forum_model->create($data);
                  $this->session->set_flashdata('flash_message', 'Forum Added Successfully');
                redirect(base_url() . 'forum/', 'refresh');
            }
            if($param=="update")
            {
                $data['forum_title']  = $this->input->post("forum_title");
                $data['forum_status'] = $this->input->post("forum_status");
                $this->forum_model->update($data,$id);
                  $this->session->set_flashdata('flash_message', 'Forum Updated Successfully');
                redirect(base_url() . 'forum/', 'refresh');
            }
            if($param=="delete")
            {
                
                $this->forum_model->delete($id);
                  $this->session->set_flashdata('flash_message', 'Forum Deleted Successfully');
                redirect(base_url() . 'forum/', 'refresh');
            }
            
        }
        
        function forumtopics()
        {
            $page_data['page_name'] = 'forum_topic';
        $page_data['page_title'] = 'Forum Topic';
        $page_data['forum_topic'] = $this->forum_model->getforum_topic();
        $this->load->view('backend/index', $page_data);
        }
        
        function topicscrud($param='',$id = '')
        {
            if($param=="create")
            {
                $data['forum_topic_title'] = $this->input->post('topic_title');
                $data['forum_topic_status'] = $this->input->post('topic_status');
                $data['forum_id'] = $this->input->post('forum_id');
                
                $this->forum_model->create_topic($data);
                 $this->session->set_flashdata('flash_message', 'Forum Topic Added Successfully');
                redirect(base_url() . 'forum/forumtopics', 'refresh');
                
            }
             if($param=="update")
            {
                $data['forum_topic_title'] = $this->input->post('topic_title');
                $data['forum_topic_status'] = $this->input->post('topic_status');
                $data['forum_id'] = $this->input->post('forum_id');
                
                $this->forum_model->update_topic($data,$id);
                 $this->session->set_flashdata('flash_message', 'Forum Topic Updated Successfully');
                redirect(base_url() . 'forum/forumtopics', 'refresh');
                
            }
            if($param=="delete")
            {
                 $this->forum_model->forum_topicsdelete($id);
                  $this->session->set_flashdata('flash_message', 'Forum Topic Deleted Successfully');
                redirect(base_url() . 'forum/forumtopics', 'refresh');
            }
        }
        
        function question()
        {
            $page_data['page_name'] = 'forum_question';
        $page_data['page_title'] = 'Forum Question';
        $page_data['forum_question'] = $this->forum_model->getforum_question();
        $this->load->view('backend/index', $page_data);
            
        }
        
        function questioncrud($param='',$id='')
        {
             if($param=="create")
            {
                $data['forum_topic_id'] = $this->input->post('forum_topic_id');
                $data['forum_question'] = $this->input->post('question');
                $data['forum_que_status'] = $this->input->post('question_status');
                $data['forum_id'] = $this->input->post('forum_id');
                
                $this->forum_model->create_question($data);
                 $this->session->set_flashdata('flash_message', 'Forum Question Added Successfully');
                redirect(base_url() . 'forum/forumtopics', 'refresh');
                
            }
             if($param=="update")
            {
                $data['forum_topic_title'] = $this->input->post('topic_title');
                $data['forum_topic_status'] = $this->input->post('topic_status');
                $data['forum_id'] = $this->input->post('forum_id');
                
                $this->forum_model->update_topic($data,$id);
                 $this->session->set_flashdata('flash_message', 'Forum Topic Updated Successfully');
                redirect(base_url() . 'forum/forumtopics', 'refresh');
                
            }
            if($param=="delete")
            {
                 $this->forum_model->forum_topicsdelete($id);
                  $this->session->set_flashdata('flash_message', 'Forum Topic Deleted Successfully');
                redirect(base_url() . 'forum/forumtopics', 'refresh');
            }
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */