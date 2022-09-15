<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{

	/* Methods related to category Start */

	public function get_category_list() {
		$this->db->select('*');
		$this->db->from('truenews_category');
		return $this->db->get()->result_array();
	}

	public function insert_new_category($conn = array()) {
		if(!empty($conn)){
			$insert = $this->db->insert('truenews_category', $conn);
			return $insert?$this->db->insert_id():false; 
		}
		return false;
	}

	public function update_old_category($conn = array()) {
		if(!empty($conn)) {
			$update = $this->db->replace('truenews_category', $conn);
			return $update ? $this->db->insert_id():false;
		}
		return false;
	}

	public function delete_category($id) {
		if(!empty($id)) {
			$this->db->delete('truenews_category', array('id' => $id)); 
			return $this->db->affected_rows() > 0 ? ture : false;
		}
		return false;
	}

	/* Methods related to category End */

	/* Methods related to post Start */
	public function get_post_list() {
		$this->db->select('news.*, truenews_category.category_name, truenews_users.full_name');
		$this->db->from('news');
		$this->db->join('truenews_category', 'truenews_category.id = news.category');
		$this->db->join('truenews_users', 'truenews_users.id = news.entry_by');
		$this->db->order_by('news.id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function insert_new_post($conn = array()) {
		if(!empty($conn)){
			$insert = $this->db->insert('news', $conn);
			return $insert?$this->db->insert_id():false; 
		}
		return false;
	}

	public function update_old_post($conn = array()) {
		if(!empty($conn)) {
			$this->db->where('id', $conn['id']);
			$update = $this->db->update('news', $conn);
			return $this->db->affected_rows() > 0 ? ture : false;
		}
		return false;
	}

	public function delete_post($id) {
		if(!empty($id)) {
			$this->db->delete('news', array('id' => $id)); 
			return $this->db->affected_rows() > 0 ? ture : false;
		}
		return false;
	}

	public function get_post_by_id($id) {
		$this->db->select('news.*, truenews_category.category_name, truenews_users.full_name');
		$this->db->from('news');
		$this->db->join('truenews_category', 'truenews_category.id = news.category');
		$this->db->join('truenews_users', 'truenews_users.id = news.entry_by');
		$this->db->where('news.id', $id);
		return $this->db->get()->row_array();
	}

	/* Methods related to post End */

	/* Methods related to Dashboard info Start */

	public function count_info() {
		$data['total_cat'] = $this->db->query("SELECT count(id) as total_category from truenews_category")->row();
		$data['total_user'] = $this->db->query("SELECT count(id) as total_users from truenews_users")->row();
		$data['total_post'] = $this->db->query("SELECT count(id) as total_posts from news")->row();

		return $data;
	}

	public function get_chart_info() {
		$result = $this->db->query("SELECT count(news.id) AS total_post, category, category_name from news join truenews_category ON news.category = truenews_category.id GROUP BY news.category")->result_array();
		return $result;
	}

	public function get_chart_info_for_user() {
		$result = $this->db->query("SELECT count(news.id) AS total_post, truenews_users.full_name as name from news join truenews_users ON news.entry_by = truenews_users.id GROUP BY truenews_users.id")->result_array();
		return $result;
	}
	/* Methods related to Dashboard info End */

}