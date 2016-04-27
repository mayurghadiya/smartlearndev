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
     * Get all Syllabus
     * @return mixed
     */
    function get_all_syllabus() {
        return $this->db->get('smart_syllabus')->result();
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

    /**
     * Get recent events
     * @return mixed
     */
    function events() {
        $this->db->limit(3);
        $this->db->order_by('event_date', 'DESC');

        return $this->db->get('event_manager')->result();
    }

    function banners() {
        $this->db->where('banner_status', '1');
        return $this->db->get('banner_slider')->result();
    }

    /**
     * Get recent graduates
     * @return mixed
     */
    function recent_graduates() {
        return $this->db->select()
                        ->from('graduates')
                        ->join('student', 'student.std_id = graduates.student_id')
                        ->join('degree', 'degree.d_id = graduates.degree_id')
                        ->join('course', 'course.course_id = graduates.course_id')
                        ->join('batch', 'batch.b_id = graduates.batch_id')
                        ->join('semester', 'semester.s_id = graduates.semester_id')
                        ->limit(10)
                        ->order_by('graduates_id', 'DESC')
                        ->get()
                        ->result();
    }

}
