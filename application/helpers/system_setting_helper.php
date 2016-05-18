<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('system_name')) {

    function system_name() {
        $CI = & get_instance();
        $CI->load->database();

        $CI->db->where('type', 'system_name');
        $res = $CI->db->get('system_setting')->result();
        if (!empty($res)) {
            return $res[0]->description;
        }
    }

}

if (!function_exists('system_info')) {

    /**
     * System information
     * @param string $type
     * @return string
     */
    function system_info($type) {
        $CI = & get_instance();
        $result = $CI->db->get_where('system_setting', [
            'type' => $type
        ]);

        if ($result->num_rows()) {
            return $result->row()->description;
        }

        return 'No data found';
    }

}