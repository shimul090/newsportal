<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('User_model');

		//User login status
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index() {
		if ($this->isUserLoggedIn) {
			redirect('users/account');
		} else {
			redirect('users/login');
		}
	}

	public function account() {
		$data = array();
		if ($this->isUserLoggedIn) {
			$conn = array('id' => $this->session->userdata('userId'));
			$data['user'] = $this->User_model->get_user_data($conn);
			$this->load->view('header');
			$this->load->view('users/account_page', $data);
		} else {
			redirect('users/login');
		}

	}

	public function login() {
		if ($this->isUserLoggedIn) {
			redirect('users/account');
		}
		$data = array();

		// Get messages from the session
		if ($this->session->userdata('success_msg')) {
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if ($this->session->userdata('error_msg')) {
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		if ($this->input->post('loginSubmit')) {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'password', 'required');

			if ($this->form_validation->run() == true) {
				$con = array(
					'returnType' => 'single',
					'conditions' => array(
						'email' => $this->input->post('email'),
						'password' => md5($this->input->post('password')),
						'status' => 1,
					),
				);
				$checkLogin = $this->User_model->get_user_data($con);
				if ($checkLogin) {
					$this->session->set_userdata('isUserLoggedIn', TRUE);
					$this->session->set_userdata('userId', $checkLogin['id']);
					$this->session->set_userdata('userRole', $checkLogin['role']);
					redirect('users/account/');
				} else {
					$data['error_msg'] = 'Wrong email or password, please try again.';
				}
			} else {
				$data['error_msg'] = 'Please fill all the mandatory fields.';
			}
		}

		$this->load->view('users/login', $data);
	}

	public function registration() {
		$data = array();

		// If registration request is submitted
		if ($this->input->post('signupSubmit')) {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[4]|max_length[20]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

			$data = array(
				'full_name' => strip_tags($this->input->post('full_name')),
				'email' => strip_tags($this->input->post('email')),
				'phone' => strip_tags($this->input->post('phone')),
				'password' => md5($this->input->post('password')),
				'role' => 'user',
			);

			if ($this->form_validation->run() == true) {
				$insert = $this->User_model->saverecords($data);
				if ($insert) {
					$this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.');
					redirect('users/login');
				} else {
					$data['error_msg'] = 'Some problems occured, please try again.';
				}
			} else {
				$data['error_msg'] = 'Please fill all the mandatory fields.';
			}
		}

		// Posted data
		//$data['user'] = $userData;

		// Load view

		$this->load->view('users/registration', $data);

	}

	public function logout() {
		$this->session->unset_userdata('isUserLoggedIn');
		$this->session->unset_userdata('userId');
		$this->session->sess_destroy();
		redirect('users/login/');
	}

	public function email_check($str) {
		$con = array(
			'returnType' => 'count',
			'conditions' => array(
				'email' => $str,
			),
		);
		$checkEmail = $this->User_model->get_user_data($con);
		if ($checkEmail > 0) {
			$this->form_validation->set_message('email_check', 'The given email already exists.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}