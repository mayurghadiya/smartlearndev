<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('course')) {

    /**
     * Course sheet download
     */
    function course() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Course Name',
            'Course Alias',
            'Description',
            'Status'
        ));
        fclose($handle);
    }

}

if (!function_exists('degree')) {

    /**
     * Degree sample field
     */
    function degree() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Degree Name',
        ));
        fclose($handle);
    }

}

if (!function_exists('admission_type')) {

    /**
     * Admission type
     */
    function admission_type() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Admission Type',
        ));
        fclose($handle);
    }

}

if (!function_exists('batch')) {

    /**
     * Batch Sample import sheet
     */
    function batch() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Batch Name',
            'Degree Name'
        ));
        fclose($handle);
    }

}

if (!function_exists('event_manager')) {

    /**
     * Event manager sample import sheet
     */
    function event_manager() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Event Name',
            'Event Description',
            'Event Date'
        ));
        fclose($handle);
    }

}

if (!function_exists('exam_manager')) {

    /**
     * Exam manager sample import sheet 
     */
    function exam_manager() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Exam Name',
            'Year',
            'Total Marks',
            'Passing Marks',
            'Date',
            'Start Time',
            'End Time',
            'Exam Type',
            'Course Name',
            'Semester'
        ));
        fclose($handle);
    }

}

if (!function_exists('fees_structure')) {

    /**
     * Fees structure sample sheet
     */
    function fees_structure() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Title',
            'Course Name',
            'Semester',
            'Fees'
        ));
        fclose($handle);
    }

}

if (!function_exists('subject')) {

    /**
     * Subject import sample
     */
    function subject() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Subject Name',
            'Subject Code',
            'Course',
            'Semester'
        ));
        fclose($handle);
    }

}

if (!function_exists('exam_marks')) {

    /**
     * Sample csv for exam marks
     * @param string $exam_id
     */
    function exam_marks($exam_id = '') {
        $handle = fopen('php://output', 'w');
        $CI = & get_instance();
        $CI->load->database();

        $subjects = $CI->db->select()
                ->from('subject_manager')
                ->join('exam_time_table', 'exam_time_table.subject_id = subject_manager.sm_id')
                ->where('exam_time_table.exam_id', $exam_id)
                ->get()
                ->result();

        $exam = $CI->db->get_where('exam_manager', array(
                    'em_id' => $exam_id
                ))->row();

        $column_array = array(
            'Student Roll No', 'Student Name'
        );
        foreach ($subjects as $row) {
            array_push($column_array, $row->subject_name);
        }
        fputcsv($handle, $column_array);

        $students = $CI->db->select()
                ->from('student')
                ->join('exam_manager', 'exam_manager.course_id = student.course_id')
                ->where('exam_manager.em_id', $exam_id)
                ->where('student.course_id', $exam->course_id)
                ->where('student.semester_id', $exam->em_semester)
                ->get()
                ->result();


        //foreach()
        foreach ($students as $std) {
            $student_mark = array();
            array_push($student_mark, $std->std_roll);
            array_push($student_mark, $std->std_first_name . ' ' . $std->std_last_name);
            foreach ($subjects as $row) {
                $marks = $CI->db->get_where('marks_manager', array(
                            'mm_std_id' => $std->std_id,
                            'mm_subject_id' => $row->sm_id,
                            'mm_exam_id' => $exam_id
                        ))->result();
                foreach ($marks as $m) {
                    array_push($student_mark, $m->mark_obtained);
                }
            }
            fputcsv($handle, $student_mark);
        }


        //fputcsv($handle, $student_mark);

        fclose($handle);
    }

}

if (!function_exists('student_import_sample')) {

    /**
     * Student import csv sample
     */
    function student_import_sample() {
        $handle = fopen('php://output', 'w');
        fputcsv($handle, array(
            'Roll No',
            'First Name',
            'Last Name',
            'Email',
            'Gender',
            'Address',
            'City',
            'Zip',
            'Birth Date',
            'Merital',
            'Mobile',
            'About',
            'Course Name',
            'Semester',
            'Batch'
        ));
        fclose($handle);
    }

}

if (!function_exists('import_degree')) {

    /**
     * Import CSV in DB
     * @param array $data
     * @param array $where
     */
    function import_degree($data, $where) {
        $CI = & get_instance();
        $CI->load->database();
        $is_data_present = $CI->db->get_where('degree', $where)->num_rows();
        $insert_id = 0;
        if (!$is_data_present) {
            //insert
            $insert_id = $CI->db->insert('degree', $data);
        }

        return $insert_id;
    }

}

if (!function_exists('import_admission_type')) {

    /**
     * Import admission type CSV
     * @param array $data
     * @param array $where
     */
    function import_admission_type($data, $where) {
        $CI = & get_instance();
        $CI->load->database();
        $is_data_present = $CI->db->get_where('admission_type', $where)->num_rows();
        $insert_id = 0;
        if (!$is_data_present) {
            //insert
            $insert_id = $CI->db->insert('admission_type', $data);
        }

        return $insert_id;
    }

}

if (!function_exists('import_batch')) {

    /**
     * Import batch CSV
     * @param array $data
     * @param array $where
     */
    function import_batch($data, $where) {
        $CI = & get_instance();
        $CI->load->database();
        $is_data_present = $CI->db->select()
                ->from('degree')
                ->join('batch', 'batch.degree_id = degree.d_id')
                ->where($where)
                ->get()
                ->row();
        $insert_id = 0;

        if (!$is_data_present) {
            //found for degree name in degree table
            $degree = $CI->db->get_where('degree', $where)->row();
            if (count($degree)) {
                //insert only batch
                unset($data['d_name']);
                $data['degree_id'] = (int) $degree->d_id;
                //insert batch
                $insert_id = $CI->db->insert('batch', $data);
            } else {
                //insert degree then insert batch
                $degree_data = array(
                    'd_name' => $data['d_name'],
                    'd_status' => 1
                );
                $CI->db->insert('degree', $degree_data);
                $degree_id = $CI->db->insert_id();
                //insert batch
                unset($data['d_name']);
                $data['degree_id'] = $degree_id;
                $insert_id = $CI->db->insert('batch', $data);
            }
        } else {
            //echo 'found';
            //search for batch name
            $batch = $CI->db->get_where('batch', array('b_name' => $data['b_name']))->row();
            if (!count($batch)) {
                unset($data['d_name']);
                $data['degree_id'] = (int) $is_data_present->d_id;
                $insert_id = $CI->db->insert('batch', $data);
            }
        }

        return $insert_id;
    }

}

if (!function_exists('import_event_manager')) {

    /**
     * Import event manager CSV
     * @param array $data
     * @param array $where
     * @return int
     */
    function import_event_manager($data, $where) {
        $CI = & get_instance();
        $CI->load->database();
        $is_data_present = $CI->db->get_where('event_manager', $where)->num_rows();
        $insert_id = 0;
        if (!$is_data_present) {
            //insert
            $insert_id = $CI->db->insert('event_manager', $data);
        }

        return $insert_id;
    }

}

if (!function_exists('import_fees_structure')) {

    /**
     * Import fees structure CSV
     * @param array $data
     * @param array $where
     * @return int
     */
    function import_fees_structure($data, $where) {
        $CI = & get_instance();
        $CI->load->database();
        $semester = $CI->db->get_where('semester', $where['semester'])->row();
        $course = $CI->db->get_where('course', $where['course'])->row();
        $insert_id = 0;
        if (count($course) && count($semester)) {
            //check for fee
            $fee_structure = $CI->db->get_where('fees_structure', $where['fees_structure'])->num_rows();
            if (!$fee_structure) {
                $data['course_id'] = $course->course_id;
                $data['sem_id'] = $semester->s_id;
                $CI->db->insert('fees_structure', $data);
                $insert_id = $CI->db->insert_id();
            }
        }

        return $insert_id;
    }

}

if (!function_exists('import_subject')) {

    /**
     * Import subject
     * @param array $data
     * @param array $where
     */
    function import_subject($data, $where) {
        $CI = & get_instance();
        $CI->load->database();
        $semester = $CI->db->get_where('semester', $where['semester'])->row();
        $course = $CI->db->get_where('course', $where['course'])->row();
        $insert_id = 0;
        if (count($course) && count($semester)) {
            //check for subject
            $subject = $CI->db->get_where('subject_manager', $where['subject'])->num_rows();
            //var_dump($subject);
            if (!$subject) {
                $data['sm_course_id'] = $course->course_id;
                $data['sm_sem_id'] = $semester->s_id;
                $data['sm_status'] = 1;
                $CI->db->insert('subject_manager', $data);
                $insert_id = $CI->db->insert_id();
            }
        }

        return $insert_id;
    }

}

if (!function_exists('import_student')) {

    /**
     * Import student from CSV
     * @param array $data
     * @param array $where
     * @return int
     */
    function import_student($data, $where) {
        $CI = & get_instance();
        $CI->load->database();
        $insert_id = 0;

        //find for student 
        $student = $CI->db->get_where('student', $where['student_roll_no'])->num_rows();

        if (!$student) {
            // student not exists with roll no
            // find for batch, semester, and course
            $course = $CI->db->get_where('course', $where['course'])->row();
            $batch = $CI->db->get_where('batch', $where['batch'])->row();
            $semester = $CI->db->get_where('semester', $where['semester'])->row();

            if ($course && $batch && $semester) {
                // course, batch, and semester are already present in db
                // insert new student
                $data['std_batch'] = $batch->b_id;
                $data['semester_id'] = $semester->s_id;
                $data['course_id'] = $course->course_id;
                $data['password'] = hash('md5', 'test@123');
                $CI->db->insert('student', $data);
                $insert_id = $CI->db->insert_id();
            }
        }

        return $insert_id;
    }

}

if (!function_exists('import_exam_marks')) {

    /**
     * Import student
     * @param array $data
     * @param array $where
     */
    function import_exam_marks($data, $where) {
        $CI = & get_instance();
        $CI->load->database();
        $insert_id = 0;
        //check for roll

        $student = $CI->db->get_where('student', array(
                    'std_roll' => $where['marks']['mm_std_id']
                ))->row();

        if (count($student)) {
            //check for exam
            $exam = $CI->db->get_where('exam_manager', array(
                        'em_id' => $where['marks']['mm_exam_id']
                    ))->row();

            if (count($exam)) {
                //check from marks
                $marks = $CI->db->get_where('marks_manager', array(
                            'mm_exam_id' => $exam->em_id,
                            'mm_std_id' => $student->std_id
                        ))->row();
                if (count($marks)) {
                    //update
                    foreach ($where['subject'] as $row) {
                        $subject = $CI->db->get_where('subject_manager', array(
                                    'subject_name' => $row
                                ))->row();

                        $insert_data = array(
                            'mm_std_id' => $student->std_id,
                            'mm_subject_id' => $subject->sm_id,
                            'mm_exam_id' => $exam->em_id,
                            'mark_obtained' => $data[$subject->subject_name],
                            'mm_remarks' => ''
                        );
                        $insert_where = array(
                            'mm_subject_id' => $subject->sm_id,
                            'mm_std_id' => $student->std_id,
                            'mm_exam_id' => $exam->em_id,
                        );
                        $CI->db->where($insert_where);
                        $insert_id = $CI->db->update('marks_manager', $insert_data);
                    }
                } else {
                    //insert
                    foreach ($where['subject'] as $row) {
                        $subject = $CI->db->get_where('subject_manager', array(
                                    'subject_name' => $row
                                ))->row();
                        $insert_data = array(
                            'mm_std_id' => $student->std_id,
                            'mm_subject_id' => $subject->sm_id,
                            'mm_exam_id' => $exam->em_id,
                            'mark_obtained' => $data[$subject->subject_name],
                            'mm_remarks' => ''
                        );
                        $CI->db->insert('marks_manager', $insert_data);
                        $insert_id = $CI->db->insert_id();
                    }
                }
            }
        }
        //exit;
        return $insert_id;
    }

}

if (!function_exists('csv_from_result')) {

    /**
     * Generate CSV from query result
     * @param array $result
     * @param string $file_name
     */
    function csv_from_result($result, $file_name) {
        $CI = & get_instance();
        $CI->load->dbutil();
        $CI->load->helper('file');
        $CI->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $data = $CI->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($file_name . '.csv', $data);
    }

}

if (!function_exists('import_exam_manager')) {

    /**
     * Import exam from CSV
     * @param arary $data
     * @param array $where
     * @return int
     */
    function import_exam_manager($data, $where) {
        $CI = & get_instance();
        //check for course is available
        $course = $CI->db->get_where('course', $where['course_name'])->row();

        //check for semester is available
        $semester = $CI->db->get_where('semester', $where['semester'])->row();

        //check for exam type is available
        $exam_type = $CI->db->get_where('exam_type', $where['exam_type'])->row();

        if (count($course) && count($semester) && count($exam_type)) {
            //insert new exam
            $data['course_id'] = $course->course_id;
            $data['em_semester'] = $semester->s_id;
            $data['em_type'] = $exam_type->exam_type_id;
            $CI->db->insert('exam_manager', $data);
        }

        return $CI->db->insert_id();
    }

}

if (!function_exists('check_degree_course_batch_semester')) {

    /**
     * Check for degree, course, batch, and semester
     * @param string $degree
     * @param string $course
     * @param string $batch
     * @param string $semester
     * @return array
     */
    function check_degree_course_batch_semester($degree = '', $course = '', $batch = '', $semester = '') {
        $CI = & get_instance();
        $result = array();

        //check for degree
        $degree_detail = $CI->db->get_where('degree', array(
                    'd_name' => $degree
                ))->row();

        if (count($degree_detail)) {
            //get degree id from degree
            $degree_id = $degree_detail->d_id;
        } else {
            //insert new degree
            $CI->db->insert('degree', array(
                'd_name' => $degree,
                'd_status' => 1
            ));
            $degree_id = $CI->db->insert_id();
        }
        $result['degree'] = $degree_id;

        //check for course
        $course_detail = $CI->db->get_where('course', array(
                    'c_name' => $course,
                    'degree_id' => $degree_id
                ))->row();
        if (count($course_detail)) {
            //get the course id
            $course_id = $course_detail->course_id;
        } else {
            //insert new course with degree
            $CI->db->insert('course', array(
                'c_name' => $course,
                'degree_id' => $degree_id,
                'course_status' => 1
            ));
            $course_id = $CI->db->insert_id();
        }
        $result['course_id'] = $course_id;

        //check for batch
        $query = "SELECT * FROM batch ";
        $query .= "WHERE FIND_IN_SET($degree_id, degree_id) ";
        $query .= "AND FIND_IN_SET($course_id, course_id) ";
        $query .= "AND b_name = $batch";
        $batch_detail = $CI->db->query($query)->row();

        if (count($batch_detail)) {
            // get batch id
            $batch_id = $batch_detail->b_id;
        } else {
            //insert new batch
            $CI->db->insert('batch', array(
                'b_name' => $batch,
                'degree_id' => $degree_id,
                'course_id' => $course_id,
                'b_status' => 1
            ));
            $batch_id = $CI->db->insert_id();
        }
        $result['batch_id'] = $batch_id;

        //check for semester
        $semester_detail = $CI->db->get_where('semester', array(
                    's_name' => $semester
                ))->row();
        if (count($semester_detail)) {
            //get semester id
            $semester_id = $semester_detail->s_id;
        } else {
            //insert new semester
            $CI->db->insert('semester', array(
                's_name' => $semester,
                's_status' => 1
            ));
            $semester_id = $CI->db->insert_id();
        }
        $result['semester_id'] = $semester_id;

        return $result;
    }

}