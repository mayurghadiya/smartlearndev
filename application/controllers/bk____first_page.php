<?php

class first_page extends CI_Controller {

    function __construct() {
        parent::__construct();
        // path to simple_html_dom 
    }

    function php() {
        $this->load->view('page_php');
    }

    function css() {
        $this->load->view('page_css');
    }
    function javascript() {
        $this->load->view('page_javascript');
    }

    function codeigniter() {
        $this->load->view('page_codeigniter');
    }

    function html5() {
        $this->load->view('page_html5');
    }

    function mysql() {
        $this->load->view('page_mysql');
    }

    function mailget() {
        $this->load->view('page_mailget');
    }
 function others() {
        $this->load->view('page_others');
    }

}

?>