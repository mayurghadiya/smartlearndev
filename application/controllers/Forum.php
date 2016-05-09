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
                  $this->session->set_flashdata('flash_message', get_phrase('forum added successfully'));
                redirect(base_url() . 'forum/', 'refresh');
            }
            if($param=="update")
            {
                $data['forum_title']  = $this->input->post("forum_title");
                $data['forum_status'] = $this->input->post("forum_status");
                $this->forum_model->update($data,$id);
                  $this->session->set_flashdata('flash_message', get_phrase('forum Updated successfully'));
                redirect(base_url() . 'forum/', 'refresh');
            }
            if($param=="delete")
            {
                
                $this->forum_model->delete($id);
                  $this->session->set_flashdata('flash_message', get_phrase('forum Updated successfully'));
                redirect(base_url() . 'forum/', 'refresh');
            }
            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */