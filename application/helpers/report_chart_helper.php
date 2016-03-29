<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('new_student_registration')) {

    /**
     * New student registration
     */
    function new_student_registration() {
        $CI = & get_instance();
        $CI->load->database();

        $result = $CI->db->select('COUNT(*) AS Total, YEAR(created_date) AS Year')
                ->from('student')
                ->group_by('Year')
                ->get()
                ->result();

        return $result;
    }

}

if (!function_exists('male_vs_female_course_wise')) {

    /**
     * Male vs female cours wise
     */
    function male_vs_female_course_wise() {
        $CI = & get_instance();
        $CI->load->database();

        $result['male'] = $CI->db->select('COUNT(*) AS TotalMale, c_name, YEAR(student.created_date) as Year')
                ->from('course')
                ->join('student', 'student.course_id = course.course_id')
                ->where('std_gender', 'Male')
                ->group_by('c_name')
                ->get()
                ->result();

        $result['female'] = $CI->db->select('COUNT(*) AS TotalMale, c_name, YEAR(student.created_date) as Year')
                ->from('course')
                ->join('student', 'student.course_id = course.course_id')
                ->where('std_gender', 'Female')
                ->group_by('c_name')
                ->get()
                ->result();

        return $result;
    }

}

if (!function_exists('course_male_student_count')) {

    /**
     * Student male count course wise
     * @param int $course_id
     * @return int
     */
    function course_male_student_count($course_id) {
        $CI = & get_instance();
        $CI->load->database();

        $result = $CI->db->select('COUNT(*) AS TotalMale')
                ->from('student')
                ->join('course', 'course.course_id = student.course_id')
                ->where('student.std_gender', 'Male')
                ->where('course.course_id', $course_id)
                ->get()
                ->row();
        return (int) $result->TotalMale;
    }

}

if (!function_exists('course_female_student_count')) {

    /**
     * Student female count course wise
     * @param int $course_id
     * @return int
     */
    function course_female_student_count($course_id) {
        $CI = & get_instance();
        $CI->load->database();

        $result = $CI->db->select('COUNT(*) AS TotalMale')
                ->from('student')
                ->join('course', 'course.course_id = student.course_id')
                ->where('student.std_gender', 'Female')
                ->where('course.course_id', $course_id)
                ->get()
                ->row();
        return (int) $result->TotalMale;
    }

}

if (!function_exists('course_wise_student')) {

    /**
     * Course Wise total student count
     * @param int $course_id
     * @return int
     */
    function course_wise_student($course_id) {
        $CI = & get_instance();
        $CI->load->database();

        $result = $CI->db->select('COUNT(*) AS Total')
                ->from('student')
                ->join('course', 'course.course_id = student.course_id')
                ->where('course.course_id', $course_id)
                ->get()
                ->row();
        return (int) $result->Total;
    }

}

if (!function_exists('male_female_students')) {

    /**
     * Male vs female students
     * @return array
     */
    function male_female_students() {
        $CI = & get_instance();
        $CI->load->database();

        $result['total_male_student'] = $CI->db->select()
                ->from('student')
                ->where('std_gender', 'Male')
                ->get()
                ->num_rows();

        $result['total_female_student'] = $CI->db->select()
                ->from('student')
                ->where('std_gender', 'Female')
                ->get()
                ->num_rows();

        return $result;
    }

}