<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends Professor_Controller {

    function __construct() {
        parent::__construct();
    }
    
    /**
     * Professor template file
     * @param string $view
     * @param string $data
     */
    function __template($view, $data) {
        $this->load->view('backend/professor/includes/header.php', $data);
        $this->load->view('backend/professor/' . $view);
        $this->load->view('backend/professor/includes/footer.php');
    }

    function index() {
        $data['page_name'] = 'dashboard';
        $data['title'] = 'Professor Dashboard';
        $this->__template('dashboard', $data);
    }
    
    function dashboard() {
        $this->index();
    }

}
