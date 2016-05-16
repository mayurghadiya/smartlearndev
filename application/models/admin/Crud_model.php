<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /*     * ****  
      Created :-- Mayur Panchal
      Message : -- For get question title

     * ** */

    function getquestion($table, $question = '', $field = 'question') {

        return $this->db->get_where($table, array('sq_id' => $question))->row()->$field;
    }

    /*  End code */

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        // echo $type_id;
        return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }

    /*     * ***
      Created : -- Brijesh
      Message :--  For subject section class name get
     * *** */

    function get_class_name_by_id($type, $type_id = '', $field = 'name_numeric') {
        return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }

    /* End Code */

    /* Start syllabus */

    function update_syllabus($data, $id) {
        $this->db->update("smart_syllabus", $data, array("syllabus_id" => $id));
    }

    function delete_syllabus($id) {
        $this->db->where("syllabus_id", $id);
        $this->db->delete("smart_syllabus");
    }

    function getsyllabus($id) {
        $this->db->where("syllabus_id", $id);
        return $this->db->get('smart_syllabus')->result();
    }

    function get_syllabus() {
        return $this->db->get('smart_syllabus')->result();
    }

    function add_syllabus($data) {
        $this->db->insert("smart_syllabus", $data);
    }

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
    function student_list_by_course_semester($degree_id, $course_id, $batch_id, $semester_id) {
        return $this->db->get_where('student', array(
                    'std_degree' => $degree_id,
                    'course_id' => $course_id,
                    'std_batch' => $batch_id,
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
        return $this->db->select('exam_manager.*, exam_type.*, course.*, semester.*, batch.*, degree.*')
                        ->from('exam_manager')
                        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->join('batch', 'batch.b_id = exam_manager.batch_id')
                        ->join('degree', 'degree.d_id = exam_manager.degree_id')
                        ->order_by('em_date', 'DESC')
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
                        ->join('degree', 'degree.d_id = cms_pages.degree_id')
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
                        ->join('batch', 'batch.b_id = exam_time_table.batch_id')
                        ->join('degree', 'degree.d_id = exam_time_table.degree_id')
                        ->order_by('em_date', 'DESC')
                        ->get()
                        ->result();
    }

    /**
     * Get exam list
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function get_exam_list($degree_id, $course_id, $batch_id, $semester_id) {
        return $this->db->get_where('exam_manager', array(
                            'course_id' => $course_id,
                            'em_semester' => $semester_id,
                            'degree_id' => $degree_id,
                            'batch_id' => $batch_id,
                            'exam_ref_name' => 'reguler'
                        ))
                        ->result();
    }

    /**
     * All exam list
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function all_exam_list($course_id, $semester_id) {
        return $this->db->get_where('exam_manager', array(
                            'course_id' => $course_id,
                            'em_semester' => $semester_id,
                        ))
                        ->result();
    }

    /**
     * Get remedial exam list
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function get_remedial_exam_list($course_id, $semester_id) {
        $this->db->order_by('em_date', 'DESC');
        return $this->db->get_where('exam_manager', array(
                            'course_id' => $course_id,
                            'em_semester' => $semester_id,
                            'exam_ref_name' => 'remedial'
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
                        ->join('batch', 'batch.b_id = fees_structure.batch_id')
                        ->join('degree', 'degree.d_id = fees_structure.degree_id')
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
                        ->join('degree', 'degree.d_id = student.std_degree')
                        ->join('batch', 'batch.b_id = student.std_batch')
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
    }

    /**
     * Get all student by course and semester
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function course_semester_student($course_id, $semester_id) {
        return $this->db->select()
                        ->from('student')
                        ->where(array(
                            'course_id' => $course_id,
                            'semester_id' => $semester_id
                        ))
                        ->get()
                        ->result();
    }

    /**
     * Get all teachers
     * @return array
     */
    function get_all_teacher() {
        return $this->db->get('professor')->result();
    }

    /**
     * Get all admin details
     */
    function get_all_admin() {
        return $this->db->get('admin')->result();
    }

    /**
     * Start or stop live streaming
     * @param string $stream_name
     * @param string $status
     */
    function start_stop_streaming($stream_name, $status) {
        if ($status == 'Start') {
            $is_active = 1;
        } else {
            $is_active = 0;
        }
        $this->db->where('title', $stream_name);
        $this->db->update('broadcast_and_streaming', array(
            'is_active' => $is_active
        ));
    }

    /**
     * Get course details
     * @param int $course_id
     * @return object
     */
    function get_course_details($course_id) {
        return $this->db->get_where('course', array(
                    'course_id' => $course_id
                ))->row();
    }

    /**
     * Get semetser details
     * @param int $semester_id
     * @return object
     */
    function get_semetser_detail($semester_id) {
        return $this->db->get_where('semester', array(
                    's_id' => $semester_id
                ))->row();
    }

    /**
     * Course list by degree
     * @param int $degree_id
     * @return array
     */
    function course_list_from_degree($degree_id) {
        return $this->db->get_where('course', array(
                    'degree_id' => $degree_id
                ))->result();
    }

    /**
     * Batch list from degree and course
     * @param int $degree
     * @param int $course
     * @return array
     */
    function batch_list_from_degree_and_course($degree, $course) {
        $query = "SELECT * FROM batch ";
        $query .= "WHERE FIND_IN_SET($degree, degree_id) ";
        $query .= "AND FIND_IN_SET($course, course_id)";
        $result = $this->db->query($query);

        return $result->result();
    }

    /**
     * Exam list from degree, course, batch and course
     * @param int $degree
     * @param int $course
     * @param int $batch
     * @param int $semester
     * @return array
     */
    function exam_list_from_degree_and_course($degree, $course, $batch, $semester, $type) {
        return $this->db->get_where('exam_manager', array(
                    'degree_id' => $degree,
                    'course_id' => $course,
                    'batch_id' => $batch,
                    'em_semester' => $semester,
                    'exam_ref_name' => $type
                ))->result();
    }

    /**
     * Subject list from course and semester
     * @param int $course
     * @param int $semester
     * @return array
     */
    function subject_list_from_course_and_semester($course, $semester) {
        return $this->db->get_where('subject_manager', array(
                    'sm_course_id' => $course,
                    'sm_sem_id' => $semester
                ))->result();
    }

    /**
     * Exam time table subject list
     * @param int $exam_id
     * @return array
     */
    function exam_time_table_subject_list($exam_id) {
        return $this->db->select()
                        ->from('exam_time_table')
                        ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
                        ->where('exam_time_table.exam_id', $exam_id)
                        ->get()
                        ->result();
    }

    /**
     * Check for duplication of fees structure
     * @param int $degree
     * @param int $course
     * @param int $batch
     * @param int $sem
     * @param string $title
     * @return object
     */
    function fees_structure_duplication($degree, $course, $batch, $sem, $title) {
        return $this->db->get_where('fees_structure', array(
                    'degree_id' => $degree,
                    'course_id' => $course,
                    'batch_id' => $batch,
                    'sem_id' => $sem,
                    'title' => $title
                ))->row();
    }

    /**
     * Check exam duplication
     * @param int $degree
     * @param int $course
     * @param int $batch
     * @param int $sem
     * @param string $title
     * @return object
     */
    function exam_duplication_check($degree, $course, $batch, $sem, $title) {
        return $this->db->get_where('exam_manager', array(
                    'degree_id' => $degree,
                    'course_id' => $course,
                    'batch_id' => $batch,
                    'em_semester' => $sem,
                    'em_name' => $title
                ))->row();
    }

    /**
     * Time table duplication
     * @param int $exam
     * @param int $subject
     * @return object
     */
    function exam_time_table_duplication($exam, $subject) {
        return $this->db->get_where('exam_time_table', array(
                    'exam_id' => $exam,
                    'subject_id' => $subject
                ))->row();
    }

    /**
     * Check duplication for cms pages
     * @param int $degree
     * @param int $course
     * @param int $batch
     * @param int $sem
     * @param string $title
     * @return object
     */
    function cms_page_duplication($degree, $course, $batch, $sem, $title) {
        return $this->db->get_where('cms_pages', array(
                    'degree_id' => $degree,
                    'am_course' => $course,
                    'am_batch' => $batch,
                    'am_semester' => $sem,
                    'am_title' => $title
                ))->row();
    }

    /**
     * Get all grade
     * @return array
     */
    function grade() {
        return $this->db->get('grade')->result();
    }

    /**
     * Insert or update grade
     * @param int $id
     * @param array $data
     */
    function save_grade($data, $id = NULL) {
        if ($id == NULL) {
            //create
            $this->db->insert('grade', $data);
        } else {
            //update
            $this->db->where('grade_id', $id);
            $this->db->update('grade', $data);
        }
    }

    /**
     * Get semesters from branch
     * @param int $branch_id
     */
    function get_semesters_of_branch($branch_id) {
        $course = $this->get_course_details($branch_id);
        $sem_ids = explode(',', $course->semester_id);
        $semester = $this->db->select()
                ->from('semester')
                ->where_in('s_id', $sem_ids)
                ->get()
                ->result();

        return $semester;
    }

    /**
     * Get exam list by course, branch, batch, semester
     * @param string $course
     * @param string $branch
     * @param string $batch
     * @param string $semester
     * @return array
     */
    function get_exam_list_data($course, $branch, $batch, $semester, $type) {
        return $this->db->get_where('exam_manager', array(
                    'degree_id' => $course,
                    'course_id' => $branch,
                    'batch_id' => $batch,
                    'em_semester' => $semester,
                    'exam_ref_name' => $type
                ))->result();
    }

    /**
     * Exam types
     * @return array
     */
    function exam_types() {
        return $this->db->select()
                        ->from('exam_type')
                        ->get()
                        ->result();
    }

    /**
     * Save remedial exam 
     * @param array $data
     * @param string $id
     * @return int
     */
    function save_remedial_exam($data, $id = NULL) {
        $insert_id = 0;
        if ($id == NULL) {
            //insert
            $this->db->insert('exam_manager', $data);
            $insert_id = $this->db->insert_id();
        } else {
            //update
            $this->db->where('em_id', $id);
            $this->db->update('exam_manager', $data);
            $insert_id = $this->db->insert_id();
        }

        return $insert_id;
    }

    /**
     * Remedial exam lists
     * @return array
     */
    function remedial_exam_list() {
        return $this->db->select('exam_manager.*, exam_type.*, course.*, semester.*, batch.*, degree.*')
                        ->from('exam_manager')
                        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->join('batch', 'batch.b_id = exam_manager.batch_id')
                        ->join('degree', 'degree.d_id = exam_manager.degree_id')
                        ->where('exam_manager.exam_ref_name', 'remedial')
                        ->get()
                        ->result();
    }

    /**
     * Remedial exam schedule
     * @return array
     */
    function remedial_exam_schedule() {
        return $this->db->select()
                        ->from('exam_time_table')
                        ->join('exam_manager', 'exam_manager.em_id = exam_time_table.exam_id')
                        ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->join('batch', 'batch.b_id = exam_time_table.batch_id')
                        ->join('degree', 'degree.d_id = exam_time_table.degree_id')
                        ->where('exam_manager.exam_ref_name', 'remedial')
                        ->get()
                        ->result();
    }

    /**
     * Remedial exam student list
     * @param int $exam_id
     * @param int $passing Passing marks for an exam
     * @return array
     */
    function remedial_exam_student_list($exam_id, $passing_marks) {
        return $this->db->select()
                        ->from('marks_manager')
                        ->join('student', 'student.std_id = marks_manager.mm_std_id')
                        ->where(array(
                            'mm_exam_id' => $exam_id,
                            'mark_obtained < ' => $passing_marks
                        ))->group_by('marks_manager.mm_std_id')->get()->result();
    }

    /**
     * Failed student subject list
     * @param int $exam_id
     * @param int $student_id
     * @param int $passing_marks
     * @return array
     */
    function remedial_exam_student_subject($exam_id, $student_id, $passing_marks) {
        return $this->db->select()
                        ->from('marks_manager')
                        ->where(array(
                            'mm_std_id' => $student_id,
                            'mm_exam_id' => $exam_id,
                            'mark_obtained < ' => $passing_marks
                        ))->get()->result();
    }

    /**
     * Event manager
     * @return array
     */
    function event_manager() {
        return $this->db->select()
                        ->from('event_manager')
                        ->order_by('event_date', 'DESC')
                        ->get()
                        ->result_array();
    }

    /**
     * Get all subscriber
     * @return array
     */
    function subscriber() {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('subscriber')->result();
    }

    /**
     * Delete subscriber
     * @param string $id
     */
    function delete_subscriber($id) {
        $this->db->delete('subscriber', array(
            'id' => $id
        ));
    }

    /**
     * Save exam seat no 
     * @param mixed $data
     * @return int
     */
    function save_exam_seat_no($data) {
        $this->db->insert('exam_seat_no', $data);

        return $this->db->insert_id();
    }

    /**
     * Custom stduents details to generate seat no
     * @param mixed $where
     * @return object
     */
    function custom_student_details($where) {
        return $this->db->select('std_id, semester_id, std_degree, course_id')
                        ->from('student')
                        ->where($where)
                        ->get()
                        ->result();
    }

    /**
     * Student list from degree, course, batch, and semester
     * @param string $degree
     * @param string $course
     * @param string $batch
     * @param string $semester
     * @return mixed
     */
    function student_list_from_degree_course_batch_semester($degree, $course, $batch, $semester) {
        return $this->db->get_where('student', array(
                    'std_degree' => $degree,
                    'course_id' => $course,
                    'std_batch' => $batch,
                    'semester_id' => $semester
                ))->result();
    }

    /**
     * Insert or update graduates
     * @param mixed $data
     * @param string $id
     */
    function save_graduates($data, $id = NULL) {
        if ($id) {
            //update
            $this->db->update('graduates', $data, array(
                'graduates_id' => $id
            ));
        } else {
            //insert
            $this->db->insert('graduates', $data);
        }
    }

    /**
     * Get all graduates
     * @return mixed
     */
    function get_all_graduates() {
        return $this->db->select()
                        ->from('graduates')
                        ->join('student', 'student.std_id = graduates.student_id')
                        ->join('degree', 'degree.d_id = graduates.degree_id')
                        ->join('course', 'course.course_id = graduates.course_id')
                        ->join('semester', 'semester.s_id = graduates.semester_id')
                        ->order_by('graduates.created_at', 'DESC')
                        ->get()
                        ->result();
    }

    /**
     * Insert or update charity fund
     * @param mixed $data
     * @param string $id
     * @return int
     */
    function save_charity_fund($data, $id = NULL) {
        $insert_id = 0;
        if ($id) {
            //update
            $this->db->update('charity_fund', $data, array(
                'charity_fund_id' => $id
            ));
            $insert_id = $this->db->insert_id();
        } else {
            //insert            
            $this->db->insert('charity_fund', $data);
            $insert_id = $this->db->insert_id();
        }

        return $insert_id;
    }

    /**
     * Get graduates students
     * @param string $id
     */
    function get_graduate_student($id) {
        $this->db->get_where('graduates', array("graduates_id" => $id))->result();
    }

    /**
     * Get filter exam
     * @param type $degree
     * @param type $course
     * @param type $batch
     * @param type $semester
     * @return type
     */
    function get_exam_filter($degree, $course, $batch, $semester) {
        return $this->db->select('exam_manager.*, exam_type.*, course.*, semester.*, batch.*, degree.*')
                        ->from('exam_manager')
                        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->join('batch', 'batch.b_id = exam_manager.batch_id')
                        ->join('degree', 'degree.d_id = exam_manager.degree_id')
                        ->where(array(
                            'exam_manager.degree_id' => $degree,
                            'exam_manager.course_id' => $course,
                            'exam_manager.batch_id' => $batch,
                            'exam_manager.em_semester' => $semester
                        ))
                        ->order_by('em_date', 'DESC')
                        ->get()
                        ->result();
    }

    /**
     * Exam schedule filter
     * @param string $degree
     * @param string $course
     * @param string $batch
     * @param string $semester
     * @param string $exam
     * @return mixed
     */
    function exam_schedule_filter($degree, $course, $batch, $semester, $exam) {
        return $this->db->select()
                        ->from('exam_time_table')
                        ->join('exam_manager', 'exam_manager.em_id = exam_time_table.exam_id')
                        ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->join('batch', 'batch.b_id = exam_time_table.batch_id')
                        ->join('degree', 'degree.d_id = exam_time_table.degree_id')
                        ->where(array(
                            'exam_time_table.degree_id' => $degree,
                            'exam_time_table.course_id' => $course,
                            'exam_time_table.batch_id' => $batch,
                            'exam_time_table.semester_id' => $semester,
                            'exam_time_table.exam_id' => $exam
                        ))
                        ->order_by('em_date', 'DESC')
                        ->get()
                        ->result();
    }

    /**
     * Fee structure filter
     * @param string $degree
     * @param string $course
     * @param string $batch
     * @param string $semeter
     * @return mixed
     */
    function fee_structure_filter($degree, $course, $batch, $semeter) {
        return $this->db->select()
                        ->from('fees_structure')
                        ->join('course', 'course.course_id = fees_structure.course_id')
                        ->join('semester', 'semester.s_id = fees_structure.sem_id')
                        ->join('batch', 'batch.b_id = fees_structure.batch_id')
                        ->join('degree', 'degree.d_id = fees_structure.degree_id')
                        ->where(array(
                            'fees_structure.degree_id' => $degree,
                            'fees_structure.course_id' => $course,
                            'fees_structure.batch_id' => $batch,
                            'fees_structure.sem_id' => $semeter
                        ))->order_by('created_at', 'DESC')
                        ->get()
                        ->result();
    }

    /**
     * Professor list
     * @return mixed
     */
    function professor() {
        return $this->db->get('professor')->result();
    }

    /**
     * Insert or update professor information
     * @param mixed $data
     * @param int $id
     * @return int
     */
    function save_professor($data, $id = NULL) {
        $insert_id = 0;
        if ($id) {
            //update
            $this->db->where('professor_id', $id);
            $this->db->update('professor', $data);
            $insert_id = $this->db->insert_id();
        } else {
            $this->db->insert('professor', $data);
            $insert_id = $this->db->insert_id();
        }

        return $insert_id;
    }

    /**
     * Class routine professor list
     * @param string $subject_id
     * @return mixed
     */
    function class_routine_professor($subject_id) {
        $subject = $this->db->select()
                        ->from('subject_manager')
                        ->where([
                            'sm_id' => $subject_id
                        ])->get()->row();

        $professors = explode(',', $subject->professor_id);

        return $this->db->select()
                        ->from('professor')
                        ->where_in('professor_id', $professors)->get()->result();
    }

    /**
     * Filtered class routine
     * @param mixed $where
     * @return mixed
     */
    function filtered_class_routine($where) {
        return $this->db->get_where('class_routine', $where)->result();
    }

    /**
     * Professor based on department and branch
     * @param string $department
     * @param string $branch
     * @return mixed
     */
    function professor_by_department_and_branch($department, $branch) {
        return $this->db->get_where('professor', [
                    'department' => $department,
                    'branch' => $branch
                ])->result();
    }

    /*
     * 
     * Created by mayur panchal
     * Message : -- for get assessments
     */

    public function assessment() {
        return $this->db->get('assessments')->result_array();
    }

    public function create_assessment($data) {
        $this->db->insert("assessments", $data);
    }

    public function update_assessment($data, $id) {
        $this->db->update("assessments", $data, array("assessment_id" => $id));
    }

    public function delete_assessment($id) {
        $this->db->delete("assessments", array("assessment_id" => $id));
    }

    /**
     * Class list
     * @return mixed
     */
    function class_list() {
        return $this->db->get('class')->result();
    }

    /**
     * Student list by course and semester
     * @param int $course_id
     * @param int $semester_id
     * @return array
     */
    function student_list_by_department_course_batch_semester_class($degree_id, $course_id, $batch_id, $semester_id, $class_id) {
        return $this->db->select('std_id, email, std_first_name, std_last_name, std_roll')->from('student')->where(array(
                    'std_degree' => $degree_id,
                    'course_id' => $course_id,
                    'std_batch' => $batch_id,
                    'semester_id' => $semester_id,
                    'class_id' => $class_id
                ))->order_by('std_first_name', 'ASC')->get()->result();
    }

    /**
     * Save student attendance
     * @param mixed $data
     * @param string $id
     * @return int
     */
    function save_student_attendance($data, $id = NULL) {
        $insert_id = 0;
        if ($id) {
            //update
            $this->db->where('attendance_id', $id);
            $this->db->update('attendance', $data);
        } else {
            //insert
            $this->db->insert('attendance', $data);
            $insert_id = $this->db->insert_id();
        }

        return $insert_id;
    }

    /**
     * 
     * @param string $department
     * @param string $branch
     * @param string $batch
     * @param string $semester
     * @param string $class
     * @param string $class_routine
     * @param string $date
     * @param string $student
     * @return int
     */
    function check_attendance_status($department, $branch, $batch, $semester, $class, $class_routine, $date, $student) {        
        return $this->db->select('attendance_id, is_present, student_id')
                        ->from('attendance')
                        ->where(array(
                            'department_id' => $department,
                            'branch_id' => $branch,
                            'batch_id' => $batch,
                            'semester_id' => $semester,
                            'class_id' => $class,
                            'class_routine_id' => $class_routine,
                            'date_taken' => $date,
                            'student_id' => $student
                        ))->get()->row();
    }

}
