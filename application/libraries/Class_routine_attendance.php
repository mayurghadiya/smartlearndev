<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Class_routine_attendance {

    // Codeigniter instance
    private $_ci;
    private $_class_routine_details;
    private $_recurrence_rule;
    private $_extracted_recurrence_rule = array();

    /**
     * Constructor
     * 
     * @return void
     */
    function __construct() {
        $this->_ci = & get_instance();
    }

    /**
     * Clas routine information
     * @param string $class_routine_id
     * @return object
     */
    function class_routine_details($class_routine_id) {
        $this->_class_routine_details = $this->_ci->db->get_where('class_routine', [
                    'ClassRoutineId' => $class_routine_id
                ])->row();

        return $this->_class_routine_details;
    }

    /**
     * Get the recurrence rule of the schedule
     * @param object $class_routine_details
     * @return string
     */
    function get_recurrence_rule($class_routine_details) {
        $this->_recurrence_rule = $class_routine_details;

        return $this->_recurrence_rule->RecurrenceRule;
    }

    /**
     * Extract rules from recurrence rule of the schedule
     * @param string $recurrence_rule
     * @return mixed
     */
    function extract_details_from_recurrence_rule($recurrence_rule) {
        $this->_recurrence_rule = $recurrence_rule;
        if ($this->_recurrence_rule) {
            $recurrence_rule_details = explode(';', $this->_recurrence_rule);
        } else {
            $recurrence_rule_details = '';
        }

        return $recurrence_rule_details;
    }

    /**
     * Parse reccurrence rule
     * @param string $recurrence_rule
     * @return string
     */
    function parse_reccurrence_rule($recurrence_rule) {
        $parse_rule = str_replace('=', '=>', $recurrence_rule);
        $explode_rule = explode(';', $parse_rule);

        return $explode_rule;
    }

    /**
     * Conditaional reccurrunce rule
     * @param string $parse_rule
     * @return mixed
     */
    function conditional_reccurrence_rule($parse_rule) {
        $reccurrence_rule = explode(";", rtrim($parse_rule, ';'));
        $key_rules = array();
        foreach ($reccurrence_rule as $row) {
            $separate_rule = explode("=>", $row);
            $separate_rule[0] = trim(str_replace('\'', '', str_replace("\x98", "", $separate_rule[0])));
            $value[1] = trim(str_replace('\'', '', $separate_rule[1]));
            //$ytr[1] = str_replace("\x98","",$narr[1]);
            $key_rules[$separate_rule[0]] = $value[1];
        }
        
        return $key_rules;
    }

}
