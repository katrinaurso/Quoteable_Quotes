<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$display['registration_errors'] = $this->session->flashdata('registration_errors');
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
			$user = $this->Quote->register_user($post);
			if($user > 0) {
				$this->session->set_userdata('id', $user);
				$this->session->set_userdata('name', $post['first_name']);
				$this->session->set_userdata('loggedin', TRUE);
				redirect('quotes');
			} else {
				$display['registration_errors'] = "<p>There was a system error, plese try again later</p>";
				redirect('');
			}			
		}
	}

	public function home_page() {
		if($this->session->userdata('loggedin') == TRUE) {
			$display['name'] = $this->session->userdata('name');
			// var_dump($display);
			// die();
			$this->load->view('quotes', $display);
		} else {
			redirect('');
		}		
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('');
	}

}