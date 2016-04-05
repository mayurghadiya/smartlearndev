<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('video_streaming_email_notification')) {

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
        
        foreach($emails as $email) {
            $CI->email->clear(TRUE);
            $CI->email->from('mayur.ghadiya@searchnative.in', 'Search Native India');
            $CI->email->to($email->email);
            $CI->email->subject($subject);
            $CI->email->message($message);
            $CI->email->send();
        }
    }

}