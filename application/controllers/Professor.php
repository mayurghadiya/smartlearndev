<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends Professor_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('professor/Professor_model');
        $this->output->set_header("HTTP/1.0 200 OK");
        $this->output->set_header("HTTP/1.1 200 OK");
        $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        $this->load->helper('notification');
    }

    /**
     * Professor template file
     * @param string $view
     * @param string $data
     */
    function __template($view, $data) {
        $this->load->view('backend/professor/includes/header.php', $data);
        $this->load->view('backend/professor/' . $view);

        $this->load->view('backend/professor/includes/footer.php');
        $this->load->view('backend/modal.php');
    }

    function index() {
        $data['page_name'] = 'dashboard';
        $data['title'] = 'Professor Dashboard';
        $this->__template('dashboard', $data);
    }

    function dashboard() {
        $this->index();
    }

    function subject($param1 = '', $param2 = '') {
       
       $dept = $this->session->userdata('department');
        $page_data['subject'] = $this->db->query("SELECT * FROM subject_manager WHERE FIND_IN_SET('" . $dept . "',professor_id)")->result();
        $login_id = $this->session->userdata('login_user_id');
      $degree =   $this->db->get_where("professor",array("professor_id"=>$login_id))->result();
     
        $this->db->where("degree_id",$degree[0]->department);
        $page_data['course'] = $this->db->get('course')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['page_name'] = 'subject';
        $page_data['page_title'] = 'Subject Management';
        $this->__template('subject', $page_data);
    }

    function events() {
        $data['page_name'] = 'events';
        $data['title'] = 'Events';
        $this->__template('events', $data);
    }

    function holiday($param1 = '', $param2 = '') {


        $page_data['holiday'] = $this->Professor_model->getholiday();
        $page_data['page_name'] = 'holiday';
        $page_data['page_title'] = 'Holiday Management';
        $this->__template('holiday', $page_data);
    }

    function syllabus($param = '', $param2 = '') {
        if ($param == "create") {


            if ($_FILES['syllabusfile']['name'] != "") {
                $path = FCPATH . 'uploads/syllabus';
                if (!is_dir($path)) {
                    mkdir($path, 0777);
                }
                $config['upload_path'] = 'uploads/syllabus';
                $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('syllabusfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/syllabus/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $insert['syllabus_filename'] = $file['file_name'];
                }
            } else {
                $insert['syllabus_filename'] = '';
            }


            $insert['syllabus_title'] = $this->input->post('title');
            $insert['syllabus_degree'] = $this->input->post('degree');
            $insert['syllabus_course'] = $this->input->post('course');
            $insert['syllabus_sem'] = $this->input->post('semester');
            $insert['syllabus_desc'] = $this->input->post('description');


            $this->Professor_model->add_syllabus($insert);
            $this->session->set_flashdata('flash_message', "Syllabus Added Successfully");
            redirect(base_url() . 'professor/syllabus/', 'refresh');
        }
        if ($param == 'do_update') {
            $syllabus = $this->Professor_model->getsyllabus($param2);

            if ($_FILES['syllabusfile']['name'] != "") {
                $path = FCPATH . 'uploads/syllabus';
                if (!is_dir($path)) {
                    mkdir($path, 0777);
                }
                $config['upload_path'] = 'uploads/syllabus';
                $config['allowed_types'] = 'pdf|doc|docx|ppt|pptx';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('syllabusfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/syllabus/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $insert['syllabus_filename'] = $file['file_name'];
                }
            } else {

                $insert['syllabus_filename'] = $syllabus[0]->syllabus_filename;
            }


            $insert['syllabus_title'] = $this->input->post('title');
            $insert['syllabus_degree'] = $this->input->post('degree');
            $insert['syllabus_course'] = $this->input->post('course');
            $insert['syllabus_sem'] = $this->input->post('semester');
            $insert['syllabus_desc'] = $this->input->post('description');
            $insert['update_date'] = date('Y-m-d H:i:s');

            $this->Professor_model->update_syllabus($insert, $param2);
            $this->session->set_flashdata('flash_message', "Syllabus Updated Successfully");
            redirect(base_url() . 'professor/syllabus/', 'refresh');
        }
        if ($param == 'delete') {

            $this->Professor_model->delete_syllabus($param2);
            $this->session->set_flashdata('flash_message', "Syllabus Deleted Successfully");
            redirect(base_url() . 'professor/syllabus/', 'refresh');
        }
        $dept = $this->session->userdata('department');
        $page_data['syllabus'] = $this->Professor_model->get_syllabus();
        $page_data['course'] = $this->db->get('course')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['title'] = 'Syllabus Management';
        $page_data['page_name'] = 'syllabus';
        $this->__template('syllabus', $page_data);
    }

    //// Exam ////
    function exam($param1 = '', $param2 = '') {



        if ($param1 == 'delete') {
            //delete
            $this->db->where('em_id', $param2);
            $this->db->delete('exam_manager');
            delete_notification('exam_manager', $param2);
            $this->session->set_flashdata('flash_message', 'Exam is successfully deleted.');
            redirect(base_url('professor/exam'));
        }
        if ($_POST) {
            if ($param1 == 'create') {
                //check for duplication

                $is_record_present = $this->Professor_model->exam_duplication_check(
                        $_POST['degree'], $_POST['course'], $_POST['batch'], $_POST['semester'], $_POST['exam_name']);

                if (count($is_record_present)) {

                    $this->session->set_flashdata('flash_message', 'Data is already present.');
                    redirect(base_url('professor/exam'));
                } else {

                    // check for validation
                    if ($this->form_validation->run('exam_insert_update') != FALSE) {
                        $data = array(
                            'em_name' => $this->input->post('exam_name', TRUE),
                            'em_type' => $this->input->post('exam_type', TRUE),
                            'total_marks' => $this->input->post('total_marks', TRUE),
                            'passing_mark' => $this->input->post('passing_marks', TRUE),
                            'em_year' => $this->input->post('year', TRUE),
                            'degree_id' => $this->input->post('degree', TRUE),
                            'course_id' => $this->input->post('course', TRUE),
                            'batch_id' => $this->input->post('batch', TRUE),
                            'em_semester' => $this->input->post('semester', TRUE),
                            'em_status' => $this->input->post('status', TRUE),
                            'em_date' => $this->input->post('date', TRUE),
                            'em_start_time' => $this->input->post('start_date_time', TRUE),
                            'em_end_time' => $this->input->post('end_date_time', TRUE),
                        );

                        $this->Professor_model->insert_exam($data);
                        $insert_id = $this->db->insert_id();
                        //$this->exam_email_notification($_POST);
                        $this->session->set_flashdata('flash_message', 'Exam is successfully added.');

                        //create seat no
                        $seat_no_initial = chr(mt_rand(65, 90));

                        //get students
                        $students_info = $this->Professor_model->custom_student_details(array(
                            'std_degree' => $_POST['degree'],
                            'course_id' => $_POST['course'],
                            'std_batch' => $_POST['batch'],
                            'semester_id' => $_POST['semester']
                        ));

                        $seat_no = str_pad($insert_id, 4, 0, STR_PAD_RIGHT);
                        $seat_no .= mt_rand(12348, 69535);

                        //echo '<pre>';
                        foreach ($students_info as $student) {
                            //var_dump($student);
                            $seat_no++;
                            $student_seat_no = $seat_no_initial . $seat_no;
                            $this->Professor_model->save_exam_seat_no([
                                'student_id' => $student->std_id,
                                'exam_id' => $insert_id,
                                'seat_no' => $student_seat_no
                            ]);
                        }



                        create_notification('exam_manager', $_POST['degree'], $_POST['course'], $_POST['batch'], $_POST['semester'], $insert_id);

                        redirect(base_url('professor/exam'));
                    } else {
                        $page_data['edit_error'] = validation_errors();
                        redirect(base_url('professor/exam'));
                    }
                }
            } elseif ($param1 == 'do_update') {

                //do validation
                if ($this->form_validation->run('exam_insert_update') != FALSE) {
                    $data = array(
                        'em_name' => $this->input->post('exam_name', TRUE),
                        'em_type' => $this->input->post('exam_type', TRUE),
                        'total_marks' => $this->input->post('total_marks', TRUE),
                        'em_year' => $this->input->post('year', TRUE),
                        'degree_id' => $this->input->post('degree', TRUE),
                        'course_id' => $this->input->post('course', TRUE),
                        'batch_id' => $this->input->post('batch', TRUE),
                        'em_semester' => $this->input->post('semester', TRUE),
                        'em_status' => $this->input->post('status', TRUE),
                        'em_date' => $this->input->post('date', TRUE),
                        'em_start_time' => $this->input->post('start_date_time', TRUE),
                        'em_end_time' => $this->input->post('end_date_time', TRUE),
                    );

                    $this->Professor_model->update_exam($param2, $data);
                    $this->session->set_flashdata('flash_message', 'Exam is successfully updated.');
                    redirect(base_url('professor/exam'));
                } else {
                    $page_data['edit_error'] = validation_errors();
                    redirect(base_url('professor/exam'));
                }
            }
        }
//$exam = $this->Professor_model->exam_details();

        $page_data['page_name'] = 'exam';
        $page_data['page_title'] = 'Exam Management';
        $page_data['exams'] = $this->Professor_model->exam_details();
        $page_data['exam_type'] = $this->Professor_model->get_all_exam_type();
        $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['centerlist'] = $this->db->get('center_user')->result();
        $this->__template('exam', $page_data);
    }

    /**
     * Course list from degree
     * @param int $degree_id
     */
    function course_list_from_degree($degree_id) {
        $this->load->model('professor/Professor_model');
        $course = $this->Professor_model->course_list_from_degree($degree_id);

        echo json_encode($course);
    }

    /**
     * Batch list from degree and course
     * @param int $degree
     * @param int $course
     */
    function batch_list_from_degree_and_course($degree = '', $course = '') {
        $this->load->model('professor/Professor_model');
        $batch = $this->Professor_model->batch_list_from_degree_and_course($degree, $course);

        echo json_encode($batch);
    }

    /**
     * Get all semesters of the branch
     * @param string $branch_id
     */
    function get_semesters_of_branch($branch_id = '') {
        $this->load->model('professor/Professor_model');
        $semester = $this->Professor_model->get_semesters_of_branch($branch_id);

        echo json_encode($semester);
    }

    function get_exam_filter($degree, $course, $batch, $semester) {
        $this->load->model('professor/Professor_model');
        $data['exams'] = $this->Professor_model->get_exam_filter($degree, $course, $batch, $semester);
        $this->load->view("backend/admin/exam_filter", $data);
    }

    /**
     * Exam time table
     * @param string $param1
     * @param string $param2
     */
    function exam_time_table($param1 = '', $param2 = '') {
        $this->load->model('professor/Professor_model');
        if ($param1 == 'delete') {
            //delete
            $this->db->where('exam_time_table_id', $param2);
            $this->db->delete('exam_time_table');
            delete_notification('exam_time_table', $param2);
            $this->session->set_flashdata('flash_message', 'Exam time table deleted successfully');
            redirect(base_url('professor/exam_time_table'));
        }
        if ($_POST) {
            if ($param1 == 'create') {
                //check for duplication
                $is_record_present = $this->Professor_model->exam_time_table_duplication(
                        $_POST['exam'], $_POST['subject']);

                if (count($is_record_present)) {
                    $this->session->set_flashdata('flash_message', 'Data is already present.');
                } else {
                    // do form validation
                    if ($this->form_validation->run('time_table_insert_update') != FALSE) {
                        //create
                        $this->Professor_model->exam_time_table_save(array(
                            'degree_id' => $this->input->post('degree', TRUE),
                            'course_id' => $this->input->post('course', TRUE),
                            'batch_id' => $this->input->post('batch', TRUE),
                            'semester_id' => $this->input->post('semester', TRUE),
                            'exam_id' => $this->input->post('exam', TRUE),
                            'subject_id' => $this->input->post('subject', TRUE),
                            'exam_date' => $this->input->post('exam_date', TRUE),
                            'exam_start_time' => $this->input->post('start_time', TRUE),
                            'exam_end_time' => $this->input->post('end_time', TRUE),
                        ));
                        $insert_id = $this->db->insert_id();
                        create_notification('exam_time_table', $_POST['degree'], $_POST['course'], $_POST['batch'], $_POST['semester'], $insert_id);
                        $this->session->set_flashdata('flash_message', 'Time table is added successfully.');
                        redirect(base_url('professor/exam_time_table'));
                    }
                }
            } elseif ($param1 == 'update') {
                // do form validation
                if ($this->form_validation->run('time_table_insert_update') != FALSE) {
                    //update
                    $this->Professor_model->exam_time_table_save(array(
                        'degree_id' => $this->input->post('degree', TRUE),
                        'course_id' => $this->input->post('course', TRUE),
                        'batch_id' => $this->input->post('batch', TRUE),
                        'exam_id' => $this->input->post('exam', TRUE),
                        'subject_id' => $this->input->post('subject', TRUE),
                        'exam_date' => $this->input->post('exam_date', TRUE),
                        'exam_start_time' => $this->input->post('start_time', TRUE),
                        'exam_end_time' => $this->input->post('end_time', TRUE),
                            ), $param2);
                    $this->session->set_flashdata('flash_message', 'Time table updated successfully');
                    redirect(base_url('professor/exam_time_table'));
                }
            }
        }
        $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['time_table'] = $this->Professor_model->time_table();
        $page_data['title'] = 'Exam Time Table';
        $page_data['page_name'] = 'exam_time_table';
        $this->__template('exam_time_table', $page_data);
    }

    /**
     * Exam marks CRUD
     * @param string $course_id
     * @param string $semester_id
     * @param string $exam_id
     */
    function marks($degree_id = '', $course_id = '', $batch_id = '', $semester_id = '', $exam_id = '', $student_id = '') {
        $this->load->model('professor/Professor_model');
        if ($_POST) {
            //exam details

            $exam_detail = $this->Professor_model->exam_detail($exam_id);

            //subject details
            $subject_details = $this->Professor_model->exam_time_table_subject_list($exam_id);

            //$subject_details = $this->Crud_model->exam_time_table_subject_list($exam_detail[0]->em_id);
            //student list
            $student_list = $this->Professor_model->student_list_by_course_semester($degree_id, $course_id, $batch_id, $semester_id);

            $total_students = $_POST['total_student'];


            for ($i = 1; $i <= $total_students; $i++) {
                //subject loop
                if ($student_id != '') {
                    if ($student_id != $student_list[$i - 1]->std_id)
                        continue;
                }
                for ($j = 0; $j < count($subject_details); $j++) {
                    //where

                    $where = array(
                        'mm_std_id' => $student_list[$i - 1]->std_id,
                        'mm_subject_id' => $subject_details[$j]->sm_id,
                        'mm_exam_id' => $exam_detail[0]->em_id,
                    );

                    $marks = $this->Professor_model->student_exam_mark($where);

                    if (count($marks)) {
                        if ($student_id != '') {
                            $this->Professor_model->mark_update(array(
                                'mm_std_id' => $student_list[$i - 1]->std_id,
                                'mm_subject_id' => $subject_details[$j]->sm_id,
                                'mm_exam_id' => $exam_detail[0]->em_id,
                                'mark_obtained' => $_POST["mark_1_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}_{$subject_details[$j]->sm_id}"],
                                'mm_remarks' => $_POST["remark_1_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}"],
                                    ), $where);
                        } else {
                            $this->Professor_model->mark_update(array(
                                'mm_std_id' => $student_list[$i - 1]->std_id,
                                'mm_subject_id' => $subject_details[$j]->sm_id,
                                'mm_exam_id' => $exam_detail[0]->em_id,
                                'mark_obtained' => $_POST["mark_{$i}_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}_{$subject_details[$j]->sm_id}"],
                                'mm_remarks' => $_POST["remark_{$i}_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}"],
                                    ), $where);
                        }
                        //udpate                        
                    } else {
                        //insert    
                        if ($student_id != '') {
                            $this->Professor_model->mark_insert(array(
                                'mm_std_id' => $student_list[$i - 1]->std_id,
                                'mm_subject_id' => $subject_details[$j]->sm_id,
                                'mm_exam_id' => $exam_detail[0]->em_id,
                                'mark_obtained' => $_POST["mark_1_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}_{$subject_details[$j]->sm_id}"],
                                'mm_remarks' => $_POST["remark_1_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}"],
                            ));
                        } else {
                            $this->Professor_model->mark_insert(array(
                                'mm_std_id' => $student_list[$i - 1]->std_id,
                                'mm_subject_id' => $subject_details[$j]->sm_id,
                                'mm_exam_id' => $exam_detail[0]->em_id,
                                'mark_obtained' => $_POST["mark_{$i}_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}_{$subject_details[$j]->sm_id}"],
                                'mm_remarks' => $_POST["remark_{$i}_{$student_list[$i - 1]->std_id}_{$exam_detail[0]->em_id}"],
                            ));
                        }

                        $insert_id = $this->db->insert_id();
                        create_notification('marks_manager', $student_list[$i - 1]->std_degree, $student_list[$i - 1]->course_id, $student_list[$i - 1]->std_batch, $student_list[$i - 1]->semester_id, $insert_id, $student_list[$i - 1]->std_id);
                    }
                }
            }
            if ($student_id != '') {
                $this->session->set_flashdata('flash_message', 'Marks is successfully updated.');
                redirect(base_url('professor/marks/' . $degree_id . '/' . $course_id . '/' . $batch_id . '/' . $semester_id . '/' . $exam_id . '/' . $student_id));
            }
            $this->session->set_flashdata('flash_message', 'Marks is successfully updated.');
            redirect(base_url('professor/marks/' . $degree_id . '/' . $course_id . '/' . $batch_id . '/' . $semester_id . '/' . $exam_id));
        }
        $page_data['degree_id'] = '';
        $page_data['course_id'] = '';
        $page_data['semester_id'] = '';
        $page_data['exam_id'] = '';
        $page_data['batch_id'] = '';
        $page_data['student_id'] = $student_id;
        $page_data['student_list'] = array();
        $page_data['subject_details'] = array();
        $page_data['exam_detail'] = array();

        if ($degree_id != '' && $course_id != '' && $batch_id != '' && $semester_id != '' && $exam_id != '') {
            //assign variable
            $page_data['degree_id'] = $degree_id;
            $page_data['course_id'] = $course_id;
            $page_data['batch_id'] = $batch_id;
            $page_data['semester_id'] = $semester_id;
            $page_data['exam_id'] = $exam_id;

            //exam details
            $page_data['exam_detail'] = $this->Professor_model->exam_detail($exam_id);

            //subject details
            $page_data['subject_details'] = $this->Professor_model->exam_time_table_subject_list($exam_id);

            //student list
            $page_data['student_list'] = $this->Professor_model->student_list_by_course_semester($degree_id, $course_id, $batch_id, $semester_id);
        }
        $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['time_table'] = $this->Professor_model->time_table();
        $page_data['title'] = 'Exam Marks';
        $page_data['page_name'] = 'exam_marks';
        $this->__template('exam_marks', $page_data);
    }

    /**
     * Fees structure
     * @param string $param1
     * @param string $param2
     */
    function fees_structure($param1 = '', $param2 = '') {
        $this->load->model('professor/Professor_model');
        $this->load->helper('notification');
        if ($param1 == 'delete') {
            $this->db->where('fees_structure_id', $param2);
            $this->db->delete('fees_structure');
            $this->session->set_flashdata('flash_message', 'Fees structure is successfully deleted.');
            redirect(base_url('professor/fees_structure'));
        }
        if ($_POST) {
            if ($param1 == 'create') {
                //check for duplication
                $is_record_present = $this->Crud_model->fees_structure_duplication(
                        $_POST['degree'], $_POST['course'], $_POST['batch'], $_POST['semester'], $_POST['title']);
                if (count($is_record_present)) {
                    $this->session->set_flashdata('flash_message', 'Data is already present');
                } else {
                    $this->Crud_model->fees_structure_save(array(
                        'title' => $this->input->post('title', TRUE),
                        'degree_id' => $this->input->post('degree', TRUE),
                        'course_id' => $this->input->post('course', TRUE),
                        'batch_id' => $this->input->post('batch', TRUE),
                        'sem_id' => $this->input->post('semester', TRUE),
                        'total_fee' => $this->input->post('fees', TRUE),
                        'description' => $this->input->post('description', TRUE),
                        'fee_start_date' => $this->input->post('start_date', TRUE),
                        'fee_end_date' => $this->input->post('end_date', TRUE),
                        'fee_expiry_date' => $this->input->post('expiry_date', TRUE),
                        'penalty' => $this->input->post('penalty', TRUE)
                    ));
                    $insert_id = $this->db->insert_id();
                    //create notification for students
                    create_notification('fees_structure', $_POST['degree'], $_POST['course'], $_POST['batch'], $_POST['semester'], $insert_id);
                    $this->session->set_flashdata('flash_message', 'Fees structure is successfully added.');
                }
            } elseif ($param1 == 'update') {
                $this->Crud_model->fees_structure_save(array(
                    'title' => $this->input->post('title', TRUE),
                    'degree_id' => $this->input->post('degree', TRUE),
                    'course_id' => $this->input->post('course', TRUE),
                    'batch_id' => $this->input->post('edit_batch', TRUE),
                    'sem_id' => $this->input->post('semester', TRUE),
                    'total_fee' => $this->input->post('fees', TRUE),
                    'fee_start_date' => $this->input->post('start_date', TRUE),
                    'fee_end_date' => $this->input->post('end_date', TRUE),
                    'fee_expiry_date' => $this->input->post('expiry_date', TRUE),
                    'penalty' => $this->input->post('penalty', TRUE),
                    'description' => $this->input->post('description', TRUE),
                        ), $param2);
                $this->session->set_flashdata('flash_message', 'Fees structure is successfully updated.');
            }
            redirect(base_url('professor/fees_structure'));
        }
        $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['fees_structure'] = $this->Professor_model->get_all_fees_structure();
        $page_data['title'] = 'Fees Structure';
        $page_data['page_name'] = 'fees_structure';
        $this->__template('fees_structure', $page_data);
    }

    /**
     * Get subject list by course and semester
     * @param type $course_id
     * @param type $semester_id
     */
    function subject_list($course_id = '', $semester_id, $time_table = '') {
        $this->load->model('admin/Crud_model');
        $subjects = $this->Crud_model->subject_list($course_id, $semester_id);
        echo "<option vale=''>Select</option>";
        foreach ($subjects as $row) {
            ?>
            <option value="<?php echo $row->sm_id; ?>"
                    <?php if ($row->sm_id == $time_table) echo 'selected'; ?>><?php echo $row->subject_name . '  Code: ' . $row->subject_code; ?></option>
            <!--echo "<option value={$row->sm_id}>{$row->subject_name}  (Code: {$row->subject_code})</option>";-->
            <?php
        }
    }

    /**
     * Get exam list by course name and semester
     * @param type $course_id
     * @param type $semester_id
     * 
     */
    function get_exam_list($degree_id = '', $course_id = '', $batch_id = '', $semester_id = '', $time_table = '') {
        $this->load->model('admin/Crud_model');
        $exam_detail = $this->Crud_model->get_exam_list($degree_id, $course_id, $batch_id, $semester_id);
        echo "<option value=''>Select</option>";


        foreach ($exam_detail as $row) {

            if ($row->em_id == $time_table) {
                $selected = 'selected=selected';
            } else {
                $selected = '';
            }
            echo "<option value='" . $row->em_id . "' " . $selected . " >" . $row->em_name . "  (Marks" . $row->total_marks . ")</option>";
        }
    }

    /**
     * Exam list from degree, course, batch and sem
     * @param int $degree
     * @param int $course
     * @param int $batch
     * @param int $semester
     */
    function exam_list_from_degree_and_course($degree, $course, $batch, $semester, $type = '') {
        $this->load->model('admin/Crud_model');
        $exam_list = $this->Crud_model->exam_list_from_degree_and_course($degree, $course, $batch, $semester, $type);

        echo json_encode($exam_list);
    }

    /**
     * Subject list from course and semester
     * @param int $course
     * @param int $semester
     */
    function subject_list_from_course_and_semester($course, $semester) {
        $this->load->model('admin/Crud_model');
        $subjects = $this->Crud_model->subject_list_from_course_and_semester($course, $semester);

        echo json_encode($subjects);
    }

    /**
     * Exam schedule ajax filter
     * @param string $degree
     * @param string $course
     * @param string $batch
     * @param string $semester
     * @param string $exam
     */
    function get_exam_schedule_filter($degree, $course, $batch, $semester, $exam) {
        $this->load->model('admin/Crud_model');
        $data['time_table'] = $this->Crud_model->exam_schedule_filter($degree, $course, $batch, $semester, $exam);
        $this->load->view("backend/professor/exam_schedule_filter", $data);
    }

    /**
     * Professor class routine
     */
    function class_routine() {
        $this->load->view('backend/professor/class_routine');
    }

    /**
     * Class routine data for professor
     */
    function class_routine_data() {
        $class_routine = $this->Professor_model->professor_class_schedule();
        //$class_routine = $this->db->get('class_routine')->result();
        echo json_encode($class_routine);
    }

    function student($param1 = '', $param2 = '') {
        $dpet = $this->session->userdata('department');
        $branch = $this->session->userdata('branch');

        $page_data['student'] = $this->Professor_model->get_prof_student($dpet, $branch);
        $page_data['page_name'] = 'student';
        $page_data['page_title'] = 'Student Management';
        $this->__template('student', $page_data);
    }

    function get_course($param = '') {
        $did = $this->input->post("degree");

        if ($did != '') {
            $cource = $this->db->get_where("course", array("degree_id" => $did))->result_array();
            $html = '<option value="">Select Branch</option>';
            foreach ($cource as $crs):
                $html .='<option value="' . $crs['course_id'] . '">' . $crs['c_name'] . '</option>';

            endforeach;
            echo $html;
        }
    }

    function get_cource($param = '') {

        $did = $this->input->post("degree");

        if ($did != '') {

            if ($did == "All") {
                
            } else {

                $cource = $this->db->get_where("course", array("degree_id" => $did))->result_array();

                $html = '<option value="">Select Branch</option>';
                if ($param == '') {
                    $html .= '<option value="All">All</option>';
                }
                foreach ($cource as $crs):
                    $html .='<option value="' . $crs['course_id'] . '">' . $crs['c_name'] . '</option>';

                endforeach;
                echo $html;
            }
        }
    }

    function get_batches($param = '') {
        $cid = $this->input->post("course");
        $did = $this->input->post("degree");
        if ($cid != '') {

            // $cource = $this->db->get_where("batch",array("degree_id"=>$cid))->result_array();
            $batch = $this->db->query("SELECT * FROM batch WHERE FIND_IN_SET('" . $did . "',degree_id) AND FIND_IN_SET('" . $cid . "',course_id)")->result_array();
            // echo $this->db->last_query();

            $html = '<option value="">Select Batch</option>';

            foreach ($batch as $btc):
                $html .='<option value="' . $btc['b_id'] . '">' . $btc['b_name'] . '</option>';

            endforeach;
            echo $html;
        }
    }

    function get_semester($param = '') {
        $cid = $this->input->post("course");
        $course = $this->db->get_where('course', array('course_id' => $cid))->result_array();

        $semexplode = explode(',', $course[0]['semester_id']);
        $semester = $this->db->get('semester')->result_array();

        foreach ($semester as $sem) {
            if (in_array($sem['s_id'], $semexplode)) {
                $semdata[] = $sem;
            }
        }
        $option = "<option value=''>Select semester</option>";
        foreach ($semdata as $s) {
            $option .="<option value=" . $s['s_id'] . ">" . $s['s_name'] . "</option>";
        }
        echo $option;
    }

    function assignment($param1 = '', $param2 = '') {
        if ($param1 == 'create') {
            if ($_FILES['assignmentfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('assignmentfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/assignment/', 'refresh');
                } else {
                    $file = $this->upload->data();

                    $data['assign_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['assign_filename'];
                }
            } else {
                $data['assign_filename'] = '';
                $file_url = '';
            }


            $data['course_id'] = $this->input->post('course');
            $data['assign_title'] = $this->input->post('title');
            $data['assign_batch'] = $this->input->post('batch');
            $data['assign_url'] = $file_url;
            $data['assign_sem'] = $this->input->post('semester');
            $data['class_id'] = $this->input->post('class');
            $data['assign_desc'] = $this->input->post('description');
            $data['assign_dos'] = $this->input->post('submissiondate');
            $data['assign_status'] = 1;
            $data['created_date'] = date('Y-m-d');
            $data['assign_degree'] = $this->input->post('degree');


            $this->Professor_model->addassignment($data);
            $last_id = $this->db->insert_id();

            $assign_degree = $data['assign_degree'];
            $assign_sem = $data['assign_sem'];
            $assign_batch = $data['assign_batch'];
            $course_id = $data['course_id'];
            $this->db->where('std_batch', $assign_batch);
            $this->db->where('semester_id', $assign_sem);
            $this->db->where('std_degree', $assign_degree);
            $this->db->where('course_id', $course_id);
            $students = $this->db->get('student')->result();
            $std_id = '';
            foreach ($students as $std) {
                $id = $std->std_id;


                $std_id[] = $id;
                //  $student_id = implode(",",$id);
                // $std_ids[] =$student_id;
            }
            if ($std_id != '') {
                $student_ids = implode(",", $std_id);
            } else {
                $student_ids = '';
            }
            $this->db->where("notification_type", "assignment_manager");
            $res = $this->db->get("notification_type")->result();
            if ($res != '') {
                $notification_id = $res[0]->notification_type_id;
                $notify['notification_type_id'] = $notification_id;
                $notify['student_ids'] = $student_ids;
                $notify['degree_id'] = $assign_degree;
                $notify['course_id'] = $course_id;
                $notify['batch_id'] = $assign_batch;
                $notify['semester_id'] = $assign_sem;
                $notify['data_id'] = $last_id;
                $this->db->insert("notification", $notify);
            }

            // $res = $this->db->get_where("notification_type",array("notification_type"=>"assignment_manager"))->result();
            //echo $res[0]['notification_type_id'];
            //$this->db->insert();


            $this->session->set_flashdata('flash_message', 'Assignment Added Successfully');
            redirect(base_url() . 'professor/assignment/', 'refresh');
        }
        if ($param1 == 'do_update') {


            if ($_FILES['assignmentfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('assignmentfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/assignment/', 'refresh');
                } else {
                    $file = $this->upload->data();

                    $data['assign_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['assign_filename'];
                }
            } else {

                $file_url = $this->input->post('assignmenturl');
            }


            $data['course_id'] = $this->input->post('course');
            $data['assign_title'] = $this->input->post('title');
            $data['assign_batch'] = $this->input->post('batch');
            $data['assign_url'] = $file_url;
            $data['assign_sem'] = $this->input->post('semester');
            $data['class_id'] = $this->input->post('class');
            $data['assign_desc'] = $this->input->post('description');
            $data['assign_dos'] = $this->input->post('submissiondate1');
            $data['assign_degree'] = $this->input->post('degree');
            $data['assign_status'] = 1;

            $this->Professor_model->updateassignment($data, $param2);
            $this->session->set_flashdata('flash_message', 'Assignment Updated Successfully');
            redirect(base_url() . 'professor/assignment/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->Professor_model->deleteassignment($param2);
            delete_notification('assignment_manager', $param2);
            $this->session->set_flashdata('flash_message', 'Assignment Deleted Successfully');
            redirect(base_url() . 'professor/assignment/', 'refresh');
        }

        $page_data['assignment'] = $this->Professor_model->get_assignment();

        $page_data['submitedassignment'] = $this->Professor_model->submitttedassignment();

     $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['batch'] = $this->Professor_model->get_all_bacth();

        $page_data['course'] = $this->db->get('course')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['class'] = $this->db->get('class')->result();
        $page_data['page_name'] = 'assignment';
        $page_data['page_title'] = 'Assignment Management';
        $this->__template('assignment', $page_data);
    }

    function checkassignments() {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post('semester');
        $title = $this->input->post('title');
        $data = $this->db->get_where('assignment_manager', array('assign_degree' => $degree,
                    'course_id' => $course,
                    'assign_title' => $title,
                    'assign_batch' => $batch, 'assign_sem' => $semester))->result_array();
        echo json_encode($data);
    }

    function checkassignment($id = '') {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post('semester');
        $title = $this->input->post('title');
        $data = $this->db->get_where('assignment_manager', array('assign_degree' => $degree,
                    'course_id' => $course,
                    'assign_title' => $title,
                    'assign_batch' => $batch, 'assign_sem' => $semester, 'assign_id!=' => $id))->result_array();

        echo json_encode($data);
    }

    function assessments($param = '', $id = '') {
        $this->load->model('admin/Crud_model');
        if ($param == 'create') {
            $data['degree'] = $this->input->post('degree');
            $data['course'] = $this->input->post('course');
            $data['batch'] = $this->input->post('batch');
            $data['semester'] = $this->input->post('semester');
            $data['student'] = $this->input->post('student');
            $data['instruction'] = $this->input->post('instruction');
            $data['submissions'] = $this->input->post('submissions');
            $data['feedback_tutor'] = $this->input->post('feedback');
            $data['marks'] = $this->input->post('marks');
            $data['user_role'] = $this->session->userdata('login_type');
            $data['user_role_id'] = $this->session->userdata('login_user_id');
            $this->Professor_model->create_assessment($data);
            $this->session->set_flashdata('flash_message', 'Assessment added Successfully.');
            redirect(base_url('professor/assessments'));
        }

        if ($param == 'update') {
            $data['degree'] = $this->input->post('degree');
            $data['course'] = $this->input->post('course');
            $data['batch'] = $this->input->post('batch');
            $data['semester'] = $this->input->post('semester');
            $data['student'] = $this->input->post('student');
            $data['instruction'] = $this->input->post('instruction');
            $data['submissions'] = $this->input->post('submissions');
            $data['feedback_tutor'] = $this->input->post('feedback');
            $data['marks'] = $this->input->post('marks');
            $this->Professor_model->update_assessment($data, $id);
            $this->session->set_flashdata('flash_message', 'Assessment update Successfully.');
            redirect(base_url('professor/assessments'));
        }
        if ($param == 'delete') {
            $this->Professor_model->delete_assessment($id);
            $this->session->set_flashdata('flash_message', 'Assessment delete Successfully.');
            redirect(base_url('professor/assessments'));
        }

        $page_data['title'] = 'assessments';
        $page_data['page_name'] = 'assessments';
        $page_data['assessments'] = $this->Professor_model->assessment();
        $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['batch'] = $this->Professor_model->get_all_bacth();
        $this->__template('assessments', $page_data);
    }

    function assessment_student() {
        $batch = $this->input->post("batch");
        $sem = $this->input->post("semester");
        $degree = $this->input->post("degree");
        $course = $this->input->post("course");

        $datastudent = $this->db->get_where("student", array("std_batch" => $batch, 'std_status' => 1, "semester_id" => $sem, 'course_id' => $course, 'std_degree' => $degree))->result();
        $html ='<option value="">Select Student</option>';  
       foreach($datastudent as $row):
          $html .='<option value="'.$row->std_id.'">'.$row->name.'</option>';
       endforeach;
       echo $html;
             
    }
    
     function studyresource($param1 = '', $param2 = '') {
       
        if ($param1 == 'create') {
            if ($_FILES['resourcefile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('resourcefile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/studyresource/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['study_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['study_filename'];
                }
            } else {

                $file_url = '';
            }
            $data['study_degree'] = $this->input->post('degree');
            $data['study_title'] = $this->input->post('title');
            $data['study_batch'] = $this->input->post('batch');
            $data['study_url'] = $file_url;
            $data['study_sem'] = $this->input->post('semester');
            $data['study_course'] = $this->input->post('course');
            $data['study_status'] = 1;
            $data['created_date'] = date('Y-m-d');

            $this->db->insert('study_resources', $data);
            $last_id = $this->db->insert_id();
            $batch = $data['study_batch'];
            $degree = $data['study_degree'];
            $semester = $data['study_sem'];
            $course = $data['study_course'];
            if ($degree == 'All') {
                $students = $this->db->get('student')->result();
            } else {
                if ($course == 'All') {
                    $this->db->where('std_degree', $degree);
                    $students = $this->db->get('student')->result();
                } else {
                    if ($batch == 'All') {
                        $this->db->where('std_degree', $degree);
                        $this->db->where('course_id', $course);
                        $students = $this->db->get('student')->result();
                    } else {
                        if ($semester == 'All') {
                            $this->db->where('std_batch', $batch);
                            $this->db->where('std_degree', $degree);
                            $this->db->where('course_id', $course);
                            $students = $this->db->get('student')->result();
                        } else {
                            $this->db->where('std_batch', $batch);
                            $this->db->where('std_degree', $degree);
                            $this->db->where('course_id', $course);
                            $this->db->where('semester_id', $semester);
                            $students = $this->db->get('student')->result();
                        }
                    }
                }
            }
            $std_id = '';
            foreach ($students as $std) {
                $id = $std->std_id;


                $std_id[] = $id;
                //  $student_id = implode(",",$id);
                // $std_ids[] =$student_id;
            }
            if ($std_id != '') {
                $student_ids = implode(",", $std_id);
            } else {
                $student_ids = '';
            }
            $this->db->where("notification_type", "study_resources");
            $res = $this->db->get("notification_type")->result();
            if ($res != '') {
                $notification_id = $res[0]->notification_type_id;
                $notify['notification_type_id'] = $notification_id;
                $notify['student_ids'] = $student_ids;
                $notify['degree_id'] = $degree;
                $notify['course_id'] = $course;
                $notify['batch_id'] = $batch;
                $notify['semester_id'] = $semester;
                $notify['data_id'] = $last_id;
                $this->db->insert("notification", $notify);
            }
            $this->session->set_flashdata('flash_message', 'Studyresource Added Successfully');
            redirect(base_url() . 'professor/studyresource/', 'refresh');
        }
        if ($param1 == 'do_update') {
            if ($_FILES['resourcefile']['name'] != "") {


                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('resourcefile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/studyresource/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['study_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['study_filename'];
                }
            } else {
                $file_url = $this->input->post('pageurl');
            }
            $data['study_degree'] = $this->input->post('degree');
            $data['study_title'] = $this->input->post('title');
            $data['study_batch'] = $this->input->post('batch');
            $data['study_url'] = $file_url;
            $data['study_sem'] = $this->input->post('semester');
            $data['study_course'] = $this->input->post('course');
            $data['study_status'] = 1;

            $this->db->where('study_id', $param2);
            $this->db->update('study_resources', $data);
            $this->session->set_flashdata('flash_message', 'Studyresource Updated Successfully');

            redirect(base_url() . 'professor/studyresource/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('study_id', $param2);
            $this->db->delete('study_resources');
            delete_notification('study_resources', $param2);
            $this->session->set_flashdata('flash_message', 'Studyresource Deleted Successfully');
            redirect(base_url() . 'professor/studyresource/', 'refresh');
        }
        
        $page_data['studyresource'] = $this->Professor_model->get_studyresource();
        $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['batch'] = $this->Professor_model->get_all_bacth();
        $page_data['page_name'] = 'studyresource';
        $page_data['page_title'] = 'Study Resource Management';
        $this->__template('studyresource', $page_data);
    }
     function get_semesterall() {

        $cid = $this->input->post("course");

        if ($cid == 'All') {
            $course = $this->db->get('course')->result_array();
        } else {

            $course = $this->db->get_where('course', array('course_id' => $cid))->result_array();
        }

        $semexplode = explode(',', $course[0]['semester_id']);
        $semester = $this->db->get('semester')->result_array();
        $semdata = '';
        foreach ($semester as $sem) {
            if (in_array($sem['s_id'], $semexplode)) {
                $semdata[] = $sem;
            }
        }
        $option = "<option value=''>Select semester</option>";
        $option .="<option value='All'>All</option>";

        foreach ($semdata as $s) {
            $option .="<option value=" . $s['s_id'] . ">" . $s['s_name'] . "</option>";
        }
        echo $option;
    }
     function get_courcestudy($param = '') {

        $did = $this->input->post("degree");

        if ($did != '') {



            $cource = $this->db->get_where("course", array("degree_id" => $did))->result_array();

            $html = '<option value="">Select Branch</option>';
            if ($param == '') {
                $html .= '<option value="All">All</option>';
            }
            foreach ($cource as $crs):
                $html .='<option value="' . $crs['course_id'] . '">' . $crs['c_name'] . '</option>';

            endforeach;
            echo $html;
        }
    }
    function getassignment($param = '') {
        if ($param = 'allassignment') {
            $degree = $this->input->post('degree');
            $course = $this->input->post('course');
            $batch = $this->input->post('batch');
            $semester = $this->input->post("semester");
            $class = $this->input->post("divclass");
            $data['course'] = $this->db->get('course')->result();
            $data['semester'] = $this->db->get('semester')->result();
            $data['batch'] = $this->db->get('batch')->result();
            $data['degree'] = $this->db->get('degree')->result();
            $data['class'] = $this->db->get('class')->result();
            $this->db->where("course_id", $course);
            $this->db->where("assign_batch", $batch);
            $this->db->where("assign_degree", $degree);
            $this->db->where("assign_sem", $semester);
            $this->db->where("class_id", $class);
            $data['param'] = $param;
            $data['assignment'] = $this->db->get('assignment_manager')->result();

            $this->load->view("backend/admin/getassignment", $data);
        }
    }
      function get_batchs($param = '') {
        $cid = $this->input->post("course");
        $did = $this->input->post("degree");
        $html = '';
        if ($cid != '') {
            if ($cid == "All") {
                $html .= '<option value="All">All</option>';
            } else {
                $batch = $this->db->query("SELECT * FROM batch WHERE FIND_IN_SET('" . $did . "',degree_id) AND FIND_IN_SET('" . $cid . "',course_id)")->result_array();
                $html = '<option value="">Select Batch</option>';
                if ($param == "") {
                    $html .= '<option value="All">All</option>';
                }
                foreach ($batch as $btc):
                    $html .='<option value="' . $btc['b_id'] . '">' . $btc['b_name'] . '</option>';

                endforeach;
            }
            echo $html;
        }
    }
    
     function getstudyresource() {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post("semester");
        $data['course'] = $this->db->get('course')->result();
        $data['semester'] = $this->db->get('semester')->result();
        $data['batch'] = $this->db->get('batch')->result();
        $data['degree'] = $this->db->get('degree')->result();
        $data['student'] = $this->db->get('student')->result();

        if ($degree == "All") {


            $data['studyresource'] = $this->db->get('study_resources')->result();
        } else {
            if ($course == "All") {
                $this->db->where("study_degree", $degree);
                $data['studyresource'] = $this->db->get('study_resources')->result();
            } else {
                if ($batch == 'All') {
                    $this->db->where("study_course", $course);
                    $this->db->where("study_degree", $degree);
                    $data['studyresource'] = $this->db->get('study_resources')->result();
                } else {
                    if ($semester == "All") {
                        $this->db->where("study_batch", $batch);
                        $this->db->where("study_course", $course);
                        $this->db->where("study_degree", $degree);
                        $data['studyresource'] = $this->db->get('study_resources')->result();
                    } else {
                        $this->db->where("study_sem", $semester);
                        $this->db->where("study_batch", $batch);
                        $this->db->where("study_course", $course);
                        $this->db->where("study_degree", $degree);
                        $data['studyresource'] = $this->db->get('study_resources')->result();
                    }
                }
            }
        }

        // $this->db->where("study_course",$course);
        // $this->db->or_where('study_course >', 'All'); 
        //     $this->db->where("study_batch",$batch);
        //  $this->db->or_where('study_batch >', 'All'); 
        //      $this->db->where("study_degree",$degree);
        //     $this->db->or_where('study_degree >', 'All'); 
        //    $this->db->where("study_sem",$semester);
        //   $this->db->or_where('study_sem >', 'All'); 
        //     $data['studyresource'] = $this->db->get('study_resources')->result();
        //$page_data['studyresource'] = $this->db->get('study_resources')->result();

        $this->load->view("backend/admin/getstudyresource", $data);
    }
    
     function course_filter($param = '') {
        $did = $this->input->post("degree");

        if ($did != '') {
            if ($did == 'All') {
                echo ' <option value="">Select Branch</option>
                   <option value="All">All</option>';
            } else {
                $cource = $this->db->get_where("course", array("degree_id" => $did))->result_array();
                $html = '';
                foreach ($cource as $crs):
                    $html .='<option value="' . $crs['course_id'] . '">' . $crs['c_name'] . '</option>';

                endforeach;
                echo $html;
            }
        }
    }
     function batch_filter($param = '') {
        $cid = $this->input->post("course");
        $did = $this->input->post("degree");
        if ($cid != '') {
            $html = '';
            // $cource = $this->db->get_where("batch",array("degree_id"=>$cid))->result_array();
            if ($cid == "All") {
                //$batch = $this->db->query("SELECT * FROM batch WHERE FIND_IN_SET('" . $did . "',degree_id)")->result_array();
                // $batch = '';
                echo ' <option value="">Select Batch</option>
                   <option value="All">All</option>';
            } else {
                $batch = $this->db->query("SELECT * FROM batch WHERE FIND_IN_SET('" . $did . "',degree_id) AND FIND_IN_SET('" . $cid . "',course_id)")->result_array();


                // echo $this->db->last_query();           

                foreach ($batch as $btc):
                    $html .='<option value="' . $btc['b_id'] . '">' . $btc['b_name'] . '</option>';

                endforeach;
                echo $html;
            }
        }
    }
    
    function library($param1 = '', $param2 = '') {
        
        if ($param1 == 'create') {


            if ($_FILES['libraryfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('libraryfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/library/', 'refresh');
                } else {
                    $file = $this->upload->data();

                    $data['lm_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['lm_filename'];
                }
            } else {

                $file_url = '';
            }

            $data['lm_degree'] = $this->input->post('degree');
            $data['lm_title'] = $this->input->post('title');
            $data['lm_batch'] = $this->input->post('batch');
            $data['lm_url'] = $file_url;
            $data['lm_semester'] = $this->input->post('semester');
            $data['lm_desc'] = $this->input->post('description');

            $data['lm_status'] = 1;
            //  $data['lm_student_id'] = $this->input->post('student');
            $data['lm_course'] = $this->input->post('course');
            $data['created_date'] = date('Y-m-d');


            $this->db->insert('library_manager', $data);
            $last_id = $this->db->insert_id();
            $batch = $data['lm_batch'];
            $degree = $data['lm_degree'];
            $semester = $data['lm_semester'];
            $course = $data['lm_course'];
            if ($degree == 'All') {
                $students = $this->db->get('student')->result();
            } else {
                if ($course == 'All') {
                    $this->db->where('std_degree', $degree);
                    $students = $this->db->get('student')->result();
                } else {
                    if ($batch == 'All') {
                        $this->db->where('std_degree', $degree);
                        $this->db->where('course_id', $course);
                        $students = $this->db->get('student')->result();
                    } else {
                        if ($semester == 'All') {
                            $this->db->where('std_batch', $batch);
                            $this->db->where('std_degree', $degree);
                            $this->db->where('course_id', $course);
                            $students = $this->db->get('student')->result();
                        } else {
                            $this->db->where('std_batch', $batch);
                            $this->db->where('std_degree', $degree);
                            $this->db->where('course_id', $course);
                            $this->db->where('semester_id', $semester);
                            $students = $this->db->get('student')->result();
                        }
                    }
                }
            }







            $std_id = '';
            foreach ($students as $std) {
                $id = $std->std_id;


                $std_id[] = $id;
                //  $student_id = implode(",",$id);
                // $std_ids[] =$student_id;
            }
            if ($std_id != '') {
                $student_ids = implode(",", $std_id);
            } else {
                $student_ids = '';
            }
            $this->db->where("notification_type", "library_manager");
            $res = $this->db->get("notification_type")->result();
            if ($res != '') {
                $notification_id = $res[0]->notification_type_id;
                $notify['notification_type_id'] = $notification_id;
                $notify['student_ids'] = $student_ids;
                $notify['degree_id'] = $degree;
                $notify['course_id'] = $course;
                $notify['batch_id'] = $batch;
                $notify['semester_id'] = $semester;
                $notify['data_id'] = $last_id;
                $this->db->insert("notification", $notify);
            }
            $this->session->set_flashdata('flash_message', 'Library Added Successfully');
            redirect(base_url() . 'professor/library/', 'refresh');
        }
        if ($param1 == 'do_update') {
            /* if ($_FILES['libraryfile']['name'] != "") {

              unlink("uploads/project_file/" . $this->input->post('txtoldfile'));

              $config['upload_path'] = 'uploads/project_file';
              $config['allowed_types'] = '*';
              $this->load->library('upload', $config);
              $this->upload->initialize($config);

              if (!$this->upload->do_upload('libraryfile')) {
              $data = array('msg' => $this->upload->display_errors());
              } else {
              $file = $this->upload->data();
              $data['lm_filename'] = $file['file_name'];
              }
              } */

            if ($_FILES['libraryfile']['name'] != "") {
                if (file_exists("uploads/project_file/" . $this->input->post('txtoldfile'))) {
                    unlink("uploads/project_file/" . $this->input->post('txtoldfile'));
                }

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('libraryfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/library/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['lm_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['lm_filename'];
                }
            } else {

                $file_url = $this->input->post('pageurl');
            }


            $data['lm_degree'] = $this->input->post('degree');
            $data['lm_title'] = $this->input->post('title');
            $data['lm_batch'] = $this->input->post('batch');
            $data['lm_url'] = $file_url;
            $data['lm_semester'] = $this->input->post('semester');
            $data['lm_desc'] = $this->input->post('description');
            $data['lm_status'] = 1;
            //  $data['lm_student_id'] = $this->input->post('student');
            $data['lm_course'] = $this->input->post('course');

            $this->db->where('lm_id', $param2);
            $this->db->update('library_manager', $data);
            $this->session->set_flashdata('flash_message', 'Library Updated Successfully');

            redirect(base_url() . 'professor/library/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('lm_id', $param2);
            $this->db->delete('library_manager');
            delete_notification('library_manager', $param2);
            $this->session->set_flashdata('flash_message', 'Library Deleted Successfully');
            redirect(base_url() . 'professor/library/', 'refresh');
        }
        $page_data['library'] = $this->Professor_model->get_libraries();
        $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['batch'] = $this->Professor_model->get_all_bacth();
        $page_data['student'] = $this->db->get('student')->result();
        $page_data['page_name'] = 'library';
        $page_data['page_title'] = 'Library Management';
        $this->__template('library', $page_data);
    }
     function batchwisestudent() {
        $batch = $this->input->post("batch");
        if ($batch != "") {
            $datastudent = $this->db->get_where("student", array("std_batch" => $batch, 'std_status' => 1))->result();
            //  $datastudent = $this->db->get_where('student', array('std_status' => 1))->result();
            $html = '<option value="">Select student</option>';
            foreach ($datastudent as $rowstu) {
                $html .='<option value="' . $rowstu->std_id . '">' . $rowstu->name . '</option>';
            }
        } else {
            $html = '<option value="">Select student</option>';
        }
        echo $html;
    }
    
      function semwisestudent() {
        $batch = $this->input->post("batch");
        $sem = $this->input->post("sem");
        $degree = $this->input->post("degree");
        $course = $this->input->post("course");

        $datastudent = $this->db->get_where("student", array("std_batch" => $batch, 'std_status' => 1, "semester_id" => $sem, 'course_id' => $course, 'std_degree' => $degree))->result();
        $html = '<option value="">Select student</option>';
        foreach ($datastudent as $rowstu) {
            $html .='<option value="' . $rowstu->std_id . '">' . $rowstu->name . '</option>';
        }
        echo $html;
    }
    
      function getlibrary($param = '') {

        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post("semester");
        $data['course'] = $this->db->get('course')->result();
        $data['semester'] = $this->db->get('semester')->result();
        $data['batch'] = $this->db->get('batch')->result();
        $data['degree'] = $this->db->get('degree')->result();
        if ($degree == "All") {


            $data['library'] = $this->db->get('library_manager')->result();
        } else {
            if ($course == "All") {
                $this->db->where("lm_degree", $degree);
                $data['library'] = $this->db->get('library_manager')->result();
            } else {
                if ($batch == 'All') {
                    $this->db->where("lm_course", $course);
                    $this->db->where("lm_degree", $degree);
                    $data['library'] = $this->db->get('library_manager')->result();
                } else {
                    if ($semester == "All") {
                        $this->db->where("lm_batch", $batch);
                        $this->db->where("lm_course", $course);
                        $this->db->where("lm_degree", $degree);
                        $data['library'] = $this->db->get('library_manager')->result();
                    } else {
                        $this->db->where("lm_semester", $semester);
                        $this->db->where("lm_batch", $batch);
                        $this->db->where("lm_course", $course);
                        $this->db->where("lm_degree", $degree);
                        $data['library'] = $this->db->get('library_manager')->result();
                    }
                }
            }
        }



        $this->load->view("backend/admin/getlibrary", $data);
    }
    
     function participate($param1 = '', $param2 = '') {
        
      

        $this->db->select("ls.*,s.*");
        $this->db->from('survey_list ls');
        $this->db->join("student s", "s.std_id=ls.student_id");
        $page_data['survey'] = $this->db->get()->result();
        $page_data['questions'] = $this->db->get('survey_question')->result();
        
        $page_data['participate'] = $this->db->get('participate_manager')->result();
        $page_data['degree'] = $this->db->get('degree')->result();
        $page_data['batch'] = $this->db->get('batch')->result();
        $page_data['semester'] = $this->db->get('semester')->result();
        $page_data['student'] = $this->db->get('student')->result();
        $page_data['course'] = $this->db->get('course')->result();

        $page_data['page_name'] = 'participate';
        $page_data['page_title'] = 'Participate Management';
        $page_data['volunteer'] = $this->db->get('participate_student')->result_array();
        $page_data['uploads'] = $this->db->get('student_upload')->result_array();
        $this->__template('participate', $page_data);
    }
       function getprojects($param = '') {
        if ($param == 'allproject') {
            $degree = $this->input->post('degree');
            $course = $this->input->post('course');
            $batch = $this->input->post('batch');
            $semester = $this->input->post("semester");
            $class = $this->input->post("divclass");
            $data['course'] = $this->db->get('course')->result();
            $data['semester'] = $this->db->get('semester')->result();
            $data['batch'] = $this->db->get('batch')->result();
            $data['degree'] = $this->db->get('degree')->result();
            $data['class'] = $this->db->get('class')->result();
            $data['student'] = $this->db->get('student')->result();
            $this->db->where("pm_course", $course);
            $this->db->where("pm_batch", $batch);
            $this->db->where("pm_degree", $degree);
            $this->db->where("pm_semester", $semester);
            $this->db->where("class_id", $class);
            $data['param'] = $param;
            $data['project'] = $this->db->get('project_manager')->result();

            $this->load->view("backend/admin/getprojects", $data);
        }
        if ($param == 'submitted') {
            $degree = $this->input->post('degree');
            $course = $this->input->post('course');
            $batch = $this->input->post('batch');
            $semester = $this->input->post("semester");
            $data['course'] = $this->db->get('course')->result();
            $data['semester'] = $this->db->get('semester')->result();
            $data['batch'] = $this->db->get('batch')->result();
            $data['degree'] = $this->db->get('degree')->result();
            $data['student'] = $this->db->get('student')->result();
            $data['student'] = $this->db->get('student')->result();
            $this->db->select("ps.*,pm.*,s.* ");
            $this->db->from('project_document_submission ps');
            $this->db->join("project_manager pm", "pm.pm_id=ps.project_id");
            $this->db->join("student s", "s.std_id=ps.student_id");
            $this->db->where("pm_course", $course);
            $this->db->where("pm_batch", $batch);
            $this->db->where("pm_degree", $degree);
            $this->db->where("pm_semester", $semester);
            $data['submitedproject'] = $this->db->get()->result();
            $data['param'] = $param;
            $this->load->view("backend/admin/getprojects", $data);
        }
    }
    
      function batchwisestudentcheckbox($param = '') {
        $batch = $this->input->post("batch");
        $sem = $this->input->post("sem");
        $degree = $this->input->post("degree");
        $course = $this->input->post("course");
        $html = '';
        if ($param != '') {
            $edit_data = $this->db->get_where('project_manager', array('pm_id' => $param))->result_array();
            $student = $edit_data[0]['pm_student_id'];
            $std = explode(",", $student);
        }

        if ($batch != "") {
            $datastudent = $this->db->get_where("student", array("std_batch" => $batch, 'semester_id' => $sem, 'std_status' => 1, 'course_id' => $course, 'std_degree' => $degree))->result();
            //  $datastudent = $this->db->get_where('student', array('std_status' => 1))->result();

            foreach ($datastudent as $rowstu) {
                if (isset($std)) {
                    if (in_array($rowstu->std_id, $std)) {
                        $html .='<div class="checkedstudent"><input type="checkbox" class="checkbox1" onclick="uncheck();" name="student[]" value="' . $rowstu->std_id . '" checked="">' . $rowstu->std_first_name . '&nbsp' . $rowstu->std_last_name . '</div>';
                    } else {
                        $html .='<div class="checkedstudent"><input type="checkbox" class="checkbox1" onclick="uncheck();" name="student[]" value="' . $rowstu->std_id . '">' . $rowstu->std_first_name . '&nbsp' . $rowstu->std_last_name . '</div>';
                    }
                } else {
                    $html .='<div class="checkedstudent"><input type="checkbox" class="checkbox1" onclick="uncheck();" name="student[]" value="' . $rowstu->std_id . '">' . $rowstu->std_first_name . '&nbsp' . $rowstu->std_last_name . '</div>';
                }
            }
        }
    }
    
       function checkboxstudent($param = '') {

        $batch = $this->input->post("batch");
        $sem = $this->input->post("sem");
        $degree = $this->input->post("degree");
        $course = $this->input->post("course");
        $class = $this->input->post("divclass");

        $datastudent = $this->db->get_where("student", array("std_batch" => $batch, 'std_status' => 1, "semester_id" => $sem, 'course_id' => $course, 'std_degree' => $degree,'class_id'=>$class))->result();
        $html = '';
        if ($param != '') {
            $edit_data = $this->db->get_where('project_manager', array('pm_id' => $param))->result_array();
            $student = $edit_data[0]['pm_student_id'];
            $std = explode(",", $student);
        }

        foreach ($datastudent as $rowstu) {
            //$rowstu->std_id . . $rowstu->name;
            if (isset($std)) {
                if (in_array($rowstu->std_id, $std)) {
                    $html .='<div class="checkedstudent"><input type="checkbox" class="checkbox1" onclick="uncheck();" name="student[]" value="' . $rowstu->std_id . '" checked="">' . $rowstu->std_first_name . '&nbsp' . $rowstu->std_last_name . '</div>';
                } else {
                    $html .='<div class="checkedstudent"><input type="checkbox" class="checkbox1" onclick="uncheck();" name="student[]" value="' . $rowstu->std_id . '">' . $rowstu->std_first_name . '&nbsp' . $rowstu->std_last_name . '</div>';
                }
            } else {
                $html .='<div class="checkedstudent"><input type="checkbox" class="checkbox1" onclick="uncheck();" name="student[]" value="' . $rowstu->std_id . '">' . $rowstu->std_first_name . '&nbsp' . $rowstu->std_last_name . '</div>';
            }
        }
        echo $html;
    }
    
      function checkprjects() {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post('semester');
        $title = $this->input->post('title');
        $data = $this->db->get_where('project_manager', array('pm_degree' => $degree,
                    'pm_course' => $course,
                    'pm_title' => $title,
                    'pm_batch' => $batch, 'pm_semester' => $semester))->result_array();
        echo json_encode($data);
    }
      function checkprjectsedit($id = '') {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post('semester');
        $title = $this->input->post('title');
        $data = $this->db->get_where('project_manager', array('pm_degree' => $degree,
                    'pm_course' => $course,
                    'pm_title' => $title,
                    'pm_batch' => $batch, 'pm_semester' => $semester, 'pm_id!=' => $id))->result_array();
        echo json_encode($data);
    }
     function checkprject($id = '') {
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        $batch = $this->input->post('batch');
        $semester = $this->input->post('semester');
        $title = $this->input->post('title');
        $data = $this->db->get_where('project_manager', array('pm_degree' => $degree,
                    'pm_course' => $course,
                    'pm_title' => $title,
                    'pm_batch' => $batch, 'pm_semester' => $semester))->result_array();
        echo json_encode($data);
    }
    
      function project($param1 = '', $param2 = '') {
        
        if ($param1 == 'create') {
            $checkstd = $this->input->post('student');
            if (empty($checkstd)) {
                $this->session->set_flashdata('flash_message', "Student not found, data not added!");
                redirect(base_url() . 'professor/project/', 'refresh');
            }
            if ($_FILES['projectfile']['name'] != "") {


                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('projectfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/project/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['pm_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['pm_filename'];
                }
            } else {

                $file_url = '';
            }
            $data['pm_degree'] = $this->input->post('degree');
            $data['pm_title'] = $this->input->post('title');
            $data['pm_batch'] = $this->input->post('batch');
            $data['pm_url'] = $file_url;
            $data['pm_semester'] = $this->input->post('semester');
            $data['class_id'] = $this->input->post('class');
            $data['pm_desc'] = $this->input->post('description');
            $data['pm_dos'] = $this->input->post('dateofsubmission');
            $data['pm_status'] = 1;
            // $data['pm_student_id'] = $this->input->post('student');
            $stud = implode(',', $this->input->post('student'));
            $data['pm_student_id'] = $stud;
            $data['pm_course'] = $this->input->post('course');
            $data['created_date'] = date('Y-m-d');


            $this->db->insert('project_manager', $data);
            $last_id = $this->db->insert_id();
            $this->db->where("notification_type", "project_manager");
            $res = $this->db->get("notification_type")->result();
            if ($res != '') {
                $notification_id = $res[0]->notification_type_id;
                $notify['notification_type_id'] = $notification_id;
                $notify['student_ids'] = $data['pm_student_id'];
                $notify['degree_id'] = $data['pm_degree'];
                $notify['course_id'] = $data['pm_course'];
                $notify['batch_id'] = $data['pm_batch'];
                $notify['semester_id'] = $data['pm_semester'];
                $notify['data_id'] = $last_id;
                $this->db->insert("notification", $notify);
            }

            //   $degree = $data['pm_degree'];
            //   $course = $data['pm_course'];
            //   $batch = $data['pm_batch'];
            //  $semester = $data['pm_semester'];            
            //  create_notification('project_manager',$degree ,$course,$batch,$semester, $last_id);
            $this->session->set_flashdata('flash_message', 'Project Added Successfully');
            redirect(base_url() . 'professor/project/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $checkstd = $this->input->post('student');
            if (empty($checkstd)) {
                $this->session->set_flashdata('flash_message', "Student not found, data not added!");
                redirect(base_url() . 'professor/project/', 'refresh');
            }
          
            if ($_FILES['projectfile']['name'] != "") {

                $config['upload_path'] = 'uploads/project_file';
                $config['allowed_types'] = '*';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                //$this->upload->set_allowed_types('*');	

                if (!$this->upload->do_upload('projectfile')) {
                    $this->session->set_flashdata('flash_message', "Invalid File!");
                    redirect(base_url() . 'professor/project/', 'refresh');
                } else {
                    $file = $this->upload->data();
                    $data['pm_filename'] = $file['file_name'];
                    $file_url = base_url() . 'uploads/project_file/' . $data['pm_filename'];
                }
            } else {

                $file_url = $this->input->post('pageurl');
            }

            $data['pm_degree'] = $this->input->post('degree');
            $data['pm_title'] = $this->input->post('title');
            $data['pm_batch'] = $this->input->post('batch');
            $data['pm_url'] = $file_url;
            $data['pm_semester'] = $this->input->post('semester');
            $data['class_id'] = $this->input->post('class2');
            $data['pm_desc'] = $this->input->post('description');
            $data['pm_dos'] = $this->input->post('dateofsubmission1');
            $data['pm_status'] = 1;
            //$data['pm_student_id'] = $this->input->post('student');
            $stud = implode(',', $this->input->post('student'));
            $data['pm_student_id'] = $stud;
            $data['pm_course'] = $this->input->post('course');

            $this->db->where('pm_id', $param2);
            $this->db->update('project_manager', $data);
            $this->session->set_flashdata('flash_message', 'Project Updated Successfully');

            redirect(base_url() . 'professor/project/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('pm_id', $param2);
            $this->db->delete('project_manager');
            delete_notification('project_manager', $param2);
            $this->session->set_flashdata('flash_message', 'Project Deleted Successfully');
            redirect(base_url() . 'professor/project/', 'refresh');
        }
        $page_data['project'] = $this->Professor_model->get_projects();
        
        $page_data['submitedproject'] = $this->Professor_model->submittedproject();
         $page_data['degree'] = $this->Professor_model->get_all_degree();
        $page_data['course'] = $this->Professor_model->get_all_course();
        $page_data['semester'] = $this->Professor_model->get_all_semester();
        $page_data['batch'] = $this->Professor_model->get_all_bacth();
        $page_data['class'] = $this->db->get('class')->result();
        $page_data['student'] = $this->db->get('student')->result();
        $page_data['page_name'] = 'project';
        $page_data['page_title'] = 'Project Management';
        $this->__template('project', $page_data);
    }
    
    function graduate($param1 = '', $param2 = '') {
        
        $this->load->model('admin/Crud_model');
       
        $page_data['title'] = 'Recent Graduates';
        $page_data['page_name'] = 'graduate';
        $page_data['degree'] = $this->Crud_model->get_all_degree();
        $page_data['graduates'] = $this->Crud_model->get_all_graduates();
        $this->__template('graduate', $page_data);
    }
    
    /**
     * Email inbox
     */
    function email_inbox() {
        $this->load->model('professor/Professor_model');
        $this->load->helper('system_email');

        $data['inbox'] = admin_inbox();
        $data['title'] = 'Inbox';
        $data['content'] = 'backend/admin/email_inbox';
        //$data['page_name'] = 
        $this->load->view('backend/admin/includes/email_template', $data);
    }


}
