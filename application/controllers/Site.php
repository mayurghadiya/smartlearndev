<?php

class Site extends CI_Controller {

    /**
     * Public data array which will be pass to every functions
     * @var mixed 
     */
    public $data = array();

    /**
     * Constructor
     * 
     * @retun void
     */
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Site_model');
    }

    /**
     * Custom template magic method
     * @param string $view_name
     * @param mixed $data
     */
    function __template($view_name, $data) {
        $data['courses'] = $this->Site_model->get_all_courses();
        $this->load->view('site/header.php', $data);
        $this->load->view('site/' . $view_name);
        $this->load->view('site/footer.php');
    }

    /**
     * Home action
     * 
     * @return response
     */
    function home() {
        $this->data['title'] = 'Home Page';
        $this->data['branch'] = $this->Site_model->all_branch();
        $this->data['events'] = $this->Site_model->events();
        $this->data['banner'] = $this->Site_model->banners();
        $this->data['recent_graduates'] = $this->Site_model->recent_graduates();
        $this->data['slide_setting'] = $this->Site_model->banner_setting();
        $this->__template('home', $this->data);
    }

    /**
     * Course action
     * @param string $course_id
     */
    function course($course_id = '') {
        $this->data['title'] = 'Course Details';
        $this->data['course_details'] = $this->Site_model->course_details($course_id);
        $this->data['course_branch'] = $this->Site_model->course_branch($course_id);
        $this->__template('course', $this->data);
    }

    /**
     * Branch details
     * @param string $id
     */
    function branch_details($id = '') {
        $this->data['title'] = 'Branch Details';
        $this->data['branch_details'] = $this->Site_model->branch_details($id);
        $this->__template('branch_details', $this->data);
    }

    /**
     * About action 
     * 
     * @return response
     */
    function about() {
        $this->data['title'] = 'About us';
        $this->__template('about', $this->data);
    }
    /*
     * 
     */
    function syllabus() {        
        $this->data['title'] = 'Syllabus';
        $this->data['syllabus'] = $this->Site_model->get_all_syllabus();
        $this->__template('syllabus', $this->data);
    }

    /**
     * Contact action
     * 
     * @return response
     */
    function contact() {
        if ($_POST) {
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'mayur.ghadiya@searchnative.in',
                'smtp_pass' => 'the mayurz97375',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->from($_POST['email'], $_POST['name']);
            $this->email->to('mayur.ghadiya@searchnative.in');
            $this->email->set_newline("\r\n");
            $this->email->subject('Contact Inquiry');
            $this->email->message($_POST['message']);
            $this->email->send();

            $this->session->set_flashdata('message', 'Your inquiry successfully sent.');
            redirect(base_url('index.php?contact'));
        }
        $this->data['title'] = 'Contact us';
        $this->__template('contact', $this->data);
    }

    /**
     * Add new subcriber 
     * 
     * @return response
     */
    function subscriber() {
        $email = $_POST['email'];
        $is_subscriber = $this->Site_model->check_subscriber($email);
        if ($is_subscriber) {
            echo 'Email adderess is already registered.';
        } else {
            $this->Site_model->save_subscriber(array(
                'email' => $_POST['email']
            ));
            echo 'Thank you for subscribing';
        }
    }

    /**
     * User login action 
     * 
     * @return response
     */
    function user_login() {
        $this->user_dashboard();
        if ($_POST) {
            $email = $_POST["email"];
            $password = md5($_POST["password"]);
            if ($this->validate_login($email, $password) == 'invalid') {
                $this->session->set_flashdata('error', 'Invalid username or password');
            }

            redirect(base_url('index.php?site/user_login'));
        }
        $this->data['title'] = 'User Login';
        $this->__template('user_login', $this->data);
    }

    /**
     * Validate login
     * @param string $email
     * @param string $password
     * @return string
     */
    function validate_login($email = '', $password = '') {
        $credential = array('email' => $email, 'password' => $password);
        $std_credential = array('email' => $email, 'password' => $password, 'std_status' => 1);
        $center_credential = array('emailid' => $email, 'password' => $password, 'center_status' => 1);

        // Checking login credential for admin
        $query = $this->db->get_where('admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('login_type', 'admin');
            $update = array("online" => '1');
            $this->db->where('admin_id', $row->admin_id);
            $this->db->update('admin', $update);

            redirect(base_url('index.php?admin/dashboard'));
        }
        // Checking login credential for student
        $query = $this->db->get_where('student', $std_credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('student_login', '1');
            $this->session->set_userdata('std_id', $row->std_id);
            $this->session->set_userdata('student_id', $row->std_id);
            $this->session->set_userdata('login_user_id', $row->std_id);
            $this->session->set_userdata('std_roll', $row->std_roll);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('login_type', 'student');
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('user_type', '2');
            $this->session->set_userdata('group_id', $row->group_id);
            $this->session->set_userdata('online', '1');
            $this->session->set_userdata('password_status', $row->password_status);
            $update = array("online" => '1');
            $this->db->where('std_id', $row->std_id);
            $this->db->update('student', $update);

            redirect(base_url('index.php?student/dashboard'));
        }

        //check for sub admin
        $query = $this->db->get_where('sub_admin', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();

            $this->session->set_userdata('subadmin_login', '1');
            $this->session->set_userdata('sub_admin_id', $row->sub_admin_id);
            $this->session->set_userdata('login_user_id', $row->sub_admin_id);
            $this->session->set_userdata('name', 'sub admin 1');
            $this->session->set_userdata('email', $row->email);
            $this->session->set_userdata('login_type', 'subadmin');
            redirect(base_url('index.php?sub_admin/dashboard'));
        }

        return 'invalid';
    }

    /**
     * Loggedin user dashboard
     * 
     * @return response
     */
    function user_dashboard() {
        $type = $this->session->userdata('login_type');
        if ($type == 'admin') {
            redirect(base_url('index.php?admin/dashboard'));
        } elseif ($type == 'student') {
            redirect(base_url('index.php?student/dashboard'));
        } elseif ($type == 'subadmin') {
            redirect(base_url('index.php?sub_admin'));
        }
    }

    /**
     * Forgot password 
     * 
     * @return response
     */
    function forgot_password() {
        if ($_POST) {
            $resp = array();
            $resp['status'] = 'false';
            $email = $_POST["email"];
            $reset_account_type = '';
            //resetting user password here
            $new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'mayur.ghadiya@searchnative.in',
                'smtp_pass' => 'the mayurz97375',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->from('mayur.ghadiya@searchnative.in');

            // Checking credential for admin
            $query = $this->db->get_where('admin', array('email' => $email));
            if ($query->num_rows() > 0) {
                $reset_account_type = 'admin';
                $this->db->where('email', $email);
                $this->db->update('admin', array('pass' => $new_password, 'password' => md5($new_password)));
                $resp['status'] = 'true';

                //send mail
                $this->email->subject('Login Details for Learning Management System');
                $this->email->to($_POST['email']);
                $message = "<strong>Your Learning Management System login details given below.</strong><br/>";
                $message .= "Login url: " . base_url('index.php?site/user_login') . "<br/>";
                $message .= "Username: " . $_POST['email'] . "<br/>";
                $message .= "Password: " . $new_password;
                $this->email->message($message);
                $this->email->send();
            }
            // Checking credential for student
            $query = $this->db->get_where('student', array('email' => $email));
            if ($query->num_rows() > 0) {
                $reset_account_type = 'student';
                $this->db->where('email', $email);
                $this->db->update('student', array('real_pass' => $new_password, 'password' => md5($new_password)));
                $resp['status'] = 'true';

                $this->email->subject('Login Details for Learning Management System');
                $this->email->to($_POST['email']);
                $message = "<strong>Your Learning Management System login details given below.</strong><br/>";
                $message .= "Login url: " . base_url('index.php?site/user_login') . "<br/>";
                $message .= "Username: " . $_POST['email'] . "<br/>";
                $message .= "Password: " . $new_password;
                $this->email->message($message);
                $this->email->send();
            }


            // send new password to user email  
            $this->email_model->password_reset_email($new_password, $reset_account_type, $email);

            $resp['submitted_data'] = $_POST;

            if (!$resp['status']) {
                $this->session->set_flashdata('error', 'Email address is not registered with system.');
                redirect(base_url('index.php?site/forgot_password'));
            }

            $this->session->set_flashdata('message', 'Login information is successfully sent to your email.');
            redirect(base_url('index.php?site/user_login'));
        }
        $this->data['title'] = 'Forgot password';
        $this->__template('forgot_password', $this->data);
    }
    
    /**
     * Events actions
     * 
     * @return response
     */
    function events() {
        $this->data['title'] = 'Events';
        $this->data['events'] = $this->Site_model->all_events();
        $this->__template('events', $this->data);
    }
    
}
