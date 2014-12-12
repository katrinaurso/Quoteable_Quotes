<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$display['registration_errors'] = $this->session->flashdata('registration_errors');
		$display['login_errors'] = $this->session->flashdata('login_errors');
		$this->load->view('login_registration', $display);
	}

	public function register() {
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|alpha|min_length[2]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|alpha|min_length[2]');
		$this->form_validation->set_rules('alias', 'Alias', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('birthdate', 'Birthdate', 'required'); //Set to valid birthdate?
		if($this->form_validation->run() == FALSE) {	
			$this->session->set_flashdata('registration_errors', validation_errors());
			redirect('');
		} else {
			$post = $this->input->post();
			$pass = $post['password'];
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$hash = crypt($pass, $salt);
			$post['password'] = $hash;
			$user = $this->User->register_user($post);
			if($user > 0) {
				$this->session->set_userdata('id', $user);
				$this->session->set_userdata('name', $post['first_name']);
				$this->session->set_userdata('loggedin', TRUE);
				redirect('quotes');
			} else {
				$this->session->set_flashdata('registration_errors', "<p>There was a system error, plese try again later</p>");
				redirect('');
			}			
		}
	}

	public function login() {
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE) {	
			$this->session->set_flashdata('login_errors', validation_errors());
			redirect('');
		} else {
			$post = $this->input->post();
			$user = $this->User->login_user($post['email']);
			if($user) {
				if(crypt($post['password'], $user['password']) == $user['password']) {
					$this->session->set_userdata('id', $user['id']);
					$this->session->set_userdata('name', $user['first_name']);
					$this->session->set_userdata('loggedin', TRUE);
					redirect('quotes');
				}
			}
			$this->session->set_flashdata('login_errors', "<p>The email and password combination do not match our records");
			redirect('');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('');
	}

}