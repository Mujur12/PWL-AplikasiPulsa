<?php


class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(array("ModelTransaksi", "ModelNominal", "ModelItemTransaksi", "ModelPelanggan"));
		isLogin();
	}

	public function index() {
		isLogin();
		$total = $this->ModelPelanggan->get_total_pelanggan();
		$totalTransaksi = $this->ModelTransaksi->get_total_transaksi();
		$totalPenghasilan = $this->ModelItemTransaksi->get_total_penghasilan();
		$view = $this->ModelTransaksi->get_last_transaksi();
		$data = array(
			"header" => "Dashboard",
			"page" => "layout/dashboard",
			"totals" => $total,
			"transaksi" => $totalTransaksi,
			"penghasilan" => $totalPenghasilan,
			"v" => $view
		);
		$this->load->view("layout/main", $data);
	}
}
