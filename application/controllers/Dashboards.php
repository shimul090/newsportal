<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model(array('Dashboard_model', 'User_model'));

		//User login status
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
		$this->UserId = $this->session->userdata('userId');
		$this->UserRole = $this->session->userdata('userRole');
	}

	public function index() {
		if($this->isUserLoggedIn && $this->UserRole == 'admin'){
			$data['dashboard_info'] = $this->Dashboard_model->count_info();
			$data['chart_data'] = $this->Dashboard_model->get_chart_info();
			$data['chart_data_for_user'] = $this->Dashboard_model->get_chart_info_for_user();
			$this->load->view('dashboards/dashboard_header');
			$this->load->view('dashboards/dashboard_count_info', $data);
			$this->load->view('dashboards/dashboard_footer');
		} else{
			redirect('users/login');
		}
	}


	
	/* Methods related to category Start */
	public function categories() {
		if($this->isUserLoggedIn && $this->UserRole == 'admin'){
			$data = array();
			$msg = $this->session->flashdata('msg');
			if(!empty($msg['success_msg'])) {
				$data['success_msg'] = $msg['success_msg'];
			}

			if(!empty($msg['error_msg'])) {
				$data['error_msg'] = $msg['error_msg'];
			}
			$data['title'] = "Category List";
			$data['page_header'] = 'Manage Categories';
			$data['category_lists'] = $this->Dashboard_model->get_category_list();
			$this->load->view('dashboards/dashboard_header', $data);
			$this->load->view('dashboards/categories', $data);
			$this->load->view('dashboards/dashboard_footer');
		} else{
			redirect('users/login');
		}

	}

	public function add_category(){
		if($this->isUserLoggedIn && $this->UserRole == 'admin'){
			$data = array();
			if($this->input->post('add_category_submit')){
				$this->form_validation->set_rules('category_name', 'Category Name', 'required');

				if($this->form_validation->run() == true){
					$conn = array(
						'category_name' => strip_tags($this->input->post('category_name'))
					);
					$insert = $this->Dashboard_model->insert_new_category($conn);
					if($insert){
						$data['success_msg'] = ADD_MESSAGE;
					} else{
						$data['error_msg'] = ERROR_MESSAGE;
					}
				}
			}
			$this->session->set_flashdata('msg', $data);
			redirect('dashboards/categories');
		} else{
			redirect('users/login');
		}
	}

	public function update_category(){
		if($this->isUserLoggedIn && $this->UserRole == 'admin'){
			$data = array();
			if($this->input->post('edit_category_submit')){
				$this->form_validation->set_rules('category_id_for_update', 'Category Id', 'required');
				$this->form_validation->set_rules('update_category_name', 'Updated Category Name', 'required');

				if($this->form_validation->run() == true){
					$conn = array(
						'id' => $this->input->post('category_id_for_update'),
						'category_name' => strip_tags($this->input->post('update_category_name'))
					);
					$update = $this->Dashboard_model->update_old_category($conn);
					if($update){
						$data['success_msg'] = UPDATE_MESSAGE;
					} else{
						$data['error_msg'] = ERROR_MESSAGE;
					}
				}
			}
			$this->session->set_flashdata('msg', $data);
			redirect('dashboards/categories');
		} else{
			redirect('users/login');
		}
	}


	public function delete_category(){
		if($this->isUserLoggedIn && $this->UserRole == 'admin'){
			$id = $this->uri->segment('3');
			$delete = $this->Dashboard_model->delete_category($id);
			if($delete){
				$data['success_msg'] = DELETE_MESSAGE;
			} else{
				$data['error_msg'] = ERROR_MESSAGE;
			}
			$this->session->set_flashdata('msg', $data);
			redirect('dashboards/categories');
		} else{
			redirect('users/login');
		}
	}

	/* Methods related to category End */

	/* Methods related to post Start */

	public function posts() {
		if($this->isUserLoggedIn && $this->UserRole == 'admin'){
			$data = array();
			$msg = $this->session->flashdata('msg');
			if(!empty($msg['success_msg'])) {
				$data['success_msg'] = $msg['success_msg'];
			}

			if(!empty($msg['error_msg'])) {
				$data['error_msg'] = $msg['error_msg'];
			}
			$data['title'] = "Posts List";
			$data['page_header'] = 'Manage Posts';
			$data['post_lists'] = $this->Dashboard_model->get_post_list();
			$this->load->view('dashboards/dashboard_header', $data);
			$this->load->view('dashboards/posts', $data);
			$this->load->view('dashboards/dashboard_footer');
		} else{
			redirect('users/login');
		}
	}

	public function add_post(){
		if($this->isUserLoggedIn && $this->UserId && $this->UserRole == 'admin'){
			$data = array();

			if($this->input->post('new_post_submit')){
				$this->form_validation->set_rules('title', 'Title', 'trim|required');
				$this->form_validation->set_rules('description', 'Description', 'trim|required');
				$this->form_validation->set_rules('category', 'Category', 'required');
				$this->form_validation->set_rules('is_feature', 'Is Feature', 'required');
				$this->form_validation->set_rules('category', 'Category', 'required');

				if($this->form_validation->run() == true){
					$data['title'] = strip_tags($this->input->post('title'));
					$data['description'] = trim($this->input->post('description'));
					$data['category'] = $this->input->post('category');
					$data['is_feature'] = $this->input->post('is_feature');
					$data['created_at'] = date("Y-m-d H:i:s"); 
					if(!empty($this->input->post('image_caption'))){
						$data['image_caption'] = $this->input->post('image_caption');
					}
					if(!empty($this->UserId)) {
						$data['entry_by'] = $this->UserId;
					}
					$image_name = $this->image_upload();
					if(!empty($image_name)){
						$data['image'] = $image_name;
					}
					$insert = $this->Dashboard_model->insert_new_post($data);
					if($insert){
						$data['success_msg'] = ADD_MESSAGE;
						$this->session->set_flashdata('msg', $data);
						redirect('dashboards/posts');
					} else{
						$data['error_msg'] = ERROR_MESSAGE;
					}
				}
				else
        		{ 
                	$data['error_msg'] = 'Please fill all the mandatory fields.'; 
            	}
			}
			//$this->session->set_flashdata('msg', $data);
			$data['category_lists'] = $this->Dashboard_model->get_category_list();
			$this->load->view('dashboards/dashboard_header', $data);
			$this->load->view('dashboards/add_post', $data);
			$this->load->view('dashboards/dashboard_footer');
		} else{
			redirect('users/login');
		}
	}

	private function image_upload() {
		$type = explode('.', $_FILES['image']['name']);
		$type = $type[count($type)-1];
		$image_name = uniqid(rand()).'.'.$type;
		$url = '/opt/lampp/htdocs/truenews/assets/img/'.$image_name;
		if(in_array($type, array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'bmp', 'BMP'))){
			if(move_uploaded_file($_FILES['image']['tmp_name'], $url)){
				return $image_name;
			}
		}
	}

	public function update_post(){
		if($this->isUserLoggedIn && $this->UserId && $this->UserRole == 'admin'){
			if($this->input->post('edit_post_submit')){
				$this->form_validation->set_rules('title', 'Title', 'trim|required');
				$this->form_validation->set_rules('description', 'Description', 'trim|required');
				$this->form_validation->set_rules('category', 'Category', 'required');
				$this->form_validation->set_rules('is_feature', 'Is Feature', 'required');
				$this->form_validation->set_rules('category', 'Category', 'required');

				if($this->form_validation->run() == true){
					$data['id'] = $this->input->post('id');
					$data['title'] = strip_tags($this->input->post('title'));
					$data['description'] = strip_tags($this->input->post('description'));
					$data['category'] = $this->input->post('category');
					$data['is_feature'] = $this->input->post('is_feature');
					$data['updated_at'] = date("Y-m-d H:i:s"); 
					if(!empty($this->UserId)) {
						$data['entry_by'] = $this->UserId;
					}
					if(!empty($this->input->post('image_caption'))){
						$data['image_caption'] = $this->input->post('image_caption');
					}
					$image_name = $this->image_upload();
					if(!empty($image_name)){
						$data['image'] = $image_name;
					}
					$update = $this->Dashboard_model->update_old_post($data);
					if($update){
						$data['success_msg'] = UPDATE_MESSAGE;
						$this->session->set_flashdata('msg', $data);
						redirect('dashboards/posts');
					} else{
						$data['error_msg'] = "Don't know the problem";
						$this->session->set_flashdata('msg', $data);
					}
				}
			}
			$id = $this->uri->segment(3);
			if(empty($id) || $id == ""){
				$data = array(
					'error_msg' => WARNING_MESSAGE
				);
				$this->session->set_flashdata('msg', $data);
				redirect('dashboards/posts');
			}
			$data['category_lists'] = $this->Dashboard_model->get_category_list();
			$data['get_post_info'] = $this->Dashboard_model->get_post_by_id($id);
			/*echo '<pre>';
			print_r($data['get_post_info']);
			echo '</pre>';
			die();*/
			$this->load->view('dashboards/dashboard_header', $data);
			$this->load->view('dashboards/edit_post', $data);
			$this->load->view('dashboards/dashboard_footer');
			
		} else{
			redirect('users/login');
		}
	}

	public function delete_post(){
		if($this->isUserLoggedIn && $this->UserRole == 'admin'){
			$id = $this->uri->segment('3');
			$delete = $this->Dashboard_model->delete_post($id);
			if($delete){
				unlink('/opt/lampp/htdocs/truenews/assets/img/'.$this->uri->segment('4'));
				$data['success_msg'] = DELETE_MESSAGE;
			} else{
				$data['error_msg'] = ERROR_MESSAGE;
			}
			$this->session->set_flashdata('msg', $data);
			redirect('dashboards/posts');
		} else{
			redirect('users/login');
		}
	}

	/* Methods related to post End */

}