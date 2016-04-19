<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('video_streaming_email_notification')) {

    /**
     * Video streaming email notification
     * @param array $emails
     * @param string $subject
     * @param string $message
     */
    function video_streaming_email_notification($emails, $subject, $message) {
        $CI = & get_instance();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mayur.ghadiya@searchnative.in',
            'smtp_pass' => 'the mayurz97375',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");

        foreach ($emails as $email) {
            $CI->email->clear(TRUE);
            $CI->email->from('mayur.ghadiya@searchnative.in', 'Search Native India');
            $CI->email->to($email->email);
            $CI->email->subject($subject);
            $CI->email->message($message);
            $CI->email->send();
        }
    }

}

if (!function_exists('email_configuration')) {

    /**
     * Email configucation
     */
    function email_configuration() {
        $CI = & get_instance();
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mayur.ghadiya@searchnative.in',
            'smtp_pass' => 'the mayurz97375',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $CI->load->library('email', $config);
        $CI->email->set_newline("\r\n");
    }

}

if (!function_exists('send_email_notification')) {

    /**
     * Exam email notification
     * @param array $emails
     * @param string $subject
     * @param string $messge
     */
    function send_email_notification($emails, $subject, $message) {
        $CI = & get_instance();

        foreach ($emails as $email) {
            $CI->email->clear(TRUE);
            $CI->email->from('mayur.ghadiya@searchnative.in', 'Search Native India');
            $CI->email->to($email->email);
            $CI->email->subject($subject);
            $CI->email->message($message);
            $CI->email->send();
        }
    }

}

if (!function_exists('exam_fees_notification')) {

    /**
     * Exam fee notification
     * @param type $data
     * @param type $emails
     * @param type $subject
     * @param type $message
     */
    function exam_fees_notification($data) {
        $CI = & get_instance();
        $degree = $CI->db->get_where('degree', array(
                    'd_id' => $data['degree']
                ))->row();

        $course = $CI->db->get_where('course', array(
                    'course_id' => $data['course']
                ))->row();

        $batch = $CI->db->get_where('batch', array(
                    'b_id' => $data['batch']
                ))->row();

        $semester = $CI->db->get_where('semester', array(
                    's_id' => $data['semester']
                ))->row();

        $students = $CI->db->select()
                ->from('student')
                ->join('degree', 'degree.d_id = student.std_degree')
                ->join('course', 'course.course_id = student.course_id')
                ->join('batch', 'batch.b_id = student.std_batch')
                ->join('semester', 'semester.s_id = student.semester_id')
                ->where('student.std_degree', $data['degree'])
                ->where('student.course_id', $data['course'])
                ->where('student.std_batch', $data['batch'])
                ->where('student.semester_id', $data['semester'])
                ->get()
                ->result();

        $subject = "Exam Fee Details";
        $message = "Hello, Students";
        $message .= "<br/>New exam fee was created for your batch. Please refers the below table.";
        $message .= "<table border='1'>"
                . "<tr>"
                . "<th>Course</th>"
                . "<th>Branch</th>"
                . "<th>Batch</th>"
                . "<th>Semester</th>"
                . "<th>Fees</th>"
                . "<th>Start Date</th>"
                . "<th>End Date</th>"
                . "<th>Expiry Date</th>"
                . "<th>Penalty</th>"
                . "</tr>"
                . "<tr>"
                . "<td>" . $degree->d_name . "</td>"
                . "<td>" . $course->c_name . "</td>"
                . "<td>" . $batch->b_name . "</td>"
                . "<td>" . $semester->s_name . "</td>"
                . "<td>" . $data['fees'] . "</td>"
                . "<td>" . $data['start_date'] . "</td>"
                . "<td>" . $data['end_date'] . "</td>"
                . "<td>" . $data['expiry_date'] . "</td>"
                . "<td>" . $data['penalty'] . "</td>"
                . "</tr>"
                . "</table>";
        send_email_notification($students, $subject, $message);
    }

}

if (!function_exists('create_notification')) {

    /**
     * Create notification
     * @param string $notification_type
     * @param string $degree
     * @param string $course
     * @param string $batch
     * @param string $semester
     * @param int $data_id
     */
    function create_notification($notification_type, $degree, $course, $batch, $semester, $data_id, $student_id = '') {
        $CI = & get_instance();

        $students = $CI->db->select()
                ->from('student')
                ->where('student.std_degree', $degree)
                ->where('student.course_id', $course)
                ->where('student.std_batch', $batch)
                ->where('student.semester_id', $semester)
                ->get()
                ->result();

        $notification_type = $CI->db->get_where('notification_type', array(
                    'notification_type' => $notification_type
                ))->row();

        if ($notification_type == 'marks_manager') {
            //insert into db
            $CI->db->insert('notification', array(
                'notification_type_id' => $notification_type->notification_type_id,
                'student_ids' => $student_id,
                'degree_id' => $degree,
                'course_id' => $course,
                'batch_id' => $batch,
                'semester_id' => $semester,
                'data_id' => $data_id
            ));
        } else {
            $student_ids = '';
            foreach ($students as $row) {
                $student_ids .= $row->std_id . ',';
            }
            $student_ids = rtrim($student_ids, ',');

            //insert into db
            $CI->db->insert('notification', array(
                'notification_type_id' => $notification_type->notification_type_id,
                'student_ids' => $student_ids,
                'degree_id' => $degree,
                'course_id' => $course,
                'batch_id' => $batch,
                'semester_id' => $semester,
                'data_id' => $data_id
            ));
        }
    }

}

if (!function_exists('show_notification')) {

    /**
     * Count notifications
     * @param int $student_id
     * @return array
     */
    function show_notification($student_id) {
        $CI = & get_instance();

        $notifications = array();
        $total_notification = 0;
        $notification_types = $CI->db->get('notification_type')->result();
        foreach ($notification_types as $type) {
            $notification_id = get_notification_type($type->notification_type);
            $sql = "SELECT * FROM notification ";
            $sql .= "WHERE notification_type_id = $notification_id ";
            $sql .= "AND FIND_IN_SET($student_id, student_ids) ";
            $result = $CI->db->query($sql)->num_rows();
            if ($result) {
                $notifications[$type->notification_type] = $result;
                $total_notification++;
            }
        }
        $notifications['total_notification'] = $total_notification;

        return $notifications;
    }

}

if (!function_exists('get_notification_type')) {

    /**
     * Get notification id from its type
     * @param string $notification
     * @return int
     */
    function get_notification_type($notification) {
        $CI = & get_instance();

        $notification_type = $CI->db->get_where('notification_type', array(
                    'notification_type' => $notification
                ))->row();

        return $notification_type->notification_type_id;
    }

}

if (!function_exists('clear_notification')) {

    /**
     * Clear notification
     * @param string $notification_name
     * @param int $student_id
     */
    function clear_notification($notification_name, $student_id) {
        $CI = & get_instance();

        $notification_id = get_notification_type($notification_name);

        $sql = "UPDATE notification ";
        $sql .= "SET student_ids = ";
        $sql .= "TRIM(BOTH ',' FROM REPLACE(CONCAT(',', student_ids, ','), ',$student_id,', ',')) ";
        $sql .= "WHERE notification_type_id = $notification_id";
        $CI->db->query($sql);
    }

}

if (!function_exists('delete_notification')) {

    /**
     * Delete notification
     * @param string $notification_type
     * @param int $data_id
     */
    function delete_notification($notification_type, $data_id) {
        $CI = & get_instance();
        $notification_id = get_notification_type($notification_type);
        $CI->db->where(array(
            'notification_type_id' => $notification_id,
            'data_id' => $data_id
        ));
        $CI->db->delete('notification');
        //unset($CI->session->userdata('notifications')[$notification_type]);
    }

}

if(!function_exists('check_notification')){
    function check_notification($type) {
        $CI = & get_instance();
        $student_id = $CI->session->userdata('student_id');
        $notification_id = get_notification_type($type);
        
        $sql = "SELECT notification_id FROM notification ";
        $sql .= "WHERE FIND_IN_SET($student_id, student_ids) ";
        $sql .= "AND notification_type_id = $notification_id";
        
        $result = $CI->db->query($sql)->num_rows();
        
        return $result;
    }
}