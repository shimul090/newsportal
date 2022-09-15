<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {
	function __construct() {
		$this->table = 'news';
	}

	public function get_news($id = '') {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('category', $id);
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}
}