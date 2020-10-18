<?php
class Nominal extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("ModelNominal");
		isLogin();
	}

	public function index() {
		$listNominal = $this->ModelNominal->getAll();
		$data = array(
			"header" => "Nominal",
			"page" => "content/nominal/v_list_nominal",
			"nominals" => $listNominal
		);
		$this->load->view("layout/main", $data);
	}

	public function tambah() {
		$data = array(
			"header" => "Nominal",
			"page" => "content/nominal/v_form_nominal",
		);
		$this->load->view("layout/main", $data);
	}

	public function proses_simpan() {
		$nominal = array(
			"kode_nominal_pulsa" => $this->input->post("kode"),
			"nominal_pulsa" => $this->input->post("nominal"),
			"harga_pulsa" => $this->input->post("harga"),
			"stock_pulsa" => $this->input->post("stock"),
		);
		$this->ModelNominal->insert($nominal);
		redirect("nominal");
	}

	public function update($idNominal) {
		$nominal = $this->ModelNominal->getByPrimaryKey($idNominal);
		$data = array(
			"header" => "Nominal",
			"page" => "content/nominal/v_update_nominal",
			"nominal" => $nominal
		);
		$this->load->view("layout/main", $data);
	}

	public function proses_update() {
		$id = $this->input->post("id");
		$nominal = array(
			"kode_nominal_pulsa" => $this->input->post("kode"),
			"nominal_pulsa" => $this->input->post("nominal"),
			"harga_pulsa" => $this->input->post("harga"),
			"stock_pulsa" => $this->input->post("stock"),
		);
		$this->ModelNominal->update($id, $nominal);
		redirect("nominal");
	}

	public function proses_hapus() {
		$id = $this->input->post("id");
		$this->ModelBarang->delete($id);
		redirect("nominal");
	}
}
