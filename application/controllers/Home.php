<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        date_default_timezone_set('Asia/Kolkata');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    public function index() {
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');

        if ($this->session->userdata('student_login') == 1)
            redirect(base_url() . 'index.php?student/dashboard', 'refresh');
        if ($this->session->userdata('subadmin_login') == 1) {
            redirect(base_url() . 'index.php?sub_admin/dashboard', 'refresh');
        }
        if ($this->session->userdata('centeruser_login') == 1) {
            redirect(base_url() . 'index.php?center_user/dashboard', 'refresh');
        }
        $this->load->view('backend/front');
    }

}
