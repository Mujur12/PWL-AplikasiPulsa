<?php
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        isLogin();
        $this->load->model(array("ModelTransaksi", "ModelNominal", "ModelItemTransaksi", "ModelPelanggan"));
    }

    public function index()
    {
        $transaksi = $this->ModelTransaksi->getAll();
        $data = array(
            "header" => "Dashboard",
            "page" => "content/transaksi/v_list_transaksi",
            "transaksi" => $transaksi
        );
        $this->load->view("layout/main", $data);
    }

    public function info()
    {
        $transaksi = $this->ModelTransaksi->getAll();
        $data = array(
            "header" => "Info Transaksi",
            "page" => "content/transaksi/v_info_transaksi",
            "trans" => $transaksi,
        );
        $this->load->view("layout/main", $data);
    }

    public function detail($transaksi_id = null)
    {
        $transaksi = $this->ModelTransaksi->joinTableWhere(array('t.id_transaksi' => $transaksi_id))->row();
        $data['header'] = "Detail Transaksi";
        $data['page'] = "content/transaksi/v_detail_transaksi";
        $data['transaksi'] = $transaksi;
        $this->load->view("layout/main", $data);
    }
}

