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
if (!function_exists('user_permission')) {

    /**
     * User Role 
     * @param string $user_type , 
     * @return string
     */
    function user_permission() {
        
        $CI = & get_instance();
//        echo $CI->uri->segment(2);
//        exit;
        $run = "FIND_IN_SET('".$CI->session->userdata('login_user_id')."', user_role)";
        $CI->db->where($run);
        $CI->db->where('user_type',$CI->session->userdata('login_type'));
        $user_role_query=$CI->db->get('group')->result_array();
       
        $module_role_query = $CI->db->get_where('assign_module' , array('group_id' => $user_role_query[0]['g_id']))->row();
         $assign_module_id=explode(',',$module_role_query->module_id);
        foreach($assign_module_id as $assign_module_id_row)
        {
                 $module_role_query_final = $CI->db->get_where('modules' , array('module_id' => $assign_module_id_row))->result_array();
//                
//                 foreach($module_role_query_final as $module_role_query_row)
//                 {	
                        $final_module_assgin[] = $module_role_query_final[0]['module_name_file'];
                 //}
        }
//        echo $CI->uri->segment(2);
//        echo "<pre>";
//        print_r($final_module_assgin);
//        
//        echo array_search($CI->uri->segment(2),$final_module_assgin);
//        
//        
//        
//        $result = $CI->db->get_where('modules', [
//        'user_type' => $CI->session->userdata('login_type')
//        ])->result_array();
//        
//        foreach ($result as $r)
//        {
//            $module_name_list[]=$r['module_name_file'];
////        }


//        echo "<pre>";
//        print_r($final_module_assgin);
        if(!in_array($CI->uri->segment(2),$final_module_assgin))
        {
            //echo 'iffffffff';
           $url=base_url().'index.php?'.$CI->session->userdata('login_type').'/dashboard';
           echo "<script>alert('You haven not permission of this module by admin'); window.location.href ='".$url."'</script>";
        }
//        echo $CI->uri->segment(2);
//       exit;
    }

}
