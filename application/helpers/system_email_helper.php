<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('admin_sender_detail')) {

    /**
     * Admin sender details
     * @return array
     */
    function admin_sender_detail() {
        $CI = & get_instance();
        $admin_details = $CI->session->all_userdata();

        return $admin_details;
    }

}
if (!function_exists('send_to_all_course')) {

    /**
     * Send message to all course students
     * @param type $data
     */
    function send_to_all_course($data) {
        $CI = & get_instance();
        $students = $CI->db->get('student')->result();
        $email_to = '';
        $admin_details = admin_sender_detail();
        foreach ($students as $row) {
            $email_to .= $row->std_id . ',';
            $data['email_to'] = $row->std_id;
            $data['role_to'] = 'student';
            $data['role_from'] = 'admin';
            $data['course'] = 'all';
            $data['semester'] = 'all';
            $data['email_to'] = rtrim($email_to, ',');
            $data['read'] = 0;
            $data['is_draft'] = 0;
            $data['admin_email'] = $admin_details['email'];
            $data['admin_name'] = $admin_details['name'];
        }
        save_admin_email_data($data);
    }

}

if (!function_exists('send_to_course_all_semester')) {

    /**
     * Send message to all semester student of the particuler course
     * @param array $data
     * @param int $course_id
     */
    function send_to_course_all_semester($data, $course_id) {
        $CI = & get_instance();
        $students = $CI->db->get_where('student', array(
                    'course_id' => $course_id
                ))->result();
        $admin_details = admin_sender_detail();
        $email_to = '';
        foreach ($students as $row) {
            $email_to .= $row->std_id . ',';
            $data['email_to'] = $row->std_id;
            $data['role_to'] = 'student';
            $data['role_from'] = 'admin';
            $data['course'] = $course_id;
            $data['semester'] = $row->semester_id;
            $data['email_to'] = rtrim($email_to, ',');
            $data['read'] = 0;
            $data['is_draft'] = 0;
            $data['admin_email'] = $admin_details['email'];
            $data['admin_name'] = $admin_details['name'];
        }
        save_admin_email_data($data);
    }

}

if (!function_exists('send_to_all_student_course_semester')) {

    function send_to_all_student_course_semester($data, $course_id, $semester_id) {
        $CI = & get_instance();
        $students = $CI->db->get_where('student', array(
                    'course_id' => $course_id,
                    'semester_id' => $semester_id
                ))->result();
        $admin_details = admin_sender_detail();
        $email_to = '';
        foreach ($students as $row) {
            $email_to .= $row->std_id . ',';
            $data['role_to'] = 'student';
            $data['role_from'] = 'admin';
            $data['course'] = $course_id;
            $data['semester'] = $semester_id;
            $data['email_to'] = rtrim($email_to, ',');
            $data['read'] = 0;
            $data['is_draft'] = 0;
            $data['admin_email'] = $admin_details['email'];
            $data['admin_name'] = $admin_details['name'];
        }
        save_admin_email_data($data);
    }

}

if (!function_exists('admin_inbox')) {

    /**
     * Admin inbox
     */
    function admin_inbox() {
        $CI = & get_instance();
        $admin_details = admin_sender_detail();
        $CI->db->order_by('created_at', 'DESC');
        $inbox = $CI->db->get_where('email', array(
                    'email_to' => $admin_details['admin_id']
                ))->result();

        return $inbox;
    }

}

if (!function_exists('sent_to_course_semeseter_student')) {

    function sent_to_course_semeseter_student($course_id, $semester_id, $student_id) {
        
    }

}

if (!function_exists('save_admin_email_data')) {

    /**
     * Save email data
     * @param array $data
     * 
     * @return int
     */
    function save_admin_email_data($data) {
        $CI = & get_instance();
        $CI->db->insert('email', array(
            'email_from' => $data['admin_email'],
            'from_name' => $data['admin_name'],
            'course' => $data['course'],
            'semester' => $data['semester'],
            'email_to' => $data['email_to'],
            'subject' => $data['subject'],
            'cc' => $data['cc'],
            'message' => $data['message'],
            'role_from' => $data['role_from'],
            'role_to' => $data['role_to'],
            'is_draft' => $data['is_draft'],
            'file_name' => $data['file_name'],
            'read' => $data['read']
        ));
        $insert_id = $CI->db->insert_id();

        return $insert_id;
    }

}

if (!function_exists('admin_sent_email')) {

    /**
     * Admin sent emails
     * @return array
     */
    function admin_sent_email() {
        $CI = & get_instance();
        $admin_details = admin_sender_detail();
        $CI->db->order_by('created_at', 'DESC');
        $sent_emails = $CI->db->get_where('email', array(
                    'email_from' => $admin_details['email']
                ))->result();

        return $sent_emails;
    }

}

if (!function_exists('admin_email_reply')) {

    /**
     * Admin email reply to student
     * @param type $data
     * @return type
     */
    function admin_email_reply($data) {
        $CI = & get_instance();
        $admin_details = admin_sender_detail();
        $student = $CI->db->get_where('student', array(
                    'email' => $data['to']
                ))->row();
        $CI->db->insert('email', array(
            'email_from' => $admin_details['email'],
            'from_name' => $admin_details['name'],
            'email_to' => $student->std_id,
            'subject' => $data['subject'],
            'message' => $data['message'],
            'cc' => $data['cc'],
            'role_from' => 'admin',
            'role_to' => 'student',
            'file_name' => $data['file_name']
        ));

        return $CI->db->insert_id();
    }

}

if (!function_exists('student_inbox')) {

    function student_inbox() {
        $CI = & get_instance();
        $student_id = $CI->session->userdata('std_id');

        $query = "SELECT * FROM email ";
        $query .= "WHERE FIND_IN_SET($student_id, email_to) ORDER BY created_at DESC";
        $result = $CI->db->query($query)->result();

        return $result;
    }

}

if (!function_exists('view_email')) {

    /**
     * View email
     * @param int $id
     * @return array
     */
    function view_email($id) {
        $CI = & get_instance();
        $CI->load->model('admin/Crud_model');

        $email = $CI->db->get_where('email', array(
                    'email_id' => $id,
                ))->row();

        if ($email->email_to == $CI->session->userdata('email')) {
            //update read status
            $update = array(
                'read' => 1
            );
            $CI->Crud_model->update_email_read_status($id, $update);
        }

        return $email;
    }

}

if (!function_exists('student_email_view')) {

    /**
     * Student email view
     * @param int $id
     * @return array
     */
    function student_email_view($id) {
        $CI = & get_instance();

        $student_id = $CI->session->userdata('std_id');
        $query = "SELECT * FROM email ";
        $query .= "WHERE FIND_IN_SET($student_id, student_read) ";
        $query .= "AND email_id = $id";
        $result = $CI->db->query($query)->row();

        $email_detail = $CI->db->get_where('email', array(
                    'email_id' => $id
                ))->row();

        if (!count($result)) {
            $read_status = $email_detail->student_read;
            $read_status = ltrim($read_status . ',' . $student_id, ',');

            $CI->db->where('email_id', $id);
            $CI->db->update('email', array(
                'student_read' => $read_status
            ));
        }

        return $email_detail;
    }

}

if (!function_exists('admin_inbox_email_view')) {

    /**
     * Admin inbox view
     * @param int $id
     */
    function admin_inbox_email_view($id) {
        $CI = & get_instance();
        $email = $CI->db->get_where('email', array(
                    'email_id' => $id
                ))->row();

        if ($email->read == 0) {
            //update read status
            $CI->db->where('email_id', $id);
            $CI->db->update('email', array(
                'read' => 1
            ));
        }

        return $email;
    }

}

if (!function_exists('reply_from_student')) {

    /**
     * Reply from student
     * @param array $data
     */
    function reply_from_student($data) {
        $CI = & get_instance();
        $admin_id = $CI->db->get_where('admin', array(
                    'email' => $data['to']
                ))->row();
        $student = $CI->db->get_where('student', array(
                    'std_id' => $CI->session->userdata('std_id')
                ))->row();
        $reply_data = array(
            'email_to' => $admin_id->admin_id,
            'email_from' => $student->email,
            'subject' => $data['subject'],
            'cc' => $data['cc'],
            'message' => $data['message'],
            'file_name' => $data['file_name']
        );

        $CI->db->insert('email', $reply_data);
        $insert_id = $CI->db->insert_id();

        return $insert_id;
    }

}

if (!function_exists('student_email_send_to_admin')) {

    /**
     * Student email send to admin and teachers
     * @param type $data
     */
    function student_email_send_to_admin($data) {
        $CI = & get_instance();

        $student = $CI->db->get_where('student', array(
                    'std_id' => $CI->session->userdata('std_id')
                ))->row();
        foreach ($data['to'] as $row) {
            //save data
            $CI->db->insert('email', array(
                'email_from' => $student->email,
                'from_name' => $student->name,
                'email_to' => $row,
                'subject' => $data['subject'],
                'cc' => $data['cc'],
                'message' => $data['message'],
                'role_from' => 'student',
                'role_to' => 'admin',
                'is_draft' => 0,
                'file_name' => $data['file_name'],
            ));
        }
    }

}

if (!function_exists('send_to_single_student')) {

    /**
     * Send message to single student
     * @param array $data
     */
    function send_to_single_student($data) {
        $CI = & get_instance();
        $admin_detail = admin_sender_detail();
        foreach ($data['student'] as $row) {
            $CI->db->insert('email', array(
                'email_from' => $admin_detail['email'],
                'from_name' => $admin_detail['name'],
                'email_to' => $row,
                'subject' => $data['subject'],
                'message' => $data['message'],
                'cc' => $data['cc'],
                'role_from' => 'admin',
                'role_to' => 'student',
                'is_draft' => 0,
                'file_name' => $data['file_name'],
                'read' => 0,
                'student_read' => ''
            ));
        }
    }

}

if (!function_exists('professor_inbox')) {

    /**
     * professor inbox
     */
    function professor_inbox() {
        $CI = & get_instance();
        $professor_details = professor_sender_detail();
        $CI->db->order_by('created_at', 'DESC');
        $inbox = $CI->db->get_where('email', array(
                    'email_to' => $professor_details['professor_id']
                ))->result();

        return $inbox;
    }

}



if (!function_exists('professor_sender_detail')) {

    /**
     * Admin sender details
     * @return array
     */
    function professor_sender_detail() {
        $CI = & get_instance();
        $professor_details = $CI->session->all_userdata();

        return $professor_details;
    }

}


if (!function_exists('send_to_all_course_professor')) {

    /**
     * Send message to all course students
     * @param type $data
     */
    function send_to_all_course_professor($data) {
        $CI = & get_instance();
        $students = $CI->db->get('student')->result();
        $email_to = '';
        $admin_details = professor_sender_detail();
        foreach ($students as $row) {
            $email_to .= $row->std_id . ',';
            $data['email_to'] = $row->std_id;
            $data['role_to'] = 'student';
            $data['role_from'] = 'professor';
            $data['course'] = 'all';
            $data['semester'] = 'all';
            $data['email_to'] = rtrim($email_to, ',');
            $data['read'] = 0;
            $data['is_draft'] = 0;
            $data['admin_email'] = $admin_details['email'];
            $data['admin_name'] = $admin_details['name'];
        }
        save_professor_email_data($data);
    }

}


if (!function_exists('save_professor_email_data')) {

    /**
     * Save email data
     * @param array $data
     * 
     * @return int
     */
    function save_professor_email_data($data) {
        $CI = & get_instance();
        $CI->db->insert('email', array(
            'email_from' => $data['admin_email'],
            'from_name' => $data['admin_name'],
            'course' => $data['course'],
            'semester' => $data['semester'],
            'email_to' => $data['email_to'],
            'subject' => $data['subject'],
            'cc' => $data['cc'],
            'message' => $data['message'],
            'role_from' => $data['role_from'],
            'role_to' => $data['role_to'],
            'is_draft' => $data['is_draft'],
            'file_name' => $data['file_name'],
            'read' => $data['read']
        ));
        $insert_id = $CI->db->insert_id();

        return $insert_id;
    }

}