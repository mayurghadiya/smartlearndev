<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Professor_Controller extends MY_Controller {

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->check_professor_login();
    }
    
    /**
     * Check for professor login 
     */
    function check_professor_login() {
        if ((!$this->session->userdata('professor_login')) &&
                ($this->session->userdata('login_type') != 'professor'))
            redirect(base_url('site/user_login'));
    }

}
