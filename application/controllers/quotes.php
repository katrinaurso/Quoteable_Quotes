<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
		if($this->session->userdata('loggedin') == TRUE) {
			$display['name'] = $this->session->userdata('name');
			$this->load->view('quotes', $display);
		} else {
			redirect('');
		}		
	}
	
	public function add_quote() {
		$post = $this->input->post();
		var_dump($post);
	}

}