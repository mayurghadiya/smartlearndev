<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('list_tables')) {

    /**
     * Get the db tables
     * @return array
     */
    function list_tables() {
        $CI = & get_instance();
        $tables = $CI->db->list_tables();
        $list = array();
        foreach ($tables as $table) {
            array_push($list, $table);
        }

        return $list;
    }

}

if (!function_exists('backup_and_restore_table')) {

    /**
     * Backup and restore table list 
     * @return array
     */
    function backup_and_restore_table() {
        $CI = & get_instance();
        $list = list_tables();
        $remove_list = backup_restore_table_ignore_list();
        foreach ($remove_list as $search) {
            if (($key = array_search($search, $list)) !== FALSE) {
                unset($list[$key]);
            }
        }

        return $list;
    }

}

if (!function_exists('backup_restore_table_ignore_list')) {

    /**
     * Backup and restore ignore table list
     * @return array
     */
    function backup_restore_table_ignore_list() {
        $CI = & get_instance();
        $ignore_table_list = array('admin', 'ci_sessions', 'cms_manager', 'language', 'system_setting');

        return $ignore_table_list;
    }

}