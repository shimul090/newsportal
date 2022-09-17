<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {
	function __construct() {
		$this->table = 'news';
	}

	public function get_news($id) {
		$this->db->select('news.id, category_name, title, description, image, image_caption, created_at');
		$this->db->from('news');
		$this->db->join('truenews_category', 'news.category = truenews_category.id');
		$this->db->where('news.id', $id);
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->row_array();
	}

	public function get_news_by_category($category_id = '') {
		$this->db->select('news.id, category_name, title, description, image, image_caption, created_at');
		$this->db->from('news');
		$this->db->join('truenews_category', 'news.category = truenews_category.id');
		$this->db->where('news.category', $category_id);
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');

		return $this->db->get()->result_array();
	}

	public function get_feature_news($category_id = '') {
		$this->db->select('news.id, category_name, title, description, image, image_caption, created_at');
		$this->db->from('news');
		$this->db->join('truenews_category', 'news.category = truenews_category.id');
		$this->db->where('news.category', $category_id);
		$this->db->where('is_feature', 1);
		$this->db->where('is_active = 1');
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);

		return $this->db->get()->row_array();
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