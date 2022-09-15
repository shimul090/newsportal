<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Econdata extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('EcondataModel');
	}

	public function index() {
		$this->load->view('header');
		$this->load->view('econdata/index');
		$this->load->view('footer');
	}

	public function inflation() {

		$conn = array();
		$data = array();
		$data['page_header'] = "Current Inflation";
		if ($this->input->post('inflation_submit')) {
			$this->form_validation->set_rules('slctmonth', 'Month', 'required');
			$this->form_validation->set_rules('slctyear', 'Year', 'required');
			if ($this->form_validation->run() == true) {
				$conn['first'] = $this->input->post('slctyear') . "-" . $this->input->post('slctmonth') . "-" . "01";
				$conn['second'] = date_format(date_sub(date_create($conn['first']), date_interval_create_from_date_string("1 month")), "Y-m-d");
				$conn['third'] = date_format(date_sub(date_create($conn['first']), date_interval_create_from_date_string("1 year")), "Y-m-d");
			}
		}

		$data['table_headers'] = $this->EcondataModel->get_inflation_header($conn);
		$data['table_data'] = $this->EcondataModel->get_inflation_data($conn);
		echo '<pre>';
		print_r($data['table_data']);
		echo '</pre>';
		die();
		$this->load->view('header');
		$this->load->view('econdata/inflation', $data);
		$this->load->view('footer');
	}

	public function nationalincome() {

		$data['title'] = "National Income Aggregates";
		$data['page_header'] = "";

		$year = "";
		$data["national_income_years"] = $this->EcondataModel->get_national_income_aggregates_year($year);
		$data["national_income_data"] = $this->EcondataModel->get_national_income_aggregates_data($year);

		$this->load->view('header', $data);
		$this->load->view('econdata/nationalincome', $data);
		$this->load->view('footer');
	}

	public function w_avg_interest() {
		$conn = array();

		$data['title'] = "Weighted Average Rate of Interest on Deposits and Advances";
		$data['page_header'] = "Interest Rate Spread based on Monthly Weighted Average Rate of Interest on Deposits and Advances";
		if ($this->input->post('interest_rate_spread_submit')) {
			$this->form_validation->set_rules('select_month', 'Month', 'required');
			$this->form_validation->set_rules('select_year', 'Year', 'required');
			if ($this->form_validation->run() == true) {
				$conn['month'] = $this->input->post('select_month');
				$conn['year'] = $this->input->post('select_year');
				if (!empty($this->input->post('select_bank_type'))) {
					$conn['bank_type'] = $this->input->post('select_bank_type');
				}
			}
		}

		$data["interest_rate_spread"] = $this->EcondataModel->get_intereset_rate_spread($conn);

		$this->load->view('header', $data);
		$this->load->view('econdata/w_avg_interest', $data);
		$this->load->view('footer');
	}

	public function moneysupply() {
		$conn = array();

		$data['title'] = "Money Supply";
		$data['page_header'] = "Current money supply";
		if ($this->input->post('moneysupply_submit')) {
			$data['page_header'] = "Searched Money Supply";
			$this->form_validation->set_rules('select_month', 'Month', 'required');
			$this->form_validation->set_rules('select_year', 'Year', 'required');
			if ($this->form_validation->run() == true) {
				$conn['first'] = $this->input->post('select_year') . "-" . $this->input->post('select_month');
				$conn['second'] = date_format(date_sub(date_create($conn['first']), date_interval_create_from_date_string("1 month")), "Y-m");
				$conn['third'] = date_format(date_sub(date_create($conn['first']), date_interval_create_from_date_string("1 year")), "Y-m");
			}
		}
		$data["table_headers"] = $this->EcondataModel->get_money_supply_header($conn);
		$data["table_data"] = $this->EcondataModel->get_money_supply_data($conn);

		$this->load->view('header', $data);
		$this->load->view('econdata/moneysupply', $data);
		$this->load->view('footer');
	}

	public function bankdeposit() {
		$conn = array();

		$data['title'] = "Bank Deposit and Credit";
		$data['page_header'] = "Current Bank Deposit and Credit";
		if ($this->input->post('bankdeposit_submit')) {
			$data['page_header'] = "Searched Bank deposit and Credit";
			$this->form_validation->set_rules('select_month', 'Month', 'required');
			$this->form_validation->set_rules('select_year', 'Year', 'required');
			if ($this->form_validation->run() == true) {
				$conn['first'] = $this->input->post('select_year') . "-" . $this->input->post('select_month');
				$conn['second'] = date_format(date_sub(date_create($conn['first']), date_interval_create_from_date_string("1 month")), "Y-m");
				$conn['third'] = date_format(date_sub(date_create($conn['first']), date_interval_create_from_date_string("1 year")), "Y-m");
			}
		}
		$data["table_headers"] = $this->EcondataModel->get_bank_deposit_header($conn);
		$data["deposit_data"] = $this->EcondataModel->get_bank_deposit_data($conn);
		/*echo '<pre>';
			print_r($data['deposit_data']);
			echo '</pre>';
		*/

		//$data["credit_data"] = $this->EcondataModel->get_bank_credit_data($conn);

		$this->load->view('header', $data);
		$this->load->view('econdata/bankdeposit', $data);
		$this->load->view('footer');
	}

	public function monetarysurvey() {
		$conn = array();

		$data['title'] = "Monetary Survey";
		$data['page_header'] = "Current Monetary Survey";
		if ($this->input->post('monetarysurvey_submit')) {
			$data['page_header'] = "Searched Monetary Survey";
			$this->form_validation->set_rules('select_month', 'Month', 'required');
			$this->form_validation->set_rules('select_year', 'Year', 'required');
			if ($this->form_validation->run() == true) {
				$conn['first'] = $this->input->post('select_year') . "-" . $this->input->post('select_month');
				$conn['second'] = date_format(date_sub(date_create($conn['first']), date_interval_create_from_date_string("1 month")), "Y-m");
				$conn['third'] = date_format(date_sub(date_create($conn['first']), date_interval_create_from_date_string("1 year")), "Y-m");
			}
		}
		$data["table_headers"] = $this->EcondataModel->get_monetarysurvey_header($conn);
		$data["table_data"] = $this->EcondataModel->get_monetarysurvey_data($conn);

		$this->load->view('header', $data);
		$this->load->view('econdata/monetarysurvey', $data);
		$this->load->view('footer');
	}

	public function press_lcimport_timesr() {
		//$this->mybreadcrumb->add('Home', base_url());
		//$this->mybreadcrumb->add('Economic Data', site_url("econdata/index"));
		//$this->mybreadcrumb->add('Import payments', site_url("econdata/imprtindex"));
		//$this->mybreadcrumb->add('Import LC', site_url(""));

		//$data['breadcrumbs'] = $this->mybreadcrumb->render();
		$data['page_header'] = "Import LCs opening";

		//$this->load->model('MediaroomModel');
		$data['max_lcdate'] = $this->EcondataModel->get_press_lcimport_timesr_max_date();

		if ((substr($data['max_lcdate']['lcdate'], 5, 2) >= 7) && (substr($data['max_lcdate']['lcdate'], 5, 2) <= 12)) {
			$year = substr($data['max_lcdate']['lcdate'], 0, 4) . "-" . (substr($data['max_lcdate']['lcdate'], 0, 4) + 1);
		} else {
			$year = (substr($data['max_lcdate']['lcdate'], 0, 4) - 1) . "-" . substr($data['max_lcdate']['lcdate'], 0, 4);
		}
		$startYear = substr($year, 0, 4);
		$endYear = substr($year, 5, 4);

		$start_date = $startYear . "-07-01";
		$end_date = $endYear . "-06-31";

		$data['import_lc'] = $this->EcondataModel->get_press_lcimport_timesr($start_date, $end_date);
		/*echo '<pre>';
			print_r($data['import_lc']);
			echo '</pre>';
		*/

		$this->load->view('header');
		$this->load->view('econdata/press_lcimport_timesr', $data);
		$this->load->view('footer');
	}

}