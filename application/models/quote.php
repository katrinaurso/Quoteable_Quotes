<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Model {

	public function add_quote($data) {
		$query = "INSERT INTO quotes (user_id, quoted_by, quote, created_at, updated_at) VALUES (?,?,?, NOW(), NOW())";
		$values = array($data['user_id'], $data['quoted_by'], $data['quote']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function get_quotes() {
		$query = "SELECT quotes.id, quoted_by, quote, alias FROM quotes
				  LEFT JOIN users
				  ON quotes.user_id = users.id ORDER BY quotes.created_at DESC";
		return $this->db->query($query)->result_array();
	}

	public function add_favorite($data) {
		$query = "INSERT INTO favorite_quotes (user_id, quote_id, created_at, updated_at) VALUES (?,?, NOW(), NOW())";
		$values = array($data['user_id'], $data['quote_id']);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function get_user_favorites($id) {
		$query = "SELECT favorite_quotes.id, quoted_by, quote, alias FROM favorite_quotes
				  LEFT JOIN quotes
				  ON favorite_quotes.quote_id = quotes.id
				  LEFT JOIN users 
				  ON quotes.user_id = users.id
				  WHERE favorite_quotes.user_id = $id";
		return $this->db->query($query)->result_array();
	}

	public function remove_from_favorites($data) {
		$query = "DELETE FROM favorite_quotes WHERE id = $data";
		return $this->db->query($query);
	}

}