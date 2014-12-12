<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Model {

	public function register_user($data) {
		// var_dump($data);
		// die('model register_user');
		$query = "INSERT INTO users (first_name, last_name, alias, email, password, birthdate, created_at, updated_at)
						VALUES (?,?,?,?,?,?, NOW(), NOW())";
		$values = array($data['first_name'], $data['last_name'], $data['alias'], $data['email'], $data['password'], $data['birthdate']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

}