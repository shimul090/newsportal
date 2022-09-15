<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EcondataModel extends CI_Model {

	public function get_inflation_header($conn = array()) {
		$this->db->select('inflation_date');
		$this->db->from('inflation');
		if (!empty($conn)) {
			$this->db->where('inflation_date', $conn['first']);
			$this->db->or_where('inflation_date', $conn['second']);
			$this->db->or_where('inflation_date', $conn['third']);
		} else {
			$this->db->where('is_active_data = 1');
		}
		$this->db->order_by('type_of_inflation', 'ASC');
		$this->db->order_by('inflation_date', 'DESC');
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}

	public function get_inflation_data($conn = array()) {
		$this->db->select('inflation_data');
		$this->db->from('inflation');
		if (!empty($conn)) {
			$this->db->where('inflation_date', $conn['first']);
			$this->db->or_where('inflation_date', $conn['second']);
			$this->db->or_where('inflation_date', $conn['third']);
		} else {
			$this->db->where('is_active_data = 1');
		}
		$this->db->order_by('type_of_inflation', 'ASC');
		$this->db->order_by('inflation_date', 'DESC');
		$this->db->limit(6);
		return $this->db->get()->result_array();
	}

	public function get_national_income_aggregates_year($select_year = "") {
		$this->db->select('nia_finance_year');
		$this->db->from('national_income_aggr');
		$this->db->where('is_active_data = 1');
		$this->db->order_by('row_priority', 'ASC');
		$this->db->order_by('nia_item_code', 'ASC');
		$this->db->order_by('nia_finance_year', 'DESC');
		$this->db->limit(2);

		return $this->db->get()->result_array();
	}

	public function get_national_income_aggregates_data($select_year = "") {
		$this->db->select('nia_finance_year, nia_amount');
		$this->db->from('national_income_aggr');
		$this->db->where('is_active_data = 1');
		$this->db->order_by('row_priority', 'ASC');
		$this->db->order_by('nia_item_code', 'ASC');
		$this->db->order_by('nia_finance_year', 'DESC');

		return $this->db->get()->result_array();
	}

	public function get_intereset_rate_spread($conn = array()) {
		$this->db->select('b.bank_id,b.bank_type,b.bank_name,b.is_active, w.bnkavg_sl,w.bank_id,
        w.prd_year,w.prd_month,w.prd_month_code,w.wavg_deporate,w.wavg_advrate,w.spread, w.wavg_deporate_1,w.wavg_advrate_1,w.spread_1,
        w.wavg_deporate_o,w.wavg_advrate_o,w.spread_o');
		$this->db->from('bank as b');
		$this->db->join('wavg_intrate as w', 'b.bank_id =  w.bank_id');
		if (isset($conn) && !empty($conn)) {
			$this->db->where('w.prd_month_code', $conn['month']);
			$this->db->where('w.prd_year', $conn['year']);
			if (!empty($conn['bank_type'])) {
				$this->db->where('b.bank_type', $conn['bank_type']);
			}
		} else {
			$this->db->where('w.is_active_data = 1');
			$this->db->order_by("(case b.bank_type WHEN 3 THEN 90 WHEN 5 THEN 91 else b.bank_type END), b.bank_type ASC");
		}
		$this->db->order_by('w.bnkavg_sl', 'ASC');

		return $this->db->get()->result_array();
	}

	public function get_money_supply_header($conn = array()) {
		if (!empty($conn)) {
			$this->db->distinct();
		}
		$this->db->select('date_format(msupply_date,"%Y-%m") as ms_date');
		$this->db->from('money_supply');
		if (!empty($conn)) {
			$this->db->where('date_format(msupply_date,"%Y-%m")', $conn['first']);
			$this->db->or_where('date_format(msupply_date,"%Y-%m")', $conn['second']);
			$this->db->or_where('date_format(msupply_date,"%Y-%m")', $conn['third']);
		} else {
			$this->db->where('is_active_data = 1');
		}
		$this->db->order_by('msupply_priority', 'ASC');
		$this->db->order_by('msupply_item_code', 'ASC');
		$this->db->order_by('msupply_date', 'DESC');
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}

	public function get_money_supply_data($conn = array()) {
		$this->db->select('msupply_amount, msupply_date, msupply_item_code');
		$this->db->from('money_supply');
		if (!empty($conn)) {
			$where = "( Date_Format(msupply_date,'%Y-%m') = '" . $conn['first'] . "')"
				. " or (msupply_item_code in (1,4,7,10,13,16) and Date_Format(msupply_date,'%Y-%m')"
				. " in ('" . $conn['second'] . "','" . $conn['third'] . "'))";
			$this->db->where($where);
		} else {
			$this->db->where('is_active_data=1');
		}
		$this->db->order_by('msupply_priority', 'ASC');
		$this->db->order_by('msupply_item_code', 'ASC');
		$this->db->order_by('msupply_date', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_bank_deposit_header($conn = array()) {
		if (!empty($conn)) {
			$this->db->distinct();
		}
		$this->db->select('date_format(deposit_date,"%Y-%m") as deposit_date');
		$this->db->from('bank_deposit');
		if (!empty($conn)) {
			$this->db->where('date_format(deposit_date,"%Y-%m")', $conn['first']);
			$this->db->or_where('date_format(deposit_date,"%Y-%m")', $conn['second']);
			$this->db->or_where('date_format(deposit_date,"%Y-%m")', $conn['third']);
		} else {
			$this->db->where('is_active_data = 1');
		}
		$this->db->order_by('cr_priority', 'ASC');
		$this->db->order_by('bnkdepo_item_code', 'ASC');
		$this->db->order_by('deposit_date', 'DESC');
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}

	public function get_bank_deposit_data($conn = array()) {
		$this->db->select('bnkdepo_item_code, deposit_date, deposit_amount');
		$this->db->from('bank_deposit');
		if (!empty($conn)) {
			$where = "( bnkdepo_item_code in (1,2,3,4,5,6,7,8,9) and Date_Format(deposit_date,'%Y-%m') = '" . $conn['first'] . "')"
				. " or (bnkdepo_item_code in (1,4,7) and Date_Format(deposit_date,'%Y-%m')"
				. " in ('" . $conn['second'] . "','" . $conn['third'] . "'))";
			$this->db->where($where);
		} else {
			$this->db->where('is_active_data=1');
		}
		$this->db->order_by('cr_priority', 'ASC');
		$this->db->order_by('bnkdepo_item_code', 'ASC');
		$this->db->order_by('deposit_date', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_bank_credit_data($conn = array()) {
		$this->db->select('bnkcredit_item_code, credit_date, credit_amount');
		$this->db->from('bank_credit');
		if (!empty($conn)) {
			$where = "( bnkcredit_item_code in (1,2,3,4,5,6,7,8,9,10,11,12) and Date_Format(credit_date,'%Y-%m') = '" . $conn['first'] . "')"
				. " or (bnkcredit_item_code in (1,4,7,10) and Date_Format(credit_date,'%Y-%m')"
				. " in ('" . $conn['second'] . "','" . $conn['third'] . "'))";
			$this->db->where($where);
		} else {
			$this->db->where('is_active_data=1');
		}
		$this->db->order_by('cr_priority', 'ASC');
		$this->db->order_by('bnkcredit_item_code', 'ASC');
		$this->db->order_by('credit_date', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_monetarysurvey_header($conn = array()) {
		if (!empty($conn)) {
			$this->db->distinct();
		}
		$this->db->select('date_format(msurvey_date,"%Y-%m") as ms_date');
		$this->db->from('monetary_survey');
		if (!empty($conn)) {
			$this->db->where('date_format(msurvey_date,"%Y-%m")', $conn['first']);
			$this->db->or_where('date_format(msurvey_date,"%Y-%m")', $conn['second']);
			$this->db->or_where('date_format(msurvey_date,"%Y-%m")', $conn['third']);
		} else {
			$this->db->where('is_active_data = 1');
		}
		$this->db->order_by('msurvey_priority', 'ASC');
		$this->db->order_by('msurvey_item_code', 'ASC');
		$this->db->order_by('msurvey_date', 'DESC');
		$this->db->limit(3);
		return $this->db->get()->result_array();
	}

	public function get_monetarysurvey_data($conn = array()) {
		$this->db->select('msurvey_amount, msurvey_date, msurvey_item_code');
		$this->db->from('monetary_survey');
		if (!empty($conn)) {
			$where = "( Date_Format(msurvey_date,'%Y-%m') = '" . $conn['first'] . "')"
				. " or (msurvey_item_code in (1,4,7,10,13,16,19,22,25,28,31,34,37,40,43,46,49,52,55) and Date_Format(msurvey_date,'%Y-%m')"
				. " in ('" . $conn['second'] . "','" . $conn['third'] . "'))";
			$this->db->where($where);
		} else {
			$this->db->where('is_active_data=1');
		}
		$this->db->order_by('msurvey_priority', 'ASC');
		$this->db->order_by('msurvey_item_code', 'ASC');
		$this->db->order_by('msurvey_date', 'DESC');
		return $this->db->get()->result_array();
	}

	public function get_press_lcimport_timesr_max_date() {
		$this->db->select('Max(lcimport_date) as lcdate');
		$this->db->from('press_lcimport');

		return $this->db->get()->row_array();
	}

	public function get_press_lcimport_timesr($start_date = "", $end_date = "") {
		$this->db->select('Date_Format(lcimport_date, \'%D %M, %Y\') as lcDate, lcimport_open,lcimport_outstanding, Date_Format(lcimport_date, \'%D %M, %Y\') as lcDate');
		$this->db->from('press_lcimport');
		$this->db->where('lcimport_date BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
		$this->db->order_by('lcimport_date', 'ASC');
		$this->db->order_by('rowcount_press', 'ASC');

		return $this->db->get()->result_array();
	}

}