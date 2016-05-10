<?php
/*
 * Forum Helper 
 * @return mixed data
 * this helper create for get forum user role data
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('roleuserdatatopic')) {

    function roleuserdatatopic($role,$role_id) {
        $CI = & get_instance();
        $CI->load->database();
        if($role=="admin"){        
        $CI->db->where('admin_id', $role_id);
        return $res = $CI->db->get('admin')->result_array();
        }
        
        if($role=="student"){        
        $CI->db->where('std_id', $role_id);
        return $res = $CI->db->get('forum_topics')->result_array();
        }
        if($role=="professor"){        
        $CI->db->where('professor_id', $role_id);
        return $res = $CI->db->get('professor')->result_array();
        }
       
        
    }

}

/*
 * 
 * 
 */
/*
if (!function_exists('roleuserdatacomment')) {

    function roleuserdatacomment($role,$role_id) {
        $CI = & get_instance();
        $CI->load->database();
        if($role=="admin"){        
        $CI->db->where('admin_id', $role_id);
        return $res = $CI->db->get('admin')->result_array();
        }
        
        if($role=="student"){        
        $CI->db->where('std_id', $role_id);
        return $res = $CI->db->get('forum_topics')->result_array();
        }
        if($role=="professor"){        
        $CI->db->where('professor_id', $role_id);
        return $res = $CI->db->get('professor')->result_array();
        }
       
        
    }

}

*/