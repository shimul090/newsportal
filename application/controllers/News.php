<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model(array('News_model', 'Dashboard_model'));

	}

	public function index() {
		$data = array();

		$data['categories'] = $this->Dashboard_model->get_category_list();
		$data['breaking_news'] = $this->News_model->breaking_news();
		$data['top_news'] = $this->News_model->get_top_news();
		$data['national_news'] = $this->News_model->get_national_news();
		$data['international_news'] = $this->News_model->get_international_news();
		$data['sports_news'] = $this->News_model->get_sports_news();
		$this->load->view('news/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('news/footer');

	}

	public function national() {
		$data = array();
		$data['national_news'] = $this->News_model->get_national_news();
		$this->load->view('news/header');
		$this->load->view('news/national', $data);
		$this->load->view('news/footer');
	}

	public function open_news($con) {
		$data = array();
		$data['test'] = $con;
		$this->load->view('news/header');
		$this->load->view('news/open_news', $data);
		$this->load->view('news/footer');
	}

	public function news_category() {
		$data = array();
		$category_id = $this->uri->segment(3, 0);
		$data['categories'] = $this->Dashboard_model->get_category_list();
		$data['news'] = $this->News_model->get_news_by_category($category_id);
		$this->load->view('news/header', $data);
		$this->load->view('news/news_category', $data);
		$this->load->view('news/footer');
	}

	public function news_details($id) {
		$data = array();
		$data['categories'] = $this->Dashboard_model->get_category_list();
		$data['news'] = $this->News_model->get_news($id);
		$this->load->view('news/header', $data);
		$this->load->view('news/news_details', $data);
		$this->load->view('news/footer');
	}

}