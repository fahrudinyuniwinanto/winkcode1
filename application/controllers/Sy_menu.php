<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Sy_menu extends CI_Controller {
	function __construct() {
		parent::__construct();
		is_logged();
		$this->load->model('Sy_menu_model');
		$this->load->library('form_validation');
	}

	public function index() {
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q != '') {
			$config['base_url'] = base_url() . 'sy_menu/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'sy_menu/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'sy_menu/index.html';
			$config['first_url'] = base_url() . 'sy_menu/index.html';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Sy_menu_model->total_rows($q);
		$sy_menu = $this->Sy_menu_model->get_limit_data($config['per_page'], $start, $q);

		$this->load->library('pagination');
		$this->pagination->initialize($config);

		$data = array(
			'sy_menu_data' => $sy_menu,
			'q' => $q,
			'pagination' => $this->pagination->create_links(),
			'total_rows' => $config['total_rows'],
			'start' => $start,
			'content' => 'backend/sy_menu/sy_menu_list',
		);
		$this->load->view(layout(), $data);
	}

	public function lookup() {
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));
		$idhtml = $this->input->get('idhtml');

		if ($q != '') {
			$config['base_url'] = base_url() . 'sy_menu/index.html?q=' . urlencode($q);
			$config['first_url'] = base_url() . 'sy_menu/index.html?q=' . urlencode($q);
		} else {
			$config['base_url'] = base_url() . 'sy_menu/index.html';
			$config['first_url'] = base_url() . 'sy_menu/index.html';
		}

		$config['per_page'] = 10;
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->Sy_menu_model->total_rows($q);
		$sy_menu = $this->Sy_menu_model->get_limit_data($config['per_page'], $start, $q);

		$data = array(
			'sy_menu_data' => $sy_menu,
			'idhtml' => $idhtml,
			'q' => $q,
			'total_rows' => $config['total_rows'],
			'start' => $start,
			'content' => 'backend/sy_menu/sy_menu_lookup',
		);
		ob_start();
		$this->load->view($data['content'], $data);
		return ob_get_contents();
		ob_end_clean();
	}

	public function read($id) {
		$row = $this->Sy_menu_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_menu' => $row->id_menu,
				'label' => $row->label,
				'redirect' => $row->redirect,
				'url' => $row->url,
				'parent' => $row->parent,
				'icon' => $row->icon,
				'note' => $row->note,
				'order_no' => $row->order_no,
				'created_by' => $row->created_by,
				'created_at' => $row->created_at,
				'updated_by' => $row->updated_by,
				'updated_at' => $row->updated_at, 'content' => 'backend/sy_menu/sy_menu_read',
			);
			$this->load->view(
				layout(), $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sy_menu'));
		}
	}

	public function create() {
		$data = array(
			'button' => 'Create',
			'action' => site_url('sy_menu/create_action'),
			'id_menu' => set_value('id_menu'),
			'label' => set_value('label'),
			'redirect' => set_value('redirect'),
			'url' => set_value('url'),
			'parent' => set_value('parent'),
			'icon' => set_value('icon'),
			'note' => set_value('note'),
			'order_no' => set_value('order_no'),
			'created_by' => set_value('created_by'),
			'created_at' => set_value('created_at'),
			'updated_by' => set_value('updated_by'),
			'updated_at' => set_value('updated_at'),
			'content' => 'backend/sy_menu/sy_menu_form',
		);
		$this->load->view(layout(), $data);
	}

	public function create_action() {
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'label' => $this->input->post('label', TRUE),
				'redirect' => $this->input->post('redirect', TRUE),
				'url' => $this->input->post('url', TRUE),
				'parent' => $this->input->post('parent', TRUE),
				'icon' => $this->input->post('icon', TRUE),
				'note' => $this->input->post('note', TRUE),
				'order_no' => $this->input->post('order_no', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_at' => $this->input->post('created_at', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_at' => $this->input->post('updated_at', TRUE),
			);

			$this->Sy_menu_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('sy_menu'));
		}
	}

	public function update($id) {
		$row = $this->Sy_menu_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('sy_menu/update_action'),
				'id_menu' => set_value('id_menu', $row->id_menu),
				'label' => set_value('label', $row->label),
				'redirect' => set_value('redirect', $row->redirect),
				'url' => set_value('url', $row->url),
				'parent' => set_value('parent', $row->parent),
				'icon' => set_value('icon', $row->icon),
				'note' => set_value('note', $row->note),
				'order_no' => set_value('order_no', $row->order_no),
				'created_by' => set_value('created_by', $row->created_by),
				'created_at' => set_value('created_at', $row->created_at),
				'updated_by' => set_value('updated_by', $row->updated_by),
				'updated_at' => set_value('updated_at', $row->updated_at),
				'content' => 'backend/sy_menu/sy_menu_form',
			);
			$this->load->view(layout(), $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sy_menu'));
		}
	}

	public function update_action() {
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_menu', TRUE));
		} else {
			$data = array(
				'label' => $this->input->post('label', TRUE),
				'redirect' => $this->input->post('redirect', TRUE),
				'url' => $this->input->post('url', TRUE),
				'parent' => $this->input->post('parent', TRUE),
				'icon' => $this->input->post('icon', TRUE),
				'note' => $this->input->post('note', TRUE),
				'order_no' => $this->input->post('order_no', TRUE),
				'created_by' => $this->input->post('created_by', TRUE),
				'created_at' => $this->input->post('created_at', TRUE),
				'updated_by' => $this->input->post('updated_by', TRUE),
				'updated_at' => $this->input->post('updated_at', TRUE),
			);

			$this->Sy_menu_model->update($this->input->post('id_menu', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('sy_menu'));
		}
	}

	public function delete($id) {
		$row = $this->Sy_menu_model->get_by_id($id);

		if ($row) {
			$this->Sy_menu_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('sy_menu'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sy_menu'));
		}
	}

	public function _rules() {
		$this->form_validation->set_rules('label', 'label', 'trim|required');
		$this->form_validation->set_rules('redirect', 'redirect', 'trim|required');
		$this->form_validation->set_rules('url', 'url', 'trim|required');
		$this->form_validation->set_rules('parent', 'parent', 'trim|required');
		$this->form_validation->set_rules('icon', 'icon', 'trim|required');
		$this->form_validation->set_rules('note', 'note', 'trim');
		$this->form_validation->set_rules('order_no', 'order no', 'trim|required');
		$this->form_validation->set_rules('created_by', 'created by', 'trim');
		$this->form_validation->set_rules('created_at', 'created at', 'trim');
		$this->form_validation->set_rules('updated_by', 'updated by', 'trim');
		$this->form_validation->set_rules('updated_at', 'updated at', 'trim');

		$this->form_validation->set_rules('id_menu', 'id_menu', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel() {
		$this->load->helper('exportexcel');
		$namaFile = "sy_menu.xls";
		$judul = "sy_menu";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();

		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Label");
		xlsWriteLabel($tablehead, $kolomhead++, "Redirect");
		xlsWriteLabel($tablehead, $kolomhead++, "Url");
		xlsWriteLabel($tablehead, $kolomhead++, "Parent");
		xlsWriteLabel($tablehead, $kolomhead++, "Icon");
		xlsWriteLabel($tablehead, $kolomhead++, "Note");
		xlsWriteLabel($tablehead, $kolomhead++, "Order No");
		xlsWriteLabel($tablehead, $kolomhead++, "Created By");
		xlsWriteLabel($tablehead, $kolomhead++, "Created At");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated By");
		xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

		foreach ($this->Sy_menu_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->label);
			xlsWriteNumber($tablebody, $kolombody++, $data->redirect);
			xlsWriteLabel($tablebody, $kolombody++, $data->url);
			xlsWriteNumber($tablebody, $kolombody++, $data->parent);
			xlsWriteLabel($tablebody, $kolombody++, $data->icon);
			xlsWriteLabel($tablebody, $kolombody++, $data->note);
			xlsWriteNumber($tablebody, $kolombody++, $data->order_no);
			xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
			xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
			xlsWriteLabel($tablebody, $kolombody++, $data->updated_by);
			xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}

}

/* End of file Sy_menu.php */
/* Location: ./application/controllers/Sy_menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-06 08:45:17 */
/* http://harviacode.com */