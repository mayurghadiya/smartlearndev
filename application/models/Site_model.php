<?php

class Site_model extends CI_Model {

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all courses
     * @return mixed
     */
    
    function get_all_courses() {
        return $this->db->get('degree')->result();
    }
    
    /**
     * Course details
     * @param int $id
     * @return object
     */
    function course_details($id) {
        return $this->db->get_where('degree', array(
            'd_id' => $id
        ))->row();
    }
    
    /**
     * Course branch
     * @param int $id
     * @return mixed
     */
    function course_branch($id) {
        return $this->db->get_where('course', array(
            'degree_id' => $id
        ))->result();
    }
    
    /**
     * Branch details
     * @param int $id
     * @return object
     */
    function branch_details($id) {
        return $this->db->get_where('course', array(
            'course_id' => $id
        ))->row();
    }
    
    /**
     * Get all branch
     * @return mixed
     */
    function all_branch() {
        return $this->db->get('course')->result();
    }
    
    /**
     * Save subscriber
     * @param mixed $data
     * @return int
     */
    function save_subscriber($data) {
        $this->db->insert('subscriber', $data);
        
        return $this->db->insert_id();
    }
    
    /**
     * Check email is already present or not
     * @param string $email
     * @return int
     */
    function check_subscriber($email) {
        return $this->db->get_where('subscriber', array(
            'email' => $email
        ))->num_rows();
    }
}
