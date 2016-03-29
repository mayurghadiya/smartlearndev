<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('search_student')) {

    /**
     * Search from student
     * @param string $search_query
     */
    function search_student($search_query) {
        $CI = & get_instance();
        $CI->load->database();
    }

}

if (!function_exists('global_search')) {

    /**
     * 
     * @param string $search_query
     * @param array $from
     * @return array
     */
    function global_search($search_query, $from) {
        $CI = & get_instance();
        $CI->load->database();
        unset($from['search']);

        $is_serach_from_table = (bool) count($from);

        switch ($is_serach_from_table) {
            case TRUE:
                if (isset($from['student']))
                    $result['student'] = student_detail_search($search_query);
                if (isset($from['course']))
                    $result['course'] = course_search($search_query);
                if (isset($from['exam']))
                    $result['exam'] = exam_search($search_query);
                if (isset($from['batch']))
                    $result['batch'] = batch_search($search_query);
                if (isset($from['assignment']))
                    $result['assignment'] = assignment_search($search_query);
                if (isset($from['participate']))
                    $result['participate'] = participate_search($search_query);
                if (isset($from['degree']))
                    $result['degree'] = degree_search($search_query);
                if (isset($from['event']))
                    $result['event'] = event_search($search_query);
                if (isset($from['center']))
                    $result['center'] = exam_center_search($search_query);
                break;
            default :
                //global search
                $result['student'] = student_detail_search($search_query);
                $result['exam'] = exam_search($search_query);
                $result['course'] = course_search($search_query);
                $result['batch'] = batch_search($search_query);
                $result['assignment'] = assignment_search($search_query);
                $result['participate'] = participate_search($search_query);
                $result['degree'] = degree_search($search_query);
        }

        return $result;
    }

}

if (!function_exists('student_detail_search')) {

    /**
     * Student detail search
     * @param string $search_query
     * @return array
     */
    function student_detail_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $students_field = $CI->db->list_fields('student');
        $CI->db->select();
        $CI->db->from('student');
        $CI->db->join('course', 'course.course_id = student.course_id');
        $CI->db->join('semester', 'semester.s_id = student.semester_id');
        foreach ($students_field as $field) {
            $CI->db->or_like("student.{$field}", $search_query, 'after');
        }
        $result = $CI->db->get();

        return $result->result();
    }

}

if (!function_exists('exam_search')) {

    /**
     * Exam search
     * @param string $search_query
     * @return array
     */
    function exam_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $exam_manager = $CI->db->list_fields('exam_manager');
        $CI->db->select();
        $CI->db->from('exam_manager');
        $CI->db->join('course', 'course.course_id = exam_manager.course_id');
        $CI->db->join('degree', 'degree.d_id = exam_manager.degree_id');
        $CI->db->join('batch', 'batch.b_id = exam_manager.batch_id');
        $CI->db->join('semester', 'semester.s_id = exam_manager.em_semester');
        $CI->db->join('exam_type', 'exam_type.exam_type_id = exam_manager.em_type');
        foreach ($exam_manager as $field) {
            $CI->db->or_like("exam_manager.{$field}", $search_query, 'after');
        }
        $result = $CI->db->get();

        return $result->result();
    }

}

if (!function_exists('course_search')) {

    /**
     * Course search
     * @param type $search_query
     * @return type
     */
    function course_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $exam_manager = $CI->db->list_fields('course');
        $CI->db->select();
        $CI->db->from('course');
        $CI->db->join('degree', 'degree.d_id = course.degree_id');
        foreach ($exam_manager as $field) {
            $CI->db->or_like("course.{$field}", $search_query, 'after');
        }
        $result = $CI->db->get();

        return $result->result();
    }

}

if (!function_exists('batch_search')) {

    /**
     * Batch search
     * @param string $search_query
     * @return array
     */
    function batch_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $batch = $CI->db->list_fields('batch');
        $CI->db->select();
        $CI->db->from('batch');
        $CI->db->join('degree', 'degree.d_id = batch.degree_id');
        //$CI->db->join('course', 'course.course_id = batch.course_id');
        foreach ($batch as $field) {
            $CI->db->or_like("batch.{$field}", $search_query, 'after');
        }
        $result = $CI->db->get();

        return $result->result();
    }

}

if (!function_exists('assignment_search')) {

    /**
     * Assignment search
     * @param string $search_query
     * @return array
     */
    function assignment_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $batch = $CI->db->list_fields('assignment_manager');
        $CI->db->select();
        $CI->db->from('assignment_manager');
        $CI->db->join('course', 'course.course_id = assignment_manager.course_id');
        $CI->db->join('semester', 'semester.s_id = assignment_manager.assign_sem');
        $CI->db->join('degree', 'degree.d_id = assignment_manager.assign_degree');
        $CI->db->join('batch', 'batch.b_id = assignment_manager.assign_batch');
        foreach ($batch as $field) {
            $CI->db->or_like("assignment_manager.{$field}", $search_query, 'after');
        }
        $result = $CI->db->get();

        return $result->result();
    }

}

if (!function_exists('participate_search')) {

    /**
     * Participate search
     * @param string $search_query
     * @return array
     */
    function participate_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $batch = $CI->db->list_fields('participate_manager');
        $CI->db->select();
        $CI->db->from('participate_manager');
        $CI->db->join('semester', 'semester.s_id = participate_manager.pp_semester');
        $CI->db->join('student', 'student.std_id = participate_manager.pp_student_id');
        $CI->db->join('course', 'course.course_id = student.course_id');
        $CI->db->join('degree', 'degree.d_id = participate_manager.pp_degree');
        $CI->db->join('batch', 'batch.b_id = participate_manager.pp_batch');
        foreach ($batch as $field) {
            $CI->db->or_like("participate_manager.{$field}", $search_query, 'after');
        }
        $result = $CI->db->get();

        return $result->result();
    }

}

if (!function_exists('degree_search')) {

    /**
     * Search from degree
     * @param string $search_query
     * @return array
     */
    function degree_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $degree = $CI->db->list_fields('degree');
        $CI->db->select();
        $CI->db->from('degree');
        foreach ($degree as $field) {
            $CI->db->or_like("degree.{$field}", $search_query, 'after');
        }
        $result = $CI->db->get();

        return $result->result();
    }

}

if (!function_exists('event_search')) {

    /**
     * Event search
     * @param string $search_query
     * @return array
     */
    function event_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $event = $CI->db->list_fields('event_manager');
        $CI->db->select();
        $CI->db->from('event_manager');
        foreach ($event as $field) {
            $CI->db->or_like("event_manager.{$field}", $search_query, 'after');
        }
        $result = $CI->db->get();

        return $result->result();
    }

}

if (!function_exists('exam_center_search')) {

    /**
     * Exam center search
     * @param string $seacrh_query
     * @return array
     */
    function exam_center_search($search_query) {
        $CI = & get_instance();
        $CI->load->database();

        $center = $CI->db->list_fields('center_user');
        $CI->db->select();
        $CI->db->from('center_user');
        foreach ($center as $field) {
            $CI->db->or_like("center_user.{$field}", $search_query, 'after');
        }
        $CI->db->where('center_status', 1);
        $result = $CI->db->get();

        return $result->result();
    }

}
