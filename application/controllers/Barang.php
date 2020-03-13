<?php


class Barang extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("ModelBarang");
	}

	public function index() {
		$listBarang = $this->ModelBarang->getAll();
		$data = array(
			"header" => "Barang",
			"page" => "content/barang/v_list_barang",
			"barangs" => $listBarang
		);
		$this->load->view("layout/main", $data);
	}

	public function tambah() {
		$data = array(
			"header" => "Barang",
			"page" => "content/barang/v_form_barang",
		);
		$this->load->view("layout/main", $data);
	}

	public function proses_simpan() {
		$barang = array(
			"kode_barang" => $this->input->post("kode"),
			"nama_barang" => $this->input->post("nama"),
			"harga_barang" => $this->input->post("harga"),
			"stock_barang" => $this->input->post("stock"),
		);
		$this->ModelBarang->insert($barang);
		redirect("barang");
	}
}
