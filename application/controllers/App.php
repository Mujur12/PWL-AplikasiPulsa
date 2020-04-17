<?php


class App extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("ModelBarang");
	}

	public function index() {
		$listBarang = $this->ModelBarang->getAll();
		$data = array(
			"header" => "Barang",
			"page" => "content/app/v_app",
			"barangs" => $listBarang
		);
		$this->load->view("layout/main", $data);
	}
}
