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
       
        if ($param1 == 'create') {
            $data['sm_course_id'] = $this->input->post('course');
            $data['sm_sem_id'] = $this->input->post('semester');
            $data['subject_name'] = $this->input->post('subname');
            $data['subject_code'] = $this->input->post('subcode');
            $data['professor_id'] = implode(',', $this->input->post('professor'));
            $data['sm_status'] = 1;
            $data['created_date'] = date('Y-m-d');


            $this->db->insert('subject_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('subject_added_successfully'));
            redirect(base_url() . 'admin/subject/', 'refresh');
        }
        if ($param1 == 'do_update') {

            $data['sm_course_id'] = $this->input->post('course');
            $data['sm_sem_id'] = $this->input->post('semester');
            $data['subject_name'] = $this->input->post('subname');
            $data['subject_code'] = $this->input->post('subcode');
            $data['professor_id'] = implode(',', $this->input->post('professor'));
            $data['sm_status'] = 1;


            $this->db->where('sm_id', $param2);
            $this->db->update('subject_manager', $data);
            $this->session->set_flashdata('flash_message', get_phrase('subject_updated_successfully'));
            redirect(base_url() . 'professor/subject/', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->db->where('sm_id', $param2);
            $this->db->delete('subject_manager');
            $this->session->set_flashdata('flash_message', get_phrase('subject_deleted_successfully'));
            redirect(base_url() . 'professor/subject/', 'refresh');
        }
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
        $page_data['degree'] =  $this->Professor_model->get_all_degree();         
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
            
        if ($row->em_id == $time_table) { $selected = 'selected=selected'; }else{ $selected='';} 
        echo "<option value='".$row->em_id."' ".$selected." >".$row->em_name . "  (Marks" . $row->total_marks .")</option>";
            
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


}
