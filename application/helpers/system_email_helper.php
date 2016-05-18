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
        if(isset($data['teacheremail']))
        {
            $teacher_email =  implode(",",$data['teacheremail']);            
        }
       
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
            if(isset($data['teacheremail']))
            {
                $data['admin_to_professor'] = $teacher_email;
            }
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
         if(isset($data['teacheremail']))
        {
            $teacher_email =  implode(",",$data['teacheremail']);            
        }
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
            if(isset($data['teacheremail']))
            {
                $data['admin_to_professor'] = $teacher_email;
            }
        }
        save_admin_email_data($data);
    }

}

if (!function_exists('send_to_all_student_course_semester')) {

    function send_to_all_student_course_semester($data, $course_id, $semester_id) {
        if(isset($data['teacheremail']))
        {
            $teacher_email =  implode(",",$data['teacheremail']);            
        }
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
            if(isset($data['teacheremail']))
            {
                $data['admin_to_professor'] = $teacher_email;
            }
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
       
        $CI->db->where('email_to', $admin_details['admin_id']);
        $CI->db->or_where("professor_to_admin",$admin_details['admin_id']);
        $inbox = $CI->db->get('email')->result();
       
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
        
        if(isset($data['admin_to_professor']))
        {
          
            $teach_mail = explode(",",$data['admin_to_professor']);
          
            foreach($teach_mail as $emails)
            {
             
                $prof = $CI->db->get_where("professor",array("email"=>$emails))->result();  
               
                $teach_email[] = $prof[0]->professor_id;
            }
          $professor = implode(",",$teach_email);
        }
        
        if(isset($data['admin_to_professor']))
        {
               $array = array(
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
            'read' => $data['read'],
            'admin_to_professor'=>$professor,
        );
        }else{
         
        $array = array(
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
        );
        }
        $CI->db->insert('email',$array);
        
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
         $professor = $CI->db->get_where('professor', array(
                    'email' => $data['to']
                ))->row();
        if($student!="")
        {
              $edata['email_to'] =$student->std_id;
        }
        else{
            
            $edata['admin_to_professor'] = $professor->professor_id; 
        }
        $edata['email_from'] = $admin_details['email'];
            
        $edata['from_name'] = $admin_details['name'];        
         $edata['subject'] = $data['subject'];
        $edata['message'] = $data['message'];
        $edata['cc'] = $data['cc'];
        $edata['role_from'] = 'admin';
        $edata['role_to'] = 'student';
        $edata['file_name'] = $data['file_name'];
     
        $CI->db->insert('email',$edata );

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
        $professor_id = $CI->db->get_where('professor', array(
                    'email' => $data['to']
                ))->row();
        $student = $CI->db->get_where('student', array(
                    'std_id' => $CI->session->userdata('std_id')
                ))->row();
        
        if(!empty($professor_id))
        {
         $edata['student_to_professor']= $professor_id->professor_id;
        }
                 
        if(!empty($admin_id))
        {
           $edata['email_to'] = $admin_id->admin_id;
        }
         
            $edata['email_from'] = $student->email;
            $edata['subject'] = $data['subject'];
            $edata['cc'] = $data['cc'];
            $edata['message'] = $data['message'];
            $edata['file_name'] = $data['file_name'];
           
       

        $CI->db->insert('email', $edata);
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
        if(isset($data['teacheremail']))
        {
             if(isset($data['teacheremail']))
            {

                $teach_mail = $data['teacheremail'];

                foreach($teach_mail as $emails)
                {

                    $prof = $CI->db->get_where("professor",array("email"=>$emails))->result();  

                    $teach_email[] = $prof[0]->professor_id;
                }
              $professor = implode(",",$teach_email);
            }
        }
        else{
            $professor = '';
        }
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
                'student_to_professor'=>$professor
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
             
                $edata['email_from'] = $admin_detail['email'];
                $edata['from_name'] = $admin_detail['name'];
                $edata['email_to'] = $row;
                $edata['subject'] = $data['subject'];
                $edata['message'] = $data['message'];
                $edata['cc'] = $data['cc'];
                $edata['role_from'] = 'admin';
                $edata['role_to'] = 'student';
                $edata['is_draft'] = 0; 
                $edata['file_name'] = $data['file_name'];
                $edata['read'] = 0;
                $edata['student_read'] = '';              
              $CI->db->insert('email',$edata);
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
        $run2 = "FIND_IN_SET('".$professor_details['login_user_id']."', student_to_professor)";
        $run = "FIND_IN_SET('".$professor_details['login_user_id']."', admin_to_professor)";
            $CI->db->where($run);
            $CI->db->or_where($run2);            
        $inbox = $CI->db->get('email')->result();

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
    function send_to_all_course_professor($data,$admin_to) {
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
            $data['professor_to_admin'] = $admin_to;
            
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
            'read' => $data['read'],
            'professor_to_admin'=>$data['professor_to_admin']
        ));
        $insert_id = $CI->db->insert_id();

        return $insert_id;
    }

}

if (!function_exists('send_to_course_all_semester_professor')) {

    /**
     * Send message to all semester student of the particuler course
     * @param array $data
     * @param int $course_id
     */
    function send_to_course_all_semester_professor($data, $course_id,$admin_to) {
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
            $data['role_from'] = 'professor';
            $data['course'] = $course_id;
            $data['semester'] = $row->semester_id;
            $data['email_to'] = rtrim($email_to, ',');
            $data['read'] = 0;
            $data['is_draft'] = 0;
            $data['admin_email'] = $admin_details['email'];
            $data['admin_name'] = $admin_details['name'];
            $data['professor_to_admin'] = $admin_to;
        }
        save_admin_email_data($data);
    }

}

if (!function_exists('send_to_all_student_course_semester_professor')) {

    function send_to_all_student_course_semester_professor($data, $course_id, $semester_id,$admin_to) {
       
        $CI = & get_instance();
        if($data['student'][0]=="all")
        {
        $students = $CI->db->get_where('student', array(
                    'course_id' => $course_id,
                    'semester_id' => $semester_id
                ))->result();
        }
        else{
            $students =  $data['student'];         
        }
        $admin_details = professor_sender_detail();
        $email_to = '';
       
        foreach ($students as $row) {
            if($data['student'][0]=="all"){
            $email_to .= $row->std_id . ',';
            }else{
                $email_to .= $row . ',';
            }
            $data['role_to'] = 'student';
            $data['role_from'] = 'professor';
            $data['course'] = $course_id;
            $data['semester'] = $semester_id;
            $data['email_to'] = rtrim($email_to, ',');
            $data['read'] = 0;
            $data['is_draft'] = 0;
            $data['admin_email'] = $admin_details['email'];
            $data['admin_name'] = $admin_details['name'];
            $data['professor_to_admin'] = $admin_to;
        }
        save_professor_email_data($data);
    }

}

if (!function_exists('send_to_single_student_professor')) {

    /**
     * Send message to single student
     * @param array $data
     */
    function send_to_single_student_professor($data,$admin_to) {
        $CI = & get_instance();
        $admin_detail = professor_sender_detail();
        foreach ($data['student'] as $row) {
            $CI->db->insert('email', array(
                'email_from' => $admin_detail['email'],
                'from_name' => $admin_detail['name'],
                'email_to' => $row,
                'subject' => $data['subject'],
                'message' => $data['message'],
                'cc' => $data['cc'],
                'role_from' => 'professor',
                'role_to' => 'student',
                'is_draft' => 0,
                'file_name' => $data['file_name'],
                'read' => 0,
                'student_read' => '',
                'professor_to_admin'=>$admin_to
            ));
        }
    }

}
/*
 * Professor sent email
 */

if (!function_exists('professor_sent_email')) {

    /**
     * Professor sent emails
     * @return array
     */
    function professor_sent_email() {
        $CI = & get_instance();
        $admin_details = professor_sender_detail();
        $CI->db->order_by('created_at', 'DESC');
        $sent_emails = $CI->db->get_where('email', array(
                    'email_from' => $admin_details['email']
                ))->result();
        

        return $sent_emails;
    }

}


if (!function_exists('professor_email_reply')) {

    /**
     * Professor email reply to student
     * @param type $data
     * @return type
     */
    function professor_email_reply($data) {
        $CI = & get_instance();
        $admin_details = professor_sender_detail();
        $student = $CI->db->get_where('student', array(
                    'email' => $data['to']
                ))->row();
        $admin = $CI->db->get_where('admin', array(
                    'email' => $data['to']
                ))->row();
        
         $edata['email_from'] =$admin_details['email'];
         $edata['from_name'] =  $admin_details['name'];
       
         $edata['subject'] = $data['subject'];
         $edata['message'] = $data['message'];
         $edata['cc'] = $data['cc'];
         $edata['role_from'] = 'professor';
         $edata['role_to'] = '';
         $edata['file_name'] = $data['file_name'];
        
        if($student!="")
        {
              $edata['email_to'] =$student->std_id;
        }
        else{
            
            $edata['professor_to_admin'] = $admin->admin_id; 
        }
        
        $CI->db->insert('email', $edata);

        return $CI->db->insert_id();
    }

}