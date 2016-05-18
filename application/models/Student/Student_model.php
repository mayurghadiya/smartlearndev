<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        return $this->db->get_where($type, array($type . '_id' => $type_id))->row()->$field;
    }

    ////////STUDENT/////////////
    function get_students($class_id) {
        $query = $this->db->get_where('student', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_student_info($student_id) {
        $query = $this->db->get_where('student', array('student_id' => $student_id));
        return $query->result_array();
    }

    /////////TEACHER/////////////
    function get_teachers() {
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    function get_teacher_name($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_teacher_info($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
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

    ////////////CLASS///////////
    function get_class_name($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_class_name_numeric($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name_numeric'];
    }

    function get_classes() {
        $query = $this->db->get('class');
        return $query->result_array();
    }

    function get_class_info($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        return $query->result_array();
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
        $query = $this->db->get('system_setting');
        return $query->result_array();
    }

    ////////BACKUP RESTORE/////////
    function create_backup($type) {
        $this->load->dbutil();


        $options = array(
            'format' => 'txt', // gzip, zip, txt
            'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
            'add_insert' => TRUE, // Whether to add INSERT data to backup file
            'newline' => "\n"               // Newline character used in backup file
        );


        if ($type == 'all') {
            $tables = array('');
            $file_name = 'system_backup';
        } else {
            $tables = array('tables' => array($type));
            $file_name = 'backup_' . $type;
        }

        $backup = & $this->dbutil->backup(array_merge($options, $tables));


        $this->load->helper('download');
        force_download($file_name . '.sql', $backup);
    }

    /////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
    function restore_backup() {
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
        $this->load->dbutil();


        $prefs = array(
            'filepath' => 'uploads/backup.sql',
            'delete_after_upload' => TRUE,
            'delimiter' => ';'
        );
        $restore = & $this->dbutil->restore($prefs);
        unlink($prefs['filepath']);
    }

    /////////DELETE DATA FROM TABLES///////////////
    function truncate($type) {
        if ($type == 'all') {
            $this->db->truncate('student');
            $this->db->truncate('mark');
            $this->db->truncate('teacher');
            $this->db->truncate('subject');
            $this->db->truncate('class');
            $this->db->truncate('exam');
            $this->db->truncate('grade');
        } else {
            $this->db->truncate($type);
        }
    }

    ////////IMAGE URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

    ////////STUDY MATERIAL//////////
    function save_study_material_info() {
        $data['timestamp'] = strtotime($this->input->post('timestamp'));
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['file_name'] = $_FILES["file_name"]["name"];
        $data['file_type'] = $this->input->post('file_type');
        $data['class_id'] = $this->input->post('class_id');

        $this->db->insert('document', $data);

        $document_id = $this->db->insert_id();
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);
    }

    function select_study_material_info() {
        $this->db->order_by("timestamp", "desc");
        return $this->db->get('document')->result_array();
    }

    function select_study_material_info_for_student() {
        $student_id = $this->session->userdata('student_id');
        $class_id = $this->db->get_where('student', array('student_id' => $student_id))->row()->class_id;
        $this->db->order_by("timestamp", "desc");
        return $this->db->get_where('document', array('class_id' => $class_id))->result_array();
    }

    function update_study_material_info($document_id) {
        $data['timestamp'] = strtotime($this->input->post('timestamp'));
        $data['title'] = $this->input->post('title');
        $data['description'] = $this->input->post('description');
        $data['class_id'] = $this->input->post('class_id');

        $this->db->where('document_id', $document_id);
        $this->db->update('document', $data);
    }

    function delete_study_material_info($document_id) {
        $this->db->where('document_id', $document_id);
        $this->db->delete('document');
    }

    ////////private message//////
    function send_new_private_message() {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));

        $reciever = $this->input->post('reciever');
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender'] = $sender;
            $data_message_thread['reciever'] = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code) {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);

        // notify email to email reciever
        //$this->email_model->notify_email('new_message_notification', $this->db->insert_id());
    }

    function mark_thread_messages_read($message_thread_code) {
        // mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    /**
     * Student exam list
     * @param string $course
     * @param string $semeseter
     * @return array
     */
    function student_exam_list($course, $semeseter) {
        return $this->db->select()
                        ->from('exam_manager')
                        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->where(array(
                            'exam_manager.course_id' => $course,
                            'exam_manager.em_semester' => $semeseter,
                            'exam_manager.exam_ref_name' => 'reguler'
                        ))
                        ->order_by('exam_manager.em_start_time', 'DESC')
                        ->get()
                        ->result();
    }

    /**
     * Exam details
     * @param int $exam_id
     * @return object
     */
    function exam_detail($exam_id) {
        return $this->db->select()
                        ->from('exam_manager')
                        ->join('course', 'course.course_id = exam_manager.course_id')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->where('em_id', $exam_id)
                        ->get()
                        ->row();
    }

    /**
     * Exam schedule
     * @param int $exam_id
     * @return array
     */
    function exam_schedule($exam_id) {
        return $this->db->select()
                        ->from('exam_time_table')
                        ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
                        ->where('exam_time_table.exam_id', $exam_id)
                        ->get()
                        ->result();
    }

    /**
     * Students exam marks
     * @param int $student_id
     * @param int $exam_id
     * @return array
     */
    function student_marks($student_id, $exam_id) {
        return $this->db->select()
                        ->from('marks_manager')
                        ->join('subject_manager', 'subject_manager.sm_id = marks_manager.mm_subject_id')
                        ->where(array(
                            'mm_std_id' => $student_id,
                            'mm_exam_id' => $exam_id
                        ))
                        ->get()
                        ->result();
    }

    /**
     * Student bacth and course details
     * @param int $student_id
     * @return object
     */
    function student_batch_course_detail($student_id) {
        return $this->db->select()
                        ->from('batch')
                        ->join('student', 'student.std_batch = batch.b_id')
                        ->join('course', 'course.course_id = student.course_id')
                        ->where('student.std_id', $student_id)
                        ->get()
                        ->row();
    }

    /**
     * Fees structure
     * @param int $course_id
     * @param semester $semester
     * @return array
     */
    function fees_structure($course_id, $semester) {
        return $this->db->select()
                        ->from('fees_structure')
                        ->where(array(
                            'course_id' => $course_id,
                            'sem_id' => $semester,
                            'fee_expiry_date >= ' => date('d M Y')
                        ))
                        ->get()
                        ->result();
    }

    /**
     * Single fees structure details
     * @param int $fees_structure_id
     * @return object
     */
    function fees_structure_details($fees_structure_id) {
        return $this->db->select()
                        ->from('fees_structure')
                        ->where('fees_structure_id', $fees_structure_id)
                        ->get()
                        ->row();
    }

    /**
     * Student paid fees 
     * @param int $fees_structure_id
     * @param int $student_id
     * @return array
     */
    function student_paid_fees($fees_structure_id, $student_id) {
        return $this->db->select('*')
                        ->from('student_fees')
                        ->join('fees_structure', 'fees_structure.fees_structure_id = student_fees.fees_structure_id', 'left')
                        ->where(array(
                            'fees_structure.fees_structure_id' => $fees_structure_id,
                            'student_fees.student_id' => $student_id
                        ))
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
     * Add authorize.net payment
     * @param array $data
     * @return int
     */
    function add_authorized_payment($data) {
        $this->db->insert('student_fees', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
 function vocational_add_authorized_payment($data) {
     
        $this->db->insert('vocational_course_fee', $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
    /**
     * Student fees record
     * @param int $student_id
     * @return array
     */
    function fees_record($student_id) {
        return $this->db->select()
                        ->from('student_fees')
                        ->join('course', 'course.course_id = student_fees.course_id')
                        ->join('fees_structure', 'fees_structure.fees_structure_id = student_fees.fees_structure_id')
                        ->join('semester', 'semester.s_id = student_fees.sem_id')
                        ->where('student_fees.student_id', $student_id)
                        ->order_by('student_fees.paid_created_at', 'DESC')
                        ->get()
                        ->result();
    }

    /**
     * Invoice details
     * @param int $id
     * @return object
     */
    function invoice_detail($id) {
        return $this->db->select('*')
                        ->from('student_fees')
                        ->join('fees_structure', 'fees_structure.fees_structure_id = student_fees.fees_structure_id')
                        ->join('student', 'student.std_id = student_fees.student_id')
                        ->where('student_fees_id', $id)
                        ->get()
                        ->row();
    }

    /**
     * Student details
     * @param int $student_id
     * @return object
     */
    function student_details($student_id) {
        return $this->db->select('student.*, student.created_date AS Joining_date, course.*, semester.*, batch.*, degree.*')
                        ->from('student')
                        ->join('course', 'course.course_id = student.course_id')
                        ->join('semester', 'semester.s_id = student.semester_id')
                        ->join('batch', 'batch.b_id = student.std_batch')
                        ->join('degree', 'degree.d_id = student.std_degree')
                        ->where('student.std_id', $student_id)
                        ->get()
                        ->row();
    }

    /**
     * Update password
     * @param array $data
     * @param int $id
     * @return int
     */
    function update_password($data, $id) {
        $this->db->where('std_id', $id);
        $this->db->update('student', $data);
        return $this->db->insert_id();
    }

    /**
     * CMS page details
     * @param int $id
     * @return object
     */
    function cms_page_detail($id) {
        return $this->db->select()
                        ->from('cms_pages')
                        ->where('am_id', $id)
                        ->get()
                        ->row();
    }

    /**
     * Remedial exam list
     * @param int $reguler_exam_id
     * @return array
     */
    function remedial_exam_list($reguler_exam_id) {
        return $this->db->select()
                        ->from('exam_manager')
                        ->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type')
                        ->join('semester', 'semester.s_id = exam_manager.em_semester')
                        ->where(array(
                            'exam_manager.exam_ref_id' => $reguler_exam_id
                        ))
                        ->order_by('exam_manager.em_start_time', 'DESC')
                        ->get()
                        ->result();
    }

    /**
     * Remedial exam schedule
     * @param string $exam
     * @param string $subject
     * @return array
     */
    function remedial_exam_schedule($exam, $subject) {
        return $this->db->select()
                        ->from('exam_time_table')
                        ->join('exam_manager', 'exam_manager.em_id = exam_time_table.exam_id')
                        ->join('subject_manager', 'subject_manager.sm_id = exam_time_table.subject_id')
                        ->where('exam_time_table.subject_id', $subject)
                        ->where('exam_time_table.exam_id', $exam)
                        ->get()
                        ->result();
    }

    /**
     * Insert / update widget order
     * @param mixed $data
     * @param string $id
     */
    function save_widget_order($data, $id = NULL) {
        if ($id != NULL) {
            //update
            $this->db->where('student_id', $id);
            $this->db->update('widget_order', array(
                'student_id' => $data['student'],
                'order_data' => $data['widget_order']
            ));
        } else {
            //insert
            $this->db->insert('widget_order', array(
                'student_id' => $data['student'],
                'order_data' => $data['widget_order']
            ));
        }
    }

    /**
     * Check for widget order present or not for specific student
     * @param string $student_id
     * @return int
     */
    function is_present_widget_order($student_id) {
        return $this->db->select()
                        ->from('widget_order')
                        ->where(array(
                            'student_id' => $student_id
                        ))->get()->num_rows();
    }

    /**
     * Student widget order
     * @param int $student_id
     * @return object
     */
    function student_widget_order($student_id) {
        return $this->db->select()
                ->from('widget_order')
                ->where(array(
                    'student_id'=> $student_id
                ))->get()->row();
    }
    
    /**
     * Student class routine information
     * @param string $degree
     * @param string $branch
     * @param string $batch
     * @param string $semester
     * @param string $class
     * @return mixed
     */
    function student_class_routine($degree, $branch, $batch, $semester, $class) {
        return $this->db->get_where('class_routine', [
            'DepartmentID'  => $degree,
            'BranchID'  => $branch,
            'BatchID'   => $batch,
            'SemesterID'    => $semester,
            'ClassID'   => $class
        ])->result();
    }
    
    /**
     * Student information
     * @param string $student_id
     * @return object
     */
    function student_info($student_id) {
        return $this->db->get_where('student', [
            'std_id'    => $student_id
        ])->row();
    }
    /**
     * Student assessment
     * @param int $student_id
     * @return object
     */
    function student_assessment() {
        $student_id = $this->session->userdata('login_user_id');
        
        return $this->db->get_where("assessments",array("student"=>$student_id))->result();
    }

}
