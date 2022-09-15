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
		$this->load->view('news/header', $data);
		$this->load->view('news/index');
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
		$data['posts'] = $this->News_model->get_news($category_id);
		$this->load->view('news/header', $data);
		$this->load->view('news/news_category', $data);
		$this->load->view('news/footer');
	}

	public function news_details($con = '') {
		$data = array();
		$data['categories'] = $this->Dashboard_model->get_category_list();
		$this->load->view('news/header', $data);
		$this->load->view('news/news_details');
		$this->load->view('news/footer');
	}

}