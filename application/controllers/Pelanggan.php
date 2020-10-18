<?php
class Pelanggan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("ModelPelanggan");
		isLogin();
	}

	public function index() {
		$listPelanggan = $this->ModelPelanggan->getAll();
		$data = array(
			"header" => "Pelanggan",
			"page" => "content/pelanggan/v_list_pelanggan",
			"pelanggans" => $listPelanggan
		);
		$this->load->view("layout/main", $data);
	}

	public function tambah() {
		$data = array(
			"header" => "Pelanggan",
			"page" => "content/pelanggan/v_form_pelanggan",
		);
		$this->load->view("layout/main", $data);
	}

	public function proses_simpan() {
		$pelanggan = array(
			"kode_pelanggan" => $this->input->post("kode"),
			"nama_pelanggan" => $this->input->post("nama"),
			"alamat_pelanggan" => $this->input->post("alamat"),
			"no_telp" => $this->input->post("noHp")
		);
		$this->ModelPelanggan->insert($pelanggan);
		redirect("pelanggan");
	}

	public function update($idPelanggan) {
		$pelanggan = $this->ModelPelanggan->getByPrimaryKey($idPelanggan);
		$data = array(
			"header" => "Pelanggan",
			"page" => "content/pelanggan/v_update_pelanggan",
			"pelanggan" => $pelanggan
		);
		$this->load->view("layout/main", $data);
	}

	public function proses_update() {
		$id = $this->input->post("id");
		$pelanggan = array(
			"kode_pelanggan" => $this->input->post("kode"),
			"nama_pelanggan" => $this->input->post("nama"),
			"alamat_pelanggan" => $this->input->post("alamat"),
			"no_telp" => $this->input->post("noHp")
		);
		$this->ModelPelanggan->update($id, $pelanggan);
		redirect("pelanggan");
	}

	public function proses_hapus() {
		$id = $this->input->post("id");
		$this->ModelPelanggan->delete($id);
		redirect("pelanggan");
	}

	public function info() {
		$pelanggan = $this->ModelPelanggan->getAll();
		$data = array(
			"header" => "Info Pelanggan",
			"page" => "content/pelanggan/v_info_pelanggan",
			"pelanggans" => $pelanggan,
		);
		$this->load->view("layout/main", $data);
	}

	public function search(){
		$keyword = $this->input->post('keyword');
		$data['products']= $this->product_m->get_product_keyword($keyword);
		$this->load->view('search', $data);
	}
}
