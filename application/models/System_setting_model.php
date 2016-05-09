<?php

class System_setting_model extends MY_Model {
    
    protected $_table = 'system_setting';
    
    protected $primary_key = 'settings_id';
    
    /**
     * Get records by multiple conditions on same columns
     * @param mixed $where
     * @return object
     */
    
    function get_by_multiple($where) {
        
    }
}