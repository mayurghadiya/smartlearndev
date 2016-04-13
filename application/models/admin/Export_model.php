<?php

class Export_model extends CI_Model {

    /**
     * Constructor
     * @return void
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Exam manager export 
     * @return object
     */
    function exam_manager() {
        //exam_manager em
        //exam_type et
        //course c
        //semester s
        //degree d
        //batch b
        $this->db->select('em.em_name AS Exam Name, '
                . 'em.total_marks AS Total Marks, em.passing_mark AS Passing Marks');
        $this->db->select('et.exam_type_name AS ExamType');
        $this->db->select('d.d_name AS Degree Name');
        $this->db->select('c.c_name AS Course Name, c.course_alias_id AS Course Alias');
        $this->db->select('b.b_name AS Batch Name');
        $this->db->select('s.s_name AS Semester');
        $this->db->from('exam_manager AS em');
        $this->db->join('exam_type AS et', 'et.exam_type_id = em.em_type');
        $this->db->join('degree AS d', 'd.d_id = em.degree_id');
        $this->db->join('course AS c', 'c.course_id = em.course_id');
        $this->db->join('batch AS b', 'b.b_id = em.batch_id');
        $this->db->join('semester AS s', 's.s_id = em.em_semester');
        
        return $this->db->get();
    }
    
    /**
     * Event manager export
     * @return object
     */
    function event_manager() {
        //event_manager em
        $this->db->select('em.event_name AS Event Name, em.event_desc AS Description,'
                . 'DATE_FORMAT(em.event_date, "%d %b %y") AS Date, TIME_FORMAT(em.event_date, "%h:%i%p") AS Time');
        $this->db->from('event_manager em');
        
        return $this->db->get();
    }
    
    /**
     * Course export
     * @return object
     */
    function course() {
        //course c
        //degree d
        $this->db->select('c.c_name AS Branch Name, c.course_alias_id AS Branch ID, '
                . 'c.c_description AS Description');
        $this->db->select('d.d_name AS Course Name');
        $this->db->from('course AS c');
        $this->db->join('degree AS d', 'd.d_id = c.degree_id');
        
        return $this->db->get();
    }
    
    /**
     * Degree export
     * @return object
     */
    function degree() {
        //degree d
        $this->db->select('d.d_name AS Course Name');
        $this->db->from('degree d');
        
        return $this->db->get();
    }
    
    /**
     * Semester export
     * @return object
     */
    function semester() {
        //semester s
        $this->db->select('s.s_name AS Semester Name');
        $this->db->from('semester s');
        
        return $this->db->get();
    }
    
    /**
     * Student export
     * @return object
     */
    function student() {
        //student s
        //course c
        //semester sm
        //batch b
        //degree d
        $this->db->select('s.std_roll AS Roll No, s.std_first_name AS First Name, s.std_last_name AS Last Name,'
                . 's.email AS Email, s.std_gender AS Gender, s.address AS Address, s.city AS City,'
                . 's.zip AS Zip, s.std_birthdate AS Birth Date, '
                . 's.std_marital AS Merital, s.std_mobile AS Mobile, s.std_about AS About');
        $this->db->select('d.d_name AS Degree');
        $this->db->select('c.c_name AS Course Name');
        $this->db->select('b.b_name AS Batch');
        $this->db->select('sm.s_name AS Semester');
        $this->db->from('student s');
        $this->db->join('degree AS d', 'd.d_id = s.std_degree');
        $this->db->join('course AS c', 'c.course_id = s.course_id');
        $this->db->join('semester AS sm', 'sm.s_id = s.semester_id');
        $this->db->join('batch AS b', 'b.b_id = s.std_batch');
        
        return $this->db->get();
    }
    
    /**
     * System setting export
     * @return object
     */
    function system_setting() {
        //system_setting s
        $this->db->select('s.type AS Type, s.description AS Description');
        $this->db->from('system_setting s');
        
        return $this->db->get();
    }
    
    /**
     * Project manager export
     * @return object
     */
    function project_manager() {
        //project_manager pm
        //student s
        //degree d
        //batch b
        //semester sm
        //course c
        $this->db->select('pm.pm_title AS Title, pm.pm_desc AS Description, pm.pm_status AS Status');
        $this->db->select('s.name AS Student Name, s.email AS Student Email');
        $this->db->select('d.d_name AS Degree');
        $this->db->select('c.c_name AS Course');
        $this->db->select('b.b_name AS Batch Name');
        $this->db->select('sm.s_name AS Semester');
        $this->db->from('project_manager pm');
        $this->db->join('student s', 's.std_id = pm.pm_student_id');
        $this->db->join('degree d', 'd.d_id = pm.pm_degree');
        $this->db->join('course AS c', 'c.course_id = pm.pm_course');
        $this->db->join('batch b', 'b.b_id = pm.pm_batch');
        $this->db->join('semester sm', 'sm.s_id = pm.pm_semester');
        
        return $this->db->get();
    }
    
    /**
     * Admission type export
     * @return object
     */
    function admission_type() {
        //admission_type a
        $this->db->select('a.at_name AS Admission Name');
        $this->db->from('admission_type a');
        
        return $this->db->get();
    }
    
    /**
     * Batch export
     * @return object
     */
    function batch() {
        //batch b
        //degree d
        //course c
        $this->db->select('b.b_name AS Batch Name');
        $this->db->select('d.d_name AS Degree Name');
        $this->db->select('c.c_name AS Course Name');
        $this->db->from('batch b');
        $this->db->join('degree d', 'd.d_id = b.degree_id');
        $this->db->join('course AS c', 'c.course_id = b.course_id');
        return $this->db->get();
    }
    
    /**
     * Fees structure export
     * @return object
     */
    function fees_structure() {
        //fees_structure f
        //course c
        //semester s
        //degree d
        //batch b
        $this->db->select('f.title AS Title, f.total_fee AS Total Fee');
        $this->db->select('d.d_name AS Degree');
        $this->db->select('c.c_name AS Course');
        $this->db->select('b.b_name AS Batch');
        $this->db->select('s.s_name AS Semester');
        $this->db->from('fees_structure AS f');
        $this->db->join('degree AS d', 'd.d_id = f.degree_id');
        $this->db->join('course AS c', 'c.course_id = f.course_id');
        $this->db->join('batch AS b', 'b.b_id = f.batch_id');
        $this->db->join('semester AS s', 's.s_id = f.sem_id');
        
        return $this->db->get();
    }
    
    /**
     * Subject export in CSV
     * @return type
     */
    function subject_export() {
        //subject s
        //semester sm
        //course c
        $this->db->select('s.subject_name AS Subject Name, s.subject_code AS Subject Code');
        $this->db->select('c.c_name AS Course');
        $this->db->select('sm.s_name AS Semester');
        $this->db->from('subject_manager s');
        $this->db->join('course AS c', 'c.course_id = s.sm_course_id');
        $this->db->join('semester AS sm', 'sm.s_id = s.sm_sem_id');
        
        return $this->db->get();
    }
}
