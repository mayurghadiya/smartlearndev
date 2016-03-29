<?php

class Pages extends CI_Controller {

    public function view($page = '') {
        $this->load->database();
        $this->load->library('session');

        /* cache control */
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        /* if ( ! file_exists('application/views/pages/'.$page.'.php'))
          {
          // Whoops, we don't have a page for that!
          show_404();
          } */

        $data['news'] = $this->db->get_where('cms_manager', array('c_status' => 1))->result_array();

        //$data['title'] = ucfirst($page); // Capitalize the first letter
        // $this->load->view('includes/header', $data);	$this->chat_new();	
        $this->load->view('backend/student/pages/' . $page, $data);
        //$this->load->view('templates/footer', $data);
    }

    function chat_new() {
        $page_data['page_name'] = 'schat';        //$page_data['page_title'] = get_phrase('Chat');		$this->load->view('schat', $page_data);	}	
    }
    