<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('loggedin') != TRUE) {
			redirect('');
		}
	}

	public function index() {
		$display['name'] = $this->session->userdata('name');
		$display['quotes'] = $this->Quote->get_quotes();
		$display['quote_errors'] = $this->session->flashdata('quote_errors');
		$this->load->view('quotes', $display);		
	}

	public function add_quote() {
		$this->form_validation->set_rules('quoted_by', 'Quoted By', 'required|min_length[2]');
		$this->form_validation->set_rules('quote', 'Quote', 'required|min_length[2]');
		if($this->form_validation->run() == FALSE) {	
			$this->session->set_flashdata('quote_errors', validation_errors());
			redirect('quotes');
		} else {
			$post = $this->input->post();
			$post['user_id'] = $this->session->userdata('id');
			$quote = $this->Quote->add_quote($post);
			redirect('quotes');
		}
	}

}