<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * CodeIgniter Date time format Helpers
 *
 * @package	CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		application/helpers/system_settings.html
 */

// ------------------------------------------------------------------------
/*
 * @system settings
 * @system_name()
 * $date = 28-04-2016
 */

if(!function_exists('system_name'))
{
    function system_name()
    {
        $CI = & get_instance();
        $CI->load->database();
        
        $CI->db->where('type','system_name');
        $res = $CI->db->get('system_setting')->result();
        if(!empty($res))
        {
        return  $res[0]->description;        
        }
       
       
    }
    
}

    