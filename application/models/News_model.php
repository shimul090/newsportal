<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {
	function __construct() {
		$this->table = 'news';
	}

	public function get_news($id = '') {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->row_array();
	}

	public function feature_news() {
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('is_feature', 1);
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

	public function breaking_news() {
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('breaking', 1);
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');
		$this->db->limit('5');

		return $this->db->get()->result_array();
	}

	public function latest_news() {
		$this->db->select('*');
		$this->db->from('news');
		$this->db->where('latest', 1);
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

	public function get_national_news() {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('category = 8');
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

	public function get_international_news() {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('category = 9');
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

	public function get_sports_news() {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('category = 10');
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

	public function get_politics_news() {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('category = 13');
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

	public function get_gym_news() {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('category = 14');
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

	public function get_top_news() {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('latest = 1');
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

}