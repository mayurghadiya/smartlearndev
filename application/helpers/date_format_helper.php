<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


/**
 * CodeIgniter Date time format Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/date_helper.html
 */

// ------------------------------------------------------------------------
/*
 * @date $date 
 * date_formats() return F d, Y format date
 * $date = 11-10-2015
 */

if(!function_exists('date_formats'))
{
    function date_formats($date)
    {
       $return_date = date("F d, Y",strtotime($date));
       return $return_date;
       
    }
    
}

/*
 * @date $date 
 * datetime_formats() return F d, Y h:i:s A format date
 * $date = 11-10-2015 19:24:00 return October 11, 1994 07:24:00 PM
 * 
 */
if(!function_exists('datetime_formats'))
{
    function datetime_formats($datetime)
    {
       $return_date = date("F d, Y h:i:s A",strtotime($datetime));
       return $return_date;
       
    }
    
}

    