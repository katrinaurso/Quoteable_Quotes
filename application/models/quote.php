<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Model {

	public function add_quote($data) {
		// var_dump($data);
		$query = "INSERT INTO quotes (user_id, quoted_by, quote, created_at, updated_at) VALUES (?,?,?, NOW(), NOW())";
		$values = array($data['user_id'], $data['quoted_by'], $data['quote']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function get_quotes() {
		$query = "SELECT quotes.id, quoted_by, quote, alias FROM quotes
				  LEFT JOIN users
				  ON quotes.user_id = users.id";
		return $this->db->query($query)->result_array();
	}

}