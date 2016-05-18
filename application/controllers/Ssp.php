<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ssp extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('datatables');
        $this->load->library('table');
        $this->load->database();
    }

    function index() {
        //set table id in table open tag
        $tmpl = array('table_open' => '<table id="big_table" border="1" cellpadding="2" cellspacing="1" class="mytable">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('ID','FirstName', 'LastName', 'Email');

        $this->load->view('subscriber_view');
    }

    function datatable() {
        $this->datatables->select('std_id,email,name,std_first_name')
                //->unset_column('std_id')
                ->from('student');

        echo $this->datatables->generate();
    }

}
