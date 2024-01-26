<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model'); 
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login_function()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->login_model->validate_user($username, $password);

        if($user) {
            $this->session->set_userdata('user_id', $user['user_id']);
            $this->session->set_userdata('username', $user['username']);
            $this->session->set_userdata('login_function', true);

            redirect('calendar');
        } else {
            $data['error_message'] = 'Invalid Username or Password';
            $this->load->view('calendar', $data);
        }
    }

    public function logout_function()
    {
        $this->session->sess_destroy();
        redirect('calendar');
    }
}