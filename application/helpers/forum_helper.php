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
        $res = $CI->db->get('admin')->result_array();
        if(@$res[0]['name']!=""){     
            return @$res[0]['name'];
            }
        }
        
        if($role=="student"){        
        $CI->db->where('std_id', $role_id);
        $res = $CI->db->get('student')->result_array();
        if(@$res[0]['name']!=""){     
            return @$res[0]['name'];
            }
        }
        if($role=="professor"){        
        $CI->db->where('professor_id', $role_id);
        $res = $CI->db->get('professor')->result_array();
        if(@$res[0]['name']!=""){     
            return @$res[0]['name'];
            }
        }
       
        
    }

}

/*
 * 
 * 
 */

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
        return $res = $CI->db->get('student')->result_array();
        }
        if($role=="professor"){        
        $CI->db->where('professor_id', $role_id);
        return $res = $CI->db->get('professor')->result_array();
        }
       
        
    }

}


if (!function_exists('roleimgpath')) {

    function roleimgpath($role,$role_id) {
        $CI = & get_instance();
        $CI->load->database();
        if($role=="admin"){        
        $CI->db->where('admin_id', $role_id);
         $res = $CI->db->get('admin')->result_array();
         if($res[0]['admin_id']!="")
         {
            return $path = 'uploads/admin_image/'.$res[0]['admin_id'].'.jpg';
         }         
         else{
            return $path = "uploads/user1.jpg";
         }
        
        }
        
        if($role=="student"){        
        $CI->db->where('std_id', $role_id);
         $res = $CI->db->get('student')->result_array();
         if($res[0]['profile_photo']!="")
         {
            return $path = 'uploads/student_image/'.$res[0]['profile_photo'];
         }         
         else{
            return $path = "uploads/user1.jpg";
         }
        }
        if($role=="professor"){        
        $CI->db->where('professor_id', $role_id);
         $res = $CI->db->get('professor')->result_array();
         if($res[0]['image_path']!="")
         {
             //if(is_dir(FCPATH.'uploads/professor/'.$res[0]['image_path']))
             //{
              return $path = 'uploads/professor/'.$res[0]['image_path'];
             //}
             //else{
              //   return $path = "uploads/user1.jpg";
           //  }
         }
         else{
            return $path = "uploads/user1.jpg";
         }
        }
       
        
    }

}

