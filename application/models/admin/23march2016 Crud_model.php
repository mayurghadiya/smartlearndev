<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name') {
       // echo $type_id;
       return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }
  
	/*****
		Created : -- Brijesh
		Message :--  For subject section class name get 
	*****/	
	function get_class_name_by_id($type, $type_id = '', $field = 'name_numeric') {
        return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }	
	/* End Code */
	
	
	
	/* End Code */

    ////////STUDENT/////////////
    function get_students($class_id) {
        $query = $this->db->get_where('student', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_student_info($student_id) {
        $query = $this->db->get_where('student', array('student_id' => $student_id));
        return $query->result_array();
    }

    

    //////////SUBJECT/////////////
    function get_subjects() {
        $query = $this->db->get('subject');
        return $query->result_array();
    }

    function get_subject_info($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id));
        return $query->result_array();
    }

    function get_subjects_by_class($class_id) {
        $query = $this->db->get_where('subject', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_subject_name_by_id($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
        return $query->name;
    }

   
    //////////EXAMS/////////////
    function get_exams() {
        $query = $this->db->get('exam');
        return $query->result_array();
    }

    function get_exam_info($exam_id) {
        $query = $this->db->get_where('exam', array('exam_id' => $exam_id));
        return $query->result_array();
    }

    //////////GRADES/////////////
    function get_grades() {
        $query = $this->db->get('grade');
        return $query->result_array();
    }

    function get_grade_info($grade_id) {
        $query = $this->db->get_where('grade', array('grade_id' => $grade_id));
        return $query->result_array();
    }

    function get_grade($mark_obtained) {
        $query = $this->db->get('grade');
        $grades = $query->result_array();
        foreach ($grades as $row) {
            if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
                return $row;
        }
    }

    function create_log($data) {
        $data['timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
        $data['ip'] = $_SERVER["REMOTE_ADDR"];
        $location = new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/' . $_SERVER["REMOTE_ADDR"]));
        $data['location'] = $location->City . ' , ' . $location->CountryName;
        $this->db->insert('log', $data);
    }

    function get_system_settings() {
        $query = $this->db->get('settings');
        return $query->result_array();
    }

    ////////IMAGE URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';
        return $image_url;
    }
	
	/**
     * Get all student information
     * 
     * @return array
     */
    function get_all_students() {
        return $this->db->select()
                        ->from('student')
                        ->get()
                        ->result();
    }

    /**
     * List of all student which is belogs to particular course
     * @param int $course_id
     * @return array
     */
    function course_students($course_id) {
        return $this->db->select()
                        ->from('student')
                        ->where('course_id', $course_id)
                        ->get()
                        ->result();
    }

    /**
     * Student list by course and semester
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function student_list_by_course_semester($course_id, $semester_id) {
        return $this->db->get_where('student', array(
                    'course_id' => $course_id,
                    'semester_id' => $semester_id
                ))->result();
    }

    /// Admin ///
    function admin_detail() {
        return $this->db->select()
                        ->from('admin')
                        ->get()
                        ->row();
    }

    /// Email ///
    /**
     * Store the email data
     * 
     * @param array $name email data
     * @return int last insert id
     */
    function store_email($data) {
        $insert_id = $this->db->insert('email', $data);

        return $insert_id;
    }

    /**
     * My email inbox
     * @param string $email
     * @return array
     */
    function my_inbox($email) {
        return $this->db->select()
                        ->from('email')
                        ->where('email_to', $email)
                        ->get()
                        ->result();
    }

    /**
     * My sent email list
     * @param string $email
     * @return array
     */
    function my_sent_mail($email) {
        return $this->db->select()
                        ->from('email')
                        ->where('email_from', $email)
                        ->where('is_draft', 0)
                        ->get()
                        ->result();
    }

    /**
     * View my all drafts email
     * @param string $email
     * @return array
     */
    function my_drafts($email) {
        return $this->db->select()
                        ->from('email')
                        ->where('email_from', $email)
                        ->where('is_draft', 1)
                        ->get()
                        ->result();
    }

    /**
     * View email
     * @param int $id
     * @return array type
     */
    function view_mail($id) {
        return $this->db->select()
                        ->from('email')
                        ->where('email_id', $id)
                        ->get()
                        ->row();
    }

    /**
     * Delete email
     * @param int $id
     */
    function delete_email($id) {
        $this->db->where('email_id', $id);
        $this->db->delete('email');
    }

    /**
     * Get all exams
     * @return array
     */
    function get_all_exam() {
        return $this->db->select()
                        ->from('exam_manager')
                        ->get()
                        ->result();
    }

    /**
     * Get all exam types
     * @return array
     */
    function get_all_exam_type() {
        return $this->db->select()
                        ->from('exam_type')
                        ->where('status', 1)
                        ->get()
                        ->result();
    }

    /**
     * Get all course
     * @return array
     */
    function get_all_course() {
        return $this->db->select()
                        ->from('course')
                        ->get()
                        ->result();
    }

    /**
     * Get all semester
     * @return array
     */
    function get_all_semester() {
        return $this->db->select()
                        ->from('semester')
                        ->get()
                        ->result();
    }

    /**
     * Insert exam
     * @param array $data
     * @return int
     */
    function insert_exam($data) {
        $insert_id = $this->db->insert('exam_manager', $data);

        return $insert_id;
    }

    /**
     * Update exam detail
     * @param int $id
     * @param array $data
     * @return int
     */
    function update_exam($id, $data) {
        $this->db->where('em_id', $id);
        $insert_id = $this->db->update('exam_manager', $data);

        return $insert_id;
    }

    /**
     * All exam detail
     * @return array
     */
    function exam_details() {
        return $this->db->select('exam_manager.*, exam_type.*, course.*, semester.*')
                        ->from('exam_manager')
                        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->get()
                        ->result();
    }

    function single_exam_detail($id) {
        return $this->db->select('exam_manager.*, exam_type.*, course.*, semester.*')
                        ->from('exam_manager')
                        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->where('exam_manager.em_id', $id)
                        ->get()
                        ->result();
    }

    /**
     * Update email read status
     * @param int $id
     * @param array $status
     * @return int
     */
    function update_email_read_status($id, $data) {
        $this->db->where('email_id', $id);
        $this->db->update('email', $data);
    }

    ///// Payment Gateway Configuration //////

    function authorize_net_config() {
        return $this->db->select()
                        ->from('authorize_net')
                        ->get()
                        ->result();
    }

    /**
     * Update authorize payment gateway info
     * @param int $id
     * @param array $data
     */
    function authorize_net_config_update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('authorize_net', $data);
    }

    /**
     * Authorized payment gateway insert
     * @param array $data
     * @return int
     */
    function authorize_net_config_insert($data) {
        $id = $this->db->insert('authorize_net', $data);
        return $id;
    }

    ///// Degree /////
    function get_all_degree() {
        return $this->db->select()
                        ->from('degree')
                        ->get()
                        ->result();
    }

    //// Batch /////
    function get_all_bacth() {
        return $this->db->select()
                        ->from('batch')
                        ->get()
                        ->result();
    }

    //// Admission type /////
    function get_all_admission_type() {
        return $this->db->select()
                        ->from('admission_type')
                        ->get()
                        ->result();
    }

    ///// CMS Manager /////
    /**
     * CMS manager
     * @param array $data
     * @param int/NULL $id
     * @return int
     */
    function cms_manager_save($data, $id = NULL) {
        if ($id == NULL) {
            //insert
            $insert_id = $this->db->insert('cms_pages', $data);
        } else {
            //update
            $this->db->where('am_id', $id);
            $insert_id = $this->db->update('cms_pages', $data);
        }

        return $insert_id;
    }

    /**
     * Get all cms pages 
     * @return array
     */
    function get_all_cms_pages() {
        return $this->db->select()
                        ->from('cms_pages')
                        ->join('course', 'course.course_id = cms_pages.am_course')
                        ->join('semester', 'semester.s_id = cms_pages.am_semester')
                        ->join('batch', 'batch.b_id = cms_pages.am_batch')
                        ->get()
                        ->result();
    }

    //// Exam time table /////
    /**
     * Get time table list
     * @return array
     */
    function time_table() {
        return $this->db->select()
                        ->from('exam_time_table')
                        ->join('exam_manager', 'exam_manager.em_id = exam_time_table.exam_id')
                        ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->get()
                        ->result();
    }

    /**
     * Get exam list
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function get_exam_list($course_id, $semester_id) {
        return $this->db->get_where('exam_manager', array(
                            'course_id' => $course_id,
                            'em_semester' => $semester_id
                        ))
                        ->result();
    }

    /**
     * Create or update time table
     * @param array $data
     * @param int $id
     * @return int
     */
    function exam_time_table_save($data, $id = NULL) {
        if ($id == NULL) {
            //create
            $insert_id = $this->db->insert('exam_time_table', $data);
        } else {
            //update
            $this->db->where('exam_time_table_id', $id);
            $insert_id = $this->db->update('exam_time_table', $data);
        }

        return $insert_id;
    }

    ///// Exam Manager //////
    function exam_detail($exam_id) {
        return $this->db->get_where('exam_manager', array(
                    'em_id' => $exam_id
                ))->result();
    }

    /**
     * Subject list by course and semester
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function subject_list($course_id, $semester_id) {
        return $this->db->get_where('subject_manager', array(
                    'sm_course_id' => $course_id,
                    'sm_sem_id' => $semester_id
                ))->result();
    }

    /**
     * Student exam mark
     * @param array $where
     * @return array
     */
    function student_exam_mark($where) {
        return $this->db->get_where('marks_manager', $where)->row();
    }

    /**
     * Insert marks of the exam 
     * @param array $data
     * @return int
     */
    function mark_insert($data) {
        $insert_id = $this->db->insert('marks_manager', $data);

        return $insert_id;
    }

    /**
     * Update marks of the exam
     * @param array $data
     * @param array $where
     * @return int
     */
    function mark_update($data, $where) {
        $this->db->where($where);
        $insert_id = $this->db->update('marks_manager', $data);

        return $insert_id;
    }

    ///// Fees Structure /////
    /**
     * Get all fees structure
     * @return array
     */
    function get_all_fees_structure() {
        return $this->db->select()
                        ->from('fees_structure')
                        ->join('course', 'course.course_id = fees_structure.course_id')
                        ->join('semester', 'semester.s_id = fees_structure.sem_id')
                        ->get()
                        ->result();
    }

    /**
     * Insert or update fees structure
     * @param array $data
     * @param int $id
     * @return int
     */
    function fees_structure_save($data, $id = NULL) {
        if ($id == NULL) {
            //create
            $insert_id = $this->db->insert('fees_structure', $data);
        } else {
            //update
            $this->db->where('fees_structure_id', $id);
            $insert_id = $this->db->update('fees_structure', $data);
        }

        return $insert_id;
    }

    /**
     * Course and semester fees structure
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function course_semester_fees_structure($course_id, $semester_id) {
        return $this->db->select()
                        ->from('fees_structure')
                        ->where(array(
                            'course_id' => $course_id,
                            'sem_id' => $semester_id
                        ))
                        ->get()
                        ->result();
    }

    /**
     * Single fees structure details
     * @param int $id
     * @return object
     */
    function fees_structure_details($id) {
        return $this->db->select()
                        ->from('fees_structure')
                        ->where('fees_structure_id', $id)
                        ->get()
                        ->row();
    }

    /**
     * Exam subjects
     * @param int $exam_id
     * @return array
     */
    function exam_subjects($exam_id) {
        return $this->db->select('subject_manager.sm_id, subject_manager.subject_name')
                        ->from('subject_manager')
                        ->join('exam_time_table', 'exam_time_table.subject_id = subject_manager.sm_id')
                        ->where('exam_time_table.exam_id', $exam_id)
                        ->get()
                        ->result();
    }

    /**
     * All student fees details
     */
    function all_student_fees() {
        return $this->db->select()
                        ->from('student_fees')
                        ->join('fees_structure', 'fees_structure.fees_structure_id = student_fees.fees_structure_id')
                        ->join('student', 'student.std_id = student_fees.student_id')
                        ->join('course', 'course.course_id = student_fees.course_id')
                        ->join('semester', 'semester.s_id = student_fees.sem_id')
                        ->get()
                        ->result();
    }

    /**
     * Save the student fees data
     * @param array $data
     * @return int
     */
    function student_fees_save($data) {
        $this->db->insert('student_fees', $data);
        return $this->db->insert_id();
    }		/**     * Get all student by course and semester     * @param int $course_id     * @param int $semester_id     * @return array     */    function course_semester_student($course_id, $semester_id) {        return $this->db->select()                        ->from('student')                        ->where(array(                            'course_id' => $course_id,                            'semester_id' => $semester_id                        ))                        ->get()                        ->result();    }        /**     * Get all teachers     * @return array     */    function get_all_teacher() {        return $this->db->get('teacher')->result();    }        /**     * Get all admin details     */    function get_all_admin() {        return $this->db->get('admin')->result();    }
	
}
