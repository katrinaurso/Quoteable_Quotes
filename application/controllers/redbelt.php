<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RedBelt extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$this->load->view('login_registration');
	}

	public function home_page() {
		$this->load->view('quotes');
	}

}