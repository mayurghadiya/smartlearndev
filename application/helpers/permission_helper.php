<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('user_role')) {

    /**
     * User Role 
     * @param string $user_type , 
     * @return string
     */
    function user_role() {
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