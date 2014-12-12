<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function register_user($data) {
		$query = "INSERT INTO users (first_name, last_name, alias, email, password, birthdate, created_at, updated_at)
						VALUES (?,?,?,?,?,?, NOW(), NOW())";
		$values = array($data['first_name'], $data['last_name'], $data['alias'], $data['email'], $data['password'], $data['birthdate']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function login_user($email) {
		$query = "SELECT * FROM users WHERE email = ?";
		$value = array($email);
		return $this->db->query($query, $value)->row_array();
	}

}